<div class="mb-4 border-bottom pb-2">
    <h2 class="text-warning fw-bold m-0">Chỉnh Sửa Thông Tin Sinh Viên</h2>
</div>

<form action="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/update" method="POST">
    
    <input type="hidden" name="id" value="<?= htmlspecialchars($sinhvien['id']) ?>">
    
    <div class="mb-3 text-start">
        <label for="hoten" class="form-label fw-bold text-secondary">Họ và tên:</label>
        <input type="text" class="form-control" id="hoten" name="hoten" value="<?= htmlspecialchars($sinhvien['hoten']) ?>" required>
    </div>

    <div class="mb-3 text-start">
        <label for="gioitinh" class="form-label fw-bold text-secondary">Giới tính:</label>
        <select class="form-select" id="gioitinh" name="gioitinh">
            <option value="Nam" <?= ($sinhvien['gioitinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= ($sinhvien['gioitinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>

    <div class="mb-4 text-start">
        <label for="mssv" class="form-label fw-bold text-secondary">Mã số sinh viên (MSSV):</label>
        <input type="text" class="form-control" id="mssv" name="mssv" value="<?= htmlspecialchars($sinhvien['mssv']) ?>" required>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-warning fw-bold shadow-sm">💾 Cập nhật</button>
        <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index" class="btn btn-secondary fw-bold shadow-sm">🚪 Hủy bỏ</a>
    </div>
</form>