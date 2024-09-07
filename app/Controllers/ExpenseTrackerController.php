<?php

namespace app\Controllers;

use CodeIgniter\Controller;

class ExpenseTrackerController extends Controller
{
    public function index()
    {
        // Load the view
        return view('Modules\UserManagement\Views\expense_tracker');
    }
}
