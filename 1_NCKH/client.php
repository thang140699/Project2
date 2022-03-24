<?php 
require_once 'Lib/Pagination.php';
session_start();
if (isset($_SESSION['name']) == true && isset($_SESSION['quyen']) == true && isset($_SESSION['idUser'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>

		<title>TOYOTA (Quản lý hệ thống)</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./Lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="./Lib/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./Lib/js/popper.min.js"></script>
	<script src="./Lib/js/bootstrap.min.js"></script>
	<!-- tắt cuộn nội dung mà thanh điều hướng đang hoạt động -->
	<script>
		$(function () {
			$('.navbar-toggler').click(function () {
				$('body').toggleClass('noscroll');
			})
		});
	</script>
	<!-- tắt cuộn nội dung mà thanh điều hướng đang hoạt động -->
	<script src="./Lib/js/jquery-2.1.4.min.js"></script>
	<!--/login-->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!--//login-->
	<!-- //jQuery-Photo-filter-lightbox-portfolio-plugin -->

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
			background-color: #6c757d;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}

		.sidenav a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: black;
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
				<!-- <img src="./Lib/images/logo_toyota.jpg"> -->
				<h2 style="text-align: center; color: #cc0000;"><b>TOYOTA</b></h2>
				<p  style="text-align: center;">Chuyển Động Tiên Phong</p>
			</div>

			<div class="col-md-6 mx-5 mt-5">

			</div>  

			<div class="col-md-2 mx-1 my-4">
				<div class="button-log usernhy mt-4 text-white">
					<a class="btn-open text-white">
						<h4><i class="fa fa-user" aria-hidden="true"></i>&nbsp;👤 <?php echo $_SESSION['name']; ?></h4>
					</a>
				</div>

				<div class="overlay-login text-left bg-white px-1 py-2">

					<div class="wrap">
						<div class="login-bghny p-md-3 p-2 mx-auto mw-300">
							<button class="btn btn-default bg-danger my-2 "><a href="index.php?controller=QL_User&action=Edit_Pass&idUser=<?php echo $_SESSION['idUser']; ?>">Đổi mật khẩu</a></button>
							<button class="btn btn-default bg-danger my-2 "><a href="index.php?controller=&action=logout">Đăng xuất</a></button>
						</div>  
					</div>
				</div>

			</div> 
		</div>

		<div class="row bg-secondary text-white">
			<div class="container text-center mb-3">
				<h1 style="text-align: center; color: white;"><b>Quản lý hệ thống</b></h1>
			</div>
		</div>

	</div>


	<div class="row mt-5 mb-5" >

		<div class="col-md-1 mx-5 boder-right">
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<h2>Quản lí hệ thống kho</h2>
				<ol>
					<ul>
						<li><a href="index.php?controller=QL_Kho&action=List">Quản lí nhập/xuất kho</a></li>
					</ul>
				</ol>
				<hr>
				<h2>Quản lí hệ thống</h2>
				<ol>
					<li>Quản lí thông tin khách hàng</li>
					<ul>
						<li><a href="index.php?controller=KhachHang&action=Add">Thêm mới thông tin khách hàng</a></li>
						<li><a href="index.php?controller=KhachHang&action=List&key=">Tra cứu thông tin khách hàng</a></li>
					</ul>
					<li>Quản lí thông tin nguyên vật liệu</li>
					<ul>
						<li><a href="index.php?controller=NVL&action=Add">Thêm mới thông tin nguyên vật liệu</a></li>
						<li><a href="index.php?controller=NVL&action=List&key=">Tra cứu thông tin nguyên vật liệu</a></li>
					</ul>
				</ol>
				<hr>
				<h2>Quản lí nhân sự</h2>
				<ol>
					<li>Quản lí thông tin nhân viên</li>
					<ul>
						<li><a href="index.php?controller=NhanVien&action=Add">Thêm mới thông tin nhân viên</a></li>
						<li><a href="index.php?controller=NhanVien&action=List&key=">Tra cứu thông tin nhân viên</a></li>
					</ul>
					<li>Quản lí thông tin accout của nhân viên</li>
					<ul>
						<li><a href="index.php?controller=QL_User&action=Add">Thêm mới thông tin account nhân viên</a></li>
						<li><a href="index.php?controller=QL_User&action=List&key=">Tra cứu thông tin account nhân viên</a></li>
						<li><a href="index.php?controller=QL_User&action=List_Remove&key=">Tra cứu thông tin account không hoạt động
						</a></li>
					</ul>
				</ol>	
			</div>
			<span style="font-size:30px;cursor:pointer" onclick="openNav()" >&#9776; Home</span>
		</div>

		<div class="col-md-7 boder-right">
			<center>
				<caption>Thông tin khách hàng</caption>
				<table border="1" style="width: 90%; text-align: center;" >
					<tr>
						<td>STT</td>
						<td>Biển số xe</td>
						<td>Model</td>
						<td>Họ và tên</td>
						<td>Số điện thoại</td>
					</tr>
					<?php
					$limit = 20; 
					$page = new Pagination();
					$total_records = $page->gettotalRecord_KH();
					$config = [
						'total' =>  $total_records,
						'limit' => $limit,
						'querystring' => 'page'
					];
					$page = new Pagination($config);

					$start = $page->getStart();
					$stt = $start + 1; 
					$data_KH = $page->getAllData_KH();

					if (!empty($data_KH)) {
						foreach ($data_KH as $value)
						{
							?>
							<tr>
								<td><?php echo $stt; ?></td>
								<td><?php echo $value['bsx']; ?></td>
								<td><?php echo $value['model']; ?></td>
								<td><?php echo $value['tenKH']; ?></td>
								<td><?php echo $value['sdtKH']; ?></td>
							</tr>
							<?php
							$stt++;
						}
					} else {
						?>
						<tr>
							<td>Không</td>
							<td>có giá trị</td>
							<td>xin mời</td>
							<td>bấm vào thêm mới</td>
							<td><a href="index.php?controller=KhachHang&action=Add"> + Thêm mới</a></td>
						</tr>
						<?php
					}
					
					?>
				</table>	
			</center>
			<!--CSS cho thanh phân trang-->
			<style>
				.buttons{
					float:right;
					position:relative;
					left:-50%;
					text-align:left;
				}
				.buttons ul{
					list-style:none;
					position:relative;
					left:50%;
				}

				.buttons li{float:left;position:relative;}/* ie needs position:relative here*/

				.buttons a{
					text-decoration:none;
					background:red;
					float:left;
					border:2px outset blue;
					color:#fff;
					padding:2px 5px;
					text-align:center;
					white-space:nowrap;
				}
				.buttons a:hover{ border:2px inset blue;color:red;background:#f2f2f2;}
				#content{overflow:hidden}/* hide horizontal scrollbar*/
			</style>
			<div class="buttons" style="margin-top: 20px;">
				<?php
				echo $page->getPagination();
				?>
			</div>
			
		</div>




		<div class="col-md-2 mx-5">
			<div class="container">
				<div class="row text-center pb-5">
					<ul>
						<li><a href="index.php?controller=KhachHang&action=Add">Thêm mới khách hàng</a></li>
						<li><a href="index.php?controller=NVL&action=List&key=">Đi tới danh sách NVL để nhập xuất</a></li>
					</ul>         
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
<?php 
}
else
{
	header("location: login.php");
}
?>


