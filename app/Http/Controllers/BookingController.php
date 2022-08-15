<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectProduct;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        
        $data=['page_title'=> 'Bookings','booking'=> Booking::all(),'project'=> Project::all()];
        return view('booking.index',$data);
    }
    public function create(){

        $data=['page_title'=> 'Add Booking','client'=> Client::all()];
        return view('booking.create',$data);

    }
    public function store(Request $request){
        $request->validate([
            'payment' => 'required',
                'number' => 'required',
                'date' => 'required',
                'bank_branch' => 'required',
                'flat_number' => 'required',
                'size' => 'required',
                'flat_pref' => 'required',
                'payment_schedule' => 'required',
                'applicant' => 'required',
                'cnic' => 'required',
                'sowo' => 'required',
                'office_no' => 'required',
                'res' => 'required',
                'mobile' => 'required',
                // 'address' => 'required',
                'nominee' => 'required',
                'nominee_sowo' => 'required',
                'nominee_relation' => 'required',
                'nominee_cnic' => 'required',
                'witness_name' => 'required',
                'wintess_cnic' => 'required',
            ]);

            // return $request->all();
        Booking::create([
            'payment' => $request->payment,
            'number' => $request->number,
            'date' => $request->date,
            'bank_branch' => $request->bank_branch,
            'flat_number' => $request->flat_number,
            'size' => $request->size,
            'flat_pref' => $request->flat_pref,
            'payment_schedule'=> $request->payment_schedule,
            'applicant' => $request->applicant,
            'cnic' => $request->cnic,
            'sowo' => $request->sowo,
            'office_no' => $request->office_no,
            'res' => $request->res,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'nominee' => $request->nominee,
            'nominee_sowo' => $request->nominee_sowo,
            'nominee_relation' => $request->nominee_relation,
            'nominee_cnic' => $request->nominee_cnic,
            'witness_name' => serialize($request->witness_name),
            'wintess_cnic' => serialize($request->wintess_cnic), 

        ]);

        return redirect('/manage/booking')->with('success','Application Form Submitted Successfully');
    }
    public function edit($id){

        
        $data=['page_title'=> 'Edit Booking','booking'=>Booking::find($id)];
        return view('booking.edit',$data);

    }
    public function update($id,Request $request){

        $booking = Booking::find($id);
        $booking->payment = $request->payment;
        $booking->number = $request->number;
        $booking->date = $request->date;
        $booking->bank_branch = $request->bank_branch;
        $booking->flat_number = $request->flat_number;
        $booking->size = $request->size;
        $booking->flat_pref = $request->flat_pref;
        $booking->payment_schedule= $request->payment_schedule;
        $booking->applicant = $request->applicant;
        $booking->cnic = $request->cnic;
        $booking->sowo = $request->sowo;
        $booking->office_no = $request->office_no;
        $booking->res = $request->res;
        $booking->mobile = $request->mobile;
        $booking->address = $request->address;
        $booking->nominee = $request->nominee;
        $booking->nominee_sowo = $request->nominee_sowo;
        $booking->nominee_relation = $request->nominee_relation;
        $booking->nominee_cnic = $request->nominee_cnic;
        $booking->witness_name = serialize($request->witness_name);
        $booking->wintess_cnic = serialize($request->wintess_cnic);
        $booking->update();
        return redirect('/manage/booking')->with('success','Edit Booking Successfully');
    }
    public function destroy($id){
        Booking::find($id)->delete();
        return redirect('/manage/booking')->with('success','Delete Booking Successfully');
    }
    public function view($id){
        $data=['page_title'=> 'Edit Booking','booking'=>Booking::find($id)];
        return view('booking.view',$data);

    }
    public function print($id){
        $data=['page_title'=> 'Edit Booking','booking'=>Booking::find($id)];
        return view('booking.print',$data);
       

    }
    public function getdata(Request $request){

        $client = Client::find($request->applicant);
        $address = strip_tags($client->address);
        return $data = ['client'=> $client,'address'=>$address];

    }
    public function getprojectdata(Request $request){

         
        $project = ProjectProduct::Where('project_id',$request->id)->get();
        $result = '<option value="0">-- Select Product -</option>';
        foreach ($project as $value) {
            $name = $value->product_name;
           $result .= '<option value='.$name.'>'.$name.'</option>';
       }
       return $result;
    
    }
    public function getproductdata(Request $request){
        // dd($request->all());
        $project = ProjectProduct::where(['product_name' => $request->product_id,'project_id'=> $request->project_id ])->first();
        return $project->product_qty;

    }

}
