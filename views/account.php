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
                <img src="img/logo-pizza.png" alt="logo">
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
<div class="main-wrapper">
<div class="container open" id="account-user">
        <div class="main-account">
          <div class="main-account-header">
            <h3>Thông tin tài khoản của bạn</h3>
            <p>Quản lý thông tin để bảo mật tài khoản</p>
          </div>
          <div class="main-account-body">
            <div class="main-account-body-col">
              <form action="" class="info-user">
                <div class="form-group">
                  <label for="infoname" class="form-label">Họ và tên</label>
                  <input class="form-control" type="text" name="infoname" id="infoname" placeholder="">
                </div>
                <div class="form-group">
                  <label for="infophone" class="form-label">Số điện thoại</label>
                  <input class="form-control" type="text" name="infophone" id="infophone" disabled="true" placeholder="">
                </div>
                <div class="form-group">
                  <label for="infoemail" class="form-label">Email</label>
                  <input class="form-control" type="email" name="infoemail" id="infoemail" placeholder="Thêm địa chỉ email của bạn">
                  <span class="inforemail-error form-message"></span>
                </div>
                <div class="form-group">
                  <label for="infoaddress" class="form-label">Địa chỉ</label>
                  <input class="form-control" type="text" name="infoaddress" id="infoaddress" placeholder="Thêm địa chỉ giao hàng của bạn">
                </div>
              </form>
            </div>
            <div class="main-account-body-col">
              <form action="" class="change-password">
                <div class="form-group">
                  <label for="" class="form-label w60">Mật khẩu hiện tại</label>
                  <input class="form-control" type="password" name="" id="password-cur-info" placeholder="Nhập mật khẩu hiện tại">
                  <span class="password-cur-info-error form-message"></span>
                </div>
                <div class="form-group">
                  <label for="" class="form-label w60">Mật khẩu mới </label>
                  <input class="form-control" type="password" name="" id="password-after-info" placeholder="Nhập mật khẩu mới">
                  <span class="password-after-info-error form-message"></span>
                </div>
                <div class="form-group">
                  <label for="" class="form-label w60">Xác nhận mật khẩu mới</label>
                  <input class="form-control" type="password" name="" id="password-comfirm-info" placeholder="Nhập lại mật khẩu mới">
                  <span class="password-after-comfirm-error form-message"></span>
                </div>
              </form>
            </div>
            <div class="main-account-body-row">
              <div>
                <button id="save-info-user" onclick="changeInformation()">
                  <i class="fa-regular fa-floppy-disk"></i> Lưu thay đổi
                </button>
              </div>
              <div>
                <button id="save-password" onclick="changePassword()">
                  <i class="fa-regular fa-key"></i> Đổi mật khẩu
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/helper.js"></script>
    <script src="js/payment.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    </script>

</body>

</html>