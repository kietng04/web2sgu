<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="https://kit.fontawesome.com/3dff50b2d8.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/variables.css">
    <!-- <link rel="stylesheet" href="css/components.css"> -->
    <link rel="stylesheet" href="css/admin_styles1.css">
</head>

<body>

    <div class="container">
    <aside class="sidebar open">
            <!-- <div class="btnSidebar">
                <i class="fa-solid fa-bars"></i>
            </div> -->
            <div class="top-sidebar">
                <a href="#" class="channel-logo"><img src="img/logo-pizza.png" alt="Channel Logo"></a>
                <div class="hidden-sidebar your-channel"><img src=""
                        style="height: 30px;" alt="">
                </div>
            </div>
            <div class="middle-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item tab-content ">
                        <a href="index.php?controller=AdminIndexController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-house"></i></div>
                            <div class="hidden-sidebar">Trang tổng quan</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=ProductManagementController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-pizza-slice"></i></i></div>
                            <div class="hidden-sidebar">Sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=ProductAttributeController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-chart-simple"></i></div>
                            <div class="hidden-sidebar">Thuộc tính sản phẩm</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content active">
                        <a href="index.php?controller=AccountManagementController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-users"></i></i></div>
                            <div class="hidden-sidebar">Tài khoản</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=BillManagementController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-box-open"></i></div>
                            <div class="hidden-sidebar">Đơn hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=ImportController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-file-import"></i></div>
                            <div class="hidden-sidebar">Nhập hàng</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=AdminStatisticController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-chart-simple"></i></div>
                            <div class="hidden-sidebar">Thống kê</div>
                        </a>
                    </li>
                    
                    <li class="sidebar-list-item tab-content">
                        <a href="index.php?controller=PermissionController&action=index" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-couch"></i></i></div>
                            <div class="hidden-sidebar">Phân quyền</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item user-logout">
                        <a href="/" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-solid fa-angles-left"></i></div>
                            <div class="hidden-sidebar">Trang chủ</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item user-logout">
                        <a href="#" class="sidebar-link">
                            <div class="sidebar-icon"><i class="fa-regular fa-user"></i></i></div>
                            <div class="hidden-sidebar" id="name-acc">Pham Van Kiet</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item user-logout">
                        <a href="#" class="sidebar-link" id="logout-acc">
                            <div class="sidebar-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></i></div>
                            <div class="hidden-sidebar">Đăng xuất</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="content">
            <!-- Account  -->
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="tinh-trang-user" id="tinh-trang-user" onchange="showUser()">
                            <option value="2">Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Bị khóa</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input"
                                placeholder="Tìm kiếm khách hàng..." >
                        </form>
                    </div>
                    <div class="admin-control-right">
                        <!-- <form action="" class="fillter-date">
                            <div>
                                <label for="time-start">Từ</label>
                                <input type="date" class="form-control-date" id="time-start-user" onchange="showUser()">
                            </div>
                            <div>
                                <label for="time-end">Đến</label>
                                <input type="date" class="form-control-date" id="time-end-user" onchange="showUser()">
                            </div>.
                        </form>-->
                        <button class="btn-reset-order" onclick="loadUser()"><i
                                class="fa-solid fa-rotate-right"></i></button> 
                        <button id="btn-add-user" class="btn-control-large"><i
                                class="fa-light fa-plus"></i> <span>Thêm khách hàng</span></button>
                    </div>
                </div>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Họ và tên</td>
                                <td>Liên hệ</td>
                                <td>Email</td>
                                <td>Địa Chỉ</td>
                                <td>Trạng Thái</td>
                                <td>Hoạt Động</td>
                            </tr>
                        </thead>
                        <tbody id="show-user">
                            <tr>
                                <td>1</td>
                                <td>Pham Van Kiet</td>
                                <td>0976204878</td>
                                <td>kiet@gmail.com</td>
                                <td>273 Đ. An Dương Vương, Phường 3, Quận 5</td>
                                <td>27/03/2024</td>
                                <td><span class="status-complete">Hoạt động</span></td>
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="btn-delete" id="delete-account"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pham Van Kiet</td>
                                <td>0976204878</td>
                                <td>kiet@gmail.com</td>
                                <td>273 Đ. An Dương Vương, Phường 3, Quận 5</td>
                                <td>27/03/2024</td>
                                <td><span class="status-complete">Hoạt động</span></td>
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="btn-delete" id="delete-account"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pham Van Kiet</td>
                                <td>0976204878</td>
                                <td>kiet@gmail.com</td>
                                <td>273 Đ. An Dương Vương, Phường 3, Quận 5</td>
                                <td>27/03/2024</td>
                                <td><span class="status-complete">Hoạt động</span></td>
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i
                                            class="fa-regular fa-pen-to-square"></i></button>
                                    <button class="btn-delete" id="delete-account"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- </div> -->
            </div>
        </main>
    </div>

    <!-- Modal them hoa chinh sua san pham -->
    <div class="modal add-product" style="display: flex; flex-direction: column;">
        <div class="modal-container" style="overflow-y:auto; width:fit-content;">
            <h3 class="modal-container-title edit-product-e" style="display: flex; justify-content: center; font-weight: bold; font-size: 20px;">CHỈNH SỬA TÀI KHOẢN</h3>
            <button class="modal-close product-form" id="edit_close_btn"><i class="fa-solid fa-xmark"></i></i></button>
            <div class="modal-content">
                <form action="" class="add-product-form">
                    <!-- <div class="modal-content-left">
                        <img src="img/pizza-1.png" alt="" class="upload-image-preview">
                        <div class="form-group file">
                            <label for="up-hinh-anh" class="form-label-file"><i
                                    class="fa-solid fa-cloud-arrow-up"></i>Chọn hình ảnh</label>
                            <input accept="image/jpeg, image/png, image/jpg" id="up-hinh-anh" name="up-hinh-anh"
                                type="file" class="form-control" onchange="uploadImage(this)">
                        </div>
                    </div> -->
                    <div class="modal-content-right" style="width:100%;">
                        <div class="form-group">
                            <label for="ten-mon" class="form-label">TÊN TÀI KHOẢN</label>
                            <input id="ten-mon" name="ten-mon" type="text" placeholder=""
                                class="form-control">
                            <span class="form-message form-message-name-edit"></span>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Chọn quyền</label>

                            <select name="category" class="chon_quyen_edit" id="chon-mon" style="width:400px;">
                                

                            </select>
                            <span class="form-message form-message-edit"></span>
                        </div>
                        
                        <div class="form-group">
                            <span id="ma_tai_khoan"></span>
                        </div>
                        <div class="form-group">
                            <label for="gia-moi" class="form-label">Liên Hệ: </label>
                            <input id="gia-moi" name="gia-moi" type="text" placeholder=""
                                class="form-control" style="width:100%;">
                            <span class="form-message form-message-phone-edit"></span>
                        </div>
                        <div class="form-group">
                            <label for="so-luong" class="form-label">Email </label>
                            <input id="so-luong" name="so-luong" type="text" placeholder=""
                                class="form-control" style="width:100%;">
                            <span class="form-message form-message-email-edit"></span>
                        </div>
                        <div class="form-group">
                            <label for="mo-ta" class="form-label">Địa chỉ</label>
                            <textarea class="product-desc" id="mo-ta" placeholder="" style="width:100%;"></textarea>
                            <span class="form-message form-message-address-edit"></span>
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
                                <img src="img/pizza-1.png" alt="">
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
                                <img src="images/pizzaimg/bbq.jpg" alt="">
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
                                <img src="img/pizza-1.png" alt="">
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
                                <img src="images/pizzaimg/bbq.jpg" alt="">
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
        <div class="modal-container" style="overflow-y:auto;width:700px;">
            <h3 class="modal-container-title add-account-e" style="font-weight: 600; font-size:20px">THÊM KHÁCH HÀNG MỚI
            </h3>
            <!-- <h3 class="modal-container-title edit-account-e" style="font-weight: 600; font-size:20px">CHỈNH SỬA THÔNG
                TIN</h3> -->
            <button class="modal-close" id="close_addform"><i class="fa-solid fa-xmark"></i></button>
            <div class="form-content sign-up">
                
                <form action="" class="signup-form">
                <div style="display:flex;gap:20px;">
                <div class="left_addAccount">
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
                        <span class="form-message-address form-message"></span>
                    </div>
                    </div>
                    <div class="right-addAccount">
    
                    <div class="form-group">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input id="username" name="username" type="text" placeholder="Nhập tên đăng nhập"
                            class="form-control">
                        <span class="form-message-username form-message"></span>
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
                    <div style="display:flex; justify-content: center;">
                        <select name="chonquyen" id="chonquyen">
                                <option value="0">Nhan vien</option>
                                <option value="1">Khach hang</option>
                            </select>
                        <select name="phanquyen" id="phanquyen" style="margin-bottom:10px;display:block;">
                            
                        </select>
                    </div>
                    </div>
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
        var addUserTitle = document.querySelector('.add-account-e');
        var addSignupButton = document.querySelector('#signup-button');
        var updateSignupButton = document.querySelector('#btn-update-account');

        var statusUser = document.querySelectorAll('.form-group edit-account-e');
        var addUser = document.querySelector('#btn-add-user');
        addUser.addEventListener('click', function() {      
            modalSignup.classList.add('open');
            addUserTitle.innerHTML = "Thêm khách hàng mới";
            updateSignupButton.innerHTML = `<i
                            class="fa-regular fa-floppy-disk"></i> Lưu thông tin`;
        });
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
        //         sidebars.classList.add("open");
        //     })
        // }

       

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {

                uploadImg.src = "img/pizza-1.png";
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

        // updateButtons.forEach(function(button) {
        //     button.addEventListener('click', function() {
        //         modal.classList.remove('open');
        //     });
        // });

        // addButtons.addEventListener('click', function() {
        //     uploadImg.src = "img/upload-image.png";
        //     modal.classList.add('open');
        //     titleModal.innerHTML = "THÊM MỚI SẢN PHẨM";

        // });

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

       

    }); 
    document.getElementById('btn-add-user').addEventListener('click', function() {
        var modal = document.querySelector('.modal.signup');
        modal.classList.add('open');
                ;
                    
            });

        var btnClose = document.querySelectorAll('.modal-close');
            btnClose.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var modal = this.closest('.modal');
                    modal.classList.remove('open');
                });
            });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/adminAccount.js"></script>
</body>

</html>