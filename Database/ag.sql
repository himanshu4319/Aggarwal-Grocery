-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 06:10 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `Username`, `Password`) VALUES
(1, 'himanshu', 'Hima2000'),
(2, 'himanshu', 'Hima2000');

-- --------------------------------------------------------

--
-- Table structure for table `categories_1`
--

CREATE TABLE `categories_1` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_1`
--

INSERT INTO `categories_1` (`id`, `image`, `categories`, `status`) VALUES
(2, 'rice.png', 'Rice', 1),
(5, 'Atta.png', 'Atta & Flour', 1),
(6, 'Pulses.png', 'Dals & Pulses', 1),
(7, 'oil.png', 'Oil & Ghee', 1),
(8, 'Spices.png', 'Spices', 1),
(9, 'Sugar.png', 'Sugar & Salt', 1),
(12, 'Sauce_noodles.png', 'Ketchups & Noodles', 1),
(13, 'tea&cofee.png', 'Tea & Coffee', 1),
(14, 'Detergent.png', 'Laundry Detergent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `Full_name` varchar(255) NOT NULL,
  `Email` text NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `Full_name`, `Email`, `Comments`) VALUES
(5, 'Himanshu Aggarwal', 'Abc@gmail.com', 'I think you need to Change the color of your website ');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `Email`) VALUES
(1, 'abc.com'),
(3, 'himanshuaggarwalgarg@gmail.com'),
(4, 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Product Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Payment_Status` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Email`, `Product_Id`, `Product Name`, `Quantity`, `Price`, `Address`, `Payment_Status`, `Status`) VALUES
(1, 'himanshuaggarwal.com', 4, 'Fortune  Basmati Rice - 1Kg', 3, 387, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'Cash On Delivery', 1),
(2, 'himanshuaggarwal.com', 3, 'ITC Aashirvaad Sugar Control Atta - 1 Kg', 1, 89, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'Cash On Delivery', 1),
(3, 'himanshuaggarwal.com', 22, 'Pillsburry Chakki Atta - 10 Kg', 1, 320, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'Cash On Delivery', 1),
(4, 'admin', 25, 'Daawat Traditional Basmati Rice 5Kg +1Kg Free ', 4, 4100, 'admin admin admin 110001 admin', 'Debit/Credit Card', 1),
(5, 'admin', 26, 'Daawat Biryani Rice 5Kg + 1Kg Free ', 4, 4388, 'admin admin admin 110001 admin', 'Debit/Credit Card', 1),
(6, 'admin', 24, 'Daawat Super Basmati - 5kg + 1kg', 4, 3000, 'admin admin admin 110001 admin', 'Debit/Credit Card', 1),
(7, 'admin', 27, 'Daawat Pulav Basmati Rice 5Kg + 1Kg free', 4, 2000, 'admin admin admin 110001 admin', 'Debit/Credit Card', 1),
(8, 'himanshuaggarwal.com', 31, 'Nestle Everyday Desi Ghee - 1Ltr', 1, 390, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'Cash On Delivery', 1),
(9, 'Himanshuaggarwal.com', 30, 'Fortune Rozana Basmati Rice 1Kg', 4, 300, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'PayTM', 1),
(10, 'Himanshuaggarwal.com', 31, 'Nestle Everyday Desi Ghee - 1Ltr', 3, 1170, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'PayTM', 1),
(11, 'Himanshuaggarwal.com', 45, 'Disano Penne Pasta - 1kg', 4, 480, 'House Number 12 , Sarabha nagar , Hoshiarpur road  near Bliss Public School , jalandhar Jalandhar 144004 Punjab', 'PayTM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Categories_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Categories_id`, `name`, `brand`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `status`) VALUES
(1, 'Atta & Flour', 'Chakki Fresh Atta - 10 Kg', 'Fortune', 349, 290, 50, 'Fortune_atta.png', '', '', 1),
(3, 'Atta & Flour', 'Aashirvaad Sugar Control Atta - 1 Kg', 'ITC', 100, 89, 98, 'sugar-atta.png', '', '', 1),
(4, 'Rice', ' Basmati Rice - 1Kg', 'Fortune', 165, 129, 100, 'Fortune_rice.png', '', '', 1),
(5, 'Oil & Ghee', 'Kachi Ghani Mustard oil - 5 Ltr', 'Fortune', 1144, 850, 50, 'Fortune_KG_oil.png', '', '', 1),
(6, 'Oil & Ghee', 'filtered Groundnut oil - 5Ltr ', 'Fortune', 1025, 950, 20, 'Fortune_Ground_nut.png', '', '', 1),
(7, 'Oil & Ghee', ' Pure Mustard Oil - 5 Ltr', 'Fortune', 1050, 950, 20, 'Fortune-pure.png', '', '', 1),
(8, 'Oil & Ghee', 'Saffola Gold - 5Ltr', '', 1090, 890, 25, 'Saffola_Gold.png', '', '', 1),
(9, 'Oil & Ghee', 'Sunflower oil - 5ltr', 'Fortune', 1000, 900, 50, 'Fortune_sunflower.png', '', '', 1),
(10, 'Dals & Pulses', 'Sampann Toor Dal - 1kg', 'Tata', 155, 140, 50, 'Tata_toor_dal.png', '', '', 1),
(11, 'Sugar & Salt', 'Sulphurless Sugar - 5Kg', 'Uttam', 350, 205, 200, 'uttam_sulphurless.png', '', '', 1),
(13, 'Oil & Ghee', 'Sunflower Oil - 1Ltr', 'Dhara', 215, 185, 20, 'Dhara_Sf.png', '', '', 1),
(14, 'Dals & Pulses', 'Sampann Kali Urad Dal', 'Tata', 150, 120, 100, 'urad_kali.png', '', '', 1),
(15, 'Dals & Pulses', 'Sampann Moong Dal - 1kg', 'Tata', 180, 140, 50, 'BIG-Moong-Dal.png', '', '', 1),
(16, 'Dals & Pulses', 'Sampann Masoor Dal - 1Kg', 'Tata', 145, 110, 89, 'Masoor-Dal.png', '', '', 1),
(17, 'Ketchups & Noodles', 'Maggi Special Masala Noodles - 70 gram', 'Nestle', 15, 12, 960, 'Special_masala.png', '', '', 1),
(18, 'Ketchups & Noodles', 'Maggi Atta Noodles - 70 gram ', 'Nestle', 24, 20, 480, 'Atta_noodles.png', '', '', 1),
(19, 'Ketchups & Noodles', 'Maggi 2 Minute Noodles - 70 Gram', 'Nestle', 12, 10, 1920, 'Simple_maggi.png', '', '', 1),
(20, 'Ketchups & Noodles', 'Yipee Magic Masala 70gram', 'Sunfeast', 15, 14, 1180, 'yummy.png', '', '', 1),
(21, 'Ketchups & Noodles', 'Maggi Tomato Ketchup - 1Kg', 'Nestle', 140, 120, 120, 'Tomato_ketchup.png', '', '', 1),
(22, 'Atta & Flour', 'Chakki Atta - 10 Kg', 'Pillsburry', 380, 320, 80, 'pilsbury_atta.png', '', '', 1),
(24, 'Rice', 'Super Basmati - 5kg + 1kg', 'Daawat', 950, 750, 10, 'Daawat_Super.png', '', '', 1),
(25, 'Rice', 'Traditional Basmati Rice 5Kg +1Kg Free ', 'Daawat', 1210, 1025, 10, 'Daawat_Traditional.png', '', '', 1),
(26, 'Rice', 'Biryani Rice 5Kg + 1Kg Free ', 'Daawat', 1300, 1097, 10, 'Daawat_Biryani.png', '', '', 1),
(27, 'Rice', 'Pulav Basmati Rice 5Kg + 1Kg free', 'Daawat', 625, 500, 10, 'Daawat_pulav.png', '', '', 1),
(28, 'Rice', 'Classic Rice 1 Kg ', 'India Gate', 193, 129, 100, 'Classic_rice.png', '', '', 1),
(29, 'Rice', 'Biryani Rice - 1Kg', 'Unity', 170, 130, 50, 'UNITY_Green.png', '', '', 1),
(30, 'Rice', 'Rozana Basmati Rice 1Kg', 'Fortune', 130, 75, 25, 'rozana_fortune_1kg.png', '', '', 1),
(31, 'Oil & Ghee', 'Everyday Desi Ghee - 1Ltr', 'Nestle', 500, 390, 12, 'nestle_desi_ghee.png', '', '', 1),
(32, 'Spices', 'Sampann Turmeric Powder - 200gm ', 'Tata', 60, 45, 50, 'Tata_turmeric.png', '', '', 1),
(33, 'Spices', 'Sampann Red  Chilly Powder - 500gm', 'Tata', 200, 140, 10, 'chilly_tata.png', '', '', 1),
(34, 'Spices', 'Sampann Coriander Powder 200gm ', 'Tata', 60, 40, 10, 'cori.png', '', '', 1),
(35, 'Rice', 'Brown Rice 1Kg', 'Daawat', 170, 154, 15, 'brown_rice_1kg.png', '', '', 1),
(36, 'Rice', 'Everyday Basmati Rice Full Grain - 5Kg ', 'Fortune', 740, 421, 20, 'Fortune_basmati_5kg.png', '', '', 1),
(37, 'Dals & Pulses', 'Aashirvaad Organic Chana dal 500gm', 'ITC', 105, 78, 20, 'aashirvaad_chana_dal.png', '', '', 1),
(38, 'Dals & Pulses', 'Aashirvaad Organic Arhar/Tur dal 500gm ', 'ITC', 115, 87, 15, 'Arhar_dal_aashirvad.png', '', '', 1),
(39, 'Sugar & Salt', 'Salt 1 Kg', 'Tata', 21, 18, 50, 'Tata_salt.png', '', '', 1),
(40, 'Sugar & Salt', 'Salt Lite 1 Kg', 'Tata', 40, 35, 50, 'Tata_salt_lite.png', '', '', 1),
(41, 'Tea & Coffee', 'Tea Premium - 500gm', 'Tata', 235, 190, 10, 'tata_tea_premium.png', '', '', 1),
(42, 'Tea & Coffee', 'Tea Premium - 1 Kg', 'Tata', 500, 375, 20, 'premium.png', '', '', 1),
(43, 'Atta & Flour', 'Aashirvaad Atta - 10Kg', 'ITC', 380, 330, 50, 'aashirvaad_atta.png', '', '', 1),
(44, 'Sugar & Salt', 'Pink Salt - 1Kg', 'Puro', 110, 98, 50, 'Puro.png', '', '', 1),
(45, 'Ketchups & Noodles', 'Penne Pasta - 1kg', 'Disano', 270, 120, 20, 'penne.png', '', '', 1),
(46, 'Ketchups & Noodles', 'Fusilli Pasta - 1Kg', 'Disano', 270, 135, 20, 'fusilli.png', '', '', 1),
(47, 'Ketchups & Noodles', 'Fresh Tomato Ketchup - 950gm', 'Kissan', 120, 100, 60, 'Kissan_ftk.png', '', '', 1),
(48, 'Laundry Detergent', 'Detergent Powder 6Kg + 2Kg Free', 'Tide', 725, 650, 20, 'Tide_6kg.png', '', '', 1),
(49, 'Laundry Detergent', 'Detergent Powder - 4Kg', 'Ariel', 630, 530, 20, 'Ariel.png', '', '', 1),
(50, 'Laundry Detergent', 'Matic Top Load - 2l', 'Surf Excel', 370, 300, 20, 'Surf_Excel_top_2l.png', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_1`
--

CREATE TABLE `register_1` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `Gen` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Email` text NOT NULL,
  `mobile` text NOT NULL,
  `almo` text NOT NULL,
  `pass` text NOT NULL,
  `Address1` text NOT NULL,
  `Address2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `Pincode` int(11) NOT NULL,
  `State` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_1`
--

INSERT INTO `register_1` (`id`, `fname`, `lname`, `Gen`, `DOB`, `Email`, `mobile`, `almo`, `pass`, `Address1`, `Address2`, `city`, `Pincode`, `State`) VALUES
(1, 'admin', 'admin', 'Male', '2000-07-29', 'admin', '2147483647', '0', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', 110001, 'admin'),
(3, 'Himanshu', 'Aggarwal', 'Male', '2000-07-29', 'himanshuaggarwal.com', '8837787822', '', 'e807f1fcf82d132f9bb018ca6738a19f', 'House Number 12 , Sarabha nagar , Hoshiarpur road ', 'near Bliss Public School , jalandhar', 'Jalandhar', 144004, 'Punjab'),
(4, 'Arun', 'Kumar', 'Male', '1967-07-18', 'Arunkumar5234', '9872815822', '6283561496', '48047054b02cda2b6726d35017cfc557', 'b-9 Gauri Collection', 'near Sharma Sweets', 'jalandhar', 144004, 'Punjab'),
(5, 'Demo1', 'Demo', 'Male', '2011-11-11', 'demo', '9887766554', '8877665544', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 'demo', 'demo', 110001, 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_1`
--
ALTER TABLE `categories_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_1`
--
ALTER TABLE `register_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories_1`
--
ALTER TABLE `categories_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `register_1`
--
ALTER TABLE `register_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
