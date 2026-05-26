<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;

    public function __construct() {
       $this->conn = ConnectDB::connect();
    }
    public function getAllSinhVien() {
        $sql_query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSinhVienById($id) {
        $sql_query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
?>

    