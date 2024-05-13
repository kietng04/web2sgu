<?php
require_once(__DIR__ . "/../BackEnd/DB_business.php");
require_once(__DIR__ . '/../model/NguoiDungBUS.php');
class NguoiDungBUS extends DB_business {
    function __construct()
    {
        $this->setTable("TaiKhoanNguoiDung");
        parent::__construct();
    }

    function add_new($data)
    {
       return parent::add_new($data);
    }
    
    public function nextUserId() {
        // Fetch the next user ID from the database
        $query = "SELECT COUNT(MaND) AS max_id FROM NguoiDung";
        $result = mysqli_query($this->__conn, $query);
        $row = mysqli_fetch_assoc($result);
        $maxId = $row['max_id'];

        // Extract the numeric part of the ID and increment it by 1
        $nextId = intval($maxId) + 1;

        return $nextId;
    }

}