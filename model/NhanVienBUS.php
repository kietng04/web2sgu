<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");
require_once(__DIR__ . '/../model/NhanVienBUS.php');
class NhanVienBUS extends DB_business {
    function __construct()
    {
        $this->setTable("TaiKhoanNhanVien");
        parent::__construct();
    }

    function add_new($data)
    {
       return parent::add_new($data);
    }
    
}

function getNVtheoMaNVien() {
    $manv = $_POST['manv'];
    $sql = "SELECT * FROM taikhoannhanvien, nhanvien WHERE taikhoannhanvien.MaNV = nhanvien.MaNV AND taikhoannhanvien.MaNV = '$manv' and nhanvien.TrangThai = 1";
    $data = $this->get_list($sql);
    die(json_encode($data));
}