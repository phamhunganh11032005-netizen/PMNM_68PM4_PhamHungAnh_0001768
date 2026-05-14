<?php
class home {
    function index() {
        echo "Đây là trang chủ (Home Page)";
    }

    function hello($name = "") {
        echo "Xin chào " . $name;
    }
}