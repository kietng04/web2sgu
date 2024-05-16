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
        <div class="header__action">    
            <div class="header__action-member">
                <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                <p>THÀNH VIÊN</p>
            </div>
            <div class="hover-menu">
                        <ul>
                            <li class="login">LOGIN</li>
                            <li class="view_profile">VIEW PROFILE</li>
                        </ul>
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
   


    <div class="popupLogin --none">
            <div class="popupLogin__container">
                <div class="popupLogin__img">
                    <img src="./images/loginbackground.jpg" alt="">
                </div>
                <div class="popupLogin__form user">
                    <h2 class="headingLogin">🍕🍕 WELCOME BACK!</h2>
                    <p class="heading__desc">NẾU BẠN CHƯA CÓ TÀI KHOẢN PIZZA HUT<br>HÃY ĐĂNG KÍ
                        TRƯỚC KHI ĐĂNG NHẬP BẠN NHÉ!</p>
                    <!-- <div class="form-item --login --email "> -->
                    <div class="form-item --login">
                        <label for="email">Tên Đăng Nhập *</label>
                        <input type="text" name="" id="taikhoan">
                        <p class="error"></p>
                    </div>
                    <div class="form-item --login --password">
                        <label for="email">Mật Khẩu *</label>
                        <input type="Password" name="" id="matkhau">
                        <p class="error"></p>

                    </div>
                    <!-- onclick="loginz()" -->

                    <button class="btn dangnhapz">ĐĂNG NHẬP</button>

                    <div class="form-error">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p>Email hoặc mật khẩu đăng nhập không hợp lệ. Vui lòng thử lại.</p>
                    </div>

                    <p class="register">Bạn chưa có tài khoản? <a
                            href="index.php?controller=SignUpController&action=index">Đăng ký ngay</a> hoặc tìm hiểu
                        thêm về <a href="">Điều khoản và Quyền lợi Thành viên</a></p>
                </div>
                <div class="popupLogin__form staff hidden none">
                    <h2 class="headingLogin">🍕🍕 WELCOME BACK!</h2>
                    <p class="heading__desc">ĐÂY LÀ KHU VỰC ĐĂNG NHẬP CHO NHÂN VIÊN<br>XIN HÃY TRỞ VỀ NẾU BẠN KHÔNG PHẢI
                        NHÂN VIÊN</p>
                    <!-- <div class="form-item --login --email "> -->
                    <div class="form-item --logins">
                        <label for="email">Tên đăng nhập *</label>
                        <input type="text" name="" id="taikhoans">
                        <p class="error"></p>
                    </div>
                    <div class="form-item --login --passwords">
                        <label for="email">Mật Khẩu *</label>
                        <input type="Password" name="" id="matkhaus">
                        <p class="error"></p>

                    </div>
                    <!-- onclick="loginz()" -->

                    <button class="btn dangnhaps">ĐĂNG NHẬP</button>

                    <div class="form-error">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p>Tên đăng nhập hoặc mật khẩu đăng nhập không hợp lệ. Vui lòng thử lại.</p>
                    </div>

                </div>

                <div class="login__switch">Bạn là nhân viên? Ấn đây</div>
                <button class="btnX">
                    <img src="./images/iconClose.png">
                </button>

            </div>
    </div>

        <div id="userModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Thông tin cá nhân</h2>
                <form>
                    <label for="first-name">Họ:</label>
                    <input type="text" id="display_firstname" name="name" readonly>
                    <label for="given-name">Tên:</label>
                    <input type="text" id="display_lastname" name="name" readonly>
                    <label for="email">Email:</label>
                    <input type="email" id="display_email" name="email" readonly>
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="display_sdt" name="phone">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="display_diachi" name="address">
                    <button id="update-info">Cập nhật</button>
                </form>
            </div>
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
    document.querySelector('.header__action-member').addEventListener('click', function() {
            var hoverMenu = document.querySelector('.hover-menu');
            if (hoverMenu.style.display === 'none' || hoverMenu.style.display === '') {
                hoverMenu.style.display = 'block';
            } else {
                hoverMenu.style.display = 'none';
            }
    }); 

    var headerActionMember = document.querySelector(".login");
        headerActionMember.addEventListener("click", function() {
            // Loại bỏ class --none từ phần tử .popupLogin
            popupLogin.classList.remove("--none");
            hoverMenu.style.display = 'none';
    });

    var modal = document.getElementById("userModal");
    var view = document.querySelector(".view_profile");
    var span = document.getElementsByClassName("close")[0];
    var hoverMenu = document.querySelector('.hover-menu');

    view.onclick = function() {
        modal.style.display = "block";
        hoverMenu.style.display = 'none';
    }

    span.onclick = function() {
        modal.style.display = "none";
        hoverMenu.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var loginSwitch = document.querySelector(".login__switch");
    var userLogin = document.querySelector(".popupLogin__form.user");
    var staffLogin = document.querySelector(".popupLogin__form.staff");
    loginSwitch.addEventListener("click", function() {
                // Kiểm tra xem phần tử .popupLogin__form.staff có class --none không
                var isNone = staffLogin.classList.contains("none");

                // Nếu có class --none, loại bỏ nó; nếu không, thêm vào
                if (isNone) {
                    loginSwitch.classList.add("hidden");
                    userLogin.classList.add("hidden");
                    setTimeout(() => {
                        userLogin.classList.add("none");
                        staffLogin.classList.remove("none");
                    }, 300);
                    setTimeout(() => {
                        staffLogin.classList.remove("hidden");
                        loginSwitch.classList.remove("hidden");
                        loginSwitch.innerHTML = "Bạn là khách hàng? Ấn đây";
                    }, 600);


                } else {
                    loginSwitch.classList.add("hidden");
                    staffLogin.classList.add("hidden");
                    setTimeout(() => {
                        staffLogin.classList.add("none");
                        userLogin.classList.remove("none");
                    }, 300);
                    setTimeout(() => {
                        userLogin.classList.remove("hidden");
                        loginSwitch.classList.remove("hidden");
                        loginSwitch.innerHTML = "Bạn là nhân viên? Ấn đây";
                    }, 600);
                }
            });

            button.addEventListener("click", function() {
                // Thêm lại class --none cho .popupLogin
                popupLogin.classList.add("--none");
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

var dangnhapUserBtn = document.querySelector('.dangnhapz');
        dangnhapUserBtn.addEventListener('click', function() {
            var checkForm = true;
            var formError = document.querySelector(".form-error");
            var username = document.getElementById("taikhoan");
            var usernameFormItem = document.querySelector(".form-item.--login");
            var usernameError = document.querySelector(".form-item.--login .error");
            var usernamePattern = /^.{3,}$/;
            var password = document.getElementById("matkhau");
            var passwordError = document.querySelector(".form-item.--login.--password .error");
            var passwordFormItem = document.querySelector(".form-item.--login.--password");
            var passwordPattern = /^.{3,}$/;


            if (username.value.trim() === "") {
                usernameFormItem.classList.add("--error");
                usernameError.innerHTML = "Vui lòng không để trống";
                checkForm = false;
            } else if (!usernamePattern.test(username.value)) {
                usernameFormItem.classList.add("--error");
                usernameError.innerHTML = "Tên đăng nhập không đúng định dạng";
                checkForm = false;
            } else {
                usernameFormItem.classList.remove("--error");
                usernameError.innerHTML = "";
            }
            username.addEventListener("input", function() {
                if (!usernamePattern.test(username.value)) {
                    usernameFormItem.classList.add("--error");
                    usernameError.innerHTML = "Tên đăng nhập không đúng định dạng";
                    checkForm = false;
                } else {
                    usernameFormItem.classList.remove("--error");
                    usernameError.innerHTML = "";
                }
            });

            if (password.value.trim() === "") {
                passwordFormItem.classList.add("--error");
                passwordError.innerHTML = "Vui lòng không để trống";
                checkForm = false;
            } else if (!passwordPattern.test(password.value)) {
                passwordFormItem.classList.add("--error");
                passwordError.innerHTML = "Mật khẩu phải chứa ít nhất 3 ký tự";
                checkForm = false;
            } else {
                passwordFormItem.classList.remove("--error");
                passwordError.innerHTML = "";
            }
            password.addEventListener("input", function() {
                if (!passwordPattern.test(password.value)) {
                    passwordFormItem.classList.add("--error");
                    passwordError.innerHTML = "Mật khẩu phải chứa ít nhất 3 ký tự";
                    checkForm = false;
                } else {
                    passwordFormItem.classList.remove("--error");
                    passwordError.innerHTML = "";
                }
            });

            if (checkForm) {
                // alert("Đăng nhập thành công!" + email.value + " " + password.value);
                loginz(username.value, password.value);
                formError.style.display = "none";
                // email.value = "";
                // password.value = "";
            } else {
                formError.style.display = "flex";
            }


        })

        var dangnhapStaffBtn = document.querySelector('.dangnhaps');
        dangnhapStaffBtn.addEventListener('click', function() {

            var checkForm = true;
            var formError = document.querySelector(".form-error");
            var username = document.getElementById("taikhoans");
            var usernameFormItem = document.querySelector(".form-item.--logins");
            var usernameError = document.querySelector(".form-item.--logins .error");
            var usernamePattern = /^.{3,}$/;
            var password = document.getElementById("matkhaus");
            var passwordError = document.querySelector(".form-item.--login.--passwords .error");
            var passwordFormItem = document.querySelector(".form-item.--login.--passwords");
            var passwordPattern = /^.{3,}$/;


            if (username.value.trim() === "") {
                usernameFormItem.classList.add("--error");
                usernameError.innerHTML = "Vui lòng không để trống";
                checkForm = false;
            } else if (!usernamePattern.test(username.value)) {
                usernameFormItem.classList.add("--error");
                usernameError.innerHTML = "Tên đăng nhập không đúng định dạng";
                checkForm = false;
            } else {
                usernameFormItem.classList.remove("--error");
                usernameError.innerHTML = "";
            }
            username.addEventListener("input", function() {
                if (!usernamePattern.test(username.value)) {
                    usernameFormItem.classList.add("--error");
                    usernameError.innerHTML = "Tên đăng nhập không đúng định dạng";
                    checkForm = false;
                } else {
                    usernameFormItem.classList.remove("--error");
                    usernameError.innerHTML = "";
                }
            });

            if (password.value.trim() === "") {
                passwordFormItem.classList.add("--error");
                passwordError.innerHTML = "Vui lòng không để trống";
                checkForm = false;
            } else if (!passwordPattern.test(password.value)) {
                passwordFormItem.classList.add("--error");
                passwordError.innerHTML = "Mật khẩu phải chứa ít nhất 3 ký tự";
                checkForm = false;
            } else {
                passwordFormItem.classList.remove("--error");
                passwordError.innerHTML = "";
            }
            password.addEventListener("input", function() {
                if (!passwordPattern.test(password.value)) {
                    passwordFormItem.classList.add("--error");
                    passwordError.innerHTML = "Mật khẩu phải chứa ít nhất 3 ký tự";
                    checkForm = false;
                } else {
                    passwordFormItem.classList.remove("--error");
                    passwordError.innerHTML = "";
                }
            });


            if (checkForm) {
                // alert("Đăng nhập thành công!" + email.value + " " + password.value);
                logins(username.value, password.value);
                formError.style.display = "none";
                // email.value = "";
                // password.value = "";
            } else {
                formError.style.display = "flex";
            }
        });
        </script>
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/notificationEffect.js"></script>
        <script src="js/script.js"></script>
        <script src="js/helper.js"></script>
        <script src="js/indexJS.js"></script>
</body>

</html>