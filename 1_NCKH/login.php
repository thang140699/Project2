<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="./Lib/css/bootstrap.min.css">
  <script src="./Lib/js/jquery.min.js"></script>
  <script src="./Lib/js/popper.min.js"></script>
  <script src="./Lib/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: "Lato", sans-serif;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: white;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .boder-right{
      border-right: 2px solid;
      border-color: black;
    }

    .login{
      background-color: #d6d6c2 ;
      border-radius: 5px;
      padding-top: 20px;
      padding-bottom: 35px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
  </style>
</head>
<body>

  <div class="header">

    <div class="row bg-secondary text-white">
      <div class="col-md-2 mx-5 my-4">
        <!-- <img src="./images/logo_toyota.jpg"> -->
        <h2 style="text-align: center; color: #cc0000;"><b>TOYOTA</b></h2>
        <p  style="text-align: center;">Chuyển Động Tiên Phong</p>
      </div>
    </div>

    <div class="row bg-secondary text-white">
      <div class="container text-center mb-3">
        <h1 style="text-align: center; color: white;"><b> Đăng Nhập</b></h1>
      </div>
    </div>

  </div>

  <div class="row my-5" >
    <div class="col-md-4 my-3 mx-auto">
      <div class="login">
        <div class="container">
          <h2 class="text-center">Đăng Nhập</h2>
          <form action="index.php?controller=&action=login" method="post">
            <div class="form-group">
              <label for="user">Tài Khoản:</label>
              <input type="text" class="form-control" id="user" placeholder="Nhập Tài Khoản" name="tendangnhap">
            </div>
            <div class="form-group">
              <label for="pwd">Mật Khẩu:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Nhập Mật Khẩu" name="matkhau">
            </div>
            <center><button type="submit" name="submit" class="btn btn-default bg-danger">Đăng Nhập</button></center>
          </form>
          
        </div>
      </div>

    </div>
  </div>

  <div class="row mt-5 bg-secondary text-white">
    <div class="col-md-2 mx-1 my-5">
      <p class="container text-center text-danger">Dịch Vụ</p>
      <a class="nav-link text-center text-white" href="#">Bảo Hành</a>
      <a class="nav-link text-center text-white" href="#">Bảo Dưỡng</a>
      <a class="nav-link text-center text-white" href="#">Sửa Chữa</a>
      <a class="nav-link text-center text-white" href="#">Kiểm Tra</a>
      <a class="nav-link text-center text-white" href="#">...</a>
    </div>
    <div class="col-md-2 mx-1 my-5">
      <p class="container text-center text-danger">Tin Tức</p>
      <a class="nav-link text-center text-white" href="#">Tuyển Dụng</a>
      <a class="nav-link text-center text-white" href="#">Khuyến Mãi</a>
      <a class="nav-link text-center text-white" href="#">Sự Kiện</a>
      <a class="nav-link text-center text-white" href="#">Tin Tức Chung</a>
      <a class="nav-link text-center text-white" href="#">...</a>
    </div>
    <div class="col-md-2 mx-1 my-5">
      <p class="container text-center text-danger">Đại Lý</p>
      <a class="nav-link text-center text-white" href="#">Địa Chỉ</a>
      <a class="nav-link text-center text-white" href="#">Email</a>
      <a class="nav-link text-center text-white" href="#">Phone</a>
      <a class="nav-link text-center text-white" href="#">...</a>
    </div>
    <div class="col-md-5 mx-1 my-5">
      <p class="container text-danger"><b>Đăng Ký Nhận Tin</b> </p>
      <div class="container">
        <form action="#">
          <div class="form-group">
            <label for="name">Họ Và Tên:</label>
            <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <button type="submit" class="btn btn-default bg-danger text-white">Đăng Ký</button>
        </form>
      </div>
    </div>
  </div>





  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>

</body>
</html> 

