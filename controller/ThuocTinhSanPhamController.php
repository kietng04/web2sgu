<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
class ThuocTinhSanPhamController extends BaseController
{
    public function index()
    {
        $this->render('admin_product');
    }
}
if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'loadTableAttributeProduct':
            loadTableAttributeProduct();
            break;
        case 'insertAttributeProduct':
            insertAttributeProduct();
            break;
        case 'deleteAtrtributeProduct':
            deleteAtrtributeProduct();
            break;
    }
}

// http://localhost/web2/index.php?masize=1&tensize=1&dinhluongsize=1
function loadTableAttributeProduct() {
    $products = (new ThuocTinhSanPhamBUS())->getAllAttributeProduct();
    die(json_encode($products));
}
function insertAttributeProduct() {
 
    $id = $_POST['masize'];
    $name = $_POST['tensize'];
    $amount = $_POST['dinhluongsize'];
    $result = (new ThuocTinhSanPhamBUS())->insertAttributeProduct($id, $name, $amount);
    die(json_encode($result));
}
function deleteAtrtributeProduct(){
    $id = $_POST['id'];
    $result = (new ThuocTinhSanPhamBUS())->deleteAttributeProduct($id);
    die(json_encode($result));
}

function execute() {
    $controller = new ThuocTinhSanPhamController();
    $action = $_POST['action'];
    $controller->$action();
}