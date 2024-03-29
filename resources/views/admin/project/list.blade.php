@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
	<div class="panel-heading">
		<h3 class="panel-title">Có: <b>{{$countProject}}</b> dự án</h3>
	</div>
	<div class="panel-body">
		<form action="" class="form-inline"  role="form">
			<div class="form-group">
				<input  class="form-control "  name="search" placeholder="Tìm kiếm dự án">
			</div>
			<button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
			<div class="form-group">
				<a href="{{route('them-project')}}" class="btn btn-success fa  fa-plus">  Thêm mới</a>
				<a href="{{route('project')}}" class="btn btn-success fa  fa-address-card"> Dự án</a>
			</div>
		</form>
	</div>
	@if(Session::has('message'))
	<div class="alert alert-success">{!! Session::get('message') !!}&times;</div>
	@endif
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên projece</th>
				<th>User</th>
				<th>Ngày tạo</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listProject as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{!! $item->name !!}</td>				
				<td>{{$item->id_user}}</td>
				<td>{{$item->created_at}}</td>
				<td>
					<a href="{{route('sua-project',$item->id)}}" title="" class="label label-primary fa  fa-pencil">Sửa</a>
					{!! csrf_field() !!}
					{{method_field('DELETE')}}
					<a href="{{route('xoa-project',$item->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i>Xóa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
<div class="form-group text-center">
	{{ $listProject->links() }}
</div>
@stop()