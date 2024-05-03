<?php
require_once('BaseController.php');

class ProductAttributeController extends BaseController
{
    public function index()
    {
        $this->render('admin_attributeProduct');
    }
}


// Them size san pham
// CREATE TABLE `SizeSanPham`(
//     `MaSize` varchar(100) NOT NULL,
//     `TenSize` varchar(100) NOT NULL,
//     `DinhLuongSize` varchar(100) NOT NULL,
//     primary key (MaSize)
//   );



function themSizeSanPham() {
    $MaSize = $_POST['MaSize'];
    $TenSize = $_POST['TenSize'];
    $DinhLuongSize = $_POST['DinhLuongSize'];
    $sql = "INSERT INTO SizeSanPham(MaSize, TenSize, DinhLuongSize) VALUES ('$MaSize', '$TenSize', '$DinhLuongSize')";
    $result = (new SanPhamBUS())->insertz($sql);
    header('Location: index.php?controller=ProductAttributeController&action=index');
}




