var ma_quyen;
var list_chucnangnhomquyen;
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
    var btn_add_product = document.querySelectorAll('.import-role');
    var btn_edit_product = document.querySelectorAll('#edit-account');
    var btn_delete_product = document.querySelectorAll('#delete-account');
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
      if (item.MaCN=="phanquyen" && item.hanhdong == 'create') {
        btn_add_product.forEach(function (btn) {
          btn.style.display = 'inline-block';
        }
        );
      }
      if (item.MaCN=="phanquyen" && item.hanhdong == 'update') {
        btn_edit_product.forEach(function (btn) {
          btn.style.display = 'inline-block';
        }
        );
      }
      if (item.MaCN=="phanquyen" && item.hanhdong == 'delete') {
        btn_delete_product.forEach(function (btn) {
          btn.style.display = 'inline-block';
        }
        );
      }
    }
    );
    alert("hien thi chuc nang nhom quyen");
    
  }

function loadtablephanquyen() {
    // ajjax 
    $.ajax({
        url: './controller/PermissionController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'loadnhomquyen'
        },
        success: function(data) {
            console.log(data);
            var html = "";
            var divtable = document.querySelector('#show-user');
            data.forEach(element => {
                html += `<tr>
                <td>${element.MaQuyen}</td>
                <td>${element.TenNhomQuyen}</td>
                <td class="control control-table">
                    <button class="btn-edit" id="edit-account"><i
                            class="fa-regular fa-pen-to-square"></i></button>
                    <button class="btn-delete" id="delete-account" value="${element.MaQuyen}"><i
                            class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`
            })
            divtable.innerHTML = html;
      
            getAllThongTinNhanVienSS()
            addeventdelete();
        }
    })
}

function addeventdelete() {
    var btns = document.querySelectorAll('.btn-delete');
    btns.forEach(btn => {
        btn.addEventListener('click', function() {
            var maquyen = btn.value;
            $.ajax({
                url: './controller/PermissionController.php',
                type: 'POST',
                data: {
                    request: 'xoanhomquyen',
                    maquyen: maquyen
                },
                success: function(data) {
                    if (data) {
                        alert('Xóa nhóm quyền thành công');
                        loadtablephanquyen();
                    }
                }
            })
        })
    })

}

function addeventthemnq() {
    var themnq = document.querySelector('.themnhomquyen');
    var dschucnang = ['sanpham', 'taikhoan', 'donhang', 'nhaphang', 'phanquyen', 'thongke'];
    // hashmap <'tenchucnang', listquyen(them,sua,xoa,xem)>
    var mapquyen = new Map();
    var dscncheckbox = document.querySelectorAll('.cbcn');
    themnq.addEventListener('click', function() {
        var tennq = document.querySelector('#role-name').value;
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
            url: './controller/PermissionController.php',
            type: 'POST',
            data: {
                request: 'themnhomquyen',
                tennq: tennq,
                mapquyen: JSON.stringify(Object.fromEntries(mapquyen))
            },
            success: function(data) {
                if (data) {
                    alert('Thêm nhóm quyền thành công');
                    document.querySelector('.dark-overlay').style.display = 'none';
                    loadtablephanquyen();
                }
            }
        })
    });
}