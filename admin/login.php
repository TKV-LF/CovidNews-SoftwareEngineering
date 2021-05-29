<?php
	if(!defined("Tem")){
		echo "Bạn không có quyền truy cập file này"."<br/>";?>		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
	}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>COVID NEWS</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<!-- password_verify($pass, $row['password']) -->
</head>

<body>
	<?php
	if(isset($_POST["btn"])){
		$mail=$_POST["mail"];
		$pass=$_POST["pass"];
		$sql="SELECT * FROM users WHERE gmail='$mail'";
		$query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($query);
		$num=mysqli_num_rows($query);
		if($num>0 && $pass==$row['password']){
			$_SESSION['users']['id']=$row['id'];
			$_SESSION['users']['mail']=$mail;
			$_SESSION['users']['pass']=$pass;
			$_SESSION["user"]["user_lv"] = $row["level"];

			header("location:index.php");
			
		}
		else
		{
			$erro='<div class="alert alert-danger">Tài khoản hoặc mật khẩu không hợp lệ !</div>';
		}

	}
	
	
	
	?>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">COVID NEWS - Administrator</div>
				<div class="panel-body">
					
					
				  <?php if(isset($erro)) echo $erro; ?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" name="btn" class="btn btn-primary">Đăng nhập</button>
							<a href="password/reset.php" class="btn btn-primary">Quên mật khẩu?</a>
							<a name="" id="" class="btn btn-primary" href="../" role="button">Về trang web</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>