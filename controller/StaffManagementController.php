<?php
// require base controller
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/NhanVienBUS.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
session_start();
class ProductsController extends BaseController
{
	public function index()
	{
		// $products = (new SanPhamBUS())->getProduct();
		// $data = array('products' => $products);
		$this->render('index');
	}
}

if (isset($_POST['request'])) {
switch($_POST['request']) {
    case 'getNVtheoMaNV':
        if(isset($_POST['manv'])){
            getNVtheoMaNV();
        }
        break;
    case 'getDSNV':
        getDSNV();
        break;
    case 'getNVtheoMaNV':
        getNVtheoMaNV();
        break;
}
}

function getNVtheoMaNV() {
    $manv = $_POST['manv'];
    $data = (new NhanVienBUS())->getNVtheoMaNVienz();
    die(json_encode($data));
}

function getDSNV() {
    $data = (new NhanVienBUS())->getDSNV();
    die(json_encode($data));
}