@extends('admin.layouts.backend')
@section('title','Thêm mới tài khoản')
@section('backend')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm người dùng</h3>
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
            <form action="{{route('them-tai-khoan')}}" method="POST" role="form">
                {!! csrf_field()!!}
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tên Người dùng</label>
                        <input type="text" class="form-control" name="name" value="{!!old('name')!!}">
                        @if($errors->has('name'))
                        <div class="help-block" style="color: red">
                            {!!$errors->first('name')!!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{!!old('email')!!}">
                        @if($errors->has('email'))
                        <div class="help-block" style="color: red">
                            {!!$errors->first('email')!!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" >
                        @if($errors->has('password'))
                        <div class="help-block" style="color: red">
                            {!!$errors->first('pasword')!!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="re_password" >
                        @if($errors->has('re_password'))
                        <div class="help-block" style="color: red">
                            {!!$errors->first('re_pasword')!!}
                        </div>
                        @endif
                    </div>
                 
                    <div class="form-group">
                        <label for="">Team</label>
                        <select name="parent" id="inputStatus" class="form-control" required="required"  value="{{old('parent')}}">
                            <option value="0">--Chọn team--</option>
                      
                        </select>
                    </div>

                </div>

               
            </form>
        </div>
    </div>
</div>

@stop()
