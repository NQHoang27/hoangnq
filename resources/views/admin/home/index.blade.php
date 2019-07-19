@extends('admin.layouts.backend')
@section('backend')
	<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>@php $users = DB::table('users')->count();echo $users; @endphp</h3>

              <h4>User</h4>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>@php $teams = DB::table('teams')->count();echo $teams; @endphp</h3>

              <h4>Teams</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>@php $projects = DB::table('projects')->count();echo $projects; @endphp</h3>

              <h4>Project</h4>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="text-center" style="text-transform: uppercase;">
          <h1>Chào mừng bạn đến với trang quản trị </h1>
        </div>
      </div>
      <!-- /.row -->
    </section>
@stop()