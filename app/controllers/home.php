<?php
require_once '../app/core/AuthMiddleware.php';

class Home {

    public function __construct() {
        AuthMiddleware::check();
    }
    
    function index() {
        echo "Đây là trang chủ (Home Page) - Bạn đã đăng nhập thành công!";
        echo "<br><br>";
        echo "<a href='/PMNM_68PM4_QLSV/public/index.php?url=auth/logout'>Đăng xuất khỏi hệ thống</a>";
    }


    function hello($name = "") {
        echo "Xin chào " . $name;
    }
}