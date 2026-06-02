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
        // Vòng lặp duyệt qua mảng dữ liệu sinh viên do Controller truyền sang
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