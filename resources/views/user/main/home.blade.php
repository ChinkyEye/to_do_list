@extends('user.main.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="text-capitalize">Dashboard </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/')}}/user">Home</a></li>
          <li class="breadcrumb-item active"> Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <h1>Welcome {{Auth::user()->name}}</h1>
    <div class="row">
      <div class="col-md-12 row" >
        <div class="col-md-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{$count_list['completed']}}</h3>

              <p>Total Complete Tasks</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-alt"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$count_list['pending']}}</h3>

              <p>Total Pending Tasks</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-alt"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label class="font-weight-bold">Progress Bar</label>
        <div class="progress" style="height: 30px;">
          <div class="progress-bar bg-info progress-bar-striped"  role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
            {{ round($progress) }}%
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection