<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    protected $guarded =[];
    use SoftDeletes;
    public function projectof(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function attendanceof(){

        return $this->hasOne(EmpAttendance::class);
    }
    public function employeesalaryof(){
        return $this->hasOne(EmployeeSalary::class);
    }
    public function salaryrecordof(){
        return $this->hasOne(SalaryRecord::class);
    }
}
