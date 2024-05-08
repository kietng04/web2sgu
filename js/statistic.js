// var xValues = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
// var yValues = ['100', '200', '100', '150'];
// // var labelz = `Doanh thu tháng 1/2023 (${money.vnd(filterOrderbyBrand("all", 1).sumMonth)}, chiếm ${(filterOrderbyBrand("all", 1).sumMonth / getTotalMoneyAllOrder()).toFixed(2)}%)`;

// renderChart();
loadDATAtoChart_inMonth(2020);
loadDataTOPproducts(0,3);
var year=2020;
var phanloai=0;
var phanloai_thoigian=0
var start_date;
var end_date;
var sum_doanhthu=0;
var sum_loinhuan=0;
var sum_products=0;
var isthang=0;
var current_queryz_head="  WHERE hd.NgayLap BETWEEN '2024-01-01' AND '2024-12-31' GROUP BY sp.MaSP, sp.TenSP ORDER BY SUM(cthd.SoLuong) DESC LIMIT 1";

function renderChart() {
  var existingChart = Chart.getChart("myChart"); 
  if (existingChart) {
    existingChart.destroy(); 
  }
new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [
      {
      label: "DOANH THU",
      fill: false,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.3)",
      data: yValues
    },
    {
      label: "LỢI NHUẬN",
      fill: false,
      backgroundColor: "rgba(255,0,0,1.0)",
      borderColor: "rgba(255,0,0,0.3)",
      data: yValues_loinhuan
    }
  ]
  },
});
}

function renderTable(month,doanhthu,loinhuan){
  let table=  $("#statistic_table")[0];
  let table_tbody=table.getElementsByTagName('tbody')[0];
  let html=[];
  for(let i=0;i<month.length;i++){
    html+=`<tr>
    <td>${month[i]}</td>
    <td>${doanhthu[i].toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})}</td>
    <td>${loinhuan[i].toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})}</td>
    </tr>`;
  }
  table_tbody.innerHTML=html;
}


function render_ranke_products_table(tensanpham,soluongbanra){
  let table = $("#top_products_table")[0];
  let table_tbody=table.getElementsByTagName('tbody')[0];
  let html=[];
  for(let i=0;i<tensanpham.length;i++){
    html+=`<tr>
    <td>${i+1}</td>
    <td>${tensanpham[i]}</td>
    <td>${soluongbanra[i]}</td>
    </tr>`;
  }
  table_tbody.innerHTML=html;
}

function loadDataTOPproducts(isthang,top_choice){

  let texth2=document.getElementsByTagName('h2')[0];
  if(isthang==2){
    texth2.innerText=`Top ${top_choice} sản phẩm bán chạy nhất trong khoảng thời gian từ ${start_date} đến ${end_date}`;
  }
  else if(isthang==1){
    texth2.innerText=`Top ${top_choice} sản phẩm bán chạy nhất trong năm ${year}`;
  }
  else{
    texth2.innerText=`Top ${top_choice} sản phẩm bán chạy nhất`;
  }

  var current_queryz_tail;
  current_queryz_head="SELECT sp.MaSP as MaSP,sp.TenSP as TenSP,SUM(cthd.SoLuong) AS SoLuong FROM SanPham sp JOIN ChiTietHoaDon cthd ON sp.MaSP = cthd.MaSP JOIN HoaDon hd ON cthd.MaHD = hd.MaHD";

  if(isthang==2){
     current_queryz_tail=" WHERE hd.NgayLap BETWEEN '" +start_date +"' AND '"+end_date+"' GROUP BY sp.MaSP, sp.TenSP ORDER BY SUM(cthd.SoLuong) DESC LIMIT "+top_choice+"";
  }
  else if(isthang==1){
    current_queryz_tail=" WHERE YEAR(hd.NgayLap)="+year+" GROUP BY sp.MaSP, sp.TenSP ORDER BY SUM(cthd.SoLuong) DESC LIMIT "+top_choice+"";
  }
  else{
    current_queryz_tail=" GROUP BY sp.MaSP, sp.TenSP ORDER BY SUM(cthd.SoLuong) DESC LIMIT "+top_choice+"";
  }

  let current_queryz=current_queryz_head+current_queryz_tail;
  console.log(current_queryz)
  $.ajax({
    url: './controller/AdminStatisticController.php',
    type: 'POST',
    dataType: 'json',
    data:{
      request: "getTopProducts",
      query:current_queryz
    },
    success: function(data) {
        console.log(data)
        render_ranke_products_table(data.map(item=>item.TenSP),data.map(item=>item.SoLuong));
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
    }
  });
}


function loadDATAtoChart_inMonth(year){
  $.ajax({
    url: './controller/AdminStatisticController.php',
    type: 'POST',
    dataType: 'json',
    data:{
      request: "getDoanhThu",
      year:year
    },
    success: function(data) {
        console.log(data)
        xValues = data.map(item => item.thang);
        yValues = data.map(item => Number(item.doanhthu));
        soluongbanra=data.map(item => Number(item.soluongbanra));
        //sum = all doanhthu in map
        sum_doanhthu=yValues.reduce((a, b) => a + b, 0);
        chiphi=data.map(item => Number(item.chiphi));
        //loi nhuan = doanh thu - chi phi
        sum_products=soluongbanra.reduce((a, b) => a + b, 0);
        loinhuan=yValues.map((item,index)=>item-chiphi[index]);
        yValues_loinhuan=loinhuan;
        sum_loinhuan=loinhuan.reduce((a, b) => a + b, 0);
        renderChart();
        renderTable(xValues,yValues,yValues_loinhuan);
        render_item_content();
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
  }
});
}

function loadDATAtoChart_inDay(date_start,date_end){
  $.ajax({
    url: './controller/AdminStatisticController.php',
    type: 'POST',
    dataType: 'json',
    data:{
      request: "getDoanhThu_Ngay",
      start:date_start,
      end:date_end
    },
    success: function(data) {
        console.log(data)
        xValues = data.map(item => item.ngay);
        yValues = data.map(item => Number(item.doanhthu));
        sum_doanhthu=yValues.reduce((a, b) => a + b, 0);
        chiphi=data.map(item => Number(item.chiphi));
        soluongbanra=data.map(item => Number(item.soluongbanra));
        sum_products=soluongbanra.reduce((a, b) => a + b, 0);
        loinhuan=yValues.map((item,index)=>item-chiphi[index]);
        yValues_loinhuan=loinhuan;
        sum_loinhuan=loinhuan.reduce((a, b) => a + b, 0);
        console.table(xValues);
        console.table(yValues);
        renderChart();
        renderTable(xValues,yValues,yValues_loinhuan);
        render_item_content();
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
  }
});
}


function date_chosen(){
let date_type = $('#chon-khoang-thoigian').val();
let year_combobox=$('#chon-nam')[0];
let date_field= $('.fillter-date')[0];
// let start_date=date_field.$("#time-start-tk").val();

console.log(year_combobox);
  if(date_type=="Ngày"){
    phanloai_thoigian=1;
    date_field.style.display="block";//correct syntax
    year_combobox.style.display="none";
    isthang=2;
    console.log(isthang)
  } 
  else if(date_type=="Tháng"){
    isthang=1;
    console.log(isthang)
    phanloai_thoigian=2;
    date_field.style.display="none";//
    year_combobox.style.display="block";
    year_combobox.addEventListener('change', function() {
    year=year_combobox.value;
    if(phanloai!=0){
    loadDATAtoChart_inMonth_category(phanloai,year);
    
    }
    else{loadDATAtoChart_inMonth(year);}
  }); 
  }
  else{
    isthang=0;
    date_field.style.display="none";
    year_combobox.style.display="none";
  }    //
}

$('#thongke_action')[0].addEventListener('click', function(event) {
  event.preventDefault();
  let start_date_val = document.getElementById("time-start-tk").value;
  let end_date_val = document.getElementById("time-end-tk").value;
  
  start_date=start_date_val;
  end_date=end_date_val;
  alert(`Phan Loai : ${phanloai},Start Date: ${start_date}, End Date: ${end_date}`);
  if(phanloai!=0)
  loadDATAtoChart_inDay_category(phanloai,start_date,end_date);
  else
  loadDATAtoChart_inDay(start_date,end_date);
});


$('#the-loai-tk')[0].addEventListener('change', function(e) {
  let category=e.target.value;
  phanloai=category;
  if(category==0){
    alert("phan loai: ",phanloai,"nam hien tai:",year);
    if(phanloai_thoigian==2){
      loadDATAtoChart_inMonth(year);
    }
    else{
      loadDATAtoChart_inDay(start_date,end_date);
    }
  }
  else{
    alert("phan loai: ",phanloai,"nam hien tai:",year);
    if(phanloai_thoigian==1){
      loadDATAtoChart_inDay_category(category,start_date,end_date);
    }
    loadDATAtoChart_inMonth_category(category,year);
}}) 

function loadDATAtoChart_inMonth_category(category,year){
  $.ajax({
    url: './controller/AdminStatisticController.php',
    type: 'POST',
    dataType: 'json',
    data:{
      request: "getDoanhThu_Loai_Thang",
      year:year,
      category_id:category
    },
    success: function(data) {
        console.log(data)
        xValues = data.map(item => item.thang);
        yValues = data.map(item => Number(item.doanhthu));
        sum_doanhthu=yValues.reduce((a, b) => a + b, 0);
        console.table(xValues, yValues);
        chiphi=data.map(item => Number(item.chiphi));
        soluongbanra=data.map(item => Number(item.soluongbanra));
        sum_products=soluongbanra.reduce((a, b) => a + b, 0);
        loinhuan=yValues.map((item,index)=>item-chiphi[index]);
        yValues_loinhuan=loinhuan;
        sum_loinhuan=loinhuan.reduce((a, b) => a + b, 0);
        renderChart();
        renderTable(xValues,yValues,yValues_loinhuan);
        render_item_content();
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Error: ", jqXHR.responseText); 
      console.log("Status: ", textStatus);
      console.log("Error: ", errorThrown);
      alert("code nhu cc");
  }
});
}

function loadDATAtoChart_inDay_category(category,start_date,end_date){
    $.ajax({
      url: './controller/AdminStatisticController.php',
      type: 'POST',
      dataType: 'json',
      data:{
        request: "getDoanhThu_Loai_Ngay",
        start:start_date,
        end:end_date,
        category_id:category
      },
      success: function(data) {
          console.log(data)
          xValues = data.map(item => item.ngay);
          yValues = data.map(item => Number(item.doanhthu));
          sum_doanhthu=yValues.reduce((a, b) => a + b, 0);
          console.table(xValues, yValues);
          chiphi=data.map(item => Number(item.chiphi));
        soluongbanra=data.map(item => Number(item.soluongbanra));
        sum_products=soluongbanra.reduce((a, b) => a + b, 0);
        loinhuan=yValues.map((item,index)=>item-chiphi[index]);
        yValues_loinhuan=loinhuan;
        sum_loinhuan=loinhuan.reduce((a, b) => a + b, 0);
          renderChart();
          renderTable(xValues,yValues,yValues_loinhuan);
          render_item_content();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("Error: ", jqXHR.responseText); 
          console.log("Status: ", textStatus);
          console.log("Error: ", errorThrown);
          alert("code nhu cc");
      }
    });
}  



//thong ke tong doanh thu:
function render_item_content(){
  let loinhuan=sum_loinhuan.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
  let formattedSum = sum_doanhthu.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
  $("#quantity-sale")[0].innerText = formattedSum;
  $("#profit-sale")[0].innerText=loinhuan;
  $("#products-sale")[0].innerText=sum_products;
}   


$('#top_products')[0].addEventListener('change', function(event) {
  let top_choice=event.target.value;
  console.log(top_choice);
  loadDataTOPproducts(isthang,top_choice);
})
