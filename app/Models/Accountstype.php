<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accountstype extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;

    public function chartaccountof(){
        return $this->hasOne(ChartAccount::class);
    }
}
