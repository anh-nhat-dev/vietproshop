<?php 

session_start();

// mô hình mvc là mô hình tách riêng giao diện html (view : chỉ dùng hiển thị giao diện), thuật toán(controller: dùng để thực hiện xử lý thuật toán chính, k bao gồm database), dữ liệu database(model: xử lý liên quan đến cơ sở dữ liệu)
//Controller : url phải tối thiểu có 2 phần là controller(chức năng gì tương đương với lớp) và phương thức gì
//VD: index.php?controller=chucnanggi&atc=phuongthucgi
include_once ("library/autoload.php");
include_once("library/database.php");
include_once('library/pagination.php');

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';

if(isset($controller)){
	switch ($controller) {
		case "user":
			include_once ("controllers/user/user.php");
			break;
		case "product":
			include_once ("controllers/product/product.php");
			break;
		default:
			include_once ("controllers/user/user.php");
	}
	}else{
		header("location: index.php?controller=user&act=login");
	}
 ?>


