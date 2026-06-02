<div class="header-box">
    <h2>Thêm Sinh Viên Mới</h2>
</div>

<form action="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/store" method="POST">
    <div class="form-group">
        <label for="hoten">Họ và tên:</label>
        <input type="text" id="hoten" name="hoten" required placeholder="Nhập đầy đủ họ tên...">
    </div>

    <div class="form-group">
        <label for="gioitinh">Giới tính:</label>
        <select id="gioitinh" name="gioitinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
        </select>
    </div>

    <div class="form-group">
        <label for="mssv">Mã số sinh viên (MSSV):</label>
        <input type="text" id="mssv" name="mssv" required placeholder="Nhập MSSV...">
    </div>

    <div style="margin-top: 25px; display: flex; gap: 10px;">
        <button type="submit" class="btn btn-success">💾 Lưu lại</button>
        <a href="/PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index" class="btn btn-secondary">🚪 Hủy bỏ</a>
    </div>
</form>