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
</body>

</html>