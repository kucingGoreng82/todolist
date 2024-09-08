<?php namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table = 'login';
    protected $allowedFields = ['username', 'password'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
