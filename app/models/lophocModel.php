<?php
require_once '../app/core/DB.php';

class lophocModel {
    private $conn;

    public function __construct() {
        $this->conn = ConnectDB::connect();
    }

    public function getAllLopHoc() {
        $sql_query = "SELECT * FROM tbl_lophoc";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLopHocById($id) {
        $sql_query = "SELECT * FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($tenlop, $khoahoc) {
        $sql_query = "INSERT INTO tbl_lophoc (tenlop, khoahoc) VALUES (:tenlop, :khoahoc)";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':khoahoc', $khoahoc);
        return $stmt->execute();
    }

    public function update($id, $tenlop, $khoahoc) {
        $sql_query = "UPDATE tbl_lophoc SET tenlop = :tenlop, khoahoc = :khoahoc WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':tenlop', $tenlop);
        $stmt->bindParam(':khoahoc', $khoahoc);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql_query = "DELETE FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}