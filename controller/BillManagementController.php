<?php 
require_once('BaseController.php');

class BillManagementController extends BaseController
{
    public function index()
    {
        $this->render('admin_order');
    }
}