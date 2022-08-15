<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContractorPay extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;

    public function projectof(){
        return $this->belongsTo(Project::class,'project_id');
    }
    
    public function contractorof(){
        return $this->belongsTo(Contractor::class,'contractor_id');
    }
    public function accountstype(){
        return $this->belongsTo(ChartAccount::class,'account_type');
    }
}
