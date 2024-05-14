<?php
// require base controller


require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
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
    case 'dangnhap':
        if(isset($_POST['data_username']) && isset($_POST['data_pass'])){
            login();
        }
        break;
    case 'dangnhapnhanvien':
        if(isset($_POST['data_usernames']) && isset($_POST['data_passs'])){
            loginStaff();
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
    case 'getProducts':
        getProducts();
        break;
    case 'changePage':
        if(isset($_POST['currentpage']) && isset($_POST['currentquery'])){
            getProductPagAjax();
        }
        break;
    case 'ajaxcategory':
        getProducts();
        break;
    case 'getProductByID':
        if(isset($_POST['id'])){
            getProductByID();
        }
        break;
    case 'getProductDetailID':
        if(isset($_POST['id'])){
            getProductDetailID();
        }
        break;
    case 'saveSessionCart':
        saveSessionCart();
        break;
    // case `CreateRoom`
    //     createRoom();
    //     break;
    case 'livesearch':
        getProducts();
        break;
    
    case 'getAllCrust':
        getAllCrust();
        break;
    case 'getAllSize':
        getAllSize();
        break;
    case 'getAllProduct':
        getDefaultProducts();
        break;
    case 'getListSizeDeProduct':
        getListSizeDeProduct();
        break;
    case 'getAllCategory':
        getAllCategory();
        break;
}
}
function login() {
    $username=$_POST['data_username'];
	$password=$_POST['data_pass'];
    $sql = "SELECT * FROM TaiKhoanNguoiDung tk join NguoiDung nd on tk.MaND = nd.MaND WHERE tk.TaiKhoan='$username' AND tk.MatKhau='$password'";
    $result = (new NguoiDungBus())->get_list($sql);
    // create array include $result and null
    $returnz = array('result' => $result, 'cart' => null);
    if($result != false){
        //get user real info
        $_SESSION['currentUser']=$returnz;
        die (json_encode($result)); 
        return 1;
    }  

    die (json_encode(null));
    return 0;
}
function loginStaff() { 
    $username=$_POST['data_usernames'];
    $password=$_POST['data_passs'];
    $sql = "SELECT * FROM TaiKhoanNhanVien WHERE TaiKhoan='$username' AND MatKhau='$password'";
    $result = (new NhanVienBus())->get_list($sql);
        // create array include $result and null
    $returnz = array('result' => $result, 'cart' => null);
    if($result != false){
        $_SESSION['currentUser']=$returnz;
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
    $insert_sql="INSERT INTO nguoidung  ,Ten,SDT,Email,DiaChi,TaiKhoan,MatKhau,GioiTinh) VALUES ('$ho','$ten','$sdt','$email','$diachi','$newUser','$newPass','$gioitinh')";


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

// function getProductByFilters() {
//     $category = $_POST['category'];
//     $sql = `SELECT * FROM sanpham, chitietsanpham WHERE Loai ='$category' AND sanpham.MaSP = chitietsanpham.MaSP AND MaSize='S' AND MaVien='M'`;
//     $result = (new DB_driver())->get_list($sql);

//     if ($result != null) {
//         die (json_encode($result));
//     }
//     die (json_encode(null));
// }

function getProducts() {
    $query = $_POST['currentquery'];
    // count(*) from query
    $countrow = "SELECT count(*) as total from ($query) as total";
    $rownum = (new DB_driver())->get1row($countrow);
    $currentpage = $_POST['currentpage'];
    // call get_list method from sanphamBUS
    $from = ($currentpage - 1) * 8;
    $to = 8;
    $query = $query . " LIMIT $from, $to";
    $result = (new SanPhamBUS())->get_list($query);

    if ($result != null) {
        die (json_encode(array('countrow' => $rownum['total'], 'result' => $result)));
    }
    die (json_encode(null));
}

function getProductPagAjax() {
    $query = $_POST['currentquery'];
    $from = ($_POST['currentpage'] - 1) * 8;
    $to = 8;    
    $query = $query . " LIMIT $from, $to";
    $result = (new SanPhamBUS())->get_list($query);

    
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getProductByID() {
    $id = $_POST['id'];
    $result = (new SanPhamBUS())->getProductByID($id);

    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getProductDetailID() {
    $result = (new SanPhamBUS())->getProductDetailID($_POST['id'], $_POST['idsize'], $_POST['idcrust']);

    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function saveSessionCart() {
    // access to cart in $_SESSION['currentUser']
    if(isset($_SESSION['currentUser'])) {
        $_SESSION['currentUser']['cart'] = $_POST['cart'];
        die (json_encode($_SESSION['currentUser']));
    }
    die (json_encode(null));
}

function createRoom() {
    // get all id room
    $sql = "SELECT maphong FROM PhongOrder";
}

function getAllCrust() {
    $result = (new SanPhamBUS())->getAllCrust();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getAllSize() {
    $result = (new SanPhamBUS())->getAllSize();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getListSizeDeProduct() {
    $id = $_POST['productID'];
    $result = (new SanPhamBUS())->getListSizeDeProduct($id);
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}

function getAllCategory() {
    $result = (new SanPhamBUS())->getAllCategory();
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}