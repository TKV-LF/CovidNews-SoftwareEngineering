<style>
    .nav-link {
        color: #0d0f0e !important;
        font-weight: 700;
    }

    .nav-link:hover {
        color: green !important;
    }

    

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
    --shadow: 0 0 15px 0 rgba(0,0,0,0.05);
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
  
          .text-gradient {
            font-weight: bold;
            font-size: 4rem;
            display: inline-block;
            color: var(--purple);
          }
          @supports (-webkit-background-clip: text) {
            .text-gradient {
              color: transparent;
              background-image: var(--gradient);
              -webkit-background-clip: text;
            }
          }
</style>

<nav class="navbar navbar-expand-sm" style="background-image: linear-gradient(
              to right,
              #37CCFF,
              #7B22FF
            );">
    <a class="navbar-brand mx-5 text-gradient" style="" href="./home.php">CovidNews</a>
    <button class="navbar-toggler d-lg-none" style="color: white !important;" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./home.php">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Trong nước</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Thế giới</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="admin">Đăng nhập</a>
                </div>
            </li>
        </ul>
        <form method="post" action="search.php" class="form-inline my-2 my-lg-0">
            <p class="my-auto mx-4" style="color: white !important;">
            <?php
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                echo "Bây giờ là  " . date("h:i:s")." Ngày ".date("d-m-Y");
            ?>
            </p>
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</nav>

