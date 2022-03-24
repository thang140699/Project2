<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class NhanVien_Model extends DB
	{
		// Phương thức lấy tất cả dữ liệu trong bảng nhanvien
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query('SELECT * FROM nhanvien ORDER BY `nhanvien`.`idNhanVien` DESC');

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}


		// Phương thức lấy tất cả dữ liệu trong bảng nhanvien
		public function getData_ID($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM nhanvien WHERE idNhanVien = '$a'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}

		//Phương thức check dữ liệu có bị trùng
		public function check_NV($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(nhanvien.maNV) as maNV FROM nhanvien WHERE nhanvien.maNV = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['maNV'];
			return $data;
		}

		//Phương thức thêm nhân viên
		public function insert_NV($a, $b, $c, $d, $e)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `nhanvien`(`maNV`, `tenNV`, `ngaythangnamsinh`, `tocongtac`, `chucvu`) VALUES ('$a', N'$b', '$c' , N'$d', N'$e')");

			return $result;
		}

		// Phương thức tìm kiếm nguyên vật liệu
		public function search_NV($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM nhanvien WHERE maNV LIKE '%$a%' OR tenNV LIKE '%$a%'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức cập nhật nguyên vật liệu
		public function update_NV($a, $b, $c, $d, $e)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `nhanvien` SET `tenNV`= N'$b',`ngaythangnamsinh`= '$c',`tocongtac`= N'$d',`chucvu`= N'$e' WHERE idNhanVien = '$a'");

			return $result;
		}
	}

	?>