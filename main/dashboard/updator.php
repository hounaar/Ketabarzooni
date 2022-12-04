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
    $oldemail = $_POST['oldemail'];
    $newsemail = $_POST['newsemail'];
    $oldid = $_POST['oldid'];
    $newid = $_POST['newid'];
    $telegramid = $_POST['telegramid'];
    $phone = $_POST['phone'];
    if(empty($oldemail) && empty($newemail) && empty($oldid) && empty($newid)){
        echo "پر کردن فیلد ها ضروریست";
    } else{
        if(filter_var($newemail, FILTER_VALIDATE_EMAIL)){
            $updator = "UPDATE users SET email ='$newemail' AND id='$newid' AND telegramid ='$telegramid' AND phone='$phone' WHERE email ='$oldemail' AND id='$oldid'";
            $edit_res = $connection->query($updator);
            if($edit_res){
                echo "موفق";
            } else {
                echo "مشکلی در ارتباط با ویرایش اطلاعات وجود دارد";
            }
        } else {
            echo "ایمیل معتبر نمیباشد";
        }
    } 

?>