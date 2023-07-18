-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 04:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4login`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_file_awal` varchar(255) NOT NULL,
  `nama_file_akhir` varchar(255) NOT NULL,
  `file_size` float NOT NULL,
  `kunci` varchar(40) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_url` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `username`, `nama_file_awal`, `nama_file_akhir`, `file_size`, `kunci`, `tgl_upload`, `file_url`, `keterangan`, `status`) VALUES
(133, 'admin123', 'sqlll-82.pdf.pdf', 'sqlll-82.pdf.rda', 68.7314, 'DtsqPVV79o4glJTNwZgWRQ==', '2023-06-03 00:02:45', 'fjc1JB/I5pZkTJJ8IMHilw==', 'salkjdkjajkdkjadad', 'E'),
(136, 'adrian123', 'LOGBOOK-KPTA.pdf', 'LOGBOOK-KPTA.rda', 37.8584, '6DkO6yH/SN8HbEaV4nKOPQ==', '2023-06-09 23:43:54', 'lQAw4MCQlc+eeamp9oZIqg==', 'sdkjbhkjsdhkjsdsd', 'E'),
(137, 'adrian123', 'ELERNING-AGAMA-2.docx', 'ELERNING-AGAMA-2.rda', 20.1201, 'DtsqPVV79o4glJTNwZgWRQ==', '2023-06-09 23:47:36', '4Z1NoXjEJVMqBvMjXXQ8Uw==', 'sajh,jhsdkljsdlkjsdfsdfd', 'E'),
(138, 'adrian123', 'StrukturDataD_5190411176_AdrianNugroho.docx', 'StrukturDataD_5190411176_AdrianNugroho.rda', 57.6582, 'DtsqPVV79o4glJTNwZgWRQ==', '2023-06-09 23:48:17', 'p45qW/ZGogolGl0P9m8mNQ==', 'angka ya lur', 'E'),
(139, 'adrian123', '2014-2-1-57201-531410089-bab1-16012015113131.pdf', '2014-2-1-57201-531410089-bab1-16012015113131.rda', 176.925, 'DtsqPVV79o4glJTNwZgWRQ==', '2023-06-09 23:49:28', 'QP4iQjQd4wFSeIbP1VShaA==', 'alkjdaslkjlkjsdalkjsd', 'E'),
(140, 'adrianya11', 'BAB_I_.pdf', 'BAB_I_.rda', 49.5605, 'DtsqPVV79o4glJTNwZgWRQ==', '2023-06-09 23:52:44', '6DZbMMnkOsXSFjCq9qe2vA==', 'sahdjadjajdjahkjsdjha', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `phone`, `password`, `job_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
('admin123', '081227153878', '$2y$10$o7D4I/BLx0lVO25d5TN4m.sH2wGn/6i1Sg1Ghjnog4wEFvRwJ8.rq', 'admin', '2022-02-07 03:04:11', '2022-02-07 03:04:11', NULL),
('adrian123', '081227153879', '$2y$10$E5qsXAW.ks4PXlUCwZtMSOE/7KxpICeJ9aRMSH4dyx53Z0N2jqOk2', 'admin', '2022-02-07 03:10:04', '2022-02-07 03:10:04', NULL),
('adriannrh12', '081227153887', '$2y$10$SpngKgQZqrWOS2rtbUrRaOQNO/4xF/A7krdZwFHqKrLndHxzPM7u.', 'admin', '2023-04-12 02:42:58', '2023-04-12 02:42:58', NULL),
('adrianya11', '081227153877', '$2y$10$q4pagKHLMZw44iaghaH1GOdzP8dEueAGJmJUW38d/BqQmA.kowPHm', 'user', '2023-04-05 16:02:41', '2023-04-05 16:02:41', NULL),
('edsheeran123', '081227153879', '$2y$10$WCNTCtTIypAdUyBfWc8f7ee6QRvTuHFm7dmjtXgw3VQO7f1so1O3O', 'user', '2023-05-15 07:53:39', '2023-05-15 07:53:39', NULL),
('fannypusing1', '081227153879', '$2y$10$IOsqWvaSN.CfMjFmQOiQS.ng9SWenCBPH7xFQEg831Rs1QOCFD.aG', 'user', '2023-04-03 21:40:43', '2023-04-03 21:40:43', NULL),
('suryabuket1', '081227153879', '$2y$10$rdwpjeXYuFod8r6ml5IvuuMqr6wYnE7FnfeyoYwgd/ER5ai6rWxOq', 'user', '2023-05-03 00:51:51', '2023-05-03 00:51:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `file_username_foreign` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
