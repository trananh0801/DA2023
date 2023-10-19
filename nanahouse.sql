-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2023 lúc 05:58 PM
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
(13, '0', 1, '1'),
(14, '0', 2, '2'),
(15, 'HD_16974725575076', 3, '1'),
(16, 'HD_16974725575076', 4, '2'),
(17, 'HD_16974726395600', 5, '1'),
(18, 'HD_16974726395600', 6, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctgiohang`
--

CREATE TABLE `tbl_ctgiohang` (
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iMaGH` int(11) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '1', '0', 1),
(2, '2', '0', 2),
(3, '1', 'HT_16975312781360', 3),
(4, '2', 'HT_16975312781360', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctphieunhap`
--

CREATE TABLE `tbl_ctphieunhap` (
  `PK_iMaCT_PN` int(11) NOT NULL,
  `FK_iMaSP` int(11) NOT NULL,
  `FK_iMaPN` varchar(255) DEFAULT NULL,
  `iSoluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `dThoiGian` timestamp NOT NULL DEFAULT current_timestamp(),
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dondathang`
--

CREATE TABLE `tbl_dondathang` (
  `PK_iMaDon` varchar(255) NOT NULL,
  `FK_iMaNV` int(11) DEFAULT NULL,
  `FK_iMaKH` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dThoiGianTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dNgayNhanHang` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dondathang`
--

INSERT INTO `tbl_dondathang` (`PK_iMaDon`, `FK_iMaNV`, `FK_iMaKH`, `FK_iMaTrangThai`, `dThoiGianTao`, `dNgayNhanHang`, `sGhiChu`) VALUES
('3', 1, 0, 3, '0000-00-00 00:00:00', '0000-00-00', ''),
('4', 1, 0, 3, '0000-00-00 00:00:00', '0000-00-00', ''),
('HD_16974726395600', 1, 0, 3, '0000-00-00 00:00:00', '0000-00-00', ''),
('HD_16975392676251', 1, 0, 3, '0000-00-00 00:00:00', '0000-00-00', ''),
('HD_16975396329470', 1, 0, 3, '0000-00-00 00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `PK_iMaGH` int(11) NOT NULL,
  `FK_iMaTK` int(11) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `PK_iMaKH` int(11) NOT NULL,
  `FK_iMaTK` int(11) DEFAULT NULL,
  `sTenKH` varchar(255) NOT NULL,
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
(1, 4, 'Trần Ánh', 'Vĩnh Phúc', '0988999888', '2023-10-01', 'Nữ', 10, NULL, 'Không có ghi chú');

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
  `fChietKhau` decimal(5,2) DEFAULT NULL,
  `iSoLuongAD` int(11) NOT NULL,
  `iApDungTatCa` tinyint(1) DEFAULT 0,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khuyenmai`
--

INSERT INTO `tbl_khuyenmai` (`PK_iMaKM`, `FK_iMaTrangThai`, `sTenKM`, `dNgayHieuLuc`, `dNgayHetHieuLuc`, `fChietKhau`, `iSoLuongAD`, `iApDungTatCa`, `sGhiChu`) VALUES
('KM_16975398602050', 3, '1', '2023-09-30', '2023-10-04', 1.00, 1, 0, '1'),
('KM_16975399051888', 3, '2', '2023-10-14', '2023-10-13', 2.00, 2, 0, '2');

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
(1, 'nhà cung cấp 1', 'Vĩnh Phúc', '0978677799', 'Hihi'),
(2, 'Nhà cung cấp 2', 'Hà Nội', '0978677799', 'HUHU');

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
('1', '1', 'Nhân viên Ánh', '0988999888', '354354545454', 'Nhân viên bán hàng', '2023-10-10', 'Nữ', 'Nhân viên pát tham'),
('2', NULL, '123', '', '', NULL, '0000-00-00', '1', ''),
('NV_16972964998014', 'TK_16972964998014', '332e32e3', '24324', '23432', '1', '2023-10-05', 'Nam', '432432');

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
('N001', 'Bỉm'),
('N002', 'Sữa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieuhoantra`
--

CREATE TABLE `tbl_phieuhoantra` (
  `PK_iMaPhieu` varchar(255) NOT NULL,
  `FK_iMaNV` int(11) DEFAULT NULL,
  `FK_iMaNCC` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dNgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieuhoantra`
--

INSERT INTO `tbl_phieuhoantra` (`PK_iMaPhieu`, `FK_iMaNV`, `FK_iMaNCC`, `FK_iMaTrangThai`, `dNgayTao`, `sGhiChu`) VALUES
('HT_16975311182987', 1, 1, 3, '0000-00-00 00:00:00', '123'),
('HT_16975312781360', 1, 1, 3, '2023-10-03 17:00:00', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `PK_iPN` varchar(255) NOT NULL,
  `FK_iMaNV` int(11) DEFAULT NULL,
  `FK_iMaNCC` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sNguoiGiao` varchar(255) DEFAULT NULL,
  `fTienDaTra` decimal(10,2) DEFAULT NULL,
  `dNgayNhap` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sTenSP` varchar(255) NOT NULL,
  `fSoLuong` int(11) DEFAULT NULL,
  `sDVT` varchar(50) DEFAULT NULL,
  `fGiaNhap` decimal(10,2) DEFAULT NULL,
  `fGiaBanLe` decimal(10,2) DEFAULT NULL,
  `fGiaBanSi` decimal(10,2) DEFAULT NULL,
  `sHinhAnh` varchar(255) DEFAULT NULL,
  `dHSD` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`PK_iMaSP`, `FK_iMaNhom`, `FK_iMaTrangThai`, `sTenSP`, `fSoLuong`, `sDVT`, `fGiaNhap`, `fGiaBanLe`, `fGiaBanSi`, `sHinhAnh`, `dHSD`, `sGhiChu`) VALUES
(1, 'N001', 1, 'Sữa bột', 12, 'e21', 112.00, 1212.00, 12121.00, '121211', '2023-10-03', 'regregtregtrt'),
(2, 'N002', 2, 'Sữa tươi', 100, '', 0.00, 0.00, 0.00, '', '0000-00-00', ''),
(28, 'N001', NULL, '1', 0, '1', 0.00, 1.00, 1.00, '1697524253_33a119b08057dd2a86b2.jpg', NULL, '1');

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
(4, '1', 'KM_16975398602050'),
(5, '2', 'KM_16975398602050'),
(6, '28', 'KM_16975398602050'),
(7, '1', 'KM_16975399051888'),
(8, '2', 'KM_16975399051888');

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
('2', 2, 1, 'warehouse', '123'),
('3', 3, 1, 'sell', '123'),
('4', 4, 1, 'customer', '123'),
('TK_16972964998014', 1, 1, '432432', '43243');

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
(4, 'Chờ thanh toán');

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
  ADD PRIMARY KEY (`PK_iMaSP`),
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
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`),
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
  MODIFY `PK_iMaCT_HD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieuhoantra`
--
ALTER TABLE `tbl_ctphieuhoantra`
  MODIFY `PK_iMaCT_HT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  MODIFY `PK_iMaCT_PN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `PK_iDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `PK_iMaGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `PK_iMaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  MODIFY `PK_iMaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  MODIFY `PK_iMaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `PK_iMaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  MODIFY `PK_iMaSPKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `PK_iMaTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_ctgiohang`
--
ALTER TABLE `tbl_ctgiohang`
  ADD CONSTRAINT `tbl_ctgiohang_ibfk_1` FOREIGN KEY (`FK_iMaGH`) REFERENCES `tbl_giohang` (`PK_iMaGH`);

--
-- Các ràng buộc cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD CONSTRAINT `maPN` FOREIGN KEY (`FK_iMaPN`) REFERENCES `tbl_phieunhap` (`PK_iPN`),
  ADD CONSTRAINT `maSP` FOREIGN KEY (`FK_iMaSP`) REFERENCES `tbl_sanpham` (`PK_iMaSP`);

--
-- Các ràng buộc cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD CONSTRAINT `tbl_danhgia_ibfk_1` FOREIGN KEY (`FK_iMaKH`) REFERENCES `tbl_khachhang` (`PK_iMaKH`),
  ADD CONSTRAINT `tbl_danhgia_ibfk_2` FOREIGN KEY (`FK_iMaSP`) REFERENCES `tbl_sanpham` (`PK_iMaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;