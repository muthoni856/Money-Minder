<?php
namespace app\Controllers;


use CodeIgniter\Controller;
use Modules\UserManagement\Models\RegistrationModel;

class RegistrationController extends \CodeIgniter\Controller
{
    public function register()
    {
        echo view('Modules\UserManagement\Views\registrationView');
    }

    public function create()
    {
        $model = new RegistrationModel();
        
                $email = $this->request->getPost('email');
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                //Dteremine the role based on email domain
                $role = (strpos($email,'@moneyminder.com')!==false)?'admin':'user';
     
                $data = [
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                    'role' => $role,
                ];

        log_message('debug', 'Received data: ' . print_r($data, true));
        if (!$this->validate($model->getValidationRules())) {
            log_message('debug', 'Validation errors: ' . print_r($this->validator->getErrors(), true));      
            echo view('Modules\UserManagement\Views\registrationView',[
                'validation'=>$this->validator
            ]);
            return;

        }
        if ($model->save($data)) {
            log_message('debug', 'Data successfully saved to the database.');
            echo view('Modules\UserManagement\Views\loginView',[
                'success' => 'Registration successful! Please log in.'
            ]);
            
        } else {
            log_message('debug', 'Model errors: ' . print_r($model->errors(), true));
            echo view('Modules\UserManagement\Views\registrationView',[
                'validation' => $model->errors()
            ]);
    }
}
}