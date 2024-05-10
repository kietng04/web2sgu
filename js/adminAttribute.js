//ajax
alert("hello");

var listsizesanpham = [];
loadsizesanpham();
loadviensanpham();
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
                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                    <button class="btn-delete" id="btnXoaSize"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;
      });

        document.getElementById("show-size").innerHTML = html;
        clickSuaSize();
        onClickXoaSize();
        
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
                    <button class="btn-edit" id="edit-account"><i class="fa-regular fa-pen-to-square" aria-hidden="true"></i></button>
                    <button class="btn-delete" id="delete-account"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </td>
                
            </tr>`;
      });
      document.getElementById("show-vien").innerHTML = html;
      clickSuaSize();
    },
  });
}



var btnSuaSize = "";
function clickSuaSize() {
    alert("aa");
    btnSuaSize = document.getElementsByClassName("btn-edit");
    [...btnSuaSize].forEach(function (item) {
      item.addEventListener("click", function () {
          var modal = document.querySelector(".modal.signup");
          modal.classList.add("open");
          var masize = item.parentElement.parentElement.children[0].textContent;
          var tensize = item.parentElement.parentElement.children[1].textContent;
          var dinhluongsize = item.parentElement.parentElement.children[2].textContent;
          document.getElementById("masize").value = masize;
          document.getElementById("tensize").value = tensize;
          document.getElementById("dinhluongsize").value = dinhluongsize;
          document.getElementById("btnThemSize").style.display = "none";
            document.getElementById("btnSuaSize").style.display = "block";

      });
    });
}
function onClickXoaSize() {
    var btnXoaSize = document.querySelectorAll("#btnXoaSize");
[...btnXoaSize].forEach(function (item) {
    item.addEventListener("click", function () {
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
              alert("oke");
              loadsizesanpham();
            },
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

}
var btnLuuSuaSize = document.getElementById("btnSuaSize");
btnLuuSuaSize.addEventListener("click", function (e) {
    e.preventDefault();
    suaSizeSanPham();
});


function themSizeSanPham() {
    var masize = document.getElementById("masize").value;
    var tensize = document.getElementById("tensize").value;
    var dinhluongsize = document.getElementById("dinhluongsize").value;
    
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
    });
    document.getElementById("masize").value = "";
    document.getElementById("tensize").value = "";
    document.getElementById("dinhluongsize").value = "";

}
  
var btnThemSize = document.getElementById("btnThemSize");
btnThemSize.addEventListener("click", function (e) {
    e.preventDefault();
    themSizeSanPham();
});


{/* <div class="form-group">
<label for="masize" class="form-label">Nhập mã size:</label>
<input id="masize" name="masize" type="text" placeholder="VD: S"
    class="form-control">
<span class="form-message-name form-message"></span>
</div>
<div class="form-group">
<label for="tensize" class="form-label">Nhập tên size:</label>
<input id="tensize" name="tensize" type="text" placeholder="VD: Nhỏ" class="form-control">
<span class="form-message-email form-message"></span>
</div>
<div class="form-group">
<label for="dinhluongsize" class="form-label">Nhập định lượng size:</label>
<input id="dinhluongsize" name="dinhluongsize" type="text" placeholder="VD: Bán kính 15cm" class="form-control">
<span class="form-message-email form-message"></span>
</div> */}