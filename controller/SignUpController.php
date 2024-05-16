<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/ThongTinNguoiDungBUS.php');
session_start();

global $bustk;
$bustk = new ThongTinNguoiDungBUS();
global $busttnd;
$busttnd = new NguoiDungBUS();

class SignUpController extends BaseController
{
    public function index()
    {
        $this->render('register');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'dangky':
            if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['gioitinh'])  && isset($_POST['sdt']) && isset($_POST['diachi']) && isset($_POST['username']) && isset($_POST['password'])) {
                $result = signup($bustk, $busttnd);
                die(json_encode($result));
            }
            break;
        case 'checksdt':
            if (isset($_POST['sdt'])) {
                $sdt = $_POST['sdt'];
                $result = checkSDT($busttnd, $sdt);
                die(json_encode($result));
            }
            break;
        case 'checkusername':
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $result = checkUsername($bustk, $username);
                die(json_encode($result));
            }
            break;
        case 'checkemail':
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $result = checkEmail($busttnd, $email);
                die(json_encode($result));
            }
            break;
    }
}

function signup($bustk, $busttnd) {
    $nextUserID = $bustk->nextUserId();
    $IDCode = 'ND' . sprintf('%02d', $nextUserID);
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sdt'];
    $sql = "INSERT INTO NguoiDung(MaND, Ho, Ten, Email, GioiTinh, DiaChi, SDT) VALUES ('$IDCode', '$firstname', '$lastname', '$email', '$gioitinh', '$diachi', '$sodienthoai')";
    $resultTTND = $busttnd->insertz($sql);
    


    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO TaiKhoanNguoiDung(MaND, TaiKhoan, MatKhau, TrangThai) VALUES ('$IDCode', '$username', '$password', '1')";
    $resultTK = $bustk->insertz($sql);
 
    return $resultTK;
}

function checkSDT($busttnd, $sdt) {
    $sql = "SELECT * FROM NguoiDung WHERE SDT = '$sdt'";
    $result = $busttnd->get_list($sql);
    return $result;
}

function checkUsername($bustk, $username) {
    $sql = "SELECT * FROM TaiKhoanNguoiDung WHERE TaiKhoan = '$username'";
    $result = $bustk->get_list($sql);
    return $result;
}

function checkEmail($busttnd, $email) {
    $sql = "SELECT * FROM NguoiDung WHERE Email = '$email'";
    $result = $busttnd->get_list($sql);
    return $result;
}


?>
