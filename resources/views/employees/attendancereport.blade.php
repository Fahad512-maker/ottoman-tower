@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('employee'), 'page_name' => __('manage_employee_attendancereport')])
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
                                            <h4>Employees Attendance report</h4>
                                        </div>
                                        
                                        </div>                                                        
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>

                                @endif
                                <div class="jumbotron">
                                  <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                      <label class="font-weight-bold">From Date:</label>
                                      <input type="date" name="date" id="startdate" class="form-control attdate" value="" required>
                                    </div>
                                
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                      <label class="font-weight-bold">To Date:</label>
                                      <input type="date" name="date" id="enddate" class="form-control attdate" value="" required>
                                    </div>
                                  </div>
                                </div>
                                
                                
                 <div class="widget-content br-6 mt-5">
                    <div>
                     <table id="" class="table table-hover non-hover emptable" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Employee</th>
                                <th>Date</th>
                                <th class="dt-no-sorting">Attendance Status</th>
                            </tr>
                        </thead>
                        
                          <tbody>
                            @if($attendance->isNotEmpty())
                            @foreach($attendance as $key => $value)
                            <tr>
                                {{-- <td>{{ $key+1 }}</td> --}}
                                <td>{{ $value->employeeof->name}}</td>
                                <td>{{ $value->date}}</td>
                                <td>{{ $value->attendance_statuses}}</td>
                            </tr>
                            @endforeach
                            @else
                             <td colspan="6" class="text-center">No Data Available</td>
                            @endif 
     
                        </tbody>
                    </table>

                    </div>
                        </div>
                                <div class="widget-content widget-content-area mt-5">
                                   {{--  <form>
                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="Email address">
                                            <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control" id="sPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group form-check pl-0">
                                            <div class="custom-control custom-checkbox checkbox-info">
                                                <input type="checkbox" class="custom-control-input" id="sChkbox">
                                                <label class="custom-control-label" for="sChkbox">Subscribe to weekly newsletter</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn mt-3" style="background-color: #1abc9c; color: white;">Submit</button>
                                    </form> --}}

                                </div>
                            </div>
                        </div>
</div>
</div>
</div>
{{--  @foreach($article as $key => $value)
<div class="modal fade" id="{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <table class="table table-hover non-hover">
        <thead>
        <tr>
        <th>#</th>
        <th>Options</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($value->options))
            <?php $series=1;?>
        @foreach($value->options as $val)
        <tr>
        <td>{{ $series++ }}</td>
        <td>{{ $val }}</td>
        </tr>
        @endforeach
        @else
        <tr>
        <td>No Data Available</td>
        </tr>
        @endif
        </tbody>
         </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color:#1abc9c; color:white;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

  @foreach($article as $key => $value)
<div class="modal fade" id="{{$value->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="background-color:#1abc9c; color:white;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}
{{-- 
 @foreach($attendance as $key => $value)
<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Attendance Model</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
        <h5>Are You Sure To Record Attendance..! It Can't be changed after Record ..</h5>
        </div>
        <div class="modal-footer">
          <form>
            <a class="btn text-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</a>
          <input type="submit" class="btn btn-primary mt-1" value="All Save">
        </form>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

@endsection