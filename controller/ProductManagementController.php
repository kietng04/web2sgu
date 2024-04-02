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
    }
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
    // return countrow and result
    if ($result != null) {
        die (json_encode(array('countrow' => $rownum['total'], 'result' => $result)));
    }
    die (json_encode(null));
}