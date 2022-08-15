<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;

    public function contractorpayof(){
        return $this->hasOne(ContractorPay::class);
    }
    public function materialorderof(){
        return $this->hasOne(Material_order::class);
    }
    public function supplierpayof(){
        return $this->hasOne(SupplierPay::class);
    }
    public function employeeof(){
        return $this->hasOne(Employee::class);
    }

}
