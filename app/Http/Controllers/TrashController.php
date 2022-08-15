<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Project;
use App\Models\ContractorPay;
use App\Models\Employee;
use App\Models\SalaryRecord;
use App\Models\SupplierPay;
class TrashController extends Controller
{
    // supplier
    public function supplier_index(){
        Supplier::withTrashed()->get();
        $data =['page_title'=>'Trash Supplier','supplier'=> Supplier::withTrashed()->get()];
        return view('trashbox.supplier',$data);
    }
    public function undosupplier($id){
        $res = Supplier::withTrashed()->find($id);
        $res->restore();
        $res->supplierpayof()->restore();
        $res->materialof()->restore();
        return redirect(url("/manage/trashsupplier"))->with('success','Restore Supplier Successfully');
    }
    public function deletesupplier($id){
        $res = Supplier::withTrashed()->find($id);
        $res->forceDelete();
        $res->supplierpayof()->forceDelete();
        $res->materialof()->forceDelete();
        return redirect(url("/manage/trashsupplier"))->with('success','Permanently Deleted Supplier Successfully');
    }
    // project
    public function project_index(){
        
        $data =['page_title'=>'Trash Project','project'=> Project::withTrashed()->get()];
        return view('trashbox.project',$data);
    }
    public function undoproject($id){
        
        $res = Project::withTrashed()->find($id);
        $res->restore();
        $res->supplierpayof()->restore();
        $res->contractorpayof()->restore();
        $res->materialorderof()->restore();
        return redirect(url("/manage/trashproject"))->with('success','Restore Project Successfully');
    }
    public function deleteproject($id){
        $res = Project::withTrashed()->find($id);
        $res->forceDelete();
        $res->supplierpayof()->forceDelete();
        $res->contractorpayof()->forceDelete();
        $res->materialorderof()->forceDelete();
        return redirect(url("/manage/trashproject"))->with('success','Permanently Deleted Project Successfully');
    }

 // contractor
    public function contractor_index(){
        
        $data =['page_title'=>'Trash Contractor','contractor'=> Contractor::withTrashed()->get()];
        return view('trashbox.contractor',$data);
    }
    public function undocontractor($id){
        $res = Contractor::withTrashed()->find($id);
        $res->restore();
        $res->contractorpayment()->restore();
        return redirect(url("/manage/trashcontractor"))->with('success','Restore Contractor Successfully');
    }
    public function deletecontractor($id){
        $res = Contractor::withTrashed()->find($id);
        $res->forceDelete();
        $res->contractorpayment()->forceDelete();
        return redirect(url("/manage/trashcontractor"))->with('success','Permanently Deleted Contractor Successfully');
    }
    // employee
    public function employee_index(){
        
        $data =['page_title'=>'Trash Employee','employee'=> Employee::withTrashed()->get()];
        return view('trashbox.employee',$data);
    }
    public function undoemployee($id){
        $res = Employee::withTrashed()->find($id);
        $salres = SalaryRecord::withTrashed()->Where('employee_id',$id);
        $res->restore();
        $salres->restore();
        return redirect(url("/manage/trashemployee"))->with('success','Restore Employee Successfully');
    }
    public function deleteemployee($id){
        $res = Employee::withTrashed()->find($id);
        $res->forceDelete();
        return redirect(url("/manage/trashemployee"))->with('success','Permanently Deleted Employee Successfully');
    }
}
