<?php 
if (isset($_SESSION['name']) == true && isset($_SESSION['quyen']) == true && isset($_SESSION['idUser'])) {
	$quyen = $_SESSION['quyen'];
	if ($quyen == 1) {
		?>
		<!DOCTYPE html>
		<html>
		<head>

			<title>TOYOTA</title>
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

		<!--CSS thanh cuộn bảng-->
		table {
			table-layout: fixed;
		}

		th, td {
			text-align: center;
			padding: 5px 10px;
			border: 1px solid #000;
		}

		thead {
			background: #f9f9f9;
			display: table;
			width: 100%;
			width: calc(100% - 18px);
		}

		tbody {
			height: 400px;
			overflow: auto;
			display: block;
			width: 100%;


		} 
		tr {
			display: table;
			width: 100%;
			table-layout: fixed;
		}

		td {
			overflow: hidden;
		}

		.container
		{
			width: 100%;
			max-width: 100%;
			float: left;

		}

		.container .col1
		{
			/*background-color: yellow;*/
			width: 33%;
			height: 600px;
			overflow: auto;
			float: left;
		}
		.container .col2
		{
			/*background-color: red;*/
			width: 33%;
			height: 600px;
			overflow: auto;
			float: left;
		}
		.container .col3
		{
			/*background-color: orange;*/
			width: 33%;
			height: 600px;
			overflow: auto;
			float: left;
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
				<h1 style="text-align: center; color: white;"><b>Quản lý kho</b></h1>
			</div>
		</div>

	</div>


	<div class="row mt-5 mb-5" >

		<div class="col-md-1 mx-5 ">
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href="client.php">Trang Chủ (Home)</a>
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
						<li><a href="index.php?controller=QL_User&action=List_Remove&key=">Thông tin account không hoạt động
						</a></li>
					</ul>
				</ol>
			</div>
			<span style="font-size:30px;cursor:pointer" onclick="openNav()" >&#9776; Home</span>
		</div>

		<div class="col-md-14">
			<div class="container">
				<div class="top">
					<center><h2>Tìm kiếm</h2>
						<form action="" method="get">
							<input type="hidden" name="controller" value="QL_Kho">
							<input type="hidden" name="action" value="List">
							<p>Từ <input type="date" name="fr"><br></p>
							<p>đến <input type="date" name="t"><br></p>
							<button type="submit" name="">Tìm kiếm</button>

						</form>
					</center>
				</div>
				<div class="col1">
					<h2>Nguyên vật liệu trong kho</h2>
					<table border="1">
						<thead>
							<tr>
								<td colspan="10">Bảng NVL</td>
							</tr>
							<tr>
								<th>STT</td>
									<th>Mã NVL</td>
										<th>Tên NVL</th>
										<th>Vị trí kho</th>
										<th>Đơn vị tính</th>
										<th>Số lượng</th>
										<th>Giá nhập</th>
										<th>Giá xuất</th>
										<th>Thành tiền</th>
										<th>Ghi chú</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$stt = 1;
									if (!empty($data_NVL_in_Kho)) {

										foreach ($data_NVL_in_Kho as $value)
										{
											?>
											<tr>
												<td><?php echo $stt; ?></td>
												<td><?php echo $value["maNVL"]; ?></td>
												<td><?php echo $value["tenNVL"]; ?></td>
												<td><?php echo $value["vitrikho"]; ?></td>
												<td><?php echo $value["donvitinh"]; ?></td>
												<td><?php echo $value["soluong"]; ?></td>
												<td><?php echo $value["gianhap"]; ?></td>
												<td><?php echo $value["giaxuat"]; ?></td>
												<td><?php echo $value["thanhtien"]; ?></td>
												<td><?php echo $value["ghichu"]; ?></td>
											</tr>
											<?php
											$stt++;
										}
									}
									else
									{
										?>
										<p>Hiện tại không có nguyên vật liệu nào trong kho</p>
										<a href="index.php?controller=NVL&action=Add">Bấm vào đây để thêm nguyên vật liệu</a>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="col2">
							<h2>Danh sách nhập kho</h2>
							<table border="1">
								<thead>
									<tr>
										<td colspan="12">Bảng NVL nhập kho</td>
									</tr>
									<tr>
										<th>STT</th>
										<th>Ngày nhập</th>
										<th>Mã nhập kho</th>
										<th>Trạng thái</th>
										<th>Tổng tiền</th>
										<th>Nhân viên lập đơn</th>
										<th colspan="2">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$stt = 1;
									if (!empty($data_Nhap_in_Kho)) {
										foreach ($data_Nhap_in_Kho as $value) {
											?>
											<tr>
												<td><?php echo $stt; ?></td>
												<td><?php echo $value["ngaynhap"]; ?></td>
												<td><?php echo $value["maNhapKho"]; ?></td>
												<td><?php echo $value["trangthai"]; ?></td>
												<td><?php echo $value["tongtien"]; ?></td>
												<td><?php echo $value["tenNV"]; ?></td>
												<td><a href="index.php?controller=QL_Kho&action=DetailNhap&idNhapKho=<?php echo $value["idNhapKho"] ?>">Xem chi tiết</a></td>
												<?php 
												if ($value["trangthai"] == "Chưa nhập") {
													echo "<td>
													<form method='post' action=''>
													<input type='hidden' name='idNhapKho' value=".$value["idNhapKho"].">
													<button type='submit'  name ='nhap'>Nhập kho</button>
													</form>
													</td>";
												} else {
													echo "<td>
													<form method='post' action=''>
													<input type='hidden' name='idNhapKho' value=".$value["idNhapKho"].">
													<button type='submit'  name ='hoantacnhap'> Hoàn tác nhập </button>
													</form>
													</td>";
												}
												?>
											</tr>
											<?php
											$stt++;
										}
									}
									else
									{
										?>
										<p>Hiện tại danh sách không có bản nào</p>
										<a href="index.php?controller=NVL&action=List&key=">Bấm vào đây để tạo danh sách nhập</a>
										<?php 
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="col3">
							<h2>Danh sách xuất kho</h2>
							<table border="1">
								<thead>
									<tr>
										<td colspan="14">Bảng NVL xuất kho</td>
									</tr>
									<tr>
										<th>STT</th>
										<th>Ngày xuất</th>
										<th>Mã xuất kho</th>
										<th>Biển số xe</th>
										<th>Trạng thái xuất</th>	
										<th>Lý do xuất</th>
										<th>Tổng tiền</th>
										<th>Nhân viên lập đơn</th>
										<th colspan="2">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$stt = 1;
									if (!empty($data_Xuat_in_Kho)) 
									{
										foreach ($data_Xuat_in_Kho as $value) 
										{
											?>
											<tr>
												<td><?php echo $stt; ?></td>
												<td><?php echo $value["ngayxuat"]; ?></td>
												<td><?php echo $value["maXuatKho"]; ?></td>
												<td><?php echo $value["bsx"]; ?></td>
												<td><?php echo $value["trangthai"]; ?></td>
												<td><?php echo $value["lydoxuat"]; ?></td>
												<td><?php echo $value["tongtien"]; ?></td>
												<td><?php echo $value["tenNV"]; ?></td>
												<td><a href="index.php?controller=QL_Kho&action=DetailXuat&idXuatKho=<?php echo $value["idXuatKho"] ?>">Xem chi tiết</a></td>
												<?php 
												if ($value["trangthai"] == "Chưa xuất") {
													echo "<td>
													<form method='post' action=''>
													<input type='hidden' name='idXuatKho' value=".$value["idXuatKho"].">
													<button type='submit' name ='xuat'>Xuất kho</button>
													</form></td>";
												} else {
													echo "<td>
													<form method='post' action=''>
													<input type='hidden' name='idXuatKho' value=".$value["idXuatKho"].">
													<button type='submit'  name ='hoantacxuat'> Hoàn tác xuất </button>
													</form>
													</td>";
												}
												?>

											</tr>
											<?php
											$stt++;
										}
									}
									else
									{
										?>
										<p>Hiện tại danh sách không có bản nào</p>
										<a href="index.php?controller=NVL&action=List&key=">Bấm vào đây để tạo danh sách xuất</a>
										<?php
									}
									?>
								</tbody>
							</table>
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
	} else {
		echo "Bạn không đủ quyền truy cập vào trang này<br>";
		echo "<a href='client.php'> Click để về quay lại</a>";
	}
}
else
{
	header("location: login.php");
}
?>