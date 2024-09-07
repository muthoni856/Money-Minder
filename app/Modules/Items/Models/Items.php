<?php

namespace App\Modules\Items\Models;

use CodeIgniter\Model;

class Items extends Model
{
    protected $table            = 'st_Items';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [];
}