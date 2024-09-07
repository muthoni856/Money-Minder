<?php

namespace App\Modules\Items\Controllers;

use App\Controllers\BaseController;
use App\Modules\Items\Models\Items;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Items\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Items;
    }

    public function index()
    {
        return self::render('index');
    }

    public function render(string $page): string
    {
        return view( $this->folder_directory . $page, $this->data);
    }
}