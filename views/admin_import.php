<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_styles.css">
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
                    <form action="" class="form-search-import">
                        <span class="search-btn"><i class="fa-solid fa-magnifying-glass" onclick="searchProduct()"
                                aria-hidden="true"></i></span>
                        <input id="form-search-import" type="text" class="form-search-input"
                            placeholder="Tìm kiếm theo mã phiếu nhập...">
                    </form>
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
                            <div style="display: flex; gap: 100px;">
                                <div class="insert">
                                    <label for="nhan_vien_nhap">Nhân viên nhập:</label>
                                    <select id="nhan_vien_nhap" name="nhan_vien_nhap">
                                        <option value="">Chọn nhân viên</option>
                                        <option value="1">Nguyễn Văn A</option>
                                        <option value="2">Trần Thị B</option>
                                        <option value="3">Lê Văn C</option>
                                    </select>
                                </div>

                                <div class="insert">
                                    <label for="ngay_nhap_tu_ngay">Từ ngày:</label>
                                    <input type="date" id="ngay_nhap_tu_ngay" name="ngay_nhap_tu_ngay">
                                </div>
                                <div class="insert">
                                    <label for="ngay_nhap_den_ngay">Đến ngày:</label>
                                    <input type="date" id="ngay_nhap_den_ngay" name="ngay_nhap_den_ngay">
                                </div>
                            </div>
                            <div style="display: flex; gap: 80px;">
                                <div class="insert">
                                    <label for="giatu" class="">Giá từ: </label>
                                    <input type="text" class="giatu" style="width: 100px">
                                </div>
                                <div class="insert">
                                    <label for="giaden" class="">Giá đến: </label>
                                    <input type="text" class="giaden" style="width: 100px">
                                </div>
                                <button type="submit" class="btn-control-large timkiemnangcao">Tìm kiếm</button>
                            </div>
                    </div>
                    </form>
                </div>
                <div class="import-detail">
                    <table>
                        <thead>
                            <tr>
                                <td>Mã phiếu nhập</td>
                                <td>Nhân viên nhập</td>
                                <td>Tổng tiền</td>
                                <td>Thời gian</td>
                            </tr>
                        </thead>
                        <tbody class="rowtablePX">
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
            <form action="">
                <label for="search">Tìm kiếm:</label>
                <input type="text" class="search"> <button type="submit">Tìm</button>
                <table>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Số lượng</td>
                    </tr>
                </table>
            </form>
            <form action="">
                <label for="product-name">Mã sản phẩm - Tên sản phẩm</label>
                <input type="text" id="product-name" name="product-name">
                <label for="product-size">Kích thước sản phẩm</label>
                <select id="product-size" name="product-size">
                    <option value="">Chọn kích thước</option>
                    <option value="1">Size S</option>
                    <option value="2">Size M</option>
                    <option value="3">Size L</option>
                </select>
                <label for="product-crust">Đế sản phẩm</label>
                <select id="product-crust" name="product-crust">
                    <option value="">Chọn đế</option>
                    <option value="1">Đế mỏng</option>
                    <option value="2">Đế vừa</option>
                    <option value="3">Đế dày</option>
                </select>
                <label for="product-price">Giá nhập (VNĐ)</label>
                <input type="text" id="product-price" name="product-price">
                <label for="import-method">Phương thức nhập</label>
                <select id="import-method" name="import-method">
                    <option value="">Chọn phương thức</option>
                    <option value="1">Nhập mới</option>
                    <option value="2">Nhập thêm</option>
                </select>
                <label for="product-quantity">Số lượng</label>
                <input type="text" id="product-quantity" name="product-quantity">
                <button type="submit">Thêm</button>

            </form>
            <form action="">
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
                </table>
            </form>

            <form action="">
                <label for="import-id">Mã phiếu nhập:</label>
                <input type="text" id="import-id" name="import-id">
                <label for="import-staff">Nhân viên nhập:</label>
                <input type="text" id="import-staff" name="import-staff">
                <label for="import-date">Ngày nhập:</label>
                <input type="date" id="import-date" name="import-date">
                <button>gửi</button>
            </form>
            
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/notificationEffect.js"></script>
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