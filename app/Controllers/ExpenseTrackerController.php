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
        //$user_id = session()->get('user_id');
        $data=[
            'user_id'=>session()->get('user_id'),
            'date'=>$this->request->getPost('date')[0],
            'category'=>$this->request->getPost('category')[0],
            'amount'=>$this->request->getPost('amount')[0],
        ];
        if ($model->save($data)){
            return redirect()->to('/')->with('success', 'Expense added successfully!');
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
public function report()
{
    $model = new ExpenseModel();
    $user_id = session()->get('user_id');

    // Get total expenses per category
    $data['expense_report'] = $model->select('category, SUM(amount) as total')
        ->where('user_id', $user_id)
        ->groupBy('category')
        ->findAll();

    echo view('Modules\UserManagement\Views\expense_report', $data);
}
}