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
                            <a class="nav-link " href="/others/dashboard/" >پروفایل </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/request/" >ثبت درخواست </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/submit_orders/"> ثبت سفارش  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/orders/"> سفارشات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/others/dashboard/editdata/"> ویرایش اطلاعات</a>
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
    <section class="d-flex justify-content-center">
        <div class="container mt-5 border animate__animated animate__fadeInDown" id="orders">
        <form class="needs-validation" method="POST" novalidate>



            <h1>
                سفارشات
            </h1>
            <hr/>
            <?php
                $userid = $_SESSION['userid'];
                $selector ="SELECT * FROM orders WHERE id ='$userid'"; 
                $results = $connection->query($selector);
                if($results->num_rows == 0){
                    $output = ' <div class="container cont">
                <div class="col btn btn-outline-danger no-order">
                                        سفارشی موجود نمیباشد
                                    </div>

                                </div>';
                    echo $output;
                } else {
                    while($row2 = $results->fetch_assoc()){
                        $output2 = '<div class="container cont">
                        <div class="row">
                            <img class="rounded-circle shadow-1-strong mt-2" src="/others/dashboard/images/avatar.png" alt="avatar" width="60" height="60" />
                            <div>
                                <h6 class="fw-bold mt-2 mr-3 name">'.$row2['name'].''.$row2['lastname'].'</h6>
                                
                                
                                <div class="d-flex align-items-center mb-3">
                                    <p class="mb-0 mr-3 date">
                                        تاریخ : '.$row2['date'].'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col order-email">ایمیل :‌ '.$row2['email'].'</div>
                        </div>

                        <hr/>

                        <div class="row">
                            <div class="col desc">
                                نام کتاب : '.$row2['bookname'].'
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col desc2">
                                نویسنده : '.$row2['author'].'
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col desc2">
                                نام انتشارات : '.$row2['publish'].'
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col status">
                                وضعیت سفارش :
                                <div class="btn btn-outline-success"> '.$row2['status'].'</div>
                                ‌
                            </div>
                        </div>
                    </div>';
                        echo $output2;
                    }
                    }
?>



            <br/>
       
            </form>
            <br/>
            <br/>
            <br/>
            
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