<?php
require_once '../app/core/Controller.php';

class sinhvien extends Controller {
    
    public function index() {
        // Bắt đầu hoặc kiểm tra session để lưu lại lựa chọn pageSize của người dùng
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 1. Kiểm tra nếu có thay đổi pageSize từ URL, nếu không thì lấy từ SESSION, mặc định ban đầu là 5
        if (isset($_GET['pageSize'])) {
            $limit = (int)$_GET['pageSize'];
            $_SESSION['pageSize'] = $limit; // Lưu vào session để chuyển trang không bị mất
        } else {
            $limit = isset($_SESSION['pageSize']) ? (int)$_SESSION['pageSize'] : 5;
        }
        
        // Đảm bảo kích thước trang hợp lệ
        if (!in_array($limit, [5, 10, 20, 50])) {
            $limit = 5;
        }

        // 2. LẤY THAM SỐ TÌM KIẾM VÀ SẮP XẾP TỪ URL
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sortBy = isset($_GET['sort_by']) ? trim($_GET['sort_by']) : 'sv.id';
        $sortDir = isset($_GET['sort_dir']) ? strtoupper(trim($_GET['sort_dir'])) : 'DESC';

        // Đảm bảo chiều sắp xếp chỉ nhận giá trị hợp lệ
        if (!in_array($sortDir, ['ASC', 'DESC'])) {
            $sortDir = 'DESC';
        }

        // 3. Lấy số trang hiện tại từ URL, mặc định là trang 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1; 
        
        // Tính toán vị trí bắt đầu lấy dữ liệu (offset)
        $offset = ($currentPage - 1) * $limit;

        // 4. Gọi Model lấy dữ liệu theo bộ lọc Tìm kiếm, Sắp xếp và Phân trang
        $sinhvienModel = $this->model('sinhvienModel');
        
        // Gọi hàm phân trang có truyền thêm từ khóa tìm kiếm và các trường sắp xếp
        $listSinhVien = $sinhvienModel->getSinhVienPaging($limit, $offset, $search, $sortBy, $sortDir);
        
        // Tính tổng số dòng dựa trên từ khóa tìm kiếm để phân trang chính xác
        $totalRows = $sinhvienModel->getTotalSinhVienCount($search);
        $totalPages = ceil($totalRows / $limit); 

        // Đảm bảo trang hiện tại không vượt quá tổng số trang sau khi đổi định dạng lọc
        if ($currentPage > $totalPages && $totalPages > 0) {
            header("Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index&page=" . $totalPages . "&search=" . urlencode($search) . "&sort_by=" . $sortBy . "&sort_dir=" . $sortDir);
            exit();
        }

        // 5. Đẩy toàn bộ biến dữ liệu sang giao diện (View)
        $this->view("sinhvien/index", [
            'sinhviens'   => $listSinhVien,
            'totalPages'  => $totalPages,
            'currentPage' => $currentPage,
            'pageSize'    => $limit,
            'search'      => $search,    // Truyền sang để hiển thị lại trên ô nhập input tìm kiếm
            'sortBy'      => $sortBy,    // Truyền sang để nhận diện cột nào đang được chọn sắp xếp
            'sortDir'     => $sortDir    // Truyền sang để đảo chiều mũi tên ▲/▼
        ]);
    }

    public function create() {
        // Gọi thêm lophocModel để lấy danh sách lớp học hiển thị vào thẻ select option khi tạo mới
        $lophocModel = $this->model('lophocModel');
        $danhSachLop = $lophocModel->getAllLopHoc();

        $this->view('sinhvien/create', [
            'lophocs' => $danhSachLop
        ]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = trim($_POST['hoten']);
            $gioitinh = trim($_POST['gioitinh']);
            $mssv = trim($_POST['mssv']);
            $malop = isset($_POST['malop']) ? (int)$_POST['malop'] : 0; // Nhận thêm trường malop

            if (!empty($hoten) && !empty($mssv)) {
                $sinhvienModel = $this->model('sinhvienModel');
                // Gọi hàm create mới có truyền thêm mã lớp học
                $sinhvienModel->create($hoten, $gioitinh, $mssv, $malop);
            }
            
            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
            exit();
        }
    }

    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $sinhvienModel = $this->model('sinhvienModel');
            $sinhvienModel->delete($id);
        }

        header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
        exit();
    }

    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        $sinhvienModel = $this->model('sinhvienModel');
        $lophocModel = $this->model('lophocModel');
        
        $sv = $sinhvienModel->getSinhVienById($id);
        $danhSachLop = $lophocModel->getAllLopHoc(); // Lấy danh sách lớp để chọn lại khi Sửa
        
        if ($sv) {
            $this->view('sinhvien/edit', [
                'sinhvien' => $sv,
                'lophocs' => $danhSachLop
            ]);
        } else {
            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
            exit();
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (int)$_POST['id'];
            $hoten = trim($_POST['hoten']);
            $gioitinh = trim($_POST['gioitinh']);
            $mssv = trim($_POST['mssv']);
            $malop = isset($_POST['malop']) ? (int)$_POST['malop'] : 0; // Nhận thêm trường malop từ form chỉnh sửa

            if ($id > 0 && !empty($hoten) && !empty($mssv)) {
                $sinhvienModel = $this->model('sinhvienModel');
                // Gọi hàm update có tích hợp cập nhật mã lớp học mới
                $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $malop);
            }

            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
            exit();
        }
    }
}
?>