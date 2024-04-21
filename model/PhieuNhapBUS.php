<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");

class PhieuNhapBUS extends DB_business {
    function __construct()
    {
        $this->setTable("phieunhap");
        parent::__construct();
    }

    function getMaPNnew() {
        $sql = "SELECT mapn, COUNT(*) as count FROM nhapsanpham GROUP BY mapn";
        $result = $this->get_list($sql);
        die (json_encode($result));
    }
}