<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Material_order extends Model
{
    use HasFactory;
    protected $guarded =[];
    use SoftDeletes;
    public function supplierof(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function materialof(){
        return $this->belongsTo(Material::class,'material_id');
    }
    public function projectof(){
        return $this->belongsTo(Project::class,'project_id');
    }

}
