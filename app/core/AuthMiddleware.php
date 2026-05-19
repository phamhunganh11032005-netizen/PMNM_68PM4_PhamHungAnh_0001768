<?php
class AuthMiddleware {
    public static function check() {
        // Bật session nếu chưa có
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
            // Nếu chưa đăng nhập, đá về trang login
            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=auth/login');
            exit(); // Chặn đứng không cho chạy tiếp
        }
    }
}