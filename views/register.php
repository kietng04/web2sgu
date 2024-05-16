<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza hut</title>

    <meta name="title" content="Luxeaaaastate">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="autor" content="">

    <!-- Favicon -->
    <!-- <link rel="icon" href="favicon.ico"> -->

    <!-- link css -->
    <!-- font awesome cdn link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/notification.css">


</head>

<body>
    <div class=" loading" style="display: none"> đang load oke ? </div>

    <header class="header --shadown">
        <div class="header__logo">
            <a href="index.php">
                <img src="img/logo-pizza.png" alt="logo">
            </a>
        </div>
       
    </header>

   <main class="main">
   <div class="scregister">
        <div class="scregister__container">
            <div class="scregister__top">
                <img src="../images//background2.jpg" alt="">
            </div>
            <div class="scregister__title">
                <h2>🍕🍕 ĐĂNG KÍ MUA PIZZA NÀO!!</h2>
                <p>TRỞ THÀNH THÀNH VIÊN CỦA PIZZA HUT <br> VÀ BẮT ĐẦU HÀNH TRÌNH NHẬN ƯU ĐÃI BẠN NHÉ!</p>
            </div>
            <div class="scregister__form">
                <div class="scregister__form-left ">
                    <div class="group">
                        <div class="form-item --register --firstname">
                            <label for="">Họ và tên đệm *</label>
                            <input type="text" name="" value="" class="firstname">
                            <p class="error"></p>
                        </div>
                        <div class="form-item --register --lastname">
                            <label for="">Tên *</label>
                            <input type="text" name="" value="" class="lastname">
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="group">
                    <div class="form-item  --register --sexial">
                        <label for="">Giới tính *</label>
                            <select name="" id="cbgioitinh">
                                <option value="Nam">Nam</option>
                                <option vaslue="Nu">Nữ</option>
                            </select>
                    </div>  
                    <div class="form-item  --register --phone">
                        <label for="">Số điện thoại *</label>
                        <input type="text" name="" value="" class="sdt">
                        <p class="error"></p>

                    </div>
               

                    </div>
               
                    <div class="form-item --register --email">
                        <label for="">Email *</label>
                        <input type="text" name="" value="" class="email">
                        <p class="error"></p>

                    </div>
                    <div class="form-item  --register --address">
                        <label for="">Địa chỉ *</label>
                        <input type="text" name="" value="" class="diachi">
                        <p class="error"></p>

                    </div>
                   
                </div>
                <div class="scregister__form-right">
                    <div class="form-item --register --username">
                        <label for="">Tên đăng nhập *</label>
                        <input type="text" name="" value="" class="tendangnhap">
                        <p class="error"></p>
                    </div>
                    <div class="form-item --register --password ">
                        <label for="">Mật khẩu *</label>
                        <input type="password" name="" value="" class="matkhau">
                        <p class="error"></p>

                    </div>
                    <div class="form-item  --register --cfpassword">
                        <label for="">Xác nhận mật khẩu *</label>
                        <input type="password" name="" value="" class="xacnhanmatkhau">
                        <p class="error"></p>
                        
                    </div>
                    <div class="form-item">
                        <label class="title">Mật khẩu ít nhất 3 ký tự và đáp ứng cac điều kiện sau:</label>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i> <span>Các số 0-9.</span></p>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i><span> Các chữ cái thường (nhỏ) a-z. Ví dụ: a, e, r</span></p>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i> <span>Không chứa dấu cách</span></p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="dongy">
                        <p>Tôi đồng ý nhận thông tin từ Pizza Hut theo thông tin đã đăng ký như trên.</p>
                    </div>
                </div>
            </div>
            <div class="scregister__bottom">
                    <button class="btn dangkybtn" type="submit">ĐĂNG KÝ</button>
            </div>
        </div>
    </div>
   

</main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/notificationEffect.js"></script>
        <script src="js/script.js"></script>
        <script src="js/helper.js"></script>
        <script src="js/indexJS.js"></script>
</body>

</html>