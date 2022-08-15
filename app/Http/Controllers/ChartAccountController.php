<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountstype;
use App\Models\ChartAccount;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Carbon\Carbon;

class ChartAccountController extends Controller
{
    public function index(){
        
        $chartaccount=ChartAccount::all();
        $data=['page_title'=> 'Charts Of Accounts','chartaccount' => $chartaccount];
        return view('chartaccount.index',$data);
    
    }
    public function create(){
        
        $account_type = Accountstype::all();
        $data=['page_title'=> 'Add Accounts','account_type' => $account_type];
        return view('chartaccount.create',$data);
    }
    public function store(Request $request){

        $request->validate([
            'account_type_id'   => 'required',
            'account_name'      =>  'required',
        ]);

        ChartAccount::create([
            'account_type_id'   => $request->account_type_id,
            'account_name'      =>  $request->account_name,

        ]);
        return redirect('/manage/chartaccount')->with('success','Add Account Successfully');
    }
    public function edit($id){
        $account_type = Accountstype::all();
        $chart=ChartAccount::find($id);
        $data=['page_title'=> 'Edit Accounts','account_type' => $account_type,'chart' => $chart];
        return view('chartaccount.edit',$data);
    }
    public function update($id,Request $request){

        $request->validate([
            'account_type_id'   => 'required',
            'account_name'      =>  'required',
        ]);

       
        $chart=ChartAccount::find($id);
        $chart->account_type_id   = $request->account_type_id;
        $chart->account_name      =  $request->account_name;
        $chart->update();
        return redirect('/manage/chartaccount')->with('success','Edit Account Successfully');
       
    }
    public function destroy($id){
        if($id == 6){
            
            return redirect('/manage/chartaccount')->with('success','You Cannot Delete Salary Expenses');
        }
        else{

        ChartAccount::find($id)->delete();
        return redirect('/manage/chartaccount')->with('success','Delete Account Successfully');
        }
        
    }
    public function reverse(){

        $empsum = Employee::sum('salary');
        $chart = ChartAccount::find(6);
        
        $date = $chart->created_at->format('m');
        $cur_date = date('m');

        if($date != $cur_date )
        {
            $chart->account_payable = $empsum;
            $chart->paid = 0;
            $chart->created_at = Carbon::now();
            $chart->update();
            return "changed salary status";
        }
        return "not changed salary status";
    }
}
