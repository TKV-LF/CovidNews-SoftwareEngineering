<?php 
require 'config.php';
                    $name ="";
                    $comment = "";
                    $email = "";
                    $id = $_GET['id'];
                    $ids = (int)$id;
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $name = trim( strip_tags( $_POST['name'] ) );
                        $email = trim( strip_tags( $_POST['email'] ));
                        $comment = trim( strip_tags( $_POST['comment'] ));
            
                        $sql = "INSERT INTO comments (name, gmail, content, id_post) VALUES (?, ?, ?, ? )";
            
                        if($stmt = mysqli_prepare($conn, $sql)){
                            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $email, $comment, $ids);
            
                            $param_name = $name;
            
                            if(mysqli_stmt_execute($stmt)){
                                header('Location: http://localhost/covidnew1/new.php?id='.$id);
                            } else{
                                echo "Something went wrong. Please try again later.";
                            }
            
                            mysqli_stmt_close($stmt);
                        }
                    }
                ?>
<!doctype html>
<html lang="en">

<head>
    <title>Covid News</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url" content="https://www.your-domain.com/your-page.html" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<style>
    p {
        color: #222222;
        font: 18px arial;
    }
    
    br {
        margin-bottom: 15px;
    }
    
    body {
        margin-top: 20px;
        background-color: #e9ebee;
    }
    
    .be-comment-block {
        margin-bottom: 50px !important;
        border: 1px solid #edeff2;
        border-radius: 2px;
        padding: 50px 70px;
        border: 1px solid #ffffff;
    }
    
    .comments-title {
        font-size: 16px;
        color: #262626;
        margin-bottom: 15px;
        font-family: 'Conv_helveticaneuecyr-bold';
    }
    
    .be-img-comment {
        width: 60px;
        height: 60px;
        float: left;
        margin-bottom: 15px;
    }
    
    .be-ava-comment {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }
    
    .be-comment-content {
        margin-left: 80px;
    }
    
    .be-comment-content span {
        display: inline-block;
        width: 49%;
        margin-bottom: 15px;
    }
    
    .be-comment-name {
        font-size: 13px;
        font-family: 'Conv_helveticaneuecyr-bold';
    }
    
    .be-comment-content a {
        color: #383b43;
    }
    
    .be-comment-content span {
        display: inline-block;
        width: 49%;
        margin-bottom: 15px;
    }
    
    .be-comment-time {
        text-align: right;
    }
    
    .be-comment-time {
        font-size: 11px;
        color: #b4b7c1;
    }
    
    .be-comment-text {
        font-size: 13px;
        line-height: 18px;
        color: #7a8192;
        display: block;
        background: #f6f6f7;
        border: 1px solid #edeff2;
        padding: 15px 20px 20px 20px;
    }
    
    .form-group.fl_icon .icon {
        position: absolute;
        top: 1px;
        left: 16px;
        width: 48px;
        height: 48px;
        background: #f6f6f7;
        color: #b5b8c2;
        text-align: center;
        line-height: 50px;
        -webkit-border-top-left-radius: 2px;
        -webkit-border-bottom-left-radius: 2px;
        -moz-border-radius-topleft: 2px;
        -moz-border-radius-bottomleft: 2px;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }
    
    .form-group .form-input {
        font-size: 13px;
        line-height: 50px;
        font-weight: 400;
        color: #b4b7c1;
        width: 100%;
        height: 50px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px solid #edeff2;
        border-radius: 3px;
    }
    
    .form-group.fl_icon .form-input {
        padding-left: 70px;
    }
    
    .form-group textarea.form-input {
        height: 150px;
    }
</style>

<body>
    
    <?php 	
        
        require 'function.php';
        $id = $_GET['id'];
        $posts = viewPost($id);
        $comments = getComment($id);
        include "assets/navbar.php";
	  ?>
    <div class="container">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
             :root {
                --primary: #08aeea;
                --secondary: #13D2B8;
                --purple: #bd93f9;
                --pink: #ff6bcb;
                --blue: #8be9fd;
                --gray: #333;
                --font: "Poppins", sans-serif;
                --gradient: linear-gradient(40deg, #ff6ec4, #7873f5);
                --shadow: 0 0 15px 0 rgba(0, 0, 0, 0.05);
            }
            
            *,
            *:before,
            *:after {
                box-sizing: border-box;
            }
            
            html {
                font-size: 62.5%;
            }
            
            body {
                font-family: var(--font);
                font-size: 1.4rem;
                overflow-x: hidden;
                font-weight: 300;
            }
            
            img {
                display: block;
                max-width: 100%;
            }
            
            a {
                text-decoration: none;
            }
            
            input,
            button,
            textarea,
            select {
                font-family: var(--font);
                font-size: 1.4rem;
                font-weight: 300;
                outline: none;
                border: 0;
                margin: 0;
                padding: 0;
                border-radius: 0;
                -webkit-appearance: none;
            }
            
            button {
                cursor: pointer;
            }
            
            .social-share {
                width: 100%;
                max-width: 400px;
            }
            
            .social-share-icon {
                width: 40px;
                height: 40px;
                background-color: white;
                border-radius: inherit;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
            }
            
            .social-share-text {
                color: white;
                margin-left: 20px;
                font-size: 16px;
            }
            
            .social-share-item {
                width: 100%;
                padding: 10px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                cursor: pointer;
            }
            
            .social-share-item.facebook {
                background-color: #3b5999;
            }
            
            .social-share-item.facebook .social-share-icon {
                color: #3b5999;
            }
            
            .social-share-item.instagram {
                background-color: #e4405f;
            }
            
            .social-share-item.instagram .social-share-icon {
                color: #e4405f;
            }
            
            .social-share-item.twitter {
                background-color: #55acee;
            }
            
            .social-share-item.twitter .social-share-icon {
                color: #55acee;
            }
            
            .social-share-item+.social-share-item {
                margin-top: 20px;
            }
            
            a {
                text-decoration: none !important;
            }
        </style>
        <div class="row">
            <?php 
            foreach ($posts as $row){ 
            ?>
            <h2 class="mt-5 mb-5" style="font-weight: 700;">
                <?php echo $row['1']; ?>
            </h2>
            <p>

                <?php 
                
                echo str_replace("\r", "<br>", $row['4']); 
                ?>
            </p>
            <?php } ?>

        </div>
        <div class="row">
            <div class="social-share col-md-12 col-12 pt-5 mt-4 mx-auto">
                <div class="social-share-item facebook">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                        <i class="fab fa-facebook social-share-icon">
                            </i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2parse.com" target="_blank" rel="noopener">
                        <span class="social-share-text">Share this post on Facebook</span>
                    </a>
                </div>

                <div class="social-share-item twitter">
                    <a target="blank" href="https://twitter.com/intent/tweet?text=http://localhost/covidnew1/new.php?id=6" class="">
                        <i class="fab fa-twitter social-share-icon"></i>
                    </a>
                    <a target="blank" href="https://twitter.com/intent/tweet?text=http://localhost/covidnew1/new.php?id=6" class="">
                        <span class="social-share-text">Share this post on Twitter</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="be-comment-block col-md-12 col-12">
                <h1 class="comments-title">Bình luận (5)</h1>
                <?php
                        $j = 0;
                        foreach ($comments as $row){ 
                    ?>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <a href="blog-detail-2.html">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                            </a>
                        </div>

                        <div class="be-comment-content">

                            <span class="be-comment-name">
                            <a href="#"><?php echo $row['1']; ?></a>
                            </span>
                            <!-- <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            4:34PM, Ngày 21/5/2021
                        </span> -->

                            <p class="be-comment-text">
                                <?php echo $row['3']; ?>
                            </p>
                        </div>
                        <?php if (++$j == 5) break;
                    } ?>
                    </div>


                    <form class="form-block" action="http://localhost/covidnew1/new.php?id=<?php echo $id; ?>" method="POST">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <input name="name" class="form-input" type="text" placeholder="Tên ">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 fl_icon">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <input name="email" class="form-input" type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xs-12 col-12">
                                <div class="form-group">
                                    <textarea name="comment" class="form-input" required="" placeholder="Bình luận "></textarea>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Bình luận">
                        </div>
                    </form>
            </div>

        </div>   
        </div>
    </div>
    <?php
        include 'assets/footer.php';
    ?>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>

</html>