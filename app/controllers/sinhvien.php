<?php
require_once '../app/core/Controller.php';

class sinhvien extends Controller {
    public function index() {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhvien();
        
        // trả về view
        // require_once '../app/views/sinhvien/index.php';
        $this->view("sinhvien/index", ['sinhviens' => $sinhviens]);
    }

public function create() 
{
    $this->view('sinhvien/create');
}

// Hàm xử lý nhận dữ liệu từ Form gửi lên
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
?>