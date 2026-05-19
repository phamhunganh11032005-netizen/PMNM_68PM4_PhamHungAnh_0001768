<?php
class Auth {
    
    // Hàm mặc định khi vào /auth
    function index() {
        $this->login();
    }

    // Gọi file view hiển thị form bên trên
    function login() {
        require_once '../app/views/login.php';
    }

    // Xử lý dữ liệu khi bấm nút Đăng nhập
    function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Tài khoản admin mặc định
            if ($username == 'admin' && $password == '123456') {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['user_logged_in'] = true;
                $_SESSION['username'] = $username;
                
                // Đăng nhập đúng -> Qua thẳng trang chủ qua index.php
                header('Location: /PMNM_68PM4_QLSV/public/index.php?url=home');
                exit();
            } else {
                // Đăng nhập sai -> Báo lỗi ngắn gọn
                echo "Sai tài khoản hoặc mật khẩu! <a href='/PMNM_68PM4_QLSV/public/index.php?url=auth/login'>Thử lại</a>";
            }
        }
    }

    // Hàm đăng xuất
    function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy(); 
        header('Location: /PMNM_68PM4_QLSV/public/index.php?url=auth/login');
        exit();
    }
}