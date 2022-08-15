<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];
    public function materialof(){
        return $this->hasOne(Material_order::class);
    }
    public function supplierpayof(){
        return $this->hasOne(SupplierPay::class);
    }
}
