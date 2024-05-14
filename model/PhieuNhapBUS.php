<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");

class PhieuNhapBUS extends DB_business {
    function __construct()
    {
        $this->setTable("phieunhap");
        parent::__construct();
    }

    function getMaPNnew() {
        $sql = "SELECT mapn, COUNT(*) as count FROM nhapsanpham GROUP BY mapn";
        $result = $this->get_list($sql);
        die (json_encode($result));
    }

    function add1phieunhap($data, $listCTPN) {
        $ngaynhap = $data['NgayNhap'];
        $manv = $data['MaNV'];
        $mapn = $data['MaPN'];
        $dongia = $data['Dongia'];
        $sql = "INSERT INTO nhapsanpham (mapn,manv,ngaynhap, dongia) VALUES ('$mapn','$manv','$ngaynhap', '$dongia')";
        $result = $this->insertz($sql);
        if ($result) {
            foreach ($listCTPN as $ctpn) {
                $masp = $ctpn['MaSP'];
                $soluong = $ctpn['SoLuong'];
                $Masize = $ctpn['MaSize'];
                $Mavien = $ctpn['MaDe'];
                $gianhap = $ctpn['GiaNhap'];
                $giaxuat = $ctpn['GiaBan'];
                $sql = "INSERT INTO chitietnhap (mapn,masp,masize,mavien,soluong, gianhap, giaxuat) VALUES ('$mapn','$masp','$Masize','$Mavien','$soluong', '$gianhap', '$giaxuat')";
                $result = $this->insertz($sql);
                if (!$result) {
                    
                    die (json_encode(array('status' => 'fail')));
                }
                $sql = "UPDATE chitietsanpham SET soluong = soluong + $soluong, gianhap = $gianhap, giatien = $giaxuat WHERE masp = '$masp' AND masize = '$Masize' AND mavien = '$Mavien'";
                $result = $this->updatezzz($sql);
                if (!$result) {
                    die (json_encode(array('status' => 'fail khi them ctsp')));
                }
            }
            die (json_encode(array('status' => 'success')));
        }
    }   
}