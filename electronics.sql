-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 12:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `blaise_set`
--

CREATE TABLE `blaise_set` (
  `id` int(11) NOT NULL,
  `bid` varchar(20) NOT NULL,
  `dtitle` varchar(100) NOT NULL,
  `ddesc` text NOT NULL,
  `dimg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blaise_set`
--

INSERT INTO `blaise_set` (`id`, `bid`, `dtitle`, `ddesc`, `dimg`) VALUES
(1, '76718909823432', 'about us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus. Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et molestie ante. In feugiat ante vitae ultricies malesuada.</p>', '202006170015-1'),
(2, '76718909812231', 'services', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac pretium nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien ullamcorper dapibus. Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et molestie ante. In feugiat ante vitae ultricies malesuada.</p>', '202006170035-1'),
(3, '76718909855543', 'Terms & Condition', '<p>Something Donec facilisis neque ut purus fermentum, ac pretium nibh facilisis. Vivamus venenatis</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `dcategory` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `dcategory`, `name`, `img`, `status`) VALUES
(5, 'Computer and Accessories', 'Lenovo', '202011102836-1', 'active'),
(6, 'TV &amp; Video', 'LG', '202005144414-1', 'inactive'),
(7, 'TV &amp; Video', 'Apple', '202005144440-1', 'inactive'),
(8, 'TV &amp; Video', 'Sony', '202006135438-1', 'inactive'),
(9, 'TV &amp; Video', 'Canon', '202006135400-1', 'inactive'),
(10, 'Home and Kitchen', 'Sony STR-DN1080', '202011103634-1', 'active'),
(11, 'Home and Kitchen', 'Samsung', '202011103713-1', 'active'),
(12, 'Home and Kitchen', 'LG', '202011103657-1', 'active'),
(13, 'Home and Kitchen', 'Sakura', '202005144853-1', 'inactive'),
(14, 'Home and Kitchen', 'Toyo-Xtra', '202005145033-1', 'active'),
(15, 'Computer and Accessories', 'HP', '202011102846-1', 'active'),
(16, 'Computer and Accessories', 'Dell', '202011102922-1', 'active'),
(17, 'Computer and Accessories', 'Acer', '202011103136-1', 'active'),
(18, 'Computer and Accessories', 'Toshiba', '202011103218-1', 'active'),
(19, 'Generator &amp; portable power', 'Apollo', '202006164627-1', 'inactive'),
(20, 'Generator &amp; portable power', 'Blacklion', '202005160929-1', 'inactive'),
(21, 'Generator &amp; portable power', 'Golden Crown', '202005161001-1', 'inactive'),
(22, 'Generator &amp; portable power', 'Evergreen', '202005161024-1', 'inactive'),
(23, 'Generator &amp; portable power', 'Kelly', '202005161048-1', 'inactive'),
(24, 'Phones and Tablets', 'Samsung', '202011103728-1', 'active'),
(25, 'Phones and Tablets', 'Infinix', '202011104121-1', 'active'),
(26, 'Phones and Tablets', 'Nokia', '202011103848-1', 'active'),
(27, 'Phones and Tablets', 'LG', '202011103739-1', 'active'),
(28, 'Phones and Tablets', 'Techno', '202011103959-1', 'active'),
(29, 'Computer and Accessories', 'Apple', '202011103304-1', 'active'),
(30, 'Electronics', 'Hisense', '202011103355-1', 'active'),
(31, 'Electronics', 'Dexter', '202011103545-1', 'active'),
(32, 'Phones and Tablets', 'part', '202011102621-1', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'TV &amp; Video', '2020-05-18 05:01:51', '2020-11-17 14:22:18', 'inactive'),
(2, 'Home and Kitchen', '2020-05-18 05:02:06', '2020-11-18 14:28:21', 'active'),
(3, 'Computer and Accessories', '2020-05-18 05:02:17', '2020-11-18 14:26:28', 'active'),
(4, 'Generator &amp; portable power', '2020-05-18 05:02:30', '2020-11-18 08:03:49', 'inactive'),
(8, 'Cameras &amp; Photos', '2020-06-30 16:42:39', '2020-11-18 08:04:42', 'inactive'),
(9, 'Wearable Technology', '2020-11-17 15:23:48', '2020-11-17 14:23:48', 'inactive'),
(10, 'Car Electronics &amp; GPS', '2020-11-17 15:24:00', '2020-11-17 14:24:00', 'inactive'),
(11, 'Printers', '2020-11-17 15:24:12', '2020-11-18 08:06:35', 'inactive'),
(12, 'Phones and Tablets', '2020-11-17 15:24:27', '2020-11-18 14:27:38', 'active'),
(13, 'Electronics', '2020-11-17 15:24:39', '2020-11-18 14:27:53', 'active'),
(14, 'Musical Instruments', '2020-11-17 15:24:49', '2020-11-17 14:24:49', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `id` int(11) NOT NULL,
  `fees` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charge`
--

INSERT INTO `charge` (`id`, `fees`) VALUES
(1, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `dblog`
--

CREATE TABLE `dblog` (
  `id` int(11) NOT NULL,
  `dblog_id` varchar(30) NOT NULL,
  `dtitle` varchar(2000) NOT NULL,
  `ddesc` text NOT NULL,
  `dimg` varchar(255) NOT NULL,
  `ddate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dblog`
--

INSERT INTO `dblog` (`id`, `dblog_id`, `dtitle`, `ddesc`, `dimg`, `ddate`) VALUES
(3, '202006102507', 'Logic is the study of reason', '<p>&nbsp;Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit,&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit. Culpa&nbsp;eos&nbsp;repellat&nbsp;in&nbsp;temporibus&nbsp;exercitationem&nbsp;neque&nbsp;ducimus, at&nbsp;quasi&nbsp;ea&nbsp;eaque&nbsp;pariatur&nbsp;ipsum&nbsp;sed,&nbsp;iusto&nbsp;reprehenderit! Sequi&nbsp;totam&nbsp;enim&nbsp;nemo&nbsp;reprehenderit?</p>', '202006103821-1', '2020 06 04 10:25:07'),
(4, '202006112414', 'Philosophy That Addresses Topics Such As Goodness', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;consectetur&nbsp;adipiscing&nbsp;elit.&nbsp;Donec&nbsp;facilisis&nbsp;neque&nbsp;ut&nbsp;purus&nbsp;fermentum,&nbsp;</p><p>ac&nbsp;pretium&nbsp;nibh&nbsp;facilisis.&nbsp;Vivamus&nbsp;venenatis&nbsp;viverra&nbsp;iaculis.&nbsp;Suspendisse&nbsp;tempor&nbsp;orci&nbsp;&nbsp;non&nbsp;sapien&nbsp;</p><p>ullamcorper&nbsp;dapibus.&nbsp;Suspendisse&nbsp;at&nbsp;velit&nbsp;diam.&nbsp;Donec pharetra&nbsp;nec&nbsp;enim&nbsp;blandit&nbsp;vulputate.</p>', '202006112414-1', '2020 06 04 11:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `dcart`
--

CREATE TABLE `dcart` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `orderid` varchar(30) DEFAULT NULL,
  `dpid` varchar(30) DEFAULT NULL,
  `pname` varchar(200) DEFAULT NULL,
  `dsku` varchar(60) DEFAULT NULL,
  `dbrand` varchar(100) DEFAULT NULL,
  `dvcode` varchar(60) DEFAULT NULL,
  `dprice` varchar(100) DEFAULT NULL,
  `dqty` varchar(100) DEFAULT NULL,
  `dcharge` varchar(100) NOT NULL,
  `dtotal` varchar(100) NOT NULL,
  `dimg` varchar(100) DEFAULT NULL,
  `dstore_id` varchar(45) DEFAULT NULL,
  `dcompany` varchar(100) DEFAULT NULL,
  `dpayment_status` varchar(10) DEFAULT 'pending',
  `dorder_status` varchar(15) DEFAULT 'pending',
  `dlocation` text NOT NULL,
  `dpay_mth` varchar(20) DEFAULT 'yespay',
  `daddress` text NOT NULL,
  `dagent_id` varchar(30) DEFAULT NULL,
  `dagent_name` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcart`
--

INSERT INTO `dcart` (`id`, `userid`, `orderid`, `dpid`, `pname`, `dsku`, `dbrand`, `dvcode`, `dprice`, `dqty`, `dcharge`, `dtotal`, `dimg`, `dstore_id`, `dcompany`, `dpayment_status`, `dorder_status`, `dlocation`, `dpay_mth`, `daddress`, `dagent_id`, `dagent_name`, `created_date`) VALUES
(31, '29052020100934', '201126095719', '20111802514936439826', 'Notebook', '20111849-4902', 'Computer and Accessories', 'TOB-204911U4902-S', '320000', '1', '1000', '321000', '202011145149-1', '91234567899834', 'Universal Electronics', 'paid', 'confirmed', '4 Toyin Street Ikeja', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', '201203031508784570', 'Babatunde Fashola', '2020-11-26 10:04:03'),
(32, '29052020100934', '201126095719', '20112004495564675344', 'Apple MacBook Pro 13', '20112056-5604', 'Apple', 'NIG-205611U5604-S', '760000', '1', '1000', '761000', '202011164956-1', '201120035323502137', 'IsaacNewton Ltd', 'paid', 'confirmed', '4 Toyin Street Ikeja', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', '201203031508784570', 'Babatunde Fashola', '2020-11-26 10:04:03'),
(33, '21052020135731', '201126150911635594', '20112004495564675344', 'Apple MacBook Pro 13', '20112056-5604', 'Apple', 'NIG-205611U5604-S', '760000', '1', '500', '760500', '202011164956-1', '201120035323502137', 'IsaacNewton Ltd', 'paid', 'returned', 'Yaba Area', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-11-26 14:14:54'),
(34, '21052020135731', '201126150911635594', '20112301311611523823', 'SHARE THIS PRODUCT   Haier Thermocool Single Door Small Refrigerator 142 MBS R6 SLV', '20112316-1601', 'LG', 'NIG-201611U1601-S', '73000', '1', '500', '73500', '202011133116-1', '91234567899834', 'Universal Electronics', 'paid', 'delivered', 'Ogba', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-11-26 14:14:54'),
(35, '21052020135731', 'Elect-201126041705', '20112301062862106907', 'Dexter 43&quot; Inches High Standard LED TV', '20112328-2801', 'Dexter', 'NIG-202811U2801-S', '73000', '1', '200', '73200', '202011130628-1', '91234567899834', 'Universal Electronics', 'paid', 'delivered', 'Yaba Area', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-11-26 15:22:21'),
(36, '21052020135731', 'Elect-201126041705', '20111805051198890337', 'Infinix Hot 9', '20111811-1105', 'Phones and Tablets', 'NIG-201111U1105-S', '46000', '1', '200', '46200', '202011170511-1', '91234567899834', 'Universal Electronics', 'paid', 'confirmed', 'Ogba', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-11-26 15:22:21'),
(37, '21052020135731', '201201082245304916', '20112004495564675344', 'Apple MacBook Pro 13', '20112056-5604', 'Apple', 'NIG-205611U5604-S', '760000', '1', '500', '760500', '202011164956-1', '201120035323502137', 'IsaacNewton Ltd', 'cancelled', 'cancelled', 'Ogba', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-12-01 07:29:32'),
(38, '21052020135731', '201201082245304916', '20111802514936439826', 'Notebook', '20111849-4902', 'Computer and Accessories', 'TOB-204911U4902-S', '320000', '1', '500', '320500', '202011145149-1', '91234567899834', 'Universal Electronics', 'cancelled', 'cancelled', 'Yaba Area', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', NULL, NULL, '2020-12-01 07:29:32'),
(40, '21052020135731', '201201120716577837', '20112301004396754025', 'Hisense TV 40 B5100 - 40', '20112343-4301', 'Hisense', 'NIG-204311U4301-S', '80000', '1', '500', '80500', '202011130043-1', '91234567899834', 'Universal Electronics', 'paid', 'confirmed', 'Yaba Area', 'yespay', ' 	No 11, Redemption Street Rumuekini . River State', '201201033434497519', NULL, '2020-12-01 11:51:42'),
(42, '21052020135731', '201201125601985266', '20111801174710175347', 'Notebook', '20111848-4801', 'Computer and Accessories', 'TOB-204811U4801-S', '250000', '1', '1000', '251000', '202011131747-1', '91234567899834', 'Universal Electronics', 'paid', 'dispatched', 'Abule Egba', 'yespay', 'No 1, Aso rock villa, Abuja', NULL, NULL, '2020-12-01 11:57:45'),
(43, '21052020135731', '201201125748685242', '20111801282770781318', 'Notebook', '20111827-2701', 'Computer and Accessories', 'TOB-202711U2701-S', '270000', '1', '1000', '271000', '202011132827-1', '91234567899834', 'Universal Electronics', 'paid', 'confirmed', 'Abule Egba', 'yespay', 'No 1, Aso rock villa, Abuja', '201201033434497519', NULL, '2020-12-01 11:59:17'),
(44, '21052020135731', '201201010924774050', '20112301311611523823', 'SHARE THIS PRODUCT   Haier Thermocool Single Door Small Refrigerator 142 MBS R6 SLV', '20112316-1601', 'LG', 'NIG-201611U1601-S', '73000', '1', '1000', '74000', '202011133116-1', '91234567899834', 'Universal Electronics', 'pending', 'pending', 'Abule Egba', 'ondelivery', 'No 1, Aso rock villa, Abuja', NULL, NULL, '2020-12-01 12:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `dcart_holder`
--

CREATE TABLE `dcart_holder` (
  `id` int(11) NOT NULL,
  `orderid` varchar(30) DEFAULT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `dtotal_bill` varchar(100) NOT NULL,
  `dcharges` varchar(100) DEFAULT NULL,
  `dlocation` varchar(200) DEFAULT NULL,
  `payment_status` varchar(30) NOT NULL DEFAULT 'pending',
  `dpay_mth` varchar(20) DEFAULT 'yespay',
  `dstatus` varchar(30) NOT NULL DEFAULT 'pending',
  `daddess` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcart_holder`
--

INSERT INTO `dcart_holder` (`id`, `orderid`, `userid`, `dtotal_bill`, `dcharges`, `dlocation`, `payment_status`, `dpay_mth`, `dstatus`, `daddess`, `created_date`, `updated_date`) VALUES
(2, '200530143624', '21052020135731', '371000', '2000', 'Abule Egba', 'pending', 'yespay', 'pending', '', '2020-05-30 12:37:50', '2020-05-30 13:37:50'),
(3, '200530144044', '21052020135731', '367000', '3000', 'Abule Egba', 'paid', 'yespay', 'processed', '', '2020-05-30 20:26:09', '2020-05-30 21:26:09'),
(4, '200530222609', '21052020135731', '90500', '500', 'Iyana Ipaja', 'paid', 'ondelivery', 'delivered', '', '2020-05-30 20:44:26', '2020-05-30 21:44:26'),
(5, '200608173004', '21052020135731', '13825', '1000', 'Yaba Area', 'paid', 'ondelivery', 'delivered', '', '2020-06-08 15:58:49', '2020-06-08 16:58:49'),
(6, '200623104224', '29052020100934', '5500', '500', '4 Toyin Street Ikeja', 'pending', 'ondelivery', 'pending', '', '2020-06-23 11:15:42', '2020-06-23 12:15:42'),
(7, '200623131546', '29052020100934', '90500', '500', 'Iyana Ipaja', 'paid', 'ondelivery', 'delivered', '', '2020-06-23 12:41:12', '2020-06-23 13:41:12'),
(8, '200623144117', '29052020100934', '86000', '500', 'Iyana Ipaja', 'paid', 'ondelivery', 'delivered', 'Power line opposite UBA bank, Ipaja', '2020-06-23 13:01:43', '2020-06-23 14:01:43'),
(11, '200626161054', '29052020100934', '106680', '1000', 'Iyana Ipaja', 'pending', 'ondelivery', 'pending', 'Ipaja Lagos', '2020-06-26 15:41:06', '2020-06-26 16:41:06'),
(12, '200626174110', '29052020100934', '294050', '1000', 'Iyana Ipaja', 'pending', 'ondelivery', 'pending', 'Ipaja Lagos', '2020-06-26 15:44:21', '2020-06-26 16:44:21'),
(19, '200629150031', '29052020100934', '271500', '500', 'Iyana Ipaja', 'pending', 'ondelivery', 'pending', 'No 11, Redemption Street Rumuekini . River State', '2020-06-29 13:01:21', '2020-06-29 14:01:21'),
(20, '200629150419', '29052020100934', '270600', '600', 'Ogba', 'pending', 'ondelivery', 'pending', 'No 11, Redemption Street Rumuekini . River State', '2020-06-29 13:07:54', '2020-06-29 14:07:54'),
(21, '200629150758', '29052020100934', '19040', '1200', 'Ogba', 'pending', 'ondelivery', 'pending', 'No 11, Redemption Street Rumuekini . River State', '2020-06-29 13:10:52', '2020-06-29 14:10:52'),
(22, '200629151057', '29052020100934', '181000', '1000', '4 Toyin Street Ikeja', 'pending', 'ondelivery', 'pending', 'No 11, Redemption Street Rumuekini . River State', '2020-06-29 13:16:14', '2020-06-29 14:16:14'),
(23, '200629151618', '29052020100934', '181000', '1000', '4 Toyin Street Ikeja', 'pending', 'ondelivery', 'pending', 'This is too much i don\'t understand it', '2020-06-29 13:25:53', '2020-06-29 14:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `dcoupon`
--

CREATE TABLE `dcoupon` (
  `id` int(11) NOT NULL,
  `dcopid` varchar(20) NOT NULL,
  `dcode` varchar(20) NOT NULL,
  `dpercent` int(11) NOT NULL,
  `dstart` varchar(20) NOT NULL,
  `dend` varchar(20) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcoupon`
--

INSERT INTO `dcoupon` (`id`, `dcopid`, `dcode`, `dpercent`, `dstart`, `dend`, `dstatus`) VALUES
(1, '2006082736', 'APPLYJUNE', 15, '2020-06-08', '2020-06-20', 'on'),
(3, '2006081149', 'APPLYJULY', 10, '2020-07-01', '2020-07-16', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `ddelivery`
--

CREATE TABLE `ddelivery` (
  `id` int(11) NOT NULL,
  `dlocation` text DEFAULT NULL,
  `dprice` varchar(100) DEFAULT NULL,
  `dcategory` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ddelivery`
--

INSERT INTO `ddelivery` (`id`, `dlocation`, `dprice`, `dcategory`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Abule Egba', '1000', 'Delivery Area', '2020-05-18 11:20:52', '2020-05-18 10:20:52', 'active'),
(2, 'Ogba', '200', 'Delivery Area', '2020-05-18 11:21:17', '2020-05-18 10:21:17', 'active'),
(3, 'Yaba Area', '1000', 'Delivery Area', '2020-05-18 11:23:01', '2020-05-18 10:23:01', 'inactive'),
(4, 'Iyana Ipaja', '500', 'Delivery Area', '2020-05-18 11:23:10', '2020-05-18 10:23:10', 'active'),
(5, 'Yaba Area', '1000', 'Delivery Area', '2020-05-18 11:32:34', '2020-05-18 10:32:34', 'active'),
(6, '4 Toyin Street Ikeja', '500', 'Delivery Station', '2020-06-23 10:18:32', '2020-06-23 09:18:32', 'active'),
(7, '3 Ijaye', '300', 'Delivery Station', '2020-06-23 10:20:13', '2020-06-23 09:20:13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dpercent`
--

CREATE TABLE `dpercent` (
  `id` int(11) NOT NULL,
  `reef` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpercent`
--

INSERT INTO `dpercent` (`id`, `reef`) VALUES
(1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `drating`
--

CREATE TABLE `drating` (
  `id` int(11) NOT NULL,
  `drat_id` varchar(30) DEFAULT NULL,
  `duserid` varchar(30) DEFAULT NULL,
  `dpid` varchar(30) DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `ddesc` text NOT NULL,
  `dstar` int(11) NOT NULL,
  `ddate` varchar(20) DEFAULT NULL,
  `dstatus` varchar(30) NOT NULL DEFAULT 'unactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drating`
--

INSERT INTO `drating` (`id`, `drat_id`, `duserid`, `dpid`, `dname`, `ddesc`, `dstar`, `ddate`, `dstatus`) VALUES
(1, '2006035714', '21052020135731', '05342020201305', 'Young Elefiku', 'something', 5, '2020 Jun 03 04:57:14', 'active'),
(2, '2006030302', '21052020135731', '05172020201405', 'Young Elefiku', 'I love this too much', 3, '2020 Jun 03 05:03:02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dship_address`
--

CREATE TABLE `dship_address` (
  `id` int(11) NOT NULL,
  `dship_id` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `daddress` text NOT NULL,
  `dstatus` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dship_address`
--

INSERT INTO `dship_address` (`id`, `dship_id`, `userid`, `daddress`, `dstatus`) VALUES
(1, '20202606100736', '26062020100736', 'No 4 Toyin street, Ikeja Lagos  No 4 Toyin street, Ikeja Lagos  No 4 Toyin street, Ikeja Lagos', 'no'),
(2, '20202606115729', '26062020100736', 'No 1 Ogbankeja compound, Takete Onisu, Yagba East LGA, Kogi State', 'no'),
(5, '20202606122822', '26062020100736', ' No 1 Redemption Street, Takete Onisu, Yagba East LGA, River State', 'yes'),
(6, '20202606161241', '29052020100934', 'No 11, Redemption Street Rumuekini . River State', 'no'),
(7, '20202906152553', '29052020100934', 'This is too much i don\'t understand it', 'no'),
(8, '20202906174240', '29052020100934', 'This is Young Elefiku testing', 'yes'),
(9, '20202611151328', '21052020135731', 'No 1, Aso rock villa, Abuja', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `dslide`
--

CREATE TABLE `dslide` (
  `id` int(11) NOT NULL,
  `dslide_id` varchar(20) NOT NULL,
  `dtitle1` varchar(200) NOT NULL,
  `dtitle2` varchar(200) NOT NULL,
  `dtitle3` varchar(200) NOT NULL,
  `dcaption` varchar(50) NOT NULL,
  `durl` varchar(100) NOT NULL,
  `dimg` varchar(100) NOT NULL,
  `dmobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dslide`
--

INSERT INTO `dslide` (`id`, `dslide_id`, `dtitle1`, `dtitle2`, `dtitle3`, `dcaption`, `durl`, `dimg`, `dmobile`) VALUES
(20, '202005163658', '30% Off', '&lt;p&gt;Cell Phones&lt;/p&gt;', '&lt;p&gt;We have different kind of cell phones, charger and batteries&lt;/p&gt;', 'Read More', 'http://www.electronics.com/', '202011150758-1', '2020111056-1'),
(21, '202005164017', '20% Off', '&lt;p&gt;Musical Instruments&lt;/p&gt;', '&lt;p&gt;Enjoy the best musical instruments as you want&lt;/p&gt;', 'Learn More', 'http://www.electronics.com/', '202011150442-1', '2020111055-1'),
(22, '202005164252', '30% Off', '&lt;p&gt;Buy any of your choice&lt;/p&gt;', '&lt;p&gt;We are ready to give you the best of electronics in the world,&lt;/p&gt;\r\n\r\n&lt;p&gt;shop at any time&lt;/p&gt;', 'Shop Now', 'http://www.electronics.com/feature', '202011150142-1', '2020111054-1');

-- --------------------------------------------------------

--
-- Table structure for table `dsub`
--

CREATE TABLE `dsub` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `subid` varchar(20) DEFAULT NULL,
  `pid` varchar(30) DEFAULT NULL,
  `dimg` varchar(100) DEFAULT NULL,
  `pname` varchar(200) DEFAULT NULL,
  `dsku` varchar(50) DEFAULT NULL,
  `dbrand` varchar(100) DEFAULT NULL,
  `dvcode` varchar(50) DEFAULT NULL,
  `dduration` varchar(100) DEFAULT NULL,
  `dtrans_status` varchar(20) DEFAULT 'active',
  `pstatus` varchar(20) NOT NULL DEFAULT 'inactive',
  `dqty` int(11) NOT NULL,
  `dprice` varchar(100) NOT NULL,
  `dcharge` varchar(100) DEFAULT NULL,
  `per_month` varchar(100) NOT NULL,
  `dtotal` varchar(100) DEFAULT NULL,
  `amt_paid` varchar(100) DEFAULT '0',
  `dbalance` varchar(100) DEFAULT NULL,
  `dlocation` text NOT NULL,
  `daddress` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsub`
--

INSERT INTO `dsub` (`id`, `userid`, `subid`, `pid`, `dimg`, `pname`, `dsku`, `dbrand`, `dvcode`, `dduration`, `dtrans_status`, `pstatus`, `dqty`, `dprice`, `dcharge`, `per_month`, `dtotal`, `amt_paid`, `dbalance`, `dlocation`, `daddress`, `created_date`, `updated_date`) VALUES
(8, '21052020135731', '2005281126440', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'completed', 'shipped', 1, '225000', '1000', '75334', '226000', '226002', '-2', 'Abule Egba', '', '2020-05-29 13:39:26', '2020-05-28 10:26:44'),
(9, '21052020135731', '2005281126441', '05182020261405', '202005144018-1', 'Maxxis MAXXIS TYRE 205 65R15', '20052620-2002', 'Kelly', 'TOB-202005U2002-S', '6', 'completed', 'delivered', 1, '108000', '1000', '18167', '109000', '109002', '-2', 'Abule Egba', '', '2020-05-29 14:05:25', '2020-05-28 10:26:44'),
(10, '21052020135731', '2005280450070', '05342020201305', '202005135434-1', 'MICHELIN 275/45R21', '20052036-3601', 'Golden Crown', 'TOB-203605U3601-S', '3', 'completed', 'processed', 2, '77600', '200', '51800', '155400', '155400', '0', 'Ogba', '', '2020-06-24 13:31:02', '2020-05-28 15:50:07'),
(11, '21052020135731', '2005291003270', '05342020201305', '202005135434-1', 'MICHELIN 275/45R21', '20052036-3601', 'Golden Crown', 'TOB-203605U3601-S', '3', 'cancelled', 'cancelled', 2, '77600', '500', '51900', '155700', '0', '155700', 'Iyana Ipaja', '', '2020-05-29 13:02:52', '2020-05-29 09:03:27'),
(12, '29052020100934', '2005291009370', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'part', 'pending', 2, '225000', '200', '150067', '450200', '300134', '150066', 'Ogba', '', '2020-06-24 12:09:15', '2020-05-29 09:09:37'),
(13, '29052020100934', '2006091243170', '05182020261405', '202005144018-1', 'Maxxis MAXXIS TYRE 205 65R15', '20052620-2002', 'Kelly', 'TOB-202005U2002-S', '3', 'completed', 'processed', 1, '108000', '500', '36167', '108500', '108500', '0', 'Iyana Ipaja', '', '2020-06-24 13:28:08', '2020-06-09 11:43:17'),
(14, '29052020100934', '2006241202180', '06452020181606', '202006161245-1', 'Battery', '20061846-4604', 'Sakura', 'TOB-204606U4604-S', '3', 'completed', 'pending', 1, '6000', '1000', '2334', '7000', '7000', '0', 'Abule Egba', 'Aso rock villa, Abuja', '2020-06-24 12:30:15', '2020-06-24 11:02:18'),
(19, '29052020100934', '2006290542400', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'active', 'pending', 2, '225000', '500', '150167', '450500', '0', '450500', '4 Toyin Street Ikeja', 'This is Young Elefiku testing', '2020-06-29 15:42:41', '2020-06-29 16:42:41'),
(20, '29052020100934', '2006290554530', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'active', 'pending', 3, '225000', '500', '225167', '675500', '0', '675500', '4 Toyin Street Ikeja', 'This is Young Elefiku testing', '2020-06-29 15:54:53', '2020-06-29 16:54:53'),
(21, '29052020100934', '2006290604420', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'active', 'pending', 1, '225000', '500', '75167', '225500', '0', '225500', 'Iyana Ipaja', 'This is Young Elefiku testing', '2020-06-29 16:04:42', '2020-06-29 17:04:42'),
(22, '29052020100934', '2006290604421', '05092020201305', '202005135809-1', 'Mobil 1 Full Synthetic Motor O', '20052011-1101', 'Mobil', 'TOB-201105U1101-S', '3', 'active', 'pending', 2, '8330', '500', '5720', '17160', '0', '17160', 'Iyana Ipaja', 'This is Young Elefiku testing', '2020-06-29 16:04:42', '2020-06-29 17:04:42'),
(23, '29052020100934', '2007020140500', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'active', 'inactive', 1, '225000', '500', '75167', '225500', '0', '225500', '4 Toyin Street Ikeja', 'This is Young Elefiku testing', '2020-07-02 15:15:35', '2020-07-02 12:40:50'),
(24, '29052020100934', '2007020315380', '05172020201405', '202005141117-1', 'Brandix Brake Kit BDX-750Z370-S', '20052020-2002', 'Blacklion', 'TOB-202005U2002-S', '3', 'active', 'inactive', 1, '225000', '500', '75167', '225500', '0', '225500', 'Iyana Ipaja', 'This is Young Elefiku testing', '2020-07-02 15:15:31', '2020-07-02 14:15:38'),
(25, '29052020100934', '2007020507380', '05342020201305', '202005135434-1', 'MICHELIN 275/45R21', '20052036-3601', 'Golden Crown', 'TOB-203605U3601-S', '3', 'active', 'inactive', 1, '87300', '500', '29267', '87800', '0', '87800', '4 Toyin Street Ikeja', 'This is Young Elefiku testing', '2020-07-02 15:15:42', '2020-07-02 16:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `dtracker`
--

CREATE TABLE `dtracker` (
  `id` int(11) NOT NULL,
  `dpid` varchar(30) NOT NULL,
  `dstaff_id` varchar(30) NOT NULL,
  `dstatus` text NOT NULL,
  `ddate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtracker`
--

INSERT INTO `dtracker` (`id`, `dpid`, `dstaff_id`, `dstatus`, `ddate`) VALUES
(1, '200608173004', '91234567899834', 'Mark as paid', '2020-06-24 12:34:02'),
(2, '200608173004', '91234567899834', 'Mark as delivered', '2020-06-24 12:34:47'),
(3, '05182020261405', '91234567899834', 'Amount of 36167 recorded', '2020-06-24 01:05:56'),
(4, '05172020201405', '91234567899834', 'Amount of &#8358; 150,067.00 recorded', '2020-06-24 01:09:13'),
(5, '06452020181606', '91234567899834', 'Amount of &#8358; 2,332.00 recorded', '2020-06-24 01:30:13'),
(6, '2006091243170', '91234567899834', 'Amount of &#8358; 36,167.00 recorded', '2020-06-24 01:31:07'),
(7, '2005280450070', '91234567899834', 'Amount of &#8358; 36,166.00 recorded', '2020-06-24 01:36:10'),
(8, '2005280450070', '91234567899834', 'Amount of &#8358; 51,800.00 recorded', '2020-06-24 01:37:44'),
(9, '2006241206470', '91234567899834', 'Mark as processed', '2020-06-24 02:27:35'),
(10, '2006091243170', '91234567899834', 'Mark as processed', '2020-06-24 02:28:08'),
(11, '2005280450070', '91234567899834', 'Amount of &#8358; 51,800.00 recorded', '2020-06-24 02:30:17'),
(12, '2005280450070', '91234567899834', 'Mark as processed', '2020-06-24 02:31:02'),
(13, '200623131546', '91234567899834', 'Mark as paid', '2020-06-24 02:43:52'),
(14, '200623131546', '91234567899834', 'Mark as delivered', '2020-06-24 02:44:12'),
(15, '200623144117', '05062020122454', 'Mark as paid', '2020-06-24 02:55:47'),
(16, '200623144117', '05062020122454', 'Mark as delivered', '2020-06-24 02:56:04'),
(17, '2007020315380', '91234567899834', 'Mark as approved', '2020-07-02 03:50:45'),
(18, '2007020507380', '91234567899834', 'Mark as declined(subscription)', '2020-07-02 04:09:04'),
(19, 'Elect-201126041705', '201120035323502137', 'Mark as confirmed', '2020-11-27 14:31:05'),
(20, 'Elect-201126041705', '201120035323502137', 'Mark as confirmed', '2020-11-27 16:08:30'),
(21, 'Elect-201126041705', '201120035323502137', 'Mark as confirmed', '2020-11-27 16:13:31'),
(22, 'Elect-201126041705', '201120035323502137', 'Mark as confirmed', '2020-11-27 16:16:05'),
(23, '201126150911635594', '201120035323502137', 'Mark as confirmed', '2020-11-30 11:40:26'),
(24, '201126150911635594', '201120035323502137', 'Mark as dispatched', ''),
(25, 'Elect-201126041705', '201120035323502137', 'Mark as confirmed', '2020-11-30 13:09:15'),
(26, 'Elect-201126041705', '201120035323502137', 'Mark as dispatched', ''),
(27, 'Elect-201126041705', '201120035323502137', 'Mark as delivered', '2020-11-30 01:13:16'),
(28, '201126150911635594', '201120035323502137', 'Mark as confirmed', '2020-11-30 13:16:25'),
(29, '201126150911635594', '201120035323502137', 'Mark as delivered', ''),
(30, '201126150911635594', '201120035323502137', 'Mark as delivered', ''),
(31, '201126150911635594', '201120035323502137', 'Mark as delivered', ''),
(32, '201126150911635594', '201120035323502137', 'Mark as delivered', '2020-11-30 13:24:53'),
(33, '201126150911635594', '201120035323502137', 'Mark as delivered', '2020-11-30 13:27:40'),
(34, '201126150911635594', '201120035323502137', 'Mark as returned', '2020-11-30 13:44:24'),
(35, '201126150911635594', '201120035323502137', 'Mark as dispatched', '2020-11-30 13:45:30'),
(36, '201126150911635594', '201120035323502137', 'Mark as dispatched', '2020-11-30 13:45:30'),
(37, '201126150911635594', '201120035323502137', 'Mark as delivered', '2020-11-30 14:32:08'),
(38, 'Elect-201126041705', '201120035323502137', 'Mark as delivered', '2020-11-30 15:37:34'),
(39, '201201125601985266', '201120035323502137', 'Mark as confirmed', '2020-12-01 13:30:24'),
(40, '201201125601985266', '201120035323502137', 'Mark as dispatched', '2020-12-01 14:02:57'),
(41, '201201125601985266', '201120035323502137', 'Mark as dispatched', '2020-12-01 14:02:57'),
(42, '201126095719', '91234567899834', 'Mark as confirmed', '2020-12-01 14:30:28'),
(43, '201201125748685242', '201201033434497519', 'Mark as confirmed', '2020-12-21 10:00:16'),
(44, '201201120716577837', '201201033434497519', 'Mark as confirmed', '2020-12-21 10:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `dwishlist`
--

CREATE TABLE `dwishlist` (
  `id` int(11) NOT NULL,
  `wish_id` varchar(30) DEFAULT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `pid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dwishlist`
--

INSERT INTO `dwishlist` (`id`, `wish_id`, `userid`, `pid`) VALUES
(4, '200603014223', '21052020135731', 'undefined'),
(5, '200608122339', '29052020100934', '05172020201405');

-- --------------------------------------------------------

--
-- Table structure for table `dwithdrawal`
--

CREATE TABLE `dwithdrawal` (
  `id` int(11) NOT NULL,
  `dwithid` varchar(20) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `damount` int(11) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `ddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dwithdrawal`
--

INSERT INTO `dwithdrawal` (`id`, `dwithid`, `userid`, `dname`, `damount`, `dstatus`, `ddate`) VALUES
(3, '20120410303835528', '91234567899834', 'admin : Universal Electronics', 4000, 'paid', '2020-12-04 10:30:38'),
(4, '201204105622445241', '91234567899834', 'admin : Universal Electronics', 3000, 'cancelled', '2020-12-04 10:56:22'),
(5, '201204105631723737', '91234567899834', 'admin : Universal Electronics', 5000, 'pending', '2020-12-04 10:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `orderid` varchar(30) DEFAULT NULL,
  `dpid` varchar(30) DEFAULT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `amt_paid` varchar(100) DEFAULT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `userid`, `orderid`, `dpid`, `pname`, `amt_paid`, `ddate`) VALUES
(1, '21052020135731', '200528035730', '2005281126440', 'Brandix Brake Kit BDX-750Z370-S', '75334', '2020-05-28 14:57:30'),
(2, '21052020135731', '200528041517', '2005281126440', 'Brandix Brake Kit BDX-750Z370-S', '75334', '2020-05-28 15:15:18'),
(3, '21052020135731', '200528041940', '2005281126440', 'Brandix Brake Kit BDX-750Z370-S', '75334', '2020-05-28 15:19:40'),
(4, '21052020135731', '200528045424', '2005280450070', 'MICHELIN 275/45R21', '51800', '2020-05-28 15:54:24'),
(5, '29052020100934', '200529124836', '05172020201405', 'Brandix Brake Kit BDX-750Z370-S', '150067', '2020-05-29 11:48:36'),
(6, '', '200530132516', '200530023422', 'Brandix Brake Kit BDX-750Z370-S & MICHELIN 275/45R21 & ', '258000', '2020-05-30 13:34:22'),
(7, '', '200530143624', '200530023751', 'Maxxis MAXXIS TYRE 205 65R15 & Brandix Brake Kit BDX-750Z370-S & ', '371000', '2020-05-30 13:37:51'),
(8, '', '200530222609', '200530104426', 'Brandix Brake Kit BDX-750Z370-S & ', '90500', '2020-05-30 21:44:26'),
(9, '', '200608173004', '200608055849', 'MICHELIN 275/45R21 & ', '13825', '2020-06-08 16:58:49'),
(10, '', '200623104224', '200623011542', 'Battery & ', '5500', '2020-06-23 12:15:42'),
(11, '', '200623131546', '200623024113', 'Brandix Brake Kit BDX-750Z370-S & ', '90500', '2020-06-23 13:41:13'),
(12, '', '200623144117', '200623030143', 'MICHELIN 275/45R21 & ', '86000', '2020-06-23 14:01:43'),
(13, '', '200623150147', '200623033344', 'Brandix Brake Kit BDX-750Z370-S & ', '90500', '2020-06-23 14:33:44'),
(14, '', '', '200623033348', '', '', '2020-06-23 14:33:48'),
(15, '29052020100934', '200624014524', '05172020201405', 'Brandix Brake Kit BDX-750Z370-S', '225500', '2020-06-24 12:45:26'),
(16, '29052020100934', '200624010009', '06452020181606', 'Battery', '2334', '2020-06-24 13:00:11'),
(17, '29052020100934', '200624010255', '06452020181606', 'Battery', '2334', '2020-06-24 13:02:57'),
(18, '29052020100934', '200624010556', '05182020261405', 'Maxxis MAXXIS TYRE 205 65R15', '36167', '2020-06-24 13:05:58'),
(19, '29052020100934', '200624010913', '05172020201405', 'Brandix Brake Kit BDX-750Z370-S', '150067', '2020-06-24 13:09:15'),
(20, '29052020100934', '200624013013', '06452020181606', 'Battery', '2332', '2020-06-24 13:30:15'),
(21, '29052020100934', '200624013107', '05182020261405', 'Maxxis MAXXIS TYRE 205 65R15', '36167', '2020-06-24 13:31:09'),
(22, '29052020100934', '200624013610', '05182020261405', 'Maxxis MAXXIS TYRE 205 65R15', '36166', '2020-06-24 13:36:12'),
(23, '21052020135731', '200624013744', '05342020201305', 'MICHELIN 275/45R21', '51800', '2020-06-24 13:37:46'),
(24, '21052020135731', '200624023017', '05342020201305', 'MICHELIN 275/45R21', '51800', '2020-06-24 14:30:20'),
(25, '', '200626161054', '200626054106', 'Brandix Brake Kit BDX-750Z370-S & Mobil 1 Full Synthetic & ', '106680', '2020-06-26 16:41:06'),
(26, '', '200626174110', '200626054421', 'Brandix Brake Kit BDX-750Z370-S & Maxxis MAXXIS TYRE 205 65R15 & ', '294050', '2020-06-26 16:44:21'),
(27, '', '200629105757', '200629023951', 'Battery & ', '18000', '2020-06-29 13:39:51'),
(28, '', '200629143955', '200629024320', 'Brandix Brake Kit BDX-750Z370-S & ', '271500', '2020-06-29 13:43:20'),
(29, '', '', '200629024324', '', '', '2020-06-29 13:43:24'),
(30, '', '200629144751', '200629025027', 'Brandix Brake Kit BDX-750Z370-S & ', '271500', '2020-06-29 13:50:27'),
(31, '', '200629145538', '200629025638', 'Brandix Brake Kit BDX-750Z370-S & ', '273000', '2020-06-29 13:56:38'),
(32, '', '', '200629025642', '', '', '2020-06-29 13:56:42'),
(33, '', '200629150031', '200629030121', 'Brandix Brake Kit BDX-750Z370-S & ', '271500', '2020-06-29 14:01:21'),
(34, '', '200629150419', '200629030754', 'Brandix Brake Kit BDX-750Z370-S & ', '270600', '2020-06-29 14:07:54'),
(35, '', '200629150758', '200629031053', 'Battery & Mobil 1 Full Synthetic & ', '19040', '2020-06-29 14:10:53'),
(36, '', '200629151057', '200629031614', 'Brandix Brake Kit BDX-750Z370-S & ', '181000', '2020-06-29 14:16:14'),
(37, '', '200629151618', '200629032553', 'Brandix Brake Kit BDX-750Z370-S & ', '181000', '2020-06-29 14:25:53'),
(38, '', '200702144330', '200702025648', 'Brandix Brake Kit BDX-750Z370-S & ', '91000', '2020-07-02 13:56:48'),
(39, '', '201126095719', '201126110405', 'Notebook & Apple MacBook Pro 13 & ', '1084000', '2020-11-26 11:04:07'),
(40, '29052020100934', 'Elect-201126022502', '201126022520', 'Notebook & Apple MacBook Pro 13 & ', '1082000', '2020-11-26 14:25:20'),
(41, '', '201126150911635594', '201126031454', 'Apple MacBook Pro 13 & SHARE THIS PRODUCT   Haier Thermocool Single Door Small Refrigerator 142 MBS ', '835000', '2020-11-26 15:14:54'),
(42, '', 'Elect-201126041705', '201126042222', 'Dexter 43&quot; Inches High Standard LED TV & Infinix Hot 9 & ', '119800', '2020-11-26 16:22:22'),
(43, '', '201201082004409639', '201201082110', 'Apple MacBook Pro 13,Notebook,', '1084000', '2020-12-01 08:21:10'),
(44, '', '201201082245304916', '201201082932', 'Apple MacBook Pro 13,Notebook,', '1082000', '2020-12-01 08:29:32'),
(45, '', '201201120350164803', '201201120513', 'Dexter 43&quot; Inches High Standard LED TV,', '73500', '2020-12-01 12:05:13'),
(46, '', '201201120716577837', '201201125142', 'Hisense TV 40 B5100 - 40,', '80500', '2020-12-01 12:51:42'),
(47, '', '201201125145723574', '201201125558', 'Infinix Hot 9,', '47000', '2020-12-01 12:55:58'),
(48, '', '201201125601985266', '201201125745', 'Notebook,', '251000', '2020-12-01 12:57:45'),
(49, '', '201201125748685242', '201201125918', 'Notebook & ', '271000', '2020-12-01 12:59:18'),
(50, '', '201201010924774050', '201201011402', 'SHARE THIS PRODUCT   Haier Thermocool Single Door Small Refrigerator 142 MBS R6 SLV,', '74000', '2020-12-01 13:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `dpass` varchar(50) DEFAULT NULL,
  `demail` varchar(50) DEFAULT NULL,
  `dphone` varchar(20) NOT NULL,
  `daddress` text NOT NULL,
  `dstatuss` varchar(10) NOT NULL DEFAULT 'active',
  `referrer` varchar(30) DEFAULT NULL,
  `dwallet` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `dname`, `dpass`, `demail`, `dphone`, `daddress`, `dstatuss`, `referrer`, `dwallet`, `created_date`) VALUES
(1, '21052020135731', 'Young Elefiku', '4adf7d6eebb0266197b2d52a6273865b', 'youngelefiku@gmail.com', '08061382683', 'Aso Rock Villa, Abuja', 'active', NULL, '105000', '2020-05-21 12:57:31'),
(2, '29052020100934', 'Elefiku Young', '4adf7d6eebb0266197b2d52a6273865b', 'youngelefiku44@gmail.com', '08061382683', 'PHC', 'active', NULL, '97000', '2020-05-29 09:09:34'),
(3, '04062020182631', 'Paul Elefiku', '6c63212ab48e8401eaf6b59b95d816a9', 'paulelefiku44@gmail.com', '08061382683', 'PHC', 'active', '21052020135731', '0', '2020-06-04 17:26:31'),
(4, '26062020100736', 'Elefiku Young', '4adf7d6eebb0266197b2d52a6273865b', 'youngelefiku123@gmail.com', '08061382683', 'Aso rock villa, Abuja', 'active', NULL, '0', '2020-06-26 09:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifivcation`
--

CREATE TABLE `notifivcation` (
  `id` int(11) NOT NULL,
  `notid` varchar(30) DEFAULT NULL,
  `dtitle` varchar(200) NOT NULL,
  `ddesc` text NOT NULL,
  `dimg` varchar(60) NOT NULL,
  `durl` varchar(200) NOT NULL,
  `dstart` varchar(30) NOT NULL,
  `dend` varchar(30) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifivcation`
--

INSERT INTO `notifivcation` (`id`, `notid`, `dtitle`, `ddesc`, `dimg`, `durl`, `dstart`, `dend`, `dstatus`) VALUES
(1, '23432675891', 'Tyres and Wheels', '<p>This is a Nigerian tyre centre for distribution and sales of brand new tyres and tubes for cars and vehicles.</p>', '202006170801-1', 'http://tyreonbudget.com/shop-list', '2020-06-30', '2020-07-30', 'inactive'),
(2, '2006302308', 'Tyres and Wheel Promo', '<p>This is a Nigerian tyre centre for distribution and sales of brand new tyres</p>', '202006165854-1', 'http://tyreonbudget.com/shop-list', '2020-06-30', '2020-08-01', 'inactive'),
(3, '2006304651', 'Lubricants', '<p>This is a Nigerian tyre centre for distribution and sales of brand new tyres and tubes for cars and vehicles.</p>', '202006164649-1', 'http://tyreonbudget.com/shop-list', '2020-06-30', '2020-09-05', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE `payout` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(10) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(10) NOT NULL DEFAULT 'pending',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`id`, `payment_id`, `userid`, `name`, `bank_name`, `account_name`, `account_number`, `amount`, `payment_status`, `created_date`) VALUES
(1, '0440202040', '21052020135731', 'Young Elefiku', 'UBA', 'Elefiku Stephen Adedeji', 2068194161, 10000, 'cancelled', '2020-06-04 11:17:10'),
(2, '0443202043', '21052020135731', 'Young Elefiku', 'UBA', 'Elefiku Stephen Adedeji', 2068194161, 5000, 'paid', '2020-06-04 11:10:50'),
(3, '0526202026', '29052020100934', 'Elefiku Young', 'UBA', 'Elefiku Stephen Adedeji', 2068194161, 3000, 'pending', '2020-06-05 09:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `dpid` varchar(40) DEFAULT NULL,
  `duserid` varchar(40) DEFAULT NULL,
  `dstore` varchar(20) DEFAULT NULL,
  `dcompany` text DEFAULT NULL,
  `dsku` varchar(30) DEFAULT NULL,
  `dvcode` varchar(20) DEFAULT NULL,
  `dpname` varchar(200) DEFAULT NULL,
  `dcategory` varchar(255) DEFAULT NULL,
  `dsub_cat` varchar(255) DEFAULT NULL,
  `dbrand` varchar(255) DEFAULT NULL,
  `dpdesc` text DEFAULT NULL,
  `dldesc` text DEFAULT NULL,
  `dspec` text DEFAULT NULL,
  `davaliable` varchar(100) DEFAULT NULL,
  `dinstall_price` varchar(100) DEFAULT NULL,
  `dplan2` varchar(100) DEFAULT NULL,
  `dplan3` varchar(100) DEFAULT NULL,
  `dplan4` varchar(100) DEFAULT NULL,
  `dprice` varchar(100) NOT NULL,
  `ddiscount` varchar(100) DEFAULT NULL,
  `dimg1` varchar(200) DEFAULT NULL,
  `dimg2` varchar(200) DEFAULT NULL,
  `dimg3` varchar(200) DEFAULT NULL,
  `dimg4` varchar(200) DEFAULT NULL,
  `ddisplay_opt` varchar(100) DEFAULT NULL,
  `ddisplay_opt2` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `dpid`, `duserid`, `dstore`, `dcompany`, `dsku`, `dvcode`, `dpname`, `dcategory`, `dsub_cat`, `dbrand`, `dpdesc`, `dldesc`, `dspec`, `davaliable`, `dinstall_price`, `dplan2`, `dplan3`, `dplan4`, `dprice`, `ddiscount`, `dimg1`, `dimg2`, `dimg3`, `dimg4`, `ddisplay_opt`, `ddisplay_opt2`, `created_at`, `updated_at`) VALUES
(19, '20111801174710175347', '91234567899834', 'Admin', 'Universal Electronics', '20111848-4801', 'TOB-204811U4801-S', 'Notebook', 'Computer and Accessories', 'Laptops', 'Computer and Accessories', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'In-Stock', '0', '', '', '', '250000', '', '202011131747-1', '202011131747-1_1', '202011131747-1_2', '202011131747-1_3', 'featured', 'New', '2020-11-18 13:17:48', '2020-11-18 12:17:48'),
(20, '20111801282770781318', '91234567899834', 'Admin', 'Universal Electronics', '20111827-2701', 'TOB-202711U2701-S', 'Notebook', 'Computer and Accessories', 'Laptops', 'Computer and Accessories', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', 'In-Stock', '0', '', '', '', '270000', '', '202011132827-1', '202011132827-1_1', '202011132827-1_2', '202011132827-1_3', 'featured', 'Hot', '2020-11-18 13:28:27', '2020-11-18 12:28:27'),
(21, '20111801440152698111', '91234567899834', 'Admin', 'Universal Electronics', '20111802-0201', 'TOB-200211U0201-S', 'Notebook', 'Computer and Accessories', 'Laptops', 'Computer and Accessories', '<p>Sometimes it’s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it’s safe, durable and ready for today’s tasks - and tomorrow’s. Stylish, durable design. A laptop isn’t just a piece of electronics - it’s also an investment. That’s why we designed the IdeaPad  with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit<i>.</i>&nbsp;Eius&nbsp;voluptate&nbsp;totam&nbsp;rem&nbsp;aliquam&nbsp;qui<i>!</i>&nbsp;</p><p>Ipsa,&nbsp;sint,&nbsp;est&nbsp;asperiores&nbsp;blanditiis&nbsp;earum&nbsp;eaque&nbsp;sequi&nbsp;atque&nbsp;eligendi&nbsp;vel&nbsp;enim&nbsp;culpa&nbsp;dolorem&nbsp;voluptate&nbsp;nostrum<i>.</i></p><p>&nbsp;</p>', '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit<i>.</i>&nbsp;Eius&nbsp;voluptate&nbsp;totam&nbsp;rem&nbsp;aliquam&nbsp;qui<i>!</i>&nbsp;</p><p>Ipsa,&nbsp;sint,&nbsp;est&nbsp;asperiores&nbsp;blanditiis&nbsp;earum&nbsp;eaque&nbsp;sequi&nbsp;atque&nbsp;eligendi&nbsp;vel&nbsp;enim&nbsp;culpa&nbsp;dolorem&nbsp;voluptate&nbsp;nostrum<i>.</i></p><p>&nbsp;</p>', 'In-Stock', '0', '', '', '', '280000', '', '202011134401-1', '202011134401-1_1', '202011134401-1_2', '202011134401-1_3', 'featured', 'New', '2020-11-18 13:44:01', '2020-11-18 12:44:02'),
(22, '20111802514936439826', '91234567899834', 'Admin', 'Universal Electronics', '20111849-4902', 'TOB-204911U4902-S', 'Notebook', 'Computer and Accessories', 'Laptops', 'Computer and Accessories', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', 'In-Stock', '0', '', '', '', '320000', '', '202011145149-1', '202011145149-1_1', '202011145149-1_2', '202011145149-1_3', 'featured', 'Hot', '2020-11-18 14:51:49', '2020-11-18 13:51:49'),
(23, '20111804380432817836', '91234567899834', 'Admin', 'Universal Electronics', '20111805-0504', 'NIG-200511U0504-S', 'Lenovo Ideapad Intel Core I3', 'Computer and Accessories', 'Laptops', 'Lenovo', '<p>Sometimes it&rsquo;s best to keep things simple. Stacked with premium Intel processing and discrete graphics options, the IdeaPad 330 is as powerful as it is easy to use. Available in a range of sophisticated colors, it&rsquo;s safe, durable and ready for today&rsquo;s tasks - and tomorrow&rsquo;s. Stylish, durable design. A laptop isn&rsquo;t just a piece of electronics - it&rsquo;s also an investment. That&rsquo;s why we designed the IdeaPad&nbsp; with a special protective finish to guard against wear and tear, as well as rubber detailing on the bottom to maximize ventilation and extend component life.</p>\r\n', '<p><br />\r\nTechnical Details</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Lenovo</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Series</td>\r\n			<td>Ideapad 330</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Screen Size</td>\r\n			<td>15.6 Inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Display Resolution</td>\r\n			<td>1366x768</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>2.2 Kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Dimensions</td>\r\n			<td>37.8 x 26 x 2.3 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Optical Drive Type</td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Windows 10</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Included Components</td>\r\n			<td>Laptop, Adapter and Manual</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<ul>\r\n	<li>Processor Type: Intel Core i3</li>\r\n	<li>CPU Speed (GHz): 2.00</li>\r\n	<li>Display Features: Full HD</li>\r\n	<li>Display Size (inches): 15.6</li>\r\n	<li>Hard Disk (GB): 1000</li>\r\n	<li>Megapixels: 10.0</li>\r\n	<li>Operating System: Windows 10</li>\r\n	<li>Internal Memory(GB): 8</li>\r\n	<li>Color: GREY</li>\r\n	<li>Model: ideapad</li>\r\n	<li>Product Line: Mercy and Mercy stores</li>\r\n	<li>Weight (kg): 2.3</li>\r\n	<li>Shop Type: Jumia Mall</li>\r\n</ul>\r\n', 'In-Stock', '0', '', '', '', '150000', '', '202011163804-1', '202011163804-1_1', '202011163804-1_2', '202011163804-1_3', 'featured', 'Hot', '2020-11-18 16:38:04', '2020-11-18 15:38:05'),
(24, '20111805051198890337', '91234567899834', 'Admin', 'Universal Electronics', '20111811-1105', 'NIG-201111U1105-S', 'Infinix Hot 9', 'Phones and Tablets', 'Mobile Phones', 'Phones and Tablets', '<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Octa-core (4x1.8 GHz Cortex-A53 &amp; 4x1.4 GHz Cortex-A53)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>GPU</td>\r\n			<td>PowerVR GE8320</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>MEMORY</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>RAM (Memory)</td>\r\n			<td>2 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Storage Capacity</td>\r\n			<td>32 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card Slot</td>\r\n			<td>Yes, up to 256 GB via microSD card (uses dedicated slot)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phonebook</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Call Record</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>MAIN CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Double Lenses</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>13 MP + 0.3 MP Main camera</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;View More</p>\r\n\r\n<h3>SELFIE CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Single Lens</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>8-megapixel Punch hole</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Octa-core (4x1.8 GHz Cortex-A53 &amp; 4x1.4 GHz Cortex-A53)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>GPU</td>\r\n			<td>PowerVR GE8320</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>MEMORY</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>RAM (Memory)</td>\r\n			<td>2 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Storage Capacity</td>\r\n			<td>32 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card Slot</td>\r\n			<td>Yes, up to 256 GB via microSD card (uses dedicated slot)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phonebook</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Call Record</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>MAIN CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Double Lenses</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>13 MP + 0.3 MP Main camera</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;View More</p>\r\n\r\n<h3>SELFIE CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Single Lens</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>8-megapixel Punch hole</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Octa-core (4x1.8 GHz Cortex-A53 &amp; 4x1.4 GHz Cortex-A53)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>GPU</td>\r\n			<td>PowerVR GE8320</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>MEMORY</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>RAM (Memory)</td>\r\n			<td>2 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Storage Capacity</td>\r\n			<td>32 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card Slot</td>\r\n			<td>Yes, up to 256 GB via microSD card (uses dedicated slot)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phonebook</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Call Record</td>\r\n			<td>Practically Unlimited</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>MAIN CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Double Lenses</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>13 MP + 0.3 MP Main camera</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;View More</p>\r\n\r\n<h3>SELFIE CAMERA</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Camera Type</td>\r\n			<td>Single Lens</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Camera Sensor(s)</td>\r\n			<td>8-megapixel Punch hole</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'In-Stock', '0', '', '', '', '46000', '', '202011170511-1', '202011170511-1_1', '202011170511-1_2', '202011170511-1_3', 'Popular', 'New', '2020-11-18 17:05:11', '2020-11-18 16:05:11'),
(25, '2011180532403230837', '91234567899834', 'Admin', 'Universal Electronics', '20111840-4005', 'NIG-204011U4005-S', 'Tecno Camon 15', 'Phones and Tablets', 'Mobile Phones', 'Techno', '<ul>\r\n	<li><strong>Network:&nbsp;</strong>2G &ndash; Yes, 3G &ndash; Yes , 4G &ndash; Yes</li>\r\n	<li><strong>Operating System</strong>: Android 9.0, Pie</li>\r\n	<li><strong>Processor / GPU</strong>:&nbsp; 2.0 GHz Octa Core Cortex A53 / PowerVR GE8320</li>\r\n	<li><strong>Display / Resolution</strong>: 6.4 Inches / 1548 x 720 pixel</li>\r\n	<li><strong>RAM</strong>: 4 GB</li>\r\n	<li><strong>Internal / External Memory</strong>: 64 GB / Expandable with microSD (Maximum 256 GB, Uses Dedicated Slot)</li>\r\n	<li><strong>Camera</strong>:&nbsp;<strong>Back / Rear</strong>&nbsp;(16 MP + 8 MP + 2 MP),&nbsp;<strong>Front</strong>&nbsp;(32 MP)</li>\r\n	<li><strong>Battery Capacity</strong>: 3500 mAh Li-Po</li>\r\n	<li><strong>Sensors</strong>:&nbsp;&nbsp; Fingerprint, Accelerometer, Proximity, Light, Compass, Gyroscope</li>\r\n	<li><strong>Additional Features</strong>: Face Unlock, Fingerprint Unlock, Fast Battery Charging</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Gold</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td><a href=\"https://www.konga.com/brand/tecno\">Tecno</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Screen size</td>\r\n			<td>6.4 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sim Type</td>\r\n			<td>Dual SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>OS</td>\r\n			<td>Android OS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Internal Memory</td>\r\n			<td>64 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sim Slots</td>\r\n			<td>Dual Sim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Battery Capacity</td>\r\n			<td>5000mAh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>NETWORK Technology<br />\r\nGSM / HSPA / LTE<br />\r\nLAUNCH Announced 2020, February 21<br />\r\nStatus Available. Released 2020, February 25<br />\r\nBODY Dimensions 164.1 x 76.4 x 8.8 mm (6.46 x 3.01 x 0.35 in)<br />\r\nWeight 196 g (6.91 oz)<br />\r\nBuild Glass front, plastic back, plastic frame<br />\r\nSIM Dual SIM (Nano-SIM, dual stand-by)<br />\r\nDISPLAY Type IPS LCD capacitive touchscreen, 16M colors<br />\r\nSize 6.6 inches, 105.2 cm2 (~83.9% screen-to-body ratio)<br />\r\nResolution 720 x 1600 pixels, 20:9 ratio (~266 ppi density)<br />\r\nPLATFORM OS Android 10, HIOS 6.0<br />\r\nChipset Mediatek MT6762 Helio P22 (12 nm)<br />\r\nCPU Octa-core 2.0 GHz Cortex-A53<br />\r\nGPU PowerVR GE8320<br />\r\nMEMORY Card slot microSDXC (dedicated slot)<br />\r\nInternal 64GB 4GB RAM<br />\r\neMMC 5.1<br />\r\nMAIN CAMERA Quad 48 MP, PDAF<br />\r\n2 MP<br />\r\n2 MP<br />\r\nQVGA<br />\r\nFeatures Quad-LED flash, panorama, HDR<br />\r\nVideo 1080p@30fps<br />\r\nSELFIE CAMERA Single 16 MP<br />\r\nFeatures Dual-LED flash, HDR<br />\r\nVideo 1080p@30fps<br />\r\nSOUND Loudspeaker Yes<br />\r\n3.5mm jack Yes<br />\r\nCOMMS WLAN Wi-Fi 802.11 b/g/n, hotspot<br />\r\nBluetooth 5.0, A2DP, LE<br />\r\nGPS Yes, with A-GPS, GLONASS<br />\r\nRadio FM radio<br />\r\nUSB microUSB 2.0, USB On-The-Go<br />\r\nFEATURES Sensors Fingerprint (rear-mounted), accelerometer, proximity<br />\r\nBATTERY Type Li-Po 5000 mAh, non-removable</p>\r\n', 'In-Stock', '0', '', '', '', '60800', '', '202011173240-1', '202011173240-1_1', '202011173240-1_2', '202011173240-1_3', 'Popular', 'New', '2020-11-18 17:32:40', '2020-11-18 16:32:40'),
(26, '20112004495564675344', '201120035323502137', 'Seller', 'IsaacNewton Ltd', '20112056-5604', 'NIG-205611U5604-S', 'Apple MacBook Pro 13', 'Computer and Accessories', 'Laptops', 'Apple', '<ul>\r\n	<li>Apple MacBook Pro - 13&quot; Display with Touch Bar - Intel Core i5 - 8GB Memory - 512GB SSD (Latest Model)</li>\r\n	<li>61W USB-C Power Adapter</li>\r\n	<li>USB-C Charge Cable (2 m)</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>34.06 x 24.78 x 7.35 cm; 2.9 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>1 Lithium ion batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>MXK52</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>Apple Computer</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color</th>\r\n			<td>Space Grey</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Form Factor</th>\r\n			<td>Laptop</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Standing screen display size</th>\r\n			<td>13 Inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Screen Resolution</th>\r\n			<td>2560 x 1600</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Resolution</th>\r\n			<td>2560 x 1600</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Brand</th>\r\n			<td>Intel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Type</th>\r\n			<td>Intel Core i5</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Speed</th>\r\n			<td>1.4 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor Count</th>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM Size</th>\r\n			<td>512 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memory Technology</th>\r\n			<td>LPDDR3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Computer Memory Type</th>\r\n			<td>DDR3 SDRAM</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hard Drive Size</th>\r\n			<td>512 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hard Disk Description</th>\r\n			<td>SSD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Card Description</th>\r\n			<td>Intel Iris Plus Graphics 645</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics RAM Type</th>\r\n			<td>DDR4 SDRAM</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Card Ram Size</th>\r\n			<td>8</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics Card Interface</th>\r\n			<td>Integrated</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Connectivity Type</th>\r\n			<td>Wi-Fi</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Wireless Type</th>\r\n			<td>802.11ac</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Optical Drive Type</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Operating System</th>\r\n			<td>Mac OS X</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Are Batteries Included</th>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Lithium Battery Energy Content</th>\r\n			<td>61 Watt Hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Lithium Battery Packaging</th>\r\n			<td>Batteries contained in equipment</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Lithium Battery Weight</th>\r\n			<td>0.5 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number Of Lithium Ion Cells</th>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of Lithium Metal Cells</th>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>2.9 kg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<ul>\r\n	<li>Intel Core i5 Processor</li>\r\n	<li>&nbsp;8th Generation processor</li>\r\n	<li>Quad core processor</li>\r\n	<li>8GB RAM LPDDR3 I</li>\r\n	<li>512GB SSD storage</li>\r\n	<li>1.4 GHz Intel Core i5 Quad-Core (8th Gen)</li>\r\n	<li>8GB of 2133 MHz LPDDR3 RAM - 512GB SSD</li>\r\n	<li>13.3&quot; 2560 x 1600 IPS Retina Display</li>\r\n	<li>Integrated Intel Iris Plus Graphics</li>\r\n	<li>P3 Color Gamut - True Tone Technology</li>\r\n	<li>Wi-Fi 5 (802.11ac) - Bluetooth 5.0</li>\r\n	<li>Touch Bar - Touch ID Sensor</li>\r\n	<li>2 x Thunderbolt 3 (USB Type-C) Ports</li>\r\n	<li>Magic Keyboard -</li>\r\n</ul>\r\n', 'In-Stock', '0', '', '', '', '760000', '', '202011164956-1', '202011164956-1_1', '202011164956-1_2', '202011164956-1_3', 'Special Offer', 'Hot', '2020-11-20 16:49:55', '2020-11-20 15:49:56'),
(27, '20112301004396754025', '91234567899834', 'Admin', 'Universal Electronics', '20112343-4301', 'NIG-204311U4301-S', 'Hisense TV 40 B5100 - 40', 'Electronics', 'Television and Video', 'Hisense', '<p><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Fly away with us into a world where reality takes the back seat to imagination, sensation and intrigue. With Hisense LED, the optical limits and boundaries of traditional television are defied. And believe us, your imagination will leave you no choice but to indulge</span></p>\r\n', '', '<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Model Description:</strong></li>\r\n	<li>N2176</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>DISPLAY</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Backlight System:</strong></li>\r\n	<li>Direct LED</li>\r\n	<li><strong>Brightness (cd/m.sq):</strong></li>\r\n	<li>200</li>\r\n	<li><strong>Native Contrast Ratio:</strong></li>\r\n	<li>4000:1</li>\r\n	<li><strong>Response Time (ms):</strong></li>\r\n	<li>8ms (Grey to Grey)</li>\r\n	<li><strong>1080p Full High Definition Resolution:</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>Viewing Angle (Horizontal / Vertical ):</strong></li>\r\n	<li>178ﾰ / 178ﾰ</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>DIGITAL MULTIMEDIA PLAYER</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Play back multiple audio &amp; video files from external USB storage:</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>Music Playback:</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>Display Photos:</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>Video Playback:</strong></li>\r\n	<li>Yes</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;<strong>RECEPTION SYSTEM</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Auto Tune Setup Wizard:</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>AV Colour System:</strong></li>\r\n	<li>PAL</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>AUDIO</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>MAX Audio Output (RMS):</strong></li>\r\n	<li>2 x 7 Watt</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>TERMINAL INPUTS/OUTPUTS</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>HDMI Ports:</strong></li>\r\n	<li>2</li>\r\n	<li><strong>HDMI CEC:</strong></li>\r\n	<li>n/a</li>\r\n	<li><strong>Optical / Digital Audio Output (SPDIF):</strong></li>\r\n	<li>n/a</li>\r\n	<li><strong>USB Ports:</strong></li>\r\n	<li>1</li>\r\n	<li><strong>AV Input (Audio &amp; Video):</strong></li>\r\n	<li>1</li>\r\n	<li><strong>AV Output (Audio &amp; Video):</strong></li>\r\n	<li>0</li>\r\n	<li><strong>Component Input (YPbPr):</strong></li>\r\n	<li>1</li>\r\n	<li><strong>Headphone (3.5 mm):</strong></li>\r\n	<li>1</li>\r\n	<li><strong>RF Tuner:</strong></li>\r\n	<li>1</li>\r\n	<li><strong>VGA Input:</strong></li>\r\n	<li>1</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>DIMENSIONS</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Carton box dimensions (mm):</strong></li>\r\n	<li>1079 x 153 x 658</li>\r\n	<li><strong>Dimensions with stand (mm):</strong></li>\r\n	<li>971 x 603 x 206</li>\r\n	<li><strong>Dimensions without stand (no stand) (mm):</strong></li>\r\n	<li>971 x 567 x 86.5</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>WEIGHT</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Net Weight:</strong></li>\r\n	<li>10kg</li>\r\n	<li><strong>Gross Weight:</strong></li>\r\n	<li>12kg</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;<strong>ACCESSORIES INCLUDED</strong></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">&nbsp;</p>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>Battery</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>Remote Control</strong></li>\r\n	<li>Yes</li>\r\n	<li><strong>User Manual</strong></li>\r\n</ul>\r\n', 'In-Stock', '0', '', '', '', '80000', '', '202011130043-1', '202011130043-1_1', NULL, NULL, 'Bestsellers', 'New', '2020-11-23 13:00:43', '2020-11-23 12:00:43'),
(28, '20112301062862106907', '91234567899834', 'Admin', 'Universal Electronics', '20112328-2801', 'NIG-202811U2801-S', 'Dexter 43&quot; Inches High Standard LED TV', 'Electronics', 'Television and Video', 'Dexter', '<p><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">43 Inch 80cm HD LED TV 43 will redefine the way you enjoy entertainment, the slim LED TV will be a perfect addition to electronics collection. This Dexter LED TV will allow you see images in sharp and crystal clear form. With a high resolution, you will be able to see colours in their true form. This will make you have an enjoyable TV experience, entertainment get better when you have a very good television. If you are a lover of sport and action movies that involves a lot of fast moving pictures then this LED TV is the right choice. It has an in-built with technology that will eliminate blur from fast moving pictures. This will ensure you have a complete all-round entertainment.</span></p>\r\n', '<p><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">43 Inch 80cm HD LED TV 43 will redefine the way you enjoy entertainment, the slim LED TV will be a perfect addition to electronics collection. This Dexter LED TV will allow you see images in sharp and crystal clear form. With a high resolution, you will be able to see colours in their true form. This will make you have an enjoyable TV experience, entertainment get better when you have a very good television. If you are a lover of sport and action movies that involves a lot of fast moving pictures then this LED TV is the right choice. It has an in-built with technology that will eliminate blur from fast moving pictures. This will ensure you have a complete all-round entertainment.</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">The secret behind&nbsp; TV&rsquo;s life-like color and wide viewing angle is the panel. Just as the quality of the beans&nbsp;</span><br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">determines the quality of the coffee, the quality of the panel determines the quality of the TV. The IPS Panel&nbsp;</span><br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">used by&nbsp; is the reason why LED TVs have clearer, more consistent, and sturdy screens.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Life-like Color: IPS offers a color impression that is most identical to that of the image. The colors are truly closest to nature and most comfortable for the eyes.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Wide Viewing Angle: Among LCD panels, it is visibly clear that IPS shows the most consistent color and contrast from all angles. Free from color wash and contrast loss, it is the ideal panel for all purposes.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Blur-free Clarity: IPS is decidedly superior to the competing panels in the clarity of its pictures during fast motion display, allowing blur-free, crystal-clear pictures.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Stable Screen: IPS panels are stable and sturdy, and resistant to damage, as opposed to weak competing panels; just try a simple knock or poke at the screens to see for yourself.</span></p>\r\n', '<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:212px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">KEY FEATURES</h2>\r\n\r\n<div class=\"-pam markup\" style=\"box-sizing:border-box; padding:16px\">\r\n<ul>\r\n	<li>1 Year Warranty</li>\r\n	<li>Resolution: (1920 X 1080) FHD</li>\r\n	<li>Ports: USB(2), HDMI (2)、VGA(2)、AV input (1)</li>\r\n	<li>Enjoy photos, music, and video right on the screen</li>\r\n	<li>Eco-Friendly : Save energy, Save your money</li>\r\n	<li>Automatic Volume Leveller (AVL)</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:212px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">WHAT&rsquo;S IN THE BOX</h2>\r\n\r\n<div class=\"-pam markup\" style=\"box-sizing:border-box; padding:16px\">1 User Manual1 LED TV1 Remote ControlDouble TV Legs</div>\r\n</div>\r\n\r\n<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:281px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">SPECIFICATIONS</h2>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>SKU</strong>: DE541EA0G0UDUNAFAMZ</li>\r\n	<li><strong>Color</strong>: Black</li>\r\n	<li><strong>Main Material</strong>: Plastic and Metal</li>\r\n	<li><strong>Model</strong>: 43LFMN0T</li>\r\n	<li><strong>Production Country</strong>: Korea, Republic of</li>\r\n	<li><strong>Product Line</strong>: JANAGOR STORE</li>\r\n	<li><strong>Weight (kg)</strong>: 8</li>\r\n</ul>\r\n</div>\r\n', 'In-Stock', '0', '', '', '', '73000', '', '202011130628-1', '202011130628-1_1', '202011130628-1_2', NULL, 'Bestsellers', 'New', '2020-11-23 13:06:28', '2020-11-23 12:06:28'),
(29, '20112301311611523823', '91234567899834', 'Admin', 'Universal Electronics', '20112316-1601', 'NIG-201611U1601-S', 'SHARE THIS PRODUCT   Haier Thermocool Single Door Small Refrigerator 142 MBS R6 SLV', 'Home and Kitchen', 'Home theatre systems', 'LG', '<p><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">The Thermocool&nbsp;</span><strong>HR-142 MBS SILVER</strong><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">&nbsp;Refrigerator Single Door Small is a compact fridge with&nbsp;</span><strong>130-Litres</strong><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">&nbsp;storage capacity and a wide voltage design. In this fridge the shelf section gives you the flexibility to store a number of bottles, whilst the in-built vegetable crisper makes any fresh produce stored stay in store-bought condition for a number of days. This fridge is a great addition to any home, and will easily slot into any small space.</span><br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">About HAIER THERMOCOOL</span></p>\r\n', '<p><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">The Thermocool&nbsp;</span><strong>HR-142 MBS SILVER</strong><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">&nbsp;Refrigerator Single Door Small is a compact fridge with&nbsp;</span><strong>130-Litres</strong><span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">&nbsp;storage capacity and a wide voltage design. In this fridge the shelf section gives you the flexibility to store a number of bottles, whilst the in-built vegetable crisper makes any fresh produce stored stay in store-bought condition for a number of days. This fridge is a great addition to any home, and will easily slot into any small space.</span><br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">About HAIER THERMOCOOL</span><br />\r\n<br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">A Brand of PZ Cussons in Nigeria, the Haier Thermocool Brand has been in the business of manufacturing top of the range consumer products and home appliances and electronics since the 70s. For Haier Thermocool, the key words are quality, reliability, service and innovation. That&#39;s why each product is developed and manufactured to highest standards to meet specific needs of their customers. Each product also comes with a warranty and the promise of after-sales service.</span><br />\r\n<span style=\"background-color:#ffffff; color:#282828; font-family:Roboto,-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Helvetica Neue&quot;,Arial,sans-serif; font-size:14px\">Each Haier Thermocool product comes with the Jumia fair price promise and delivery everywhere in Nigeria. You might be moving into a new home. Or you could just want to get a set of new electronic appliances for your home. Whichever the case may be, electronics are items which are not optional for you, they are a necessity. Of course, they differ according to function, but there is no doubt that you will always need them. They can make your work easier or could simply make the quality of your work a lot better. On Jumia, you can find authentic, long-lasting electronic appliances. Find valuable home appliances ranging from small appliances like pressing irons, blenders, toasters, water dispensers, vacuum cleaners, deep fryers, microwaves, electric kettles, hotplates and more. Also, explore our amazing selection of large appliances which include fridges and freezers, washers and dryers, air conditioners, dishwashers, gas cookers</span></p>\r\n', '<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:254px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">KEY FEATURES</h2>\r\n\r\n<div class=\"-pam markup\" style=\"box-sizing:border-box; padding:16px\">\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li>130 Litres-storage capacity</li>\r\n	<li>Dimensions mm (W*D*H) 500*530*865</li>\r\n	<li>Direct cooling technology&nbsp;</li>\r\n	<li>Fully tropicalized compressor</li>\r\n	<li>Big evaporator for rapid and uniform cooling</li>\r\n	<li>1 Year General Warranty &amp; 3 Years on Cabinets &amp; Compressors</li>\r\n	<li>Wide voltage design&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:254px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">WHAT&rsquo;S IN THE BOX</h2>\r\n\r\n<div class=\"-pam markup\" style=\"box-sizing:border-box; padding:16px\">FridgeManual</div>\r\n</div>\r\n\r\n<div class=\"-fh card-b\" style=\"border-radius:4px; border:1px solid #ededed; box-sizing:border-box; height:223px\">\r\n<h2 style=\"margin-left:0px; margin-right:0px\">SPECIFICATIONS</h2>\r\n\r\n<ul style=\"margin-left:0px; margin-right:0px\">\r\n	<li><strong>SKU</strong>: HA992HA0N03Z0NAFAMZ</li>\r\n	<li><strong>Color</strong>: Silver</li>\r\n	<li><strong>Model</strong>: HT REF 1DOOR DCOOL 142 MBS R6 SLV</li>\r\n	<li><strong>Product Line</strong>: Eight Sage Limited</li>\r\n	<li><strong>Weight (kg)</strong>: 25</li>\r\n</ul>\r\n</div>\r\n', 'In-Stock', '0', '', '', '', '73000', '', '202011133116-1', NULL, NULL, NULL, 'Special Offer', 'Hot', '2020-11-23 13:31:16', '2020-11-23 12:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `sub_id` varchar(30) DEFAULT NULL,
  `ddurations` varchar(100) DEFAULT NULL,
  `dtran_status` varchar(20) NOT NULL DEFAULT 'active',
  `dpstatus` varchar(20) NOT NULL DEFAULT 'pending',
  `dqtys` int(11) DEFAULT NULL,
  `dprices` varchar(100) DEFAULT NULL,
  `permonth` varchar(100) DEFAULT NULL,
  `dtotals` varchar(100) DEFAULT NULL,
  `damt_paid` varchar(100) NOT NULL DEFAULT '0',
  `dbalances` varchar(100) NOT NULL,
  `dlocations` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `user_id`, `sub_id`, `ddurations`, `dtran_status`, `dpstatus`, `dqtys`, `dprices`, `permonth`, `dtotals`, `damt_paid`, `dbalances`, `dlocations`, `created_at`, `updated_at`) VALUES
(2, '21052020135731', '200528110955', '6', 'active', 'pending', 1, '225000', '37534', '225200', '', '225200', 'Ogba', '2020-05-28 09:09:55', '2020-05-28 10:09:55'),
(3, '21052020135731', '200528111333', '6', 'active', 'pending', 1, '225000', '37534', '225200', '0', '225200', 'Ogba', '2020-05-28 09:13:33', '2020-05-28 10:13:33'),
(4, '21052020135731', '200528111531', '3', 'active', 'pending', 2, '108000', '36667', '335000', '0', '335000', 'Abule Egba', '2020-05-28 09:15:31', '2020-05-28 10:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `dcategory` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `dcategory`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TV &amp; Video', 'Televisions', 'inactive', '2020-05-18 08:57:55', '2020-11-18 08:14:12'),
(2, 'TV &amp; Video', 'Smart Tvs', 'inactive', '2020-05-18 08:58:37', '2020-11-18 08:14:28'),
(3, 'TV &amp; Video', 'DVD Players &amp; Recorders', 'inactive', '2020-05-18 08:58:58', '2020-11-18 08:14:47'),
(4, 'Home and Kitchen', 'Home theatre systems', 'active', '2020-05-18 08:59:16', '2020-11-18 08:09:34'),
(5, 'Home and Kitchen', 'Receiver &amp; Amplifiers', 'active', '2020-05-18 09:00:07', '2020-11-18 08:09:58'),
(6, 'Computer and Accessories', 'Desktops', 'active', '2020-05-18 09:00:32', '2020-11-18 08:20:31'),
(7, 'Computer and Accessories', 'Laptops', 'active', '2020-05-18 09:00:49', '2020-11-18 08:20:44'),
(8, 'Computer and Accessories', 'Grease', 'inactive', '2020-05-18 09:01:01', '2020-05-18 08:01:01'),
(9, 'Computer and Accessories', 'Agricultural Oil', 'inactive', '2020-05-18 09:01:16', '2020-05-18 08:01:16'),
(10, 'Computer and Accessories', 'Industrial Oil', 'inactive', '2020-05-18 09:01:47', '2020-05-18 08:01:47'),
(11, 'Computer and Accessories', 'Hydraulic Oil', 'inactive', '2020-05-18 09:01:58', '2020-05-18 08:01:58'),
(12, 'Computer and Accessories', 'Brake Fluid', 'inactive', '2020-05-18 09:02:13', '2020-05-18 08:02:13'),
(13, 'Computer and Accessories', 'Transmission Fluid', 'inactive', '2020-05-18 09:02:28', '2020-05-18 08:02:28'),
(14, 'Generator &amp; portable power', 'Generators', 'inactive', '2020-05-18 09:02:42', '2020-11-18 08:15:56'),
(15, 'Generator &amp; portable power', 'Power Inverters', 'inactive', '2020-05-18 09:03:03', '2020-11-18 08:16:18'),
(16, 'Generator &amp; portable power', 'Solar &amp; Wind power', 'inactive', '2020-05-18 09:03:16', '2020-11-18 08:16:44'),
(17, 'Generator &amp; portable power', 'Stablizers', 'inactive', '2020-05-18 09:03:36', '2020-11-18 08:17:27'),
(18, 'Generator &amp; portable power', 'Light Truck', 'inactive', '2020-05-18 09:03:49', '2020-05-18 08:03:49'),
(19, 'Generator &amp; portable power', 'Saloon', 'inactive', '2020-05-18 09:04:02', '2020-05-18 08:04:02'),
(20, 'Generator &amp; portable power', 'SUV', 'inactive', '2020-05-18 09:04:14', '2020-05-18 08:04:14'),
(23, 'Cameras &amp; Photos', 'Digital Cameras', 'inactive', '2020-11-18 09:18:39', '2020-11-18 08:18:39'),
(24, 'Cameras &amp; Photos', 'Projectors', 'inactive', '2020-11-18 09:18:55', '2020-11-18 08:18:55'),
(25, 'Cameras &amp; Photos', 'Video Surveillance', 'inactive', '2020-11-18 09:19:20', '2020-11-18 08:19:20'),
(26, 'Cameras &amp; Photos', 'Camcorders', 'inactive', '2020-11-18 09:19:35', '2020-11-18 08:19:35'),
(27, 'Phones and Tablets', 'Mobile Phones', 'active', '2020-11-18 16:56:07', '2020-11-18 15:56:07'),
(28, 'Phones and Tablets', 'Tablets', 'active', '2020-11-18 16:56:40', '2020-11-18 15:56:40'),
(29, 'Electronics', 'Television and Video', 'active', '2020-11-23 12:57:11', '2020-11-23 11:57:11'),
(30, '', 'Young Elefiku', 'active', '2020-11-25 13:46:18', '2020-11-25 12:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `_ads_run`
--

CREATE TABLE `_ads_run` (
  `id` int(11) NOT NULL,
  `isize` varchar(60) NOT NULL,
  `iurl` varchar(950) NOT NULL,
  `data` mediumblob NOT NULL,
  `ext` varchar(8) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'running',
  `edate` varchar(60) NOT NULL,
  `image_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_ads_run`
--

INSERT INTO `_ads_run` (`id`, `isize`, `iurl`, `data`, `ext`, `status`, `edate`, `image_time`) VALUES
(1, '300 x 350', 'advertise.php', 0xffd8ffe000104a46494600010101004800480000ffdb004300040303030303040303040504030405070504040507080606070606080a0808080808080a080a0a0b0a0a080d0d0e0e0d0d121212121214141414141414141414ffdb0043010505050807080f0a0a0f120f0c0f1216151515151616141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800c8012c03011100021101031101ffc4001c0001010100020301000000000000000000030402010600050708ffc4003c1000020201040102030504060b00000000000201030405061112130721142231081532415116182361172552537181243842457273839192b4b5ffc4001b01010101010101010100000000000000000203010004050607ffc4003c1101010002010301050603060309000000000102110304122131050614415113223261718191c1f0152334a1b1e13352d1353642728292b3c2d2ffda000c03010002110311003f00fc9907e75f946d42248306916020488089620224580815602149101a36956020555085a555085a585085a555303648530764843363b6e103b1db50876d9b73d0c66dcf439db71d0e6ed9e86edbb6250ddb76c4a1a5b1ca9a5b13288e51b28b6728994d2944ca252514c0884d02313408c530228368118a6047073022626044335af20d69202248089220214ab01122c0429560214ab000a55808532a842d2aa8436655085a655085a55433616955021b242183b6e10cd8edb843363b73d0cdb36f3a1db76de74376ddb12876dbb6250d2db128696c4c82d94a26511ca16534e51328a55250b288e513288c33023826819c13408c73023829811413408c7222626044f14e737011a4508962020580852ac044ab00a9d2ac068532c0429954214eaa0a9da6550a769954cd85a655085a5540ec2d2aa042d245666c36484336cdb9e866d9b79d0edbb6e250ddbb6cca1db6ec6c869ec6c82d94a16411ca26511ca06512928594d5250b28e1c0b4094942d0230b40a1c1340ce09a04704c2313408e0e44518349c29ad240429160234aa102ac0429620214cb00a14cb004e9960214eb01a9d3aa853b4c8a1a9da755005a7540a769d5029da5540ec2d24219b0d922b0ec7b9af19db66de78cedbb6e26b3b6ddb1359bb6ec7282d96c4c86ece50b20b6a4a0651292859447281946a4a065129281a06a4034094816811c1340d48168118a604705302282611b1c089e41ad6e0005808d2c0429560206480d0a658054e9960014eb014a9d6001542a852b4e8a14ea84505a9daa110295a65405a9da7540ec2d2aa19b0b49158761b6bc666d9dce7c676dddcccd66edbb6250ddb763643767285905b3940c835254ee8256503a8d4953ba8a292a76812b281a0714806812900d028a05a070e05a06704c2382619898463349c41ada550815422550052a8429960353a658050a758027542c06a54e9004ea9480a55422813b54a2812b542282d4ad50881a9da75406d2b4cb58761dc58accd877351599b67739f19db67733359db6f70dab16ce6426acdd9ca0641a9281d052a92a7751c5654cea38aca99d4515953ba8e2913bc09589de06a40340d48168145205a06702d023130d48261141f022660eada5508d2a840aa10a6500532c02a74eb014e9d2009d509004ea8480d4aa945054aa945054ad548a0a8daa514152b54a202d4ad50880da569d503b4ed2c561d86db8acedb3b9cf8ccdb3b999acdd96c6d59bb2942d58b672a7741ab2a67512b2a67529159533a8e2b2a5751c5a54cf038ac4ef025627781c5227681ab00d028702c38a40b0d481911c148ca0cd3660d6954214aa10a65050a650d0a65054e9d2009d50900a9d509014aa948054aa948054b2aaab52751b5556a0a8daaab5054ad555a0368daa9109ed1b4ea81da769d6b0ed3b5b8accd8f739f199b76d89acd6ec4d58b67285d04a4a9ac41caaca96c51c5a54b628e2b2a5782916952d8a38b4a95e0716899e06ac4ef035227781ab13b40948161a900c38a4130ce058463983499835a550853404695429d3282853a02a74e804ea8480d4aa848025555700a95555c13a8e4ad20151aaab52751b55d6a0a8daaeb52751caaa4505a8e554a203695a7540ed3b49081d8edcf43b6cdb3286edbb0b2094953ba0e55254b628d6c6a5b14716c6a3b14a45b1a92c51c5a25b20a45e24b2071689ac82915899e051589dc6ac4ec3520185148061a902c33826118e446ca9ad2a842960214ca00a65054e9d0142a840a5542012aa52009552900a95575c13a8e4aeb80542abae09d472595a93a8655656a4ea36abad4150caaa450546d3aa8369da5840ec76e7a1db66d8943765285d4529ca9ac41c571a92c52916c6a4b14717c51d90522f8a3b20a45b14964148be292c1c5b14b6148b44ce3562671c56276145601871480619c0b0e2904c23188985348aa1a14ca00a650a74ca0a14ea04ea840a554213a9d55586a35f5eabd01de0db33f6f5750d11f6efc14e7799729d9ba447ba7b55c7786f92639fc5ec2bc375b7d1bec6e6fb1fb6de3d9adfaffb3d4e47a63afe26dad0b73a646065d1b8ee5a349c0c5b5accdb6d99eac8b4f48e651f856e267869e0965c775bfabc3c9ecee49c58726e5eff00493d6fecee583f676ded936ce9f3a868346e44c68ca7dbb666ff0058ad53f4994447ae3ff337e1b2bf4dbd33ddeea32fbbdd877eb7dbddf7bfe9fe6f43a07a65b9f59ddd76c674a34cdc9423bb62ea1678bb4d710d2a92b16769949ef1c7b4ac4cf279e70e572edf9be670fb2f9b97a8bd3f8c7927cb2f1fd78f3fa3b061fa31baafddf99b1e3274c4d770b1d32591ef68474b161bf873e3e5a621bdfd8ef86cae7dbe3653d83d465d4de9f78f7c9bf5ff004f0c607a5fb832f7ae56c15c8c0af5ec5496fe2dccb5592a8b64a54dd3966e8ddb8e3e913fa12f87cae7d9e36f2e3ec5e7cfabbd2ef1fb49f9f8bf3f1e3e9e7f6aecb77a0dbde89c9a71add2f3f50c3557c9d3f132e1b2915e39599ade138e63e9cfd7f2372e8393f2b57e5f753ad9b98f665963eb8ccbef7f0ba7cfe69b29b1e9b9192dada51d1a386565f69898fd60f9f93f299cb8dd5f5770d93e9d6e1df7f193a27815307a79acc879ad79b7b7585e15b99f97dcb7074b9f36fb7e4fa9ecaf61f53ed2eefb1d7ddd6f7e3d7f67adc1dbd9999af2edc66a717506c96c499c86e95adcb32bd59b89fab4711fcc8e3c76e7d9f3f47cfe2e8f3e4ea3e1fc639f776f9f137fd78777c9f42b7a63d9f0cb6e997e7cd737260d7951190f5acf12cab62a7b44fb73c9ebbecde59f4dfeafd0727b9bd7e37b77c773d6fb7bbcd9fa5d3e73a869f99a6e5dd81a850f8d998efd2ea6c8eacad1f94c1e2b8dc6eafabf33cbc59f0e770ce6b29eb2bb66ddf49f70eead05b71e9b97a6269b5cdb19137dec8d4cd3eede5884685f9786fafd2624f670f479f261dd2cd3ef7b3fddcea3ace9fedf0cb0ecf3bddf4d7d7c78f1e7f41e9fe906e2d5f6eb6e9c5ced2634744b2cbae7c868e9157e2eff00c398898e3f5161d1e7961dfb9a5ba6f773a8e6e9fe231cb8fecfcfcfd35fb24db5e8fee4ddfa04ee4d2f334a4d3526d5c89c8c89ada89a7f1797e4984f9787f79fc33123e1e932e4c7ba6b4a7b3fddfea3abe0fb6c32c3b3cef77d35f5f1e3ebfa3d2ebde9b6a7a25da225faa68d918bafdd651859f8997e6c556a66b579b2d85e16226d8fa726e5c171d799e59cfec9e4e1bc7bcf0b392d92ccb73c6bd6feef7f9bf670df78d7d1876e6e86b9f97164e1e1b66f4baff1444bf891eb5edd7b473c7d39f73d1f079cfa3eb5f75faac2cc6de3eebe93bbcdd7d3c3a5e99e956ecd57795db0ad4c6d3372d35bd918f9f6f8d6ce910dc54c91643cca4f78e3dbac4cfe41c7872b976fcde4e0f6573e7d47c3dd63c93ebfcbebf5fd1ecf5af40f75e8d5eabf15abede7cdd1f02dd47374cab3fbe72e3d154dacde0e90feeb1edcfb17bc167d1efe4f61f371776f2c378cdd9dde753cfa3e3f6138f978a4b0716899c715899c71589dc6ac030e2900c38a40b08c4c3505222654d22a842954014ca1a9d32828550804e9d009552804aa9ac151afd37f65adf3cbeafe9a6bf54e56d9cec3c8cc59b225a9c7544ff4a5b7fb355a9f9ccf10dfcd8bf065ff0086fa3f47eeff0059f8b833f38596fe9f5fdaff005eaf61e9f6bf89b87d76d02e7d3ecd3367e06264e9bb271b22b6aeae9894cac32cd911dac7e65dbf3ed311f5e03865be49f4f933a2e79cbed1c3c76f1c9671eff29fea3df4babed5fb4fe9faaa77feb2d434db319bdf9b31b252bc3b523fece80e4de3cef3f5fdfc1ed8c72ff9b2c75fa5d637f9c7d3b747ddff00bca6c7f87e9f78fdd799f19d7ebd7e1b2fc5dbf9f1cff9705b3d7dbe3fd7d5f5babecfed9e0d7e2edcb7ff00b72d25c589fde8b3678ff7447feb564e7f8afd9e7c3fedfbff0093ff00ac7a0c0ff5a87ff9f7ff00f29884ff0019fd7d1f338ffef27ef7ff008abe991a2a699ea26eaf50632be33e0b4baf1ecd1b12267279f0d767cddbaacf2b57cb11f5ff0018e0f57676f2e5c9eba9e8fbdf0d38bafe7eb37dddb849d98fe2f497f9787e58d77566d7f5dd475b7a9696d432edca9a57de17caf2dd79fcf8e7ea7e77973efcae5f57f21ebba9f89e7cf975aefcadfe35fa13d2fd375fdb7a36d2f80c656c1d5afbf51d7ec9ba9ad96abebf162442bbabb442f1670b127d8e8f1cf8f1c35e97cdfe4fe8beef70751d270f4fd98fdce4b967c9e64f166b0f5bbbff00378757f51b6efdcbeb06979b52f189ac6761e6271f4f2f9952e8ff001ecbda7fe23cbd5f1767552fcb2b2be1fbc1d0fc3fb6f8f39f87973c32fdfba4bfe7e7f77d037a7c4ff4bfb1fe17b793c57f6ebfddf0de4ff2e9c9eeea37f15c7a7e9bdb1ddfdb7d276fd32fe1e77fe4f97fda0be13f6f23e1b8f37ddd47c671fdf76b38e7fe9f43e77b575f6dfb3f25efcf67f68fddf5ec9bfd7cff002d3ba7a2af4d3e93ee6b7229f88c74cace6b71e5a53c891834cb2765f78ed1edcc1ecf677f87cbf5bfe91fa1f747293d91cf729b9dd9f8faff00778f851a366e95a87a13b832346d2d747c29c5cf88c35becc988685f76ef6f2dee538f2c6f4b976cd4f2f4f47cbc5c9ec2e5cb8b0fb3c759f8ddcbfcef97adf436ca29f48374db934fc4e3265e7b5d8f2d29e448c0a2593b2fbaf68f6e60ce83fe065fbffa27eea593d95cd6cdceecfc7d7ee62f896e3d7b6feb18fb6a8d036cc6deab1333226d75b1f257226d7a38e2eb7e76f1f49f699f6e7d8f1e59e3976eb1d3f2fd4755c3cd8f14e2e2fb2d657e7bdefb7e77cf8fe6fd45bfb68a6e8df7b0b22754ab06dd0efcbd4e31661bcd92945988d2b5ff00b3c44c2c3f33cf0ded13efc7d8e5e3eecf1f3e9fecfe93ed1e8be23aae9ef776f65cb2d7ceebb7d3f9feaf93626ec6ddbf6a7d22c9c1b302348af37495aaee22d6f87c4cc667788e63ddac9e389fc3c1e799f77513f2ff0077c2c3acf88f6de3e3b7b7bb1fcfc6397fd507adbba369e9dbf77469991b31751dc17e84f8ebaf2e45d63d539185c25b38adcd2b14f31f3c4731c73f5173653baf8f3a6fb63a9e1c3a9e4c6f16f3ecfc5bbf3c7d75e9e3eafcb561e58fcae296c2916895c6b44ce38ac4ee3562761452058a45201850e0986705223654d695422550274ca1a14ea0a9d3a802a84025542012aa90151afa17a6beaa6e1f4c2dcec8db98da7d993a82d6975f994b5aeb5d7333d1255ebe21a6796fd788fd0dc792e1e8f5f45ed1e4e8edb849bbf559be3d57dd7ea16bda7ee4d4e68c0d434ba96bc1fbb62ca16a64b26d8b17bd96bc3f69faf6fca01c9cb72bb47aff0069f3755c93932f171f4d78fe6edbfbc3ef6cbab05b54d3f41d4b57d3799c0d6f2f07be752ed1112f5cc3ad70dedfd83af5597e4be5ef175164eec70cb2c7d32b8f99fcbfc9d428de9b9d77526f57d42cb772a5f191f1b670d32f11d7895e3af5ebf2f5e38e3d8f35e4cbbbbbe6f8bf1dcd39fedfbbfbcdef6fa747da3f7cbea74ead181a1265a5534dacb88fdae49fa45964db367113ef10ad11cfe452f5d9ef7e1f532f7b3abfb499f6f1ef5afc3ebfaddeff00857aba3d5ad6537c37a80ba568ff007ebe3cd1d7c57f821a63a4dd0be7ede49afe4e7b71c7e443e2b2fb4efd4dbe6ff6ff002e3d67c5f671fda6b5e975fafe2f5d78f5f47bec5f5e376d1af65ee2a703494cccfc6ab1f2eb8aaff159e099f1d931e7e7bac375faf1c7e46fc7f24cbbb53cff005f5567bdbd5e1cf9734c78fbb2925f196aebd2fe2f5f93a4656a519daadbaa4e1e2e3c5b779a70a8464c58f7e651525a66167f4ec7833cb796f4fcc73f3fda72de4edc66eef53f0fe9adfa7eeec3ae6f7ccdc5abe9dac65e9da7536e9cb5575d18e9725365744c4a2590d6b375888e3e598f6172f53793299593c3d5d77b633eab9b0e5cb0c25c35e24bab27a4bf7bd3e5e2c761d6bd60d77716569799a9e95a3d97e9193f1588d155ff008b8e3ab737cfcbcf56f6e3dd60af2fb433e4b2d98fddbfd7cdefeb7decea3abcf8f3e4e3e2b78b2ee9e32fff005e9e97f5917657aebbaf26f8cd8d3f46a7524a9a9a73d31ac6beb47f79846b2d788899fe43bed4e4b77ac77f5d7fbbd1c9efb7599e5dfd9c533d6a65db7727e5bcabe69a8e7e66a9997ea1a85cf919b90fe4baeb27966693c196572bbbeafcaf373e7cd9de4e4bdd965eb5dbb6e7ab3aded4dbefb6b034cd26ed3ee9b6726726abdacba6ff0066f24a5c913f2f0bed11ed107b387adcb8f0ec926bfafcdfa1f66fbcbcfd174df0f861c770bbdee65bbbfaeb29f2f1fa0f4df5835bd1f6cbed3c6d23467d1edaecaee4b2ac896b22efc72d317ac733cfe8538fadcb1c3b3535fd7e6b74bef2f370f4df0d8f1f1fd9ddefc65e77ff00a926d7f58b5ed9db75b6ce9ba568f7e9d6b5ad953954def65f37fb3797ade8b3f2709f87e9103e1eaf2e3c7b649a53d9def173747d3fd861871dc6ef7b97cefebf7a7cbc7e8f47b83d49cdd72cd07cba26878985b7aeb6ec3d3b0f1eda716c9be6b678b93cd3331334c7e1989fa9b975172d789e079fdb1973fd9ef8f8f1c78add4c6593cebd7cfe5f93dceb1f686de5aa6a9a3eb36e9fa355a8e877db761dd55391132b7d5355b4bf6c86e6b78989988e27958f72f7accf2b2f8f0fa9c9ef3f53cb9e19dc70eec2f8f17e73567e2f4bfca3d1d9eb6ebd1be97d438d13418dc298ad8bcc5191154cb474f3cc7c4769b7c7fc3e7b71d7db8fccdf88bdfdda9b64f6e72fc4fc4f661dfad7a5fe3f8bd75e3f46b5bf5ff70eb2bac3e46dddb156a5ade9f6e999baad3897c66fc3df54d330b6b64371c2cfb7e5f4f6297a8b7e53cbd3c9edee5e5eede1c7dd9cedb7577abe3d76f8d584e3e4e292c1c5a25728b6299c71589dc6ac038a2900c38a4030e1c130ce084ac654d6154214aa01a650d4e994142a840274e804aa9402554d60a9555582a392cac9d43257593a8e4b2a2750c96d44ebcf92da89d4325b5c93a864aeb92751aa1640952c4980e7939cc349ad807912912d9238b4476c948be28ec2917c515a522f8a2b0a45f1476148f4628ec2916c52d8522d12b8e2d1338e2b13b8d589dc514806291481614382619c1094db0a6b4aa1a14ca00a650d0a65054e9d409d50814aa842753aa6b0d46aaac9d4aabae4150c965724ea392bae49d4325b5493a864b2b92750ca2cad89d4328ad18151b142b013b0b0c10d39ec7334c331a5201d851491358c522b8c47648e2d8a3b24a47a31456c948be28ec92917c5258522d11d8522f8a4b0716899e4715899c71589dc6ac030e2900c38a40b0a18986a0844c29a45808160214ca00a65054e9d001542052aa10095529204aa949054aabae4151aaeb92750c95d724ea392cad89d4328b2b62751ca2bad8150ca2a460546c3ab013b0b0e66874e7b99a6698973745a0bb0a4391358c35644963148b631259238be311d92522f8a3b24a45f14964948b6292c91c5b14b64948b44ce3562671c5627614560187148061a902c38704c2318887069160c0a6800d2a853a65050a74054e9d009d50921a95529204aa949054aaaae4152c95a493a85555b13a8e515d6c0a8d8aeb62751ca2a470588d8a51c162561d5c3a4ec2438743a73dced334cb39ba2d059c4722777148a4895d8a2d224b18716c624b18a45b1892c91c5a25b24a45e24b24716899e4a456267914562771ab13b0d48061c520184a40b0ce09850c72231c088aa10a650852a802994342994153a749027542482a55424853aa524152aa524152c9556c0a8d555b13a8d8aab60546c555b13a958a91c3a46c3ab8349d865b03a4ec245866874e7c8669ddac4d86e9ba1338b47205dc5a5244cee3915912d8c38b4896c61c571895d8a45a44b648e2d12bc8e2d133c94562679145601e46a44ef22520587148061c520986702c23839934c7036d2a806954214aa10a650053282a74eb214e9d2409d509204ea8490a554a4812b14a302a562a460546c528c0a958a51c1625628470692b0eae1d276161c23a6e2c3343dae7c87699daccd86b7b46d61ba3902ce2d1c89ddc7159133b8959133b148ac89ac61c5644af238b63133c8e2b13bc89489de471589da46a40348a2902e38a40b0ce0644a4148ca0cd31c088aa102ac846960014ab210a659054e9964214eb204ea8490d4a9d2409d50921a95528c0a9d8a518152b142302c4ac508e14ec3ab8349d865b03a4f458b0cd076b51619a676b9f21da66999b0ed37b586b05a3902ce6e8e40338b4a480771e94913bb0e2b225761c5644eec25644eec38a489de451480791ab13b48d4816912902d233816118986a41308a0f911310236e0005808d2c042956420659050a6590a74cb200a7490a54eb204ec508c1a9d3a30749d508c0a9d8a11c29587570693b0cae1d05855733417124581d076b5e43b4ced73e4334eed67c86e9ba626c374ded1b39ba3902ce2d292019c7a3913bb895900ec38a489dd8514913b309580691c5201a44a403489481691c382691a902c228261989846334985119202045908d2a840ab210a5508532c828532c802996429d3ac86a74eac14ec32306a76285600586570e93b0eae14ec2ab87416161ccd069b8b03a1d35e43b4cd3cf21ced38f21da6f6b1361ba6e872e6e8b4267168e40b38b4a481661694900ec33900cc2524034894900f235205a4d5201a470e09a47148169118a644705322282611b1c88985113701122844b1210a580852ac844ab20a9d2ac8429964214cac10b0eac04ec32b053b0cac65816195c216155c3a0b0aae1d06890e66834df7319a6bb9da669cf7334cd33dcdd374ccb9da2d0d9cdd148367168a40b308e4133094900cc23902cc69c81661c5205a44a481691185a450e09a46a413488a09a44629911c1c88a30690e06448908920224890852ac8448b210a5590852ac82852ac868532b042c2ab042c32b042c32b042c2ab19a0b0aae10d121ccd0e9b873343a6e1ccd0f6b9ee6699a79dced3b4f3b9ba6f6b12e769ba625cdd16989734b4267168b426611c826634e40b30a45240b308e413488e06644704d233826911c1cc88e0a444269118e444c4c88988349b508920c122c840912112c48448b2102ac8408b21a34ab210a556085865608584860e82c2ab181a243183a24399a1d370e66874d4398cd39ee669da73dced3b4e3b9ced332e6e9ba625cdd374c4b9ba2d0d98d2d0a5847a1b308e41331a5205984a414c88a0da44629911c14c88a0da44626911c1cc889899110cd6bffd9, 'gif', 'running', '31/12/2050', '2017-01-12 01:31:53'),
(2, '600 x 90', 'advertise.php', 0xffd8ffe000104a46494600010101004800480000ffdb004300040303030303040303040504030405070504040507080606070606080a0808080808080a080a0a0b0a0a080d0d0e0e0d0d121212121214141414141414141414ffdb0043010505050807080f0a0a0f120f0c0f1216151515151616141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc0001108005a025803011100021101031101ffc4001c0001010101000301010000000000000000020301000506070408ffc400321000020201030304010303020700000000000102030405061112131407213161222341511532330871161742526291c1ffc4001b01010101010003010000000000000000000102000304050607ffc400381101000202010204040305070501000000000111021203042105133141062251613271812391a1b1f01415425262c1d107348292e1b2ffda000c03010002110311003f00fe4ce0f9d7ca378004a20092302e00592409251004a202c9442c59a880b25104d928858b2510b166a2169b2500b166a0169b25026c59a8058b35585a6c95616363559ad3b1aac2d3b12ac9b1b1aa8d69d8d54163625505a76255058d8d5216362549ad3b12a02c6c4a90d86c5d836c362ec058ddbd836c376f60366ddbd8fa358ddbd836cdbbbc735b6eef1cd6dbbbc735b6eeec1b66dd9d835b6ecec1b63bb3b1f43b36ecec1acec2e81b3b0ba4763b0ba4d6761748d9d85d46b56c0ea1b3b0ba86d5b03a86cec2ea1b56c0eb359d81d655ab61758d9d81d66b5583ac6d562e0366c1c0ab360e036ab1701b360e236ab1711b362e2366c5c45560e2245c44d8b88aac5c44870259c09b1684d8b889724662e0017000920492880248059288035104d97048b351326cd449164a202cd442d366a2169b35026c59a805a6cd402d366a0169b355858b5156169b3559369d8d566b4eca2ac2d3b1aa82d3b1aa89b4eca2a82d3b1aa42c6e6a90d93b9aa02d3b9aa02d3b9aa02d3b9763e8361b92a3e8db0dcd51f41b0ddbe3fd06c372f1cdb0ddde39b61bb7c736cdbbbc70d9b7778ff43b36ecf1cdb36eef1cdb1dc7c7fa36c771ec7d0ec7763a0763b83a3e8db1dc5d036adc1d036770740dab70748ecadd3748dab60748d9d81d455ab60751ad5b26eb2ad5b03ac6d5b03ac6d5b26e036ab0701b558380d9b4dc06d760e026c1c06d562e2559b4dc46d562e22ab0711360e252ac5a1362e22a06848b426c1a150f0247812e3312401bc0034801a40924801f00924801a400d225366a2169b3481366a248b35104da8a209b35104da8a04da2d45004da8a01699935004da8ab26d36aaac2d16a2ac2d3b28aa26d339291a82d1b2aaa26d13928aa0b4eca2a49d93ba8a90d9339a8a80b46e6a8fa0b4eea2c70d93b9ac70d93b9ac60d87984b18361e612c60d8798df18db0f31be37d1b61e63bc6fa36cde63bc6fa36cde633c636c7cc678c6d8ee2f18763e603c61d8f982f1c7656e0f1c763ba6e81d95ba6e81b56e0e91b5ec9ba4ab54649ba86d5b252a86d7b272a8ab54649ba86d7b26eb2ad5b24eb1b5da72ac6d5b26e052ad3701b544a6e02bb0702ad569b88aad3711558388aad37115583894ab0711360d14ab168540d09068542d090e048b42a0684b0490024801a4093480124093481269120d2049a400d22526912951204cca890226545104a8a24a6d45104da8a20899523126d36ac6008b56302536ac60168995635936899563026d132ac6b26d132ac6b0b44e4ac6a26d1392d1a82d1392b1a49b44e4ac6926d139291a42d339aaa826d1ba8a80d93b9ac70d93b9ac7fa0d93b9f8df41b277258c1b0ddbe31b66f31de31b61e63bc636c77678c6d9bcc178df43b1f301e38ecadc1e38ecadc1d03b2b74dd036add295255af64e548daa334654956b8c9295436b8c9295455ae324a55956b8c9295655ae252702ad7128cab1b5c4a528156b894a501b5da72814ab4a501b5c4a4e252e25371155a6e22ab4dc4a526d0ae241a29569b88a81a15034529368540d09068a50b15034241a122d0a811449120d003409200681269024d120e28126894a89024d2252a2409522810a244a554812a45022558a2512ac512956281132ac624a26568c4973995631044ad18908995a30044cad18136e732b4604da26568c09b73995a3025132b46b26d1392d1ac9b739c958d64da2725a3513689c945505a6725154168d8d544da762549ac6c5d90b1b3bb26b6d9dd935b6c2ea1b3b0ba8d6ad81d436764dd455af64a550daa324a55156b8c9295655ae324655956e9192328156b8946502ad7128ca053a44a32814b89465129d225194457128ca25ae25294457128ca253a4232452e253922969490ad268a524d0ad368549b452d3685509b4529368540c541245293652818a80488a81891294914a3448340928803409344a4d003409344a4d02544485220851025444a5488225444a55412895624a2554095a24b9cab12512b44944ad12512b44997395a24cb9cad12512bc497395e24b9cbcfed3dc595b535fc2d7b0e30b2cc4b399d362528595bf69d6f94ffba2dae7f62b8f9270cb6791d1759974bcd8f2e3edfc63de1fd51ba31f43d7b1f6c7aab87a8c30f6be8d5db9d9944615f55919c38554571c776562ecc937fbfb7ba3dbf2c6396bcb7f2c7f5ffc7e91d7e1c3cf8f0f5f8e5af0f1de531dbbf6f4fcefe59ff97acecea61ab6d7ddbeb1e7e1e3646e3e9cb9e8f54ea8ce9c3af0eafc3a21c70dc7f76d73c47e7dd9c38a36c32e69fc5debed4f57e1d8f9bd373f89678c4f2fcda76ed8c631dbfafb7de5fb7d37d431fd66da7aae87bda1566eafa749468d4bb708e442bc88cbb7645c52fca1284be3d9ae39fb7a6cbfb56138e7eb1eee9e09cd8f8e74bc9c5d55659e1e99577a9f49fce26ffdcfd2ea67ff002977561672aeeb34abb54c3a25d11fc630c68d8d27c72ff52c93f7fe43a4ff00b7ca27daff00927c0319fee8e7c73a9d279318ff00d627f9cca7b465e67a05ab5b9318596d1899d4d53708f546105f8ae52fdb92787bf473f94b9f86cf99f0f724e5de631ce23f45fd1bc9be5e946b591c42793a65d9d1d3e52ae1370e9c685f15ef17d5fa9637efcfc8f4133fd9f2fb5d7ee57c2bc997f7472e5ef84e7af68edf2c65fce67d5f8376d387ae7a3b8db9f75e163e16ed6e2b0f2235471eebdf7ba57e2926d4ea4e5c7c7fd4b8472e788cfa5df38acffaff006787e298e1d47824751d4e318f51ed35ace5f357a7df1eff00c5f0ec1c3bb50ccc7c0c58f564e55d0a298ff33b24a315ff00b67a6c719ca6a3ddf9d717165cb9e3863f8b29888fce7b3fa5f5ed1f43dc7e9d6b9b7343aa12c8dacfc4ae6a2bb92bf4eae1393f6f7e67f943fdf93e87978f0e4e0cb0c7fc1dbf73f5aebba4e9fabf0be6e9f863bf4ff2fdef8e2267f7f787ac7fa749f7e5aee15ca1662d6a8ba109462f8b27d7193e5ae7dd411e3783cded0f4fff004fe76f3b09ef8c6b3facdffc3cdedfc0c2f55340dc3a7ebf878cf57d373afc6c0d4eaaa14db15f34f2e097f6b5c35f0d7dfb9db8b18eab0ca328ef13da5ec7a0e1c3c6fa6e7e3e7c71f330ce631ce22227fd3e9f4f7fac3f9cb1726ec1caa337165d1938f646ea67c27d33adf545f0f94f86bf73d0e3331370fcaf8b972e3ce33c7b4e3371f9c3faabd4cd3ac9e4edbf0354d2b46556a1deb219ad54ef70e9518d5fa767534a52f6f6f93e97acc7be35318f7f77ecff0010f04ce5c1a7271f15677f376dbd3d3b4dfbfef7a47fa86cdc8d27376d7f4e70c7edcedcc874421fe7a250edcfdd7bf4f53f67ec789e2b94e338d7e6f43f1cf365c19f069daaf2f48f58aa97bf7a893d434eb3457a2eb1a1e830b3224b2e3aa46be3220ba38857cd536dae5f3c4a3f3f279dd55e35ace38fe7eefa5f1c9e4e29e2f2b938b8ae7bef5f37a768ed3fce3f37a17a3f6bbbd4ddef836ca8c8c49df9590fb75c7b32b2199d2a75a6e6e31e26f85d4fdbf93c4e867f6f9c7e7fcdf3ff000c657e27d5613538de53e9daf7f58f5fafd5e734c58fbb69dfd83ea060e3476de91a8e4d3a66a9663d744eaa6165c9f6ec518fbd31843897cbe7df93b61fb4de3923e589ed2f63d3d7591d5e3d6631e4f1e794639544545e5e93fe9a8eff007ef6f1de865b764fa53abb95b8d5e4606566d58195930876f1d78f5dca536e32fc6365b293e53ffe13d077e09fb5b8fc2994e5e179f78bc72ca3199f6f9627bf6f4b999f77cafd59cad4f2f43daf3d5f5bd175dcc566a2a593a3462a29738fc772505526ff008fd28f1eff002789d54cce38dcc4fafa7e8f9cf1ee4e4cf8787cce4e3e4cbe7ef87fe3ebe9ff00e63f57ca24788f9c842453a4232297084ca7484245ae1190c3a423229d12916b84642b464542e12653a25215a4ca5424ca5c2721524ca5a6c549bf915c26c540ca5032949b1300c540ca50b1503120ca5424528d1209024e200d002409344a4d0254880344a4d1295102544089522c12a459295102158b044ab164a558b250ac5822558c8944ad164a2568b25130b4644b9cad19128985a3225ce6168c8944c2d1992e730bc664a261f7fdbbadfa3167a7fa5ed0dc5b875182a6cfea3a8514d5931aeccbb17bd4daa6cfc6bfed4a2d26ff002f93d8e1970797186533f57da74bcfe153d161d3f372e5da76caa32ef97d3d27b47ff5f83d2af57742db15ea9b675fc4b16d3d46fb6dc6edf36bc78dcba6554d36e7283871ee9b69ff003cfb73e97aac70bc72fc32f17c0bc7f87a58cf83971fd8e7335efadfb4fbcc57ebfbdfb341de9b13d2bc4d7add9fab5fb8b54d5ba61a7a962d98d562c2bebe8774ae50ee34e7efd31f7e3f6e4d87371f4f19693b4cff0003d2789745e118f2cf4d9cf2e7c9f87e5988c6aeaefd7d7da3bfd8fd24f5236b693b6b5ddabbbb2adc286a96dd7acf8d73bb9f2a98d3627db8ce4a4ba395f8f01d1f51863865867ee3e1df1ae9b87a6e5e9fa999c77999daa67f1454fa5fd3e8f3ba46f3f4c34cf4e354d9387b86e56e457955579197877aeb95ebda6a3542c4a3efc7bbe4e98737063c33c7197d7d9e674fe25e19c5e1b9f498f2cdcc651796397bfbf689edfc5f9bd2bdf7b3b6c6c0ced1f51dc0b035cd42ecabeb51c7ca9bc79595469adb9d754a2dfe929fe2ff007fe48e8fa8e3e3e19c672a99bfaf670f877c5ba3e8fc3f3e2cf975e5ce729fc397cb7118c7788fb5f67e4dff00bcb65efad93a5dd7eacabdeba6d6bae9f1f238ba5c74db0ebe8e85d6e2a717cfb7c1cfaae6e3e6e28eff003c3c6f1cf12e8bc4ba1e39cb92ba9c23d35cbbfd62eabbfac77ecf4ef4c750dbba5ee6ab59dc5a8430aad3e12b712365575cacc87171af9ecc26d2849f51e27473863c9b65354f43f0ee7d370f551cdcf9eb18778ed33797b7e189f4f57d27d3cf58345c5cfd5bfe269691a4e158d4aab34fd3eeae7956b94b9b27da8d9f0bfefe1fbffb9ec3a4ebb1899dea23ed1eafaaf01f8a3870e4e4fed1e571e33fe4c262739facd44ff1efdff343d38dd9e9e6cad7b73e44b5e87f4acdbeb5a6258997cba17367c2a9f1d3dce8f7e3fb79f8689e939b87873cfe6ed3e9da5cfe1ff10f0df0eea39f2f37f6794c6bf2e7e9ebfe5f6bafd2fd1387a91b4363edbd5f0769e759ad6bdace55f90f2fb1662d54bbbda3fe5e24fb6be385eeff008411d571f0e13184ed965fa271f1de8fc37a5e4c3a5ca7979797299ba9c622ff003efdbf8cfd1f15c5ec5f95453917ac6c7b2d8c2ec99465355424f894dc609c9f4af7e12e4f538e373ddf03c5c719671194eb133de7e9f7eddfb3ee9ea6efad87bbb276ddba76e08463a6ea3dccaeac5cb5c552e96e7ef52e78edf1c2f7f73dcf59cfc5cb38d65e93f497e8df10f8b741d765c138737e0cee7e5cfd3b77fc3f6fe2f0beb36ecd99bdf2b41b346d7212863db3c7cc72c6ca8f6aabdc79bdf5571ea50e9f78c796ff00639f5fcbc7cd38eb97f3785f15788745e239f14f172fa4d4fcb97689af9bd3dabd23bbcf7a91bafd2bf509e8f5ddbb3c3c5d3aeb2cbe2b033672b21674f318bedc7a7fb3e7dcefd572f073d7cde9f697b3f1debfc2fc4fcb89e7d63099bf9339bbafb7d9eb1e94eead87b3777ee4d4b2b57f1745b256e2e8f1951936cedc677f5576370ae4d71082e7a927ee71e8f938b8b9329bedecf59f0e75bd0f43d5f36739d71f78c3b65378edda7b47d23ddec5a9fa8fb0375edddcdb5372ee2fd3bb50bafd0b52f172e7c536b59147e2aaebfd09c9d4d3e398af6f63c8cba8e2e4c32c72cbdfb7aff5d9ed79bc63a1eb3a7e6e9f9f97d7399c32d72f49f9b1f6bf967e5fca3b76788f4c37bec1dbbe9ceadb675bdc30c6d4757b7365d2b132edecc6fa638d06dc2a71972abebf67f0f8f923a5e5e3c38a7199ef37f5fc9e3f81788f45d3787e7c1c9cb5967397f8729ab8d7da3ed6f956f2c0d8da669fa455b4f5b96b9a93792f58c9f1efc582ff001f6142bba2bff3f86fef83c4e4c38e22359b9f77ce75fc1d1f1e1847072799977da6a71fa6bda7f57a64a6727ae8846522a97108ca453a44212914b88465229d2211948a7488464ca85a52652e1193297094994b84a4c568c994b4e4ca5c24d8ad36c550949950a4d8ae136ca54031526c54122940ca50315031202a0651162a4514b2400d30492600d3049a64824c12698034c12a264a4d3049a64a544c12a260951304a8a44a26145204d28a44a26155204cc2b19128985233044c2d1992898563325130ac66148985a3613489c558d84d2271563613489c568da4d22715636852271595a4d235563713489c545705234515e4ea9d145785274516406a9d0fc80d53a35641b51a17908351a3bc846d5b477906d5b41f20753a31e41b53a03c81d55a26ef1a5689bbc7554609bb8aa5e894ae1a546294ad2a9718a52b4aa5c6294ad1a5c628cac2a9718a52b0aa5c628cac2a9d221294caa5c425298ae21194caa5c4252994b884a5215d272914a8849c8a5c426e42aa49c855109b914b4db1526d8ac1b1526d9441b150365281b1503624194a16c540c4831523c96b2e4012600d30492600d3007c82493252698034c1346a44a4d30146a409514894d1a9026945304d28a6148a514c9a4d28a609a514c2934a2b02914a299349a563605227152369349d5556852271515a4d275555a148d54571349d545705234515e4d274515e1aa34516406a9d0d6406a9d0d647d86a3435901a8f2cbc936a9f2dab23ec351e5b7c936ade5bbc9fb36ade5bbc936ade5b3c9fb36ade5b1e4fd8ea7cb07906d55a0bc81d4e80f20755680f20753a26f20755e89bbc695a26ee2a95a272b8697aa4ed2a95aa6ed1a5c629bb4aa546294ad1a5ea93b0aa5c629bb0695109cac2a9749398d2a937315526e634aa4dc8aa5d0390aa937215526e452a81c85540d8aa81c8aa5526d89a16c540d9441b150b62a06c48b62a06c4a2996e85c806a60934c012600930146a40924c01a9026894801a90268d482851a91349a3520a4d129850a514c94d1a98268d4c2934a2985268d4c2934a2b029346ac0a4ea6ad0a4eaa2b49a4eaa2b4293a9ab4293aa8ae0a4e8a2bc293a1abc293a1abfec293a1abc351a177c354e86b20351a12c80d53a17906d5b46f901a8d1be4fd9b51e5bbc9fb0d5b46f91f66d5b477926d5b46793f63ab796cf20da9d19e40ea7417906d4e82f20753a03bc753a0bbfec755680eff00b1a3a03bc695a26ef1a5680ee1a56a9bb4695a83b4695aa6ed2a95aa6ed1a56a0ec1a56a9bb069540e634aa4dcc69540e6552a937315503999540e652a81c869540e434681c8aa550390aa85c848362685c8a550390916c5540d8916c48b6250e4b7424c017200b90145c8024c012900a24c1346a41409480517505268d48285129050a3520a4d129850a3530a4d1a99342894c29346a61428d586a4ea6ac0a4ea6ac0a144ac0a4ea6ad0a4ea6ad0a1a9ab4293a92b8286a6ae0a4ea4ae0a1a9abcd4356f7828687dffb0a4e8def9a8685df0d5b46f906d468df2186a346f906d5b46f906d5b477906d5bcb77906d5bcb67906d5b477906d5b41f20753a31de6d4e83df1d4e8cef9b53a0bb868ea1df1d4ea2ee1a3a8bb8d4ad41da34750768d2b50768d1d45d834ad41d834750760d2b50760d1d45d82aa073352a81cc69540e6551a0731a550b98d1a0721a342e434aa0721a343d42aa1721a340e4245b29542e4241c8c58d891e448f50a9245ada01a09340cd00409230240c409200680100204920048012049a0040081268012241a3248019924801200481268c08035002306802460d466344871838cce3338cce3338cce333189162586613163122cc45988b288988b150b1202a131062458a858901222a162418a858916240488a858916244540c4b18916244c459444ccfffd9, 'gif', 'running', '31/12/2050', '2017-01-12 01:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `_dcart`
--

CREATE TABLE `_dcart` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `iprice` varchar(30) NOT NULL DEFAULT '0',
  `iquantity` varchar(30) NOT NULL DEFAULT '0',
  `tprice` varchar(30) NOT NULL DEFAULT '0',
  `cname` varchar(120) NOT NULL,
  `cmail` varchar(60) NOT NULL,
  `cphone` varchar(30) NOT NULL,
  `caddress` varchar(230) NOT NULL,
  `dtime` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dcart`
--

INSERT INTO `_dcart` (`id`, `pid`, `sid`, `transid`, `iprice`, `iquantity`, `tprice`, `cname`, `cmail`, `cphone`, `caddress`, `dtime`, `status`) VALUES
(1, '1', '201802154611', '180217145759', '41000', '1', '41000', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodo', '17-Feb-2018 02:46 pm', 'completed'),
(2, '7', '201803155742', '180306121708', '167500', '1', '167500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodo', '06-Mar-2018 11:17 am', 'processed'),
(3, '2', '201802160717', '180309134920', '61500', '1', '61500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodo', '09-Mar-2018 02:01 pm', 'pending'),
(4, '5', '201802203943', '180704161037', '7000', '1', '7000', '', '', '', '', '04-Jul-2018 04:38 pm', 'pending'),
(5, '2', '201802160717', '181114162809', '61500', '1', '61500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '15-Nov-2018 10:51 am', 'pending'),
(6, '6', '201802204808', '181114162809', '6500', '1', '6500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '15-Nov-2018 10:51 am', 'pending'),
(7, '7', '201803155742', '200504152017', '167500', '1', '167500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '05-May-2020 10:00 am', 'pending'),
(8, '6', '201802204808', '200504152017', '6500', '1', '6500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '05-May-2020 10:00 am', 'pending'),
(9, '7', '201803155742', '200506171412', '167500', '1', '167500', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '06-May-2020 03:14 pm', 'pending'),
(10, '6', '201802204808', '14052020134834', '6500', '6', '39000', '', '', '', '', '14-May-2020 03:51 pm', 'pending'),
(11, '3', '201802203550', '200617111249', '25000', '1', '25000', 'Lucky Uzoma', 'luzomamicrosystems@gmail.com', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '17-Jun-2020 12:37 pm', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `_dcategories`
--

CREATE TABLE `_dcategories` (
  `id` int(11) NOT NULL,
  `dcat` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dcategories`
--

INSERT INTO `_dcategories` (`id`, `dcat`) VALUES
(22, 'Additives'),
(18, 'Tyres and Tubes'),
(19, 'Lubricants'),
(20, 'Auto Batteries');

-- --------------------------------------------------------

--
-- Table structure for table `_dpics`
--

CREATE TABLE `_dpics` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `picid` varchar(30) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dpics`
--

INSERT INTO `_dpics` (`id`, `sid`, `picid`, `transid`, `status`) VALUES
(2, '201802160717', '201802160717-1', '201802160717', ''),
(3, '201802203550', '201802203550-1', '201802203550', ''),
(4, '201802203757', '201802203757-1', '201802203757', ''),
(5, '201802203943', '201802203943-1', '201802203943', ''),
(6, '201802204808', '201802204808-1', '201802204808', ''),
(8, '201803155742', '20180306114145', '201803155742', '');

-- --------------------------------------------------------

--
-- Table structure for table `_dpics_vehicles`
--

CREATE TABLE `_dpics_vehicles` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `picid` varchar(30) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dpics_vehicles`
--

INSERT INTO `_dpics_vehicles` (`id`, `sid`, `picid`, `transid`, `status`) VALUES
(2, '201803131127', '20180309133658', '201803131127', '');

-- --------------------------------------------------------

--
-- Table structure for table `_dproducts`
--

CREATE TABLE `_dproducts` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `icode` varchar(100) NOT NULL,
  `icategory` varchar(250) NOT NULL,
  `subcat` varchar(120) NOT NULL,
  `subcat2` varchar(200) NOT NULL,
  `subcat3` varchar(200) NOT NULL,
  `subcat4` varchar(200) NOT NULL,
  `ititle` varchar(250) NOT NULL,
  `descr` varchar(9999) NOT NULL,
  `dbrand` varchar(500) NOT NULL,
  `rprice` varchar(30) NOT NULL DEFAULT '0',
  `iprice` varchar(30) NOT NULL DEFAULT '0',
  `iquantity` varchar(30) NOT NULL DEFAULT '0',
  `tprice` varchar(30) NOT NULL DEFAULT '0',
  `prneg` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `featured` varchar(30) NOT NULL DEFAULT 'no',
  `istock` varchar(60) NOT NULL DEFAULT 'In-stock',
  `transid` varchar(30) NOT NULL,
  `dtime` varchar(30) NOT NULL,
  `iviews` varchar(30) NOT NULL DEFAULT '0',
  `archived` varchar(10) NOT NULL DEFAULT 'no',
  `subcat5` varchar(200) NOT NULL,
  `subcat6` varchar(200) NOT NULL,
  `subcat7` varchar(200) NOT NULL,
  `subcat8` varchar(200) NOT NULL,
  `subcat9` varchar(200) NOT NULL,
  `subcat10` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dproducts`
--

INSERT INTO `_dproducts` (`id`, `sid`, `icode`, `icategory`, `subcat`, `subcat2`, `subcat3`, `subcat4`, `ititle`, `descr`, `dbrand`, `rprice`, `iprice`, `iquantity`, `tprice`, `prneg`, `status`, `featured`, `istock`, `transid`, `dtime`, `iviews`, `archived`, `subcat5`, `subcat6`, `subcat7`, `subcat8`, `subcat9`, `subcat10`) VALUES
(1, '201802154611', '', 'Tyres and Tubes', '', '', '', '', 'BRIDGESTONE 205/65R15', 'Brand: BRIDGESTONE \r\nCode: BRIDGESTONE 205/65R15 \r\nAvailability: In Stock \r\nWarranty: 12 is given on a set of 4 tyres. Terms and conition apply.', 'BRIDGESTONE', '42000', '41000', '', '0', '', '', 'yes', 'In-stock', '201802154611', '17-Feb-2018 15:46 pm', '0', 'yes', '', '', '', '', '', 'Mid-Range'),
(2, '201802160717', '', 'Tyres and Tubes', '', '205', '65', '15', ' Maxxis MAXXIS TYRE 205 65R15', '\r\nMaxxis MAXXIS TYRE 205 65R15 (Rim 15)', 'MAXXIS', '64000', '61500', '', '0', '', '', 'yes', 'In-stock', '201802160717', '17-Feb-2018 16:07 pm', '0', 'no', '', '', '', '', '', 'Mid-Range'),
(3, '201802203550', '', 'Auto Batteries', '', '', '', '', 'Diamond Korea Car Battery 75ah 12v', 'Diamond Korea Car Battery 75ah 12v', '', '27500', '25000', '', '0', '', '', 'no', 'In-stock', '201802203550', '18-Feb-2018 20:35 pm', '0', 'no', '', '', '', '', '', ''),
(4, '201802203757', '', 'Auto Batteries', '', '', '', '', 'Universal GALE BATTERY 75AH', 'Universal GALE BATTERY', '', '22000', '20500', '', '0', '', '', 'no', 'In-stock', '201802203757', '18-Feb-2018 20:37 pm', '0', 'yes', '', '', '', '', '', ''),
(5, '201802203943', '', 'Lubricants', '', '', '', '', 'Nissan Nissan Automatic Transmission Fluid Matic - K', 'Genuine Nissan Matic-K Automatic Trans Fluid.\r\nSold by the 1 quart (946ml) bottle.\r\nImprove the performance and longevity of your NISSAN vehicle.', '', '8500', '7000', '', '0', '', '', 'no', 'In-stock', '201802203943', '18-Feb-2018 20:39 pm', '0', 'no', '', '', '', '', '', ''),
(6, '201802204808', '', 'Lubricants', '', '', '', '', 'Mobil 1 Full Synthetic Motor Oil 5W-20 1 Liter', 'Advanced full synthetic for vehicles of all ages \r\nOffers unsurpassed wear protection to help keep engines running like new \r\nKeeps engines cleaner, longer \r\nHelps extend engine life by reducing wear and oil breakdown.', '', '7000', '6500', '', '0', '', '', 'no', 'In-stock', '201802204808', '18-Feb-2018 20:48 pm', '0', 'no', '', '', '', '', '', ''),
(7, '201803155742', '', 'Tyres and Tubes', 'Saloon', '275', '45', '25', 'MICHELIN 275/45R21 ', 'We only supply the tyre. If there is a rim shown in the picture, it is for display purposes only. The picture serves only representation purposes.\r\n12 months waranty included.\r\nGet free shipping within lagos on a set of four (4) tyres purchased.', 'MICHELIN', '175000', '167500', '', '0', '', '', 'no', 'In-stock', '201803155742', '05-Mar-2018 15:57 pm', '0', 'no', 'LLp', '', '', '', '', 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `_dsubcats`
--

CREATE TABLE `_dsubcats` (
  `id` int(11) NOT NULL,
  `dcat` varchar(250) NOT NULL,
  `dsubcat` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dsubcats`
--

INSERT INTO `_dsubcats` (`id`, `dcat`, `dsubcat`) VALUES
(2, 'Auto Batteries', 'Commercial'),
(3, 'Auto Batteries', 'Passenger'),
(4, 'Additives', 'Fuel additive'),
(5, 'Additives', 'Oil additive'),
(6, 'Additives', 'Water additive'),
(7, 'Tyres and Tubes', 'SUV'),
(8, 'Tyres and Tubes', 'Light Truck'),
(9, 'Tyres and Tubes', 'Bus'),
(10, 'Tyres and Tubes', 'Agriculture'),
(11, 'Tyres and Tubes', 'Fork Lift'),
(12, 'Tyres and Tubes', '2 or 3 Wheeler'),
(13, 'Lubricants', 'Engine Oil'),
(14, 'Lubricants', 'Transmission Fluid'),
(15, 'Lubricants', 'Brake Fluid'),
(16, 'Lubricants', 'Hydraulic Oil'),
(17, 'Lubricants', 'Industrial Oil'),
(18, 'Lubricants', 'Agricultural Oil'),
(19, 'Lubricants', 'Grease'),
(20, 'Lubricants', 'Maintenance Products'),
(21, 'Tyres and Tubes', 'Saloon'),
(22, 'Tyres and Tubes', ''),
(23, 'Additives', '');

-- --------------------------------------------------------

--
-- Table structure for table `_dvehicles`
--

CREATE TABLE `_dvehicles` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `ititle` varchar(250) NOT NULL,
  `descr` varchar(9999) NOT NULL,
  `dyear` varchar(100) NOT NULL,
  `icategory` varchar(250) NOT NULL,
  `subcat` varchar(120) NOT NULL,
  `subcat2` varchar(200) NOT NULL,
  `subcat3` varchar(200) NOT NULL,
  `subcat4` varchar(200) NOT NULL,
  `subcat5` varchar(200) NOT NULL,
  `subcat6` varchar(200) NOT NULL,
  `subcat7` varchar(200) NOT NULL,
  `subcat8` varchar(200) NOT NULL,
  `subcat9` varchar(200) NOT NULL,
  `subcat10` varchar(200) NOT NULL,
  `transid` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_dvehicles`
--

INSERT INTO `_dvehicles` (`id`, `sid`, `ititle`, `descr`, `dyear`, `icategory`, `subcat`, `subcat2`, `subcat3`, `subcat4`, `subcat5`, `subcat6`, `subcat7`, `subcat8`, `subcat9`, `subcat10`, `transid`) VALUES
(1, '201803131127', 'Toyota Camry', '', '2002', 'Tyres and Tubes', '', '255', '55', '19', 'x', '', '', '', '', '', '201803131127');

-- --------------------------------------------------------

--
-- Table structure for table `_register`
--

CREATE TABLE `_register` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `pword` varchar(60) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `postal` varchar(120) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `regdate` varchar(60) NOT NULL,
  `pic` varchar(9999) NOT NULL,
  `picid` varchar(60) NOT NULL,
  `newsletter` varchar(10) NOT NULL,
  `advices` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'offline',
  `lastlogin` varchar(60) NOT NULL,
  `visits` varchar(30) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_register`
--

INSERT INTO `_register` (`id`, `userid`, `email`, `pword`, `fullname`, `gender`, `phone`, `postal`, `city`, `state`, `country`, `regdate`, `pic`, `picid`, `newsletter`, `advices`, `status`, `lastlogin`, `visits`) VALUES
(1, NULL, 'luzomamicrosystems@gmail.com', 'luzoma', 'Lucky Uzoma', '', '08069524047', 'No. 5 Thompson Street, Rumuodomaya', '', '', '', '21-Dec-2016 - 11:32 pm', '', '', '', '', 'online', '17-Jun-2020 - 03:49 pm', '1'),
(7, NULL, 'chika@yahoo.com', 'chika', 'Chikala Kimana', '', '08074445594', 'No. 1 Ndachukwu Street, Rumuehinwo Estate, Rukpokwu, Port Harcourt', '', '', '', '17-Feb-2018 - 02:53 pm', '', '', '', '', 'offline', '17-Feb-2018 - 02:53 pm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `_security`
--

CREATE TABLE `_security` (
  `id` int(4) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `uname` varchar(60) NOT NULL,
  `pword` varchar(60) NOT NULL,
  `dcompany` varchar(250) NOT NULL,
  `drank` varchar(20) NOT NULL DEFAULT 'admin',
  `address` varchar(250) NOT NULL,
  `dlocation` varchar(150) DEFAULT NULL,
  `dphone` varchar(30) NOT NULL,
  `dwallet` varchar(20) DEFAULT '0',
  `dphone2` varchar(30) NOT NULL,
  `demail` varchar(60) NOT NULL,
  `dwebsite` varchar(120) NOT NULL,
  `icurrency` varchar(30) NOT NULL DEFAULT '&pound;',
  `aboutus` mediumtext NOT NULL,
  `dterms` longtext NOT NULL,
  `dservices` mediumtext NOT NULL,
  `dlogo` varchar(120) NOT NULL DEFAULT 'default.png',
  `dtitle` varchar(300) NOT NULL DEFAULT 'My Shopping Cart ',
  `social_fb` varchar(350) NOT NULL DEFAULT '#',
  `social_tw` varchar(350) NOT NULL DEFAULT '#',
  `social_lk` varchar(350) NOT NULL DEFAULT '#',
  `social_gp` varchar(350) NOT NULL DEFAULT '#',
  `social_in` varchar(350) NOT NULL DEFAULT '#',
  `social_you` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'offline',
  `dprivilege` text NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'unban',
  `privilege` varchar(10) DEFAULT NULL,
  `dbank` varchar(30) DEFAULT NULL,
  `dacc_name` varchar(60) DEFAULT NULL,
  `dacc_number` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_security`
--

INSERT INTO `_security` (`id`, `userid`, `email`, `dname`, `uname`, `pword`, `dcompany`, `drank`, `address`, `dlocation`, `dphone`, `dwallet`, `dphone2`, `demail`, `dwebsite`, `icurrency`, `aboutus`, `dterms`, `dservices`, `dlogo`, `dtitle`, `social_fb`, `social_tw`, `social_lk`, `social_gp`, `social_in`, `social_you`, `status`, `dprivilege`, `dstatus`, `privilege`, `dbank`, `dacc_name`, `dacc_number`) VALUES
(1, '91234567899834', 'admin@admin.com', 'Electronics', 'admin :  Electrons', '21232f297a57a5a743894a0e4a801fc3', 'Universal Electronics', 'admin', 'No 1 Aso rock villa, Garriki Abuja', NULL, '+2347083333777', '3920500', '', 'electron@gmail.com', 'www.electrons.com', 'â‚¦', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut\r\n									purus fermentum, ac pretium nibh facilisis. Vivamus venenatis viverra iaculis.\r\n									Suspendisse tempor orci non sapien ullamcorper dapibus. Suspendisse at velit diam.\r\n									Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et\r\n									molestie ante. In feugiat ante vitae ultricies malesuada.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut\r\n									purus fermentum, ac pretium nibh facilisis. Vivamus venenatis viverra iaculis.\r\n									Suspendisse tempor orci non sapien ullamcorper dapibus. Suspendisse at velit diam.\r\n									Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et\r\n									molestie ante. In feugiat ante vitae ultricies malesuada.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut\r\n									purus fermentum, ac pretium nibh facilisis. Vivamus venenatis viverra iaculis.\r\n									Suspendisse tempor orci non sapien ullamcorper dapibus. Suspendisse at velit diam.\r\n									Donec pharetra nec enim blandit vulputate. Suspendisse potenti. Pellentesque et\r\n									molestie ante. In feugiat ante vitae ultricies malesuada.</p>', 'default.png', 'Electron :: Home', 'http://www.facebook.com/', '#', '', '#', '#', '', 'offline', '', 'unban', 'admin', NULL, NULL, NULL),
(3, '05062020122454', 'youngelefiku443@gmail.com', NULL, 'Elefiku Young', '4adf7d6eebb0266197b2d52a6273865b', '', 'admin', '', NULL, '08061382683', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Product,Orders,Subscription,Category,Product,Withdrawals,Star Rating,', 'unban', 'staff', NULL, NULL, NULL),
(6, '201120035323502137', 'isaacnewton@gmail.com', NULL, 'Isaac Newton', '84311803c723cad9fcda143909218a89', 'IsaacNewton Ltd', 'seller', 'No 1 Aso rock villa, Garriki Abuja', NULL, '08061234567', '761000', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Product,Orders', 'unban', 'staff', NULL, NULL, NULL),
(7, '201125014757510483', 'dyseatech@gmail.com', NULL, 'Young Elefiku', '166f6c0f049be72814f68dfb8a0e44a0', 'DyseaTech', 'seller', 'No. 1, Aso rock villa, Abuja', NULL, '09098520438', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Product,Orders', 'unban', 'staff', NULL, NULL, NULL),
(9, '201201033434497519', 'youngadeyemi@gmail.com', NULL, 'Young Adeyemi', 'f6182f0359f72aae12fb90d305ccf9eb', '', 'agent', 'Aso rock', 'Abule Egba', '08028378784', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Orders', 'unban', 'staff', NULL, 'Young Elefiku', '1203948590'),
(10, '201201033829886558', 'tundeadeyemi@admin.com', NULL, 'Tunde Adeyemi', '8561f4eacced64527e6a195af846c2ae', '', 'agent', 'Aso rock', 'Ogba', '09098787653', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Orders', 'unban', 'staff', NULL, NULL, NULL),
(11, '201202011622106940', 'femi@gmail.com', NULL, 'Femi Fagbemi', '5c8e82f0bdac09f37b0111c79f1fe0fa', '', 'agent', 'Aso Rock', 'Yaba Area', '07098765782', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Orders', 'unban', 'staff', NULL, NULL, NULL),
(12, '201203031508784570', 'babafashola@gmail.com', NULL, 'Babatunde Fashola', '21661093e56e24cd60b10092005c4ac7', '', 'agent', 'Toyin ni', '4 Toyin Street Ikeja', '09098986758', '0', '', '', '', '&pound;', '', '', '', 'default.png', 'My Shopping Cart ', '#', '#', '#', '#', '#', '', 'offline', 'Orders', 'unban', 'staff', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blaise_set`
--
ALTER TABLE `blaise_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dblog`
--
ALTER TABLE `dblog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcart`
--
ALTER TABLE `dcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcart_holder`
--
ALTER TABLE `dcart_holder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcoupon`
--
ALTER TABLE `dcoupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ddelivery`
--
ALTER TABLE `ddelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpercent`
--
ALTER TABLE `dpercent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drating`
--
ALTER TABLE `drating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dship_address`
--
ALTER TABLE `dship_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dslide`
--
ALTER TABLE `dslide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsub`
--
ALTER TABLE `dsub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtracker`
--
ALTER TABLE `dtracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dwishlist`
--
ALTER TABLE `dwishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dwithdrawal`
--
ALTER TABLE `dwithdrawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `demail` (`demail`);

--
-- Indexes for table `notifivcation`
--
ALTER TABLE `notifivcation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_ads_run`
--
ALTER TABLE `_ads_run`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dcart`
--
ALTER TABLE `_dcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dcategories`
--
ALTER TABLE `_dcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dpics`
--
ALTER TABLE `_dpics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dpics_vehicles`
--
ALTER TABLE `_dpics_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dproducts`
--
ALTER TABLE `_dproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dsubcats`
--
ALTER TABLE `_dsubcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_dvehicles`
--
ALTER TABLE `_dvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_register`
--
ALTER TABLE `_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_security`
--
ALTER TABLE `_security`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blaise_set`
--
ALTER TABLE `blaise_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `charge`
--
ALTER TABLE `charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dblog`
--
ALTER TABLE `dblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dcart`
--
ALTER TABLE `dcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `dcart_holder`
--
ALTER TABLE `dcart_holder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dcoupon`
--
ALTER TABLE `dcoupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ddelivery`
--
ALTER TABLE `ddelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dpercent`
--
ALTER TABLE `dpercent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drating`
--
ALTER TABLE `drating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dship_address`
--
ALTER TABLE `dship_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dslide`
--
ALTER TABLE `dslide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dsub`
--
ALTER TABLE `dsub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dtracker`
--
ALTER TABLE `dtracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `dwishlist`
--
ALTER TABLE `dwishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dwithdrawal`
--
ALTER TABLE `dwithdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifivcation`
--
ALTER TABLE `notifivcation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `_ads_run`
--
ALTER TABLE `_ads_run`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `_dcart`
--
ALTER TABLE `_dcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `_dcategories`
--
ALTER TABLE `_dcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `_dpics`
--
ALTER TABLE `_dpics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `_dpics_vehicles`
--
ALTER TABLE `_dpics_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_dproducts`
--
ALTER TABLE `_dproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `_dsubcats`
--
ALTER TABLE `_dsubcats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `_dvehicles`
--
ALTER TABLE `_dvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `_register`
--
ALTER TABLE `_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `_security`
--
ALTER TABLE `_security`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
