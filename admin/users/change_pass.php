<?php
$user_mail = $_SESSION['users']['mail'];
$sql = "SELECT*FROM users WHERE email = '$user_mail'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['sbm'])) {
    $old = $_POST['old_user_pass'];
    $user_pass = $_POST['new_user_pass'];
    $user_re_pass = $_POST['user_re_pass'];
    if(!password_verify($old, $row['password'])){
        $error = '<div class="alert alert-danger">Mật khẩu cũ không chính sác!</div>';
    }else {
        if ($user_pass != $user_re_pass) {
            $error = '<div class="alert alert-danger">Mat khau khong khop !</div>';
        } else {
            $hashed_passcode = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql_update = "UPDATE users SET password = '$hashed_passcode'
                  WHERE email = '$user_mail'";
            mysqli_query($conn, $sql_update);
            echo " <script type='text/javascrip'>alert('đổi mật khẩu thành công, mời bạn đăng nhập lại!');</script>";
            header('location:users/success.php');
        }
    }
    
}
?>
<script type="text/javascrip"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="order-success">
        <div class="row">
            <div id="order-success-img" class="col-lg-3 col-md-3 col-sm-12"></div>
            <div id="order-success-txt" class="col-lg-9 col-md-9 col-sm-12">
                <h2>Đổi mật khẩu</h2>
                <h4><?php if ($row['lever'] == 1) {
                        echo 'Admin: ';
                    } else {
                        echo 'Member: ';
                    }
                    echo $row['name']; ?></h4>
                <h4>Mail: <?php echo $user_mail; ?></h4>
            </div>
        </div>
    </div>
    <!--/.row-->


    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Mật khẩu cũ</label>
                                <input name="old_user_pass" required type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="new_user_pass" required type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input name="user_re_pass" required type="password" class="form-control">
                            </div>

                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>