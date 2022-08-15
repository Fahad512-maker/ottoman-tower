@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('material'), 'page_name' => __('create_materialorder')])
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
                                            <h4>Add Material Order</h4>
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
                    <form action="{{ url('/materialorder/store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Material Name</label>
                                <select name="material" id="" class="form-control">
                                    <option selected hidden disabled>-- Select Material--</option>
                                    @foreach($material as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                          
                          <label for="">Supplier</label>
                            <select name="supplier" id="" class="form-control">
                                <option selected hidden disabled>-- Select Supplier --</option>
                                @foreach($supplier as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('supplier')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label for="">Project Name</label>
                          <select name="project_id" id="" class="form-control">
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
                        <div class="col-md-6">
                          <label for="">Quantity</label>
                          <input type="number" name="qty" placeholder="Enter Quantity" class="form-control">
                          @error('qty')
                              <span style="color: red">{{ $message }}</span>
                              @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                         
                          <label for="">Price</label>
                          <input type="number" name="price" placeholder="Enter Price"  class="form-control">
                          @error('price')
                              <span style="color: red">{{ $message }}</span>
                              @enderror
                           
                        </div>
                        <div class="col-md-6">
                          <label for="">Purchase Date</label>
                          <input type="date" name="date"  value="{{old('date')}}" class="form-control" required>
                              @error('date')
                              <span style="color: red">{{ $message }}</span>
                              @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </form>

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