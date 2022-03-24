<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class XuatKho_Model extends DB
	{
		// Phương thức lấy tất cả dữ liệu trong bảng xuatkho
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query('SELECT * FROM xuatkho ORDER BY `xuatkho`.`idXuatKho` DESC');

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		//Phương thức check dữ liệu có bị trùng
		public function check_XuatKho($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(xuatkho.maXuatKho) as maXuatKho FROM xuatkho WHERE xuatkho.maXuatKho = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['maXuatKho'];
			return $data;
		}

		//
		public function Insert_XuatKho($a, $b, $c, $d, $e, $f, $g, $h)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `xuatkho`(`NV_id1`, `NV_id2`, `KH_id`, `maXuatKho`, `tiencong`, `tongtien`, `trangthai`, `lydoxuat`, `tongchiphi`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', N'Chưa xuất', '$g', '$h')");

			return $result;
		}

		// Phương thức tìm khóa chính lớn nhất ở bảng xuatkho 
		public function Find_ID_Max_XuatKho()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT MAX(idXuatKho) as 'idXuatKho' FROM xuatkho");

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$idXuatKho = $datas["idXuatKho"];
				}
			}

			return $idXuatKho;
		}

		//
		//
		public function Insert_ChiTietXuatKho($a, $b, $c)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `chitietxuatkho`(`XuatKho_id`, `NVL_id`, `soluongxuat`) VALUES ('$a','$b','$c')");

			return $result;
		}


	}

	?>