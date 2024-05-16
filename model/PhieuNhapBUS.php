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

    function getDSPhieuNhap() {
        $sql = "SELECT * FROM nhapsanpham, nhanvien where nhapsanpham.manv = nhanvien.manv and nhapsanpham.trangthai = 1 ORDER BY ngaynhap DESC";
        $result = $this->get_list($sql);
        die (json_encode($result));
    }

    function getPhieuxuattheomanv() {
        $manv = $_POST['manv'];
        $sql = '';
        if ($manv == '') $sql = "SELECT * FROM nhapsanpham, nhanvien WHERE nhapsanpham.manv = nhanvien.manv ORDER BY nhapsanpham.ngaynhap DESC";
        else $sql = "SELECT * FROM nhapsanpham, nhanvien WHERE nhapsanpham.manv = nhanvien.manv and nhanvien.manv = '$manv' ORDER BY nhapsanpham.ngaynhap DESC";
        $result = $this->get_list($sql);
        die (json_encode($result));
    }

    function timkiemnangcao($manv, $ngaybatdau, $ngayketthuc, $giatu, $giaden) {
        $sql = "SELECT * FROM nhapsanpham, nhanvien where";
        if ($manv == '') $sql .= " nhapsanpham.manv = nhanvien.manv";
        else $sql .= " nhapsanpham.manv = nhanvien.manv and nhanvien.manv = '$manv'";

        if ($ngaybatdau != '' && $ngayketthuc != '') $sql .= " and DATE(nhapsanpham.ngaynhap) >= '$ngaybatdau' and DATE(nhapsanpham.ngaynhap) <= '$ngayketthuc'";
        else if ($ngaybatdau != '') $sql .= " and DATE(nhapsanpham.ngaynhap) >= '$ngaybatdau'";
        else if ($ngayketthuc != '') $sql .= " and DATE(nhapsanpham.ngaynhap) <= '$ngayketthuc'";

        if ($giatu != '' && $giaden != '') $sql .= " and nhapsanpham.dongia >= $giatu and nhapsanpham.dongia <= $giaden";
        else if ($giatu != '') $sql .= " and nhapsanpham.dongia >= $giatu";
        else if ($giaden != '') $sql .= " and nhapsanpham.dongia <= $giaden";

        $result = $this->get_list($sql);
        die (json_encode($result));
    }
    
}