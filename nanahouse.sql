-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 29, 2023 lúc 06:09 PM
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
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iMaDon` int(11) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iMaPhieu` int(11) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctphieunhap`
--

CREATE TABLE `tbl_ctphieunhap` (
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iPN` int(11) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
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
-- Cấu trúc bảng cho bảng `tbl_diachi`
--

CREATE TABLE `tbl_diachi` (
  `PK_iMaDiaChi` int(11) NOT NULL,
  `FK_iMaKH` int(11) DEFAULT NULL,
  `sDiaChi` varchar(255) NOT NULL,
  `iMacDinh` tinyint(1) DEFAULT 0,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dondathang`
--

CREATE TABLE `tbl_dondathang` (
  `PK_iMaDon` int(11) NOT NULL,
  `FK_iMaNV` int(11) DEFAULT NULL,
  `FK_iMaKH` int(11) DEFAULT NULL,
  `FK_iMaDiaChi` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dThoiGianTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dNgayNhanHang` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khuyenmai`
--

CREATE TABLE `tbl_khuyenmai` (
  `PK_iMaKM` int(11) NOT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sTenKM` varchar(255) NOT NULL,
  `dNgayHieuLuc` date DEFAULT NULL,
  `fChietKhau` decimal(5,2) DEFAULT NULL,
  `iApDungTatCa` tinyint(1) DEFAULT 0,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `PK_iMaNV` int(11) NOT NULL,
  `FK_iMaTK` int(11) DEFAULT NULL,
  `sTenNV` varchar(255) NOT NULL,
  `sSDT` varchar(15) DEFAULT NULL,
  `sCMND` varchar(12) DEFAULT NULL,
  `sTenChucVu` varchar(255) DEFAULT NULL,
  `dNgaySinh` date DEFAULT NULL,
  `sGioiTinh` varchar(10) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhomsanpham`
--

CREATE TABLE `tbl_nhomsanpham` (
  `PK_iMaNhom` int(11) NOT NULL,
  `sTenNhom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieuhoantra`
--

CREATE TABLE `tbl_phieuhoantra` (
  `PK_iMaPhieu` int(11) NOT NULL,
  `FK_iMaNV` int(11) DEFAULT NULL,
  `FK_iMaNCC` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dNgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhap`
--

CREATE TABLE `tbl_phieunhap` (
  `PK_iPN` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `PK_iMaSP` int(11) NOT NULL,
  `FK_iMaNhom` int(11) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sp_km`
--

CREATE TABLE `tbl_sp_km` (
  `PK_iMaSPKM` int(11) NOT NULL,
  `FK_iMaSP` int(11) DEFAULT NULL,
  `FK_iMaKM` int(11) DEFAULT NULL,
  `iSoLuongApDung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `PK_iMaTK` int(11) NOT NULL,
  `FK_iMaQuyen` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `sTenTK` varchar(255) NOT NULL,
  `sMatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `PK_iMaTrangThai` int(11) NOT NULL,
  `sTenTrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_ctdondathang`
--
ALTER TABLE `tbl_ctdondathang`
  ADD PRIMARY KEY (`PK_iMaSP`),
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
  ADD PRIMARY KEY (`PK_iMaSP`),
  ADD KEY `FK_iMaPhieu` (`FK_iMaPhieu`);

--
-- Chỉ mục cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD PRIMARY KEY (`PK_iMaSP`),
  ADD KEY `FK_iPN` (`FK_iPN`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`PK_iDanhGia`),
  ADD KEY `FK_iMaKH` (`FK_iMaKH`),
  ADD KEY `FK_iMaSP` (`FK_iMaSP`);

--
-- Chỉ mục cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  ADD PRIMARY KEY (`PK_iMaDiaChi`),
  ADD KEY `FK_iMaKH` (`FK_iMaKH`);

--
-- Chỉ mục cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  ADD PRIMARY KEY (`PK_iMaDon`),
  ADD KEY `FK_iMaNV` (`FK_iMaNV`),
  ADD KEY `FK_iMaKH` (`FK_iMaKH`),
  ADD KEY `FK_iMaDiaChi` (`FK_iMaDiaChi`),
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
  ADD KEY `FK_iMaNhom` (`FK_iMaNhom`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`);

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
-- AUTO_INCREMENT cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  MODIFY `PK_iMaSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `PK_iDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  MODIFY `PK_iMaDiaChi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  MODIFY `PK_iMaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `PK_iMaGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `PK_iMaKH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_khuyenmai`
--
ALTER TABLE `tbl_khuyenmai`
  MODIFY `PK_iMaKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_ncc`
--
ALTER TABLE `tbl_ncc`
  MODIFY `PK_iMaNCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `PK_iMaNV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nhomsanpham`
--
ALTER TABLE `tbl_nhomsanpham`
  MODIFY `PK_iMaNhom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_phieuhoantra`
--
ALTER TABLE `tbl_phieuhoantra`
  MODIFY `PK_iMaPhieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  MODIFY `PK_iPN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_quyen`
--
ALTER TABLE `tbl_quyen`
  MODIFY `PK_iMaQuyen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `PK_iMaSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  MODIFY `PK_iMaSPKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `PK_iMaTK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `PK_iMaTrangThai` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_ctdondathang`
--
ALTER TABLE `tbl_ctdondathang`
  ADD CONSTRAINT `tbl_ctdondathang_ibfk_1` FOREIGN KEY (`FK_iMaDon`) REFERENCES `tbl_dondathang` (`PK_iMaDon`);

--
-- Các ràng buộc cho bảng `tbl_ctgiohang`
--
ALTER TABLE `tbl_ctgiohang`
  ADD CONSTRAINT `tbl_ctgiohang_ibfk_1` FOREIGN KEY (`FK_iMaGH`) REFERENCES `tbl_giohang` (`PK_iMaGH`);

--
-- Các ràng buộc cho bảng `tbl_ctphieuhoantra`
--
ALTER TABLE `tbl_ctphieuhoantra`
  ADD CONSTRAINT `tbl_ctphieuhoantra_ibfk_1` FOREIGN KEY (`FK_iMaPhieu`) REFERENCES `tbl_phieuhoantra` (`PK_iMaPhieu`);

--
-- Các ràng buộc cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  ADD CONSTRAINT `tbl_ctphieunhap_ibfk_1` FOREIGN KEY (`FK_iPN`) REFERENCES `tbl_phieunhap` (`PK_iPN`);

--
-- Các ràng buộc cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD CONSTRAINT `tbl_danhgia_ibfk_1` FOREIGN KEY (`FK_iMaKH`) REFERENCES `tbl_khachhang` (`PK_iMaKH`),
  ADD CONSTRAINT `tbl_danhgia_ibfk_2` FOREIGN KEY (`FK_iMaSP`) REFERENCES `tbl_sanpham` (`PK_iMaSP`);

--
-- Các ràng buộc cho bảng `tbl_diachi`
--
ALTER TABLE `tbl_diachi`
  ADD CONSTRAINT `tbl_diachi_ibfk_1` FOREIGN KEY (`FK_iMaKH`) REFERENCES `tbl_khachhang` (`PK_iMaKH`);

--
-- Các ràng buộc cho bảng `tbl_dondathang`
--
ALTER TABLE `tbl_dondathang`
  ADD CONSTRAINT `tbl_dondathang_ibfk_1` FOREIGN KEY (`FK_iMaNV`) REFERENCES `tbl_nhanvien` (`PK_iMaNV`),
  ADD CONSTRAINT `tbl_dondathang_ibfk_2` FOREIGN KEY (`FK_iMaKH`) REFERENCES `tbl_khachhang` (`PK_iMaKH`),
  ADD CONSTRAINT `tbl_dondathang_ibfk_3` FOREIGN KEY (`FK_iMaDiaChi`) REFERENCES `tbl_diachi` (`PK_iMaDiaChi`),
  ADD CONSTRAINT `tbl_dondathang_ibfk_4` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `tbl_giohang_ibfk_1` FOREIGN KEY (`FK_iMaTK`) REFERENCES `tbl_taikhoan` (`PK_iMaTK`);

--
-- Các ràng buộc cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD CONSTRAINT `tbl_khachhang_ibfk_1` FOREIGN KEY (`FK_iMaTK`) REFERENCES `tbl_taikhoan` (`PK_iMaTK`);

--
-- Các ràng buộc cho bảng `tbl_khuyenmai`
--
ALTER TABLE `tbl_khuyenmai`
  ADD CONSTRAINT `tbl_khuyenmai_ibfk_1` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);

--
-- Các ràng buộc cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD CONSTRAINT `tbl_nhanvien_ibfk_1` FOREIGN KEY (`FK_iMaTK`) REFERENCES `tbl_taikhoan` (`PK_iMaTK`);

--
-- Các ràng buộc cho bảng `tbl_phieuhoantra`
--
ALTER TABLE `tbl_phieuhoantra`
  ADD CONSTRAINT `tbl_phieuhoantra_ibfk_1` FOREIGN KEY (`FK_iMaNV`) REFERENCES `tbl_nhanvien` (`PK_iMaNV`),
  ADD CONSTRAINT `tbl_phieuhoantra_ibfk_2` FOREIGN KEY (`FK_iMaNCC`) REFERENCES `tbl_ncc` (`PK_iMaNCC`),
  ADD CONSTRAINT `tbl_phieuhoantra_ibfk_3` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);

--
-- Các ràng buộc cho bảng `tbl_phieunhap`
--
ALTER TABLE `tbl_phieunhap`
  ADD CONSTRAINT `tbl_phieunhap_ibfk_1` FOREIGN KEY (`FK_iMaNV`) REFERENCES `tbl_nhanvien` (`PK_iMaNV`),
  ADD CONSTRAINT `tbl_phieunhap_ibfk_2` FOREIGN KEY (`FK_iMaNCC`) REFERENCES `tbl_ncc` (`PK_iMaNCC`),
  ADD CONSTRAINT `tbl_phieunhap_ibfk_3` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`FK_iMaNhom`) REFERENCES `tbl_nhomsanpham` (`PK_iMaNhom`),
  ADD CONSTRAINT `tbl_sanpham_ibfk_2` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);

--
-- Các ràng buộc cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  ADD CONSTRAINT `tbl_sp_km_ibfk_1` FOREIGN KEY (`FK_iMaSP`) REFERENCES `tbl_sanpham` (`PK_iMaSP`),
  ADD CONSTRAINT `tbl_sp_km_ibfk_2` FOREIGN KEY (`FK_iMaKM`) REFERENCES `tbl_khuyenmai` (`PK_iMaKM`);

--
-- Các ràng buộc cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD CONSTRAINT `tbl_taikhoan_ibfk_1` FOREIGN KEY (`FK_iMaQuyen`) REFERENCES `tbl_quyen` (`PK_iMaQuyen`),
  ADD CONSTRAINT `tbl_taikhoan_ibfk_2` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `tbl_trangthai` (`PK_iMaTrangThai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
