-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 06:11 PM
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
(24, 'HD_16984144716418', 12, '1'),
(25, 'HD_16984144716418', 13, '2'),
(26, 'HD_16989367429799', 77, '1'),
(27, 'HD_16989367429799', 88, '2'),
(28, 'HD_16992814436842', 7, '1'),
(29, 'HD_16992815749017', 2, '1'),
(30, 'HD_16992822026278', 20, '1'),
(31, 'HD_16992822424669', 10, '1'),
(32, 'HD_16992822424669', 8, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctgiohang`
--

CREATE TABLE `tbl_ctgiohang` (
  `PK_iMaCT_GH` int(11) NOT NULL,
  `FK_iMaSP` varchar(255) NOT NULL,
  `FK_iMaGH` int(11) DEFAULT NULL,
  `iSoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctgiohang`
--

INSERT INTO `tbl_ctgiohang` (`PK_iMaCT_GH`, `FK_iMaSP`, `FK_iMaGH`, `iSoLuong`) VALUES
(1, '1', 1, 10),
(2, '2', 1, 20);

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
(9, '1', 'HT_16992845119694', 10),
(10, '1', 'HT_16992845585333', 20),
(11, '2', 'HT_16992845585333', 30),
(12, '1', 'HT_16992882908698', 20),
(13, '41', 'HT_16992893582283', 80);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_ctphieunhap`
--

INSERT INTO `tbl_ctphieunhap` (`PK_iMaCT_PN`, `FK_iMaSP`, `FK_iMaPN`, `iSoluong`) VALUES
(26, 1, 'PN_16977316272656', 10),
(27, 2, 'PN_16977316272656', 12),
(28, 1, 'PN_16977330545720', 1),
(29, 2, 'PN_16977330545720', 2),
(30, 1, 'PN_16992829478347', 10);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_danhgia`
--

INSERT INTO `tbl_danhgia` (`PK_iDanhGia`, `FK_iMaKH`, `FK_iMaSP`, `sNoiDung`, `fDiem`, `dThoiGian`) VALUES
(1, 1, 1, 'Sản phẩm tốt', 10.00, '2023-10-19 14:10:15');

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
('HD_16984144716418', 'NV_16972964998014', '1', 3, '2023-10-26 17:00:00', '2023-10-04', 'Ánh đặt'),
('HD_16989367429799', 'NV_16976794566924', '1', 3, '2023-11-01 17:00:00', '2023-11-15', '123'),
('HD_16992814436842', 'NV_16972964998014', '1', 3, '2023-11-05 17:00:00', '0000-00-00', ''),
('HD_16992815749017', 'NV_16972964998014', '1', 3, '2023-11-05 17:00:00', '0000-00-00', ''),
('HD_16992822026278', 'NV_16972964998014', '1', 3, '2023-11-05 17:00:00', '0000-00-00', ''),
('HD_16992822424669', 'NV_16972964998014', '1', 3, '2023-11-05 17:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `PK_iMaGH` int(11) NOT NULL,
  `FK_iMaTK` int(11) DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`PK_iMaGH`, `FK_iMaTK`, `sGhiChu`) VALUES
(1, 1, 'Giỏ hàng 1');

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
(1, 4, 'Trần Ánh', 'Vĩnh Phúc', '0988999888', '2023-10-01', 'Nữ', 100, NULL, 'Không có ghi chú');

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
('KM_16984198645965', 7, 'test 1', '2023-10-20', '2023-10-06', 10.00, 10, 0, 'không có');

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
(1, 'nhà cung cấp 1', 'Vĩnh Phúc', '0978677799', 'hahahah'),
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
('NV_16972964998014', 'TK_16972964998014', '332e32e3', '24324', '23432', '1', '2023-10-05', 'Nam', '432432 hiih'),
('NV_16976794566924', 'TK_16976794566924', '1', '1', '1', '2', '2023-10-03', 'Nam', '1');

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
('N001', 'Bỉm 11'),
('N002', 'Sữa 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieuhoantra`
--

CREATE TABLE `tbl_phieuhoantra` (
  `PK_iMaPhieu` varchar(255) NOT NULL,
  `FK_iMaNV` varchar(255) DEFAULT NULL,
  `FK_iMaNCC` int(11) DEFAULT NULL,
  `FK_iMaTrangThai` int(11) DEFAULT NULL,
  `dNgayTao` timestamp NOT NULL DEFAULT current_timestamp(),
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieuhoantra`
--

INSERT INTO `tbl_phieuhoantra` (`PK_iMaPhieu`, `FK_iMaNV`, `FK_iMaNCC`, `FK_iMaTrangThai`, `dNgayTao`, `sGhiChu`) VALUES
('HT_16992845119694', 'NV_16972964998014', 1, 5, '2023-11-05 17:00:00', ''),
('HT_16992845585333', 'NV_16976794566924', 2, 5, '2023-11-05 17:00:00', ''),
('HT_16992882908698', 'NV_16976794566924', 2, 6, '2023-11-05 17:00:00', 'hoho'),
('HT_16992893582283', 'NV_16972964998014', 1, 5, '2023-11-05 17:00:00', '');

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
('PN_16977316272656', 'NV_16972964998014', '1', 4, 'A', 100.00, '2023-10-05', 'Không có ghi chú'),
('PN_16977330545720', 'NV_16972964998014', '2', 4, 'C', 200.00, '2023-10-06', '321'),
('PN_16992829478347', 'NV_16972964998014', '1', 4, '', 0.00, '0000-00-00', '');

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
  `fGiaNhap` decimal(10,3) DEFAULT NULL,
  `fGiaBanLe` decimal(10,3) DEFAULT NULL,
  `fGiaBanSi` decimal(10,3) DEFAULT NULL,
  `sHinhAnh` varchar(255) DEFAULT NULL,
  `dHSD` date DEFAULT NULL,
  `dNgayTao` date DEFAULT NULL,
  `sGhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`PK_iMaSP`, `FK_iMaNhom`, `FK_iMaTrangThai`, `sTenSP`, `fSoLuong`, `sDVT`, `fGiaNhap`, `fGiaBanLe`, `fGiaBanSi`, `sHinhAnh`, `dHSD`, `dNgayTao`, `sGhiChu`) VALUES
(1, 'N001', 1, 'Sữa bột 11', 80, 'Hộp', 112.000, 1212.000, 12121.000, '1699369775_a0e9780a56f6a9ef36ce.jpg', '2023-10-03', NULL, 'Không có ghi chú nào'),
(2, 'N002', 2, 'Sữa tươi', 80, '', 0.000, 0.000, 0.000, '', '0000-00-00', NULL, ''),
(41, 'N002', NULL, 'sản phẩm 1', 80, 'Bịch', 0.000, 100.000, 200.000, '1699265070_26a66f74535f5930279c.jpg', NULL, NULL, 'Ghi chú');

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
(9, '1', 'KM_16984198645965'),
(10, '2', 'KM_16984198645965');

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
('TK_16972964998014', 1, 1, '432432hiih', '43243'),
('TK_16976794566924', 2, 1, '5', '$2y$10$6lSUMUVXVrGMGNuMhvMRauV.Vh5ckOKzK3oABv61J/Mf49RKx6nYa');

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
  MODIFY `PK_iMaCT_HD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieuhoantra`
--
ALTER TABLE `tbl_ctphieuhoantra`
  MODIFY `PK_iMaCT_HT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_ctphieunhap`
--
ALTER TABLE `tbl_ctphieunhap`
  MODIFY `PK_iMaCT_PN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `PK_iDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `PK_iMaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `PK_iMaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_sp_km`
--
ALTER TABLE `tbl_sp_km`
  MODIFY `PK_iMaSPKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  MODIFY `PK_iMaTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
