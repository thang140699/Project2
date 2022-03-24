<?php 
require_once("Models/NVL_Model.php");
$NVL_Model = new NVL_Model();

require_once("Models/NhanVien_Model.php");
$NhanVien_Model = new NhanVien_Model();

require_once("Models/NhapKho_Model.php");
$NhapKho_Model = new NhapKho_Model();

require_once("Models/XuatKho_Model.php");
$XuatKho_Model = new XuatKho_Model();

require_once("Models/KhachHang_Model.php");
$KhachHang_Model = new KhachHang_Model();


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
	//
		case 'AddNhap':

		$data_NhanVien = $NhanVien_Model->getAllData();
		$all = $NhapKho_Model->getAllData();

	// Cập nhật nhập danh sách nhập
		if (isset($_POST['update'])) 
		{
			if (isset($_SESSION["cart-nhap"]))
			{
				foreach ($_SESSION["cart-nhap"] as $value)
				{
					if ($_POST["sl_muonnhap".$value["idNVL"]] <= 0)
					{
						unset($_SESSION["cart-nhap"][$value["idNVL"]]);
					}
					else 
					{
						$_SESSION["cart-nhap"][$value["idNVL"]]["sl_muonnhap"] = $_POST["sl_muonnhap".$value["idNVL"]];
					}
				}
			}
		}

	// Thêm nhập kho

		if (isset($_POST['submit'])) 
		{
			$maNhapKho = $_POST["maNhapKho"] ? $_POST['maNhapKho'] : NULL;
			$NV_id = $_POST["NV_id"] ? $_POST['NV_id'] : NULL;
			$tongtien = $_POST["tongtien"] ? $_POST['tongtien'] : NULL;
			
			if ($maNhapKho == NULL && $NV_id == NULL && $tongtien == NULL) 
			{
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{	
				$data = $NhapKho_Model->check_NhapKho($maNhapKho);
				if ($data == 1) {
					echo '<script language="javascript">alert("Thất bại!");</script>';
				} else {
					if ($NhapKho_Model->Insert_NhapKho($maNhapKho, $NV_id, $tongtien)) 
					{
						$data_id_max_nhapkho = $NhapKho_Model->Find_ID_Max_NhapKho();

						$cart = !empty($_SESSION["cart-nhap"]) ? $_SESSION["cart-nhap"]:[];

						foreach ($cart as $value) 
						{
							$idNVL = $value["idNVL"];
							$soluongnhap = $value["sl_muonnhap"];
							$NhapKho_Model->Insert_ChiTietNhapKho($data_id_max_nhapkho, $idNVL, $soluongnhap);
						}

						unset($maNhapKho, $NV_id, $tongtien,$data_id_max_nhapkho,$idNVL,$soluongnhap);
						echo '<script language="javascript">alert("Thành công!");</script>';
						unset($_SESSION["cart-nhap"]);
					} else {
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}
				}
			}
		}
		require_once 'Views/Kho_View/ListNhap.php';
		break;
		
	//	
		case 'AddXuat':
		
		$data_NhanVien = $NhanVien_Model->getAllData();
		$data_KhachHang = $KhachHang_Model->getAllData();
		$all = $XuatKho_Model->getAllData();
	// Cập nhật nhập danh sách xuất
		if (isset($_POST['update'])) 
		{
			if (isset($_SESSION["cart-xuat"]))
			{
				foreach ($_SESSION["cart-xuat"] as $value)
				{
					if ($_POST["sl_muonxuat".$value["idNVL"]] <= 0)
					{
						unset($_SESSION["cart-xuat"][$value["idNVL"]]);
					}
					else 
					{
						$_SESSION["cart-xuat"][$value["idNVL"]]["sl_muonxuat"] = $_POST["sl_muonxuat".$value["idNVL"]];
					}
				}
			}
		}

	// Thêm xuất kho

		if (isset($_POST['submit'])) 
		{
			$maXuatKho = $_POST["maXuatKho"] ? $_POST['maXuatKho'] : NULL;
			$NV_id1 = $_POST["NV_id1"] ? $_POST['NV_id1'] : NULL;
			$NV_id2 = $_POST["NV_id2"] ? $_POST['NV_id2'] : NULL;
			$KH_id = $_POST["KH_id"] ? $_POST['KH_id'] : NULL;
			$lydoxuat = $_POST["lydoxuat"] ? $_POST['lydoxuat'] : NULL;
			$tongtien = $_POST["tongtien"] ? $_POST['tongtien'] : NULL;
			$tiencong = $_POST["tiencong"] ? $_POST['tiencong'] : NULL;
			$tongchiphi = $tongtien + $tiencong;
			if ($maXuatKho == NULL && $NV_id1 == NULL && $NV_id2 == NULL && $KH_id == NULL && $lydoxuat == NULL && $tongtien == NULL && $tiencong == NULL && $tongchiphi == NULL) 
			{
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{	
				$data = $XuatKho_Model->check_XuatKho($maXuatKho);
				if ($data == 1) {
					echo '<script language="javascript">alert("Thất bại!");</script>';
				} else {

					


					
					if ($XuatKho_Model->Insert_XuatKho($NV_id1, $NV_id2, $KH_id, $maXuatKho, $tiencong, $tongtien, $lydoxuat, $tongchiphi)) 
					{
						$data_id_max_xuatkho = $XuatKho_Model->Find_ID_Max_XuatKho();

						$cart = !empty($_SESSION["cart-xuat"]) ? $_SESSION["cart-xuat"]:[];

						foreach ($cart as $value) 
						{
							$idNVL = $value["idNVL"];
							$soluongxuat = $value["sl_muonxuat"];

							$XuatKho_Model->Insert_ChiTietXuatKho($data_id_max_xuatkho, $idNVL, $soluongxuat);
						}
						echo '<script language="javascript">alert("Thành công!");</script>';
						unset($maXuatKho, $NV_id1, $NV_id2, $KH_id, $lydoxuat, $tiencong, $tongtien, $data_id_max_xuatkho, $idNVL, $soluongxuat);
						unset($_SESSION["cart-xuat"]);
						


					} else {
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}

				}
			}

		}

		require_once 'Views/Kho_View/ListXuat.php';
		break;

		default:
		echo "ERROR 404";
		break;
	}
}
else
{
	header("location: login.php");
}
?>

