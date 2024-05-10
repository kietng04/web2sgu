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

       
    }
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
// function themSizeSanPham() {
//     $MaSize = $_POST['MaSize'];
//     $TenSize = $_POST['TenSize'];
//     $DinhLuongSize = $_POST['DinhLuongSize'];
//     $sql = "INSERT INTO SizeSanPham(MaSize, TenSize, DinhLuongSize) VALUES ('$MaSize', '$TenSize', '$DinhLuongSize')";
//     $result = (new SanPhamBUS())->insertz($sql);
//     header('Location: index.php?controller=ProductAttributeController&action=index');
// }

function layThongTinSize() {
    $MaSize = $_POST['MaSize'];
    $sql = "SELECT * FROM SizeSanPham WHERE MaSize = '$MaSize'";
    $result = (new SanPhamBUS())->get_list($sql);
    die (json_encode($result));
}



