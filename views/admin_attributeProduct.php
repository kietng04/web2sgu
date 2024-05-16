<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3dff50b2d8.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/variables.css">
    <!-- <link rel="stylesheet" href="css/components.css"> -->
    <link rel="stylesheet" href="css/admin_styles1.css">
    <!-- <link rel="stylesheet" href="css/loader.css"> -->
</head>     

<body>
<div class="loader"></div>
<script src="js/loader.js"></script>
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
                    <li class="sidebar-list-item tab-content ">
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
                    <li class="sidebar-list-item tab-content">
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
            <!-- Atribute Product  -->
            <div class="section active">
                <div class="admin-control">
                    <div class="admin-control-left">
                        <select name="chonthuoctinh" id="chonthuoctinh" onchange="showThuocTinh()">
                            <option class="optionthem" value="0">Tất cả</option>
                            <option class="optionthem"value="1">Kích thước</option>
                            <option class="optionthem" value="2">Viền </option>
                            <option class="optionthem" value="3">Loại</option>
                        </select>
                    </div>
                    <div class="admin-control-center">
                        <form action="" class="form-search">
                            <span class="search-btn"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></span>
                            <input id="form-search-user" type="text" class="form-search-input" placeholder="Tìm kiếm khách hàng..." oninput="showThuocTinh()">
                        </form>
                    </div>
                    <div class="admin-control-right">
                    
                        <button class="btn-reset-order" onclick="cancelSearchUser()"><i class="fa-solid fa-rotate-right" aria-hidden="true"></i></button>
                        <button id="btn-add-attribute" class="btn-control-large" ><i class="fa-light fa-plus" aria-hidden="true"></i> <span>Thêm mới</span></button>
                    </div>
                </div>
                <div class="table --size">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã size</td>
                                <td>Tên size</td>
                                <td>Định lượng size</td>

                                <!-- <td>Liên hệ</td>
                                <td>Email</td>
                                <td>Dia chi</td>
                                <td>Ngày tham gia</td>
                                <td>Tình trạng</td>
                                <td></td> -->
                            </tr>
                        </thead>
                        <tbody id="show-size">
                            <tr>
                                <td>XXL</td>
                                <td>Cực Lớn Maximun</td>
                                <td>Cực Lớn Maximun</td>
                                
                
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>Rất Lớn </td>
                                <td>Cực Lớn Maximun</td>

                     
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>Vừa Lớn</td>
                                <td>Cực Lớn Maximun</td>

                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table --vien">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã viền</td>
                                <td>Tên viền</td>
                                <td>Định lượng viền</td>
                                <!-- <td>Liên hệ</td>
                                <td>Email</td>
                                <td>Dia chi</td>
                                <td>Ngày tham gia</td>
                                <td>Tình trạng</td>
                                <td></td> -->
                            </tr>
                        </thead>
                        <tbody id="show-vien">
                            <tr>
                                <td>DXXL</td>
                                <td>Đế Cực Lớn Maximun</td>
                                <td>Đế Cực Lớn Maximun</td>
                
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>DXL</td>
                                <td>Đế Rất Lớn </td>
                                <td>Đế Cực Lớn Maximun</td>
                     
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>DX</td>
                                <td>Đế Vừa Lớn</td>
                                <td>Đế Cực Lớn Maximun</td>
                                <td class="control control-table">
                                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table --loai">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Mã loại</td>
                                <td>Tên loại</td>                                <!-- <td>Liên hệ</td>
                                <td>Email</td>
                                <td>Dia chi</td>
                                <td>Ngày tham gia</td>
                                <td>Tình trạng</td>
                                <td></td> -->
                            </tr>
                        </thead>
                        <tbody id="show-loai">
                            <tr>
                                <td>1</td>
                                <td>Gà</td>
                
                                <td class="control control-table">
                                    <button class="btn-edit" id="btn-sua-loai"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="btn-xoa-loai"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bò</td>
                     
                                <td class="control control-table">
                                    <button class="btn-edit" id="btn-sua-loai"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="btn-xoa-loai"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Heo</td>
                                <td class="control control-table">
                                    <button class="btn-edit" id="btn-sua-loai"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                                    <button class="btn-delete" id="btn-xoa-loai"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- </div> -->
            </div>

        </main>
    </div>

    <!-- Modal them hoac chinh sua san pham -->
    <div class="modal add-product">
        <div class="modal-container">
            <h3 class="modal-container-title edit-product-e">CHỈNH SỬA SẢN PHẨM</h3>
            <button class="modal-close product-form"><i class="fa-solid fa-xmark"></i></i></button>
            <div class="modal-content">
                <form action="" class="add-product-form" onsubmit="event.preventDefault();">
                    <div class="modal-content-left">
                        <img src="img/pizza-1.png" alt="" class="upload-image-preview">
                        <div class="form-group file">
                            <label for="up-hinh-anh" class="form-label-file"><i
                                    class="fa-solid fa-cloud-arrow-up"></i>Chọn hình ảnh</label>
                            <input accept="image/jpeg, image/png, image/jpg" id="up-hinh-anh" name="up-hinh-anh"
                                type="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-content-right">
                        <div class="form-group">
                            <label class="form-label">Mã sản phẩm</label>
                            <input id="masanpham" name="ten-mon" type="text" placeholder="Nhập mã sản phẩm"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="ten-mon" class="form-label">Tên món</label>
                            <input id="ten-mon" name="ten-mon" type="text" placeholder="Nhập tên món"
                                class="form-control">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Chọn món</label>
                            <select name="category" id="chon-loai">
                                <option>Chọn loại</option>
                                <option>BÒ</option>
                                <option>HẢI SẢN</option>
                                <option>Món Phụ</option>
                                <option>Nước uống</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="attribute" class="form-label">Chọn thuộc tính</label>
                            <select name="attribute" id="chon-tt">
                                
                            </select>
                            <label class="form-label">Giá nhập</label>
                            <input id="gia-nhap" name="gia-nhap" type="text" placeholder="Nhập giá nhập"
                                class="form-control">
                            <label class="form-label">Giá bán</label>
                            <input id="gia-ban" name="gia-ban" type="text" placeholder="Nhập giá bán"
                                class="form-control">
                            <button class="themthuoctinh">Thêm thuộc tính</button>
                            <span class="form-message"></span>
                        </div>
                        <div class="wrapper-form-group">
                            
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Size</td>
                                    <td>Đế</td>
                                    <td>Giá nhập</td>
                                    <td>Giá bán</td>
                                </tr>
                            </thead>
                            <tbody class="rowTable">
                            </tobdy>
                        </table>
                        <div class="form-group">
                            <label for="mo-ta" class="form-label">Mô tả</label>
                            <textarea class="product-desc" id="mo-ta" placeholder="Nhập mô tả món ăn..."></textarea>
                            <span class="form-message"></span>
                        </div>
                        <button class="form-submit btn-update-product-form edit-product-e" id="add-product-button">
                            <i class="fa-solid fa-pen"></i>
                            <span>THÊM SẢN PHẨM</span>
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
        <div class="modal-container">
            <h3 class="modal-container-title add-account-e" style="font-weight: 600; font-size:20px">THÊM THUỘC TÍNH MỚI
            </h3>
            <!-- <h3 class="modal-container-title edit-account-e" style="font-weight: 600; font-size:20px">CHỈNH SỬA THÔNG
                TIN</h3> -->
            <button class="modal-close"><i class="fa-solid fa-xmark"></i></button>
            <div class="form-content sign-up">
            <select name="themthuoctinh" id="themthuoctinh" onchange="showThemThuocTinh()"  style="margin-left: 0px; width: 360px; margin-top: 10px;">
                <option value="0" selected>Kích thước</option>
                <option value="1">Viền </option>
                <option value="2">Loại</option>
            </select>
                <form action="" class="size-form">
                    <div class="form-group">
                        <label for="masize" class="form-label">Nhập mã size:</label>
                        <input id="masize" name="masize" type="text" placeholder="VD: S"
                            class="form-control">
                        <span class="form-message-name form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="tensize" class="form-label">Nhập tên size:</label>
                        <input id="tensize" name="tensize" type="text" placeholder="VD: Nhỏ" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="dinhluongsize" class="form-label">Nhập định lượng size:</label>
                        <input id="dinhluongsize" name="dinhluongsize" type="text" placeholder="VD: Bán kính 15cm" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
              
                    <!-- <button class="form-submit add-account-e" id="signup-button">Đăng ký</button> -->
                    <button class="form-submit edit-account-e" id="btnThemSize"><i
                            class="fa-regular fa-floppy-disk" ></i> Thêm size</button>
                            <button class="form-submit edit-account-e" id="btnSuaSize"><i
                            class="fa-regular fa-floppy-disk" ></i> Sửa size</button>
                </form>
                <form action="" class="de-form" style="display:none">
                    <div class="form-group">
                        <label for="mavien" class="form-label">Nhập mã viền:</label>
                        <input id="mavien" name="mavien" type="text" placeholder="VD: M"
                            class="form-control">
                        <span class="form-message-name form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="tenvien" class="form-label">Nhập tên viền:</label>
                        <input id="tenvien" name="tenvien" type="text" placeholder="VD: Mỏng" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="dinhluongvien" class="form-label">Nhập định lượng viền:</label>
                        <input id="dinhluongvien" name="dinhluongvien" type="text" placeholder="VD: Độ dày 0.3cm" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
              
                    <!-- <button class="form-submit add-account-e" id="signup-button">Đăng ký</button> -->
                    <button class="form-submit edit-account-e" id="btnThemVien"><i
                            class="fa-regular fa-floppy-disk"></i> Thêm viền</button>
                            <button class="form-submit edit-account-e" id="btnSuaVien"><i
                            class="fa-regular fa-floppy-disk" ></i> Sửa Viền</button>
                </form>
                <form action="" class="loai-form" style="display:none">
                    <div class="form-group">
                        <label for="maloai" class="form-label">Mã loại:</label>
                        <input id="maloai" name="maloai" type="text" placeholder="VD: 10"
                            class="form-control">
                        <span class="form-message-name form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="tenloai" class="form-label">Nhập tên loại:</label>
                        <input id="tenloai" name="tenloai" type="text" placeholder="VD: HẢI SẢN" class="form-control">
                        <span class="form-message-email form-message"></span>
                    </div>
              
                    <!-- <button class="form-submit add-account-e" id="signup-button">Đăng ký</button> -->
                    <button class="form-submit edit-account-e" id="btnThemLoai"><i
                            class="fa-regular fa-floppy-disk"></i> Thêm loại</button>
                            <button class="form-submit edit-account-e" id="btnSuaLoai" style="display:none"><i
                            class="fa-regular fa-floppy-disk" ></i> Sửa loại</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="js/helper.js"></script>
    <script src="js/adminproduct.js"></script> -->
    <script src="js/adminAttribute.js"></script>
    
    <script>
        function showThuocTinh() {
  var tableSize = document.querySelector(".table.--size");
  var tableDe = document.querySelector(".table.--vien");
  var tableLoai = document.querySelector(".table.--loai");
  var selectElement = document.getElementById("chonthuoctinh");
  console.log(tableSize);
  console.log(tableDe);

  switch (selectElement.value) {
    case "0": // Tất cả
      tableSize.style.display = "block";
      tableDe.style.display = "block";
        tableLoai.style.display = "block";
      break;
    case "1": // Kích thước
      tableSize.style.display = "block";
      tableDe.style.display = "none";
        tableLoai.style.display = "none";
      break;
    case "2": // Đế
      tableSize.style.display = "none";
      tableDe.style.display = "block";
        tableLoai.style.display = "none";
      break;
      case "3": // Loại
        tableSize.style.display = "none";
        tableDe.style.display = "none";
        tableLoai.style.display = "block";
      
   
  }
}

// V.Kiet: Add event for button add attribute


var btnClose = document.querySelectorAll(".modal-close");
btnClose.forEach(function (btn) {
  btn.addEventListener("click", function () {
    var modal = this.closest(".modal");
    modal.classList.remove("open");
  });
});





// var btnInsert = document.getElementById("btn-insert");
// btnInsert.addEventListener("click", function (e) {
//   e.preventDefault();
//   alert("Thêm thành công");
//   insertAttributeProduct();
  
// });

// function insertAttributeProduct() {
//   var masize = document.getElementById("masize").value;
//   var tensize = document.getElementById("tensize").value;
//   var dinhluongsize = document.getElementById("dinhluongsize").value;

//   var sizeSanPham = {
//     masize: masize,
//     tensize: tensize,
//     dinhluongsize: dinhluongsize,
//   };
//   //ajax
//   $.ajax({
//     url: "./controller/ThuocTinhSanPhamController.php",
//     type: "POST",
//     dataType: "json",
//     data: {
//       request: "insertAttributeProduct",
//       sizeSanPham: JSON.stringify(sizeSanPham),
//     },
//     success: function (data) {
//       console.log(data);
//       loadCombinationSizeAndCrust();
//     },
//   });

   


       
    </script>

</body>

</html>
