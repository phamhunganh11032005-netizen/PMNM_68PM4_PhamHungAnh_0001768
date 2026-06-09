<?php
// Gọi phần đầu trang (nằm cùng thư mục partials)
require_once __DIR__ . '/header.php';

// Nạp nội dung động (lùi 1 cấp ra views rồi vào thư mục chức năng)
if (!empty($viewContent)) {
    require_once __DIR__ . '/../' . $viewContent . '.php';
}

// Gọi phần cuối trang (nằm cùng thư mục partials)
require_once __DIR__ . '/footer.php';
?>