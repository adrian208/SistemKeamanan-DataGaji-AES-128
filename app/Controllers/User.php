<?php

namespace App\Controllers;

use App\Models\LapanganModel;
use App\Models\JadwalModel;
use App\Models\BokingModel;
use App\Models\InvoiceModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use mysqli;
use TCPDF;

class User extends BaseController
{
    protected $db, $builder,  $userModel,  $session;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new UserModel();


        $this->session = session();
    }

    public function index()
    {
        return view('user/index');
    }


    public function updateusersir($username)
    {
        $getdataa = $this->userModel->getpengguna($username);

        if ($getdataa->phone == $this->request->getVar('phone')) {
            $this->session->setFlashdata('error', 'Anda belum edit data');
            return redirect()->back()->withInput();
        }

        $validate = $this->validate([
            // 'username' => [
            //     'rules' => 'required|alpha_numeric_punct|is_unique[users.username]|min_length[8]',
            //     'errors' => [
            //         'required' => 'Username harus di isi.',
            //         'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
            //         'is_unique' => 'Username sudah terpakai.',
            //         'min_length' => 'Username min 8 karakter.'
            //     ],
            // ],
            'phone' => [
                'rules' => 'required[users.phone]|min_length[11]|max_length[12]',
                'errors' => [
                    'required' => ' phone harus di isi.',
                    'min_length' => 'phone min 11 karakter',
                    'max_length' => 'phone min 12 karakter'
                ]
            ]


        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }

        $data = [

            'phone'    => $this->request->getVar('phone'),
        ];
        $this->builder->where(['username' => $username])->update($data);
        return redirect()->to('user/edituser/' . $username)->with('success', 'data berhasil diupdate');
    }
    public function updatepwd($username)
    {
        $getdataa = $this->userModel->getpengguna($username);
        $post = $this->request->getPost();
        $cekkk = password_verify($post['oldpassword'], $getdataa->password);

        $validate = $this->validate([
            'oldpassword' => [
                'rules' => 'required|alpha_numeric_punct|min_length[8]|max_length[200]',
                'errors' => [
                    'required' => ' password  harus di isi.',
                    'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
                    'min_length' => ' password  min 8 karakter',
                    'max_length' => ' password min 200 karakter'
                ],
            ],
            'brpassword' => [
                'rules' => 'required|alpha_numeric_punct|min_length[8]|max_length[200]',
                'errors' => [
                    'required' => ' password  harus di isi.',
                    'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
                    'min_length' => ' password  min 8 karakter',
                    'max_length' => ' password min 200 karakter'
                ],
            ],
            'cmpassword' => [
                'rules' => 'required|matches[brpassword]|alpha_numeric_punct|min_length[8]|max_length[200]',
                'errors' => [
                    'required' => ' password  harus di isi.',
                    'matches' => 'Password konfirmasi tidak sesuai dengan password baru',
                    'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
                    'min_length' => ' password  min 8 karakter',
                    'max_length' => ' password min 200 karakter'
                ]
            ]

        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }

        if ($cekkk != true && $this->request->getVar('oldpassword') == $this->request->getVar('cmpassword')) {
            $this->session->setFlashdata('error', 'Password saat ini salah');
            return redirect()->back()->withInput();
        }

        if ($cekkk == true && $this->request->getVar('oldpassword') != $this->request->getVar('cmpassword')) {
            $data = [

                'password'    => password_hash($this->request->getPost('cmpassword'), PASSWORD_DEFAULT),

            ];
            $this->builder->where(['username' => $username])->update($data);
            return redirect()->to('login/keluar')->with('success', 'data berhasil diupdate');
        } else {
            $this->session->setFlashdata('error', 'Password baru harus berbeda dengan password saat ini');

            return redirect()->back()->withInput();
        }
    }

    public function edirci($username)
    {
        $data['title'] = 'Edit';
        $data['users'] = $this->userModel->getpengguna($username);

        return view('user/edituser', $data);
    }
}
