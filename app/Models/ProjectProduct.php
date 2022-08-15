<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
}
