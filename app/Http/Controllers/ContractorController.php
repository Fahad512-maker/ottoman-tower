<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractor;
use App\Models\ContractorPay;

class ContractorController extends Controller
{
    public function index(){
        $contractor=Contractor::all();
        
        $data=['page_title'=> 'Contractor','contractor' => $contractor];
        return view('contractor.index',$data);
    }
    public function create(){
        $data=['page_title'=> 'Add Contractor'];
        return view('contractor.create',$data);

    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'cnic' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        Contractor::create([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('/manage/contractor')->with('success',"Add Contractor Successfully");

    }
    public function edit($id){
        $contractors=Contractor::find($id);
        $data=['page_title'=> 'Edit Contractor','contractor' => $contractors];
        return view('contractor.edit',$data);
    }
    public function update(Request $request,$id){
        
        $request->validate([
            'name' => 'required',
            'cnic' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        $contractors=Contractor::find($id);
        
            $contractors->name = $request->name;
            $contractors->cnic = $request->cnic;
            $contractors->phone = $request->phone;
            $contractors->address = $request->address;
            $contractors->update();
        return redirect('/manage/contractor')->with('success',"Edit Contractor Successfully");

        
    }
    public function destroy($id){

        // Contractor::find($id)->delete();
        Contractor::find($id);
        $contractorpay = ContractorPay::where('contractor_id',$id)->first();
        if (empty($contractorpay)) {
            Contractor::find($id)->delete();
            return redirect('/manage/contractor')->with('success',"Delete Contractor Successfully");
        }
        else{

            if($contractorpay->remaining == 0)
            {
                Contractor::find($id)->delete();
                ContractorPay::find($contractorpay->id)->delete();
    
                return redirect('/manage/contractor')->with('success',"Delete Contractor Successfully");
            }
            else{
                return redirect('/manage/contractor')->with('success',"You Cannot Delete Contractor..!! PLease Clear ".($contractorpay->remaining) ." Due Amount");
            }
        }
        
        
    }
    
    
}
