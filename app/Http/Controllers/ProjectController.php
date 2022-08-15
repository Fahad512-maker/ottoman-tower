<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\ContractorPay;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\OwnersEquity;
use App\Models\Main_head;
use App\Models\Material;
use App\Models\Material_order;
use App\Models\ProjectProduct;
use App\Models\Supplier;
use App\Models\SupplierPay;

class ProjectController extends Controller
{
    public function index(){
        $data =['page_title'=>'Projects','project'=> Project::all(),'sum' => Project::sum('cost')];
        
        return view('project.index',$data);

    }
    public function create(){
        $data =['page_title'=>'Add Project'];
        return view('project.create',$data);
    }
    public function store(Request $request){
        
        // dd($request->all());
        $request->validate([
            'projectname' =>     'required',
            'startdate' =>      'required',
            'enddate' =>        'required',
            'productcode' =>    'required',
            'productname' =>    'required',
            'qty' =>            'required',
            'cost'=>            'required',
           'address'=>          'required',
           'progress'=>         'required',
           
        ]);

        $pro=Project::create([
            'projectname' => $request->projectname,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            // 'productcode' => serialize($request->productcode),
            // 'productname' =>serialize($request->productname),
            // 'qty' =>serialize($request->qty),
            'cost'=>$request->cost,
            'remaining_cost'=>$request->cost,
            'address'=>$request->address,
            'progress'=>$request->progress,
            'picture'=>$request->picture,
        ]);

        foreach($request->productcode as $key => $code)
        {

            ProjectProduct::create([
                'project_id' =>     $pro->id,
                'product_code' =>   $code,
                'product_name' =>   $request->productname[$key],
                'product_qty' =>    $request->qty[$key]
            ]);
        }
        $main=Main_head::find(1);
        $main->remaining_funds=($main->remaining_funds) - ($request->cost);
        $main->update(); 
        return redirect('/manage/project')->with('success','Add Project Successfully');
    }
    public function edit($id){
        $all=Project::find($id);
        $data =['page_title'=>'Edit Project','project'=> $all];
        return view('project.edit',$data);

    }
    public function update($id,Request $request){
        $request->validate([
            'projectname' =>     'required',
            'startdate' =>      'required',
            'enddate' =>        'required',
            'productcode' =>    'required',
            'productname' =>    'required',
            'qty' =>            'required',
            'cost'=>            'required',
           'address'=>          'required',
           'progress'=>         'required',
           
        ]);
        
        $project=Project::find($id);
        $project->projectname      = $request->projectname;
        $project->startdate        = $request->startdate;
        $project->enddate          =  $request->enddate;
        $project->productcode      =serialize($request->productcode);
        $project->productname      =serialize($request->productname) ;
        $project->qty              = serialize($request->qty);
        // $project->cost             = $request->cost;
        // $project->remaining_cost   = $request->cost;
        $project->address          = $request->address;
        $project->progress         =$request->progress ;
        $project->picture          =$request->picture ;
        $project->update();
        
        return redirect('/manage/project')->with('success','Edit Project Successfully');

    }
    public function storefund($id,Request $request){
        $pro = Project::find($id);
        $pro->cost = ($pro->cost) + ($request->fund);
        $pro->remaining_cost = ($pro->remaining_cost) + ($request->fund);
        $pro->update();

        $main=Main_head::find(1);
        $main->remaining_funds=($main->remaining_funds) - ($request->fund);
        $main->update(); 
        return redirect('/manage/project')->with('success','Add Project Fund Successfully');

    }
    public function view(Request $request,$id){
        $all=Project::find($id);
        $data =['page_title'=>'View Project','project'=> $all];
        return view('project.view',$data);
    }
    public function destroy($id){
       
       $contractorpay=ContractorPay::where('project_id',$id)->get();
       foreach($contractorpay as $value){
        
           $conid = $value->id;
          ContractorPay::find($conid)->delete();
       }
        
       $supplierpay=SupplierPay::where('project_id',$id)->get();
        foreach($supplierpay as $value){
                $supid= $value->id;
                SupplierPay::find($supid)->delete();
        
            }
        $material_order=Material_order::where('project_id',$id)->get();
        foreach($material_order as $value){

            
                Material_order::find($value->id)->delete();
        }
          Project::find($id)->delete(); 
        return redirect('/manage/project')->with('success','Delete Project Successfully');
    }
}
