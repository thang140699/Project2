<?php 
require_once ("Lib/Connection.php");
	/**
	 * 
	 */
	class QL_Kho_Model extends DB
	{
		public function getAllData_nvl()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT *, (nvl.soluong * nvl.gianhap) as thanhtien  FROM  nvl");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function getAllData_Detail_Nhap($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT nvl.maNVL, 
				nvl.tenNVL, 
				nvl.gianhap, 
				chitietnhapkho.soluongnhap, 
				(nvl.gianhap * chitietnhapkho.soluongnhap) as ThanhTien 
				FROM nhapkho JOIN chitietnhapkho JOIN nvl 
				WHERE chitietnhapkho.NVL_id = nvl.idNVL 
				AND chitietnhapkho.NhapKho_id = nhapkho.idNhapKho
				AND nhapkho.idNhapKho = '$a'
				");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}

		public function getAllData_nhapkho()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT nhapkho.idNhapKho,
				nhapkho.ngaynhap, 
				nhapkho.maNhapKho, 
				nhapkho.trangthai, 
				nhapkho.tongtien, 
				nhanvien.tenNV 
				FROM nhapkho JOIN nhanvien
				WHERE nhapkho.NV_id = nhanvien.idNhanVien
				ORDER BY `nhapkho`.`idNhapKho` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function Search_NhapKho($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT nhapkho.idNhapKho,
				nhapkho.ngaynhap, 
				nhapkho.maNhapKho, 
				nhapkho.trangthai, 
				nhapkho.tongtien, 
				nhanvien.tenNV 
				FROM nhapkho JOIN nhanvien
				WHERE nhapkho.NV_id = nhanvien.idNhanVien
				AND (nhapkho.ngaynhap BETWEEN  '$a' AND  '$b')
				ORDER BY `nhapkho`.`idNhapKho` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		//

		public function Update_TrangThai_Nhap($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `nhapkho` SET `trangthai`= '$b' WHERE `idNhapKho` = '$a'");

			return $result;
		}

		//

		public function Find_idNVL_slnhap($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT 
				chitietnhapkho.NVL_id, chitietnhapkho.soluongnhap 
				FROM chitietnhapkho 
				WHERE NhapKho_id = '$a'");

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function Update_SoLuongNVL_Nhap($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `nvl` SET `soluong`= (nvl.soluong + '$b') WHERE idNVL = '$a'");

			return $result;
		}


//////////////////////////////////////////////////////////////////////////////////////////////////

		public function getAllData_Detail_Xuat($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT xuatkho.maXuatKho,
				khachhang.tenKH,
				khachhang.sdtKH,
				khachhang.bsx,
				khachhang.model,
				nhanvien.tenNV,
				xuatkho.tiencong,
				xuatkho.tongtien,
				xuatkho.lydoxuat,
				xuatkho.tongchiphi
				FROM xuatkho JOIN khachhang JOIN nhanvien
				WHERE nhanvien.idNhanVien = xuatkho.NV_id1
				AND xuatkho.KH_id = khachhang.idKhachHang 
				AND xuatkho.idXuatKho = '$a'
				ORDER BY `xuatkho`.`idXuatKho` DESC
				");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}


		public function getAllData_Detail_Xuat1($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT nvl.maNVL, 
				nvl.tenNVL, 
				nvl.giaxuat, 
				chitietxuatkho.soluongxuat, 
				(nvl.giaxuat * chitietxuatkho.soluongxuat) as ThanhTien 
				FROM xuatkho JOIN chitietxuatkho JOIN nvl
				WHERE chitietxuatkho.NVL_id = nvl.idNVL 
				AND chitietxuatkho.XuatKho_id = xuatkho.idXuatKho
				AND xuatkho.idXuatKho = '$a'
				ORDER BY `xuatkho`.`idXuatKho` DESC
				");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;

		}

		public function getAllData_xuatkho()
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT xuatkho.idXuatKho,
				xuatkho.ngayxuat, 
				xuatkho.maXuatKho, 
				xuatkho.trangthai,
				xuatkho.lydoxuat, 
				xuatkho.tongtien, 
				nhanvien.tenNV,
				khachhang.bsx 
				FROM xuatkho JOIN nhanvien JOIN khachhang
				WHERE xuatkho.NV_id2 = nhanvien.idNhanVien
				AND xuatkho.KH_id = khachhang.idKhachHang
				ORDER BY `xuatkho`.`idXuatKho` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function Search_XuatKho($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT xuatkho.idXuatKho,
				xuatkho.ngayxuat, 
				xuatkho.maXuatKho, 
				xuatkho.trangthai, 
				xuatkho.tongtien,
				xuatkho.lydoxuat, 
				nhanvien.tenNV,
				khachhang.bsx 
				FROM xuatkho JOIN nhanvien JOIN khachhang
				WHERE xuatkho.NV_id2 = nhanvien.idNhanVien
				AND xuatkho.KH_id = khachhang.idKhachHang
				AND (xuatkho.ngayxuat BETWEEN  '$a' AND  '$b')
				ORDER BY `xuatkho`.`idXuatKho` DESC");

			$data = array();

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		//

		public function Update_TrangThai_Xuat($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `xuatkho` SET `trangthai`= '$b' WHERE `idXuatKho` = '$a'");

			return $result;
		}

		//

		public function Find_idNVL_slxuat($a)
		{
			$conn = $this->connect();

			$result = $conn->query("SELECT 
				chitietxuatkho.NVL_id, chitietxuatkho.soluongxuat
				FROM chitietxuatkho 
				WHERE XuatKho_id = '$a'");

			if($result -> num_rows > 0) {
				while($datas = mysqli_fetch_assoc($result)) {
					$data[] = $datas;
				}
			}

			return $data;
		}

		public function Update_SoLuongNVL_Xuat($a, $b)
		{
			$conn = $this->connect();

			$result = $conn->query("UPDATE `nvl` SET `soluong`= (nvl.soluong - '$b') WHERE idNVL = '$a'");

			return $result;
		}
	}

?>