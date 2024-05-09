<?php
require_once(__DIR__ . '/../BackEnd/DB_business.php');
class NhomQuyenBUS extends DB_business {
    function __construct()
    {
        
    }
    
    function add1nhomquyen($tennq, $hashmapnhomquyen) {
        // insert into nhomquyen
        $sql = "INSERT INTO PhanQuyen (TenNhomQuyen) VALUES ('$tennq')";
        $result = $this->insertz($sql);
        if (!$result) {
            die (json_encode(null));
        }
        //get maquyen theo tennq
        $sql = "SELECT MAX(MaQuyen) AS MaxMaQuyen FROM PhanQuyen";
        $resultz = $this->get_list($sql);
        $resultz[0]['MaxMaQuyen']  = $resultz[0]['MaxMaQuyen'];
        if ($result == null) {
            die (json_encode(null));
        }
        // traverse hashmap
        foreach ($hashmapnhomquyen as $key => $values) {
            $arraychucnang = $values;
            foreach ($arraychucnang as $key2 => $value) {
                $sql = "INSERT INTO chucnangnhomquyen (MaQuyen, MaCN, hanhdong) VALUES ('{$resultz[0]['MaxMaQuyen']}', '$key', '$value')";
                $result = $this->insertz($sql);
                if (!$result) {
                    // die null
                    die (json_encode(null));
                }
            }
        }
        die (json_encode(array('status' => 'su1ccesss')));
    }

    function getAllnhomquyen() {
        $sql = "SELECT * FROM PhanQuyen";
        $result = $this->get_list($sql);
        return $result;
    }

    function delete1nhomquyen($manq) {
        $sql = "DELETE FROM PhanQuyen WHERE MaQuyen = '$manq'";
        $result = $this->updatezzz($sql);
        if (!$result) {
            die (json_encode(null));
        }
        $sql = "DELETE FROM chucnangnhomquyen WHERE MaQuyen = '$manq'";
        $result = $this->updatezzz($sql);
        if (!$result) {
            die (json_encode(null));
        }
        die (json_encode(array('status' => 'success')));
    }
}