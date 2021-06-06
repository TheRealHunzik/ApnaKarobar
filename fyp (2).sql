-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 04:30 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(23) NOT NULL,
  `admin_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_pic`) VALUES
(1000000, 'Waqar Ali', 'alyhunzik@gmail.com', 'aquamarine8162', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `stock_id`, `user_id`, `site_id`, `quantity`, `total_sum`) VALUES
(3, 34, 5, 9, 1, 0),
(5, 34, 12, 9, 1, 0),
(6, 34, 12, 9, 1, 0),
(7, 34, 12, 9, 1, 0),
(8, 34, 12, 9, 1, 0),
(9, 34, 12, 9, 1, 0),
(25, 10, 12, 1, 1, 0),
(26, 21, 1, 3, 1, 0),
(27, 34, 2, 9, 2, 0),
(28, 21, 2, 3, 1, 0),
(29, 38, 1, 1, 2, 0),
(30, 7, 1, 1, 3, 0),
(33, 21, 2, 3, 1, 0),
(35, 23, 2, 3, 1, 0),
(36, 26, 2, 3, 1, 0),
(37, 23, 1, 3, 1, 0),
(38, 40, 5, 2, 2, 0),
(41, 1, 3, 1, 2, 0),
(43, 22, 3, 3, 1, 0),
(44, 21, 3, 3, 1, 0),
(45, 29, 1, 5, 1, 0),
(46, 33, 1, 5, 1, 0),
(47, 1, 1, 1, 1, 0),
(48, 21, 1, 3, 1, 0),
(50, 6, 5, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(500) NOT NULL,
  `catagory_Description` varchar(500) NOT NULL,
  `catagory_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`, `catagory_Description`, `catagory_pic`) VALUES
(1, 'Food and Drinks', 'this catagory include all food  realted items and shops like restaurants Fast Food Huts and Brands', 'Food_and_Drinks.jpg'),
(2, 'Laptop and Accesories', 'this catagory include all Laptop related items and shops like Small Dealers and Franchises', 'Laptop_and_Accesories.jpg'),
(3, 'Clothes and Wears', 'this catagory include all Wearable Items of local and international Brands', 'Clothes_and_Wears.jpg'),
(4, 'Mobiles and Accessories', 'this catagory include all Mobile related items and shops like Small Dealers and Franchises', 'Mobiles_and_Accessories.jpg'),
(5, 'Footwears', 'this catagory include all Shoes realted items of local and international Brands', 'Footwears.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(200) NOT NULL,
  `dispatch_date` date NOT NULL,
  `delivery_Date` date NOT NULL,
  `conNo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`, `dispatch_date`, `delivery_Date`, `conNo`) VALUES
(2, 'Waqar Ali', '2018-12-12', '2018-12-14', 'AHSSD3235FSEFS'),
(3, 'Ahmad Faraz', '2018-12-11', '2018-12-22', 'HIUDWE34545'),
(4, 'Waqar Ali', '2018-12-09', '2018-12-17', 'JIDPIO343sa'),
(5, 'Waqar Ali', '2018-12-09', '2018-12-17', 'JIDPIO343sa'),
(6, 'Waqar Ali', '2018-12-09', '2018-12-17', 'JIDPIO343sa'),
(7, 'Sheikh Asim', '2018-12-20', '2018-12-08', 'HUHFEFNJ234DHU'),
(8, 'Adnan Khan', '2018-12-12', '2018-12-27', 'UIFOFNO767'),
(9, 'Sheikh asim', '2018-12-06', '2018-12-06', 'asfmnkj2343');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `amount` float NOT NULL,
  `order_addtress` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `payment_method`, `payment_id`, `site_id`, `delivery_id`, `order_date`, `amount`, `order_addtress`, `status`) VALUES
(4, 1, 'Cash On Delivery', 0, 1, 6, '2018-12-12', 600, 'Street No 3 Attock Punjab', 'dispatched'),
(5, 2, 'Cash On Delivery', 0, 9, 0, '2018-12-12', 0, 'CHongra Astore Gilgit-Baltistan', 'pending'),
(6, 1, 'Cash On Delivery', 0, 1, 8, '2018-12-12', 5500, 'Hazro Attock CIty Punjab', 'dispatched'),
(7, 5, 'Cash On Delivery', 0, 1, 7, '2018-12-13', 800, 'Street No 3  Astore Punjab', 'dispatched'),
(8, 1, 'Cash On Delivery', 0, 3, 0, '2018-12-14', 0, 'Street No 3 Attock Punjab', 'pending'),
(9, 5, 'Cash On Delivery', 0, 2, 0, '2018-12-14', 140000, 'Kamra Attock Punjab', 'pending'),
(10, 3, 'Cash On Delivery', 0, 1, 9, '2018-12-14', 120000, 'Hazro City Attock  Punjab', 'dispatched'),
(11, 3, 'Cash On Delivery', 0, 3, 0, '2018-12-14', 0, 'Hazro Attock Attock City Punjab', 'pending'),
(12, 3, 'Cash On Delivery', 0, 3, 0, '2018-12-14', 0, 'Faqooz-e-azam colony Attock Punjab', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `stock_id`, `quantity`, `amount`) VALUES
(4, 11, 2, 600),
(5, 34, 2, 0),
(6, 38, 2, 4000),
(6, 7, 3, 1500),
(7, 9, 2, 800),
(8, 21, 1, 1000),
(9, 40, 2, 140000),
(10, 1, 2, 120000),
(11, 22, 1, 900),
(12, 22, 1, 900);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_gross` float NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payer_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_catagoryid` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_catagoryid`, `product_description`, `product_pic`) VALUES
(1, 4, 'Mobile', 'Mobile.jpg'),
(2, 4, 'Ear Phones', 'Ear_Phones.jpg'),
(3, 4, 'Head Phones', 'Head_Phones.jpg'),
(4, 2, 'Laptop', 'Laptop.jpg'),
(5, 2, 'Head Phone', 'Head_Phone.jpg'),
(6, 2, 'Mouse', 'Mouse1.jpg'),
(7, 1, 'Pizza', 'Pizza.jpg'),
(8, 1, 'Burger', 'Burger.jpg'),
(9, 2, 'keyboard ', 'keyboard_.jpg'),
(10, 1, 'French Fries ', 'French_Fries_.jpg'),
(11, 3, 'T-Shirt', 'T-Shirt.jpg'),
(12, 3, 'Pant', 'Pant.jpg'),
(13, 3, 'Coat ', 'Coat_.jpg'),
(14, 5, 'Joggers', 'Joggers.jpg'),
(15, 5, 'Formal Shoes ', 'Formal_Shoes_.jpg'),
(16, 5, 'Slippers ', 'Slippers_.jpg'),
(17, 2, 'Cake', 'Cake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `productmeta_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datatype` varchar(12) NOT NULL,
  `lenght` int(11) NOT NULL,
  `max_size` int(11) NOT NULL,
  `required` varchar(100) NOT NULL DEFAULT 'TRUE',
  `placedolder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`productmeta_id`, `product_id`, `name`, `datatype`, `lenght`, `max_size`, `required`, `placedolder`) VALUES
(1, 1, 'Company Name', 'text', 100, 100, '0', 'e.g Samsung '),
(2, 1, 'Model ', 'text', 100, 100, '0', 'Note 9'),
(3, 1, 'Screen Size', 'text', 100, 100, '0', 'e.g 5.2'),
(4, 1, 'MEMORY', 'text', 100, 100, '0', 'e.g 64 GB'),
(5, 1, 'RAM', 'number', 100, 100, '0', 'e.g 4 GB'),
(6, 1, 'OS', 'text', 100, 100, '0', 'e.g IOS '),
(7, 1, 'Camera ', 'text', 100, 100, '0', 'e.g Yes/No '),
(8, 1, 'Wi-Fi', 'text', 100, 100, '0', 'e.g Yes/No'),
(9, 1, 'Infrared', 'text', 100, 100, '0', 'e.g Yes/No'),
(10, 1, 'LAUNCH Date', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(11, 1, 'color ', 'text', 100, 100, '0', 'e.g Black'),
(12, 1, 'Price ', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(13, 2, 'Company Name', 'text', 100, 100, '0', 'e.g Samsung'),
(14, 2, 'Model ', 'text', 100, 100, '0', 'e.g xyz'),
(15, 2, 'NETWORK Technology', 'text', 100, 100, '0', 'e.g Wireless/ Wired'),
(16, 2, 'LAUNCH Date', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(17, 2, 'Color', 'text', 100, 100, '0', 'e.g Red'),
(18, 2, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(19, 3, 'Company Name', 'number', 100, 100, '0', 'e.g Sony'),
(20, 3, 'Model ', 'number', 100, 100, '0', 'e.g xyz'),
(21, 3, 'NETWORK Technology', 'text', 100, 100, '0', 'e.g Wireless/ Wired'),
(22, 3, 'LAUNCH Date', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(23, 3, 'color', 'text', 100, 100, '0', 'e.g Black'),
(24, 3, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(25, 4, 'Company Name', 'text', 100, 100, '0', 'e.g HP'),
(26, 4, 'Model ', 'text', 100, 100, '0', 'e.g Elitebook'),
(27, 4, 'Screen Size', 'text', 100, 100, '0', 'e.g 15 inch '),
(28, 4, 'MEMORY', 'text', 100, 100, '0', 'e.g 1TB'),
(29, 4, 'RAM', 'text', 100, 100, '0', 'e.g 4GB'),
(30, 4, 'OS', 'text', 100, 100, '0', 'e.g Windows'),
(31, 4, 'Camera ', 'text', 100, 100, '0', 'e.g Yes/No'),
(32, 4, 'Wi-Fi', 'text', 100, 100, '0', 'e.g Yes/No'),
(33, 4, 'LAUNCH Date ', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(34, 4, 'color', 'text', 100, 100, '0', 'e.g Black'),
(35, 4, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(36, 5, 'Company Name', 'text', 100, 100, '0', 'e.g Samsung'),
(37, 5, 'Model ', 'text', 100, 100, '0', 'e.gxyz'),
(38, 5, 'NETWORK Technology', 'text', 100, 100, '0', 'e.g Wireless/ Wired'),
(39, 5, 'color', 'text', 100, 100, '0', 'e.g Red'),
(40, 5, 'Launch Date', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(41, 5, 'Price ', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(42, 6, 'Company Name', 'text', 100, 100, '0', 'e.g Hp'),
(43, 6, 'Model ', 'text', 100, 100, '0', 'e.g Hp'),
(44, 6, 'Wi-Fi', 'text', 100, 100, '0', 'e.g Yes/No '),
(45, 6, 'Infrared', 'text', 100, 100, '0', 'e.g Yes/No'),
(46, 6, 'NETWORK Technology', 'text', 100, 100, '0', 'e.g Wireless/ Wired'),
(47, 6, 'Color', 'text', 100, 100, '0', 'e.g Black'),
(48, 6, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(49, 7, 'Size', 'text', 100, 100, '0', 'e.g Large'),
(50, 7, 'Flavor ', 'text', 100, 100, '0', 'e.g Chees '),
(51, 7, 'Toppings', 'text', 100, 100, '0', 'e.g 3'),
(52, 7, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(53, 8, 'Flavor ', 'text', 100, 100, '0', 'e.g Chicken '),
(54, 8, 'Price', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(55, 9, 'Company Name', 'text', 100, 100, '0', 'e.g Hp'),
(56, 9, 'Model ', 'text', 100, 100, '0', 'e.g xyz'),
(57, 9, 'Wireless', 'text', 100, 100, '0', 'e.g Yes/No'),
(58, 9, 'Launch Date', 'text', 100, 100, '0', 'e.g 12-12-2018'),
(59, 9, 'color ', 'text', 100, 100, '0', 'e.g Black'),
(60, 9, 'Price ', 'text', 100, 100, '0', 'e.g R.S 10,000'),
(61, 10, 'Fries Categories ', 'text', 100, 100, '0', 'e.g Plain Fries or Masala Fries'),
(62, 10, 'Price', 'text', 100, 100, '0', 'e.g R.S 1000'),
(63, 11, 'Brand Name', 'text', 100, 100, '0', 'e.g Outfitters '),
(64, 11, 'Size ', 'text', 100, 100, '0', 'e.g S/M/L/XL'),
(65, 11, 'Color', 'text', 100, 100, '0', 'e.g Blue'),
(66, 11, 'Price', 'text', 100, 100, '0', 'e.g R.S 1200'),
(67, 11, 'Gender', 'text', 100, 100, '0', 'e.g Male /Female'),
(68, 12, 'Brand Name', 'text', 100, 100, 'True', 'e.g Outfitters'),
(69, 12, 'Length', 'text', 100, 100, 'True', 'e.g 43 '),
(70, 12, 'Color', 'text', 100, 100, 'True', 'e.g Black'),
(71, 12, 'Price', 'text', 100, 100, '', 'e.g R.S 2000'),
(72, 13, 'Brand Name', 'text', 100, 100, 'True', 'e.g Outfitters '),
(73, 13, 'Size', 'text', 100, 100, 'True', 'e.g S/M/L/XL'),
(74, 13, 'Color', 'text', 100, 100, 'True', 'e.g Brown'),
(75, 13, 'Gender', 'text', 100, 100, 'True', 'e.g Male/Female'),
(76, 13, 'Price', 'text', 100, 100, 'True', 'e.g R.S 1000'),
(77, 14, 'Brand Name', 'text', 100, 100, 'True', 'e.g Nike'),
(78, 14, 'Size', 'text', 100, 100, 'True', 'e.g 9'),
(79, 14, 'Color', 'text', 100, 100, 'True', 'e.g Black'),
(80, 14, 'Price', 'text', 100, 100, 'True', 'e.g R.S 10,000'),
(81, 15, 'Brand Name ', 'text', 100, 100, 'True', 'e.g Urban Sole '),
(82, 15, 'Size', 'text', 100, 100, 'True', 'e.g 9'),
(83, 15, 'color ', 'text', 100, 100, 'True', 'e.g black '),
(84, 15, 'Price', 'text', 100, 100, 'True', 'e.g R.s 1000'),
(85, 16, 'Brand Name ', 'text', 100, 100, 'True', 'e.g NIke'),
(86, 16, 'Color', 'text', 100, 100, 'True', 'e.g black'),
(87, 16, 'size', 'text', 100, 100, 'True', 'e.g 9'),
(88, 16, 'Price', 'text', 100, 100, '', 'e.g 1000'),
(89, 17, 'Price', 'number', 7, 76, 'True', 'ijoh');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `site_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_slogan` varchar(200) NOT NULL,
  `site_mobile` bigint(15) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_lat` float NOT NULL,
  `site_long` float NOT NULL,
  `site_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `user_id`, `theme_id`, `catagory_id`, `site_title`, `site_slogan`, `site_mobile`, `site_email`, `site_logo`, `site_lat`, `site_long`, `site_view`) VALUES
(1, 1, 1, 2, 'A Tech ', 'Customer Come First', 2147483647, 'alyhunzik@gmail.com', 'A_Tech_.png', 324324, 3423420, 0),
(2, 3, 1, 4, 'MObicity', 'Probably the Best Phones in the World', 2147483647, 'adnankhan7424@outlook.com', 'MObicity.jpg', 324234, 34234200, 1),
(3, 2, 3, 1, 'McDonalds', 'here it is', 3445790784, 'adnankhan7424@outlook.com', '_McDonalds.png', 33.789, 72.3595, 4),
(4, 2, 3, 5, 'Shoe Fly', 'Color dream shoes', 2147483647, 'adnankhan7424@outlook.com', 'Shoe_Fly.jpg', 423423, 4234, 0),
(5, 2, 3, 3, 'Ever After Boutique', 'Discover your world', 2147483647, 'adnankhan7424@outlook.com', 'Ever_After_Boutique.jpg', 3423420, 342342, 0),
(6, 5, 1, 1, 'Bravo Foods', 'Best pulao Kabab', 2147483647, 'bravofood12@gmail.com', 'Bravo_Foods.png', 33.7708, 72.3542, 1),
(7, 7, 1, 1, 'Savor Foods', 'Oraganic Foods', 2147483647, 'savorfood.pak@gmail.com', 'Savor_Foods.png', 33.7701, 72.3575, 0),
(8, 4, 3, 1, 'Pizza Hut', 'We Love Pizza', 2147483647, 'hut_pizza@gmail.com', 'Pizza_Hut.png', 33.7776, 72.3595, 0),
(9, 10, 1, 2, 'Lenovo Computer', 'Innovation Never Stands Still', 3445783432, 'lenovo_com@gmail.com', 'Lenovo_Computer.png', 33.7838, 72.3515, 0),
(10, 11, 3, 4, 'The Hitech Mobiles', 'mobiles at home', 3453729523, 'hiteach@gmail.com', 'The_Hitech_Mobiles.png', 33.7839, 72.3516, 0),
(11, 26, 3, 5, 'Melow Shoes', 'Juu Achiyoo', 3402372158, 'atifhunzai123@gmail.com', 'Melow_Shoes.jpg', 33.7839, 72.3516, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_review`
--

CREATE TABLE `site_review` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `total_stars` int(11) NOT NULL DEFAULT '0',
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_social`
--

CREATE TABLE `site_social` (
  `site_id` int(11) NOT NULL,
  `site_facebook` varchar(1000) NOT NULL,
  `site_google` varchar(1000) NOT NULL,
  `site_pintrest` varchar(1000) NOT NULL,
  `site_twitter` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockmain`
--

CREATE TABLE `stockmain` (
  `stock_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_des` varchar(200) NOT NULL,
  `stock_pic` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_price` int(11) NOT NULL DEFAULT '0',
  `stock_dis` int(11) NOT NULL DEFAULT '0',
  `rating` float NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockmain`
--

INSERT INTO `stockmain` (`stock_id`, `site_id`, `product_id`, `stock_des`, `stock_pic`, `quantity`, `stock_price`, `stock_dis`, `rating`) VALUES
(1, 1, 4, 'HP Spectra X360 Core i3  3rd Genration 4GB RAM 250 GB hard DIsk ', 'HP_HP_Spectre_x360_Laptop_13_Inch_256_GB_SSD_8_GB_Windows_Yes_Yes_12-11-2018_Silver_75999919060.jpg', 10, 60000, 2000, 3),
(2, 1, 4, 'HP Laptop HP ProBook 440 G5 model Notebook PC 15 500 GB hardisk 8 RAM', 'HP_HP_ProBook_440_G5_Notebook_PC_15_500_8_Windows_Yes_Yes_12-11-2018_Black_75999541344.png', 6, 58000, 1000, 3),
(3, 1, 4, 'HP Pavilion Laptop 15 500 GB HArddsik 8GB RAM Windows ', 'HP_Pavilion_Laptop_15_500_8_Windows_Yes_Yes_12-11-2018_Black_75999722785.png', 12, 40000, 500, 3),
(4, 1, 5, 'Sony headphones  Z1R Premium Wired Black ', 'Sony_Z1R_Premium_Wired_Black_12-12-2018_10000156923.jpg', 21, 2000, 100, 3),
(5, 1, 5, 'Sony MDR-Z7 Headphones Wired Black 12-12-2018 10000', 'Sony_MDR-Z7_Headphones_Wired_Black_12-12-2018_10000667754.jpg', 10, 500, 10, 3),
(6, 1, 5, 'Sony WH-1000XM3 Wireless Noise Cancelling Wireless Black 12-12-2018 10000', 'Sony_WH-1000XM3_Wireless_Noise_Cancelling_Wireless_Black_12-12-2018_10000348140.jpg', 3, 1000, 200, 3),
(7, 1, 6, 'Logitech M185  No  No Wireless  Black 1000', 'Logitech_M185_No_No_Wireless_Black_1000277885.jpg', 24, 500, 50, 3),
(8, 1, 6, 'Logitech M187 No No  Wireless Black 1000', 'Logitech_M187_No_No_Wireless_Black_1000990431.jpg', 44, 500, 30, 3),
(9, 1, 6, 'Logitech M100 No No Wired Black 1000', 'Logitech_M100_No_No_Wired_Black_1000878275.jpg', 0, 400, 10, 3),
(10, 1, 9, 'Logitech  Craft Yes 12-12-2018 Black 1500', 'Logitech_Craft_Yes_12-12-2018_Black_1500458164.jpg', 0, 700, 65, 3),
(11, 1, 9, 'HP OMEN 1100 No  12-12-2018 Black 3000', 'HP_OMEN_1100_No_12-12-2018_Black_3000641951.png', 0, 300, 40, 3),
(12, 4, 14, 'Nike 9 Wolf Grey 4800', 'Nike_9_Wolf_Grey_480078243.jpg', 0, 599, 100, 3),
(13, 4, 14, 'Adidas YEEZY  9 White 10000', 'Adidas_YEEZY_9_White_10000845816.jpg', 0, 1599, 299, 3),
(14, 4, 14, 'Nike 9 White  10000', 'Nike_9_White_1000050538.jpg', 0, 2000, 190, 3),
(15, 4, 14, 'Urban Sole  9 Black  10000', 'Urban_Sole_9_Black_10000128502.jpg', 0, 6000, 1500, 3),
(16, 4, 15, 'OXFORD  8 brown 10000', 'OXFORD_8_brown_10000150009.jpg', 0, 4999, 500, 3),
(17, 4, 15, 'OXFORD  9 black 10000', 'OXFORD_9_black_10000519852.jpg', 0, 9000, 1200, 3),
(18, 4, 16, 'ASLISA Black  9 2000', 'ASLISA_Black_9_2000461921.jpg', 0, 600, 50, 3),
(19, 4, 16, 'Reef Black  8 1000', 'Reef_Black_8_1000596914.jpg', 0, 500, 50, 3),
(20, 4, 16, 'Clootess Black  9 1000', 'Clootess_Black_9_100017668.jpg', 0, 600, 200, 3),
(21, 3, 7, 'Large Chicken Tikka Chicken Tikka 1000', 'Large_Chicken_Tikka_Chicken_Tikka_1000315350.jpg', 0, 1000, 0, 3),
(22, 3, 7, 'Medium   Butternut Squash and Crispy Sage Chicken Tikka 1000', 'Medium_Butternut_Squash_and_Crispy_Sage_Chicken_Tikka_1000241952.jpg', 0, 900, 120, 3),
(23, 3, 8, 'Chicken Burger 1000', 'Chicken_Burger_1000859885.jpg', 0, 200, 30, 3),
(24, 3, 8, 'Zinger Burger 1000', 'Zinger_Burger_1000704642.jpg', 0, 300, 50, 3),
(25, 3, 10, 'SAVORY OVEN FRENCH FRIES 1000', 'SAVORY_OVEN_FRENCH_FRIES_100056971.jpg', 0, 500, 50, 3),
(26, 3, 10, 'BEEF CHILI-CHEESE FRIES 1000', 'BEEF_CHILI-CHEESE_FRIES_1000145363.jpg', 0, 400, 50, 3),
(27, 5, 11, 'Outfitters M Yellow  1200 Male ', 'Outfitters_M_Yellow_1200_Male_13452.jpg', 0, 600, 90, 3),
(28, 5, 11, 'Urban Outfitters L White 1200 Male ', 'Urban_Outfitters_L_White_1200_Male_132221.jpg', 0, 800, 50, 3),
(29, 5, 11, 'Outfitters L White 1200 Female', 'Outfitters_L_White_1200_Female352864.jpg', 0, 600, 70, 3),
(30, 5, 12, 'Outfitters 42 White 5000', 'Outfitters_42_White_5000219536.jpg', 0, 1200, 210, 3),
(31, 5, 12, 'Outfitters 40 Green 5000', 'Outfitters_40_Green_5000334106.jpg', 0, 900, 320, 3),
(32, 5, 13, 'Outfitters L Blue Male  5000', 'Outfitters_L_Blue_Male_5000763237.jpg', 0, 4000, 230, 3),
(33, 5, 13, 'Outfitters M White Male  5000', 'Outfitters_M_White_Male_5000334164.jpg', 0, 2800, 500, 3),
(34, 9, 4, 'Compaq Elite 13 500 4 Linux Yes Yes 12-12-2018 Red 30000', 'Compaq_Elite_13_500_4_Linux_Yes_Yes_12-12-2018_Red_30000547909.png', 0, 35000, 4399, 3),
(35, 3, 8, 'Chicken Egg Kebab 100', 'Chicken_Egg_Kebab_100799650.jpg', 0, 355, 10, 3),
(38, 1, 9, 'New Stylish Keyboard For Home Use', 'New_Stylish_Keyboard_For_Home_Use157648.png', 0, 2000, 100, 3),
(39, 11, 14, 'Orginal Nike Jogger Gurantee', 'Orginal_Nike_Jogger_Gurantee965513.jpg', 0, 2000, 200, 3),
(40, 2, 1, 'Samsung galaxy A7 65GB ROM 6GB RAM', 'Samsung_galaxy_A7_65GB_ROM_6GB_RAM102912.jpg', 0, 70000, 3000, 3),
(41, 2, 1, 'Apple I Phone X, ROM 128 GB, RAM 6 GB', 'Apple_I_Phone_X,_ROM_128_GB,_RAM_6_GB117414.jpg', 0, 115000, 5000, 3),
(42, 9, 4, 'HP Laptop Screen SIze 15 Inch,Windows Based Operating System', 'HP_Laptop_Screen_SIze_15_Inch,Windows_Based_Operating_System520076.png', 0, 70000, 5000, 3),
(43, 9, 4, 'Hp Laptop Screeen Size 15 Inch, Windows Os,Color White', 'Hp_Laptop_Screeen_Size_15_Inch,_Windows_Os,Color_White373174.png', 0, 100000, 5000, 3),
(44, 9, 6, 'PC Gaming Mouse Black in Color.', 'PC_Gaming_Mouse_Black_in_Color.617196', 0, 2000, 100, 3),
(45, 9, 6, 'Dell Wired Mouse in Blue Color.', 'Dell_Wired_Mouse_in_Blue_Color.654075', 0, 1500, 100, 3),
(46, 9, 5, 'Beats Wireless Headphone in Blue color.', 'Beats_Wireless_Headphone_in_Blue_color.297640', 0, 20000, 500, 3),
(47, 9, 9, 'Gaming Keyboard in Black Color wired', 'Gaming_Keyboard_in_Black_Color_wired828171.jpg', 0, 5000, 200, 3),
(48, 9, 5, 'Sony Premium wired Headphone in Black Color.', 'Sony_Premium_wired_Headphone_in_Black_Color.741263', 0, 20000, 500, 3),
(49, 9, 6, 'Wireless Mouse in Black Color.', 'Wireless_Mouse_in_Black_Color.842525', 0, 2000, 100, 3),
(50, 8, 7, 'Cheese Pizza with  3 Topping ', 'Cheese_Pizza_with_3_Topping_727692.jpg', 0, 2000, 100, 3),
(51, 8, 8, 'Chicken Burger ', 'Chicken_Burger_624536.jpg', 0, 1000, 50, 3),
(52, 8, 10, 'French Fries with Drink', 'French_Fries_with_Drink55613.jpg', 0, 1500, 50, 3),
(53, 8, 7, 'Popirani Piza', 'Popirani_Piza150840.jpg', 0, 2000, 150, 3),
(54, 2, 1, 'I Phone X 256 GB in White Color ', 'I_Phone_X_256_GB_in_White_Color_228506.jpg', 0, 120000, 2000, 3),
(55, 6, 7, 'Paperino Logo', 'Paperino_Logo218626.jpg', 0, 1200, 200, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stock_review`
--

CREATE TABLE `stock_review` (
  `user_id` int(11) NOT NULL,
  `rated_stars` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `total_stars` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_review`
--

INSERT INTO `stock_review` (`user_id`, `rated_stars`, `stock_id`, `total_stars`, `comment`) VALUES
(1, 4, 11, 5, 'good'),
(2, 5, 34, 5, 'good'),
(1, 5, 38, 5, 'good'),
(1, 5, 7, 5, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `stock_value`
--

CREATE TABLE `stock_value` (
  `productmeta_id` int(11) NOT NULL,
  `value` varchar(1000) NOT NULL,
  `stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_value`
--

INSERT INTO `stock_value` (`productmeta_id`, `value`, `stock_id`) VALUES
(25, 'HP', 1),
(26, 'HP Spectre x360 Laptop', 1),
(27, '13 Inch ', 1),
(28, ' 256 GB SSD ', 1),
(29, '8 GB', 1),
(30, 'Windows ', 1),
(31, 'Yes', 1),
(32, 'Yes', 1),
(33, '12-11-2018', 1),
(34, 'Silver', 1),
(35, '75999', 1),
(25, 'HP', 2),
(26, 'HP ProBook 440 G5 Notebook PC', 2),
(27, '15', 2),
(28, '500', 2),
(29, '8', 2),
(30, 'Windows', 2),
(31, 'Yes', 2),
(32, 'Yes', 2),
(33, '12-11-2018', 2),
(34, 'Black', 2),
(35, '75999', 2),
(25, 'HP', 3),
(26, 'Pavilion Laptop', 3),
(27, '15', 3),
(28, '500', 3),
(29, '8', 3),
(30, 'Windows ', 3),
(31, 'Yes', 3),
(32, 'Yes', 3),
(33, '12-11-2018', 3),
(34, 'Black', 3),
(35, '75999', 3),
(36, 'Sony ', 4),
(37, 'Z1R Premium', 4),
(38, 'Wired', 4),
(39, 'Black', 4),
(40, '12-12-2018', 4),
(41, '10000', 4),
(36, 'Sony', 5),
(37, 'MDR-Z7 Headphones', 5),
(38, 'Wired', 5),
(39, 'Black', 5),
(40, '12-12-2018', 5),
(41, '10000', 5),
(36, 'Sony', 6),
(37, 'WH-1000XM3 Wireless Noise Cancelling', 6),
(38, 'Wireless', 6),
(39, 'Black', 6),
(40, '12-12-2018', 6),
(41, '10000', 6),
(42, 'Logitech', 7),
(43, 'M185 ', 7),
(44, 'No ', 7),
(45, 'No', 7),
(46, 'Wireless ', 7),
(47, 'Black', 7),
(48, '1000', 7),
(42, 'Logitech', 8),
(43, 'M187', 8),
(44, 'No', 8),
(45, 'No ', 8),
(46, 'Wireless', 8),
(47, 'Black', 8),
(48, '1000', 8),
(42, 'Logitech', 9),
(43, 'M100', 9),
(44, 'No', 9),
(45, 'No', 9),
(46, 'Wired', 9),
(47, 'Black', 9),
(48, '1000', 9),
(55, 'Logitech ', 10),
(56, 'Craft', 10),
(57, 'Yes', 10),
(58, '12-12-2018', 10),
(59, 'Black', 10),
(60, '1500', 10),
(55, 'HP', 11),
(56, 'OMEN 1100', 11),
(57, 'No ', 11),
(58, '12-12-2018', 11),
(59, 'Black', 11),
(60, '3000', 11),
(77, 'Nike', 12),
(78, '9', 12),
(79, 'Wolf Grey', 12),
(80, '4800', 12),
(77, 'Adidas YEEZY ', 13),
(78, '9', 13),
(79, 'White', 13),
(80, '10000', 13),
(77, 'Nike', 14),
(78, '9', 14),
(79, 'White ', 14),
(80, '10000', 14),
(77, 'Urban Sole ', 15),
(78, '9', 15),
(79, 'Black ', 15),
(80, '10000', 15),
(81, 'OXFORD ', 16),
(82, '8', 16),
(83, 'brown', 16),
(84, '10000', 16),
(81, 'OXFORD ', 17),
(82, '9', 17),
(83, 'black', 17),
(84, '10000', 17),
(85, 'ASLISA', 18),
(86, 'Black ', 18),
(87, '9', 18),
(88, '2000', 18),
(85, 'Reef', 19),
(86, 'Black ', 19),
(87, '8', 19),
(88, '1000', 19),
(85, 'Clootess', 20),
(86, 'Black ', 20),
(87, '9', 20),
(88, '1000', 20),
(49, 'Large', 21),
(50, 'Chicken Tikka', 21),
(51, 'Chicken Tikka', 21),
(52, '1000', 21),
(49, 'Medium ', 22),
(50, ' Butternut Squash and Crispy Sage', 22),
(51, 'Chicken Tikka', 22),
(52, '1000', 22),
(53, 'Chicken Burger', 23),
(54, '1000', 23),
(53, 'Zinger Burger', 24),
(54, '1000', 24),
(61, 'SAVORY OVEN FRENCH FRIES', 25),
(62, '1000', 25),
(61, 'BEEF CHILI-CHEESE FRIES', 26),
(62, '1000', 26),
(63, 'Outfitters', 27),
(64, 'M', 27),
(65, 'Yellow ', 27),
(66, '1200', 27),
(67, 'Male ', 27),
(63, 'Urban Outfitters', 28),
(64, 'L', 28),
(65, 'White', 28),
(66, '1200', 28),
(67, 'Male ', 28),
(63, 'Outfitters', 29),
(64, 'L', 29),
(65, 'White', 29),
(66, '1200', 29),
(67, 'Female', 29),
(68, 'Outfitters', 30),
(69, '42', 30),
(70, 'White', 30),
(71, '5000', 30),
(68, 'Outfitters', 31),
(69, '40', 31),
(70, 'Green', 31),
(71, '5000', 31),
(72, 'Outfitters', 32),
(73, 'L', 32),
(74, 'Blue', 32),
(75, 'Male ', 32),
(76, '5000', 32),
(72, 'Outfitters', 33),
(73, 'M', 33),
(74, 'White', 33),
(75, 'Male ', 33),
(76, '5000', 33),
(25, 'Compaq', 34),
(26, 'Elite', 34),
(27, '13', 34),
(28, '500', 34),
(29, '4', 34),
(30, 'Linux', 34),
(31, 'Yes', 34),
(32, 'Yes', 34),
(33, '12-12-2018', 34),
(34, 'Red', 34),
(35, '30000', 34),
(53, 'Chicken Egg Kebab', 35),
(54, '100', 35),
(55, 'Hp', 38),
(56, 'X32', 38),
(57, 'NO', 38),
(58, '12-12-2018', 38),
(59, 'Green', 38),
(60, '2000', 38),
(77, 'Nike', 39),
(78, '9', 39),
(79, 'Grey', 39),
(80, '2000', 39),
(1, 'Samsung', 40),
(2, 'A7', 40),
(3, '6.2', 40),
(4, '64', 40),
(5, '6', 40),
(6, 'Android', 40),
(7, 'Yes', 40),
(8, 'Yes', 40),
(9, 'No', 40),
(10, '10-2-2018', 40),
(11, 'Blue', 40),
(12, '70000', 40),
(1, 'Apple', 41),
(2, 'I Phone X', 41),
(3, '6.2', 41),
(4, '128', 41),
(5, '4', 41),
(6, 'IOS', 41),
(7, 'Yes', 41),
(8, 'Yes', 41),
(9, 'No ', 41),
(10, '12-10-2018', 41),
(11, 'Black', 41),
(12, '115000', 41),
(25, 'HP', 42),
(26, 'HP Spectre x360 ', 42),
(27, '15 ', 42),
(28, '500', 42),
(29, '4', 42),
(30, 'Windows', 42),
(31, 'Yes', 42),
(32, 'Yes', 42),
(33, '12-12-2018', 42),
(34, 'Black', 42),
(35, '70000', 42),
(25, 'HP', 43),
(26, 'Spectre x360 ', 43),
(27, '15 ', 43),
(28, '1', 43),
(29, '8', 43),
(30, 'Windows', 43),
(31, 'Yes', 43),
(32, 'No', 43),
(33, '12-12-2018', 43),
(34, 'White', 43),
(35, '100000', 43),
(42, 'Hp', 44),
(43, 'GR2', 44),
(44, 'No', 44),
(45, 'No', 44),
(46, 'Wired', 44),
(47, 'Black', 44),
(48, '2000', 44),
(42, 'Dell', 45),
(43, 'XY2', 45),
(44, 'No', 45),
(45, 'No', 45),
(46, 'Wired', 45),
(47, 'Blue', 45),
(48, '1500', 45),
(36, 'Beats', 46),
(37, 'XR-Studio', 46),
(38, 'Wireless', 46),
(39, 'Blue ', 46),
(40, '12-12-2017', 46),
(41, '20000', 46),
(55, 'Hp', 47),
(56, 'Spectra CR', 47),
(57, 'Wired', 47),
(58, '12-11-2017', 47),
(59, 'Black', 47),
(60, '5000', 47),
(36, 'Sony ', 48),
(37, 'Z1R Premium ', 48),
(38, 'Wired', 48),
(39, 'Black', 48),
(40, '12-12-2018', 48),
(41, '20000', 48),
(42, 'Hp', 49),
(43, 'Xt12', 49),
(44, 'No', 49),
(45, 'Yes', 49),
(46, 'Wireless', 49),
(47, 'Black', 49),
(48, '2000', 49),
(49, 'Large ', 50),
(50, 'Cheese', 50),
(51, '3', 50),
(52, '2000', 50),
(53, 'Chicken ', 51),
(54, '1000', 51),
(61, 'Masala French Fries ', 52),
(62, '1500', 52),
(49, 'X Large', 53),
(50, 'Popirani Piza ', 53),
(51, '3', 53),
(52, '2000', 53),
(1, 'Apple ', 54),
(2, 'I Phone X', 54),
(3, '5.5', 54),
(4, '64', 54),
(5, '4', 54),
(6, 'IOS', 54),
(7, 'Yes', 54),
(8, 'Yes', 54),
(9, 'No ', 54),
(10, '12-11-2017', 54),
(11, 'White ', 54),
(12, '120000', 54),
(49, 'Small', 55),
(50, 'Cheese', 55),
(51, '2', 55),
(52, '1200', 55);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(60) NOT NULL,
  `theme_link` varchar(1000) NOT NULL,
  `theme_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`, `theme_link`, `theme_pic`) VALUES
(1, 'themeone', 'theme/themeone', 'themeone.jpg'),
(3, 'themetwo', 'theme/themetwo', 'themetwo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_registerdate` date NOT NULL,
  `user_source` varchar(100) NOT NULL,
  `user_profilepic` varchar(100) NOT NULL,
  `user_age` date NOT NULL,
  `user_active` int(11) NOT NULL DEFAULT '0',
  `user_hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_registerdate`, `user_source`, `user_profilepic`, `user_age`, `user_active`, `user_hash`) VALUES
(1, 'Aly Hunzik', 'alyhunzik@gmail.com', '', '', '2002-00-25', 'google', '', '0000-00-00', 0, ''),
(2, 'Waqar Ali', 'waqarcui@gmail.com', '', '', '0000-00-00', 'google', '', '0000-00-00', 0, ''),
(3, 'Adnan Khan', 'adnankhan7424@gmail.com', '', '', '0000-00-00', 'google', '', '0000-00-00', 0, ''),
(4, 'HunzikAli', 'hunzikaly@gmail.com', 'aqswdefr', '0232345623', '0000-00-00', 'local', '', '0000-00-00', 0, 'f9028faec74be6ec9b852b0a542e2f39'),
(5, 'Sheikh Asim', 'asim@gmail.com', 'aquamarine', '', '0000-00-00', 'local', '', '0000-00-00', 0, '39059724f73a9969845dfe4146c5660e'),
(7, 'Rameez Raja', 'rameezraja@gmail.com', 'rameez123', '03445724354', '0000-00-00', 'admin', '', '0000-00-00', 0, '9766527f2b5d3e95d4a733fcfb77bd7e'),
(8, 'Syed Akhlaq', 'akhlaq12@gmail.com', 'akhlaq123', '', '2006-09-08', 'local', '', '0000-00-00', 0, '2afe4567e1bf64d32a5527244d104cea'),
(9, 'Bibi Khadija', 'bibikhadija@gmail.com', 'KADIJA123', '', '0000-00-00', 'local', '', '0000-00-00', 0, 'e07413354875be01a996dc560274708e'),
(10, 'Shafiq Ahmad', 'shafiqapsc@gmail.com', 'shafiq123', '', '0000-00-00', 'local', '', '0000-00-00', 0, 'a597e50502f5ff68e3e25b9114205d4a'),
(11, 'Nauman Ejaz', 'nauman12@gmail.com', 'nauman123', '', '0000-00-00', 'local', '', '0000-00-00', 0, '92cc227532d17e56e07902b254dfad10'),
(12, 'Israr Ali ', 'israrphonar@gmail.com', 'israr123', '', '0000-00-00', 'local', '', '0000-00-00', 0, 'fb89705ae6d743bf1e848c206e16a1d7'),
(23, 'Waqar Ali', 'aqua@gmail.com', 'aquamarine', '', '2018-12-13', 'local', '', '0000-00-00', 0, '59b90e1005a220e2ebc542eb9d950b1e'),
(24, 'Israr Ali ', 'israrphonar1@gmail.com', 'asd12345', '', '2018-12-13', 'local', '', '0000-00-00', 0, 'afd4836712c5e77550897e25711e1d96'),
(25, 'Fayaz', 'fayaz@gmail.com', 'fayaz123', '', '2018-12-13', 'local', '', '0000-00-00', 0, '0336dcbab05b9d5ad24f4333c7658a0e'),
(26, 'Atif Karim', 'atif@gmail.com', 'atif12345', '', '2018-12-13', 'local', '', '0000-00-00', 0, 'a0a080f42e6f13b3a2df133f073095dd'),
(27, 'Ashfaq Ahmad', 'ashfaq@gmail.com', 'ashfaq123', '', '2018-12-17', 'local', '', '0000-00-00', 0, 'cd00692c3bfe59267d5ecfac5310286c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `stock_id` (`stock_id`,`user_id`,`site_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `site_id` (`site_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `stock_id` (`site_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`,`stock_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_catagoryid` (`product_catagoryid`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD PRIMARY KEY (`productmeta_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `site_review`
--
ALTER TABLE `site_review`
  ADD KEY `site_id` (`site_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `site_social`
--
ALTER TABLE `site_social`
  ADD KEY `site_id` (`site_id`);

--
-- Indexes for table `stockmain`
--
ALTER TABLE `stockmain`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `site_id` (`site_id`),
  ADD KEY `product_id` (`product_id`);
ALTER TABLE `stockmain` ADD FULLTEXT KEY `stock_des` (`stock_des`);

--
-- Indexes for table `stock_review`
--
ALTER TABLE `stock_review`
  ADD KEY `user_id` (`user_id`,`stock_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `stock_value`
--
ALTER TABLE `stock_value`
  ADD KEY `productmeta_id` (`productmeta_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000001;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `productmeta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stockmain`
--
ALTER TABLE `stockmain`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stockmain` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stockmain` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_catagoryid`) REFERENCES `catagory` (`catagory_id`);

--
-- Constraints for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD CONSTRAINT `product_meta_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`),
  ADD CONSTRAINT `site_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`),
  ADD CONSTRAINT `site_ibfk_3` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`catagory_id`);

--
-- Constraints for table `site_review`
--
ALTER TABLE `site_review`
  ADD CONSTRAINT `site_review_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `site_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`);

--
-- Constraints for table `site_social`
--
ALTER TABLE `site_social`
  ADD CONSTRAINT `site_social_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`);

--
-- Constraints for table `stockmain`
--
ALTER TABLE `stockmain`
  ADD CONSTRAINT `stockmain_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `stockmain_ibfk_3` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`);

--
-- Constraints for table `stock_review`
--
ALTER TABLE `stock_review`
  ADD CONSTRAINT `stock_review_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stockmain` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_value`
--
ALTER TABLE `stock_value`
  ADD CONSTRAINT `stock_value_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stockmain` (`stock_id`),
  ADD CONSTRAINT `stock_value_ibfk_2` FOREIGN KEY (`productmeta_id`) REFERENCES `product_meta` (`productmeta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
