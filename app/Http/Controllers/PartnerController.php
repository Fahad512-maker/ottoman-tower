<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
class PartnerController extends Controller
{
    public function index(){

        $data=['page_title'=> 'Partners','partners'=>Partner::all()];
        return view('partners.index',$data);
    }
    public function create(){
        $data=['page_title'=> 'Add Partner'];
        return view('partners.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'cnic'=> 'required',
            'contact'=> 'required',
            'address'=> 'required',
        ]);
        Partner::create([
            'name'=> $request->name,
            'cnic'=> $request->cnic,
            'contact'=> $request->contact,
            'address'=> $request->address,
        ]);
        return redirect('/manage/partners')->with('success','Add Partner Successfully');
    }
    public function edit($id){

        $edit_partner=Partner::find($id);
        $data=['page_title'=> 'Edit Partner','edit'=> $edit_partner];
        return view('partners.edit',$data);
    }
    public function update($id,Request $request){
        $request->validate([
            'name'=> 'required',
            'cnic'=> 'required',
            'contact'=> 'required',
            'address'=> 'required',
        ]);
        $update = Partner::find($id);
        $update->name = $request->name;
        $update->cnic = $request->cnic;
        $update->contact = $request->contact;
        $update->address = $request->address;
        $update->update();
        return redirect('/manage/partners')->with('success','Update Partner Successfully');
    }
    public function destroy($id){

        Partner::find($id)->delete();
        return redirect('/manage/partners')->with('success','Deleted Partner Successfully');
    }
}
