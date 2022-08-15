@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('booking_form'), 'page_name' => __('edit_booking')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
    <div class="container" style="margin-top: 50px;">
        <div class="container">
	        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-9 col-md-9 col-sm-9 col-9">
                                    <h4>Edit Application Form</h4>
                                </div>
                            </div>                                                        
                    </div>
                                
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success')}}
                    </div>
                                
                    @endif

                    <div class="widget-content widget-content-area br-6 mt-5">
                        <form action="{{ url('/booking/'.$booking->id.'/update') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment By</label>
                                        <input type="text" name="payment" placeholder="Enter Payment By" value="{{$booking->payment}}" class="form-control">
                                        @error('payment')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Number</label>
                                        <input type="number" name="number" placeholder="Enter Number" value="{{$booking->number}}" class="form-control">
                                        @error('number')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dated</label>
                                        <input type="date" name="date" class="form-control" value="{{$booking->date}}" required>
                                        @error('phone')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Drawn on Branch Brand</label>
                                        <input type="text" name="bank_branch" placeholder="Enter Drawn Bank Branch" value="{{$booking->bank_branch}}" class="form-control">
                                        @error('bank_branch')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Flat Number</label>
                                        <input type="text" name="flat_number" placeholder="Enter Flat Number" value="{{$booking->flat_number}}" class="form-control">
                                        @error('flat_number')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Flat/Shop Size</label>
                                        <input type="text" name="size" placeholder="Enter Address" value="{{$booking->size}}" class="form-control">
                                        @error('size')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Flat Preference</label>
                                        <input type="text" name="flat_pref" placeholder="Enter Flat Preference" value="{{$booking->flat_pref}}" class="form-control">
                                        @error('flat_pref')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Payment Schedule</label>
                                        <input type="text" name="payment_schedule" placeholder="Enter Payment Schedule" value="{{$booking->payment_schedule}}" class="form-control">
                                        @error('payment_schedule')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name of Applicant</label>
                                        <input type="text" name="applicant" placeholder="Enter Applicant Name" value="{{$booking->applicant}}" class="form-control">
                                        @error('applicant')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">CNIC#</label>
                                    <input type="text" name="cnic" placeholder="Enter CNIC" value="{{$booking->cnic}}" class="form-control">
                                    @error('cnic')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">S/o., W/o.</label>
                                        <input type="text" name="sowo" placeholder="Enter S/o., W/o." value="{{$booking->sowo}}" class="form-control">
                                        @error('sowo')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number Office</label>
                                        <input type="text" name="office_no" placeholder="Enter Office No" value="{{$booking->office_no}}" class="form-control">
                                        @error('office_no')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Res:</label>
                                        <input type="text" name="res" placeholder="Res" value="{{$booking->res}}" class="form-control">
                                        @error('res')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="text" name="mobile" placeholder="Enter Mobile No" value="{{$booking->mobile}}" class="form-control">
                                        @error('mobile')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Mailing Address</label>
                                        <textarea id="ck_editor" name="address" placeholder="Enter Mailing Address" class="form-control">{{$booking->address}}</textarea>
                                        @error('address')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        {{-- Nominee  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name of Nominee</label>
                                    <input type="text" name="nominee" placeholder="Enter Nominee" value="{{$booking->nominee}}" class="form-control">
                                    @error('nominee')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">S/o, W/o</label>
                                    <input type="text" name="nominee_sowo" placeholder="Enter Mobile No" value="{{$booking->nominee_sowo}}" class="form-control">
                                    @error('nominee_sowo')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Relation with Applicant</label>
                                    <input type="text" name="nominee_relation" placeholder="Enter Relation with Applicant" value="{{$booking->nominee_relation}}" class="form-control">
                                    @error('nominee_relation')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nominee CNIC No</label>
                                    <input type="text" name="nominee_cnic" placeholder="Enter Nominee CNIC" value="{{$booking->nominee_cnic}}" class="form-control">
                                    @error('nominee_cnic')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Witness --}}
                        <div class="row">
                            <div class="form-group">
                                <label for="">Witness</label>
                            </div>
                        </div>
                        <div class="row">
                            @php
                            
                            $pName = unserialize($booking->witness_name); 
                            $pcnic = unserialize($booking->wintess_cnic);   
                        @endphp
                        
                        @foreach($pName as $key => $item)
                            <div class="col-md-5">
                              <div class="form-group">
                                  <input type="text" name="witness_name[]" placeholder="Name" value="{{$pName[$key]}}" class="form-control" required> 
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <input type="text" name="wintess_cnic[]" placeholder="CNIC #" value="{{$pcnic[$key]}}" class="form-control" required> 
                              </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="showpro"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" class="btn btn-primary addpro">Add More Witness</a>
                            </div>


                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection