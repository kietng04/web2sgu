SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE `web2sgu`;

CREATE TABLE `PhanQuyen` (
  `MaQuyen` int(11) NOT NULL AUTO_INCREMENT,
  `TenNhomQuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  primary key (MaQuyen)
);




CREATE TABLE `TrangThai` (
  `MaTT` int(11) NOT NULL,
  `ChiTietTT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  primary key (MaTT)
);
INSERT INTO `TrangThai` (`MaTT`, `ChiTietTT`) VALUES
(1, 'Đã xác minh'),
(2, 'Chưa xác minh'),
(3, 'Bị hạn chế'),
(4, 'Bị khoá');

CREATE TABLE `TaiKhoanNguoiDung` (
  `MaND` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(11) NOT NULL,
  primary key (MaND)
);

INSERT INTO `TaiKhoanNguoiDung` (`MaND`, `TaiKhoan`, `MatKhau`, `TrangThai`) VALUES
('ND01', 'abc', '123', 1),
('ND02', 'def', '456', 1),
('ND03', 'ghi', '789', 1);

CREATE TABLE `TaiKhoanNhanVien` (
  `MaNV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(11) NOT NULL,
  primary key (MaNV)
);

INSERT INTO `TaiKhoanNhanVien` (`MaNV`, `TaiKhoan`, `MatKhau`, `TrangThai`) VALUES
('NV01', 'aaa', '123', 1),
('NV02', 'bbb', '456', 1),
('NV03', 'ccc', '789', 1);


-- USER DATABASE
CREATE TABLE `NguoiDung` (
  `MaND` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (MaND)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `NguoiDung` (`MaND`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`) VALUES
('ND01', 'Nguyen The', 'Kiet', 'Nam', '0123456789', 'abc@gmail.com', 'Dak Lag'),
('ND02', 'Nguyen The', 'Kien', 'Nam', '0123456789', 'bbn@gmail.com', 'Dak Lag'),
('ND03', 'Nguyen The', 'Khai', 'Nam', '0123456789', 'asd@gmail.com', 'Dak Lag');


CREATE TABLE `NhanVien` ( 
  `MaNV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `PhanQuyen` int(11) NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaNV)
);

INSERT INTO `NhanVien` (`MaNV`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `PhanQuyen`) VALUES
('NV01', 'Nguyen The', 'Hanh', 'Nam', '0123456789', 'trung@gmail.com', 'Dak Lak', 1),
('NV02', 'Nguyen The', 'Hung', 'Nam', '0123456789', 'abc@gmail.com', 'Dak Lak', 2),
('NV03', 'Nguyen The', 'Huy', 'Nam', '0123456789', 'skd@gmail.com', 'Dak Lak', 3);


CREATE TABLE `HoaDon` (
  `MaHD` int(11) NOT NULL AUTO_INCREMENT,
  `MaND` varchar(255) NOT NULL,
  `MaNV` varchar(255) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` decimal(10,2) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  primary key (MaHD)
);

INSERT INTO `HoaDon` (`MaHD`, `MaND`, `MaNv`, `NgayLap`, `TongTien`, `TrangThai`) VALUES
(1, 1, 2, '2020-12-12', '100000', 1);

CREATE TABLE `ChiTietHoaDon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` varchar(100) NOT NULL,
  `MaSize` varchar(100) NOT NULL,
  `MaVien` varchar(100) NOT NULL,
  `Img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaTien` decimal(10,2) NOT NULL,
  primary key (MaHD, MaSP, MaSize, MaVien)
);

INSERT INTO `ChiTietHoaDon` (`MaHD`, `MaSP`, `MaSize`, `MaVien`, `Img`, `SoLuong`, `GiaTien`) VALUES
(1, 1, 1, 1, '100000', 1, '100000');





-- PIZZA DATABASE

CREATE TABLE `SanPham` (
  `MaSP` varchar(100) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `Mota` varchar(100) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Loai` varchar(100) NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaSP)
);

INSERT INTO `SanPham` (`MaSP`, `TenSP`, `Mota`, `Img`, `Loai`) VALUES
('PBBQ', 'PIZZA GÀ BBQ', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'GÀ'),
('PBD', 'PIZZA BÒ XỐT DEMI', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'BÒ'),
('PCH', 'PIZZA HẢI SẢN PESTO', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'HẢI SẢN'),
('PPR', 'PIZZA DOUBLE PEPPERONI', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'HEO'),
('PHS', 'PIZZA HẢI SẢN DODO', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'HẢI SẢN'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'GÀ'),
('PTC', 'PIZZA TÔM CAY', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'HẢI SẢN'),
('PCHP', 'PIZZA CÁ HỒI PESTO', 'Xốt kem, mozzarella, Xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'HẢI SẢN'),
('PCB', 'PIZZA CHEESEBURGER', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', './images/pizzaimg/cbg.webp', 'BÒ');


CREATE TABLE `SizeSanPham`(
  `MaSize` varchar(100) NOT NULL,
  `TenSize` varchar(100) NOT NULL,
  `DinhLuongSize` varchar(100) NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaSize)
);

INSERT INTO `SizeSanPham` (`MaSize`, `TenSize`, `DinhLuongSize`, `TrangThai`) VALUES
('S', 'Nhỏ', 'Bán kính 15cm',1),
('M', 'Vừa', 'Bán kính 20cm',1),
('L', 'Lớn', 'Bán kính 25cm',1);

CREATE TABLE `VienSanPham`(
  `MaVien` varchar(100) NOT NULL,
  `TenVien` varchar(100) NOT NULL,
  `DinhLuongVien` nvarchar(100) NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaVien)
);

INSERT INTO `VienSanPham` (`MaVien`, `TenVien`, `DinhLuongVien`, `TrangThai`) VALUES
('M', 'Mỏng', 'Độ dày 0.3cm',1),
('V', 'Vừa', 'Độ dày 0.4cm',1),
('D', 'Dày', 'Độ dày 0.5cm',1);


CREATE TABLE `LoaiSanPham`(
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) not null,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaLoai)
);

INSERT INTO `LoaiSanPham` (`MaLoai`, `TenLoai`) VALUES
(1, 'GÀ'),
(2, 'BÒ'),
(3, 'HẢI SẢN'),
(4, 'HEO');



CREATE TABLE `ChiTietSanPham`(
  `MaSP` varchar(100) NOT NULL,
  `MaSize` varchar(100) NOT NULL,
  `MaVien` varchar(100) NOT NULL,
  `GiaNhap` DECIMAL(10, 2) NOT NULL,
  `GiaTien` DECIMAL(10, 2) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaSP, MaSize, MaVien)
);

INSERT INTO `ChiTietSanPham` (`MaSP`, `MaSize`, `MaVien`, `GiaNhap` ,`GiaTien`) VALUES
('PBBQ', 'S', 'M', '89000', '119000'),
('PBBQ', 'M', 'M', '89000', '119000'),
('PBBQ', 'L', 'M', '89000', '119000'),
('PBBQ', 'S', 'D', '89000', '119000'),
('PBBQ', 'M', 'D', '89000', '119000'),
('PBBQ', 'L', 'D', '89000', '139000'),
('PBBQ', 'S', 'V', '89000', '119000'),
('PBBQ', 'M', 'V', '89000', '129000'),
('PBBQ', 'L', 'V', '89000', '139000'),
('PBD', 'S', 'M','89000', '119000'),
('PBD', 'M', 'M', '89000', '129000'),
('PBD', 'L', 'M', '89000', '139000'),
('PBD', 'S', 'D','89000', '119000'),
('PBD', 'M', 'D', '89000', '129000'),
('PBD', 'L', 'D', '89000', '139000'),
('PBD', 'S', 'V','89000', '119000'),
('PBD', 'M', 'V', '89000', '129000'),
('PBD', 'L', 'V', '89000', '139000'),
('PCH', 'S', 'M','89000', '119000'),
('PCH', 'M', 'M', '89000', '129000'),
('PCH', 'L', 'M', '89000', '139000'),
('PCH', 'S', 'D','89000', '119000'),
('PCH', 'M', 'D', '89000', '129000'),
('PCH', 'L', 'D', '89000', '139000'),
('PCH', 'S', 'V','89000', '119000'),
('PCH', 'M', 'V', '89000', '129000'),
('PCH', 'L', 'V', '89000', '139000'),
('PPR', 'S', 'M','89000', '119000'),
('PPR', 'M', 'M', '89000', '129000'),
('PPR', 'L', 'M', '89000', '139000'),
('PPR', 'S', 'D','89000', '119000'),
('PPR', 'M', 'D', '89000', '129000'),
('PPR', 'L', 'D', '89000', '139000'),
('PPR', 'S', 'V','89000', '119000'),
('PPR', 'M', 'V', '89000', '129000'),
('PPR', 'L', 'V', '89000', '139000'),
('PHS', 'S', 'M','89000', '119000'),
('PHS', 'M', 'M', '89000', '129000'),
('PHS', 'L', 'M', '89000', '139000'),
('PHS', 'S', 'D','89000', '119000'),
('PHS', 'M', 'D', '89000', '129000'),
('PHS', 'L', 'D', '89000', '139000'),
('PHS', 'S', 'V','89000', '119000'),
('PHS', 'M', 'V', '89000', '129000'),
('PHS', 'L', 'V', '89000', '139000'),
('PGM', 'S', 'M','89000', '119000'),
('PGM', 'M', 'M', '89000', '129000'),
('PGM', 'L', 'M', '89000', '139000'),
('PGM', 'S', 'D','89000', '119000'),
('PGM', 'M', 'D', '89000', '129000'),
('PGM', 'L', 'D', '89000', '139000'),
('PGM', 'S', 'V','89000', '119000'),
('PGM', 'M', 'V', '89000', '129000'),
('PGM', 'L', 'V', '89000', '139000'),
('PTC', 'S', 'M','89000', '119000'),
('PTC', 'M', 'M', '89000', '129000'),
('PTC', 'L', 'M', '89000', '139000'),
('PTC', 'S', 'D','89000', '119000'),
('PTC', 'M', 'D', '89000', '129000'),
('PTC', 'L', 'D', '89000', '139000'),
('PTC', 'S', 'V','89000', '119000'),
('PTC', 'M', 'V', '89000', '129000'),
('PTC', 'L', 'V', '89000', '139000'),
('PCHP', 'S', 'M','89000', '119000'),
('PCHP', 'M', 'M', '89000', '129000'),
('PCHP', 'L', 'M', '89000', '139000'),
('PCHP', 'S', 'D','89000', '119000'),
('PCHP', 'M', 'D', '89000', '129000'),
('PCHP', 'L', 'D', '89000', '139000'),
('PCHP', 'S', 'V','89000', '119000'),
('PCHP', 'M', 'V', '89000', '129000'),
('PCHP', 'L', 'V', '89000', '139000'),
('PCB', 'S', 'M','89000', '119000'),
('PCB', 'M', 'M', '89000', '129000'),
('PCB', 'L', 'M', '89000', '139000'),
('PCB', 'S', 'D','89000', '119000'),
('PCB', 'M', 'D', '89000', '129000'),
('PCB', 'L', 'D', '89000', '139000'),
('PCB', 'S', 'V','89000', '119000'),
('PCB', 'M', 'V', '89000', '129000'),
('PCB', 'L', 'V', '89000', '139000');


CREATE TABLE `NhapSanPham` (
  `MaPN` int(11) NOT NULL,
  `MaNV` varchar(255) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `DonGia` decimal(10,2) NOT NULL,
  `trangthai` int(11) DEFAULT 1,
  primary key (MaPN)
);


CREATE TABLE `ChiTietNhap` (
  `MaPN` int(11) NOT NULL,
  `MaSP` varchar(100) NOT NULL,
  `MaSize` varchar(100) NOT NULL,
  `MaVien` varchar(100) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaNhap` decimal(10,2) NOT NULL,
  `GiaXuat` decimal(10,2) NOT NULL,
  primary key (MaPN, MaSP, MaSize, MaVien)
);

INSERT INTO `ChiTietNhap` (`MaPN`, `MaSP`, `MaSize`, `MaVien`, `SoLuong`) VALUES
(1, 'PBBQ', 'S', 'M', 10),
(1, 'PBBQ', 'M', 'M', 10),
(1, 'PBBQ', 'L', 'M', 10),
(1, 'PBBQ', 'S', 'D', 10),
(1, 'PBBQ', 'M', 'D', 10),
(1, 'PBBQ', 'L', 'D', 10),
(1, 'PBBQ', 'S', 'V', 10),
(1, 'PBBQ', 'M', 'V', 10),
(1, 'PBBQ', 'L', 'V', 10),
(1, 'PBD', 'S', 'M', 10),
(1, 'PBD', 'M', 'M', 10),
(1, 'PBD', 'L', 'M', 10),
(1, 'PBD', 'S', 'D', 10),
(1, 'PBD', 'M', 'D', 10);

CREATE TABLE `XuatSanPham` (
  `MaPX` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `NgayXuat` date NOT NULL,
  primary key (MaPX)
);

INSERT INTO `XuatSanPham` (`MaPX`, `MaNV`, `NgayXuat`) VALUES
(1, 1, '2020-12-12');

CREATE TABLE `ChiTietXuat` (
  `MaPX` int(11) NOT NULL,
  `MaSP` varchar(100) NOT NULL,
  `MaSize` varchar(100) NOT NULL,
  `MaVien` varchar(100) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  primary key (MaPX, MaSP, MaSize, MaVien)
);

INSERT INTO `ChiTietXuat` (`MaPX`, `MaSP`, `MaSize`, `MaVien`, `SoLuong`) VALUES
(1, 'PBBQ', 'S', 'M', 10),
(1, 'PBBQ', 'M', 'M', 10),
(1, 'PBBQ', 'L', 'M', 10),
(1, 'PBBQ', 'S', 'D', 10),
(1, 'PBBQ', 'M', 'D', 10),
(1, 'PBBQ', 'L', 'D', 10),
(1, 'PBBQ', 'S', 'V', 10),
(1, 'PBBQ', 'M', 'V', 10),
(1, 'PBBQ', 'L', 'V', 10),
(1, 'PBD', 'S', 'M', 10),
(1, 'PBD', 'M', 'M', 10),
(1, 'PBD', 'L', 'M', 10),
(1, 'PBD', 'S', 'D', 10),
(1, 'PBD', 'M', 'D', 10);


CREATE TABLE `danhsachchucnang` (
  `MaCN` varchar(25) NOT NULL,
  `TenCN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(11) DEFAULT 1,
  primary key (MaCN)
);

INSERT INTO `danhsachchucnang` (`MaCN`, `TenCN`) VALUES
('sanpham', 'Sản phẩm'),
('nhaphang', 'Nhập hàng'),
('xuathang', 'Xuất hàng'),
('thongke', 'Thống kê'),
('taikhoan', 'Tài khoản'),
('phanquyen', 'Phân quyền');


CREATE TABLE `chucnangnhomquyen` (
  `MaQuyen` int(11) NOT NULL,
  `MaCN` varchar(25) NOT NULL,
  `hanhdong` varchar(100) COLLATE utf8_unicode_ci NOT NULL, 
  primary key (MaQuyen, MaCN, hanhdong)
);
COMMIT;


ALTER TABLE taikhoannguoidung
ADD COLUMN TrangThaiXoa int(11) DEFAULT 1;

ALTER TABLE taikhoannhanvien
ADD COLUMN TrangThaiXoa int(11) DEFAULT 1;