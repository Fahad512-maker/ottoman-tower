@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('booking_form'), 'page_name' => __('manage_bookings')])
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
                                            <h4>Manage Bookings</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('/booking/create') }}" class="btn btn-primary">Add Booking</a>
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
                    <div class="table-responsive">
                      <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Applicant</th>
                                <th>S/o., W/o.</th>
                                <th>Cnic</th>
                                <th>Mobile</th>
                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @if($booking->isNotEmpty())
                            @foreach($booking as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->clientof->name }}</td>
                                <td>{{ $value->sowo }}</td>
                                <td>{{ $value->cnic}}</td>
                                <td>{{ $value->mobile}}</td>
                               
                                 {{-- <td><img src="{{ asset($value->image) }}" class="img-fluid" width="100" height="100"></td> --}}
                                 <td><a href="{{ url('/booking/'.$value->id.'/edit') }}"><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="delete_option" data-id="{{ $value->id }}"><i data-feather="trash"></i></a>
                                    <a href="{{ url('/booking/'.$value->id.'/view') }}"><i data-feather="eye"></i></a>
                                    <a href="{{ url('/booking/'.$value->id.'/print') }}" target="_blank" class="badge badge-primary" >Print</a>
                                    <a href="javascript:void(0)" class="booking_option" data-id="{{ $value->id }}"><i data-feather="trash"></i></a>
                                 </td>
                            </tr>
                            @endforeach
                            @else
                             <td colspan="9" class="text-center">No Data Available</td>
                            @endif 
    
                        </tbody>
                    </table>

                    </div>
                        </div>
                                
                            </div>
                        </div>
</div>
</div>
</div>
{{-- Delete Modal --}}
 @foreach($booking as $key => $value)
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
          <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
                <a href="{{ url('/booking/'.$value->id.'/delete') }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach
  {{-- End Delete --}}

  {{-- Booking Modal --}}
 @foreach($booking as $key => $value)
 <div class="modal fade" id="booking-{{$value->id}}" role="dialog">
     <div class="modal-dialog modal-lg">
     
       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Start Booking</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           
         </div>
         <div class="modal-body">
         <h5>{{$value->clientof->name}}</h5>
         <form action="" class="form">
          <div class="row">
            <div class="col-md-6">
              <label for="">Project</label>  
              <select name="project" id="project" class="form-control project" required>
              <option value="" selected hidden disabled>-Select Project-</option>
              @foreach ($project as $item)
              <option value="{{$item->id}}">{{$item->projectname}}</option>
              @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Product</label>  
              <select name="product" id="product" class="form-control product" required>
              </select>
            </div>
          </div>  
          <h4 class="modal-title mt-2">Payment Procedure </h4>
          <div class="row">
            <div class="col-md-6">
              <label for="">Quantity</label>  
             <input type="number" name="qty" placeholder="Quantity" class="form-control" id="qty" required>
            </div>
            <div class="col-md-6">
              <label for="">Price Per Unit</label>  
             <input type="number" name="price" placeholder="Enter Price" class="form-control" id="price" required>
            </div>
          </div>  
  
          <div class="row">
            <div class="col-md-6">
              <label for="">Total</label>  
             <input type="number" name="total"  class="form-control" id="total" required readonly>
            </div>
            <div class="col-md-6">
              <label for="">Booking Payment</label>  
             <input type="number" name="advance" placeholder="Enter Booking Payment" class="form-control" id="advance" required>

            </div>
          </div>  
  
          <div class="row">
            <div class="col-md-6">
              <label for="">Remaining</label>  
             <input type="number" name="remaining"  class="form-control" id="remaining" required readonly>
            </div>
            <div class="col-md-6">
              <label for="">No.of Installments</label>  
             <input type="number" name="numinstallment" placeholder="Enter No. of Installment" class="form-control" id="numinstallment" required>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-6">
              <label for="">Installment</label>  
             <input type="number" name="installment"  class="form-control" id="installment" required readonly>
            </div>
            <div class="col-md-6">
              {{-- <label for="">No.of Installment</label>  
             <input type="number" name="installment" placeholder="Enter Installment" class="form-control" id="installment" required> --}}
            </div>
          </div>  
        </form> 
          
         </div>
         <div class="modal-footer">
          <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
           <a href="{{ url('/booking/'.$value->id.'/delete') }}" class="btn btn-primary">Delete</a>
         </div>
       </div>
       
     </div>
   </div>
   @endforeach
   
   {{-- End Booking --}}
  @foreach($booking as $key => $value)
  <div class="modal fade" id="addfund-{{$value->id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
          <h5>Add More Fund</h5>
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
              <form action="{{ url('/booking/'.$value->id. '/store_fund') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                  <label for="">Fund</label>
                <input type="number" placeholder="Enter Fund" name="fund" class="form-control" value="{{old('fund')}}">
                </div>
                <div class="col-md-12 mt-2">
                  <input type="submit" class="btn btn-primary">
                  <a class="btn btn-primary" data-dismiss="modal">Cancel</a>
                </div>

              </form>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
    @endforeach
  
@endsection