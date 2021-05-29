<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vietpro Mobile Shop - Administrator</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/datepicker3.css" rel="stylesheet">
    <link href="../css/bootstrap-table.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
<div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">trường dạy lại xe Thống Nhất - Administrator</div>
                <div class="panel-body">
<?php

		if(isset($_GET["pass"])){
			switch($_GET["pass"]){

				case "change_pass": include_once("change_pass.php"); break;
				case "change_succes": include_once("change_succes.php"); break;
				case "send_mail": include_once("send_mail.php"); break;
				case "check_mail": include_once("check_mail.php"); break;
				case "check_code": include_once("check_code.php"); break;

				default: include_once("index.php");
			}
		}else{
			include_once("check_mail.php");
		}
	?>
</div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>