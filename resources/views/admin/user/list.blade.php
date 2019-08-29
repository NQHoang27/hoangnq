@extends('admin.layouts.backend')
@section('backend')
<div class="panel panel-primary" style="margin:0 10px;margin-top: 20px">
    <div class="panel-heading">
        <h3 class="panel-title form-inline"><i class="fa fa-users"> Thành viên: </i> <b>{{$countUsers}}</b></h3>
    </div>
    <div class="panel-body">
        <form action="" class="form-inline"  role="form">
            <div class="form-group">
                <input  class="form-control "  name="search" placeholder="Tìm kiếm theo tên">
            </div>
            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
            <div class="form-group">
                <a href="{{route('them-tai-khoan')}}" class="btn btn-success fa  fa-plus"> Thêm mới</a>
                <a href="{{route('tai-khoan')}}" class="btn btn-success fa  fa-address-card"> Danh Sách</a>   
                <a href="{{route('export')}}" class="btn btn-success fa  fa-file-export"> Xuất tệp</a>
                <a href="{{route('import')}}" class="btn btn-success fa  fa-file-export"> Nhập tệp</a>
            </div>
        </form>
    </div>
    @if(Session::has('level'))
    <div class="col-md-6">
        <div class="alert alert-{{Session::get('level')}}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('message')}}</strong> Good!
        </div>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Team</th>
                <th>Ngày tạo</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUser as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>ID {!!$item->id!!}</td>
                <td>{!!$item->name!!}</td>
                <td>{!!$item->email!!}</td>
                <td>
                   {{$item->id_teams}}
                </td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a href="{{route('sua-tai-khoan',$item->id)}}" title="" class="btn btn-primary">Sửa</a>
                    <a href="{{route('xoa-tai-khoan',$item->id)}}"  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
    {!! $listUser->links() !!}
</div>
</div>
@stop()