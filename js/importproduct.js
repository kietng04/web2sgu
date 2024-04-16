loadProductPN();
var listDeProduct = [];
var listDeLength = 0;
var listSizeProduct = [];
function loadProductPN() {
    $.ajax({
        url: "./controller/ProductsController.php",
        type: "POST",
        dataType: "json",
        data: {
            request: 'getAllProduct',
        },
        success: function(data) {
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