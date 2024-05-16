
let checkHo = true;
let checkTen = true;
let checkSdt = true;
let checkEmail = true;
let checkDiachi = true;
let checkUsername = true;
let checkPassword = true;
let checkCfpassword = true;
let checkDone = true;

var firstname = document.querySelector(".firstname");
var firstnameFormItem = document.querySelector(".form-item.--register.--firstname");
var firstnameError = firstnameFormItem.querySelector(
  ".form-item.--register.--firstname .error"
);
var lastname = document.querySelector(".lastname");
var lastnameFormItem = document.querySelector(".form-item.--register.--lastname");
var lastnameError = lastnameFormItem.querySelector(
  ".form-item.--register.--lastname .error"
);
var sdt = document.querySelector(".sdt");
var sdtFormItem = document.querySelector(".form-item.--register.--phone");
var sdtError = sdtFormItem.querySelector(
  ".form-item.--register.--phone .error"
);
var phonePattern = /^[0-9]{10}$/;
var email = document.querySelector(".email");
var emailFormItem = document.querySelector(".form-item.--register.--email");
var emailError = emailFormItem.querySelector(
  ".form-item.--register.--email .error"
);
var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
var gioitinh = document.querySelector("#cbgioitinh").value;
var diachi = document.querySelector(".diachi");
var diachiFormItem = document.querySelector(
  ".form-item.--register.--address"
);
var diachiError = diachiFormItem.querySelector(
  ".form-item.--register.--address .error"
);
var username = document.querySelector(".tendangnhap");
var usernameFormItem = document.querySelector(
  ".form-item.--register.--username"
);
var usernameError = usernameFormItem.querySelector(
  ".form-item.--register.--username .error"
);

var password = document.querySelector(".matkhau");
var passwordFormItem = document.querySelector(
  ".form-item.--register.--password"
);
var passwordError = passwordFormItem.querySelector(
  ".form-item.--register.--password .error"
);
var cfpassword = document.querySelector(".xacnhanmatkhau");
var cfpasswordFormItem = document.querySelector(
  ".form-item.--register.--cfpassword"
);
var cfpasswordError = cfpasswordFormItem.querySelector(
  ".form-item.--register.--cfpassword .error"
);
var boxdongy = document.querySelector(".form-check .dongy");
var userfirstname = document.querySelector(".tendangnhap");


//check họ

firstname.addEventListener("input", function () {
  if (firstname.value.trim() === "") {
    firstnameFormItem.classList.add("--error");
    firstnameError.innerText = "Yêu cầu nhập Họ";
    checkHo = false;
  } else if (firstname.value.length < 3) {
    firstnameFormItem.classList.add("--error");
    firstnameError.innerText = "Họ phải có ít nhất 3 ký tự";
    checkHo = false;
  } else {
    firstnameFormItem.classList.remove("--error");
    firstnameError.innerText = "";
    checkHo = true;
  }
});

//check tên
lastname.addEventListener("input", function () {
  if (lastname.value.trim() === "") {
    lastnameFormItem.classList.add("--error");
    lastnameError.innerText = "Yêu cầu nhập Tên";
    checkTen = false;
  } else if (lastname.value.length < 3) {
    lastnameFormItem.classList.add("--error");
    lastnameError.innerText = "Tên phải có ít nhất 3 ký tự";
    checkTen = false;
  }
  else {
    lastnameFormItem.classList.remove("--error");
    lastnameError.innerText = "";
    checkTen = true;
  }
});

//check sdt
sdt.addEventListener("input", function () {
  if (sdt.value.trim() === "") {
    sdtFormItem.classList.add("--error");
    sdtError.innerText = "Yêu cầu nhập Số điện thoại";
    checkSdt = false;
    } else if (!phonePattern.test(sdt.value)) {
      sdtFormItem.classList.add("--error");
      sdtError.innerText = "Số điện thoại không hợp lệ";
      checkSdt = false;
    } else {
      sdtFormItem.classList.remove("--error");
      sdtError.innerText = "";
    
  $.ajax({
    url: "./controller/SignUpController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "checksdt",
      sdt: sdt.value,
    },
    success: function (data) {
      if (data.length > 0) {
        sdtFormItem.classList.add("--error");
        sdtError.innerText = "Số điện thoại đã tồn tại";
        checkSdt = false;
        console.log(data);
      } else {
        sdtFormItem.classList.remove("--error");
        sdtError.innerText = "";
        checkSdt = true;
      }
    },
  });
}
});

//check email
email.addEventListener("input", function () {
  if (email.value.trim() === "") {
    emailFormItem.classList.add("--error");
    emailError.innerText = "Yêu cầu nhập Email";
    checkEmail = false;
  } else if (!emailPattern.test(email.value)) {
    emailFormItem.classList.add("--error");
    emailError.innerText = "Email không hợp lệ";
    checkEmail = false;
  } else {
    emailFormItem.classList.remove("--error");
    emailError.innerText = "";
    $.ajax({
      url: "./controller/SignUpController.php",
      type: "POST",
      dataType: "json",
      data: {
        request: "checkemail",
        email: email.value,
      },
      success: function (data) {
        if (data.length > 0) {
          emailFormItem.classList.add("--error");
          emailError.innerText = "Email đã tồn tại";
          checkEmail = false;
          console.log(data);
        } else {
          emailFormItem.classList.remove("--error");
          emailError.innerText = "";
          checkEmail = true;
        }
      },
    });
  }
});

//kiểm tra địa chỉ
diachi.addEventListener("input", function () {
  if (diachi.value.trim() === "") {
    diachiFormItem.classList.add("--error");
    diachiError.innerText = "Yêu cầu nhập Địa chỉ";
    checkDiachi = false;
  } else if (diachi.value.length < 3) {
    diachiFormItem.classList.add("--error");
    diachiError.innerText = "Địa chỉ phải có ít nhất 3 ký tự";
    checkDiachi = false;
  } else {
    diachiFormItem.classList.remove("--error");
    diachiError.innerText = "";
    checkDiachi = true;
  }
});

//kiểm tra tên đăng nhập
username.addEventListener("input", function () {
  if (username.value.trim() === "") {
    usernameFormItem.classList.add("--error");
    usernameError.innerText = "Yêu cầu nhập Tên đăng nhập";
    checkUsername = false;
  } else if (username.value.length < 3) {
    usernameFormItem.classList.add("--error");
    usernameError.innerText = "Tên đăng nhập phải có ít nhất 3 ký tự";
    checkUsername = false;
  } else {
    usernameFormItem.classList.remove("--error");
    usernameError.innerText = "";
    
    $.ajax({
      url: "./controller/SignUpController.php",
      type: "POST",
      dataType: "json",
      data: {
        request: "checkusername",
        username: username.value,
      },
      success: function (data) {
        if (data.length > 0) {
          usernameFormItem.classList.add("--error");
          usernameError.innerText = "Tên đăng nhập đã tồn tại";
          checkUsername = false;
          console.log(data);
        } else {
          usernameFormItem.classList.remove("--error");
          usernameError.innerText = "";
          checkUsername = true;
        }
      },
    });
  }
});

//kiểm tra mật khẩu
password.addEventListener("input", function () {
  if (password.value.trim() === "") {
    passwordFormItem.classList.add("--error");
    passwordError.innerText = "Yêu cầu nhập Mật khẩu";
    checkPassword = false;
  } else if (password.value.length < 3) {
    passwordFormItem.classList.add("--error");
    passwordError.innerText = "Mật khẩu phải có ít nhất 3 ký tự";
    checkPassword = false;
  } else {
    passwordFormItem.classList.remove("--error");
    passwordError.innerText = "";
    checkPassword = true;
  }
});

//kiểm tra xác nhận mật khẩu
cfpassword.addEventListener("input", function () {
  if (cfpassword.value.trim() === "") {
    cfpasswordFormItem.classList.add("--error");
    cfpasswordError.innerText = "Yêu cầu nhập Mật khẩu";
    checkCfpassword = false;
  } else if (cfpassword.value != password.value) {
    cfpasswordFormItem.classList.add("--error");
    cfpasswordError.innerText = "Mật khẩu không khớp";
    checkCfpassword = false;
  } else {
    cfpasswordFormItem.classList.remove("--error");
    cfpasswordError.innerText = "";
    checkCfpassword = true;
  }
});

document.querySelector(".dangkybtn").addEventListener("click", function () {
//validate form



  if (!(checkTen && checkHo && checkSdt && checkEmail && checkDiachi && checkUsername && checkPassword && checkCfpassword && checkDone)) {
    alert("Vui lòng kiểm tra lại thông tin");
    return false;
  } else if (!boxdongy.checked) {
    alert("Bạn chưa đồng ý với điều khoản của chúng tôi");
    return false;
  } else {
    alert(
      "Đăng ký thành công !" +
        firstname.value +
        " " +
        lastname.value +
        " " +
        gioitinh +
        " " +
        sdt.value +
        " " +
        email.value +
        " " +
        diachi.value +
        " " +
        password.value +
        " " +
        cfpassword.value +
        " "
    );
    signuptosql();
    firstname.value = "";
    lastname.value = "";
    sdt.value = "";
    email.value = "";
    diachi.value = "";
    username.value = "";
    password.value = "";
    cfpassword.value = "";
    boxdongy.checked = false;
    return true;
  }
  
});

function signuptosql() {
  var firstname = document.querySelector(".firstname").value;
  var lastname = document.querySelector(".lastname").value;
  var sdt = document.querySelector(".sdt").value;
  var email = document.querySelector(".email").value;
  var diachi = document.querySelector(".diachi").value;
  var gioitinh = document.querySelector("#cbgioitinh").value;
  var username = document.querySelector(".tendangnhap").value;
  var password = document.querySelector(".matkhau").value;

  $.ajax({
    url: "./controller/SignUpController.php",
    type: "POST",
    dataType: "json",
    data: {
      request: "dangky",
      firstname: firstname,
      lastname: lastname,
      email: email,
      password: password,
      gioitinh: gioitinh,
      sdt: sdt,
      diachi: diachi,
      username: username,
    },
    success: function (data) {
      if (data) {
        console.log(data);
      }
    },
    
  });
  // window.location.href = "index.php";
  return false;
}

  




