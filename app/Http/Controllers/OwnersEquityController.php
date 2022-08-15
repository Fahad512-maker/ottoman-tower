<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\OwnersEquity;
use App\Models\Main_head;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isEmpty;

class OwnersEquityController extends Controller
{

    public function index(Request $request){
        
        if ($request->ajax()) {
              
            $data = OwnersEquity::with('partner');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('partner', function ($row) {
                    return (isset($row->partner->name)) ? $row->partner->name : "";
                    })->addColumn('action', function ($row) {
                      $btn = '<a href="'.url('/equity/'.$row->id.'/edit').'" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                     $btn .= '<a href="javascript:void(0)" class="delete_option" data-id="'.$row->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>';
                     
                    return $btn;
                })->rawColumns(['action'])->make(true);
        }
      
      
        $data =['page_title' => 'Equity','Equity'=> OwnersEquity::all()];
        return view('equity.index',$data);
    }
    public function create(){
        
        $data =['page_title' => 'Add Equity','Partners'=> Partner::all()];
        return view('equity.create',$data);
    }
    public function store(Request $request){
        
        $request->validate([
            'partner_name' => 'required',
            'partner_amount' => 'required',
        ]);
       
        
     
        OwnersEquity::create([
            'partner_name' => $request->partner_name, 
            'partner_amount' => $request->partner_amount,
            
        ]);
        $m_head= Main_head::count(); 
        if($m_head == 0)
        {
            Main_head::create([
                'id' => '1',
                'total_budget' => '0',
                'remaining_funds' => '0',

            ]);

            // $total_budget = OwnersEquity::sum('partner_amount');
            $main=Main_head::find(1);
            $main->total_budget=($main->total_budget) + ($request->partner_amount);
            $main->remaining_funds= ($main->remaining_funds) + ($request->partner_amount);
            $main->update(); 


        }
        else{
            // $total_budget = OwnersEquity::sum('partner_amount');
            $main=Main_head::find(1);
            $main->total_budget=($main->total_budget) + ($request->partner_amount);
            $main->remaining_funds= ($main->remaining_funds) + ($request->partner_amount);
            $main->update(); 


        }
        return redirect('/manage/equity')->with('success','Equity Add Successfully');

    }
    public function edit($id){

        $eq=OwnersEquity::find($id);
        $data =['page_title' => 'Edit Equity','Equity'=> $eq,'Partners'=> Partner::all()];
        return view('equity.edit',$data);
    }
    
    public function update($id,Request $request){
        $request->validate([
            'partner_name' => 'required',
            'partner_amount' => 'required',
        ]);
        
        // $total_budget = OwnersEquity::sum('partner_amount');

        $main=Main_head::find(1);
        $eq=OwnersEquity::find($id);
        $cost = $eq->partner_amount;
        $main->total_budget=($main->total_budget) - ($cost);
        $main->remaining_funds=($main->remaining_funds) - ($cost);
        $main->update(); 
        
        $eq=OwnersEquity::find($id);
        $eq->partner_name = $request->partner_name;
        $eq->partner_amount = $request->partner_amount;
        $eq->update();

        $main=Main_head::find(1);
        $eq=OwnersEquity::find($id);
        $cost = $eq->partner_amount;
        $main->total_budget=($main->total_budget) + ($cost);
        $main->remaining_funds=($main->remaining_funds) + ($cost);
        $main->update(); 
        return  redirect('/manage/equity')->with('success','Equity Updated Successfully');
    }
    public function destroy($id){
       
        $main_equity=OwnersEquity::find($id);
        $tr=$main_equity->partner_amount;
        $main_head=Main_head::find(1);
        $main_head->total_budget=($main_head->total_budget) - ($tr);
        $main_head->remaining_funds=($main_head->remaining_funds) - ($tr);
        $main_head->update();
        OwnersEquity::find($id)->delete();
        return redirect('/manage/equity')->with('success','Equity Deleted Successfully');
    }

}
