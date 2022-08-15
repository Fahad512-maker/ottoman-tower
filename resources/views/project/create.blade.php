@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('project'), 'page_name' => __('create_project')])
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
                                                <h4>Add Project</h4>
                                                
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
                    <form action="{{ url('/project/store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" name="projectname"  class="form-control" placeholder="Enter Project Name" value="{{old('projectname')}}" required>
                                @error('projectname')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <label class="form-label">Project Picture</label>
                            <input class="form-control-file" name="picture" id="picture" type="file">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="startdate"  value="{{old('startdate')}}" class="form-control" required>
                                @error('startdate')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date </label>
                                <input type="date" name="enddate" class="form-control" value="{{old('enddate')}}" required>
                                @error('enddate')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                  <input type="text" name="productcode[]" placeholder="Product Code" value="{{old('productcode')}}" class="form-control" required> 
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                              <input type="text" name="productname[]" placeholder="Product Name" value="{{old('productname')}}" class="form-control" required> 
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                              <input type="text" name="qty[]" placeholder="Product Quantity" value="{{old('qty')}}" class="form-control" required> 
                              </div>
                          </div>
                          
                        </div>
                        <div class="showpro"></div>
                    



                <div class="row">
                    <div class="col-md-12">
                        <a href="javascript:void(0)" class="btn btn-primary addpro">Add More Product</a>
                    </div>
                </div>
                    <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Budget Cost</label>
                            <input type="text" name="cost"  value="{{old('cost')}}" class="form-control" required>
                            @error('cost')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}" required>
                            @error('address')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Progress</label>
                            <select name="progress" id="" class="form-control">
                                    <option value="0">On Going</option>
                                    <option value="1">Finished</option>
                                    <option value="2">Cancel</option>
                            </select>
                            @error('progress')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
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