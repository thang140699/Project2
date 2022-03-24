<?php 

require_once("Models/NVL_Model.php");
$NVL_Model = new NVL_Model();

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
		$all = $NVL_Model->getAllData();

		$maNVL = isset($_POST['maNVL']) ? $_POST['maNVL'] : NULL;
		$tenNVL = isset($_POST['tenNVL']) ? $_POST['tenNVL'] : NULL;
		$vitrikho = isset($_POST['vitrikho']) ? $_POST['vitrikho'] : NULL;
		$donvitinh = isset($_POST['donvitinh']) ? $_POST['donvitinh'] : NULL;
		$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : NULL;
		$gianhap = isset($_POST['gianhap']) ? $_POST['gianhap'] : NULL;
		$giaxuat = isset($_POST['giaxuat']) ? $_POST['giaxuat'] : NULL;
		$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : NULL;

		$tentp1 = isset($_POST['tentp1']) ? $_POST['tentp1'] : NULL;
		$khoiluongtp1 = isset($_POST['khoiluongtp1']) ? $_POST['khoiluongtp1'] : NULL;

		$tentp2 = isset($_POST['tentp2']) ? $_POST['tentp2'] : NULL;
		$khoiluongtp2 = isset($_POST['khoiluongtp2']) ? $_POST['khoiluongtp2'] : NULL;

		$tentp3 = isset($_POST['tentp3']) ? $_POST['tentp3'] : NULL;
		$khoiluongtp3 = isset($_POST['khoiluongtp3']) ? $_POST['khoiluongtp3'] : NULL;

		$tentp4 = isset($_POST['tentp4']) ? $_POST['tentp4'] : NULL;
		$khoiluongtp4 = isset($_POST['khoiluongtp4']) ? $_POST['khoiluongtp4'] : NULL;

		$tentp5 = isset($_POST['tentp5']) ? $_POST['tentp5'] : NULL;
		$khoiluongtp5 = isset($_POST['khoiluongtp5']) ? $_POST['khoiluongtp5'] : NULL;

		if (isset($_POST['submit'])) 
		{
			if ($maNVL == NULL || $tenNVL == NULL || $vitrikho == NULL || $donvitinh == NULL || $soluong == NULL || $gianhap == NULL || $giaxuat == NULL) {
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{
				$data = $NVL_Model->check_NVL($maNVL);
				if ($data == 1) {
					//echo '<script language="javascript">alert("Thất bại!");</script>';
				}
				else
				{
					if ($NVL_Model -> insert_NVL($maNVL, $tenNVL, $vitrikho, $donvitinh, $soluong, $gianhap, $giaxuat, $ghichu, $tentp1, $khoiluongtp1, $tentp2, $khoiluongtp2, $tentp3, $khoiluongtp3, $tentp4, $khoiluongtp4, $tentp5, $khoiluongtp5))
					{
						echo '<script language="javascript">alert("Thành công!"); location.reload();</script>';
						unset($maNVL, $tenNVL, $vitrikho, $donvitinh, $soluong, $gianhap, $giaxuat, $ghichu, $tentp1, $khoiluongtp1, $tentp2, $khoiluongtp2, $tentp3, $khoiluongtp3, $tentp4, $khoiluongtp4, $tentp5, $khoiluongtp5);
					}
					else
					{
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}
				}
			}
		}


		require_once 'Views/NVL_View/Add.php';
		break;

		case 'List':

		if (isset($_GET['key']))
		{
			$key = $_GET['key'];

			$data_Search = $NVL_Model -> search_NVL($key); 
		}

		require_once 'Views/NVL_View/List.php';
		break;

		case 'Edit':
		if (isset($_SESSION['quyen'])) 
		{
			$quyen = $_SESSION['quyen'];
			if ($quyen == 1) 
			{
				if (isset($_GET['idNVL'])) 
				{
					$idNVL = isset($_GET['idNVL']) ? $_GET['idNVL'] : NULL;
					$data_ID = $NVL_Model -> getData_ID($idNVL);

					$tenNVL = isset($_POST['tenNVL']) ? $_POST['tenNVL'] : NULL;
					$vitrikho = isset($_POST['vitrikho']) ? $_POST['vitrikho'] : NULL;
					$donvitinh = isset($_POST['donvitinh']) ? $_POST['donvitinh'] : NULL;
					$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : NULL;
					$gianhap = isset($_POST['gianhap']) ? $_POST['gianhap'] : NULL;
					$giaxuat = isset($_POST['giaxuat']) ? $_POST['giaxuat'] : NULL;
					$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : NULL;

					$tentp1 = isset($_POST['tentp1']) ? $_POST['tentp1'] : NULL;
					$khoiluongtp1 = isset($_POST['khoiluongtp1']) ? $_POST['khoiluongtp1'] : NULL;

					$tentp2 = isset($_POST['tentp2']) ? $_POST['tentp2'] : NULL;
					$khoiluongtp2 = isset($_POST['khoiluongtp2']) ? $_POST['khoiluongtp2'] : NULL;

					$tentp3 = isset($_POST['tentp3']) ? $_POST['tentp3'] : NULL;
					$khoiluongtp3 = isset($_POST['khoiluongtp3']) ? $_POST['khoiluongtp3'] : NULL;

					$tentp4 = isset($_POST['tentp4']) ? $_POST['tentp4'] : NULL;
					$khoiluongtp4 = isset($_POST['khoiluongtp4']) ? $_POST['khoiluongtp4'] : NULL;

					$tentp5 = isset($_POST['tentp5']) ? $_POST['tentp5'] : NULL;
					$khoiluongtp5 = isset($_POST['khoiluongtp5']) ? $_POST['khoiluongtp5'] : NULL;


					if (isset($_POST['submit']))
					{
						if ($tenNVL == NULL || $vitrikho == NULL || $donvitinh == NULL || $soluong == NULL || $gianhap == NULL || $giaxuat == NULL ) 
						{
							$trangthai[] = 'thatbai';
						}
						else
						{
							if ($NVL_Model -> update_NVL($idNVL, $tenNVL, $vitrikho, $donvitinh, $soluong, $gianhap, $giaxuat, $ghichu, $tentp1, $khoiluongtp1, $tentp2, $khoiluongtp2, $tentp3, $khoiluongtp3, $tentp4, $khoiluongtp4, $tentp5, $khoiluongtp5)
						)
							{
								$trangthai[] = 'thanhcong';
								unset($idNVL, $tenNVL, $vitrikho, $donvitinh, $soluong, $gianhap, $giaxuat, $ghichu, $tentp1, $khoiluongtp1, $tentp2, $khoiluongtp2, $tentp3, $khoiluongtp3, $tentp4, $khoiluongtp4, $tentp5, $khoiluongtp5);
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
					header("location: index.php?controller=NVL&action=List&key=");
				}

				require_once 'Views/NVL_View/Edit.php';
			} else {
				echo "Bạn không đủ quyền truy cập vào trang này<br>";
				echo "<a href='index.php?controller=NVL&action=List&key='> Click để về quay lại</a>";
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