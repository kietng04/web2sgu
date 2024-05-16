<?php
require_once(__DIR__ . '/../BackEnd/DB_business.php');
// CREATE TABLE `SizeSanPham`(
//     `MaSize` varchar(100) NOT NULL,
//     `TenSize` varchar(100) NOT NULL,
//     `DinhLuongSize` varchar(100) NOT NULL,
//     primary key (MaSize)
//   );
  
//   INSERT INTO `SizeSanPham` (`MaSize`, `TenSize`, `DinhLuongSize`) VALUES
//   ('S', 'Nhỏ', 'Bán kính 15cm'),
//   ('M', 'Vừa', 'Bán kính 20cm'),
//   ('L', 'Lớn', 'Bán kính 25cm');

class ThuocTinhSanPhamBUS extends DB_business {
    function __construct()
    {
        $this->setTable("sizesanpham");
    }
    // hàm này chỉ dùng để hiển thị sản phẩm khi trang vừa load lên
    function getAllAttributeProduct() {
        $sql = "SELECT * FROM sizesanpham";
        $result = $this->get_list($sql);
        return $result;
    }
    
    function getProductbyID($id) {
        $sql = "SELECT * FROM sizesanpham where MaSize = '$id'";
        $result = $this->get_list($sql);
        return $result;
    }

    
    function insertAttributeProduct($id, $name, $amount) {
        $sql = "INSERT INTO sizesanpham(MaSize, TenSize, DinhLuongSize) VALUES ('$id', '$name', '$amount')";
        $result = $this->insertz($sql);
        return $result;
    }

    
    function deleteAttributeProduct($id) {
        $sql = "DELETE FROM sizesanpham WHERE MaSize = '$id'";
        
        $result = $this->execute($sql);
        return $result;
    }


}