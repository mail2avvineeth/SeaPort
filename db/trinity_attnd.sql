-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 08:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trinity_attnd`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_data`
--

CREATE TABLE IF NOT EXISTS `leave_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stf_id` varchar(250) NOT NULL,
  `lfrm` date NOT NULL,
  `lto` date NOT NULL,
  `rsn` text NOT NULL,
  `tmp` int(11) NOT NULL,
  `tmp1` int(11) NOT NULL,
  `tmp2` int(11) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `leave_data`
--

INSERT INTO `leave_data` (`id`, `stf_id`, `lfrm`, `lto`, `rsn`, `tmp`, `tmp1`, `tmp2`, `st`) VALUES
(1, 'jithujobin4@gmail.com', '2017-04-25', '2017-04-25', 'due to exam', 0, 0, 0, 1),
(2, 'anjaligp1992@gmail.com', '2017-04-22', '2017-04-22', 'going to home', 0, 0, 0, 1),
(4, 'jithinkv2161@gmail.com', '2017-05-01', '2017-05-01', 'wedding', 0, 0, 0, 0),
(9, 'anand06111@gmail.com', '2017-04-29', '2017-04-29', 'Personal', 0, 0, 0, 0),
(10, 'anand06111@gmail.com', '2017-05-01', '2017-05-01', 'Personal', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE IF NOT EXISTS `leave_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lv_id` int(11) NOT NULL,
  `dt` date NOT NULL,
  `work_schedul` text NOT NULL,
  `schdul` int(11) NOT NULL COMMENT 'FN,AN,Full',
  `assignto` varchar(250) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `tmp1` varchar(250) NOT NULL,
  `tmp2` int(11) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`id`, `lv_id`, `dt`, `work_schedul`, `schdul`, `assignto`, `uid`, `tmp1`, `tmp2`, `st`) VALUES
(1, 1, '2017-04-25', 'No Students scheduled, if any', 3, 'Geethu L', 'jithujobin4@gmail.com', 'geethunithya6@gmail.com', 0, 1),
(2, 2, '2017-04-22', 'nill', 2, 'Ajimon Alex', 'anjaligp1992@gmail.com', 'ajiellichira@gmail.com', 0, 1),
(3, 3, '2017-04-24', 'new client student', 3, 'Ajimon Alex', 'arunkmsnair@gmail.com', 'ajiellichira@gmail.com', 0, -1),
(4, 4, '2017-05-01', 'assignall student to shobha mis', 3, 'Sobhanidhi S', 'jithinkv2161@gmail.com', 'sobhanidhi87@gmail.com', 0, -1),
(5, 0, '2017-04-26', 'nil', 3, 'nil', 'keerthikrishnan999@gmail.com', '0', 0, 3),
(7, 0, '2017-04-23', 'nil', 3, 'nil', 'arunkmsnair@gmail.com', '0', 0, 3),
(8, 0, '2017-04-23', 'nil', 3, 'nil', 'anand06111@gmail.com', '0', 0, 3),
(9, 0, '2017-04-27', 'nil', 3, 'nil', 'geethunithya6@gmail.com', '0', 0, 3),
(10, 9, '2017-04-29', 'nil', 3, 'Ajimon Alex', 'anand06111@gmail.com', 'ajiellichira@gmail.com', 0, -1),
(11, 10, '2017-05-01', 'nil', 3, 'Ajimon Alex', 'anand06111@gmail.com', 'ajiellichira@gmail.com', 0, -1),
(12, 0, '2017-04-30', 'nil', 3, 'nil', 'anand06111@gmail.com', '0', 0, 3),
(13, 0, '2017-04-26', 'nil', 3, 'nil', 'sobhanidhi87@gmail.com', '0', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log_time`
--

CREATE TABLE IF NOT EXISTS `log_time` (
  `st` int(11) NOT NULL AUTO_INCREMENT,
  `stf_id` varchar(250) NOT NULL,
  `dt` date NOT NULL,
  `tim_in` varchar(200) NOT NULL,
  `time_out` varchar(200) NOT NULL,
  `tot_tim` time NOT NULL,
  PRIMARY KEY (`st`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `log_time`
--

INSERT INTO `log_time` (`st`, `stf_id`, `dt`, `tim_in`, `time_out`, `tot_tim`) VALUES
(1, 'arunkmsnair@gmail.com', '2017-04-21', '16:04:pm', '0', '00:00:00'),
(2, 'ajiellichira@gmail.com ', '2017-04-22', '07:04:am', '06:12:pm', '00:00:00'),
(3, 'sobhanidhi87@gmail.com', '2017-04-22', '09:04:am', '04:59:pm', '00:00:00'),
(4, 'arunkmsnair@gmail.com', '2017-04-22', '09:04:am', '03:38:pm', '00:00:00'),
(5, 'anjaligp1992@gmail.com', '2017-04-22', '09:04:am', '02:00:pm', '00:00:00'),
(6, 'keerthikrishnan999@gmail.com', '2017-04-22', '09:04:am', '05:13:pm', '00:00:00'),
(7, 'preethikrishna1394@gmail.com', '2017-04-22', '09:04:am', '06:35:pm', '00:00:00'),
(8, 'vrlekshmipriya@gmail.com', '2017-04-22', '09:04:am', '05:19:pm', '00:00:00'),
(9, 'aneeshkumar7720@gmail.com', '2017-04-22', '09:04:am', '05:26:pm', '00:00:00'),
(10, 'mail2avvineeth@gmail.com', '2017-04-22', '09:04:am', '06:30:pm', '00:00:00'),
(11, 'geethunithya6@gmail.com', '2017-04-22', '09:04:am', '06:30:pm', '00:00:00'),
(12, 'vishnupitrinity@gmail.com', '2017-04-22', '09:04:am', '06:16:pm', '00:00:00'),
(13, 'anand06111@gmail.com', '2017-04-22', '09:04:am', '05:33:pm', '00:00:00'),
(14, 'jithinkv2161@gmail.com', '2017-04-22', '09:04:am', '06:04:pm', '00:00:00'),
(15, 'sunithasurendran@gmail.com', '2017-04-22', '09:04:am', '05:25:pm', '00:00:00'),
(16, 'sajantm@gmail.com', '2017-04-22', '09:04:am', '05:03:pm', '00:00:00'),
(17, 'jithujobin4@gmail.com', '2017-04-22', '09:04:am', '06:09:pm', '00:00:00'),
(18, 'itsmejayan006@gmail.com', '2017-04-22', '02:04:pm', '05:08:pm', '00:00:00'),
(19, '', '2017-04-22', '06:34:pm', '0', '00:00:00'),
(20, 'mail2avvineeth@gmail.com', '2017-04-23', '11:46:am', '0', '00:00:00'),
(21, 'ajiellichira@gmail.com', '2017-04-23', '11:47:am', '0', '00:00:00'),
(22, 'jithujobin4@gmail.com', '2017-04-23', '11:47:am', '02:03:pm', '00:00:00'),
(23, 'keerthikrishnan999@gmail.com', '2017-04-23', '11:48:am', '0', '00:00:00'),
(24, 'preethikrishna1394@gmail.com', '2017-04-23', '11:49:am', '0', '00:00:00'),
(25, 'mail2avvineeth@gmail.com', '2017-04-24', '06:58:am', '02:05:pm', '00:00:00'),
(26, 'anand06111@gmail.com', '2017-04-24', '06:59:am', '06:27:pm', '00:00:00'),
(27, 'ajiellichira@gmail.com', '2017-04-24', '07:23:am', '06:33:pm', '00:00:00'),
(28, 'vishnupitrinity@gmail.com', '2017-04-24', '07:24:am', '11:00:am', '00:00:00'),
(29, 'jithinkv2161@gmail.com', '2017-04-24', '07:33:am', '04:22:pm', '00:00:00'),
(30, 'anjaligp1992@gmail.com', '2017-04-24', '07:36:am', '0', '00:00:00'),
(31, 'aneeshkumar7720@gmail.com', '2017-04-24', '07:36:am', '0', '00:00:00'),
(32, 'keerthikrishnan999@gmail.com', '2017-04-24', '07:46:am', '04:21:pm', '00:00:00'),
(33, 'geethunithya6@gmail.com', '2017-04-24', '07:49:am', '05:07:pm', '00:00:00'),
(34, 'sobhanidhi87@gmail.com', '2017-04-24', '07:50:am', '0', '00:00:00'),
(35, 'vrlekshmipriya@gmail.com', '2017-04-24', '09:04:am', '05:06:pm', '00:00:00'),
(36, 'itsmejayan006@gmail.com', '2017-04-24', '09:06:am', '04:50:pm', '00:00:00'),
(37, 'jithujobin4@gmail.com', '2017-04-24', '09:07:am', '06:26:pm', '00:00:00'),
(38, 'sunithasurendran@gmail.com', '2017-04-24', '09:22:am', '05:07:pm', '00:00:00'),
(39, 'arunkmsnair@gmail.com', '2017-04-24', '09:26:am', '03:20:pm', '00:00:00'),
(40, 'sajantm@gmail.com', '2017-04-24', '09:37:am', '04:53:pm', '00:00:00'),
(41, 'itsmejayan006@gmail.com', '2017-04-25', '08:45:am', '04:49:pm', '00:00:00'),
(42, 'anjaligp1992@gmail.com', '2017-04-25', '07:30:am', '04:03:pm', '00:00:00'),
(43, 'aneeshkumar7720@gmail.com', '2017-04-25', '07:30:am', '04:06:pm', '00:00:00'),
(44, 'sobhanidhi87@gmail.com', '2017-04-25', '07:30:am', '04:05:pm', '00:00:00'),
(45, 'ajiellichira@gmail.com', '2017-04-25', '07:29:am', '05:32:pm', '00:00:00'),
(46, 'keerthikrishnan999@gmail.com', '2017-04-25', '07:38:am', '04:16:pm', '00:00:00'),
(47, 'jithinkv2161@gmail.com', '2017-04-25', '07:41:am', '04:23:pm', '00:00:00'),
(48, 'sunithasurendran@gmail.com', '2017-04-25', '09:06:am', '05:08:pm', '00:00:00'),
(49, 'vrlekshmipriya@gmail.com', '2017-04-25', '09:11:am', '05:05:pm', '00:00:00'),
(50, 'vishnupitrinity@gmail.com', '2017-04-25', '09:11:am', '05:40:pm', '00:00:00'),
(51, 'anand06111@gmail.com', '2017-04-25', '09:11:am', '05:31:pm', '00:00:00'),
(52, 'sajantm@gmail.com', '2017-04-25', '09:15:am', '04:46:pm', '00:00:00'),
(53, 'mail2avvineeth@gmail.com', '2017-04-25', '09:15:am', '05:33:pm', '00:00:00'),
(54, 'arunkmsnair@gmail.com', '2017-04-25', '09:17:am', '05:30:pm', '00:00:00'),
(55, 'preethikrishna1394@gmail.com', '2017-04-25', '09:18:am', '04:17:pm', '00:00:00'),
(56, 'geethunithya6@gmail.com', '2017-04-25', '09:20:am', '05:28:pm', '00:00:00'),
(57, 'ajiellichira@gmail.com', '2017-04-26', '07:24:am', '05:57:pm', '00:00:00'),
(58, 'jithinkv2161@gmail.com', '2017-04-26', '07:34:am', '04:07:pm', '00:00:00'),
(59, 'anjaligp1992@gmail.com', '2017-04-26', '07:37:am', '04:07:pm', '00:00:00'),
(60, 'aneeshkumar7720@gmail.com', '2017-04-26', '07:44:am', '04:11:pm', '00:00:00'),
(61, 'arunkmsnair@gmail.com', '2017-04-26', '08:58:am', '05:48:pm', '00:00:00'),
(62, 'vrlekshmipriya@gmail.com', '2017-04-26', '08:59:am', '05:04:pm', '00:00:00'),
(63, 'preethikrishna1394@gmail.com', '2017-04-26', '09:00:am', '04:34:pm', '00:00:00'),
(64, 'anand06111@gmail.com', '2017-04-26', '09:05:am', '05:57:pm', '00:00:00'),
(65, 'jithujobin4@gmail.com', '2017-04-26', '09:05:am', '05:49:pm', '00:00:00'),
(66, 'sajantm@gmail.com', '2017-04-26', '09:08:am', '04:44:pm', '00:00:00'),
(67, 'sunithasurendran@gmail.com', '2017-04-26', '09:08:am', '05:13:pm', '00:00:00'),
(68, 'mail2avvineeth@gmail.com', '2017-04-26', '09:12:am', '05:56:pm', '00:00:00'),
(69, 'itsmejayan006@gmail.com', '2017-04-26', '09:13:am', '04:49:pm', '00:00:00'),
(70, 'geethunithya6@gmail.com', '2017-04-26', '09:20:am', '05:04:pm', '00:00:00'),
(71, 'vishnupitrinity@gmail.com', '2017-04-26', '09:22:am', '0', '00:00:00'),
(72, 'ajiellichira@gmail.com', '2017-04-27', '07:29:am', '06:35:pm', '00:00:00'),
(73, 'jithinkv2161@gmail.com', '2017-04-27', '07:38:am', '08:19:am', '00:00:00'),
(74, 'sobhanidhi87@gmail.com', '2017-04-27', '07:42:am', '05:49:pm', '00:00:00'),
(75, 'anjaligp1992@gmail.com', '2017-04-27', '07:44:am', '08:18:am', '00:00:00'),
(76, 'aneeshkumar7720@gmail.com', '2017-04-27', '07:44:am', '04:15:pm', '00:00:00'),
(77, 'keerthikrishnan999@gmail.com', '2017-04-27', '07:45:am', '04:32:pm', '00:00:00'),
(78, 'preethikrishna1394@gmail.com', '2017-04-27', '08:18:am', '04:30:pm', '00:00:00'),
(79, 'anand06111@gmail.com', '2017-04-27', '09:05:am', '06:36:pm', '00:00:00'),
(80, 'sajantm@gmail.com', '2017-04-27', '09:05:am', '04:31:pm', '00:00:00'),
(81, 'arunkmsnair@gmail.com', '2017-04-27', '09:06:am', '05:45:pm', '00:00:00'),
(82, 'vrlekshmipriya@gmail.com', '2017-04-27', '09:07:am', '05:03:pm', '00:00:00'),
(83, 'mail2avvineeth@gmail.com', '2017-04-27', '09:08:am', '06:19:pm', '00:00:00'),
(84, 'jithujobin4@gmail.com', '2017-04-27', '09:11:am', '05:45:pm', '00:00:00'),
(85, 'itsmejayan006@gmail.com', '2017-04-27', '09:12:am', '04:56:pm', '00:00:00'),
(86, 'sunithasurendran@gmail.com', '2017-04-27', '09:16:am', '05:04:pm', '00:00:00'),
(87, 'vishnupitrinity@gmail.com', '2017-04-27', '04:59:pm', '04:59:pm', '00:00:00'),
(88, '', '2017-04-28', '07:31:am', '0', '00:00:00'),
(89, 'keerthikrishnan999@gmail.com', '2017-04-28', '07:31:am', '0', '00:00:00'),
(90, 'ajiellichira@gmail.com', '2017-04-28', '07:32:am', '0', '00:00:00'),
(91, 'anjaligp1992@gmail.com', '2017-04-28', '07:42:am', '0', '00:00:00'),
(92, 'aneeshkumar7720@gmail.com', '2017-04-28', '07:43:am', '0', '00:00:00'),
(93, 'jithinkv2161@gmail.com', '2017-04-28', '07:43:am', '0', '00:00:00'),
(94, 'geethunithya6@gmail.com', '2017-04-28', '07:48:am', '0', '00:00:00'),
(95, 'arunkmsnair@gmail.com', '2017-04-28', '09:50:am', '0', '00:00:00'),
(96, 'anand06111@gmail.com', '2017-04-28', '09:51:am', '0', '00:00:00'),
(97, 'sajantm@gmail.com', '2017-04-28', '09:52:am', '0', '00:00:00'),
(98, 'jithujobin4@gmail.com', '2017-04-28', '09:53:am', '0', '00:00:00'),
(99, 'vrlekshmipriya@gmail.com', '2017-04-28', '09:53:am', '0', '00:00:00'),
(100, 'sunithasurendran@gmail.com', '2017-04-28', '09:53:am', '0', '00:00:00'),
(101, 'itsmejayan006@gmail.com', '2017-04-28', '09:54:am', '0', '00:00:00'),
(102, 'vishnupitrinity@gmail.com', '2017-04-28', '09:54:am', '0', '00:00:00'),
(103, 'preethikrishna1394@gmail.com', '2017-04-28', '09:55:am', '0', '00:00:00'),
(104, 'mail2avvineeth@gmail.com', '2017-04-28', '10:44:am', '0', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_data`
--

CREATE TABLE IF NOT EXISTS `permission_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dat` date NOT NULL,
  `uid` varchar(200) NOT NULL,
  `tf` time NOT NULL,
  `tt` time NOT NULL,
  `tot` time NOT NULL,
  `tmp` int(11) NOT NULL,
  `tmp1` int(11) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permission_data`
--

INSERT INTO `permission_data` (`id`, `dat`, `uid`, `tf`, `tt`, `tot`, `tmp`, `tmp1`, `st`) VALUES
(1, '2017-04-22', 'sajantm@gmail.com', '14:10:00', '15:00:00', '00:50:00', 0, 0, 1),
(2, '2017-04-25', 'itsmejayan006@gmail.com', '13:00:00', '13:40:00', '00:40:00', 0, 0, 1),
(3, '2017-04-26', 'itsmejayan006@gmail.com', '12:50:00', '13:35:00', '00:45:00', 0, 0, 1),
(4, '2017-04-27', 'itsmejayan006@gmail.com', '13:20:00', '14:00:00', '00:40:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staf_data`
--

CREATE TABLE IF NOT EXISTS `staf_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `snme` varchar(200) NOT NULL,
  `con` varchar(30) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `em` varchar(220) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(250) NOT NULL,
  `typ` varchar(20) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `staf_data`
--

INSERT INTO `staf_data` (`id`, `snme`, `con`, `addr`, `em`, `dob`, `pic`, `typ`, `st`) VALUES
(1, 'A.V Vineeth', '9446563005', 'V V Bhavan<br />Kilimanoor<br /> Trivandrum', 'mail2avvineeth@gmail.com', '1983-10-13', 'mail2avvineeth@gmail.com.png', 'fac', 1),
(2, 'Soumya Pradeep', '8086194845', 'Soumya Nivas<br />Vazhayila<br />Trivandrum', 'soumyaavani11@gmail.com', '1983-10-13', 'soumyaavani11@gmail.com.png', 'fac', 1),
(4, 'Meenu', '9544508649', 'Meenu Bhavan<br />Paruthippara<br />Trivandrum', 'meenup@gmail.com', '1995-10-15', 'meenup@gmail.com.png', 'ostaf', 2),
(5, 'Aneesh Kumar A', '9048555632', 'Aneesh Bhavan\r\nManiyar PO\r\nPunalur', 'aneeshkumar7720@gmail.com', '1991-07-16', 'aneeshkumar7720@gmail.com.png', 'fac', 1),
(6, 'AbhinSudha V. S', '9539395281', 'Arya Bhavan\r\nNjaraneeli\r\nPalode', 'abhinsudha@gmail.com', '1990-10-15', 'abhinsudha@gmail.com.png', 'fac', 2),
(7, 'Preethikrishnan V', '9961547459', 'Saraswathy Vilasom\r\nVeeranakkavu', 'preethikrishna1394@gmail.com', '1994-12-04', 'preethikrishna1394@gmail.com.png', 'fac', 1),
(8, 'Jobin SS', '9746146283', 'Charis, PNRA B 10\r\nKazhakuttom\r\nTrivandrum', 'jithujobin4@gmail.com', '1993-12-05', 'jithujobin4@gmail.com.png', 'fac', 1),
(9, 'Keerthi U. K', '8156882117', 'Sreehari, T C 30/1315(1)\r\nAmbalathumukku,\r\nPettah', 'keerthikrishnan999@gmail.com', '1995-07-12', 'keerthikrishnan999@gmail.com.png', 'fac', 1),
(10, 'Arun Kumar M .S', '8129113109', 'Aswathy Bhavan\r\nPachira, Pallippuram PO', 'arunkmsnair@gmail.com', '1991-09-09', 'arunkmsnair@gmail.com.png', 'fac', 1),
(11, 'Ajimon Alex', '9995511446', 'Ellichira\r\nVilloonni P O\r\nKottayam', 'ajiellichira@gmail.com', '1988-03-25', 'ajiellichira@gmail.com.png', 'fac', 1),
(12, 'Vishnu P I', '9746302750', 'Kulangore Veedu\r\nThumbodu\r\nMadavoor PO\r\nTVM', 'vishnupitrinity@gmail.com', '1990-12-21', 'vishnupitrinity@gmail.com.png', 'fac', 1),
(13, 'Poornima H R', '9489828194', '2-105B\r\nAthira\r\nSt Mancad PO\r\nKK Dist', 'poorni13@gmail.com', '1993-04-13', 'poorni13@gmail.com.png', 'fac', 1),
(14, 'Anand S', '9656944378', 'Viswamathy\r\nKattayikkonam PO\r\nTrivandrum', 'anand06111@gmail.com', '1988-08-20', 'anand06111@gmail.com.png', 'fac', 1),
(15, 'Anjali G. P', '9746920801', 'Charuvilazhikathu Veedu\r\nMathra PO\r\nPunalur', 'anjaligp1992@gmail.com', '1992-02-19', 'anjaligp1992@gmail.com.png', 'fac', 1),
(16, 'Jithin K V', '8129919299', 'Poovathoor Veedu\r\nPalkulangara', 'jithinkv2161@gmail.com', '1991-10-23', 'jithin.lollycrap@gmail.com.png', 'fac', 1),
(17, 'Geethu L', '9633081494', 'Prabhakara Mandiram\r\nOlippunada\r\nNaruvamood PO', 'geethunithya6@gmail.com', '1992-05-27', 'geethunithya6@gmail.com.png', 'fac', 1),
(18, 'Lekshmipriya V R', '9995978583', 'Chothy Nivas\r\nKizhuvilam\r\nMammam\r\nAttingal', 'vrlekshmipriya@gmail.com', '1992-12-16', 'vrlekshmipriya@gmail.com.png', 'fac', 1),
(19, 'Sobhanidhi S', '8089294804', 'Poovathoor Veedu\r\nPalkulangara\r\nPettah', 'sobhanidhi87@gmail.com', '1987-06-27', 'sobhanidhi87@gmail.com.png', 'fac', 1),
(20, 'test', '123', 'sdef sdf ', 'fsdf@SDFSF.GHJGH', '2017-04-06', 'fsdf@SDFSF.GHJGH.jpg', 'staf', 2),
(21, 'Sunitha S', '9947862048', 'Rohini \r\nChellmcodu\r\nMukkola,Nedumangadu, Trivanrum', 'sunithasurendran@gmail.com', '1985-05-25', 'sunithasurendran@gmail.com', 'staf', 1),
(22, 'Sajan T M', '9249999399', 'TC 23/1627\r\nZeaon, BNRA 96\r\nJawahar Nagar', 'sajantm@gmail.com', '1976-05-22', 'sajantm@gmail.com', 'staf', 1),
(23, 'Jayan V', '9745125600', 'Sreelekshmi\r\nMRA 220/1\r\nMoolavilakom\r\nTrivandrum', 'itsmejayan006@gmail.com', '1984-03-09', 'itsmejayan006@gmail.com', 'staf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `pas` varchar(50) NOT NULL,
  `typ` varchar(50) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `uid`, `pas`, `typ`, `st`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'meenup@gmail.com', 'trinity', 'ostaf', 1),
(3, 'mail2avvineeth@gmail.com', 'trinity', 'fac', 1),
(4, 'soumyaavani11@gmail.com', 'trinity', 'fac', 1),
(5, 'aneeshkumar7720@gmail.com', 'trinity', 'fac', 1),
(6, 'abhinsudha@gmail.com', 'trinity', 'fac', 1),
(7, 'preethikrishna1394@gmail.com', 'trinity', 'fac', 1),
(8, 'jithujobin4@gmail.com', 'trinity', 'fac', 1),
(9, 'keerthikrishnan999@gmail.com', 'trinity', 'fac', 1),
(10, 'arunkmsnair@gmail.com', 'trinity', 'fac', 1),
(11, 'ajiellichira@gmail.com', 'trinity', 'fac', 1),
(12, 'vishnupitrinity@gmail.com', 'trinity', 'fac', 1),
(13, 'poorni13@gmail.com', 'trinity', 'fac', 1),
(14, 'anand06111@gmail.com', 'trinity', 'fac', 1),
(15, 'anjaligp1992@gmail.com', 'trinity', 'fac', 1),
(16, 'jithinkv2161@gmail.com', 'trinity', 'fac', 1),
(17, 'geethunithya6@gmail.com', 'trinity', 'fac', 1),
(18, 'vrlekshmipriya@gmail.com', 'trinity', 'fac', 1),
(19, 'sobhanidhi87@gmail.com', 'trinity', 'fac', 1),
(20, 'sunithasurendran@gmail.com', 'trinity', 'fac', 1),
(21, 'sajantm@gmail.com', 'trinity', 'staf', 1),
(22, 'itsmejayan006@gmail.com', 'trinity', 'staf', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
