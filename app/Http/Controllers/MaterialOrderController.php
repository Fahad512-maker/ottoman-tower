<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Supplier;
use App\Models\Material_order;
use App\Models\Project;
use App\Models\ChartAccount;
class MaterialOrderController extends Controller
{
    public function index(){
        $material_order = Material_order::all();
        $chartaccount = ChartAccount::all();
        $project= Project::all();
        $data=['page_title'=> 'Material Order','material' => $material_order];
        return view('materialorder.index',$data);
    }
    public function create(){

        $material = Material::all();
        $supplier = Supplier::all();
        $chartaccount = ChartAccount::all();
        $project= Project::all();
        $data=['page_title'=> 'Material Order','material' => $material,'supplier' => $supplier,'project' => $project];
        return view('materialorder.create',$data);
    }
    public function store(Request $request){
        // ,'material' => $material
        
        $request->validate([
            'material' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'supplier' => 'required',
            'date' => 'required',
            'project_id' => 'required',
            
        ]);
        
        $total_price=($request->qty) * ($request->price);
        Material_order::create([
            'material_id' => $request->material,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $total_price,
            'supplier_id' => $request->supplier,
            'date' => $request->date,
            'supplier_total' => $total_price,
            'project_id' => $request->project_id,
            
           
        ]);
               
        return redirect('/manage/materialorder')->with('success','Add Material Order Successfully');
    }
    public function edit($id){

        $material_order = Material_order::find($id);
        $material = Material::all();
        $supplier = Supplier::all();
        $project= Project::all();
        $data=['page_title'=> 'Edit Material Order','material' => $material,'supplier' => $supplier,'material_order'=> $material_order,'project' => $project];
        return view('materialorder.edit',$data);
    }
    public function update(Request $request,$id){
        $request->validate([
            'material' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'supplier' => 'required',
            'date' => 'required',
            'project_id' => 'required',
        ]);
        $material_order = Material_order::find($id);
        $total_price=($request->qty) * ($request->price);
        
            $material_order->material_id = $request->material;
            $material_order->qty = $request->qty;
            $material_order->price = $request->price;
            $material_order->total = $total_price;
            $material_order->supplier_total = $total_price;
            $material_order->supplier_id = $request->supplier;
            $material_order->project_id = $request->project_id;
            $material_order->update();
            return redirect('/manage/materialorder')->with('success','Edit Material Order Successfully');
    }
    public function destroy($id){
        Material_order::find($id)->delete();
        return redirect('/manage/materialorder')->with('success','Delete Material Order Successfully');
    }
    
    
}
