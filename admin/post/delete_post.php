<?php
    session_start();
    define('Tem',true);
    include_once("../connect.php");
    if(isset($_SESSION["users"]['mail']) && isset($_SESSION["users"]['pass'])){
        $id = $_GET['id'];
        include_once('connect.php');
        $sql = "DELETE FROM post WHERE id= $id ";
        $query = mysqli_query($conn,$sql);
        header('location: ../index.php?page_layout=post');
    }else{
        echo "Bạn không có quyền truy cập file này"."<br/>"; ?>
		
		<button><a href="index.php">Trở về</a></button>
	<?php	die('');
    }
?>