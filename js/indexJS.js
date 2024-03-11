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
                // renderPag(totalPage);
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
            listProduct = data.listproduct;
            showProducts();
        }
    })
}