<?php
require_once '../app/core/App.php';

class middleware {
    public function checklogin() {

        $url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

        $publicPages = ['home/login', 'auth/login'];

  
        if (!isset($_SESSION['username']) && !in_array($url, $publicPages)) {
            // Đá thẳng về trang login
            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=home/login');
            exit();
        }
    }
}
?>