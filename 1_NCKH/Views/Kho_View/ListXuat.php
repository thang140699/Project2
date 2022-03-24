<?php 
if (isset($_SESSION['name']) == true && isset($_SESSION['quyen']) == true && isset($_SESSION['idUser'])) {
	?>
	<html>
	<head>

		<title>TOYOTA (Xuất Kho)</title>
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
		z-index: 1;<!DOCTYPE html>

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

	th {
		padding: 5px 10px;
		border: 1px solid #000;
	}

	thead {
		background: #f9f9f9;
		display: table;
		width: 100%;
		width: calc(100% - 18px);
		text-align: center;
	}

	tbody {
		/*height: 400px;*/
		overflow: auto;
		display: block;
		width: 100%;
		text-align: center;

	} 
	tr {
		display: table;
		width: 100%;
		table-layout: fixed;
	}

	th {
		overflow: hidden;
	}
</style>
<!--Check dữ liệu-->
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function()
	{
		document.querySelector('#submit').disabled = true;
		var arr = [<?php foreach ($all as $value) {echo '"'. $value['maXuatKho'] .'",'; } ?>];

		document.querySelector('#maXuatKho').oninput = function()
		{

			var checkk = arr.filter(arr => arr == document.querySelector('#maXuatKho').value);
			var s_checkk = String(checkk);

			if (document.querySelector('#maXuatKho').value != "")
			{
				if (s_checkk == document.querySelector('#maXuatKho').value) 
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

		document.querySelector('#NV_id1').oninput = function()
		{
			var maXuatKho = document.querySelector('#maXuatKho').value;
			var NV_id1 = document.querySelector('#NV_id1').value;
			var NV_id2 = document.querySelector('#NV_id2').value;
			var KH_id = document.querySelector('#KH_id').value;
			var lydoxuat = document.querySelector('#lydoxuat').value;
			var tiencong = document.querySelector('#tiencong').value;
			if (maXuatKho != "" && NV_id1 != "" && NV_id2 != "" && KH_id != "" && lydoxuat != "" && tiencong != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#NV_id2').oninput = function()
		{
			var maXuatKho = document.querySelector('#maXuatKho').value;
			var NV_id1 = document.querySelector('#NV_id1').value;
			var NV_id2 = document.querySelector('#NV_id2').value;
			var KH_id = document.querySelector('#KH_id').value;
			var lydoxuat = document.querySelector('#lydoxuat').value;
			var tiencong = document.querySelector('#tiencong').value;
			if (maXuatKho != "" && NV_id1 != "" && NV_id2 != "" && KH_id != "" && lydoxuat != "" && tiencong != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#KH_id').oninput = function()
		{
			var maXuatKho = document.querySelector('#maXuatKho').value;
			var NV_id1 = document.querySelector('#NV_id1').value;
			var NV_id2 = document.querySelector('#NV_id2').value;
			var KH_id = document.querySelector('#KH_id').value;
			var lydoxuat = document.querySelector('#lydoxuat').value;
			var tiencong = document.querySelector('#tiencong').value;
			if (maXuatKho != "" && NV_id1 != "" && NV_id2 != "" && KH_id != "" && lydoxuat != "" && tiencong != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#KH_id').oninput = function()
		{
			var maXuatKho = document.querySelector('#maXuatKho').value;
			var NV_id1 = document.querySelector('#NV_id1').value;
			var NV_id2 = document.querySelector('#NV_id2').value;
			var KH_id = document.querySelector('#KH_id').value;
			var lydoxuat = document.querySelector('#lydoxuat').value;
			var tiencong = document.querySelector('#tiencong').value;
			if (maXuatKho != "" && NV_id1 != "" && NV_id2 != "" && KH_id != "" && lydoxuat != "" && tiencong != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#tiencong').oninput = function()
		{
			var maXuatKho = document.querySelector('#maXuatKho').value;
			var NV_id1 = document.querySelector('#NV_id1').value;
			var NV_id2 = document.querySelector('#NV_id2').value;
			var KH_id = document.querySelector('#KH_id').value;
			var lydoxuat = document.querySelector('#lydoxuat').value;
			var tiencong = document.querySelector('#tiencong').value;

			if (maXuatKho != "" && NV_id1 != "" && NV_id2 != "" && KH_id != "" && lydoxuat != "" && tiencong != "")
			{
				document.querySelector('#submit').disabled = false;
			}
			else
			{
				document.querySelector('#submit').disabled = true;
			}
		}

		document.querySelector('#chuyendoi').disabled= true;
		document.querySelector('#tiencong').onkeyup = function(){
			if(document.querySelector('#tiencong').value.length >0)
				document.querySelector('#chuyendoi').disabled= false;
			else
				document.querySelector('#chuyendoi').disabled = true;
		};

		document.querySelector('#chuyendoi').onclick= tinhtong; 



	});
function tinhtong() {
	let a = document.querySelector('#thanhtien').value;
	let c = parseFloat(a);
	let b = document.querySelector('#tiencong').value;
	let d = parseFloat(b);
	document.querySelector('#ketqua').innerHTML = c + d;
}
</script>
</head>
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
				<h1 style="text-align: center; color: white;"><b>Quản lí hệ thống kho</b></h1>
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

		<div class="col-md-7 boder-right">
			<div class="container">
				<h1>Danh sách xuất kho</h1>
				<form action="" method="POST">
					<table class="table" border="1">
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã nguyên vật liệu</th>
								<th>Tên nguyên vật liệu</th>
								<th>Đơn giá xuất</th>
								<th>Số lượng xuất</th>
								<th>Thành tiền</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$tongtien = 0;
							$tong = 0;
							$stt = 1;
							if (isset($_SESSION["cart-xuat"])) {
								foreach ($_SESSION["cart-xuat"] as  $value)
								{
									$tong = $value["giaxuat"] * $value["sl_muonxuat"];
									$tongtien += $tong;
									?>
									<tr>
										<td> <?php echo $stt; ?></td>
										<td><?php echo $value["maNVL"] ?></td>
										<td><?php echo $value["tenNVL"]; ?></td>
										<td><?php echo $value["giaxuat"]; ?></td>
										<td>
											<input type="number" min="1" max="<?php echo $value["soluong"]; ?>" name="sl_muonxuat<?php echo $value["idNVL"]; ?>" value="<?php echo $value["sl_muonxuat"]; ?>">
										</td>
										<td><?php echo number_format($tong);  ?></td>
										<td>
											<a href="index.php?controller=Cart&action=Delete&id=<?php echo $value["idNVL"];?>">❌</a>
										</td>
									</tr>
									<?php
									$stt++;
								}
							}
							?>
						</tbody>
					</table>

					<div class="container">
						<p><a href="index.php?controller=NVL&action=List&key="> ✚ Thêm NVL</a></p>
					</div>
					<div>
						<button type="submit" class="bg-danger" name="update">Cập nhật danh sách</button>
					</div>
					<div>
						<p>Tổng giá tiền nhập kho là : <input type="text" id="thanhtien" value="<?php echo $tongtien; ?>" disabled>  (VNĐ)</p>
						<p>Tiền công sửa chữa: <input type="text" id="tiencong" name="tiencong" > VNĐ</p>
						<p>Thành tiền là : <span id="ketqua"></span> VNĐ</p> 
						<input type="button" id='chuyendoi' value="Cập nhật giá tiền">
					</div>
					<div>
						<p>
							<abbr title="Mã nhân viên / Tên nhân viên">
								Nhân viên phụ trách công việc
							</abbr>
						</p>
						<select name = "NV_id1" id = "NV_id1">
							<option value="">-Chọn-</option>
							<?php 
							if (!empty($data_NhanVien)) {
								foreach ($data_NhanVien as $value) {
									?>

									<option value="<?php echo $value['idNhanVien']?>">
										<?php 

										echo $value['maNV']." : ". $value['tenNV']

										?>
									</option>
									<?php
								}
							}	
							?>
						</select>
					</div><br>
					
					
					<div class="form-group">
						<label for="maXuatKho">Mã xuất kho</label>
						<input type="text" class="form-control" id="maXuatKho" placeholder="Nhập mã nhập kho" name="maXuatKho">
						<label id="error"></label>
					</div>
					<div class="form-group">
						<p>
							<abbr title="Biển số xe / Tên khách hàng / Số điện thoại">
								Khách hàng
							</abbr>
						</p>
						<select name="KH_id" id="KH_id">
							<option value="">-Chọn-</option>
							<?php 
							if (!empty($data_KhachHang)) {
								foreach ($data_KhachHang as $value) {
									?>

									<option value="<?php echo $value['idKhachHang']?>">
										<?php 

										echo $value['bsx']." : ". $value['tenKH']." : ". $value['sdtKH']

										?>
									</option>
									<?php

								}
							}	
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="lydoxuat">Lý do xuất</label>
						<input type="text" class="form-control" id="lydoxuat" placeholder="Nhập lý do" name="lydoxuat">
					</div>
					<div class="form-group">
						<p>
							<abbr title="Mã nhân viên / Tên nhân viên">
								Người tạo phiếu
							</abbr>
						</p>
						<select name = "NV_id2" id = "NV_id2">
							<option value="">-Chọn-</option>
							<?php 
							if (!empty($data_NhanVien)) {
								foreach ($data_NhanVien as $value) {
									?>

									<option value="<?php echo $value['idNhanVien']?>">
										<?php 

										echo $value['maNV']." : ". $value['tenNV']

										?>
									</option>
									<?php
								}
							}	
							?>
						</select>
						<input type="hidden" name="tongtien" value="<?php echo $tongtien; ?>">
					</div>

					<div class="form-group">
						<input  class="bg-danger" onclick="return confirm('Bạn đã cập nhật danh sách trước khi gửi chưa?');" type="submit" name="submit" id="submit" value="Xuất kho">
					</div>
				</form>
			</div>
		</div>




		<div class="col-md-2 mx-5">
			<div class="container">
				<div class="row text-center pb-5">
					<h5><a href="client.php">Trang chủ</a> </h5>          

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


