<?php 
function my_autoload($file_name){
	include_once ("model/".$_GET["controller"]."/".$file_name.".php");
}

spl_autoload_register('my_autoload');

 ?>