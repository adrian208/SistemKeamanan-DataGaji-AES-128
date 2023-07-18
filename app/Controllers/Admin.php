<?php


namespace App\Controllers;

include "Aes.php";

use App\Models\DekripsiModel;
use App\Models\LapanganModel;
use App\Models\JadwalModel;
use App\Models\Enkripsi_Model;
use App\Models\InvoiceModel;
use App\Models\UserModel;
use TCPDF;

class Admin extends BaseController
{

    protected $db, $builder, $enkripModel, $dekripsiModel, $userModel, $Enkripsi_Model, $invoiceModel, $file, $jadwl, $lapgn, $bokg, $dompdf, $aes, $session;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->dekripsiModel = new DekripsiModel();
        // $this->enkripModel = new AesModel();
        $this->userModel = new UserModel();
        $this->Enkripsi_Model = new Enkripsi_Model();
        $this->file = $this->db->table('file');
        $this->session = session();
    }


    public function dashboard()
    {
        $data['title'] = 'Admin - Centro';
        $data['tot'] = $this->userModel->dtotpengguna();
        $data['toten'] = $this->userModel->dtotenkrip();
        $data['totdek'] = $this->userModel->dtotdekrip();

        return view('admin/testt', $data);
    }
    public function index()
    {
        $data['title'] = 'Admin - Centro';

        $this->builder->select('users.username , username, phone, job_title');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function enkripsi()
    {
        $data = [
            'title' => 'enkripsi',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/enkripsi', $data);
    }

    public function bantuan()
    {

        $data = [
            'title' => 'Bantuan',
        ];

        return view('admin/bantuan', $data);
    }

    public function savefile()
    {
        //validasi input
        //validasi input
        $validate = $this->validate([
            'fileup' => [
                'rules' => 'uploaded[fileup]|is_unique[file.nama_file_awal]|max_size[fileup,3048]|ext_in[fileup,doc,docx,pdf,xls,xlsx,word]',
                'errors' => [
                    'uploaded' => 'File harus di isi.',
                    'is_unique' => 'File sudah terenkripsi.',
                    'max_size' => 'Maksimal size file 3048.',
                    'ext_in' => 'Format dokumen tidak sesuai untuk dienkripsi.'
                ],
            ],
            'kunci' => [
                'rules' => 'required|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => ' kunci harus di isi.',
                    'max_length' => 'kunci harus 16 karakter',
                    'min_length' => 'kunci harus 16 karakter'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => ' keterangan harus di isi.',
                    'min_length' => ' keterangan min 10 karakter'
                ]
            ]
        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }

        if ($validate == TRUE) {
            //ambil gambar
            $fileSampul = $this->request->getFile('fileup');;
            $sizefile = $fileSampul->getSize();
            // $config['file_name']            = $finalFileRda;
            // $filerda = rename($fileSampul, $namafilerda);
            $keterangan  = $this->request->getVar('keterangan');
            $username  = $this->request->getVar('username');
            $status  = 'E';

            $keyenkrip = 'cintapembodohan1';
            $enkripkey = new Aes($keyenkrip);
            $kunci  = $this->request->getVar('kunci');
            // $keysiap = ;
            $cipherkey  = $enkripkey->encrypt($kunci);
            $finalkey =  base64_encode($cipherkey);

            $uploads_dir = 'file_enkripsi/';
            $upload_asli = 'file';
            $file_tmpname       = $_FILES['fileup']['tmp_name'];
            //nama file url
            $file               = $_FILES['fileup']['name'];
            $new_file_name      = ($file);
            $final_file         = str_replace(' ', '-', $new_file_name);
            //untuk nama file
            $filename           = pathinfo($_FILES['fileup']['name'], PATHINFO_FILENAME);
            $new_filename       = ($filename);
            $finalfile          = str_replace(' ', '-', $new_filename);
            $size               = filesize($file_tmpname);
            $size2              = (filesize($file_tmpname)) / 1024;
            $info               = pathinfo($final_file);
            $file_source        = fopen($file_tmpname, 'rb');
            $ext                = $info["extension"];

            $config['upload_path']          = 'file_enkripsi/';
            // $tempat = ('file_enkripsi/');
            // $tempat = $final_file . '.rda';



            // $url   = $finalfile . ".rda";
            $url   = $finalfile . ".rda";
            // $url   = $finalfile;
            $file_url = "file_enkripsi/$url";

            $file_url_upload = './file_enkripsi/';

            $check_namafile_terencrypt = $file_url_upload . $url; // Check File Ter Encrypt 

            // Jika Nama.extension file belum pernah diencrypt
            if (file_exists($check_namafile_terencrypt)) {
                echo ("<script language='javascript'>
				window.location.href='index';
				window.alert('Maaf, file ini sudah terenkripsi.');
				</script>");
                exit();
            }
            // Insert Data to DB
            $this->Enkripsi_Model->insertEncryptData($username, $final_file, $finalfile, $size2, $finalkey,  $keterangan);

            // Select Data

            $this->Enkripsi_Model->selectEncryptData($final_file);
            // Update Data to DB
            $urlenkrip = 'cintapembodohan1';
            $enkripurl = new Aes($urlenkrip);
            $cipherurl  = $enkripurl->encrypt($file_url);
            $finalurl =  base64_encode($cipherurl);

            $this->Enkripsi_Model->updateEncryptData($finalurl);
            $file_output  = fopen($file_url, 'wb');

            $mod    = $size % 16;
            if ($mod == 0) {
                $banyak = $size / 16;
            } else {
                $banyak = ($size - $mod) / 16;
                $banyak = $banyak + 1;
            }

            if (is_uploaded_file($file_tmpname)) {
                ini_set('max_execution_time', -1);
                ini_set('memory_limit', -1);
                $aes = new Aes($kunci);

                for ($bawah = 0; $bawah < $banyak; $bawah++) {
                    $data    = fread($file_source, 16);
                    $cipher  = $aes->encrypt($data);
                    fwrite($file_output, $cipher);
                }
                fclose($file_source);
                fclose($file_output);
                $this->session->setFlashdata('success', 'data berhasil di enkripsi');

                echo ("<script language='javascript'>
          window.location.href='index';
          window.alert('Enkripsi Berhasil..');
          </script>");
            } else {
                echo ("<script language='javascript'>
				window.location.href='enkripsi';
				window.alert('Encrypt file mengalami masalah..');
				</script>");
                exit();
            }
        } else {
            echo ("<script language='javascript'>
				window.location.href='enkripsi';
				window.alert('Tolong dicek kembali!');
				</script>");
            exit();
        }

        // $dataE['enkripsi'] = $data;
        // $dataE['title'] = 'Hasil enkripsi';

        // return view('admin/hasil', $dataE);
    }
    public function edituser($username)
    {
        $data['title'] = 'Edit';
        $data['users'] = $this->userModel->getpengguna($username);
        // dd($data);

        return view('/admin/detail', $data);
    }
    public function updateuser($username)
    {
        $getdataa = $this->userModel->getpengguna($username);

        if ($getdataa->username == $this->request->getVar('username') && $getdataa->phone == $this->request->getVar('phone') && $getdataa->job_title == $this->request->getVar('job_title')) {
            $this->session->setFlashdata('error', 'anda belum edit data');
            return redirect()->back()->withInput();
        }

        $validate = $this->validate([

            'phone' => [
                'rules' => 'required[users.phone]|min_length[11]|max_length[12]',
                'errors' => [
                    'required' => ' phone harus di isi.',
                    'min_length' => 'phone min 11 karakter',
                    'max_length' => 'phone min 12 karakter'
                ],
            ],

            'job_title' => [
                'rules' => 'required|min_length[3]|max_length[6]',
                'errors' => [
                    'required' => ' job_title harus di isi.',
                    'min_length' => ' job_title min 3 karakter',
                    'max_length' => ' job_title min 200 karakter'
                ]
            ]
        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }

        if ($username == session()->username) {
            if ($getdataa->phone != $this->request->getVar('phone') && $getdataa->job_title != $this->request->getVar('job_title')) {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('login/keluar')->with('success', 'data berasil diupdate');
            }

            if ($getdataa->phone != $this->request->getVar('phone')) {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('admin/index')->with('success', 'data berhasil diupdate');
            } else {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    // 'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('login/keluar')->with('success', 'data berhasil diupdate');
            }
        }

        if ($username != session()->username) {
            if ($getdataa->phone != $this->request->getVar('phone') && $getdataa->job_title != $this->request->getVar('job_title')) {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('admin/index')->with('success', 'data berasil diupdate');
            }

            if ($getdataa->phone != $this->request->getVar('phone')) {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('admin/index')->with('success', 'data berasil diupdate');
            } else {
                $data = [
                    // 'username'     => $this->request->getVar('username'),
                    // 'phone'    => $this->request->getVar('phone'),
                    // 'password' => $setpassdata,
                    'job_title'    => $this->request->getVar('job_title'),
                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('admin/index')->with('success', 'data berasil diupdate');
            }
        }
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

        if ($username == session()->username) {
            if ($cekkk == false) {
                $this->session->setFlashdata('error', 'Password saat ini salah');
                return redirect()->back()->withInput();
            }

            if ($cekkk == true && $this->request->getVar('oldpassword') != $this->request->getVar('cmpassword')) {
                $data = [

                    'password'    => password_hash($this->request->getPost('cmpassword'), PASSWORD_DEFAULT),

                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('login/keluar')->with('success', 'data berasil diupdate');
            } else {
                $this->session->setFlashdata('error', 'Password baru harus berbeda dengan password saat ini');

                return redirect()->back()->withInput();
            }
        }

        if ($username != session()->username) {
            if ($cekkk == false) {
                $this->session->setFlashdata('error', 'Password saat ini salah');
                return redirect()->back()->withInput();
            }
            if ($cekkk == true && $this->request->getVar('oldpassword') != $this->request->getVar('cmpassword')) {
                $data = [

                    'password'    => password_hash($this->request->getPost('cmpassword'), PASSWORD_DEFAULT),

                ];
                $this->builder->where(['username' => $username])->update($data);
                return redirect()->to('admin/index')->with('success', 'data berasil diupdate');
            } else {
                $this->session->setFlashdata('error', 'Password baru harus berbeda dengan password saat ini');

                return redirect()->back()->withInput();
            }
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->lapgn->getWhere(['kdLap' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['title'] = 'Edit';
                $data['lapangan'] = $query->getRow();
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('/admin/edit', $data);
    }
    public function update($id)
    {
        $validate = $this->validate([
            'noLap' => [
                'rules' => 'required[lapangan.noLap]',
                'errors' => [
                    'required' => ' No lapangan harus di isi.',
                ],
            ],
            'gambarLap' => [
                'rules' => 'required[lapangan.gambarLap]',
                'errors' => [
                    'required' => ' gambar lapangan harus di isi.',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => ' deskripsi harus di isi.',
                    'min_length' => ' deskripsi min 10 karakter'
                ]
            ]
        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }
        // $data = $this->request->getPost();
        // unset($data['_method']);
        $data = [
            'noLap' => $this->request->getVar('noLap'),
            'gambarLap'  => $this->request->getVar('gambarLap'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
        ];
        $this->lapgn->where(['kdLap' => $id])->update($data);

        return redirect()->to('admin/lapangan')->with('success', 'data berasil diupdate');
    }

    public function delete($username)
    {
        $this->userModel->delete($username);

        return redirect()->to('/admin/index')->with('success', 'data berhasil dihapus');
    }
    public function deletedek($id)
    {

        $this->file->select('file.id_file, nama_file_akhir');
        $this->file->where('file.id_file', $id);
        $query = $this->file->get()->getRow();
        $file_name_akhir  = $query->nama_file_akhir;
        // dd($file_name_akhir);
        // $liatfile['file']= $query->getResult();
        // $query = $this->file->getWhere(['nama_file_akhir' => $id]);
        // unlink('img/' . $this->request->getVar('gambarLama'));
        chmod("file_enkripsi/$file_name_akhir", 0777);
        unlink("file_enkripsi/$file_name_akhir");
        $this->dekripsiModel->delete($id);

        return redirect()->to('/dekripsi/index')->with('success', 'data berhasil dihapus');
    }


    public function tuser()
    {

        $data = [
            'title' => 'Tambah-User',
            'validation' => \Config\Services::validation()
        ];


        return view('admin/tuser', $data);
    }

    public function saveuser()
    {
        //validasi input
        $validate = $this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric_punct|is_unique[users.username]|min_length[8]',
                'errors' => [
                    'required' => 'Username harus di isi.',
                    'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
                    'is_unique' => 'Username sudah terpakai.',
                    'min_length' => 'Username min 8 karakter.'
                ],
            ],
            'phone' => [
                'rules' => 'required[users.phone]|min_length[11]|max_length[12]',
                'errors' => [
                    'required' => ' phone harus di isi.',
                    'min_length' => 'phone min 11 karakter',
                    'max_length' => 'phone min 12 karakter'
                ],
            ],
            'password' => [
                'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => ' password  harus di isi.',
                    'alpha_numeric_punct' => 'Karakter selain huruf dan angka tidak boleh.',
                    'min_length' => ' password  min 3 karakter',
                    'max_length' => ' password min 200 karakter'
                ],
            ],
            'job_title' => [
                'rules' => 'required|min_length[3]|max_length[6]',
                'errors' => [
                    'required' => ' job_title harus di isi.',
                    'min_length' => ' job_title min 3 karakter',
                    'max_length' => ' job_title min 200 karakter'
                ]
            ]
        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }


        $data = [
            'username'     => $this->request->getVar('username'),
            'phone'    => $this->request->getVar('phone'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'job_title'    => $this->request->getVar('job_title'),
        ];

        $this->userModel->insert($data);

        return redirect()->to('admin/tuser')->with('success', 'data berhasil ditambahkan');
        // return view('admin/tlapangan', $data);
    }
    public function editjad($id = 0)
    {
        if ($id != null) {
            $query = $this->jadwl->getWhere(['kdJadwal' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['title'] = 'Edit jadwal';
                $data['jadwal'] = $query->getRow();
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // $data = [
        //     'title' => 'From Edit Lapangan',
        //     'lapangan' => $this->lapanganModel->getlapangan($id)
        // ];
        return view('/admin/editjad', $data);
    }

    public function updatejad($id)
    {
        $validate = $this->validate([
            'kdLap' => [
                'rules' => 'required[jadwal.kdLap]',
                'errors' => [
                    'required' => ' No lapangan harus di isi.',
                    //'is_unique' => ' No lapangan sudah terdaftar'
                ],
            ],
            'jamBo' => [
                'rules' => 'required[jadwal.jamBo]',
                'errors' => [
                    'required' => ' jam lapangan harus di isi.',
                    //'is_unique' => ' No lapangan sudah terdaftar'
                ],
            ],
            'harga' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => ' deskripsi harus di isi.',
                    'min_length' => ' deskripsi min 5 karakter'
                ]
            ]
        ]);
        if (!$validate) {

            return redirect()->back()->withInput();
        }
        // $data = $this->request->getPost();
        // unset($data['_method']);
        $data = [
            'tglJadwal' => $this->request->getVar('tglJadwal'),
            'kdLap' => $this->request->getVar('kdLap'),
            'jamBo'  => $this->request->getVar('jamBo'),
            'harga'  => $this->request->getVar('harga'),
        ];
        $this->jadwl->where(['kdJadwal' => $id])->update($data);

        return redirect()->to('admin/jadwal')->with('success', 'data berasil diupdate');
    }
}
