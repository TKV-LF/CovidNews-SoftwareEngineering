<?php
if (!defined("Tem") || $_SESSION["user"]["user_lv"] == 2) { ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <?php  echo "Bạn không có quyền truy cập file này" . "<br/>";?>
            <button><a href="index.php">Trở về</a></button>
        </div>
        <!--/.row-->
    </div>
<?php 
} else{?>
<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rows_per_page = 4;
$per_rows = $page * $rows_per_page - $rows_per_page;
// LAY TONG SO BAN GHI
$total_rows = mysqli_num_rows(mysqli_query($conn, " SELECT*FROM users"));
$total_page = ceil($total_rows / $rows_per_page);

// button phan trang
$list_pages = '';
// trang trc
$page_perv = $page - 1;
if ($page_perv < 1) {
    $page_perv = 1;
}
$list_pages .=  '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_perv . '">&laquo;</a></li>';

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=user&page=' . $i . '">' . $i . '</a></li>';
}
// trang sau
$page_next = $page + 1;
if ($page_next > $total_page) {
    $page_next = $total_page;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_next . '">&raquo;</a></li>';

?>
<script>
    function delItem(name) {
        return confirm('ban muon xoa thanh vien: ' + name + ' ?');
    }
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fas fa-home"></i></a></li>
            <li class="active">Danh sách thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_user" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th >Họ & Tên</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users ORDER BY id  LIMIT $per_rows,$rows_per_page";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td ><?php echo $row['id']; ?></td>
                                    <td ><?php echo $row['name']; ?></td>
                                    <td ><?php echo $row['adress']; ?></td>
                                    <td ><?php echo $row['phone']; ?></td>
                                    <td ><?php echo $row['birth_day']; ?></td>
                                    <td ><?php echo $row['gmail']; ?></td>
                                    <td><span class="label label-danger"><?php if ($row['level'] == 1) {
                                                                                echo "Admin";
                                                                            } else {
                                                                                echo "member";
                                                                            } ?></span></td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_user&id=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a onclick="return delItem('<?php echo $row['name']; ?> ')" href="users\delete_user.php?user_id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
<?php
    }
?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
