
loadtablephanquyen();
addeventthemnq();


function loadtablephanquyen() {
    // ajjax 
    $.ajax({
        url: './controller/PermissionController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            request: 'loadnhomquyen'
        },
        success: function(data) {
            console.log(data);
            var html = "";
            var divtable = document.querySelector('#show-user');
            data.forEach(element => {
                html += `<tr>
                <td>${element.MaQuyen}</td>
                <td>${element.TenNhomQuyen}</td>
                <td class="control control-table">
                    <button class="btn-edit" id="edit-account"><i
                            class="fa-regular fa-pen-to-square"></i></button>
                    <button class="btn-delete" id="delete-account"><i
                            class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`
            })
            divtable.innerHTML = html;
        }
    })
}

function addeventthemnq() {
    var themnq = document.querySelector('.themnhomquyen');
    var dschucnang = ['sanpham', 'taikhoan', 'donhang', 'nhaphang', 'phanquyen', 'thongke'];
    // hashmap <'tenchucnang', listquyen(them,sua,xoa,xem)>
    var mapquyen = new Map();
    var dscncheckbox = document.querySelectorAll('.cbcn');
    themnq.addEventListener('click', function() {
        var tennq = document.querySelector('#role-name').value;
        for (var i = 0; i < 6; i++) {
            var arraychucnang = [];
            for (var j = 0; j < 4; j++) {
                // j =0  xem, j = 1 them, j = 2 sua, j = 3 xoa
                if (j == 0 && dscncheckbox[i * 4 + j].checked) {
                    arraychucnang.push("view");
                }
                if (j == 1 && dscncheckbox[i * 4 + j].checked) {
                    arraychucnang.push("create");
                }
                if (j == 2 && dscncheckbox[i * 4 + j].checked) {
                    arraychucnang.push("update");
                }
                if (j == 3 && dscncheckbox[i * 4 + j].checked) {
                    arraychucnang.push("delete");
                }
            }
            mapquyen.set(dschucnang[i], arraychucnang);
        }

        $.ajax({
            url: './controller/PermissionController.php',
            type: 'POST',
            data: {
                request: 'themnhomquyen',
                tennq: tennq,
                mapquyen: JSON.stringify(Object.fromEntries(mapquyen))
            },
            success: function(data) {
                if (data) {
                    alert('Thêm nhóm quyền thành công');
                    document.querySelector('.dark-overlay').style.display = 'none';
                    loadtablephanquyen();
                }
            }
        })
    });
}