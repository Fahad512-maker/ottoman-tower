<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ChartAccount extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;
    
    public function account_type(){
        return $this->belongsTo(Accountstype::class,'account_type_id');
    }
    public function contractorof(){
        return $this->hasOne(ContractorPay::class);
    }

    public function supplierpay(){
        return $this->hasOne(SupplierPay::class);
    }
    
}
