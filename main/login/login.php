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
$pass = mysqli_real_escape_string($connection,$_POST['pass']);
if(empty($id) && empty($pass)){
    echo "پر کردن فیلد ها ضروریست";
} else {
    $slector = "SELECT * FROM users WHERE id ='{$id}'";
    $results1 = $connection->query($slector);
    if($results1->num_rows>0){
        while($row = $results1->fetch_assoc()){
                $_SESSION['userid'] = $row['id'];
                echo "موفق";
            }
        } else {
            echo "این نام کاربری در سیستم موجود نیست";
        }
    }
?>