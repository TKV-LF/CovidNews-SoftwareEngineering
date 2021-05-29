<?php
if (!defined("TEMPLATE_PASS")) {
    echo "Bạn không có quyền truy cập file này" . "<br/>"; ?>

    <button><a href="index.php">Trở về</a></button>
<?php die('');
} ?>

<?php
if (isset($_POST['resend'])) {
    header("location: reset.php?pass=send_mail");
}

if (isset($_POST['sbm'])) {
    $code = $_POST['code'];
    if ($_SESSION['code'] == $code) {
        header("location: reset.php?pass=change_pass");
    } else {
        $error =  '<div class="alert alert-danger mt-3"><h4>LỖI</h4>Mã code không chính xác</div>';
    }
}

?>

<form id="form" role="form" method="post">
    <fieldset>
        <p>Mã code đã được gửi thành công đến mail của bạn</p>
        <p>Vui lòng nhập mã code xác nhận</p>
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <div class="form-group">
            <input class="form-control" name="code" type="text">
        </div>
        <button type="submit" name="sbm" class="btn btn-primary">Xác Nhận</button>
        <a href="../index.php" class="btn btn-danger">Huỷ</a>
        <button style="float:right;" name="resend" class="btn">Gửi lại mã code</button>
    </fieldset>
</form>