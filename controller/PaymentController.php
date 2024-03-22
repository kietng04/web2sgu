<?php
require_once('BaseController.php');
session_start();

class PaymentController extends BaseController
{
    public function index()
    {
        $this->render('payment');
    }
}