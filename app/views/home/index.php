<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        /* Định dạng giao diện trang chủ gọn gàng, hiện đại */
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #04AA6D; /* Màu xanh lá đồng bộ với bảng danh sách sinh viên */
            font-size: 24px;
            margin-bottom: 30px;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            display: block;
            padding: 14px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.2s;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Chào mừng bạn đến trang quản lý sinh viên</h1>
        
        <div class="btn-group">
            <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index" class="btn btn-primary">👨‍🎓 Danh sách sinh viên</a>
            
            <a href="/PMNM_68PM4_QLSV/public/index.php?url=auth/logout" class="btn btn-danger">🚪 Đăng xuất</a>
        </div>
    </div>

</body>
</html>