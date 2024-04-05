var currentqueryz =
  'SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien ="V" ';
var currentRowqueryz =
  'SELECT COUNT(*) FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND pizzadetail.MaSize = "S" AND pizzadetail.MaCrust ="V" ';
var currentPagez = 1;
var perPage = 8;
loadTableProduct();
addeventinputthemsp();
// addeventthemsp();

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

function addeventinputthemsp() {
    var input = document.getElementById("up-hinh-anh");
    alert("ad");
    input.addEventListener('change', function(e) {
        var reader = new FileReader();

        reader.onload = function(event) {
            document.querySelector('.modal-content-left img').src = event.target.result;
        }

        reader.readAsDataURL(e.target.files[0]);

        // Create a FormData object
        var formData = new FormData();
        // Add the file to the FormData object
        formData.append('file', e.target.files[0]);

        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/FileUploadController.php', true);

        // Send the FormData object with the AJAX request
        xhr.send(formData);
    });
}

function addeventthemsp() {
    var btn = document.getElementById("update-product-button");
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        // ajax tai hinh vao thu muc
        var formData = new FormData();
        var files = document.getElementById('up-hinh-anh').files;
        formData.append('file', files[0]);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/FileUploadController.php', true);
        xhr.send(formData);
        // lay ten hinh
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var img = xhr.responseText;
                // lay thong tin san pham
                var tensp = document.getElementById("up-ten-san-pham").value;
                var mota = document.getElementById("up-mo-ta").value;
                var loai = document.getElementById("up-loai").value;
                var gia = document.getElementById("up-gia-tien").value;
                var size = document.getElementById("up-size").value;
                var vien = document.getElementById("up-vien").value;
                var formData = new FormData();
                formData.append('img', img);
                formData.append('tensp', tensp);
                formData.append('mota', mota);
                formData.append('loai', loai);
                formData.append('gia', gia);
                formData.append('size', size);
                formData.append('vien', vien);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../controller/ProductManagementController.php', true);
                xhr.send(formData);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                        // loadTableProduct();
                    }
                }
            }
        }
    });
}