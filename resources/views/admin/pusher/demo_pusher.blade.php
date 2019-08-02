@extends('admin.layouts.backend')

@section('backend')
	<div class="panel panel-primary" style="margin:0px 10px;margin-top: 20px;">
		<div class="panel-heading">
			<h3 class="panel-title">Form test chức năng</h3>
		</div>
		<div class="panel-body">
			<div class="container">
				<div class="content">
					<h1>Laravel & Pusher: Demo real-time web application.</h1>
					<p>Tin nhắn thử nghiệm:</p>
					<ul id="messages" class="list-group"></ul>
				</div>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
			<script>
				$(document).ready(function(){
					// Khởi tạo một đối tượng Pusher với app_key
					var pusher = new Pusher('8fc88e9e7a79d8d20e23', {
					cluster: 'ap1',
					encrypted: true
				});
				//Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
				var channel = pusher.subscribe('channel-demo-real-time');
				//Bind một function addMesagePusher với sự kiện DemoPusherEvent
				channel.bind('App\\Events\\DemoPusherEvent', addMessageDemo);
				});
				//function add message
				function addMessageDemo(data) {
					var liTag = $("<li class='list-group-item'></li>");
					liTag.html(data.message);
					$('#messages').append(liTag);
				}
			</script>

		</div>
	</div>
@stop

