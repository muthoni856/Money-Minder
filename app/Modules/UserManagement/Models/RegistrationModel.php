<?php
namespace Modules\UserManagement\Models;

use CodeIgniter\Model;
class RegistrationModel extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    protected $allowedFields=['username','email','password','role'];

    protected $useTimestamps=true;
    protected $createField='created_at';
    protected $updatedField='updated_at';
//Validation rules
protected $validationRules=[
    'username'=>'required|min_length[3]|max_length[20]|is_unique[users.username]',
    'email'=>'required|valid_email',
    'password'=>'required|min_length[6]|max_length[255]',
    'role'=>'required'
];
protected $validationMessages=[
    'username'=>[
    'username'=>'Username is required',
    'is_unique'=>'Username already exists, try again'

],
'email' => [
    'required'=>'Email is required.',
    'valid_email'=>'Enter a valid email address e.g johndoe@example.com'
],
'password'=>[
    'required'=>'Password is required',
    'min_length'=>'Password must be at least 6 characters long'
],
];

//Hashing the password before saving for protection
protected function beforeInsert(array $data)
{
    if (isset($data['data']['password'])){
        $data['data']['password']=password_hash($data['data']['password'],PASSWORD_DEFAULT);
    }
    return $data;
}

}