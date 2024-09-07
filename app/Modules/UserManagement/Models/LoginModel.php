<?php
namespace Modules\UserManagement\Models;

use CodeIgniter\Model;

class LoginModel extends Model 
{
    protected $table='users';
    protected $primaryKey='id';
    protected $allowedFields=['username','email','password','role','created_at','updated_at'];

    public function getUsername($username)
    {
        return $this->where('username',$username)->first();
    }
}