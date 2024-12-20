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
global $bussp;
$bussp = new SanPhamBUS();

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'loadTableProduct':
            getProducts();
            break;
        case 'uploadProduct':
            uploadProduct();
            break;
        case 'deleteProduct':
            deleteProduct();
            break;
        case 'getproductbyid':
            getproductbyid();
            break;
        case 'getMapSizeDe':
            getMapSizeDe();
            break;
        case 'editProduct':
            editProduct();
            break;
    }
}

function editProduct() {
    global $bussp;
    $name = $_POST['tensp'];
    $category = $_POST['loai'];
    $description = $_POST['mota'];
    $masp = $_POST['masp'];

    if (isset($_FILES['up-hinh-anh'])) {
        global $bussp;
        $file = $_FILES['up-hinh-anh'];
        
        $uploadDir = '../images/pizzaimg/';

        // Tạo một tên file duy nhất
        $uploadFile = $uploadDir . basename($file['name']);

        // Di chuyển file đã tải lên vào thư mục tải lên
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $uploadFile = './images/pizzaimg/' . basename($file['name']);
            $sql = "UPDATE sanpham SET TenSP = '$name', Mota = '$description', Img = '$uploadFile', Loai = '$category' WHERE MaSP = '$masp'";
        } else {
            $uploadFile = './images/pizzaimg/pizza_temp.jpg';
            $sql = "UPDATE sanpham SET TenSP = '$name', Mota = '$description', Loai = '$category' WHERE MaSP = '$masp'";
        }
        // them sp vao db
       
        $result = $bussp->updatezzz($sql);

        if ($result) {
            // add chitietsanpham
            // convert to arrray $_POST['chitietsanpham']; 
            $listchitiet = json_decode($_POST['chitietsanpham'], true);
           // die listchitiet size
           $sql = "DELETE FROM chitietsanpham WHERE MaSP = '$masp'";
                $result = $bussp->updatezzz($sql);

                if (!$result) {
                    die (json_encode(array('status' => 'fail1')));
                }
            foreach ($listchitiet as $item) {

                // delete chi tietsanpham have size and vien and then insert it
                
                

                $sql = "INSERT INTO chitietsanpham(MaSP, MaSize, MaVien, GiaNhap, GiaTien, SoLuong) VALUES ('$masp', '{$item['masize']}', '{$item['made']}', {$item['gianhap']} , {$item['giaxuat']}, 0)";
                $result = $bussp->insertz($sql);

                if (!$result) {
                    die (json_encode(array('status' => 'fail2')));
                }

            }
            die (json_encode(array('status' => 'successz')));
        }
    }
}

function uploadProduct() {
    $name = $_POST['tensp'];
    $category = $_POST['loai'];
    $description = $_POST['mota'];
    $masp = $_POST['masp'];

    // for ($i = 0; $i < count($sizelist); $i++) {
    //     for ($j = 0; $j < count($vienlist); $j++) {
    //         $sql = "INSERT INTO chitietsanpham(MaSP, MaSize, MaVien, GiaNhap, GiaTien, SoLuong) VALUES ('pi12zza222aa', '{$sizelist[$i]}', '{$vienlist[$j]['MaVien']}','{$arrayitem[$i]->gianhap}' ,'{$arrayitem[$i]->giaxuat}', 0)";
    //         $result = (new SanPhamBUS())->insertz($sql);
    //         if (!$result) {
    //             var_dump("ppo");
    //         }
    //         else {
    //             var_dump("ppp");
    //         }
    //     }
    // }

    // if(!empty($_FILES["up-hinh-anh"]["name"])) { 
    //     $fileName = basename($_FILES["up-hinh-anh"]["name"]); 
    //     // lấy loại file (đuôi file) jpg, png, gif,...
    //     $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
    //     $allowTypes = array('jpg','png','jpeg','gif'); 
    //     // nếu mà file đó nằm trong mảng allowTypes (tức là file hợp lệ)
    //     if(in_array($fileType, $allowTypes)) {
    //         $image = $_FILES['up-hinh-anh']['tmp_name']; 
    //         $imgContent = addslashes(file_get_contents($image)); 

    //         $sql = "INSERT INTO sanpham(MaSP, TenSP, Mota, Img, Loai, ImgBinary) VALUES ('pi12zza', '$name', '$description', '', '$category', '$imgContent')";
    //         $result = (new SanPhamBUS())->insertz($sql);
    //         if ($result) {
    //             die (json_encode(array('status' => 'success')));
    //         }
    //     }
    // }
    
    if (isset($_FILES['up-hinh-anh'])) {
        global $bussp;
        $file = $_FILES['up-hinh-anh'];
        
        $uploadDir = '../images/pizzaimg/';

        // Tạo một tên file duy nhất
        $uploadFile = $uploadDir . basename($file['name']);

        // Di chuyển file đã tải lên vào thư mục tải lên
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $uploadFile = './images/pizzaimg/' . basename($file['name']);
        } else {
            $uploadFile = './images/pizzaimg/pizza_temp.jpg';
        }
        // them sp vao db
        $sql = "INSERT INTO sanpham(MaSP, TenSP, Mota, Img, Loai) VALUES ('$masp', '$name', '$description', '$uploadFile', '$category')";
        $result = $bussp->insertz($sql);

        if ($result) {
            // add chitietsanpham
            // convert to arrray $_POST['chitietsanpham'];
            
            $listchitiet = json_decode($_POST['chitietsanpham'], true);
            foreach ($listchitiet as $item) {
                $sql = "INSERT INTO chitietsanpham(MaSP, MaSize, MaVien, GiaNhap, GiaTien, SoLuong) VALUES ('$masp', '{$item['masize']}', '{$item['made']}',0 ,0, 0)";
                $result = $bussp->insertz($sql);
                if (!$result) {
                    die (json_encode(array('status' => 'fail')));
                }
            }
            die (json_encode(array('status' => 'success')));
        }
    }


    

    die (json_encode(array('status' => 'fail')));
}

function getProducts() {
    global $bussp;
    $query = $_POST['currentquery'];
    $countrow = "SELECT count(*) as total from ($query) as total";
    $rownum = (new DB_driver())->get1row($countrow);
    $currentpage = $_POST['currentpage'];
    // call get_list method from sanphamBUS
    $from = ($currentpage - 1) * 8;
    $to = 8;
    $query = $query . " LIMIT $from, $to";
    $result = $bussp->get_list($query);
    

    // return countrow and result
    if ($result != null) {
        die (json_encode(array('countrow' => $rownum['total'], 'result' => $result)));
    }
    die (json_encode(null));
}

function getprod() {
    global $bussp;
    $sql = "SELECT * FROM sanpham, chitietsanpham where sanpham.MaSP = chitietsanpham.MaSP and chitietsanpham.MaSize = 'S' and chitietsanpham.MaVien = 'V'";
    return $bussp->get_list($sql);
}

function deleteProduct() {
    global $bussp;
    $masp = $_POST['masp'];
    $sql = "UPDATE sanpham SET TrangThai = 0 WHERE MaSP = '$masp'";
    $result = $bussp->update($sql);
    if ($result) {
        // delete all chitietsanpham
        deletechitietsp($masp);
    }
    // die (json_encode(array('status' => 'fail')));
    // $masp = $_POST['masp'];
    // $sql = "UPDATE sanpham SET TrangThai = 0 WHERE MaSP = '$masp'";
    // $result = $bussp->update($sql);
    // if ($result) {
    //     // delete all chitietsanpham
        
    // }
    // die (json_encode(array('status' => 'fail')));
}

function deletechitietsp($id) {
    global $bussp;
    $sql = "UPDATE chitietsanpham SET TrangThai = 0 WHERE MaSP = '$id'";
    $result = $bussp->update($sql);
    if ($result) {
        die (json_encode(array('status' => 'successz1')));
    }
    die (json_encode(array('status' => 'fail')));
}

function getproductbyid() {
    global $bussp;
    $masp = $_POST['masp'];
    $sql = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.MaSP = chitietsanpham.MaSP AND sanpham.MaSP = '$masp'";
    $result = $bussp->get_list($sql);
    // if count reuslt is 0
    if (count($result) == 0) {
        $sql = "SELECT * FROM sanpham WHERE MaSP = '$masp'";
        $result = $bussp->get_list($sql);
        die (json_encode($result));
    }
    die (json_encode($result));
}

function getMapSizeDe() {
    global $bussp;
    $sql = "SELECT * FROM sizesanpham WHERE TrangThai = 1";
    $result = $bussp->get_list($sql);
    // add to result 
    $sql = "SELECT * FROM viensanpham WHERE TrangThai = 1";
    $result2 = $bussp->get_list($sql);
    $result = array('sizes' => $result, 'viens' => $result2);
    if ($result != null) {
        die (json_encode($result));
    }
    die (json_encode(null));
}