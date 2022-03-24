<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class NhapKho_Model extends DB
	{

		// Phương thức lấy tất cả dữ liệu trong bảng nhapkho
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query('SELECT * FROM nhapkho ORDER BY `nhapkho`.`idNhapKho` DESC');

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức tìm khóa chính lớn nhất ở bảng nhapkho 
		public function Find_ID_Max_NhapKho()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT MAX(idNhapKho) as 'idNhapKho' FROM nhapkho");

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$id_NhapKho = $datas["idNhapKho"];
				}
			}

			return $id_NhapKho;
		}

		//Phương thức check dữ liệu có bị trùng
		public function check_NhapKho($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(nhapkho.maNhapKho) as maNhapKho FROM nhapkho WHERE nhapkho.maNhapKho = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['maNhapKho'];
			return $data;
		}
		//
		public function Insert_NhapKho($a, $b, $c)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `nhapkho`(`maNhapKho`, `NV_id`, `trangthai`, `tongtien`) VALUES ('$a', '$b', N'Chưa nhập', '$c')");

			return $result;
		}
		//
		public function Insert_ChiTietNhapKho($a, $b, $c)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `chitietnhapkho`(`NhapKho_id`, `NVL_id`, `soluongnhap`) VALUES ('$a', '$b', '$c')");

			return $result;
		}


	}

	?>