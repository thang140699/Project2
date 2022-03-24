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



session_start();
if ($_SESSION['name']) 
{
	switch ($action)
	{
		case 'Detail':

		if (isset($_GET['id'])) 
		{
			$id = $_GET["id"];
			$data = $NVL_Model->getData_id($id);
		}

		require_once 'Views/Cart_View/Detail_NVL.php';
		break;

		case 'Delete':
		// session_start();
		if (isset($_GET['id'])) 
		{
			$id = $_GET["id"];

			if (isset($_SESSION["cart-nhap"][$id])) 
			{
				unset($_SESSION["cart-nhap"][$id]);

				header("location: index.php?controller=Kho&action=AddNhap");
			}

			if (isset($_SESSION["cart-xuat"][$id])) 
			{
				unset($_SESSION["cart-xuat"][$id]);

				header("location: index.php?controller=Kho&action=AddXuat");
			}

		}
		break;

		case 'AddListNhap':
		session_start();
		if (isset($_GET['id'])) 
		{
			$id = $_GET["id"];

			$product_cart = array();

			$data = $NVL_Model->getData_id($id);

			foreach ($data as $value) 
			{
				$product_cart[$value["idNVL"]]= $value;
			}

			$detail = $product_cart[$id];

		// Thêm vào danh sách nhập

			if (isset($_POST['add-to-cart-nhap'])) 
			{
				$sl_muonnhap = $_POST["sl_muonnhap"];
				if (!isset($_SESSION["cart-nhap"]) || $_SESSION["cart-nhap"] == null) 
				{
					$product_cart[$id]["sl_muonnhap"] = $sl_muonnhap;
					$_SESSION["cart-nhap"][$id] = $product_cart[$id];
				}
				else
				{
					if (array_key_exists($id, $_SESSION["cart-nhap"]))
					{
						$_SESSION["cart-nhap"][$id]["sl_muonnhap"] += $sl_muonnhap;

					}
					else 
					{
						$product_cart[$id]["sl_muonnhap"] = $sl_muonnhap;
						$_SESSION["cart-nhap"][$id] = $product_cart[$id];
					}
				}
				header("location: index.php?controller=Kho&action=AddNhap");

			}
		}
		break;

		case 'AddListXuat':
		session_start();



		if (isset($_GET['id'])) 
		{

			$id = $_GET["id"];

			$product_cart = array();

			$data = $NVL_Model->getData_id($id);

			foreach ($data as $value) 
			{
				$product_cart[$value["idNVL"]]= $value;
			}

			$detail = $product_cart[$id];

		// Thêm vào danh sách nhập

			if (isset($_POST['add-to-cart-xuat'])) 
			{
				$sl_muonxuat = $_POST["sl_muonxuat"];
				if (!isset($_SESSION["cart-xuat"]) || $_SESSION["cart-xuat"] == null) 
				{
					$product_cart[$id]["sl_muonxuat"] = $sl_muonxuat;
					$_SESSION["cart-xuat"][$id] = $product_cart[$id];
				}
				else
				{
					if (array_key_exists($id, $_SESSION["cart-xuat"]))
					{
						$_SESSION["cart-xuat"][$id]["sl_muonxuat"] += $sl_muonxuat;

					}
					else 
					{
						$product_cart[$id]["sl_muonxuat"] = $sl_muonxuat;
						$_SESSION["cart-xuat"][$id] = $product_cart[$id];
					}
				}
				header("location: index.php?controller=Kho&action=AddXuat");

			}
		}
		break;



		default:
		# code...
		echo "ERROR DETAIL";
		break;
	}
}
else
{
	header("location: login.php");
}
?>