-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos_checkout_order`
--

CREATE TABLE `pos_checkout_order` (
  `checkout_id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `transcode` varchar(50) NOT NULL,
  `delivery_option` varchar(50) NOT NULL,
  `is_preorder` int(1) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `delivery_time` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `is_paid` int(1) NOT NULL,
  `is_delivery` int(1) NOT NULL,
  `meal_status` varchar(12) NOT NULL,
  `is_rescheduled` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_checkout_order`
--

INSERT INTO `pos_checkout_order` (`checkout_id`, `customer_id`, `transcode`, `delivery_option`, `is_preorder`, `delivery_date`, `delivery_time`, `status`, `is_paid`, `is_delivery`, `meal_status`, `is_rescheduled`, `date_added`) VALUES
(1, 1, 'KuxU4djt', '1', 0, '', '', 1, 0, 0, '', 0, '2022-12-02 16:16:33'),
(2, 1, '7UG3ZAC9', '1', 0, '', '', 1, 0, 0, '', 0, '2022-12-02 17:01:19'),
(3, 1, '7UG3ZAC9', '1', 0, '', '', 1, 0, 0, '', 0, '2022-12-02 17:01:19'),
(4, 2, 'Yvp1S2zE', '3', 0, '', '', 1, 0, 0, '', 0, '2022-12-02 17:11:44'),
(5, 2, 'Eyz3f7dF', '1', 0, '', '', 0, 0, 0, '', 0, '2022-12-02 17:13:20'),
(6, 1, 'p9MwKYyf', '3', 0, '', '', 0, 0, 0, '', 0, '2022-12-02 17:14:18'),
(7, 1, 'kbRWlsHy', '2', 0, '', '', 0, 0, 0, '', 0, '2022-12-02 17:33:53'),
(8, 1, 'AcWWbkxR', '2', 0, '', '', 0, 0, 0, '', 0, '2022-12-02 18:26:40'),
(9, 4, 'kcLV4y7p', '2', 0, '', '', 0, 0, 0, '', 0, '2022-12-05 06:05:21'),
(10, 8, 'nHaQJpRt', '1', 0, '', '', 1, 0, 0, '', 0, '2022-12-05 14:20:26'),
(11, 9, 'lMa2UTKq', '3', 0, '', '', 1, 0, 0, '', 0, '2022-12-06 02:10:48'),
(12, 18, 'SRbI0iyD', '1', 0, '', '', 1, 0, 0, '', 0, '2023-02-11 06:59:51'),
(13, 23, 'qVZJ8ClL', '1', 0, '', '', 1, 0, 0, '', 0, '2023-02-14 16:21:05'),
(14, 18, 'E6LLIWDq', '3', 0, '', '', 0, 0, 0, '', 0, '2023-06-29 07:07:11'),
(15, 18, 'ALSdSdrA', '1', 0, '', '', 0, 0, 0, '', 0, '2023-06-29 07:08:52'),
(16, 18, 'ALSdSdrA', '1', 0, '', '', 0, 0, 0, '', 0, '2023-06-29 07:09:05'),
(17, 18, 'ALSdSdrA', '2', 0, '', '', 0, 0, 0, '', 0, '2023-06-29 07:09:13'),
(18, 4, '6AY2hARn', '1', 0, '', '', 1, 0, 0, '', 0, '2023-06-29 07:12:18'),
(19, 4, 'hh17eiid', '1', 0, '', '', 1, 0, 0, '', 0, '2023-06-29 07:12:33'),
(20, 4, 'RaqU0JUD', '2', 0, '', '', 1, 0, 0, '', 0, '2023-06-29 07:12:45'),
(21, 4, '0VXYnP3K', '3', 0, '', '', 1, 0, 0, '', 0, '2023-06-29 07:13:03'),
(22, 5389, 'xO7jPDF8', '1', 0, '', '', 1, 0, 0, '', 0, '2023-06-30 02:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `pos_cheque`
--

CREATE TABLE `pos_cheque` (
  `check_id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `check_number` varchar(50) NOT NULL,
  `check_date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `deposit_bank` varchar(100) NOT NULL,
  `check_status` varchar(36) NOT NULL,
  `remarks` text NOT NULL,
  `move_date` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer`
--

CREATE TABLE `pos_customer` (
  `customer_id` int(12) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(36) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sm_id` int(12) NOT NULL,
  `shipper` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_customer`
--

INSERT INTO `pos_customer` (`customer_id`, `firstname`, `lastname`, `address`, `contact`, `email`, `username`, `password`, `sm_id`, `shipper`, `area`, `is_active`, `date_added`) VALUES
(4, 'test', 'ong', 'qc', '123456789', 'shombabells@gmail.com', 'testcustomer', 'Welcome123456789', 0, '', '', 1, '2022-12-05 05:57:46'),
(7, 'asdsd', 'asd', 'asd@gmail.com', '9357396286', 'a@gmail.com', 'asas', '@!2erE11', 0, '', '', 0, '2022-12-05 14:09:32'),
(17, 'Alvougn', 'Santos', 'malabon', '09456751802', 'imalvougnsantos@gmail.com', 'von', 'P@ssw0rd', 0, '', '', 1, '2023-01-26 05:54:16'),
(18, 'Alvougn', 'Santos', 'No. 8, 196 Syjuco St., Ibaba, Malabon City', '09456751802', 'impulsekillme@gmail.com', 'vougn03', '@Vougn03', 0, '', '', 1, '2023-02-11 06:21:05'),
(19, 'New', 'User', 'New User', '+639999999999', 'newuser@gmail.com', 'New', 'User', 0, '', '', 0, '2023-02-12 06:56:59'),
(5388, 'test', 'test', 'test', '029299292', 'test@gmail.com', 'test', 'Test2122', 0, '', '', 0, '2023-06-30 02:38:35'),
(5389, 'Juan ', 'Dela Cruz', 'blk 1 lot 2 testing village', '0948237817121', 'Juan@gmail.com', 'JuanD', 'Juan2121', 0, '', '', 0, '2023-06-30 02:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory_reports`
--

CREATE TABLE `pos_inventory_reports` (
  `item_id` int(12) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(12) NOT NULL,
  `item_qty` int(5) NOT NULL,
  `item_unit` varchar(12) NOT NULL,
  `item_critical_level` varchar(5) NOT NULL,
  `item_supplier_id` int(2) NOT NULL,
  `item_category_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_inventory_reports`
--

INSERT INTO `pos_inventory_reports` (`item_id`, `item_code`, `item_name`, `item_price`, `item_qty`, `item_unit`, `item_critical_level`, `item_supplier_id`, `item_category_id`, `is_active`, `status`, `date_added`) VALUES
(11, 'DFSACGAM001', 'GAMBOLER', '150', 30, '10kg', '10', 0, 3, 0, 1, '2022-12-02 16:55:06'),
(12, 'DFSACRC008', 'RC SHIH TZU ADULT', '125', 30, '2kg', '10', 0, 1, 0, 1, '2022-12-02 16:56:14'),
(13, 'DFSACVIT001', 'VITALITY ADULT', '115', 50, '15Kg', '10', 0, 1, 0, 1, '2022-12-02 16:58:57'),
(14, 'NEWITEM1', 'New Item', '9999', 9999, '999g', '10', 0, 3, 0, 1, '2023-02-12 05:48:38'),
(15, 'VONCODE', 'VONIE', '150', 25, '400g', '10', 0, 1, 0, 1, '2023-05-16 06:55:55'),
(16, 'JFP0001', 'Piattos ', '17', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:41:20'),
(17, 'JFN0002', 'Nagaraya ', '20', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:41:57'),
(18, 'JFCR0003', 'Clover ', '18', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:42:30'),
(19, 'JFCY0004', 'Chippy ', '16', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:43:31'),
(20, 'JFV0005', 'Vcut ', '18', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:44:37'),
(21, 'JFNMS0006', 'Nova Multigrain Snacks ', '30', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:45:23'),
(22, 'JFCS0007', 'Cheetos', '45', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:46:08'),
(23, 'JFBB0008', 'Boy Bawang ', '25', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:47:20'),
(24, 'JFCMJ0009', 'Chicharon ni Mang Juan', '25', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:47:53'),
(25, 'JFP0010', 'Pringles ', '20', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:48:46'),
(26, 'JFOPC0011', 'Oishi Prawn Crackers ', '30', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:49:25'),
(27, 'JFLL0012', 'LaLa', '35', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:50:02'),
(28, 'JFM0013', 'Moby ', '25', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:50:34'),
(29, 'JFP0014', 'PeeWee ', '30', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:51:04'),
(30, 'JFL0015', 'Loaded ', '25', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:51:38'),
(31, 'JFRS0016', 'Regent Snacku', '20', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:59:31'),
(32, 'JFOC0017', 'Oishi Cracklings', '30', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 06:59:56'),
(33, 'JFNS0018', 'Nutri Star', '25', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 07:00:19'),
(34, 'JFT0020', 'Tortillos ', '30', 20, '1', '1', 0, 12, 0, 1, '2023-05-26 07:00:45'),
(35, 'BSDW0001', 'Summit Drinking Water', '15', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:01:34'),
(36, 'BSDM0002', 'Dutch Mill ', '25', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:02:03'),
(37, 'BSNB0003', 'Nutri Boost ', '30', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:02:36'),
(38, 'BSGTIC0005', 'Great Taste Iced Coffee', '23', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:04:38'),
(39, 'BSCSL0006', 'Cali Shandy Lemonade', '25', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:05:07'),
(40, 'BSMMFJ0007', 'Mogu Mogu Fruit Juice  ', '25', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:05:32'),
(41, 'BSNCCD0008', 'Nestle Chuckie Chocolate Drink', '25', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:05:53'),
(42, 'BS7U0009', '7-up', '25', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:06:35'),
(43, 'BSNIT0010', 'Nestea Iced Tea', '20', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:07:04'),
(44, 'BSADW0011', 'Absolute Drinking Water', '20', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:07:27'),
(45, 'BSS0012', 'Sprite', '30', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:07:50'),
(46, 'BSC0013', 'Coke', '30', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:08:15'),
(47, 'BSR0014', 'Royal', '30', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:08:44'),
(48, 'BSMD0015', 'Mountain Dew', '30', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:09:08'),
(49, 'BSSML0016', 'San Miguel Light', '35', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:09:33'),
(50, 'BSCED0017', 'Cobra Energy Drink (Any Flavor)', '35', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:09:53'),
(51, 'BSSED0018', 'Sting Energy Drink ', '35', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:10:15'),
(52, 'BSTB0019', 'Tiger Beer', '35', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:10:40'),
(53, 'BSTI0020', 'Tanduay Ice', '35', 20, '1', '1', 0, 13, 0, 1, '2023-05-26 07:11:01'),
(54, 'HMMR0011', 'Menudo w/ Rice', '45', 10, '10', '5', 0, 14, 0, 1, '2023-06-30 02:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `pos_items`
--

CREATE TABLE `pos_items` (
  `item_id` int(12) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(12) NOT NULL,
  `item_qty` int(5) NOT NULL,
  `item_unit` varchar(12) NOT NULL,
  `item_critical_level` varchar(5) NOT NULL,
  `item_supplier_id` int(2) NOT NULL,
  `item_category_id` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_status` int(1) NOT NULL,
  `image` text NOT NULL,
  `date_delivered` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_items`
--

INSERT INTO `pos_items` (`item_id`, `item_code`, `item_name`, `item_price`, `item_qty`, `item_unit`, `item_critical_level`, `item_supplier_id`, `item_category_id`, `is_active`, `is_status`, `image`, `date_delivered`, `date_added`) VALUES
(12, 'JFP0001', 'Piattos ', '17', 18, '1', '1', 1, 12, 0, 1, 'piatos.png', '2023-05-26', '2023-05-26 06:41:20'),
(13, 'JFN0002', 'Nagaraya ', '20', 19, '1', '1', 1, 12, 0, 1, 'nagaraya.png', '2023-05-26', '2023-05-26 06:41:57'),
(14, 'JFCR0003', 'Clover ', '18', 20, '1', '1', 1, 12, 0, 1, 'clover.png', '2023-05-26', '2023-05-26 06:42:30'),
(15, 'JFCY0004', 'Chippy ', '16', 20, '1', '1', 1, 12, 0, 1, 'chippy.png', '2023-05-26', '2023-05-26 06:43:31'),
(16, 'JFV0005', 'Vcut ', '18', 20, '1', '1', 1, 12, 0, 1, 'vcut.png', '2023-05-26', '2023-05-26 06:44:37'),
(17, 'JFNMS0006', 'Nova Multigrain Snacks ', '30', 20, '1', '1', 1, 12, 0, 1, 'Nova.png', '2023-05-26', '2023-05-26 06:45:23'),
(18, 'JFCS0007', 'Cheetos', '45', 20, '1', '1', 1, 12, 0, 1, 'Cheetos.jpg', '2023-05-26', '2023-05-26 06:46:08'),
(19, 'JFBB0008', 'Boy Bawang ', '25', 20, '1', '1', 1, 12, 0, 1, 'Boy bawang.jpg', '2023-05-26', '2023-05-26 06:47:20'),
(20, 'JFCMJ0009', 'Chicharon ni Mang Juan', '25', 19, '1', '1', 1, 12, 0, 1, 'Mang Juan.png', '2023-05-26', '2023-05-26 06:47:53'),
(21, 'JFP0010', 'Pringles ', '20', 20, '1', '1', 1, 12, 0, 1, 'Pringles.jpg', '2023-05-26', '2023-05-26 06:48:46'),
(22, 'JFOPC0011', 'Oishi Prawn Crackers ', '30', 20, '1', '1', 1, 12, 0, 1, 'Oishi_Prawn_Crackers.png', '2023-05-26', '2023-05-26 06:49:25'),
(23, 'JFLL0012', 'LaLa', '35', 20, '1', '1', 1, 12, 0, 1, 'LaLa.jpg', '2023-05-26', '2023-05-26 06:50:02'),
(24, 'JFM0013', 'Moby ', '25', 20, '1', '1', 1, 12, 0, 1, 'Moby.webp', '2023-05-26', '2023-05-26 06:50:34'),
(25, 'JFP0014', 'PeeWee ', '30', 20, '1', '1', 1, 12, 0, 1, 'PeeWee.jpg', '2023-05-26', '2023-05-26 06:51:04'),
(26, 'JFL0015', 'Loaded ', '25', 20, '1', '1', 1, 12, 0, 1, 'Loaded.jfif', '2023-05-26', '2023-05-26 06:51:38'),
(27, 'JFRS0016', 'Regent Snacku', '20', 20, '1', '1', 1, 12, 0, 1, 'Snacku.jpg', '2023-05-26', '2023-05-26 06:59:31'),
(28, 'JFOC0017', 'Oishi Cracklings', '30', 20, '1', '1', 1, 12, 0, 1, 'Cracklings.jpg', '2023-05-26', '2023-05-26 06:59:56'),
(29, 'JFNS0018', 'Nutri Star', '25', 20, '1', '1', 1, 12, 0, 1, 'Nutri Star.png', '2023-05-26', '2023-05-26 07:00:19'),
(30, 'JFT0020', 'Tortillos ', '30', 20, '1', '1', 1, 12, 0, 1, 'Tortillos.jpg', '2023-05-26', '2023-05-26 07:00:45'),
(31, 'BSDW0001', 'Summit Drinking Water', '15', 19, '1', '1', 1, 13, 0, 1, 'Summit Water.png', '2023-05-26', '2023-05-26 07:01:34'),
(32, 'BSDM0002', 'Dutch Mill ', '25', 20, '1', '1', 1, 13, 0, 1, 'Dutch Mill.png', '2023-05-26', '2023-05-26 07:02:03'),
(33, 'BSNB0003', 'Nutri Boost ', '30', 20, '1', '1', 1, 13, 0, 1, 'Nutri Boost.png', '2023-05-26', '2023-05-26 07:02:36'),
(34, 'BSGTIC0005', 'Great Taste Iced Coffee', '23', 20, '1', '1', 1, 13, 0, 1, 'Great Teast White Iced Coffee.png', '2023-05-26', '2023-05-26 07:04:38'),
(35, 'BSCSL0006', 'Cali Shandy Lemonade', '25', 20, '1', '1', 1, 13, 0, 1, 'Cali.png', '2023-05-26', '2023-05-26 07:05:07'),
(36, 'BSMMFJ0007', 'Mogu Mogu Fruit Juice  ', '25', 20, '1', '1', 1, 13, 0, 1, 'Mogu Mogu.jpg', '2023-05-26', '2023-05-26 07:05:32'),
(37, 'BSNCCD0008', 'Nestle Chuckie Chocolate Drink', '25', 20, '1', '1', 1, 13, 0, 1, 'Chuckie.png', '2023-05-26', '2023-05-26 07:05:53'),
(38, 'BS7U0009', '7-up', '25', 20, '1', '1', 1, 13, 0, 1, '7Up.png', '2023-05-26', '2023-05-26 07:06:35'),
(39, 'BSNIT0010', 'Nestea Iced Tea', '20', 20, '1', '1', 1, 13, 0, 1, 'Nestea Juice Iced Tea.png', '2023-05-26', '2023-05-26 07:07:04'),
(40, 'BSADW0011', 'Absolute Drinking Water', '20', 20, '1', '1', 1, 13, 0, 1, 'ABSOLUTE_DISTILLED_WATER_500ML.jpg', '2023-05-26', '2023-05-26 07:07:27'),
(41, 'BSS0012', 'Sprite', '30', 20, '1', '1', 1, 13, 0, 1, 'Sprite.png', '2023-05-26', '2023-05-26 07:07:50'),
(42, 'BSC0013', 'Coke', '30', 20, '1', '1', 1, 13, 0, 1, 'Coke.jpg', '2023-05-26', '2023-05-26 07:08:15'),
(43, 'BSR0014', 'Royal', '30', 20, '1', '1', 1, 13, 0, 1, 'Royal.png', '2023-05-26', '2023-05-26 07:08:44'),
(44, 'BSMD0015', 'Mountain Dew', '30', 20, '1', '1', 1, 13, 0, 1, 'Mountain_Dew.png', '2023-05-26', '2023-05-26 07:09:08'),
(45, 'BSSML0016', 'San Miguel Light', '35', 20, '1', '1', 1, 13, 0, 1, 'San Miguel Light.jpg', '2023-05-26', '2023-05-26 07:09:33'),
(46, 'BSCED0017', 'Cobra Energy Drink (Any Flavor)', '35', 20, '1', '1', 1, 13, 0, 1, 'Cobra Energy Drink.jpg', '2023-05-26', '2023-05-26 07:09:53'),
(47, 'BSSED0018', 'Sting Energy Drink ', '35', 20, '1', '1', 1, 13, 0, 1, 'Sting Energy Drink.jpg', '2023-05-26', '2023-05-26 07:10:15'),
(48, 'BSTB0019', 'Tiger Beer', '35', 20, '1', '1', 1, 13, 0, 1, 'Tiger Beer.jpg', '2023-05-26', '2023-05-26 07:10:40'),
(49, 'BSTI0020', 'Tanduay Ice', '35', 20, '1', '1', 1, 13, 0, 1, 'Tanduay Ice.jpg', '2023-05-26', '2023-05-26 07:11:01'),
(50, 'HMCSR0001', 'Chicken Sisig w/ Rice', '32', 21, '1', '1', 1, 14, 0, 1, 'Chicken Sisig.png', '2023-06-29', '2023-06-29 06:19:45'),
(51, 'HMBSR0002', 'Bangus Sisig w/ Rice', '32', 21, '1', '1', 1, 14, 0, 1, 'Bangus Sisig.png', '2023-06-29', '2023-06-29 06:20:06'),
(52, 'HMPSR0003', 'Pork Sisig w/ Rice', '32', 12, '1', '1', 1, 14, 0, 1, 'Pork Sisig.png', '2023-06-29', '2023-06-29 06:20:29'),
(53, 'HMOER0004', 'Omelette Egg w/ Rice', '32', 21, '1', '1', 1, 14, 0, 1, 'Omelette Egg w Rice.png', '2023-06-29', '2023-06-29 06:20:57'),
(54, 'HMT0005', 'Tocilog', '32', 21, '1', '1', 1, 14, 0, 1, 'Tocilog.png', '2023-06-29', '2023-06-29 06:21:16'),
(55, 'HMBKKR0006', 'Beef Kare-Kare w/ Rice', '32', 21, '1', '1', 1, 14, 0, 1, 'Kare kare.png', '2023-06-29', '2023-06-29 06:24:48'),
(56, 'HMBTR0007', 'Bistek Tagalog w/ Rice', '32', 21, '1', '1', 1, 14, 0, 1, 'Bistek.png', '2023-06-29', '2023-06-29 06:25:07'),
(57, 'HMPSR0008', 'Pork Sinigang w/ Rice', '45', 31, '1', '1', 1, 14, 0, 1, 'Sinigang.png', '2023-06-29', '2023-06-29 06:25:29'),
(58, 'HMCCR0009', 'Chicken Curry w/ Rice', '50', 31, '1', '1', 1, 14, 0, 1, 'Chicken Curry.jpg', '2023-06-29', '2023-06-29 06:25:54'),
(59, 'HMT0010', 'Tapsilog', '35', 31, '1', '1', 1, 14, 0, 1, 'Tapa.jpg', '2023-06-29', '2023-06-29 06:26:18'),
(60, 'CFCN0001', '555 Carne Norte ', '57', 21, '1', '1', 2, 15, 0, 1, '555 Carne Norte.png', '2023-06-29', '2023-06-29 06:29:03'),
(61, 'CFSRLM0002', 'Spam Regular Luncheon Meat', '91', 41, '1', '1', 1, 15, 0, 1, 'Spam Regular Luncheon Meat.png', '2023-06-29', '2023-06-29 06:29:37'),
(62, 'CFDCB0003', 'Delimondo Corned Beef', '195', 31, '1', '1', 1, 15, 0, 1, 'Delimondo.png', '2023-06-29', '2023-06-29 06:30:06'),
(63, 'CFMCLM0004', 'MALING Chicken Luncheon Meat', '125', 51, '1', '1', 1, 15, 0, 1, 'Maling Chicken Luncheon Meat.png', '2023-06-29', '2023-06-29 06:30:30'),
(64, 'CFCTHS0005', 'Century Tuna Hot and Spicy', '51', 24, '1', '1', 1, 15, 0, 1, 'Century Tuna Hot and Spicy.png', '2023-06-29', '2023-06-29 06:30:49'),
(65, 'CFPCB0006', 'Purefoods Corned Beef', '56', 42, '1', '1', 1, 15, 0, 1, 'Purefoods Corned Beef.jpg', '2023-06-29', '2023-06-29 06:31:17'),
(66, 'CFLT0007', 'Lucky 7 Tuna', '59', 12, '1', '1', 1, 15, 0, 1, 'Lucky 7.jpg', '2023-06-29', '2023-06-29 06:32:48'),
(67, 'CFDMPC0008', 'Del Monte Pineapple Chunks', '131', 30, '1', '1', 1, 15, 0, 1, 'Del Monte Pineapple Chunks.png', '2023-06-29', '2023-06-29 06:33:08'),
(68, 'CFJWCK0009', 'Jolly Whole Corn Kernels', '97', 21, '1', '1', 1, 15, 0, 1, 'Jolly Whole Corn Kernels.png', '2023-06-29', '2023-06-29 06:33:31'),
(69, 'CFJM0010', 'Jolly Mushroom', '100', 23, '1', '1', 1, 15, 0, 1, 'Jolly Mushrooms.png', '2023-06-29', '2023-06-29 06:33:50'),
(70, 'HMMR0011', 'Menudo w/ Rice', '45', 10, '10', '5', 1, 14, 0, 1, 'Pork_Menudo.jpg', '2023-06-30', '2023-06-30 02:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `pos_item_category`
--

CREATE TABLE `pos_item_category` (
  `category_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_item_category`
--

INSERT INTO `pos_item_category` (`category_id`, `name`, `date_added`) VALUES
(12, 'Junk Food ', '2023-05-25 02:22:14'),
(13, 'Beverages', '2023-05-25 02:22:23'),
(14, 'Hot Meals', '2023-05-25 02:22:34'),
(15, 'Canned Foods', '2023-05-25 02:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `pos_order`
--

CREATE TABLE `pos_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `trans_code` varchar(100) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `update_price` varchar(12) NOT NULL,
  `item_price_change` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_walkin` int(11) NOT NULL,
  `receipt` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_order`
--

INSERT INTO `pos_order` (`order_id`, `customer_id`, `trans_code`, `item_code`, `qty`, `update_price`, `item_price_change`, `status`, `is_walkin`, `receipt`, `created_by`, `created_at`) VALUES
(24, 18, 'ALSdSdrA', 'BSDM0002', 1, '', '', 1, 0, '', 0, '2023-06-29 15:09:01'),
(25, 4, '6AY2hARn', 'BSDW0001', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:10'),
(26, 4, '6AY2hARn', 'BSDM0002', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:11'),
(27, 4, 'hh17eiid', 'JFP0001', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:28'),
(28, 4, 'hh17eiid', 'JFCR0003', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:29'),
(29, 4, 'RaqU0JUD', 'HMPSR0003', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:41'),
(30, 4, 'RaqU0JUD', 'HMBSR0002', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:42'),
(31, 4, '0VXYnP3K', 'BSR0014', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:57'),
(32, 4, '0VXYnP3K', 'BSS0012', 1, '', '', 0, 0, '', 0, '2023-06-29 15:12:58'),
(33, 5389, 'xO7jPDF8', 'JFP0001', 1, '', '', 1, 0, '', 0, '2023-06-30 10:55:51'),
(34, 5389, 'xO7jPDF8', 'JFN0002', 1, '', '', 1, 0, '', 0, '2023-06-30 10:55:53'),
(35, 5389, 'xO7jPDF8', 'BSDW0001', 1, '', '', 1, 0, '', 0, '2023-06-30 10:55:57'),
(36, 17, 'TC-1688093972217', 'JFP0001', 1, '17', '0', 1, 1, '', 0, '2023-06-30 10:59:47'),
(37, 17, 'TC-1688093972217', 'JFCMJ0009', 1, '25', '0', 1, 1, '', 0, '2023-06-30 10:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment`
--

CREATE TABLE `pos_payment` (
  `payment_id` int(11) NOT NULL,
  `trans_code` varchar(100) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `discounted_amount` varchar(100) NOT NULL,
  `cash` double(10,2) NOT NULL,
  `discount_1` varchar(12) NOT NULL,
  `discount_2` varchar(12) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_payment`
--

INSERT INTO `pos_payment` (`payment_id`, `trans_code`, `total_amount`, `discounted_amount`, `cash`, `discount_1`, `discount_2`, `payment_method`, `created_by`, `created_date`) VALUES
(1, 'KuxU4djt', 1.00, '0', 1.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(2, '7UG3ZAC9', 1347.00, '0', 1500.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(3, '7UG3ZAC9', 1347.00, '0', 1500.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(4, 'Yvp1S2zE', 66.00, '', 0.00, '', '', '3', 0, '0000-00-00 00:00:00'),
(5, 'Eyz3f7dF', 66.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(6, 'p9MwKYyf', 125.00, '', 0.00, '', '', '3', 0, '0000-00-00 00:00:00'),
(7, 'kbRWlsHy', 150.00, '', 0.00, '', '', '2', 0, '0000-00-00 00:00:00'),
(8, 'AcWWbkxR', 125.00, '', 0.00, '', '', '2', 0, '0000-00-00 00:00:00'),
(9, 'kcLV4y7p', 125.00, '', 0.00, '', '', '2', 0, '0000-00-00 00:00:00'),
(10, 'nHaQJpRt', 66.00, '0', 100.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(11, 'lMa2UTKq', 66.00, '0', 66.00, '', '', '3', 0, '0000-00-00 00:00:00'),
(12, 'SRbI0iyD', 66.00, '0', 100.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(13, 'qVZJ8ClL', 115.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(14, 'E6LLIWDq', 20.00, '', 0.00, '', '', '3', 0, '0000-00-00 00:00:00'),
(15, 'ALSdSdrA', 0.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(16, 'ALSdSdrA', 25.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(17, 'ALSdSdrA', 0.00, '', 0.00, '', '', '2', 0, '0000-00-00 00:00:00'),
(18, '6AY2hARn', 40.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(19, 'hh17eiid', 35.00, '', 0.00, '', '', '1', 0, '0000-00-00 00:00:00'),
(20, 'RaqU0JUD', 64.00, '', 0.00, '', '', '2', 0, '0000-00-00 00:00:00'),
(21, '0VXYnP3K', 60.00, '', 0.00, '', '', '3', 0, '0000-00-00 00:00:00'),
(22, 'xO7jPDF8', 52.00, '0', 100.00, '', '', '1', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_salesman`
--

CREATE TABLE `pos_salesman` (
  `sm_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE `pos_settings` (
  `id` int(12) NOT NULL,
  `title` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `title`, `contact`, `address`) VALUES
(1, 'DACI', '0955 699 2946', '----');

-- --------------------------------------------------------

--
-- Table structure for table `pos_supplier`
--

CREATE TABLE `pos_supplier` (
  `supplier_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_supplier`
--

INSERT INTO `pos_supplier` (`supplier_id`, `name`, `is_active`, `date_added`) VALUES
(1, 'Test Supplier', 1, '2022-12-01 22:09:29'),
(2, 'New Supplier', 1, '2023-02-12 06:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `pos_users`
--

CREATE TABLE `pos_users` (
  `user_id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_users`
--

INSERT INTO `pos_users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `role`, `date_added`) VALUES
(1, 'Admin', 'CEO', 'demo', 'demo', 1, '2022-03-02 13:35:25'),
(14, 'Cashier', '1', 'cashier', 'cashier', 2, '2022-10-28 12:33:28'),
(15, 'New', 'User', 'New', 'User123', 2, '2023-02-12 07:11:11'),
(16, '123', 'asd', 'zxc', '123', 1, '2023-04-18 07:40:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `pos_cheque`
--
ALTER TABLE `pos_cheque`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `pos_customer`
--
ALTER TABLE `pos_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `pos_inventory_reports`
--
ALTER TABLE `pos_inventory_reports`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pos_items`
--
ALTER TABLE `pos_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pos_order`
--
ALTER TABLE `pos_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pos_payment`
--
ALTER TABLE `pos_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pos_salesman`
--
ALTER TABLE `pos_salesman`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_supplier`
--
ALTER TABLE `pos_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `pos_users`
--
ALTER TABLE `pos_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pos_checkout_order`
--
ALTER TABLE `pos_checkout_order`
  MODIFY `checkout_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pos_cheque`
--
ALTER TABLE `pos_cheque`
  MODIFY `check_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_customer`
--
ALTER TABLE `pos_customer`
  MODIFY `customer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5390;

--
-- AUTO_INCREMENT for table `pos_inventory_reports`
--
ALTER TABLE `pos_inventory_reports`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pos_items`
--
ALTER TABLE `pos_items`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pos_item_category`
--
ALTER TABLE `pos_item_category`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pos_order`
--
ALTER TABLE `pos_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pos_payment`
--
ALTER TABLE `pos_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pos_salesman`
--
ALTER TABLE `pos_salesman`
  MODIFY `sm_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_settings`
--
ALTER TABLE `pos_settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_supplier`
--
ALTER TABLE `pos_supplier`
  MODIFY `supplier_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pos_users`
--
ALTER TABLE `pos_users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
