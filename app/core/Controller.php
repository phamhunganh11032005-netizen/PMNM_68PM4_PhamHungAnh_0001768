<?php
class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        // Giải nén mảng dữ liệu để các file view dùng được biến $sinhviens, $currentPage
        extract($data);
        
        $viewContent = $view;
        
        // ĐƯỜNG DẪN ĐÚNG: layoutmaster.php của bạn đang nằm trong thư mục partials
        $layoutPath = '../app/views/partials/layoutmaster.php';
        
        if (file_exists($layoutPath)) {
            require_once $layoutPath;
        } else {
            // Nếu không tìm thấy layoutmaster thì mới nạp trực tiếp file view trần trụi
            require_once '../app/views/' . $view . '.php';
        }
    }
}
?>