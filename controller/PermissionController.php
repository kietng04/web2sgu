<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
require_once(__DIR__ . '/../model/NhomQuyenBUS.php');
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
        
    }
}

function themnhomquyen() {
    $tennq = $_POST['tennq'];
    $hashmapnhomquyen = json_decode($_POST['mapquyen'], true);  
    $result = (new NhomQuyenBUS())->add1nhomquyen($tennq, $hashmapnhomquyen);
}