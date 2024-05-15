var currentqueryz = "SELECT * FROM `sanpham` WHERE  sanpham.TrangThai = 1 ";
var tblSizeSanPham = "SELECT * FROM `SizeSanPham`";
var currentRowqueryz = "SELECT COUNT(*) FROM `sanpham";
var currentPagez = 1;
var perPage = 8;
var listDeProduct = [];
var listSizeProduct = [];
var listDeLength = 0;
var curAttribute = new Map();
var totalPage = 0;
var flag = 0;
loadTableProduct();
loadCombinationSizeAndCrust();
addeventinputthemsp();
addeventaddproduct();
addeventthemthuoctinh();
loadcomcomboboxtheloai();
getThongTinNhanVien();


function getAllThongTinNhanVienSS() {
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getAllThongTinNhanVienSS",
    },
    success: function (result) {
      if (result != null) {
        alert("Lay nhan vien thanh cong oke!");
        ma_quyen = result[0].PhanQuyen;
        console.log('result nhan vien :>> ', result);
        console.log('ma_quyen :>> ', ma_quyen);
        getAllChucNangNhomQuyenByMaPhanQuyen()
      } else {
        alert("Lỗi khi lấy thông tin người dùng!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    }
  });
}
var list_chucnangnhomquyen;
function getAllChucNangNhomQuyenByMaPhanQuyen() {
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getAllChucNangNhomQuyenByMaPhanQuyen",
      ma_quyen: ma_quyen
    },
    success: function (result) {
      if (result != null) {
        alert("Lay chuc nang nhom quyen thanh cong oke!");
        list_chucnangnhomquyen = result;
        console.log('list_chucnangnhomquyen :>> ', list_chucnangnhomquyen);
        hienThiChucNangNhomQuyen()
      } else {
        alert("Lỗi khi lấy thông tin chức năng nhóm quyền!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    }
  });
}

// 0
// : 
// {MaQuyen: '1', MaCN: 'sanpham', hanhdong: 'create'}
// 1
// : 
// {MaQuyen: '1', MaCN: 'sanpham', hanhdong: 'delete'}
// 2
// : 
// {MaQuyen: '1', MaCN: 'sanpham', hanhdong: 'update'}
// 3
// : 
// {MaQuyen: '1', MaCN: 'sanpham', hanhdong: 'view'}
function hienThiChucNangNhomQuyen() {
  var btn_add_product = document.querySelectorAll('#btn-add-product');
  var btn_edit_product = document.querySelectorAll('#btn-edit-product');
  var btn_delete_product = document.querySelectorAll('#btn-delete-product');
  btn_add_product.forEach(function (btn) {
    btn.style.display = 'none';
  }
  );
  btn_edit_product.forEach(function (btn) {
    btn.style.display = 'none';
  }
  );
  btn_delete_product.forEach(function (btn) {
    btn.style.display = 'none';
  }
  );
  list_chucnangnhomquyen.forEach(function (item) {
    if (item.MaCN=="sanpham" && item.hanhdong == 'create') {
      btn_add_product.forEach(function (btn) {
        btn.style.display = 'block';
      }
      );
    }
    if (item.MaCN=="sanpham" && item.hanhdong == 'update') {
      btn_edit_product.forEach(function (btn) {
        btn.style.display = 'block';
      }
      );
    }
    if (item.MaCN=="sanpham" && item.hanhdong == 'delete') {
      btn_delete_product.forEach(function (btn) {
        btn.style.display = 'block';
      }
      );
    }
  }
  );
  alert("hien thi chuc nang nhom quyen");
  
}

var listProduct;
function loadTableProduct() {
  $.ajax({
    url: "./controller/ProductManagementController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadTableProduct",
      currentquery: currentqueryz,
      currentpage: currentPagez,
    },
    success: function (data) {
      var row;
      if (data == null) {
        listProduct = [];
        row = 0;
      } else {
        listProduct = data.result;
        row = data.countrow;
      }
      totalPage = row / perPage;
      totalPage = Math.ceil(totalPage);
      showProductTableAdmin();
      getAllThongTinNhanVienSS()
      renderPagAdmin(totalPage, currentPagez);
      addeventdelete();
    },
  });

  // console.log("hehe: "+listProduct);

  $.ajax({
    url: "./controller/ProductManagementController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadTableProduct",
      currentquery: currentqueryz,
      currentpage: currentPagez,
    },
    success: function (data) {
      var row;
      if (data == null) {
        listProduct = [];
        row = 0;
      } else {
        listProduct = data.result;
        row = data.countrow;
      }
      totalPage = row / perPage;
      totalPage = Math.ceil(totalPage);
      showProductTableAdmin();
      //tai sao khong display none khi goi?

      // hienThiChucNangByMaQuyen()
      // console.log('list_chucnangnhomquyen :>> ', list_chucnangnhomquyen);

      renderPagAdmin(totalPage, currentPagez);
      addeventdelete();
    },
  });
}


function showProductTableAdmin() {
  var html = "";
  listProduct.forEach(function (item) {
    html += `<div class="list">
       <div class="list-left">
       <img src="${item.Img}" alt="">;
           
        <div class="list-info">
               <h4>${item.TenSP}</h4>
               <p class="list-note">${item.Mota}</p>
               <span class="list-category">${item.Loai}</span>
           </div>
            </div>
           <div class="list-right">
               <div class="list-control">
                   <div class="list-tool">
                       <button class="btn-edit" id="btn-edit-product" onclick="prepared()"><i class="fa-regular fa-pen-to-square"></i></button>
                       <button class="btn-delete" id="btn-delete-product" value="${item.MaSP}"><i class="fa-solid fa-trash"></i></button>
                   </div>
               </div>
        </div>
   </div>`;
  });
  if (document.querySelector("#show-product") == null) return 0;
  document.querySelector("#show-product").innerHTML = html;
  // var editButtons = document.querySelectorAll('.btn-edit');
  // console.log('editButtons', editButtons)
}
function prepared() {
  var titleModal = document.querySelector(".modal-container-title");
  var modal = document.querySelector(".add-product");
  var uploadImg = document.querySelector(".upload-image-preview");

  uploadImg.src = "img/pizza-1.png";
  modal.classList.add("open");
  titleModal.innerHTML = "CHỈNH SỬA SẢN PHẨM";
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
  input.addEventListener("change", function (e) {
    var reader = new FileReader();

    reader.onload = function (event) {
      document.querySelector(".modal-content-left img").src =
        event.target.result;
    };

    reader.readAsDataURL(e.target.files[0]);
  });
}

function themitem() {
  var listSize = ["Nhỏ", "Vừa", "Lớn"];
  var divDe = document.querySelector(".form-group.deproduct");
  var html = "";
  if (!document.querySelector(".deproduct .form-label")) {
    html += `<label for="category" class="form-label">Chọn Đế</label><br>`;
  }
  html += `<select name="category">`;
  listDeProduct.forEach(function (item) {
    listSize.forEach(function (size) {
      html += `<option value="${item.MaVien}-${size}">${item.TenVien} - ${size}</option>`;
    });
  });
  html += `</select><label for="category" class="form-label">Giá nhập</label>
    <input type="text" name="price" class="form-input" placeholder="Nhập giá nhập">
    <label for="category" class="form-label">Giá bán</label>
    <input type="text" name="price" class="form-input" placeholder="Nhập giá bán">
    <span class="form-message"></span>`;

  // add element html to div
  divDe.innerHTML += html;
}

function loadItem() {
  var listSize = ["Nhỏ", "Vừa", "Lớn"];
  var divDe = document.querySelector(".form-group.deproduct");
  var html = "";
  html += `<label for="category" class="form-label">Chọn Đế</label><br>`;
  // get size of key value array
  for (var k = 0; k < 9; k++) {
    var tempk = k;
    html += `<select name="category">`;
    for (var i = 0; i < listDeLength; i++) {
      for (var j = 0; j < listSize.length; j++) {
        if (j == k)
          html += `<option value="${listDeProduct[i].MaVien}-${listSize[j]}" selected>${listDeProduct[i].TenVien} - ${listSize[j]}</option>`;
        else
          html += `<option value="${listDeProduct[i].MaVien}-${listSize[j]}">${listDeProduct[i].TenVien} - ${listSize[j]}</option>`;
      }
      k;
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

function themsanphammoi() {}

function addeventdelete() {
  var btns = document.querySelectorAll(".btn-delete");
  btns.forEach(function (btn) {
    btn.addEventListener("click", function (ev) {
      var masp = ev.target.getAttribute("value");
      alert(masp);
      $.ajax({
        url: "./controller/ProductManagementController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "deleteProduct",
          masp: masp,
        },
        success: function (data) {
          console.log(data);
          loadTableProduct();
        },
      });
    });
  });
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
      renderPagAdmin(totalPage, currentPagez);
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
  currentqueryz = "SELECT * FROM `sanpham` WHERE  sanpham.TrangThai = 1 ";
  currentPagez = 1;
  document.getElementById("the-loai").value = "Tất cả";
  loadTableProduct();
}

function loadCombinationSizeAndCrust() {
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "getAllCrust",
    },
    success: function (data) {
      var listDeProduct = data;
      $.ajax({
        url: "./controller/ProductsController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "getAllSize",
        },
        success: function (data) {
          listSizeProduct = data;
          listDeLength = listDeProduct.length;
          var div = document.getElementById("chon-tt");
          console.log(div);
          var html = ``;

          var listCombination = [];
          var listIDCombination = [];
          listSizeProduct.forEach(function (size) {
            listDeProduct.forEach(function (de) {
              listCombination.push(
                "Size: " + size.TenSize + " - " + de.TenVien
              );
              listIDCombination.push(size.MaSize + de.MaVien);
            });
          });

          for (var i = 0; i < listCombination.length; i++) {
            html += `<option value="${listIDCombination[i]}">${listCombination[i]}</option>`;
          }
          div.innerHTML = html;
          removeloader();
        },
        error: function (xhr, status, error) {
          console.log(xhr);
          console.log(status);
          console.log(error);
        },
      });
    },
  });
}

function addeventaddproduct() {
  var btn = document.getElementById("add-product-button");
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    clearmsg();
    if (checkregrex().result == false) {
      var resultMsg = checkregrex().resultMsg;
      console.log(resultMsg);
      var msgdiv = document.querySelectorAll(".form-message");

      for (var i = 0; i < resultMsg.length; i++) {
        if (resultMsg[i] != "") {
          msgdiv[i].innerHTML = resultMsg[i];
        }
      }
      return 0;
    }
    var masp = document.getElementById("masanpham").value;
    var tensp = document.getElementById("ten-mon").value;
    var loai = document.getElementById("chon-loai").value;
    var mota = document.getElementById("mo-ta").value;

    var formData = new FormData(document.querySelector(".add-product-form"));

    formData.append("request", "uploadProduct");
    formData.append("tensp", tensp);
    formData.append("loai", loai);
    formData.append("mota", mota);
    formData.append("masp", masp);

    var fileField = document.querySelector('input[type="file"]');
    formData.append("up-hinh-anh", fileField.files[0]);
    // traverse curAttribute
    var chitietsanpham = [];
    curAttribute.forEach(function (value, key) {
      chitietsanpham.push({
        masize: key[0],
        made: key[1],
      });
    });
    formData.append("chitietsanpham", JSON.stringify(chitietsanpham));

    $.ajax({
      url: "./controller/ProductManagementController.php",
      type: "POST",
      dataType: "json",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log(data);
      },
    });
  });
}

function checkregrex() {
  var masp = document.getElementById("masanpham").value;
  var tensp = document.getElementById("ten-mon").value;
  var loai = document.getElementById("chon-loai").value;
  var result = true;
  var resultMsg = ["", "", ""];
  // check ma san pham co bat dau la P khong
  if (masp.charAt(0) != "P") {
    resultMsg[0] = "Mã sản phẩm phải bắt đầu bằng chữ P";
    result = false;
  }

  // check ten san pham co ky tu dac biet khong
  // regrex có dấu

  if (tensp == "" || tensp.length <= 5) {
    resultMsg[1] = "Tên sản phẩm phải lớn hơn 5 ký tự";
    result = false;
  }

  if (loai == "Chọn loại") {
    resultMsg[2] = "Chưa chọn loại sản phẩm";
    result = false;
  }

  return { result, resultMsg };
}

function clearmsg() {
  var msgdiv = document.querySelectorAll(".form-message");
  for (var i = 0; i < msgdiv.length; i++) {
    msgdiv[i].innerHTML = "";
  }
}

function addeventthemthuoctinh() {
  var btn = document.querySelector(".themthuoctinh");
  btn.addEventListener("click", function () {
    var thuoctinh = document.querySelector("#chon-tt").value;
    var tentt = document.querySelector("#chon-tt");
    // get text of option
    var tentt = tentt.options[tentt.selectedIndex].text;
    tentt = tentt.replace("Size: ", "");
    tentt = tentt.replace(" - ", "-");

    if (curAttribute.has(thuoctinh)) {
      alert("Thuộc tính đã tồn tại");
      return 0;
    } else {
      curAttribute.set(thuoctinh, {
        tensize: tentt.split("-")[0],
        tende: tentt.split("-")[1],
      });
    }
    filltable();
  });
}

function filltable() {
  var rowTable = document.querySelector(".rowTable");
  // traverse map
  var html = "";
  curAttribute.forEach(function (value, key) {
    html += `<tr>
        <td>${value.tensize}</td>
        <td>${value.tende}</td>
        </tr>`;
  });
  rowTable.innerHTML = html;
}

// function showThuocTinh() {
//   var tableSize = document.querySelector(".table.--size");
//   var tableDe = document.querySelector(".table.--vien");
//   var selectElement = document.getElementById("chonthuoctinh");
//   console.log(tableSize);
//   console.log(tableDe);

//   switch (selectElement.value) {
//     case "1": // Kích thước
//       tableSize.style.display = "block";
//       tableDe.style.display = "none";
//       break;
//     case "0": // Đế
//       tableSize.style.display = "none";
//       tableDe.style.display = "block";
//       break;
//     case "2": // Tất cả
//       tableSize.style.display = "block";
//       tableDe.style.display = "block";
//       break;
//   }
// }

// V.Kiet: Add event for button add attribute

// document
//   .getElementById("btn-add-attribute")
//   .addEventListener("click", function () {
//     var modal = document.querySelector(".modal.signup");
//     modal.classList.add("open");
//   });

// var btnClose = document.querySelectorAll(".modal-close");
// btnClose.forEach(function (btn) {
//   btn.addEventListener("click", function () {
//     var modal = this.closest(".modal");
//     modal.classList.remove("open");
//   });
// });

// function showThemThuocTinh() {
//   var sizeForm = document.querySelector(".size-form");
//   var deForm = document.querySelector(".de-form");
//   var selectElement = document.getElementById("themthuoctinh");

//   switch (selectElement.value) {
//     case "0": // Kích thước
//       sizeForm.style.display = "block";
//       deForm.style.display = "none";

//       break;
//     case "1": // Đế
//       sizeForm.style.display = "none";
//       deForm.style.display = "block";
//       break;
//   }
// }

// var btnInsert = document.getElementById("btn-insert");
// btnInsert.addEventListener("click", function (e) {
//   e.preventDefault();
//   alert("Thêm thành công");
//   insertAttributeProduct();

// });

// function insertAttributeProduct() {
//   var masize = document.getElementById("masize").value;
//   var tensize = document.getElementById("tensize").value;
//   var dinhluongsize = document.getElementById("dinhluongsize").value;

//   var sizeSanPham = {
//     masize: masize,
//     tensize: tensize,
//     dinhluongsize: dinhluongsize,
//   };
//   //ajax
//   $.ajax({
//     url: "./controller/ThuocTinhSanPhamController.php",
//     type: "POST",
//     dataType: "json",
//     data: {
//       request: "insertAttributeProduct",
//       sizeSanPham: JSON.stringify(sizeSanPham),
//     },
//     success: function (data) {
//       console.log(data);
//       loadCombinationSizeAndCrust();
//     },
//   });

// }

//ajax
//End V.Kiet: Add event for button add attribute

// Kiet: Add event for button add attribute

// hoc
function loadcomcomboboxtheloai() {
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "getAllCategory",
    },
    success: function (data) {
      console.log(data);
      var html = "<option>Tất cả</option>";
      data.forEach(function (item) {
        html += `<option>${item.TenLoai}</option>`;
      });
      console.log(html);
      document.getElementById("the-loai").innerHTML = html;
    },
  });
}

// lay thong tin nhan vien
function getThongTinNhanVien() {
  $.ajax({
    url: "./controller/PermissionController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "getThongTinNhanVien",
    },
    success: function (data) {
      alert("Nhan vien");
      console.log(data);
    },
  });
}
