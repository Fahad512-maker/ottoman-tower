<?php

namespace App\Http\Controllers;

use App\Models\Material_order;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierPay;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        $data = ['page_title' => 'Supplier', 'supplier' => $supplier];
        return view('supplier.index', $data);
    }
    public function create()
    {

        $data = ['page_title' => 'Add Supplier'];
        return view('supplier.create', $data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'code'          =>  'required',
            'name'          =>  'required',
            'cnic'          =>  'required',
            'phone'         =>  'required',
            'email'         =>  'required',
            'payment_term'  =>  'required',
            'bank_account'  =>  'required',
            'other_name'    =>  'required',
            'other_phone'   =>  'required',
            'address'       =>  'required',
            'description'   =>  'required'

        ]);
        Supplier::create([
            'code'           => $request->code,
            'name'           => $request->name,
            'cnic'          => $request->cnic,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'payment_term'  => $request->payment_term,
            'bank_account'  => $request->bank_account,
            'other_name'    => $request->other_name,
            'other_phone'   => $request->other_phone,
            'address'       => $request->address,
            'description'   => $request->description


        ]);
        return redirect('/manage/supplier')->with('success', 'Add Supplier Successfully');
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $data = ['page_title' => 'Supplier', 'supplier' => $supplier];
        return view('supplier.edit', $data);
    }
    public function update($id, Request $request)
    {

        $supplier = Supplier::find($id);
        $supplier->code = $request->code;
        $supplier->name = $request->name;
        $supplier->cnic = $request->cnic;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->payment_term = $request->payment_term;
        $supplier->bank_account = $request->bank_account;
        $supplier->other_name = $request->other_name;
        $supplier->other_phone = $request->other_phone;
        $supplier->address = $request->address;
        $supplier->description = $request->description;
        $supplier->update();
        return redirect('/manage/supplier')->with('success', 'Edit Supplier Successfully');
    }

    public function destroy($id)
    {


        $supplier_pay = SupplierPay::where('supplier_id', $id)->first();


        if (empty($supplier_pay)) {
            

            $material_order = Material_order::where('supplier_id',$id)->get();
            foreach($material_order as $value){
                Material_order::find($value->id)->delete();
            }
            Supplier::find($id)->delete();
            return redirect("/manage/supplier")->with('success', "Delete Supplier Successfully");
        } else {

            if ($supplier_pay->supplier_remaining == 0) {
                
                $material_order = Material_order::where('supplier_id',$id)->get();
                foreach($material_order as $value){
                    Material_order::find($value->id)->delete();
                }
                Supplier::find($id)->delete();
                SupplierPay::find($supplier_pay->id)->delete();
                return redirect('/manage/supplier')->with('success', "Delete Supplier Successfully");
            } else {
                return redirect('/manage/supplier')->with('success', "You Cannot Delete Contractor..!! PLease Clear " . ($supplier_pay->supplier_remaining) . " Due Amount");
            }
        }
    }
}
