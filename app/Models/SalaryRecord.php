<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryRecord extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
public function employeeof(){

return $this->belongsTo(Employee::class,'employee_id');

}
}
