@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('project'), 'page_name' => __('manage_project')])
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
                                            <h4>Manage Projects</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('/project/create') }}" class="btn btn-primary">Add Project</a>
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
                                  <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4" style="margin-top: 4%"><h4>Total Projects Cost:{{$sum}}</h4></div>
                                  </div>                                  
                      <table id="html5-extension" class="table table-responsive table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Project Cost</th>
                                <th>Actual Expense</th>
                                <th>Remaining Fund</th>
                                <th>Progress</th>
                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @if($project->isNotEmpty())
                            @foreach($project as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->projectname }}</td>
                                <td>{{ $value->startdate }}</td>
                                <td>{{ $value->enddate}}</td>
                                <td>{{ $value->cost}}</td>
                                <td>{{ ($value->cost) - ($value->remaining_cost) }}</td>
                                <td>{{ $value->remaining_cost}}</td>
                                @if($value->progress == '0')
                                
                                  <td>On Going</td>  
                                
                                
                                @elseif($value->progress == '1')
                                
                                  <td>Finished</td>
                                                               
                                @else
                                
                                <td>Cancel</td>
                                

                                @endif
                                 {{-- <td><img src="{{ asset($value->image) }}" class="img-fluid" width="100" height="100"></td> --}}
                                 <td><a href="{{ url('/project/'.$value->id.'/edit') }}"><i data-feather="edit"></i></a>
                                    <a href="javascript:void(0)" class="delete_option" data-id="{{ $value->id }}"><i data-feather="trash"></i></a>
                                    <a href="{{ url('/project/'.$value->id.'/view') }}"><i data-feather="eye"></i></a>
                                    <a href="javascript:void(0)" class="add_fund badge badge-primary" data-id="{{ $value->id }}">Add Fund</a>
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

 @foreach($project as $key => $value)
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
                <a href="{{ url('/project/'.$value->id.'/delete') }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach
  @foreach($project as $key => $value)
  <div class="modal fade" id="addfund-{{$value->id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
          <h5>Add More Fund</h5>
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
              <form action="{{ url('/project/'.$value->id. '/store_fund') }}"  method="POST" enctype="multipart/form-data">
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