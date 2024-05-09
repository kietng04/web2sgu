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
        case 'loadnhomquyen':
            loadnhomquyen();
            break;
        case 'xoanhomquyen':
            xoanhomquyen();
            break;
        
    }
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