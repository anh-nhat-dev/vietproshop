<?php 
if (isset($_POST['submit'])) {
    $email = $_POST['user'];
    $password = $_POST['pass'];
    $error = [];
    if ($email == "") {
        $error[] = "Email không được để trống";
    }
    if ($password == "") {
        $error[] = "Mật khẩu không được để trống";
    }
    if (count($error) == 0) {
        $user = new User();
        $user->setUserMail($email);
        $user->setUserPass($password);
        if ($user->login() == "pass") {
            header("location: index.php?controller=user&act=data");
        } else {
            $error[] = "Tài khoản hoặc mật khẩu không đúng";
        }
    }
}

include_once ("views/user/login_view.php");

?>