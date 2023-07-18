<?php

namespace App\Controllers;

use App\Models\LapanganModel;
use App\Models\JadwalModel;
use App\Models\BokingModel;
use App\Models\DekripsiModel;
use App\Models\InvoiceModel;
use App\Models\TransaksiModel;
use mysqli;

class Dekripsi extends BaseController
{
    protected $db, $builder, $dekripsiModel, $session;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->dekripsiModel = new DekripsiModel();


        $this->session = session();
    }

    public function index()
    {
        $data['title'] = 'Dekripsi File';
        $data['data'] = $this->dekripsiModel->getfile1();
        return view('admin/dekripsi', $data);
    }

    public function download()
    {
        $this->session->setFlashdata('success', 'data berhasil dekripsi');
        // return redirect()->to('download')->with('success', 'data berasil diupdate');
        // return view('admin/download');
        $file  = $_SESSION['download'];
        header("Refresh:1;");
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\"");
        header("Content-Type: application/force-download");
        header("Content-Length: " . filesize($file));
        header("Connection: close");
        readfile($file);
        unlink($file);
        unset($file);

        die;
    }
    public function show($id)
    {

        $data['title'] = 'Dekripsi File';
        $data['data'] = $this->dekripsiModel->getfile2($id);


        return view('admin/dekripsifile', $data);
    }


    public function decrypt_file()
    {

        $data = $this->request->getPost();
        // $id = $this->request->uri->getSegment(3);
        $id_file             = $this->request->getPost('idfile');
        $keyenkrip = 'cintapembodohan1';
        $enkripkey = new Aes($keyenkrip);
        $kunci            = $this->request->getPost('kunci');
        $cipherkey  = $enkripkey->encrypt($kunci);
        $finalkey =  base64_encode($cipherkey);

        $file_data_password = $this->dekripsiModel->getDataFileByPassword($id_file, $finalkey);
        // if ($q !== ) {
        // }
        // dd($file_data_password);
        if (!empty($file_data_password[0])) {

            $data       = $this->dekripsiModel->getfile2($id_file);
            $kunci        = $this->request->getPost('kunci');
            $file_path  = $data[0]->file_url;
            $file_name  = $data[0]->nama_file_awal;
            $file_name_akhir  = $data[0]->nama_file_akhir;
            $kuncilek  = $data[0]->kunci;
            $idlek  = $data[0]->kunci;
            $ambil_url = "file_enkripsi/$file_name_akhir";
            // dd($kuncilek, $finalkey);
            // if ($kuncilek !== $finalkey) {
            //     echo ("<script language='javascript'>
            //     window.alert('kinci salah.');
            //     window.location.href = 'deskripsi/show/'. $id_file;
            //     </script>");
            // }

            // dd($ambil_url);
            if (file_exists($ambil_url)) {

                $this->dekripsiModel->updateStatusFile($id_file);

                $fopen1     = fopen($ambil_url, "rb");

                $cache      = "$file_name";
                $fopen2     = fopen($cache, "wb");

                $file_size  = filesize($ambil_url);
                $mod        = $file_size % 16;
                $aes = new Aes($kunci);

                if ($mod == 0) {
                    $banyak = $file_size / 16;
                } else {
                    $banyak = ($file_size - $mod) / 16;
                    $banyak = $banyak + 1;
                }
                for ($bawah = 0; $bawah < $banyak; $bawah++) {

                    $filedata    = fread($fopen1, 16);
                    $plain       = $aes->decrypt($filedata);
                    fwrite($fopen2, $plain);
                }

                //write_file($fopen2, $plain);
                // $this->session["download"] = $cache;
                $_SESSION["download"] = $cache;

                echo ("<script language='javascript'>
                window.open('download', '');
                window.location.href='index';
                    
                  </script>
                  ");
            } else {
                $redirect_url = site_url('deskripsi/show/' . $id_file);
                echo ("<script language='javascript'>
                window.location.href = '$redirect_url' ;
                window.alert('Maaf, File tidak ditemukan.');
                </script>");
            }
        } else {
            $redirect_url = site_url('deskripsi/show/' . $id_file);
            echo ("<script language='javascript'>
            window.location.href = '$redirect_url' ;
            window.alert('Maaf, Password tidak sesuai.');
            
            </script>");
        }
    }
}
