<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
    <h2 class="text-success fw-bold m-0">Danh sách lớp học</h2>
    <a href="#" class="btn btn-success shadow-sm fw-bold" onclick="alert('Tính năng đang phát triển!')">+ Thêm lớp học</a>
</div>

<table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white text-center">
    <thead class="table-dark">
        <tr>
            <th width="15%">ID</th>
            <th width="40%">Tên lớp học</th>
            <th width="25%">Khóa học</th>
            <th width="20%">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (!empty($lophocs) && is_array($lophocs)) {
            foreach ($lophocs as $lop) {
                echo "<tr>";
                echo "<td class='fw-bold text-secondary'>" . htmlspecialchars($lop['id']) . "</td>";
                echo "<td><span class='badge bg-info text-dark fs-6'>" . htmlspecialchars($lop['tenlop']) . "</span></td>";
                echo "<td>" . htmlspecialchars($lop['khoahoc']) . "</td>";
                echo "<td>";
                echo " <a href='/PMNM_68PM4_QLSV/public/index.php?url=lophoc/delete&id=" . $lop['id'] . "' class='btn btn-danger btn-sm fw-bold shadow-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa lớp này không?\");'>🗑️ Xóa</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center text-muted py-3'>Không có dữ liệu lớp học nào.</td></tr>";
        }
        ?>
    </tbody>
</table>

<div class="mt-4 text-start">
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index" class="btn btn-secondary fw-bold">⬅️ Quản lý Sinh viên</a>
</div>