<?php
namespace app\Controllers;


use CodeIgniter\Controller;
use App\Models\UserModel;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('user/register');
    }

    public function create()
    {
        $model = new UserModel();
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[8]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => 'user',
            ];
            
            $model->insert($data);
            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}