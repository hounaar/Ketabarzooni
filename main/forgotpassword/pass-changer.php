<?php
session_start();

$host = "localhost";
$username = "ketabarz_main";
$password = "ketabarz_main";
$dbname = "ketabarz_main";
$connection = new mysqli($host, $username, $password, $dbname);
if($connection->connect_error){
    die("no con");
}
$id = mysqli_real_escape_string($connection,$_POST['id']);
$newpass = mysqli_real_escape_string($connection,$_POST['newpass']);
$repeat_pass = mysqli_real_escape_string($connection,$_POST['repeat_pass']);
if(empty($id) && empty($newpass) && empty($repeat_pass)){
    echo "پر کردن فیلد ها ضروریست";
} else {
    $selector = "SELECT * FROM users WHERE id = '{$id}'";
    $res1 = $connection->query($selector);
    if($res1->num_rows>0){
        $updator = "UPDATE users SET pass = '$newpass' WHERE id = '$id'";
        $res2 = $connection->query($updator);
        if($res2){
            echo "رمز عبور با موفقیت تغییر یافت";
        } else {
            echo "مشکلی در تغییر رمز عبور به وجود آمده است";
        }
    } else {
        echo "این نام کاربری اصلا در سیتسم موجود نیست :(";
    }

}

?>