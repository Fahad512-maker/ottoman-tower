@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('contractor'), 'page_name' => __('edit_contractorpay')])
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
                                            <h4>Edit Contractor Payments</h4>
                                        </div>
                                        
                                        </div>                                                        
                                </div>
                                
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ Session::get('success')}}
                                </div>
                                
                                @endif
                                {{-- <div class="jumbotr on">
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
                    <form action="{{ url('/contractorpay/'.$contractorpay->id.'/update') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row mt-2">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label>Contractor Name</label>
                                
                                <select name="contractor_id" id="" class="form-control">
                                    
                                    @foreach($contractor as $value)
                                    <option value="{{$value->id}}" {{$contractorpay->contractor_id == $value->id  ? 'selected' : '' }} >{{$value ->name}}</option>
                                    @endforeach
                                </select>
                                @error('contractor_id')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Project Name</label>
                            <select name="project_id" id="" class="form-control">
                                @foreach($project as $value)
                                <option value="{{$value->id}}"{{$contractorpay->project_id == $value->id  ? 'selected' : '' }}>{{$value->projectname}}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <label for="">Contractor Date</label>
                            <input type="date" name="date" class="form-control" value="{{$contractorpay->date}}" required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Contractor Expense</label>
                            <input type="number" id="expense" name="expense" placeholder="Enter Expense" value="{{$contractorpay->expense}}" class="form-control">
                            @error('expense')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="">Contractor Paid</label>
                            <input type="number" id="paid" name="paid" placeholder="Enter Paid Amount" value="{{$contractorpay->paid}}" class="form-control">
                            @error('paid')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Contractor Remaining</label>
                            <input type="number" readonly id="remaining" name="remaining" value="{{$contractorpay->remaining}}" class="form-control">
                            @error('remaining')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                          <label for="">Choose Account</label>
                          <select name="account_type" id="" class="form-control">
                              
                              @foreach($chartaccount as $value)
                                <option value="{{$value->id}}" {{$contractorpay->account_type == $value->id ? 'selected' : ''}} class="form-control">{{$value->account_name}} ({{$value->account_type->account_type}})</option>
                                
                              @endforeach
                              
                          </select>
                            @error('account_type')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Contractor Description</label>
                            <textarea type="text" name="description" placeholder="Enter Description" class="form-control">{{$contractorpay->description}}</textarea>
                            @error('description')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>

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