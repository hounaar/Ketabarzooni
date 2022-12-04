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
if(!isset($_SESSION['userid'])){
    header("location:https://ketabarzooni.ir/others/portal/login/");
}

?>


<!DOCTYPE html>
<html lang="en-fa-IR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/others/dashboard/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>داشبورد - کتاب ارزونی</title>
</head>

<body>
    <header id="header">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container button align-items-center  animate__animated animate__fadeInDown" id="navbar">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/" >پروفایل من </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/request/" >ثبت درخواست  </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/orders/"> سفارشات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/others/dashboard/editdata/"> ویرایش اطلاعات </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/others/dashboard/changepass/"> تغییر رمز عبور </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/others/dashboard/php/logout.php?logout=<?php echo $_SESSION['userid']; ?>">خروج از حساب </a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link id mr-5 ">
                                <img class="rounded-circle shadow-1-strong" src="/others/comments/images/avatar.png" alt="avatar" width="25" height="25" /> <?php echo $_SESSION['userid'];?>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <?php
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
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
    if(isset($name)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $query = "INSERT INTO orders(`name`, `lastname`, `email`, `phone`, `telegramid`, `address`, `postalcode`, `bookname`, `author`, `publish`, `publishnum`,`anotherreq`, `date`) 
            VALUES ('$name','$lastname','$email','$phone','$telegramid','$address','$postalcode','$bookname','$author','$publish','$publishnum','$anotherreq','$date')";
            $result = $connection->query($query);
            if($result){
                echo '<script type="text/javascript">
                swal({
                    title: "انجام شد",
                    text: "سفارش شما با موفقیت در سیستم ثبت شد",
                    icon: "success",
                    button: "باشه",
                  });
                </script>';
                $selectorder = "SELECT * FROM orders WHERE `name`='$name'";
                $order_res = $connection->query($selectorder);
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                if($order_res->num_rows>0){
                    while($row = $order_res->fetch_assoc()) {
                 

                    $message1 = '<html>
                    <body style="direction:rtl;">
                    <div class="container" style="background-color:#d3d3d3;color:black !important;">
                    <p style="font-size:40px;">کاربر گرامی</p><br/>
                    <p style="font-size:25px; color:red;"> سفارش شما به شرح زیر است :</p>
                    <h1>سفارش : </h1>
                    <h5>نام :‌'.$_SESSION['name']=$row['name'].'</h5><br/><br/>
                    <h5>نام خانوادگی :‌'.$_SESSION['lastname']=$row['lastname'].'</h5><br/>
                    <h5>ایمیل  :‌'.$_SESSION['email']=$row['email'].'</h5><br/><br/>
                    <h5>شماره تلفن  :‌'.$_SESSION['phone']=$row['phone'].'</h5><br/>
                    <h5>آی دی تلگرام  :‌'.$_SESSION['telegramid']=$row['telegramid'].'</h5><br/>
                    <h5>آدرس:‌'.$_SESSION['address']=$row['address'].'</h5><br/>
                    <h5>کد پستی  :‌'.$_SESSION['postalcode']=$row['postalcode'].'</h5><br/>
                    <h5> نام کتاب  :‌'.$_SESSION['bookname']=$row['bookname'].'</h5><br/>
                    <h5>نویسنده   :‌'.$_SESSION['author']=$row['author'].'</h5><br/>
                    <h5>انتشارات   :‌'.$_SESSION['publish']=$row['publish'].'</h5><br/>
                    <h5>شماره چاپ   :‌'.$_SESSION['publishnum']=$row['publishnum'].'</h5><br/>
                    <h5>نویسنده   :‌'.$_SESSION['author']=$row['author'].'</h5><br/>
                    <h5>درخواست دیگر   :‌'.$_SESSION['anotherreq']=$row['anotherreq'].'</h5><br/>
                    <h5>تاریخ   :‌'.$_SESSION['date']=$row['date'].'</h5><br/>
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
                    <h5>نام :‌'.$_SESSION['name']=$row['name'].'</h5><br/><br/>
                    <h5>نام خانوادگی :‌'.$_SESSION['lastname']=$row['lastname'].'</h5><br/><br/>
                    <h5>ایمیل  :‌'.$_SESSION['email']=$row['email'].'</h5><br/><br/>
                    <h5>شماره تلفن  :‌'.$_SESSION['phone']=$row['phone'].'</h5><br/><br/>
                    <h5>آی دی تلگرام  :‌'.$_SESSION['telegramid']=$row['telegramid'].'</h5><br/><br/>
                    <h5>آدرس:‌'.$_SESSION['address']=$row['address'].'</h5><br/><br/>
                    <h5>کد پستی  :‌'.$_SESSION['postalcode']=$row['postalcode'].'</h5><br/><br/>
                    <h5> نام کتاب  :‌'.$_SESSION['bookname']=$row['bookname'].'</h5><br/><br/>
                    <h5>نویسنده   :‌'.$_SESSION['author']=$row['author'].'</h5><br/><br/>
                    <h5>انتشارات   :‌'.$_SESSION['publish']=$row['publish'].'</h5><br/><br/>
                    <h5>شماره چاپ   :‌'.$_SESSION['publishnum']=$row['publishnum'].'</h5><br/><br/>
                    <h5>نویسنده   :‌'.$_SESSION['author']=$row['author'].'</h5><br/><br/>
                    <h5>درخواست دیگر   :‌'.$_SESSION['anotherreq']=$row['anotherreq'].'</h5><br/><br/>
                    <h5>تاریخ   :‌'.$_SESSION['date']=$row['date'].'</h5><br/><br/>

                    </div>
                    </body>
                    </html>';
                    }
                    mail($email,"ثبت سفارش جدید",$message1,$headers);
                    mail("parsabesharat78@gmail.com","ثبت سفارش جدید",$message2,$headers);
                    mail("shervinbarimani226@gmail.com","ثبت سفارش جدید",$message2,$headers);
                
            }
        } else {
            echo '<script type="text/javascript">
            swal({
                title: "ناموفق",
                text: "ایمیل معتبر نیست",
                icon: "error",
                button: "باشه",
              });
            </script>';
        }
    }
}


    ?>




    <section class="d-flex justify-content-center">
        <div class="container border animate__animated animate__fadeInDown" id="orderform">
        <form class="needs-validation" method="POST" novalidate>

            <h1>
                فرم ثبت سفارش
            </h1>
            <hr/>

            <br/>
            <h5>کاربر گرامی پر کردن موارد ستاره دار اجباریست</h5>
            <br/>

            <div class="form-floating">
           
                <label for="name">نام<i class="fa fa-star"></i>
                </label>
                <input type="text"  class="form-control" id="name" placeholder="نام خود را وارد کنید" name="name" required><br/>
                <label for="lastname">نام خانوادگی
                    <i class="fa fa-star"></i>
                </label>
                <input type="text"  class="form-control" id="name" placeholder="نام خانوادگی خود را وارد نمایید" name="lastemail" required><br/>

                <label for="name">ایمیل<i class="fa fa-star"></i>
                </label>
                <input type="text"  class="form-control orderemail" id="name" placeholder="ایمیل را وارد نمایید" name="email" required><br/>

                <label for="lastname">تلفن 
                    <i class="fa fa-star"></i>
                </label>
                <input type="text"  class="form-control phone" id="name" name="phone" placeholder="شماره همراه خود را وارد کنید." required><br/>


                <label for="lastname" class="mt-5"> آی دی تلگرام (بدون @ وارد کنید) 
                </label>
                <input type="text" class="form-control" id="name" placeholder="ای دی تلگرام خود را وارد نمایید" name="phone" required><br/>


                <label for="name">آدرس<i class="fa fa-star"></i>
                </label>
                <textarea type="text" class="form-control" id="name" placeholder="آدرس محل دریافت خود را وارد کنید" name="address" required></textarea><br/>


                <label for="lastname">کد پستی 
                    <i class="fa fa-star"></i>
                </label>
                <input type="text" class="form-control" id="name" placeholder="کد پستی خود را وارد کنید" name="postalcode" required><br/>



                <label for="lastname">نام کتاب درخواستی  
                    <i class="fa fa-star"></i>
                </label>
                <input type="text" class="form-control" id="name" placeholder="نام کتاب درخواستی خود را وارد کنید" name="bookname" required><br/>


                <label for="lastname">نام نویسنده   
                    <i class="fa fa-star"></i>
                </label>
                <input type="text" class="form-control" id="name" placeholder="نام  نویسنده کتاب خود را وارد کنید" name="author" required><br/>


                <label for="lastname">نام انتشارات   
                </label>
                <input type="text" class="form-control" id="name" placeholder="نام  انتشارات کتاب خود را وارد کنید" name="publish" required><br/>



                <label for="lastname">شماره چاپ    
                </label>
                <input type="text" class="form-control" id="name" placeholder="شماره  چاپ کتاب خود را وارد کنید" name="publishnum" required><br/>


                <label for="name">درخواست های دیگر
                </label>
                <textarea type="text" class="form-control" id="name" placeholder="در صورت داشتن درخواست های دیگر لطفا این قسمت را پر کنید" name="anotherreq" required></textarea><br/>


                <button type="submit" name="submit" class="btn order-confirm btn-primary form-btn">ثبت سفارش</button>
                <div class="col error-text"></div>

            </div>
            </form>
        </div>
    </section>
    <?php

$newsemail = $_POST['newsemail'];
$submit = $_POST['submit'];
if(isset($newsemail)){
   if(!empty($newsemail)){ 
    if(filter_var($newsemail,FILTER_VALIDATE_EMAIL)){
    $select = "SELECT email FROM news(email) WHERE (email='$newsemail') LIMIT 1";
    $results = $connection->query($select);
    if($results->num_rows>0){
        echo '<script type="text/javascript">
        alert("email exists");</script>';
    } else {
        $insert = "INSERT INTO news(email) VALUES ('$newsemail')";
        $res = $connection->query($insert);
        if($res){
            echo '<script type="text/javascript">
            swal({
                title: "انجام شد",
                text: "ایمیل شما با موفقیت در سیستم ثبت شد",
                icon: "success",
                button: "باشه",
              });
            </script>';
        } 
    }
} else {
echo '<script type="text/javascript">
swal({
    title: "ناموفق",
    text: "ایمیل معتبر نمیباشد",
    icon: "error",
    button: "باشه",

  });
</script>';
}

}
}
?>
<section id="section5" class="justify-content-center">
    <div class="container">

        <form class="needs-validation" method="POST" novalidate>
            <div class="row">
                <div class="col footer-title  mt-5"> کــــــــتــــــــاب  ارزونـــــــی</div>
               
                <div class="col-sm-2 scrolltotop  mt-5" onclick="scrollToTop()">
                برگشت به بالا 
                <i class="fas fa-arrow-up"></i>

            </div>
            </div>
            <div class="row mt-3" style="text-align: right">
                <div class="col">
                    <a class="ml-2" href="https://wa.link/5589e5"><i class="fab fa-whatsapp footer-icons" aria-hidden="true"></i></a>
                    <a class="ml-2" href="https://instagram.com/ketabarzoonii"><i class="fab fa-instagram footer-icons"></i></a>
                    <a class="ml-2" href="https://t.me/ketabarzooni"><i class="fab fa-telegram footer-icons"></i></a>
                    <a class="ml-2" href="https://twitter.com/ketabarzooni"><i class="fab fa-twitter footer-icons"></i></a>
                    <a class="ml-2" href="https://facebook.com/ketabarzooni"><i class="fab fa-facebook footer-icons"></i></a>
                </div>
                
                </div>
            

            <div class="row mt-5 mb-5 row1">
                <div class="col-sm-2 support">
                    <i class="fas fa-phone"></i>
                            تلفن پشتیبانی : 
                    </div>
                <div class="col-sm phone">
               ۰۹۰۵ ۶۹۷ ۸۱۸۸ | ۰۹۲۲ ۳۸۳ ۳۴۵۸ 
                </div>
                </div>
        
            
            <hr/>

            <div class="row mt-5">
                <div class="col-sm-5 mb-5">
                    <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=238563&amp;Code=8Egs6pkZaCjtlR3MT2qB">
                        <img referrerpolicy="origin" src="/main/images/enamad.png"  class="img-fluid enamad-logo" id="8Egs6pkZaCjtlR3MT2qB">
                    </a>  
                </div>

                <div class="col emailform">
                    <label for="newsemail" class="label">از جدید ترین تخفیفات با خبر شوید</label>
                    <input type="text" name="newsemail" class="form-control email" id="newsemail" placeholder="آدرس ایمیل خود را وارد نمایید" required>
                    <input type="submit" name="submit" class="form-control mt-2 sabte btn btn-outline-danger" value="ثبت">
                </div>
               
            </div>
            
            
        </form>
     
        <br/>
        <br/>
        <br/>
        <hr/>
        <div class="row">
            <div class="col copyright">
                استفاده از هر گونه مطالب این فروشگاه فقط برای مقاصد غیر تجاری با ذکر منبع بلامانع است.کلیه حقوق متعلق به وبسایت کتاب ارزونی است.
        </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="/main/js/scroll.js"></script>
<script type="text/javascript" src="/main/js/navbar.js"></script>
<script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js "></script>
<script type="text/javascript">
    AOS.init();
</script>

<script type="text/javascript">
(function() {
'use strict';
window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);
})();
</script>

</body>

</html>