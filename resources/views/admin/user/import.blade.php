@extends('admin.layouts.backend')
@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
    <h3 for="import">Form Import User</h3>
    <div class="panel-body">
        <form action="{{route('insert.users')}}" method="POST" role="form" enctype="multipart/form-data">
            {!! csrf_field()!!}
            <div class="form-group">
                <input type="file" name="file" class="form-control"  placeholder="chọn tệp">
            </div>
            <button type="button" class="btn btn-default">Lưu lại</button>
        </form>
    </div>
    @stop()