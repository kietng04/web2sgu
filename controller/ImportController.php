<?php
require_once('BaseController.php');
require_once(__DIR__ . '/../model/SanPhamBUS.php');
class ImportController extends BaseController
{
    public function index()
    {
        $this->render('admin_import');
    }
}