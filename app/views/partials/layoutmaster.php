<?php
// Gọi phần đầu trang
require_once 'partials/header.php';

// Nạp nội dung động của từng trang do Controller chỉ định
if (!empty($viewContent)) {
    require_once $viewContent . '.php';
}

// Gọi phần cuối trang
require_once 'partials/footer.php';
?>