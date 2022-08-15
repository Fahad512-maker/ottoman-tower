<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
class MaterialController extends Controller
{
    public function index(){
        $material = Material::all();
        $data=['page_title'=> 'Material','material' => $material];
        return view('material.index',$data);
        }
    public function create(){

        $data=['page_title'=> 'Add Material'];
        return view('material.create',$data);
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'unit' => 'required',
        ]);
        Material::create([
            'name' => $request->name,
            'unit' => $request->unit,
        ]);
        
        
        return redirect('/manage/material')->with('success','Add Material Successfully');
    }
    public function edit($id){

        $material=Material::find($id);
        $data=['page_title'=> 'Add Material','material'=> $material];
        return view('material.edit',$data);
    }
    public function update($id,Request $request){

        $material=Material::find($id);
        $material->name = $request->name ;
        $material->unit = $request->unit;
        $material->update();
        return redirect('/manage/material')->with('success','Edit Material Successfully');
    }


}
