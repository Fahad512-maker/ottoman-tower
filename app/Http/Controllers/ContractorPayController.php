<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contractor;
use App\Models\Project;
use App\Models\ContractorPay;
use App\Models\ChartAccount;

class ContractorPayController extends Controller
{
    public function index(){
        $contractor = ContractorPay::all();
        $data=['page_title'=> 'Contractor Payment','contractor' => $contractor];
        return view('contractorpayment.index',$data);
    }
    public function create(){
        $contractor= Contractor::all();
        $chartaccount = ChartAccount::all();
        $project= Project::all();
        $data=['page_title'=> 'Add Contractor Payments','contractor' => $contractor,'project' => $project,'chartaccount'=> $chartaccount];
        return view('contractorpayment.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'contractor_id' => 'required',
            'project_id' => 'required',
            'date' => 'required',
            'expense' => 'required|numeric',
            'paid' => 'required|numeric',
            'remaining' => 'required|numeric',
            'account_type' => 'required',
            'description' => 'required',
        ]);
        ContractorPay::create([
            'contractor_id' => $request->contractor_id,
            'project_id' => $request->project_id,
            'date' => $request->date,
            'expense' => $request->expense,
            'paid' => $request->paid,
            'remaining' => $request->remaining,
            'account_type' => $request->account_type,
            'description' => $request->description,
        ]);
        $acc = ChartAccount::find($request->account_type);
        $acc->account_payable = ($acc->account_payable ) + ($request->remaining);
        $acc->paid= ($acc->paid) + ($request->paid);
        $acc->save();
        $pro = Project::find($request->project_id);
        $pro->remaining_cost= ($pro->remaining_cost) - ($request->paid);
        $pro->save();
        return redirect('/manage/contractorpay')->with('success','Add Contractor Payment Successfully');
        
    }
    public function edit($id){
        
        $contractorpay = ContractorPay::find($id);
        $contractor= Contractor::all();
        $project= Project::all();
        $chartaccount = ChartAccount::all();
        $data=['page_title'=> 'Add Contractor Payments','contractor' => $contractor,'project' => $project,'contractorpay' => $contractorpay,'chartaccount'=> $chartaccount];
        return view('contractorpayment.edit',$data);
    }
    
    public function update($id,Request $request){
    
        $con=ContractorPay::find($id);
        $conpay=$con->account_type;
       
        
        if($conpay == $request->account_type ){

            $chart=ChartAccount::find($request->account_type);
            $chart->account_payable;
            $contractor=ContractorPay::find($id);
            $remain=$contractor->remaining;
            $paid=$contractor->paid;
            $chart->account_payable = ($chart->account_payable) - ($remain);
            $chart->paid = ($chart->paid) -  ($paid);
            $chart->update();
            //    old fetch record
            $contractorpay=ContractorPay::find($id);
            $project_id=$contractorpay->project_id;
            $project=Project::find($project_id);
            $cost=$project->remaining_cost;
            $paid=$contractorpay->paid;
            $total = ($cost) + ($paid);
            $project->remaining_cost=$total;
            $project->save();

            $request->validate([
                'contractor_id' => 'required',
                'project_id' => 'required',
                'date' => 'required',
                'expense' => 'required|numeric',
                'paid' => 'required|numeric',
                'remaining' => 'required|numeric',
                'account_type' => 'required',
                'description' => 'required',
            ]);

            $contractorpay=ContractorPay::find($id);
            $contractorpay->contractor_id = $request->contractor_id ;
            $contractorpay->project_id  = $request->project_id;
            $contractorpay->date  = $request->date;
            $contractorpay->expense  =$request->expense;
            $contractorpay->paid  = $request->paid;
            $contractorpay->remaining  =$request->remaining;
            $contractorpay->description  = $request->description;
            $contractorpay->update();
            // new record


            $chart=ChartAccount::find($request->account_type);
            $contractor=ContractorPay::find($id);
            $project_id = $contractor->project_id;
            $remain=$contractor->remaining;
            $paid=$contractor->paid;
            $chart->account_payable = ($chart->account_payable) + ($remain);
            $chart->paid = ($chart->paid) +  ($paid);
            $chart->update();
            $pro = Project::find($project_id);
            $pro->remaining_cost= ($pro->remaining_cost) - ($request->paid);
            $pro->save();

            return redirect('/manage/contractorpay')->with('success','Edit Contractor Payment Successfully');
        }
        else{

            
            $request->account_type;
            $contract =ContractorPay::find($id);
            $contract_paid = $contract->paid;
            $contract_project_id = $contract->project_id;
            $contract_remaining =$contract->remaining;
            $contract_account_type=$contract->account_type;
            $chart=ChartAccount::find($contract_account_type);
            $chart->account_payable = ($chart->account_payable) - ($contract_remaining);
            $chart->paid = ($chart->paid) - ($contract_paid);
            $chart->update();

    
            $contractorpay=ContractorPay::find($id);
            $project_id=$contractorpay->project_id;
            $project=Project::find($project_id);
            $cost=$project->remaining_cost;
            $paid=$contractorpay->paid;
            $total = ($cost) + ($paid);
            $project->remaining_cost=$total;
            $project->save();
            
            
            $request->validate([
                'contractor_id' => 'required',
                'project_id' => 'required',
                'date' => 'required',
                'expense' => 'required|numeric',
                'paid' => 'required|numeric',
                'remaining' => 'required|numeric',
                'account_type' => 'required',
                'description' => 'required',
            ]);
            $contractorpay=ContractorPay::find($id);
            $contractorpay->contractor_id = $request->contractor_id ;
            $contractorpay->project_id  = $request->project_id;
            $contractorpay->date  = $request->date;
            $contractorpay->expense  =$request->expense;
            $contractorpay->paid  = $request->paid;
            $contractorpay->account_type = $request->account_type;
            $contractorpay->remaining  =$request->remaining;
            $contractorpay->description  = $request->description;
            $contractorpay->update();
            // new record
            $chart=ChartAccount::find($request->account_type);
            $contractor=ContractorPay::find($id);
            $project_id = $contractor->project_id;
            $remain=$contractor->remaining;
            $paid=$contractor->paid;
            $chart->account_payable = ($chart->account_payable) + ($remain);
            $chart->paid = ($chart->paid) +  ($paid);
            $chart->update();
            $pro = Project::find($project_id);
            $pro->remaining_cost= ($pro->remaining_cost) - ($request->paid);
            $pro->save();
            //  $chart=ChartAccount::find($request->account_type);
            //  $contractor=ContractorPay::find($id);
            //  $remain=$contractor->remaining;
            //  $paid=$contractor->paid;
            //  $chart->account_payable = ($chart->account_payable) + ($remain);
            //  $chart->paid = ($chart->paid) +  ($paid);
            //  $chart->update();
            return redirect('/manage/contractorpay')->with('success','Edit Contractor Payment Successfully');
        }

    }

    public function destroy($id){
        // ContractorPay::find($id)->delete();
        return redirect('/manage/contractorpay')->with('success','Delete Contractor Payment Successfully');
    }
    public function print($id){

        $data = ['pay'=>ContractorPay::find($id)];
        return view('contractorpayment.print',$data);
    }

}
