<?php 
$user_id = isset($_GET["id"]) ? $_GET["id"] : 0;
$user = new User();
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$user->query($sql);
$row = $user->fetch();

if(isset($_POST["submit"])){
    $user = new User();
    $user->setUserId($user_id);
    $user->setUserFull($_POST["full"]);
    $user->setUserName($_POST["user"]);
    $user->setUserPass($_POST["pass"]);
    $user->setUserMail($_POST["mail"]);
    $user->setUserLevel($_POST["level"]);

    if($user->edit() == "fail"){
        $error = '<div class="alert alert-danger">User exist!</div>';
    }
    else{
        header("location: index.php");
    }
}

include("views/user/edit_view.php");