var ma_quyen;
var list_chucnangnhomquyen;
var list_all_chucnang;
var mapquyen = new Map();
var ma_quyen_khi_tac_dong;
loadtablephanquyen();
addeventthemnq();

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
        console.log("result nhan vien :>> ", result);
        console.log("ma_quyen :>> ", ma_quyen);
        getAllChucNangNhomQuyenByMaPhanQuyen();
      } else {
        alert("Lỗi khi lấy thông tin người dùng!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    },
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
      ma_quyen: ma_quyen,
    },
    success: function (result) {
      if (result != null) {
        alert("Lay chuc nang nhom quyen thanh cong oke!");
        list_chucnangnhomquyen = result;
        console.log("list_chucnangnhomquyen :>> ", list_chucnangnhomquyen);
        hienThiChucNangNhomQuyen();
      } else {
        alert("Lỗi khi lấy thông tin chức năng nhóm quyền!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    },
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
  var btn_add_product = document.querySelectorAll(".import-role");
  var btn_edit_product = document.querySelectorAll("#edit-account");
  var btn_delete_product = document.querySelectorAll("#delete-account");
  btn_add_product.forEach(function (btn) {
    btn.style.display = "none";
  });
  btn_edit_product.forEach(function (btn) {
    btn.style.display = "none";
  });
  btn_delete_product.forEach(function (btn) {
    btn.style.display = "none";
  });
  list_chucnangnhomquyen.forEach(function (item) {
    if (item.MaCN == "phanquyen" && item.hanhdong == "create") {
      btn_add_product.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
    }
    if (item.MaCN == "phanquyen" && item.hanhdong == "update") {
      btn_edit_product.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
    }
    if (item.MaCN == "phanquyen" && item.hanhdong == "delete") {
      btn_delete_product.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
    }
  });
  alert("hien thi chuc nang nhom quyen");
}

function loadtablephanquyen() {
  // ajjax
  $.ajax({
    url: "./controller/PermissionController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "loadnhomquyen",
    },
    success: function (data) {
      console.log(data);
      var html = "";
      var divtable = document.querySelector("#show-user");
      data.forEach((element) => {
        html += `<tr>
                <td>${element.MaQuyen}</td>
                <td>${element.TenNhomQuyen}</td>
                <td class="control control-table">
                    <button class="btn-edit" id="edit-phanquyen"><i
                            class="fa-regular fa-pen-to-square"></i></button>
                    <button class="btn-delete" id="delete-phanquyen" value="${element.MaQuyen}"><i
                            class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;
      });
      divtable.innerHTML = html;

      getAllThongTinNhanVienSS();
      addeventdelete();
      nhanSuaPhanQuyen();
    },
  });
}

function nhanSuaPhanQuyen() {
  var btn_sua_phan_quyen = document.querySelectorAll("#edit-phanquyen");
  console.log('btn_sua_phan_quyen :>> ', btn_sua_phan_quyen);
  btn_sua_phan_quyen.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var btnthemnhomquyen = document.querySelector("#themnhomquyen");
      btnthemnhomquyen.style.display = "none";
      var btnsuanhomquyen = document.querySelector("#suanhomquyen");
      btnsuanhomquyen.style.display = "inline-block";
      var dark_over = document.querySelector(".dark-overlay");
      dark_over.style.display = "block";
      var edit_role = document.querySelector("#roleModal");
      edit_role.style.display = "block";
      var ma_quyen_khi_nhan = btn.parentElement.parentElement.children[0].innerText;
      ma_quyen_khi_tac_dong = ma_quyen_khi_nhan;
      console.log('ma_quyen_khi_nhan :>> ', ma_quyen_khi_nhan);
      var role_name = document.querySelector("#role-name");
      var tennhomquyen = btn.parentElement.parentElement.children[1].innerText;
      role_name.value = tennhomquyen;
      role_name.disabled = true;
      
      $.ajax({
        url: "./controller/PermissionController.php",
        type: "POST",
        dataType: "json",
        data: {
          request: "loadchucnangnhomquyen",
          maquyen: ma_quyen_khi_nhan,
        },
        success: function (data) {
         
          
          list_all_chucnang = data;
          console.log('list_all_chucnang :>> ', list_all_chucnang);
          var list_checkbox = document.querySelectorAll(".cbcn");
          list_checkbox.forEach(function (item) {
            item.checked = false;
          });
          list_all_chucnang.forEach(function (item) {
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "sanpham") {
              list_checkbox[0].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "sanpham") {
              list_checkbox[1].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "sanpham") {
              list_checkbox[2].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "sanpham") {
              list_checkbox[3].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "taikhoan") {
              list_checkbox[4].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "taikhoan") {
              list_checkbox[5].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "taikhoan") {
              list_checkbox[6].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "taikhoan") {
              list_checkbox[7].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "donhang") {
              list_checkbox[8].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "donhang") {
              list_checkbox[9].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "donhang") {
              list_checkbox[10].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "donhang") {
              list_checkbox[11].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "nhaphang") {
              list_checkbox[12].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "nhaphang") {
              list_checkbox[13].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "nhaphang") {
              list_checkbox[14].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "nhaphang") {
              list_checkbox[15].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "phanquyen") {
              list_checkbox[16].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "phanquyen") {
              list_checkbox[17].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "phanquyen") {
              list_checkbox[18].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "phanquyen") {
              list_checkbox[19].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "view" && item.MaCN == "thongke") {
              list_checkbox[20].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "create" && item.MaCN == "thongke") {
              list_checkbox[21].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "update" && item.MaCN == "thongke") {
              list_checkbox[22].checked = true;
            }
            if (item.MaQuyen == ma_quyen_khi_nhan && item.hanhdong == "delete" && item.MaCN == "thongke") {
              list_checkbox[23].checked = true;
            }
          }
          );    
          
          nhansuanhomquyen();
        },

        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: ", jqXHR.responseText);
          console.log("Status: ", textStatus);
          console.log("Error: ", errorThrown);
          alert("code nhu cc");
        }
      });
    });
  }
  );
}


function clearcheckbox() {
  var role_name = document.querySelector("#role-name");
  role_name.value = ""; 
  role_name.disabled = false;
  var list_checkbox = document.querySelectorAll(".cbcn");
          list_checkbox.forEach(function (item) {
            item.checked = false;
          });
}
function nhansuanhomquyen() {
  var btnsuanhomquyen = document.querySelector("#suanhomquyen");
  btnsuanhomquyen.addEventListener("click", function () {
    // alert(ma_quyen_khi_tac_dong)
    var role_name = document.querySelector("#role-name");
    role_name.value = ma_quyen_khi_tac_dong;
    xoaChucNangNhomQuyenByMaQuyen();
    updateChucNangNhomQuyenByMaQuyen();
    

  }
  );
}
function updateChucNangNhomQuyenByMaQuyen() {
  var data_chuc_nang = ["sanpham", "taikhoan", "donhang", "nhaphang", "phanquyen", "thongke"];
  var data_hanh_dong = ["view", "create", "update", "delete"];
  console.log('data_hanh_dong[0] :>> ', data_hanh_dong[0]);
  var ma_quyen = ma_quyen_khi_tac_dong;
  var list_checkboxa = document.querySelectorAll(".cbcn");
  console.log('list_checkboxa :>> ', list_checkboxa);

  
  var list_checkbox = document.querySelectorAll(".cbcn");
  for (var i = 0; i < 6; i++) {
    for (var j = 0; j < 4; j++) {
      if (list_checkbox[i * 4 + j].checked) {
        var ma_cn = data_chuc_nang[i];
        var hanhdong = data_hanh_dong[j];
        // alert("ma_quyen :>> " + ma_quyen + " ma_cn :>> " + ma_cn + " hanhdong :>> " + hanhdong);
        themChucNangNhomQuyen(ma_quyen, ma_cn, hanhdong);
      }
    }
  }
  

  // closeModal();
  

}



function xoaChucNangNhomQuyenByMaQuyen() {
  $.ajax({
    url: "./controller/PermissionController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "xoaChucNangNhomQuyenByMaQuyen",
      ma_quyen: ma_quyen_khi_tac_dong,
    },
    success: function (result) {
      if (result != null) {
        alert("Xoa chuc nang nhom quyen thanh cong oke!");
      } else {
        alert("Lỗi khi xoa chuc nang nhom quyen!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      // alert("code nhu cc o xoa");
    },
  });

}


function themChucNangNhomQuyenbyMaQuyen() {
  var data_chuc_nang = ["sanpham", "taikhoan", "donhang", "nhaphang", "phanquyen", "thongke"];
  var data_hanh_dong = [ "view","create", "update", "delete"];
  var ma_quyen = ma_quyen_khi_tac_dong;

  
  var list_checkbox = document.querySelectorAll(".cbcn");
  list_checkbox.forEach(function (item) {
    if (item[0].checked) {
      var ma_cn = data_chuc_nang[0];
      var hanhdong = data_hanh_dong[0];
      themChucNangNhomQuyen(ma_quyen, ma_cn, hanhdong);
    }
  });
}
function themChucNangNhomQuyen(ma_quyen, ma_cn, hanhdong) {
  $.ajax({
    url: "./controller/PermissionController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "themChucNangNhomQuyen",
      ma_quyen: ma_quyen,
      ma_cn: ma_cn,
      hanhdong: hanhdong,
    },
    success: function (result) {
      if (result != null) {
        // alert("Them chuc nang nhom quyen thanh cong oke!");
      } else {
        alert("Lỗi khi them chuc nang nhom quyen!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      // alert("code nhu cc o them");
    },
  });
}





function addeventdelete() {
  var btns = document.querySelectorAll(".btn-delete");
  btns.forEach((btn) => {
    btn.addEventListener("click", function () {

      // xac nhan ban co muon xoa khong?
      if (!confirm("Bạn có chắc chắn muốn xóa nhóm quyền này không?")) {
        return;
      }
      var maquyen = btn.value;
      $.ajax({
        url: "./controller/PermissionController.php",
        type: "POST",
        data: {
          request: "xoanhomquyen",
          maquyen: maquyen,
        },
        success: function (data) {
          if (data) {
            // alert("Xóa nhóm quyền thành công");
            loadtablephanquyen();
          }
        },
      });
    });
  });
}

function addeventthemnq() {
  var themnq = document.querySelector(".themnhomquyen");
  var dschucnang = [
    "sanpham",
    "taikhoan",
    "donhang",
    "nhaphang",
    "phanquyen",
    "thongke",
  ];
  // hashmap <'tenchucnang', listquyen(them,sua,xoa,xem)>
  var mapquyen = new Map();
  var dscncheckbox = document.querySelectorAll(".cbcn");
  themnq.addEventListener("click", function () {
    var tennq = document.querySelector("#role-name").value;
    for (var i = 0; i < 6; i++) {
      var arraychucnang = [];
      for (var j = 0; j < 4; j++) {
        // j =0  xem, j = 1 them, j = 2 sua, j = 3 xoa
        if (j == 0 && dscncheckbox[i * 4 + j].checked) {
          arraychucnang.push("view");
        }
        if (j == 1 && dscncheckbox[i * 4 + j].checked) {
          arraychucnang.push("create");
        }
        if (j == 2 && dscncheckbox[i * 4 + j].checked) {
          arraychucnang.push("update");
        }
        if (j == 3 && dscncheckbox[i * 4 + j].checked) {
          arraychucnang.push("delete");
        }
      }
      mapquyen.set(dschucnang[i], arraychucnang);
    }

    $.ajax({
      url: "./controller/PermissionController.php",
      type: "POST",
      data: {
        request: "themnhomquyen",
        tennq: tennq,
        mapquyen: JSON.stringify(Object.fromEntries(mapquyen)),
      },
      success: function (data) {
        if (data) {
          alert("Thêm nhóm quyền thành công");
          document.querySelector(".dark-overlay").style.display = "none";
          loadtablephanquyen();
        }
      },
    });
  });
}


var btnadd = document.querySelector(".add");
btnadd.addEventListener("click", function () {
  var btnthemnhomquyen = document.querySelector("#themnhomquyen");
  btnthemnhomquyen.style.display = "inline-block";
  var btnsuanhomquyen = document.querySelector("#suanhomquyen");
  btnsuanhomquyen.style.display = "none";
  var role_name = document.querySelector("#role-name");
  role_name.value = "";
  var dark_over = document.querySelector(".dark-overlay");
  dark_over.style.display = "block";
  var add_role = document.querySelector("#roleModal");
  add_role.style.display = "block";
  clearcheckbox();
});

var btnClose = document.querySelector(".close");
btnClose.addEventListener("click", function () {
  clearcheckbox();
});

function closeModal() {
  var dark_over = document.querySelector(".dark-overlay");
  dark_over.style.display = "none";
  var add_role = document.querySelector("#roleModal");
  add_role.style.display = "none";
  clearcheckbox();
}