-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 11:54 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geniusoc_affilate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `photo`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(1, 'Genius Admin', 'admin', 'admin@site.com', '01717890623', '$2y$10$GG3SSLfO9gylr5Qta4SQ1uM0tbMqFfTr0XeFa1SVjCkh7/hQ9ZWEC', 'Administrator', '1491825290645x430-film-animasi-larrikins-borong-bintang-bintang-australia-160604k.jpg', '2017-01-24 03:21:40', '2017-05-06 12:39:47', '28T5ZzdoLZMitTHOQkSG46pdY7EtchrR5HyC7H9vgp9Er6WM0p4IVr766nmL', 1),
(2, 'S Zaman', 'genius', 'genius@gmail.com', '017178906233', '$2y$10$DozM30vRGMY9aDIh2EKxROmvuJRtBMimO2ox/rF8uXjMBYBjLvVRe', 'Administrator', '11822730_1619598781649385_5506560502405630990_n.jpg', '2017-01-27 22:35:17', '2017-03-06 11:02:08', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `type` enum('script','banner') NOT NULL,
  `advertiser_name` varchar(255) DEFAULT NULL,
  `redirect_url` varchar(255) DEFAULT NULL,
  `banner_size` varchar(255) NOT NULL,
  `banner_file` varchar(255) DEFAULT NULL,
  `script` text,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `mainid` int(11) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `mainid`, `subid`, `role`, `name`, `slug`, `status`) VALUES
(17, NULL, NULL, 'main', 'Man', 'man', 1),
(18, 17, NULL, 'sub', 'T-shirt', 't-shirt', 1),
(19, 17, 18, 'child', 'Black', 'black', 1),
(20, 17, NULL, 'sub', 'Subtitle', 'subtitle', 1),
(21, 17, NULL, 'sub', 'Subtitle', 'subtitle2', 1),
(22, 17, NULL, 'sub', 'Subtitle', 'subtitle3', 1),
(23, 17, NULL, 'sub', 'Subtitle', 'subtitle4', 1),
(24, 17, 20, 'child', 'Child-category', 'child-category', 1),
(25, 17, 21, 'child', 'Child-category', 'child-category2', 1),
(26, 17, 22, 'child', 'Child-category', 'child-category3', 1),
(27, 17, 23, 'child', 'Child-category', 'child-category6', 1),
(29, 17, 23, 'child', 'Child-category', 'child-category4', 1),
(30, 17, 22, 'child', 'Child-category', 'child-category7', 1),
(31, 17, 21, 'child', 'Child-category', 'child-category8', 1),
(32, 17, 21, 'child', 'Child-category', 'child-category9', 1),
(33, 17, 20, 'child', 'Child-category', 'child-category41', 1),
(34, 17, 18, 'child', 'Child-category', 'child-category42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code_scripts`
--

CREATE TABLE `code_scripts` (
  `id` int(11) NOT NULL,
  `google_analytics` text NOT NULL,
  `meta_keys` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code_scripts`
--

INSERT INTO `code_scripts` (`id`, `google_analytics`, `meta_keys`) VALUES
(1, '<script>\r\n   //Google Analytics Scriptfffffffffffffffffffffffssssfffffs\r\n</script>', 'Genius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,SeaGenius,Ocean,Sea,Etc,Genius,Ocean,Sea');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(11) NOT NULL,
  `type` enum('referral','browser') NOT NULL DEFAULT 'referral',
  `referral` varchar(255) DEFAULT NULL,
  `total_count` int(11) NOT NULL DEFAULT '0',
  `todays_count` int(11) NOT NULL DEFAULT '0',
  `today` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `type`, `referral`, `total_count`, `todays_count`, `today`) VALUES
(1, 'referral', 'www.facebook.com', 5, 0, NULL),
(2, 'referral', 'geniusocean.com', 2, 0, NULL),
(3, 'browser', 'Windows 10', 322, 0, NULL),
(4, 'browser', 'Linux', 230, 0, NULL),
(5, 'browser', 'Unknown OS Platform', 290, 0, NULL),
(6, 'browser', 'Windows 7', 240, 0, NULL),
(7, 'referral', 'yandex.ru', 1, 0, NULL),
(8, 'browser', 'Windows 8.1', 280, 0, NULL),
(9, 'referral', 'www.google.com', 2, 0, NULL),
(10, 'browser', 'Android', 720, 0, NULL),
(11, 'browser', 'Mac OS X', 250, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `home` varchar(191) NOT NULL,
  `fh` varchar(191) NOT NULL,
  `fht` varchar(191) NOT NULL,
  `h` varchar(191) NOT NULL,
  `vt` varchar(191) NOT NULL,
  `gt` varchar(191) NOT NULL,
  `vdn` varchar(191) NOT NULL,
  `about` varchar(191) NOT NULL,
  `blog` varchar(191) NOT NULL,
  `blogs` varchar(191) NOT NULL,
  `faq` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `con` varchar(191) NOT NULL,
  `cop` varchar(191) NOT NULL,
  `coe` varchar(191) NOT NULL,
  `cor` varchar(191) NOT NULL,
  `signin` varchar(191) NOT NULL,
  `sie` varchar(191) NOT NULL,
  `spe` varchar(191) NOT NULL,
  `signup` varchar(191) NOT NULL,
  `suf` varchar(191) NOT NULL,
  `suph` varchar(191) NOT NULL,
  `sue` varchar(191) NOT NULL,
  `sup` varchar(191) NOT NULL,
  `sucp` varchar(191) NOT NULL,
  `dashboard` varchar(191) NOT NULL,
  `edit` varchar(191) NOT NULL,
  `reset` varchar(191) NOT NULL,
  `logout` varchar(191) NOT NULL,
  `cp` varchar(191) NOT NULL,
  `np` varchar(191) NOT NULL,
  `rnp` varchar(191) NOT NULL,
  `chnp` varchar(191) NOT NULL,
  `bgs` varchar(191) NOT NULL,
  `rds` varchar(191) NOT NULL,
  `hcs` varchar(191) NOT NULL,
  `lns` varchar(191) NOT NULL,
  `lm` varchar(191) NOT NULL,
  `vd` varchar(191) NOT NULL,
  `ston` varchar(191) NOT NULL,
  `s` varchar(191) NOT NULL,
  `fl` varchar(191) NOT NULL,
  `sm` varchar(191) NOT NULL,
  `fpw` varchar(191) NOT NULL,
  `fpt` varchar(191) NOT NULL,
  `fpe` varchar(191) NOT NULL,
  `fpb` varchar(191) NOT NULL,
  `cn` varchar(191) NOT NULL,
  `al` varchar(191) NOT NULL,
  `bg` varchar(191) NOT NULL,
  `dni` varchar(191) NOT NULL,
  `search` varchar(191) NOT NULL,
  `ec` varchar(191) NOT NULL,
  `sbg` varchar(191) NOT NULL,
  `ss` varchar(191) NOT NULL,
  `bs` varchar(191) NOT NULL,
  `dopd` varchar(191) NOT NULL,
  `doo` varchar(191) NOT NULL,
  `dol` varchar(191) NOT NULL,
  `doa` varchar(191) NOT NULL,
  `doe` varchar(191) NOT NULL,
  `dor` varchar(191) NOT NULL,
  `dopr` varchar(191) NOT NULL,
  `doc` varchar(191) NOT NULL,
  `doci` varchar(191) NOT NULL,
  `dosp` varchar(191) NOT NULL,
  `don` varchar(191) NOT NULL,
  `doem` varchar(191) NOT NULL,
  `dom` varchar(191) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `cup` varchar(191) NOT NULL,
  `pp` varchar(191) NOT NULL,
  `app` varchar(191) NOT NULL,
  `size` varchar(191) NOT NULL,
  `md` varchar(191) NOT NULL,
  `amf` varchar(191) NOT NULL,
  `doct` varchar(191) NOT NULL,
  `doad` varchar(191) NOT NULL,
  `doph` varchar(191) NOT NULL,
  `dofx` varchar(191) NOT NULL,
  `dofpl` varchar(191) NOT NULL,
  `dotpl` varchar(191) NOT NULL,
  `dogpl` varchar(191) NOT NULL,
  `dolpl` varchar(191) NOT NULL,
  `doeml` varchar(191) NOT NULL,
  `doupl` varchar(191) NOT NULL,
  `supl` varchar(191) NOT NULL,
  `success` varchar(191) NOT NULL,
  `dttl` varchar(191) NOT NULL,
  `ddesc` varchar(191) NOT NULL,
  `ppr` varchar(191) NOT NULL,
  `fpr` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `home`, `fh`, `fht`, `h`, `vt`, `gt`, `vdn`, `about`, `blog`, `blogs`, `faq`, `contact`, `con`, `cop`, `coe`, `cor`, `signin`, `sie`, `spe`, `signup`, `suf`, `suph`, `sue`, `sup`, `sucp`, `dashboard`, `edit`, `reset`, `logout`, `cp`, `np`, `rnp`, `chnp`, `bgs`, `rds`, `hcs`, `lns`, `lm`, `vd`, `ston`, `s`, `fl`, `sm`, `fpw`, `fpt`, `fpe`, `fpb`, `cn`, `al`, `bg`, `dni`, `search`, `ec`, `sbg`, `ss`, `bs`, `dopd`, `doo`, `dol`, `doa`, `doe`, `dor`, `dopr`, `doc`, `doci`, `dosp`, `don`, `doem`, `dom`, `fname`, `cup`, `pp`, `app`, `size`, `md`, `amf`, `doct`, `doad`, `doph`, `dofx`, `dofpl`, `dotpl`, `dogpl`, `dolpl`, `doeml`, `doupl`, `supl`, `success`, `dttl`, `ddesc`, `ppr`, `fpr`) VALUES
(1, 'HOME', 'Street Address:', 'Address', 'Phone:', 'Fax:', 'Email:', 'Subscription:', 'ABOUT US', 'Enter Email', 'Subscribe', 'FAQ', 'CONTACT US', 'Name', 'Email', 'Phone', 'Select Gender', 'Male', 'Female', 'Others', 'Message', 'Submit', 'Popular Products', 'Email', 'VIEW', 'Search Product', 'Search', 'Feature Products', 'Latest Products', 'Search Result For:', 'All Categories', 'LOAD MORE', 'No review has given yet.', 'Related Products', 'Write a Review', 'Reviews', 'Show More', 'BUY NOW', 'No Product Found in This Category.', 'Share in social media', 'Full Description', 'Your rating is:', 'Your Email', 'Review Description', 'Contact Us Today!', 'FORGOT PASSWORD', 'Enter Email', 'SUBMIT', 'CREATE NEW ACCOUNT', 'ALREADY HAVE ACCOUNT? LOGIN', 'SUBMIT REVIEW', 'HandyMen Found in :', 'Search', 'Select City', 'Select Category', 'Start Searching', 'Source', 'Profile Description', 'Others', 'Language', 'Age', 'Education', 'Residency', 'Profession', 'Contact', 'Contact Info', 'Share Profile', 'Name:', 'Email:', 'Message:', 'Full Name', 'Current Photo', 'Profile Photo', 'Add Profile Photo', 'Preferred Size: (600x600) or Square Sized Image', 'More Details', 'Add More Field', 'City', 'Address', 'Phone', 'Fax', 'Facebook Profile Link', 'Twitter Profile Link', 'Google+ Profile Link', 'Linkedin Profile Link', 'Website', 'Update Profile', 'Full Name', 'Successfully updated your profile', 'Enter Title', 'Enter Text/Details', 'Publish My Profile', 'Feature My Profile');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(11) NOT NULL,
  `contact` text CHARACTER SET latin1 NOT NULL,
  `contact_email` text CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `faq` text CHARACTER SET latin1 NOT NULL,
  `c_status` int(11) NOT NULL,
  `a_status` int(11) NOT NULL,
  `f_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `contact`, `contact_email`, `about`, `faq`, `c_status`, `a_status`, `f_status`) VALUES
(1, 'Success! Thanks for contacting us, we will get back to you shortly.', 'admin@geniusocean.com', '<div>\r\n<h2>Title number 1<br></h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n</div><div>\r\n<h2>Title number 2<br></h2>\r\n<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>\r\n</div><br><div>\r\n<h2>Title number 3<br></h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>\r\n</div>\r\n<h2>Title number 9<br></h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', '<div>\r\n<h2>What is Lorem Ipsum, Really?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n</div><div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>\r\n</div><br><div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>\r\n</div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` float NOT NULL,
  `previous_price` float DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `feature_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `featured` int(1) NOT NULL DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `click` int(255) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `description`, `price`, `previous_price`, `link`, `feature_image`, `featured`, `views`, `created_at`, `updated_at`, `status`, `click`) VALUES
(16, 'Here Will Be Your Product Title', '17,18,19', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1000, 600, 'https://www.amazon.com/dp/B005GSRPG8/', '149538220024-min.jpg', 1, 29, '2017-05-13 07:14:42', '2018-07-20 14:49:17', 1, 0),
(17, 'Here Will Be Your Product Title', '17,18,19', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 1200, 1500, 'https://www.amazon.com/dp/B005GSRPG8/', '149538315616-min.jpg', 1, 23, '2017-05-13 08:07:41', '2018-07-05 08:40:19', 1, 0),
(18, 'Here Will Be Your Product Title', '17,18,19', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 800, 1500, 'https://www.amazon.com/dp/B005GSRPG8/', '149538244323-min.jpg', 1, 28, '2017-05-13 08:08:45', '2017-05-21 16:00:43', 1, 0),
(19, 'Here Will Be Your Product Title', '17,18,19', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 800, 1200, 'https://www.amazon.com/dp/B005GSRPG8/', '149538247122-min.jpg', 1, 80, '2017-05-13 08:10:15', '2017-05-21 16:01:11', 1, 0),
(20, 'Here Will Be Your Product Title', '17,18,19', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 600, 1100, 'https://www.amazon.com/dp/B005GSRPG8/', '149538248325-min.jpg', 1, 49, '2017-05-13 08:12:13', '2018-07-20 14:15:56', 1, 0),
(22, 'Here Will Be Your Product Title', '17,18,19', '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.', 20, 25, 'https://www.amazon.com/dp/B005GSRPG8/', '149538214822-min.jpg', 1, 9, '2017-05-18 10:22:15', '2017-05-21 15:56:11', 1, 0),
(23, 'Here Will Be Your Product Title', '17,18,34', 'Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum', 1500, 1800, 'https://www.amazon.com/dp/B005GSRPG8/', '149538209616-min.jpg', 1, 7, '2017-05-19 12:32:34', '2017-05-21 15:54:56', 1, 0),
(25, 'Here Will Be Your Product Title', '17,18,19', 'It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour.', 20, 25, 'https://www.amazon.com/dp/B005GSRPG8/', '149538205614-min.jpg', 1, 11, '2017-05-20 15:59:45', '2018-07-20 13:37:58', 1, 0),
(26, 'Here Will Be Your Product Title', '17,18,19', 'It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour a', 200, 250, 'https://www.amazon.com/dp/B005GSRPG8/', '149538202213-min.jpg', 1, 49, '2017-05-20 16:21:51', '2018-07-26 10:36:33', 1, 3),
(28, 'Here Will Be Your Product Title', '17,18,19', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br>', 10.99, 15.99, 'facebook.com', '1532617601profile-img.jpg', 1, 6, '2017-05-21 14:35:31', '2018-07-26 15:06:55', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `productid`, `image`, `type`) VALUES
(7, 28, 'Bb149538198112-min.jpg', 0),
(8, 28, 'yN149538198113-min.jpg', 0),
(9, 28, 'i4149538198114-min.jpg', 0),
(10, 28, 'C4149538198116-min.jpg', 0),
(11, 26, 'nW149538202222-min.jpg', 0),
(12, 26, 'HL149538202223-min.jpg', 0),
(13, 26, 'Bc149538202224-min.jpg', 0),
(14, 26, 'iT149538202225-min.jpg', 0),
(15, 25, 'LS149538205613-min.jpg', 0),
(16, 25, 'R9149538205614-min.jpg', 0),
(17, 25, 'Ek149538205616-min.jpg', 0),
(18, 25, 'VW149538205622-min.jpg', 0),
(19, 23, 'oL149538209614-min.jpg', 0),
(20, 23, 'Hf149538209616-min.jpg', 0),
(21, 23, 'ic149538209622-min.jpg', 0),
(22, 23, '8g149538209623-min.jpg', 0),
(23, 22, 'r3149538212914-min.jpg', 0),
(24, 22, '1g149538212916-min.jpg', 0),
(25, 22, 'pV149538212922-min.jpg', 0),
(26, 22, 'PE149538212923-min.jpg', 0),
(27, 22, 'FC149538212924-min.jpg', 0),
(28, 16, 'QW149538220014-min.jpg', 0),
(29, 16, 'nC149538220016-min.jpg', 0),
(30, 16, 'il149538220022-min.jpg', 0),
(31, 16, 'Ss149538220023-min.jpg', 0),
(32, 16, 'y0149538220024-min.jpg', 0),
(33, 31, 'jQ1532173640Product_Fetos_Light_big.png', 0),
(34, 31, 'ot1532173640Product_Ricotta_Fiorella_475g_big.png', 0),
(50, 36, 'Ht1532601310ad1.jpg', 0),
(51, 36, 'nk1532601310add.jpg', 0),
(52, 37, 'oV1532601335ad1.jpg', 0),
(53, 37, '3N1532601335add.jpg', 0),
(54, 37, 'Eh1532601336highway-wallpaper-2.jpg', 0),
(55, 37, 'c81532601336home-top-min.jpg', 0),
(56, 37, '9Y1532601336logo.png', 0),
(65, 38, 'U31532601571profile-img.jpg', 0),
(66, 38, 'jB1532601571single-blog-post-bg-img.jpg', 0),
(67, 38, '9P1532601571testimonial_author2.jpg', 0),
(68, 28, 'wN1532617589profile-img.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` text,
  `rating` int(11) DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `productid`, `name`, `email`, `review`, `rating`, `review_date`) VALUES
(1, NULL, 'sssssssss', 'user@gmail.com', NULL, NULL, '2017-05-08 17:15:56'),
(2, NULL, 'shaon', 'user@gmail.com', 'Lorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsam Lorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsam', NULL, '2017-05-08 17:17:32'),
(3, 8, 'shaon', 'admin@gmail.com', 'Lorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsam Lorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsamLorem ipsam', 5, '2017-05-08 17:18:15'),
(4, 8, 'wwwwwwwww wwwwwwww', 'user@gmail.com', 'wwwwww www wwww wwwwwww wwwwwwww wwwwww www wwwwww', 4, '2017-05-08 18:15:37'),
(5, 3, 'Shaon Zaman', 'user@gmail.com', 'Good Product.', 5, '2017-05-08 21:37:38'),
(6, 3, 'B Chow', 'admin@gmail.com', 'Nice Product.', 4, '2017-05-09 10:20:51'),
(7, 3, 'Dreamy', 'user@gmail.com', 'Poor Product.', 1, '2017-05-09 10:21:45'),
(9, 4, 'Shaon Zaman', 'user@gmail.com', 'aaaaaaaaaaaaaaaaaa', 5, '2017-05-12 10:56:24'),
(10, 24, 'ddddddddf', 'badruddozsa.me@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5, '2017-05-19 15:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `service_text` text CHARACTER SET latin1,
  `pricing_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pricing_text` text CHARACTER SET latin1,
  `portfolio_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `portfolio_text` text CHARACTER SET latin1,
  `testimonial_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `testimonial_text` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `service_title`, `service_text`, `pricing_title`, `pricing_text`, `portfolio_title`, `portfolio_text`, `testimonial_title`, `testimonial_text`) VALUES
(1, 'Our Services', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'Pricing Plans', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'Latest Projects', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'Customer Reviews', 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fax` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `footer` varchar(255) CHARACTER SET latin1 NOT NULL,
  `background` varchar(255) CHARACTER SET latin1 NOT NULL,
  `theme_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sign` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_business` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stripe_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `css_file` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `title`, `url`, `about`, `address`, `phone`, `fax`, `email`, `footer`, `background`, `theme_color`, `sign`, `paypal_business`, `stripe_key`, `stripe_secret`, `css_file`) VALUES
(1, 'logo.png', 'favicon.ico', 'Affiliate Business', 'Fuckcccccc', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae&nbsp;', '124/6 Street, Country', '00 000 000 000', '00 000 000 000', 'admin@geniusocean.com', 'COPYRIGHT 2017 <a href=\"http://geniusocean.com\">GeniusOcean.com<br></a>', 'smm-min2.jpg', '#000000', '$', 'shaon143-facilitator-1@gmail.com', 'pk_test_bD5Si0msHNV75sd5R71jSJFb', 'sk_test_r7zxASOuYYCiuT3svkUtuh6W', 'genius1.css');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text` text CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `text_position` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `text`, `image`, `text_position`, `status`) VALUES
(3, 'Slider Title 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'BrUslider.jpg', 'slide_style_left', 1),
(4, 'Slider Title 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '8Nsslider3.jpg', 'slide_style_center', 1),
(5, 'Slider Title 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'RWXslider1.jpg', 'slide_style_right', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `g_plus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `f_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `t_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `g_status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `link_status` enum('enable','disable') NOT NULL DEFAULT 'enable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twiter`, `g_plus`, `linkedin`, `f_status`, `t_status`, `g_status`, `link_status`) VALUES
(1, 'http://facebook.com/ebangladesh', 'http://twitter.com/', 'http://google.com/', 'http://linkedin.com/', 'enable', 'enable', 'enable', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `review` text CHARACTER SET latin1 NOT NULL,
  `client` varchar(255) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `review`, `client`, `designation`) VALUES
(1, 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'eBangladesh', 'Project Manager'),
(2, 'In publishing and graphic design, lorem ipsum is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation.', 'The Usual Suspects', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_scripts`
--
ALTER TABLE `code_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `code_scripts`
--
ALTER TABLE `code_scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
