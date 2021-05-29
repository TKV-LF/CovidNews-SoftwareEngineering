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
<style>
    a {
        text-decoration: none !important;
    }
    
    .tieu-de,
    h2 {
        font-weight: 700;
        color: #0d0f0e !important;
    }
    
    h2 {}
    
    .tin-van {
        color: #222222 !important;
    }
</style>

<body>

    <?php 
	  	include "assets/navbar.php";
		require 'config.php';
		require 'function.php';
	  ?>
    <div class="container mt-4 border ">
        <div class="row pl-1" style="background-color: #f7f7f7 !important">
            <?php
		  	$posts = getAll();
		  ?>
                <div class="col-12 col-md-5 my-1  border">
                    <div class="row">
                        <div class="col-12 my-auto">
                            <a href="new.php?id=<?php echo $posts[0][0]; ?>">
						  	<img src="<?php echo $posts[0][2]; ?>" class="img-fluid" alt="Responsive image">
						  </a>
                        </div>
                        <div class="col-12 mt-5">
                            <h3>
                                <a href="new.php?id=<?php echo $posts[0][0]; ?>" class="tieu-de">
                                    <?php echo $posts[0][1]; ?>
                                </a>
                            </h3>
                            <br>
                            <a href="new.php?id=<?php echo $posts[0][0]; ?>" class="tin-van mt-2">
                                <?php echo $posts[0][3]; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="row mx-n3 my-1">
                        <div class="col-md-12 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12 border ml-1 mr-n1">
                                    <a href="new.php?id=<?php echo $posts[1][0]; ?>">
							  		<img src="<?php echo $posts[1][2]; ?>" class="img-fluid"  alt="">
								  </a>
                                    <br>
                                    <h3>
                                        <a href="new.php?id=<?php echo $posts[1][0]; ?>" class="tieu-de">
                                            <?php echo $posts[1][1]; ?>
                                        </a>
                                    </h3>
                                    <br>
                                    <a href="new.php?id=<?php echo $posts[1][0]; ?>" class="tin-van mt-2">
                                        <?php echo $posts[1][3]; ?>
                                    </a>
                                </div>
                                <div class="col-md-6 col-12 border ml-1 mr-n1">
                                    <a href="new.php?id=<?php echo $posts[2][0]; ?>">
							  		<img src="<?php echo $posts[2][2]; ?>" class="img-fluid"  alt="">
								  </a>
                                    <br>
                                    <h3>
                                        <a href="new.php?id=<?php echo $posts[2][0]; ?>" class="tieu-de">
                                            <?php echo $posts[2][1]; ?>
                                        </a>
                                    </h3>
                                    <br>
                                    <a href="new.php?id=<?php echo $posts[2][0]; ?>" class="tin-van mt-2">
                                        <?php echo $posts[2][3]; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="row mt-3">
                                <div class="col-md-6 col-12 border ml-1 mr-n2">
                                    <a href="new.php?id=<?php echo $posts[3][0]; ?>">
							  		<img src="<?php echo $posts[3][2]; ?>" class="img-fluid"  alt="">
								  </a>
                                    <br>
                                    <h3>
                                        <a href="new.php?id=<?php echo $posts[3][0]; ?>" class="tieu-de">
                                            <?php echo $posts[3][1]; ?>
                                        </a>
                                    </h3>
                                    <br>
                                    <a href="" class="tin-van mt-2">
                                        <?php echo $posts[3][3]; ?>
                                    </a>
                                </div>
                                <div class="col-md-6 col-12 border ml-1 mr-n1">
                                    <a href="new.php?id=<?php echo $posts[4][0]; ?>">
							  		<img src="<?php echo $posts[4][2]; ?>" class="img-fluid"  alt="">
								  </a>
                                    <br>
                                    <h3>
                                        <a href="new.php?id=<?php echo $posts[4][0]; ?>" class="tieu-de">
                                            <?php echo $posts[4][1]; ?>
                                        </a>
                                    </h3>
                                    <br>
                                    <a href="" class="tin-van mt-2">
                                        <?php echo $posts[4][3]; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
			  ?>
        </div>
        <div class="row mt-5 ml-3">
            <a href="#">
                <h2 class="">Việt Nam</h2>
            </a>
            <?php
                $i=0;
                foreach ($posts as $row) {
                ?>
            <div class="col-12">
                
                <div class="row">
                    <div class="col-4 border-top border-left border-bottom py-5">
                        <a href="new.php?id=<?php echo $row['0']; ?>">
						<img src="<?php echo $row['2']; ?>" class="img-fluid"  alt="">
						</a>
                    </div>
                    <div class="col-8 border py-5">
                            <h3>
                                <a href="new.php?id=<?php echo $row['0']; ?>" class="tieu-de">
                                    <?php echo $row['1']; ?>
                                </a>
                            </h3>
                            <br>
                            <a href="" class="tin-van mt-2">
                                <?php echo $row['3']; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
                if (++$i == 5) break;
                } ?>    
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