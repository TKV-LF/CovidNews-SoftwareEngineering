    <?php
if (!defined("Tem") ) { ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <?php  echo "Bạn không có quyền truy cập file này" . "<br/>";?>
            <button><a href="index.php">Trở về</a></button>
        </div>
        <!--/.row-->
    </div>
<?php die('');
} ?>
<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rows_per_page = 3;
$per_rows = $page * $rows_per_page - $rows_per_page;
// LAY TONG SO BAN GHI
$total_rows = mysqli_num_rows(mysqli_query($conn, " SELECT*FROM posts"));
$total_page = ceil($total_rows / $rows_per_page);

// button phan trang
$list_pages = '';
// trang trc
$page_perv = $page - 1;
if ($page_perv < 1) {
    $page_perv = 1;
}
$list_pages .=  '<li class="page-item"><a class="page-link" href="index.php?page_layout=post&page=' . $page_perv . '">&laquo;</a></li>';

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=post&page=' . $i . '">' . $i . '</a></li>';
}
// trang sau
$page_next = $page + 1;
if ($page_next > $total_page) {
    $page_next = $total_page;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=post&page=' . $page_next . '">&raquo;</a></li>';

?>
<script>
    function delItem(name) {
        return confirm('Bạn có chắc muốn xoá bài đăng: '+name+" ?");
    }
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.html"><i class="fas fa-home"></i></a></li>    
                <li class="active">Quản lý bài đăng</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý bài đăng</h1>
			</div>
		</div>
		<!--/.row-->
		<div id="toolbar" class="btn-group">
			<a href="index.php?page_layout=add_post" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i> Thêm  bài đăng
			</a>
		</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                    <thead>
								<tr>
									<th data-field="id" data-sortable="true">ID</th>
                                    <th>Tên bài đăng</th>
                                    <th>Ảnh</th>
									<th>Giới thiệu</th>
                                    <th>Người viết</th>
                                    <th>Trạng thái</th>
									<th>Hành động</th>
								</tr>
							</thead>
                        <tbody>
                            <?php
                            
                            $sql="SELECT * from posts ORDER BY id LIMIT $per_rows,$rows_per_page";
                            $result = mysqli_query($conn, $sql);
                            if($result)
                                while($row=mysqli_fetch_assoc($result)){

                             ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['title']?></td>
                            <td><img src="<?php echo $row['image']?>" style="max-width: 100%; max-height: 200px;"  alt=" không có ảnh"></td>
                            <td><?php echo $row['short_description'] ?></td>
                        
                            <td><?php 
                            $idb=$row['writer_id']; 
                            $sql="SELECT name from users WHERE id=$idb";
                            $res= mysqli_query($conn,$sql);
                            $name=mysqli_fetch_assoc($res);
                            print_r($name['name']);
                            ?></td>
                            <td>
                                <?php if($row['status']==0) echo 'Đã đăng'; else echo'Chưa đăng' ?>
                            </td>
                            <td class="form-group">
                                <a href="index.php?page_layout=edit_post&id=<?php echo $row['id']?>" class="btn btn-primary"><i
                                        class="glyphicon glyphicon-pencil"></i></a>
                                <a onclick="return delItem('<?php echo $row['title']?>')" href="post/delete_post.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php echo $list_pages; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>