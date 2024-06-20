<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class Course extends Model
{
    use ModelTree;
    use HasFactory;
}
