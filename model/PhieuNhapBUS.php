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
        $sql = "INSERT INTO nhapsanpham (mapn,manv,ngaynhap) VALUES ('$mapn','$manv','$ngaynhap')";
        $result = $this->insertz($sql);
        // if ($result) {
        //     foreach ($listCTPN as $ctpn) {
        //         $masp = $ctpn['MaSP'];
        //         $soluong = $ctpn['SoLuong'];
        //         $sql = "INSERT INTO nhapsanpham (mapn,masp,soluong) VALUES ('$mapn','$masp','$soluong')";  
        //         $result = $this->insertz($sql);
        //         if (!$result) {
        //             return false;
        //         }
        //     }
        //     return true;
        // }
    }
}