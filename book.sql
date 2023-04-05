-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 11:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinfo`
--

CREATE TABLE `bookinfo` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Tác giả',
  `category_id` int(10) NOT NULL COMMENT 'Phân loại sách\r\n',
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `promote` int(11) NOT NULL COMMENT 'Giá KM',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng tồn kho',
  `sold` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinfo`
--

INSERT INTO `bookinfo` (`id`, `book_name`, `author`, `category_id`, `description`, `price`, `promote`, `quantity`, `sold`, `rate`) VALUES
(1, 'Lập Kế Hoạch Kinh Doanh Hiểu Quả', 'Brian Finch', 1, '', 111200, 111200, 15, 10, 5),
(2, 'Ma Bùn Lưu Manh Và Những Câu Chuyện Khác', 'Nguyễn Trí', 18, '', 85000, 68000, 35, 55, 4),
(3, 'Bank 4.0 - Giao dịch mọi nơi , không chỉ là ngân hàng', 'Brett king', 3, '', 139000, 111200, 71, 154, 4),
(4, 'Bộ sách 500 câu chuyện đạo đức - Những câu chuyện tinh thần (bộ 8 quyển )', 'Nguyễn Hạnh - Trần Thị Thanh Nguyên', 5, '', 139000, 111200, 90, 122, 4),
(5, 'Lịch Sử Ung Thư - Hoàng Đế Của Bách Bệnh', 'Siddhartha Mukherjee', 4, '', 139000, 111200, 12, 11, 4),
(6, 'Cuốn Sách Khám Phá: Trời Đêm Huyền Diệu', 'Disney lerning', 8, '', 139000, 111200, 18, 12, 4),
(7, 'Bộ Sách Những Câu Chuyện Cho Con Thành Người Tử Tế (Bộ 5 Cuốn)', 'Nhiều tác giả ', 8, '', 139000, 111200, 137, 28, 4),
(8, 'Lịch Sử Thế Giới', 'Nam Phong tùng thư - Phạm Quỳnh chủ nhiệm', 8, '', 139000, 111200, 15, 25, 5),
(9, 'Chuyện Nghề Và Chuyện Đời - Bộ 4 Cuốn', 'Nguyễn Hữu Long', 3, '', 139000, 111200, 14, 18, 4),
(10, 'Mẹ Con Sư Tử - BồCombo Tát Ngàn Tay Ngàn Mắt', 'Thích Nhất Hạnh', 7, '', 139000, 111200, 18, 74, 4),
(11, 'Hạnh Phúc Tại Tâm, Can Đảm Biến Thách Thức Thành,Sức Mạnh & Sáng Tạo Bừng Cháy Sức Mạnh Bên Trong', 'Gosho Aoyama, Mutsuki Watanabe, Takahisa Taira', 2, '', 139000, 111200, 105, 110, 3),
(12, 'Combo Giáo Dục Và Ý Nghĩa Cuộc Sống Và Bạn Đang Nghịch Gì Với Đời Mình?', 'J.Krishnamurti', 2, '', 139000, 111200, 10, 19, 4),
(13, 'Combo Dinh Dưỡng Xanh - Thần dược xanh', 'Ryu Seung-SunVictoria Boutenko', 2, '', 139000, 111200, 15, 31, 4),
(14, 'Combo Ăn Xanh Để Khỏe - Sống Lành Để Trẻ', 'Norman W. Walker', 4, '', 139000, 111200, 106, 17, 4),
(15, 'Combo Lược Sử Loài Người - Lược Sử Tương Lai - 21 Bài Học Cho Thế Kỷ 21', 'Yuval Noah Harari', 3, '', 139000, 111200, 15, 65, 4),
(16, 'Combo Bộ Sách Phong Cách Sống (Bộ 5 Cuốn)', 'arie Tourell Soderberg, Joanna Nylund, Yukari  Mit', 2, '', 139000, 111200, 18, 65, 4),
(17, 'Ngoại Giao Của Chính Quyền Sài Gòn', 'Brian Finch', 4, '', 139000, 111200, 17, 134, 4),
(18, 'Đường mây trên đất hoa', 'Brian Finch', 5, '', 139000, 111200, 119, 66, 2),
(19, 'Muôn kiếp nhân sinh', 'Brian Finch', 2, '', 139000, 111200, 172, 119, 4),
(20, 'Đường mây trong coi mộng', 'Brian Finch', 2, '', 139000, 111200, 85, 33, 4),
(21, 'Từng bước chân nở hoa: Khi câu kinh bước tới', 'Nguyễn Nam', 2, '', 139000, 111200, 20, 105, 5),
(22, 'Cảm ơn đã được thương ', 'Chí Vũ', 6, '', 139000, 111200, 81, 53, 4),
(23, 'Hào quang của vua Gia Long trong mắt Michel Gaultier', 'Vũ Chí', 5, '', 139000, 111200, 76, 41, 5),
(24, 'Suối nguồn” và cái tôi hiện sinh trong từng cá thể', 'Lê Đức', 8, '', 139000, 111200, 84, 34, 4),
(25, 'Đại dịch trên những con đường tơ lụa', 'Lê Đức', 10, '', 139000, 111200, 50, 89, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Sách kinh tế -kĩ năng'),
(2, 'Kinh Tế - Chính Trị'),
(3, 'Sách Khởi Nghiệp'),
(4, 'Sách Tài Chính, Kế Toán'),
(5, 'Sách Quản Trị Nhân Sự'),
(6, 'Sách Kỹ Năng Làm Việc'),
(7, 'Nhân Vật - Bài Học Kinh Doanh'),
(8, 'Sách Quản Trị - Lãnh Đạo'),
(9, 'Sách Kinh Tế Học'),
(10, 'Sách Chứng Khoán - Bất Động Sản - Đầu Tư'),
(11, 'Sách Marketing - Bán Hàng'),
(12, 'Nghệ Thuật Sống - Tâm Lý '),
(13, 'Sách Nghệ Thuật Sống'),
(14, 'Sách Tâm Lý'),
(15, 'Sách Hướng Nghiệp'),
(16, 'Sách Nghệ Thuật Sống Đẹp'),
(17, 'Sách Tư Duy'),
(18, 'Sách Văn Học Việt Nam'),
(19, 'Truyện Ngắn - Tản Văn'),
(20, 'Tiểu Thuyết lịch Sử'),
(21, 'Phóng Sự - Ký Sự - Du ký - Tùy Bút'),
(22, 'Thơ'),
(23, 'Tiểu thuyết'),
(24, 'Tiểu sử - Hồi ký'),
(25, 'Phê Bình Văn Học');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `bookinfo` ADD FULLTEXT KEY `book_name` (`book_name`,`author`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
