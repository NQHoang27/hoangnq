@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	<div class="panel-body">

		<form action="{{route('them-project')}}" method="POST" role="form">
			{!! csrf_field() !!}
			<div class="container">
				<div class="row">
					<div class="form-group">
						<a href="{{route('project')}}" class="btn btn-success fa  fa-address-card"> Project</a>
					</div>
					<div class="col-md-11">
						<div class="form-group">
							<label for="">Tên project</label>
							<input type="text" class="form-control" name="name" placeholder="Nhập tên project" >
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
					</div>
					
				</div>
			</div>
			
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Thêm</button>
			</div>
		</form>
	</div>
</div>
@stop

