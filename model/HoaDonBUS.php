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

    function add1hoadon($data)
    {
        $sql = "INSERT INTO hoadon (MaND, MaNV, NgayLap, TongTien, TrangThai) VALUES ('{$data['MaND']}', '0', '{$data['NgayLap']}', '{$data['TongTien']}', '{$data['TrangThai']}')";
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }

}