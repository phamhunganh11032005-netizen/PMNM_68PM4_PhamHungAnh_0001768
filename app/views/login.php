<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
</head>
<body>

    <h2>ĐĂNG NHẬP hệ thống quản lý</h2>
    
    <form action="/PMNM_68PM4_QLSV/public/index.php?url=auth/handleLogin" method="POST">
        Tài khoản: <input type="text" name="username" required><br><br>
        Mật khẩu: <input type="password" name="password" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>

</body>
</html>