<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    public function bookngof(){
        return $this->hasOne(Booking::class);
    }
}
