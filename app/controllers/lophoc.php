<?php
class lophoc extends Controller {
    
    // Hiển thị danh sách lớp học
    public function index() {
        $lophocModel = $this->model('lophocModel');
        $listLopHoc = $lophocModel->getAllLopHoc();
        
        $this->view("lophoc/index", [
            'lophocs' => $listLopHoc
        ]);
    }

    // Xóa lớp học theo ID
    public function delete() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $lophocModel = $this->model('lophocModel');
            $lophocModel->delete($id);
        }
        header("Location: /PMNM_68PM4_QLSV/public/index.php?url=lophoc/index");
        exit();
    }
}