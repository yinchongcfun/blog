
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">

	<div class="login_box">

		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if (Session::has('msg'))
			<p style="color:red">{{session('msg')}}
			@endif

			<form action="#" method="post">
                    {{csrf_field()}}
					{{--//隐藏字段的token值--}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="{{URL("admin/")}}">返回首页</a></p>
		</div>login
	</div>
</body>
</html>