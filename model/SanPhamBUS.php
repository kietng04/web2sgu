<?php
require_once(__DIR__ . '/../BackEnd/DB_business.php');
class SanPhamBUS extends DB_business {
    function __construct()
    {
        $this->setTable("pizza");
    }
    // hàm này chỉ dùng để hiển thị sản phẩm khi trang vừa load lên
    function getProduct() {
        $sql = "SELECT * FROM pizza, pizzadetail where pizza.IDPizza = pizzadetail.IDPizza and pizzadetail.IDSize = 'S' and pizzadetail.IDCrust = 'V'";
        $result = $this->get_list($sql);
        return $result;
    }
}