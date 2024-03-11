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


</head>

<body>
    <div class="wrapper">
        <ul class="notifications"></ul>

        <div class="wrapper__left">

            <header class="header">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="./img/logo-pizza.png" alt="logo">
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

            <div class="topic">
                <div class="btn__topic --active" onclick="toggleActive(this)">
                    <span>SIEU DEAL</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>MY BOX</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>GHIỀN BO</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>GHIỀN GÀ</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>PIZZA</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>MÓN KHAI VỊ</span>
                </div>
                <div class="btn__topic" onclick="toggleActive(this)">
                    <span>THỨC UỐNG</span>
                </div>
            </div>

            <main class="main">
                <div class="scproducts">
                    <div class="a">
                        <div class="scproducts__list">
                            <div class="scproducts__list-item">
                                <div class="top">
                                    <div class="img">
                                        <img src="img/Pizga_Pho_Mai_400x275.jpg" alt="">
                                    </div>
                                    <p class="title">Pizza Phô Mai</p>
                                </div>
                                <div class="content">
                                    <p class="desc">Thưởng thức vị gà Karaage chiên giòn cắt lát trên nền pizza đậm vị,
                                        cùng nấm tươi, hành tây hoà quyện xốt phô mai</p>
                                    <button class="btn__buy">
                                        <p class="chon">CHỌN</p>
                                        <p class="price">119,000 ₫</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div class="wrapper__right">
            <div class="top">
                <p class="heading">-- Giỏ Hàng --</p>
            </div>


            <div class="list">
                <div class="list__item">
                    <div class="img">
                        <img src="img/pizza-1.png" alt="">
                    </div>
                    <div class="content">
                        <p class="title">CÁNH GÀ NƯỚNG BBQ (4 MIẾNG)</p>
                        <p class="desc">Size Nho, De Mong</p>
                        <p class="price">79,000₫</p>
                    </div>
                    <div class="quantity">
                        <p>SL: 1</p>
                    </div>
                </div>
                <div class="list__item">
                    <div class="img">
                        <img src="img/Pizga_Pho_Mai_400x275.jpg" alt="">
                    </div>
                    <div class="content">
                        <p class="title">CÁNH GÀ NƯỚNG BBQ (4 MIẾNG)</p>
                        <p class="desc">Size Nho, De Mong</p>
                        <p class="price">79,000₫</p>
                    </div>
                    <div class="quantity">
                        <p>SL: 1</p>
                    </div>
                </div>
                <div class="list__item">
                    <div class="img">
                        <img src="img/Pizga_Pho_Mai_400x275.jpg" alt="">
                    </div>
                    <div class="content">
                        <p class="title">CÁNH GÀ NƯỚNG BBQ (4 MIẾNG)</p>
                        <p class="desc">Size Nho, De Mong</p>
                        <p class="price">79,000₫</p>
                    </div>
                    <div class="quantity">
                        <p>SL: 1</p>
                    </div>
                </div>
            </div>


            <div class="payment">
                <div class="payment__info">
                    <div class="payment__info-left">
                        <p>Tổng: </p>
                        <p>Giảm K.mại: </p>
                        <p>Phí Giao Hàng.: </p>
                    </div>
                    <div class="payment__info-rigt">
                        <p>0 ₫</p>
                        <p>0 ₫</p>
                        <p>0 ₫</p>
                    </div>
                </div>
                <div class="payment__btn">
                    <button class="btn">
                        <p class="text">THANH TOÁN</p>
                        <p class="price">269,000 ₫</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="popup --none">
            <div class="popup__item">
                <div class="popup__item-img">
                    <img src="img/pizza-1.png" alt="">
                </div>
                <div class="popup__iten-content">
                    <h3 class="heading --lv2">
                        Pizza Cá Ngừ
                    </h3>
                    <p class="desc">
                        Mang Hương Vị Biển Cả Nhẹ Nhàng Với Cá Ngừ, Thanh Cua, HàNh Tây, Thơm
                    </p>
                    <div class="box">
                        <div class="box__item --none">
                            <p class="title">Kích thước </p>
                        </div>
                        <div class="box__item --kt">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Nhỏ</p>
                            <p class="price">129.000 ₫</p>
                        </div>
                        <div class="box__item --kt">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Vừa</p>
                            <p class="price">229.000 ₫</p>
                        </div>
                        <div class="box__item --kt">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Lớn</p>
                            <p class="price">329.000 ₫</p>
                        </div>

                    </div>
                    <div class="box">
                        <div class="box__item --none">
                            <p class="title">Loại đế</p>
                        </div>
                        <div class="box__item --de ">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Mỏng</p>
                            <p class="price">+0 ₫</p>
                        </div>
                        <div class="box__item --de">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Vừa</p>
                            <p class="price">+29.000 ₫</p>
                        </div>
                        <div class="box__item --de">
                            <div class="icon ">
                                <img src="./img/checkbox.jpeg" alt="">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="circle"></div>
                            </div>
                            <p>Dày</p>
                            <p class="price">+59.000 ₫</p>
                        </div>
                    </div>
                    <div class="btn --add">
                        <p>Thêm vào giỏ hàng </p>
                        <p>129.000 ₫</p>
                    </div>
                </div>
                <div class="btnClose">
                    <img src="img/close-icon.png" alt="">
                </div>
            </div>


        </div>



    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/helper.js"></script>
    <script src="js/indexJS.js"></script>
    <script>
    function toggleActive(clickedBtn) {
        // Xóa tất cả các lớp --active từ các nút
        var allButtons = document.querySelectorAll('.btn__topic');
        allButtons.forEach(function(btn) {
            btn.classList.remove('--active');
        });

        // Thêm lớp --active vào nút được nhấn
        clickedBtn.classList.add('--active');
    }

    document.addEventListener("DOMContentLoaded", function() {

        var popup = document.querySelector(".popup");
        var btnBuy = document.querySelectorAll(".scproducts__list-item .top");
        var btnBuy = document.querySelectorAll(".scproducts__list-item .top");
        var btnClose = document.querySelector(".btnClose");

        btnClose.addEventListener("click", function() {
            popup.classList.add("--none");
        });


        btnBuy.forEach(function(btn) {
            btn.addEventListener("click", function() {
                popup.classList.remove("--none");
            });
        });


        popup.addEventListener("click", function(event) {
            if (event.target === popup) {
                if (popup.classList.contains("--none")) {
                    popup.classList.remove("--none");
                } else {
                    popup.classList.add("--none");
                }
            }
        });

        //ĐẾ KÍCH THƯỚC
        var boxItemsKT = document.querySelectorAll(".box__item.--kt");
        var boxItemsDE = document.querySelectorAll(".box__item.--de");
        boxItemsKT.forEach(function(item) {
            item.addEventListener("click", function() {
                removeActiveBoxKT();
                item.classList.add("--active");
            });
        });

        function removeActiveBoxKT() {
            boxItemsKT.forEach(function(item) {
                item.classList.remove("--active");
            });
        }

        boxItemsDE.forEach(function(item) {
            item.addEventListener("click", function() {
                removeActiveBoxDE();
                item.classList.add("--active");
            });
        });

        function removeActiveBoxDE() {
            boxItemsDE.forEach(function(item) {
                item.classList.remove("--active");
            });
        }

        var btnAdd = document.querySelector(".popup .btn.--add");

        btnAdd.addEventListener("click", function() {
            popup.classList.add("--none");
        });

    });
    </script>

</body>

</html>