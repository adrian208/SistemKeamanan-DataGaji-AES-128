<?php

namespace App\Models;

use CodeIgniter\Model;

class Enkripsi_Model extends Model
{
    protected $file;

    protected $table   = 'file';
    protected $primaryKey = 'id_file';
    // protected $useTimestamps = false;
    protected $useSoftDeletess = true;
    protected $returnType     = 'object';
    // protected $allowedFields = ['kdBoking', 'kdJadwal', 'noInvoice', 'atasNama', 'alamat', 'kontak', 'totalBayar', 'statusBoking', 'username', 'created_at'];
    public function __construct()
    {
        parent::__construct();
        // $this->db      = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->file = $this->db->table('file');
        // $this->builder = $this->db->table('users');
        // $this->file = $this->db->table('file');
    }
    public function insertEncryptData($username, $final_file, $finalfile, $size2, $finalkey, $keterangan)
    {
        $hsl = $this->db->query("INSERT INTO file VALUES ('', '$username', '$final_file', '$finalfile.rda', '$size2', '$finalkey','','','$keterangan','E')");
        return $hsl;
    }

    public function selectEncryptData($finalfile)
    {
        // $this->db->select('*');
        // $this->db->from('file');
        $this->file->select('*');
        if ($finalfile != null) {
            // $this->db->query("SELECT * FROM file WHERE ")('file_url', $finalfile);
            $this->file->where('file_url', $finalfile);
        }
        $query = $this->file->get();
        // $result = $this->user_master->get()->getResult();
        return $query;
    }

    public function updateEncryptData($finalurl)
    {
        $updatedata = $this->db->query("UPDATE file SET file_url ='$finalurl' WHERE file_url=''");
        return $updatedata;
    }
}
