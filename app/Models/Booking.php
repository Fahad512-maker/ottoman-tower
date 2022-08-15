<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    public function clientof(){
        return $this->belongsTo(Client::class,'applicant');
    }
}
