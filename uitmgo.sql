-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 02:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uitmgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_go`
--

CREATE TABLE `admin_go` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_num` int(100) NOT NULL,
  `admin_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_go`
--

INSERT INTO `admin_go` (`admin_id`, `admin_name`, `admin_num`, `admin_password`) VALUES
(1001, 'MUHAMAD HARITH IQBAL BIN SALLEH', 186645096, '123456'),
(1002, 'ANAS IKMAL BIN ABDUL RAHMAN ', 186645096, '123456'),
(1003, 'MUHAMMAD FAHKRI BIN AHMAD ZABIK', 186645096, '123456'),
(1004, 'MUHAMMAD FARIS BIN ZAINUDDIN', 186645096, '123456'),
(1005, ' MUHAMMAD IZHAM NAQIS BIN MOHD JALANI', 186645096, '123456'),
(1006, 'MUHAMMAD NAQIB BIN NIZUYIR', 186645096, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_num` int(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_num`, `customer_address`, `customer_password`) VALUES
(4001, 'Arhab bin Fawzi', 186645095, '04A 09 b13/1', '123456'),
(4002, 'Aiman bin Taahir', 186645098, '04A 08 b13/1', '123456'),
(4003, 'Tuah bin Sulong', 186644096, '04A 05 b13/1', '123456'),
(4004, 'Nawfal bin Abdur Razzaaq', 196645095, '04A 07 b13/1', '123456'),
(4005, 'Demang bin Yunos', 136645098, '04A 06 b13/1', '123456'),
(4006, 'Jaadallah bin Naseer', 116644096, '04A 08 b13/1', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(100) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_price` decimal(10,2) DEFAULT NULL,
  `menu_category` varchar(255) DEFAULT NULL,
  `menu_image` varchar(255) NOT NULL,
  `vendor_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_price`, `menu_category`, `menu_image`, `vendor_id`) VALUES
(71001, 'Nasi Lemak with Spicy Sambal', '6.50', 'Feature Menu', 'FP-Nasi-lemak-with-all-its-trimmings.jpg', 3001),
(71002, 'Nasi Goreng Telur Mata', '7.00', 'Feature Menu', 'Nasi-Goreng.jpg', 3001),
(71003, 'Classic Roti Canai', '4.00', 'Feature Menu', 'Roti%20Canai.jpg', 3001),
(71004, 'Hot Curry Laksa', '9.40', 'Feature Menu', 'Laksa%20Kari.jpg', 3001),
(71005, 'Charcoal Cooked Satay', '6.00', 'Feature Menu', 'Satay.jpg', 3001),
(71006, 'Chicken Chop with Blackpepper Sauce', '14.50', 'Feature Menu', 'Chicken%20Chop.jpg', 3001),
(71007, 'Hainanese Chicken Rice', '20.30', 'Feature Menu', 'Hainan%20Chicken%20Rice.jpg', 3001),
(71008, 'Uncle Teoh Char Kuey Tiao', '9.80', 'Feature Menu', 'Char%20Kuey%20Tiao.jpg', 3001),
(71009, 'Coca Cola 250ml', '3.50', 'Drinks', 'Coke.jpg', 3001),
(71010, 'Watermelon Sorbet 350ml', '4.50', 'Drinks', 'Air%20Tembikai.jpg', 3001),
(71011, 'Orange Juice 420ml', '5.00', 'Drinks', 'Orange%20Juice.jpg', 3001),
(71012, 'Cappucino Coffee 300ml', '4.20', 'Drinks', 'Cappucino.jpg', 3001),
(71013, 'Ice Lemon Tea 300ml', '5.60', 'Drinks', 'Ais%20Lemon%20Tea.jpg', 3001),
(71014, 'Choc Milo Ice 350ml', '3.60', 'Drinks', 'Air%20Milo.png', 3001),
(71015, 'Lemon Iced 450ml', '5.60', 'Drinks', 'Lemonade.jpg', 3001),
(71016, 'Manggo Juice 460ml', '6.50', 'Drinks', 'Manggo%20Juice.jpg', 3001),
(71017, 'Teh Tarik 300ml', '3.20', 'Drinks', 'Teh%20Tarik.jpg', 3001),
(71018, 'Sirap Bandung 365ml', '5.70', 'Drinks', 'Sirap%20Bandung.jpg', 3001),
(71019, 'Minty Laici 450ml', '3.40', 'Drinks', 'Minty%20Laici.jpg', 3001),
(71020, 'Coconut Water 450ml', '5.50', 'Drinks', 'Coconut%20Water.png', 3001),
(71021, 'Rice Combo Set A', '45.60', 'Combo Meals', 'Nasi%20Set%20Ikan.webp', 3001),
(71022, 'Rice Combo Set B', '120.50', 'Combo Meals', 'Nasi%20Untuk%202.webp', 3001),
(71023, 'Rice Combo Set C', '70.20', 'Combo Meals', 'Nasi%20Set%20Bubur.webp', 3001),
(71024, 'Western Combo Set A', '60.30', 'Combo Meals', 'Western%20A.webp', 3001),
(71025, 'Western Combo Set B', '145.90', 'Combo Meals', 'Western%20B.webp', 3001),
(71026, 'Western Combo Set C', '80.40', 'Combo Meals', 'Western%20C.webp', 3001),
(71027, 'Sagu Gula Melaka', '9.20', 'Desserts', 'Sagu%20Gula%20Melaka.jpg', 3001),
(71028, 'Red Velvet Cake', '4.50', 'Desserts', 'Red%20Velvet.jpg', 3001),
(71029, 'Chocolate Milkshake', '6.40', 'Desserts', 'MilkShake.jpg', 3001),
(71030, 'Crisp Waffles', '7.10', 'Desserts', 'Waffles.jpg', 3001),
(71031, 'Vanilla Ice Cream', '3.30', 'Desserts', 'Vanilla%20Ice%20Cream.png', 3001),
(71032, 'Choc Chip Cookies', '6.80', 'Desserts', 'Choc%20Chip.webp', 3001),
(71033, 'Ais Batu Campur', '7.40', 'Desserts', 'ABC.jpg', 3001),
(71034, 'Creme Brulee', '10.30', 'Desserts', 'Creme%20Brulee.jpg', 3001),
(72001, 'Nasi Lemak with Spicy Sambal', '6.50', 'Feature Menu', 'FP-Nasi-lemak-with-all-its-trimmings.jpg', 3002),
(72002, 'Nasi Goreng Telur Mata', '7.00', 'Feature Menu', 'Nasi-Goreng.jpg', 3002),
(72003, 'Classic Roti Canai', '4.00', 'Feature Menu', 'Roti%20Canai.jpg', 3002),
(72004, 'Hot Curry Laksa', '9.40', 'Feature Menu', 'Laksa%20Kari.jpg', 3002),
(72005, 'Charcoal Cooked Satay', '6.00', 'Feature Menu', 'Satay.jpg', 3002),
(72006, 'Chicken Chop with Blackpepper Sauce', '14.50', 'Feature Menu', 'Chicken%20Chop.jpg', 3002),
(72007, 'Hainanese Chicken Rice', '20.30', 'Feature Menu', 'Hainan%20Chicken%20Rice.jpg', 3002),
(72008, 'Uncle Teoh Char Kuey Tiao', '9.80', 'Feature Menu', 'Char%20Kuey%20Tiao.jpg', 3002),
(72009, 'Coca Cola 250ml', '3.50', 'Drinks', 'Coke.jpg', 3002),
(72010, 'Watermelon Sorbet 350ml', '4.50', 'Drinks', 'Air%20Tembikai.jpg', 3002),
(72011, 'Orange Juice 420ml', '5.00', 'Drinks', 'Orange%20Juice.jpg', 3002),
(72012, 'Cappucino Coffee 300ml', '4.20', 'Drinks', 'Cappucino.jpg', 3002),
(72013, 'Ice Lemon Tea 300ml', '5.60', 'Drinks', 'Ais%20Lemon%20Tea.jpg', 3002),
(72014, 'Choc Milo Ice 350ml', '3.60', 'Drinks', 'Air%20Milo.png', 3002),
(72015, 'Lemon Iced 450ml', '5.60', 'Drinks', 'Lemonade.jpg', 3002),
(72016, 'Manggo Juice 460ml', '6.50', 'Drinks', 'Manggo%20Juice.jpg', 3002),
(72017, 'Teh Tarik 300ml', '3.20', 'Drinks', 'Teh%20Tarik.jpg', 3002),
(72018, 'Sirap Bandung 365ml', '5.70', 'Drinks', 'Sirap%20Bandung.jpg', 3002),
(72019, 'Minty Laici 450ml', '3.40', 'Drinks', 'Minty%20Laici.jpg', 3002),
(72020, 'Coconut Water 450ml', '5.50', 'Drinks', 'Coconut%20Water.png', 3002),
(72021, 'Rice Combo Set A', '45.60', 'Combo Meals', 'Nasi%20Set%20Ikan.webp', 3002),
(72022, 'Rice Combo Set B', '120.50', 'Combo Meals', 'Nasi%20Untuk%202.webp', 3002),
(72023, 'Rice Combo Set C', '70.20', 'Combo Meals', 'Nasi%20Set%20Bubur.webp', 3002),
(72024, 'Western Combo Set A', '60.30', 'Combo Meals', 'Western%20A.webp', 3002),
(72025, 'Western Combo Set B', '145.90', 'Combo Meals', 'Western%20B.webp', 3002),
(72026, 'Western Combo Set C', '80.40', 'Combo Meals', 'Western%20C.webp', 3002),
(72027, 'Sagu Gula Melaka', '9.20', 'Desserts', 'Sagu%20Gula%20Melaka.jpg', 3002),
(72028, 'Red Velvet Cake', '4.50', 'Desserts', 'Red%20Velvet.jpg', 3002),
(72029, 'Chocolate Milkshake', '6.40', 'Desserts', 'MilkShake.jpg', 3002),
(72030, 'Crisp Waffles', '7.10', 'Desserts', 'Waffles.jpg', 3002),
(72031, 'Vanilla Ice Cream', '3.30', 'Desserts', 'Vanilla%20Ice%20Cream.png', 3002),
(72032, 'Choc Chip Cookies', '6.80', 'Desserts', 'Choc%20Chip.webp', 3002),
(72033, 'Ais Batu Campur', '7.40', 'Desserts', 'ABC.jpg', 3002),
(72034, 'Creme Brulee', '10.30', 'Desserts', 'Creme%20Brulee.jpg', 3002);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `order_quantity` int(100) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `vendor_id` int(100) DEFAULT NULL,
  `rider_id` int(100) DEFAULT NULL,
  `menu_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `total_payment` decimal(10,2) DEFAULT NULL,
  `total_quantity` int(100) DEFAULT NULL,
  `order_id` int(100) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `vendor_id` int(100) DEFAULT NULL,
  `menu_id` int(100) DEFAULT NULL,
  `rider_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `order_detail_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(100) NOT NULL,
  `rider_name` varchar(255) NOT NULL,
  `rider_num` int(100) NOT NULL,
  `rider_register` date NOT NULL,
  `rider_password` varchar(25) DEFAULT NULL,
  `admin_id` int(100) DEFAULT NULL,
  `vendor_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `rider_name`, `rider_num`, `rider_register`, `rider_password`, `admin_id`, `vendor_id`) VALUES
(2001, 'Nabeel bin Izzaddeen', 1121450979, '2022-05-10', '123456', 1001, 3001),
(2002, 'Mahfooz bin Ameer', 1128652898, '2022-05-02', '123456', 1002, 3002),
(2003, 'Luqmaan bin Raadi', 1128997756, '2022-05-22', '123456', 1001, 3001);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(100) NOT NULL,
  `salary_amount` decimal(10,2) NOT NULL,
  `salary_date` date NOT NULL,
  `rider_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_amount`, `salary_date`, `rider_id`) VALUES
(9001, '15.00', '2022-05-20', 2001),
(9002, '20.00', '2022-05-21', 2001),
(9003, '15.00', '2022-05-23', 2002),
(9004, '10.00', '2022-05-25', 2001),
(9005, '6.00', '2022-05-28', 2002),
(9006, '10.00', '2022-05-30', 2003);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(100) NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_num` int(100) DEFAULT NULL,
  `vendor_register` date NOT NULL,
  `vendor_password` varchar(25) DEFAULT NULL,
  `admin_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_num`, `vendor_register`, `vendor_password`, `admin_id`) VALUES
(3001, 'Mek Kelantan', 116644096, '2022-05-05', '123456', 1001),
(3002, 'Pak Abu', 137645096, '2022-05-05', '123456', 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_go`
--
ALTER TABLE `admin_go`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `rider_id` (`rider_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_detail_id` (`order_detail_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_go`
--
ALTER TABLE `admin_go`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4007;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72035;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9007;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `order_detail_ibfk_4` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `order_detail_ibfk_5` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_detail_id`) REFERENCES `order_detail` (`order_detail_id`);

--
-- Constraints for table `rider`
--
ALTER TABLE `rider`
  ADD CONSTRAINT `rider_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_go` (`admin_id`),
  ADD CONSTRAINT `rider_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_go` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
