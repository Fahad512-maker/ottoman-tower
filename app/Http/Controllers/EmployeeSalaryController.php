<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\Main_head;
use App\Models\SalaryRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;


class EmployeeSalaryController extends Controller
{
    public function index(){
        
        $data=['page_title'=> 'Employees Salaries','employeesalary'=> EmployeeSalary::all()];
        return view('employees.salaries.index',$data);
    }
    public function create(){

        // $data=['page_title'=> 'Add Salary','employee'=> Employee::all()];
        // return view('employees.salaries.create',$data);
    }
    public function update_paid_status(Request $request){
    
     $empsal =  EmployeeSalary::WhereIn('employee_id',$request->employee_id)->get();

     foreach($empsal as $sta){
        $staus = $sta->status;
    }
    

     foreach($empsal as $value ){

        if($empsal != null && $staus==0){
    
            $emp_id =  $value->employee_id;
            $emp = Employee::find($emp_id);
            $remaining = $emp->remaining;
            $salary = $emp->salary;
            $acc_type = $emp->account_type;
            $emp_advance = $emp->advance;
            // $remaining = $salary - $emp_advance;
            $chart = ChartAccount::find($acc_type);
          if($remaining == null){

            $chart->account_payable = ($chart->account_payable) - ($salary);
            $chart->paid = ($chart->paid) + ($salary);
            $chart->update();
            $main=Main_head::find(1);
            $main->remaining_funds=($main->remaining_funds) - ($salary);
            $main->update(); 
           
            EmployeeSalary::Where('employee_id',$emp_id)->update([
                'status' => 1,
                'created_at' =>Carbon::now(),
        
             ]);
             SalaryRecord::create([

                'employee_id' => $emp_id,
                'salary' => $salary
             ]);

           
          }
          else{

            // return $remaining . "lya hai";

            $chart->account_payable = ($chart->account_payable) - ($remaining);
            $chart->paid = ($chart->paid) + ($remaining);
            $chart->update();
            $main=Main_head::find(1);
            $main->remaining_funds=($main->remaining_funds) - ($remaining);
            $main->update(); 
           
            EmployeeSalary::Where('employee_id',$emp_id)->update([
                'status' => 1,
                'created_at' =>Carbon::now(),
        
             ]);
             SalaryRecord::create([

                'employee_id' => $emp_id,
                'salary' => $remaining
             ]);
           $adv_emp = Employee::find($emp_id);
            $adv_emp->advance = null;
            $adv_emp->remaining =  null;
            $adv_emp->update();
          }




            // if($remaining != null){
            // $chart->account_payable = ($chart->account_payable) - ($remaining);
            // $chart->paid = ($chart->paid) + ($remaining);
            // $chart->update();

            // $main=Main_head::find(1);
            // $main->remaining_funds=($main->remaining_funds) - ($remaining);
            // $main->update(); 
           
            // EmployeeSalary::Where('employee_id',$emp_id)->update([
            //     'status' => 1,
            //     'created_at' =>Carbon::now(),
            //  ]);
            //  SalaryRecord::create([

            //     'employee_id' => $emp_id,
            //     'salary' => $remaining
            //  ]);

            // $adv_emp = Employee::find($emp_id);
            // $adv_emp->advance = null;
            // $adv_emp->remaining =  null;
            // $adv_emp->update();

            // }
           
        }

        else{

            return back()->with('success','already exist');
        }
        
     }

     return redirect('/manage/employee_salary')->with('success','Paid Successfully');
     
    }
    public function store_advance(Request $request){

        $advance = $request->advance;
        $employee_id = $request->employee_id;
        $employee_salary = $request->employee_salary;
        $remaining = $employee_salary - $advance; 

        if($advance <= $employee_salary){
            
            $employee = Employee::find($employee_id);
            $employee->advance = $advance;
            $employee->remaining = $remaining;
            $employee->update();

            SalaryRecord::create([
                'employee_id' => $employee_id,
                'salary' => $advance,
            ]);

            $chart = ChartAccount::find(6);
            $chart->account_payable = ($chart->account_payable) - ($advance) ;
            $chart->paid = ($chart->paid) + ($advance) ;
            $chart->update();

            $main = Main_head::find(1);
            $main->remaining_funds = ($main->remaining_funds) - ($advance);
            $main->update();

            return back()->with('success','You Released Advance Salary '. $advance );
        }
        else{

            return back()->with('success','You Entered Amount Greater Than '. $employee_salary );

        }

    }
    public function salary_record(){
        // $salary = SalaryRecord::all();
        $data=['page_title'=> 'Employees Salaries','salary'=> SalaryRecord::all()];
        return view('employees.salary_record',$data);
        
    }
}
