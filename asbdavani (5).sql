-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 09:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asbdavani`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach_info`
--

CREATE TABLE `coach_info` (
  `id` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `race_count` int(50) NOT NULL,
  `firstplace_count` int(50) NOT NULL,
  `secondplace_count` int(50) NOT NULL,
  `thirdplace_count` int(50) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `coach_info`
--

INSERT INTO `coach_info` (`id`, `name`, `race_count`, `firstplace_count`, `secondplace_count`, `thirdplace_count`, `score`) VALUES
(1, 'سعید رضایی', 16, 2, 5, 0, 25),
(2, 'بهنام آقایی', 11, 2, 2, 1, 17),
(3, 'سید احمد حسینی', 5, 0, 1, 3, 6),
(4, 'قربان محمد وکیلی', 0, 0, 0, 0, 0),
(5, 'متین قریشی', 3, 1, 0, 1, 6),
(6, 'مهران بشارتی', 4, 1, 1, 1, 9),
(7, 'تاج محمد یلقی', 16, 3, 1, 4, 22),
(8, 'جمشید ساریخانی', 1, 0, 0, 0, 0),
(9, 'حمید گرکز', 8, 2, 1, 2, 15),
(10, 'سلمان اونق', 7, 2, 2, 1, 17),
(11, 'بهنام سعیدی', 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `horse_info`
--

CREATE TABLE `horse_info` (
  `id` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `card_num` int(50) NOT NULL,
  `owner` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `coach_id` int(50) NOT NULL,
  `gender` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `age` int(50) NOT NULL,
  `father` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mother` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `sibling` varchar(50) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `race_count` int(50) NOT NULL,
  `firstplace_count` int(50) NOT NULL,
  `secondplace_count` int(50) NOT NULL,
  `thirdplace_count` int(50) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `horse_info`
--

INSERT INTO `horse_info` (`id`, `name`, `card_num`, `owner`, `coach_id`, `gender`, `age`, `father`, `mother`, `sibling`, `race_count`, `firstplace_count`, `secondplace_count`, `thirdplace_count`, `score`) VALUES
(1, 'sk', 32351, 'رضا بهرامی', 1, 'نر', 3, '-', '-', 'دو خون', 6, 0, 2, 0, 6),
(2, 'آپیک', 32135, 'محمد قراوی', 2, 'ماده', 2, '-', '-', 'کوارتر', 7, 1, 1, 1, 9),
(3, 'آتا بیک', 22415, 'اصغر بمادی', 3, 'نر', 1, '-', '-', 'آخال تکه', 1, 0, 0, 1, 1),
(4, 'آتایار', 1205, 'بهرام خراسانی', 4, 'نر', 4, '-', '-', 'عرب', 0, 0, 0, 0, 0),
(5, 'آتش', 54752, 'میلاد گرکز', 5, 'ماده', 3, '-', '-', 'تروبرد داخلی', 1, 1, 0, 0, 5),
(6, 'آدمیرال', 20235, 'محسن شرافتی', 6, 'نر', 3, '-', '-', 'آخال تکه', 4, 1, 1, 1, 9),
(7, 'اسپید هورس', 78201, 'فرهاد توماج', 7, 'نر', 4, '-', '-', 'کوارتر', 5, 2, 0, 1, 11),
(8, 'لجند', 21405, 'فرهاد توماج', 7, 'ماده', 1, '-', '-', 'ترکمن', 4, 1, 0, 2, 7),
(9, 'آنتونی', 87620, 'میلاد حسینی', 5, 'نر', 2, '-', '-', 'عرب', 2, 0, 0, 1, 1),
(10, 'آنجلا', 55413, 'محسن شرافتی', 1, 'ماده', 2, '-', '-', 'تروبرد داخلی', 2, 0, 1, 0, 3),
(11, 'آنیک', 42443, 'بهرام خراسانی', 3, 'ماده', 1, '-', '-', 'آخال تکه', 1, 0, 0, 1, 1),
(12, 'آلگرو', 56565, 'بهرام خراسانی', 1, 'نر', 1, '-', '-', 'کوارتر', 3, 1, 1, 0, 8),
(13, 'آلی چارمنز', 767564, 'اصغر بمادی', 9, 'نر', 1, '-', '-', 'عرب', 3, 1, 1, 0, 8),
(14, 'آنتیک', 13132, 'رحمان وکیلی', 7, 'ماده', 1, '-', '-', 'ترکمن', 1, 0, 1, 0, 3),
(15, 'آواکس', 12345, 'محسن شرافتی', 10, 'نر', 1, '-', '-', 'تروبرد داخلی', 7, 2, 2, 1, 17),
(16, 'تیزپا', 1335, 'رضا بهرامی', 1, 'ماده', 1, '-', '-', 'آخال تکه', 2, 0, 1, 0, 3),
(17, 'آهو', 51651, 'اصغر بمادی', 2, 'ماده', 1, '-', '-', 'ترکمن', 4, 1, 1, 0, 8),
(18, 'تندرو', 84910, 'رحمان وکیلی', 7, 'نر', 1, '-', '-', 'ترکمن', 2, 0, 0, 0, 0),
(19, 'آی تکین', 68465, 'رضا بهرامی', 8, 'ماده', 1, '-', '-', 'ترکمن', 1, 0, 0, 0, 0),
(20, 'آی سارا', 35135, 'بهرام خراسانی', 11, 'نر', 1, '-', '-', 'عرب', 2, 0, 0, 0, 0),
(21, 'آی گون', 653, 'رضا بهرامی', 1, 'نر', 1, '-', '-', 'آخال تکه', 0, 0, 0, 0, 0),
(22, 'آیدا', 651684, 'اصغر بمادی', 3, 'نر', 1, '-', '-', 'تروبرد داخلی', 0, 0, 0, 0, 0),
(23, 'آیدینا', 84615, 'محسن شرافتی', 4, 'ماده', 1, '-', '-', 'دوخون', 0, 0, 0, 0, 0),
(24, 'آیسو', 684981, 'رحمان وکیلی', 1, 'نر', 1, '-', '-', 'کوارتر', 0, 0, 0, 0, 0),
(25, 'ارابل', 9841, 'رضا بهرامی', 9, 'ماده', 1, '-', '-', 'عرب', 0, 0, 0, 0, 0),
(26, 'آهوان', 3213, 'میلاد گرکز', 7, 'ماده', 1, '-', '-', 'آخال تکه', 4, 0, 0, 1, 1),
(27, 'آی سیمبا', 681, 'فرهاد توماج', 1, 'نر', 1, '-', '-', 'تروبرد داخلی', 3, 1, 0, 0, 5),
(28, 'استار بوی', 8415, 'اصغر بمادی', 3, 'ماده', 1, '-', '-', 'کوارتر', 3, 0, 1, 1, 4),
(29, 'استار اسکای', 10225, 'رحمان وکیلی', 9, 'نر', 1, '-', '-', 'ترکمن', 5, 1, 0, 2, 7),
(30, 'استیو', 12406, 'فرهاد توماج', 11, 'ماده', 1, '-', '-', 'عرب', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(50) NOT NULL,
  `address` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `topic` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `address`, `topic`) VALUES
(1, 'upload/815011976045.jpg', 'Ù‡ÙØªÙ‡ Ø§ÙˆÙ„ Ø¨Ù‡Ø§Ø±Ù‡ Ø³Ø§Ù„ 95'),
(2, 'upload/846572162967.jpg', 'Ù‡ÙØªÙ‡ Ø¯ÙˆÙ… Ø¨Ù‡Ø§Ø±Ù‡ Ø³Ø§Ù„ 95'),
(3, 'upload/39272139406211305009466070964.jpg', 'Ù‡ÙØªÙ‡ Ø³ÙˆÙ… Ø¨Ù‡Ø§Ø±Ù‡ Ø³Ø§Ù„ 95'),
(4, 'upload/13029n00257880-r-s-003.jpg', 'Ù‡ÙØªÙ‡ Ú†Ù‡Ø§Ø±Ù… Ø¨Ù‡Ø§Ø±Ù‡ Ø³Ø§Ù„ 95'),
(7, 'upload/93480dsrf.jpg', 'Ø­Ø¶ÙˆØ± Ø³Ø±Ø¯Ø§Ø± Ø¢Ø²Ù…ÙˆÙ† Ø¯Ø± Ù…Ø³Ø§Ø¨Ù‚Ø§Øª'),
(8, 'upload/19883826434.jpg', 'Ù‡ÙØªÙ‡ Ø¯ÙˆÙ… Ù¾Ø§ÛŒÛŒØ²Ù‡ Ø³Ø§Ù„ 95 Ø¯Ø± Ø¨Ù†Ø¯'),
(11, 'upload/48430826445.jpg', 'Ù‡ÙØªÙ‡ Ø³ÙˆÙ… Ù¾Ø§ÛŒÛŒØ²Ù‡ Ø³Ø§Ù„ 95 Ø¯Ø± Ø¨Ù†Ø¯Ø±ØªØ±Ú©Ù…Ù†'),
(12, 'upload/69558826437.jpg', ''),
(13, 'upload/85644826443.jpg', ''),
(14, 'upload/57378826431.jpg', ''),
(15, 'upload/5622826436.jpg', ''),
(16, 'upload/25336826444.jpg', ''),
(17, 'upload/36301659702.jpg', ''),
(18, 'upload/72993IMG_0687.jpg', ''),
(19, 'upload/79307IMG12333624.jpg', ''),
(22, 'upload/95019kjbj.jpg', ''),
(23, 'upload/66387jhj.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `race_chart_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `rank` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `race_chart_id`, `horse_id`, `rider_id`, `rank`) VALUES
(94, 2, 28, 1, '2'),
(95, 2, 29, 5, '3'),
(96, 2, 30, 4, '5'),
(97, 2, 13, 2, '4'),
(98, 2, 8, 8, '1'),
(99, 3, 5, 3, '1'),
(100, 3, 15, 2, '2'),
(101, 3, 11, 6, '3'),
(102, 3, 6, 1, '5'),
(103, 3, 1, 8, '4'),
(112, 4, 10, 2, '2'),
(113, 4, 2, 5, '1'),
(114, 4, 19, 3, '4'),
(115, 4, 26, 7, '3'),
(122, 1, 2, 1, '4'),
(123, 1, 15, 2, '1'),
(124, 1, 12, 3, '2'),
(125, 1, 9, 4, '3'),
(126, 1, 20, 8, '6'),
(127, 1, 7, 7, '5'),
(144, 5, 7, 2, '1'),
(145, 5, 13, 5, '2'),
(146, 5, 29, 6, '3'),
(147, 5, 15, 1, '4'),
(148, 5, 2, 3, '6'),
(149, 5, 26, 6, '5'),
(150, 6, 12, 2, '1'),
(151, 6, 6, 4, '3'),
(152, 6, 2, 6, '2'),
(153, 6, 18, 3, '6'),
(154, 6, 29, 5, '5'),
(155, 6, 1, 1, '4'),
(156, 7, 6, 4, '2'),
(157, 7, 28, 3, '3'),
(158, 7, 29, 1, '4'),
(159, 7, 17, 6, '1'),
(160, 7, 18, 8, '5'),
(161, 8, 16, 1, '2'),
(162, 8, 13, 7, '1'),
(163, 8, 8, 5, '3'),
(164, 8, 9, 2, '5'),
(165, 8, 2, 4, '6'),
(166, 8, 20, 8, '4'),
(222, 9, 17, 1, '2'),
(223, 9, 2, 2, '4'),
(224, 9, 15, 4, '3'),
(225, 9, 1, 3, '6'),
(226, 9, 7, 8, '5'),
(227, 9, 27, 7, '1'),
(228, 10, 3, 7, '3'),
(229, 10, 6, 1, '1'),
(230, 10, 14, 6, '2'),
(231, 10, 17, 5, '6'),
(232, 10, 1, 2, '5'),
(233, 10, 26, 8, '4'),
(234, 11, 1, 1, '2'),
(235, 11, 7, 2, '3'),
(236, 11, 16, 3, '4'),
(237, 11, 15, 4, '1'),
(238, 11, 10, 7, '5'),
(239, 11, 8, 6, '6'),
(240, 12, 2, 4, '3'),
(241, 12, 15, 7, '2'),
(242, 12, 17, 6, '5'),
(243, 12, 12, 3, '6'),
(244, 12, 7, 1, '1'),
(245, 12, 26, 2, '4'),
(246, 12, 27, 8, '7'),
(259, 15, 7, 1, ''),
(260, 15, 2, 4, ''),
(261, 15, 13, 3, ''),
(262, 15, 1, 2, ''),
(263, 15, 28, 7, ''),
(264, 15, 15, 8, ''),
(265, 16, 2, 1, ''),
(266, 16, 7, 3, ''),
(267, 16, 12, 5, ''),
(268, 16, 15, 2, ''),
(269, 16, 1, 7, ''),
(270, 16, 13, 1, ''),
(271, 14, 8, 3, '3'),
(272, 14, 29, 5, '1'),
(273, 14, 1, 7, '2'),
(274, 14, 15, 1, '5'),
(275, 14, 28, 2, '6'),
(276, 14, 27, 8, '4'),
(284, 13, 2, 2, ''),
(285, 13, 14, 1, ''),
(286, 13, 26, 4, ''),
(287, 13, 18, 6, ''),
(288, 13, 11, 7, ''),
(289, 13, 27, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `predict`
--

CREATE TABLE `predict` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `race_chart_id` int(11) NOT NULL,
  `isset_score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `predict`
--

INSERT INTO `predict` (`id`, `user_id`, `horse_id`, `race_chart_id`, `isset_score`) VALUES
(1, 2, 7, 5, 1),
(2, 2, 6, 6, 1),
(3, 2, 6, 7, 1),
(4, 2, 16, 8, 1),
(5, 2, 15, 9, 1),
(6, 2, 6, 10, 1),
(7, 2, 1, 11, 1),
(8, 2, 7, 12, 1),
(9, 2, 26, 13, 0),
(10, 2, 29, 14, 1),
(11, 2, 2, 15, 0),
(12, 2, 13, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `race_chart`
--

CREATE TABLE `race_chart` (
  `id` int(50) NOT NULL,
  `date` date NOT NULL,
  `year` int(50) NOT NULL,
  `season` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `week` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `days` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `course_num` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `start_time` time NOT NULL,
  `distance` int(50) NOT NULL,
  `first_prize` int(40) NOT NULL,
  `second_prize` int(40) NOT NULL,
  `third_prize` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `race_chart`
--

INSERT INTO `race_chart` (`id`, `date`, `year`, `season`, `week`, `days`, `course_num`, `start_time`, `distance`, `first_prize`, `second_prize`, `third_prize`) VALUES
(1, '1396-02-07', 1396, 'بهار', 'اول', 'پنجشنبه', 'اول', '12:10:00', 1200, 12000000, 8000000, 6000000),
(2, '1396-02-07', 1396, 'بهار', 'اول', 'پنجشنبه', 'دوم', '13:00:00', 1400, 15000000, 10000000, 8000000),
(3, '1396-02-07', 1396, 'بهار', 'اول', 'پنجشنبه', 'سوم', '14:00:00', 1500, 14000000, 12000000, 8000000),
(4, '1396-02-07', 1396, 'بهار', 'اول', 'پنجشنبه', 'چهارم', '14:30:00', 1300, 10000000, 8000000, 6000000),
(5, '1396-02-08', 1396, 'بهار', 'اول', 'جمعه', 'اول', '12:01:00', 1200, 13000000, 10000000, 7000000),
(6, '1396-02-08', 1396, 'بهار', 'اول', 'جمعه', 'دوم', '13:00:00', 1000, 9000000, 6000000, 5000000),
(7, '1396-02-08', 1396, 'بهار', 'اول', 'جمعه', 'سوم', '13:45:00', 1400, 1000000, 8000000, 6000000),
(8, '1396-02-08', 1396, 'بهار', 'اول', 'جمعه', 'چهارم', '14:00:00', 1200, 15000000, 10000000, 5000000),
(9, '1396-03-11', 1396, 'تابستان', 'اول', 'پنجشنبه', 'اول', '12:01:00', 1200, 9000000, 5000000, 3000000),
(10, '1396-03-11', 1396, 'تابستان', 'اول', 'پنجشنبه', 'دوم', '13:10:00', 2000, 10000000, 8000000, 6000000),
(11, '1396-03-11', 1396, 'تابستان', 'اول', 'پنجشنبه', 'سوم', '14:01:00', 1300, 12000000, 8000000, 6000000),
(12, '1396-03-11', 1396, 'تابستان', 'اول', 'پنجشنبه', 'چهارم', '15:00:00', 1000, 12000000, 6000000, 5000000),
(13, '1396-03-12', 1396, 'تابستان', 'اول', 'جمعه', 'اول', '12:10:00', 1200, 14000000, 12000000, 8000000),
(14, '1396-03-12', 1396, 'تابستان', 'اول', 'جمعه', 'دوم', '16:00:00', 1000, 12000000, 8000000, 6000000),
(15, '1396-03-12', 1396, 'تابستان', 'اول', 'جمعه', 'سوم', '14:00:00', 2000, 13000000, 8000000, 6000000),
(16, '1396-03-12', 1396, 'تابستان', 'اول', 'جمعه', 'چهارم', '15:00:00', 2000, 12000000, 8000000, 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `rider_info`
--

CREATE TABLE `rider_info` (
  `id` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `race_count` int(50) NOT NULL,
  `firstplace_count` int(50) NOT NULL,
  `secondplace_count` int(50) NOT NULL,
  `thirdplace_count` int(50) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `rider_info`
--

INSERT INTO `rider_info` (`id`, `name`, `race_count`, `firstplace_count`, `secondplace_count`, `thirdplace_count`, `score`) VALUES
(1, 'عارف قازلی کر', 12, 2, 4, 0, 22),
(2, 'محمد توکلی', 12, 3, 2, 1, 22),
(3, 'رضا صحنه', 10, 1, 1, 2, 10),
(4, 'مهران وکیلی', 8, 1, 1, 4, 12),
(5, 'جلال دوگونچی', 7, 2, 1, 2, 15),
(6, 'جمشید صداقت', 8, 1, 2, 2, 13),
(7, 'پیمان قرنجیک', 8, 2, 2, 2, 18),
(8, 'میلاد حسن قاسمی', 9, 1, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `phone_num` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `credit_num` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `shaba_num` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `predict_count` int(50) NOT NULL,
  `truepre_count` int(50) NOT NULL,
  `score` int(50) NOT NULL DEFAULT '0',
  `user_type` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_num`, `credit_num`, `shaba_num`, `password`, `predict_count`, `truepre_count`, `score`, `user_type`) VALUES
(1, 'mohammad', 'mohammad@gmail.com', '09376104747', '6037996513513512', 'IR31681864484615', '698d51a19d8a121ce581499d7b701668', 0, 0, 0, 2),
(2, 'mahdi', 'mahdi@gmail.com', '09116532515', '6012456168168651', 'IR56498453132135', 'bcbe3365e6ac95ea2c0343a2395834dd', 0, 0, 44, 1),
(3, 'ali', 'ali@gmail.com', '09356681651', '6037618891561981', 'IR56498453132135', '310dcbbf4cce62f762a2aaa148d556bd', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_remember`
--

CREATE TABLE `users_remember` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `remember_code` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(50) NOT NULL,
  `address` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `topic` varchar(150) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `address`, `topic`) VALUES
(1, 'video/6029203538d4256b05a6185db902f4d0c37c3.mp4', 'Ù…Ø³Ø§Ø¨Ù‚Ø§Øª Ù‡ÙØªÙ‡ Ø³ÙˆÙ… ØªØ§Ø¨Ø³ØªØ§Ù†Ù‡ Ú¯Ù†Ø¨Ø¯ 95'),
(2, 'video/11870aa060d24d1a5c44abc118711e08ea875.mp4', 'Ù…Ø³Ø§Ø¨Ù‚Ø§Øª Ù‡ÙØªÙ‡ Ø¯ÙˆÙ… ØªØ§Ø¨Ø³ØªØ§Ù†Ù‡ Ø§Ù‚ Ù‚Ù„Ø§ 96'),
(3, 'video/176644d5c6aed4f01e0516ae172c3e55cee89.mp4', 'Ù…Ø³Ø§Ø¨Ù‚Ø§Øª Ù‡ÙØªÙ‡ Ø§ÙˆÙ„ Ù¾Ø§ÛŒÛŒØ²Ù‡ Ø¨Ù†Ø¯Ø± ØªØ±Ú©Ù…Ù† 95'),
(4, 'video/31383df9a65d0cc61bd1879d902aae1e24614.mp4', 'Ù…Ø³Ø§Ø¨Ù‚Ø§Øª Ù‡ÙØªÙ‡ Ù¾Ù†Ø¬Ù… ØªØ§Ø¨Ø³ØªØ§Ù†Ù‡ ØªÙ‡Ø±Ø§Ù† 96'),
(5, 'video/179255d689d4aee77b5108c901ef1ac866c83.mp4', 'Ù‡ÙØªÙ‡ Ø§ÙˆÙ„ Ø¨Ù‡Ø§Ø±Ù‡ Ø³Ø§Ù„ 95 Ø¯Ø± ØªÙ‡Ø±Ø§Ù†');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach_info`
--
ALTER TABLE `coach_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horse_info`
--
ALTER TABLE `horse_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_chart_id` (`race_chart_id`),
  ADD KEY `horse_id` (`horse_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `predict`
--
ALTER TABLE `predict`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `horse_id` (`horse_id`),
  ADD KEY `race_chart_id` (`race_chart_id`);

--
-- Indexes for table `race_chart`
--
ALTER TABLE `race_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_info`
--
ALTER TABLE `rider_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users_remember`
--
ALTER TABLE `users_remember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `remember_code` (`remember_code`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach_info`
--
ALTER TABLE `coach_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `horse_info`
--
ALTER TABLE `horse_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
--
-- AUTO_INCREMENT for table `predict`
--
ALTER TABLE `predict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `race_chart`
--
ALTER TABLE `race_chart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rider_info`
--
ALTER TABLE `rider_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_remember`
--
ALTER TABLE `users_remember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `horse_info`
--
ALTER TABLE `horse_info`
  ADD CONSTRAINT `horse_info_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach_info` (`id`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`horse_id`) REFERENCES `horse_info` (`id`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`rider_id`) REFERENCES `rider_info` (`id`),
  ADD CONSTRAINT `participant_ibfk_3` FOREIGN KEY (`race_chart_id`) REFERENCES `race_chart` (`id`);

--
-- Constraints for table `predict`
--
ALTER TABLE `predict`
  ADD CONSTRAINT `predict_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `predict_ibfk_2` FOREIGN KEY (`horse_id`) REFERENCES `horse_info` (`id`),
  ADD CONSTRAINT `predict_ibfk_3` FOREIGN KEY (`race_chart_id`) REFERENCES `race_chart` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
