@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('booking_form'), 'page_name' => __('create_client')])
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
                                                <h4>Add Client</h4>
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
                    <form action="{{ url('/client/store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row mt-2">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                                @error('name')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Client Cnic</label>
                            <input type="text" name="cnic" class="form-control" value="{{old('cnic')}}" required>
                            @error('cnic')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label>Client Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" required>
                                @error('phone')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="">Client S/o W/o D/o</label>
                            <input type="text" name="sowo" class="form-control" value="{{old('sowo')}}" required>
                            @error('sowo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="ck_editor" name="address" placeholder="Enter Client Address" value="{{old('address')}}" class="form-control" required></textarea>
                            @error('address')
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

@endsection