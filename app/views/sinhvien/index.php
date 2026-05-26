<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .header-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #04AA6D;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            color: #333;
            text-transform: uppercase;
        }

        /* Định dạng bảng chuẩn W3Schools */
        #students {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        #students td, #students th {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        #students tr:nth-child(even){background-color: #f2f2f2;}

        #students tr:hover {background-color: #ddd;}

        #students th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            font-weight: bold;
        }

        /* Các nút bấm điều hướng */
        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .btn-success {
            background-color: #04AA6D;
            color: white;
        }

        .btn-success:hover {
            background-color: #038c56;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-box">
        <h2>Danh sách sinh viên</h2>
        <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/create" class="btn btn-success">+ Thêm sinh viên</a>
    </div>

    <table id="students">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>MSSV</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            if (!empty($sinhviens) && is_array($sinhviens)) {
                foreach ($sinhviens as $sv) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($sv['hoten']) . "</td>";
                    echo "<td>" . htmlspecialchars($sv['gioitinh']) . "</td>";
                    echo "<td>" . htmlspecialchars($sv['mssv']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>Không có dữ liệu sinh viên nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="/PMNM_68PM4_QLSV/public/index.php?url=home/index" class="btn btn-secondary">⬅️ Quay lại trang chủ</a>
</div>

</body>
</html>