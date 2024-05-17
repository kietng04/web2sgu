var categoryz = [];
var currentPage = 1;
var listProduct = null;
var perPage = 8;

var a;
var b;
var isNhanVien = false;
var currentID;
var ma_quyen;

function loginz() {
  a = document.querySelector("#taikhoan").value;
  b = document.querySelector("#matkhau").value;

  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "dangnhapnguoidung",
      data_username: a,
      data_pass: b,
    },
    success: function (result) {
      if (result != null) {
        alert("Đăng nhập thành công!");
        isNhanVien = 0;
        document.querySelector(".popupLogin").classList.add("--none");
        // Update userModal with the result
        currentID = result[0].MaND;
        document.querySelector("#display_firstname").value = result[0].Ho;
        document.querySelector("#display_lastname").value = result[0].Ten;
        document.querySelector("#display_email").value = result[0].Email;
        document.querySelector("#display_sdt").value = result[0].SDT;
        document.querySelector("#display_diachi").value = result[0].DiaChi;
        loadSessionCart();

      } else {
        alert("Tên đăng nhập hoặc mật khẩu không đúng!");
      }
    },
  });
}

//vkiet
function logins() {
  var a = document.querySelector("#taikhoans").value;
  var b = document.querySelector("#matkhaus").value;
  alert("a: " + a + " b: " + b);
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "dangnhapnhanvien",
      data_usernames: a,
      data_passs: b,
    },
    success: function (result) {
      if (result != null) {
        alert("Đăng nhập thành công!");
        isNhanVien = 1;
        document.querySelector(".popupLogin").classList.add("--none");
        // Update userModal with the result
        currentID = result[0].MaNV;
        document.querySelector("#display_firstname").value = result[0].Ho;
        document.querySelector("#display_lastname").value = result[0].Ten;
        document.querySelector("#display_email").value = result[0].Email;
        document.querySelector("#display_sdt").value = result[0].SDT;
        document.querySelector("#display_diachi").value = result[0].DiaChi;
        loadSessionCart();
      } else {
        alert("Tên đăng nhập hoặc mật khẩu không đúng!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText);
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      // alert("code nhu cc");
    },
  });
}

function login(
  e,
  a = document.getElementById("username").value,
  b = document.getElementById("passlogin").value
) {
  // e.preventDefault();
  if (a == null || b == null) {
    var a = document.getElementById("username").value;
    var b = document.getElementById("passlogin").value;
  }
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "dangnhapnguoidung",
      data_username: a,
      data_pass: b,
    },
    success: function (result) {
      if (result != null) {
        createToast("success");
        document.querySelector(".container").style.display = "none";
        document.querySelector(".black-bg").style.display = "none";
        updateUI();

        return 1;
      } else {
        createToast("error");
        return 0;
      }
    },
  });
}

function updateInfo() {
  var ho = document.getElementById("display_firstname").value;
  var ten = document.getElementById("display_lastname").value;
  var email = document.getElementById("display_email").value;
  var sdt = document.getElementById("display_sdt").value;
  var diachi = document.getElementById("display_diachi").value;

  // ajax session get current user
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getCurrentUser",
    },
    success: function (data) {
      if (!data) {
        createToast("error", "Vui lòng đăng nhập để cập nhật thông tin!");
        return;
      }
      console.log(data);
      if (data["result"][0]["MaNV"]) currentID = data["result"][0]["MaNV"];
      else currentID = data["result"][0]["MaND"];

      $.ajax({
        url: "./controller/ProductsController.php",
        type: "post",
        dataType: "json",
        timeout: 1500,
        data: {
          request: "updateInfo",
          id: currentID,
          ho: ho,
          ten: ten,
          email: email,
          sdt: sdt,
          diachi: diachi,
        },
        success: function (result) {
          if (result != null) {
            alert("Cập nhật thông tin thành công!");
            // ajax get current user
            if (currentID.includes("NV")) {
              $.ajax({
                type: "POST",
                url: "controller/ProductsController.php",
                dataType: "json",
                timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
                data: {
                  request: "dangnhapnhanvien",
                  data_usernames: a,
                  data_passs: b,
                },
                success: function (data) {
                  console.log(data);
                },
              });
            } else {
              $.ajax({
                type: "POST",
                url: "controller/ProductsController.php",
                dataType: "json",
                timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
                data: {
                  request: "dangnhapnguoidung",
                  data_username: a,
                  data_pass: b,
                },
                success: function (data) {
                  console.log(data);
                },
              });
            }
          } else {
            alert("Cập nhật thông tin thất bại!");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: ", jqXHR.responseText);
          console.log("Status: ", textStatus);
          console.log("Error: ", errorThrown);
          // alert("code nhu cc");
        },
      });
    },
  });
}

var btn_updateinfo = document.querySelector("#update-info");
var sdtFormItem = document.querySelector("#display_sdt");
//var sdtError = document.querySelector("#sdt-error"); // Thay đổi này dựa trên id của phần tử hiển thị lỗi
var checkSdt = true; // Giả sử ban đầu không có lỗi

if (btn_updateinfo != null) {
  btn_updateinfo.addEventListener("click", function (event) {
    // Ngăn chặn hành động mặc định của sự kiện
    event.preventDefault();

    var phone = sdtFormItem.value;
    var address = document.querySelector("#display_diachi").value;

    var phoneRegex = /^0\d{9}$/;
    if (!phoneRegex.test(phone)) {
      alert("Số điện thoại không hợp lệ.");
      checkSdt = false;
    } else if (address.length <= 6) {
      alert("Địa chỉ phải có nhiều hơn 6 ký tự.");
    } else {
      // Kiểm tra số điện thoại đã tồn tại hay chưa
      $.ajax({
        url: './controller/SignUpController.php',
        type: 'POST',
        data: {
          request: 'checksdt',
          sdt: phone,
        },
        success: function (data) {
          var parsedData = JSON.parse(data);
          var phoneExists = parsedData.some(function (user) {
            return user.SDT === phone;
          });

          if (phoneExists) {
            alert("Số điện thoại đã tồn tại.");
            checkSdt = false;
            sdtFormItem.focus();
          } else {
            checkSdt = true;
            // Nếu tất cả các điều kiện đều đúng, thực hiện cập nhật thông tin
            updateInfo();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: ", jqXHR.responseText);
          console.log("Status: ", textStatus);
          console.log("Error: ", errorThrown);
          // alert("code nhu cc");
        }
      });
    }
  });
}

function updateUI() {
  getCurrentUser((data) => {
    if (data) {
      document.querySelector(".xinchao").innerHTML =
        "Xin chào" + data[0]["Ten"];
      createToastWithMes(
        "fa-face-smile",
        "Chào mừng quay trở lại, " + data[0]["Ho"] + " " + data[0]["Ten"] + "!",
        "info"
      );
      document.querySelector(".fa.fa-user").style.display = "none";
      document.querySelector(".fa.fa-sign-out").style.display = "block";
      initlize();
    } else {
      document.querySelector(".fa.fa-user").style.display = "block";
      document.querySelector(".fa.fa-sign-out").style.display = "none";
      document.querySelector(".xinchao").innerHTML = "";
    }
  });
}
function getCurrentUser(callbackFunc) {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
    data: {
      request: "getCurrentUser",
    },
    success: function (data) {
      if (callbackFunc) callbackFunc(data);
    },
  });
}
function initlize() {
  document
    .querySelector(".fa.fa-sign-out")
    .addEventListener("click", function () {
      $.ajax({
        type: "POST",
        url: "controller/ProductsController.php",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
          request: "logout",
        },
        success: function (data) {
          if (data) {
            createToastWithMes("fa-face-sad-cry", "Hẹn gặp lại bạn!", "error");
            updateUI();
          }
        },
      });
    });
}

function signup(e) {
  e.preventDefault();
  $.ajax({
    url: "controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "dangky",
      data_ho: document.getElementById("lastName").value,
      data_ten: document.getElementById("firstName").value,
      data_sdt: document.getElementById("phone").value,
      data_email: document.getElementById("email").value,
      data_diachi: document.getElementById("address").value,
      data_newUser: document.getElementById("name").value,
      data_newPass: document.getElementById("pass").value,
      data_gioitinh: document.getElementById("sexial").value,
    },
    success: function (kq) {
      if (kq != null) {
        login(
          e,
          document.getElementById("name").value,
          document.getElementById("pass").value
        );
      }
    },
  });
}

function FormValidate(e) {
  var name = document.getElementById("name").value;

  var errorName = document.getElementById("errorName");
  var regexName = /^KH(\d{3})$/;

  var phone = document.getElementById("phone").value;
  var errorPhone = document.getElementById("errorPhone");
  var regexPhone = /^0(\d{9}|9\d{8})$/;

  var email = document.getElementById("email").value;
  var errorEmail = document.getElementById("errorEmail");
  var reGexEmail = /\S+@\S+\.\S+/;

  var passW = document.getElementById("pass").value;
  var errorPass = document.getElementById("errorPass");
  var reGexPass = /.{8,}/;

  var ConPass = document.getElementById("passw").value;
  var errorConPass = document.getElementById("errorConPass");

  var lastName = document.getElementById("lastName").value;
  var errorLastName = document.getElementById("errorLastName");

  var firstName = document.getElementById("firstName").value;
  var errorFirstName = document.getElementById("errorFirstName");

  var address = document.getElementById("address").value;
  var errorAddress = document.getElementById("errorAddress");

  var sexial = document.getElementById("sexial").value;
  var errorSexial = document.getElementById("errorSexial");

  //xét thành rỗng lúc đầu    errorLastName.innerHTML = '';
  errorFirstName.innerHTML = "";
  errorAddress.innerHTML = "";
  errorName.innerHTML = "";
  errorPhone.innerHTML = "";
  errorEmail.innerHTML = "";
  errorPass.innerHTML = "";
  errorConPass.innerHTML = "";
  errorSexial.innerHTML = "";

  if (lastName == "" || lastName == null) {
    errorLastName.innerHTML = "Họ không được để trống!";
    document.getElementById("lastName").focus();
  } else {
    errorLastName.innerHTML = "";
  }

  if (firstName == "" || firstName == null) {
    errorFirstName.innerHTML = "Tên không được để trống!";
    document.getElementById("firstName").focus();
  } else {
    errorFirstName.innerHTML = "";
  }

  if (address == "" || address == null) {
    errorAddress.innerHTML = "Địa chỉ không được để trống!";
    document.getElementById("address").focus();
  } else {
    errorAddress.innerHTML = "";
  }

  if (name == "" || name == null) {
    errorName.innerHTML = "Tên tài khoản không được để trống!";
    document.getElementById("name").focus();
  } else if (!regexName.test(name)) {
    errorName.innerHTML =
      "Tên tài khoản bắt đầu bằng kí tư KH và 3 chữ số (Vd: KH001)!";
    // return false;
  } else {
    errorName.innerHTML = "";
  }

  if (phone == "" || phone == null) {
    errorPhone.innerHTML = "Số điện thoại không được để trống!";
  } else if (!regexPhone.test(phone)) {
    errorPhone.innerHTML = "Số điện thoại không hợp lệ!";
    // return false;
  } else {
    errorPhone.innerHTML = "";
  }

  if (email == "" || email == null) {
    errorEmail.innerHTML = "Email không được để trống!";
  } else if (!reGexEmail.test(email)) {
    errorEmail.innerHTML = "Email không hợp lệ!";
    email = "";
  } else {
    errorEmail.innerHTML = "";
  }

  if (passW == "" || passW == null) {
    errorPass.innerHTML = "Mật khẩu vui lòng không để trống!";
  } else if (!reGexPass.test(passW)) {
    errorPass.innerHTML = "Pass tối thiểu 8 kí tự!";
    // return false;
  } else {
    errorPass.innerHTML = "";
  }

  if (ConPass == "" || ConPass == null) {
    errorConPass.innerHTML = "Xác nhận mật khẩu vui lòng không để trống!";
  } else if (ConPass != passW) {
    errorConPass.innerHTML = "Xác nhận mật khẩu không trùng khớp!";
  } else {
    errorConPass.innerHTML = "";
  }

  if (sexial == "" || sexial == null) {
    errorSexial.innerHTML = "Giới tính không được để trống!";
    document.getElementById("sexial").focus();
  } else if (
    !(sexial.toLowerCase() === "nam" || sexial.toLowerCase() === "nu")
  ) {
    errorSexial.innerHTML = 'Giới tính vui lòng nhập "Nam" hoặc "Nu"';
    document.getElementById("sexial").focus();
    return false;
  }

  if (
    name &&
    phone &&
    email &&
    ConPass &&
    passW &&
    passW == ConPass &&
    firstName &&
    lastName &&
    sexial &&
    address
  ) {
    // Người dùng đã nhập đúng thông tin
    //xét thành rỗng lúc đầu
    errorLastName.innerHTML = "";
    errorFirstName.innerHTML = "";
    errorAddress.innerHTML = "";
    errorName.innerHTML = "";
    errorPhone.innerHTML = "";
    errorEmail.innerHTML = "";
    errorPass.innerHTML = "";
    errorConPass.innerHTML = "";
    errorSexial.innerHTML = "";
    signup(e);
    return true;
  } else {
  }

  return false;
}

function filterCategory(category) {
  categoryz.push(category);
  $.ajax({
    url: "./controller/ProductsController.php",
    type: "post",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getProductByFilters",
      category: category,
    },
    success: function (result) {
      listProduct = result;
      currentPage = 1;
      showProducts();
    },
  });
}

function showProducts() {
  var html = "";
  // remove duplicate
  for (var i = 0; i < listProduct.length; i++) {
    for (var j = i + 1; j < listProduct.length; j++) {
      if (listProduct[i].MaSP == listProduct[j].MaSP) {
        listProduct.splice(j, 1);
        j--;
      }
    }
  }
  console.log(listProduct);

  listProduct.forEach(function (item) {
    html += `<div class="scproducts__list-item" value="${item.MaSP}">
     <div class="top">
         <div class="img">
        <img src="${item.Img}" alt="">
            
    </div>
         <p class="title">${item.TenSP}</p>
     </div>
     <div class="content">
         <p class="desc">${item.Mota}</p>
         <button class="btn__buy">
             <p class="chon">CHỌN</p>
         </button>
     </div>
 </div>`;
  });
  document.querySelector(".scproducts__list").innerHTML = html;
  addEventProducts();
}

function addeventbutbtn() {
  var btn = document.querySelector(".btn.--add");

  btn.addEventListener("click", function () {
    if (
      document.querySelector(".popup .btn.--add").style.backgroundColor ==
      "rgb(204, 204, 204)"
    ) {
      alert("Lỗi!");
    }

    $.ajax({
      type: "POST",
      url: "controller/ProductsController.php",
      dataType: "json",
      timeout: 1500,
      data: {
        request: "getProductDetailID",
        id: document.querySelector(".btn.--add").getAttribute("value"),
        idsize: document
          .querySelector(".box__item.--kt.--active p")
          .getAttribute("value"),
        idcrust: document
          .querySelector(".box__item.--de.--active p")
          .getAttribute("value"),
      },

      success: function (data) {
        curProduct = data;
        $.ajax({
          type: "POST",
          url: "controller/ProductsController.php",
          dataType: "json",
          timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
          data: {
            request: "getCurrentUser",
          },
          // data se bao gom user hientai va gio hang hientai
          success: function (data) {
            // hide load ico
            if (curProduct.SoLuong == 0) {
              createToast("error", "Sản phẩm đã hết hàng!");
              return;
            }
            var html = "";
            var cartdiv = document.querySelector(".list");

            if (data) {
              data["cart"] == null ? (data["cart"] = []) : data["cart"];
              // check current product in cart
              if (findProductInCart(data["cart"], curProduct)) {
                // increase quantity
                data["cart"].forEach(function (item) {
                  if (item["Product"].MaSP == curProduct.MaSP) {
                    item["Quantity"] = parseInt(item["Quantity"]) + 1;
                  }
                });
              } else {
                // create arrray with 1 product and quantity
                var cart = { Product: curProduct, Quantity: 1 };
                data["cart"].push(cart);
              }
              data["cart"].forEach(function (item, index) {
                html += `<div class="list__item data-index="${index}">
                <div class="img">
                <img src="${item["Product"].Img}" alt="">
                </div>
                <div class="content">
                    <p class="title">${item["Product"].TenSP}</p>
                    <p class="desc">Size: ${mapsize.get(
                  item["Product"].MaSize
                )} - Đế: ${mapde.get(item["Product"].MaVien)}</p>
                    <p class="price">${toVND(item["Product"].GiaTien)}</p>
                </div>
                
                <div class="buttons_added">
                <input class="minus is-form" type="button" value="-" onclick="decreasingNumber(this, ${index})">
                <input class="input-qty" max="100" min="1" name="" type="number" value="${item["Quantity"]
                  }" oninput="addeventinput()">
                <input class="plus is-form" type="button" value="+" onclick="increasingNumber(this, ${index})">
                </div>
                <i class="fa-solid fa-xmark" data-index="${index}" onclick="removeItemFromCart(this.getAttribute('data-index'))"></i>
              </div>`;
              });
              cartdiv.innerHTML = html;
              saveSessionCart(data["cart"]);
            } else {
              alert("Vui lòng đăng nhập để thêm vào giỏ hàng!");
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX error: " + textStatus + " : " + errorThrown);
          },
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX error: " + textStatus + " : " + errorThrown);
      },
    });
    // show load icon
    // ajax get current product
  });
}

/*============================ cart ===============================*/

var mapsize = new Map();
mapsize.set("S", "Nhỏ");
mapsize.set("M", "Vừa");
mapsize.set("L", "Lớn");

var mapde = new Map();
mapde.set("D", "Dày");
mapde.set("M", "Mỏng");
mapde.set("V", "Vừa");

function saveSessionCart(value) {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "saveSessionCart",
      cart: value,
    },
    success: (data) => {
      console.log(data);
      totalPrice();
    },
  });
}

if (document.querySelector(".btnCloseAllCart") != null) {
  document
    .querySelector(".btnCloseAllCart")
    .addEventListener("click", function () {
      $.ajax({
        type: "POST",
        url: "controller/ProductsController.php",
        dataType: "json",
        timeout: 1500,
        data: {
          request: "getCurrentUser",
        },
        success: (data) => {
          data["cart"] = [];
          var cartdiv = document.querySelector(".list");
          cartdiv.innerHTML = "";
          document.querySelector(".totalPrice").innerHTML = "";
          saveSessionCart(data["cart"]);
        },
      });
    });
}

function loadSessionCart() {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getCurrentUser",
    },
    success: function (data) {
      console.log(data);
      // hide load icon

      if (data && data["cart"] == null) {
        data["cart"] = [];
        document.querySelector(".totalPrice").innerHTML = "";
      } else {
      }
      var cartdiv = document.querySelector(".list");
      var html = "";

      if (data) {
        a = data["result"][0].TaiKhoan;
        b = data["result"][0].MatKhau;
        currentID = data["result"][0].MaND;
        if (currentID == null) currentID = data["result"][0].MaNV;
        alert(currentID);
        data["cart"].forEach(function (item, index) {
          html += `<div class="list__item data-index="${index}">
            <div class="img">
                <img src="${item["Product"].Img}" alt="">
            </div>
            <div class="content">
                <p class="title">${item["Product"].TenSP}</p>
                <p class="desc">Đế: ${mapsize.get(
            item["Product"].MaSize
          )}, Size: ${mapde.get(item["Product"].MaVien)}</p>
                <p class="price">${toVND(item["Product"].GiaTien)}</p>
            </div>
            <div class="buttons_added">
              <input class="minus is-form" type="button" value="-" onclick="decreasingNumber(this, ${index})">
              <input class="input-qty" max="100" min="1" name="" type="number" value="${item["Quantity"]
            }" oninput="addeventinput()">
              <input class="plus is-form" type="button" value="+" onclick="increasingNumber(this,  ${index})">
              </div>
              <i class="fa-solid fa-xmark" data-index="${index}" onclick="removeItemFromCart(this.getAttribute('data-index'))"></i>
            </div>`;
        });
        cartdiv.innerHTML = html;
        console.log(data);
      }
      if (data) {
        document.querySelector(".thanhvien").innerHTML = (
          data["result"][0].Ho +
          " " +
          data["result"][0].Ten
        ).toUpperCase();
        document.querySelector(".login").innerHTML = "Đăng xuất";
        document.querySelector(".view_profile").style.display = "block";
        adminbtn();
        billbtn();
      }
      else {
        document.querySelector(".thanhvien").innerHTML = "KHÁCH";
        document.querySelector(".login").innerHTML = "Đăng nhập";
        document.querySelector(".view_profile").style.display = "none";
        nonbillbtn();
      }

      removeloader();
    },
  });
}

let alertShownz = false;
let alertShownInvalid = false;

function addeventinput() {
  let inputFields = document.querySelectorAll(".input-qty");
  inputFields.forEach((inputField, index) => {
    inputField.addEventListener("input", (event) => {
      let inputValue = event.target.value;
      if (!Number.isInteger(Number(inputValue)) || Number(inputValue) <= 0) {
        if (!alertShownInvalid) {
          alert("Vui lòng nhập số nguyên dương lớn hơn 0!");
          alertShownInvalid = true;
          return (inputField.value = 1);
        }
        return;
      } else {
        alertShownInvalid = false;
      }
      if (inputValue > 100) {
        if (!alertShownz) {
          alert("Số lượng vượt quá giới hạn!");
          alertShownz = true;
          inputField.value = 100;
        }
        return;
      } else {
        alertShownz = false;
      }
      $.ajax({
        type: "POST",
        url: "controller/ProductsController.php",
        dataType: "json",
        timeout: 1500,
        data: {
          request: "getCurrentUser",
        },
        success: function (data) {
          data["cart"][index]["Quantity"] = inputValue;
          saveSessionCart(data["cart"]);
        },
      });
    });
  });
}

function findProductInCart(listCart, curProduct) {
  curProduct.MaSize = document
    .querySelector(".box__item.--kt.--active p")
    .getAttribute("value");
  curProduct.MaVien = document
    .querySelector(".box__item.--de.--active p")
    .getAttribute("value");
  var result = false;
  listCart.forEach(function (item) {
    if (
      item["Product"].MaSP == curProduct.MaSP &&
      item["Product"].MaSize == curProduct.MaSize &&
      item["Product"].MaVien == curProduct.MaVien
    ) {
      result = true;
    }
  });
  return result;
}

function increasingNumber(e, index) {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
    data: {
      request: "getCurrentUser",
    },
    // data se bao gom user hientai va gio hang hientai
    success: function (data) {
      data["cart"][index]["Quantity"]++;
      saveSessionCart(data["cart"]);
      let qty = e.parentNode.querySelector(".input-qty");
      if (parseInt(qty.value) < qty.max) {
        qty.value = parseInt(qty.value) + 1;
        qty.innerHTML = qty.value;
      } else {
        qty.value = qty.max;
        qty.innerHTML = qty.value;
      }
    },
  });
}

function decreasingNumber(e, index) {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getCurrentUser",
    },
    success: (data) => {
      if (data["cart"][index]["Quantity"] > 1) {
        data["cart"][index]["Quantity"]--;
        const qty = e.parentNode.querySelector(".input-qty");
        qty.value = parseInt(qty.value) - 1;
        qty.innerHTML = qty.value;
        saveSessionCart(data["cart"]);
      }
    },
  });
}

function removeItemFromCart(index) {
  index = parseInt(index);
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getCurrentUser",
    },
    success: (data) => {
      data["cart"].splice(index, 1);
      saveSessionCart(data["cart"]);
      loadSessionCart();

      let productElements = document.querySelectorAll(".list__item");
      if (productElements[index]) {
        productElements[index].remove();
      }

      if (data["cart"].length === 0) {
        document.querySelector(".totalPrice").innerHTML = "";
      }
    },
  });
}
function totalPrice() {
  $.ajax({
    type: "POST",
    url: "controller/ProductsController.php",
    dataType: "json",
    timeout: 1500,
    data: {
      request: "getCurrentUser",
    },
    success: (data) => {
      console.log(data);
      if (data === null || data["result"] === null || !data["cart"]) return;
      let totalA = 0;
      data["cart"].forEach((item) => {
        totalA += item["Product"].GiaTien * item["Quantity"];
      });
      document.querySelector(".totalPrice").innerHTML = toVND(totalA);
    },
  });
}

function toVND(money) {
  let nf = new Intl.NumberFormat("en-US");
  return nf.format(money) + "₫";
}

function activeloader() {
  const loader = document.querySelector(".loader");
  loader.classList.remove("loader-hidden");
}

function removeloader(toast) {
  const loader = document.querySelector(".loader");
  loader.classList.add("loader-hidden");
}

// function getThongTinNhanVienByMANV() {
//   $.ajax({
//     url: "./controller/ProductsController.php",
//     type: "post",
//     dataType: "json",
//     timeout: 1500,
//     data: {
//       request: "getThongTinNhanVienByMANV",
//       id: currentID,
//     },
//     success: function (result) {
//       if (result != null) {
//         alert("Lấy thông tin nhân viên thành công!");
//         console.log('result ND :>> ', result);
//         ma_quyen = result[0].PhanQuyen;
//         console.log('ma_quyen :>> ', ma_quyen);
//         getALLChucNangNhomQuyenByMaQuyen();

//       } else {
//         alert("Lỗi khi lấy thông tin nhân viên!");
//       }
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//       console.log("Error: ", jqXHR.responseText);
//       console.log("Status: ", textStatus);
//       console.log("Error: ", errorThrown);
//       alert("code nhu cc");
//     }
//   });
// }

// function getALLChucNangNhomQuyenByMaQuyen() {
//   $.ajax({
//     url: "./controller/ProductsController.php",
//     type: "post",
//     dataType: "json",
//     timeout: 1500,
//     data: {
//       request: "getALLChucNangNhomQuyenByMaQuyen",
//       id: ma_quyen,
//     },
//     success: function (result) {
//       if (result != null) {
//         alert("Lấy thông tin chức năng nhóm quyền thành công!");
//         console.log('allchucnangnhomquyen :>> ', result);
//         list_chucnangnhomquyen = result;
//         console.log('list_chucnangnhomquyen :>> ', list_chucnangnhomquyen);
//         hienThiChucNangByMaQuyen();
//       } else {
//         alert("Lỗi khi lấy thông tin chức năng nhóm quyền!");
//       }
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//       console.log("Error: ", jqXHR.responseText);
//       console.log("Status: ", textStatus);
//       console.log("Error: ", errorThrown);
//       alert("code nhu cc");
//     }
//   });
// }
// function hienThiChucNangByMaQuyen() {
//   alert("hien thi chuc nang by ma quyen");

//   var btn_add_product = document.getElementById('btn-add-product');
//   var btn_edit_product = document.getElementById('btn-edit-product');
//   var btn_delete_product = document.getElementById('btn-delete-product');
//   btn_add_product.display = 'none';
//   btn_edit_product.display = 'none';
//   btn_delete_product.display = 'none';
//   console.log('btn_add_product :>> ', btn_add_product);
// //   list_chucnangnhomquyen.forEach(function (item) {
// //     if (item.MaCN == 'sanpham' && item.hanhdong == 'create') {
// //       btn_add_product.style.display = 'block';
// //     }
// //     // if (item.MaCN == 'sanpham' && item.hanhdong == 'update') {
// //     //   btn_edit_product.style.display = 'block';
// //     // }
// //     // if (item.MaCN == 'sanpham' && item.hanhdong == 'delete') {
// //     //   btn_delete_product.style.display = 'block';
// //     // }

// //   }
// // ,);
// }

function addeventclickxeminfo() {
  // get sesssion
  document
    .querySelector(".view_profile")
    .addEventListener("click", function () {
      $.ajax({
        type: "POST",
        url: "controller/ProductsController.php",
        dataType: "json",
        timeout: 1500,
        data: {
          request: "getCurrentUser",
        },
        success: (data) => {
          if (data) {
            console.log(data);
            currentID = data.result[0].MaND;
            document.querySelector("#display_firstname").value =
              data.result[0].Ho;
            document.querySelector("#display_lastname").value =
              data.result[0].Ten;
            document.querySelector("#display_email").value =
              data.result[0].Email;
            document.querySelector("#display_sdt").value = data.result[0].SDT;
            document.querySelector("#display_diachi").value =
              data.result[0].DiaChi;
          }
        },
      });
    });
}

function adminbtn() {
  if (currentID.includes("NV")) {
    document.querySelector('.header__action-admin').classList.remove('--none');
  }
  else {
    document.querySelector('.header__action-admin').classList.add('--none');
  }
}

function billbtn() {
  document.querySelector('.header__action-bell.bill').removeAttribute('onclick');
  document.querySelector('.header__action-bell.bill').addEventListener('click', function () {
    window.location.href = 'index.php?controller=HistoryBillController&action=index';
  });
}

function nonbillbtn() {
  document.querySelector('.header__action-bell.bill').setAttribute('onclick', 'alert(\'Vui lòng đăng nhập để vô lịch sử đặt hàng!\')');
    
}
