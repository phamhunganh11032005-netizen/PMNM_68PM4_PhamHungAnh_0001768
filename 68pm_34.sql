-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2026 lúc 05:38 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `68pm_34`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lophoc`
--

CREATE TABLE `tbl_lophoc` (
  `id` int(11) NOT NULL,
  `tenlop` varchar(100) NOT NULL,
  `khoahoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lophoc`
--

INSERT INTO `tbl_lophoc` (`id`, `tenlop`, `khoahoc`) VALUES
(1, '68PM4', '2023-2027'),
(2, '68PM1', '2023-2027'),
(3, '67PM2', '2022-2026'),
(4, '68PM4', '2023-2027'),
(5, '68PM1', '2023-2027'),
(6, '67PM2', '2022-2026'),
(7, '68PM4', '2023-2027'),
(8, '68PM1', '2023-2027'),
(9, '67PM2', '2022-2026');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sinhvien`
--

CREATE TABLE `tbl_sinhvien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `gioitinh` varchar(50) DEFAULT NULL,
  `mssv` varchar(50) NOT NULL,
  `malop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sinhvien`
--

INSERT INTO `tbl_sinhvien` (`id`, `hoten`, `gioitinh`, `mssv`, `malop`) VALUES
(1, 'Nguyễn Văn A', 'Nam', '0004568', 1),
(2, 'Trần Thị B', 'Nữ', '0006568', 1),
(3, 'Lê Hoàng C', 'Nam', '0003468', 1),
(4, 'Phạm Hùng Anh', 'Nam', '0001768', 1),
(5, 'Trần Minh Hiếu', 'Nam', '0009568', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sinhvien`
--
ALTER TABLE `tbl_sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_sinhvien`
--
ALTER TABLE `tbl_sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
