<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        /* Đưa toàn bộ nội dung ra giữa màn hình */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Khung bọc form đăng nhập */
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 360px;
            box-sizing: border-box;
        }

        /* Sắp xếp tiêu đề nằm chính giữa */
        h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 28px;
            color: #333333;
        }

        /* Định dạng các khối nhập liệu xếp dọc */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Định dạng phần ghi nhớ đăng nhập */
        .remember-group {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }

        /* Nút bấm đăng nhập rộng bằng khung */
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Đăng nhập</h1>
    
    <form action="/PMNM_68PM4_QLSV/public/index.php?url=auth/login" method="POST">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="remember-group">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember" style="display:inline; font-weight:normal; margin:0;">Ghi nhớ đăng nhập</label>
        </div>

        <button type="submit">Đăng nhập</button>
    </form>
</div>

</body>
</html>