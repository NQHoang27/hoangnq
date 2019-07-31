@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm mới team</h3>
	</div>
	@if(Session::has('message'))
	<div>
		<div class="alert alert-{{Session::get('level')}}">
			<p>{{Session::get('message')}}</p>
		</div>
	</div>
	@endif
	<div class="panel-body">
		<div class="row">
			<form action="{{route('them-team')}}" method="POST" role="form" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-sm-12">
					<div class="form-group">
						<label for="">Tên team</label>
						<input type="text" class="form-control" name="name" placeholder="Nhập tên team" >
						@if($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>
						<div class="form-group">
						<label for="">Tên leader</label>
						<input type="text" class="form-control" name="leader" placeholder="Nhập tên leader" >

						@if($errors->has('leader'))
						<div class="help-block" style="color: red">
							{!!$errors->first('leader')!!}
						</div>
						@endif
					</div>				
				</div>				
				<div class="form-inline text-center">
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
