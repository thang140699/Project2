<?php 
if (isset($_SESSION['name']))
{
	?>
	<!DOCTYPE html>
	<html>
	<head>

		<title>TOYOTA (Tạo mới nguyên vật liệu)</title>
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
		var arr = [<?php foreach ($all as $value){echo '"'. $value['maNVL'] .'",'; } ?>];

		document.querySelector('#maNVL').oninput = function()
		{

			var checkk = arr.filter(arr => arr == document.querySelector('#maNVL').value);
			var s_checkk = String(checkk);

			if (document.querySelector('#maNVL').value != "")
			{
				if (s_checkk == document.querySelector('#maNVL').value) 
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

		document.querySelector('#tenNVL').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#vitrikho').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#donvitinh').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#soluong').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#gianhap').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}
		document.querySelector('#giaxuat').oninput = function()
		{
			var maNVL = document.querySelector('#maNVL').value;
			var tenNVL = document.querySelector('#tenNVL').value;
			var vitrikho = document.querySelector('#vitrikho').value;
			var donvitinh = document.querySelector('#donvitinh').value;
			var soluong = document.querySelector('#soluong').value;
			var gianhap = document.querySelector('#gianhap').value;
			var giaxuat = document.querySelector('#giaxuat').value;

			if (maNVL != "" && tenNVL != "" && vitrikho != "" && donvitinh != "" && soluong != "" && gianhap != "" && giaxuat != "")
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
				<h1 style="text-align: center; color: white;"><b>Quản lý hệ thống</b></h1>
			</div>
		</div>

	</div>


	<div class="row mt-5 mb-5" >
		<div class="col-md-1 mx-5 boder-right">
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
						<li><a href="index.php?controller=QL_User&action=List_Remove&key=">Tra cứu thông tin account không hoạt động
						</a></li>
					</ul>
				</ol>	
			</div>
			<span style="font-size:30px;cursor:pointer" onclick="openNav()" >&#9776; Home</span>
		</div>

		<div class="col-md-2 boder-right">
			<div class="container">
				<h2>Thêm nguyên vật liệu</h2>
				<form action="" method="post">
					<div class="form-group">
						<label for="maNVL">Mã nguyên vật liệu</label>
						<input type="text" class="form-control" id="maNVL" placeholder="Nhập mã nguyên vật liệu" name="maNVL">
						<label id="error"></label>
					</div>
					<div class="form-group">
						<label for="tenNVL">Tên nguyên vật liệu</label>
						<input type="text" class="form-control" id="tenNVL" placeholder="Nhập tên nguyên vật liệu" name="tenNVL">
					</div>
					<div class="form-group">
						<label for="vitrikho">Vị trí kho</label>
						<input type="text" class="form-control" id="vitrikho" placeholder="Nhập vị trí kho" name="vitrikho">
					</div>
					<div class="form-group">
						<label for="donvitinh">Đơn vị tính</label>
						<select name="donvitinh" class="form-control" id="donvitinh">
							<option value="">-Chọn-</option>
							<option value="Chiếc">Chiếc</option>
							<option value="Cặp">Cặp</option>
							<option value="Hộp">Hộp</option>
							<option value="Thùng">Thùng</option>
						</select>

					</div>
					<div class="form-group">
						<label for="soluong">Số lượng</label>
						<input type="number" placeholder="Mời nhập số lượng" class="form-control" id="soluong"  name="soluong">
						
					</div>
					<div class="form-group">
						<label for="gianhap">Giá nhập</label>
						<input type="number" placeholder="Mời nhập giá nhập" class="form-control" id="gianhap" name="gianhap">
					</div>
					<div class="form-group">
						<label for="giaxuat">Giá xuất</label>
						<input type="number"  placeholder="Mời nhập giá xuất" class="form-control" id="giaxuat" name="giaxuat">
					</div>
					<div class="form-group">
						<label for="ghichu">Ghi chú</label>
						<input type="text" class="form-control" id="ghichu" placeholder="Nhập ghi chú" name="ghichu">
					</div>
					<div class="form-group">
						<p style="color: red">NVL là sơn thì nhập</p>
					</div>
					<div class="form-group">
						<label for="tentp1">Tên thành phần 1</label>
						<input type="text" class="form-control" id="tentp1" placeholder="Nhập tên thành phần" name="tentp1">
					</div>
					<div class="form-group">
						<label for="khoiluongtp1">Khối lượng thành phần 1</label>
						<input type="text" class="form-control" id="khoiluongtp1" placeholder="Nhập khối lượng thành phần" name="khoiluongtp1">
					</div>
					<div class="form-group">
						<label for="tentp2">Tên thành phần 2</label>
						<input type="text" class="form-control" id="tentp2" placeholder="Nhập tên thành phần" name="tentp2">
					</div>
					<div class="form-group">
						<label for="khoiluongtp2">Khối lượng thành phần 2</label>
						<input type="text" class="form-control" id="khoiluongtp2" placeholder="Nhập khối lượng thành phần" name="khoiluongtp2">
					</div>
					<div class="form-group">
						<label for="tentp3">Tên thành phần 3</label>
						<input type="text" class="form-control" id="tentp3" placeholder="Nhập tên thành phần" name="tentp3">
					</div>
					<div class="form-group">
						<label for="khoiluongtp3">Khối lượng thành phần 3</label>
						<input type="text" class="form-control" id="khoiluongtp3" placeholder="Nhập khối lượng thành phần" name="khoiluongtp3">
					</div>
					<div class="form-group">
						<label for="tentp4">Tên thành phần 4</label>
						<input type="text" class="form-control" id="tentp4" placeholder="Nhập tên thành phần" name="tentp4">
					</div>
					<div class="form-group">
						<label for="khoiluongtp4">Khối lượng thành phần 4</label>
						<input type="text" class="form-control" id="khoiluongtp4" placeholder="Nhập khối lượng thành phần" name="khoiluongtp4">
					</div>
					<div class="form-group">
						<label for="tentp5">Tên thành phần 5</label>
						<input type="text" class="form-control" id="tentp5" placeholder="Nhập tên thành phần" name="tentp5">
					</div>
					<div class="form-group">
						<label for="khoiluongtp5">Khối lượng thành phần 5</label>
						<input type="text" class="form-control" id="khoiluongtp5" placeholder="Nhập khối lượng thành phần" name="khoiluongtp5">
					</div>
					<input type="submit" class="btn btn-default bg-danger text-white" name="submit" id="submit">
				</form>
			</div>
		</div>

		<div class="col-md-8 mx-1">
			<div class="container">
				<div class="row text-center pb-5">
					<h2>Bảng thông tin </h2> 
					<table border="1">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã NVL</th>
								<th>Tên NVL</th>
								<th>Vị trí kho</th>
								<th>Đơn vị tính</th>
								<th>Số lượng</th>
								<th>Giá nhập</th>
								<th>Giá xuất</th>
								<th>Ghi chú</th>
								<th>Tên thành phần 1</th>
								<th>KL thành phần 1</th>
								<th>Tên thành phần 2</th>
								<th>KL thành phần 2</th>
								<th>Tên thành phần 3</th>
								<th>KL thành phần 3</th>
								<th>Tên thành phần 4</th>
								<th>KL thành phần 4</th>
								<th>Tên thành phần 5</th>
								<th>KL thành phần 5</th>
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
										<td><?php echo $values['maNVL']; ?></td>
										<td><?php echo $values['tenNVL']; ?></td>
										<td><?php echo $values['vitrikho']; ?></td>
										<td><?php echo $values['donvitinh']; ?></td>
										<td><?php echo $values['soluong']; ?></td>
										<td><?php echo $values['gianhap']; ?></td>
										<td><?php echo $values['giaxuat']; ?></td>
										<td><?php echo $values['ghichu']; ?></td>
										<td><?php echo $values['tentp1']; ?></td>
										<td><?php echo $values['khoiluongtp1']; ?></td>
										<td><?php echo $values['tentp2']; ?></td>
										<td><?php echo $values['khoiluongtp2']; ?></td>
										<td><?php echo $values['tentp3']; ?></td>
										<td><?php echo $values['khoiluongtp3']; ?></td>
										<td><?php echo $values['tentp4']; ?></td>
										<td><?php echo $values['khoiluongtp4']; ?></td>
										<td><?php echo $values['tentp5']; ?></td>
										<td><?php echo $values['khoiluongtp5']; ?></td>
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


