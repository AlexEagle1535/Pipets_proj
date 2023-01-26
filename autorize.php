<?php
$mail = filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','','autorization');

if ($_COOKIE['user']!=''){
    setcookie('user', $user['mail'], time() - 3600, "/");
}

$result=$mysql->query("SELECT * FROM `employers` WHERE `mail`='$mail' AND `pass`='$pass'");

$check = $result->fetch_assoc();
if (count($check)==0){
    echo "Пользователь не найден";
    $mysql->close();
    header('Location: /html/LoginPage.html');
}
echo "Авторизация прошла успешно";
setcookie('user', $check['mail'], time() + 3600, "/");
$mysql->close();
if ($check['status']==1){
    header('Location: /html/Owner.php');
} else header('Location: /html/Employee.php');

?>