<?php

namespace App\Controllers;

use App\Models\LapanganModel;
use App\Models\JadwalModel;
use App\Models\BokingModel;
use App\Models\InvoiceModel;
use App\Models\TransaksiModel;
use mysqli;
use TCPDF;

class Login extends BaseController
{
    protected $db, $userya,  $session;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();

        $this->userya = $this->db->table('users');
        $this->session = session();
    }
    public function loginproses()
    {
        $post = $this->request->getPost();
        $query = $this->userya->getWhere(['username' => $post['username']]);
        $users = $query->getRow();

        if ($users) {
            if (password_verify($post['password'], $users->password)) {
                $params = [
                    // 'user_id' => $users->id,
                    'username' => $users->username,
                    'job_title' => $users->job_title


                ];

                session()->set($params);
                return redirect()->to(site_url('admin/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'username tidak ditemukan');
        }
    }
    public function keluar()
    {
        if (!empty(session()->getFlashdata())) {
            $this->session->setFlashdata('success', 'data berasil diupdate');
            session()->remove('username');
        };
        session()->remove('username');
        return redirect()->to(base_url('home/index'));
    }
}
