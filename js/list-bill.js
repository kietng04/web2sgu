const productDetails = document.querySelector('.container-bill');
const closeDetail = document.querySelectorAll('.fa-xmark');
const showBillButtons = document.querySelectorAll('.show-detail');
const darkOverlay = document.querySelector('.dark-overlay');

showBillButtons.forEach(button => {
  button.addEventListener('click', function() {
    productDetails.classList.remove("hide");
    darkOverlay.style.display = 'block';
  })
})

closeDetail.forEach(button => {
  button.addEventListener('click', function() {
    productDetails.classList.add("hide");
    darkOverlay.style.display = 'none';
  })
})
loadtable();

// load lich su don hang
function loadtable() {
    activeloader();
    $.ajax({  
        url: './controller/HistoryBillController.php',
        type: 'POST',
        dataType: 'json',
        data: {
        request: 'getHistoryBill'
        },
        success: function(data) {
          console.log(data);
          var html = "";
          // traverse data
          data.forEach((element) => {
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
          });

          document.querySelector('.rowtable').innerHTML = html;
          addeventdetailorder();
          removeloader();
        }
    })
}

function addeventdetailorder() {
  var detaillist = document.querySelectorAll('.show-detail');
  detaillist.forEach((element) => {
    element.addEventListener('click', function() {
      // get value attribute
      var mahd = element.getAttribute('value');
      loadDetailBill(mahd);
    })
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
    success: function(data) {
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
    }
  })
}