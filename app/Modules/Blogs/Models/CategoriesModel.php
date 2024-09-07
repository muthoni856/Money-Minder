<?php

namespace Modules\Blogs\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table            = 'st_categories';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [];
}