<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contractor extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;
    
    public function contractorpayment(){
        return $this->hasOne(ContractorPay::class);

    }
}
