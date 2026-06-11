<?php
require_once '../app/core/Controller.php';

class sinhvien extends Controller {
    
    public function index() {
        $limit = 5; 
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1; 
        
        $offset = ($currentPage - 1) * $limit;

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
        $sv = $sinhvienModel->getSinhVienById($id);

        // Nếu tìm thấy sinh viên thì mới mở form sửa, không thì đá về danh sách
        if ($sv) {
            $this->view('sinhvien/edit', ['sinhvien' => $sv]);
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

            if ($id > 0 && !empty($hoten) && !empty($mssv)) {
                $sinhvienModel = $this->model('sinhvienModel');
                $sinhvienModel->update($id, $hoten, $gioitinh, $mssv);
            }

            header('Location: /PMNM_68PM4_QLSV/public/index.php?url=sinhvien/index');
            exit();
        }
    }
}
?>