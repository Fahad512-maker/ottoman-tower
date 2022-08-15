@extends('layouts.buildapp' , ['class' => 'off-canvas-sidebar', 'category_name' => __('project'), 'page_name' => __('create_project')])
@section('page_title' ,$page_title)
@section('content')

<div id="content" class="main-content">
    <div class="container" style="margin-top: 50px;">
        <div class="container">
            <h2>Project Details</h2>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <h3 class="" style="font-size: 30px; font-weight: bold;"><svg xmlns="http://www.w3.org/2000/svg" style="color:#445ede;" width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>&nbsp; {{ucwords($project->projectname)}}</h3>
                </div>
                <div class="offset-2 col-lg-2 col-md-2 col-sm-2 col-2">
                    <a href="{{ url('/project/'.$project->id.'/edit') }}" class="btn" style="background: #445ede; color: white;"><i data-feather="edit"></i></a>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <div class="mt-3 ml-5">
                        <h6 class="mt-3"><i data-feather="calendar" style="color: #445ede;"></i>&nbsp; {{$project->startdate}}</h6>
                        <h6 class="mt-3"><i data-feather="calendar" style="color: #445ede;"></i>&nbsp; {{$project->enddate}} </h6>
                        <h6 class="mt-3"><i data-feather="dollar-sign" style="color: #445ede;"></i>&nbsp; {{$project->cost}}</h6>
                        <h6 class="mt-3"><i data-feather="map-pin" style="color: #445ede;"></i>&nbsp; {{$project->address}}</h6>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    @php
                        $pCodes = unserialize($project->productcode);
                        $pnames = unserialize($project->productname);
                        $pqtys = unserialize($project->qty);
                        $pcode = implode(' , ',$pCodes);   
                        $pname = implode(' , ',$pnames);   
                        $pqty = implode(' , ',$pqtys);   
                        @endphp
                    <div class="mt-3 ml-5">
                        <h6 class="mt-3"><i data-feather="hash" style="color: #445ede;"></i>&nbsp; {{ $pcode}}</h6>
                        <h6 class="mt-3"><i data-feather="home" style="color: #445ede;"></i>&nbsp; {{ $pname }}</h6>
                        <h6 class="mt-3"><i data-feather="dollar-sign" style="color: #445ede;"></i>&nbsp; {{$pqty}}</h6>
                        <h6 class="mt-3"><i data-feather="user" style="color: #445ede;"></i>&nbsp; {{ $project->progress}}</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row ml-5">
                <div class="col-md-3"> 
                    <a class="btn btn-primary" href="{{url("/manage/".$project->id."/supplier")}}"  style="background: #445ede; color: white;"><i data-feather="user"></i> &nbsp; Supplier</a>
                    </div>
                <div class="col-md-3"> 
                    <a class="btn btn-primary"  style="background: #445ede; color: white;"><i data-feather="user"></i> &nbsp; Material</a>
                </div>
                <div class="col-md-3"> 
                    <a class="btn btn-primary"  style="background: #445ede; color: white;"><i data-feather="user"></i> &nbsp; Contractor</a>
                </div>
                <div class="col-md-3"> 
                    <a class="btn btn-primary"  style="background: #445ede; color: white;"><i data-feather="user"></i> &nbsp; Employee</a>
                </div>
            </div>
            
        </div> --}}
        {{-- <div class="progress br-30">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>PHP</span> <span>25%</span> </div></div>
        </div> --}}
        {{-- <div class="progress br-30">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Wordpress</span> <span>50%</span> </div></div>
        </div> --}}
        {{-- <div class="progress br-30">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Javascript</span> <span>70%</span> </div></div>
        </div>
        <div class="progress br-30">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>jQuery</span> <span>60%</span> </div></div>
        </div> --}}
       {{-- @if($users->package_id != '3')
       @if(!empty($users->user_meal_plan->meal_plan_id) || !empty($users->user_workout_plan->workout_plan_id))
        <div class="card mt-5">
        <div class="card-header">
        <h3>Assigned Plans</h3>
        </div>
        <form action="{{ url('assign_plan_starting_date/'.$users->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="card-body">
         <table class="table table-bordered">
                <thead>
                    <tr>
                      <th><i data-feather="clipboard"></i>&nbsp;Meal Plan</th>
                      <th><i data-feather="activity"></i>&nbsp;Workout Plan</th>
                      <th><i data-feather="calendar"></i>&nbsp;Starting Date</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    @if(!empty($users->user_meal_plan->meal_plan_id))
                <td class="font-weight-bold"><a href="{{ url('/meal_plans/'.$users->user_meal_plan->meal_plan_id) }}">@if(!empty($users->user_meal_plan->meal_plan_id)) {{ $users->user_meal_plan->meal_plan->title }} @endif</a></td>
                     @else
                     <td></td>
                     @endif
                    @if(!empty($users->user_workout_plan->workout_plan_id))
                <td class="font-weight-bold"><a href="{{ url('/workout_plan/'.$users->user_workout_plan->workout_plan_id) }}">@if(!empty($users->user_workout_plan->workout_plan_id)) {{ $users->user_workout_plan->workout_plan->title }} @endif</a></td>
                    @else
                    <td></td>
                    @endif
                    @if(empty($users->plan_active_date))
                <td><input type="date" name="plan_active_date" class="form-control" value="{{date('m/d/y',strtotime($users->plan_active_date))}}" required></td>
                   @else
                   <td class="font-weight-bold">{{date('m/d/Y',strtotime($users->plan_active_date))}}</td>
                   @endif
                </tr>
                </tbody>
          </table>
          <input type="hidden" name="user_id" value="{{ $users->id }}">
        </div>
        <div class="card-footer">
        <div class="form-group text-right">
        <input type="submit" name="submit" class="btn" style="background-color: #445ede;color: white;" value="@if(!empty($users->plan_active_date)) Started @else Start @endif" @if(empty($users->user_workout_plan->workout_plan_id) || !empty($users->plan_active_date)) disabled @else  @endif>
        </div>
        </div>
    </form> --}}
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
          <button type="button" class="btn" style="background-color:#445ede; color:white;" data-dismiss="modal">Close</button>
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
          <button type="button" class="btn" style="background-color:#445ede; color:white;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

 {{-- @foreach($project as $key => $value)
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
  @endforeach --}}

@endsection