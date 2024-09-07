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

        $user=$model->getUserByUsername($username);

        if ($user){
            if (password_verify($password,$user['password'])){
                session()->set([
                    'user_id' => $user['id'],
                    'username' =>$user['username'],
                    'logged_in'=>true
                ]);
                return redirect()->to('/expense_tracker');
            } else {  
                return redirect()->back()->with('error', 'Invalid credentials');
            }
            }else{
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
