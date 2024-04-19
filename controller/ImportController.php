<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
require_once(__DIR__ . '/../model/PhieuNhapBUS.php');
class ImportController extends BaseController
{
    public function index()
    {
        $this->render('admin_import');
    }
}

if (isset($_POST['request'])) {
    switch ($_POST['request']) {
        case 'getMaPNnew':
            getMaPNnew();
            break;
    }
}

function getMaPNnew() {
    $data = (new PhieuNhapBUS())->getMaPNnew();
    die(json_encode($data));
}