<?php
require_once(__DIR__ . '/../BackEnd/DB_business.php');
class NhomQuyenBUS extends DB_business {
    function __construct()
    {
        
    }
    
    function add1nhomquyen($tennq, $hashmapnhomquyen) {
        // traverse hashmap
        foreach ($hashmapnhomquyen as $key => $value) {
            $sql = "INSERT INTO chucnangnhomquyen (MaQuyen, MaCN, hanhdong) VALUES ('$tennq','$key','$value')";
            $result = $this->insertz($sql);
            if (!$result) {
                die (json_encode(array('status' => 'fail')));
            }
        }
        die (json_encode(array('status' => 'success')));
    }
}