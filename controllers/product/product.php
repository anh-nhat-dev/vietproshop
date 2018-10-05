<?php 
switch ($_GET["act"]) {
	case 'add':
		include_once ("controllers/product/add.php");
		break;
	case 'edit':
		include_once ("controllers/product/edit.php");
		break;
	case 'del':
		include_once ("controllers/product/del.php");
		break;
	case 'data':
		include_once ("controllers/product/data.php");
		break;
}
 ?>