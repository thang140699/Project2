<?php 

require_once ("Models/User_Model.php");
$User_Model = new User_Model();


if (isset($_GET['action'])) 
{
	$action = $_GET['action'];
}
else
{
	$action = '';
}

switch ($action) 
{


	case 'login':

	if (isset($_POST["submit"]))
	{
		$tendangnhap = $_POST["tendangnhap"];
		$matkhau = $_POST["matkhau"];

		if ($tendangnhap != NULL && $matkhau != NULL) 
		{


			$data = $User_Model->check_tendangnhap_matkhau($tendangnhap, $matkhau);
			if (!empty($data)) 
			{
				foreach ($data as $value) 
				{
					if ($value["tendangnhap"] == $tendangnhap || $value["matkhau"] == $matkhau)
					{
						session_start();
						$a = $User_Model->getTen($tendangnhap);
						foreach ($a as $value) {
							$_SESSION['name'] = $value['tenNV'];
							$_SESSION['quyen'] = $value['quyen'];
							$_SESSION['idUser'] = $value['idUser'];
						}
						header("location: client.php");
					}
					else
					{
						header("location: login.php");
					}
				}
			}
			else
			{
				header("location: login.php");
			}

		}
		else
		{
			// echo '<script language="javascript">alert("Thất bại!");</script>';
			header("location: login.php");
		}
	}
	else
	{
		header("location: login.php");
	}
	break;

	case 'logout':
	session_start();
	if(($_SESSION['name']!=null))
	{
		session_destroy();
		unset($_SESSION['name']);
		header("location: login.php");
	}
	else
	{
		header("location: client.php");
	}
	break;
	
	default:
	header("location: login.php");
	break;
}