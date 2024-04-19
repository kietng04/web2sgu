<!DOCTYPE html>
<html lang="en">

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
    <!-- <link rel="stylesheet" href="../css/components.css"> -->
    <link rel="stylesheet" href="css/admin_styles1.css">
    <link rel="stylesheet" href="css/admin_styles.css">
</head>

<body>
<<<<<<< HEAD
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="logo1.png" alt="">
            </div>
            <span class="logo_name">Admin HP3K</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.html">
                        <i class="fa-solid fa-house"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span class="link-name">Quản lí sản phẩm </span>
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span class="link-name">Quản lí đơn hàng</span>
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-users"></i>
                        <span class="link-name">Quản lí người dùng</span>
                    </a></li>
                <li><a href="Import.html">
                        <i class="fa-solid fa-file-import"></i>
                        <span class="link-name">Quản lí nhập hàng</span>
                    </a></li>
                <li><a href="Export.html">
                        <i class="fa-solid fa-file-export"></i>
                        <span class="link-name">Quản lí xuất hàng</span>
                    </a></li>
                <li><a href="#">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                        <span class="link-name">Quản lí doanh thu</span>
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

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="import">
                <div class="title">
                    <i class="fa-solid fa-box"></i>
                    <span class="text"> Nhập hàng </span>
                </div>
                <div class="import-function">
                    <div class="add">
                        <i class="fa-solid fa-plus"></i>
                        <span>Nhập thêm</span>
                    </div>
                    <div class="cancel">
                        <i class="fa-solid fa-ban"></i>
                        <span>Hủy</span>
                    </div>
=======
    <div class="container">
    <aside class="sidebar open">
            <!-- <div class="btnSidebar">
                <i class="fa-solid fa-bars"></i>
            </div> -->
            <div class="top-sidebar">
                <a href="#" class="channel-logo"><img src="img/logo-pizza.png" alt="Channel Logo"></a>
                <div class="hidden-sidebar your-channel"><img src=""
                        style="height: 30px;" alt="">
>>>>>>> 93590a104b7ab110947628991907ecbd7fc8e967
                </div>
            </div>
            <div class="middle-sidebar">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item tab-content active">
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
        <section class="dashboard">
            <div class="dash-content">
                <div class="import">
                    <div class="title">
                        <i class="fa-solid fa-box"></i>
                        <span class="text"> Nhập hàng </span>
                    </div>
                    <div class="import-function">
                        <div class="add">
                            <i class="fa-solid fa-plus"></i>
                            <span>Nhập thêm</span>
                        </div>
                        <div class="cancel">
                            <i class="fa-solid fa-ban"></i>
                            <span>Hủy</span>
                        </div>
                    </div>
                </div>
                <div class="import-container">
                    <div class="import-info">
                        <form>
                            <div class="insert">
                                <label for="nha_cung_cap">Nhà cung cấp:</label>
                                <select id="nha_cung_cap" name="nha_cung_cap">
                                    <option value="">Chọn nhà cung cấp</option>
                                    <option value="1">Công ty A</option>
                                    <option value="2">Công ty B</option>
                                    <option value="3">Công ty C</option>
                                </select>
                            </div>
                            <br>
                            <div class="insert">
                                <label for="nhan_vien_nhap">Nhân viên nhập:</label>
                                <select id="nhan_vien_nhap" name="nhan_vien_nhap">
                                    <option value="">Chọn nhân viên</option>
                                    <option value="1">Nguyễn Văn A</option>
                                    <option value="2">Trần Thị B</option>
                                    <option value="3">Lê Văn C</option>
                                </select>
                            </div>
                            <br>
                            <div class="insert">
                                <label for="ngay_nhap_tu_ngay">Ngày nhập từ ngày:</label>
                                <input type="date" id="ngay_nhap_tu_ngay" name="ngay_nhap_tu_ngay">
                            </div>
                            <br>
                            <div class="insert">
                                <label for="ngay_nhap_den_ngay">Đến ngày:</label>
                                <input type="date" id="ngay_nhap_den_ngay" name="ngay_nhap_den_ngay">
                            </div>
                            <br>
                            <div class="insert">
                                <label for="tong_tien">Tổng tiền: </label>
                                <input type="text" id="tong_tien" name="tong_tien" readonly>
                            </div>
                            <br>
                            <div class="insert-btn">
                                <div class="smtbtn">
                                    <button type="submit">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="import-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã phiếu nhập</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Nhân viên nhập</th>
                                    <th>Thời gian</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ABC123</td>
                                    <td>Công ty A</td>
                                    <td>Nguyễn Văn A</td>
                                    <td>2023-11-14 10:20:00</td>
                                    <td>1.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>DEF456</td>
                                    <td>Công ty B</td>
                                    <td>Trần Thị B</td>
                                    <td>2023-11-15 11:30:00</td>
                                    <td>2.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>GHI789</td>
                                    <td>Công ty C</td>
                                    <td>Lê Văn C</td>
                                    <td>2023-11-16 12:40:00</td>
                                    <td>3.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>JKL101</td>
                                    <td>Công ty D</td>
                                    <td>Nguyễn Thị D</td>
                                    <td>2023-11-17 13:50:00</td>
                                    <td>4.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>MNO234</td>
                                    <td>Công ty E</td>
                                    <td>Trần Văn E</td>
                                    <td>2023-11-18 14:00:00</td>
                                    <td>5.000.000 VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal add-import">
        <div class="modal-container">
            <div class="modal-layout-one">
            <div class="modal-layout-four">
                <div class="modal-layout-third">
                    <form action="" class="form-search">
                                <span class="search-btn"><i class="fa-solid fa-magnifying-glass" onclick="searchProduct()"></i></i></span>
                                <input id="form-search-product" type="text" class="form-search-input"
                                    placeholder="Tìm kiếm tên món..." >
                            </form>
                        <table>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn-control-large">Thêm</button>
                    </form>
                </div>
                <div class="modal-layout-third grid">
                    <div class="vertical item-1">
                        <span>Mã sản phẩm - Tên sản phẩm</span>
                        <input type="text" id="product-name" class="input" placeholder="Chọn sản phẩm">

                    </div>
                    <div class="vertical item-2">
                        <label for="product-size">Kích thước sản phẩm</label>
                        <select id="product-size" name="product-size">
                            <option value="">Chọn kích thước</option>
                            <option value="1">Size S</option>
                            <option value="2">Size M</option>
                            <option value="3">Size L</option>
                        </select>
                    </div>  
                    <div class="vertical item-3">
                        <label for="product-crust">Đế sản phẩm</label>
                        <select id="product-crust" name="product-crust">
                            <option value="">Chọn đế</option>
                            <option value="1">Đế mỏng</option>
                            <option value="2">Đế vừa</option>
                            <option value="3">Đế dày</option>
                        </select>
                    </div>
                    <div class="vertical item-4">
                        <label for="product-price">Giá nhập (VNĐ)</label>
                        <input type="text" id="product-price" class="input" placeholder="Nhập giá nhập">
                    </div>
                    <div class="vertical item-5">
                        <label for="product-quantity">Số lượng</label>
                        <input type="text" id="product-quantity" class="input" placeholder="Nhập số lượng">
                    </div>

                    <button type="submit" class="btn-control-large item-2">Sửa</button>
                    <button type="submit" class="btn-control-large item-3">Xoá</button>
                </div>
            </div>
            <div class="modal-layout-four">
                    <table>
                        <tr>
                            <td>STT</td>
                            <td>Mã sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Kích thước</td>
                            <td>Đế</td>
                            <td>Loại</td>
                            <td>Đơn giá</td>
                            <td>Số lượng</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </table>
            </div>
        </div>
            <div class="modal-layout-two">
                <form action="">
                    <div class="vertical">
                        <span>Mã phiếu nhập:</span>
                        <input type="text" id="import-id" class="input" placeholder="Nhập mã phiếu nhập">
                    </div>
                    <div class="vertical">
                        <span>Nhân viên nhập:</span>
                        <input type="text" id="import-staff" class="input" placeholder="Nhập tên nhân viên">
                    </div>
                    <div class="vertical">
                        <span>Ngày nhập:</span>
                        <input type="date" id="import-date" class="input" placeholder="Nhập ngày nhập">
                    </div>

                    <button type="submit" class="btn-control-large">Thêm</button>
                </form>
            </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/helper.js"></script>
    <script src="js/importproduct.js"></script>
    <script>
        var addButtons = document.querySelectorAll('.add');
        var modal = document.querySelector('.modal.add-import');

        addButtons.forEach(function (addButton) {
            addButton.addEventListener('click', function () {
                modal.classList.add('open');
            });
        });
    </script>
</body>


</html>