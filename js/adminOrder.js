/*task:
tìm kiếm,xem chi tiết đơn hàng đơn hàng 
xử lí chưa xử lí
tìm kiếm đơn hàng trong khoảng thời gian
Hưng*/
let currentqueryz=`
select CONCAT('',hoadon.MaHD) as MaHD,nguoidung.MaND,CONCAT(nguoidung.Ho, ' ',nguoidung.Ten) as TenND,ngaylap,tongtien,trangthai.chitiettt as trangthai 
from hoadon
left join trangthai on hoadon.trangthai=trangthai.MaTT
left join nguoidung on hoadon.MaND=nguoidung.MaND

`;
//CAST(SUBSTRING(nguoidung.MaND, 3) AS INT)
let currentRowqueryz="select count(*) from hoadon";
let currentPagez=1;
var perPage=4;
//do du lieu tu db
let showorder_wrapper=document.querySelector("#showOrder");
var listOrder=[];
var backup_data=[];
let order_id=0;
loadTableOrder();
function loadTableOrder() { 
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'loadTableOrder',
            currentquery: currentqueryz,
            currentpage: currentPagez,
        },
        success: function(data) {
            console.table(data.result);
            listOrder = data.result;
            backup_data=data.result;
            var totalPage = data.countrow / perPage;
            showOrderTableAdmin();
            addEventButton();
            removeloader();
            close();
            // renderPagAdmin(totalPage);git
            
        },
        error: function() {
            alert("code ngu vl");
        }
    });
}


function showOrderTableAdmin(){
    let html="";
    console.table(listOrder)
    listOrder.forEach(item => {
        html+=` <tr>
        <td>${item.MaHD}</td>
        <td>${item.TenND}</td>
        <td>${item.ngaylap} </td>
        <td>${item.tongtien}</td>
        <td><span class="status-complete">${item.trangthai}</span></td>
        <td class="control">
            <button class="btn-detail" id="${item.MaHD}"><i class="fa-regular fa-eye"></i> Chi tiết</button>
        </td>
    </tr>`
    });
    document.querySelector('#showOrder').innerHTML=html;
}
let listDetail="";


function transform_into_maSize(maSize){
    let TenSize=""
    if(maSize=='S'){
        TenSize="Nhỏ"
    }
    else if(maSize=='M'){
        TenSize="Vừa"
    }
    else{
        TenSize="Lớn"
    }
    return TenSize
}
function transform_into_maVien(maVien){
    let TenVien=""
    if(maVien=='V'){
        TenVien="Vừa"
    }
    else if(maVien=='M'){
        TenVien="Mỏng"
    }
    else{
        TenVien="Dày"
    }
    return TenVien
}


function convert_status(status){
    var detail_status;
    switch(status){
        case 0:
            detail_status='Đang chờ xác nhận';
            break;
        case 1:
            detail_status='Đã xác nhận';
            break;
        case 2:
            detail_status='Đang giao hàng';
            break;
        case 3:
            detail_status='Đã giao hàng';
            break;
        case 4:
            detail_status='Đã hủy';
            break;

    }
    
    return detail_status;
}


function showOrderTableDetailAdmin(order_id,popup){
    console.log("order_id trong ham showorder: ",order_id)
    var html="";
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'loadDetailOrder',
            // currentquery: currentqueryz,
            mahd: order_id,
        },
        success: function(data) {
            console.log(data);
            for(let i=0;i<data.length;i++){
                 html+=` 
                
                    <div class="order-product">
                        <div class="order-product-left">
                            <img src="${data[i].Img}" alt="">
                            <div class="order-product-info">
                                <h4>${data[i].TenSP}</h4>
                                <p class="order-product-note"><i class="fa-regular fa-pen-to-square"></i> Kích cỡ:
                                    ${transform_into_maSize(data[i].MaSize)}; Đế:${transform_into_maVien(data[i].MaVien)}
                                </p>
                                <p class="order-product-quantity">SỐ LƯỢNG: ${data[i].SoLuong}</p>
                                <p>
                                </p>
                            </div>
                        </div>
                        <div class="order-product-right">
                            <div class="order-product-price">
                                <span class="order-product-current-price">${Number(data[i].GiaTien).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
                            </div>
                        </div>
                    </div>`
                    
                    popup.innerHTML=html;      
            }
            
            
            // var totalPage = data.countrow / perPage;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
        }
    });
}


function show_right_detail(order_id,right_container){
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'loadDetail_Customer_Order',
            mahd: order_id,
        },
        success: function(data) {

            var html=`
            <ul class="detail-order-group">
                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-regular fa-calendar"></i> Ngày đặt
                                hàng</span>
                            <span class="detail-order-item-right">${data[0].NgayLap}</span>
                        </li>

                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-solid fa-person"></i> Người nhận</span>
                            <span class="detail-order-item-right">${data[0].Ho+' '+data[0].Ten}</span>
                        </li>
                        <li class="detail-order-item">
                            <span class="detail-order-item-left"><i class="fa-solid fa-phone"></i>SDT</span>
                            <span class="detail-order-item-right">${data[0].SDT}</span>
                        </li>
                        <li class="detail-order-item tb">
                            <span class="detail-order-item-t"><i class="fa-solid fa-location-dot"></i> Địa chỉ
                                nhận</span>
                            <p class="detail-order-item-b">${data[0].DiaChi}</p>
                        </li>
                        <li class="detail-order-item tb">
                            <span class="detail-order-item-t"><i class="fa-regular fa-note-sticky"></i> Ghi chú</span>
                            <p class="detail-order-item-b">bhbhjb</p>
                        </li>
                    </ul>
            `;
            right_container.innerHTML=html;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
        }
})
}


function show_bottom_detail(order_id,bottom_container){
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'Load_bottom_detail',
            mahd: order_id,
        },
        success: function(data) {
            
            var html=`
            <div class="modal-detail-bottom-left">
                <div class="price-total">
                    <span class="thanhtien">Thành tiền</span>
                    <span class="price">${Number(data[0].TongTien).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</span>
                </div>
            </div>
            <div class="modal-detail-bottom-right" >
                <select id="statusSelect" style="appearance:none;text-align:center;border:1px;" onchange="showSelectedValue(this,${order_id})">
                    <option value="1">Đã xác minh</option>
                    <option value="2">Chưa xác minh</option>
                    <option value="3">Bị hạn chế</option>
                    <option value="4">Bị khóa</option>
                </select>
            </div>
            `;
            bottom_container.innerHTML=html;
            var selectElement = document.getElementById('statusSelect');
            selectElement.value=data[0].TrangThai;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
        }
    });
}


function showDetail(){
    showOrderTableDetailAdmin();
    let html="";
    listDetail.forEach(item => {
        html+=`<tr>
        <td>${item.MaSP}</td>
        <td>${item.TenSP}</td>
        <td>${item.TenSize}</td>
        <td>${item.TenVien}</td>
        <td>${item.tongtien}</td>
    </tr>`
    });
    // document.querySelector('#showDetail').innerHTML=html;
    let consoleDetail=html;
    console.log(consoleDetail);
}


function addEventButton() {
    document.querySelectorAll(".btn-detail").forEach(item => {
        item.addEventListener("click", function(e) {
            let row = e.target.parentElement.parentElement;
            console.log("row: ",row);
            // let row_id = row.querySelectorAll("td");
            let row_id=row.querySelectorAll("td")[0].innerText;
            console.log("rows id ",row_id);
            let popup=document.querySelector(".detail-order");
            console.log(popup)
            popup.classList.add("open");
            let left_container=popup.querySelector(".modal-detail-left .order-item-group")
            showOrderTableDetailAdmin(row_id,left_container);
            show_right_detail(row_id,popup.querySelector(".modal-detail-right"))
            let bottom_container=popup.querySelector(".modal-detail-bottom");
            show_bottom_detail(row_id,bottom_container);
        });
    });    
}
function close(){
    let close_btn=document.querySelector(".modal-close-order");
    console.log(close_btn);
    close_btn.addEventListener("click",function(e){
    let container=e.target.parentElement.parentElement.parentElement;
    console.log(container);
    container.classList.remove("open");
})

}


function showSelectedValue(selected_option,order_id){
    let selected_value=selected_option.value;
    //update trangthai
    alert(selected_value);
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'update_status',
            mahd: order_id,
            trangthai: selected_value,
        },
        success: function(data) {
            console.log(data);
            //change the select value to the selected value
             selected_option.value=selected_value;
            loadTableOrder();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
        }
    });
}

function findOrder(event){
    let input_value= document.querySelector(".form-search-input").value;
    searching(input_value);
    
    
}

document.querySelector("#form-search-order").addEventListener("keydown",function(e){
    if(e.key=="Enter"){
        e.preventDefault();
        findOrder(e);
    }
})


function validate_maHD(search_value){
    if (search_value.toLowerCase().startsWith('dh')) {
      search_value = search_value.substring(2);
  } else if (search_value.toLowerCase().startsWith('đơn hàng ')) {
      search_value = search_value.substring(9);
    }
    else if (search_value.toLowerCase().startsWith('đh')) {
        search_value = search_value.substring(2);
    }
    else if (search_value.toLowerCase().startsWith('mã đơn')) {
        search_value = search_value.substring(7);
    }
    else if(search_value.toLowerCase().startsWith('mã ')){
        search_value = search_value.substring(3);
    }
    else if(search_value.toLowerCase().startsWith('mã đơn hàng ')){
        search_value = search_value.substring(12);
    }
    else if(search_value.toLowerCase().startsWith('mã đh')){
        search_value = search_value.substring(5);   
    }
    else if(search_value.toLowerCase().startsWith('đơn ')){
        search_value = search_value.substring(4);
    }

        if (!isNaN(search_value) && parseInt(search_value) < 0) {
    return false;
}

// Kiểm tra xem search_value có chứa ký tự đặc biệt không
const format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
if(format.test(search_value)){
    return false;
}
    return search_value;
  }
  
  function search_validate(taikhoan, search_value) {
    //tôi muốn search phải ko có kí tự đặc biệt, ko số âm thì return false
    if(parseInt(search_value)<0){
        return false;
    }

    if (taikhoan.MaHD == parseInt(validate_maHD(search_value))) {
      return true;
    }
      
    if (taikhoan.ngaylap.toLowerCase().includes(search_value)) {
      return true;
    }
    
    if(taikhoan.TenND.toLowerCase().includes(search_value)){
        return true;
    }
    if (taikhoan.trangthai.toLowerCase().includes(search_value)) {
      return true;
    }
    if (taikhoan.tongtien.toLowerCase().includes(search_value)) {
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
    
    showOrderTableAdmin();
    addEventButton();
    removeloader();
    close();
    listOrder=backup_data;
  }







function findOrder_category(){
    let category=Number(this.value);
    var search_list=[];
    //write the querry select the orders by category
    if(category==5){loadTableOrder();return;}
    else{
        let convert_category=convert_status(category);
        for(let i=0;i<listOrder.length;i++){
            if(listOrder[i].trangthai==convert_category){
                search_list.push(listOrder[i]);
            }
        }
        listOrder=search_list;
        showOrderTableAdmin();
        addEventButton();
        close();
        listOrder=backup_data;
    }
}


//write the function to find the order in the time range
function findOrder_time(){
    let start_time=document.querySelector("#time-start").value;
    let end_time=document.querySelector("#time-end").value;
    //thêm ' ' vào start_time và end_time
    start_time="'"+start_time+"'";
    end_time="'"+end_time+"'";
    console.log(new Date(end_time).getTime());   
    //if the start time is greater than the end time
    console.log(start_time,end_time);   
    var query_find_order_time;
    //if end_time is undefined
    if(isNaN(new Date(end_time).getTime())){
        console.log("end_time is undefined");
       //write querry to select the order in the time start to now
        end_time="now()";
    }
    //if start_time is undefined
    if(isNaN(new Date(start_time).getTime())){
        //write querry to select the order in the first day to end_time
        console.log("start_time is undefined")
        start_time="2021-01-01";
    }
    if(new Date(start_time).getTime()==new Date(end_time).getTime()){
        query_find_order_time=`
        select CONCAT('',hoadon.MaHD) as MaHD,CONCAT(nguoidung.Ho, ' ',nguoidung.Ten) as TenND,ngaylap,tongtien,trangthai.chitiettt as trangthai
        from hoadon
        left join trangthai on hoadon.trangthai=trangthai.MaTT
        left join nguoidung on hoadon.MaND=nguoidung.MaND
        where ngaylap=${start_time}`;
    }
    else if(new Date(start_time).getTime()>new Date(end_time).getTime()){
        alert("Ngày bắt đầu không thể lớn hơn ngày kết thúc");
        return;
    }
    //write the query to select the order in the time range
    else{
    query_find_order_time=`
    select CONCAT('',hoadon.MaHD) as MaHD,CONCAT(nguoidung.Ho, ' ',nguoidung.Ten) as TenND,ngaylap,tongtien,trangthai.chitiettt as trangthai
    from hoadon
    left join trangthai on hoadon.trangthai=trangthai.MaTT
    left join nguoidung on hoadon.MaND=nguoidung.MaND
    where ngaylap between ${start_time} and ${end_time}`;}
    console.log(query_find_order_time);
    //send the query to the server
    $.ajax({
        url: "./controller/BillManagementController.php",
        type: 'POST',
        dataType: 'json',
        data:{
            request: 'find_order',
            currentquery: query_find_order_time,
            currentpage: currentPagez,
        },
        success: function(data) {
            if (!data) {
                alert("Không tìm thấy đơn hàng");
                return;
            }
            console.log(data);
            listOrder = data.result;
            showOrderTableAdmin();
            addEventButton();
            close();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error: ", jqXHR.responseText); 
            console.log("Status: ", textStatus);
            console.log("Error: ", errorThrown);
            alert("code nhu cc");
        }
    });
}


