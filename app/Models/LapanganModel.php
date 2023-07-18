<?php

namespace App\Models;

use CodeIgniter\Model;

class LapanganModel extends Model
{
    protected $table = 'lapangan';
    protected $primaryKey = 'kdLap';
    protected $useTimestamps = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['noLap', 'gambarLap', 'deskripsi'];

    public function getlapangan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $id])->first();
    }

    public function listAll()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('lapangan');
        // cek apakah ada lapangan yang dibooking atau tidak dan bokingan sudah dibayar
        $isBooking = "(select count(*) from boking where boking.kdLapangan = lapangan.kdLap and kdStatus = 'sudah_membayar' and (time(now()) between jamMulaiBooking and jamSelesaiBooking) and tglBooking = date(now()) group by kdLapangan order by created_at desc  limit 1)";

        $builder->select("*, IFNULL($isBooking, 0) as isBooking");
        $builder->where("IFNULL($isBooking, 0) = 0");
        return $builder->get()->getResult();
    }

    public function getOneByID($kdLap)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('lapangan');
        $builder->where("kdLap =", $kdLap);
        return $builder->get()->getFirstRow();
    }
}
