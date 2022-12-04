
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
      $userid = $_SESSION['userid'];
      $prof = "SELECT * FROM users WHERE `id`='$userid'";
      $results = $connection->query($prof);
      if($results->num_rows>0){
          while($row = $results->fetch_assoc()){
            $name = $row['name'];
            $lastname = $row['lastname'];
            $email = $row['email'];
        
        
            $phone = $_POST['phone'];
            $telegramid = $_POST['telegramid'];
            $address= $_POST['address'];
            $postalcode = $_POST['postalcode'];
            $bookname = $_POST['bookname'];
            $author = $_POST['author'];
            $publish = $_POST['publish'];
            $publishnum = $_POST['publishnum'];
            $anotherreq = $_POST['anotherreq'];
            $date = date("Y-m-d H:i:s");
            if(!empty($phone) && !empty($telegramid) && !empty($address) && !empty($postalcode) !empty($bookname) && !empty($author) 
            && !empty($publish) && !empty($publishnum) !empty($anotherreq)){
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $query = "INSERT INTO orders(`name`, `lastname`, `email`, `phone`, `telegramid`, `address`, `postalcode`, `bookname`, `author`, `publish`, `publishnum`,`anotherreq`, `date`) 
                    VALUES ('$name','$lastname','$email','$phone','$telegramid','$address','$postalcode','$bookname','$author','$publish','$publishnum','$anotherreq','$date')";
                    $result = $connection->query($query);
                    if($result){
                        $selectorder = "SELECT * FROM orders WHERE `name`='$name'";
                        $order_res = $connection->query($selectorder);
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        if($order_res->num_rows>0){
                            while($row2 = $order_res->fetch_assoc()) {
                                echo'<script>  swal({
                                    title: "",
                                    text: "کاربر گرامی سفارش شما با موفقیت ثبت شد",
                                    icon: "success",
                                    button: "باشه",
                                });</script>';

                            $message1 = '<html>
                            <body style="direction:rtl;">
                            <div class="container" style="background-color:#d3d3d3;color:black !important;">
                            <p style="font-size:40px;">کاربر گرامی</p><br/>
                            <p style="font-size:25px; color:red;"> سفارش شما به شرح زیر است :</p>
                            <h1>سفارش : </h1>
                            <h5>نام :‌'.$_SESSION['name']=$row2['name'].'</h5><br/><br/>
                            <h5>نام خانوادگی :‌'.$_SESSION['lastname']=$row2['lastname'].'</h5><br/>
                            <h5>ایمیل  :‌'.$_SESSION['email']=$row2['email'].'</h5><br/><br/>
                            <h5>شماره تلفن  :‌'.$_SESSION['phone']=$row2['phone'].'</h5><br/>
                            <h5>آی دی تلگرام  :‌'.$_SESSION['telegramid']=$row2['telegramid'].'</h5><br/>
                            <h5>آدرس:‌'.$_SESSION['address']=$row2['address'].'</h5><br/>
                            <h5>کد پستی  :‌'.$_SESSION['postalcode']=$row2['postalcode'].'</h5><br/>
                            <h5> نام کتاب  :‌'.$_SESSION['bookname']=$row2['bookname'].'</h5><br/>
                            <h5>نویسنده   :‌'.$_SESSION['author']=$row2['author'].'</h5><br/>
                            <h5>انتشارات   :‌'.$_SESSION['publish']=$row2['publish'].'</h5><br/>
                            <h5>شماره چاپ   :‌'.$_SESSION['publishnum']=$row2['publishnum'].'</h5><br/>
                            <h5>نویسنده   :‌'.$_SESSION['author']=$row2['author'].'</h5><br/>
                            <h5>درخواست دیگر   :‌'.$_SESSION['anotherreq']=$row2['anotherreq'].'</h5><br/>
                            <h5>تاریخ   :‌'.$_SESSION['date']=$row2['date'].'</h5><br/>
                            <p>در اسرع وقت با شما تماس گرفته خواهد شد</p>
                            <br/>
                            <p>مدیریت سامانه کتاب ارزونی</p>
                            </div>
                            </body>
                            </html>';
        
                            $message2 = '<html>
                            <body style="direction:rtl;">
                            <div class="container" style="background-color:#d3d3d3;color:black !important;">
                            <p style="font-size:40px;"> شروین و پارسا</p><br/>
                            <p style="font-size:45px; color:red;"> سفارش جدید داریم</p>
                            <h1>سفارش : </h1>
                            <h5>نام :‌'.$_SESSION['name']=$row2['name'].'</h5><br/><br/>
                            <h5>نام خانوادگی :‌'.$_SESSION['lastname']=$row2['lastname'].'</h5><br/><br/>
                            <h5>ایمیل  :‌'.$_SESSION['email']=$row2['email'].'</h5><br/><br/>
                            <h5>شماره تلفن  :‌'.$_SESSION['phone']=$row2['phone'].'</h5><br/><br/>
                            <h5>آی دی تلگرام  :‌'.$_SESSION['telegramid']=$row2['telegramid'].'</h5><br/><br/>
                            <h5>آدرس:‌'.$_SESSION['address']=$row2['address'].'</h5><br/><br/>
                            <h5>کد پستی  :‌'.$_SESSION['postalcode']=$row2['postalcode'].'</h5><br/><br/>
                            <h5> نام کتاب  :‌'.$_SESSION['bookname']=$row2['bookname'].'</h5><br/><br/>
                            <h5>نویسنده   :‌'.$_SESSION['author']=$row2['author'].'</h5><br/><br/>
                            <h5>انتشارات   :‌'.$_SESSION['publish']=$row2['publish'].'</h5><br/><br/>
                            <h5>شماره چاپ   :‌'.$_SESSION['publishnum']=$row2['publishnum'].'</h5><br/><br/>
                            <h5>نویسنده   :‌'.$_SESSION['author']=$row2['author'].'</h5><br/><br/>
                            <h5>درخواست دیگر   :‌'.$_SESSION['anotherreq']=$row2['anotherreq'].'</h5><br/><br/>
                            <h5>تاریخ   :‌'.$_SESSION['date']=$row2['date'].'</h5><br/><br/>
        
                            </div>
                            </body>
                            </html>';
                            }
                            mail($email,"ثبت سفارش جدید",$message1,$headers);
                            mail("parsabesharat78@gmail.com","ثبت سفارش جدید",$message2,$headers);
                            mail("shervinbarimani226@gmail.com","ثبت سفارش جدید",$message2,$headers);
                        
                    }
                } else {
                    echo'<script>  swal({
                        title: "",
                        text: "متاسفانه سفارش شما ثبت نشد",
                        icon: "error",
                        button: "باشه",
                    });</script>';
    } 
            } else {
                echo'<script>  swal({
                    title: "",
                    text: "ایمیل وارده معتبر نمیباشد",
                    icon: "success",
                    button: "باشه",
                });</script>';
}
        } else {
            echo'<script>  swal({
                title: "",
                text: "پر کردن تمامی فیلد ها ضروریست",
                icon: "success",
                button: "باشه",
            });</script>';
}
    }
}
    
   
       ?>
