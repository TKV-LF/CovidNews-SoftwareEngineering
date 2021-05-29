<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }?>

    <?php

    if (isset($_POST['sbm'])) {
        $user_mail = $_POST['mail'];
        $_SESSION['mail'] = $user_mail;
        $sql = "SELECT*FROM users WHERE email = '$user_mail'";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            $error =  '<div class="alert alert-danger mt-3"><h4>Không có kết quả tìm kiếm</h4>Không tìm thấy tài khoản. Vui lòng thử lại với thông tin khác.</div>';
        }else{
            header("location: reset.php?pass=send_mail");
        }
    }
    ?>
                    <?php
                    if (isset($error)) {
                        echo $error;
                    }
                    ?>
                    <form role="form" method="post">
                        <fieldset>
                            <p>Vui lòng nhập mail để tìm kiếm tài khoản</p>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Tìm Kiếm</button>
                            <a href="../index.php" class="btn btn-danger">Huỷ</a>

                        </fieldset>
                    </form>
                
