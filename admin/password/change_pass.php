<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }?>

<?php
    $user_mail = $_SESSION['mail'];
    $sql = "SELECT*FROM users WHERE email = '$user_mail'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if(isset($_POST['sbm'])){
        $user_pass = $_POST['user_pass'];
        $user_re_pass = $_POST['user_re_pass'];
        if($user_pass != $user_re_pass){

            $error = '<div class="alert alert-danger">Mat khau khong khop !</div>';
        }else{
            $hashed_passcode = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql_update = "UPDATE users SET password = '$hashed_passcode'
              WHERE email = '$user_mail'";
            mysqli_query($conn,$sql_update);
            header('location: reset.php?pass=change_succes');
        }
    }
?>

<div id="order-success">
    <div class="row">
        <div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
        <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
            <h2>Đổi mật khẩu</h2>
            <h4><?php if($row['lever']==1){echo 'Admin: ';}else{echo 'Member: ';} echo $row['name']; ?></h4>
            <h4>Mail: <?php echo $user_mail; ?></h4>
        </div>
    </div>
</div>
<?php if(isset($error)){echo $error;} ?>
<form role="form" method="post">
    <div class="form-group">
        <label>Mật khẩu</label>
        <input name="user_pass" required type="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu</label>
        <input name="user_re_pass" required type="password" class="form-control">
    </div>

    <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
    <button type="reset" class="btn btn-default">Làm mới</button>
    </div>
</form>
