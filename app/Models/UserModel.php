<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $editu;
    protected $file;
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $useTimestamps = true;
    protected $useSoftDeletess = true;
    protected $returnType     = 'object';
    protected $allowedFields = ['username', 'phone', 'password', 'job_title', 'level'];
    public function __construct()
    {
        parent::__construct();
        // $this->db      = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->editu = $this->db->table('users');
        $this->file = $this->db->table('file');
        // $this->builder = $this->db->table('users');
        // $this->file = $this->db->table('file');
    }

    // public function getlapangan($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $id])->first();
    // }
    public function getpengguna($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }
    public function dtotpengguna()
    {
        $this->editu->select('*');


        $query = $this->editu->countAll();
        return $query;
    }
    public function dtotenkrip()
    {

        // $where = "'E' ";
        // $this->file->select('*');
        // $query = $db->query('SELECT * FROM my_table');
        $query = $this->db->query("SELECT * FROM file WHERE status = 'E'")->getNumRows();
        // $this->file->where('status =', $where);
        // $query = $this->file->getRow();
        return $query;
    }
    public function dtotdekrip()
    {

        // $where = "'E' ";
        // $this->file->select('*');
        // $query = $db->query('SELECT * FROM my_table');
        $query = $this->db->query("SELECT * FROM file WHERE status = 'D'")->getNumRows();
        // $this->file->where('status =', $where);
        // $query = $this->file->getRow();
        return $query;
    }
    public function edit($post)
    {
        $params['username'] = $post['username'];
        $params['fullname'] = $post['fullname'];
        if (!empty($post['password'])) {
            $params['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }
        $params['job_title'] = $post['jobtitle'];
        $params['level'] = $post['level'];

        $this->editu->where('username', $post['username']);
        $this->editu->update($params);
    }
    public function getBokingByUser($username)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table($this->table);
        $builder->select('users.username ,  username, phone, job_title,level');
        $builder->where(['username' => $username]);

        return $builder->get()->getRow();
    }
}
