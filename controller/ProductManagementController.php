<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
class ProductManagementController extends BaseController
{
    public function index()
    {
        $this->render('admin_product');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'loadTableProduct':
            getProducts();
            break;
        case 'uploadProduct':
            uploadProduct();
            break;
    }
}


function uploadProduct() {
    $name = $_POST['tensp'];
    
    $category = $_POST['loai'];
    $arrayitem = $_POST['arrayitem'];
    $arrayitem = json_decode($arrayitem);
    $description = $_POST['mota'];

    // them chi tiet sp
    $sizelist = array('L', 'M', 'S');
    $vienlist = (new SanPhamBUS())->getAllIDCrust();

    for ($i = 0; $i < count($sizelist); $i++) {
        for ($j = 0; $j < count($vienlist); $j++) {
            var_dump($arrayitem[$i]);
            $sql = "INSERT INTO chitietsanpham(MaSP, MaSize, MaVien, GiaNhap, GiaTien, SoLuong) VALUES ('PDODO', '{$sizelist[$i]}', '{$vienlist[$j]['MaVien']}','{$arrayitem[$i]->gianhap}' ,'{$arrayitem[$i]->giaxuat}', 0)";
            $result = (new SanPhamBUS())->insertz($sql);
            if (!$result) {
                var_dump("ppo");
            }
            else {
                var_dump("ppp");
            }
        }
    }

    if(!empty($_FILES["up-hinh-anh"]["name"])) { 
        $fileName = basename($_FILES["up-hinh-anh"]["name"]); 
        // lấy loại file (đuôi file) jpg, png, gif,...
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $allowTypes = array('jpg','png','jpeg','gif'); 
        // nếu mà file đó nằm trong mảng allowTypes (tức là file hợp lệ)
        if(in_array($fileType, $allowTypes)) {
            $image = $_FILES['up-hinh-anh']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            $sql = "INSERT INTO sanpham(MaSP, TenSP, Mota, Img, Loai, ImgBinary) VALUES ('PDODO', '$name', '$description', '', '$category', '$imgContent')";
            $result = (new SanPhamBUS())->insertz($sql);
            if ($result) {
                die (json_encode(array('status' => 'success')));
            }
        }
    }
        
    
    die (json_encode(array('status' => 'fail')));
}

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
    // convert result.Img into base64
    for ($i = 0; $i < count($result); $i++) {
        if ($result[$i]['ImgBinary'] != null) {
            $result[$i]['ImgBinary'] = base64_encode($result[$i]['ImgBinary']);
        }
    }
    // return countrow and result
    if ($result != null) {
        die (json_encode(array('countrow' => $rownum['total'], 'result' => $result)));
    }
    die (json_encode(null));
}

function getprod() {
    $sql = "SELECT * FROM sanpham, chitietsanpham where sanpham.MaSP = chitietsanpham.MaSP and chitietsanpham.MaSize = 'S' and chitietsanpham.MaVien = 'V'";
    return (new SanPhamBUS())->get_list($sql);
}