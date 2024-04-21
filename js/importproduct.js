loadProductPN();
addeventThempn();
loadmaphieunhap();
var curProduct;
var listDeProduct = [];
var listDeLength = 0;
var listSizeProduct = [];
var listproduct = [];
var listCTPN = [];
var sum = 0;
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

function addeventClick() {
    var clickbtnlist = document.querySelectorAll('.productClicked');
    clickbtnlist.forEach(element => {
        element.addEventListener('click', function() {
            var productID = element.getAttribute('value');
            var combobox = document.getElementById('product-item');
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
                    var listItem = [];
                    data.forEach(element => {
                        listItem.push({
                            "MaSize" : element.MaSize,
                            "MaDe": element.MaVien,
                            "TenSize" : element.TenSize,
                            "TenDe" : element.TenVien,
                        })
                            
                    })
                    var html = '';
                    listItem.forEach(element => {
                        html += `<option value="${element.MaSize + element.MaDe}">${element.TenSize} - ${element.TenDe}</option>`
                    })
                    combobox.innerHTML = html;
                }
            });
        })
    })
}

function addeventThempn() {
    var btnThem = document.querySelector('.addphieunhap');
    btnThem.addEventListener('click', function(e) {
        e.preventDefault();
        var masp = document.querySelector('#product-name').value.split(' - ')[0];
        var tensp = document.querySelector('#product-name').value.split(' - ')[1]
        var masize = document.querySelector('#product-item').value[0];
        var made = document.querySelector('#product-item').value[1];
        var soluong = document.querySelector('#product-quantity').value;
        
        if (masp == '' || masize == '' || made == '' || soluong == '') {
            alert('Vui lòng nhập đủ thông tin');
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
            "GiaNhap": document.getElementById('product-price').value
        })
        loadTablepn();
        sum += parseInt(document.getElementById('product-price').value) * parseInt(soluong);
        alert(sum);
        document.querySelector('.tongtienpn').innerHTML = toVND(sum);
    })

}

function loadTablepn() {
    var divtable = document.querySelector('.rowtable');
    var html = '';
    listCTPN.forEach(element => {
        html += `<tr>
                    <td>${element.MaSP}</td>
                    <td>${element.TenSP}</td>
                    <td>${element.TenSize}</td>
                    <td>${element.TenDe}</td>
                    <td>${element.GiaNhap}</td>
                    <td>${element.SoLuong}</td>
                </tr>`
    })
    divtable.innerHTML = html;
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
            document.querySelector('#import-id').value = parseInt(data[0].count) + 1; 
            document.querySelector('#import-id').disabled = true;
        }
    })
}

function thempn(e) {
    e.preventDefault();
    alert("Wef");
}