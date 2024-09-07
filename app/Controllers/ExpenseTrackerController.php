<?php

namespace app\Controllers;

use CodeIgniter\Controller;
use Modules\UserManagement\Models\ExpenseModel;

class ExpenseTrackerController extends Controller
{
    public function index()
    {
        $model=new ExpenseModel();
        $user_id=session()->get('user_id');
        $data['expenses']=$model->where('user_id',$user_id)->findAll();
        echo view('Modules\UserManagement\Views\expense_tracker',$data);
    }
    public function create()
    {
        $model=new ExpenseModel();
        $data=[
            'user_id'=>session()->get('user_id'),
            'date'=>$this->request->getPost('date'),
            'category'=>$this->request->getPost('category'),
            'amount'=>$this->request->getPost('amount'),
        ];
        if ($model->save(date)){
            return redirect()->to('/');
        }else{
            return redirect()->back()->with('errors', $model->errors());
        }
    }
public function delete($id)
{
    $model=new ExpenseModel();
    $model->delete($id);
    return redirect()->to('/');
}
}