@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('employee'), 'page_name' => __('manage_employee')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
<div class="container" style="margin-top: 50px;">
<div class="container">
	                        <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                        <div class="row">
                                          <div class="col-md-9">
                                              <h4>Manage Employees</h4>
                                          </div>
                                          <div class="col-md-3">
                                            <a href="{{ url('/employee/create') }}" class="btn btn-primary">Add Employee</a>
                                          </div>
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
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Contact No</th>
                                        <th>Designation</th>
                                        <th>Salary</th>
                                        <th>Advance Salary</th>
                                        <th>Remaining</th>
                                        <th class="dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($employee->isNotEmpty())
                                    @foreach($employee as $key => $value)
                                    <tr>
                                        {{-- <td>{{ $key+1 }}</td> --}}
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->fname }}</td>
                                        <td>{{ $value->contact }}</td>
                                        <td>{{ $value->designation}}</td>
                                        <td>{{ $value->salary}}</td>
                                        @if($value->advance != '' && $value->remaining != '')
                                            <td>{{$value->advance}}</td>
                                            <td>{{$value->remaining}}</td>
                                        @else
                                        <td>0</td>
                                        <td>0</td>
                                        @endif
                                                                              
                                         {{-- <td><img src="{{ asset($value->image) }}" class="img-fluid" width="100" height="100"></td> --}}
                                         <td><a href="{{ url('/employee/'.$value->id.'/edit') }}"><i data-feather="edit"></i></a>
                                           <a href="javascript:void(0)" class="delete_option" data-id="{{ $value->id }}"><i data-feather="trash"></i></a>
                                           <a href="{{ url('/employee/'.$value->id.'/view') }}"><i data-feather="eye"></i></a>
                                           <a href="javascript:void(0)" class="advance badge badge-primary" data-id="{{ $value->id }}">Advance Salary</a> 
                                         </td>
                                    </tr>
                                    @endforeach
                                    @else
                                     <td colspan="9" class="text-center">No Data Available</td>
                                    @endif 
            
                                </tbody>
                            </table>

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

 @foreach($employee as $key => $value)
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
  @endforeach
  @foreach($employee as $key => $value)
  <div class="modal fade" id="advance-{{$value->id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <h5>Release Advance Salary</h5>
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
              <form action="{{ url('/employee/'.$value->id. '/advancesalary') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                  <label for="">Salary</label>
                  <input type="hidden" name="employee_id" value="{{$value->id}}">
                  <input type="hidden" name="employee_salary" value="{{$value->salary}}">
                  <input type="number" placeholder=" <= {{$value->salary}}" name="advance" class="form-control" value="{{old('fund')}}">
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