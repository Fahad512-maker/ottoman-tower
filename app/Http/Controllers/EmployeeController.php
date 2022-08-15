<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Project;
use App\Models\EmpAttendance;
use App\Models\EmployeeSalary;
use App\Models\SalaryRecord;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index(){
        $data=['page_title' => 'Employees','employee' => Employee::all()];
        return view('employees.index',$data);
    }
    public function create(){
        $data=['page_title' => 'Add Employee','project'=>Project::all(),'chartaccount'=>ChartAccount::all()];
        return view('employees.create',$data);
    }
    public function view($id){
        $emp = Employee::find($id);
        $data=['page_title' => 'Employee','project'=>Project::all(),'employee'=> $emp];
        return view('employees/view',$data);
    }
    public function store(Request $request){
        $request->account_type = 6;
    
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'cnic' => 'required|numeric',
            'contact' => 'required|numeric',
            'address' => 'required',
            'salary' => 'required',
            'designation' => 'required',
            
            

        ]);

        $emp = Employee::create([
            'name' => $request->name,
            'fname' => $request->fname,
            'cnic' => $request->cnic,
            'contact' => $request->contact,
            'address' => $request->address,
            'salary' => $request->salary,
            'designation' => $request->designation,
            'account_type' => $request->account_type,
        ]);
        EmployeeSalary::create([
            'employee_id' => $emp->id,
            'status' => 0
        ]);

        $chart = ChartAccount::find($request->account_type);
        $chart->account_payable = ($chart->account_payable) + $request->salary;
        $chart->update();  
        
        return redirect('/manage/employee')->with('success','Add Employee Successfully');
    }
    public function edit($id)
    {
        $data =['page_title'=> 'Edit Employee','employee'=> Employee::find($id),'chartaccount'=>ChartAccount::all()];
        return view('employees.edit',$data);
    }
    public function update($id,Request $request){
        $request->account_type = 6;
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'cnic' => 'required|numeric',
            'contact' => 'required|numeric',
            'address' => 'required',
            'salary' => 'required',
            'account_type' => 'required',
            'designation' => 'required',
            
            
       
        ]);
        
        $employ = Employee::find($id);
        $salary = $employ->salary;
        $acctype = $employ->account_type;

        $chart = ChartAccount::find($acctype);
        $chart->account_payable = ($chart->account_payable) - ($salary);
        $chart->update();


        $emp=Employee::find($id);
        $emp->name = $request->name;
        $emp->fname = $request->fname;
        $emp->cnic = $request->cnic;
        $emp->contact = $request->contact;
        $emp->address = $request->address;
        $emp->salary = $request->salary;
        $emp->account_type = $request->account_type;
        $emp->designation = $request->designation;
        $emp->update();

        $newchart = ChartAccount::find($request->account_type);
        $newchart->account_payable = ($newchart->account_payable) + ($request->salary);
        $newchart->update();

        return redirect('/manage/employee')->with('success','Employee Update Successfully');

    }
    public function destroy($id){
        $delemp = Employee::find($id);
        $acctype = $delemp->account_type;
        $salary = $delemp->salary;
        $chart = ChartAccount::find($acctype);
        $chart->account_payable = ($chart->account_payable) - ($salary);
        $chart->update();
        EmpAttendance::Where('employee_id',$id)->delete();
        EmployeeSalary::Where('employee_id',$id)->delete();
        SalaryRecord::Where('employee_id',$id)->delete();
        Employee::find($id)->delete();
        return redirect('/manage/employee')->with('success','Employee Deleted Successfully');
    }

    public function attendance(Request $request){
        
        if ($request->ajax()) {
              
            $data = EmpAttendance::with('employeeof');
          
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function ($row) {
                    return (isset($row->employeeof->name)) ? $row->employeeof->name : "";
                    })->addColumn('attendance_statuses', function ($row) {
                    return (isset($row->attendance_statuses)) ? $row->attendance_statuses  : "";
                    })->addColumn('date', function ($row) {
                        return (isset($row->date)) ?  date('d/m/Y', strtotime($row->date))  : "";
                })->rawColumns(['name'])->make();
        }
      
       $attendance=EmpAttendance::OrderBy('id' , 'asc')->get();
       $data=['page_title' => 'Attendance Report' , 'attendance' => $attendance,'employee'=>Employee::all()];
        return view('employees.attendance',$data);
    }
    public function push(Request $request){

        return $request->id;

    }
    public function storeattendance(Request $request){

        $attendance =  EmpAttendance::where('date',$request->date)->get();
        
        if($attendance->isEmpty()){

            
           foreach($request->employee_id as $key => $value ){
                
                EmpAttendance::create([
                'employee_id' => $value,
                'attendance_statuses' => $request->attendance_statuses[$key],
                'date' => $request->date
                ]);

            }

            return redirect('/manage/employee_attendance')->with('success','Add Attendance Successfully');    
    
        }
        else{

            return redirect('/manage/employee_attendance')->with('success','Already exist');    
        }
    }

    public function attendance_report(){
        
        $data=['page_title' => 'Attendance Report','attendance'=>EmpAttendance::all()];
        return view('employees.attendancereport',$data);
    }
    public function attendancebydate(Request $request){

       
        if ($request->ajax()) {
              
            $data = EmpAttendance::with('employeeof');
            if($request->start_date != "" )  {
               
                $data = $data->whereDate('date', '>=' , $request->start_date)
                             ->whereDate('date', '<=' , Carbon::now());
                             
               
            }
            if($request->start_date != "" && $request->end_date != ""){

             $data = $data->whereDate('date', '>=' , $request->start_date)
                            ->whereDate('date', '<=' , $request->end_date);
                        //   dd($request->end_date);    
            }

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function ($row) {
                    return (isset($row->employeeof->name)) ? $row->employeeof->name : "";
                    })->addColumn('attendance_statuses', function ($row) {
                    return (isset($row->attendance_statuses)) ? $row->attendance_statuses  : "";
                    })->addColumn('date', function ($row) {
                        return (isset($row->date)) ?  date('d/m/Y', strtotime($row->date))  : "";
                })->rawColumns(['name'])->make();
        }
      
       $attendance=EmpAttendance::OrderBy('id' , 'asc')->get();
       $data=['page_title' => 'Attendance Report' , 'attendance' => $attendance];
       return view('employees.attendancereport' , $data);

    }

}
