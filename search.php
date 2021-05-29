<?php 
    require "config.php";
    $search = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $search = trim( strip_tags( $_POST['search'] ) );
        $sql = 'SELECT * FROM posts WHERE title LIKE "%'.$search.'%"';
        $result = mysqli_query($conn, $sql);
        $view = mysqli_fetch_all($result);
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Covid News</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />

</head>

<body>
    <?php require "assets/navbar.php" ?>
    <div class="container mt-5">
        <form action="search.php" method="post">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input style="font-size:16pt !important" type="text" class="form-control" name="search" value="<?php echo $search; ?>" name="" id="" aria-describedby="helpId" placeholder="Từ khóa">
                    </div>
                </div>
                <div class="col-2">
                    <button style="font-size:16pt !important" type="submit" class="btn btn-success">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <style>
            a {
                text-decoration: none !important;
                color: inherit;
            }

            h2 >a {
                font-weight: 700;
                /* color: black; */
            }
        </style>
        <div class="row my-3 py-4">
        <?php
            if(!empty($view)){
                foreach ($view as $row) {
            
        ?>
        <div class="col-4 my-3">
            <img style="height: 160px !important;width: 720px, i !important;" src="<?php echo $row['2']; ?>" class="img-fluid " alt="">
        </div>
        <div class="col-8 my-3">
            <h2><a href="new.php?id=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h2>
            <p><a href="new.php?id=<?php echo $row['0']; ?>"><?php echo $row['3']; ?></a></p>
        </div>
        <?php }} ?>
        
        
        </div>
    </div>
    
    <?php require "assets/footer.php" ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>