<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class KhachHang_Model extends DB
	{

		// Phương thức lấy tất cả dữ liệu trong bảng khachhang
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query('SELECT * FROM khachhang ORDER BY `khachhang`.`idKhachHang` DESC');

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức lấy tất cả dữ liệu trong bảng khachhang
		public function getData_ID($a)
		{
			$conn = $this->connect();

			$result = $conn->query(" SELECT * FROM khachhang WHERE idKhachHang = '$a' ");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		//Phương thức check dữ liệu có bị trùng
		public function check_KH($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(khachhang.bsx) as bsx FROM khachhang WHERE khachhang.bsx = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['bsx'];
			return $data;
		}

		//Phương thức thêm khách hàng
		public function insert_KH($a, $b, $c, $d)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `khachhang`(`bsx`, `model`, `tenKH`, `sdtKH`) VALUES ('$a', '$b', N'$c' ,'$d')");

			return $result;
		}

		// Phương thức tìm kiếm khách hàng
		public function search_KH($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM khachhang WHERE bsx LIKE '%$a%' OR tenKH LIKE '%$a%' OR sdtKH LIKE '%$a%'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức cập nhật khách hàng
		public function update_KH($a, $b, $c, $d)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `khachhang` SET `model`='$b',`tenKH`= N'$c',`sdtKH`= '$d' WHERE idKhachHang = '$a'");

			return $result;
		}

	}

	?>