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
public function getSinhVienPaging($limit, $offset) {
        $sql_query = "SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql_query);
        
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAllSinhVien() {
        $sql_query = "SELECT COUNT(*) as total FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total']; 
    }
public function create($hoten, $gioitinh, $mssv) {
    $sql_query = "INSERT INTO tbl_sinhvien (hoten, gioitinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
    $stmt = $this->conn->prepare($sql_query);
    
    $stmt->bindParam(':hoten', $hoten);
    $stmt->bindParam(':gioitinh', $gioitinh);
    $stmt->bindParam(':mssv', $mssv);
    
    return $stmt->execute();
}
}

    