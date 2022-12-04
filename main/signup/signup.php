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
$name = mysqli_real_escape_string($connection,$_POST['name']);
$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
$id = mysqli_real_escape_string($connection,$_POST['id']);
$email = mysqli_real_escape_string($connection,$_POST['email']);
$pass = mysqli_real_escape_string($connection,$_POST['pass']);
if(empty($name) && empty($lastname) && empty($id) && empty($email) && empty($pass)){
    echo "پر کردن تمامی فیلد ها ضروربیست";
} else {
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    
            $id_checker = "SELECT id FROM users WHERE id='{$id}'";
            $res1 = $connection->query($id_checker);
            if($res1->num_rows>0){
                echo "این نام کاربری در سیستم موجود است";
            } else {
                $email_checker = "SELECT email FROM users WHERE email='{$email}'";
                $res2 = $connection->query($email_checker);
                if($res2->num_rows>0){
                    echo "این ایمیل در سیستم ثبت شده است";
                } else {
                    $insert = "INSERT INTO `users`(`name`, `lastname`, `id`, `email`, `pass`) VALUES ('$name', '$lastname', '$id','$email','$pass')";
                    $res3 = $connection->query($insert);
                    if($res3){
                        $last_check = "SELECT id FROM users WHERE id = '{$id}'";
                        $res4 = $connection->query($last_check);
                        if($res4->num_rows>0){
                            while($row = $res4->fetch_assoc()){
                                $_SESSION['userid'] = $row['id'];
                                 echo "موفق";
                            }
                        } else {
                            echo "مشکلی در ثبت نام کاربری شما به وجود آمده است";
                        }
                    } else {
                        echo "مشکلی در ثبت نام شما به وجود آمده است";
                    }
                }
            }
        } else {
            echo "ایمیل وارد شده معتبر نمیباشد";
        }
    }

?>