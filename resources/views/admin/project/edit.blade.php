@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<div class="form-group">

			<a href="{{route('project')}}" class="btn btn-success fa  fa-address-card">Dự án</a>

		</div>
		<form action="{{route('project.update',$listProjects->id)}}" method="POST" role="form">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}

			<div class="form-group">
				<label for="">Tên Project</label>
				<input type="text" class="form-control" name="name"  value="{{old('name',isset($listProjects)? $listProjects->name:null)}}">

				@if($errors->has('name'))
				<div class="help-block" style="color: red">
					{!!$errors->first('name')!!}
				</div>
				@endif

			</div>
			<div class="form-group">
				<label for="">User</label>
				<select name="id_user" id="inputStatus" class="form-control" required="required"  value="{{old('id_user')}}">
					<option value="0">--Chọn user--</option>
					@foreach($listUser as $item)
					<option value="{{$item->id}}">{{$item->name}}</option>
					@endforeach

				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sửa</button>
			</div>
		</form>
	</div>
</div>
@stop()
