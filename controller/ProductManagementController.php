<?php
require_once('BaseController.php');
class ProductManagementController extends BaseController
{
    public function index()
    {
        $this->render('admin_product');
    }
}
