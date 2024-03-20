<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3dff50b2d8.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/reset.css">
    <!-- <link rel="stylesheet" href="../css/variables.css"> -->
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/admin_styles.css">
    <link rel="stylesheet" href="../css/styles.css">


</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo1.png" alt="">
            </div>

            <span class="logo_name">Admin HP3K</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
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
                <li><a href="#">
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
            <div class="overview">
                <div class="title">
                  <i class="fa-solid fa-clock"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box">
                      <i class="fa-solid fa-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box">
                      <i class="fa-solid fa-comment"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box">
                      <i class="fa-solid fa-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <div class="activity">
              <div class="title">
                <i class="fa-solid fa-users"></i>
                  <span class="text">Quản lí người dùng</span>
              </div>
              <div class="activity-data">
                  <div class="data names">
                      <span class="data-title">Name</span>
                      <span class="data-list">Prem Shahi</span>
                      <span class="data-list">Deepa Chand</span>
                      <span class="data-list">Manisha Chand</span>
                      <span class="data-list">Pratima Shahi</span>
                      <span class="data-list">Man Shahi</span>
                      <span class="data-list">Ganesh Chand</span>
                      <span class="data-list">Bikash Chand</span>
                  </div>
                  <div class="data email">
                      <span class="data-title">Email</span>
                      <span class="data-list">premshahi@gmail.com</span>
                      <span class="data-list">deepachand@gmail.com</span>
                      <span class="data-list">prakashhai@gmail.com</span>
                      <span class="data-list">manishachand@gmail.com</span>
                      <span class="data-list">pratimashhai@gmail.com</span>
                      <span class="data-list">manshahi@gmail.com</span>
                      <span class="data-list">ganeshchand@gmail.com</span>
                  </div>
                  <div class="data joined">
                      <span class="data-title">Ngày đăng kí</span>
                      <span class="data-list">2022-02-12</span>
                      <span class="data-list">2022-02-12</span>
                      <span class="data-list">2022-02-13</span>
                      <span class="data-list">2022-02-13</span>
                      <span class="data-list">2022-02-14</span>
                      <span class="data-list">2022-02-14</span>
                      <span class="data-list">2022-02-15</span>
                  </div>
                  <div class="data type">
                      <span class="data-title">Thành viên</span>
                      <span class="data-list">New</span>
                      <span class="data-list">Member</span>
                      <span class="data-list">Member</span>
                      <span class="data-list">New</span>
                      <span class="data-list">Member</span>
                      <span class="data-list">New</span>
                      <span class="data-list">Member</span>
                  </div>
                  <div class="data status">
                      <span class="data-title">Khóa</span>
                      <span class="data-list">Block</span>
                      <span class="data-list">Block</span>
                      <span class="data-list">Unblock</span>
                      <span class="data-list">Block</span>
                      <span class="data-list">Block</span>
                      <span class="data-list">Unblock</span>
                      <span class="data-list">Block</span>
                  </div>
              </div>
          </div>
    <script>
        const body = document.querySelector("body"),
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");


let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
    </script>
</body>
</html>