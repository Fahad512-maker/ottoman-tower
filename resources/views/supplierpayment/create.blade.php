@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('supplier'), 'page_name' => __('create_supplierpay')])
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
                                            <h4>Add Supplier Payments</h4>
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
                    <form action="{{ url('/supplierpay/store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row mt-2">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option selected hidden disabled>-- Select Supplier --</option>
                                    @foreach($supplier as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Project Name</label>
                            <select name="project_id" class="form-control project_id">
                                <option selected hidden disabled>-- Select Project --</option>
                                @foreach($project as $value)
                                <option value="{{$value->id}}">{{$value->projectname}}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <label for="">Supplier Expanse</label>
                            <input type="number" id="supplier_expanse" name="supplier_expanse" placeholder="Enter Supplier Expense" value="{{old('supplier_expanse')}}" class="form-control">
                            @error('supplier_expanse')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Supplier Paid</label>
                            <input type="number" id="supplier_paid" name="supplier_paid" placeholder="Enter Paid Amount" value="{{old('supplier_paid')}}" class="form-control">
                            @error('supplier_paid')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="">Supplier Remainings </label>
                            <input type="number" id="supplier_remaining" readonly name="supplier_remaining" placeholder="Enter Remaining Amount" value="{{old('supplier_remaining')}}" class="form-control">
                            @error('supplier_remaining')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Paid Date</label>
                            <input type="date" name="date" class="form-control" value="{{old('date')}}" required>
                            @error('date')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="">Choose Account</label>
                            <select name="account_type" id="" class="form-control">
                                <option selected hidden disabled>-- Select Account --</option>
                                @foreach($chartaccount as $value)
                                  <option value="{{$value->id}}" class="form-control">{{$value->account_name}} ({{$value->account_type->account_type}})</option>
                                  
                                @endforeach
                                
                            </select>
                            @error('account_type')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Supplier Description</label>
                            <textarea type="text" name="description" placeholder="Enter Description" value="{{old('description')}}" class="form-control"></textarea>
                            @error('description')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
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