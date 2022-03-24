<?php 
if (isset($_SESSION['name']) == true && isset($_SESSION['quyen']) == true && isset($_SESSION['idUser'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>

		<title>TOYOTA (Tạo mới nhân viên)</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./Lib/css/bootstrap.min.css">
		<link rel="stylesheet" href="./Lib/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./Lib/js/popper.min.js"></script>
	<script src="./Lib/js/bootstrap.min.js"></script>
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


	</style>
</head>
<!--Check dữ liệu-->

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function()
	{
		document.querySelector('#submit').disabled = true;
		var arr = [<?php foreach ($all as $value){echo '"'. $value['maNV'] .'",'; } ?>];

		document.querySelector('#maNV').oninput = function()
		{

			var checkk = arr.filter(arr => arr == document.querySelector('#maNV').value);
			var s_checkk = String(checkk);

			if (document.querySelector('#maNV').value != "")
			{
				if (s_checkk == document.querySelector('#maNV').value) 
				{
					document.querySelector('#error').innerHTML = "Dữ liệu đã bị trùng";
					document.querySelector('#submit').disabled = true;
				}
				else
				{
					document.querySelector('#error').innerHTML = "Có thể sử dụng";
					document.querySelector('#submit').disabled = false;
				}
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#tenNV').oninput = function()
		{
			var maNV = document.querySelector('#maNV').value;
			var tenNV = document.querySelector('#tenNV').value;
			var ngaythangnamsinh = document.querySelector('#ngaythangnamsinh').value;
			var tocongtac = document.querySelector('#tocongtac').value;
			var chucvu = document.querySelector('#chucvu').value;

			if (maNV != "" && tenNV != "" && ngaythangnamsinh != "" && tocongtac != "" && chucvu != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#ngaythangnamsinh').oninput = function()
		{
			var maNV = document.querySelector('#maNV').value;
			var tenNV = document.querySelector('#tenNV').value;
			var ngaythangnamsinh = document.querySelector('#ngaythangnamsinh').value;
			var tocongtac = document.querySelector('#tocongtac').value;
			var chucvu = document.querySelector('#chucvu').value;

			if (maNV != "" && tenNV != "" && ngaythangnamsinh != "" && tocongtac != "" && chucvu != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#tocongtac').oninput = function()
		{
			var maNV = document.querySelector('#maNV').value;
			var tenNV = document.querySelector('#tenNV').value;
			var ngaythangnamsinh = document.querySelector('#ngaythangnamsinh').value;
			var tocongtac = document.querySelector('#tocongtac').value;
			var chucvu = document.querySelector('#chucvu').value;

			if (maNV != "" && tenNV != "" && ngaythangnamsinh != "" && tocongtac != "" && chucvu != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#chucvu').oninput = function()
		{
			var maNV = document.querySelector('#maNV').value;
			var tenNV = document.querySelector('#tenNV').value;
			var ngaythangnamsinh = document.querySelector('#ngaythangnamsinh').value;
			var tocongtac = document.querySelector('#tocongtac').value;
			var chucvu = document.querySelector('#chucvu').value;

			if (maNV != "" && tenNV != "" && ngaythangnamsinh != "" && tocongtac != "" && chucvu != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}
	});
</script>


<body>

	<div class="header">

		<div class="row bg-secondary text-white">
			<div class="col-md-2 mx-5 my-4">
				<!-- <img src="./images/logo_toyota.jpg"> -->
				<h2 style="text-align: center; color: #cc0000;"><b>TOYOTA</b></h2>
				<p  style="text-align: center;">Chuyển Động Tiên Phong</p>
			</div>

			<div class="col-md-6 mx-5 mt-5">
			</div>  

			<div class="col-md-2 mx-1 my-4">
				<div class="button-log usernhy mt-4 text-white">
					<a class="btn-open text-white" >
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
				<h1 style="text-align: center; color: white;"><b>Quản lý nhân sự</b></h1>
			</div>
		</div>

	</div>


	<div class="row mt-5 mb-5" >
		<div class="col-md-2 mx-5 boder-right">
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href="client.php">Trang Chủ (Home)</a>
				<h2>Quản lí hệ thống kho</h2>
				<ol>
					<ul>
						<li><a href="index.php?controller=QL_Kho&action=Search">Quản lí nhập/xuất kho</a></li>
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

		<div class="col-md-3 boder-right">
			<div class="container">
				<h2>Thêm thông tin nhân viên</h2>
				<form action="" method="post">
					<div class="form-group">
						<label for="maNV">Mã nhân viên</label>
						<input type="text" class="form-control" id="maNV" placeholder="Nhập mã nhân viên" name="maNV">
						<label id="error"></label>
					</div>
					<div class="form-group">
						<label for="tenNV">Tên nhân viên</label>
						<input type="text" class="form-control" id="tenNV" placeholder="Nhập tên nhân viên" name="tenNV">
					</div>
					<div class="form-group">
						<label for="ngaythangnamsinh">Ngày/Tháng/Năm sinh</label>
						<input type="date" class="form-control" id="ngaythangnamsinh" name="ngaythangnamsinh">
					</div>
					<div class="form-group">
						<label for="tocongtac">Tổ công tác</label>
						<input type="text" class="form-control" id="tocongtac" placeholder="Nhập tổ công tác" name="tocongtac">
					</div>
					<div class="form-group">
						<label for="chucvu">Chức vụ</label>
						<select name="chucvu" class="form-control">
							<option value="">-Chọn-</option>
							<option value="Quản lý">Quản lý</option>
							<option value="Nhân viên">Nhân viên</option>
						</select>
					</div>
					<input type="submit" class="btn btn-default bg-danger text-white" name="submit" id="submit">
				</form>
			</div>
		</div>

		<div class="col-md-5 mx-5">
			<div class="container">
				<div class="row text-center pb-5">
					<h2>Bảng thông tin </h2> 
					<table border="1">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã nhân viên</th>
								<th>Tên nhân viên</th>
								<th>Ngày tháng năm sinh</th>
								<th>Tổ công tác</th>
								<th>Chức vụ</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$stt = 1;
							if ( !empty($all)) {
								foreach ($all as $values)
								{
									?>
									<tr>
										<td> <?php echo $stt; ?></td>
										<td><?php echo $values['maNV']; ?></td>
										<td><?php echo $values['tenNV']; ?></td>
										<td><?php echo $values['ngaythangnamsinh']; ?></td>
										<td><?php echo $values['tocongtac']; ?></td>
										<td><?php echo $values['chucvu']; ?></td>
									</tr>
									<?php 
									$stt++;
								}}
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
}
else
{
	header("location: login.php");
}
?>
<!-- tắt cuộn nội dung mà thanh điều hướng đang hoạt động -->
<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<!-- tắt cuộn nội dung mà thanh điều hướng đang hoạt động -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
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


