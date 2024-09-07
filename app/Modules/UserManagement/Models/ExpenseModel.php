<?php
namespace Modules\UserManagement\Models;

use CodeIgniter\Model;
class ExpenseModel extends Model
 {
    protected $table ='expenses';
    protected $primaryKey ='id';
//Validation Rules

    protected $allowedFields =['user_id','date','category','amount'];
    protected $validationRules=[
        'date'=>'required|valid_date',
        'category'=>'required',
        'amount'=>'required|numeric'
    ];
    protected $validationMessages=[
        'date'=>[
            'required'=>'Date is required',
            'valid_date'=>'Please enter a valid date'
        
        ],
        'category'=>[
            'required'=>'Category is needed'
        ],
        'amount'=>[
            'required'=>'Amount is needed',
            'numeric'=>'Amount must be a number'
        ]
        ];
 }