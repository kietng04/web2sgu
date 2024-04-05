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
                <li><a href="admin_index.php">
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
                <li><a href="views/admin_table.php">
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
            <div class="admin-control">
                <div class="admin-control-left">
                    <select name="the-loai-tk" id="the-loai-tk" onchange="thongKe()">
                        <option>Tất cả</option>
                        <option>Món chay</option>
                        <option>Pizza Bò</option>
                        <option>Món lẩu</option>
                        <option>Món ăn vặt</option>
                        <option>Món tráng miệng</option>
                        <option>Nước uống</option>
                        <option>Món khác</option>
                    </select>
                </div>
                <div class="admin-control-center">
                    <form action="" class="form-search">
                        <span class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input id="form-search-tk" type="text" class="form-search-input"
                            placeholder="Tìm kiếm tên món..." oninput="thongKe()">
                    </form>
                </div>
                <div class="admin-control-right">
                    <form action="" class="fillter-date">
                        <div>
                            <label for="time-start">Từ</label>
                            <input type="date" class="form-control-date" id="time-start-tk" onchange="thongKe()">
                        </div>
                        <div>
                            <label for="time-end">Đến</label>
                            <input type="date" class="form-control-date" id="time-end-tk" onchange="thongKe()">
                        </div>
                    </form>
                    <button class="btn-reset-order" onclick="thongKe(1)"><i
                            class="fa-solid fa-arrow-up-short-wide"></i></button>
                    <button class="btn-reset-order" onclick="thongKe(2)"><i
                            class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <button class="btn-reset-order" onclick="thongKe(0)"><i
                            class="fa-solid fa-rotate-right"></i></button>
                </div>
            </div>
            <div class="order-statistical" id="order-statistical">
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Sản phẩm được bán ra</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-product">5</h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-solid fa-pizza-slice"></i>
                    </div>
                </div>
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Số lượng bán ra</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-order">18</h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                </div>
                <div class="order-statistical-item">
                    <div class="order-statistical-item-content">
                        <p class="order-statistical-item-content-desc">Doanh thu</p>
                        <h4 class="order-statistical-item-content-h" id="quantity-sale">46.000.000đ</h4>
                    </div>
                    <div class="order-statistical-item-icon">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                </div>
            </div>
            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên món</td>
                            <td>Số lượng bán</td>
                            <td>Doanh thu</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="showTk">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Modal them hoa chinh sua san pham -->
    <div class="modal add-product">
        <div class="modal-container">
            <h3 class="modal-container-title edit-product-e">CHỈNH SỬA SẢN PHẨM</h3>
            <button class="modal-close product-form"><i class="fa-solid fa-xmark"></i></i></button>
            <div class="modal-content">
                <form action="" class="add-product-form">
                    <div class="modal-content-left">
                        <img src="../img/pizza-1.png" alt="" class="upload-image-preview">
                        <div class="form-group file">
                            <label for="up-hinh-anh" class="form-label-file"><i
                                    class="fa-solid fa-cloud-arrow-up"></i>Chọn hình ảnh</label>
                            <input accept="image/jpeg, image/png, image/jpg" id="up-hinh-anh" name="up-hinh-anh"
                                type="file" class="form-control" onchange="uploadImage(this)">
                        </div>
                    </div>
                    <div class="modal-content-right">
                        <div class="form-group">
                            <label for="ten-mon" class="form-label">Tên món</label>
                            <input id="ten-mon" name="ten-mon" type="text" placeholder="Nhập tên món"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Chọn món</label>
                            <select name="category" id="chon-mon">
                                <option>Pizza Bò</option>
                                <option>Pizza Gà</option>
                                <option>Pizza Hải Sản</option>
                                <option>Món Phụ</option>
                                <option>Nước uống</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                        <div class="wrapper-form-group">
                            <div class="form-group">
                                <label for="category" class="form-label">Chọn Đế</label>
                                <select name="category" id="chon-de">
                                    <option>Mỏng</option>
                                    <option>Vừa</option>
                                    <option>Dày</option>
                                </select>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="category" class="form-label">Chọn Kích Cỡ</label>
                                <select name="category" id="chon-co">
                                    <option>Nhỏ</option>
                                    <option>Vừa</option>
                                    <option>Lớn</option>
                                </select>
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gia-moi" class="form-label">Giá bán</label>
                            <input id="gia-moi" name="gia-moi" type="text" placeholder="Nhập giá bán"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="so-luong" class="form-label">Số lượng </label>
                            <input id="so-luong" name="so-luong" type="number" placeholder="Nhập số lượng"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="mo-ta" class="form-label">Mô tả</label>
                            <textarea class="product-desc" id="mo-ta" placeholder="Nhập mô tả món ăn..."></textarea>
                            <span class="form-message"></span>
                        </div>
                        <button class="form-submit btn-update-product-form edit-product-e" id="update-product-button">
                            <i class="fa-solid fa-pen"></i>
                            <span>LƯU THAY ĐỔI</span>
                        </button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal chi tiet hoa don  -->
    <div class="modal detail-order">
        <div class="modal-container">
            <h3 class="modal-container-title">CHI TIẾT ĐƠN HÀNG</h3>
            <button class="modal-close"><i class="fa-solid fa-xmark"></i></button>
            <div class="modal-detail-order">
                <div class="modal-detail-left">
                    <div class="order-item-group">
                        <div class="order-product">
                            <div class="order-product-left">
                                <img src="../img/pizza-1.png" alt="">
                                <div class="order-product-info">
                                    <h4>Bánh lava phô mai nướng</h4>
                                    <p class="order-product-note"><i class="fa-regular fa-pen-to-square"></i> Kich co:
                                        Lon; De: Mong
                                    </p>
                                    <p class="order-product-quantity">SL: 14</p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                            <div class="order-product-right">
                                <div class="order-product-price">
                                    <span class="order-product-current-price">180.000&nbsp;₫</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-product">
                            <div class="order-product-left">
                                <img src="../images/pizzaimg/bbq.jpg" alt="">
                                <div class="order-product-info">
                                    <h4>Set lẩu Thái nấm chay</h4>
                                    <p class="order-product-note"><i class="fa-regular fa-pen-to-square"></i> Kich co:
                                        Lon; De: Mong
                                    </p>
                                    <p class="order-product-quantity">SL: 4</p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                            <div class="order-product-right">
                                <div class="order-product-price">
                                    <span class="order-product-current-price">550.000&nbsp;₫</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-product">
                            <div class="order-product-left">
                                <img src="../img/pizza-1.png" alt="">
                                <div class="order-product-info">
                                    <h4>Bánh lava phô mai nướng</h4>
                                    <p class="order-product-note"><i class="fa-regular fa-pen-to-square"></i> Kich co:
                                        Lon; De: Mong
                                    </p>
                                    <p class="order-product-quantity">SL: 14</p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                            <div class="order-product-right">
                                <div class="order-product-price">
                                    <span class="order-product-current-price">180.000&nbsp;₫</span>
                                </div>
                            </div>
                        </div>
                        <div class="order-product">
                            <div class="order-product-left">
                                <img src="../images/pizzaimg/bbq.jpg" alt="">
                                <div class="order-product-info">
                                    <h4>Set lẩu Thái nấm chay</h4>
                                    <p class="order-product-note"><i class="fa-regular fa-pen-to-square"></i> Kich co:
                                        Lon; De: Mong
                                    </p>
                                    <p class="order-product-quantity">SL: 4</p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                            <div class="order-product-right">
                                <div class="order-product-price">
                                    <span class="order-product-current-price">550.000&nbsp;₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-detail-right">
                    <ul class="detail-order-group">
                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-regular fa-calendar"></i> Ngày đặt
                                hàng</span>
                            <span class="detail-order-item-right">05/03/2024</span>
                        </li>

                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-solid fa-person"></i> Người nhận</span>
                            <span class="detail-order-item-right">Pham Van Kiet</span>
                        </li>
                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-solid fa-phone"></i> Số điện thoại</span>
                            <span class="detail-order-item-right">0909090909</span>
                        </li>
                        <li class="detail-order-item tb">
                            <span class="detail-order-item-t"><i class="fa-solid fa-location-dot"></i> Địa chỉ
                                nhận</span>
                            <p class="detail-order-item-b">273 Đ. An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí
                                Minh 700000, Vietnam</p>
                        </li>
                        <li class="detail-order-item tb">
                            <span class="detail-order-item-t"><i class="fa-regular fa-note-sticky"></i> Ghi chú</span>
                            <p class="detail-order-item-b">bhbhjb</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-detail-bottom">
                <div class="modal-detail-bottom-left">
                    <div class="price-total">
                        <span class="thanhtien">Thành tiền</span>
                        <span class="price">4.720.000&nbsp;₫</span>
                    </div>
                </div>
                <div class="modal-detail-bottom-right">
                    <button class="modal-detail-btn btn-daxuly"><i class="fa-solid fa-check"></i> Đã xử lý</button>
                </div>
            </div>

            </form>
        </div>
    </div>


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

        const closeBtn = document.querySelectorAll('.section');
        console.log(closeBtn[0])
        for (let i = 0; i < closeBtn.length; i++) {
            closeBtn[i].addEventListener('click', (e) => {
                sidebar.classList.add("open");
            })
        }

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