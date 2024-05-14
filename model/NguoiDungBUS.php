<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
class NguoiDungBUS extends DB_business {
    function __construct()
    {
        $this->setTable("NguoiDung");
        parent::__construct();
    }

    function add_new($data)
    {
       return parent::add_new($data);
    }
    
    function insertNguoiDung($MaND,$Ho,$Ten,$Email,$DiaChi,$SDT) {

        $sql = "INSERT INTO nguoidung(MaND,Ho,Ten,SDT,Email,DiaChi) VALUES ('$MaND', '$Ho', '$Ten','$SDT','$Email','$DiaChi')";
        $result = mysqli_query($this->__conn, $sql);
        if ($result) {
            return mysqli_insert_id($this->__conn);
        } else {
            return false;
        }
    }

    function insertTaiKhoanNguoiDung($MaND,$taikhoan,$password,$trangthai){
        $sql="INSERT INTO taikhoannguoidung(MaND,TaiKhoan,MatKhau,TrangThai) VALUES ('$MaND','$taikhoan','$password',$trangthai)";
        $result = mysqli_query($this->__conn, $sql);
        if ($result) {
            return mysqli_insert_id($this->__conn);
        } else {
            return false;
        }
    }

    function loadAll(){
        $sql = "
        SELECT nhanvien.Ten,nhanvien.Ho,nhanvien.MaNV,nhanvien.SDT,nhanvien.Email,nhanvien.DiaChi,taikhoannhanvien.TrangThai
        FROM nhanvien
        LEFT join taikhoannhanvien on nhanvien.MaNV=taikhoannhanvien.MaNV
              UNION ALL
        SELECT  
        nguoidung.Ten ,nguoidung.Ho, nguoidung.MaND ,nguoidung.SDT,nguoidung.Email,nguoidung.DiaChi,taikhoannguoidung.TrangThai nguoidung 
        FROM nguoidung
        LEFT JOIN taikhoannguoidung on nguoidung.MaND=taikhoannguoidung.MaND
        ";
        $result = mysqli_query($this->__conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;

    }

    function deleteNguoiDung($mand){
        // Delete from taikhoannguoidung
        $sql1 = "DELETE FROM taikhoannguoidung WHERE MaND = '$mand'";
        $result1 = mysqli_query($this->__conn, $sql1);

        // Delete from nguoidung
        $sql2 = "DELETE FROM nguoidung WHERE MaND = '$mand'";
        $result2 = mysqli_query($this->__conn, $sql2);

        // Return true if both queries were successful
        return $result1 && $result2;
    }


    function updateNguoiDung($mand,$ho,$ten,$email,$diachi,$sodienthoai){
        $sql = "UPDATE nguoidung SET Ho='$ho', Ten='$ten', Email='$email ', DiaChi='$diachi', SDT='$sodienthoai' WHERE MaND='$mand'";
        $sql2="UPDATE taikhoannguoidung SET TaiKhoan='$email' WHERE MaND='$mand'";
        $result1 = mysqli_query($this->__conn, $sql);
        $result2 = mysqli_query($this->__conn, $sql2);
        return $result1 && $result2;
    }

    function updateStatus($mand,$status){
        $sql = "UPDATE taikhoannguoidung SET TrangThai=$status WHERE MaND='$mand'";
        $result = mysqli_query($this->__conn, $sql);
        return $result;

    }
}