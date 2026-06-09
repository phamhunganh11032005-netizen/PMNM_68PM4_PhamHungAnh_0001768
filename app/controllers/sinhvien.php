<?php
require_once '../app/core/Controller.php';

class sinhvien extends Controller {
    
    public function index() {
        // Cấu hình số lượng sinh viên hiển thị trên mỗi trang
        $limit = 5; 
        
        // Lấy số trang hiện tại từ URL (Ví dụ: ?page=2), mặc định là trang 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1; 
        
        // Tính toán vị trí bắt đầu lấy dữ liệu (offset)
        $offset = ($currentPage - 1) * $limit;

        // Gọi Model để xử lý dữ liệu phân trang
        $sinhvienModel = $this->model('sinhvienModel');
        $listSinhVien = $sinhvienModel->getSinhVienPaging($limit, $offset);
        

        $totalRows = $sinhvienModel->countAllSinhVien();
        $totalPages = ceil($totalRows / $limit); 

        $this->view("sinhvien/index", [
            'sinhviens' => $listSinhVien,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
    }

    public function create() {
        $this->view('sinhvien/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoten = trim($_POST['hoten']);
            $gioitinh = trim($_POST['gioitinh']);
            $mssv = trim($_POST['mssv']);

            if (!empty($hoten) && !empty($mssv)) {
                $sinhvienModel = $this->model('sinhvienModel');
                $sinhvienModel->create($hoten, $gioitinh, $mssv);
            }
            
            // Thêm xong thì đá quay lại trang danh sách sinh viên
            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
            exit();
        }
    }
}