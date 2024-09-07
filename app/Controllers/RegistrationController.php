<?php
namespace app\Controllers;


use CodeIgniter\Controller;
use Modules\UserManagement\Models\RegistrationModel;

class RegistrationController extends Controller
{
    public function register()
    {
        echo view('Modules\UserManagement\Views\registrationView');
    }

    public function create()
    {
        $model = new RegistrationModel();
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role' => $this->request->getPost('user'),
        ];

        if ($model->save($data)){
            return redirect()->to('/login');
        }else{
            return view('Modules/UserManagement/Views/registrationView',[
                'validation'=>$model->errors()
            ]);

        }
    }
}