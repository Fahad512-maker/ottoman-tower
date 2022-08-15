@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('employee'), 'page_name' => __('manage_employee_salaries')])
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
                                            <h4>Manage Salaries</h4>
                                        </div>
                                        {{-- <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('') }}" class="btn btn-primary">All Save</a>
                                        </div> --}}
                                        </div>                                                        
                                </div>
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>

                                @endif
                                {{-- <div class="jumbotron">
                                <div class="row"> --}}
                               {{--  <div class="col-lg-6 col-md-6 col-sm-6">
                                <label class="font-weight-bold">Packages:</label>
                                <select name="package_id" class="form-control searcharticlebypackage">
                                <option>-- Select Package --</option>
                                 @foreach($package as $value)   
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                                </select>
                                </div> --}}
                            {{--     
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <label>Publish/Draft</label>
                                <select name="status" class="form-control searchdraftbystatus">
                                <option>-- Select Status --</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                </div>
                                </div>
                                </div> --}}
                                
                 <div class="widget-content widget-content-area br-6 mt-5">
                  <form action="{{ url('/update_paid')}}" method="POST">
                    @csrf
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                      <th><input type="checkbox" class="select_all" id="select-all"></th>
                                        {{-- <th>ID</th> --}}
                                        <th>Employee Name</th>
                                        <th>Cnic</th>
                                        <th>Advance</th>
                                        <th>Remaining</th>
                                        <th>Salary</th>
                                        <th>Designation</th>

                                        <th class="dt-no-sorting">Salary Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($employeesalary->isNotEmpty())
                                    @foreach($employeesalary as $key => $value)
                                    <tr>
                                        <td><input type="checkbox" name="employee_id[]" value="{{$value->employeeof->id}}" class="btn"></td>
                                        <td>{{ $value->employeeof->name }} ({{ $value->employeeof->fname }})</td>
                                        <td>{{ $value->employeeof->cnic }}</td>
                                        
                                        @if($value->employeeof->advance != '' && $value->employeeof->remaining != '' )
                                        <td>{{ $value->employeeof->advance }}</td>
                                        <td>{{ $value->employeeof->remaining }}</td>

                                        @else
                                        <td>0</td>
                                        <td>0</td>
                                        @endif
                                        
                                        <td>{{ $value->employeeof->salary }}</td>
                                        
                                        <td>{{$value->employeeof->designation}}</td>
                                        
                                        <td>
                                          {{-- <input type="hidden" name="employee_id[]" value="{{$value->id}}"> --}}
                                          @if($value->status != 0 && $value->created_at->format('m') == date('m') )
                                          <input type="button"  value='Paid' data-id={{$value->employeeof->id}}  class='btn btn-success m-auto'>
                                          @else
                                          <input type="button"  value='Unpaid' data-id={{$value->employeeof->id}}  class='btn btn-danger m-auto' >
                                          @endif
                                          
                                         </td>
                                    </tr>
                                    @endforeach
                                    @else
                                     <td colspan="9" class="text-center">No Data Available</td>
                                    @endif 
            
                                </tbody>
                            </table>
                            <div class="text-right m-4">
                            <input type="submit" name="submit" value="Save" class="btn btn-lg btn-primary">
                            </div>
                  </form>
                            {{-- <table id="column-filter" class="table">
                              <thead>
                                  <tr>
                                      <th class="checkbox-column dt-no-sorting"> Record No. </th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th class="text-center dt-no-sorting">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="checkbox-column"> 1 </td>
                                      <td>John</td>
                                      <td>Doe</td>
                                      <td>johndoe@yahoo.com</td>
                                      <td><span class="shadow-none badge badge-primary">Approved</span></td>
                                      <td class="text-center"><button class="btn btn-outline-primary btn-sm">View</button></td>
                                  </tr>
                                  <tr>
                                      <td class="checkbox-column"> 2 </td>
                                      <td>Andy</td>
                                      <td>King</td>
                                      <td>andyking@gmail.com</td>
                                      <td><span class="shadow-none badge badge-warning">Pending</span></td>
                                      <td class="text-center"><button class="btn btn-outline-primary btn-sm">View</button></td>
                                  </tr>
                                  <tr>
                                      <td class="checkbox-column"> 3 </td>
                                      <td>Lisa</td>
                                      <td>Doe</td>
                                      <td>lisadoe@live.com</td>
                                      <td><span class="shadow-none badge badge-danger">Suspended</span></td>
                                      <td class="text-center"><button class="btn btn-outline-primary btn-sm">View</button></td>
                                  </tr>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th class="checkbox-column"></th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th></th>
                                  </tr>
                              </tfoot>
                          </table> --}}

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

 {{-- @foreach($employee as $key => $value)
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
                <a href="{{ url('/employee/'.$value->id.'/delete') }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}
  
@endsection