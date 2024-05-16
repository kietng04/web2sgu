//xử lí các sự kiện nhấn nút , change:
loadUser();

var phanquyen=0;

function button_event(){
    let delete_btn=document.querySelectorAll('.btn-delete');
    for(let i=0;i<delete_btn.length;i++){
        // console.log(delete_btn[i]);
        delete_btn[i].addEventListener('click',function(e){
            
            alert(e.target.id,"clicked");
            let Account_id=e.target.id;
            deleteAccount(Account_id);
        })
    }
    let edit_btn=document.querySelectorAll('.btn-edit');
    for(let i=0;i<edit_btn.length;i++){
        // console.log(edit_btn[i]);
        edit_btn[i].addEventListener('click',function(e){
            
            //id cuả nút là "edit_NV03" tách NV03 ra
            let Account_id=e.target.id.split('_')[1];
            var modal = document.querySelector('.add-product');
            modal.classList.add('open');
            let form_edit_input=modal.querySelectorAll('input');
            let name_input=form_edit_input[0];
            let phone_input=form_edit_input[1];
            let email_input=form_edit_input[2];
            let select_phanquyen=modal.querySelector('select')
            let address_textarea=modal.querySelector('textarea');
            let mataikhoan=modal.querySelector('#ma_tai_khoan');
            let submit_button=modal.querySelectorAll('button')[1];

            let name_edit=name_input.value;
            let phone_edit=phone_input.value;
            let email_edit=email_input.value;
            let address_edit=address_textarea.value;
            let phanquyen_edit=select_phanquyen.value;
            // tách dấu ' '
            

            
            
            // editAccount(Account_id);
            console.log(Account_id,name_input,phone_input,email_input,select_phanquyen,address_textarea,mataikhoan);
            render_edit_form(Account_id,name_input,phone_input,email_input,select_phanquyen,address_textarea,mataikhoan);
        })
    }
    //nut trang thai:
    let trangthaiElements = document.querySelectorAll('.status-complete');
    for(let i = 0; i < trangthaiElements.length; i++){
        trangthaiElements[i].addEventListener('click', function(e){
        let Account_id = e.target.id.split('_')[1];
        let trangthai = e.target.innerText;
        if(trangthai == "Hoạt động"){
            trangthai = 0;
            e.target.innerText = "Bị khóa";
        }
        else{
            trangthai = 1;
            e.target.innerText = "Hoạt động";
        }
        console.log(Account_id, trangthai);
        changeStatus(Account_id, trangthai);
    })
    }

    let search_input =document.querySelector('#form-search-user.form-search-input');
    console.log(search_input);
    
    search_input.addEventListener('keydown', function(e){
    if(e.key === 'Enter'){
        e.preventDefault();
        // Thực hiện hành động của bạn ở đây
        console.log(search_input.value);
        let search_value=search_input.value;   
        //xử lí tìm kiếm
        searching(search_value);
    }
});
}


var modal = document.querySelector('.add-product');
let submit_button=modal.querySelectorAll('button')[1];
submit_button.addEventListener('click',function(e){
    e.preventDefault();
    let form_edit_input=modal.querySelectorAll('input');
            let name_input=form_edit_input[0];
            let phone_input=form_edit_input[1];
            let email_input=form_edit_input[2];
            let select_phanquyen=modal.querySelector('select')
            let address_textarea=modal.querySelector('textarea');
            let name_edit=name_input.value;
            //phân chia thành họ và tên : chữ cuối là tên
            let name_parts = name_edit.split(' ');
            let ten = name_parts.pop();
            let ho = name_parts.join(' ');
            let phone_edit=phone_input.value;
            let email_edit=email_input.value;
            let address_edit=address_textarea.value;    
            let phanquyen_edit=select_phanquyen.value;
            let mataikhoan=modal.querySelector('#ma_tai_khoan').innerText.split(':')[1];
    console.log(ten,ho,phone_edit,email_edit,address_edit,phanquyen_edit,mataikhoan)
    if(validate_form("",mataikhoan,name_edit,phone_edit,email_edit,address_edit,"123456","123456","edit"))
    editAccount(mataikhoan,ho,ten,phone_edit,email_edit,address_edit,phanquyen_edit)
})







$('#chonquyen')[0].addEventListener('change', function (e) {
    let phanquyen=$('#phanquyen')[0];
    if(e.target.value==1){
        phanquyen.style.display="none";
    }
    else{
        phanquyen.style.display="block";
    }
})

$('#btn-update-account')[0].addEventListener('click', function (e) {
    e.preventDefault();
    alert("clicked")
    //lấy dữ liệu từ form
    let fullname_input=$('#fullname').val();
    
        let name_parts = fullname_input.trim().split(' ');

        let ten = name_parts.pop();
        let ho = name_parts.join(' ');
    let phone=$('#phone').val();
    let username=$('#username').val();
    let email=$('#email').val();
    let address=$('#address').val();
    let password=$('#password').val();
    let confirmPassword=$('#confirm-password').val();
    let phanquyen=$('#chonquyen').val();
    var mand=1,manv=1;
    for(let i=0;i<listUser.length;i++){
        if(listUser[i].MaNV.includes("ND")){
            mand++;
        }
        else{
            manv++;
        }
    }
    var mand_string="",manv_string="";
    //tôi muốn người dùng thứ 4 thì là ND04 thay vì ND4
    if(mand<10){
        mand_string="ND0"+mand;
    }
    else{
        mand_string="ND"+mand;
    }
    if(manv<10) manv_string="NV0"+manv;
    else manv_string="NV"+manv;

    //xử lí validate các input trước khi thực hiện thêm
    if(validate_form(username,0,fullname_input,phone,email,address,password,confirmPassword,"add")){
    addAccount(username,ho,ten,phone,email,address,password,phanquyen);
    //clear các input
    }
    
})

//sự kiện nút đóng form sửa
let close_edit_form=document.querySelector('#edit_close_btn');
close_edit_form.addEventListener('click',function(){
    document.querySelector('#fullname').value="";
    document.querySelector('#phone').value="";
    document.querySelector('#email').value="";
    document.querySelector('#address').value="";
    document.querySelector('#password').value="";
    document.querySelector('#confirm-password').value="";
    document.querySelector('#chonquyen').value=0;
    //clear các thông báo lỗi
    let form_message=document.querySelectorAll('.form-message');
    for(let i=0;i<form_message.length;i++){
        form_message[i].innerText="";
    }
})

//sự kiện nút đóng form thêm
let close_add_form=document.querySelector('#close_addform');
console.log(close_add_form)
close_add_form.addEventListener('click',function(){
    document.querySelector('#fullname').value="";
    document.querySelector('#phone').value="";
    document.querySelector('#email').value="";
    document.querySelector('#address').value="";
    document.querySelector('#password').value="";
    document.querySelector('#confirm-password').value="";
    document.querySelector('#chonquyen').value=0;
    //clear các thông báo lỗi
    let form_message=document.querySelectorAll('.form-message');
    for(let i=0;i<form_message.length;i++){
        form_message[i].innerText="";
    }
})
//function phụ

//validate:
function validate_form(username,mataikhoan,fullname_input,phone,email,address,password,confirmPassword,form_type)
{   
    listUser=backup_data;
    let otherUsers = listUser.filter(user => user.MaNV !== mataikhoan);
    console.log(otherUsers)
    var isValidate = true;
    //kiểm tra k được để trống
    var isExist=false;
    //kiểm tra họ tên
    var  name_parts = fullname_input.split(' ');
    var name_message,phone_message,email_message,address_message,password_message,confirmPassword_message,username_message;
    if(form_type!='edit'){
    username_message=document.querySelector('.form-message-username');
    name_message = document.querySelector('.form-message-name');
     phone_message = document.querySelector('.form-message-phone');
     email_message = document.querySelector('.form-message-email');
     address_message = document.querySelector('.form-message-address');
     password_message = document.querySelector('.form-message-password');
    confirmPassword_message = document.querySelector('.form-message-confirm-password');
    }
    else{
        name_message = document.querySelector('.form-message-name-edit');
        phone_message = document.querySelector('.form-message-phone-edit');
        email_message = document.querySelector('.form-message-email-edit');
        address_message = document.querySelector('.form-message-address-edit');
        password_message = document.querySelector('.form-message-password-edit');
        confirmPassword_message = document.querySelector('.form-message-confirm-password-edit');
    }
    console.log(name_message,phone_message,email_message,username_message,address_message,password_message,confirmPassword_message)
    //tôi muốn kiểm tra tất cả điều kiện cùng một lúc
    if(username==otherUsers.find(user=>user.username==username)?.username){
        username_message.innerText = "Tên tài khoản đã tồn tại";
        isValidate=false;
    }
    if(fullname_input!=""){
        if(name_parts.length<2 ){
            name_message.innerText = "Họ tên phải có ít nhất 2 từ";
            isValidate=false;
        }
        else{
            name_message.innerText = "";
        }
    }
    else{
        name_message.innerText = "Họ tên không được để trống";
        
    }
    //kiểm tra số điện thoại
    let phone_regex = /^[0-9]{10}$/;
    //nếu tôi ghi số điện thoại là 9 số và 2 dấu cách ở cuối thì sao

    if(phone!=""){
        phone=phone.trim();
    if(!phone.match(phone_regex)){
        phone_message.innerText = "Số điện thoại không hợp lệ";
        isValidate=false;
    }
    else{
        //kiểm tra số điện thoại đã tồn tại chưa không tính tài khoản này

        if(phone==otherUsers.find(user=>user.SDT==phone)?.SDT){
            phone_message.innerText = "Số điện thoại đã tồn tại";
            isValidate=false;
            console.log(listUser)
        }
        else{
        phone_message.innerText = "";
        }
    }
    }
    else{phone_message.innerText = "Số điện thoại không được để trống";isValidate=false;}
    //kiểm tra email
    let email_regex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    if(email!=""){
    if(!email.match(email_regex)){
        email_message.innerText = "Email không hợp lệ";
        isValidate=false;
    }
    else{
        if(email==otherUsers.find(user=>user.Email==email)?.Email){
            email_message.innerText = "Email đã tồn tại";
            isValidate=false;
        }
        else email_message.innerText = "";
    }
    }else{email_message.innerText = "Email không được để trống";isValidate=false;}
    //kiểm tra địa chỉ
    if(address!=""){
    if(address.length<5){
        address_message.innerText = "Địa chỉ phải có ít nhất 5 ký tự";
        isValidate=false;
    }else{address_message.innerText = "";}
    }else{address_message.innerText = "Địa chỉ không được để trống";isValidate=false;}
    //kiểm tra mật khẩu
    if(form_type!='edit'){
    if(password!=""){
    if(password.length<6){
        password_message.innerText = "Mật khẩu phải có ít nhất 6 ký tự";
        isValidate=false;
    }else{
        //kiểm tra email đã tồn tại chưa
        
        password_message.innerText = "";}
    }else{password_message.innerText = "Mật khẩu không được để trống";isValidate=false;}
    if(password!=confirmPassword){
        confirmPassword_message.innerText = "Mật khẩu xác nhận không khớp";
        isValidate=false;
    }
    else{
        confirmPassword_message.innerText = "";
    }
}
    listUser=backup_data;
    return isValidate;
}
//tìm kiếm:


function search_validate(taikhoan,search_value){
    let ho_ten=taikhoan.Ho+" "+taikhoan.Ten;
    if(ho_ten.toLowerCase().includes(search_value)){
        return true;
    }
    if(taikhoan.MaNV.toLowerCase().includes(search_value)){
        return true;
    }
    if(taikhoan.SDT.toLowerCase().includes(search_value)){
        return true;
    }
    if(taikhoan.Email.toLowerCase().includes(search_value)){
        return true;
    }
    if(taikhoan.DiaChi.toLowerCase().includes(search_value)){
        return true;
    }
    //xử li số mã nhân viên mã người dùng
    //nếu nhập 01 thì ra nv01 và nd01 , nếu nhập nd01 thì ra nd01 
    if(taikhoan.MaNV.toLowerCase().includes(search_value)){
        return true;
    }
    //xử lí số điện thoại
    if(taikhoan.SDT.toLowerCase().includes(search_value)){
        return true;
    }
    return false;

}


function searching(search_value){
    let search_value_lwr=search_value.toLowerCase();
    let search_list=[];
    for(let i=0;i<listUser.length;i++){
        let taikhoan=listUser[i];
        if(search_validate(taikhoan,search_value_lwr)){
            search_list.push(taikhoan);
        }
    }
    listUser=search_list;
    renderTable();
    button_event();
    listUser=backup_data;
}




//function kiểm tra mã người dùng đã tồn tại chưa






function findNextMa(userType) {
    let maxMa = 0;
    for(let i = 0; i < listUser.length; i++) {
        let currentMa;
        if(listUser[i].MaNV.includes(userType)) {
            currentMa = parseInt(listUser[i].MaNV.slice(2));
            if(currentMa > maxMa) {
                maxMa = currentMa;
            }
        }
    }

    // Tạo một mảng với tất cả các giá trị từ 1 đến maxMa
    let allMa = [];
    for(let i = 1; i <= maxMa; i++) {
        allMa.push(i);
    }

    // Loại bỏ các Ma hiện có khỏi mảng
    for(let i = 0; i < listUser.length; i++) {
        let index;
        if(listUser[i].MaNV.includes(userType)) {
            index = allMa.indexOf(parseInt(listUser[i].MaNV.slice(2)));
            if(index !== -1) {
                allMa.splice(index, 1);
            }
        }
    }

    // Nếu còn số nào đó không có trong danh sách, trả về số đó
    if(allMa.length > 0) {
        return allMa[0];
    }

    // Nếu không, trả về maxMa + 1
    maxMa = maxMa + 1;
    let ma_string=" ";
    if(maxMa < 10){
        ma_string=userType+"0"+maxMa;
    }
    else{
        ma_string=userType+maxMa;
    }
    return ma_string;
}



//các fucntion render:


var listUser=[];


function render_edit_form(Account_id,name_input,phone_input,email_input,select_phanquyen,address_textarea,mataikhoan){
    let user=listUser.find(user=>user.MaNV==Account_id);
    console.log(user);
    // getPhanQuyen(Account_id);
    name_input.value=user.Ho+" "+user.Ten;
    phone_input.value=user.SDT;
    email_input.value=user.Email;
    address_textarea.value=user.DiaChi;
    mataikhoan.innerText="Mã Tài Khoản:"+user.MaNV;
    if(user.MaNV.includes("ND")){
        select_phanquyen.style.display="none";
    }
    else{
        
        select_phanquyen.style.display="block";
        //để select là phân quyền
        getPhanQuyen(Account_id,select_phanquyen);
    }
    

}




function renderTable(){
    let showUser=document.querySelector('#show-user');
    var html="";
    for(let i=0;i<listUser.length;i++){
    html+=`
    <tr>
        <td>${listUser[i].MaNV}</td>
        <td>${listUser[i].Ho+" "+listUser[i].Ten}</td>
        <td>${listUser[i].SDT}</td>
        <td>${listUser[i].Email}</td>
        <td>${listUser[i].DiaChi}</td>
        <td><span class="status-complete" id="tranghtai_${listUser[i].MaNV}">${listUser[i].TrangThai== 1 ? "Hoạt động" : "Bị khóa"}</span></td>
        <td class="control control-table">
            <button class="btn-edit" id="edit_${listUser[i].MaNV}">S</button>
            <button class="btn-delete" id="${listUser[i].MaNV}">X</button>
        </td>
    </tr>    
    `;
    }
    //<i class="fa-regular fa-pen-to-square"></i> sửa
    //<i class="fa-solid fa-trash"></i>
    showUser.innerHTML=html;
}






function getPhanQuyen(manv,select_phanquyen){
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'getPhanQuyen',
            manv: manv
        },
        success: function (data) {
            phanquyen=data.PhanQuyen;
            select_phanquyen.value=data.PhanQuyen;
            console.log(phanquyen)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })
}


function loadUser(){
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'loadUser'
        },
        success: function (data) {
            console.log(data)
            listUser=data;
            backup_data=data;
            renderTable();
            console.log(`nv: ${typeof findNextMa("NV")},nd:${typeof findNextMa("ND")}`);
            button_event();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })

}



//function thêm 
function addAccount(username,ho,ten,phone,email,address,password,phanquyen){
if(phanquyen==1){
    let mand=findNextMa("ND");
    // if(mand<10) mand="ND0"+mand;
    // else mand="ND"+mand;

    console.log(`mand: ${mand}`)
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'addAccount_nguoidung',
            mand: mand,
            ho: ho,
            ten: ten,
            phone: phone,
            email: email,
            address: address,
            password: password,
            username: username
        },
        success: function (data) {
            loadUser();
            alert("them thanh cong")
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })
}
else{
    let manv=findNextMa("NV");
    if(manv<10) manv="NV0"+manv;
    else manv="NV"+manv;
    let phanquyen=$('#phanquyen').val();
    console.log(`phanquyen: ${phanquyen}`)
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'addAccount_nhanvien',
            manv:manv,
            ho: ho,
            ten: ten,
            phone: phone,
            email: email,
            address: address,
            password: password,
            phanquyen: phanquyen
        },
        success: function (data) {
            loadUser();
            alert("them thanh cong")
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })

}
}




//function xóa
function deleteAccount(Account_id){
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'deleteAccount',
            Account_id: Account_id
        },
        success: function (data) {
            loadUser();
            alert(`xoa thanh cong ${Account_id}`)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })
}



//function sửa

function editAccount(matk,ho,ten,phone_edit,email_edit,address_edit,phanquyen_edit){
    if(matk.includes("ND")){
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'editAccount_ND',
            mand:matk,
            ho:ho,
            ten:ten,
            phone: phone_edit,
            email: email_edit,
            address: address_edit
        },
        success: function (data) {
            loadUser();
            alert("sua thanh cong")
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })
    }
    else{
        $.ajax({
            type: 'POST',
            url: './controller/UserController.php',
            dataType: 'json',
            data: {
                request: 'editAccount_NV',
                manv:matk,
                ho:ho,
                ten:ten,
                phone: phone_edit,
                email: email_edit,
                address: address_edit,
                phanquyen: phanquyen_edit
            },
            success: function (data) {
                loadUser();
                alert("sua thanh cong")
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error: ", jqXHR.responseText); 
                console.log("Status: ", textStatus);
                console.log("Error: ", errorThrown);
                alert("code nhu cc");
              }
        })
    }
}



function changeStatus(Account_id, trangthai){
    $.ajax({
        type: 'POST',
        url: './controller/UserController.php',
        dataType: 'json',
        data: {
            request: 'changeStatus',
            mand: Account_id,
            status: trangthai
        },
        success: function (data) {
            loadUser();
            alert(`Thay đổi trạng thái thành công`);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
          }
    })
}



//xử lí category trạng thái:
let backup_data=[]
let trangthai_select = document.querySelector('#tinh-trang-user');
trangthai_select.addEventListener('change', function(e){
    let trangthai = e.target.value;
    console.log(trangthai);
    if(trangthai == 1){
        
        listUser = listUser.filter(user => user.TrangThai == 1);
        renderTable();
        button_event();
        listUser = backup_data;
    }
    else if(trangthai == 0){
        
        listUser = listUser.filter(user => user.TrangThai == 0);
        renderTable();
        button_event();
        //khôi phục lại listUser
        listUser = backup_data;
        
    }
    else{
        loadUser();

    }
    
})



// //function lấy ra danh sách phân quyền
// function getPhanQuyen(manv,select_phanquyen){
//     $.ajax({
//         type: 'POST',
//         url: './controller/UserController.php',
//         dataType: 'json',
//         data: {
//             request: 'getPhanQuyen',
//             manv: manv
//         },
//         success: function (data) {
//             phanquyen=data.PhanQuyen;
//             select_phanquyen.value=data.PhanQuyen;
//             console.log(phanquyen)
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             console.log("Error: ", jqXHR.responseText); 
//             console.log("Status: ", textStatus);
//             console.log("Error: ", errorThrown);
//             alert("code nhu cc");
//           }
//     })
// }

