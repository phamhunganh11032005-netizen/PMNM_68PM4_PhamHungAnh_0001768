<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
    <h2 class="text-success fw-bold m-0">Danh sách sinh viên</h2>
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/create" class="btn btn-success shadow-sm fw-bold">+ Thêm sinh viên</a>
</div>

<div class="row g-3 align-items-center mb-4">
    <div class="col-md-4 d-flex align-items-center">
        <label for="pageSize" class="form-label me-2 mb-0 fw-bold text-secondary text-nowrap">Hiển thị:</label>
        <select id="pageSize" class="form-select form-select-sm shadow-sm" style="width: auto;" onchange="changeFilter('pageSize', this.value)">
            <option value="5" <?= ($pageSize == 5) ? 'selected' : '' ?>>5 dòng</option>
            <option value="10" <?= ($pageSize == 10) ? 'selected' : '' ?>>10 dòng</option>
            <option value="20" <?= ($pageSize == 20) ? 'selected' : '' ?>>20 dòng</option>
            <option value="50" <?= ($pageSize == 50) ? 'selected' : '' ?>>50 dòng</option>
        </select>
    </div>
    
    <div class="col-md-8">
        <form method="GET" action="/PMNM_68PM4_QLSV/public/index.php" class="d-flex justify-content-end">
            <input type="hidden" name="url" value="sinhvien/index">
            <div class="input-group shadow-sm" style="max-width: 400px;">
                <input type="text" name="search" class="form-control" placeholder="Tìm mssv, họ tên, lớp..." value="<?= htmlspecialchars($search ?? '') ?>">
                <button class="btn btn-success" type="submit">🔍 Tìm kiếm</button>
                <?php if(!empty($search)): ?>
                    <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index" class="btn btn-secondary">Xóa lọc</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered table-striped table-hover align-middle shadow-sm bg-white text-center">
    <thead class="table-dark">
        <tr>
            <th width="10%">ID</th>
            <th width="25%">
                <a href="javascript:void(0);" class="text-white text-decoration-none" onclick="changeFilter('sort', 'sv.hoten')">
                    Họ và tên <?= (isset($sortBy) && $sortBy == 'sv.hoten') ? ($sortDir == 'ASC' ? '▲' : '▼') : '↕' ?>
                </a>
            </th>
            <th width="15%">Giới tính</th>
            <th width="15%">Lớp</th>
            <th width="15%">
                <a href="javascript:void(0);" class="text-white text-decoration-none" onclick="changeFilter('sort', 'sv.mssv')">
                    MSSV <?= (isset($sortBy) && $sortBy == 'sv.mssv') ? ($sortDir == 'ASC' ? '▲' : '▼') : '↕' ?>
                </a>
            </th>
            <th width="20%">Cập nhật</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if (!empty($sinhviens) && is_array($sinhviens)) {
            foreach ($sinhviens as $sv) {
                echo "<tr>";
                echo "<td class='fw-bold text-secondary'>" . htmlspecialchars($sv['id']) . "</td>";
                echo "<td class='text-start ps-3'>" . htmlspecialchars($sv['hoten']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['gioitinh']) . "</td>";
                
                $tenLop = !empty($sv['tenlop']) ? htmlspecialchars($sv['tenlop']) : 'Chưa xếp lớp';
                echo "<td><span class='badge bg-info text-dark fs-6'>" . $tenLop . "</span></td>";
                
                echo "<td><span class='badge bg-primary fs-6'>" . htmlspecialchars($sv['mssv']) . "</span></td>";
                
                // CỘT NÚT BẤM HÀNH ĐỘNG: SỬA VÀ XÓA
                echo "<td>";
                echo " <a href='/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/edit&id=" . $sv['id'] . "' class='btn btn-warning btn-sm fw-bold shadow-sm me-1'>✏️ Sửa</a>";
                echo " <a href='/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/delete&id=" . $sv['id'] . "' class='btn btn-danger btn-sm fw-bold shadow-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sinh viên này không?\");'>🗑️ Xóa</a>";
                echo "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center text-muted py-3'>Không tìm thấy dữ liệu sinh viên nào phù hợp.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (isset($totalPages) && $totalPages > 1): ?>
    <?php 
        // Tạo chuỗi truy vấn phụ để đính kèm dữ liệu lọc vào các thẻ chuyển trang
        $queryParam = "&search=" . urlencode($search ?? '') . "&sort_by=" . ($sortBy ?? 'sv.id') . "&sort_dir=" . ($sortDir ?? 'DESC');
    ?>
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= ($currentPage - 1) . $queryParam ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span> </a>
            </li>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
                    <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= $i . $queryParam ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=<?= ($currentPage + 1) . $queryParam ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span> </a>
            </li>
            
        </ul>
    </nav>
<?php endif; ?>

<div class="mt-4 text-start">
    <a href="/PMNM_68PM4_QLSV/public/index.php?url=home/index" class="btn btn-secondary fw-bold">⬅️ Quay lại trang chủ</a>
</div>

<script>
function changeFilter(type, value) {
    // Đọc trạng thái cũ trên URL để gộp bộ lọc
    const urlParams = new URLSearchParams(window.location.search);
    let search = urlParams.get('search') || '';
    let sortBy = urlParams.get('sort_by') || 'sv.id';
    let sortDir = urlParams.get('sort_dir') || 'DESC';
    let pageSize = document.getElementById('pageSize').value;

    if (type === 'pageSize') {
        pageSize = value;
    } else if (type === 'sort') {
        // Nếu click lại cột đang sort thì đảo ngược chiều, click cột khác thì mặc định ASC
        if (sortBy === value) {
            sortDir = (sortDir === 'ASC') ? 'DESC' : 'ASC';
        } else {
            sortBy = value;
            sortDir = 'ASC';
        }
    }

    // Điều hướng toàn bộ trạng thái mới
    window.location.href = `/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=1&pageSize=${pageSize}&search=${encodeURIComponent(search)}&sort_by=${sortBy}&sort_dir=${sortDir}`;
}
</script>