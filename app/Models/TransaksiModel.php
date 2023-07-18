<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'boking';
    protected $primaryKey = 'kdBoking';
    protected $useTimestamps = false;
    protected $useSoftDeletess = true;
    //protected $returnType     = 'object';
    protected $allowedFields = ['kdBoking', 'kdLapangan', 'userId', 'tglInvoice', 'tglBooking', 'noInvoice', 'atasNama', 'jamMulaiBooking', 'jamSelesaiBooking', 'alamat', 'kontak', 'totalBayar', 'kdStatus', 'created_at'];

    // public function getlapangan($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $id])->first();
    // }
}
