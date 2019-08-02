@extends('admin.layouts.backend')

@section('backend')
<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
	<div class="panel-heading">
		<h3 class="panel-title">Form test chức năng</h3>
	</div>
	<div class="panel-body">
		  <a href="{{route('load')}}"><button type="button" class="btn btn-default">Load trang</button></a>
      <form action="" method="POST" role="form">
        <legend>Form title</legend>
      
        <div class="form-group">
          <label for="">label</label>
          <input type="text" class="form-control" id="" placeholder="Input field">
        </div> 
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
@stop

