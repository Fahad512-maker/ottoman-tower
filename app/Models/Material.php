<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Material extends Model
{
    use HasFactory;
    protected $guarded= [];
    public function materialorderof(){
        return $this->hasOne(Material_order::class);
    }
}
