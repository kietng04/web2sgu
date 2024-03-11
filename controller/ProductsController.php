<?php
// require base controller
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
session_start();
class ProductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
		// $products = (new SanPhamBUS())->getProduct();
		// $data = array('products' => $products);
		$this->render('index');
	}
}

if (isset($_POST['request'])) {
switch($_POST['request']) {
    case 'dangnhap':
        if(isset($_POST['data_username']) && isset($_POST['data_pass'])){
            login();
        }
        break;
    case 'dangky':
        if(isset($_POST['data_ho']) && isset($_POST['data_ten']) && isset($_POST['data_sdt']) && isset($_POST['data_email']) && isset($_POST['data_diachi']) && isset($_POST['data_newUser']) && isset($_POST['data_newPass'])){
            signup();
        }
        break;
    case 'logout':
        if(isset($_SESSION['currentUser'])) {
            unset($_SESSION['currentUser']);
            die (json_encode(true));
        }
        die (json_encode(false));
        break;
    case 'getCurrentUser':
        if(isset($_SESSION['currentUser'])) {
            die (json_encode($_SESSION['currentUser']));
        }
            die (json_encode(null));
        break;
	case 'getDefaultProducts':
        getDefaultProducts();
        break;
    case 'getProductByFilters':
        getProductByFilters();
        break;
    case 'getProducts':
        getProducts();
        break;
}
}
function login() {
    $username=$_POST['data_username'];
	$password=$_POST['data_pass'];
    $sql = "SELECT * FROM nguoidung WHERE TaiKhoan='$username' AND MatKhau='$password' AND MaQuyen=1 AND TrangThai=1";
    $result = (new NguoiDungBus())->get_list($sql);
    
    if($result != false){
        $_SESSION['currentUser']=$result;
        die (json_encode($result)); 
        return 1;
    }  

    die (json_encode(null));
    return 0;
}

function signup() {
    $ho=$_POST['data_ho'];
	$ten=$_POST['data_ten'];
	$sdt=$_POST['data_sdt'];
	$email=$_POST['data_email'];
	$diachi=$_POST['data_diachi'];
	$newUser=$_POST['data_newUser'];
	$newPass=$_POST['data_newPass']; 
    $gioitinh=$_POST['data_gioitinh'];
    $status = (new NguoiDungBUS())->add_new(array(
        "MaND" => "",
        "Ho" => $ho,
        "Ten" => $ten,
        "GioiTinh" => $gioitinh,
        "SDT" => $sdt,
        "Email" => $email,
        "DiaChi" => $diachi,
        "TaiKhoan" =>$newUser,
        "MatKhau" => $newPass,
        "MaQuyen" => 1,
        "TrangThai" => 1
    ));

    // đăng nhập vào ngay
    $sql = "SELECT * FROM nguoidung WHERE TaiKhoan='$newUser' AND MatKhau='$newPass' AND MaQuyen=1 AND TrangThai=1";
    $result = (new DB_driver())->get1row($sql);


    if($result != false){
        $_SESSION['currentUser']=$result;
        die (json_encode($result)); 
    }  

    die (json_encode(null));
}

function getDefaultProducts() {
	$result = (new SanPhamBUS)->getProduct();
	if ($result != null) {
		die (json_encode($result));
	}
	die (json_encode(null));
}

function getProductByFilters() {
    $category = $_POST['category'];
    $sql = "SELECT * FROM pizza WHERE Loai ='$category' AND PizzaSize='Nhỏ' AND Crust='Vừa'";
    $result = (new DB_driver())->get_list($sql);

    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getProducts() {
    $query = $_POST['currentquery'];
    // count(*) from query
    $countrow = "SELECT count(*) as total from ($query) as total";
    $rownum = (new DB_driver())->get1row($countrow);
    $currentpage = $_POST['currentpage'];
    // call get_list method from sanphamBUS
    $from = ($currentpage - 1) * 4;
    $to = 4;
    $query = $query . " LIMIT $from, $to";
    $result = (new SanPhamBUS())->get_list($query);
    // return countrow and result
    if ($result != null) {
        die (json_encode(array('countrow' => $rownum['total'], 'result' => $result)));
    }
}