<?php

namespace App\Modules\Blogs\Controllers;

use App\Controllers\BaseController;
use App\Modules\Blogs\Models\Blogs;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Blogs\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Blogs;
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