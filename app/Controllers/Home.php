<?php

namespace App\Controllers;

use App\Models\BokingModel;
use App\Models\LapanganModel;
use App\Models\JadwalModel;

class Home extends BaseController
{
    protected $db, $lapanganModel, $lapgn, $booking;

    public function __construct()
    {
        // $this->db = \Config\Database::connect();
        $this->lapanganModel = new LapanganModel();

        // $this->jadwalModel = new JadwalModel();
        // $this->lapgn = $this->db->table('lapangan');
        // $this->bokg = $this->db->table('boking');
        // $this->jadwl = $this->db->table('jadwal');
        // $this->builder = $this->db->table('users');
    }

    public function index()
    {
        if (session('username')) {
            return redirect()->to(site_url('admin/dashboard'));
        }
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function user()
    {
        return view('user/index');
    }
    public function boking()
    {
        // $lapangan = $this->lapanganModel;
        // $query   = $this->lapgn->get();

        // $data = $lapangan->getResult();
        // $lapangan = $this->lapanganModel->select('noLap,gambarLap, deskripsi');
        // $data['lapangan'] = $lapangan;

        // if (empty($data['lapangan'])) {
        //     return redirect()->to('/user/boking');
        // }
        // ;

        // $lapangan = $this->lapanganModel->findAll();
        $lapangan = $this->lapanganModel->listAll();
        // echo "<pre>";
        // print_r($lapangan);
        // echo "</pre>";
        // die;
        $data['lapangan'] = $lapangan;
        return view('user/boking', $data);
    }
}
