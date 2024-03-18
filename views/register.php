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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/styles.css">


</head>

<body>
    <div class=" loading" style="display: none"> đang load oke ? </div>

    <header class="header --shadown">
        <div class="header__logo">
            <a href="index.php">
                <img src="../img/logo-pizza.png" alt="logo">
            </a>
        </div>
        <div class="header__action">
            <div class="header__action-location">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="header__action-bell">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div class="header__action-member">
                <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                <p>Thanh Vien</p>
            </div>
        </div>
    </header>

   <main class="main">
   <div class="scregister">
        <div class="scregister__container">
            <div class="scregister__top">
                <img src="../images//background2.jpg" alt="">
            </div>
            <div class="scregister__title">
                <h2>🍕🍕 TÍCH ĐIỂM ĐỔI PIZZA NÀO!!</h2>
                <p>THAM GIA HUT REWARDS <br> VÀ BẮT ĐẦU HÀNH TRÌNH TÍCH ĐIỂM CỦA BẠN!</p>
            </div>
            <div class="scregister__form">
                <div class="scregister__form-left --error">
                    <div class="form-item --register --error">
                        <label for="">Ten*</label>
                        <input type="text" name="" value="">
                        <p class="error">Yêu cầu nhập Tên</p>
                    </div>
                    <div class="group">
                    <div class="form-item --register">
                        <label for="">Ngay sinh*</label>
                        <input class="--register" type="date" name="" value="">
                    </div>
                    <div class="form-item --register">
                        <label for="">Gioi tinh*</label>
                        <input type="text" name="" value="">
                    </div>
                    </div>
                    <div class="form-item --register">
                        <label for="">So dien thoai*</label>
                        <input type="text" name="" value="">
                    </div>
                    <div class="form-item --register">
                        <label for="">Email*</label>
                        <input type="text" name="" value="">
                    </div>
                </div>
                <div class="scregister__form-right">
                    <div class="form-item --register">
                        <label for="">Mat khau*</label>
                        <input type="password" name="" value="">
                    </div>
                    <div class="form-item --register">
                        <label for="">Xac nhan mat khau*</label>
                        <input type="password" name="" value="">
                    </div>
                    <div class="form-item">
                        <label class="title">Mật khẩu ít nhất 3 ký tự và đáp ứng cac điều kiện sau:</label>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i> <span>Các số 0-9.</span></p>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i><span> Các chữ cái thường (nhỏ) a-z. Ví dụ: a, e, r</span></p>
                        <p class="warn"><i class="fa-solid fa-circle-exclamation"></i> <span>Không chứa dấu cách</span></p>
                    </div>
                    <div class="form-check">
                        <input type="checkbox">
                        <p>Tôi đồng ý nhận thông tin từ Pizza Hut theo thông tin đã đăng ký như trên.</p>
                    </div>
                </div>
            </div>
            <div class="scregister__bottom">
                    <button class="btn" type="submit">ĐĂNG KÝ</button>
            </div>
        </div>
        
    </div>
   
    </div>

    <div class="popupLogin --none">
    <div class="popupLogin__container">
        <div class="popupLogin__img">
            <img src="../images/loginbackground.jpg" alt="">
        </div>
        <div class="popupLogin__form">
            <h2 class="headingLogin">🍕🍕 WELCOME BACK!</h2>
            <p class="heading__desc">NEU BẠN ĐÃ LÀ THÀNH VIÊN PIZZA HUT<br>HAY ĐĂNG NHẬP
                TRƯỚC KHI THANH TOÁN PIZZA NHÉ!</p>
                <div class="form-item --login --error">
                    <label for="email">Email *</label>
                    <input type="text" name="" id="">
                    <p class="error">Sai dinh dang email</p>
                </div>
                <div class="form-item --login">
                    <label for="email">Mật Khẩu *</label>
                    <input type="Password" name="" id="">
                </div>
               
                <button class="btn">ĐĂNG NHẬP</button>

                <div class="form-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <p>Email hoặc mật khẩu đăng nhập không hợp lệ. Vui lòng thử lại.</p>
                </div>

                <p class="register">Bạn chưa có tài khoản? <a href="">Đăng ký ngay</a> hoặc tìm hiểu thêm về <a href="">Điều khoản và Quyền lợi Thành viên</a></p>
        </div>

        <button class="btnX">
                <img src="../images/iconClose.png" alt="">
        </button>

    </div>  
</main>
<script>

document.addEventListener("DOMContentLoaded", function() {
  // Lấy phần tử .popupLogin
  var popupLogin = document.querySelector(".popupLogin");
  var button = document.querySelector(".btn");
  // Lấy phần tử .btnX
  var closeButton = document.querySelector(".btnX");

  // Thêm sự kiện click cho .header__action-member
  var headerActionMember = document.querySelector(".header__action-member");
  headerActionMember.addEventListener("click", function() {
    // Loại bỏ class --none từ phần tử .popupLogin
    popupLogin.classList.remove("--none");
  });

  // Thêm sự kiện click cho nút đóng
  closeButton.addEventListener("click", function() {
    // Thêm lại class --none cho .popupLogin
    popupLogin.classList.add("--none");
  });

  // Thêm sự kiện click cho phần tử cha .popupLogin
  popupLogin.addEventListener("click", function(event) {
    // Kiểm tra xem phần tử được nhấp vào có phải là phần tử cha popupLogin không
    if (event.target === popupLogin) {
      // Thêm lại class --none cho .popupLogin
      popupLogin.classList.add("--none");
    }
  });

  button.addEventListener("click", function() {
    // Thêm lại class --none cho .popupLogin
    popupLogin.classList.add("--none");
  });
});

</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/helper.js"></script>
    <script src="js/indexJS.js"></script>
    <script>
    </script>

</body>

</html>