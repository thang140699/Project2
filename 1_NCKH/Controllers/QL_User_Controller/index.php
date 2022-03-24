<?php 
require_once("Models/User_Model.php");
$User_Model = new User_Model();

require_once("Models/NhanVien_Model.php");
$NhanVien_Model = new NhanVien_Model();

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

		$all = $User_Model->getAllData();

		$data_idNhanVien = $NhanVien_Model -> getAllData();

		$tendangnhap = isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : NULL;
		$matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : NULL;
		$NV_id = isset($_POST['NV_id']) ? $_POST['NV_id'] : NULL;

		if (isset($_POST['submit'])) 
		{
			if ($tendangnhap == NULL || $matkhau == NULL || $NV_id == NULL) {
				echo '<script language="javascript">alert("Thất bại!");</script>';
			}
			else
			{
				$data = $User_Model->check_User($tendangnhap);
				// Ngăn không cho gửi dữ liệu
				if ($data == 1) {
					// echo '<script language="javascript">alert("Thất bại!");</script>';
				}
				else
				{
					if ($User_Model -> insert_User($tendangnhap, $matkhau, $NV_id))
					{
						echo '<script language="javascript">alert("Thành công!"); location.reload();</script>';
						unset($tendangnhap, $matkhau, $NV_id);
					}
					else
					{
						echo '<script language="javascript">alert("Thất bại!");</script>';
					}
				}
			}
		}
		require_once 'Views/QL_User_View/Add.php';
		break;


		case 'List':

		if (isset($_GET['key']))
		{
			$key = $_GET['key'];
			$data_Search = $User_Model -> search_User_hien($key); 
		}
		require_once 'Views/QL_User_View/List.php';
		break;

		case 'List_Remove':
		if (isset($_GET['key']))
		{
			$key = $_GET['key'];

			$data_Search = $User_Model -> search_User_an($key); 
		}
		require_once 'Views/QL_User_View/List_Remove.php';
		break;

		case 'Remove':
		if (isset($_GET['idUser'])) {
			$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : NULL;
			if ($User_Model -> remove_Users($idUser)) {
				header("location: index.php?controller=QL_User&action=List&key=");
			}
		} else {
			header("location: index.php?controller=QL_User&action=List&key=");
		}
		require_once 'Views/QL_User_View/List.php';
		break;

		case 'Restore':
		if (isset($_GET['idUser'])) {
			$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : NULL;
			if ($User_Model -> restore_Users($idUser)) {
				header("location: index.php?controller=QL_User&action=List_Remove&key=");
			}
		} else {
			header("location: index.php?controller=QL_User&action=List_Remove&key=");
		}
		break;




		case 'Edit_Pass':
		if (isset($_GET['idUser'])) 
		{
			$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : NULL;

			$data_ID = $User_Model -> getData_ID($idUser);

			$all = $User_Model->getAllData();

			$matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : NULL;

			if (isset($_POST['submit']))
			{
				if ($idUser == NULL || $matkhau == NULL) 
				{
					$trangthai[] = 'thatbai';
				}
				else
				{
					if ($User_Model -> update_User_Pass($idUser, $matkhau)
				)
					{
						$trangthai[] = 'thanhcong';
						unset($idUser, $matkhau);
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
			header("location: index.php?controller=QL_User&action=List&key=");
		}
		require_once 'Views/QL_User_View/Edit_Pass.php';
		break;
		
		case 'Edit':
		if (isset($_SESSION['quyen'])) 
		{
			$quyen = $_SESSION['quyen'];
			if ($quyen == 1) 
			{
				if (isset($_GET['idUser'])) 
				{
					$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : NULL;
					$data_ID = $User_Model -> getData_ID($idUser);
					$all = $NhanVien_Model->getAllData();

					$matkhau = isset($_POST['matkhau']) ? $_POST['matkhau'] : NULL;
					$NV_id = isset($_POST['NV_id']) ? $_POST['NV_id'] : NULL;


					if (isset($_POST['submit']))
					{
						if ($idUser == NULL || $matkhau == NULL || $NV_id == NULL) 
						{
							$trangthai[] = 'thatbai';
						}
						else
						{
							if ($User_Model -> update_User($idUser, $matkhau, $NV_id)
						)
							{
								$trangthai[] = 'thanhcong';
								unset($idUser, $matkhau, $NV_id);
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
					header("location: index.php?controller=QL_User&action=List&key=");
				}

				require_once 'Views/QL_User_View/Edit.php';
			} else {
				echo "Bạn không đủ quyền truy cập vào trang này<br>";
				echo "<a href='index.php?controller=QL_User&action=List&key='> Click để về quay lại</a>";
			}
		} else {
			header("location: login.php");
		}
		break;

		case 'Delete':
		if (isset($_GET['idUser'])) 
		{
			$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : NULL;
			if ($User_Model -> delete_User($idUser)) 
			{
				header("location: index.php?controller=QL_User&action=List_Remove&key=");
			}
		}
		else
		{
			header("location: index.php?controller=QL_User&action=List_Remove&key=");
		}
		break;

		

		


		default:
		echo "ERROR QL_User";
		break;
	}
}
else
{
	header("location: login.php");
}
?>