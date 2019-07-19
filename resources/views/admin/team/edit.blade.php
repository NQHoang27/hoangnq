@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('team.update',$editTeams->id)}}" method="POST" role="form" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('put')}}
			<div class="form-group">
				<label>Tên team</label>
				<input type="text" class="form-control form-control-line"
				name="name" value="{!! old('name'),isset($editTeams)? $editTeams->name:Null !!}">
			</div>
			<div class="form-group">
				<label>Tên leader</label>
				<input type="text" class="form-control form-control-line"
				name="leader" value="{!! old('leader'),isset($editTeams)? $editTeams->leader:Null !!}">
			</div>
			
			<div class="form-group">
				<button class="btn btn-success text-center" type="submit">Cập nhật</button>
			</div>


			
		</form>
	</div>
</div>
@stop()
