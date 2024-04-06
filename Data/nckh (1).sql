-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `detainc`
--

CREATE TABLE `detainc` (
  `iddetai` int(11) NOT NULL,
  `tendetai` varchar(100) NOT NULL,
  `loaidetai` int(11) NOT NULL,
  `giangvienhd` int(11) NOT NULL,
  `thoigianth` date NOT NULL,
  `trangthai` int(11) NOT NULL,
  `diem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detainc`
--

INSERT INTO `detainc` (`iddetai`, `tendetai`, `loaidetai`, `giangvienhd`, `thoigianth`, `trangthai`, `diem`) VALUES
(1, 'Quản lý đồ án, đề tài nghiên cứu khoa học của sinh viên khoa công nghệ thông tin', 1, 4, '2024-03-07', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doan`
--

CREATE TABLE `doan` (
  `iddoan` int(11) NOT NULL,
  `tendoan` varchar(100) NOT NULL,
  `nganh` int(11) NOT NULL,
  `loaidoan` int(11) NOT NULL,
  `giangvienhd` int(11) NOT NULL,
  `thoigianth` date NOT NULL,
  `trangthai` int(11) NOT NULL,
  `diemdoan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doan`
--

INSERT INTO `doan` (`iddoan`, `tendoan`, `nganh`, `loaidoan`, `giangvienhd`, `thoigianth`, `trangthai`, `diemdoan`) VALUES
(1, 'Xây dựng website bán điện thoại', 3, 1, 4, '2024-03-07', 3, 0),
(2, 'Website bán cần câu', 1, 2, 3, '2024-03-01', 3, 0),
(5, '103', 1, 1, 3, '2024-04-01', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `idgv` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `hogv` varchar(100) NOT NULL,
  `tengv` varchar(50) NOT NULL,
  `khoa` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `bomon` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`idgv`, `magv`, `hogv`, `tengv`, `khoa`, `email`, `sdt`, `bomon`, `userid`) VALUES
(3, 101, 'Trần An ', 'Nhiên', 1, 'tan@eud.vn', 382219589, 1, 5),
(4, 102, 'Nguyễn Văn ', 'Conng', 1, 'nvc@edu.vn', 382219587, 3, 6),
(5, 103, 'Nguyễn Quốc', ' An', 1, 'quocninhrix@gmail.com', 938219589, 1, 2),
(6, 104, 'Nguyễn Quốc', 'An', 1, 'quocninhrix@gmail.com', 938219589, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `idkhoa` int(11) NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`idkhoa`, `tenkhoa`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Quản lý công nghiệp'),
(3, 'Điện - Điện tử - viễn thông');

-- --------------------------------------------------------

--
-- Table structure for table `loaidetai`
--

CREATE TABLE `loaidetai` (
  `idloaidetai` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaidetai`
--

INSERT INTO `loaidetai` (`idloaidetai`, `ten`) VALUES
(1, 'Nghiên cứu cấp trường'),
(2, 'Nghiên cứu cấp thành phố');

-- --------------------------------------------------------

--
-- Table structure for table `loaidoan`
--

CREATE TABLE `loaidoan` (
  `idloaidoan` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaidoan`
--

INSERT INTO `loaidoan` (`idloaidoan`, `tenloai`) VALUES
(1, 'Đồ Án 1'),
(2, 'Đồ Án 2'),
(3, 'Đồ Án 3'),
(4, 'Đồ Án 4');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `idnganh` int(11) NOT NULL,
  `tennganh` varchar(50) NOT NULL,
  `khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`idnganh`, `tennganh`, `khoa`) VALUES
(1, 'Công nghệ thông tin', 1),
(2, 'Hệ thống thông tin', 1),
(3, 'Kỹ thuật phần mềm', 1),
(4, 'Khoa học dữ liệu', 1),
(5, 'Khoa học máy tính', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `ten`) VALUES
(1, 'Admin'),
(2, 'Sinh Viên'),
(3, 'Giảng Viên');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `idsv` int(11) NOT NULL,
  `mssv` int(11) NOT NULL,
  `hosv` varchar(50) NOT NULL,
  `tensv` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(10) NOT NULL,
  `nganh` int(11) NOT NULL,
  `lop` varchar(15) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`idsv`, `mssv`, `hosv`, `tensv`, `email`, `sdt`, `nganh`, `lop`, `userid`) VALUES
(3, 2000332, 'Nguyễn Văn ', 'Tuấn', 'nvt@sutden.edu', 382219589, 3, 'KTPM0220', 2),
(4, 2000331, 'Lê Văn ', 'Hữu', 'lvh@std.edu.vn', 382219587, 4, 'KHDL0120', 3),
(5, 2000883, 'Nguyễn Thị ', 'Nhàn', 'nta@std.edu.vn', 358742587, 2, 'HTTT0121', 4),
(7, 2000778, 'Trầm Quốc', 'Ninh', 'quocninhrix@gmail.com', 932819589, 1, 'KTPM0220', 2),
(8, 2000152, 'Trầm Quốc', 'Ninh', 'quocninhrix@gmail.com', 938219589, 1, 'KTPM0220', 2),
(9, 2000336, 'Trầm Quốc', 'Ninh', 'quocninhrix@gmail.com', 938219589, 3, 'KTPM0220', 2);

-- --------------------------------------------------------

--
-- Table structure for table `thamgiadetai`
--

CREATE TABLE `thamgiadetai` (
  `id` int(11) NOT NULL,
  `iddetai` int(11) NOT NULL,
  `idsinhvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thamgiadetai`
--

INSERT INTO `thamgiadetai` (`id`, `iddetai`, `idsinhvien`) VALUES
(1, 1, 4),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `thamgiadoan`
--

CREATE TABLE `thamgiadoan` (
  `id` int(11) NOT NULL,
  `iddoan` int(11) NOT NULL,
  `idsinhvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thamgiadoan`
--

INSERT INTO `thamgiadoan` (`id`, `iddoan`, `idsinhvien`) VALUES
(1, 1, 5),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `idtrangthai` int(11) NOT NULL,
  `tentrangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`idtrangthai`, `tentrangthai`) VALUES
(1, 'Đang thực hiện'),
(2, 'Chờ đăng ký'),
(3, 'Chờ phê duyệt'),
(4, 'Chưa đạt'),
(5, 'Đã hoàn thành'),
(6, 'Trễ Hạn'),
(7, 'Đến hạn');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`) VALUES
(1, 'admin', '1', 1),
(2, 'sinhvien1', '11', 2),
(3, 'sinhvien2', '11', 2),
(4, 'sinhvien3', '11', 2),
(5, 'giangvien1', '11', 3),
(6, 'giangvien2', '11', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detainc`
--
ALTER TABLE `detainc`
  ADD PRIMARY KEY (`iddetai`),
  ADD KEY `detai_fk_gv` (`giangvienhd`),
  ADD KEY `detai_fk_loaidetai` (`loaidetai`),
  ADD KEY `detai_fk0_trangthai` (`trangthai`);

--
-- Indexes for table `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`iddoan`),
  ADD KEY `doan_fk_gc` (`giangvienhd`),
  ADD KEY `doan_fk_nganh` (`nganh`),
  ADD KEY `doan_fk_loai` (`loaidoan`),
  ADD KEY `doan_trangthai` (`trangthai`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`idgv`),
  ADD KEY `gv_fk_khoa` (`khoa`),
  ADD KEY `giangvien_usrfk_2` (`userid`),
  ADD KEY `gv_fk_bomon` (`bomon`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`idkhoa`);

--
-- Indexes for table `loaidetai`
--
ALTER TABLE `loaidetai`
  ADD PRIMARY KEY (`idloaidetai`);

--
-- Indexes for table `loaidoan`
--
ALTER TABLE `loaidoan`
  ADD PRIMARY KEY (`idloaidoan`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`idnganh`),
  ADD KEY `nganh_fk_khoa` (`khoa`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idsv`),
  ADD KEY `sv_fk_nganh` (`nganh`),
  ADD KEY `sv_fk_usser` (`userid`);

--
-- Indexes for table `thamgiadetai`
--
ALTER TABLE `thamgiadetai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thamgia_fk_detai` (`iddetai`),
  ADD KEY `thamgia_sinhvien` (`idsinhvien`);

--
-- Indexes for table `thamgiadoan`
--
ALTER TABLE `thamgiadoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thamgia_fk_doan` (`iddoan`),
  ADD KEY `thamgia_fk_sinhvien` (`idsinhvien`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`idtrangthai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `user_fk_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detainc`
--
ALTER TABLE `detainc`
  MODIFY `iddetai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doan`
--
ALTER TABLE `doan`
  MODIFY `iddoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `idgv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `idkhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaidetai`
--
ALTER TABLE `loaidetai`
  MODIFY `idloaidetai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaidoan`
--
ALTER TABLE `loaidoan`
  MODIFY `idloaidoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nganh`
--
ALTER TABLE `nganh`
  MODIFY `idnganh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `idsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thamgiadetai`
--
ALTER TABLE `thamgiadetai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thamgiadoan`
--
ALTER TABLE `thamgiadoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `idtrangthai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detainc`
--
ALTER TABLE `detainc`
  ADD CONSTRAINT `detai_fk0_trangthai` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`idtrangthai`),
  ADD CONSTRAINT `detai_fk_gv` FOREIGN KEY (`giangvienhd`) REFERENCES `giangvien` (`idgv`),
  ADD CONSTRAINT `detai_fk_loaidetai` FOREIGN KEY (`loaidetai`) REFERENCES `loaidetai` (`idloaidetai`);

--
-- Constraints for table `doan`
--
ALTER TABLE `doan`
  ADD CONSTRAINT `doan_fk_gc` FOREIGN KEY (`giangvienhd`) REFERENCES `giangvien` (`idgv`),
  ADD CONSTRAINT `doan_fk_loai` FOREIGN KEY (`loaidoan`) REFERENCES `loaidoan` (`idloaidoan`),
  ADD CONSTRAINT `doan_fk_nganh` FOREIGN KEY (`nganh`) REFERENCES `nganh` (`idnganh`),
  ADD CONSTRAINT `doan_trangthai` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`idtrangthai`);

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_usrfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `gv_fk_bomon` FOREIGN KEY (`bomon`) REFERENCES `nganh` (`idnganh`),
  ADD CONSTRAINT `gv_fk_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`idkhoa`);

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_fk_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`idkhoa`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sv_fk_nganh` FOREIGN KEY (`nganh`) REFERENCES `nganh` (`idnganh`),
  ADD CONSTRAINT `sv_fk_usser` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `thamgiadetai`
--
ALTER TABLE `thamgiadetai`
  ADD CONSTRAINT `thamgia_fk_detai` FOREIGN KEY (`iddetai`) REFERENCES `detainc` (`iddetai`),
  ADD CONSTRAINT `thamgia_sinhvien` FOREIGN KEY (`idsinhvien`) REFERENCES `sinhvien` (`idsv`);

--
-- Constraints for table `thamgiadoan`
--
ALTER TABLE `thamgiadoan`
  ADD CONSTRAINT `thamgia_fk_doan` FOREIGN KEY (`iddoan`) REFERENCES `doan` (`iddoan`),
  ADD CONSTRAINT `thamgia_fk_sinhvien` FOREIGN KEY (`idsinhvien`) REFERENCES `sinhvien` (`idsv`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_fk_role` FOREIGN KEY (`role`) REFERENCES `role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
