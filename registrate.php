<?php
$fio = filter_var(trim($_POST['fio']),FILTER_SANITIZE_STRING);
$select1 = filter_var(trim($_POST['select-1']),FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','','autorization');
if ($mysql == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    exit();
}

if ($select1=='on'){
    $status = 1;
} else
    $status = 2;

$result=$mysql->query("SELECT count(*) FROM `employers` WHERE `mail`='$mail'");
$row = $result->fetch_row();
$count = $row[0];
if ($count != 0){
    print("Введенная почта уже занята");
    $mysql->close();
} else{
    $mysql->query("INSERT INTO `employers` (`fio`,`mail`,`pass`,`status`) VALUES ('$fio','$mail','$pass','$status')");
    $mysql->close();
    header('Location: /html/LoginPage.html');
}
?>