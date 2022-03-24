<?php 

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

$trangthai = array();

session_start();
if ($_SESSION['name']) 
{
	switch ($action)
	{
		case 'Add':

		$bsx = isset($_POST['bsx']) ? $_POST['bsx'] : NULL;
		$model = isset($_POST['model']) ? $_POST['model'] : NULL;
		$tenKH = isset($_POST['tenKH']) ? $_POST['tenKH'] : NULL;
		$sdtKH = isset($_POST['sdtKH']) ? $_POST['sdtKH'] : NULL;

		$all = $KhachHang_Model -> getAllData();

		if (isset($_POST['submit'])) 
		{
			if ($bsx == NULL || $model == NULL || $tenKH == NULL || $sdtKH == NULL ) {
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{
				$data = $KhachHang_Model->check_KH($bsx);
				if ($data == 1) {
					// echo '<script language="javascript">alert("Thất bại!");</script>';
				}
				else
				{
					if ($KhachHang_Model -> insert_KH($bsx, $model, $tenKH, $sdtKH))
					{
						echo '<script language="javascript">alert("Thành công!"); location.reload();</script>';
						unset($bsx, $model, $tenKH, $sdtKH);
					}
					else
					{
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}
				}
			}
		}

		require_once 'Views/KhachHang_View/Add.php';
		break;

		case 'List':

		if (isset($_GET['key']))
		{
			$key = $_GET['key'];
			$data_Search = $KhachHang_Model -> search_KH($key); 
		}
		require_once 'Views/KhachHang_View/List.php';
		break;

		case 'Edit':
		if (isset($_SESSION['quyen'])) 
		{
			$quyen = $_SESSION['quyen'];
			if ($quyen == 1) 
			{
				if (isset($_GET['idKhachHang'])) 
				{
					$idKhachHang = isset($_GET['idKhachHang']) ? $_GET['idKhachHang'] : NULL;
					$data_ID = $KhachHang_Model -> getData_ID($idKhachHang);
					if (isset($_POST['submit']))
					{
						$model = isset($_POST['model']) ? $_POST['model'] : NULL;
						$tenKH = isset($_POST['tenKH']) ? $_POST['tenKH'] : NULL;
						$sdtKH = isset($_POST['sdtKH']) ? $_POST['sdtKH'] : NULL;
						if ($model == NULL || $tenKH == NULL || $sdtKH == NULL ) 
						{
							$trangthai[] = 'thatbai';
						}
						else
						{
							if ($KhachHang_Model -> update_KH($idKhachHang, $model, $tenKH, $sdtKH)
						)
							{
								$trangthai[] = 'thanhcong';
								unset($idKhachHang, $model, $tenKH, $sdtKH);
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
					header("location: index.php?controller=KhachHang&action=List&key=");
				}
				
				require_once 'Views/KhachHang_View/Edit.php';
			} else {
				echo "Bạn không đủ quyền truy cập vào trang này<br>";
				echo "<a href='index.php?controller=KhachHang&action=List&key='> Click để về quay lại</a>";
			}

		} else {
			header("location: login.php");
		}

		
		break;



		default:
		# code...
		echo "ERROR KhachHang";
		break;
	}
}
else
{
	header("location: login.php");
}
?>