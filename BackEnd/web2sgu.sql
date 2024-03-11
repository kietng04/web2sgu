SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `nguoidung` (
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
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `nguoidung` (`MaND`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `MaQuyen`, `TrangThai`) VALUES
(1, 'Nguyen The', 'Kiet', '', '0123456789', 'trungky@gmail.com', 'Dak Lag', 'namky', 'backy', 1, 1);



CREATE TABLE `Crust` (
  `TenCrust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TenCrust`)
);
INSERT INTO `Crust` (`TenCrust`) VALUES
('Vừa'),
('Dày'),
('Mỏng'),
('Viền xúc xích'),
('Viền phô mai'),
('Viền phô mai xúc xích');

CREATE TABLE `PizzaSize` (
  `TenSize` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TenSize`)
);
INSERT INTO `PizzaSize` (`TenSize`) VALUES
('Nhỏ'),
('Vừa'),
('Lớn');

CREATE TABLE `pizza` (
  `MaPizza` varchar(100) NOT NULL,
  `TenPizza` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` DECIMAL(10, 2) NOT NULL,
  `MoTa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200),
  `Crust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PizzaSize` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Loai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (MaPizza, Crust, PizzaSize, Gia),
  FOREIGN KEY (Crust) REFERENCES Crust(TenCrust),
  FOREIGN KEY (PizzaSize) REFERENCES PizzaSize(TenSize)
);
INSERT INTO `pizza` (`MaPizza`, `TenPizza`, `Gia`, `MoTa`, `HinhAnh`, `Crust`, `PizzaSize`, `Loai`) VALUES
('PBBQ', 'PIZZA GÀ BBQ', '119000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Vừa', 'Nhỏ', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '219000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Vừa', 'Vừa', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '289000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Vừa', 'Lớn', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '119000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Dày', 'Nhỏ', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '219000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Dày', 'Vừa', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '289000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Dày', 'Lớn', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '119000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Mỏng', 'Nhỏ', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '219000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Mỏng', 'Vừa', 'GÀ'),
('PBBQ', 'PIZZA GÀ BBQ', '289000', 'Xốt cà chua, gà, mozzarella, hành tây tím, ba rọi xông khói, xốt BBQ.', './images/pizzaimg/bbq.jpg', 'Mỏng', 'Lớn', 'GÀ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '129000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Vừa', 'Nhỏ', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '229000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Vừa', 'Vừa', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '299000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Vừa', 'Lớn', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '129000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Dày', 'Nhỏ', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '229000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Dày', 'Vừa', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '299000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Dày', 'Lớn', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '129000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Mỏng', 'Nhỏ', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '229000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Mỏng', 'Vừa', 'BÒ'),
('PBD', 'PIZZA BÒ XỐT DEMI', '299000', 'Bò bằm, hành tây tím, ớt chuông, cà chua, mozzarella, xốt demi glace.', './images/pizzaimg/bodemi.jpg', 'Mỏng', 'Lớn', 'BÒ'),
('PCH', 'PIZZA HẢI SẢN PESTO', '129000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Nhỏ', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '229000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Vừa', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '299000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Lớn', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '129000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Dày', 'Nhỏ', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '229000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Dày', 'Vừa', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '299000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Dày', 'Lớn', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '129000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Nhỏ', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '229000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Vừa', 'HẢI SẢN'),
('PCH', 'PIZZA HẢI SẢN PESTO', '299000', 'Xốt ranch, mozzarella, hành tây tím, xốt pesto, tôm, mực, thanh cua.', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Lớn', 'HẢI SẢN'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '129000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Vừa', 'Nhỏ', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '229000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Vừa', 'Vừa', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '299000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Vừa', 'Lớn', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '129000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Dày', 'Nhỏ', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '229000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Dày', 'Vừa', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '299000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Dày', 'Lớn', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '129000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Mỏng', 'Nhỏ', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '229000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Mỏng', 'Vừa', 'HEO'),
('PPR', 'PIZZA DOUBLE PEPPERONI', '299000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Mỏng', 'Lớn', 'HEO');
('PPR', 'PIZZA DOUBLE PEPPERONI', '299000', 'Xốt cà chua, mozzarella, xúc xích Ý (pepperoni).', './images/pizzaimg/peppe.jpg', 'Mỏng', 'Lớn', 'HEO'),
('PHS', 'PIZZA HẢI SẢN DODO', '99000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Vừa', 'Nhỏ', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '159000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Vừa', 'Vừa', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '229000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Vừa', 'Lớn', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '99000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Dày', 'Nhỏ', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '189000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Dày', 'Vừa', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '239000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Dày', 'Lớn', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '99000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Mỏng', 'Nhỏ', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '159000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Mỏng', 'Vừa', 'HẢI SẢN'),
('PHS', 'PIZZA HẢI SẢN DODO', '239000', 'Xốt ranch, mozzarella, hành tây tím, tôm, mực, thanh cua, mè, nori', './images/pizzaimg/haisandodo.jpg', 'Mỏng', 'Lớn', 'HẢI SẢN'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '119000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Vừa', 'Nhỏ', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '199000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Vừa', 'Vừa', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '289000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Vừa', 'Lớn', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '119000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Dày', 'Nhỏ', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '199000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Dày', 'Vừa', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '289000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Dày', 'Lớn', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '119000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Mỏng', 'Nhỏ', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '199000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Mỏng', 'Vừa', 'GÀ'),
('PGM', 'PIZZA GÀ PHÔ MAI XANH', '289000', 'Xốt kem, gà bơ tỏi, mozzarella, hành tây tím, cà chua Đà Lạt, phô mai xanh.', './images/pizzaimg/gaphomaixanh.jpg', 'Mỏng', 'Lớn', 'GÀ'),
('PTC', 'PIZZA TÔM CAY', '119000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Vừa', 'Nhỏ', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '189000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Vừa', 'Vừa', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '229000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Vừa', 'Lớn', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '119000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Dày', 'Nhỏ', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '189000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Dày', 'Vừa', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '229000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Dày', 'Lớn', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '119000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Mỏng', 'Nhỏ', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '189000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Mỏng', 'Vừa', 'TÔM'),
('PTC', 'PIZZA TÔM CAY', '289000', 'Xốt kem, mozzarella, tôm, dứa, ớt chuông Đà lạt, xốt sriracha.', './images/pizzaimg/pizzatomcay.jpg', 'Mỏng', 'Lớn', 'TÔM');
('PCHP', 'PIZZA CÁ HỒI PESTO', '129000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Nhỏ', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '229000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Vừa', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '299000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Vừa', 'Lớn', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '129000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Dày', 'Nhỏ', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '229000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Dày', 'Vừa', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '299000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Dày', 'Lớn', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '129000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Nhỏ', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '229000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Vừa', 'CÁ HỒI'),
('PCHP', 'PIZZA CÁ HỒI PESTO', '299000', 'Xốt kem, mozzarella, xốt pesto, cà chua, cá hồi', './images/pizzaimg/cahoi.jpg', 'Mỏng', 'Lớn', 'CÁ HỒI'),
('PCB', 'PIZZA CHEESEBURGER', '129000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Vừa', 'Nhỏ', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '229000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Vừa', 'Vừa', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '299000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Vừa', 'Lớn', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '129000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Dày', 'Nhỏ', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '229000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Dày', 'Vừa', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '299000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Dày', 'Lớn', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '129000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Mỏng', 'Nhỏ', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '229000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Mỏng', 'Vừa', 'BÒ'),
('PCB', 'PIZZA CHEESEBURGER', '299000', 'Xốt phô mai, bò bằm, hành tây tím, cà chua, dưa leo muối, mozzarella emborg', '/images/pizzaimg/cheeseburger.webp', 'Mỏng', 'Lớn', 'BÒ').

COMMIT;