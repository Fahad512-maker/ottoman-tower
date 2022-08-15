<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SupplierPay extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    
    public function supplierof(){

        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function projectof(){

        return $this->belongsTo(Project::class,'project_id');
    }
    public function account(){

        return $this->belongsTo(ChartAccount::class,'account_type');
    }

}
