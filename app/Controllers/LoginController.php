<?php
namespace app\Controllers;
use App\Controllers\BaseController;
use Modules\UserManagement\Models\LoginModel;

class LoginController extends BaseController
{
    public function login(){
        echo view('Modules\UserManagement\Views\LoginView');
    }
    public function authenticate()
    {
        $model=new LoginModel();
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
log_message('debug','Login attempt with username: ' . $username);
        $user=$model->getUserByUsername($username);
        log_message('debug', 'User fetched: ' . print_r($user, true));
        if ($user){
            if (password_verify($password,$user['password'])){
                session()->set([
                    'user_id' => $user['id'],
                    'username' =>$user['username'],
                    
                ]);
                log_message('debug', 'User logged in successfully');
                return redirect()->to('/');
            } else {  
                log_message('debug', 'Invalid credentials: Password mismatch');
                return redirect()->back()->with('error', 'Invalid credentials');
            }
            }else{
                log_message('debug', 'Invalid credentials: User not found');
                return redirect()->back()->with('error', 'Invalid credentials');
            } 
            }
            public function logout()
    {
        // Destroy the session
        session()->destroy();
        return redirect()->to('/login');
        }
    }
