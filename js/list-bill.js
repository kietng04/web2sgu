const productDetails = document.querySelector('.container-bill');
const closeDetail = document.querySelectorAll('.fa-xmark');
const showBillButtons = document.querySelectorAll('.show-detail');
const darkOverlay = document.querySelector('.dark-overlay');

showBillButtons.forEach(button => {
  button.addEventListener('click', function () {
    productDetails.classList.remove("hide");
    darkOverlay.style.display = 'block';
  })
})

closeDetail.forEach(button => {
  button.addEventListener('click', function () {
    productDetails.classList.add("hide");
    darkOverlay.style.display = 'none';
  })
})
var User;

let tried_queryz="";
let length=0;
var listOrder = [];
var backup_data = [];

loadtable();

// load lich su don hang
function loadtable() {
$.ajax({  
        url: './controller/HistoryBillController.php',
        type: 'POST',
        dataType: 'json',
        data: {
        request: 'getHistoryBill'
        },
        success: function(data) {
          console.table(data);
          listOrder=data;
          backup_data=data;
          renderTable();
          addEventSearch();
          if (data.length > 0) {
            let MaND = data[0].MaND; // Assign value to MaND
             tried_queryz="SELECT * FROM `HoaDon` where MaND='"+MaND+"'";
          }
          addeventdetailorder();
          removeloader();
          render_page_li(Math.ceil(data.length/4));
          length=Math.ceil(data.length/4);
        }
    })
}


function renderTable() {
  let data=listOrder;
  console.log(data);  
  var html = "";
  // traverse data
  data.slice(data.length-4,data.length).reverse().forEach((element) => {
    html += `<tr>
    <td>${element.MaHD}</td>
    <td>${element.NgayLap}</td>`;
    // parse element.TrangThai to int
    switch(element.TrangThai) {
      case '0': 
        html += `<td>Đang chờ xác nhận</td>`;
        break;
      case '1':
        html += `<td>Đã xác nhận</td>`;
        break;
      case '2':
        html += `<td>Đang giao hàng</td>`;
        break;
      case '3':
        html += `<td>Đã giao hàng</td>`;
        break;
      default:
        html += `<td>Đã hủy</td>`;
        break;
    }
    html += `<td>${toVND(element.TongTien)}</td>
    <td><button class="show-detail" value="${element.MaHD}">Xem chi tiết</button></td>
    </tr>`;
  })
  document.querySelector('.rowtable').innerHTML = html;
}


function loadtablez(data) {
  var html = "";
  // traverse data
  data.forEach((element) => {
    console.log(element.MaND)
    html += `<tr>
            <td>${element.MaHD}</td>
            <td>${element.NgayLap}</td>`;
    // parse element.TrangThai to int
    switch (element.TrangThai) {
      case '0':
        html += `<td>Đang chờ xác nhận</td>`;
        break;
      case '1':
        html += `<td>Đã xác nhận</td>`;
        break;
      case '2':
        html += `<td>Đang giao hàng</td>`;
        break;
      case '3':
        html += `<td>Đã giao hàng</td>`;
        break;
      default:
        html += `<td>Đã hủy</td>`;
        break;
    }
    html += `<td>${toVND(element.TongTien)}</td>
            <td><button class="show-detail" value="${element.MaHD}">Xem chi tiết</button></td>
        </tr>`;
  })
  document.querySelector('.rowtable').innerHTML = html;
  addeventdetailorder();
  removeloader();


}

function render_page_li(totalPage) {
  console.log("nhan vao render_page_li")
  if (totalPage <= 1) totalPage = 0;
  var html = "";
  for (var i = 1; i <= totalPage; i++) {
    if (i == 1) {
      html += `<li class="page-item " onclick="ajaxrow(${i},this)" ><a  class="page-link">${i}</a></li>`;
    } else {
      html += `<li class="page-item " onclick="ajaxrow(${i},this)" ><a  class="page-link">${i}</a></li>`;
    }

  }
  document.querySelector(".pagination").innerHTML = html;

}


function ajaxrow(page, currentpage) {
  let currentqueryz = tried_queryz;
  console.log("nhan vao ajaxrow", currentqueryz);
  let currentPagez = 1;
  currentPagez = page;
  if (currentpage.previousElementSibling) {
    currentpage.previousElementSibling.classList.remove('--active');
  }
  if (currentpage.nextElementSibling) {
    currentpage.nextElementSibling.classList.remove('--active');
  }
  currentpage.classList.add('--active');
  $.ajax({
    url: "./controller/HistoryBillController.php",
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
      loadtablez(data);
    },
    error: function () {
      alert("del duoc roi oniichan");
    },
  });
  console.log(length)
  render_page_li(length)
}





function addeventdetailorder() {
  var detaillist = document.querySelectorAll('.show-detail');
  detaillist.forEach((element) => {
    element.addEventListener('click', function () {
      // get value attribute
      var mahd = element.getAttribute('value');
      loadcustomer_detail(mahd);
      loadDetailBill(mahd);
    })
  })
}

function getTrangthai(TrangThai){
  var string_trangthai = "";
  switch(TrangThai) {
    case '0': 
      string_trangthai = "Đang chờ xác nhận";
      break;
    case '1':
      string_trangthai = "Đã xác nhận";
      break;
    case '2':
    string_trangthai = "Đang giao hàng";
      break;
    case '3':
      string_trangthai = "Đã giao hàng";
      break;
    default:
      string_trangthai = "Đã hủy";
      break;
  }
  return string_trangthai;
}


function loadcustomer_detail(mand){
  $.ajax({
    url: './controller/BillManagementController.php',
    type: 'POST',
    dataType: 'json',
    data: {
      request: 'loadDetail_Customer_Order',
      mahd: mand
    },
    success: function(data) {
      console.log(data);
      document.querySelector('#ma-don-hang').innerHTML = "DH" + (data[0].MaHD < 10 ? "0" : "") + data[0].MaHD;
      document.querySelector('#ngay-dat-hang').innerHTML = data[0].NgayLap;
      document.querySelector('#trang-thai').innerHTML =getTrangthai(data[0].TrangThai);
      document.querySelector('#ho-ten').innerHTML = data[0].Ho+" "+data[0].Ten;
      document.querySelector('#so-dien-thoai').innerHTML = data[0].SDT;
      document.querySelector('#dia-chi').innerHTML = data[0].DiaChi;
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    }
  })

}



function loadDetailBill(mahd) {
  // activeloader();
  $.ajax({
    url: './controller/HistoryBillController.php',
    type: 'POST',
    dataType: 'json',
    data: {
      request: 'getDetailBill',
      mahd: mahd
    },
    success: function (data) {
      console.log(data);
      var html = "";
      data.forEach((element, index) => {
        html += `<tr>
        <td>${index + 1}</td>
        <td>
            <img src="${element['Img']}" alt="">
            <br>
            ${element['TenSP']}
        </td>
        <td>${element['SoLuong']}</td>
        <td>${toVND(element['GiaTien'])}</td>
    </tr>`;
      });
      document.querySelector('.dark-overlay.hide').style.display = 'block';
      document.querySelector('.container-bill').classList.remove('hide');
      var div = document.querySelector('.detailorderedrows');
      div.innerHTML = html;
      // removeloader();
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    }

  })
}


function addEventSearch(){
  let search_btn=document.querySelector('#Search');
  search_btn.addEventListener('click',function(e){
    let search_value=e.target.parentElement.parentElement.querySelector('input').value;
    console.log(search_value);  
    searching(search_value);
  })
}
function validate_maHD(search_value){
  if (search_value.startsWith('dh')) {
    search_value = search_value.substring(2);
} else if (search_value.startsWith('đơn hàng ')) {
    search_value = search_value.substring(9);
}
  return search_value;
}

function search_validate(taikhoan, search_value) {
  if (taikhoan.MaHD == parseInt(validate_maHD(search_value))) {
    return true;
  }
    
  if (taikhoan.NgayLap.toLowerCase().includes(search_value)) {
    return true;
  }
   if (taikhoan.MaND.toLowerCase().includes(search_value)) {
    return true;
  }
  if (getTrangthai(taikhoan.TrangThai).toLowerCase().includes(search_value)) {
    return true;
  }
  if (taikhoan.TongTien.toLowerCase().includes(search_value)) {
    return true;
  }
  return false;
}


function searching(search_value){
  let search_value_lwr=search_value.toLowerCase();
  let search_list=[];
  for(let i=0;i<listOrder.length;i++){
      let taikhoan=listOrder[i];
      if(search_validate(taikhoan,search_value_lwr)){
          search_list.push(taikhoan);
      }
  }
  listOrder=search_list;
  console.log(listOrder);
  renderTable();
  addeventdetailorder();
  removeloader();
  render_page_li(Math.ceil(listOrder.length/4));
  listOrder=backup_data;
}

