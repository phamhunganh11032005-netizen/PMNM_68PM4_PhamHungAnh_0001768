<?php
require_once '../app/core/DB.php';

class sinhvienModel {
    private $conn;

    public function __construct() {
        $this->conn = ConnectDB::connect();
    }

    // 1. LẤY TẤT CẢ SINH VIÊN (HÀM CŨ GIỮ NGUYÊN)
    public function getAllSinhVien() {
        $sql_query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. LẤY THÔNG TIN 1 SINH VIÊN THEO ID (ĐỂ ĐỔ VÀO FORM SỬA)
    public function getSinhVienById($id) {
        $sql_query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. LẤY DANH SÁCH SINH VIÊN THEO PHÂN TRANG
    public function getSinhVienPaging($limit, $offset) {
        $sql_query = "SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql_query);
        
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. ĐẾM TỔNG SỐ SINH VIÊN
    public function countAllSinhVien() {
        $sql_query = "SELECT COUNT(*) as total FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total']; 
    }

    // 5. THÊM MỚI SINH VIÊN
    public function create($hoten, $gioitinh, $mssv) {
        $sql_query = "INSERT INTO tbl_sinhvien (hoten, gioitinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($sql_query);
        
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        
        return $stmt->execute();
    }

    // 6. CẬP NHẬT THÔNG TIN SINH VIÊN (HÀM CÒN THIẾU BỊ LỖI BAN NÃY)
    public function update($id, $hoten, $gioitinh, $mssv) {
        $sql_query = "UPDATE tbl_sinhvien SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        
        return $stmt->execute();
    }

    // 7. XÓA SINH VIÊN THEO ID
    public function delete($id) {
        $sql_query = "DELETE FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>