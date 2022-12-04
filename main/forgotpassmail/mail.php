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
?>
<!DOCTYPE html>
<html lang="en-fa-IR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/others/portal/forgotpassmail/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>پورتال فراموشی رمز - کتاب ارزونی</title>
</head>

<body>
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light ">
        <div class="container animate__animated animate__fadeInDown">
            <a class="navbar-brand mt-2" href="#">کــــــــتــــــــاب  ارزونـــــــی</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse mt-3" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mt-2"><a class="nav-link" href="https://ketabarzooni.ir"> خانه  </a></li>
                    <li class="nav-item mt-2"><a class="nav-link" href="/others/insert_comments"> ثبت نظر </a></li>
                    <li class="nav-item mt-2"><a class="nav-link" href="/others/comments/"> دیدگاه کاربران </a></li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="/others/portal/signup/">
                            <button type="button" class="btn btn-warning mb-2">ثبت نام</button>
                        </a>
                    </li>


                </ul>

            </div>
            <!-- navbar-collapse.// -->
        </div>
        <!-- container-fluid.// -->
    </nav>

    <?php
    
      $mail = $_POST['mail'];
      if(isset($mail)){
          if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

              $query_mail = "SELECT * FROM users WHERE `email`='{$mail}'";
              $mail_res = $connection->query($query_mail);
              $headers  = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              if($mail_res->num_rows > 0){
                  
                      $to = $mail;
                      $message = '<html>
                      <body style="direction:rtl;">
                      <div class="container" style="background-color:#d3d3d3;color:black !important;">
                      <p style="font-size:40px;">کاربر گرامی</p><br/>
                      <p style="font-size:25px; color:red;"> جهت بازیابی رمز عبور خود لطفا بر روی لینک زیر کلیک کنید</p><br/>
                      <a href="https://ketabarzooni.ir/others/portal/forgotpass/" style="color:navy;border:1px solid navy;margin-right:30px;padding:5px 5px 5px 5px;font-size:25px;border-raduis:25px;">بازیابی رمز عبور</a>
                      <br/>
                      <p>مدیریت سامانه کتاب ارزونی</p>
                      </div>
                      </body>
                      </html>';   
                     
                        if(mail($to,"بازیابی رمز عبور",$message,$headers)){
                            echo '<script type="text/javascript">
                            swal({
                                title: "ایمیل ارسال شد",
                                text : "کاربر گرامی لطفا ایمیل خود را بررسی کنید",
                                icon: "success",
                                button: "باشه",
                            });
                            </script>';
                        } else {
                            echo '<script type="text/javascript">
                            swal({
                                title: "ناموفق",
                                text : "متاسفانه ایمیل ارسال نشد",
                                text : "لطفا مجدد تلاش کنید.",
                                icon: "error",
                                button: "باشه",
                            });
                            </script>';
                        }
          } else {
            echo '<script type="text/javascript">
            swal({
                title: "ناموفق",
                text : "این ایمیل در سیستم ثبت نیست",
                icon: "error",
                button: "باشه",
            });
            </script>';
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

      ?>



    
    <section class="d-flex justify-content-center ">
        <div class="container mt-5 border animate__animated animate__fadeInDown" id="forgotpass">
        <form class="needs-validation" method="POST" novalidate>

            <h1>
                فرم فراموشی رمز عبور
            </h1>
            <hr/>

            <br/>
            <br/>

            <div class="form-floating">


                <label for="lastname">ایمیل  
                </label>
                <input type="text" class="form-control" id="name" placeholder=" ایمیل خود را وارد کنید" name="mail" required><br/>



                <button type="submit" name="submit" class="btn btn-primary form-btn">ارسال ایمیل </button>
                <button type="submit" name="submit" class="btn btn-outline-danger form-btn2 mr-5" onclick="login()"> ورود  </button>

            </div>
            </form>
        </div>
    </section>
    <br/><br/>
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
