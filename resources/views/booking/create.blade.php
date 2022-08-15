@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('booking_form'), 'page_name' => __('create_booking')])
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
                                    <h4>Application Form</h4>
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
                        <form action="{{ url('/booking/store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment By</label>
                                        <input type="text" name="payment" placeholder="Enter Payment By" value="{{old('payment')}}" class="form-control paymentby">
                                        @error('payment')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Number</label>
                                        <input type="number" name="number" placeholder="Enter Number" value="{{old('number')}}" class="form-control">
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
                                        <input type="date" name="date" class="form-control" value="{{old('date')}}" required>
                                        @error('phone')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Drawn on Branch Brand</label>
                                        <input type="text" name="bank_branch" placeholder="Enter Drawn Bank Branch" value="{{old('bank_branch')}}" class="form-control">
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
                                        <input type="text" name="flat_number" placeholder="Enter Flat Number" value="{{old('flat_number')}}" class="form-control">
                                        @error('flat_number')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Flat/Shop Size</label>
                                        <input type="text" name="size" placeholder="Enter Address" value="{{old('size')}}" class="form-control">
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
                                        <input type="text" name="flat_pref" placeholder="Enter Flat Preference" value="{{old('flat_pref')}}" class="form-control">
                                        @error('flat_pref')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Payment Schedule</label>
                                        <input type="text" name="payment_schedule" placeholder="Enter Payment Schedule" value="{{old('payment_schedule')}}" class="form-control">
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
                                        {{-- <input type="text" name="applicant" placeholder="Enter Applicant Name" value="{{old('applicant')}}" class="form-control"> --}}
                                        <select name="applicant" id="" class="form-control applicant">
                                            <option selected hidden disabled>-- Select Client --</option>
                                            @foreach($client as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('applicant')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">CNIC#</label>
                                    <input type="text" name="cnic" placeholder="Enter CNIC" value="{{old('cnic')}}" class="form-control cnic" readonly>
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
                                        <input type="text" name="sowo" placeholder="Enter S/o., W/o." value="{{old('sowo')}}" class="form-control sowo" readonly>
                                        @error('sowo')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number Office</label>
                                        <input type="text" name="office_no" placeholder="Enter Office No" value="{{old('office_no')}}" class="form-control">
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
                                        <input type="text" name="res" placeholder="Res" value="{{old('res')}}" class="form-control" required>
                                        @error('res')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="text" name="mobile" placeholder="Enter Mobile No" value="{{old('mobile')}}" class="form-control mobile" required readonly>
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
                                        <textarea class="form-control address" placeholder="Address" readonly required></textarea>
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
                                    <input type="text" name="nominee" placeholder="Enter Nominee" value="{{old('nominee')}}" class="form-control">
                                    @error('nominee')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">S/o, W/o</label>
                                    <input type="text" name="nominee_sowo" placeholder="Enter Mobile No" value="{{old('nominee_sowo')}}" class="form-control">
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
                                    <input type="text" name="nominee_relation" placeholder="Enter Relation with Applicant" value="{{old('nominee_relation')}}" class="form-control">
                                    @error('nominee_relation')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nominee CNIC No</label>
                                    <input type="text" name="nominee_cnic" placeholder="Enter Nominee CNIC" value="{{old('nominee_cnic')}}" class="form-control">
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
                            <div class="col-md-5">
                              <div class="form-group">
                                  <input type="text" name="witness_name[]" placeholder="Name" value="{{old('witness_name')}}" class="form-control" required> 
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                              <input type="text" name="wintess_cnic[]" placeholder="CNIC #" value="{{old('witness_cnic')}}" class="form-control" required> 
                              </div>
                            </div>
                            
                        </div>
                        <div class="showpro"></div>
                        <div class="row addprobtn">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" class="btn btn-primary addpro">Add More Witness</a>
                            </div>


                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--   @foreach($article as $key => $value)
<div class="modal fade" id="delete-{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Modal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        <h5>Are you Sure?</h5>
        </div>
        <div class="modal-footer">
          <a class="btn" style="background-color:#fff; color:#1abc9c;" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/article_delete/'.$value->id) }}" class="btn" style="background-color:#1abc9c; color:white;">Delete</a>
        </div>
      </div>
      
    </div>
  </div> --}}
{{--   @endforeach --}}

@endsection