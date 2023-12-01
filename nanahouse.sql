-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2023 lúc 05:26 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nanahouse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctdondathang`
--

CREATE TABLE `tbl_ctdondathang` (
  `PK_iMaCT_HD` int(11) NOT NULL,
  `FK_iMaDon` varchar(255) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL,
  `FK_iMaSP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctdondathang`
--

INSERT INTO `tbl_ctdondathang` (`PK_iMaCT_HD`, `FK_iMaDon`, `iSoLuong`, `FK_iMaSP`) VALUES
(59, 'HD_17011628146708', 10, '44'),
(60, 'HD_17011846484724', 1, '44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctgiohang`
--

CREATE TABLE `tbl_ctgiohang` (
  `PK_iMaCT_GH` int(11) NOT NULL,
  `FK_iMaSP` varchar(255) NOT NULL,
  `FK_iMaGH` varchar(255) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctgiohang`
--

INSERT INTO `tbl_ctgiohang` (`PK_iMaCT_GH`, `FK_iMaSP`, `FK_iMaGH`, `iSoLuong`) VALUES
(8, '44', 'GH_17007339966428', 2),
(9, '46', 'GH_17007339966428', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctphieuhoantra`
--

CREATE TABLE `tbl_ctphieuhoantra` (
  `PK_iMaCT_HT` int(11) NOT NULL,
  `FK_iMaSP` varchar(255) NOT NULL,
  `FK_iMaPhieu` varchar(255) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctphieuhoantra`
--

INSERT INTO `tbl_ctphieuhoantra` (`PK_iMaCT_HT`, `FK_iMaSP`, `FK_iMaPhieu`, `iSoLuong`) VALUES
(14, '44', 'HT_17007249039834', 1),
(15, '46', 'HT_17007249039834', 1),
(16, '44', 'HT_17007251758034', 1),
(17, '44', 'HT_17007251758034', 1),
(18, '48', 'HT_17007252194953', 1),
(19, '49', 'HT_17007252194953', 1),
(20, '44', 'HT_17011637042253', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctphieunhap`
--

CREATE TABLE `tbl_ctphieunhap` (
  `PK_iMaCT_PN` int(11) NOT NULL,
  `FK_iMaSP` int(11) NOT NULL,
  `FK_iMaPN` varchar(255) DEFAULT NULL,
  `iSoluong` int(11) NOT NULL,
  `fGiaNhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctphieunhap`
--

INSERT INTO `tbl_ctphieunhap` (`PK_iMaCT_PN`, `FK_iMaSP`, `FK_iMaPN`, `iSoluong`, `fGiaNhap`) VALUES
(31, 44, 'PN_17007239738851', 1, ''),
(32, 45, 'PN_17007243054157', 1, ''),
(33, 46, 'PN_17007243054157', 2, ''),
(34, 47, 'PN_17007243054157', 3, ''),
(35, 46, 'PN_17007243818567', 1, ''),
(36, 47, 'PN_17007243818567', 1, ''),
(37, 44, 'PN_17011584657923', 100, ''),
(38, 45, 'PN_17011584657923', 99, ''),
(39, 46, 'PN_17011584657923', 98, ''),
(40, 47, 'PN_17011587072456', 98, ''),
(41, 49, 'PN_17011661461030', 9, '900.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `PK_iDanhGia` int(11) NOT NULL,
  `FK_iMaKH` int(11) DEFAULT NULL,
  `FK_iMaSP` int(11) DEFAULT NULL,
  `sNoiDung` text DEFAULT NULL,
  `fDiem` decimal(5,2) DEFAULT NULL,
  `dThoiGian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dondathang`
--

CREATE TABLE `tbl_dondathang` (
  `PK_iMaDon` varchar(255) NOT NULL,
  `FK_iMaNV` varchar(255) DEFAULT NULL,
  `FK_iMaKH` varchar(255) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dThoiGianTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dNgayNhanHang` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dondathang`
--

INSERT INTO `tbl_dondathang` (`PK_iMaDon`, `FK_iMaNV`, `FK_iMaKH`, `FK_iMaTrangThai`, `dThoiGianTao`, `dNgayNhanHang`, `sGhiChu`) VALUES
('HD_17011628146708', 'NV_17007214792455', 'KH_17007209791149', 3, '2023-11-27 17:00:00', NULL, ''),
('HD_17011846484724', '', 'KH_17007335361836', 3, '2023-11-28 15:17:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `PK_iMaGH` varchar(255) NOT NULL,
  `FK_iMaTK` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`PK_iMaGH`, `FK_iMaTK`) VALUES
('GH_17007339966428', 'TK_17007335361836');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `PK_iMaKH` varchar(255) NOT NULL,
  `FK_iMaTK` varchar(255) DEFAULT NULL,
  `sTenKH` varchar(255) DEFAULT NULL,
  `sDiaChi` varchar(255) DEFAULT NULL,
  `sSDT` varchar(15) DEFAULT NULL,
  `dNgaySinh` date DEFAULT NULL,
  `sGioiTinh` varchar(10) DEFAULT NULL,
  `iTichDiem` int(11) DEFAULT NULL,
  `sNhomKH` varchar(50) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`PK_iMaKH`, `FK_iMaTK`, `sTenKH`, `sDiaChi`, `sSDT`, `dNgaySinh`, `sGioiTinh`, `iTichDiem`, `sNhomKH`, `sGhiChu`) VALUES
('KH_17007209791149', NULL, 'Nguyễn Thị Thanh Ngân', 'Vĩnh Phúc', '0978677799', '2001-10-31', 'Nữ', 0, NULL, ''),
('KH_17007210046159', NULL, 'Hoàng Văn Lương', 'Hà Nội', '0978677799', '1999-11-22', 'Nam', 0, NULL, ''),
('KH_17007210324087', NULL, 'Trần Hải Dương', 'Phú Thọ', '0978677799', '1998-10-31', 'Nam', 0, NULL, ''),
('KH_17007210626923', NULL, 'Đinh Quang Sáng', 'Lạng Sơn', '0978677799', '1997-11-22', 'Nam', 0, NULL, ''),
('KH_17007335361836', 'TK_17007335361836', 'Nguyễn Phương Thảo', 'Hà Nội', '0978677799', '2002-11-08', 'Nữ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khuyenmai`
--

CREATE TABLE `tbl_khuyenmai` (
  `PK_iMaKM` varchar(255) NOT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sTenKM` varchar(255) NOT NULL,
  `dNgayHieuLuc` date DEFAULT NULL,
  `dNgayHetHieuLuc` date NOT NULL,
  `fChietKhau` int(11) DEFAULT NULL,
  `iSoLuongAD` int(11) NOT NULL,
  `iApDungTatCa` tinyint(1) DEFAULT 0,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khuyenmai`
--

INSERT INTO `tbl_khuyenmai` (`PK_iMaKM`, `FK_iMaTrangThai`, `sTenKM`, `dNgayHieuLuc`, `dNgayHetHieuLuc`, `fChietKhau`, `iSoLuongAD`, `iApDungTatCa`, `sGhiChu`) VALUES
('KM_17007254276298', 7, 'Chiết khấu 10% giá trị sản phẩm', '2023-11-23', '2023-11-30', 10, 0, 0, ''),
('KM_17007255336737', 7, 'Khuyến mãi 5% giá trị sản phẩm', '2023-11-23', '2023-11-30', 5, 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ncc`
--

CREATE TABLE `tbl_ncc` (
  `PK_iMaNCC` int(11) NOT NULL,
  `sTenNCC` varchar(255) NOT NULL,
  `sDiaChi` varchar(255) DEFAULT NULL,
  `sSDT` varchar(15) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ncc`
--

INSERT INTO `tbl_ncc` (`PK_iMaNCC`, `sTenNCC`, `sDiaChi`, `sSDT`, `sGhiChu`) VALUES
(7, 'Vinamilk (Việt Nam)', 'Hà Nội', '097867574', ''),
(8, 'Dutch Lady (Quốc tế)', 'Hà Nội', '0976789876', ''),
(9, 'Enfamil (Quốc tế)', 'Hà Nội', '0978677799', ''),
(10, 'Pampers (Quốc tế)', 'Hà Nội', '0978677799', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `PK_iMaNV` varchar(255) NOT NULL,
  `FK_iMaTK` varchar(255) DEFAULT NULL,
  `sTenNV` varchar(255) NOT NULL,
  `sSDT` varchar(15) DEFAULT NULL,
  `sCMND` varchar(12) DEFAULT NULL,
  `sTenChucVu` varchar(255) DEFAULT NULL,
  `dNgaySinh` date DEFAULT NULL,
  `sGioiTinh` varchar(10) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`PK_iMaNV`, `FK_iMaTK`, `sTenNV`, `sSDT`, `sCMND`, `sTenChucVu`, `dNgaySinh`, `sGioiTinh`, `sGhiChu`) VALUES
('NV_17007212765026', 'TK_17007212765026', 'Đặng Như Quỳnh', '0978677799', '090889908768', '2', '2001-10-31', 'Nữ', ''),
('NV_17007214792455', 'TK_17007214792455', 'Nguyễn Minh Tuấn', '0978677799', '099848584546', '3', '1998-11-01', 'Nam', ''),
('NV_17007216085595', '1', 'Trần Thị Ánh', '0978677799', '35465767681', '1', '2001-01-08', 'Nữ', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhomsanpham`
--

CREATE TABLE `tbl_nhomsanpham` (
  `PK_iMaNhom` varchar(255) NOT NULL,
  `sTenNhom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhomsanpham`
--

INSERT INTO `tbl_nhomsanpham` (`PK_iMaNhom`, `sTenNhom`) VALUES
('N001', 'Sữa bột cho trẻ từ 0-1 tuổi'),
('N002', 'Sữa tươi cho trẻ trên 6 tuổi'),
('N003', 'Bỉm dán'),
('N004', 'Bỉm lớn'),
('N005', 'Bỉm dành cho trẻ sơ sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieuhoantra`
--

CREATE TABLE `tbl_phieuhoantra` (
  `PK_iMaPhieu` varchar(255) NOT NULL,
  `FK_iMaNV` varchar(255) DEFAULT NULL,
  `FK_iMaNCC` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dNgayTao` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieuhoantra`
--

INSERT INTO `tbl_phieuhoantra` (`PK_iMaPhieu`, `FK_iMaNV`, `FK_iMaNCC`, `FK_iMaTrangThai`, `dNgayTao`, `sGhiChu`) VALUES
('HT_17007251758034', 'NV_17007212765026', 7, 5, '2023-11-23', ''),
('HT_17007252194953', 'NV_17007212765026', 8, 5, '2023-11-23', ''),
('HT_17011637042253', 'NV_17007212765026', 7, NULL, '2023-11-28', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `PK_iPN` varchar(255) NOT NULL,
  `FK_iMaNV` varchar(255) DEFAULT NULL,
  `FK_iMaNCC` varchar(255) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sNguoiGiao` varchar(255) DEFAULT NULL,
  `fTienDaTra` decimal(10,2) DEFAULT NULL,
  `dNgayNhap` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieunhap`
--

INSERT INTO `tbl_phieunhap` (`PK_iPN`, `FK_iMaNV`, `FK_iMaNCC`, `FK_iMaTrangThai`, `sNguoiGiao`, `fTienDaTra`, `dNgayNhap`, `sGhiChu`) VALUES
('PN_17007239738851', 'NV_17007212765026', '7', 3, NULL, NULL, '2023-11-23', ''),
('PN_17007243054157', 'NV_17007212765026', '8', 3, NULL, NULL, '2023-11-23', ''),
('PN_17007243818567', 'NV_17007212765026', '10', 3, NULL, NULL, '2023-11-23', ''),
('PN_17011584657923', 'NV_17007212765026', '7', 3, NULL, NULL, '2023-11-28', ''),
('PN_17011587072456', 'NV_17007212765026', '10', NULL, NULL, NULL, '2023-11-28', ''),
('PN_17011661461030', 'NV_17007212765026', '7', NULL, NULL, NULL, '2023-11-28', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyen`
--

CREATE TABLE `tbl_quyen` (
  `PK_iMaQuyen` int(11) NOT NULL,
  `sTenQuyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyen`
--

INSERT INTO `tbl_quyen` (`PK_iMaQuyen`, `sTenQuyen`) VALUES
(1, 'admin'),
(2, 'warehouse'),
(3, 'sell'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iMaNhom` varchar(255) DEFAULT NULL,
  `sTenSP` varchar(255) NOT NULL,
  `fSoLuong` int(11) DEFAULT NULL,
  `sDVT` varchar(50) DEFAULT NULL,
  `fGiaBanLe` decimal(10,3) DEFAULT NULL,
  `sHinhAnh` varchar(255) DEFAULT NULL,
  `dNgayTao` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`PK_iMaSP`, `FK_iMaNhom`, `sTenSP`, `fSoLuong`, `sDVT`, `fGiaBanLe`, `sHinhAnh`, `dNgayTao`, `sGhiChu`) VALUES
(44, 'N001', 'Enfamil (Enfamil A+ Infant Formula)', 79, 'Hộp', 500.000, '1700719217_478272df2f758fccf21a.webp', NULL, 'Sữa bột Enfamil A+ chứa các chất dinh dưỡng quan trọng như DHA, ARA, và chất xơ prebiotic để hỗ trợ sự phát triển của trẻ. Sản phẩm này được thiết kế để cung cấp một chế độ dinh dưỡng đầy đủ và cân đối cho sự phát triển của sơ sinh.'),
(45, 'N001', 'Similac (Similac Gain IQ Kid)', 100, 'Hộp', 450.000, '1700719293_0c6351704be9037d106c.jpg', NULL, 'Similac Gain IQ Kid chứa các thành phần như lutein, DHA, chất xơ prebiotic và nhiều khoáng chất quan trọng khác. Sản phẩm này được tối ưu hóa để hỗ trợ phát triển trí óc và cơ bắp của trẻ nhỏ.'),
(46, 'N003', 'Pampers (Pampers Premium Care)', 100, 'Bịch', 200.000, '1700719427_6d604e0720e03385cbf6.jpg', NULL, 'Bỉm Pampers Premium Care được thiết kế với lớp lót mềm mại và chống tràn hiệu quả. Chúng chứa các chất chống kích ứng để bảo vệ làn da nhạy cảm của trẻ. Các bỉm này thường có các kích thước phù hợp cho trẻ từ sơ sinh đến một tuổi.'),
(47, 'N003', 'Huggies (Huggies Ultra Soft Pants)', 100, 'Bịch', 150.000, '1700719553_589e76843c63f508a83e.jpg', NULL, 'Bỉm Huggies Ultra Soft Pants có thiết kế dạng quần, giúp dễ dàng đeo và tháo. Chúng có lớp lót mềm mại và linh hoạt, cùng với công nghệ chống tràn để giữ cho bé khô ráo và thoải mái suốt cả ngày.'),
(48, 'N002', 'Sữa tươi Vinamilk (Sữa tươi không đường)', 0, 'Lọ', 30.000, '1700719663_653d30ffc3265e8ae94e.jpg', NULL, 'Sữa tươi Vinamilk không đường thường được chế biến từ sữa tươi tinh khiết, giữ lại hương vị tự nhiên và giá trị dinh dưỡng của sữa. Nó thích hợp cho những người muốn thưởng thức hương vị sữa tươi mà không muốn thêm đường.'),
(49, 'N001', 'Dutch Lady (Sữa tươi có đường)', 10, 'Lọ', 25.000, '1700719714_a1e453fd3ad047381db9.jpg', NULL, 'Sữa tươi Dutch Lady có đường thường có thêm đường để tăng thêm hương vị ngọt ngào. Đây là lựa chọn phổ biến cho những người thích hương vị sữa tươi cùng với độ ngọt vừa phải.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sp_km`
--

CREATE TABLE `tbl_sp_km` (
  `PK_iMaSPKM` int(11) NOT NULL,
  `FK_iMaSP` varchar(255) DEFAULT NULL,
  `FK_iMaKM` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sp_km`
--

INSERT INTO `tbl_sp_km` (`PK_iMaSPKM`, `FK_iMaSP`, `FK_iMaKM`) VALUES
(35, '44', 'KM_17007254276298'),
(36, '45', 'KM_17007254276298'),
(37, '46', 'KM_17007254276298'),
(38, '47', 'KM_17007255336737'),
(39, '48', 'KM_17007255336737'),
(40, '49', 'KM_17007255336737');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `PK_iMaTK` varchar(255) NOT NULL,
  `FK_iMaQuyen` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sTenTK` varchar(255) NOT NULL,
  `sMatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`PK_iMaTK`, `FK_iMaQuyen`, `FK_iMaTrangThai`, `sTenTK`, `sMatKhau`) VALUES
('1', 1, 1, 'admin', '$2y$10$GfRc4CMcGSYxRqUet87VsuDyK3Jqi2WkGjdGfH5jQj5Yq4jp8Tph2'),
('TK_17007212765026', 2, 1, 'quynhnd', '$2y$10$CSxndvTt7u6AneEt/Hx0EuJJkm2yR7qf6TjjHtlu4XgFahjbshWoK'),
('TK_17007214792455', 3, 1, 'tuannm', '$2y$10$rrbs25E1nV1KjG59Ngw24.XZkNyXYjCMFZaDqo0YUIsTH6/MmortO'),
('TK_17007216085595', 1, 1, 'anhtt', '$2y$10$fHshLx/4/0ZyM/x25rIuMO7dxtfuembDZxnN5t0oU61u4P6VVATx6'),
('TK_17007335361836', 4, 1, 'customer', '$2y$10$TmnGpsTeactKa4cH3WOvXuohUNtsYvQF1796WHzDrX9t2JWs2WnuG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `PK_iMaTrangThai` int(11) NOT NULL,
  `sTenTrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`PK_iMaTrangThai`, `sTenTrangThai`) VALUES
(1, 'Đã kích hoạt'),
(2, 'Chưa kích hoạt'),
(3, 'Đã thanh toán'),
(4, 'Chờ thanh toán'),
(5, 'Đã hoàn trả'),
(6, 'Chờ hoàn trả'),
(7, 'Đang áp dụng'),
(8, 'Hết hiệu lực'),
(9, 'Chưa đến hạn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_ctdondathang`
--
ALTER TABLE `tbl_ctdondathang`
  ADD PRIMARY KEY (`PK_iMaCT_HD`),
  ADD KEY `FK_iMaDon` (`FK_iMaDon`);

--
-- Chỉ mục cho bảng `tbl_ctgiohang`
--
ALTER TABLE `tbl_ctgiohang`
  ADD PRIMARY KEY (`PK_iMaCT_GH`),
  ADD KEY `FK_iMaGH` (`FK_iMaGH`);

--
-- Chỉ mục cho bảng `tbl_ctphieuhoantra`
--
ALTER TABLE `tbl_ctphieuhoantra`
  ADD PRIMARY KEY (`PK_iMaCT_HT`),
  ADD KEY `FK_iMaPhieu` (`FK_iMaPhieu`);

--
-- Chỉ mục cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD PRIMARY KEY (`PK_iMaCT_PN`),
  ADD KEY `maSP` (`FK_iMaSP`),
  ADD KEY `maPN` (`FK_iMaPN`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`PK_iDanhGia`),
  ADD KEY `FK_iMaKH` (`FK_iMaKH`),
  ADD KEY `FK_iMaSP` (`FK_iMaSP`);

--
-- Chỉ mục cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  ADD PRIMARY KEY (`PK_iMaDon`),
  ADD KEY `FK_iMaNV` (`FK_iMaNV`),
  ADD KEY `FK_iMaKH` (`FK_iMaKH`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`PK_iMaGH`),
  ADD KEY `FK_iMaTK` (`FK_iMaTK`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`PK_iMaKH`),
  ADD KEY `FK_iMaTK` (`FK_iMaTK`);

--
-- Chỉ mục cho bảng `tbl_khuyenmai`
--
ALTER TABLE `tbl_khuyenmai`
  ADD PRIMARY KEY (`PK_iMaKM`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  ADD PRIMARY KEY (`PK_iMaNCC`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`PK_iMaNV`),
  ADD UNIQUE KEY `sCMND` (`sCMND`),
  ADD KEY `FK_iMaTK` (`FK_iMaTK`);

--
-- Chỉ mục cho bảng `tbl_nhomsanpham`
--
ALTER TABLE `tbl_nhomsanpham`
  ADD PRIMARY KEY (`PK_iMaNhom`);

--
-- Chỉ mục cho bảng `tbl_phieuhoantra`
--
ALTER TABLE `tbl_phieuhoantra`
  ADD PRIMARY KEY (`PK_iMaPhieu`),
  ADD KEY `FK_iMaNV` (`FK_iMaNV`),
  ADD KEY `FK_iMaNCC` (`FK_iMaNCC`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  ADD PRIMARY KEY (`PK_iPN`),
  ADD KEY `FK_iMaNV` (`FK_iMaNV`),
  ADD KEY `FK_iMaNCC` (`FK_iMaNCC`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  ADD PRIMARY KEY (`PK_iMaQuyen`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`PK_iMaSP`),
  ADD KEY `tbl_sanpham_ibfk_1` (`FK_iMaNhom`);

--
-- Chỉ mục cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  ADD PRIMARY KEY (`PK_iMaSPKM`),
  ADD KEY `FK_iMaSP` (`FK_iMaSP`),
  ADD KEY `FK_iMaKM` (`FK_iMaKM`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`PK_iMaTK`),
  ADD KEY `FK_iMaQuyen` (`FK_iMaQuyen`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  ADD PRIMARY KEY (`PK_iMaTrangThai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_ctdondathang`
--
ALTER TABLE `tbl_ctdondathang`
  MODIFY `PK_iMaCT_HD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `tbl_ctgiohang`
--
ALTER TABLE `tbl_ctgiohang`
  MODIFY `PK_iMaCT_GH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieuhoantra`
--
ALTER TABLE `tbl_ctphieuhoantra`
  MODIFY `PK_iMaCT_HT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  MODIFY `PK_iMaCT_PN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `PK_iDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  MODIFY `PK_iMaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  MODIFY `PK_iMaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `PK_iMaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  MODIFY `PK_iMaSPKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `PK_iMaTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
