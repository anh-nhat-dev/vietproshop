<?php 
$act = isset($_GET['act']) ? $_GET['act'] : 'data';
switch ($act) {
	case 'add':
		include_once ("controllers/user/add.php");
		break;
	case 'edit':
		include_once ("controllers/user/edit.php");
		break;
	case 'del':
		include_once ("controllers/user/del.php");
		break;
	case 'data':
		include_once ("controllers/user/data.php");
		break;
	case 'login':
		include_once ("controllers/user/login.php");
		break;
	default:
		include_once ("controllers/user/data.php");
}
 ?>