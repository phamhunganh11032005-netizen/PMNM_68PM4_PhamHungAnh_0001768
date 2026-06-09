<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
    <h2 class="text-success fw-bold m-0">Danh sách sinh viên</h2>
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/create" class="btn btn-success shadow-sm fw-bold">+ Thêm sinh viên</a>
</div>

<table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white">
    <thead class="table-dark">
        <tr>
            <th width="10%">ID</th>
            <th width="40%">Họ và tên</th>
            <th width="20%">Giới tính</th>
            <th width="30%">MSSV</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // Vòng lặp duyệt qua mảng dữ liệu sinh viên đã được phân trang từ Controller truyền sang
        if (!empty($sinhviens) && is_array($sinhviens)) {
            foreach ($sinhviens as $sv) {
                echo "<tr>";
                echo "<td class='fw-bold text-secondary'>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['hoten']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['gioitinh']) . "</td>";
                echo "<td><span class='badge bg-primary fs-6'>" . htmlspecialchars($sv['mssv']) . "</span></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center text-muted py-3'>Không có dữ liệu sinh viên nào.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (isset($totalPages) && $totalPages > 1): ?>
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $currentPage - 1 ?>">Trước</a>
            </li>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                    <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $currentPage + 1 ?>">Sau</a>
            </li>
            
        </ul>
    </nav>
<?php endif; ?>

<div class="mt-4 text-start">
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=home/index" class="btn btn-secondary fw-bold">⬅️ Quay lại trang chủ</a>
</div>