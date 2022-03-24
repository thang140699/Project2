
<?php 

require_once("Models/QL_Kho_Model.php");
$QL_Kho_Model = new QL_Kho_Model();

if (isset($_GET['action'])) 
{
	$action = $_GET['action'];
}
else
{
	$action = '';
}
session_start();
if ($_SESSION['name']) 
{
	switch ($action) 
	{
		
		case 'List':

		$data_NVL_in_Kho = $QL_Kho_Model->getAllData_nvl();
		$data_Nhap_in_Kho = $QL_Kho_Model->getAllData_nhapkho();
		$data_Xuat_in_Kho = $QL_Kho_Model->getAllData_xuatkho();
		
		if (isset($_GET["fr"]) && isset($_GET["t"])) 
		{
			$fr = $_GET['fr'];
			$t = $_GET['t'];
			if($fr != NULL && $t != NULL)
			{
				$data_Nhap_in_Kho = $QL_Kho_Model->Search_NhapKho($fr, $t);
				$data_Xuat_in_Kho = $QL_Kho_Model->Search_XuatKho($fr, $t);
			}
			else
			{
				$data_Nhap_in_Kho = $QL_Kho_Model->getAllData_nhapkho();
				$data_Xuat_in_Kho = $QL_Kho_Model->getAllData_xuatkho();
			}
		}

		if (isset($_POST["nhap"])) 
		{
			$idNhapKho = $_POST["idNhapKho"];
			$trangthai = "Đã nhập";
			$QL_Kho_Model->Update_TrangThai_Nhap($idNhapKho, $trangthai);

			$data_Find = $QL_Kho_Model->Find_idNVL_slnhap($idNhapKho);
			foreach ($data_Find as $value) 
			{
				$idNVL = $value["NVL_id"];
				$sl = $value["soluongnhap"];

				$QL_Kho_Model->Update_SoLuongNVL_Nhap($idNVL, $sl);
			}

			echo '<script language="javascript">alert("Thành công!");history.back();</script>';
		}

		if (isset($_POST["hoantacnhap"])) 
		{
			$idNhapKho = $_POST["idNhapKho"];
			$trangthai = "Chưa nhập";
			$QL_Kho_Model->Update_TrangThai_Nhap($idNhapKho, $trangthai);

			$data_Find = $QL_Kho_Model->Find_idNVL_slnhap($idNhapKho);
			foreach ($data_Find as $value) 
			{
				$idNVL = $value["NVL_id"];
				$sl = -($value["soluongnhap"]);

				$QL_Kho_Model->Update_SoLuongNVL_Nhap($idNVL, $sl);
			}

			echo '<script language="javascript">alert("Thành công!");history.back();</script>';
		}

		if (isset($_POST["xuat"])) 
		{
			$idXuatKho = $_POST["idXuatKho"];
			$trangthai = "Đã xuất";
			$QL_Kho_Model->Update_TrangThai_Xuat($idXuatKho, $trangthai);

			$data_Find = $QL_Kho_Model->Find_idNVL_slxuat($idXuatKho);
			foreach ($data_Find as $value) 
			{
				$idNVL = $value["NVL_id"];
				$sl = $value["soluongxuat"];

				$QL_Kho_Model->Update_SoLuongNVL_Xuat($idNVL, $sl);
			}
			echo '<script language="javascript">alert("Thành công!");history.back();</script>';

		}

		if (isset($_POST["hoantacxuat"])) 
		{
			$idXuatKho = $_POST["idXuatKho"];
			$trangthai = "Chưa xuất";
			$QL_Kho_Model->Update_TrangThai_Xuat($idXuatKho, $trangthai);

			$data_Find = $QL_Kho_Model->Find_idNVL_slxuat($idXuatKho);
			foreach ($data_Find as $value) 
			{
				$idNVL = $value["NVL_id"];
				$sl = -($value["soluongxuat"]);

				$QL_Kho_Model->Update_SoLuongNVL_Xuat($idNVL, $sl);
			}

			echo '<script language="javascript">alert("Thành công!");history.back();</script>';
		}

		require_once 'Views/QL_Kho_View/List.php';
		break;

		case 'DetailNhap':
		if (isset($_GET["idNhapKho"])) {
			$all = $QL_Kho_Model->getAllData_Detail_Nhap($_GET["idNhapKho"]);
		} else {
			header("location: index.php?controller=QL_Kho&action=List&fr=&t=");
		}
		require_once 'Views/QL_Kho_View/DetailNhap.php';
		break;

		case 'DetailXuat':
		if (isset($_GET["idXuatKho"])) {
			$all = $QL_Kho_Model->getAllData_Detail_Xuat($_GET["idXuatKho"]);
			$all1 = $QL_Kho_Model->getAllData_Detail_Xuat1($_GET["idXuatKho"]);
		} else {
			header("location: index.php?controller=QL_Kho&action=List&fr=&t=");
		}
		require_once 'Views/QL_Kho_View/DetailXuat.php';
		break;

		case 'ThanhToan':


			require_once 'Views/QL_Kho_View/ThanhToan.php';
			break;

		default:
		echo "ERROR";
		break;
	}
}
else
{
	header("location: login.php");
}
?>