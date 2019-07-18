@extends('admin.layouts.login')
@section('login')

<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Hung</b>Cake</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Đăng nhập để tiếp tục!</p>

		<form action="" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" name="remember"> Nhớ mật khẩu
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<div class="social-auth-links text-center">
			<p>- Hoặc -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook-square"></i> Đăng nhập 
			Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập 
			Google+</a>
		</div>
		<!-- /.social-auth-links -->

		<a href="#">Quên mật khẩu</a><br>
		<a href="register.html" class="text-center">Tạo mới tài khoản</a>

	</div>
	<!-- /.login-box-body -->
</div>
@stop()