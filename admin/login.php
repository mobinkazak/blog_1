<?php
	require_once '../init.php';
	if ($backend->isLogin('admin_id')){
		$backend->redirect('index.php');
	}
	if ($backend->post('btn_login')) {
		$username=$backend->post('username');
		$password=$backend->post('password');
		if (empty($username)) {
			$backend->redirect('?msg=usernamefielderr');
		}
		elseif (empty($password)) {
			$backend->redirect('?msg=passwrdfielderr');
		}
		else{
			$resLogin=$backend->login($username,$password);
			if ($resLogin) {
				$backend->redirect('index.php');
			}else{
				$backend->redirect('?msg=loginerr');

			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>پنل مدیریت | صفحه ورود</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/blue.css">
		<!-- bootstrap rtl -->
		<link rel="stylesheet" href="../../dist/css/bootstrap-rtl.min.css">
		<!-- template rtl version -->
		<link rel="stylesheet" href="../../dist/css/custom-style.css">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<!-- bootstrap rtl -->
		<link rel="stylesheet" href="css/bootstrap-rtl.min.css">
		<!-- template rtl version -->
		<link rel="stylesheet" href="css/custom-style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box mt-5">
			<div class="login-logo">
				<b>ورود به داشبورد</b>
			</div>
			<!-- /.login-logo -->
			<div class="text-center">
			<?php 
			$backend->setAlert('danger','logup','لطفا نام کاربری و رمز عبور خود را وارد کنید');  
			$backend->setAlert('danger','usernamefielderr','وارد کردن نام کاربری اجباری می باشد');  
			$backend->setAlert('danger','passwrdfielderr','وارد کردن رمزعبور اجباری می باشد');  
			$backend->setAlert('danger','loginerr','نام کاربری و رمزعبور وارد شده صحیح نمی باشد');  
			$backend->setAlert('success','logout','خروج با موفقیت انجام شد');  


			?>
			</div>
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>
					<form action="" id="frm-login" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="fa fa-envelope input-group-text"></span>
							</div>
							<input type="text" class="form-control" name="username" placeholder="نام کاربری">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="fa fa-lock input-group-text" style="padding-left: 15px;padding-right: 15px;"></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="رمز عبور">
						</div>
						<div class="row">
							<div class="col-8">
								<div class="checkbox icheck">
									<label>
										<input type="checkbox"> یاد آوری من
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-4">
								<button type="submit" value="1" name="btn_login" class="btn btn-primary btn-block btn-flat">ورود</button>
							</div>
							<!-- /.col -->
						</div>
					</form>
					<!-- <div class="social-auth-links text-center mb-3">
						<p>- OR -</p>
						<a href="#" class="btn btn-block btn-primary">
							<i class="fa fa-facebook mr-2"></i> ورود با اکانت فیسوبک
						</a>
						<a href="#" class="btn btn-block btn-danger">
							<i class="fa fa-google-plus mr-2"></i> ورود با اکانت گوگل
						</a>
					</div> -->
					<!-- /.social-auth-links -->
					<p class="mb-1">
						<a href="#">رمز عبورم را فراموش کرده ام.</a>
					</p>
					<p class="mb-0">
						<a href="register.html" class="text-center">ثبت نام</a>
					</p>
				</div>
				<!-- /.login-card-body -->
			</div>
		</div>
		<!-- /.login-box -->
		<!-- jQuery -->
		<script src="js/jquery-3.6.0.min.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE -->
		<script src="js/adminlte.js"></script>

		<script>
		$(function () {
		$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass   : 'iradio_square-blue',
		increaseArea : '20%' // optional
		})
		})
		</script>
		</body>
	</html>