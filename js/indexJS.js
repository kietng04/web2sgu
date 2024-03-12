// updateUI();

// document.querySelector('.fa.fa-user').addEventListener('click', function() {
//     document.querySelector('.container').style.display = 'block';
//     document.querySelector('.black-bg').style.display = 'block';
// })

// document.querySelector('.fa.fa-times').addEventListener('click', function() {
//     document.querySelector('.container').style.display = 'none';
//     document.querySelector('.black-bg').style.display = 'none'; 
// })
var currentqueryz = 'SELECT pizza.IDPizza, NamePizza, pizza.Desc, Img, Type, IDSize, IDCrust, Price FROM `pizza`, `pizzadetail` WHERE pizza.IDPizza = pizzadetail.IDPizza AND pizzadetail.IDSize = "S" AND pizzadetail.IDCrust ="V" ';
var currentRowqueryz = 'SELECT COUNT(*) FROM `pizza`, `pizzadetail` WHERE pizza.IDPizza = pizzadetail.IDPizza AND pizzadetail.IDSize = "S" AND pizzadetail.IDCrust ="V" ';
var currentPagez = 1;
const productSection = document.querySelector('.pro-collection');
var html = '';
var listProduct = [];
    // ajax lay toan bo sp
        $.ajax({
            url: './controller/ProductsController.php',
            type: 'post',
            dataType: 'json',
            timeout: 1500,
            data: {
                request: 'getProducts',
                currentquery: currentqueryz,
                currentpage: currentPagez,
            },
            success: function(data) {
                listProduct = data.result;
                var totalPage = data.countrow / perPage;
                showProducts();
                renderPag(totalPage);
            },
            //fail
            error: function() {
                alert("2sad");
            }
        })

    
    // else { 
    //     var currentProduct = getProductFromCurrentPage(currentPage, listProduct);
    //     currentProduct.forEach(function(item) {
    //         html += `
    //                 <div class="product-cart">
    //                     <img src="${item['Img']}" alt="product image" />
    //                     <span>${item['Type']}</span>
    //                     <h4>${item['NamePizza']}</h4>
    //                     <div class="stars">
    //                         <i class="fa-solid fa-star"></i>
    //                         <i class="fa-solid fa-star"></i>
    //                         <i class="fa-solid fa-star"></i>
    //                         <i class="fa-solid fa-star"></i>
    //                         <i class="fa-solid fa-star"></i>
    //                     </div>
    //                     <h4 class="price">${toVND(item['Price'])}</h4>
    //                     <a href="#"><i class="fa-solid fa-cart-shopping buy-icon"></i></a>
    //                 </div>
                    
    //         `
    //     })
    //     productSection.innerHTML = html;
    //     renderPag();
    // }

function renderPag(totalPage) {
    if (totalPage <= 1) totalPage = 0;
    var html = '';
    for (var i = 1; i <= totalPage; i++) {
        html += `<li class="page-item" ><a onclick="ajaxproduct(${i})" class="page-link">${i}</a></li>`
    }
    document.querySelector('.pagnition').innerHTML = html;
}

function toVND(money) {
    let nf = new Intl.NumberFormat('en-US');
    return nf.format(money) +"₫";
}

function ajaxproduct(page) {
    currentPagez = page;
    $.ajax({
        url: './controller/ProductsController.php',
        type: 'post',
        dataType: 'json',
        timeout: 1500,
        data: {
            request: 'changePage',
            currentquery: currentqueryz,
            currentpage: currentPagez,
        },
        success: function(data) {
            listProduct = data;
            showProducts();
        }
    })
}

function toggleActive(clickedBtn, category) {
    // Xóa tất cả các lớp --active từ các nút
    var allButtons = document.querySelectorAll('.btn__topic');
    allButtons.forEach(function(btn) {
        btn.classList.remove('--active');
    });

    // Thêm lớp --active vào nút được nhấn
    clickedBtn.classList.add('--active');

    if (category == 'all') {
        currentqueryz = `SELECT pizza.IDPizza, NamePizza, pizza.Desc, Img, Type, IDSize, IDCrust, Price
        FROM pizza, pizzadetail
        WHERE pizza.IDPizza = pizzadetail.IDPizza 
        AND pizzadetail.IDSize = 'S' 
        AND pizzadetail.IDCrust = 'V' 
        `;
    }
    else {
        currentqueryz = `SELECT pizza.IDPizza, NamePizza, pizza.Desc, Img, Type, IDSize, IDCrust, Price
    FROM pizza, pizzadetail
    WHERE pizza.IDPizza = pizzadetail.IDPizza 
    AND pizzadetail.IDSize = 'S' 
    AND pizzadetail.IDCrust = 'V' 
    AND pizza.Type = '${category}'
    `;
    }
    currentPagez = 1;
    $.ajax({
        url: './controller/ProductsController.php',
        type: 'post',
        dataType: 'json',
        timeout: 1500,
        data: {
            request: 'ajaxcategory',
            currentquery: currentqueryz,
            currentpage: currentPagez,
        },
        success: function(data) {
            listProduct = data.result;
            var totalPage = data.countrow / perPage;
            showProducts();
            renderPag(totalPage);
        },
        //fail
        error: function() {
            alert("2sad");
        }
    })
}

function addEventProducts() {
    var products = document.querySelectorAll('.scproducts__list-item');
    products.forEach(function(product) {
        product.addEventListener('click', function() {
            var id = product.getAttribute('value');
            var popup = document.querySelector('.popup');
            // remove --none
            popup.classList.remove('--none');
            // ajax lay thong tin san pham
            $.ajax({
                url: './controller/ProductsController.php',
                type: 'post',
                dataType: 'json',
                timeout: 1500,
                data: {
                    request: 'getProductByID',
                    id: id,
                },
                success: function(data) {
                    var product = data;
                    var html = `
                    <div class="popup__item">
                <div class="popup__item-img">
                    <img src="${data[0].Img}" alt="">
                </div>
                <div class="popup__iten-content">
                    <h3 class="heading --lv2">
                        ${data[0].NamePizza}
                    </h3>
                    <p class="desc">
                        ${data[0].Desc}q
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
                    `;
                    popup.innerHTML = html;
                    addeventPOPUP();
                }
            })
        })
    })
}

function addeventPOPUP() {
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
    
}