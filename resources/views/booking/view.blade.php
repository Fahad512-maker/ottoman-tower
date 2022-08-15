@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('booking_form'), 'page_name' => __('view_booking')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <h2>Booking Details</h2>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <h3 class="" style="font-size: 30px; font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg" style="color:#445ede;" width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>&nbsp; {{ucwords($booking->applicant)}}</h3>
                </div>
                <div class="offset-2 col-lg-2 col-md-2 col-sm-2 col-2">
                    <a href="{{ url('/booking/'.$booking->id.'/edit') }}" class="btn" style="background: #445ede; color: white;"><i data-feather="edit"></i></a>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="mt-3 ml-5">
                        <h6 class="mt-3"><i  style="color: #445ede;">Payment:</i>&nbsp; {{$booking->payment}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Number:</i>&nbsp; {{$booking->number}} </h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Date:</i>&nbsp; {{$booking->date}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Drawn Bank Branch:</i>&nbsp; {{$booking->bank_branch}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Flat Number:</i>&nbsp; {{$booking->flat_number}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Flat Preference:</i>&nbsp; {{$booking->flat_pref}} </h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Payment Schedule:</i>&nbsp; {{$booking->payment_schedule}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Applicant Cnic:</i>&nbsp; {{$booking->cnic}} </h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">S/o., W/o.</i>&nbsp; {{$booking->sowo}}</h6>
                        
                        <h6 class="mt-3"><i  style="color: #445ede;">Address:</i>&nbsp;<textarea id="ck_editor" readonly rows="2"> {{$booking->address}}</textarea></h6>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    @php
                         $names = unserialize($booking->witness_name);
                         $cnic = unserialize($booking->wintess_cnic);
                        $pname = implode(' , ',$names);   
                        $pcnic = implode(' , ',$cnic);   
                        @endphp
                    <div class="mt-3 ml-5">
                        <h6 class="mt-3"><i  style="color: #445ede;">Office:</i>&nbsp; {{$booking->office_no}} </h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Res:</i>&nbsp; {{$booking->res}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Mobile:</i>&nbsp; {{$booking->mobile}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Nominee:</i>&nbsp; {{$booking->nominee}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">S/o., W/o:</i>&nbsp; {{$booking->nominee_sowo}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Nominee Relation:</i>&nbsp; {{$booking->nominee_relation}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Nominee Cnic:</i>&nbsp; {{$booking->nominee_cnic}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Witness Name:</i>&nbsp; {{$pname}}</h6>
                        <h6 class="mt-3"><i  style="color: #445ede;">Witness Cnic:</i>&nbsp; {{$pcnic}}</h6>
                        
                        
                    </div>
                </div>
            </div>
        </div>
       

        </div>
      
    </div>
        </div>
    </div>
</div>


@endsection