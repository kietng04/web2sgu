<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
require_once(__DIR__ . '/../model/PhieuNhapBUS.php');
session_start();
class ImportController extends BaseController
{
    public function index()
    {
        $this->render('admin_import');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'getMaPNnew':
            getMaPNnew();
            break;
        case 'themphieunhap':
            themphieunhap();
            break;
        case 'getDSPhieuNhap':
            getDSPhieuNhap();
        case 'getPhieuxuattheomanv':
            getPhieuxuattheomanv();
            break;
        case 'timkiemnangcao':
            timkiemnangcao();
            break;
    }
}

function getMaPNnew() {
    $data = (new PhieuNhapBUS())->getMaPNnew();
    die(json_encode($data));
}

function themphieunhap() {
    $MaPN = $_POST['MaPN'];
    $listCTPN = $_POST['listCTPN'];
    $date = $_POST['date'];
    $dongia = $_POST['dongia'];
    $data = [
        'MaPN' => $MaPN,
        'NgayNhap' => $date,
        'MaNV' => $_SESSION['currentUser']['result'][0]['MaNV'],
        'Dongia' => $dongia
    ];
    return (new PhieuNhapBUS())->add1phieunhap($data, $listCTPN);
}
   

function getDSPhieuNhap() {
    $data = (new PhieuNhapBUS())->getDSPhieuNhap();
    die(json_encode($data));
}

function getPhieuxuattheomanv() {
    $data = (new PhieuNhapBUS())->getPhieuxuattheomanv();
    die(json_encode($data));
}

function timkiemnangcao() {
    $manv = $_POST['manv'];
    $ngaybatdau = $_POST['ngaybd'];
    $ngayketthuc = $_POST['ngaykt'];
    $giatu = $_POST['giafrom'];
    $giaden = $_POST['giato'];
    $data = (new PhieuNhapBUS())->timkiemnangcao($manv, $ngaybatdau, $ngayketthuc, $giatu, $giaden);
}