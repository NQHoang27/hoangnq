@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form điền thông tin</h3>
	</div>
	<div class="panel-body">

		<form action="{{route('them-project')}}" method="POST" role="form" enctype="multipart/form-data">
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
							<label for="">Chọn user</label>
							<select name="status" id="inputStatus" class="form-control" required="required"  width="200px">
								<option value="1">Long</option>
								<option value="0">Quân</option>
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

