<?php

class auth
{
    protected $users = [
        'Sancho' => 'LBCDon',
        'sancho' => 'LBCDon'
    ];

    public function login() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'];

            // Sửa lại thành $this->users (có chữ s cho đúng tên mảng ở trên)
            if(isset($this->users[$username]) && $this->users[$username] === $password) 
            {
                $_SESSION['username'] = $username;
                if(isset($_POST['remember'])) {
                    setcookie('username', $username, time() + 3600, "/");
                }
                header('Location: /PMNM_68PM4_QLSV/public/index.php?url=home/index');
                exit();
            } 
            else 
            {
                header('Location: /PMNM_68PM4_QLSV/public/index.php?url=home/login');
                exit();
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /PMNM_68PM4_QLSV/public/index.php?url=home/login");
        exit();
    }
}