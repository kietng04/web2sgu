<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/NhomQuyenBUS.php');
require_once(__DIR__ . '/../model/NhanVienBUS.php');
class PermissionController extends BaseController
{
    public function index()
    {
        $this->render('admin_permission');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'themnhomquyen':
            themnhomquyen();
            break;
        case 'loadnhomquyen':
            loadnhomquyen();
            break;
        case 'xoanhomquyen':
            xoanhomquyen();
            break;
            case 'getThongTinNhanVien':
                getThongTinNhanVien();
                break;
                case 'layMaQuyenSessionPhp':
                    layMaQuyenSessionPhp();
                    break;
                    case 'loadchucnangnhomquyen':
                        loadchucnangnhomquyen();
                        break;
                        case 'xoaChucNangNhomQuyenByMaQuyen':
                            xoaChucNangNhomQuyenByMaQuyen();
                            break;
                            case 'themChucNangNhomQuyen':
                                themChucNangNhomQuyen();
                                break;

                    
                   
                           
        
    }

}
function themChucNangNhomQuyen(){
    $manq = $_POST['ma_quyen'];
    $machucnang = $_POST['ma_cn'];
    $hanhdong = $_POST['hanhdong'];
    $sql = "INSERT INTO chucnangnhomquyen (MaQuyen, MaCN, hanhdong) VALUES ('$manq', '$machucnang', '$hanhdong')";
    $result = (new NhomQuyenBUS())->insertz($sql);
    die(json_encode($result));

}

function xoaChucNangNhomQuyenByMaQuyen() {
    $manq = $_POST['ma_quyen'];
    $result = (new NhomQuyenBUS())->xoaChucNangNhomQuyenByMaQuyen($manq);
    die(json_encode($result));
}

function loadchucnangnhomquyen(){
    $manq = $_POST['maquyen'];
    $result = (new NhomQuyenBUS())->loadchucnangnhomquyen($manq);
    die(json_encode($result));
}
function themnhomquyen() {
    $tennq = $_POST['tennq'];
    $hashmapnhomquyen = json_decode($_POST['mapquyen'], true);  
    $result = (new NhomQuyenBUS())->add1nhomquyen($tennq, $hashmapnhomquyen);
    die(json_encode($result));
}


function loadnhomquyen() {
    $result = (new NhomQuyenBUS())->getAllnhomquyen();
    die(json_encode($result));
}

function xoanhomquyen() {
    $manq = $_POST['maquyen'];
    $result = (new NhomQuyenBUS())->delete1nhomquyen($manq);
    die(json_encode($result));
}

//lay thong tin nhan vien
function getThongTinNhanVien() {
$manv = $_POST['manv'];
    $result = (new NhanVienBUS())->getThongTinNhanViensql($manv);
    die(json_encode($result));
}

function layMaQuyenSessionPhp() {
    $result = (new NhomQuyenBUS())->layMaQuyenSessionPhp();
    die(json_encode($result));
}

