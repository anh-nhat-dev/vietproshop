<?php

if (!isset($_SESSION['mail']) && !isset($_SESSION['pass'])) {
    header("location: index.php?controller=user&act=login");
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$paginate = new pagination();
$paginate->setPage($page);
$paginate->setRowPerPage(3);
$paginate->setPerRow();
$paginate->setTotalRows('users');
$paginate->setTotalPage();
$sql = "SELECT * FROM users LIMIT ".$paginate->getPerRow().", ".$paginate->getRowPerPage();  //từ đâu , bao nhiêu 
$paginate->query($sql);

$paginate->setListPages('index');
include_once ("views/user/data_view.php");

?>