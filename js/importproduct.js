loaddsphieunhap();
loadProductPN();
addeventThempn();
loadmaphieunhap();
addeventsuapn();
addeventxoapn();
loadcomboboxnhanvien();
addeventtimkiemnangcao();
var curProduct;
var listDeProduct = [];
var listDeLength = 0;
var listSizeProduct = [];
var listproduct = [];
var listCTPN = [];
var listItem = [];
var sum = 0;
var ma_phieu_nhap;

var mapsize = new Map();
var mapde = new Map();


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
    //   alert("code nhu cczzz");
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
    //   alert("code nhu cc");
    },
  });
}

function hienThiChucNangNhomQuyen() {
  var btn_add_product = document.querySelector(".add");
  // var btn_edit_product = document.querySelectorAll(".btn-edit");
  var btn_delete_product = document.querySelector(".cancel");
  var btn_detail_product = document.querySelectorAll(".btn-detail");
  btn_add_product.style.display = "none";
  // btn_edit_product.forEach(function (btn) {
  //   btn.style.display = "none";
  // });
  btn_delete_product.style.display = "none";
  btn_detail_product.forEach(function (btn) {
    btn.style.display = "none";
  });
  list_chucnangnhomquyen.forEach(function (item) {
    if (item.MaCN == "nhaphang" && item.hanhdong == "create") {
      
      btn_add_product.style.display = "inline-block";
    }
    if (item.MaCN == "nhaphang" && item.hanhdong == "delete") {
     
      btn_delete_product.style.display = "inline-block";
    }
    if (item.MaCN == "nhaphang" && item.hanhdong == "view") {
      btn_detail_product.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
    }
  });
  alert("hien thi chuc nang nhom quyen");
}


addmasizedevaomap();
function addmasizedevaomap() {
  $.ajax({
    url: "./controller/ProductManagementController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "getMapSizeDe",
    },
    success: function (data) {
      data["sizes"].forEach(function (item) {
        mapsize.set(item.MaSize, item.TenSize);
      });
      data["viens"].forEach(function (item) {
        mapde.set(item.MaVien, item.TenVien);
      });
      console.log("mapsize :>> ", mapsize);
      console.log("mapde :>> ", mapde);
    },
  });
}

var btn_close = document.querySelector(".modal-close-order");
btn_close.addEventListener("click", function () {
  var modal_detail = document.querySelector(".modal.detail-order");
  modal_detail.classList.remove("open");
});

function xemChiTietPhieuNhap() {
  var btn_xem_chi_tiet_phieu_nhap =
    document.querySelectorAll("#xem-phieu-nhap");
  console.log("btn_xem_chi_tiet_phieu_nhap :>> ", btn_xem_chi_tiet_phieu_nhap);
  btn_xem_chi_tiet_phieu_nhap.forEach((element) => {
    element.addEventListener("click", function () {
      alert("click");
      var modal_detail = document.querySelector(".modal.detail-order");
      modal_detail.classList.add("open");
      var index = element.parentElement.parentElement.getAttribute("value");
      console.log("index :>> ", index);
      ma_phieu_nhap = index;
      getInfoChiTietPhieuNhapByMaPN();
    });
  });
}

function loadProductPN() {
    $.ajax({
        url: "./controller/ProductsController.php",
        type: "POST",
        dataType: "json",
        data: {
            request: 'getAllProduct',
        },
        success: function(data) {
            listproduct = data;
            var div = document.querySelector('.product-list');
            var html = '';
            data.forEach(element => {
                html += `<tr class="productClicked" value="${element.MaSP}">
                            <td>${element.MaSP}</td>
                            <td>${element.TenSP}</td>
                        </tr>`
            })
            div.innerHTML = html;
            addeventClick();
        }
    })
}


function loaddsphieunhap() {
    $.ajax({
        url: './controller/ImportController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'getDSPhieuNhap'
            
        },
        success: function(data) {
            console.log(data);
       
            var div = document.querySelector('.rowtablePX');
            var html = '';  
            data.forEach(element => {
                html += `<tr value="${element.MaPN}">
                <td>${element.MaPN}</td>
                            <td>${element.Ho + "  " + element.Ten}</td>
                            <td>${toVND(element.DonGia)}</td>
                            <td>${element.NgayNhap}</td>
                            <td class="control">
                            <button class="btn-detail" id="xem-phieu-nhap"><i class="fa-regular fa-eye"></i> Chi tiết</button>
                          </td>
                        </tr>`;
      });
      div.innerHTML = html;
      addeventclickdetail();
      xemChiTietPhieuNhap();
    },
  });
}
function getTenSanPhamByMaSP(masp) {}

function getInfoChiTietPhieuNhapByMaPN() {
  $.ajax({
    url: "./controller/ImportController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "getInfoChiTietPhieuNhapByMaPN",
      MaPN: ma_phieu_nhap,
    },
    success: function (data) {
      console.log("chitietphieunhap :>> ", data);
      var tittle = document.querySelector(".modal-container-title");
      tittle.innerHTML = "Chi tiết phiếu nhập " + ma_phieu_nhap;
      var div = document.querySelector(".order-item-group");
      var html = "";
      data.forEach((item) => {
        $.ajax({
          url: "./controller/ProductsController.php",
          type: "POST",
          dataType: "json",
          data: {
            request: "getTenSanPhamByMaSP",
            id: item.MaSP,
          },
          success: function (data) {
            var ten_size = mapsize.get(item.MaSize);
            var ten_de = mapde.get(item.MaVien);
            var tensp;
            tensp = data[0].TenSP;
            console.log("tensp :>> ", tensp);
            html += `    <div class="order-product">
        <div class="order-product-left">
          
            <div class="order-product-info">
                <h4>${tensp}</h4>
                <p class="order-product-note"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i> Kích cỡ:
                    ${ten_size}; Viền:${ten_de}
                </p>
                <p class="order-product-quantity">SỐ LƯỢNG: ${item.SoLuong}</p>
                <p>
                </p>
            </div>
        </div>
        <div class="order-product-right">
            <div class="order-product-price" >
               Giá nhập:<span class="order-product-current-price">${item.GiaNhap}đ</span>
            </div>
            <div class="order-product-price">
            Giá xuất:<span class="order-product-current-price">${item.GiaXuat}đ</span>
            </div>
        </div>
    </div> `;
            div.innerHTML = html;
          },
          error: function () {
            // alert("del duoc roi oniichan");
          },
        });
      });
    },
    error: function () {
    //   alert("del duoc roi oniichan");
    },
  });
}

function getTenNhanVientheomanv(manv) {
    // ajax
    let tennv = "á";
    $.ajax({
        url: './controller/StaffManagementController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'getNVtheoMaNV',
            manv: manv
        },
        success: function(data) {
            console.log(data[0].Ho + ' ' + data[0].Ten);
             tennv = data[0].Ho + ' ' + data[0].Ten;
        }
    })
    return tennv;
}

function addeventClick() {
    var clickbtnlist = document.querySelectorAll('.productClicked');
    clickbtnlist.forEach(element => {
        element.addEventListener('click', function() {
            listItem = [];
            document.querySelectorAll('.rowdetail').forEach(element => {
                element.classList.remove('black');
            })
            var productID = element.getAttribute('value');
            var combobox = document.getElementById('product-item');
            clickbtnlist.forEach(element => {
                if (element.classList.contains('black')) {
                    element.classList.remove('black');
                }
                if (element.getAttribute('value') == productID) {
                    element.classList.add('black');
                }
            })
            listproduct.forEach(element => {
                if (element.MaSP == productID) {
                    document.querySelector('#product-name').value = element.MaSP + ' - ' + element.TenSP;
                    document.querySelector('#product-name').disabled = true;
                }
            })
            $.ajax({
                url: './controller/ProductsController.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    request: 'getListSizeDeProduct',
                    productID: productID
                },
                success: function(data) {
                    console.log(data);
                    
                    data.forEach(element => {
                        listItem.push({
                            "MaSize" : element.MaSize,
                            "MaDe": element.MaVien,
                            "TenSize" : element.TenSize,
                            "TenDe" : element.TenVien,
                            "GiaNhap": element.GiaNhap,
                            "GiaBan": element.GiaTien
                        })
                            
                    })
                    addeventonchangecombobox();
                    var html = '';
                    listItem.forEach(element => {
                        html += `<option value="${element.MaSize + element.MaDe}">${element.TenSize} - ${element.TenDe}</option>`
                    })
                    combobox.innerHTML = html;
                    // get selected combobox and load gia nhap gia xuat
                   
                    var comboboxz = document.querySelector('#product-item');
                    listItem.forEach(element => {
                        console.log("es")
                        if (element.MaSize + element.MaDe == comboboxz.value) {
                            document.querySelector('#product-price').value = element.GiaNhap;
                            document.querySelector('#product-pricesell').value = element.GiaBan;
                            // dissabled
                            document.querySelector('#product-price').disabled = true;
                            document.querySelector('#product-pricesell').disabled = true;
                        }
                    })
                }
            });
            document.querySelector('#product-price').value = '';
            document.querySelector('#product-pricesell').value = '';
            document.querySelector('#product-quantity').value = '';
        })
    })
}

function addeventonchangecombobox() {
    var combobox = document.querySelector('#product-item');
    combobox.addEventListener('change', function() {
        // traverse list item and get price
        listItem.forEach(element => {
            console.log(element)
            if (element.MaSize + element.MaDe == combobox.value) {

                document.querySelector('#product-price').value = element.GiaNhap;
                document.querySelector('#product-pricesell').value = element.GiaBan;
                // dissabled
                document.querySelector('#product-price').disabled = true;
                document.querySelector('#product-pricesell').disabled = true;
            }
        })
    })

}

function addeventThempn() {
    var btnThem = document.querySelector('.addphieunhap');
    btnThem.addEventListener('click', function(e) {
        e.preventDefault();
        var flag = 0;
        document.querySelectorAll('.productClicked').forEach(element => {
            if (element.classList.contains('black')) {
                flag = 1;
            }
        })
        if (flag == 0) {
            createToast('error', 'Vui lòng chọn sản phẩm cần nhập!');
            return;
        }
        var masp = document.querySelector('#product-name').value.split(' - ')[0];
        var tensp = document.querySelector('#product-name').value.split(' - ')[1]
        var masize = document.querySelector('#product-item').value[0];
        var made = document.querySelector('#product-item').value[1];
        var soluong = document.querySelector('#product-quantity').value;
        var giaban = document.querySelector('#product-pricesell').value;
        var gianhap = document.querySelector('#product-price').value;
        if (masp == '' || masize == '' || made == '' || soluong == '') {
            createToast('error', 'Vui lòng nhập đủ thông tin phiếu nhập!');
            return;
        }
        // giá nhập và giá bán phải là số
        if (isNaN(gianhap) || isNaN(giaban)) {
            createToast('error', 'Giá nhập và giá bán phải là số!');
            return;
        }
        if (parseFloat(gianhap) >= parseFloat(giaban)) {
            createToast('error', 'Giá nhập phải nhỏ hơn giá bán!');
            return;
        }
        //số lượng là số
        if (isNaN(soluong)) {
            createToast('error', 'Số lượng phải là số!');
            return;
        }
        // số lượng phải là số nguyên dương
        if (soluong <= 0) {
            createToast('error', 'Số lượng phải là số nguyên dương!');
            return;
        }
        // gias nhap va gia ban phai > 0
        if (parseFloat(gianhap) <= 0 || parseFloat(giaban) <= 0) {
            createToast('error', 'Giá nhập và giá bán phải lớn hơn 0!');
            return;
        }
        // check xem sản phẩm đã tồn tại trong list chưa
        var flag = 0;
        listCTPN.forEach(element => {
            if (element.MaSP == masp && element.MaSize == masize && element.MaDe == made) {
                createToast('error', 'Sản phẩm đã tồn tại trong danh sách!');
                flag = 1;
            }
        })
        if (flag == 1) {
            return;
        }
        listCTPN.push({
            "MaSP": masp,
            "TenSP": tensp,
            "MaSize": masize,
            "MaDe": made,
            "SoLuong": soluong,
            "TenSize": document.querySelector('#product-item').options[document.querySelector('#product-item').selectedIndex].text.split(' - ')[0],
            "TenDe": document.querySelector('#product-item').options[document.querySelector('#product-item').selectedIndex].text.split(' - ')[1],
            "GiaNhap": document.getElementById('product-price').value,
            "GiaBan": document.getElementById('product-pricesell').value
        })
        loadTablepn();

    })

}

function loadTablepn() {
    var divtable = document.querySelector('.rowtable');
    var html = '';
    listCTPN.forEach((element,index) => {
        html += `<tr class="rowdetail" value="${index}">
                    <td>${element.MaSP}</td>
                    <td>${element.TenSP}</td>
                    <td>${element.TenSize}</td>
                    <td>${element.TenDe}</td>
                    <td>${element.GiaNhap}</td>
                    <td>${element.GiaBan}</td>
                    <td>${element.SoLuong}</td>
                </tr>`
    })
    divtable.innerHTML = html;
    // update giá tiền
    sum = 0;
    console.log(listCTPN);
    listCTPN.forEach(element => {
        sum += parseFloat(element.GiaNhap) * parseFloat(element.SoLuong);
    })
    document.querySelector('.tongtienpn').innerHTML = toVND(sum);

    addeventclickdetail();
}

function addeventclickdetail() {
    var rowdetail = document.querySelectorAll('.rowdetail');
    rowdetail.forEach((element, index) => {
        element.addEventListener('click', function() {
            document.querySelectorAll('.productClicked').forEach(element => {
                element.classList.remove('black');
            })
            var index = element.getAttribute('value');

            rowdetail.forEach(element => {
                if (element.classList.contains('black')) {
                    element.classList.remove('black');
                }
                if (element.querySelectorAll('td')[0].innerHTML == listCTPN[index].MaSP && element.querySelectorAll('td')[2].innerHTML == listCTPN[index].TenSize && element.querySelectorAll('td')[3].innerHTML == listCTPN[index].TenDe) {
                    element.classList.add('black');
                }   
            })

            document.querySelector('#product-name').value = listCTPN[index].MaSP + ' - ' + listCTPN[index].TenSP;
            document.querySelector('#product-name').disabled = true;
            document.querySelector('#product-item').value = listCTPN[index].MaSize + listCTPN[index].MaDe;
            document.querySelector('#product-price').value = listCTPN[index].GiaNhap;
            document.querySelector('#product-pricesell').value = listCTPN[index].GiaBan;
            document.querySelector('#product-quantity').value = listCTPN[index].SoLuong;

   
        })
    })
}

function loadmaphieunhap() {
    $.ajax({
        url: './controller/ImportController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'getMaPNnew'
        },
        success: function(data) {
            if (data.length == 0) document.querySelector('#import-id').value = 1;
            else document.querySelector('#import-id').value = parseInt(data[data.length - 1].mapn) + 1; 
            document.querySelector('#import-id').disabled = true;
            removeloader();
        }
    })
}

function thempn(e) {
    e.preventDefault();
    // get current date and time
    var date = new Date();
    var curdate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
    var curtime = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    var date = curdate + ' ' + curtime;
    // tinh sum gia nhap
    sum = 0;
    listCTPN.forEach(element => {
        sum += parseInt(element.GiaNhap) * parseInt(element.SoLuong);
    })
    $.ajax({
        url: './controller/ImportController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'themphieunhap',
            MaPN: document.querySelector('#import-id').value,
            listCTPN: listCTPN,
            date: date,
            dongia: sum
        },
        success: function(data) {
            if (data) {
                createToast('success', 'Thêm phiếu nhập thành công!');
                //remove claass open

                document.querySelector('.modal.add-import').classList.remove('open');
            }
        }
    })
}

function addeventsuapn() {
    document.querySelector('.suapn').addEventListener('click', function(e) {
        e.preventDefault();
        var flag = 0;
        var masp = document.querySelector('#product-name').value.split(' - ')[0];
        var tensp = document.querySelector('#product-name').value.split(' - ')[1]
        var masize = document.querySelector('#product-item').value[0];
        var made = document.querySelector('#product-item').value[1];
        var soluong = document.querySelector('#product-quantity').value;
        var giaban = document.querySelector('#product-pricesell').value;
        var gianhap = document.querySelector('#product-price').value;
        document.querySelectorAll('.rowdetail').forEach(element => {
            if (element.classList.contains('black')) {
                flag = 1;
            }
        })
        if (flag == 0) {
            createToast('error', 'Vui lòng chọn sản phẩm cần sửa!');
            return;
        }    
        // sua
        if (masp == '' || masize == '' || made == '' || soluong == '') {
            createToast('error', 'Vui lòng nhập đủ thông tin phiếu nhập!');
            return;
        }
        // giá nhập và giá bán phải là số
        if (isNaN(gianhap) || isNaN(giaban)) {
            createToast('error', 'Giá nhập và giá bán phải là số!');
            return;
        }
        if (parseFloat(gianhap) >= parseFloat(giaban)) {
            createToast('error', 'Giá nhập phải nhỏ hơn giá bán!');
            return;
        }
        //số lượng là số
        if (isNaN(soluong)) {
            createToast('error', 'Số lượng phải là số!');
            return;
        }
        // số lượng phải là số nguyên dương
        if (soluong <= 0) {
            createToast('error', 'Số lượng phải là số nguyên dương!');
            return;
        }

        var index;
        document.querySelectorAll('.rowdetail').forEach((element, i) => {
            if (element.classList.contains('black')) {
                index = i;
            }
        })

        var masp = document.querySelector('#product-name').value.split(' - ')[0];
        var tensp = document.querySelector('#product-name').value.split(' - ')[1]
        var masize = document.querySelector('#product-item').value[0];
        var made = document.querySelector('#product-item').value[1];
        var soluong = document.querySelector('#product-quantity').value;
        var giaban = document.querySelector('#product-pricesell').value;
        var gianhap = document.querySelector('#product-price').value;
        if (masp == '' || masize == '' || made == '' || soluong == '') {
            createToast('error', 'Vui lòng nhập đủ thông tin phiếu nhập!');
            return;
        }

        if (parseFloat(gianhap) >= parseFloat(giaban)) {
            createToast('error', 'Giá nhập phải nhỏ hơn giá bán!');
            return;
        }

        listCTPN[index] = {
            "MaSP": masp,
            "TenSP": tensp,
            "MaSize": masize,
            "MaDe": made,
            "SoLuong": soluong,
            "TenSize": document.querySelector('#product-item').options[document.querySelector('#product-item').selectedIndex].text.split(' - ')[0],
            "TenDe": document.querySelector('#product-item').options[document.querySelector('#product-item').selectedIndex].text.split(' - ')[1],
            "GiaNhap": parseFloat(document.getElementById('product-price').value),
            "GiaBan": parseFloat(document.getElementById('product-pricesell').value)
        }
        loadTablepn();
    })

}



function addeventxoapn() {
    document.querySelector('.btn-control-large.item-3').addEventListener('click', function(e) {
        e.preventDefault();
        var flag = 0;
        document.querySelectorAll('.rowdetail').forEach(element => {
            if (element.classList.contains('black')) {
                flag = 1;
            }
        })
        if (flag == 0) {
            createToast('error', 'Vui lòng chọn sản phẩm cần xóa!');
            return;
        }
        var index;
        document.querySelectorAll('.rowdetail').forEach((element, i) => {
            if (element.classList.contains('black')) {
                index = i;
            }
        })
        sum -= parseInt(listCTPN[index].GiaNhap) * parseInt(listCTPN[index].SoLuong);
        document.querySelector('.tongtienpn').innerHTML = toVND(sum);
        listCTPN.splice(index, 1);
        loadTablepn();
    })
}

function loadcomboboxnhanvien() {
    $.ajax({
        url: './controller/StaffManagementController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'getDSNV'
        },
        success: function(data) {
           var html = "<option value=''>Chọn nhân viên</option>";
           data.forEach(element => {
               html += `<option value="${element.MaNV}">${element.Ho + ' ' + element.Ten}</option>`
           })
           document.querySelector('#nhan_vien_nhap').innerHTML = html;
        }
    })

}

function loaddsphieunhapz(data) {
    var div = document.querySelector('.rowtablePX');
    var html = '';  
    data.forEach(element => {
        html += `<tr value="${element.MaPN}">
        <td>${element.MaPN}</td>
                    <td>${element.Ho + "  " + element.Ten}</td>
                    <td>${toVND(element.DonGia)}</td>
                    <td>${element.NgayNhap}</td>
                </tr>`
    })
 
    div.innerHTML = html;
    addeventclickdetail();  
}

function addeventtimkiemnangcao() {
    document.querySelector('.timkiemnangcao').addEventListener('click', function(e) {
        e.preventDefault();
        var manv = document.querySelector('#nhan_vien_nhap').value;
        var ngaybd = document.querySelector('#ngay_nhap_tu_ngay').value;
        var ngaykt = document.querySelector('#ngay_nhap_den_ngay').value;
        var giafrom = document.querySelector('.giatu').value;
        var giato = document.querySelector('.giaden').value;
        $.ajax({
            url: './controller/ImportController.php',
            type: 'POST',
            dataType: 'json',
            data: {
                request: 'timkiemnangcao',
                manv: manv,
                ngaybd: ngaybd,
                ngaykt: ngaykt,
                giafrom: giafrom,
                giato: giato
            },
            success: function(data) {
                loaddsphieunhapz(data);
            },
        })
            
    })
}