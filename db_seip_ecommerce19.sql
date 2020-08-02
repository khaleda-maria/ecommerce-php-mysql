-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 08:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_seip_ecommerce19`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`admin_id` int(3) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`, `access_level`, `deletion_status`) VALUES
(1, 'Seip Ecommerce 19', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`category_id` int(3) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` varchar(30) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(1, 'Mobile', 'Samsung Note -3', 1, 1),
(2, 'Electronics', 'Sony Television', 1, 1),
(3, 'Trasport', 'Motor Cycle Yahama R15', 1, 1),
(4, 'Computer', 'Acer Laptop', 1, 1),
(5, 'Sports', 'Foot Ball cricket', 1, 1),
(8, 'Books', 'Well Book', 1, 1),
(9, 'Fashion & Style', 'Polo T-shirt', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `address`, `phone_number`, `city`, `country`) VALUES
(1, 'Rohim', 'Khan', 'rohim@gmail.com', '123456', 'Sonir Akhra', '123123', 'Dhaka', 'Bangladesh'),
(2, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', ''),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '---Select Country Name---'),
(4, 'Masud', 'Rana', 'rana@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '123', 'Dhaka', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
`image_id` int(2) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `image_name`, `product_image`) VALUES
(1, 'my image', 'product_image/mqdefault.jpg'),
(2, 'another image', 'product_image/indweex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE IF NOT EXISTS `tbl_manufacturer` (
`manufacturer_id` int(3) NOT NULL,
  `manufacturer_name` varchar(30) NOT NULL,
  `manufacturer_description` varchar(100) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `publication_status`, `deletion_status`) VALUES
(1, 'Samsung', 'Samsung Mobile company', 1, 1),
(2, 'Nokia', 'Nokia mobile Company', 1, 1),
(3, 'Sony', 'Sony Mobile and TV Company', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `order_date`) VALUES
(1, 4, 2, 0.00, 'pending', '2016-05-02 05:44:17'),
(2, 4, 3, 63480.00, 'pending', '2016-05-02 05:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
`order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(1, 1, 5, 'Samsung-978', 99000.00, 2),
(2, 2, 4, 'T-Shirt', 1200.00, 1),
(3, 2, 1, 'Note-3', 50000.00, 1),
(4, 2, 6, 'Shari Five', 4000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
`payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `payment_type`, `payment_status`, `payment_date`) VALUES
(1, 1, 'cash_on_delivary', 'pending', '2016-05-02 05:44:17'),
(2, 2, 'cash_on_delivary', 'pending', '2016-05-02 05:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`product_id` int(7) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(3) NOT NULL,
  `manufacturer_id` int(3) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_sku` varchar(50) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `manufacturer_id`, `product_price`, `product_quantity`, `product_sku`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`, `deletion_status`) VALUES
(1, 'Note-3', 2, 1, 50000.00, 100, '10', '                                                                                                                                Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product                                                                                                                ', '                                                                                                                                Well product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well productWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product. \r\nWell product. Well product. Well product. Well product. Well product                                                                                                                ', '../assets/admin_assets/product_image/15.jpg', 1, 1),
(3, 'Sony Z1', 2, 1, 23000.00, 30, '10', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                ', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                ', '../assets/admin_assets/product_image/19.jpg', 1, 1),
(4, 'T-Shirt', 9, 2, 1200.00, 100, '10', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                ', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>', '../assets/admin_assets/product_image/21.jpg', 1, 1),
(5, 'Samsung-978', 1, 1, 99000.00, 5, '1', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>', '../assets/admin_assets/product_image/6.jpg', 1, 1),
(6, 'Shari Five', 9, 2, 4000.00, 100, '10', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>', '<p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p><p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>\r\n                \r\n                <div class="but">\r\n                    <a class="arrow" href="http://localhost/seip_php_project_batch_19/index.php#"> </a>\r\n                </div>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer \r\nadipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet \r\ndolore magna aliquam erat</p>', '../assets/admin_assets/product_image/31.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE IF NOT EXISTS `tbl_shipping` (
`shipping_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `full_name`, `email_address`, `address`, `phone_number`, `city`, `country`) VALUES
(1, 'Ridoy Khan', 'hamid@gmail.com', 'asdasdasd', '12312312', 'Dhaka', 'Bangladesh'),
(2, 'Rakib Hasan', 'hasan@gmail.com', 'Malibagh', '123456', 'Dhaka', 'United States'),
(3, 'Ruhul Kobir', 'kobir@gmail.com', 'Dohar', '12312321', 'Dhaka', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_temp_cart` (
`temp_cart_id` int(3) NOT NULL,
  `product_id` int(7) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_cart`
--

INSERT INTO `tbl_temp_cart` (`temp_cart_id`, `product_id`, `session_id`, `product_name`, `product_image`, `product_price`, `product_quantity`) VALUES
(1, 4, '1ri3q8in4f8i9mlqjdeef3mng7', 'T-Shirt', '../assets/admin_assets/product_image/21.jpg', 1200.00, 5),
(2, 4, '1ri3q8in4f8i9mlqjdeef3mng7', 'T-Shirt', '../assets/admin_assets/product_image/21.jpg', 1200.00, 5),
(5, 4, 'kp6lhqfj9dkfclnuoj07s726c7', 'T-Shirt', '../assets/admin_assets/product_image/21.jpg', 1200.00, 1),
(10, 3, 'pa3j6eec8b6in1omm39v5g52e6', 'Sony Z1', '../assets/admin_assets/product_image/19.jpg', 23000.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
 ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
 ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
 ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
 ADD PRIMARY KEY (`temp_cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
MODIFY `image_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
MODIFY `manufacturer_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `product_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
MODIFY `temp_cart_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
