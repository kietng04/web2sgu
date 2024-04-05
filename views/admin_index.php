<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_styles.css">
    <script src="https://kit.fontawesome.com/3dff50b2d8.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="../img/logo2.png" alt="">
            </div>
            <span class="logo_name">Admin HP3K</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="views/admin_index.php">
                  <i class="fa-solid fa-house"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="admin_product.php">
                  <i class="fa-solid fa-boxes-stacked"></i>
                    <span class="link-name">Quản lí sản phẩm </span>
                </a></li>
                <li><a href="admin_order.php">
                  <i class="fa-solid fa-file-invoice"></i>
                  <span class="link-name">Quản lí đơn hàng</span>
                </a></li>
                <li><a href="admin_account.php">
                  <i class="fa-solid fa-users"></i>
                    <span class="link-name">Quản lí người dùng</span>
                </a></li>
                <li><a href="admin_import.php">
                  <i class="fa-solid fa-file-import"></i>
                    <span class="link-name">Quản lí nhập hàng</span>
                </a></li>
                <li><a href="admin_export.php">
                  <i class="fa-solid fa-file-export"></i>
                    <span class="link-name">Quản lí xuất hàng</span>
                </a></li>
                <li><a href="admin_table.php">
                  <i class="fa-solid fa-square-poll-vertical"></i>
                    <span class="link-name">Thống kê</span>
                </a></li>
            </ul>
          
            <ul class="logout-mode">
                <li><a href="#">
                  <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
          <i class="fa-solid fa-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
          <div class="title">
            <i class="fa-solid fa-box"></i>
            <span class="text"> Trang chủ quản lí </span>
        </div>
          <div class="cards">
              <div class="card-single">
                  <div class="box">
                      <h2 id="amount-user">0</h2>
                      <div class="on-box">
                          <img src="../img/admin-pizza-1.png" alt="" style=" width: 200px;">
                          <h3>Khách hàng</h3>
                          <p>Sản phẩm là bất cứ cái gì có thể đưa vào thị trường để tạo sự chú ý, mua sắm, sử dụng
                              hay tiêu dùng nhằm thỏa mãn một nhu cầu hay ước muốn. Nó có thể là những vật thể,
                              dịch vụ, con người, địa điểm, tổ chức hoặc một ý tưởng.</p>
                      </div>

                  </div>
              </div>
              <div class="card-single">
                  <div class="box">
                      <div class="on-box">
                          <img src="../img/admin-pizza-1.png" alt="" style=" width: 200px;">

                          <h2 id="amount-product">0</h2>
                          <h3>Sản phẩm</h3>
                          <p>Khách hàng mục tiêu là một nhóm đối tượng khách hàng trong phân khúc thị trường mục
                              tiêu mà doanh nghiệp bạn đang hướng tới. </p>
                      </div>
                  </div>
              </div>
              <div class="card-single">
                  <div class="box">
                      <h2 id="doanh-thu">$5020</h2>
                      <div class="on-box">
                          <img src="../img/admin-pizza-1.png" alt="" style=" width: 200px;">

                          <h3>Doanh thu</h3>
                          <p>Doanh thu của doanh nghiệp là toàn bộ số tiền sẽ thu được do tiêu thụ sản phẩm, cung
                              cấp dịch vụ với sản lượng.</p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </section>


    <div class="modal signup">
        <div class="modal-container">
            <h3 class="modal-container-title add-account-e" style="font-weight: 600; font-size:20px">THÊM KHÁCH HÀNG MỚI
            </h3>
            <!-- <h3 class="modal-container-title edit-account-e" style="font-weight: 600; font-size:20px">CHỈNH SỬA THÔNG
                TIN</h3> -->
            <button class="modal-close"><i class="fa-solid fa-xmark"></i></button>
            <div class="form-content sign-up">
                <form action="" class="signup-form">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Tên đầy đủ</label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Pham Van Kiet"
                            class="form-control">
                        <span class="form-message-name form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại"
                            class="form-control">
                        <span class="form-message-phone form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" placeholder="Nhập email" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input id="address" name="address" type="text" placeholder="Nhập Địa chỉ" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu"
                            class="form-control">
                        <span class="form-message-password form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password" class="form-label">Nhập lai mật khẩu</label>
                        <input id="confirm-password" name="confirm-password" type="password" placeholder="Nhập mật khẩu"
                            class="form-control">
                        <span class="form-message-confirm-password form-message"></span>
                    </div>
                    <div class="form-group edit-account-e">
                        <label for="" class="form-label">Trạng thái</label>
                        <input type="checkbox" id="user-status" class="switch-input">
                        <label for="user-status" class="switch"></label>
                    </div>
                    <!-- <button class="form-submit add-account-e" id="signup-button">Đăng ký</button> -->
                    <button class="form-submit edit-account-e" id="btn-update-account"><i
                            class="fa-regular fa-floppy-disk"></i> Lưu thông tin</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.btn-edit');
        var closeButtons = document.querySelectorAll('.modal-close');
        var updateButtons = document.querySelectorAll('.btn-update-product-form');
        var addButtons = document.querySelector('#btn-add-product');
        var modalDetail = document.querySelector('.detail-order');
        var titleModal = document.querySelector('.modal-container-title');
        var modal = document.querySelector('.add-product');
        var uploadImg = document.querySelector('.upload-image-preview');
        var detailButtons = document.querySelectorAll('.btn-detail');
        var modalSignup = document.querySelector('.signup');
        var editUserButtons = document.querySelectorAll('#edit-account');
        var addUserButtons = document.querySelectorAll('#btn-add-user');
        var addUser = document.querySelector('#btn-add-user');
        var addUserTitle = document.querySelector('.add-account-e');
        var addSignupButton = document.querySelector('#signup-button');
        var updateSignupButton = document.querySelector('#btn-update-account');

        var statusUser = document.querySelectorAll('.form-group edit-account-e');
        // tab for section
        const sidebars = document.querySelectorAll(".sidebar-list-item.tab-content");
        const sections = document.querySelectorAll(".section");
        for (let i = 0; i < sidebars.length; i++) {
            sidebars[i].onclick = function() {
                document.querySelector(".sidebar-list-item.active").classList.remove("active");
                document.querySelector(".section.active").classList.remove("active");
                sidebars[i].classList.add("active");
                sections[i].classList.add("active");
            };
        }

        // const closeBtn = document.querySelectorAll('.section');
        // console.log(closeBtn[0])
        // for (let i = 0; i < closeBtn.length; i++) {
        //     closeBtn[i].addEventListener('click', (e) => {
        //         sidebar.classList.add("open");
        //     })
        // }

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {

                uploadImg.src = "../img/pizza-1.png";
                modal.classList.add('open');
                titleModal.innerHTML = "CHỈNH SỬA SẢN PHẨM";
            });
        });

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modal.classList.remove('open');
                modalDetail.classList.remove('open');
                modalSignup.classList.remove('open');
            });
        });

        updateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modal.classList.remove('open');
            });
        });

        addButtons.addEventListener('click', function() {
            uploadImg.src = "../img/upload-image.png";
            modal.classList.add('open');
            titleModal.innerHTML = "THÊM MỚI SẢN PHẨM";

        });

        detailButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                modalDetail.classList.add('open');
            });
        });

        editUserButtons.forEach(function(button) {
            button.addEventListener('click', function() {

                updateSignupButton.innerHTML = `<i
                            class="fa-regular fa-floppy-disk"></i> Lưu thay đổi`;
                addUserTitle.innerHTML = "Chinh sửa khách hàng";
                modal.classList.remove('open');
                modalSignup.classList.add('open');
            });
        });

        addUserButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                updateSignupButton.innerHTML = ` <i class="fa-solid fa-user-plus"></i>
                                        Thêm khách hàng `;
                addUserTitle.innerHTML = "Thêm khách hàng mới";
                modal.classList.remove('open');
                modalSignup.classList.add('open');
            });
        });

    });
    </script>

</body>

</html>