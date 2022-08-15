<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartAccount;
use App\Models\Main_head;
use App\Models\Purchase;
class PurchaseController extends Controller
{
    public function index(){
        
        $data=['page_title'=> 'Purchases','purchase'=> Purchase::all()];
        return view('purchase.index',$data);
    }
    public function create(){
        
        $data=['page_title'=> 'Add Purchases','chartaccount' => ChartAccount::all()];
        return view('purchase.create',$data);
    }
    public function store(Request $request){
       
        $request->validate([
            'supplier_name' => 'required',
            'product_name'  => 'required',
            'qty'           => 'required',
            'price'         => 'required',
            'date'          => 'required',
            'account_type'  => 'required',
        ]);

        Purchase::create([
            'supplier_name'     =>      $request->supplier_name,
            'product_name'      =>      $request->product_name,
            'qty'               =>      $request->qty,
            'price'             =>      $request->price,
            'paid'              =>      $request->paid,
            'remaining'         =>      $request->remaining,
            'date'              =>      $request->date,
            'account_type'      =>      $request->account_type,
        ]);
       
        $paid=$request->paid;
        $remaining=$request->remaining;
        $account_type=$request->account_type;

        $chart = ChartAccount::find($account_type);
        $chart->account_payable= ($chart->account_payable) + ($remaining);
        $chart->paid= ($chart->paid) + ($paid);
        $chart->update();
        
        $main = Main_head::find(1);
        $main->remaining_funds = ($main->remaining_funds) - ($paid);
        $main->update();

        return redirect('/manage/purchases')->with('success','Add Item Successfully');
    }
    public function edit($id){
        $purchase = Purchase::find($id);
        $data=['page_title'=> 'Edit Purchases','chartaccount' => ChartAccount::all(),'purchase' => $purchase];
        return view('purchase.edit',$data);
    }
    public function update($id, Request $request){
        
        $pur = Purchase::find($id);
        $paid = $pur->paid;
        $remaining = $pur->remaining;
        $account_type = $pur->account_type;

        $main = Main_head::find(1);
        $main->remaining_funds = ($main->remaining_funds) + ($paid);
        $main->update();
        
        $chart = ChartAccount::find($account_type);
        $chart->account_payable= ($chart->account_payable) - ($remaining);
        $chart->paid= ($chart->paid) - ($paid);
        $chart->update();

        
        $request->validate([
            'supplier_name' => 'required',
            'product_name'  => 'required',
            'qty'           => 'required',
            'price'         => 'required',
            'date'          => 'required',
            'account_type'  => 'required',
        ]);

        $purchase = Purchase::find($id);
            $purchase->supplier_name     =      $request->supplier_name;
            $purchase->product_name      =      $request->product_name;
            $purchase->qty               =      $request->qty;
            $purchase->price             =      $request->price;
            $purchase->paid              =      $request->paid;
            $purchase->remaining         =      $request->remaining;
            $purchase->date              =      $request->date;
            $purchase->account_type      =      $request->account_type;
            $purchase->update();

        $upd_pur = Purchase::find($id);

        $paid = $upd_pur->paid;
        $remaining = $upd_pur->remaining;
        $account_type = $upd_pur->account_type;
        
        $chart = ChartAccount::find($account_type);
        $chart->account_payable= ($chart->account_payable) + ($remaining);
        $chart->paid= ($chart->paid) + ($paid);
        $chart->update();
        
        $main = Main_head::find(1);
        $main->remaining_funds = ($main->remaining_funds) - ($paid);
        $main->update();
        return redirect('/manage/purchases')->with('success','Update Item Successfully');
    }
    public function destroy($id){
        Purchase::find($id)->delete();
        return redirect('/manage/purchases')->with('success','Delete Item Successfully');
    }
}
