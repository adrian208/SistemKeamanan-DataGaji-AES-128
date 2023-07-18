<?php

namespace App\Models;

use CodeIgniter\Model;

class DekripsiModel extends Model
{
    protected $file;

    protected $table   = 'file';
    protected $primaryKey = 'id_file';
    // protected $useTimestamps = false;
    // protected $useSoftDeletess = true;
    // protected $returnType     = 'object';
    public function __construct()
    {
        parent::__construct();
        // $this->db      = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->file = $this->db->table('file');
        // $this->builder = $this->db->table('users');
        // $this->file = $this->db->table('file');
    }

    public function getfile1($id = null)
    {
        $this->file->select('*');
        // $this->db->from('file');
        // order by file_id
        $this->file->orderBy('id_file ', 'DESC');

        if ($id != null) {
            $this->file->where('id_file', $id);
        }
        $query = $this->file->get();
        return $query;
    }
    public function dtotenkrip()
    {

        $where = "status='E' ";


        $this->file->where($where);
        $query = $this->file->countAll();
        return $query;
    }
    public function getfile2($id = null)
    {
        $this->file->select('*');
        // $this->db->from('file');
        if ($id != null) {
            $this->file->where('id_file', $id);
        }
        $query = $this->file->get();
        return $query->getResult();
    }

    public function getDataFileByPassword($id_file, $finalkey)
    {
        $this->file->select('file.id_file, id_file,kunci');

        // if ($id_file != null) {
        // $this->file->getwhere([
        //     ['id_file =' => $id_file],
        //     ['kunci =' => $finalkey]
        // ]);
        $this->file->where('id_file ', $id_file);
        $this->file->where('kunci ', $finalkey);
        // }
        // $query     = $this->db->query("SELECT id_file,kunci FROM file WHERE id_file = '$id_file' AND kunci='$finalkey'");
        $query = $this->file->get();
        return $query->getResult();
    }
    public function updateStatusFile($id_file)
    {
        $hsl = $this->db->query("UPDATE file SET status='D' WHERE id_file='$id_file'");
        return $hsl;
    }
    public function downloadfile($file)
    {
        // header("Content-Disposition: attachment; filename=\"" . basename($cache) . "\"");
        // header("Content-Type: application/force-download");
        // header("Content-Length: " . filesize($cache));
        // header("Connection: close");
        // readfile($cache);
        // session_start();
        // $this->session["download"];  header("Content-Disposition: attachment; filename=\"" . basename($file1) . "\"");


        // header("Content-Type: application/force-download");
        // header("Content-Length: " . filesize($file));
        // header("Connection: close");
        // readfile($file);
        // unset($file);

        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename = ' . basename($file));

        // header('Expires: 0');
        // header('Cache-Control: must-revalidate, post-check = 0, pre-check = 0');
        // header('Pragma: public');
        // header('Content-Length: ' . filesize($file));
        // header("Refresh:0; url=/dekripsi/index");
        // ob_clean();
        // flush();
        // readfile($file);
        // die;

        session_start();
        $file  = $_SESSION['download'];
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
        header("Content-Type: application/force-download");
        header("Content-Length: " . filesize($file));
        header('Location: /dekripsi/index');
        header("Refresh:0; url=/dekripsi/index");
        header("Connection: close");
        readfile($file);

        unset($file);
        // return redirect()->to('/dekripsi/index')->with('success', 'data berhasil ditambahkan');
    }
}
