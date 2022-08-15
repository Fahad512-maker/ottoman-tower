<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $data=['page_title'=> 'Clients','client'=>Client::all()];
        return view('customer.index',$data);
    }
    public function create(){
        $data=['page_title'=> 'Add Client'];
        return view('customer.create',$data); 
    }
    public function store(Request $request){
        
        $request->validate([
            'name'=> 'required',
            'cnic'=> 'required',
            'phone'=> 'required',
            'sowo'=> 'required',
            'address'=> 'required',
        ]);

        Client::create([
            'name'=> $request->name,
            'cnic'=> $request->cnic,
            'phone'=> $request->phone,
            'sowo'=> $request->sowo,
            'address'=> $request->address,
        ]);

        return redirect('/manage/client')->with('success','Client Added Successfully');
    }
    public function edit($id){

        $data=['page_title'=> 'Edit Accounts','client' => Client::find($id)];
        return view('customer.edit',$data);

    }
    public function update($id, Request $request){
        $request->validate([
            'name'=> 'required',
            'cnic'=> 'required',
            'phone'=> 'required',
            'sowo'=> 'required',
            'address'=> 'required',
        ]);
        
        $client = Client::find($id);
        $client->name = $request->name;
        $client->cnic = $request->cnic;
        $client->phone = $request->phone;
        $client->sowo = $request->sowo;
        $client->address = $request->address;
        $client->update();
        return redirect('/manage/client')->with('success','Client Update Successfully');

    }
    public function destroy($id){
        
        Client::find($id)->delete();
        return redirect('/manage/client')->with('success','Client Delete Successfully');
    }
}
