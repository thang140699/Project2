<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class NVL_Model extends DB
	{
		// Phương thức lấy tất cả dữ liệu trong bảng nvl
		public function getAllData()
		{
			$conn = $this->connect();

			$result = $conn->query('SELECT * FROM nvl ORDER BY `nvl`.`idNVL` DESC');

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức lấy tất cả dữ liệu trong bảng nvl
		public function getData_ID($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM nvl WHERE idNVL = '$a'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}

		//Phương thức check dữ liệu có bị trùng
		public function check_NVL($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT COUNT(nvl.maNVL) as maNVL FROM nvl WHERE nvl.maNVL = '$a'");
			$row = mysqli_fetch_assoc($result);
			$data = $row['maNVL'];
			return $data;
		}

		//Phương thức thêm nguyên vật liệu
		public function insert_NVL($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r)
		{
			$conn = $this->connect();

			$result = $conn->query("INSERT INTO `nvl`(`maNVL`, `tenNVL`, `vitrikho`, `donvitinh`, `soluong`, `gianhap`, `giaxuat`, `ghichu`, `tentp1`, `khoiluongtp1`, `tentp2`, `khoiluongtp2`, `tentp3`, `khoiluongtp3`, `tentp4`, `khoiluongtp4`, `tentp5`, `khoiluongtp5`) VALUES('$a', N'$b', '$c', N'$d', N'$e', N'$f', N'$g', N'$h', N'$i', N'$j', N'$k', N'$l', N'$m', N'$n', N'$o', N'$p', N'$q', N'$r')");

			return $result;
		}

		// Phương thức tìm kiếm nguyên vật liệu
		public function search_NVL($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT * FROM nvl WHERE maNVL LIKE '%$a%' OR tenNVL LIKE '%$a%'");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		// Phương thức cập nhật nguyên vật liệu
		public function update_NVL($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `nvl` SET 
				`tenNVL`= N'$b', 
				`vitrikho`= N'$c', 
				`donvitinh`= '$d',
				`soluong`= '$e', 
				`gianhap`= '$f',
				`giaxuat`= '$g', 
				`ghichu`= '$h', 
				`tentp1`= N'$i', 
				`khoiluongtp1`= '$j',
				`tentp2`= N'$k'
				,`khoiluongtp2`= '$l',
				`tentp3`= N'$m',
				`khoiluongtp3`= '$n',
				`tentp4`= N'$o',
				`khoiluongtp4`= '$p' 
				,`tentp5`= N'$q', 
				`khoiluongtp5`= '$r'
				WHERE idNVL = '$a'");

			return $result;
		}



	}

	?>