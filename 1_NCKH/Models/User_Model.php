<?php 
require_once ("Lib/Connection.php");

	/**
	 * 
	 */
	class User_Model extends DB
	{
		public function check_tendangnhap_matkhau($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM  users WHERE tendangnhap = '$a' and matkhau = '$b'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function getTen($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM  users join nhanvien WHERE nhanvien.idNhanVien = users.NV_id and tendangnhap = '$a'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức lấy tất cả dữ liệu trong bảng users
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT *,
				(nhanvien.tenNV) as tenNV ,
				(nhanvien.maNV) as maNV,
				(nhanvien.idNhanVien) as idNhanVien
				FROM users JOIN nhanvien 
				WHERE nhanvien.idNhanVien = users.NV_id 
				ORDER BY `users`.`idUser` DESC" );

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức lấy tất cả dữ liệu trong bảng users
		public function getData_ID($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT *, (nhanvien.tenNV) as tenNV FROM users JOIN nhanvien WHERE idUser = '$a' AND nhanvien.idNhanVien = users.NV_id");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}

		//Phương thức check dữ liệu có bị trùng
		public function check_User($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(users.tendangnhap) as tendangnhap FROM users WHERE users.tendangnhap = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['tendangnhap'];
			return $data;
		}

		//Phương thức thêm account nhân viên
		public function insert_User($a, $b, $c)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `users`(`tendangnhap`, `matkhau`, `quyen`, `NV_id`, `anhien`) VALUES ('$a', '$b', 0, '$c', 1)");

			return $result;
		}

		// Phương thức tìm kiếm account hiện
		public function search_User_hien($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT *, (nhanvien.tenNV) as tenNV FROM users JOIN nhanvien WHERE tendangnhap LIKE '%$a%' AND nhanvien.idNhanVien = users.NV_id AND users.anhien = 1 ORDER BY `users`.`idUser` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức tìm kiếm account hiện
		public function search_User_an($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT *, (nhanvien.tenNV) as tenNV FROM users JOIN nhanvien WHERE tendangnhap LIKE '%$a%' AND nhanvien.idNhanVien = users.NV_id AND users.anhien = 0 ORDER BY `users`.`idUser` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức cập nhật account
		public function update_User_Pass($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `users` SET 
				`matkhau`= '$b'
				WHERE idUser = '$a'");

			return $result;
		}

		// Phương thức cập nhật account
		public function update_User($a, $b, $c)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `users` SET 
				`matkhau`= '$b', 
				`NV_id`= '$c'
				WHERE idUser = '$a'");

			return $result;
		}

		// Phương thức ẩn khỏi danh sách
		public function remove_Users($a)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `users` SET 
				`anhien` = 0
				WHERE idUser = '$a'");

			return $result;
		}

		// Phương thức ẩn khỏi danh sách
		public function restore_Users($a)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `users` SET 
				`anhien`= '1'
				WHERE idUser = '$a'");

			return $result;
		}

		// Phương thức xóa account
		public function delete_User($a)
		{
			$conn = $this->connect();

			$result = $conn->query("DELETE FROM `users` WHERE idUser = '$a'");

			return $result;
		}

		// Phương thức thay đổi quyền
		public function change_Users($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `users` SET `quyen`= b'$b' WHERE NV_id = '$a'");

			return $result;
		}

	}
	?>