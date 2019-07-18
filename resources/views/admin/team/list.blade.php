@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách team</h3>
	</div>
	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">

				<a href="{{route('them-team')}}" class="btn btn-success fa  fa-plus">  Thêm mới</a>
				<a href="{{route('team')}}" class="btn btn-success fa  fa-address-card"> Danh Sách Team</a>

			</div>
		</form>


	</div>
	@if(Session::has('success'))
	<div class="col-md-6">
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{Session::get('success')}}</strong> Good !
		</div>
	</div>
	@endif
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				
				<th>Ngày tạo</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listTeam as $b)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{!!$b->name!!}</td>
				
				
				<td>
					@if($b->status==1)
					{{"Hiển thị"}}
					@else
					{{"Ẩn"}}

					@endif
				</td>
				<td>{!!$b->created_at!!}</td>
				<td>
					<a href="{{route('sua-team',['id'=> $b->id])}}" class="btn btn-primary fa  fa-pencil">Sửa</a>
					{!! csrf_field() !!}
					{{method_field('DELETE')}}
					<a href="{{route('xoa-team',$b->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop()