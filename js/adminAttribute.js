//ajax
alert("hello");

var listsizesanpham = [];
var selectthemthuoctinh = document.getElementById("themthuoctinh");

loadsizesanpham();
loadviensanpham();
loadloaisanpham();
function loadsizesanpham() {
  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadsizesanpham",
    },
    success: function (data) {
      console.log(data);
      alert("okeeee");
      var html = "";
      data.forEach(function (item) {
        html += `   <tr>
                <td>${item.MaSize}</td>
                <td>${item.TenSize}</td>
                <td>${item.DinhLuongSize}</td>
                <td class="control control-table">
                    <button class="btn-edit size" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                    <button class="btn-delete" id="btnXoaSize"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;
      });

      document.getElementById("show-size").innerHTML = html;
      nhanSuaSize();
      nhanXoaSize();
    },
  });
}

function loadviensanpham() {
  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadviensanpham",
    },
    success: function (data) {
      console.log(data);
      alert("oke222");
      var html = "";
      data.forEach(function (item) {
        html += `   <tr>
                <td>${item.MaVien}</td>
                <td>${item.TenVien}</td>
                <td>${item.DinhLuongVien}</td>

                <td class="control control-table">
                    <button class="btn-edit vien" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                    <button class="btn-delete vien" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </td>
                
            </tr>`;
      });
      document.getElementById("show-vien").innerHTML = html;
      nhanSuaVien();
      nhanXoaVien();
    },
  });
}

function loadloaisanpham() {
  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadloaisanpham",
    },
    success: function (data) {
      console.log(data);
      var html = "";
      data.forEach(function (item) {
        html += `   <tr>
                <td>${item.MaLoai}</td>
                <td>${item.TenLoai}</td>
                <td class="control control-table">
                    <button class="btn-edit loai" id="btn-sua-loai"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                    <button class="btn-delete loai
                    " id="btn-xoa-loai"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;
        document.getElementById("show-loai").innerHTML = html;
        nhanSuaLoai();
        nhanXoaLoai();
      });
    },
  });
}

var btnSuaSize = "";
function nhanSuaSize() {
  alert("aa");
  btnSuaSize = document.getElementsByClassName("btn-edit size");
  [...btnSuaSize].forEach(function (item) {
    item.addEventListener("click", function () {
      var modal = document.querySelector(".modal.signup");
      modal.classList.add("open");
      var masize = item.parentElement.parentElement.children[0].textContent;
      var tensize = item.parentElement.parentElement.children[1].textContent;
      var dinhluongsize =
        item.parentElement.parentElement.children[2].textContent;
      document.getElementById("masize").value = masize;
      document.getElementById("masize").disabled = true;
      document.getElementById("tensize").value = tensize;
      document.getElementById("dinhluongsize").value = dinhluongsize;
      document.getElementById("btnThemSize").style.display = "none";
      document.getElementById("btnSuaSize").style.display = "block";
      document.getElementById("themthuoctinh").value = "0";
      document.querySelector(".size-form").style.display = "block";
      document.querySelector(".de-form").style.display = "none";
      document.querySelector(".loai-form").style.display = "none";
      
      document.getElementById("themthuoctinh").disabled = true;
    });
  });
}

function nhanSuaLoai() {
  var btnSuaLoai = document.getElementsByClassName("btn-edit loai");
  [...btnSuaLoai].forEach(function (item) {
    item.addEventListener("click", function () {
      var modal = document.querySelector(".modal.signup");
      modal.classList.add("open");
      var maloai = item.parentElement.parentElement.children[0].textContent;
      var tenloai = item.parentElement.parentElement.children[1].textContent;
      document.getElementById("maloai").value = maloai;
      document.getElementById("maloai").disabled = true;
      document.getElementById("tenloai").value = tenloai;
      document.getElementById("btnThemLoai").style.display = "none";
      document.getElementById("btnSuaLoai").style.display = "block";
      document.getElementById("themthuoctinh").value = "2";
      document.querySelector(".size-form").style.display = "none";
      document.querySelector(".de-form").style.display = "none";
      document.querySelector(".loai-form").style.display = "block";
      document.getElementById("themthuoctinh").disabled = true;
    });
  });
}

var btnLuuSuaLoai = document.getElementById("btnSuaLoai");
btnLuuSuaLoai.addEventListener("click", function (e) {
  e.preventDefault();
  suaLoaiSanPham();
});
function suaLoaiSanPham() {
  var maloai = document.getElementById("maloai").value;
  var tenloai = document.getElementById("tenloai").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "sualoaisanpham",
      maloai: maloai,
      tenloai: tenloai,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadloaisanpham();
    },
  });
  document.getElementById("maloai").value = "";
  document.getElementById("tenloai").value = "";
  closeModal();

}
function nhanXoaSize() {
  var btnXoaSize = document.querySelectorAll("#btnXoaSize");
  [...btnXoaSize].forEach(function (item) {
    item.addEventListener("click", function () {
      if(!confirm("Bạn có chắc chắn muốn xóa size nay không?")) return;
      var masize = item.parentElement.parentElement.children[0].textContent;
      alert("okeeeeee");
      $.ajax({
        url: "./controller/ProductAttributeController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "xoasizesanpham",
          masize: masize,
        },
        success: function (data) {
          console.log(data);
          loadsizesanpham();
        },
      });
    });
  });
}

function nhanXoaVien() {
  var btnXoaVien = document.getElementsByClassName("btn-delete vien");
  console.log("btnXoaVien", btnXoaVien);
  [...btnXoaVien].forEach(function (item) {
    item.addEventListener("click", function () {
      if(!confirm("Bạn có chắc chắn muốn xóa viền sản phẩm này không?")) return;
      var mavien = item.parentElement.parentElement.children[0].textContent;

      $.ajax({
        url: "./controller/ProductAttributeController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "xoaviensanpham",
          mavien: mavien,
        },
        success: function (data) {
          console.log(data);
          loadviensanpham();
        },
      });
    });
  });
}
function nhanXoaLoai() {
  var btnXoaLoai = document.getElementsByClassName("btn-delete loai");
  [...btnXoaLoai].forEach(function (item) {
    item.addEventListener("click", function () {
      if(!confirm("Bạn có chắc chắn muốn xóa loại sản phẩm này không?")) return;
      var maloai = item.parentElement.parentElement.children[0].textContent;

      $.ajax({
        url: "./controller/ProductAttributeController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "xoaloaisanpham",
          maloai: maloai,
        },
        success: function (data) {
          alert("Xoa loai thanh cong!")
          loadloaisanpham();
        },
        error: function (data) {
          alert("Không thể xóa loại sản phẩm này vì đã có sản phẩm thuộc loại này!");
        }
      });
    });
  });
}
function suaSizeSanPham() {
  var masize = document.getElementById("masize").value;
  var tensize = document.getElementById("tensize").value;
  var dinhluongsize = document.getElementById("dinhluongsize").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "suasizesanpham",
      masize: masize,
      tensize: tensize,
      dinhluongsize: dinhluongsize,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadsizesanpham();
    },
  });
  document.getElementById("masize").value = "";
  document.getElementById("tensize").value = "";
  document.getElementById("dinhluongsize").value = "";
  closeModal();
}
var btnLuuSuaSize = document.getElementById("btnSuaSize");
btnLuuSuaSize.addEventListener("click", function (e) {
  e.preventDefault();
  suaSizeSanPham();
});

function themSizeSanPham() {
  if (!validateSize()) return;
  var masize = document.getElementById("masize").value;
  var tensize = document.getElementById("tensize").value;
  var dinhluongsize = document.getElementById("dinhluongsize").value;
  var checkClose = 0;
  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "themsizesanpham",
      masize: masize,
      tensize: tensize,
      dinhluongsize: dinhluongsize,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadsizesanpham();
    },
    error: function (data) {
      checkClose = 1;
      alert("Mã size đã tồn tại, vui lòng nhập mã size khác!");
    },
  });
  document.getElementById("masize").value = "";
  document.getElementById("tensize").value = "";
  document.getElementById("dinhluongsize").value = "";
  // if (checkClose == 0) {
  //   closeModal();
  // }
}

var btnThemSize = document.getElementById("btnThemSize");
btnThemSize.addEventListener("click", function (e) {
  e.preventDefault();
  themSizeSanPham();
});

var btnThemVien = document.getElementById("btnThemVien");
btnThemVien.addEventListener("click", function (e) {
  e.preventDefault();
  themVienSanPham();
});
var btnThemLoai = document.getElementById("btnThemLoai");
btnThemLoai.addEventListener("click", function (e) {
  e.preventDefault();
  themLoaiSanPham();
});
function themLoaiSanPham() {
  if(!validateLoai()) return;
  var maloai = document.getElementById("maloai").value;
  var tenloai = document.getElementById("tenloai").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "themloaisanpham",
      maloai: maloai,
      tenloai: tenloai,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadloaisanpham();
    },
    error: function (data) {
      alert("Mã loại đã tồn tại, vui lòng nhập mã loại khác!");
    },
  });
  document.getElementById("maloai").value = "";
  document.getElementById("tenloai").value = "";

}

function themVienSanPham() {
  if(!validateVien()) return;
  var mavien = document.getElementById("mavien").value;
  var tenvien = document.getElementById("tenvien").value;
  var dinhluongvien = document.getElementById("dinhluongvien").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "themviensanpham",
      mavien: mavien,
      tenvien: tenvien,
      dinhluongvien: dinhluongvien,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadviensanpham();
    },
    error: function (data) {
      alert("Mã viền đã tồn tại, vui lòng nhập mã viền khác!");
    },
  });
  document.getElementById("mavien").value = "";
  document.getElementById("tenvien").value = "";
  document.getElementById("dinhluongvien").value = "";
  // closeModal();
}

document
  .getElementById("btn-add-attribute")
  .addEventListener("click", function () {
    alert("Thêm thuộc tính");
    document.querySelector(".loai-form").display = "none";

    document.getElementById("themthuoctinh").disabled = false;
    document.getElementById("themthuoctinh").value = "0";

    document.getElementById("masize").value = "";
    document.getElementById("masize").disabled = false;
    document.getElementById("tensize").value = "";
    document.getElementById("dinhluongsize").value = "";

    document.getElementById("mavien").value = "";
    document.getElementById("mavien").disabled = false;
    document.getElementById("tenvien").value = "";
    document.getElementById("dinhluongvien").value = "";

    document.getElementById("maloai").value = "";
    document.getElementById("maloai").disabled = false;
    document.getElementById("tenloai").value = "";

    var modal = document.querySelector(".modal.signup");
    modal.classList.add("open");
    var btnThemSize = document.getElementById("btnThemSize");
    var btnSuaSize = document.getElementById("btnSuaSize");
    var btnThemVien = document.getElementById("btnThemVien");
    var btnSuaVien = document.getElementById("btnSuaVien");
    var btnThemLoai = document.getElementById("btnThemLoai");
    var btnSuaLoai = document.getElementById("btnSuaLoai");
    btnThemSize.style.display = "block";
    btnSuaSize.style.display = "none";
    btnThemVien.style.display = "block";
    btnSuaVien.style.display = "none";
    btnThemLoai.style.display = "block";
    btnSuaLoai.style.display = "none";

    
  });

function nhanSuaVien() {
  var btnSuaVien = document.getElementsByClassName("btn-edit vien");
  [...btnSuaVien].forEach(function (item) {
    item.addEventListener("click", function () {
      var modal = document.querySelector(".modal.signup");
      modal.classList.add("open");
      var mavien = item.parentElement.parentElement.children[0].textContent;
      var tenvien = item.parentElement.parentElement.children[1].textContent;
      var dinhluongvien =
        item.parentElement.parentElement.children[2].textContent;
      document.getElementById("mavien").value = mavien;
      document.getElementById("mavien").disabled = true;

      document.getElementById("tenvien").value = tenvien;
      document.getElementById("dinhluongvien").value = dinhluongvien;
      document.getElementById("btnThemVien").style.display = "none";
      document.getElementById("btnSuaVien").style.display = "block";
      document.getElementById("themthuoctinh").value = "1";
      document.querySelector(".size-form").style.display = "none";
      document.querySelector(".de-form").style.display = "block";
      document.querySelector(".loai-form").style.display = "none";
      document.getElementById("themthuoctinh").disabled = true;
    });
  });
}

var btnLuuSuaVien = document.getElementById("btnSuaVien");
btnLuuSuaVien.addEventListener("click", function (e) {
  e.preventDefault();
  suaVienSanPham();
});
function suaVienSanPham() {
  var mavien = document.getElementById("mavien").value;
  var tenvien = document.getElementById("tenvien").value;
  var dinhluongvien = document.getElementById("dinhluongvien").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "suaviensanpham",
      mavien: mavien,
      tenvien: tenvien,
      dinhluongvien: dinhluongvien,
    },
    success: function (data) {
      console.log(data);
      alert("oke");
      loadviensanpham();
    },
  });
  document.getElementById("mavien").value = "";
  document.getElementById("tenvien").value = "";
  document.getElementById("dinhluongvien").value = "";
  closeModal();
}

function xoaVienSanPham() {
  // ban co chac chan xoa khong
  
  var mavien = document.getElementById("mavien").value;

  $.ajax({
    url: "./controller/ProductAttributeController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "xoaviensanpham",
      mavien: mavien,
    },
    success: function (data) {
      console.log(data);
      alert("da xoa vien");
      loadviensanpham();
    },
  });
  document.getElementById("mavien").value = "";
  document.getElementById("tenvien").value = "";
  document.getElementById("dinhluongvien").value = "";
}

function showThemThuocTinh() {
  var sizeForm = document.querySelector(".size-form");
  var deForm = document.querySelector(".de-form");
  var loaiForm = document.querySelector(".loai-form");
  var selectElement = document.getElementById("themthuoctinh");


  switch (selectElement.value) {
    case "0": // Kích thước
      sizeForm.style.display = "block";
      deForm.style.display = "none";
      loaiForm.style.display = "none";
      btnSuaSize.style.display = "none";
      document.getElementById("mavien").value = "";
      document.getElementById("tenvien").value = "";
      document.getElementById("dinhluongvien").value = "";

      break;
    case "1": // Vien
      sizeForm.style.display = "none";
      deForm.style.display = "block";
      loaiForm.style.display = "none";
      document.getElementById("masize").value = "";
      document.getElementById("tensize").value = "";
      document.getElementById("dinhluongsize").value = "";
      break;
    case "2": // Loại
      sizeForm.style.display = "none";
      deForm.style.display = "none";
      loaiForm.style.display = "block";
      break;
  }
}

function closeModal() {
  var modal = document.querySelector(".modal.signup");
  modal.classList.remove("open");
}


function validateSize() {
  var masize = document.getElementById("masize").value;
  var tensize = document.getElementById("tensize").value;
  var dinhluongsize = document.getElementById("dinhluongsize").value;

  if (masize == "" || tensize == "" || dinhluongsize == "") {
    alert("Vui lòng nhập đầy đủ thông tin!");
    return false;
  }
  return true;
}
function validateVien() {
  var mavien = document.getElementById("mavien").value;
  var tenvien = document.getElementById("tenvien").value;
  var dinhluongvien = document.getElementById("dinhluongvien").value;

  if (mavien == "" || tenvien == "" || dinhluongvien == "") {
    alert("Vui lòng nhập đầy đủ thông tin!");
    return false;
  }
  return true;
}
function validateLoai() {
  var maloai = document.getElementById("maloai").value;
  var tenloai = document.getElementById("tenloai").value;

  if (maloai == "" || tenloai == "") {
    alert("Vui lòng nhập đầy đủ thông tin!");
    return false;
  }
  return true;
}