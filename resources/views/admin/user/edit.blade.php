@extends('admin.layouts.backend')


@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Sửa danh mục</h3>
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
			<form action="{{route('tai-khoan.update',$listUsers->id)}}" method="POST" role="form">
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}
				<div class="col-md-6"><div class="form-group">
					<label for="">Tên người dùng</label>
					<input type="text" class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{$listUsers->name}}">
					@if($errors->has('name'))
					<div class="help-block" style="color: red">
						{!!$errors->first('name')!!}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label for="">E-Mail</label>
					<input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{$listUsers->email}}">
					@if($errors->has('email'))
					<div class="help-block" style="color: red">
						{!!$errors->first('email')!!}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label for="">Mật khẩu mới</label>
					<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" >
					@if($errors->has('password'))
					<div class="help-block" style="color: red">
						{!!$errors->first('password')!!}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label for="">Nhập lại mật khẩu</label>
					<input type="password" class="form-control" name="re_password" placeholder="Nhập mật khẩu">
					@if($errors->has('re_password'))
					<div class="help-block" style="color: red">
						{!!$errors->first('re_password')!!}
					</div>
					@endif
				</div>

				<div class="form-group">
					<label for="">Team</label>
					<select name="parent" id="inputStatus" class="form-control" required="required"  value="{{old('parent')}}">
						<option value="0">--Chọn team--</option>
						
					</select>
				</div>
				<div class="text-center panel-footer">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
			</div>
			
			
		</form>
	</div>
</div>
</div>
@stop()