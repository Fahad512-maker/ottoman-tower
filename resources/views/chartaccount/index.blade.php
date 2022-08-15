@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('accounts'), 'page_name' => __('manage_chartaccount')])
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
                                            <h4>Manage Accounts</h4>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                                           <a href="{{ url('/chartaccount/create') }}" class="btn btn-primary">Add Account</a>
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
                                <th>Account Type</th> 
                                <th>Account Name</th> 
                                <th>Account Payable</th>
                                <th>Total Paid</th>
                                <th>Total Balance</th> 
                                
                            </tr>
                        </thead>
                        <tbody>
                         
                            @if($chartaccount->isNotEmpty())
                            @foreach($chartaccount as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->account_type->account_type}}</td>
                                <td>{{ $value->account_name }}</td>
                                <td>{{ $value->account_payable }}</td>
                                <td>{{ $value->paid }}</td>
                                
                                {{--<td><img src="{{ asset($value->image) }}" class="img-fluid" width="100" height="100"></td> --}}
                                 <td><a href="{{ url('/chartaccount/'.$value->id.'/edit') }}"><i data-feather="edit"></i></a>
                                   <a href="javascript:void(0)" class="delete_option" data-id="{{ $value->id }}"><i data-feather="trash"></i></a>
                                   {{-- <a href="{{ url('/chartaccount/'.$value->id.'/view') }}"><i data-feather="eye"></i></a> --}}
                                    
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

 @foreach($chartaccount as $key => $value)
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
          <a href="{{ url('/chartaccount/'.$value->id.'/delete') }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach

@endsection