<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/NhanVienBUS.php');
session_start();

class UserControlelr extends BaseController
{
    public function index()
    {
        $this->render('register');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'addAccount_nguoidung':
            addAccount_nguoidung_taikhoannguoidung();
            break;
        case 'addAccount_nhanvien':
            addAccount_nhanvien_taikhoannhanvien();
            break;
        case 'loadUser':
            loadUser();
            break;
        case 'deleteAccount':
            deleteUser();
            break;
        case 'getPhanQuyen':
            getPhanQuyen();
            break;
        case 'editAccount_ND':
            updateAccount_ND();
            break;
        case 'editAccount_NV':
            updateAccount_NV();
            break;
        case 'changeStatus':
            updateStatus();
            break;
        
    }
}


function loadUser() {
    $result = (new NguoiDungBUS())->loadAll();
    if ($result) {
        die (json_encode($result));
    } else {
        die (json_encode("error"));
    }
}


function addAccount_nguoidung_taikhoannguoidung() {
    $MaND = $_POST['mand'];
    $ho= $_POST['ho'];
    $ten= $_POST['ten'];
    $email = $_POST['email'];
    $Diachi = $_POST['address'];
    $sodienthoai = $_POST['phone'];
    $password= $_POST['password'];
    $username = $_POST['username'];
    $trangthai=1;

    // create array key value
    
    $result1 = (new NguoiDungBUS())->insertNguoiDung($MaND,$ho,$ten,$email,$Diachi,$sodienthoai);
    $result2 = (new NguoiDungBUS())->insertTaiKhoanNguoiDung($MaND,$username,$password,$trangthai);

    die (json_encode(array('result1' => $result1, 'result2' => $result2)));
}




function addAccount_nhanvien_taikhoannhanvien() {
    $MaNV = $_POST['manv'];
    $ho= $_POST['ho'];
    $ten= $_POST['ten'];
    $email = $_POST['email'];
    $Diachi = $_POST['address'];
    $sodienthoai = $_POST['phone'];
    $password= $_POST['password'];
    $trangthai=1;
    $phanquyen = $_POST['phanquyen'];
    // create array key value
    
    $result1 = (new NhanVienBUS())->insertNhanVien($MaNV,$ho,$ten,$email,$Diachi,$sodienthoai,$phanquyen);
    $result2 = (new NhanVienBUS())->insertTaiKhoanNhanVien($MaNV,$email,$password,$trangthai);

    die (json_encode(array('result1' => $result1, 'result2' => $result2)));
}



function deleteUser(){
    $mand = $_POST['Account_id'];
    if (strpos($mand, 'NV') === 0) {
        // This is a NhanVien
        $result = (new NhanVienBUS())->deleteNhanVien($mand);
    } else if (strpos($mand, 'ND') === 0) {
        // This is a NguoiDung
        $result = (new NguoiDungBUS())->deleteNguoiDung($mand);
    } else {
        // Invalid mand
        $result = false;
    }
    die (json_encode($result));
}

function getPhanQuyen(){
    $manv= $_POST['manv'];
    $result = (new NhanVienBUS())->getPhanQuyen($manv);
    die (json_encode($result));
}


function updateAccount_ND(){
    $mand = $_POST['mand'];
    $ho= $_POST['ho'];
    $ten= $_POST['ten'];
    $email = $_POST['email'];
    $Diachi = $_POST['address'];
    $sodienthoai = $_POST['phone'];
    $result = (new NguoiDungBUS())->updateNguoiDung($mand,$ho,$ten,$email,$Diachi,$sodienthoai);
    die (json_encode($result));
}

function updateAccount_NV(){
    $manv = $_POST['manv'];
    $ho= $_POST['ho'];
    $ten= $_POST['ten'];
    $email = $_POST['email'];
    $Diachi = $_POST['address'];
    $sodienthoai = $_POST['phone'];
    $phanquyen = $_POST['phanquyen'];
    $result = (new NhanVienBUS())->updateNhanVien($manv,$ho,$ten,$email,$Diachi,$sodienthoai,$phanquyen);
    die (json_encode($result));
}

function updateStatus(){
    $mand = $_POST['mand'];
    $status = $_POST['status'];
    if (strpos($mand, 'NV') === 0) {
        // This is a NhanVien
        $result = (new NhanVienBUS())->updateStatus($mand, $status);
    } else if (strpos($mand, 'ND') === 0) {
        // This is a NguoiDung
        $result = (new NguoiDungBUS())->updateStatus($mand, $status);
    } else {
        // Invalid mand
        $result = false;
    }
    die (json_encode($result));
}


?>