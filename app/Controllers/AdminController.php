<?php

namespace app\Controllers;

use CodeIgniter\Controller;
use Modules\UserManagement\Models\UserModel;

class AdminController extends Controller
{
    public function admin()
    {
        
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied.');
        }

        $model = new UserModel();
        $data['users'] = $model->findAll(); 

        echo view('Modules\UserManagement\Views\admin_user_management', $data);
    }

    public function delete($id)
    {
        
        if (session()->get('role') !== 'admin') {
            echo "Role is not admin";
            return redirect()->to('/')->with('error', 'Access denied.');
        }

        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/admin')->with('success', 'User deleted successfully.');
    }
}
