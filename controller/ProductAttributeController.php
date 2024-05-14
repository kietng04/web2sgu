<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');

class ProductAttributeController extends BaseController
{
    public function index()
    {
        $this->render('admin_attributeProduct');
    }
}
global $bussp;
$bussp = new SanPhamBUS();


if (isset($_POST['request'])) {
    switch($_POST['request']) {
        case 'loadsizesanpham':
            getAllsizeSanPham();
            break;

        case 'loadviensanpham':
            getAllVienSanPham();
            break;

        case 'themsizesanpham':
            themSizeSanPham();
            break;
        case 'suasizesanpham':
                suaSizeSanPham();
                break;
        case 'xoasizesanpham':
            xoaSizeSanPham();
            break;
        case 'themviensanpham':
            themVienSanPham();
            break;  
            case 'suaviensanpham':
                suaVienSanPham();
                break;
        case 'xoaviensanpham':
            xoaVienSanPham();
            break;

            case 'loadloaisanpham':
                getAllLoaiSanPham();
                break;
       case 'themloaisanpham':
            themLoaiSanPham();
            break;
            case 'sualoaisanpham':
                suaLoaiSanPham();
                break;
            case 'xoaloaisanpham':
                xoaLoaiSanPham();
                break;
    }
}

function getALLLoaiSanPham(){
    $result = (new SanPhamBUS())->getAllCategory();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}
function themVienSanPham(){
    $maVien = $_POST['mavien'];
    $tenVien = $_POST['tenvien'];
    $dinhLuongVien = $_POST['dinhluongvien'];
    $sql = "INSERT INTO viensanpham(MaVien, TenVien, DinhLuongVien, TrangThai) VALUES ('$maVien', '$tenVien', '$dinhLuongVien', 1)";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));
}


function themSizeSanPham(){
    $maSize = $_POST['masize'];
    $tenSize = $_POST['tensize'];
    $dinhLuongSize = $_POST['dinhluongsize'];
    $sql = "INSERT INTO sizesanpham(MaSize, TenSize, DinhLuongSize, TrangThai) VALUES ('$maSize', '$tenSize', '$dinhLuongSize', 1)";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));


}

function themLoaiSanPham(){
    $maLoai = $_POST['maloai'];
    $tenLoai = $_POST['tenloai'];
    $sql = "INSERT INTO loaisanpham(MaLoai, TenLoai, TrangThai) VALUES ('$maLoai', '$tenLoai', 1)";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));

}

function getAllsizeSanPham() {
    $result = (new SanPhamBUS())->getAllSize();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getAllVienSanPham(){
    $result = (new SanPhamBUS())->getAllCrust();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));

}


function suaSizeSanPham(){
    $maSize = $_POST['masize'];
    $tenSize = $_POST['tensize'];
    $dinhLuongSize = $_POST['dinhluongsize'];
    $sql = "UPDATE sizesanpham SET TenSize = '$tenSize', DinhLuongSize = '$dinhLuongSize' WHERE MaSize = '$maSize'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));
}
function suaVienSanPham(){
    
    $maVien = $_POST['mavien'];
    $tenVien = $_POST['tenvien'];
    $dinhLuongVien = $_POST['dinhluongvien'];
    $sql = "UPDATE viensanpham SET TenVien = '$tenVien', DinhLuongVien = '$dinhLuongVien' WHERE MaVien = '$maVien'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
}

function suaLoaiSanPham(){
    $maLoai = $_POST['maloai'];
    $tenLoai = $_POST['tenloai'];
    $sql = "UPDATE loaisanpham SET
    TenLoai = '$tenLoai' WHERE MaLoai = '$maLoai'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));
}

function xoaSizeSanPham(){
    $maSize = $_POST['masize'];
    $sql = "UPDATE sizesanpham SET TrangThai = 0 WHERE MaSize = '$maSize'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));
}

function xoaVienSanPham(){
    $maVien = $_POST['mavien'];
    $sql = "UPDATE viensanpham SET TrangThai = 0 WHERE MaVien = '$maVien'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));

}

function xoaLoaiSanPham(){
    $maLoai = $_POST['maloai'];
    $sql = "UPDATE loaisanpham SET TrangThai = 0 WHERE MaLoai = '$maLoai'";
    $result = (new SanPhamBUS())->insertz($sql);
    if($result){
        die (json_encode(true));
    }
    die (json_encode(false));

}

function layThongTinSize() {
    $MaSize = $_POST['MaSize'];
    $sql = "SELECT * FROM SizeSanPham WHERE MaSize = '$MaSize'";
    $result = (new SanPhamBUS())->get_list($sql);
    die (json_encode($result));
}



// function themSizeSanPham() {
//     $MaSize = $_POST['MaSize'];
//     $TenSize = $_POST['TenSize'];
//     $DinhLuongSize = $_POST['DinhLuongSize'];
//     $sql = "INSERT INTO SizeSanPham(MaSize, TenSize, DinhLuongSize) VALUES ('$MaSize', '$TenSize', '$DinhLuongSize')";
//     $result = (new SanPhamBUS())->insertz($sql);
//     header('Location: index.php?controller=ProductAttributeController&action=index');
// }
