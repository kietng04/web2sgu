<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");
require_once(__DIR__ . "/../model/HoaDonBUS.php");
class HoaDonBUS extends DB_business
{
    function __construct()
    {
        $this->setTable("hoadon");
        parent::__construct();
    }

    function add1hoadon($data, $chitietsanpham)
    {
        $sql = "INSERT INTO hoadon (MaND, MaNV, NgayLap, TongTien, TrangThai) VALUES ('{$data['MaND']}', '0', '{$data['NgayLap']}', '{$data['TongTien']}', '{$data['TrangThai']}')";
        $result = mysqli_query($this->__conn, $sql);

        // GET max id hoadon table
        $sql = "SELECT MAX(MaHD) as maxMaHD FROM hoadon";
        $maxidResult = mysqli_query($this->__conn, $sql);
        $maxidRow = mysqli_fetch_assoc($maxidResult);
        $maxid = $maxidRow['maxMaHD'];

        // add into chitiethoadon table
        foreach ($chitietsanpham as $chitiet) {
            $sanPham = $chitiet['Product'];
            $quantity = $chitiet['Quantity'];

            var_dump($sanPham);
            $sql = "INSERT INTO chitiethoadon (MaHD, MaSP, MaSize, MaVien, Img, SoLuong, GiaTien) VALUES ('{$maxid}','{$sanPham['MaSP']}','{$sanPham['MaSize']}','{$sanPham['MaVien']}', '{$sanPham['Img']}' ,'{$quantity}','" . $sanPham['GiaTien'] * $quantity . "')";
            $result = mysqli_query($this->__conn, $sql);
        }
        return $result;
    }

    function getBill($id)
    {
        $sql = "SELECT * FROM hoadon WHERE MaND = '$id' ORDER BY MaHD DESC";
        $result = mysqli_query($this->__conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function getBillbymaHD($id)
    {
        $sql = "SELECT * FROM hoadon WHERE MaHD = '$id'";
        $result = mysqli_query($this->__conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function getDetailBill($mahd)
    {
        $sql = "SELECT * FROM chitiethoadon, sanpham WHERE MaHD = '$mahd' AND chitiethoadon.MaSP = sanpham.MaSP ";    
        $result = mysqli_query($this->__conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    function getDetail_Customer_Bill($mahd)
    {
        $sql="SELECT * 
        FROM hoadon,nguoidung
        WHERE MaHD = '$mahd'
        and hoadon.MaND=nguoidung.MaND";
        $result = mysqli_query($this->__conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function update_trangthai($mahd, $trangthai)
    {
        $sql = "UPDATE hoadon SET TrangThai = '$trangthai' WHERE MaHD = '$mahd'";
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }
}



