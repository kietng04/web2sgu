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

    <section class="scpayment">
        <div class="scpayment__tile">THANH TOÁN</div>
    </section>

    <section class="scbox">
      

        <div class="scbox__form">
            <h2>
            Thông tin đặt hàng
            </h2>
            <div class="form-item">
                <label for="Ho va ten*">Họ và tên*</label>
                <input type="text" placeholder="Nhap ten">
            </div>
            <div class="form-item">
                <label for="Ho va ten*">Số điện thoại*</label>
                <input type="text" placeholder="Nhap so dien thoai">
            </div>
            <div class="form-item">
                <label for="Ho va ten*">Email*</label>
                <input type="text" placeholder="Nhap email">
            </div>
            <div class="form-item">
                <label for="Ho va ten*">Dia chi*</label>
                <input type="text" placeholder="Nhap dia chi">
            </div>
            <div class="form-item">
                <label for="Ho va ten*">Giao vào lúc:</label>
                <input type="time" placeholder="Nhap thoi gian giao hang">
            </div>
            <button class="btn">
                <p class="text">Đặt hàng</p>
                <span class="price">219,000 ₫</span>
            </button>
        </div>

        <div class="scbox__form --bottom">
            <div class="scbox__form-top">
                <div class="bagde">
                    <p class="num">1</p>
                </div>
                <div class="left">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>Xem chi tiết giỏ hàng của bạn</p>
                </div>
                <div class="right">
                <i class="fa-solid fa-chevron-right"></i>
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
    </section>



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