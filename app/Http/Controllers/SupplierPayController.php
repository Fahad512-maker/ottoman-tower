<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\ChartAccount;
use App\Models\Material_order;
use App\Models\SupplierPay;

class SupplierPayController extends Controller
{
    public function index(){
        
        $supplierpay= SupplierPay::all();
        $data=['page_title'=> 'Supplier Payment','supplierpay' => $supplierpay];
        return view('supplierpayment.index',$data);
    }
    public function create(){
        $supplier = Supplier::all();
        $project = Project::all();
        $chartaccount = ChartAccount::all();
        $data=['page_title'=> 'Add Supplier Payments','supplier' => $supplier,'project' => $project,'chartaccount'=>$chartaccount];
        return view('supplierpayment.create',$data);
    }
    public function getData(Request $request){

        $supplier_id = $request->supplier;
        $project_id = $request->project;
        $material = Material_order::where(['supplier_id' => $supplier_id,'project_id'=> $project_id])->get();
        $total=null;
        foreach($material as $value)
        {
            $total = ($total) + ($value->supplier_total);
            
        }
        
       return $total;
    }
    public function store(Request $request){
        $request->validate([
            'supplier_id'=> 'required',
            'project_id'=> 'required',
            'supplier_expanse'=> 'required',
            'supplier_paid'=> 'required',
            'supplier_remaining'=> 'required',
            'date'=> 'required',
            'account_type'=> 'required',
        
        ]);

        SupplierPay::create([
            'supplier_id'=> $request->supplier_id,
            'project_id'=> $request->project_id,
            'supplier_expanse'=> $request->supplier_expanse,
            'supplier_paid'=> $request->supplier_paid,
            'supplier_remaining'=> $request->supplier_remaining,
            'date'=> $request->date,
            'account_type'=> $request->account_type,
            'description'=> $request->description,

        ]);
        
        $supplier_id = $request->supplier_id;
        $project_id = $request->project_id;
        
        $material = Material_order::where(['supplier_id' => $supplier_id,'project_id'=> $project_id])->get();
        foreach($material as $value){
            
            $value->supplier_total = null;
            $value->update();

        }    
        $supplier_id=$request->supplier_id;
        $project_id=$request->project_id;
        $supplier_paid=$request->supplier_paid;
        $supplier_remaining=$request->supplier_remaining;
        $account_type=$request->account_type;

        $project = Project::find($project_id);
        $project->remaining_cost = ($project->remaining_cost) - ($supplier_paid);
        $project->update();

        $chart = ChartAccount::find($account_type);
        $chart->account_payable= ($chart->account_payable) + ($supplier_remaining);
        $chart->paid= ($chart->paid) + ($supplier_paid);
        $chart->update();
         

        return redirect('/manage/supplierpay')->with('success','Add Supplier Payment Successfully');

    }
    public function edit($id,Request $request){
        $supplier_pay = SupplierPay::find($id);
        $supplier = Supplier::all();
        $project = Project::all();
        $chartaccount = ChartAccount::all();
        $data=['page_title'=> 'Edit Supplier Payments','supplier' => $supplier,'project' => $project,'chartaccount'=>$chartaccount,'supplierpay' => $supplier_pay];
        return view('supplierpayment.edit',$data);
    }
    public function update($id,Request $request){
        $supplier_pay = SupplierPay::find($id);
        $acc_type       =   $supplier_pay->account_type;
        $supplier_paid  =   $supplier_pay->supplier_paid;
        $supplier_remaining  =   $supplier_pay->supplier_remaining;
        $supplier_projectid  =   $supplier_pay->project_id;

        $project= Project::find($supplier_projectid);
        $project->remaining_cost= ($project->remaining_cost) + ($supplier_paid);
        $project->save();
        
        $chart = ChartAccount::find($acc_type);
        $chart->account_payable= ($chart->account_payable) - ($supplier_remaining);
        $chart->paid= ($chart->paid) - ($supplier_paid);
        $chart->save();
        // return "clear";
        // Previous record clear

        $supplier = SupplierPay::find($id);
        $supplier-> supplier_id = $request->supplier_id;
        $supplier->project_id = $request->project_id;
        $supplier->supplier_expanse= $request->supplier_expanse;
        $supplier->supplier_paid= $request->supplier_paid;
        $supplier->supplier_remaining = $request->supplier_remaining;
        $supplier->date= $request->date;
        $supplier->account_type= $request->account_type;
        $supplier->description= $request->description;
        $supplier->save();

        $supplier = SupplierPay::find($id);
        $supplier_projectid = $supplier->project_id;
        $supplier_paid= $supplier->supplier_paid;
        $supplier_remaining = $supplier->supplier_remaining;
        $supplier_acc_type = $supplier->account_type;
        

        $project= Project::find($supplier_projectid);
        $project->remaining_cost= ($project->remaining_cost) - ($supplier_paid);
        $project->save();
        
        $chart = ChartAccount::find($supplier_acc_type);
        $chart->account_payable= ($chart->account_payable) + ($supplier_remaining);
        $chart->paid= ($chart->paid) + ($supplier_paid);
        $chart->save();
        return redirect('/manage/supplierpay')->with('success','Update Supplier Payment Successfully');
    }
    public function destroy($id){
        SupplierPay::find($id)->delete();
        return redirect('/manage/supplierpay')->with('success','Supplier Payment Deleted Successfully');
    }
    public function print($id){

        $data = ['pay'=>SupplierPay::find($id)];
        return view('supplierpayment.print',$data);
        
    }
}
