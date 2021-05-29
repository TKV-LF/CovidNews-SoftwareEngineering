<script src="ckeditor/ckeditor.js"></script>
<?php
session_start();
define('Tem', true);
include_once('connect.php');
if(isset($_SESSION['users']['mail'])&&isset($_SESSION['users']['pass'])){
    include_once('master_page.php');
}
else{
    include_once('login.php');
}
?>