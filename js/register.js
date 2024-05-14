document.querySelector(".dangkybtn").addEventListener("click", function () {
  var checkDone = true;
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
  //validate form

  if (firstname.value.trim() === "") {
    firstnameFormItem.classList.add("--error");
    firstnameError.innerText = "Yêu cầu nhập Họ";
    checkDone = false;
  } else if (firstname.value.length < 3) {
    firstnameFormItem.classList.add("--error");
    firstnameError.innerText = "Họ phải có ít nhất 3 ký tự";
    checkDone = false;
  } else {
      firstnameFormItem.classList.remove("--error");
      firstnameError.innerText = "";
    }
  firstname.addEventListener("input", function () {
    if (firstname.value.length < 3) {
      firstnameFormItem.classList.add("--error");
      firstnameError.innerText = "Họ phải có ít nhất 3 ký tự";
      checkDone = false;
    } else {
      firstnameFormItem.classList.remove("--error");
      firstnameError.innerText = "";
    }
  });

  // Kiểm tra tên
  if (lastname.value.trim() === "") {
    lastnameFormItem.classList.add("--error");
    lastnameError.innerText = "Yêu cầu nhập Tên";
    checkDone = false;
  } else if (lastname.value.length < 3) {
    lastnameFormItem.classList.add("--error");
    lastnameError.innerText = "Tên phải có ít nhất 3 ký tự";
    checkDone = false;
  } else {
      lastnameFormItem.classList.remove("--error");
      lastnameError.innerText = "";
    }
  lastname.addEventListener("input", function () {
    if (lastname.value.length < 3) {
      lastnameFormItem.classList.add("--error");
      lastnameError.innerText = "Tên phải có ít nhất 3 ký tự";
      checkDone = false;
    }
    else {
      lastnameFormItem.classList.remove("--error");
      lastnameError.innerText = "";
    }
  });
  

  // Kiểm tra số điện thoại
  if (sdt.value.trim() === "") {
    sdtFormItem.classList.add("--error");
    sdtError.innerText = "Yêu cầu nhập Số điện thoại";
    checkDone = false;
  }else if (!phonePattern.test(sdt.value)) {
    sdtFormItem.classList.add("--error");
    sdtError.innerText = "Số điện thoại không hợp lệ";
    checkDone = false;
  } else {
    sdtFormItem.classList.remove("--error");
    sdtError.innerText = "";
  }
  
  sdt.addEventListener("input", function () {
    if (!phonePattern.test(sdt.value)) {
      sdtFormItem.classList.add("--error");
      sdtError.innerText = "Số điện thoại không hợp lệ";
      checkDone = false;
    } else {
      sdtFormItem.classList.remove("--error");
      sdtError.innerText = "";
    }
  });

  // Kiểm tra email
  if (email.value.trim() === "") {
    emailFormItem.classList.add("--error");
    emailError.innerText = "Yêu cầu nhập Email";
    checkDone = false;
  } else if (!emailPattern.test(email.value)) {
    emailFormItem.classList.add("--error");
    emailError.innerText = "Email không hợp lệ";
    checkDone = false;
  } else {
      emailFormItem.classList.remove("--error");
      emailError.innerText = "";
    }
    
  email.addEventListener("input", function () {
    if (!emailPattern.test(email.value)) {
      emailFormItem.classList.add("--error");
      emailError.innerText = "Email không hợp lệ";
      checkDone = false;
    } else {
      emailFormItem.classList.remove("--error");
      emailError.innerText = "";
    }
  });

  // Kiểm tra địa chỉ
  if (diachi.value.trim() === "") {
    diachiFormItem.classList.add("--error");
    diachiError.innerText = "Yêu cầu nhập Địa chỉ";
    checkDone = false;
  } else if (diachi.value.length < 3) {
      diachiFormItem.classList.add("--error");
      diachiError.innerText = "Địa chỉ phải có ít nhất 3 ký tự";
        checkDone = false;
    }
    else {
      diachiFormItem.classList.remove("--error");
      diachiError.innerText = "";
    }
    

  diachi.addEventListener("input", function () {
    if (diachi.value.length < 3) {
      diachiFormItem.classList.add("--error");
      diachiError.innerText = "Địa chỉ phải có ít nhất 3 ký tự";
      checkDone = false;
    } else {
      diachiFormItem.classList.remove("--error");
      diachiError.innerText = "";
    }
  });

  // Kiểm tra mật khẩu
  if (password.value.trim() === "") {
    passwordFormItem.classList.add("--error");
    passwordError.innerText = "Yêu cầu nhập Mật khẩu";
    checkDone = false;
  } else if (password.value.length < 3) {
      passwordFormItem.classList.add("--error");
        passwordError.innerText = "Mật khẩu phải có ít nhất 3 ký tự";
    }
  else {
      passwordFormItem.classList.remove("--error");
      passwordError.innerText = "";
    }
    
  password.addEventListener("input", function () {
    if (password.value.length < 3) {
      passwordFormItem.classList.add("--error");
      passwordError.innerText = "Mật khẩu phải có ít nhất 3 ký tự";
      checkDone = false;
    } else {
      passwordFormItem.classList.remove("--error");
      passwordError.innerText = "";
    }
  });

  // Kiểm tra mật khẩu
  if (cfpassword.value.trim() === "") {
    cfpasswordFormItem.classList.add("--error");
    cfpasswordError.innerText = "Yêu cầu nhập Mật khẩu";
    checkDone = false;
  } else if (cfpassword.value != password.value) {
    cfpasswordFormItem.classList.add("--error");
    cfpasswordError.innerText = "Mật khẩu không khớp";
    checkDone = false;
  }
  cfpassword.addEventListener("input", function () {
    cfpasswordFormItem.classList.remove("--error");
    cfpasswordError.innerText = "";
  });

  if (checkDone == false) {
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
  return false;
}

  

  // ajax register
  //   $.ajax({
  //       url: './controller/SignUpController.php',
  //       type: 'POST',
  //       data: {
  //           request: 'dangky',
  //           firstname: firstname,
  //           email: email,
  //           password: password,
  //           gioitinh: gioitinh,
  //           sdt: sdt,
  //           diachi: diachi
  //       },
  //       success: function(data) {
  //           if(data) {
  //               alert("thành công");
  //           }
  //       }

  //   })
  //   return false;
  // });



