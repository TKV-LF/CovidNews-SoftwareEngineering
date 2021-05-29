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
$post_id = $_GET['id'];
$sql = "SELECT*FROM posts WHERE id = '$post_id'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
$check = $row['title'];
if (isset($_POST['sbm'])) {
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $status=$_POST['status'];
    $sql = "SELECT*FROM posts WHERE title = '$title' AND title != '$check' ";
    $query = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($query);
    if ($num_row > 0) {
        $error = '<div class="alert alert-danger">Tên bài viết đã tồn tại!</div>';
    } 
    else {
        if($_FILES['image']['name'] == "")
            $class_image = $row['image'];
        else{
        $class_image = $_FILES['image']['name'];
        $tmp_name  = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "img/".$class_image);
        }
        
            $sql = "UPDATE posts SET 
            title='$title',
            short_description='$about', 
            content='$content',
            image='$class_image',
            status=$status,
            updated_at=NOW()
          WHERE id =$post_id";
        
            mysqli_query($conn, $sql);
            header("location: index.php?page_layout=post    ");
    }
}
?>

<!-- máhgdasmnd -->
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../admin/index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="index.php?page_layout=class">Quản lý bài đăng</a></li>
                <li class="active">Sửa bài đăng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
            <h1 class="page-header">Sửa bài đăng</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <?php
                                
								if(isset($error)){
									echo $error;
								}
							?>
                        <div class="col-md-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>Tên bài viết</label>
                                <input type="text" name="title" required class="form-control" value="<?php echo $row['title'] ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" id="">
                                <option value="0" <?php if ($row['status']==0) echo 'selected' ?>>Đăng</option>
                                <option value="1"<?php if ($row['status']==1) echo 'selected' ?> >Chưa đăng</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea name="about" id="about" cols="70" rows="5"><?php echo $row['short_description'] ?></textarea>
                                </div>
                                <div class="form-group">
                               
                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="image" value="img/<?php echo $row['image']?>">
                                <br>
                                <div>
                                    <img width="160px" height="215" src="img/<?php echo $row['image']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="content" cols="92" rows="10"><?php echo $row['content'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Lưu lại</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>
    <!--/.main-->


    <!--/.main-->