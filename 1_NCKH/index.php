
 <?php 

 if (isset($_GET['controller'])) 
 {
 	$controller = $_GET['controller'];
 }
 else
 {
 	$controller = '';
 }

 switch ($controller) {
 	case 'NVL':
 	{
 		require_once('Controllers/NVL_Controller/index.php');
 	}
 	break;	

 	case 'KhachHang':
 	{
 		require_once('Controllers/KhachHang_Controller/index.php');
 	}
 	break;

 	case 'NhanVien':
 	{
 		require_once('Controllers/NhanVien_Controller/index.php');
 	}
 	break;

 	case 'Cart':
 	{
 		require_once('Controllers/Cart_Controller/index.php');
 	}
 	break;
 	case 'Kho':
 	{
 		require_once('Controllers/Kho_Controller/index.php');
 	}
 	break;

 	case 'QL_Kho':
 	{
 		require_once('Controllers/QL_Kho_Controller/index.php');
 	}
 	break;

 	case 'QL_User':
 	{
 		require_once('Controllers/QL_User_Controller/index.php');
 	}
 	break;

 	default:
 		require_once 'Controllers/User_Controller/index.php';
 	break;
 }
 ?>
