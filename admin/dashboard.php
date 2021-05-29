



<?php
        $sql = "SELECT*FROM ";
    ?>


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><i class="fas fa-home"></i></a></li>
				<li class="active">Trang chủ quản trị</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ quản trị</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			
			<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class=" glyph far fa-file-alt fas"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php
                                echo mysqli_num_rows(mysqli_query($conn,$sql."posts"));
                            ?></div>
							<div class="text-muted">bài đăng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="glyph fas  fa-address-card"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php
                                echo mysqli_num_rows(mysqli_query($conn,$sql."users"));
                            ?></div>
							<div class="text-muted">users</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	