<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");
require_once(__DIR__ . '/../model/ThongTinNguoiDungBUS.php');
class ThongTinNguoiDungBUS extends DB_business {
    function __construct()
    {
        $this->setTable("NguoiDung");
        parent::__construct();
    }

    function add_new($data)
    {
       return parent::add_new($data);
    }
    
}