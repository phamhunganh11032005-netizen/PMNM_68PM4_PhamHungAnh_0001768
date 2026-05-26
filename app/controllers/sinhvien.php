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
}
?>