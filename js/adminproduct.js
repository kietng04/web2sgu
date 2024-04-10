var currentqueryz =
  'SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien, ImgBinary FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien ="V" and sanpham.TrangThai = 1 ';
var currentRowqueryz =
  'SELECT COUNT(*) FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND pizzadetail.MaSize = "S" AND pizzadetail.MaCrust ="V" ';
var currentPagez = 1;
var perPage = 4;
var listDeProduct = [];
var listDeLength = 0;
var listSizeProduct = ['Lớn', 'Vừa', 'Nhỏ'];
loadTableProduct();
addeventinputthemsp();  
loadCombinationSizeAndCrust();
addeventaddproduct();
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
            var row;
            if (data == null) { 
                listProduct = [];
                row = 0;
            }
            else {
                listProduct = data.result;
                row = data.countrow;
            }
            var totalPage =  row / perPage;
            showProductTableAdmin();
            renderPagAdmin(totalPage, currentPagez);
            addeventdelete();
        }
    });
}

function showProductTableAdmin() {
    var html = "";
    listProduct.forEach(function (item) {
       html += `<div class="list">
       <div class="list-left">`
       if (item.Img == "" && item.ImgBinary != null) 
            html += `<img src="data:image/jpg;charset=utf8;base64,${item.ImgBinary}" alt="">`;
         else
            html += `<img src="${item.Img}" alt="">`;
           
        html += `<div class="list-info">
               <h4>${item.TenSP}</h4>
               <p class="list-note">${item.Mota}</p>
               <span class="list-category">${item.Loai}</span>
           </div>

           <div class="list-right">
               <div class="list-price">
                   <span class="list-current-price">${toVND(item.GiaTien)}</span>
               </div>
               <div class="list-control">
                   <div class="list-tool">
                       <button class="btn-edit"><i class="fa-regular fa-pen-to-square"></i></button>
                       <button class="btn-delete" value="${item.MaSP}"><i class="fa-solid fa-trash"></i></button>
                   </div>
               </div>
           </div>

       </div>
   </div>`
    })
    document.querySelector("#show-product").innerHTML = html;
  }

function renderPagAdmin(totalPage, currentPage) {
    if (totalPage < 2) totalPage = 0;
    var html = "";
    for (var i = 1; i <= totalPage; i++) {
      if (i == currentPage) {
        html += `<li class="page-item --active" onclick="ajaxproductadmin(${i},this)" ><a  class="page-link">${i}</a></li>`;
      } else {
        html += `<li class="page-item" onclick="ajaxproductadmin(${i},this)" ><a  class="page-link">${i}</a></li>`;
      }
    }
    document.querySelector(".page-nav-list").innerHTML = html;
}

function addeventinputthemsp() {
    var input = document.getElementById("up-hinh-anh");
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


function themitem() {
    var listSize = ['Nhỏ', 'Vừa', 'Lớn'];
    var divDe = document.querySelector('.form-group.deproduct');
    var html = '';
    if (!document.querySelector('.deproduct .form-label')) {
        html += `<label for="category" class="form-label">Chọn Đế</label><br>`;
    }
    html += `<select name="category">`
    listDeProduct.forEach(function (item) {
        listSize.forEach(function (size) {
            html += `<option value="${item.MaVien}-${size}">${item.TenVien} - ${size}</option>`;
        })
    })
    html += `</select><label for="category" class="form-label">Giá nhập</label>
    <input type="text" name="price" class="form-input" placeholder="Nhập giá nhập">
    <label for="category" class="form-label">Giá bán</label>
    <input type="text" name="price" class="form-input" placeholder="Nhập giá bán">
    <span class="form-message"></span>`;


    // add element html to div
    divDe.innerHTML += html;
}

function loadItem() {
    var listSize = ['Nhỏ', 'Vừa', 'Lớn'];
    var divDe = document.querySelector('.form-group.deproduct');
    var html = '';
    html += `<label for="category" class="form-label">Chọn Đế</label><br>`;
    // get size of key value array
    for (var k = 0; k < 9; k++) {
        var tempk = k;
        html += `<select name="category">`
        for (var i = 0; i < listDeLength; i++) {
            for (var j = 0; j < listSize.length; j++) {
                if (j == k) html += `<option value="${listDeProduct[i].MaVien}-${listSize[j]}" selected>${listDeProduct[i].TenVien} - ${listSize[j]}</option>`;
                else html += `<option value="${listDeProduct[i].MaVien}-${listSize[j]}">${listDeProduct[i].TenVien} - ${listSize[j]}</option>`;
            }
            k
        }
        html += `</select><label for="category" class="form-label">Giá nhập</label>
        <input type="text" name="price" class="form-input" placeholder="Nhập giá nhập">
        <label for="category" class="form-label">Giá bán</label>
        <input type="text" name="price" class="form-input" placeholder="Nhập giá bán">
        <span class="form-message"></span>`;
    }


    // add element html to div
    divDe.innerHTML += html;
}

function themsanphammoi() {
    
}

function addeventdelete() {
    var btns = document.querySelectorAll('.btn-delete');
    btns.forEach(function (btn) {
        btn.addEventListener('click', function() {
            var masp = document.querySelector('.btn-delete').getAttribute('value');
            $.ajax({
                url: './controller/ProductManagementController.php',
                type: 'POST',
                data: {
                    request: 'deleteProduct',
                    masp: masp,
                },
                success: function(data) {
                    console.log(data);
                    loadTableProduct();
                }
            });
        })
    })
}

function ajaxproductadmin(page, currentpage) {
    currentPagez = page;
    $.ajax({
      url: "./controller/ProductsController.php",
      type: "post",
      dataType: "json",
      timeout: 1500,
      data: {
        request: "changePage",
        currentquery: currentqueryz,
        currentpage: currentPagez,
      },
      success: function (data) {
        listProduct = data;
        loadTableProduct();
      },
    });
  }

function searchProduct() {
    var type = document.getElementById("the-loai").value;
    var keyword = document.getElementById("form-search-product").value;
    if (type == "Tất cả")
        currentqueryz = `SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien FROM sanpham, chitietsanpham WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien = "V" AND sanpham.TenSP LIKE '%${keyword}%'`;
    else 
        currentqueryz = `SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien FROM sanpham, chitietsanpham WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien = "V" AND sanpham.Loai = '${type}' AND sanpham.TenSP LIKE '%${keyword}%'`;
    currentPagez = 1;
    loadTableProduct();
}

function resetInput() {
    currentqueryz = 'SELECT sanpham.MaSP, TenSP, Mota, Img, Loai, MaSize, MaVien, GiaTien FROM `sanpham`, `chitietsanpham` WHERE sanpham.MaSP = chitietsanpham.MaSP AND chitietsanpham.MaSize = "S" AND chitietsanpham.MaVien ="V" and sanpham.TrangThai = 1 ';
    currentPagez = 1;
    document.getElementById("the-loai").value = "Tất cả";
    loadTableProduct();
}


function loadCombinationSizeAndCrust() {
    $.ajax({
        url: './controller/ProductsController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'getAllCrust',
        },
        success: function(data) {
            var listDeProduct = data;
            listDeLength = listDeProduct.length;
            var div = document.querySelector('.divItem');
            console.log(div);
            var html = `<label for="category" class="form-label">Chọn Item</label>
            <br>`;

            var listCombination = [];
            listDeProduct.forEach(function (item) {
                listSizeProduct.forEach(function (size) {
                    listCombination.push("Size: " + size + " - " + item.TenVien);
                });
            });
 
            console.log(listCombination);
            for (var i = 0; i < listCombination.length; i++) {
                html += `<div class="subitem">
                <select name="category" id="chon-item" class="listitem">`;
                for (var j = 0; j < listCombination.length; j++) {
                    if (j == i) html += `<option value="${listCombination[j]}" selected>${listCombination[j]}</option>`;
                    else html += `<option value="${listCombination[j]}">${listCombination[j]}</option>`;
                }
  
                html += `</select>

                <label for="gia-moi" class="form-label">Giá nhập</label>
                <input id="gia-moi" class="gianhap" name="gia-moi" type="text" placeholder="Nhập giá nhập"
                    class="form-control">

                <label for="gia-moi" class="form-label">Giá xuất</label>
                <input id="gia-moi" class="giaxuat" name="gia-moi" type="text" placeholder="Nhập giá xuất"
                    class="form-control">
            </div>`;
            }
            div.innerHTML = html;
        }
    });
}

function addeventaddproduct() {
    var btn = document.getElementById("add-product-button");
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        var tensp = document.getElementById("ten-mon").value;
        var loai = document.getElementById("chon-loai").value;
        var arrayitem = [];
        var listitem = document.querySelectorAll('.listitem');
        var listgianhap = document.querySelectorAll('.gianhap');
        var listgiaxuat = document.querySelectorAll('.giaxuat');

        for (var i = 0; i < listitem.length; i++) {
            var item = listitem[i].value;
            var gianhap = listgianhap[i].value;
            var giaxuat = listgiaxuat[i].value;
            arrayitem.push({item: item, gianhap: gianhap, giaxuat: giaxuat});
        }
        console.log(arrayitem);
        var mota = document.getElementById("mo-ta").value;

        var formData = new FormData(document.querySelector('.add-product-form'));

        formData.append('request', 'uploadProduct');
        formData.append('tensp', tensp);
        formData.append('loai', loai);
        formData.append('arrayitem', JSON.stringify(arrayitem)); // Convert array to string
        formData.append('mota', mota);

        var fileField = document.querySelector('input[type="file"]');
        alert(fileField.files[0].name);
        formData.append('up-hinh-anh', fileField.files[0]);

        $.ajax({
            url: './controller/ProductManagementController.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false, 
            success: function(data) {
                console.log(data);
            }
        });
        
    });
}