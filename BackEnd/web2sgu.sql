SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- USER DATABASE
CREATE TABLE `NguoiDung` (
  `MaND` int(11) NOT NULL,
  `Ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  PRIMARY KEY (MaND)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `NguoiDung` (`MaND`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `MaQuyen`, `TrangThai`) VALUES
(1, 'Nguyen The', 'Kiet', '', '0123456789', 'trungky@gmail.com', 'Dak Lag', 'namky', 'backy', 1, 1);


CREATE TABLE `NhanVien` ( 
  `MaNV` int(11) NOT NULL,
  `Ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  primary key (MaNV)
);

INSERT INTO `NhanVien` (`MaNV`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `MaQuyen`) VALUES
(1, 'Nguyen The', 'Kiet', 'Nam', '0123456789', 'trungki@gmail.com', 'Dak Lak', 'namky', 'backy', 1);


CREATE TABLE `HoaDon` (
  `MaHD` int(11) NOT NULL,
  `MaND` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` decimal(10,2) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  primary key (MaHD)
);

INSERT INTO `HoaDon` (`MaHD`, `MaND`, `NgayLap`, `TongTien`, `TrangThai`) VALUES
(1, 1, '2020-12-12', '100000', 1);


CREATE TABLE `ChiTietHoaDon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaTien` decimal(10,2) NOT NULL,
  primary key (MaHD, MaSP)
);

INSERT INTO `ChiTietHoaDon` (`MaHD`, `MaSP`, `SoLuong`, `GiaTien`) VALUES
(1, 1, 1, '100000');


CREATE TABLE `DanhGia` (
  `MaSP` int(11) NOT NULL,
  `MaND` int(11) NOT NULL,
  `SoSao` int(11) NOT NULL,
  `BinhLuan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDG` date NOT NULL,
  primary key (MaSP, MaND)
);

INSERT INTO `DanhGia` (`MaSP`, `MaND`, `SoSao`, `BinhLuan`, `NgayDG`) VALUES
(1, 1, 5, 'Rất ngon', '2020-12-12');


CREATE TABLE `PhanQuyen` (
  `MaQuyen` int(11) NOT NULL,
  `ChiTietQuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  primary key (MaQuyen)
);

INSERT INTO `PhanQuyen` (`MaQuyen`, `ChiTietQuyen`) VALUES
(1, 'Admin'),
(2, 'Nhân viên'),
(3, 'Khách hàng');




-- SIDEDISH DATABASE

CREATE TABLE `MonTrangMieng` (
  `MaMTM` int(11) NOT NULL,
  `TenMTM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTien` decimal(10,2) NOT NULL,
  primary key (MaMTM)
);

INSERT INTO `MonTrangMieng` (`MaMTM`, `TenMTM`, `GiaTien`) VALUES
(1, 'Bánh flan', '10000');


CREATE TABLE `NuocGiaiKhat` (
  `MaNuoc` int(11) NOT NULL,
  `TenNuoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTien` decimal(10,2) NOT NULL,
  primary key (MaNuoc)
);

INSERT INTO `NuocGiaiKhat` (`MaNuoc`, `TenNuoc`, `GiaTien`) VALUES
(1, 'Coca', '10000');





-- COUPON AND MEMBERSHIP DATABASE

CREATE TABLE `KhuyenMai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoTienGiam` decimal(10,2) NOT NULL,
  `DieuKien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  primary key (MaKM)
);

INSERT INTO `KhuyenMai` (`MaKM`, `TenKM`, `SoTienGiam`, `DieuKien`) VALUES
(1, 'Giảm 10%', '10000', 'Kien Dep Trai');


CREATE TABLE `Membership` (
  `MaND` int(11) NOT NULL,
  `SoDiemTichLuy` decimal(10,2) NOT NULL,
  primary key (MaND)
);

INSERT INTO `Membership` (`MaND`, `SoDiemTichLuy`) VALUES
(1, 1000);







-- PIZZA DATABASE

CREATE TABLE `Pizza` (
  `IDPizza` varchar(100) NOT NULL,
  `NamePizza` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Img` varchar(200),
  `Type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (IDPizza)

);
INSERT INTO `Pizza` (`IDPizza`,`NamePizza`, `Desc`, `Img`, `Type`) VALUES
('PBBQ', 'PIZZA GÀ BBQ', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'GÀ'),
('PBD', 'PIZZA BÒ XỐT DEMI', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'BÒ'),
('PCH', 'PIZZA HẢI SẢN PESTO', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'HẢI SẢN'),
('PPR', 'PIZZA DOUBLE PEPPERONI', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'HEO'),
('PHS', 'PIZZA HẢI SẢN DODO', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'HẢI SẢN'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'GÀ'),
('PTC', 'PIZZA TÔM CAY', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'HẢI SẢN'),
('PCHP', 'PIZZA CÁ HỒI PESTO', 'Xốt kem, mozzarella, Xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'HẢI SẢN'),
('PCB', 'PIZZA CHEESEBURGER', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cbg.webp', 'BÒ');


CREATE TABLE `SizePizza`(
  `IDSize` varchar(100) NOT NULL,
  `NameSize` varchar(100) NOT NULL,
  primary key (IDSize)
);

INSERT INTO `SizePizza` (`IDSize`, `NameSize`) VALUES
('S', 'Nhỏ'),
('M', 'Vừa'),
('L', 'Lớn');

CREATE TABLE `CrustPizza`(
  `IDCrust` varchar(100) NOT NULL,
  `NameCrust` varchar(100) NOT NULL,
  primary key (IDCrust)
);

INSERT INTO `CrustPizza` (`IDCrust`, `NameCrust`) VALUES
('M', 'Mỏng'),
('D', 'Dày'),
('V', 'Vừa');


CREATE TABLE `PizzaType`(
  `IDPizza` varchar(100) NOT NULL,
  `IDType` int(11) NOT NULL,
  `NameType` varchar(100) not null,
  primary key (IDPizza)
);

INSERT INTO `PizzaType` (`IDPizza`, `IDType`, `NameType`) VALUES
('PBBQ', '01', 'GÀ'),
('PBD', '02', 'BÒ'),
('PCH', '03', 'HẢI SẢN'),
('PPR', '04', 'HEO'),
('PHS', '03', 'HẢI SẢN'),
('PGM', '01', 'GÀ'),
('PTC', '03', 'HẢI SẢN'),
('PCHP', '03', 'HẢI SẢN'),
('PCB', '02', 'BÒ');



CREATE TABLE `PizzaDetail`(
  `IDPizza` varchar(100) NOT NULL,
  `IDSize` varchar(100) NOT NULL,
  `IDCrust` varchar(100) NOT NULL,
  `Price` DECIMAL(10, 2) NOT NULL,
  primary key (IDPizza, IDSize, IDCrust)
);

INSERT INTO `PizzaDetail` (`IDPizza`, `IDSize`, `IDCrust`, `Price`) VALUES
('PBBQ', 'S', 'M', '119000'),
('PBBQ', 'M', 'M', '129000'),
('PBBQ', 'L', 'M', '139000'),
('PBBQ', 'S', 'D', '119000'),
('PBBQ', 'M', 'D', '129000'),
('PBBQ', 'L', 'D', '139000'),
('PBBQ', 'S', 'V', '119000'),
('PBBQ', 'M', 'V', '129000'),
('PBBQ', 'L', 'V', '139000'),
('PBD', 'S', 'M', '119000'),
('PBD', 'M', 'M', '129000'),
('PBD', 'L', 'M', '139000'),
('PBD', 'S', 'D', '119000'),
('PBD', 'M', 'D', '129000'),
('PBD', 'L', 'D', '139000'),
('PBD', 'S', 'V', '119000'),
('PBD', 'M', 'V', '129000'),
('PBD', 'L', 'V', '139000'),
('PCH', 'S', 'M', '119000'),
('PCH', 'M', 'M', '129000'),
('PCH', 'L', 'M', '139000'),
('PCH', 'S', 'D', '119000'),
('PCH', 'M', 'D', '129000'),
('PCH', 'L', 'D', '139000'),
('PCH', 'S', 'V', '119000'),
('PCH', 'M', 'V', '129000'),
('PCH', 'L', 'V', '139000'),
('PPR', 'S', 'M', '119000'),
('PPR', 'M', 'M', '129000'),
('PPR', 'L', 'M', '139000'),
('PPR', 'S', 'D', '119000'),
('PPR', 'M', 'D', '129000'),
('PPR', 'L', 'D', '139000'),
('PPR', 'S', 'V', '119000'),
('PPR', 'M', 'V', '129000'),
('PPR', 'L', 'V', '139000'),
('PHS', 'S', 'M', '119000'),
('PHS', 'M', 'M', '129000'),
('PHS', 'L', 'M', '139000'),
('PHS', 'S', 'D', '119000'),
('PHS', 'M', 'D', '129000'),
('PHS', 'L', 'D', '139000'),
('PHS', 'S', 'V', '119000'),
('PHS', 'M', 'V', '129000'),
('PHS', 'L', 'V', '139000'),
('PGM', 'S', 'M', '119000'),
('PGM', 'M', 'M', '129000'),
('PGM', 'L', 'M', '139000'),
('PGM', 'S', 'D', '119000'),
('PGM', 'M', 'D', '129000'),
('PGM', 'L', 'D', '139000'),
('PGM', 'S', 'V', '119000'),
('PGM', 'M', 'V', '129000'),
('PGM', 'L', 'V', '139000'),
('PTC', 'S', 'M', '119000'),
('PTC', 'M', 'M', '129000'),
('PTC', 'L', 'M', '139000'),
('PTC', 'S', 'D', '119000'),
('PTC', 'M', 'D', '129000'),
('PTC', 'L', 'D', '139000'),
('PTC', 'S', 'V', '119000'),
('PTC', 'M', 'V', '129000'),
('PTC', 'L', 'V', '139000'),
('PCHP', 'S', 'M', '119000'),
('PCHP', 'M', 'M', '129000'),
('PCHP', 'L', 'M', '139000'),
('PCHP', 'S', 'D', '119000'),
('PCHP', 'M', 'D', '129000'),
('PCHP', 'L', 'D', '139000'),
('PCHP', 'S', 'V', '119000'),
('PCHP', 'M', 'V', '129000'),
('PCHP', 'L', 'V', '139000'),
('PCB', 'S', 'M', '119000'),
('PCB', 'M', 'M', '129000'),
('PCB', 'L', 'M', '139000'),
('PCB', 'S', 'D', '119000'),
('PCB', 'M', 'D', '129000'),
('PCB', 'L', 'D', '139000'),
('PCB', 'S', 'V', '119000'),
('PCB', 'M', 'V', '129000'),
('PCB', 'L', 'V', '139000');


COMMIT;