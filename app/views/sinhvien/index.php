<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
    <h2 class="text-success fw-bold m-0">Danh sách sinh viên</h2>
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/create" class="btn btn-success shadow-sm fw-bold">+ Thêm sinh viên</a>
</div>

<table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white">
    <thead class="table-dark">
        <tr>
            <th width="10%">ID</th>
            <th width="35%">Họ và tên</th>
            <th width="15%">Giới tính</th>
            <th width="20%">MSSV</th>
            <th width="20%">Cập nhật</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (!empty($sinhviens) && is_array($sinhviens)) {
            foreach ($sinhviens as $sv) {
                echo "<tr>";
                echo "<td class='fw-bold text-secondary'>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['hoten']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['gioitinh']) . "</td>";
                echo "<td><span class='badge bg-primary fs-6'>" . htmlspecialchars($sv['mssv']) . "</span></td>";
                
                // CỘT NÚT BẤM HÀNH ĐỘNG: SỬA VÀ XÓA
                echo "<td>";
                echo " <a href='/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/edit&id=" . $sv['id'] . "' class='btn btn-warning btn-sm fw-bold shadow-sm me-1'>✏️ Sửa</a>";
                echo " <a href='/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/delete&id=" . $sv['id'] . "' class='btn btn-danger btn-sm fw-bold shadow-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sinh viên này không?\");'>🗑️ Xóa</a>";
                echo "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center text-muted py-3'>Không có dữ liệu sinh viên nào.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (isset($totalPages) && $totalPages > 1): ?>
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $currentPage - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span> </a>
            </li>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                    <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $currentPage + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span> </a>
            </li>
            
        </ul>
    </nav>
<?php endif; ?>

<div class="mt-4 text-start">
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=home/index" class="btn btn-secondary fw-bold">⬅️ Quay lại trang chủ</a>
</div>