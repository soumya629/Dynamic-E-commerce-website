-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `name`, `email`, `password`) VALUES
(1, 'SANKHADEEP CHAKRABORTY', 'a01@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_u_name` varchar(244) DEFAULT NULL,
  `cart_u_phone` int(11) DEFAULT NULL,
  `cart_p_name` varchar(255) DEFAULT NULL,
  `cart_p_price` varchar(255) DEFAULT NULL,
  `cart_p_img` varchar(255) DEFAULT NULL,
  `cart_u_id` int(11) DEFAULT NULL,
  `cart_p_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_u_name`, `cart_u_phone`, `cart_p_name`, `cart_p_price`, `cart_p_img`, `cart_u_id`, `cart_p_id`, `quantity`) VALUES
(80, 'SANKHADEEP CHAKRABORTY ', 0, 'VW 80 cm (32 inches) ', '₹ 7,000 ', './image/Tv/T3.avif', 19, NULL, NULL),
(99, 'AKASH PAL', 2147483647, 'Fire-Boltt ARC 49.8mm', '₹1,300', './image/SmartWatch/HD-wallpaper-apple-watch-series-8-smartwatch-boasts-an-always-on-display-and-a-durable-design-gadget-flow.jpg', 28, 56, 5),
(100, 'AKASH PAL', 2147483647, 'Boult Audio UFO Truly Wireless', '₹1,300', './image/Headphone/s-l1200 (1).jpg', 28, 20, 1),
(108, 'AKASH PAL', 2147483647, 'Boult Audio UFO Truly Wireless', '₹1,300', './image/Headphone/s-l1200 (1).jpg', 52, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctid` int(11) NOT NULL,
  `ct_name` varchar(20) NOT NULL,
  `ct_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctid`, `ct_name`, `ct_image`) VALUES
(1, 'fridge', 0x2e2f696d6167652f4672696467652f66332e6a7067),
(3, 'tv', 0x2e2f696d6167652f54762f54312e6a7067),
(4, 'mobile', 0x2e2f696d616765732f494d472d32303234303831312d5741303038382e6a7067),
(5, 'camera', 0x2e2f696d6167652f63616d6572612f6331322e6a7067),
(6, 'laptop', 0x2e2f696d616765732f494d472d32303234303831312d5741303130372e6a7067),
(7, 'hometheater', 0x2e2f696d6167652f486f6d65746865617465722f68342e6a7067),
(8, 'headphone', 0x2e2f696d616765732f494d472d32303234303831312d5741303033352e6a7067),
(9, 'smartwatch', 0x2e2f696d6167652f536d61727457617463682f6170706c652d77617463682d73706f72742d34326d6d2d73696c7665722d616c756d696e756d2d636173652d776974682d626c61636b2d73706f72742d62616e642d776974682d61637469766974792d6170702d646973706c61795f3933393033332d373539322e61766966);

-- --------------------------------------------------------

--
-- Table structure for table `newproduct`
--

CREATE TABLE `newproduct` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) DEFAULT NULL,
  `p_s_desc` varchar(255) DEFAULT NULL,
  `p_img` varchar(200) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `p_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newproduct`
--

INSERT INTO `newproduct` (`p_id`, `p_name`, `p_price`, `p_s_desc`, `p_img`, `ct_id`, `p_desc`) VALUES
(1, 'Canon EOS 3000D', '₹ 40000', 'Canon EOS 3000D 18MP Digital SLR Camera (Black)', './image/camera/c1.jpg', 5, 'About this item <br>\r\n                                        1.Colour: Black <br>\r\n                                        2.Compatible Mountings Canon EF-S <br>\r\n                                        3. Aspect Ratio 3:2 <br>\r\n                         '),
(2, 'Canon EOS R10 ', '₹ 90000', 'Canon EOS R10 24.2MP RF-S18-150mm f/4.5-6.3 is STM', './image/camera/c2.jpg', 5, 'About this item <br>\r\n\r\n                                        1.Compatible Mountings : Canon EF-S <br>\r\n                                        2.Aspect Ratio : 1.50:1, 16:9, 4:3 <br>\r\n                                        3.Photo Sensor Technology : '),
(3, 'Canon Powershot SX70 20.3MP Digital Camera', '₹ 70,000', 'Canon Powershot SX70 20.3MP Digital Camera 65x Opt', './image/camera/c4.jpg', 5, 'About this item <br>\r\n\r\n\r\n                                        1. Compatible Mountings : Canon EF-S <br>\r\n                                        2.Aspect Ratio : Unknown <br>\r\n                                        3.Photo Sensor Technology : CMOS <b'),
(4, 'Canon PowerShot ELPH', '₹ 40,000 ', 'Canon PowerShot ELPH 360 Digital Camera w/ 12x Opt', './image/camera/c5.jpg', 5, 'About this item <br>\r\n\r\n\r\n                                        1. Compatible Mountings : Canon EF-S <br>\r\n                                        2. Aspect Ratio : Unknown <br>\r\n                                        3. Photo Sensor Technology : CMOS '),
(5, 'Canon EOS R8 Full-Frame', '₹ 1,09,000 ', 'Canon EOS R8 Full-Frame 24.2 MP Mirrorless Camera ', './image/camera/c7.jpg', 5, 'About this item <br>\r\n\r\n\r\n                                        1. Compatible Mountings : Canon EF-S <br>\r\n                                        2.Aspect Ratio : Unknown <br>\r\n                                        3. Photo Sensor Technology : CMOS <'),
(6, 'Ricoh GR IIIx', '₹ 1,10,000 ', 'Ricoh GR IIIx, Black, Digital Compact Camera with ', './image/camera/c8.jpg', 5, 'About this item <br>\r\n\r\n\r\n\r\n\r\n                                        1.Compatible Mountings Fixed : GR lens <br>\r\n                                        2.Photo Sensor Technology : CMOS <br>\r\n                                        3.Supported File Form'),
(7, 'Canon PowerShot SX410 IS (Black)', '₹ 92,000', 'Canon PowerShot SX410 IS (Black)', './image/camera/c9.jpg', 5, 'About this item <br>\r\n\r\n                                        1.Compatible Mountings : Canon PowerShot SX410 IS  <br>\r\n                                        2.Aspect Ratio : 3:2 <br>\r\n                                        3.Photo Sensor Technology :'),
(8, 'Canon EOS R6 Mark II 24. 2 MP Mirrorless Camera', '₹ 1,92,000', 'Canon EOS R6 Mark II 24. 2 MP Mirrorless Camera wi', './image/camera/c11.jpg', 5, 'About this item <br>\r\n\r\n\r\n                                        1.Compatible Mountings : Canon EOS <br>\r\n                                       2. Aspect Ratio : 1.77:1 <br>\r\n                                        3.Photo Sensor Technology : CMOS  <br>'),
(9, 'Canon EOS R6 Mark II 24. 2 MP Mirrorless Camera', '₹ 1,92,000', 'Canon EOS R6 Mark II 24. 2 MP Mirrorless Camera wi', './image/camera/c12.jpg', 5, 'About this item <br>\r\n\r\n\r\n                                        1.Compatible Mountings : Canon EF-S <br>\r\n                                       2. Aspect Ratio : 1.77:1 <br>\r\n                                        3.Photo Sensor Technology : CMOS  <br'),
(10, 'Samsung 183 L', '₹ 15,000', 'Samsung 183 L, 4 Star, Digital Inverter, Direct-Cool ', './image/Fridge/f5.jpg', 1, 'Godrej 180 L 5 Star Turbo Cooling Technology, 24 Days Farm\r\n                                        Freshness Direct Cool Single Door Refrigerator Appliance (2023 Model, RD EDGENEO\r\n                                        207E THF AQ WN, Aqua Wine)'),
(11, 'Samsung 215 L, 5 Star', '₹ 29,999 ', 'Samsung 215 L, 5 Star, Digital Inverter, Direct-Cool ', './image/Fridge/f9.webp', 1, 'LG 322 L 3 Star Frost-Free Smart Inverter Double Door\r\n                                        Refrigerator (2023 Model, GL-S342SDSX, Dazzle Steel, Convertible with Express\r\n                                        Freeze)'),
(12, 'Haier 190L', '₹ 17,000', 'Haier 190L 4-Star Direct Cool Single Door Refrigerator ', './image/Fridge/f3.jpg', 1, 'About of this product <br>\r\n\r\n\r\n                                        1.Product Dimensions : 62.8D x 54.1W x 121.8H Centimeters <br>\r\n                                        2.Brand : Haier <br>\r\n                                     3.Capacity : 190 lit'),
(13, 'Whirlpool 184 L', '₹ 8,000', 'Whirlpool 184 L 2 Star Direct-Cool Single Door Refrigerator', './image/Fridge/f4.jpeg', 1, 'About of this product <br>\r\n\r\n                                        1.Product Dimensions : 60.5D x 53.5W x 118.8H Centimeters <br>\r\n                                        2.Brand : Whirlpool <br>\r\n                                        3.Capacity : 18'),
(14, 'Samsung 183 L', '₹ 15,000', 'Samsung 183 L, 4 Star, Digital Inverter, Direct-Cool Single Door Refrigerator', './image/Fridge/f5.jpg', 1, 'About this item <br>\r\n1. Product Dimensions : 64D x 53.2W x 118H Centimeters <br>\r\n                                        2.Brand : Samsung <br>\r\n                                        3.Capacity : 183 litres <br>'),
(15, 'Samsung 183 L', '₹ 10,000 ', 'Samsung 183 L, 3 Star, Digital Inverter, Direct-Cool Single Door Refrigerator', './image/Fridge/f6.png', 1, 'About this item <br>\r\n1. Product Dimensions : 64D x 53.2W x 118H Centimeters <br>\r\n                                        2. Brand : Samsung <br>\r\n                                        3. Capacity :183 litres <br>'),
(16, 'Whirlpool 184 L 2 Star', '₹ 14,999', 'Whirlpool 184 L 2 Star Direct-Cool Single Door Refrigerator', './image/Fridge/f7.jpg', 1, 'About this item <br>\r\n1.Product Dimensions : 65.1D x 53.5W x 118.8H Centimeters <br>\r\n  2. Brand : Whirlpool <br>\r\n                                        3.Capacity : 184 litres <br>'),
(17, 'Whirlpool 184 L 4 Star', '₹ 13,999', 'Whirlpool 184 L 4 Star Inverter Direct-Cool ', './image/Fridge/f8.jpg', 1, 'About this item <br>\r\n1.Product Dimensions : 65.1D x 54.3W x 130.3H Centimeters <br>\r\n                                        Brand : Whirlpool <br>\r\n                                        Capacity : 184 litres <br>'),
(18, 'LG 322 L', '₹ 16,999 ', 'LG 322 L 3 Star Frost-Free Smart Inverter ', './image/Fridge/f2.jpg', 1, 'About this item <br>\r\n1.Product Dimensions : 71.6D x 57.8W x 144.5H Centimeters <br>\r\n                                        2.Brand : Samsung <br>\r\n                                        3.Capacity : 215 litres <br>'),
(19, 'Boult x Mustang Derby ', '₹ 1000', 'Boult x Mustang Derby Newly Launched Truly Wireless', './image/Headphone/4195SwFzi9L.jpg', 8, 'About this item <br>\r\n1.Brand : Boult <br>\r\n 2.Colour : UFO Smoky Metal <br>\r\n  3.Ear Placement : In Ear <br>'),
(20, 'Boult Audio UFO Truly Wireless', '₹1,300', 'Boult Audio UFO Truly Wireless in Ear Earbuds with 48H Playtime', './image/Headphone/s-l1200 (1).jpg', 8, 'About this item <br>\r\n1.Brand : Boult <br>2.Ear Placement : In Ear <br>\r\n                    3.Form Factor : In Ear <br>'),
(21, 'Boult Audio Z40 True Wireless', '₹ 1000', 'Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime', './image/Headphone/s-l1200 (2).jpg', 8, 'About this item <br>1.Brand : Boult <br>\r\n     2.Colour : Z40 Pro Dawn <br>\r\n                    3.Ear Placement : In Ear <br>'),
(22, 'Boult Audio Z40 True Wireless in Ear Earbuds', '₹1,500', 'Boult Audio Z40 True Wireless in Ear Earbuds with 60H Playtime', './image/Headphone/e7.jpg', 8, 'About this item <br>\r\n1.Brand : Boult <br>\r\n                    2.Colour : W20 Gray <br>\r\n                    3.Ear Placement : In Ear <br>'),
(23, 'ZEBRONICS Duke 60hrs Playtime', '₹1,448', 'ZEBRONICS Duke 60hrs Playtime Bluetooth Wireless Headphone', './image/Headphone/h1.jpg', 8, 'About this item <br>1. Brand : ZEBRONICS <br>\r\n2. Ear Placement Over Ear <br>\r\n                    3. Form Factor Over Ear <br>'),
(24, 'boAt Rockerz 425 Bluetooth Wireless', '₹1,499', 'boAt Rockerz 425 Bluetooth Wireless Over Ear Headphones', './image/Headphone/h2.jpg', 8, 'About this item <br>1.Brand : boAt <br>\r\n                    2. Colour : Active Black <br>\r\n                    3.Ear Placement : On Ear <br>'),
(25, 'pTron Tangent Impulse Safebeats', '₹799', 'pTron Tangent Impulse Safebeats Open Ear Wireless Headphones with Mic, 10H Playtime', './image/Headphone/e5.jpg', 8, 'About this item <br>1.Brand : PTron <br>\r\n                    2.Ear Placement : Over Ear <br>\r\n                    3.Form Factor : Over Ear <br>'),
(26, 'JLab', '₹2,799', 'JLab JBuds Work Wireless Headset with Microphone - Over Ear Computer Headset', './image/Headphone/h4.jpg', 8, 'About this item <br>\r\n1.Brand : JLab <br>\r\n                    2.Ear Placement : Over Ear <br>\r\n                    3.Form Factor : Over Ear <br>'),
(27, 'pTron Tangent ', '₹899', 'pTron Tangent Impulse Safebeats Open Ear Wireless Headphones with Mic, 10H Playtime', './image/Headphone/e5.jpg', 8, 'About this item <br>1.Brand : PTron <br>\r\n                    2.Ear Placement : Over Ear <br>\r\n                    3.Form Factor : Over Ear <br>'),
(28, 'ZEBRONICS Juke BAR 3902', '₹ 3,999 ', 'ZEBRONICS Juke BAR 3902 Soundbar with 100 Watts', './image/Hometheater/h1.jpg', 7, 'About this item <br>\r\n 1. Brand : ZEBRONICS <br>\r\n     2. Frequency : Response 55 Hz <br>\r\n                                        3. Connectivity Technology : Bluetooth, Auxiliary, USB, HDMI <br>'),
(29, 'Mivi Fort Q700D', '₹ 16,999 ', 'Mivi Fort Q700D Soundbar with Dolby Audio, 700W, 5.1 Channel', './image/Hometheater/h2.avif', 7, 'About this item <br>\r\n1. Screen Size : 43 Inches <br>\r\n 2. Brand : Samsung <br>\r\n3. Display Technology : UHD <br>'),
(30, 'Sony HT-S20R ', '₹ 17,000 ', 'Sony HT-S20R Real 5.1ch Dolby Digital Soundbar for TV ', './image/Hometheater/h3.jpg', 7, 'About this item <br>\r\n 1.Brand : Sony <br>\r\n 2.Connectivity Technology : Bluetooth <br>\r\n    3.Audio Output : Mode Surround <br>'),
(31, 'ZEBRONICS Juke BAR 3902 ', '₹ 8,000', 'ZEBRONICS Juke BAR 3902 Soundbar with 100 Watts', './image/Hometheater/h4.jpg', 7, 'About this item <br>\r\n1.Brand : ZEBRONICS <br>\r\n  2.Frequency Response : 55 Hz <br>\r\n                                        3.Connectivity Technology : Bluetooth, Auxiliary, USB, HDMI <br>'),
(32, 'TRONICA ', '₹ 15,000 ', 'TRONICA TR-1501 Deep Bass Home Theater ', './image/Hometheater/h5.jpg', 7, 'About this item <br>\r\n1.Brand : TRONICA <br>\r\n                                      2.Speaker Maximum Output : Power 55 Watts <br>\r\n                                        3.Frequency Response : 35 Hz <br>'),
(33, 'Philips Audio', '₹ 9,000', 'Philips Audio MMS2625B 2.1 Channel, Bluetooth connectivity', './image/Hometheater/h6.jpg', 7, 'About this item <br>\r\nBrand : Philips Audio <br>\r\nSpeaker Maximum Output : Power 31 Watts <br>\r\nFrequency Response : 30 Hz <br>'),
(34, 'ZEBRONICS', '₹ 4,999', 'ZEBRONICS BT4440RUCF 60W ', './image/Hometheater/h7.jpg', 7, 'About this item <br>\r\nBrand : ZEBRONICS <br>\r\n           Speaker Maximum Output : Power 60 Watts <br>\r\n      Frequency Response : 32 Hz <br>'),
(35, 'Zebronics ZEB-BT6590RUCF', '₹ 3,999', 'Zebronics ZEB-BT6590RUCF ', './image/Hometheater/e8.jpg', 7, '>About this item <br>\r\n1.Brand : ZEBRONICS <br>\r\n                                        2.Speaker Maximum Output : Power 65 Watts <br>\r\n                                        3.Frequency Response : 32 Hz <br>'),
(36, 'boAt Aavante', '₹ 9,999', 'boAt Aavante Bar 3600 ', './image/Hometheater/h9.avif', 7, 'About this item <br>\r\n1.Brand : boAt <br>\r\n                                        2.Connectivity Technology : Bluetooth <br>\r\n                                        3.Audio Output : Mode Surround <br>'),
(37, 'HP Victus Gaming Laptop', '₹ 20,000', 'HP Victus Gaming Laptop, 13th Gen Intel Core i5-13420H', './image/Laptop/Laptop2.jpg', 6, 'HP Victus Gaming Laptop, 13th Gen Intel Core i5-13420H, 4GB RTX 2050 GPU,\r\n                    15.6-inch (39.6 cm), FHD, IPS,144 Hz, 16GB DDR4, 512GB SSD, HD camera, Backlit KB, B&O, 9ms, (Win\r\n                    11, Blue, 2.29 kg), fa1128TX\r\n           '),
(38, 'Acer Aspire Lite 12th Gen', '₹45,000', 'Acer Aspire Lite 12th Gen Intel Core i7-1255U Premium Metal ', './image/Laptop/laptop1.jpg', 6, 'Acer Aspire Lite 12th Gen Intel Core i7-1255U Premium Metal Laptop (Windows 11\r\n                    Home/16 GB RAM/512 GB SSD) AL15-52, 39.62cm (15.6\") Full HD Display, Metal Body, Steel Gray, 1.59 Kg'),
(39, 'Lenovo [Smartchoice] ', '₹ 61,490', 'Lenovo [Smartchoice] LOQ 12th Gen Intel Core i5-12450HX ', './image/Laptop/Laptop5.png', 6, 'Lenovo [Smartchoice] LOQ 12th Gen Intel Core i5-12450HX /39.6cm/ 144Hz 300Nits\r\n                    FHD Gaming Laptop (16GB/512GB SSD/Win 11/ RTX 3050 6GB Graphics/100% sRGB/MSO 21/3 Mon Game\r\n Pass/Grey/2.4Kg), 83GS003UIN'),
(40, 'ASUS TUF F15 Gaming Laptop', '₹ 48,000', 'ASUS TUF F15 Gaming Laptop, Intel Core i5-11400H 11th Gen', './image/Laptop/Lenovo6.webp', 6, 'ASUS TUF F15 Gaming Laptop, Intel Core i5-11400H 11th Gen, 15.6-inch (39.62 cm)\r\n                    FHD 144Hz,(16GB RAM/512GB SSD/4GB NVIDIA GeForce RTX 2050/Windows 11/ RGB Backlit KB/Black/2.30 kg), FX506HF-HN025W'),
(41, 'ASUS Vivobook Go 15 (2023)', '₹ 40,000', 'ASUS Vivobook Go 15 (2023), AMD Ryzen 5 7520U', './image/Laptop/Laptop6.jpg', 6, 'ASUS Vivobook Go 15 (2023), AMD Ryzen 5 7520U, 15.6\" (39.62 cm) FHD, Thin and\r\n Light Laptop (16GB/512GB SSD/Integrated Graphics/Windows 11/Office 2021/Silver/1.8 Kg), E1504FA-NJ541WS'),
(42, 'HP Laptop 15s', '₹ 50,000', 'HP Laptop 15s, 12th Gen Intel Core i5-1235U', './image/Laptop/Laptop9.avif', 6, 'HP Laptop 15s, 12th Gen Intel Core i5-1235U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, Intel Iris Xe Graphics, Backlit KB,MSO,Thin & Light, Dual Speakers (Win 11, Silver, 1.69 kg), fq5330TU'),
(43, 'HP Laptop 15s', '₹ 42,000', 'HP Laptop 15s, AMD Ryzen 5 5500U', './image/laptop/Laptop8.jpg', 6, 'HP Laptop 15s, AMD Ryzen 5 5500U, 15.6-inch (39.6 cm), FHD, 16GB DDR4, 512GB SSD, AMD Radeon Graphics, 720p HD Camera, Backlit KB, Thin & Light (Win 11, MSO 2021, Silver, 1.69 kg), eq2182AU/eq2305au'),
(44, 'Lenovo IdeaPad Gaming 3 Laptop', '₹40,000 ', 'Lenovo IdeaPad Gaming 3 Laptop AMD Ryzen 5 5500H ', './image/Laptop/l9.png', 6, 'Lenovo IdeaPad Gaming 3 Laptop AMD Ryzen 5 5500H 15.6\" (39.62cm) FHD IPS 300nits 144Hz (8GB/512GB SSD/Win 11/NVIDIA RTX 2050 4GB/Alexa/3 Month Game Pass/Shadow Black/2.32Kg), 82K20289IN'),
(45, 'AORUS 16X 9KG-43INC54SH', '₹ 92,000 ', 'AORUS 16X 9KG-43INC54SH, i7-13650HX', './image/Laptop/Lenovo10.avif', 6, 'Aorus 16X Series - 16\'\' 165 Hz IPS - Intel Core i7-13650HX - GeForce RTX 4060 Laptop GPU - 16 GB DDR5 - 1 TB PCIe SSD - Windows 11 Home 64-bit - Gaming Laptop (16X 9KG-43USC54SH )'),
(46, 'POCO X6 5G ', '₹20,000', '(Snowstorm White, 12 GB RAM 512 GB Storage)', './image/Mobile/m1.png', 4, 'About this item <br>\r\n                    Brand : POCO <br>\r\n                    Operating System : MIUI 14, Android 13.0 <br>\r\n                    RAM Memory Installed Size : 12 GB <br>'),
(47, 'POCO C65 ', '₹6,000', 'POCO C65 Pastel Blue 6GB RAM 128GB Storage', './image/Mobile/m2.png', 4, 'About this item <br>\r\n1.Brand : POCO <br>\r\n                    2.Operating System : Android 13.0 <br>\r\n                    3. RAM Memory Installed Size : 128 GB <br>'),
(48, 'HMD Crest Max 5G ', '₹16,000 ', 'HMD Crest Max 5G | Segment 1st 50 MP Front Camera ', './image/Mobile/m3.png', 4, 'HMD Crest Max 5G | Segment 1st 50 MP Front Cam | Triple Rear AI Cam with 64 MP\r\n                    Primary Sony Sensor | FHD+ OLED Display | 8 GB RAM & 256 GB Storage | Android 14 | 33W Fast Charger\r\n                    in Box | Deep Purple'),
(49, 'Redmi 13C', '₹8,999', ' Stardust Black, 6GB RAM, 128GB Storage', './image/Mobile/m4.png', 4, 'About this item <br>\r\n1.Brand : Xiaomi <br>\r\n                    2.Operating System : MIUI 14, Android 13.0 <br>\r\n                    3. RAM Memory Installed Size : 6 GB <br>'),
(50, 'POCO M6 5G ', '₹10,000', 'Orion Blue, 6GB RAM, 128GB Storage', './image/Mobile/m5.png', 4, 'About this item <br>\r\n1.Brand : POCO <br>\r\n                    2.Operating System : MIUI 14, Android 13.0 <br>\r\n                    3.RAM Memory Installed Size 6 GB <br>'),
(51, 'Nokia G42 5G', '₹11,000', 'Nokia G42 5G | Snapdragon® 480+ 5G | 50MP Triple AI Camera ', './image/Mobile/m6.png', 4, 'Nokia G42 5G | Snapdragon® 480+ 5G | 50MP Triple AI Camera | 11GB RAM (6GB RAM\r\n                    + 5GB Virtual RAM) | 128GB Storage | 5000mAh Battery | 2 Years Android Upgrades | 20W Charger\r\n                    Included | So Grey'),
(52, 'Redmi 13C ', '₹8,000', 'Starshine Green, 4GB RAM, 128GB Storage', './image/Mobile/m7.png', 4, 'About this item <br>\r\n                    1.Brand : Xiaomi <br>\r\n                    2.Operating System : MIUI 14, Android 13.0 <br>\r\n                    3.RAM Memory Installed Size : 4 GB <br>'),
(53, 'TECNO POP 8 ', '₹ 6,000 ', '90Hz Punch Hole Display with Dynamic Port & Dual Speakers', './image/Mobile/m8.png', 4, 'TECNO POP 8 (Gravity Black, 4GB+64GB)| 90Hz Punch Hole Display with Dynamic\r\n                    Port & Dual Speakers with DTS| 5000mAh Battery |10W Type-C| Side Fingerprint Sensor| Octa-Core\r\n                    Processor'),
(54, 'OnePlus Nord CE4 Lite 5G ', '₹19,999', 'Super Silver, 8GB RAM, 128GB Storage', './image/Mobile/m9.png', 4, 'About this item <br>\r\n1. Brand : OnePlus <br>\r\n                   2. Operating System : OxygenOS <br>\r\n                   3. RAM Memory Installed Size : 8 GB  <br>'),
(55, 'Fastrack New Limitless X2 Smartwatch', '₹1,499', 'Fastrack New Limitless X2 Smartwatch|1.91\" UltraVU', './image/SmartWatch/apple-watch-sport-42mm-silver-aluminum-case-with-black-sport-band-with-activity-app-display_939033-7584.avif', 9, NULL),
(56, 'Fire-Boltt ARC 49.8mm', '₹1,300', 'Fire-Boltt ARC 49.8mm (1.96 inch) ', './image/SmartWatch/HD-wallpaper-apple-watch-series-8-smartwatch-boasts-an-always-on-display-and-a-durable-design-gadget-flow.jpg', 9, NULL),
(57, 'Noise Pulse 2 Max 1.85', '₹ 1300', 'Noise Pulse 2 Max 1.85\" Display, Bluetooth Calling', './image/SmartWatch/Apple_delivers-apple-watch-series-6_09152020_big.jpg.large.jpg', 9, NULL),
(58, 'Fire-Boltt Ninja Call Pro Plus 1.83', '₹1,300', 'Fire-Boltt Ninja Call Pro Plus 1.83\" Smart Watch', './image/SmartWatch/download (3).jpeg', 9, NULL),
(59, 'boAt Wave Sigma 3 w/Turn-by-Turn Navigation', '₹1,099', 'boAt Wave Sigma 3 w/Turn-by-Turn Navigation, 2.01\"', './image/SmartWatch/pngtree-an-apple-watch-in-white-sits-on-top-of-ice-cubes-image_2658989.jpg', 9, NULL),
(60, 'mi Smart Watch', '₹ 800', 'mi Smart Watch for Men & Women', './image/SmartWatch/black-smart-watch-with-red-band-time-shown-it_917048-78.avif', 9, NULL),
(61, 'Fire-Boltt Supernova- 45.2mm ', '₹1,500', 'Fire-Boltt Supernova- 45.2mm AMOLED Display, 500 N', './image/SmartWatch/desktop-wallpaper-smartwatch-smartwatch.jpg', 9, NULL),
(62, 'boAt Wave Lite Smart Watch w/ 1.69', '₹ 799', 'boAt Wave Lite Smart Watch w/ 1.69\" (4.2 cm) HD Di', './image/SmartWatch/generic-smartwatches-isolated-colorfull-background-3d-illustration_960782-6392.avif', 9, NULL),
(63, 'Noise Pulse 2 Max 1.85\" Display', ' ₹ 999', 'Noise Pulse 2 Max 1.85\" Display, Bluetooth Calling', './image/SmartWatch/generic-smartwatches-isolated-colorfull-background-3d-illustration_960782-6345.avif', 9, NULL),
(64, 'Xiaomi 125 cm (50 inches)', '₹ 20,000 ', 'Xiaomi 125 cm (50 inches) X 4K Dolby Vision Series Smart Google TV L50M8-A2IN', './image/Tv/T1.jpg', 3, NULL),
(65, 'Samsung 108 cm (43 inches)', '₹ 30,000', 'Samsung 108 cm (43 inches) D Series Crystal 4K Vivid Ultra HD', './image/Tv/T2.jpg', 3, NULL),
(66, 'VW 80 cm (32 inches) ', '₹ 7,000 ', 'VW 80 cm (32 inches) Frameless Series HD Ready ', './image/Tv/T3.avif', 3, NULL),
(67, 'Samsung 80 cm (32 inches) ', '₹ 8,000', 'Samsung 80 cm (32 inches) HD Ready Smart LED TV UA32T4380AKXXL ', './image/Tv/T4.avif', 3, NULL),
(68, 'Kodak 80 cm (32 inches)', '₹ 10,000 ', 'Kodak 80 cm (32 inches) Special Edition Series HD Ready Smart LED TV', './image/Tv/T5.jpg', 3, NULL),
(69, 'TCL 80.04 cm (32 inches)', '₹ 9,000', 'TCL 80.04 cm (32 inches) Metallic Bezel-Less HD Ready Smart Android LED', './image/Tv/T6.jpg', 3, NULL),
(70, 'LG 80 cm (32 inches)', '₹ 9,999', 'LG 80 cm (32 inches) HD Ready Smart LED TV ', './image/Tv/T7.jpg', 3, NULL),
(71, 'Redmi 80 cm (32 inches)', '₹ 11,999 ', 'Redmi 80 cm (32 inches) F Series HD Ready Smart LED Fire TV ', './image/Tv/T8.avif', 3, NULL),
(72, 'Xiaomi 138 cm (55 inches)', '₹ 50,999', 'Xiaomi 138 cm (55 inches) X Pro 4K Dolby Vision IQ Series ', './image/Tv/T9.avif', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_id` int(11) NOT NULL,
  `o_u_name` varchar(244) DEFAULT NULL,
  `o_u_phone` int(11) DEFAULT NULL,
  `o_p_name` varchar(255) DEFAULT NULL,
  `o_p_price` varchar(255) DEFAULT NULL,
  `o_p_img` varchar(255) DEFAULT NULL,
  `o_u_id` int(11) DEFAULT NULL,
  `o_p_id` int(11) DEFAULT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `o_quantity` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `o_c_p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`o_id`, `o_u_name`, `o_u_phone`, `o_p_name`, `o_p_price`, `o_p_img`, `o_u_id`, `o_p_id`, `u_address`, `o_quantity`, `quantity`, `total`, `o_c_p_id`) VALUES
(256, 'RATUL SEN', 123456, 'Canon Powershot SX70 20.3MP Digital Camera', '₹ 70,000', './image/camera/c4.jpg', 29, NULL, 'Birati', NULL, 1, 70000, 134),
(257, 'RATUL SEN', 123456, 'Xiaomi 125 cm (50 inches)', '₹ 20,000 ', './image/Tv/T1.jpg', 29, NULL, 'Birati', NULL, 2, 40000, 135);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_post` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`user_id`, `user_name`, `user_add`, `user_post`, `user_state`, `user_email`) VALUES
(25, 'SANKHADEEP CHAKRABORTY', 'ssss3', 'ssss', 'ssss', 'sankhadeepc9@gmail.com'),
(26, 'SANKHADEEP CHAKRABORTY', 'ssss3', 'ssss', 'ssss4', 'sankhadeepc9@gmail.com'),
(27, 'SANKHADEEP CHAKRABORTY', 'ssss3', 'ssss', 'ssss4', 'sankhadeepc9@gmail.com'),
(28, 'SANKHADEEP CHAKRABORTY ', 'ssss', 'ssss', 'ssss3', 'sankhadeepc9@gmail.com'),
(29, 'SANKHADEEP CHAKRABORTY', 'ssss', 'ssss', 'ssss3', 'sankhadeepc9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(19, 'SANKHADEEP CHAKRABORTY ', 'sankhadeepc01@gmail.com', 'qq', 'ab', NULL),
(23, 'Akash pal', 'a@gmail.com', 'kolkata', 'nodia', NULL),
(25, 'saa', 'aa@gmail.com', '12', 'kolkata', NULL),
(26, 'Akash pal', 'a01@gmail.com', '2345', 'nodia', NULL),
(27, 'Akash', 'ab1@gmail.com', '1234', 'kolkata', 12345678),
(28, 'AKASH PAL', 'akashpaul6865@gmail.com', '2003', 'DUMDUM', 2147483647),
(29, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(30, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(31, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(32, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(33, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(34, 'RATUL SEN', 'rsen@gmail.com', '1234', 'Birati', 123456),
(35, 'RATUL SEN', 'sankhadeepc49@gmail.com', '9875', 'ssss', 123456),
(36, 'RATUL SEN', 'sankhadeepc49@gmail.com', '9875', 'ssss', 123456),
(37, 'RATUL SEN', 'sankhadeepc49@gmail.com', '9875', 'ssss', 123456),
(38, 'RATUL SEN', 'sankhadeepc49@gmail.com', '9875', 'ssss', 123456),
(39, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 12345),
(40, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(41, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(42, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(43, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(44, 'SANKHADEEP CHAKRABORTY', '', '1234', 'ssss', 2147483647),
(45, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(46, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(47, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(48, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(49, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(50, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(51, 'SANKHADEEP CHAKRABORTY', 'sankhadeepc49@gmail.com', '1234', 'ssss', 2147483647),
(52, 'AKASH PAL', 'akashpaul6865@gmail.com', '1234', 'DUMDUM', 2147483647),
(53, 'AKASH PAL', 'akashpaul6865@gmail.com', '1234', 'DUMDUM', 2147483647),
(54, 'AKASH PAL', 'rsen@gmail.com', '1234', 'DUMDUM', 2147483647),
(55, 'AKASH PAL', '', '1234', 'DUMDUM', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_u_id` (`cart_u_id`),
  ADD KEY `cart_p_id` (`cart_p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `ct_id` (`ct_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `o_u_id` (`o_u_id`),
  ADD KEY `o_p_id` (`o_p_id`),
  ADD KEY `fk_o_quantity` (`o_quantity`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newproduct`
--
ALTER TABLE `newproduct`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_u_id`) REFERENCES `userdata` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_p_id`) REFERENCES `newproduct` (`p_id`);

--
-- Constraints for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD CONSTRAINT `newproduct_ibfk_1` FOREIGN KEY (`ct_id`) REFERENCES `category` (`ctid`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_o_quantity` FOREIGN KEY (`o_quantity`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`o_u_id`) REFERENCES `userdata` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`o_p_id`) REFERENCES `newproduct` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
