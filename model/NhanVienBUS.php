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

    function insertNhanVien($MaNV,$Ho,$Ten,$Email,$DiaChi,$SDT,$phanquyen) {

        $sql = "INSERT INTO nhanvien(MaNV,Ho,Ten,SDT,Email,DiaChi,PhanQuyen) VALUES ('$MaNV', '$Ho', '$Ten','$SDT','$Email','$DiaChi',$phanquyen)";
        $result = mysqli_query($this->__conn, $sql);
        if ($result) {
            return mysqli_insert_id($this->__conn);
        } else {
            return false;
        }
    }

    function insertTaiKhoanNhanVien($MaNV,$taikhoan,$password,$trangthai){
        $sql="INSERT INTO taikhoannhanvien(MaNV,TaiKhoan,MatKhau,TrangThai) VALUES ('$MaNV','$taikhoan','$password',$trangthai)";
        $result = mysqli_query($this->__conn, $sql);
        if ($result) {
            return mysqli_insert_id($this->__conn);
        } else {
            return false;
        }
    }   

    
    function deleteNhanVien($manv){
        // Delete from taikhoannhanvien
        $sql1 = "DELETE FROM taikhoannhanvien WHERE MaNV = '$manv'";
        $result1 = mysqli_query($this->__conn, $sql1);

        // Delete from nhanvien
        $sql2 = "DELETE FROM nhanvien WHERE MaNV = '$manv'";
        $result2 = mysqli_query($this->__conn, $sql2);

        // Return true if both queries were successful
        return $result1 && $result2;
    }
    
    function getPhanQuyen($manv){
        $sql="SELECT PhanQuyen FROM nhanvien WHERE MaNV='$manv'";
        $result = mysqli_query($this->__conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function updateNhanVien($manv,$ho,$ten,$email,$Diachi,$sodienthoai,$phanquyen){
        $sql = "UPDATE nhanvien SET Ho='$ho',Ten='$ten',Email='$email',DiaChi='$Diachi',SDT='$sodienthoai',PhanQuyen=$phanquyen WHERE MaNV='$manv'";
        $sql2="UPDATE taikhoannhanvien SET TaiKhoan='$email' WHERE MaNV='$manv'";
        $result = mysqli_query($this->__conn, $sql);
        $result2 = mysqli_query($this->__conn, $sql2);
        return $result && $result2;
    }

    function updateStatus($mand,$status){
        $sql = "UPDATE taikhoannhanvien SET TrangThai=$status WHERE MaNV='$mand'";
        $result = mysqli_query($this->__conn, $sql);
        return $result;

    }
    
function getNVtheoMaNVienz() {
    $manv = $_POST['manv'];
    $sql = "SELECT * FROM taikhoannhanvien, nhanvien WHERE taikhoannhanvien.MaNV = nhanvien.MaNV AND taikhoannhanvien.MaNV = '$manv' and nhanvien.TrangThai = 1";
    $data = $this->get_list($sql);
    die(json_encode($data));
}

    function getDSNV() {
        $sql = "SELECT * FROM nhanvien WHERE nhanvien.TrangThai = 1";
        $data = $this->get_list($sql);
        die(json_encode($data));
    }
}

