var currentqueryz =
  'SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien ="V" ';
var currentRowqueryz =
  'SELECT COUNT(*) FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND pizzadetail.MaSize = "S" AND pizzadetail.MaCrust ="V" ';
var currentPagez = 1;
var perPage = 8;
loadTableProduct();
var listProduct;
function loadTableProduct() {
    $.ajax({
        url: "./controller/ProductManagementController.php",
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'loadTableProduct',
            currentquery: currentqueryz,
            currentpage: currentPagez,
        },
        success: function(data) {
            listProduct = data.result;
            var totalPage = data.countrow / perPage;
            showProductTableAdmin();
            renderPagAdmin(totalPage);
        }
    });
}

function showProductTableAdmin() {
    var html = "";
    listProduct.forEach(function (item) {
       html += `<div class="list">
        <div class="list-left">
           <img src="${item.Img}" alt="">
           <div class="list-info">
               <h4>${item.TenSP}</h4>
               <p class="list-note">${item.Mota}</p>
               <span class="list-category">${item.Loai}</span>
           </div>
        </div>
        <div class="list-right">
               <div class="list-price">
                   <span class="list-current-price">${toVND(item.GiaTien)}</span>
               </div>
               <div class="list-control">
                   <div class="list-tool">
                       <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i></button>
                       <button class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                   </div>
               </div>
          </div>
      </div>`
    })
    document.querySelector("#show-product").innerHTML = html;
  }

function renderPagAdmin(totalPage) {
    if (totalPage < 2) totalPage = 0;
    var html = "";
    for (var i = 1; i <= totalPage; i++) {
      if (i == 1) {
        html += `<li class="page-item --active" onclick="ajaxproduct(${i},this)" ><a  class="page-link">${i}</a></li>`;
      } else {
        html += `<li class="page-item" onclick="ajaxproduct(${i},this)" ><a  class="page-link">${i}</a></li>`;
      }
    }
    document.querySelector(".page-nav-list").innerHTML = html;
}