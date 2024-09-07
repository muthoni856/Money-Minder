<?php

namespace App\Modules\Blogs\Models;

use CodeIgniter\Model;

class Blogs extends Model
{
    protected $table            = 'st_blogs';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [];
}