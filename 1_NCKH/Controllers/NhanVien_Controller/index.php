<?php 

require_once("Models/NhanVien_Model.php");
$NhanVien_Model = new NhanVien_Model();

require_once("Models/User_Model.php");
$User_Model = new User_Model();


if (isset($_GET['action'])) 
{
	$action = $_GET['action'];
}
else
{
	$action = '';
}

$trangthai = array();

session_start();
if ($_SESSION['name']) {
	switch ($action) {
		case 'Add':
		$all = $NhanVien_Model->getAllData();

		$maNV = isset($_POST['maNV']) ? $_POST['maNV'] : NULL;
		$tenNV = isset($_POST['tenNV']) ? $_POST['tenNV'] : NULL;
		$ngaythangnamsinh = isset($_POST['ngaythangnamsinh']) ? $_POST['ngaythangnamsinh'] : NULL;
		$tocongtac = isset($_POST['tocongtac']) ? $_POST['tocongtac'] : NULL;
		$chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : NULL;

		if (isset($_POST['submit'])) 
		{
			if ($maNV == NULL || $tenNV == NULL || $ngaythangnamsinh == NULL || $tocongtac == NULL || $chucvu == NULL) {
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{
				$data = $NhanVien_Model->check_NV($maNV);
				// Ngăn không cho gửi dữ liệu
				if ($data == 1) {
					// echo '<script language="javascript">alert("Thất bại!");</script>';
				}
				else
				{
					if ($NhanVien_Model -> insert_NV($maNV, $tenNV, $ngaythangnamsinh, $tocongtac, $chucvu))
					{
						echo '<script language="javascript">alert("Thành công!"); location.reload();</script>';
						unset($maNV, $tenNV, $ngaythangnamsinh, $tocongtac, $chucvu);
					}
					else
					{
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}
				}
			}
		}
		require_once 'Views/NhanVien_View/Add.php';
		break;

		case 'List':

		if (isset($_GET['key']))
		{
			$key = $_GET['key'];
			$data_Search = $NhanVien_Model -> search_NV($key); 
		}
		require_once 'Views/NhanVien_View/List.php';
		break;

		case 'Edit':
		if (isset($_SESSION['quyen'])) 
		{
			$quyen = $_SESSION['quyen'];
			if ($quyen == 1) 
			{
				if (isset($_GET['idNhanVien'])) 
				{

					$idNhanVien = isset($_GET['idNhanVien']) ? $_GET['idNhanVien'] : NULL;

					$data_ID = $NhanVien_Model -> getData_ID($idNhanVien);
					
					$maNV = isset($_POST['maNV']) ? $_POST['maNV'] : NULL;
					$tenNV = isset($_POST['tenNV']) ? $_POST['tenNV'] : NULL;
					$ngaythangnamsinh = isset($_POST['ngaythangnamsinh']) ? $_POST['ngaythangnamsinh'] : NULL;
					$tocongtac = isset($_POST['tocongtac']) ? $_POST['tocongtac'] : NULL;
					$chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : NULL;

					if (isset($_POST['submit']))
					{
						if ($idNhanVien == NULL || $tenNV == NULL || $ngaythangnamsinh == NULL || $tocongtac == NULL || $chucvu == NULL ) 
						{
							$trangthai[] = 'thatbai';
						}
						else
						{
							if ($NhanVien_Model -> update_NV($idNhanVien, $tenNV, $ngaythangnamsinh, $tocongtac, $chucvu))
							{
								if ($chucvu == "Quản lý") {
									$quyen = 1;
									if ($User_Model -> change_Users($idNhanVien, $quyen)) {
										$trangthai[] = 'thanhcong';
										unset($idNhanVien, $tenNV, $ngaythangnamsinh, $tocongtac, $chucvu);
									} else {
										$trangthai[] = 'thatbai';
									}
								} else {
									$quyen = 0;
									if ($User_Model -> change_Users($idNhanVien, $quyen)) {
										$trangthai[] = 'thanhcong';
										unset($idNhanVien, $tenNV, $ngaythangnamsinh, $tocongtac, $chucvu);
									} else {
										$trangthai[] = 'thatbai';
									}
								}
							}
							else
							{
								$trangthai[] = 'thatbai';
							}
						}
					}
				}
				else
				{
					header("location: index.php?controller=NhanVien&action=List&key=");
				}

				require_once 'Views/NhanVien_View/Edit.php';
			} else {
				echo "Bạn không đủ quyền truy cập vào trang này<br>";
				echo "<a href='index.php?controller=NhanVien&action=List&key='> Click để về quay lại</a>";
			}

		} else {
			header("location: login.php");
		}
		break;




		default:
		echo "ERROR 404";
		break;
	}


} else {
	header("location: login.php");
}


?>