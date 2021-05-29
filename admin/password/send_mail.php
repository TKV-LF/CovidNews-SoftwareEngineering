<?php
	if(!defined("TEMPLATE_PASS")){
		echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }?>

<?php
include "../PHPMailer-master/src/PHPMailer.php";
include "../PHPMailer-master/src/Exception.php";
include "../PHPMailer-master/src/OAuth.php";
include "../PHPMailer-master/src/POP3.php";
include "../PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str_body = substr(str_shuffle($permitted_chars), 0, 7); 
    $_SESSION['code'] = $str_body;

    $mail = new PHPMailer(true);                               // Passing 'true' enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'dungkey220@gmail.com';                 // SMTP username
        $mail->Password = 'Dung12345678';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('dungkey220@gmail.com', 'Vietpro Mobile Shop');                // Gửi mail tới Mail Server
        $mail->addAddress($_SESSION['mail']);               // Gửi mail tới mail người nhận
        //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
        // $mail->addCC('quantri.vietproshop@gmail.com'); //gui cho nguoi thu hai ben quan tri
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Xác nhận mail từ trường lái xe Thống Nhất';
        $mail->Body    = $str_body;
        $mail->AltBody = 'lay lai mat khau';
        $mail->send();
        header("location: reset.php?pass=check_code");
    }catch(Exception $e){
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
?>