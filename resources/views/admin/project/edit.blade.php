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

			<a href="{{route('project')}}" class="btn btn-success fa  fa-address-card"> Tin Tức</a>

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
				<label for="">Chọn user</label>
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="1" {{$listProjects->status==1? "selected": ""}}></option>
					<option value="0"  {{$listProjects->status==0? "selected": ""}}></option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sửa</button>
			</div>
		</form>
	</div>
</div>
@stop()
