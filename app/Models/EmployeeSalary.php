<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class EmployeeSalary extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;

    public function employeeof(){
        return $this->BelongsTo(Employee::class,'employee_id');
    }
}
