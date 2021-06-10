-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 04:48 PM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

----
-- Database: `xx`
--
CREATE DATABASE IF NOT EXISTS `xx` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `xx`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`web1`@`localhost` PROCEDURE `filldates` (IN `dateStart` DATE, IN `dateEnd` DATE, IN `pid` INT)  BEGIN
  WHILE dateStart <= dateEnd DO
    INSERT INTO TempDateTable (_date,_pid) VALUES (dateStart,pid);
    SET dateStart = date_add(dateStart, INTERVAL 1 DAY);
  END WHILE;
END$$

CREATE DEFINER=`web1`@`localhost` PROCEDURE `spPropertyCard` (IN `Listid` INT)  select * from xx.PropertyListings PL 

where PL.id = Listid$$

CREATE DEFINER=`web1`@`localhost` PROCEDURE `spUpdateListingLoad` ()  NO SQL
UPDATE xx.PropertyListings pl
INNER JOIN vwCalculatedDaysByListing vwCl ON pl.ID = vwCl.listingID
SET PropertyLoad = ROUND(vwCl.Count / 90 * 100)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `AccountActionLogs`
--

CREATE TABLE `AccountActionLogs` (
  `ID` int(11) NOT NULL,
  `AcountID` int(11) DEFAULT NULL,
  `ActionID` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AccountAddresses`
--

CREATE TABLE `AccountAddresses` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `City` int(11) DEFAULT NULL COMMENT 'SettingCities',
  `Street` varchar(200) DEFAULT NULL,
  `Building` varchar(200) DEFAULT NULL,
  `Appartment` varchar(200) DEFAULT NULL,
  `State` int(11) DEFAULT NULL COMMENT 'SettingStates',
  `Zip` varchar(10) DEFAULT NULL,
  `Main` int(1) DEFAULT NULL,
  `Active` int(1) DEFAULT '1',
  `Latitude` decimal(8,6) NOT NULL DEFAULT '0.000000',
  `Longitude` decimal(9,6) NOT NULL DEFAULT '0.000000',
  `Timezone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountAddresses`
--

INSERT INTO `AccountAddresses` (`ID`, `ListingID`, `AccountID`, `Country`, `City`, `Street`, `Building`, `Appartment`, `State`, `Zip`, `Main`, `Active`, `Latitude`, `Longitude`, `Timezone`) VALUES
(1124, 2130, 36, 1, 1, 'улица Наримановы', NULL, '127', NULL, NULL, NULL, 1, '40.431677', '49.962698', 4),
(1125, 2131, 36, 1, 1, 'Гасан Салмани', NULL, '5', NULL, NULL, NULL, 1, '40.368286', '49.834111', 4),
(1126, 2132, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '40.370355', '0.000000', NULL),
(1127, 2133, 36, 1, 1, 'Гасан Салмани', NULL, NULL, NULL, NULL, NULL, 1, '40.368422', '49.836305', 4),
(1128, 2134, 36, 1, 1, 'проспект Азербайджана', NULL, NULL, NULL, NULL, NULL, 1, '40.365321', '49.828742', 4),
(1129, 2135, 36, 1, 1, 'улица Низами 49', NULL, NULL, NULL, NULL, NULL, 1, '40.369913', '49.837672', 4),
(1130, 2136, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1131, 2137, 36, 1, 1, 'улица Низами', NULL, '63', NULL, NULL, NULL, 1, '40.374242', '49.836824', 4),
(1132, 2138, 36, 1, 1, 'улица Башира Сафароглу', NULL, '37', NULL, NULL, NULL, 1, '40.369260', '49.838006', 4),
(1133, 2139, 36, 1, 1, 'проспект Бюль-бюля', NULL, '10', NULL, NULL, NULL, 1, '40.370358', '49.839363', 4),
(1134, 2140, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1135, 2141, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1136, 2142, 4, 1, 1, 'eawe', NULL, '31', NULL, '13123', NULL, 1, '40.367764', '49.838904', NULL),
(1137, 2143, 4, 1, 1, 'wqdq', NULL, NULL, NULL, NULL, NULL, 1, '40.367764', '49.838904', NULL),
(1138, 2144, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1139, 2145, 118, 1, 1, 'Лейла Маммедбекова', NULL, '14, 23', NULL, 'az1040', NULL, 1, '40.431677', '49.962698', 4),
(1140, 2146, 118, 1, 2, 'aafsdff', NULL, 'sfe', NULL, 'fes', NULL, 1, '40.981000', '47.847519', NULL),
(1141, 2147, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1142, 2148, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1143, 2149, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1144, 2150, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1145, 2151, 118, 1, 1, 'Лейла Маммедбекова', NULL, '13', NULL, 'az1040', NULL, 1, '40.432363', '49.961092', 4),
(1146, 2152, 4, 1, 1, 'aslkdkjsadojasoui, iuoj', NULL, NULL, NULL, 'iuou', NULL, 1, '40.368110', '49.839544', 4),
(1147, 2153, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1148, 2154, 149, 1, 1, 'aslkdkjsadojasoui, iuoj', NULL, NULL, NULL, 'iuou', NULL, 1, '40.367019', '49.835495', 4),
(1149, 2155, 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1150, 2156, 159, 1, 1, 'R.Beybutov-30', NULL, NULL, NULL, '1055', NULL, 1, '40.378018', '49.845137', 4),
(1151, 2157, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1152, 2158, 162, 1, 1, 'R Rustamov 72d', NULL, 'Квартира', NULL, '1118', NULL, 1, '40.369223', '49.835578', 4),
(1153, 2159, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1154, 2160, 164, 1, 1, '28 май 33', NULL, 'Квартира', NULL, NULL, NULL, 1, '40.379748', '49.858237', 4),
(1155, 2161, 175, 1, 1, 'Nizami street', NULL, NULL, NULL, 'AZ1000', NULL, 1, '40.372400', '49.840683', 4),
(1156, 2162, 176, 1, 1, 'Уз.Гаджибекова', NULL, NULL, NULL, NULL, NULL, 1, '40.375724', '49.856280', 4),
(1157, 2163, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1158, 2164, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1159, 2165, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1160, 2166, 183, 1, 1, 'Исмаил Хидаятзаде', NULL, '51а', NULL, 'AZ1133', NULL, 1, '40.394431', '49.870870', 4),
(1161, 2167, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1162, 2168, 178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.000000', '0.000000', NULL),
(1163, 2169, 178, 1, 1, 'aslkdkjsadojasoui', NULL, '2', NULL, 'iuou', NULL, 1, '40.381676', '49.826191', 4);

-- --------------------------------------------------------

--
-- Table structure for table `AccountDocuments`
--

CREATE TABLE `AccountDocuments` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Filename` varchar(1000) DEFAULT NULL,
  `IDType` int(11) DEFAULT NULL,
  `DocumentSide` int(11) DEFAULT NULL,
  `DateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Verified` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountDocuments`
--

INSERT INTO `AccountDocuments` (`ID`, `AccountID`, `Filename`, `IDType`, `DocumentSide`, `DateCreated`, `Verified`, `Status`) VALUES
(1, 118, '11871de03301559a1ffc1250c3bb39ec1fd41b4b17b_front.jpg', 1, 1, '2020-12-17 07:08:42', 0, 1),
(2, 118, '118b064265c9e153d4eae3bfc366983d4872a49dc89_front.jpg', 1, 1, '2020-12-17 07:13:57', 0, 1),
(3, 118, '118b064265c9e153d4eae3bfc366983d4872a49dc89_back.jpg', 1, 2, '2020-12-17 07:13:57', 0, 1),
(4, 4, '49f06b4d33964962533d0564ac2037acd5a14e679_front.jpg', 1, 1, '2020-12-17 20:46:35', 0, 3),
(5, 4, '49f06b4d33964962533d0564ac2037acd5a14e679_back.jpg', 1, 2, '2020-12-17 20:46:35', 0, 3),
(6, 121, '1218772a9f9eb98545f806983280271c027eb62b20c_front.jpg', 1, 1, '2020-12-30 01:15:30', 0, 1),
(7, 121, '1218772a9f9eb98545f806983280271c027eb62b20c_back.jpg', 1, 2, '2020-12-30 01:15:30', 0, 1),
(8, 4, '4fb199bd47d30a757fc628b051435e0c065fae90d_front.jpg', 1, 1, '2020-12-30 18:26:46', 0, 3),
(9, 4, '4fb199bd47d30a757fc628b051435e0c065fae90d_back.jpg', 1, 2, '2020-12-30 18:26:46', 0, 3),
(10, 4, '4d2115196f45e1bd80e01a479de1793bb47bf1632_front.jpg', 1, 1, '2020-12-30 18:31:42', 0, 3),
(11, 4, '4d2115196f45e1bd80e01a479de1793bb47bf1632_back.jpg', 1, 2, '2020-12-30 18:31:42', 0, 3),
(12, 4, '4d8af29ebf7949ac257ac7d71220697064e38bc8d_front.jpg', 1, 1, '2021-01-04 21:01:05', 0, 3),
(13, 4, '4d8af29ebf7949ac257ac7d71220697064e38bc8d_back.jpg', 1, 2, '2021-01-04 21:01:05', 0, 3),
(14, 4, '4326a10f4dd42ed35d1c4ad54e82b1993fe0cc121_front.jpg', 1, 1, '2021-01-06 08:55:36', 0, 3),
(15, 4, '4326a10f4dd42ed35d1c4ad54e82b1993fe0cc121_back.jpg', 1, 2, '2021-01-06 08:55:36', 0, 3),
(16, 4, '4bf99c16555c8afacddb3a53d5207e7838fe55423_front.jpg', 1, 1, '2021-01-06 08:55:46', 0, 3),
(17, 4, '4bf99c16555c8afacddb3a53d5207e7838fe55423_back.jpg', 1, 2, '2021-01-06 08:55:46', 0, 3),
(18, 4, '48539870127045b2fba7e72e3778e910f6b13f04b_front.jpg', 1, 1, '2021-01-06 08:56:37', 0, 3),
(19, 4, '48539870127045b2fba7e72e3778e910f6b13f04b_back.jpg', 1, 2, '2021-01-06 08:56:37', 0, 3),
(20, 149, '149d9e9a8d76254449f6f4b2f88bba2d59b4c6bb63e_front.jpg', 1, 1, '2021-01-08 13:52:49', 0, 1),
(21, 149, '149d9e9a8d76254449f6f4b2f88bba2d59b4c6bb63e_back.jpg', 1, 2, '2021-01-08 13:52:49', 0, 1),
(22, 149, '149d4f986813b54e85b7a1be3e82c9e32d5933f59fe_front.jpg', 1, 1, '2021-01-08 13:53:46', 0, 1),
(23, 149, '149d4f986813b54e85b7a1be3e82c9e32d5933f59fe_back.jpg', 1, 2, '2021-01-08 13:53:46', 0, 1),
(24, 4, '4190351f13329f375a8d95401b634cb6b9bac0523_front.jpg', 1, 1, '2021-01-08 13:59:28', 0, 1),
(25, 4, '4190351f13329f375a8d95401b634cb6b9bac0523_back.jpg', 1, 2, '2021-01-08 13:59:28', 0, 1),
(26, 4, '467ac68a4149df80baa785badbf4c6066969e208f_front.jpg', 1, 1, '2021-01-08 13:59:33', 0, 1),
(27, 4, '467ac68a4149df80baa785badbf4c6066969e208f_back.jpg', 1, 2, '2021-01-08 13:59:33', 0, 1),
(28, 149, '14960f8b6415bf83241b038ff27684f45eea448f0f2_front.jpg', 1, 1, '2021-01-08 14:02:39', 0, 1),
(29, 149, '14960f8b6415bf83241b038ff27684f45eea448f0f2_back.jpg', 1, 2, '2021-01-08 14:02:39', 0, 1),
(30, 189, '189f38ad8cdd6c65b0202fe8556879ff1cff22c8d44_front.jpg', 1, 1, '2021-04-07 19:16:39', 0, 1),
(31, 189, '189f38ad8cdd6c65b0202fe8556879ff1cff22c8d44_back.jpg', 1, 2, '2021-04-07 19:16:39', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `AccountGeneral`
--

CREATE TABLE `AccountGeneral` (
  `ID` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  `DateDeleted` datetime NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Language` varchar(3) DEFAULT NULL,
  `Phone` varchar(100) NOT NULL,
  `Verified` int(1) NOT NULL,
  `Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountGeneral`
--

INSERT INTO `AccountGeneral` (`ID`, `DateCreated`, `DateModified`, `DateDeleted`, `Email`, `Language`, `Phone`, `Verified`, `Active`) VALUES
(1, '2020-05-17 00:00:00', '2020-05-17 00:00:00', '2020-05-17 00:00:00', 'test@rentxx.com', 'en', '34567890', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `AccountImages`
--

CREATE TABLE `AccountImages` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Filename` varchar(200) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `DateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountImages`
--

INSERT INTO `AccountImages` (`ID`, `ListingID`, `AccountID`, `Filename`, `Type`, `DateCreated`, `Active`) VALUES
(126, 2130, 36, '2130_ecb65509bc1dd4b850782ee4488125e011f66253.jpg', 1, '2020-11-30 11:09:43', NULL),
(127, 2130, 36, '2130_ecb65509bc1dd4b850782ee4488125e011f66253.jpg', 1, '2020-11-30 11:09:43', NULL),
(128, 2130, 36, '2130_ecb65509bc1dd4b850782ee4488125e011f66253.jpg', 1, '2020-11-30 11:09:43', NULL),
(129, 2130, 36, '2130_1ccfd040e59566da6f92c1100398838c5d7403eb.jpg', 1, '2020-11-30 11:09:47', 1),
(130, 2130, 36, '2130_663be2ed941a6b6a5e5530eb85bffe0f4d7a5bdf.jpg', 0, '2020-11-30 11:10:03', NULL),
(131, 2130, 36, '2130_30a8c741ee2c7473ce66efe4204dc85fee5b1dde.jpg', 0, '2020-11-30 11:10:42', 1),
(132, 2130, 36, '2130_7c7ceea23db9f1b69a37a633849b86b8de1132a8.jpg', 0, '2020-11-30 11:10:52', 1),
(133, 2130, 36, '2130_e8dfe12269b8cc6cb61a50b8ce48d879b4059bfc.jpg', 0, '2020-11-30 11:11:11', 1),
(134, 2130, 36, '2130_dd3092a03ef5950434d0f72789fcd07fd1a7c3f6.jpg', 0, '2020-11-30 11:11:17', 1),
(135, 2130, 36, '2130_a6dd3acf0493d99ed970d3974a58a56a1402be47.jpg', 0, '2020-11-30 11:11:27', 1),
(136, 2131, 36, '2131_c4cfd77c9270db357d64e3611323d9309b3c77bc.jpg', 1, '2020-11-30 11:49:22', 1),
(137, 2131, 36, '2131_186675accb2ecc83def9ae8a222d0c42c55e4e23.jpg', 0, '2020-11-30 11:49:25', 1),
(138, 2131, 36, '2131_71115c31640898c6d853f940b3d09fb58d9b6efd.jpg', 0, '2020-11-30 11:49:29', 1),
(139, 2131, 36, '2131_5ecd3fd6ab087c4a549088a129efcc58dbf4e29f.jpg', 0, '2020-11-30 11:49:34', 1),
(140, 2132, 4, '2132_cc571bf9cbe5c03e43d28cae5bff849208454089.jpg', 1, '2020-11-30 11:55:27', NULL),
(141, 2132, 4, '2132_c95a44ef3b94f8ba2435d09df84278ab61629cf9.jpg', 1, '2020-11-30 11:58:43', NULL),
(142, 2132, 4, '2132_317e5ade2b6385eddbbca1288722e42128f99b0c.jpg', 1, '2020-11-30 11:59:08', NULL),
(143, 2132, 4, '2132_deee2759885bae95f1549b8c0bb0459aa7c7494a.jpg', 1, '2020-11-30 11:59:28', NULL),
(144, 2133, 36, '2133_1495e5d767a94be740c4cbb33d872cb8c2d43807.jpg', 1, '2020-11-30 12:03:38', 1),
(145, 2133, 36, '2133_d0196d1204c2ccd38ba6e22ad0f7fdca34ec2da7.jpg', 0, '2020-11-30 12:03:43', 1),
(146, 2133, 36, '2133_74b1025f5597f811e3da1b7315958569cca69686.jpg', 0, '2020-11-30 12:03:48', 1),
(147, 2133, 36, '2133_e143ebfbec1d73d994099091bd0564abab311757.jpg', 0, '2020-11-30 12:03:53', 1),
(148, 2133, 36, '2133_d0ee603b7afc93de5126a5e31d01465fa294128b.jpg', 0, '2020-11-30 12:04:01', 1),
(149, 2133, 36, '2133_89f8f50c4f725b549da9b95cd2b1b777802b86f0.jpg', 0, '2020-11-30 12:04:17', 1),
(150, 2132, 4, '2132_b25a68a1f7fc12eac9a2719b0f6505778cbe0e13.jpg', 1, '2020-11-30 12:06:39', NULL),
(151, 2132, 4, '2132_c12e57ad602ddd75c6053fe16695cec823f9d403.jpg', 1, '2020-11-30 12:06:50', NULL),
(152, 2132, 4, '2132_7165908489f35666cdfb4f54ff67b363780ccf7f.jpg', 1, '2020-11-30 12:06:53', NULL),
(153, 2132, 4, '2132_9d88624ee90b635f70a2ffd215665cc27a245f95.jpg', 1, '2020-11-30 12:08:12', NULL),
(154, 2132, 4, '2132_5be2ea605265096ccf234226337b1fa6b5cc1ceb.jpg', 1, '2020-11-30 12:08:36', NULL),
(155, 2132, 4, '2132_7ffc2add06959c32bf9839c661646277a870c4a0.jpg', 1, '2020-11-30 12:09:14', NULL),
(156, 2132, 4, '2132_7ea18f6a54dbd5423af46d2508bc56bdd5828154.jpg', 1, '2020-11-30 12:09:22', NULL),
(157, 2132, 4, '2132_6a91f7054e128be509ce3dddbe1d6457dbf08590.jpg', 0, '2020-11-30 12:09:27', NULL),
(158, 2134, 36, '2134_73407d7cdf119b9b4484fddd5493e47f38848beb.jpg', 1, '2020-11-30 12:22:15', 1),
(159, 2134, 36, '2134_f29163c5afbdab3b77699589155d8063b58f66c5.jpg', 0, '2020-11-30 12:22:20', 1),
(160, 2134, 36, '2134_8bf5934aedbe80fd5954eec4565df0c7fb6f9c8b.jpg', 0, '2020-11-30 12:22:33', 1),
(161, 2134, 36, '2134_477c1418e04c0a481834a27ab3d798d4a867bc84.jpg', 0, '2020-11-30 12:22:40', 1),
(162, 2134, 36, '2134_0a41b636aad8e136d9f40f87773a34f9ccf3944c.jpg', 0, '2020-11-30 12:22:56', 1),
(163, 2134, 36, '2134_3e5c775c71d41e1565b679f3d5d4e5cc1e961037.jpg', 0, '2020-11-30 12:23:00', 1),
(164, 2134, 36, '2134_fcf96cd4d9bbff879d7d9090a36d6da266241e78.jpg', 0, '2020-11-30 12:23:04', 1),
(165, 2134, 36, '2134_b168d9468e3db0f4b54aceccd8f45c4e781dbe98.jpg', 0, '2020-11-30 12:23:08', 1),
(166, 2134, 36, '2134_4c30af4e43938ef73d5b0988ed97fc58130ec8b4.jpg', 0, '2020-11-30 12:23:12', 1),
(167, 2135, 36, '2135_c1b87a8d015fdc9da8a7ee63c508ba9451fc3fb2.jpg', 1, '2020-11-30 12:38:47', NULL),
(168, 2135, 36, '2135_c1b87a8d015fdc9da8a7ee63c508ba9451fc3fb2.jpg', 1, '2020-11-30 12:38:47', NULL),
(169, 2135, 36, '2135_c1b87a8d015fdc9da8a7ee63c508ba9451fc3fb2.jpg', 1, '2020-11-30 12:38:47', NULL),
(170, 2135, 36, '2135_c1b87a8d015fdc9da8a7ee63c508ba9451fc3fb2.jpg', 1, '2020-11-30 12:38:47', NULL),
(171, 2135, 36, '2135_c1b87a8d015fdc9da8a7ee63c508ba9451fc3fb2.jpg', 1, '2020-11-30 12:38:47', NULL),
(172, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(173, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(174, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(175, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(176, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(177, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 0, '2020-11-30 12:38:48', NULL),
(178, 2135, 36, '2135_22612c9ad573ec33165404cb2fd238cd902bdbb5.jpg', 1, '2020-11-30 12:38:49', NULL),
(179, 2135, 36, '2135_b2b3a32f99429b1246d4f1b6981b2f1fcbadfa1e.jpg', 0, '2020-11-30 12:38:49', NULL),
(180, 2135, 36, '2135_b2b3a32f99429b1246d4f1b6981b2f1fcbadfa1e.jpg', 0, '2020-11-30 12:38:49', NULL),
(181, 2135, 36, '2135_b2b3a32f99429b1246d4f1b6981b2f1fcbadfa1e.jpg', 1, '2020-11-30 12:38:49', NULL),
(182, 2135, 36, '2135_03d717974e04e166080eb0eaab3ba0f0c442204a.jpg', 1, '2020-11-30 12:38:50', NULL),
(183, 2135, 36, '2135_03d717974e04e166080eb0eaab3ba0f0c442204a.jpg', 0, '2020-11-30 12:38:51', NULL),
(184, 2135, 36, '2135_56d14924d0d9a9fb1293a434ba08adf9fb7ef0e1.jpg', 0, '2020-11-30 12:38:51', NULL),
(185, 2135, 36, '2135_56d14924d0d9a9fb1293a434ba08adf9fb7ef0e1.jpg', 0, '2020-11-30 12:38:51', NULL),
(186, 2135, 36, '2135_56d14924d0d9a9fb1293a434ba08adf9fb7ef0e1.jpg', 1, '2020-11-30 12:38:51', NULL),
(187, 2135, 36, '2135_9dfa601b8b01a62b095355ed112bc973f79a0374.jpg', 0, '2020-11-30 12:38:52', NULL),
(188, 2135, 36, '2135_9dfa601b8b01a62b095355ed112bc973f79a0374.jpg', 0, '2020-11-30 12:38:52', NULL),
(189, 2135, 36, '2135_9dfa601b8b01a62b095355ed112bc973f79a0374.jpg', 0, '2020-11-30 12:38:52', NULL),
(190, 2135, 36, '2135_9dfa601b8b01a62b095355ed112bc973f79a0374.jpg', 1, '2020-11-30 12:38:52', NULL),
(191, 2135, 36, '2135_7127f5761790fd84bfbf800ee1f21e74f90d6e90.jpg', 1, '2020-11-30 12:38:53', NULL),
(192, 2135, 36, '2135_652360f1fa3c78c6ce8887192839d98822b11bdd.jpg', 0, '2020-11-30 12:45:29', 1),
(193, 2135, 36, '2135_ddabd6598e80cb09d9364239a72aa48eb252fab8.jpg', 0, '2020-11-30 12:45:33', 1),
(194, 2135, 36, '2135_b43cebd0bcdbea73662a04a0d16d9136df5601c8.jpg', 0, '2020-11-30 12:45:39', 1),
(195, 2135, 36, '2135_88978d0b0954cc572ee7734c513bb32076206301.jpg', 0, '2020-11-30 12:45:44', 1),
(196, 2135, 36, '2135_38e245c25440a3cf0c52d973a08079ad9dc7d63b.jpg', 0, '2020-11-30 12:45:53', 1),
(197, 2135, 36, '2135_f86ce410830da3e9fab72ae3ab9d2439dbe1704e.jpg', 1, '2020-11-30 12:46:02', 1),
(198, 2135, 36, '2135_5dff08feca1a162364f1fbf96d73e1227e312fe5.jpg', 0, '2020-11-30 12:46:18', 1),
(199, 2135, 36, '2135_0d602bc587657e39f971041c16805336a9032425.jpg', 0, '2020-11-30 12:46:27', 1),
(200, 2135, 36, '2135_199196fe88b57cc3f3d0da90e0119dee53fbc94d.jpg', 0, '2020-11-30 12:46:37', 1),
(201, 2135, 36, '2135_d5031d9d72419b090a9f63e836c37a2c8428be74.jpg', 0, '2020-11-30 12:46:44', 1),
(202, 2135, 36, '2135_186957ee3ea2e57cbe795c572181632cb57df8bf.jpg', 0, '2020-11-30 12:46:57', 1),
(203, 2135, 36, '2135_ffbf902d48236e2f6eeb5ed06c01de8351e6fed7.jpg', 0, '2020-11-30 12:47:08', 1),
(204, 2135, 36, '2135_c355fbfe55dc39523b023bccdb1ef2cbfae4c1e4.jpg', 0, '2020-11-30 12:47:39', 1),
(205, 2137, 36, '2137_864603e1f62cfe5703e59282e4f476048439bf69.jpg', 1, '2020-11-30 13:04:31', 1),
(206, 2137, 36, '2137_0cf3298aba2f1988acc6b3b2cacde1d787a26fd0.jpg', 0, '2020-11-30 13:04:38', 1),
(207, 2137, 36, '2137_5f8c2a8b0a31c608bb225b1020cd8564341054dc.jpg', 0, '2020-11-30 13:04:42', 1),
(208, 2137, 36, '2137_504c939f7e2a2c99b96bc70f463bcaf644f2c83a.jpg', 0, '2020-11-30 13:04:47', 1),
(209, 2137, 36, '2137_99b6624f2459ed0d91a252b7cbd4373a3493bfc4.jpg', 0, '2020-11-30 13:04:51', 1),
(210, 2137, 36, '2137_6d030d862ca6ebbd15d3eee69407b9a87dfb2b77.jpg', 0, '2020-11-30 13:04:55', 1),
(211, 2137, 36, '2137_4375952c12a1914193e3afdee7a247463bf31e51.jpg', 0, '2020-11-30 13:05:01', 1),
(212, 2137, 36, '2137_1a6b64e1a40313f457a96729fba1fa770cdd901b.jpg', 0, '2020-11-30 13:05:05', 1),
(213, 2137, 36, '2137_c4b30ac5160e1f805fac1cd9fc28fa7605a330cd.jpg', 0, '2020-11-30 13:05:08', 1),
(214, 2137, 36, '2137_942e30f312da74b76f9facf4568288e75fc955e9.jpg', 0, '2020-11-30 13:05:51', 1),
(215, 2138, 36, '2138_6a389656edfeb8708ef5b2c03cdf4b8e100c8b6e.jpg', 1, '2020-11-30 13:18:35', 1),
(216, 2138, 36, '2138_2e5c10689ffe1071479ef31ce2ed99d1300831bb.jpg', 0, '2020-11-30 13:18:38', 1),
(217, 2138, 36, '2138_719ff6033e59561625f5f2df235a4e28b5538660.jpg', 0, '2020-11-30 13:18:42', 1),
(218, 2138, 36, '2138_ffbaeb74c44e8a960ce2f46367478d1841d339ad.jpg', 0, '2020-11-30 13:18:45', 1),
(219, 2138, 36, '2138_e1258806fb942e6c08c835af94de2c2f0d725dda.jpg', 0, '2020-11-30 13:18:50', 1),
(220, 2138, 36, '2138_88e1b025c2ee90a3f3afaf0d5d4e115b65c27885.jpg', 0, '2020-11-30 13:18:53', 1),
(221, 2138, 36, '2138_9e6807c2f8b247bf8d979ddf6ba4136051001675.jpg', 0, '2020-11-30 13:18:57', 1),
(222, 2138, 36, '2138_73a3d850e13ec002bdbe9d0f5420bd5f1c1d016d.jpg', 0, '2020-11-30 13:19:01', 1),
(223, 2138, 36, '2138_9b1b46cc83a93831b9f8ce6a8dff3c5be8af2aa8.jpg', 0, '2020-11-30 13:19:06', 1),
(224, 2138, 36, '2138_493859390a3c286e7e90526007b1f7f8963c5117.jpg', 0, '2020-11-30 13:19:10', 1),
(225, 2138, 36, '2138_079ef5cb3fef0a3ec8bb70ac7379083d33cc3f05.jpg', 0, '2020-11-30 13:19:14', 1),
(226, 2139, 36, '2139_89d3eab96dac4d1367e478dd14ab602e48219f26.jpg', 1, '2020-11-30 13:30:15', 1),
(227, 2139, 36, '2139_beee21d5fdcc784655c10ceaa5487bb94b0e9f04.jpg', 0, '2020-11-30 13:30:19', 1),
(228, 2139, 36, '2139_81776617473683a0e96955dcdb01c4aa38e9f67c.jpg', 0, '2020-11-30 13:30:23', 1),
(229, 2139, 36, '2139_b51ea6a435d25a8c467c1fdcf7d42045464280fe.jpg', 0, '2020-11-30 13:30:27', 1),
(230, 2139, 36, '2139_fad3d387a5cef1aa1c60ce31c1f77874b26134dc.jpg', 0, '2020-11-30 13:30:30', 1),
(231, 2145, 118, '2145_7c57fccd192c255e188b63bfd322eac778ba2172.jpg', NULL, '2020-12-14 10:25:58', 1),
(232, 2146, 118, '2146_dbe3ac621e7a5f2502456a3452dca8a1c9b3b900.jpg', 1, '2020-12-14 11:05:14', 1),
(233, 2145, 118, '2145_712352b00864fc269571c13ecf9b14dd615ca847.jpg', 1, '2020-12-15 10:35:52', 1),
(234, 2132, 4, '2132_1e2aed8e9cbc22eba692a4e346e6a33db6953489.jpg', 1, '2020-12-16 08:29:20', NULL),
(235, 2132, 4, '2132_75a1ecc2a2120210c76b99ff99d288bfa521d44c.jpg', 1, '2020-12-16 08:44:27', 1),
(236, 2132, 4, '2132_2d7d02a77decc513f44451f35d770fb734f3b597.jpg', 0, '2020-12-16 08:44:51', NULL),
(237, 2132, 4, '2132_4d0a82c9c96a44d129d340cacb3bc8fe9290dd53.jpg', 0, '2020-12-16 08:49:11', NULL),
(238, 2143, 4, '2143_8588f0f86249cf6d92f81683ac7acddf77673a90.jpg', 1, '2020-12-16 14:03:04', 1),
(239, 2151, 118, '2151_dc79cb0037f52e76954c9ac0b8bd1a50c1b1f395.jpg', 1, '2020-12-25 18:34:44', 1),
(240, 2140, 4, '2140_6e058f3e2adc3202a0c437fa0142ecc811d9628f.jpg', 1, '2020-12-28 11:53:08', 1),
(241, 2153, 4, '2153_9086196ac067caaffb5ae7d67ab543635040f8cd.jpg', 1, '2020-12-29 21:00:57', 1),
(242, 2153, 4, '2153_bbca26b1c2ab8ff900042e880822f74042f76cae.jpg', 0, '2020-12-29 21:01:43', 1),
(243, 2153, 4, '2153_016afb0ada49ef3135ee11b3270a0f03150f6e05.jpg', 0, '2020-12-29 21:26:56', 1),
(244, 2142, 4, '2142_fe52c5d1b3158add684453e68d89821c9ef05a65.jpg', 1, '2021-01-03 16:10:03', 1),
(245, 2131, 36, '2131_5ecd3fd6ab087c4a549088a129efcc58dbf4e29f.jpg', 0, '2021-01-06 14:36:17', 1),
(246, 2154, 149, '2154_b9d2d536a68bb33313659bfa2884697031cf7e15.jpg', 0, '2021-01-08 13:46:46', 1),
(247, 2154, 149, '2154_491249356336ae863f1a3cfb6d88ca13c4913021.jpg', 1, '2021-01-08 13:46:51', 1),
(248, 2154, 149, '2154_aab98ead7594a7f3de959d22043847fe3e90c90f.jpg', 0, '2021-01-08 13:47:04', 1),
(249, 2156, 159, '2156_c8515a3bae715c0424a2713c751c4d7ff5791b53.jpg', 0, '2021-01-10 18:17:49', 0),
(250, 2156, 159, '2156_c8515a3bae715c0424a2713c751c4d7ff5791b53.jpg', 0, '2021-01-10 18:17:49', 0),
(251, 2156, 159, '2156_42831a05e8e81beb26d52b350492302aed3f81de.jpg', 0, '2021-01-10 18:17:50', 1),
(252, 2156, 159, '2156_42831a05e8e81beb26d52b350492302aed3f81de.jpg', 0, '2021-01-10 18:17:50', 0),
(253, 2156, 159, '2156_42831a05e8e81beb26d52b350492302aed3f81de.jpg', 0, '2021-01-10 18:17:50', 0),
(254, 2156, 159, '2156_42831a05e8e81beb26d52b350492302aed3f81de.jpg', 0, '2021-01-10 18:17:50', 0),
(255, 2156, 159, '2156_8f5aeec1579b8dfcaf838b05ca731aaf55226fea.jpg', 0, '2021-01-10 18:17:51', 1),
(256, 2156, 159, '2156_8f5aeec1579b8dfcaf838b05ca731aaf55226fea.jpg', 0, '2021-01-10 18:17:51', 0),
(257, 2156, 159, '2156_8f5aeec1579b8dfcaf838b05ca731aaf55226fea.jpg', 0, '2021-01-10 18:17:51', 0),
(258, 2156, 159, '2156_b10372e530e951baf92e89797feaa8a337bedc5c.jpg', 0, '2021-01-10 18:17:52', 1),
(259, 2156, 159, '2156_b10372e530e951baf92e89797feaa8a337bedc5c.jpg', 0, '2021-01-10 18:17:52', 0),
(260, 2156, 159, '2156_b10372e530e951baf92e89797feaa8a337bedc5c.jpg', 0, '2021-01-10 18:17:52', 0),
(261, 2156, 159, '2156_4ce0be1da2d6f94689407444b3a67f07321bda57.jpg', 0, '2021-01-10 18:17:53', 1),
(262, 2156, 159, '2156_4ce0be1da2d6f94689407444b3a67f07321bda57.jpg', 0, '2021-01-10 18:17:53', 0),
(263, 2156, 159, '2156_4ce0be1da2d6f94689407444b3a67f07321bda57.jpg', 0, '2021-01-10 18:17:53', 0),
(264, 2156, 159, '2156_4ce0be1da2d6f94689407444b3a67f07321bda57.jpg', 0, '2021-01-10 18:17:53', 0),
(265, 2156, 159, '2156_4ce0be1da2d6f94689407444b3a67f07321bda57.jpg', 0, '2021-01-10 18:17:53', 0),
(266, 2156, 159, '2156_bf527ec9e63f8b55f5819fc0d03e6a9b823bb723.jpg', 1, '2021-01-10 18:17:54', 1),
(267, 2156, 159, '2156_bf527ec9e63f8b55f5819fc0d03e6a9b823bb723.jpg', 0, '2021-01-10 18:17:54', 0),
(268, 2156, 159, '2156_bf527ec9e63f8b55f5819fc0d03e6a9b823bb723.jpg', 0, '2021-01-10 18:17:54', 0),
(269, 2156, 159, '2156_bf527ec9e63f8b55f5819fc0d03e6a9b823bb723.jpg', 0, '2021-01-10 18:17:54', 0),
(270, 2156, 159, '2156_bf527ec9e63f8b55f5819fc0d03e6a9b823bb723.jpg', 0, '2021-01-10 18:17:54', 0),
(271, 2156, 159, '2156_ed06d589e7f8bbae1337a2ad640bd2e8c766616a.jpg', 0, '2021-01-10 18:17:55', 0),
(273, 2158, 162, '2158_638585da600441d840665dbe7a63bab199cc0529.jpg', 1, '2021-01-11 22:34:46', 1),
(274, 2158, 162, '2158_606053da069aa74c7b695c5394b33dc129914f60.jpg', 0, '2021-01-11 22:34:51', 1),
(275, 2158, 162, '2158_9b0e8989844b1ede4d6734801b299bcff73a391e.jpg', 0, '2021-01-11 22:34:55', 1),
(276, 2158, 162, '2158_757d5ef7a95c884e7de03d8898b3a70c83229686.jpg', 0, '2021-01-11 22:35:00', 1),
(277, 2158, 162, '2158_0308c020cb9cc4e49a6c847e3f5c1a4f210ca184.jpg', 0, '2021-01-11 22:35:05', 1),
(278, 2158, 162, '2158_fe9bd30a25df422fbaae77f21a0480ef081807ca.jpg', 0, '2021-01-11 22:35:12', 1),
(279, 2158, 162, '2158_e53359ecd11d172787f2474863e7e22ece8a3035.jpg', 0, '2021-01-11 22:35:22', 1),
(280, 2158, 162, '2158_7418e314405be6a2203be5be58b97f51ff40cf26.jpg', 0, '2021-01-11 22:35:27', 1),
(281, 2158, 162, '2158_1b03d936da8b20d547a476a52457da889d07f6ef.jpg', 0, '2021-01-11 22:35:32', 1),
(282, 2158, 162, '2158_7dfd329f8e082e4c6a51d98639a50a3d8f350f91.jpg', 0, '2021-01-11 22:35:50', 1),
(283, 2158, 162, '2158_0044557136ea0d7897600e2f4ce79dbab7575a66.jpg', 0, '2021-01-11 22:35:57', 1),
(284, 2158, 162, '2158_3b834dfaacea6faabeb8b5ab841c0d82aaec9fc9.jpg', 0, '2021-01-11 22:36:06', 1),
(285, 2158, 162, '2158_0fae8869a0f0b26f2e0ec1f99883c52a8ecb21e4.jpg', 0, '2021-01-11 22:36:22', 1),
(286, 2161, 175, '2161_16a4176ca9215cec08d119b18ad1f950f6c585d7.jpg', 1, '2021-01-14 12:56:05', 1),
(287, 2161, 175, '2161_16a4176ca9215cec08d119b18ad1f950f6c585d7.jpg', 0, '2021-01-14 12:56:05', 1),
(288, 2161, 175, '2161_754aa75e42ed285054a11f50b108bb3ef67047d3.jpg', 0, '2021-01-14 12:56:07', 1),
(289, 2161, 175, '2161_e89e1a9021634d8ca57e85a748fba85a498725b6.jpg', 0, '2021-01-14 12:56:10', 1),
(290, 2161, 175, '2161_3ddd51b74e06e3f3c5bcbcf7c3621aa55ebc14af.jpg', 0, '2021-01-14 12:56:11', 1),
(291, 2161, 175, '2161_80b2ff3d6bdd1d688fd6d6a3e2c1b0598f10db87.jpg', 0, '2021-01-14 12:56:12', 1),
(292, 2161, 175, '2161_3b33dd11ef8765769b3dcb44e17ec0b5d4f0a49a.jpg', 0, '2021-01-14 12:56:14', 1),
(293, 2161, 175, '2161_16a87a7ffc3953858a99452acf1c739410f83275.jpg', 0, '2021-01-14 12:56:16', 1),
(294, 2161, 175, '2161_d952d71b2287951fa6da82fcf0049f36b22dd12d.jpg', 0, '2021-01-14 12:56:17', 1),
(295, 2161, 175, '2161_7c97ece162f73496c0e79cc2dfd51aa41a43b243.jpg', 0, '2021-01-14 12:56:19', 1),
(296, 2161, 175, '2161_800666cc3d481698fbb59dc53b4268d5696097cf.jpg', 0, '2021-01-14 12:56:19', 1),
(297, 2161, 175, '2161_049231f4018033bc807042484815a348c143d289.jpg', 0, '2021-01-14 12:56:21', 1),
(298, 2161, 175, '2161_0eca7b93ad4a6de20811d1661b6e559dc5c8815a.jpg', 0, '2021-01-14 12:56:22', 1),
(299, 2161, 175, '2161_955d24ef41802eff5c9388308a5fcba52e0a44a4.jpg', 0, '2021-01-14 12:56:28', 1),
(300, 2161, 175, '2161_e5dd2d5b25642ba20c1adb998650e7af093bf856.jpg', 0, '2021-01-14 12:56:31', 1),
(301, 2161, 175, '2161_6011d7f330cad30ba7db634afe765e3191b1b45a.jpg', 0, '2021-01-14 12:56:32', 1),
(302, 2161, 175, '2161_c6bb88b7998e800c4f3c89286d6459cbe5544b9f.jpg', 0, '2021-01-14 12:56:33', 1),
(303, 2161, 175, '2161_77b316677bcfb580251c112585b9cc3ef9b6e743.jpg', 0, '2021-01-14 12:56:35', 1),
(304, 2161, 175, '2161_c9fe6a729339fd606753e8071ee31e61fb78ea85.jpg', 0, '2021-01-14 12:56:36', 1),
(305, 2161, 175, '2161_c8ca1fcf615c5395f3ced0ee0f4f3fc54491e31c.jpg', 0, '2021-01-14 12:56:38', 1),
(306, 2161, 175, '2161_77c81a2a178d6d40da075e459bbcd18ca168ad29.jpg', 0, '2021-01-14 12:56:39', 1),
(307, 2161, 175, '2161_ce7f2a3c91e9659c694919f3eb173000226a74d8.jpg', 0, '2021-01-14 12:56:40', 1),
(308, 2166, 183, '2166_22edf0537aa9304d9cd388526faf2d227b7766cf.jpg', 1, '2021-01-23 15:00:05', 1),
(309, 2166, 183, '2166_972517c0a93bf142b20421398f3a180ca365dddb.jpg', 0, '2021-01-23 15:01:11', 1),
(310, 2166, 183, '2166_2e8ab0a14e5ee6fe31ad5235ede79bb979df1f7a.jpg', 0, '2021-01-23 15:02:06', 0),
(311, 2166, 183, '2166_1b95d6c30cb6f2aa3301861a78109d5a8e9dedc4.jpg', 0, '2021-01-23 15:03:21', 1),
(312, 2166, 183, '2166_19a73080a4137cdfdbd59e459a03d8685a2c400f.jpg', 0, '2021-01-23 15:04:14', 1),
(313, 2166, 183, '2166_39e9d2b44d78d3bb1334fcaf328f6e6404fd9ec0.jpg', 0, '2021-01-23 15:04:45', 1),
(314, 2169, 178, '2169_7fa0b8555eca53b6966f8402dae175deca34c140.jpg', 1, '2021-04-29 07:02:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `AccountingAccounts`
--

CREATE TABLE `AccountingAccounts` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Number` bigint(20) DEFAULT NULL,
  `CCY` int(2) DEFAULT NULL,
  `HolderName` varchar(100) DEFAULT NULL,
  `HolderAddress` varchar(100) DEFAULT NULL,
  `DateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DefaultAccount` int(11) DEFAULT '0',
  `VerificationCode` int(7) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountingAccounts`
--

INSERT INTO `AccountingAccounts` (`ID`, `AccountID`, `Number`, `CCY`, `HolderName`, `HolderAddress`, `DateCreated`, `DefaultAccount`, `VerificationCode`, `Active`) VALUES
(1, 4, 4242000022223938, 2, 'Alex Marx', '77 Rue de Arlon', '2020-12-20 15:03:22', 0, NULL, 1),
(2, 4, 6644223344440002, 1, 'Mister Testo', 'Test street 232 Alabama square', '2020-12-20 15:07:45', 1, NULL, 1),
(17, 4, 1111111111111111, 1, '123123', '123123', '2020-12-21 14:44:43', 0, NULL, 0),
(18, 4, 1111111111111111, 4, 'test test', 'test', '2020-12-22 08:38:13', 0, NULL, 1),
(19, 4, 4444222211119293, 3, 'Alex Testo', '238 Eleven street', '2020-12-24 22:51:25', 0, 437900, 0),
(20, 4, 1231123123123123, 2, 'aios ioii', '', '2021-01-05 13:50:49', 0, 330789, 0),
(21, 4, 1231231231232131, 2, '', '', '2021-01-05 13:52:27', 0, 816124, 0),
(22, 4, 12313212331231, 2, '12312312', '123123', '2021-01-05 13:54:10', 0, 928370, 0),
(23, 4, 5435435435345345, 1, '23423v 23', '24234', '2021-01-05 13:54:32', 0, 669782, 0),
(24, 4, 12, 1, '', '', '2021-01-06 08:58:35', 0, 276956, 0),
(25, 178, 7777777777777777, 2, 'Jessica Ginger', 'Monaco', '2021-01-15 14:06:46', 0, 579807, 0),
(26, 178, 1111111111111111, 2, 'Jessica Ginger', 'Monaco', '2021-01-15 14:11:20', 1, NULL, 1),
(27, 178, 2132353474565697, 1, 'Alex Lexa', 'Zdes', '2021-01-15 14:12:56', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `AccountingCashFlow`
--

CREATE TABLE `AccountingCashFlow` (
  `ID` int(11) NOT NULL,
  `Account` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AccountingInvoices`
--

CREATE TABLE `AccountingInvoices` (
  `ID` int(11) NOT NULL,
  `IssuedTo` int(11) DEFAULT NULL,
  `IssuedBy` int(11) DEFAULT NULL,
  `AmountDue` decimal(10,2) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `Description` text,
  `Status` int(11) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountingInvoices`
--

INSERT INTO `AccountingInvoices` (`ID`, `IssuedTo`, `IssuedBy`, `AmountDue`, `Currency`, `Description`, `Status`, `Active`) VALUES
(1, 3, 4, '144.20', 1, 'Service fee ', 1, 1),
(2, 4, 2, '728.10', 1, NULL, 1, 1),
(3, 2, 5, '217.50', 1, NULL, 2, 1),
(4, 5, 4, '140.00', 4, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `AccountingTransactions`
--

CREATE TABLE `AccountingTransactions` (
  `ID` int(11) NOT NULL,
  `PaymentSID` varchar(200) DEFAULT NULL,
  `InitiatorID` int(11) DEFAULT NULL,
  `ReceiverID` int(11) DEFAULT NULL,
  `Card` int(11) DEFAULT NULL,
  `Datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` text,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Currency` int(11) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `InvoiceID` int(11) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `PaymentMethod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountingTransactions`
--

INSERT INTO `AccountingTransactions` (`ID`, `PaymentSID`, `InitiatorID`, `ReceiverID`, `Card`, `Datestamp`, `Description`, `Amount`, `Currency`, `Status`, `InvoiceID`, `Type`, `PaymentMethod`) VALUES
(1, NULL, 4, NULL, 2180, '2020-10-09 17:56:37', 'Service fee', '120.00', 1, 1, 1, NULL, NULL),
(2, NULL, 4, NULL, 2323, '2020-10-23 21:46:57', NULL, NULL, 1, 3, 2, NULL, NULL),
(3, NULL, 4, NULL, 4444, '2020-10-24 13:14:22', NULL, NULL, 1, 4, 4, NULL, NULL),
(4, NULL, 4, NULL, 5555, '2020-10-24 13:26:13', 'Taxes (14%)', '18.00', 1, 1, 1, NULL, NULL),
(5, '213sdawqw12', 1, 2, NULL, '2020-12-02 08:48:31', NULL, '3.00', 1, 0, NULL, NULL, NULL),
(6, 'pi_00000000000000', 1, 2, NULL, '2020-12-02 08:49:23', NULL, '3.00', 1, 1, NULL, NULL, NULL),
(7, 'pi_1Htr2sCx5nZ05JdXgmydbTX7', 80, 2, NULL, '2020-12-02 08:50:42', NULL, '3.00', 1, 0, NULL, NULL, NULL),
(8, 'pi_1Htr4JCx5nZ05JdXPaU91S3B', 82, 2, NULL, '2020-12-02 08:52:11', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(9, 'pi_1Htr9VCx5nZ05JdXOS5KKkd8', 85, 36, NULL, '2020-12-02 08:57:33', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(10, 'pi_1HtrBoCx5nZ05JdX6ojfTTfn', 87, 36, NULL, '2020-12-02 08:59:56', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(11, 'pi_1HtsLuCx5nZ05JdXphTc4urF', 88, 36, NULL, '2020-12-02 10:14:26', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(12, 'pi_1HtsNhCx5nZ05JdX1SrumIeU', 89, 36, NULL, '2020-12-02 10:16:17', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(13, 'pi_1HtsSACx5nZ05JdXVauOFarc', 90, 36, NULL, '2020-12-02 10:20:54', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(14, 'pi_1HtsqeCx5nZ05JdX0fix3AhE', 91, 36, NULL, '2020-12-02 10:46:12', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(15, 'pi_1Htsx0Cx5nZ05JdXSWHOmxwW', 92, 36, NULL, '2020-12-02 10:52:46', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(16, 'pi_1HtuB9Cx5nZ05JdXobc5vtgy', 93, 36, NULL, '2020-12-02 12:11:28', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(17, 'pi_1HtuFvCx5nZ05JdXHeHHFGyM', 94, 36, NULL, '2020-12-02 12:16:23', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(18, 'pi_1HtuKmCx5nZ05JdXI2tEAeAk', 95, 36, NULL, '2020-12-02 12:21:24', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(19, 'pi_1HtuNQCx5nZ05JdXPxh3YdNe', 96, 36, NULL, '2020-12-02 12:24:08', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(20, 'pi_1Htuh0Cx5nZ05JdXXtYH4yjU', 97, 36, NULL, '2020-12-02 12:44:23', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(21, 'pi_1Htul6Cx5nZ05JdX3dhrPkGs', 0, 36, NULL, '2020-12-02 12:48:36', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(22, 'pi_1HtuxvCx5nZ05JdXp4DeAjE6', 0, 36, NULL, '2020-12-02 13:01:51', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(23, 'pi_1HtvC7Cx5nZ05JdXbdUh8R0A', 0, 36, NULL, '2020-12-02 13:16:31', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(24, 'pi_1HtvCLCx5nZ05JdX3pdABVwJ', 0, 36, NULL, '2020-12-02 13:16:45', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(25, 'pi_1HtvCQCx5nZ05JdX7dOaxUrb', 0, 36, NULL, '2020-12-02 13:16:50', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(26, 'pi_1HtvCTCx5nZ05JdXajXHTHIR', 0, 36, NULL, '2020-12-02 13:16:53', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(27, 'pi_1HtvCsCx5nZ05JdX29GA3bcc', 0, 36, NULL, '2020-12-02 13:17:19', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(28, 'pi_1HtvDCCx5nZ05JdX6OHd08rm', 0, 36, NULL, '2020-12-02 13:17:38', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(29, 'pi_1HtvDKCx5nZ05JdX0oVK9j5V', 0, 36, NULL, '2020-12-02 13:17:47', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(30, 'pi_1HtvKMCx5nZ05JdXmSOp398a', 0, 36, NULL, '2020-12-02 13:25:02', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(31, 'pi_1HtvLiCx5nZ05JdX26580d7i', 0, 36, NULL, '2020-12-02 13:26:26', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(32, 'pi_1HtvLkCx5nZ05JdXuzB3knZU', 0, 36, NULL, '2020-12-02 13:26:28', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(33, 'pi_1HtvLvCx5nZ05JdX3NBR0OUg', 0, 36, NULL, '2020-12-02 13:26:39', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(34, 'pi_1HtvN6Cx5nZ05JdXvF9TSp75', 0, 36, NULL, '2020-12-02 13:27:53', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(35, 'pi_1HtvNMCx5nZ05JdXOdH8ePLd', 0, 36, NULL, '2020-12-02 13:28:08', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(36, 'pi_1HtvPJCx5nZ05JdXz3mbc91T', 76, 36, NULL, '2020-12-02 13:30:09', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(37, 'pi_1HtvQNCx5nZ05JdXTX7I5SC7', 77, 36, NULL, '2020-12-02 13:31:16', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(38, 'pi_1HtvRACx5nZ05JdXxtMxad5M', 78, 36, NULL, '2020-12-02 13:32:05', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(39, 'pi_1HtvVKCx5nZ05JdX4ZWCqQyW', 79, 36, NULL, '2020-12-02 13:36:22', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(40, 'pi_1HtvWeCx5nZ05JdX5WNuyCZ1', 80, 36, NULL, '2020-12-02 13:37:44', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(41, 'pi_1HtvaZCx5nZ05JdX6ACDZH5c', 81, 36, NULL, '2020-12-02 13:41:47', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(42, 'pi_1HtvmlCx5nZ05JdXNJoZyJ9Y', 82, 36, NULL, '2020-12-02 13:54:23', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(43, 'pi_1HuAZCCx5nZ05JdXZLIOhFFn', 83, 36, NULL, '2020-12-03 05:41:23', NULL, '5400.00', 1, 1, NULL, NULL, NULL),
(44, 'pi_1HuAkeCx5nZ05JdX8ekxNosw', 84, 36, NULL, '2020-12-03 05:53:13', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(45, 'pi_1HuBJZCx5nZ05JdXDLwIktpz', 85, 36, NULL, '2020-12-03 06:29:17', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(46, 'pi_1HuBLvCx5nZ05JdXKh1Oa144', 86, 36, NULL, '2020-12-03 06:31:43', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(47, 'pi_1HuBOYCx5nZ05JdXRdSbSAwz', 87, 36, NULL, '2020-12-03 06:34:26', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(48, 'pi_1HuBOkCx5nZ05JdXA3COnuYT', 88, 36, NULL, '2020-12-03 06:34:38', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(49, 'pi_1HuBQfCx5nZ05JdXjRNi2ykt', 89, 36, NULL, '2020-12-03 06:36:37', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(50, 'pi_1HuBTuCx5nZ05JdXEegcQlch', 90, 36, NULL, '2020-12-03 06:39:58', NULL, '5400.00', 1, 0, NULL, NULL, NULL),
(51, 'pi_1HuBqLCx5nZ05JdXD63OWuIz', 91, 36, NULL, '2020-12-03 07:03:10', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(52, 'pi_1HuBsFCx5nZ05JdX1uEisbzN', 92, 36, NULL, '2020-12-03 07:05:07', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(53, 'pi_1HuBsGCx5nZ05JdXuVLeJEZo', 93, 36, NULL, '2020-12-03 07:05:08', NULL, '4300.00', 1, 0, NULL, NULL, NULL),
(54, 'pi_1HuBxPCx5nZ05JdXClKenDur', 94, 36, NULL, '2020-12-03 07:10:27', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(55, 'pi_1HuCF8Cx5nZ05JdXKiMdtVGB', 95, 36, NULL, '2020-12-03 07:28:46', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(56, 'pi_1HuGl1Cx5nZ05JdXtbm657Sq', 96, 36, NULL, '2020-12-03 12:17:59', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(57, 'pi_1HuGqHCx5nZ05JdXWSHB17NY', 1, 36, NULL, '2020-12-03 12:23:25', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(58, 'pi_1HuHCwCx5nZ05JdXDYVKwZUf', 35, 36, NULL, '2020-12-03 12:46:50', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(59, 'pi_1HuHDKCx5nZ05JdXLWIWQTO2', 35, 36, NULL, '2020-12-03 12:47:14', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(60, 'pi_1HuHDLCx5nZ05JdXDSurHbMX', 35, 36, NULL, '2020-12-03 12:47:15', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(61, 'pi_1HuHDOCx5nZ05JdXlTJA5Mmc', 35, 36, NULL, '2020-12-03 12:47:18', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(62, 'pi_1HuHDbCx5nZ05JdX3Irlv2Eo', 35, 36, NULL, '2020-12-03 12:47:31', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(63, 'pi_1HuHJxCx5nZ05JdXzp0FgODz', 97, 36, NULL, '2020-12-03 12:54:05', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(64, 'pi_1HuWgQCx5nZ05JdX3rfUTEt8', 35, 36, NULL, '2020-12-04 05:18:19', NULL, '10800.00', 1, 0, NULL, NULL, NULL),
(65, 'pi_1HuWibCx5nZ05JdXc8Up5jwv', 35, 36, NULL, '2020-12-04 05:20:33', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(66, 'pi_1HuXKoCx5nZ05JdXfR2sPNwk', 35, 36, NULL, '2020-12-04 06:00:03', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(67, 'pi_1HuXbOCx5nZ05JdXuvoK46Il', 35, 36, NULL, '2020-12-04 06:17:11', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(68, 'pi_1HuXkRCx5nZ05JdXFYW6n9vq', 35, 36, NULL, '2020-12-04 06:26:31', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(69, 'pi_1HuXlvCx5nZ05JdXDB466AB7', 35, 36, NULL, '2020-12-04 06:28:03', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(70, 'pi_1HuYOTCx5nZ05JdXSnKiiaSu', 35, 36, NULL, '2020-12-04 07:07:53', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(71, 'pi_1HuYUvCx5nZ05JdXB6kgPnMy', 35, 36, NULL, '2020-12-04 07:14:33', NULL, '10800.00', 1, 1, NULL, NULL, NULL),
(72, 'pi_1HuYgJCx5nZ05JdXOSkAYkcy', 777, 36, NULL, '2020-12-04 07:26:19', NULL, '50.00', 1, 1, NULL, NULL, NULL),
(73, 'pi_1HwsxcCx5nZ05JdXIHVVpUkW', 4, 1, NULL, '2020-12-10 17:29:48', NULL, '100.00', 1, 1, NULL, NULL, NULL),
(74, 'pi_1HzkCXCx5nZ05JdXKRGlZlkq', 4, 36, NULL, '2020-12-18 14:45:01', NULL, '38000.00', 1, 0, 2, NULL, NULL),
(75, '0', 0, 4, 0, '2020-12-24 09:52:52', '0', '123.00', 1, 1, NULL, 3, 1),
(76, '0', 0, 4, 0, '2020-12-24 11:45:22', '0', '123123.00', 1, 1, NULL, 3, 1),
(77, '0', 0, 4, 0, '2020-12-24 11:45:32', '0', '1.00', 1, 1, NULL, 3, 1),
(78, 'pi_1I2IWDCx5nZ05JdXDF1YVS2n', 4, 36, NULL, '2020-12-25 15:47:53', NULL, '42000.00', 1, 0, NULL, NULL, NULL),
(79, 'pi_1I2IWFCx5nZ05JdX3yXBvWiZ', 4, 36, NULL, '2020-12-25 15:47:55', NULL, '42000.00', 1, 1, NULL, NULL, NULL),
(80, 'pi_1I3KApCx5nZ05JdX9zjanCPx', 4, 36, NULL, '2020-12-28 11:46:03', NULL, '151200.00', 1, 1, NULL, NULL, NULL),
(81, 'pi_1I3rsRCx5nZ05JdXcOrQfC5l', 122, 36, NULL, '2020-12-29 23:45:19', NULL, '19000.00', 1, 0, NULL, NULL, NULL),
(82, 'pi_1I3rsYCx5nZ05JdXaOk3infL', 123, 36, NULL, '2020-12-29 23:45:26', NULL, '19000.00', 1, 0, NULL, NULL, NULL),
(83, 'pi_1I3s38Cx5nZ05JdXA7R435rv', 121, 36, NULL, '2020-12-29 23:56:22', NULL, '19000.00', 1, 0, NULL, NULL, NULL),
(84, 'pi_1I3s7aCx5nZ05JdXNyIYfgkv', 121, 36, NULL, '2020-12-30 00:00:58', NULL, '19000.00', 1, 0, NULL, NULL, NULL),
(85, 'pi_1I3s8RCx5nZ05JdXBOavMznU', 121, 36, NULL, '2020-12-30 00:01:52', NULL, '19000.00', 1, 1, NULL, NULL, NULL),
(86, '0', 121, 36, NULL, '2020-12-30 00:06:01', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(87, '0', 121, 36, NULL, '2020-12-30 00:09:03', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(88, '0', 121, 36, NULL, '2020-12-30 00:13:21', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(89, '0', 121, 36, NULL, '2020-12-30 00:14:12', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(90, '0', 121, 36, NULL, '2020-12-30 00:22:04', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(91, '0', 121, 36, NULL, '2020-12-30 00:23:27', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(92, 'pi_1I3sTVCx5nZ05JdXYNuKIZZF', 121, 36, NULL, '2020-12-30 00:23:38', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(93, 'pi_1I3sVACx5nZ05JdXXU348o6l', 121, 36, NULL, '2020-12-30 00:25:20', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(94, '0', 4, 36, NULL, '2020-12-30 00:35:04', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(95, '0', 4, 36, NULL, '2020-12-30 00:36:36', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(96, '0', 4, 36, NULL, '2020-12-30 00:36:40', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(97, '0', 4, 36, NULL, '2020-12-30 00:37:30', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(98, '0', 4, 36, NULL, '2020-12-30 00:40:19', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(99, '0', 4, 36, NULL, '2020-12-30 00:41:30', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(100, '', 126, 36, NULL, '2020-12-30 00:58:39', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(101, '0', 127, 36, NULL, '2020-12-30 00:59:40', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(102, '0', 128, 36, NULL, '2020-12-30 00:59:45', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(103, '0', 129, 36, NULL, '2020-12-30 01:03:56', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(104, '0', 130, 36, NULL, '2020-12-30 01:05:09', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(105, '0', 131, 36, NULL, '2020-12-30 01:05:16', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(106, '0', 121, 36, NULL, '2020-12-30 01:08:22', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(107, '0', 121, 36, NULL, '2020-12-30 01:13:23', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(108, '0', 132, 36, NULL, '2020-12-30 13:38:13', NULL, '288.00', 1, 0, NULL, NULL, NULL),
(109, '0', 4, 4, NULL, '2021-01-04 17:42:54', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(110, '0', 134, 4, NULL, '2021-01-04 18:11:45', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(111, '0', 135, 4, NULL, '2021-01-04 18:26:00', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(112, '0', 136, 4, NULL, '2021-01-04 18:26:13', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(113, '0', 137, 4, NULL, '2021-01-04 18:26:51', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(114, '0', 138, 4, NULL, '2021-01-04 18:27:45', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(115, '0', 139, 4, NULL, '2021-01-04 18:27:53', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(116, '0', 140, 4, NULL, '2021-01-04 18:28:36', NULL, '90.00', 1, 0, NULL, NULL, NULL),
(117, '0', 141, 36, NULL, '2021-01-05 08:13:32', NULL, '380.00', 1, 0, NULL, NULL, NULL),
(118, '0', 142, 36, NULL, '2021-01-05 08:26:01', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(119, '0', 143, 36, NULL, '2021-01-05 08:27:59', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(120, '0', 144, 36, NULL, '2021-01-05 08:29:18', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(121, '0', 145, 36, NULL, '2021-01-05 09:32:34', NULL, '54.00', 1, 0, NULL, NULL, NULL),
(122, '0', 146, 36, NULL, '2021-01-05 09:33:25', NULL, '54.00', 1, 0, NULL, NULL, NULL),
(123, '0', 147, 36, NULL, '2021-01-05 09:37:35', NULL, '54.00', 1, 0, NULL, NULL, NULL),
(124, '0', 147, 36, NULL, '2021-01-05 13:36:58', NULL, '58.00', 1, 0, NULL, NULL, NULL),
(125, '0', 147, 36, NULL, '2021-01-05 13:38:02', NULL, '58.00', 1, 0, NULL, NULL, NULL),
(126, '0', 0, 4, 0, '2021-01-05 13:55:02', '0', '123123.00', 1, 1, NULL, 3, 1),
(127, '0', 0, 4, 0, '2021-01-05 13:55:11', '0', '200.00', 1, 1, NULL, 3, 1),
(128, '0', 0, 4, 0, '2021-01-05 13:55:16', '0', '1.00', 1, 1, NULL, 3, 1),
(129, '0', 0, 4, 0, '2021-01-06 09:14:57', '0', '7.00', 1, 1, NULL, 3, 1),
(130, '0', 0, 4, 0, '2021-01-06 09:15:03', '0', '60.00', 1, 1, NULL, 3, 1),
(131, '0', 148, 36, NULL, '2021-01-06 23:39:12', NULL, '265.00', 1, 0, NULL, NULL, NULL),
(132, '0', 153, 36, NULL, '2021-01-08 12:59:32', NULL, '159.00', 1, 0, NULL, NULL, NULL),
(133, '0', 157, 36, NULL, '2021-01-09 15:09:53', NULL, '190.00', 1, 0, NULL, NULL, NULL),
(134, '0', 158, 36, NULL, '2021-01-09 19:45:32', NULL, '240.00', 1, 0, NULL, NULL, NULL),
(135, '0', 163, 159, NULL, '2021-01-12 16:10:03', NULL, '150.00', 1, 0, NULL, NULL, NULL),
(136, '0', 0, 178, 0, '2021-01-15 14:16:42', '0', '123123.00', 1, 1, NULL, 3, 1),
(137, '0', 185, 36, NULL, '2021-03-12 21:55:53', NULL, '60.00', 1, 0, NULL, NULL, NULL),
(138, '0', 189, 36, NULL, '2021-04-07 19:14:02', NULL, '861.00', 1, 0, NULL, NULL, NULL),
(139, '0', 0, 189, 0, '2021-04-07 19:15:29', '0', '200.00', 1, 1, NULL, 3, 1),
(140, '0', 0, 189, 0, '2021-04-07 19:15:41', '0', '205.00', 1, 1, NULL, 3, 1),
(141, '0', 0, 189, 0, '2021-04-07 19:15:46', '0', '7777.00', 1, 1, NULL, 3, 1),
(142, '0', 178, 36, NULL, '2021-05-07 18:15:11', NULL, '380.00', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `AccountingTransactionTriggers`
--

CREATE TABLE `AccountingTransactionTriggers` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AccountNotifications`
--

CREATE TABLE `AccountNotifications` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `Msg` text NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AccountPersonalInfo`
--

CREATE TABLE `AccountPersonalInfo` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Surname` varchar(250) DEFAULT NULL,
  `DisplayName` varchar(100) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Street` varchar(200) DEFAULT NULL,
  `Building` varchar(200) DEFAULT NULL,
  `Appartment` varchar(200) DEFAULT NULL,
  `Zip` varchar(100) DEFAULT NULL,
  `PhoneCode` int(11) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Passport_Front` int(11) DEFAULT NULL,
  `Passport_Back` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountPersonalInfo`
--

INSERT INTO `AccountPersonalInfo` (`ID`, `AccountID`, `Name`, `Surname`, `DisplayName`, `Gender`, `Birthday`, `Country`, `City`, `Street`, `Building`, `Appartment`, `Zip`, `PhoneCode`, `Phone`, `Passport_Front`, `Passport_Back`) VALUES
(1, 1, 'Farid ', 'Mammadov', NULL, 1, '2020-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Lotfi', 'Zadeh', NULL, 1, '1985-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Nasraddin', 'Tusi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'Azi', 'Aslanov', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 994, 503132244, NULL, NULL),
(5, 4, NULL, NULL, 'Boris Britva', NULL, '2002-06-20', '1', '1', 'Azadliq', '12', '123', 'AZ1000', NULL, NULL, 1, 1),
(6, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 29, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 30, 'Elvin Qasanov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 31, 'Alibaba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 32, 'qwerty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 33, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 34, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 36, 'Gulya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 37, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 38, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 39, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 40, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 41, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 42, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 43, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 44, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 45, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 47, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 48, 'Просторная и современная квартира в центре города', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 49, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 50, 'Testr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 51, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 52, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 53, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 54, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 55, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 56, 'Просторная и современная квартира в центре города', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 57, 'Просторная и современная квартира в центре города', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 58, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 59, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 60, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 61, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 62, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 63, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 64, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 65, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 66, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 67, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 68, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 69, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 70, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 71, 'alex muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 72, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 73, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 74, 'Alex Muradov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 76, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 77, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 78, 'Boris Britva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 79, 'Boris Britva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 80, 'qweqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 81, 'null null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 82, 'asudhu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 83, 'null null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 84, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 85, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 86, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 87, 'null null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 88, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 89, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 90, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 91, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 92, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 93, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 94, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 95, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 96, 'Boris Britva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 97, 'Borya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 98, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 99, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 100, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 101, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 102, 'Elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 103, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 104, NULL, NULL, 'Alexander', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 105, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 106, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 107, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 108, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 109, NULL, NULL, 'Alexandro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 110, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 111, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 112, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 113, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 114, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 115, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 116, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 117, NULL, NULL, 'Alexandro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 118, 'Elvin', 'Hasanov', 'gigidefitgo', NULL, '1998-12-27', 'Azerbaijan', 'Baku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 119, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 120, NULL, NULL, 'alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 121, NULL, NULL, 'wqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 122, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 123, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 124, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 125, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 126, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 127, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 128, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 129, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 130, NULL, NULL, 'weqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 131, NULL, NULL, 'qeqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 132, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 133, NULL, NULL, 'gorbytol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 134, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 135, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 136, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 137, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 138, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 139, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 140, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 141, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 142, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 143, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 144, NULL, NULL, 'elvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 145, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 146, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 147, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 148, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 149, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 150, NULL, NULL, 'SEVIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 151, NULL, NULL, 'Sevil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 152, 'Yasin', 'Rzayev', 'Yasin', NULL, '1981-12-05', 'Azerbaijan', 'Baku', 'Rashid Behbudov', '55', NULL, 'AZ 1022', NULL, NULL, NULL, NULL),
(190, 153, NULL, NULL, 'Alex', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 154, NULL, NULL, 'Naida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 155, NULL, NULL, 'Anar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 156, NULL, NULL, 'Elchin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 157, 'Alexz', NULL, 'Alex M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 158, NULL, NULL, 'Shahla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 159, NULL, NULL, 'İmran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 160, NULL, NULL, 'Loqman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 161, NULL, NULL, 'Loqman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 162, NULL, NULL, 'Naida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 163, NULL, NULL, 'Mirza Maharramov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 164, NULL, NULL, 'Руслан', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 165, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 166, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 167, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 168, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 169, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 170, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 171, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 172, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 173, NULL, NULL, 'xuraman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 174, NULL, NULL, 'Zehra ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 175, NULL, NULL, 'Babak Baghirov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 176, NULL, NULL, 'Юлия', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 177, 'Yusif', 'Zeynallı', 'Yusif', NULL, '1995-06-11', 'Azərbaycan', 'Baku', 'Azərbaycan prospekti 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 178, 'Эльвин', 'Гасанов', 'elvin', NULL, '1998-12-27', 'Азербайджан', 'Баку', 'Лейла Маммедбекова', '17', '32', 'az1040', NULL, NULL, NULL, NULL),
(216, 179, NULL, NULL, 'DrbloginMr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 180, NULL, NULL, 'Omar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 181, NULL, NULL, 'DrbloginMr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 182, NULL, NULL, 'Kanan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 183, NULL, NULL, 'Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 184, NULL, NULL, 'Roman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 185, NULL, NULL, 'adsd ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 186, NULL, NULL, 'Kirilllsculk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 187, NULL, NULL, 'Robertobef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 188, NULL, NULL, 'AlfonsoMer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 189, NULL, NULL, 'Aleksey', NULL, '3333-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 190, NULL, NULL, 'NezabudkaSic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 191, NULL, NULL, 'IIAlexaXsnino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 192, NULL, NULL, 'herloadeaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 193, NULL, NULL, 'NezabudkaSic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 194, NULL, NULL, 'IIAlexaaXsnino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 195, NULL, NULL, 'NewbadDam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 196, NULL, NULL, 'AGambler_Alumb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 197, NULL, NULL, 'DwayneDok', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 198, NULL, NULL, 'Davidmerve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 199, NULL, NULL, 'JerryKag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 200, NULL, NULL, 'JerryKag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `AccountPhones`
--

CREATE TABLE `AccountPhones` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `ListingID` int(11) NOT NULL,
  `ListingSpecific` int(1) NOT NULL,
  `IsPrimary` int(1) NOT NULL,
  `CountryCode` int(11) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AccountSecurity`
--

CREATE TABLE `AccountSecurity` (
  `ID` int(11) NOT NULL,
  `TMP_ID` varchar(200) DEFAULT NULL,
  `VerifiedEmail` int(1) NOT NULL DEFAULT '0',
  `VerifiedPhone` int(1) DEFAULT '0',
  `VerifiedID` int(1) NOT NULL DEFAULT '0',
  `Email` varchar(100) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `PhoneCode` tinytext,
  `Phone` tinytext,
  `TempPhoneCode` tinytext,
  `TempPhone` tinytext,
  `Password` varchar(255) DEFAULT NULL,
  `GoogleAccount` varchar(255) DEFAULT NULL,
  `TelegramID` int(11) DEFAULT NULL,
  `DateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DataDeleted` datetime DEFAULT NULL,
  `VerificationPhoneCode` int(4) DEFAULT NULL,
  `VerificationEmailCode` int(11) DEFAULT NULL,
  `RestorePasswordCode` int(11) DEFAULT NULL,
  `Language` varchar(3) NOT NULL DEFAULT 'EN',
  `Active` int(1) NOT NULL DEFAULT '0',
  `Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountSecurity`
--

INSERT INTO `AccountSecurity` (`ID`, `TMP_ID`, `VerifiedEmail`, `VerifiedPhone`, `VerifiedID`, `Email`, `Country`, `PhoneCode`, `Phone`, `TempPhoneCode`, `TempPhone`, `Password`, `GoogleAccount`, `TelegramID`, `DateCreated`, `DateModified`, `DataDeleted`, `VerificationPhoneCode`, `VerificationEmailCode`, `RestorePasswordCode`, `Language`, `Active`, `Role`) VALUES
(2, NULL, 1, NULL, 0, 'farid@rentxx.com', NULL, NULL, '+994 554600016', NULL, NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 977392993, '2020-06-28 23:39:29', '2020-11-26 23:12:41', NULL, 6040, 0, NULL, 'EN', 0, NULL),
(3, NULL, 0, NULL, 0, 'cfaazerbaijan@gmail.com', NULL, NULL, '+994503131313', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-14 12:38:41', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(4, NULL, 1, 0, 0, 'test@rentxx.com', 1, '+994', '556631220', '+994', '556631220', '601f1889667efaebb33b8c12572835da3f027f78', NULL, 771109126, '2020-07-05 17:17:48', '2021-01-15 08:25:51', NULL, 8764, 5040, NULL, 'EN', 0, 3),
(5, NULL, 0, NULL, 0, 'lolo@rentxx.com', NULL, NULL, '+99450362929', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-10 17:41:20', '2020-11-27 11:50:39', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(7, NULL, 0, NULL, 0, 'lolo@rentxx.comm', NULL, NULL, '+994503629292', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-10 17:45:33', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(8, NULL, 0, NULL, 0, 'aaa@aaa.aa', NULL, NULL, '+994333333333', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-10 18:59:51', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(20, NULL, 0, NULL, 0, 'fatalizade.farid@gmail.com', NULL, NULL, '+994554600016', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-10 19:22:11', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(22, NULL, 0, NULL, 0, 'alakbar.muradov@gmail.com', NULL, NULL, '+994503612828', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-07-14 09:11:58', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(23, NULL, 0, NULL, 0, 'semraamiraslanova@gmail.com', NULL, NULL, '+994502123677', NULL, NULL, '8a2da05455775e8987cbfac5a0ca54f3f728e274', NULL, NULL, '2020-07-14 12:38:29', '2020-11-04 00:49:09', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(25, NULL, 0, NULL, 0, 'new@rentxx.com', NULL, NULL, '+994503135144', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-09-02 02:48:42', '2020-11-20 14:00:58', NULL, 4090, 0, NULL, 'EN', 0, NULL),
(27, NULL, 0, NULL, 0, 'alex.muradov089@gmail.com', NULL, NULL, '+72313123123', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-09-02 03:13:20', '2021-01-07 11:46:28', NULL, 4741, 308217, NULL, 'EN', 0, NULL),
(28, NULL, 1, NULL, 0, 'koval.ss922@gmail.com', NULL, NULL, '+7989898989898', NULL, NULL, 'e07a9ae52eefa39dccab5af95d0d44a1e4f45519', NULL, NULL, '2020-09-10 16:10:40', '2020-11-20 14:06:03', NULL, 2448, 0, NULL, 'EN', 0, NULL),
(29, NULL, 0, NULL, 0, 'test2@rentxx.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-20 16:15:07', '2020-11-20 15:59:26', NULL, 7048, 0, NULL, 'EN', 0, NULL),
(30, NULL, 0, NULL, 0, '123@test.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-20 16:15:11', '2020-11-20 15:59:32', NULL, 4254, 0, NULL, 'EN', 0, NULL),
(31, NULL, 0, NULL, 0, 'ali@test.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-20 20:26:19', '2020-11-20 15:59:43', NULL, 7086, 0, NULL, 'EN', 0, NULL),
(32, NULL, 0, NULL, 0, 'qasanovelvin431@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-21 10:47:03', '2020-11-20 15:59:52', NULL, 3252, 0, NULL, 'EN', 0, NULL),
(33, NULL, 0, NULL, 0, '123@321.ee', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-21 14:09:12', '2020-11-20 15:59:57', NULL, 9776, 0, NULL, 'EN', 0, NULL),
(34, NULL, 0, NULL, 0, '123@test.test', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-10-21 16:47:36', '2020-11-20 17:31:33', NULL, 6826, 0, NULL, 'EN', 0, NULL),
(36, NULL, 1, NULL, 0, 'gulya.0809.2001@mail.ru', NULL, '+994', '556631220', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-11-01 16:48:02', '2021-01-15 08:25:40', NULL, NULL, 0, NULL, 'EN', 0, 3),
(37, NULL, 0, NULL, 0, 'asdiasj@daer.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-11-20 12:10:42', '2020-11-20 12:46:19', NULL, 48902194, 0, NULL, 'EN', 0, NULL),
(38, NULL, 0, NULL, 0, 'beta@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 12:29:40', '2020-11-26 19:59:27', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(39, 'e735a1b710287561161bc1d9a0b2eca6c0d56a8b', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 12:36:05', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(40, '684b0314d00c36f0f10cf2ec213ce3643447c14b', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 12:45:53', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(41, '', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'b74a1116f070a823b9c126a09fcc0388daff41d6', NULL, NULL, '2020-11-20 12:46:19', '2020-11-20 12:47:39', NULL, 92611107, 0, NULL, 'EN', 0, NULL),
(42, 'e213bff0cdf1bd211b283179da67c2ec9725e3ad', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 12:47:06', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(43, '', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-11-20 12:47:39', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(44, '34b398d6ea88c0069f00a45a6b802460eeaf52ab', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 12:51:42', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(45, '912c9429397d71a055241e28c38b9a2ef4375ce3', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 13:34:38', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(47, '041498a1c914fb2b401435ed1ef1fe6b4088b898', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 14:00:58', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(48, 'a2650fd9c9dc5631c259aed4eb9a82940cca76c2', 0, NULL, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 14:02:34', '2020-12-04 08:35:26', NULL, NULL, 0, NULL, 'EN', 0, NULL),
(49, 'a4a9800c57b73965763a513a027fc84e96dcd324', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 14:05:05', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(50, '3c56295e2bd3a2aabcad65a2ce37fb79d24e8f47', 0, NULL, 0, 'beta2@alfa.az', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 14:06:03', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(51, '9136e7aac17505a858ef9616df55a10e5ff4df54', 0, NULL, 0, 'tatat@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 15:59:26', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(52, '4e7dfda2021bc6b0179c34b50ff7f3fe67cbdcbe', 0, NULL, 0, 'tatat@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 15:59:32', NULL, NULL, NULL, 0, NULL, 'EN', 0, NULL),
(53, 'dfb06aa2cb2956e47d0044cbc723e5f27cacc8b1', 0, NULL, 0, 'tatat@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 15:59:43', '2020-11-27 12:24:52', NULL, 6864, 0, NULL, 'EN', 0, NULL),
(54, 'd4c934eac10e1a781180af537acae6c833a3ae16', 0, NULL, 0, 'tataet@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 15:59:52', '2020-11-27 12:28:51', NULL, 7887, 0, NULL, 'EN', 0, NULL),
(55, '23a5612c5917504ba99f40787823097d85a8aeb6', 0, NULL, 0, 'tataet@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 15:59:57', '2020-11-27 12:37:20', NULL, 8475, 0, NULL, 'EN', 0, NULL),
(56, '02271f33c7fac679ea08be2f969c73f364a42381', 0, NULL, 0, 'uhsduias@asuhdasi.dim', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-20 17:31:33', '2020-11-27 12:39:27', NULL, 1864, 0, NULL, 'EN', 0, NULL),
(57, 'f10cdfc567f6b5c011955fe6246ca85b4ae7f675', 0, 0, 0, '1231@asd.dd', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-11-21 23:16:30', '2020-11-28 22:16:51', NULL, 6203, NULL, NULL, 'EN', 0, NULL),
(58, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:27:16', '2020-11-30 13:55:13', NULL, 2827, 5964, NULL, 'EN', 0, NULL),
(59, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:27:21', '2020-12-02 07:24:54', NULL, 5822, 6960, NULL, 'EN', 0, NULL),
(60, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:28:36', '2020-12-02 07:31:00', NULL, 1692, 5909, NULL, 'EN', 0, NULL),
(61, '', 0, 0, 0, 'a.muradov@hotmail.comm', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-11-22 15:29:27', '2020-12-02 07:55:21', NULL, 5703, NULL, NULL, 'EN', 0, NULL),
(62, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:31:53', '2020-12-02 08:28:12', NULL, 9406, NULL, NULL, 'EN', 0, NULL),
(63, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'a971f78af101664553ac2e6d2997b1f7b491936f', NULL, 977392993, '2020-11-22 15:41:39', '2020-12-02 08:28:27', NULL, 1725, 3669, NULL, 'EN', 0, NULL),
(64, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:46:21', '2020-12-02 08:28:33', NULL, 8591, 7305, NULL, 'EN', 0, NULL),
(65, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:50:49', '2020-12-02 08:28:34', NULL, 4197, 9260, NULL, 'EN', 0, NULL),
(66, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:56:57', '2020-12-02 08:29:33', NULL, 3312, 3586, NULL, 'EN', 0, NULL),
(67, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:59:02', '2020-12-02 08:31:27', NULL, 9196, 7299, NULL, 'EN', 0, NULL),
(68, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 15:59:55', '2020-12-02 08:33:22', NULL, 6796, 4038, NULL, 'EN', 0, NULL),
(69, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 16:00:00', '2020-12-02 08:35:04', NULL, 1038, 1587, NULL, 'EN', 0, NULL),
(70, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 16:00:38', '2020-12-02 08:37:39', NULL, 5565, 2176, NULL, 'EN', 0, NULL),
(72, '', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, 'ad70ab97ae1376e656002641cfb067c9c94906a2', NULL, NULL, '2020-11-22 16:23:06', '2020-12-04 08:35:29', NULL, 5065, 6889, NULL, 'EN', 0, NULL),
(73, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 23:30:04', '2020-12-02 08:42:14', NULL, 9041, 3813, NULL, 'EN', 0, NULL),
(74, '', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, 977392993, '2020-11-22 23:30:11', '2020-12-02 08:43:15', NULL, 7931, 1482, NULL, 'EN', 0, NULL),
(75, '279d49ed79de2b3225ac1b67a589f5a018e43f3e', 0, 0, 0, 'uihuih@asdsa.ddd', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:23:34', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(76, '9f7453ac5c90f33199a9787caef509f000c3a7a8', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:30:09', '2020-12-02 13:30:09', NULL, 8106, NULL, NULL, 'EN', 0, NULL),
(77, '62b531037eb8cda61623cc79b396baee473ae547', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:31:16', '2020-12-02 13:31:16', NULL, 9434, NULL, NULL, 'EN', 0, NULL),
(78, '13a77bf4058d96cb4853e4f3a8c021ebc9148cfe', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:32:05', '2020-12-02 13:32:05', NULL, 8850, NULL, NULL, 'EN', 0, NULL),
(79, 'f90642f9b054f4c2ad6ac69650731e919ed5dfdb', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:36:22', '2020-12-02 13:36:22', NULL, 5882, NULL, NULL, 'EN', 0, NULL),
(80, '8f747b5ba44005635d23b430e034c4547fe3f216', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:37:44', '2020-12-02 13:37:44', NULL, 5195, NULL, NULL, 'EN', 0, NULL),
(81, '1970093f0e4f6a83db30badbe4afdf4de2b7f0cb', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:41:47', '2020-12-02 13:41:47', NULL, 7286, NULL, NULL, 'EN', 0, NULL),
(82, 'a1429276388037115f91799174e896f85f9706b1', 0, 0, 0, 'uhihads@asdasd.dd', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-02 13:54:23', '2020-12-02 13:54:23', NULL, 7336, NULL, NULL, 'EN', 0, NULL),
(83, '70985ecc93c8774c4151b3416ec0d6b1c038ae84', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 05:41:23', '2020-12-03 05:41:23', NULL, 9072, NULL, NULL, 'EN', 0, NULL),
(84, '93bb7c99e72a942eba5ede8c5156cadfd47d8592', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 05:53:13', '2020-12-03 05:53:13', NULL, 3095, NULL, NULL, 'EN', 0, NULL),
(85, 'e55a98784592e0be9f78138b2d691e1d363a3620', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:29:17', '2020-12-04 08:35:37', NULL, 3908, NULL, NULL, 'EN', 0, NULL),
(86, 'd28659328db62c48cc26e85b9950283581c3ddc8', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:31:43', '2020-12-04 08:35:34', NULL, 3932, NULL, NULL, 'EN', 0, NULL),
(87, 'c338f6d33a27c67052a92e6f161214bf919d7eed', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:34:26', '2020-12-03 06:34:26', NULL, 3492, NULL, NULL, 'EN', 0, NULL),
(88, 'c78f094ab91d88733c7317f892445df8a4e335ff', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:34:38', '2020-12-03 06:34:38', NULL, 1125, NULL, NULL, 'EN', 0, NULL),
(89, 'd79603023215ca78288575636f132fde7c065cfb', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:36:37', '2020-12-03 06:36:37', NULL, 8936, NULL, NULL, 'EN', 0, NULL),
(90, '21c7df8937ecf3082ade1f459a46e506468b8a54', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 06:39:58', '2020-12-03 06:39:58', NULL, 5484, NULL, NULL, 'EN', 0, NULL),
(91, '891d36b2b39e28850e15b11ccc0341100ef45d34', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 07:03:10', '2020-12-03 07:03:10', NULL, 5566, NULL, NULL, 'EN', 0, NULL),
(92, 'f53be83b9e0b177a086e34f5e6519fcfda17684c', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 07:05:07', '2020-12-03 07:05:07', NULL, 8792, NULL, NULL, 'EN', 0, NULL),
(93, 'a01b06cc11c41220933a79e3cb425b133df87953', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 07:05:08', '2020-12-03 07:05:08', NULL, 6903, NULL, NULL, 'EN', 0, NULL),
(94, '6ed0876c1e54c041cc3b93a872662b71bba5fbc7', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 07:10:27', '2020-12-03 07:10:27', NULL, 7723, NULL, NULL, 'EN', 0, NULL),
(95, '5102c7e7962cb947d3f8778cbd775676eea1e184', 0, 0, 0, 'test@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 07:28:46', '2020-12-03 07:28:46', NULL, 7939, NULL, NULL, 'EN', 0, NULL),
(96, '285ce22472236e78ade31981bda2de18060e5c34', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 12:17:59', '2020-12-04 08:35:31', NULL, 7382, NULL, NULL, 'EN', 0, NULL),
(97, '6cd17d699c95ca2d6f37724931b18815236ecbf4', 0, 0, 0, 'gigidefitgo@gmil.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-03 12:54:05', '2020-12-03 12:54:05', NULL, 7585, NULL, NULL, 'EN', 0, NULL),
(98, '', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, '016dcb79256d30ca875eea5c216c38a4c69aa70e', NULL, NULL, '2020-12-04 08:36:00', '2020-12-04 08:41:28', NULL, NULL, 929573, NULL, 'EN', 0, NULL),
(99, '', 1, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 08:41:47', '2020-12-04 08:49:08', NULL, NULL, 559716, NULL, 'EN', 0, NULL),
(100, '', 1, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 08:49:40', '2020-12-04 10:43:58', NULL, NULL, 142245, NULL, 'EN', 0, NULL),
(101, '', 0, 0, 0, 'gigidefitgo@gmail.com1', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 10:44:08', '2020-12-04 12:22:59', NULL, NULL, 749756, NULL, 'EN', 0, NULL),
(102, '', 1, 0, 0, 'gigidefitgo@gmail.com`', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 10:44:15', '2020-12-04 13:19:15', NULL, NULL, 233937, NULL, 'EN', 0, NULL),
(103, '', 0, 0, 0, 'jsfdkjfj@kdfl.asd', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 10:53:28', '2020-12-04 10:53:28', NULL, NULL, 775646, NULL, 'EN', 0, NULL),
(105, '', 0, 0, 0, 'gigidefitgo@gmail.com`', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 13:19:49', '2020-12-04 13:23:10', NULL, NULL, 767495, NULL, 'EN', 0, NULL),
(117, '', 1, 0, 0, 'alakbar.muradov@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-04 13:36:45', '2020-12-05 00:40:57', NULL, NULL, 990174, NULL, 'EN', 0, NULL),
(118, NULL, 1, 1, 0, '1gigidefitgo@gmail.com', NULL, '+994', '556631220', NULL, NULL, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', NULL, NULL, '2020-12-04 13:44:14', '2020-12-29 21:52:12', NULL, 2339, 605724, NULL, 'EN', 0, NULL),
(119, NULL, 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'c80b0d951c51c394d0dbb49982aa96051ed76e2b', NULL, NULL, '2020-12-05 00:07:11', '2020-12-05 00:07:11', NULL, NULL, 404807, NULL, 'EN', 0, NULL),
(120, NULL, 0, 0, 0, 'adad@asdd.dd', NULL, NULL, NULL, NULL, NULL, '4961d12b2635b0b2d483d592704f3a84a20425e6', NULL, NULL, '2020-12-05 00:07:22', '2020-12-05 00:07:22', NULL, NULL, 932400, NULL, 'EN', 0, NULL),
(121, NULL, 1, 0, 0, 'gigidefitgo1@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2020-12-29 21:52:31', '2021-01-04 18:11:26', NULL, 9173, 995355, NULL, 'EN', 0, NULL),
(122, '7e30d1d72afd32866bc7b98cf8ca6ce37183161e', 0, 0, 0, 'gigidefitgo@gmai.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-29 23:45:19', '2020-12-29 23:45:19', NULL, 9645, NULL, NULL, 'EN', 0, NULL),
(123, '9a4821bedb2cf2d2464c05b86d811da2d890c941', 0, 0, 0, 'gigidefitgo@gmai.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-29 23:45:26', '2020-12-29 23:45:26', NULL, 9724, NULL, NULL, 'EN', 0, NULL),
(124, '15d66ddabbd8b7306c9c0430ce3040117524c8b2', 0, 0, 0, 'test1@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 00:50:58', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(125, 'c7cb958364664af611f0c48d96e88144119d5d55', 0, 0, 0, 'test1@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 00:56:33', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(126, 'c06920c535a818f4093b704085c8ad518c16b4bb', 0, 0, 0, 'test1@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 00:58:39', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(127, 'd72bc869196d65b83311799769734e832c0d70a2', 0, 0, 0, 'test1@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 00:59:40', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(128, '430eea2799fffb2793d70a9988169a5375255d3a', 0, 0, 0, 'test1@rentxx.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 00:59:45', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(129, '8748f1fa0622b398e7dd2c4a50148efa8197e2a2', 1, 0, 0, 'gigidefitgo1@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 01:03:56', '2020-12-30 01:05:02', NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(130, '7ccb940a797681be715202cc86f0cf1ec596946c', 0, 0, 0, 'gigidefitgo1@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 01:05:09', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(131, '90481eb66e77eafffd87525f266be80644abe7b5', 0, 0, 0, 'gigidefitgo1@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 01:05:16', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(132, '70c737f6b4358d31f74f4dbcc14eeea495a1c728', 0, 0, 0, 'a.muradov2@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2020-12-30 13:38:13', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(133, NULL, 0, 0, 0, 'gorby.pred@bk.ru', NULL, NULL, NULL, NULL, NULL, '1f88ab2084571d7af907b58ac87b3b0f53c19c14', NULL, NULL, '2020-12-31 00:49:45', '2020-12-31 00:49:45', NULL, NULL, 342074, NULL, 'EN', 0, NULL),
(134, '02301e6eb3176e2bc82467290ab4415db97ee939', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:11:45', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(135, 'caf777feb2057560a37f846b96c042d2e0f88124', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:26:00', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(136, '9f4706f8c82cbe9f5f2ee99caf79557cc32736bf', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:26:13', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(137, '12bccfd6d7c8a1f981f19cbb067aae494a55294a', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:26:51', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(138, '2aec3052742e379426d4eb0b125c5165406ba5da', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:27:45', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(139, '2c8738d602b97013ef695c4a1c7ad06a3ca6a394', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:27:53', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(140, '8b7d3281bda785bc92cf34187e9f3509ea0c3960', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-04 18:28:36', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(141, 'e728b8e5ed6f62ba5b3d7e6dea6ed6b1677d22c2', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 08:13:32', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(142, '529c8f626c0211f1a755b99eec75a698192d4136', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 08:26:01', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(143, '6e19c121f31765dbc726f06c7338f6c1094a0dce', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 08:27:59', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(144, 'cdfeba20edfb519bd094e12696f92e3ec576d8c6', 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 08:29:18', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(145, '2d3319ab9f892eb1b43d7bcca417cddddf18709b', 0, 0, 0, 'gigiddefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 09:32:34', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(146, 'b17454404648ecaf08ad702a33546d2fbfc8d62d', 0, 0, 0, 'gigiddefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 09:33:25', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(147, 'daf6575ddc7865892595cff9534853947c506a18', 0, 0, 0, 'gigiddefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-05 09:37:35', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(148, '45bcda6c4df9e9e70285e1b94872428c417d5335', 0, 0, 0, 'alakbar.muradov@gmail.comm', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-06 23:39:12', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(149, NULL, 1, 0, 0, 'alex.muradov089@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2021-01-07 11:49:30', '2021-01-07 11:50:25', NULL, NULL, 213148, NULL, 'EN', 0, NULL),
(150, NULL, 1, 0, 0, 'nara1808@yahoo.com', NULL, NULL, NULL, NULL, NULL, '035991028b61e372822cbbe25d8ef818531037f4', NULL, NULL, '2021-01-08 11:17:24', '2021-01-08 11:21:59', NULL, NULL, 238875, NULL, 'EN', 0, NULL),
(151, NULL, 0, 0, 0, 'nara1808@yahoo.com', NULL, NULL, NULL, NULL, NULL, '035991028b61e372822cbbe25d8ef818531037f4', NULL, NULL, '2021-01-08 11:21:22', '2021-01-08 11:21:22', NULL, NULL, 387206, NULL, 'EN', 0, NULL),
(152, NULL, 1, 0, 0, 'yasin.rzayev.81@mail.ru', NULL, NULL, NULL, NULL, NULL, 'b5f67ba1aeaeee1354164bdc199b6e9973ca3cf4', NULL, NULL, '2021-01-08 11:29:23', '2021-01-08 11:29:42', NULL, NULL, 197008, NULL, 'EN', 0, NULL),
(153, '7bf7cdd7e060811bf81f1a8847a5a9b7ee00130a', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-08 12:59:32', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(154, NULL, 0, 0, 0, 'naiba.kazimova@mail.ru', NULL, NULL, NULL, NULL, NULL, '52b975973186b51674f1c7787ff292fc39a63162', NULL, NULL, '2021-01-09 11:26:16', '2021-01-09 11:26:16', NULL, NULL, 643852, NULL, 'EN', 0, NULL),
(155, NULL, 1, 0, 0, 'aliyevanar5055@gmail.com', NULL, NULL, NULL, NULL, NULL, 'e2d473acc3025b9d253745f8c66533b98468160d', NULL, NULL, '2021-01-09 12:15:43', '2021-01-09 12:16:32', NULL, NULL, 245899, NULL, 'EN', 0, NULL),
(156, NULL, 0, 0, 0, 'elchin.babayev@mail.com', NULL, NULL, NULL, NULL, NULL, 'a2f9671468dbd710d64138bc47db48391ba3f0c4', NULL, NULL, '2021-01-09 13:01:49', '2021-01-09 13:01:49', NULL, NULL, 387479, NULL, 'EN', 0, NULL),
(157, 'f03702a3cb2c23c621225f205275b418742e932e', 0, 0, 0, 'a.muradovv@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-09 15:09:53', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(158, 'bed0424e66c5a5a4892817ad562d65f3efadca78', 0, 0, 0, 'shahla@gmail.comm', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-09 19:45:32', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(159, NULL, 1, 0, 0, 'imranello@hotmail.com', NULL, NULL, NULL, NULL, NULL, '6492182fc1ec0546b58fda8b48cb24895a2e2171', NULL, NULL, '2021-01-10 18:06:56', '2021-01-10 18:07:26', NULL, NULL, 649326, NULL, 'EN', 0, NULL),
(160, NULL, 0, 0, 0, 'logman69@mail.ru', NULL, NULL, NULL, NULL, NULL, 'f46e8daeffb231e670fd5dc570deaf8017e7a957', NULL, NULL, '2021-01-11 17:16:06', '2021-01-11 17:16:06', NULL, NULL, 781563, NULL, 'EN', 0, NULL),
(161, NULL, 1, 0, 0, 'logman69@mail.ru', NULL, NULL, NULL, NULL, NULL, 'f46e8daeffb231e670fd5dc570deaf8017e7a957', NULL, NULL, '2021-01-11 17:17:13', '2021-01-11 17:23:48', NULL, NULL, 684315, NULL, 'EN', 0, NULL),
(162, NULL, 1, 0, 0, 'naiba.kazimova@mail.ru', NULL, NULL, NULL, NULL, NULL, '55246eeebdf1e30b024f4ebe52fbf89f1d700bba', NULL, NULL, '2021-01-11 22:11:42', '2021-01-11 22:12:35', NULL, NULL, 830587, NULL, 'EN', 0, NULL),
(163, '448e1a8a4f60c1f28c14bc36749689caa83587da', 0, 0, 0, 'mirzamaharramov@gmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-01-12 16:10:03', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(164, NULL, 1, 0, 0, 'kam-ruslan@mail.ru', NULL, NULL, NULL, NULL, NULL, 'e1754d5a6d0394866280ef37300138167f0835dc', NULL, NULL, '2021-01-13 10:47:45', '2021-01-13 10:48:51', NULL, NULL, 196727, NULL, 'EN', 0, NULL),
(165, NULL, 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2021-01-13 13:06:22', '2021-01-14 10:43:38', NULL, NULL, 766394, NULL, 'EN', 0, NULL),
(166, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:15', '2021-01-14 10:27:15', NULL, NULL, 382311, NULL, 'EN', 0, NULL),
(167, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:18', '2021-01-14 10:27:18', NULL, NULL, 928120, NULL, 'EN', 0, NULL),
(168, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:19', '2021-01-14 10:27:19', NULL, NULL, 764811, NULL, 'EN', 0, NULL),
(169, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:20', '2021-01-14 10:27:20', NULL, NULL, 666525, NULL, 'EN', 0, NULL),
(170, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:22', '2021-01-14 10:27:22', NULL, NULL, 913180, NULL, 'EN', 0, NULL),
(171, NULL, 0, 0, 0, 'bakuhome2018@gmail.com', NULL, NULL, NULL, NULL, NULL, '1bdc01cbbd5fde325a46f3cded9bee0f7c07a451', NULL, NULL, '2021-01-14 10:27:23', '2021-01-14 10:27:23', NULL, NULL, 242453, NULL, 'EN', 0, NULL),
(172, NULL, 0, 0, 0, 'gigidefitgo@gmail.com', NULL, NULL, NULL, NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2021-01-14 10:44:16', '2021-01-15 13:55:13', NULL, NULL, 188326, NULL, 'EN', 0, NULL),
(173, NULL, 1, 0, 0, 'demirzadexuraman@gmail.com', NULL, NULL, NULL, NULL, NULL, '62f30c48a39afa541ecc35817b1b5b0eb9b792fb', NULL, NULL, '2021-01-14 10:53:54', '2021-01-14 10:59:47', NULL, NULL, 375744, NULL, 'EN', 0, NULL),
(174, NULL, 0, 0, 0, 'Nuraya80@mail.ru', NULL, NULL, NULL, NULL, NULL, '4fe10ddcfb90aade51433de34e19dd6625a76f41', NULL, NULL, '2021-01-14 12:41:19', '2021-01-14 12:41:19', NULL, NULL, 405868, NULL, 'EN', 0, NULL),
(175, NULL, 1, 0, 0, 'babekbaghirov@gmail.com', NULL, NULL, NULL, NULL, NULL, 'ced17b5cd1461b11a45ced68ebd55b5a8d53fe95', NULL, NULL, '2021-01-14 12:45:59', '2021-01-14 12:46:17', NULL, NULL, 599670, NULL, 'EN', 0, NULL),
(176, NULL, 1, 0, 0, 'iuliia.sierghieieva.1111@mail.ru', NULL, NULL, NULL, NULL, NULL, '83bd1133ee955b2ea55a9fcd79f9675e39f23ef8', NULL, NULL, '2021-01-14 16:17:18', '2021-01-14 16:19:49', NULL, NULL, 741506, NULL, 'EN', 0, NULL),
(177, NULL, 1, 0, 0, 'yusif.zeynalli@gmail.com', NULL, NULL, NULL, NULL, NULL, '30b9d9369ab2e699d3e964935d6ce7ef6f312acb', NULL, NULL, '2021-01-15 06:55:04', '2021-01-15 06:56:06', NULL, NULL, 325795, NULL, 'EN', 0, NULL),
(178, NULL, 1, 1, 0, 'gigidefitgo@gmail.com', NULL, '+994', '556631220', NULL, NULL, '601f1889667efaebb33b8c12572835da3f027f78', NULL, NULL, '2021-01-15 13:55:33', '2021-01-15 14:10:45', NULL, 6341, 183952, NULL, 'EN', 0, NULL),
(179, NULL, 0, 0, 0, 'kapystingleb782@yandex.com', NULL, NULL, NULL, NULL, NULL, 'c795a4dca7f25fe0fb2895327633dea283a211c0', NULL, NULL, '2021-01-15 15:47:30', '2021-01-15 15:47:30', NULL, NULL, 117943, NULL, 'EN', 0, NULL),
(180, NULL, 1, 0, 0, 'elmuminun@gmail.com', NULL, NULL, NULL, NULL, NULL, 'da417e8b08c389410926bbaadff7f2e05ce28a6b', NULL, NULL, '2021-01-16 11:05:25', '2021-01-16 11:05:44', NULL, NULL, 388559, NULL, 'EN', 0, NULL),
(181, NULL, 0, 0, 0, 'kapystingleb782@yandex.com', NULL, NULL, NULL, NULL, NULL, 'c795a4dca7f25fe0fb2895327633dea283a211c0', NULL, NULL, '2021-01-16 11:28:13', '2021-01-16 11:28:13', NULL, NULL, 971111, NULL, 'EN', 0, NULL),
(182, NULL, 1, 0, 0, 'yaddashdisk1@gmail.com', NULL, NULL, NULL, NULL, NULL, '5f40c1f2b3a111d0d56f3b878ddfa732f4ea62c6', NULL, NULL, '2021-01-19 15:20:50', '2021-01-19 20:01:48', NULL, NULL, 193638, NULL, 'EN', 0, NULL),
(183, NULL, 1, 0, 0, 'alimusicgroupsecond@gmail.com', NULL, NULL, NULL, NULL, NULL, 'e3a666e0af57b4d7242d705465b948791d423fb8', NULL, NULL, '2021-01-23 14:21:48', '2021-01-23 14:22:17', NULL, NULL, 540274, NULL, 'EN', 0, NULL),
(184, NULL, 0, 0, 0, 'roma.fe1905@gmail.com', NULL, NULL, NULL, NULL, NULL, 'caa0cd8ad7228594c54a643f6b216e5dfd7916de', NULL, NULL, '2021-02-24 12:38:26', '2021-02-24 12:41:02', NULL, NULL, 471068, 65114590, 'EN', 0, NULL),
(185, '50503f5a59700b87e813da66027da5913442024d', 0, 0, 0, 'qwd@sdads.dd', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-03-12 21:55:53', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(186, NULL, 0, 0, 0, 'kiril.kutsev@mail.ru', NULL, NULL, NULL, NULL, NULL, '7bc076e603134cc82b46e4ccb124446fc572ae18', NULL, NULL, '2021-03-17 04:58:55', '2021-03-17 04:58:55', NULL, NULL, 676201, NULL, 'EN', 0, NULL),
(187, NULL, 0, 0, 0, 'oksanasuxanova@mail.com', NULL, NULL, NULL, NULL, NULL, 'f0f869cf83ff6901ae7829b1fe082a1b32400967', NULL, NULL, '2021-03-17 12:37:13', '2021-03-17 12:37:13', NULL, NULL, 369183, NULL, 'EN', 0, NULL),
(188, NULL, 0, 0, 0, 'aleksandra.626@mail.com', NULL, NULL, NULL, NULL, NULL, '9d65d2fbdddd6a326ae21d53cfd4d6f4449ea492', NULL, NULL, '2021-03-18 17:33:33', '2021-03-18 17:33:33', NULL, NULL, 284088, NULL, 'EN', 0, NULL),
(189, '0dc6e5d208f7515a54970430dae19091846eb4d4', 0, 0, 0, 'a.muradov@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'df2431559f85cabfc3915e67dd8c0ddcd1771fca', NULL, NULL, '2021-04-07 19:14:02', NULL, NULL, NULL, NULL, NULL, 'EN', 0, NULL),
(190, NULL, 0, 0, 0, 'nezabudkaSic@drstranst.xyz', NULL, NULL, NULL, NULL, NULL, '08bc6b9cb69c5d42f3d05a82635eddb0a5f3f1af', NULL, NULL, '2021-04-21 06:27:18', '2021-04-21 06:27:18', NULL, NULL, 370742, NULL, 'EN', 0, NULL),
(191, NULL, 0, 0, 0, 'specunexal1988@mail.ru', NULL, NULL, NULL, NULL, NULL, '78f6f839d285e659576c556ef25c7e5664f71c54', NULL, NULL, '2021-04-21 19:04:58', '2021-04-21 19:04:58', NULL, NULL, 589660, NULL, 'EN', 0, NULL),
(192, NULL, 0, 0, 0, 'herloadeaz@fsmodshub.com', NULL, NULL, NULL, NULL, NULL, '81e665bae4da9deba5361f48eeffdcdf79508cfe', NULL, NULL, '2021-04-22 13:53:45', '2021-04-22 13:53:45', NULL, NULL, 560707, NULL, 'EN', 0, NULL),
(193, NULL, 0, 0, 0, 'nezabudkaSic@drstranst.xyz', NULL, NULL, NULL, NULL, NULL, '08bc6b9cb69c5d42f3d05a82635eddb0a5f3f1af', NULL, NULL, '2021-04-23 23:24:00', '2021-04-23 23:24:00', NULL, NULL, 463910, NULL, 'EN', 0, NULL),
(194, NULL, 0, 0, 0, 'mausesriati1971@mail.ru', NULL, NULL, NULL, NULL, NULL, '78f6f839d285e659576c556ef25c7e5664f71c54', NULL, NULL, '2021-04-24 17:57:34', '2021-04-24 17:57:34', NULL, NULL, 707847, NULL, 'EN', 0, NULL),
(195, NULL, 0, 0, 0, 'newwbasd@mulars.ru', NULL, NULL, NULL, NULL, NULL, '9d4ee7583edab973d418033a0d4e5d1791d34352', NULL, NULL, '2021-04-26 09:56:43', '2021-04-26 09:56:43', NULL, NULL, 807510, NULL, 'EN', 0, NULL),
(196, NULL, 0, 0, 0, 'arinapanina718@gmail.com', NULL, NULL, NULL, NULL, NULL, '16e378e4de7da6d98328bc6bbd9e3df422ff10af', NULL, NULL, '2021-04-27 14:15:34', '2021-04-27 14:15:34', NULL, NULL, 695815, NULL, 'EN', 0, NULL),
(197, NULL, 0, 0, 0, 'k36b3g@goposts.site', NULL, NULL, NULL, NULL, NULL, 'bd2f07a4efefd37d9ed88566b21bac4cc415f414', NULL, NULL, '2021-04-28 02:58:43', '2021-04-28 02:58:43', NULL, NULL, 936484, NULL, 'EN', 0, NULL),
(198, NULL, 0, 0, 0, 'domenban@xrumer.xyz', NULL, NULL, NULL, NULL, NULL, '9b9c0920fecc24882e3404e5d7a82bc611ea7f06', NULL, NULL, '2021-04-28 11:20:12', '2021-04-28 11:20:12', NULL, NULL, 396486, NULL, 'EN', 0, NULL),
(199, NULL, 0, 0, 0, 'zueva_lada@presidency.com', NULL, NULL, NULL, NULL, NULL, 'cf2e0d379832929fba17772156b51d07b9baf93a', NULL, NULL, '2021-04-29 02:15:49', '2021-04-29 02:15:49', NULL, NULL, 670157, NULL, 'EN', 0, NULL),
(200, NULL, 0, 0, 0, 'zueva_lada@presidency.com', NULL, NULL, NULL, NULL, NULL, 'cf2e0d379832929fba17772156b51d07b9baf93a', NULL, NULL, '2021-04-29 20:23:22', '2021-04-29 20:23:22', NULL, NULL, 879607, NULL, 'EN', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `AccountSecurityAttempts`
--

CREATE TABLE `AccountSecurityAttempts` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `IP` varchar(50) DEFAULT NULL,
  `Subtype` int(11) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountSecurityAttempts`
--

INSERT INTO `AccountSecurityAttempts` (`ID`, `userID`, `IP`, `Subtype`, `Timestamp`, `Active`) VALUES
(1, NULL, '5.197.151.213', 1, '2020-11-22 14:11:38', NULL),
(2, NULL, '5.197.151.213', 1, '2020-11-22 14:11:49', NULL),
(3, NULL, '5.197.151.213', 1, '2020-11-22 14:11:51', NULL),
(4, NULL, '5.197.151.213', 1, '2020-11-22 14:11:52', NULL),
(5, NULL, '5.197.151.213', 1, '2020-11-22 14:12:12', NULL),
(6, NULL, '5.197.151.213', 1, '2020-11-22 14:12:49', NULL),
(7, NULL, '5.197.151.213', 1, '2020-11-22 14:12:55', NULL),
(8, NULL, '5.197.151.213', 1, '2020-11-22 14:27:07', NULL),
(9, NULL, '5.197.151.213', 1, '2020-11-22 14:29:26', NULL),
(10, NULL, '5.197.151.213', 1, '2020-11-22 14:57:14', NULL),
(11, NULL, '5.197.151.213', 1, '2020-11-22 16:01:17', NULL),
(12, NULL, '5.197.151.213', 1, '2020-11-22 16:39:10', 1),
(13, NULL, '5.197.151.213', 1, '2020-11-22 17:05:34', 1),
(14, NULL, '89.147.201.162', 1, '2020-12-07 05:38:05', NULL),
(15, NULL, '185.118.50.228', 1, '2020-12-07 05:38:15', 1),
(16, NULL, '89.147.201.162', 1, '2020-12-11 13:38:25', NULL),
(17, NULL, '89.147.201.162', 1, '2020-12-11 13:38:31', NULL),
(18, NULL, '89.147.201.162', 1, '2020-12-11 13:39:47', NULL),
(19, NULL, '89.147.201.162', 1, '2020-12-11 13:40:18', NULL),
(20, NULL, '89.147.201.162', 1, '2020-12-11 13:40:36', NULL),
(21, NULL, '89.147.201.162', 1, '2020-12-11 13:45:01', NULL),
(22, NULL, '89.147.201.162', 1, '2020-12-11 13:45:03', NULL),
(23, NULL, '5.197.239.120', 1, '2020-12-21 14:11:40', NULL),
(24, NULL, '5.197.239.120', 1, '2020-12-21 14:14:39', NULL),
(25, NULL, '5.197.239.120', 1, '2020-12-21 14:14:45', NULL),
(26, NULL, '5.197.239.120', 1, '2020-12-21 14:14:50', NULL),
(27, NULL, '5.197.239.120', 1, '2020-12-29 21:54:05', 1),
(28, NULL, '5.197.239.120', 1, '2020-12-29 21:54:11', 1),
(29, NULL, '185.129.93.165', 1, '2021-01-05 13:50:59', 0),
(30, NULL, '185.129.93.165', 1, '2021-01-05 13:54:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `AccountSecurityLogs`
--

CREATE TABLE `AccountSecurityLogs` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `deviceID` varchar(100) DEFAULT NULL,
  `hashID` varchar(200) DEFAULT NULL,
  `deviceName` varchar(200) DEFAULT NULL,
  `IP` varchar(50) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) DEFAULT NULL COMMENT '1=Active, 0=Deactivated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AccountSecurityLogs`
--

INSERT INTO `AccountSecurityLogs` (`ID`, `userID`, `deviceID`, `hashID`, `deviceName`, `IP`, `Timestamp`, `Status`) VALUES
(1, NULL, '468d2627d896e69db30d474b301df43d01023c18', 'e3ea178c6c50d47b700b26d294c3b486a6065d93', NULL, '172.69.54.65', '2020-07-08 22:20:00', 5),
(2, NULL, '34280e8e67abc8fa5ce248ffa5bf30656f47bada', '7f5bd727cdfa91e18b005b7d3f390a515f132aae', NULL, '162.158.111.243', '2020-07-08 22:42:29', 1),
(3, 4, '6c33d0210e75d848177e3a8114787d3521c0c0e6', '966cb16c9821be7e6cc7d4e5aa7e9ddf1c7d99df', NULL, '162.158.111.243', '2020-07-08 22:54:31', 1),
(4, 4, '6a31e566043a18b3ffea93b481f4bca7723fcdc2', 'dbb8e5a8fdca7d1499f757e4d563ef5d19b8dd33', NULL, '85.94.241.97', '2020-07-08 23:26:38', 1),
(5, 4, '519850850b1b55054a0aa2c6a4dd09af424e8dd5', '5f5c5d0ff5f76a50aa951de858add1d22322f8be', NULL, '85.94.240.40', '2020-07-08 23:40:07', 1),
(6, 4, 'f0de4e7e07701092404860894f129a752e4d5345', 'd946d2514c158080e60d9777b4d395f0d042d95c', NULL, '5.197.226.18', '2020-07-09 10:45:09', 1),
(7, 4, 'c94ecdb3587020b25cb355a0872d9885d97158e3', 'e8184c551bea9bf245a4d8ed0c49ad042cb540e1', NULL, '85.94.240.40', '2020-07-09 10:45:20', 1),
(8, 4, '867a4139fef7982710edce84f0f39534ec2f7ea7', '5e79ecc2caa7e53e74483e5ade172981099ef3c1', NULL, '85.94.241.78', '2020-07-11 12:07:22', 1),
(9, 20, '925c80af8cc1810a66d8cd2ceef20697bd4812ca', 'd01a633bd95d524ecdcce51abc3fb807d6ad8e93', NULL, '5.197.226.17', '2020-07-11 19:31:51', 1),
(10, 20, '55bd1d08a467f01ec60e07e9ac9c01cbb2f914ad', 'ee637e6ce96caad35a0ec68229170db8ac8d75d7', NULL, '5.197.226.17', '2020-07-11 22:24:22', 1),
(11, 4, '84a8b1615e0d6cd97754ef14e8c9ee35ddeb6865', '82bcda0cc2f220b740332341fb4b7f24d345bdfd', NULL, '85.94.241.78', '2020-07-11 23:03:45', 1),
(12, 4, '90b569576426489e123425dcc288c7f335a03e92', '8d1db72e5973b32be780459205224fb19ab2588b', NULL, '85.94.241.78', '2020-07-11 23:17:21', 1),
(13, 20, '496f9d6b15dc531fd81668758699c453cf736c52', 'f81dcc00e70b8557891147819e331ca1304ee8dd', NULL, '5.197.226.17', '2020-07-11 23:25:37', 1),
(14, 4, '7ee4c9ac1f80cb022572866e2b31e7ff0d015b1e', '185307ab5e582231dbe97d30aece30042030c62e', NULL, '85.94.241.78', '2020-07-12 00:54:47', 1),
(15, 4, '032f8c88e43a4031d0499352d8cdef336325172a', '0f2aeabf973fd833c3be229283f2dc718ea21139', NULL, '85.94.241.78', '2020-07-12 01:00:57', 1),
(16, 20, '5a9bcd4354186d33e26508c4da4006a963b8f249', 'afda63f4b63d77d235aeeee3b9af86d553a22c1c', NULL, '5.197.226.17', '2020-07-12 01:01:02', 1),
(17, 20, 'b367c7f6e64a3b3d1c3cf76467c339c75a794377', '5c7ecf52b4efd3a49f5971e3d46236f2952079eb', NULL, '5.197.226.17', '2020-07-12 01:02:06', 1),
(18, 20, '8971c46da4379ce16470ae9f7a782512c1f5b748', '569124cf5b3966414ffd29d64aded1d1f6e36291', NULL, '5.197.226.17', '2020-07-12 01:04:07', 1),
(19, 4, '4b3053b99a9397bcd2dc8f265a0be17146ff757c', '87e430a89a26d4a734151fe90e51a078d6571640', NULL, '85.94.241.78', '2020-07-12 01:04:18', 1),
(20, 4, '73201d764fe67814160724fc2450ef5fa7c5b78e', '67f8ef4ffa4e44dc979535193a8b4ccd366593d1', NULL, '85.94.241.78', '2020-07-12 01:05:29', 1),
(21, 20, '80b70003002576933c06e6a33fae773bf546cdd1', '8847b48c936173c1aa1d2141ab5168b1ac156556', NULL, '5.197.226.17', '2020-07-12 19:37:04', 1),
(22, 4, 'e3c49be922b6023b9ec149bdefde5608c6522bd5', '29d09f13e056ee96763e6047b724ce492fa3a69d', NULL, '85.94.240.165', '2020-07-12 21:12:01', 1),
(23, 4, '228de6f523337a28d1f3ad5af258a4981e36b86f', 'f62e340119e1e09728baed8f8d40f905266493bd', NULL, '85.94.241.239', '2020-07-13 18:26:52', 1),
(24, 20, 'a2186a4596ad44ceb970b77059496014eb53dcf1', '3ba6d2e9304950d9e52861d3ab07370658e2c934', NULL, '5.197.226.17', '2020-07-13 21:31:59', 1),
(25, 20, '496e7d3e2f7258000a058e8a1fa7fbe316f38fc4', '70bbf8c8ba5ca20b94201aaa9411109f144ef3eb', NULL, '5.197.226.17', '2020-07-14 19:19:56', 1),
(26, 4, '8dd639e7a057933443ee8a9d4f2056c751e0c78c', '508542315dd59e2d3c873e24f000b198a359494f', NULL, '85.94.241.215', '2020-07-15 14:34:28', 1),
(27, 20, '20ac2a2ac7a170bef26da357bf3b3782e5f71187', '0c1230f800586c94700e7c967f539c544919b3cf', NULL, '5.197.226.17', '2020-07-15 18:58:05', 1),
(28, 20, '113b163cd5ef0760c28bf5419a56190650b6b070', '00cb5246074692782e123579bada847ec2970713', NULL, '5.197.226.17', '2020-07-17 19:46:40', 1),
(29, 20, '38331e90844187a3954867e8e0324646c4117b33', '5b3f33b1aabeb3215d92cbf836c8af6cf09b0ce2', NULL, '5.197.226.17', '2020-07-18 07:30:11', 1),
(30, 4, 'b0f101e78b50bde790d67e4b429db5bc0ee89709', 'cf5bf965e2398bda14d675f3374b46b8a8cf8471', NULL, '85.94.241.180', '2020-07-18 22:57:13', 1),
(31, 20, 'b444069d0c443382286cb00e2dc1ae6970d5988c', '4b84b28a61db3668ec47af50eee5912e0465646e', NULL, '5.197.226.17', '2020-07-21 16:28:12', 1),
(32, 4, 'a5b892953478a0647b38a03f0e23f564ed652add', '47d6a3ec9d68f5ae9a78807dcc4b4244e585ddcc', NULL, '195.138.76.28', '2020-07-22 08:19:41', 1),
(33, 20, '13c49bb4becf998122d2820dd149da1ccd686f80', '7ca866f3027c7d99a55d1cfb47210b98f7909c7f', NULL, '5.197.226.17', '2020-07-22 08:41:15', 1),
(34, 4, '1748fb81f5fdf4405fad096105840fbd98d2bfc1', '55d042e5a4be8692b92425f1ac5dddd9574ab88d', NULL, '46.37.207.119', '2020-07-22 20:11:58', 1),
(35, 20, '47e4c6c7d8df31193efb481a3295edf527b1277b', 'dd8a3b34f7a04b69345f6daa973247acecd68fe3', NULL, '5.197.226.17', '2020-07-23 19:14:41', 1),
(36, 20, '392091553e7f0a08a90f3c24538ec354d34dbb41', '1aaf3f0eac6bab7bde06a7708883b978fb2973ab', NULL, '5.197.226.17', '2020-07-23 23:37:22', 1),
(37, 4, '727bb899b45ef0c3da197dfb462636faff13df82', '3e6bbc49d5d13e6476aa93f475dc65c33efaf964', NULL, '46.37.207.119', '2020-07-24 15:31:42', 1),
(38, 4, '3d305c6b500bcac85845cbbad244f0ab2f715625', '04e23d388481216227cc16c7bfb2ef2c1e0d7095', NULL, '185.4.43.131', '2020-07-31 20:00:56', 1),
(39, 4, '44daf1f42cdd8a1d8e780fee42446bc278c656f5', 'f2496b11cb9400baa60ce6e9f77c45e2d0081fec', NULL, '88.155.123.62', '2020-08-01 13:14:42', 1),
(40, 4, 'f8c32253021ddcc711e08f70f1f4c6a1f56263b1', '42642dc5efc1cdba98f2a1cefbd81981711644d9', NULL, '91.90.13.124', '2020-08-01 15:07:04', 1),
(41, 4, '3fca39024e3b59258468bc3fe179214e6b2a933d', 'fb89940712342ddc1e7e5778cb3388c3bfc8cf32', NULL, '80.90.225.135', '2020-08-02 17:13:20', 1),
(42, 4, '62178a5b0edf0676fb72ef53114a74086307691f', '349f6080e564df60f4cb86f26be8b5f03254e351', NULL, '217.245.58.240', '2020-08-04 14:32:47', 1),
(43, 4, 'c6c3d6db874cdd405b1ad090094e68634556e222', '4862ca578a6e27151ea7d39028ac1b4f81c10724', NULL, '5.197.226.17', '2020-08-04 19:20:39', 1),
(44, 4, 'ccb261e3bf7773de25f6e357e5bd81fd865f0cd4', '2a58f4b9c4dbea1f678bf3db4bf818d4e9d74098', NULL, '85.94.240.45', '2020-08-05 10:22:46', 1),
(45, 4, '6df371d60443c712a8503ab9d97becc88276a3ec', '08d14446b5842579837f7d8626cfa740c393934b', NULL, '85.94.240.45', '2020-08-05 23:14:35', 1),
(46, 4, 'b9b68a7bf815d67f087b6bba87f7cb6afb7a3470', '8b7b0eae743b9b6aa62385b0386df1bf08ca0132', NULL, '85.94.241.139', '2020-08-06 12:03:12', 1),
(47, 4, '0b44cf45bd1b1e2eb4176ba633892a80efbfdde5', '09ec976ea2634c7a376bca0cb6df0fc9f1ba300a', NULL, '79.140.217.234', '2020-08-09 15:07:34', 1),
(48, 4, '3ce060ae2887ffdb094c069ccdd78a012327573c', 'dd7b501fdfb09f8298a4a72cee5e39861d798b54', NULL, '79.140.217.234', '2020-08-09 20:04:19', 1),
(49, 4, '6c3c71ed9d6de7c90f58dc2f4e7c34abb9aabeb7', 'b734e10182b02cf070ad6fa7337ad69cdacd8d88', NULL, '79.140.217.234', '2020-08-10 07:35:47', 1),
(50, 4, '990db7cae601731d3f5c31fb496f7212a982cddb', '51e4a0cb7f62f504f21dfcb8f8278f9e4e668330', NULL, '79.140.217.234', '2020-08-10 12:11:45', 1),
(51, 4, 'fcdc4df5e657f74424d0363f289a626fbd012f0e', '6923a5bf53fa02c3aeaa5e92fedf51c87ed24e12', NULL, '79.140.217.234', '2020-08-10 13:03:55', 1),
(52, 4, '8c343f2cd22ce0fe5b8491a92d711cee2b0dabc1', '83733d0a1bac9867838fbc577ba83fdb4a1a0776', NULL, '79.140.217.234', '2020-08-10 16:56:21', 1),
(53, 4, 'f8f78c37c061f2679568ae31effe217bae15726e', 'ca32877bd08753fc36b41a2c92ddf12d73248832', NULL, '79.140.217.234', '2020-08-10 20:45:54', 1),
(54, 4, '789a7c6a5bc3b9b2b21a8d301cf8bd85fd08136c', '1fa05d11bd48a0940072c401ed1ccd0cd676e799', NULL, '79.140.217.234', '2020-08-12 10:14:26', 1),
(55, 4, '529ff4978e1017a0ad7aa49cc7c5a7e4649f88fd', 'caabcc26f7918eb8bd98443d4bad142d27ce9062', NULL, '37.73.27.96', '2020-08-16 19:39:44', 1),
(56, 4, 'c637441e5f6b39571a6465f7b94e5e64d566393a', '4d61651fe283256ca8bea71c8a102054d3a753ec', NULL, '94.158.151.250', '2020-08-18 19:36:19', 1),
(57, 4, '465bb021a0ab5af32579355e62bbc58f9e7a061d', '3af14f5df2f18eb06af06d039360052c03f56e2c', NULL, '5.197.226.17', '2020-08-18 19:37:04', 1),
(58, 4, '813547ad0619fb4cfae9830959c8b129b1a2e966', '0ceeacd26011c4bcb52b01aacc7d1256d37fa5e9', NULL, '94.158.151.250', '2020-08-18 19:56:08', 1),
(59, 4, '2fb48ac13b56e27d558628d789975c44211fcd4e', 'b0f1da5bfe674a5986e36443b5a1692907724544', NULL, '85.238.97.20', '2020-08-20 19:53:46', 1),
(60, 4, '6b1bc3d4a5b7fd339bac66830e8f5c567a22bb5a', 'b986a33150bbf0866c1a3f1c8ccb03142781eb24', NULL, '178.212.192.135', '2020-08-22 14:48:15', 1),
(61, 4, '39aeee3cc3c342196f782ef5d2a26a602dd99810', 'd1b76d52aed62bfba73bf6913ef4d07e1ca99038', NULL, '37.73.91.91', '2020-08-23 15:33:52', 1),
(62, 4, 'b549d88c5288e5a5133d3e370706c96ab2d56fd8', 'c3e2c90f5a401b1f14e578bc6e9a840b7025af8f', NULL, '46.37.200.108', '2020-08-24 01:19:25', 1),
(63, 4, 'e51ea49871c1542c82e6050a7f9c9d561bb4c020', 'c6a00131a352a3fad02da1dfd09ca6db2c20983c', NULL, '195.138.76.23', '2020-08-24 11:05:59', 1),
(64, 4, 'd9c897692bdd498262a3b0b2cdf8447ff9c9a58b', 'e8223250ff8b604610c526758fe6aa4acbe86e56', NULL, '195.138.76.23', '2020-08-24 11:37:51', 1),
(65, 4, '28ec669edef050f35941f2c6d46553eedcd837a0', '583622fa5dbdb34a7138c659d39e27807c500139', NULL, '46.37.200.108', '2020-08-25 07:22:57', 1),
(66, 4, '9188549b371cc364aff23f05327761cb92c8f2b6', 'a5f2c6353798122e91284e591f9497fc98175e28', NULL, '5.197.226.17', '2020-08-25 14:44:03', 1),
(67, 4, '4e9c1340f91bec8a702893bf290622a6534b4c35', 'd22bec64824c8b568e1a51baa7670a33184cc529', NULL, '80.90.225.135', '2020-08-25 14:51:03', 1),
(68, 4, '2ddac42bb838b1880dcb4aaf2d81ff04f398278f', 'd6aadbbc42b234186f8b1fe52dae9fe514d63f2b', NULL, '46.151.199.237', '2020-08-26 14:52:13', 1),
(69, 4, '839b0d2b15a95d02466c0221040f5fecef692f08', 'af222f4212d0d6f49eee9753ae479b5c0f5a0ab0', NULL, '46.151.199.237', '2020-08-26 14:53:46', 1),
(70, 4, '6245964a6a142e7e2731a07e4f74783c28ddb255', '1dcc1622f239750b8b3ddf08a38934b73ec4e3ea', NULL, '94.158.151.250', '2020-08-27 16:27:06', 1),
(71, 4, '140cbcc78fada8e298d59513c4360c49819b9a4e', 'ec898da3bf5ce0eb91d6d913ece736ba0f9fbd5a', NULL, '94.158.151.249', '2020-08-27 20:29:14', 1),
(72, 4, '6d77892598a59f40eedb5ef98f9ba2fba9357c4c', 'a2d5fa0a71e3bf09a4cd6e6aaae756fe44cc5461', NULL, '5.197.226.17', '2020-08-28 17:09:43', 1),
(73, 4, '2ddcf8f8e6f1e2fe840d76ef142a71fabd5c80a6', '0721ee321969326cec420f2342f9e2b2011643e4', NULL, '88.155.117.36', '2020-08-29 17:03:04', 1),
(74, 4, '07f0a510cf1857dca7b9bc9d9d796e087f314ffe', '904a9bd42b3c3a536d0b5e93dfde8b00bf0c01d7', NULL, '5.197.226.17', '2020-08-31 22:32:26', 1),
(75, 4, '70cb712070d0a16d1e3a4bf983fbded656c23cc3', 'f2badff327f08ff38422e5204a982074c9371dc0', NULL, '92.253.240.64', '2020-09-01 10:17:01', 1),
(76, 4, 'd3e950891b7ed21b21a75257bc81084c4a0652cc', 'efcbda29f5d5ff702f46558682ba1e38e97a6521', NULL, '92.253.240.64', '2020-09-01 10:19:12', 1),
(94, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 04:07:56', 6),
(95, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 04:08:03', 6),
(98, 4, 'a841c4a0f44b5994aaf647e82b75f297c5901dcd', '4262adde101adc97617c7b975cfe8d1b556e6bd4', NULL, '141.170.229.135', '2020-09-02 04:23:30', 1),
(99, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 08:23:12', 6),
(100, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 08:23:15', 6),
(101, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 08:23:17', 6),
(102, NULL, NULL, NULL, NULL, '141.170.229.135', '2020-09-02 08:23:21', 6),
(103, 4, '1e8bc204878a25d0c7c3e9bfea0731c1df8896c0', '96e5cdeb217a3c0b7a94fe7529181561a6f53221', NULL, '141.170.229.135', '2020-09-02 19:09:55', 1),
(104, 4, '5a7608eca1e597f9125e8b632073cebca628757c', '4cc8016c0254411897d178078d18018fd8a04155', NULL, '141.170.229.135', '2020-09-02 21:40:41', 1),
(105, 4, '5ae40a482029924069fafdb7c92e7910bea818f7', 'b435ac90013e8048d052b9a346f8e798da2ba976', NULL, '77.120.33.44', '2020-09-03 19:31:21', 1),
(106, 4, '1332d0838f6670106bbe2df153d26f7145efad96', '2767e0e75ba474f2416f01b433f0e134e6b81a96', NULL, '77.120.33.44', '2020-09-04 11:41:33', 1),
(107, 4, '531a2f632559b7c20599d9df218be10c338972f0', '514ceb02f55fbe4a30c0fb3aa917042e0daf0488', NULL, '77.120.33.44', '2020-09-04 17:50:09', 1),
(108, 4, '55912d56b5109e63333bb9bfd7b07d865048cbd8', 'b0f0c36862e5a8569cf19ed2c5fde2fcec248c76', NULL, '5.197.226.17', '2020-09-04 19:36:14', 1),
(109, 4, '2f8685853dccf593846cdadbe9b11c8b9af72e5c', '472c8b5dc05c2bac3937be91a56d8abbc0304396', NULL, '5.197.226.17', '2020-09-04 20:46:04', 1),
(110, 4, '2ecc1dbe9704f8666fd4b97c9aec5bfcc573d5d2', '9c919c1ab00cd424268e6f20dc82d62fc2463ffc', NULL, '141.170.229.135', '2020-09-04 22:21:38', 1),
(111, 4, '19e0ce770abd02da0416f062331f1559660e15dc', '6e8871c4758955fd871597aa69a2945754081946', NULL, '185.94.216.27', '2020-09-05 14:48:20', 1),
(112, 4, 'eff762dc950f5881f48176c866c1ac56a61052e0', '5e6f994c5bb8b668aeadab40aa01c2bee2fe7a28', NULL, '92.253.240.64', '2020-09-05 16:06:25', 1),
(113, 4, '3940bff3f087a9e9ac9959f1b51ad3f185e3da2c', 'c9ddcd10b4106afa2152c6c8afa0828eafb5b68c', NULL, '92.253.240.64', '2020-09-06 08:49:17', 1),
(114, 4, '3ee88da97f25c95a1196b0402b146cc6e0e3078d', '64ad8d4574f722e848ae0d689af0f6ff6b760ac1', NULL, '92.253.250.193', '2020-09-07 11:45:54', 1),
(115, 4, 'aa3843fed9cd13e51f6738daf51a3ddc0c1d12cc', '9a4e20ab5bdd103d581a680231557ec25601575f', NULL, '92.253.250.193', '2020-09-08 09:23:26', 1),
(116, 4, 'a4551abdb36296e1f6512488a4ffc9447a43b902', '2d5b016556d1be9d7232a574b90185b9bb35e05a', NULL, '77.120.33.44', '2020-09-09 10:54:44', 1),
(117, 4, '180eb801d8ca13eefb17abd7974bee5061ab0d19', '820ed735249f38361ba330a1fbb899ba2454e414', NULL, '5.197.226.17', '2020-09-09 22:28:38', 1),
(118, 4, '195ffc2ebc8181cf6b2ac33e34d5ef7f4b49f0fc', '7d67f95881ba5859ff7c5bd666a0a3613a72604c', NULL, '92.253.250.193', '2020-09-10 09:11:38', 1),
(119, 28, '3ba3006c4f5139d460363fe9f7e831bf62f87cc1', '352f6bb1599ccad9c955eeb6a1f5a412e4644dbb', NULL, '188.163.92.103', '2020-09-10 16:11:41', 1),
(120, 4, '4a826885b61e247010b0140f8c2bacab58760f3a', '1c9b8de9560ba7bdcf40730ef1c168f03e306a61', NULL, '85.94.241.6', '2020-09-13 19:33:22', 1),
(121, 4, 'aee34631317fda824f7e0d5523c91028b48573ce', '6874e522e4d99ee7e8a2cfb16612af25de6f9988', NULL, '85.94.240.220', '2020-09-15 09:53:10', 1),
(122, 4, 'bfd783fab30049f7d7b7dacf4f39f847561c9507', '020e1969bcd4ec303c00c0ed1492caf69f8d956f', NULL, '85.94.240.194', '2020-09-15 12:44:57', 1),
(123, 4, '9aa8b0249837da5a88975f3ab2c39b9db871b9d6', '1fa0d9356bb6bbeddfa7211f4af7a36b109c7b80', NULL, '85.94.241.16', '2020-09-16 23:54:18', 1),
(124, 4, '0b5b05d5d9567f259449fabe4742c8fe368bcd16', 'fd8bbecff32a4cdd679daac7f911e4e63501aa77', NULL, '85.94.241.16', '2020-09-17 10:53:15', 1),
(125, 4, 'b1e250ddeb5c951b6ee25a97643de14c910d8721', '34a199b3322684bfa60d12d915d9f8e58e65251e', NULL, '5.197.226.17', '2020-09-18 11:44:03', 1),
(126, 4, '010b265c812567809dfbf1af0d40c8dc4d6ba159', '1d53e9000fc62f9e215c8ee02dc721ef7f5ba5f9', NULL, '85.94.240.173', '2020-09-20 09:42:03', 1),
(127, 4, 'fbd3c4e62590ee13d86c0f35bcf377812b5c1d82', 'cdd991419b5604f7b3fd6054f7ba8a485ff5b455', NULL, '85.94.241.123', '2020-09-20 14:38:01', 1),
(128, 4, 'b52344fe1179f76c67630a4c9917cbe01709ff64', '139f8dd18ef08116d94280d460333c4543132e94', NULL, '85.94.241.123', '2020-09-20 21:02:38', 1),
(129, 4, 'd616af0a19df744c8d95db27ccd4133ab8c75f34', '2a3c55b0367c36b76571f494bb7c0c8eea27ccf7', NULL, '85.94.240.92', '2020-09-26 09:59:54', 1),
(130, 4, 'b747f1d8a1bf73c6991839d085e9cc58b58324cf', '54a84956fa6ebdb89f563453b6bdb7e96f1d0913', NULL, '5.197.226.17', '2020-09-26 19:25:49', 1),
(131, 4, '65419c81b1ffb2072a4aaf88a17b0d615c1e66d6', '80a7a6b068df0a244037e7c4e78cc64f8cbf8535', NULL, '5.197.226.17', '2020-10-01 09:06:33', 1),
(132, 4, 'd7f218fc7a036b3c6d4ec0a5c642a66ae36b72fd', '3aef02626114dda91aa08587349dc6b95bab35ce', NULL, '85.94.241.144', '2020-10-01 10:25:56', 1),
(133, 4, '94dd9b070778c74a3aa9ef68682abeafb5b75882', 'c7a41b94dc5aea3ac15837fc66e45ffe7a4de062', NULL, '85.94.241.144', '2020-10-01 20:38:18', 1),
(134, 4, 'e56f34c5cba0a5754542b60ec934607127b34350', '960723e3ab8723768d9deb7c198645bbf5b9e6e8', NULL, '89.47.62.109', '2020-10-03 07:52:56', 1),
(135, 4, 'a60e1695e8dc76d3325d67219e216967cea0be81', 'c302f79fdf615ae041b792d24c31ea7c106cdeba', NULL, '85.94.241.182', '2020-10-04 09:33:07', 1),
(136, 4, 'af96a232fb1b4f65c6487959733681db0306c4e0', '89d2a16622f827afb8c7ad16840e40dfdcd0bd40', NULL, '85.94.241.223', '2020-10-05 08:57:07', 1),
(137, 4, '37fca4ce2782567062220d609b5db4de0da90863', '49fcc90f436f364feb27f8021ee41daf6469bc1b', NULL, '5.197.226.17', '2020-10-09 20:46:55', 1),
(138, 4, '21c6d3a1b6f3b0b573499b4cfb825f99a3c697d6', '8669fd7b5d2a7a5775d2ab0fa39d0517ca402cad', NULL, '50.7.93.83', '2020-10-09 21:14:17', 1),
(139, 4, '858bb125f6fefe6c8d9dd69c531ca38d399227ab', '6c53dc15f3f29d530fa178a734d492e1f94c3958', NULL, '85.94.240.30', '2020-10-09 21:28:29', 1),
(140, 4, 'c1fc76eb83b97bcd1f818516f884702d820dc6f0', '52c8c08fe1be71518019bb57a97ae2ff5fc6a98a', NULL, '85.94.240.108', '2020-10-10 14:17:23', 1),
(141, 4, '8e43013c5f751454e8f9e12b561d70192ea09421', '36d4a6750c92f53af71d48ce1afd78cc5a3b773d', NULL, '198.16.76.68', '2020-10-10 23:16:20', 1),
(142, 4, '19e0fc0759f98edb7baca780985e6cfcd5ec3676', 'b0916e6019dd1707e61bc4a5f009ed1a6a10a83e', NULL, '198.16.76.67', '2020-10-11 18:13:14', 1),
(143, 4, 'c7a03a06292190fd289f752a4e1c719bd4368e54', 'a3db2d55ea2ee5d2b6594d0cd17c044e7f3a8d17', NULL, '85.94.240.79', '2020-10-11 19:44:49', 1),
(144, 4, '5db253562a349c551bcbf0e086e659a1c7f86d1c', '85045d4510ff7d172a8f3e27ce75662b716497f3', NULL, '198.16.70.29', '2020-10-12 19:34:52', 1),
(145, 4, 'afc66e0329f2409ec4d3bfdec0e8a414e11668e1', 'c9d32e2809f7ac5c4663e0239fdd58cab29a3be8', NULL, '85.94.240.160', '2020-10-12 20:02:43', 1),
(146, 4, '217d1f0829ddd17138bdca67233bf4fdf5e208b9', '348c87b397698d89caa6475b910f8d3d2e35b25d', NULL, '85.94.240.160', '2020-10-12 20:19:55', 1),
(147, 4, '17d23005e08911644aa9c42eb7f6092006fdf7d1', 'c8ab6364f3bcec880534512608edf36ed19405fa', NULL, '50.7.93.29', '2020-10-13 00:06:40', 1),
(148, 4, '993f5b7e853dd4e9cc706898a5445bc2c45bff4d', '66e4d3d9cca4b38ff765aa1eb1b6b56f09ef066f', NULL, '2604:2000:1483:c3e1:389a:3590:310c:3cee', '2020-10-13 02:03:35', 1),
(149, 4, '587bd23c8a9e12fb72201c9c7b267ff15ae9fc49', 'b152d33da9c39b3ed7e0207b4f3c3cf348b88bcd', NULL, '198.16.70.51', '2020-10-13 18:41:43', 1),
(150, 4, '5831ae2d5a16311639224435bc8ccc00620a6fc3', '389c84608778939f6638e541a45b6c46970e1bc0', NULL, '85.94.241.99', '2020-10-13 21:31:18', 1),
(151, 4, 'e5a9a9b1421f72f88dcf0c486553d02b425e2d9e', 'fadcb7a75861879595dc6afe95b59d8680a45a0f', NULL, '198.16.70.51', '2020-10-13 22:53:09', 1),
(152, 4, 'd13ad6dc079a31d2481311038550673e413f6133', '21271ec1fef82c530eb4620f4c003ccd66d2028f', NULL, '85.94.240.116', '2020-10-16 00:48:56', 1),
(153, 4, 'a30600ad88759ffcdbf5c76e86fa1ce99a3e481a', '71a86655fd16c8d1fb75da8ea3782e13c3db5778', NULL, '198.16.74.45', '2020-10-16 00:49:05', 1),
(154, 4, '8d018d40aec6d9e852837068ece792850f7dda02', '54598f28203bc7e0a401f1e795eb3a35f675b72a', NULL, '198.16.74.204', '2020-10-16 21:58:53', 1),
(155, 4, 'e3df9f7a7e6c850464a47271067949125fd7f99b', '676571aa0bee1579de58a485119904cf0b030d7f', NULL, '85.94.241.231', '2020-10-17 13:51:42', 1),
(156, 4, '7e50708b41288984c52cc2249550dde661577755', '3511f76fb94ca96df1c9df693c07a2406f063fcb', NULL, '198.16.66.124', '2020-10-17 14:50:50', 1),
(157, 4, '0d0f2c5db8932c50f62d932d6b4d7a0329e56fd6', '1a8b79e502c34063635b1762e6acbc5b544ae971', NULL, '198.16.76.27', '2020-10-17 20:12:21', 1),
(158, 4, 'e77fc122f9671bbad01331254ca01b499018b4cf', '04fed75c21bd45787f5637771ee72af30911fbcc', NULL, '198.16.76.27', '2020-10-17 20:12:59', 1),
(159, 4, 'eccab112a35f2fc387933be4c63a7819741debb0', '35cefd1b59f1051a63e32ff5e28641666597ee24', NULL, '85.94.241.231', '2020-10-17 23:52:00', 1),
(160, 4, '26adad70216c61806875a4eb5f199ee75e7c9808', '27fee569a94539ec44301152f6dd5b8a78b1fbe1', NULL, '198.16.78.45', '2020-10-18 19:11:58', 1),
(161, 4, 'ce1c9dc1a7a5bbea9cea31b156c909c890001169', '4b254a9399f5260f5de3900a820564af8d97a3ca', NULL, '85.94.241.21', '2020-10-18 19:58:13', 1),
(162, 4, '125a92c66160753e365adf6a6dad5a770dcc6335', '78dfc4fd1c07a325f06c774316d7a1bef094084f', NULL, '5.197.239.120', '2020-10-19 10:52:57', 1),
(163, 4, '6ecb6cbe9d5eb474ece588d0333c3c52542dcc2f', '4a06968e191019e8ca7fe3f7affbb281b121f6a1', NULL, '85.94.241.189', '2020-10-19 11:56:37', 1),
(164, 4, '91d73295743ba9ae56d97fcda916cd8b284d8f2c', 'd122d1062e85633cfe276f2e8d6b8af6f7c1b662', NULL, '198.16.78.44', '2020-10-19 15:05:33', 1),
(165, 4, '8cb46ca3b5c9ebcd928e0350541befa44b537277', 'ddb94eb301d3ab44f0b5584c99875bc99f55b039', NULL, '50.7.93.85', '2020-10-19 15:13:33', 1),
(166, 4, '6c29365f8dc47497f796508370c1f0b3b845a094', '4ab53634e59bc7672a9e03a306b157aadf503e1e', NULL, '198.16.74.205', '2020-10-19 21:25:02', 1),
(167, 4, '8f43fd4ff51e63c9231b342e8a6a6f5248eac7fe', '225e06839c9dd9fa3de9e248810a8d55a3ff0ba2', NULL, '198.16.74.204', '2020-10-20 06:23:20', 1),
(168, 4, '9def6f5eff071287911c8c3be46bd301b63ae12b', '1906f5686f9387fbdc74c798167e414fa55771b9', NULL, '198.16.70.28', '2020-10-20 06:35:34', 1),
(169, 4, 'd113b44c8285c89881187daf1b29383d6323c7f2', '66c9134b1ad2ba0ed850d3ea289363f342f5edf6', NULL, '198.16.70.28', '2020-10-20 06:35:45', 1),
(170, 4, '066726c1aec72c71c6b2c03fe10344bb39cc2642', '571a6ab5deb9c25be15dee3cecb9dd2db70fcb14', NULL, '85.94.240.119', '2020-10-20 20:21:40', 1),
(171, 4, '73a09151786a4c24be0bad495dee70864034f8ce', 'd077185da01dd65bf2a6d2c5a9a84acdc9d8c49b', NULL, '85.94.240.119', '2020-10-20 21:30:35', 1),
(172, 30, 'c749def7447a0487f300d9e32392920daed6b21f', '35fa4d1b4b9bd8aa7e9e387f0889abc13a5436ea', NULL, '198.16.66.195', '2020-10-21 07:05:19', 1),
(173, 4, '302179df12f84d02f38095dd6efc77a3a12e4063', '6e86f35370ac3c0786950a7a21bf1af2e97ae3c6', NULL, '198.16.66.139', '2020-10-21 07:16:10', 1),
(174, 4, '529e7668b8046057bfae6c8661bcc8a95433fd03', '3ca445c26be6b2115ca240bc5f27e595f59b1128', NULL, '85.94.241.67', '2020-10-21 07:17:35', 1),
(175, 4, '2ef9b5edaa43ea23ede192b8f5117496abfe98e7', '270436129f7aceed84ab8067b69767fe0ceb5c2b', NULL, '85.94.241.9', '2020-10-21 11:28:47', 1),
(176, 4, '96b39463ebd011981609dcfdeca46108a749c9aa', '484515001cec248c2fb617f737f309ba3d0cec22', NULL, '198.16.66.101', '2020-10-21 16:20:20', 1),
(177, 4, 'e04cd6b1f54a537cfc3e8a891839c14a21ffee37', 'a0c85f4eaa9abc96a6a8bb06dd53c40f4ee0a4e1', NULL, '85.94.240.213', '2020-10-21 22:30:25', 1),
(178, 4, '4322475650d161fb4839920c93535b771d4e5e3b', 'd995eb01aee658e260aa9482ab05044dd4e95c2b', NULL, '85.94.241.142', '2020-10-22 10:17:55', 1),
(179, 4, '32bebc51da82bf719fb1efcb053e33fda4bb7fd0', 'c5c0fdd9b5727107e233abe0ea462d8628f218bc', NULL, '198.16.70.28', '2020-10-22 15:24:25', 1),
(180, 4, 'f8d2d78ea043b348617c5b3b9d45ba4cc96290f7', '3be6362d64e977dddf0f1026c535fdf7d27e436e', NULL, '85.94.241.142', '2020-10-22 15:53:37', 1),
(181, 4, 'b22476e8f2897bb8673857a67960931bd2debb44', 'e802bc4f25b58001729658b5d6dd3b6e5142e3c3', NULL, '85.94.241.142', '2020-10-22 15:55:06', 1),
(182, 4, 'a32ae62f5911341a210e84aab40cb0b76a09d673', '2ce9c1731c7e9147c8575c2b1e4c43e85ab3db04', NULL, '198.16.70.28', '2020-10-22 18:14:14', 1),
(183, 4, 'a220cc314d8a38bcd12977231987d9b0b3f51661', 'e0f2cbeafe627267b43d2d0ac0fb011de8c1d173', NULL, '85.94.241.148', '2020-10-22 20:14:58', 1),
(184, 4, 'bea4b35972788769d1297afb2553d0cd1a11b178', 'e440d12d839458186c1b3eb011c0ced584b9e7e8', NULL, '198.16.76.28', '2020-10-22 20:22:09', 1),
(185, 4, '246634db7e3743ecb4e3956fb34852f14711f020', 'b7cde3e97e03de10c4d1492d432cca347a5d44a8', NULL, '198.16.76.28', '2020-10-22 20:25:11', 1),
(186, 4, '4a1dd88fd62bf70967338d8ce4a457b03cf7ec40', '456be04410c428800856c0847ba23284ab1ab6fc', NULL, '198.16.76.28', '2020-10-22 20:26:07', 1),
(187, 4, 'e62d12f91351f65139a20231fca50f2fa4f246c5', 'faef393eb1d55d783dbc9e7e541fc76321c80e2c', NULL, '198.16.76.28', '2020-10-22 20:26:49', 1),
(188, 4, 'e6db97b613283d13d47c9cd1b100bd2bbfcef732', 'bdc37abf840d2884b818c47dbce9f3f711bb4753', NULL, '50.7.93.84', '2020-10-22 20:28:23', 1),
(189, 4, 'df472347a0b9a8467a5bfa1e949e243674df37cb', '3b80ec451d885eb12b4ae03cba01e5b662bdba72', NULL, '198.16.76.28', '2020-10-22 20:36:56', 1),
(190, 4, '46c689a2143e40c671b4bed7be9f727f929b6f2b', '7838298f2059b82de89ab72b7e95a379433dc4f2', NULL, '85.94.241.142', '2020-10-22 20:38:06', 1),
(191, 4, '7439692adc465fe17dc4598c710fc831f0f35433', 'a64017cd60a50bb308849066fd3309d672a53172', NULL, '198.16.70.53', '2020-10-23 06:27:09', 1),
(192, 4, 'd6d0bb1f2a99900687de34dfb8e7975d6b524782', '0c098d0699a2f80331a900cc295987cdcbac1466', NULL, '85.94.241.3', '2020-10-23 19:34:34', 1),
(193, 4, '2c0eacf76d99f5bbda3ba3320e2e0c8ec5e002bd', '50e04293fd7f15f7099301930a81a14e69b364c6', NULL, '198.16.74.45', '2020-10-23 21:32:00', 1),
(194, 4, 'eb47298711c2a74bb7a6400f5a196f35c0014d8d', 'b8ad8015af5a4b4452c2141c99702a2101e4c8e4', NULL, '198.16.74.205', '2020-10-24 00:34:11', 1),
(195, 4, 'c80d59bc4934c1331215a026c67f10621a6d2365', '525a17d71b537190dce41ec6def0b036cdd911c9', NULL, '85.94.241.3', '2020-10-24 09:28:07', 1),
(196, 4, '55d5fe5cc3415742fce5470dd5c7e3e3021d597e', 'f7dc91865aa0fecb4838307e772a6c4d984b8cab', NULL, '85.94.240.55', '2020-10-24 12:34:45', 1),
(197, 4, '09a8d72f6dda5ce6dc4df2efabd8032c0b6e5d8b', 'ad5fb4e06ddd8ac656eb4855de4fd7a79fd5e3f7', NULL, '198.16.74.43', '2020-10-24 17:25:25', 1),
(198, 4, 'a6c3d26bb3c14353b81f7010cb4c2c8ec7d2203d', '8a48480c9d75727230e44d7e63bf4e069e96ea06', NULL, '85.94.241.95', '2020-10-24 22:38:13', 1),
(199, 4, 'a478be4503458bc36e12b6ffa890fc252d13dfa5', '01d55a77ddbc3f68a77d224e78366a84077052a2', NULL, '85.94.241.95', '2020-10-24 22:48:04', 1),
(200, 4, '807f8c5524a26b8a39a247e9cf51f0a1deb9a2e6', '1c88bfd8c4da8b7ee41d5d3b50c7096d873a0f33', NULL, '198.16.66.157', '2020-10-25 18:00:24', 1),
(201, 4, 'de647feb6a8e8a8dd93e3b9b26772ce9a80ef172', 'a6da60aa913a0dc0a47b62e02f5235febfedf993', NULL, '85.94.240.136', '2020-10-26 14:46:20', 1),
(202, 4, '41ce22b45761764b4c58e60846593059b3de2bbb', 'b18b69ba8061fa2ab7e3378a4e4e3f91469714c9', NULL, '198.16.66.197', '2020-10-26 18:13:49', 1),
(203, 4, 'fec2c596ebfe769a1e7d97f6f8610022023ce8c7', 'ff4bd6af6fd8383320f6b690c21a7ad9d56caa67', NULL, '5.197.239.120', '2020-10-27 09:23:38', 1),
(204, 4, 'c2a88ce481acbc88fef4049b275a374db1240307', 'b25649b9221ed2dd7abf7ea88d659cea319b785b', NULL, '50.7.93.28', '2020-10-27 17:48:06', 1),
(205, 4, '71e381fa7c846c0e4dbca044cfba86b9f9fedba6', '4f17080ee1a594acec082b4139eabe23e635f1f0', NULL, '85.94.240.203', '2020-10-27 18:06:45', 1),
(206, 4, 'd81ecdd25315c87fa654b5a5c9d6ed6a6afc8503', '1e8a5792f223538a09777657673525c5d0d2aab6', NULL, '5.197.239.120', '2020-10-28 09:38:56', 1),
(207, 4, '57892960d823e9f9008d9649c0ba13d5d8c4fc40', '94cf103c0875d2ce202f2835877d3b32fbe72230', NULL, '198.16.76.67', '2020-10-28 20:12:12', 1),
(208, 4, '964dfc6a86096113bb0c1fa53ff93ea3998022bf', '36ca956f16764073b985b7fea0a5fd73de14b3c8', NULL, '85.94.240.91', '2020-10-29 00:14:38', 1),
(209, 4, 'c7ba01cbe6b6158bb9c88d8160d11890b74e204e', 'fa0136fb30b556370fe123639f8075dac639d22d', NULL, '50.7.142.179', '2020-10-29 14:05:26', 1),
(210, 4, '9ae2d0bd91c97134c1f2a3d6d799f4083fc8efb8', '51a38456551bbf377e14d4ff21f3ba1803dd4869', NULL, '198.16.66.196', '2020-10-30 06:40:27', 1),
(211, 4, '0153320d6138bf6d66b40f92abaaf6d57150c31e', '4cc48fbc00cf5bc10066930e2956a4011bc9b263', NULL, '85.94.241.36', '2020-10-30 08:24:47', 1),
(212, 4, '0d3afff0309fa2f59ba6f790830fb5f84f9f2248', '2083c50f473b3f92dc6c30e21871f19225e8d631', NULL, '50.7.93.83', '2020-10-30 11:56:02', 1),
(213, 4, '2b0d536fad70f431a486cdaf67c66c5c7b7811a8', '21d323d4e71dc2fd36bb89dd7b5abfa7e77e69ed', NULL, '85.94.241.54', '2020-10-30 22:40:41', 1),
(214, 4, '3957370e19cd399892878337cc34371b2e93cf02', '589a77bbfbcaec528439a0c187ebd728a52aba41', NULL, '198.16.78.43', '2020-10-31 13:23:30', 1),
(215, 4, 'e1d607ab5ba5e9bc08992b77f85693c1fcc775b7', 'f6ccb137323b95defb4f918261cc13293091143a', NULL, '198.16.78.43', '2020-10-31 13:24:24', 1),
(216, 4, 'b214914841c98437008e824b66581ca155ab2836', '813e6ee0c0af9cd29ff5b80b7fcd3d4293922423', NULL, '198.16.78.43', '2020-10-31 13:24:35', 1),
(217, 4, '97a4797fab4a19468557d84828cb1e88a5c7d237', 'e7e2ad125a050e04735210b4a175ecc4718ea823', NULL, '198.16.66.125', '2020-10-31 17:31:23', 1),
(218, 4, 'a84ca85cb944ee3cf8c504408245cd7549f25d68', '071e3780bca0bc4d52dec3ebd62aa1c3f116f5ef', NULL, '85.94.241.80', '2020-11-01 00:05:20', 1),
(219, 4, '902d589a955191d1230d06f2b40680e626ffacc4', 'c95e04c28a663a0d90bf10a646420ba1f5d2ac83', NULL, '85.94.240.224', '2020-11-01 12:06:42', 1),
(220, 4, '6b0dca91b8a532ac22db3068b125d35438719ab2', '54dc900ad774d1323fde8b08612c41b844513c92', NULL, '198.16.76.27', '2020-11-01 19:48:24', 1),
(221, 4, 'b2338846f8683ccee298cd19c9d026324f4de70d', 'a33fea4714bf9222a178b81f6232f15ebe63d111', NULL, '85.94.240.224', '2020-11-01 21:38:10', 1),
(222, 4, '2514f354fb759291ac0a13f04f3105978421afab', 'd6f6dd9543c95be620c62deec7c80b47699f89e0', NULL, '5.197.239.120', '2020-11-02 07:10:24', 1),
(223, 36, 'd15f5211065729f37780a4a7aa05e5377c0d90cb', '45e9cc9e24188338ced495d311d04b159239c91b', NULL, '178.62.200.234', '2020-11-02 07:43:05', 1),
(224, 4, '6c961f30014634b9978e0ac1b2de2abb0dc6c14b', '760babadab2bfa8eed50c2d913f848e65461f892', NULL, '198.16.70.53', '2020-11-02 19:52:38', 1),
(225, 4, '4cb953778d12cf92faffabbdd2fb5f5c52caede6', '5931ce69c0242c98dcf1306dc755e2291be6c79e', NULL, '198.16.78.43', '2020-11-03 06:41:53', 1),
(226, 4, '4836dfa09f9e196169bf26ddef8a4453f445b8f8', '8f18b0301b0f771dfa748a2894547884b6710330', NULL, '198.16.78.43', '2020-11-03 06:42:08', 1),
(227, 36, '1ce9449f11c777390966fcc04a09336abd808c22', '9ffcc2ea679e47dc046b6fcf1e6fd477c907f1e6', NULL, '54.37.136.66', '2020-11-03 09:56:04', 1),
(228, 4, 'b5904b7bcdb50caf2f4c44c1435ed3cc5636d990', '6f5d191dbc1a8f94df80947ddd283d1a09a32d5c', NULL, '85.94.241.55', '2020-11-03 12:24:06', 1),
(229, 4, '8118f333cdd83ba3391ca26be98a59b002ec62b9', 'e8c27fd9d229ba82ca5629a291d8824d46ed5fee', NULL, '85.94.241.55', '2020-11-03 16:20:20', 1),
(230, 4, 'fa7399270351fafb61a82a6c544727a19de755ba', '89a2d2d2b84c08701985b9362bc0082e91649e11', NULL, '198.16.70.53', '2020-11-03 18:38:27', 1),
(231, 36, 'b20b68a6eaf53c05b4e9ba73be18280076f6b53b', '2b4f3866d7fa7329b497f89b72dd014467cd4fc2', NULL, '51.158.102.138', '2020-11-04 15:33:50', 1),
(232, 4, '0cfd34ce64f587c936f5c651639b2b254fe68e04', '39e81e49e726463374a9c6cdeccbcf9335e0cbca', NULL, '85.94.241.203', '2020-11-04 21:39:08', 1),
(233, 4, '253a7ee68efa543da3c0124d28e6bdbca25ef840', '91f61e843dc6fcfbe44923b24665d145ef27ab7a', NULL, '50.7.93.85', '2020-11-05 07:50:48', 1),
(234, 4, 'b8825fc38ab0d93e1b70ecaf3a81d3f9c1ea8031', 'd2725b159da516b0f87f6e826862d267b4a3b356', NULL, '2a00:1838:36:275::c64e', '2020-11-05 08:56:54', 1),
(235, 4, '8f46d41a64917ddbd48b50adafe2d9dae74e894f', '39e1f87f9373aeebcfae5fdc577c62338fc3d3e2', NULL, '198.16.66.155', '2020-11-05 17:36:17', 1),
(236, 4, 'e6f76c8f0016ae0c55a517aba37282f9c669ff0b', '992d0073de433d0da65e8ade7140003edea51d06', NULL, '198.16.78.45', '2020-11-05 19:11:17', 1),
(237, 4, '2aebc483e9bcfb6d56748510fbc20b1a6f83042e', '7cf43b1ef89dd75780d145a1f7bf93f25c64204b', NULL, '198.16.66.139', '2020-11-06 18:07:40', 1),
(238, 4, '4faa9d9b20e94b14700569b153ba223b9e99f7da', '5f03f381de5fa79688ac8cc54c2438d51f0e457c', NULL, '198.16.66.139', '2020-11-06 18:07:51', 1),
(239, 4, '0da173377ac3ddacc0cb63b5b968b0c70f880461', '094b61efdb81d73f341557b565907540fa60eb03', NULL, '198.16.70.27', '2020-11-07 22:04:15', 1),
(240, 4, 'bd355ed7f515eb5c33a219199b885bd29ba7305a', '02056a5138af8cb6e45ca69ca9c20d56e221b6f1', NULL, '2600:3c01::f03c:92ff:fe64:fc44', '2020-11-07 23:28:23', 1),
(241, 36, 'e81add888bb326682b562bdf1a7c07d0376e126b', '62bd44273789ff9f982ccf64f4a6e2fcb5aedd00', NULL, '161.35.154.195', '2020-11-09 06:24:45', 1),
(242, 4, 'f40b09ba711681d892b3fe745cae9110ec335509', '652b10b29ad0bfdcc446b7a617823f9c51c4e5a0', NULL, '5.197.239.120', '2020-11-12 13:33:34', 1),
(243, 4, 'b1f6350c5a189a9ff11cf440f84ac5a21168c5f3', '89407a0a1c71777ae9a605686c2ff9cc85657862', NULL, '5.197.239.120', '2020-11-12 14:13:00', 1),
(244, 4, 'c841a4e406c4643fd8905061196543178205091a', '71871c520bb9ca2414071865bc621e790d10afe2', NULL, '5.197.239.120', '2020-11-12 14:14:48', 1),
(245, 4, 'd0248286d0e7566f717a9679110ca539bae0e20c', 'df842c89c826c53084a80782347bde958495de9d', NULL, '5.197.239.120', '2020-11-13 06:26:13', 1),
(246, 36, 'f0aeb62a8a9a0ccac7fb8bd7b35b0fe84c873b8d', 'a343e92974a7ac9e307d39893a2e1c8153371150', NULL, '188.253.234.144', '2020-11-14 09:43:42', 1),
(247, 4, '094aad9d6b49d42689356be27d3c5295ff7ce37f', '559420571b5fb53585a65bd5aca81d2216e2cb62', NULL, '37.154.199.219', '2020-11-14 19:57:00', 1),
(248, 4, '2b4b52d67856cbbda5cdff58a9365aed94e79379', 'd565acea2d2f266b220f379c9fcb6d959e92faa1', NULL, '88.241.121.199', '2020-11-14 22:07:19', 1),
(249, 4, '5e4643ffaeeae6cca604d0a86f93b902cf50b3ca', 'f06ad14e50ea92ae9b3b8cfbe53effafd6cce2ee', NULL, '198.16.66.195', '2020-11-15 18:30:20', 1),
(250, 4, '26a21cb2703a9e0d789a98339916ea1301e9b879', '54a8fceff494d34b259166b6dc49da7e0ba79a06', NULL, '5.197.239.120', '2020-11-15 20:18:01', 1),
(251, 4, '7b7b5136aa981bc0c084ce7476af56e520cbd40d', 'acbb4423b3958a399f8fa7f602011e09d99c755e', NULL, '198.16.66.195', '2020-11-15 20:42:24', 1),
(252, 36, 'ef865f15a2fb2eca7a108a127184f1db4b7064e6', '805a2fcef48e0b9e4d5bee9c0193215767990e23', NULL, '188.253.236.14', '2020-11-16 13:18:16', 1),
(253, 4, 'd2b0ad71a2e8d88f36b03343eb4dfe819ec68eb4', 'cbe8ae4b1b3580485ac8be2ff4945fa395c22a0d', NULL, '5.197.239.120', '2020-11-16 13:40:47', 1),
(254, 4, '4fa0200726452edb814a401f5f686e4da4a01c09', '652425920588822f5200540db4ba5c81f6253bd4', NULL, '198.16.70.53', '2020-11-16 16:45:56', 1),
(255, 4, 'd9e2a741b14aef4746e6cf0bfbae960a07f8927b', 'd1e437165fbab04d34ab61775df31e883a53644d', NULL, '78.174.183.188', '2020-11-16 20:21:01', 1),
(256, 4, '99cb838463483e4327d4a7eb6336b4eeb2fbbabb', 'c63ead2f90798c062abe448794e1079113d364f9', NULL, '5.197.239.120', '2020-11-17 13:11:14', 1),
(257, 4, 'c030004d9a352b2ae1cf959e0a081d0ce4a45383', 'aec4f1c0a2648d5388f1381930c36e319afae61e', NULL, '198.16.74.44', '2020-11-17 17:58:30', 1),
(258, 4, '205a58c1a906ced3538178cd5a4d4e86ceffbe4b', 'b96fa1be26506a34737d31f907e6322d454151f8', NULL, '198.16.66.157', '2020-11-18 10:20:10', 1),
(259, 36, 'fd5dee7de2af6d0b4d513bc3541a15721e61207a', 'b39942b8c8e66ae9b88157f8fc6e8650cb6245eb', NULL, '188.253.239.155', '2020-11-18 12:54:19', 1),
(260, 4, '244dba283a098cfdb825caa7a22e31828e632b18', 'e4629a0f1140af374d1dad5160172a1ea64e72ba', NULL, '5.197.226.70', '2020-11-19 06:13:18', 1),
(261, 4, 'ee5e2e0ca82b01070ba7cb89bdfe1533e98f7fb4', '8fd6bc61877ebdd4fc171bf4ae7456ea83b7e5ff', NULL, '5.197.151.213', '2020-11-19 11:10:10', 1),
(262, 36, '4f97f116d46b972397e7e6132f0e581f5073615a', '6c255eb8c711148507a5b24ae6e366a59a4de872', NULL, '188.253.225.193', '2020-11-19 12:51:03', 1),
(263, 4, '7db5893ea03ba0d9aa679db3fdd8db6d4b0f1471', 'd4e12aa37ff3dfc4b0e37b85ae9b85291fee8596', NULL, '89.147.212.18', '2020-11-20 13:41:02', 1),
(264, 36, '0c236c91c7c6fc69d215f50027953653b0c6f613', '910bbe7115d6940285aeb3beb4d9bcf328ceb7cf', NULL, '5.197.247.61', '2020-11-21 21:38:01', 1),
(265, 4, '6024a6165ef5c72ad1b4f8cdd410d68ffbb1acf3', 'b2952cd24d77a79522468e330ffb95ca50ae5555', NULL, '5.197.239.120', '2020-11-22 12:42:24', 1),
(266, 4, '58c9b83c96721cc9431c495f4a7d951f49d3f940', '06503b26b431bed0d4f0846166c85a017c7f3622', NULL, '185.153.151.147', '2020-11-23 09:18:23', 1),
(267, 4, 'ad5490c1c69d10255aee9c5ee73217247d37456b', 'c663346a656aec2348e6e237c1e8fbf67c55cd69', NULL, '185.153.151.99', '2020-11-23 19:55:26', 1),
(268, 4, 'ffc93b04fc62cd48da0f18eb554c6aa54614b6fc', 'f69fb7e059331256d9e74598ffa75a7b02849666', NULL, '5.197.226.70', '2020-11-23 19:57:26', 1),
(269, 4, '27c2b9eba8d21d3410bf1fae755987b60a89c815', '76dbab5f7bc3613cc979c4448b357e4484c808cb', NULL, '5.197.226.70', '2020-11-23 20:07:23', 1),
(270, 4, '0dbce25b68838c06bfcb4bbc959dda995e330a11', '8e542e061e7cb120da6c360e6fe517756dba85c3', NULL, '5.197.226.70', '2020-11-24 14:39:19', 1),
(271, 4, '10fceb3bdc8678a1c7bded1bbf9ae5531b7fd0a4', 'f5a6498be6403ddd33612645c93823844e04f99d', NULL, '5.197.151.213', '2020-11-24 20:20:50', 1),
(272, 4, '0151c73431ab60235555275acb02a16f532659fe', '61aa114386954661a8670f484ca05c4b02fb2d3b', NULL, '5.197.151.213', '2020-11-28 01:30:16', 1),
(273, 4, '5c83d02ada0e54e4ddec8e4ca84e80c0f0fbd83d', 'a0386ebf18c0c57e0f93cbb4e8580283ef2b6799', NULL, '5.197.226.70', '2020-11-28 20:14:34', 1),
(274, 4, '6ee83cab7fa0a8898d01e47877fdb925e4a62bc9', '45fd8f4e366b70cb4bc00d54c3e5d1537f3716e6', NULL, '89.147.201.162', '2020-11-30 06:13:09', 1),
(275, 4, '62b474af096ec7eaaeb1ab5e2d5df5dfd6a98535', '47982b0fa737ad174e949d7b9a72b1c451f0ee64', NULL, '89.147.201.162', '2020-11-30 08:13:23', 1),
(276, 36, '6173183e5cb247163106ffb2e532c4d047fa851a', '66f3aa1bd56d2a011839ef0d36d5ee05243a4eed', NULL, '89.147.201.162', '2020-11-30 10:55:54', 1),
(277, 4, '23606b1f95a0a0b25792cfca5df5891dff8f9ac6', '53f741bf4846a5995aaa6417ec03ef7fbad18c30', NULL, '5.197.151.213', '2020-11-30 15:46:31', 1),
(278, 4, '3e97dfbfe6a58a436664efd1939bdc83508df3d3', '3605f595e393c4e72427b27ca49a219431cfab93', NULL, '89.147.201.162', '2020-12-01 05:25:05', 1),
(279, 4, '68549228e937b037733399d4f0a9d59cb340abbe', 'de37d7b731e78ae05b68f4e6f4a8e99e7decadfb', NULL, '89.147.201.162', '2020-12-01 10:12:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `AccountVerifications`
--

CREATE TABLE `AccountVerifications` (
  `ID` int(11) NOT NULL,
  `PhoneVerified` int(1) NOT NULL,
  `AddressVerified` int(1) NOT NULL,
  `PassportVerified` int(1) NOT NULL,
  `EmailVerified` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CalendarEvents`
--

CREATE TABLE `CalendarEvents` (
  `ID` int(11) NOT NULL,
  `tst` varbinary(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CalendarEvents`
--

INSERT INTO `CalendarEvents` (`ID`, `tst`) VALUES
(1, 0x2afe1338cf04a64a9ba5da4191046f4b);

-- --------------------------------------------------------

--
-- Table structure for table `CityLoad`
--

CREATE TABLE `CityLoad` (
  `ID` int(11) NOT NULL,
  `LoadDate` date DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Count` int(11) NOT NULL DEFAULT '0',
  `Percent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CityLoad`
--

INSERT INTO `CityLoad` (`ID`, `LoadDate`, `CityID`, `Count`, `Percent`) VALUES
(1, '2020-11-08', 1, 30, 30),
(2, '2020-11-09', 1, 83, 83),
(3, '2020-11-10', 1, 77, 75),
(4, '2020-11-11', 1, 50, 50),
(5, '2020-11-12', 1, 21, 21),
(6, '2020-11-13', 1, 50, 50),
(7, '2020-11-14', 1, 30, 30),
(8, '2020-11-15', 1, 77, 77),
(9, '2020-11-16', 1, 88, 88),
(10, '2020-11-20', 1, 60, 60),
(11, '2020-11-19', 1, 55, 55),
(12, '2021-01-07', 1, 50, 50),
(13, '2021-01-08', 1, 50, 50),
(14, '2021-01-09', 1, 80, 80),
(15, '2021-01-10', 1, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `CommunicationMessages`
--

CREATE TABLE `CommunicationMessages` (
  `ID` int(11) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AccFrom` int(11) DEFAULT NULL,
  `AccTo` int(11) DEFAULT NULL,
  `Type` int(11) DEFAULT '1',
  `Image` int(11) DEFAULT '0',
  `Message` tinytext,
  `Status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CommunicationMessages`
--

INSERT INTO `CommunicationMessages` (`ID`, `DateCreated`, `AccFrom`, `AccTo`, `Type`, `Image`, `Message`, `Status`) VALUES
(1, '2020-08-26 15:19:23', 1, 4, 1, 0, 'Ya zayedu v kvartiru pozje cem planirovalos, zaranee blagodaru', 1),
(2, '2020-08-26 15:20:21', 3, 4, 1, 0, 'this is a system msg', 1),
(3, '2020-08-27 16:31:51', 4, 3, 1, 0, 'test other', 1),
(4, '2020-08-27 19:02:03', 2, 3, 1, 0, 'test from non related user', 1),
(5, '2020-10-31 12:55:50', 3, 4, 1, 0, 'Hey I cant reach you, are you here??', 2),
(6, '2020-10-19 20:34:13', 4, 2, 1, 0, 'Alex.M', 1),
(7, '2020-10-19 20:35:00', 4, 2, 1, 0, 'Alex.M', 1),
(8, '2020-10-19 20:35:01', 4, 3, 1, 0, 'teze bir soz', 1),
(9, '2020-10-19 20:35:02', 4, 2, 1, 0, 'Alex.M', 1),
(10, '2020-10-19 20:35:02', 4, 2, 1, 0, 'Alex.M', 1),
(11, '2020-10-19 20:35:03', 4, 5, 1, 0, 'Jump test', 2),
(12, '2020-10-20 18:42:48', 4, 1, 1, 1, 'annie-spratt-QckxruozjRg-unsplash.jpg', 1),
(13, '2020-10-20 18:46:42', 4, 1, 1, 1, 'annie-spratt-QckxruozjRg-unsplash.jpg', 1),
(14, '2020-10-20 18:47:01', 4, 1, 1, 1, 'annie-spratt-QckxruozjRg-unsplash.jpg', 1),
(15, '2020-10-20 18:48:15', 4, 1, 1, 1, 'dusan-s-ah7KHxYg6Ow-unsplash.jpg', 1),
(16, '2020-10-20 18:49:19', 4, 1, 1, 1, 'dusan-s-ah7KHxYg6Ow-unsplash.jpg', 1),
(17, '2020-10-22 23:05:48', 4, 1, 1, 1, 'annie-spratt-QckxruozjRg-unsplash.jpg', 1),
(18, '2020-11-23 16:58:50', 4, 1, 1, 1, '', 1),
(19, '2020-11-23 16:59:03', 4, 1, 1, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `CommunicationTypes`
--

CREATE TABLE `CommunicationTypes` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LocationAttractions`
--

CREATE TABLE `LocationAttractions` (
  `ID` int(11) NOT NULL,
  `City` int(11) DEFAULT NULL,
  `Longitude` decimal(8,6) DEFAULT NULL,
  `Latitude` decimal(8,6) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `LocationAttractions`
--

INSERT INTO `LocationAttractions` (`ID`, `City`, `Longitude`, `Latitude`, `Type`) VALUES
(2, 3, '49.864690', '40.375083', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PricingCalendar`
--

CREATE TABLE `PricingCalendar` (
  `ID` int(11) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Coefficient` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PropertyAmenities`
--

CREATE TABLE `PropertyAmenities` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `AmenityID` int(11) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyAmenities`
--

INSERT INTO `PropertyAmenities` (`ID`, `ListingID`, `AmenityID`, `Active`) VALUES
(264, 2130, 1, 1),
(265, 2130, 2, 1),
(266, 2130, 3, 1),
(267, 2130, 4, 1),
(268, 2130, 5, 1),
(269, 2130, 6, 1),
(270, 2130, 8, 1),
(271, 2130, 9, 1),
(272, 2131, 1, 1),
(273, 2131, 2, 1),
(274, 2131, 3, 1),
(275, 2131, 4, 1),
(276, 2131, 5, 1),
(277, 2131, 9, 1),
(278, 2133, 1, 1),
(279, 2133, 2, 1),
(280, 2133, 3, 1),
(281, 2133, 4, 1),
(282, 2133, 5, 1),
(283, 2133, 9, 1),
(284, 2134, 1, 1),
(285, 2134, 2, 1),
(286, 2134, 3, 1),
(287, 2134, 4, 1),
(288, 2134, 5, 1),
(289, 2134, 6, 1),
(290, 2134, 9, 1),
(291, 2135, 1, 1),
(292, 2135, 2, 1),
(293, 2135, 3, 1),
(294, 2135, 4, 1),
(295, 2135, 5, 1),
(296, 2135, 9, 1),
(297, 2137, 1, 1),
(298, 2137, 2, 1),
(299, 2137, 3, 1),
(300, 2137, 4, 1),
(301, 2137, 5, 1),
(302, 2137, 6, 1),
(303, 2137, 8, 1),
(304, 2137, 9, 1),
(305, 2138, 1, 1),
(306, 2138, 2, 1),
(307, 2138, 3, 1),
(308, 2138, 4, 1),
(309, 2138, 5, 1),
(310, 2138, 6, 1),
(311, 2138, 9, 1),
(312, 2139, 1, 1),
(313, 2139, 2, 1),
(314, 2139, 3, 1),
(315, 2139, 4, 1),
(316, 2139, 5, 1),
(317, 2139, 6, 1),
(318, 2139, 9, 1),
(328, 2145, 1, 1),
(329, 2145, 2, 1),
(330, 2145, 3, 1),
(331, 2145, 4, 1),
(332, 2145, 5, 1),
(333, 2145, 6, 1),
(334, 2145, 9, 1),
(335, 2145, 11, 1),
(336, 2146, 2, 1),
(337, 2146, 3, 1),
(338, 2151, 1, 1),
(339, 2151, 2, 1),
(340, 2151, 3, 1),
(341, 2151, 4, 1),
(342, 2151, 5, 1),
(343, 2151, 6, 1),
(344, 2151, 7, 1),
(345, 2151, 8, 1),
(346, 2151, 9, 1),
(347, 2151, 10, 1),
(348, 2151, 11, 1),
(349, 2143, 1, 1),
(350, 2143, 2, 1),
(351, 2142, 2, 1),
(352, 2142, 5, 1),
(353, 2142, 6, 1),
(354, 2154, 1, 1),
(355, 2154, 2, 1),
(356, 2154, 7, 1),
(357, 2156, 1, 1),
(358, 2156, 2, 1),
(359, 2156, 3, 1),
(360, 2156, 4, 1),
(361, 2156, 5, 1),
(362, 2156, 6, 1),
(363, 2156, 9, 1),
(364, 2158, 2, 1),
(365, 2158, 3, 1),
(366, 2158, 4, 1),
(367, 2158, 5, 1),
(368, 2158, 6, 1),
(369, 2158, 8, 1),
(370, 2158, 9, 1),
(371, 2158, 10, 1),
(372, 2158, 11, 1),
(373, 2161, 1, 1),
(374, 2161, 2, 1),
(375, 2161, 3, 1),
(376, 2161, 4, 1),
(377, 2161, 6, 1),
(378, 2161, 9, 1),
(379, 2162, 1, 1),
(380, 2162, 2, 1),
(381, 2162, 3, 1),
(382, 2162, 4, 1),
(383, 2162, 5, 1),
(384, 2162, 6, 1),
(385, 2166, 1, 1),
(386, 2166, 2, 1),
(387, 2166, 3, 1),
(388, 2166, 4, 1),
(389, 2166, 5, 1),
(390, 2166, 6, 1),
(391, 2166, 9, 1),
(392, 2169, 2, 1),
(393, 2169, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyBeds`
--

CREATE TABLE `PropertyBeds` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `BedType` int(11) DEFAULT NULL,
  `Active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyBeds`
--

INSERT INTO `PropertyBeds` (`ID`, `ListingID`, `RoomID`, `BedType`, `Active`) VALUES
(1431, 2131, 505, 1, 1),
(1432, 2131, 506, 1, 1),
(1433, 2133, 507, 1, 1),
(1434, 2133, 508, 1, 1),
(1435, 2133, 509, 1, 1),
(1436, 2133, 510, 1, 1),
(1437, 2133, 511, 4, 1),
(1438, 2133, 511, 4, 1),
(1439, 2134, 512, 1, 1),
(1440, 2134, 513, 3, 1),
(1441, 2134, 513, 3, 1),
(1442, 2134, 513, 3, 1),
(1443, 2134, 514, 4, 1),
(1444, 2135, 515, 1, 1),
(1445, 2135, 516, 1, 1),
(1446, 2135, 517, 1, 1),
(1447, 2135, 518, 1, 1),
(1448, 2135, 519, 1, 1),
(1449, 2135, 519, 4, 1),
(1450, 2135, 519, 4, 1),
(1451, 2137, 520, 1, 1),
(1452, 2137, 521, 1, 1),
(1453, 2137, 522, 1, 1),
(1454, 2137, 523, 1, 1),
(1455, 2137, 524, 1, 1),
(1456, 2137, 524, 4, 1),
(1457, 2137, 524, 4, 1),
(1458, 2138, 525, 1, 1),
(1459, 2138, 526, 1, 1),
(1460, 2138, 527, 1, 1),
(1461, 2138, 528, 4, 1),
(1462, 2139, 529, 1, 1),
(1463, 2139, 530, 4, 1),
(1464, 2130, 531, 1, 1),
(1465, 2130, 532, 1, 1),
(1466, 2130, 533, 1, 1),
(1467, 2140, 535, 1, 1),
(1468, 2140, 535, 2, 1),
(1469, 2140, 535, 3, 1),
(1470, 2140, 536, 1, 1),
(1487, 2143, 543, 1, 1),
(1488, 2143, 543, 2, 1),
(1489, 2143, 543, 2, 1),
(1490, 2143, 543, 3, 1),
(1491, 2143, 544, 1, 1),
(1492, 2144, 545, 2, 1),
(1493, 2144, 546, 3, 1),
(1494, 2144, 547, 1, 1),
(1507, 2145, 565, 3, 1),
(1508, 2145, 565, 4, 1),
(1512, 2146, 570, 1, 1),
(1513, 2132, 571, 1, 1),
(1514, 2151, 572, 1, 1),
(1515, 2151, 573, 3, 1),
(1516, 2151, 573, 3, 1),
(1517, 2151, 573, 3, 1),
(1518, 2151, 574, 4, 1),
(1519, 2151, 575, 4, 1),
(1520, 2152, 576, 1, 1),
(1521, 2142, 577, 1, 1),
(1522, 2142, 577, 1, 1),
(1523, 2142, 577, 2, 1),
(1524, 2142, 577, 3, 1),
(1525, 2154, 578, 1, 1),
(1526, 2156, 579, 1, 1),
(1527, 2156, 579, 4, 1),
(1528, 2156, 581, 1, 1),
(1529, 2158, 582, 2, 1),
(1530, 2158, 583, 3, 1),
(1531, 2158, 583, 3, 1),
(1532, 2158, 583, 3, 1),
(1533, 2158, 583, 3, 1),
(1534, 2158, 584, 3, 1),
(1535, 2158, 584, 4, 1),
(1536, 2160, 585, 3, 1),
(1537, 2160, 585, 4, 1),
(1538, 2160, 586, 1, 1),
(1539, 2160, 586, 3, 1),
(1540, 2160, 586, 4, 1),
(1541, 2161, 587, 1, 1),
(1542, 2161, 588, 1, 1),
(1543, 2161, 589, 1, 1),
(1544, 2161, 589, 3, 1),
(1545, 2161, 590, 1, 1),
(1546, 2161, 590, 4, 1),
(1547, 2162, 591, 4, 1),
(1548, 2162, 591, 4, 1),
(1549, 2162, 592, 1, 1),
(1550, 2162, 592, 4, 1),
(1551, 2162, 592, 4, 1),
(1552, 2165, 593, 1, 1),
(1553, 2166, 594, 1, 1),
(1554, 2166, 594, 4, 1),
(1555, 2166, 595, 1, 1),
(1556, 2166, 595, 4, 1),
(1557, 2169, 596, 1, 1),
(1558, 2169, 596, 2, 1),
(1559, 2169, 597, 1, 1),
(1560, 2169, 597, 1, 1),
(1561, 2169, 597, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyCalendar`
--

CREATE TABLE `PropertyCalendar` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `BookingType` int(11) DEFAULT NULL,
  `DateFrom` timestamp NULL DEFAULT NULL,
  `DateTo` timestamp NULL DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `Price` decimal(7,2) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) NOT NULL DEFAULT '1',
  `InvoiceID` int(11) DEFAULT NULL,
  `TransactionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyCalendar`
--

INSERT INTO `PropertyCalendar` (`ID`, `ListingID`, `BookingType`, `DateFrom`, `DateTo`, `AccountID`, `Price`, `Currency`, `Status`, `Timestamp`, `Active`, `InvoiceID`, `TransactionID`) VALUES
(127, 4, 2, '2020-11-12 00:00:00', '2020-11-13 00:00:00', 4, NULL, NULL, 0, '2020-11-30 08:29:29', 1, NULL, NULL),
(131, 4, 1, '2020-11-05 00:00:00', '2020-11-13 00:00:00', 4, NULL, NULL, 0, '2020-11-30 11:36:50', 1, NULL, NULL),
(134, 2130, 2, '2020-11-17 00:00:00', '2020-11-20 00:00:00', 4, NULL, NULL, 0, '2020-11-30 11:38:17', 1, NULL, NULL),
(230, 2130, 1, '2020-12-01 00:00:00', '2020-12-15 00:00:00', 4, NULL, NULL, 0, '2020-12-02 10:51:52', 1, NULL, NULL),
(231, 2130, 1, '2020-12-12 00:00:00', '2020-12-13 00:00:00', 4, NULL, NULL, 0, '2020-12-02 10:51:52', 1, NULL, NULL),
(232, 2130, 1, '2020-12-17 00:00:00', '2020-12-18 00:00:00', 4, NULL, NULL, 0, '2020-12-02 10:51:52', 1, NULL, NULL),
(233, 2130, 1, '2020-12-27 00:00:00', '2020-12-27 00:00:00', 4, NULL, NULL, 0, '2020-12-02 10:51:52', 1, NULL, NULL),
(237, 2153, 1, '2020-12-30 00:00:00', '2021-01-05 00:00:00', 4, NULL, NULL, NULL, '2020-12-29 21:25:05', 1, NULL, NULL),
(238, 2153, 1, '2021-01-09 00:00:00', '2021-01-14 00:00:00', 4, NULL, NULL, NULL, '2020-12-29 21:25:05', 1, NULL, NULL),
(239, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:46:55', 1, NULL, 0),
(240, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:48:29', 1, NULL, 0),
(241, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:52:12', 1, NULL, 0),
(242, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:52:20', 1, NULL, 0),
(243, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:53:48', 1, NULL, 0),
(244, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:54:33', 1, NULL, 0),
(245, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-29 23:56:22', 1, NULL, 83),
(246, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:00:58', 1, NULL, 84),
(247, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:01:52', 1, NULL, 85),
(248, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:06:01', 1, NULL, 86),
(249, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:09:03', 1, NULL, 87),
(250, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:13:21', 1, NULL, 88),
(251, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:14:12', 1, NULL, 89),
(252, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:22:04', 1, NULL, 90),
(253, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:23:27', 1, NULL, 91),
(254, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 1, NULL, NULL, NULL, '2020-12-30 00:23:38', 1, NULL, 92),
(255, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 4, NULL, NULL, NULL, '2020-12-30 00:37:30', 1, NULL, 97),
(256, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 4, NULL, NULL, NULL, '2020-12-30 00:40:19', 1, NULL, 98),
(257, 2133, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 4, NULL, NULL, NULL, '2020-12-30 00:41:30', 1, NULL, 99),
(258, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 126, NULL, NULL, NULL, '2020-12-30 00:58:39', 1, NULL, 100),
(259, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 127, NULL, NULL, NULL, '2020-12-30 00:59:40', 1, NULL, 101),
(260, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 128, NULL, NULL, NULL, '2020-12-30 00:59:45', 1, NULL, 102),
(261, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 129, NULL, NULL, NULL, '2020-12-30 01:03:56', 1, NULL, 103),
(262, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 130, NULL, NULL, NULL, '2020-12-30 01:05:09', 1, NULL, 104),
(263, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 131, NULL, NULL, NULL, '2020-12-30 01:05:16', 1, NULL, 105),
(264, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 121, NULL, NULL, NULL, '2020-12-30 01:08:22', 1, NULL, 106),
(265, 2135, 1, '2020-12-30 00:00:00', '2020-12-31 00:00:00', 121, NULL, NULL, 0, '2020-12-30 01:13:23', 1, NULL, 107),
(266, 2139, 1, '2020-12-25 00:00:00', '2020-12-31 00:00:00', 132, NULL, NULL, 0, '2020-12-30 13:38:13', 1, NULL, 108),
(267, 2143, 1, '2021-01-12 00:00:00', '2021-01-15 00:00:00', 4, NULL, NULL, NULL, '2021-01-03 14:47:50', 1, NULL, NULL),
(268, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 4, NULL, NULL, 0, '2021-01-04 17:42:54', 0, NULL, 109),
(269, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 135, NULL, NULL, 0, '2021-01-04 18:26:00', 0, NULL, 111),
(270, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 136, NULL, NULL, 0, '2021-01-04 18:26:13', 0, NULL, 112),
(271, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 137, NULL, NULL, 0, '2021-01-04 18:26:51', 0, NULL, 113),
(272, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 138, NULL, NULL, 0, '2021-01-04 18:27:45', 0, NULL, 114),
(273, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 139, NULL, NULL, 0, '2021-01-04 18:27:53', 0, NULL, 115),
(274, 2143, 1, '2021-01-04 00:00:00', '2021-01-06 00:00:00', 140, NULL, NULL, 0, '2021-01-04 18:28:36', 0, NULL, 116),
(275, 2133, 1, '2021-01-05 00:00:00', '2021-01-07 00:00:00', 141, NULL, NULL, 0, '2021-01-05 08:13:32', 0, NULL, 117),
(276, 2133, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 142, NULL, NULL, 0, '2021-01-05 08:26:01', 0, NULL, 118),
(277, 2133, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 143, NULL, NULL, 0, '2021-01-05 08:27:59', 0, NULL, 119),
(278, 2133, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 144, NULL, NULL, 0, '2021-01-05 08:29:18', 0, NULL, 120),
(279, 2130, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 145, NULL, NULL, 0, '2021-01-05 09:32:34', 0, NULL, 121),
(280, 2130, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 146, NULL, NULL, 0, '2021-01-05 09:33:25', 0, NULL, 122),
(281, 2130, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 147, NULL, NULL, 0, '2021-01-05 09:37:35', 0, NULL, 123),
(283, 2142, 1, '2021-01-14 00:00:00', '2021-01-16 00:00:00', 4, NULL, NULL, NULL, '2021-01-05 13:07:18', 1, NULL, NULL),
(284, 2134, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 147, NULL, NULL, 0, '2021-01-05 13:36:58', 0, NULL, 124),
(285, 2134, 1, '2021-01-05 00:00:00', '2021-01-06 00:00:00', 147, NULL, NULL, 0, '2021-01-05 13:38:02', 0, NULL, 125),
(286, 2135, 1, '2021-01-08 00:00:00', '2021-01-09 00:00:00', 148, NULL, NULL, 0, '2021-01-06 23:39:12', 0, NULL, 131),
(287, 2134, 1, '2021-01-08 00:00:00', '2021-01-10 00:00:00', 153, NULL, NULL, 0, '2021-01-08 12:59:32', 0, NULL, 132),
(288, 2154, 1, '2021-01-14 00:00:00', '2021-01-22 00:00:00', 149, NULL, NULL, NULL, '2021-01-08 13:32:42', 1, NULL, NULL),
(289, 2133, 1, '2021-01-09 00:00:00', '2021-01-10 00:00:00', 157, NULL, NULL, 0, '2021-01-09 15:09:53', 0, NULL, 133),
(290, 2131, 1, '2021-01-09 00:00:00', '2021-01-13 00:00:00', 158, NULL, NULL, 0, '2021-01-09 19:45:32', 0, NULL, 134),
(291, 2156, 1, '2021-01-13 00:00:00', '2021-01-16 00:00:00', 163, NULL, NULL, 0, '2021-01-12 16:10:03', 0, NULL, 135),
(293, 2162, 1, '2021-01-16 00:00:00', '2021-01-16 00:00:00', 176, NULL, NULL, NULL, '2021-01-14 16:34:52', 1, NULL, NULL),
(294, 2162, 1, '2021-01-18 00:00:00', '2021-01-19 00:00:00', 176, NULL, NULL, NULL, '2021-01-14 16:34:52', 1, NULL, NULL),
(295, 2131, 1, '2021-03-13 00:00:00', '2021-03-14 00:00:00', 185, NULL, NULL, 0, '2021-03-12 21:55:53', 0, NULL, 137),
(296, 2134, 1, '2021-04-09 00:00:00', '2021-04-23 00:00:00', 189, NULL, NULL, 0, '2021-04-07 19:14:02', 0, NULL, 138),
(298, 2169, 1, '2021-05-05 00:00:00', '2021-05-08 00:00:00', 178, NULL, NULL, NULL, '2021-04-29 07:01:56', 1, NULL, NULL),
(299, 2169, 1, '2021-05-17 00:00:00', '2021-05-21 00:00:00', 178, NULL, NULL, NULL, '2021-04-29 07:01:56', 1, NULL, NULL),
(300, 2133, 1, '2021-05-07 00:00:00', '2021-05-09 00:00:00', 178, NULL, NULL, 0, '2021-05-07 18:15:11', 0, NULL, 142);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyCityOccupancy`
--

CREATE TABLE `PropertyCityOccupancy` (
  `ID` int(11) NOT NULL,
  `WeekID` int(11) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Area` int(11) DEFAULT NULL,
  `Reservations` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PropertyCustomPrices`
--

CREATE TABLE `PropertyCustomPrices` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PropertyCustomPrices`
--

INSERT INTO `PropertyCustomPrices` (`ID`, `ListingID`, `Date`, `Price`, `Datestamp`, `Active`) VALUES
(1, 4, '2020-11-13', '300.00', '2020-11-13 20:32:39', 1),
(2, 4, '2020-11-14', '220.00', '2020-11-13 20:32:39', 1),
(12, 2130, '2020-12-28', '45.00', '2020-12-02 11:16:27', 1),
(13, 2130, '2020-12-29', '45.00', '2020-12-02 11:17:30', 1),
(15, 2130, '2020-12-23', '145.00', '2020-12-02 11:26:05', 1),
(16, 2130, '2020-12-24', '145.00', '2020-12-02 11:26:05', 1),
(17, 2130, '2020-12-25', '145.00', '2020-12-02 11:26:05', 1),
(18, 2130, '2020-12-27', '145.00', '2020-12-02 11:26:54', 1),
(19, 2130, '2020-12-10', '145.00', '2020-12-02 11:31:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyListings`
--

CREATE TABLE `PropertyListings` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `CheckInType` int(1) DEFAULT NULL,
  `CheckInTime` int(11) DEFAULT NULL,
  `CheckOutTime` int(11) DEFAULT NULL,
  `DatePublished` datetime DEFAULT CURRENT_TIMESTAMP,
  `RequestWindow` int(11) DEFAULT '1',
  `AdvanceWindow` int(11) DEFAULT '90',
  `GovernmentID` int(1) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Active` int(11) DEFAULT '0',
  `PropertyType` int(11) DEFAULT NULL,
  `PlaceType` int(11) DEFAULT NULL,
  `MaxGuests` int(11) DEFAULT NULL,
  `Bathrooms` int(11) DEFAULT NULL,
  `Bedrooms` int(11) DEFAULT NULL,
  `MinNightsStay` int(11) DEFAULT NULL,
  `MaxNightsStay` int(11) DEFAULT NULL,
  `InstantBooking` int(1) DEFAULT NULL,
  `IntelligentPricing` int(11) DEFAULT '0',
  `BasePrice` decimal(7,2) DEFAULT NULL,
  `MinPrice` decimal(7,2) DEFAULT NULL,
  `MaxPrice` decimal(7,2) DEFAULT NULL,
  `Currency` int(11) DEFAULT NULL,
  `PromoDiscount` int(11) DEFAULT NULL,
  `WeeklyDiscount` int(11) DEFAULT NULL,
  `MonthlyDiscount` int(11) DEFAULT NULL,
  `Description` text,
  `Title` text,
  `Area` int(11) DEFAULT NULL,
  `CurrentFloor` int(11) DEFAULT NULL,
  `TotalFloor` int(11) DEFAULT NULL,
  `Communication` decimal(5,1) DEFAULT '0.0',
  `Cleanliness` decimal(5,1) DEFAULT '0.0',
  `Location` decimal(5,1) DEFAULT '0.0',
  `Accuracy` decimal(5,1) DEFAULT '0.0',
  `Price` decimal(5,1) DEFAULT '0.0',
  `AverageReview` decimal(5,2) DEFAULT NULL,
  `CountReview` int(11) DEFAULT NULL,
  `PropertyLoad` int(11) DEFAULT '0',
  `Deleted` int(11) NOT NULL DEFAULT '0',
  `AddStep` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyListings`
--

INSERT INTO `PropertyListings` (`ID`, `AccountID`, `CheckInType`, `CheckInTime`, `CheckOutTime`, `DatePublished`, `RequestWindow`, `AdvanceWindow`, `GovernmentID`, `Status`, `Active`, `PropertyType`, `PlaceType`, `MaxGuests`, `Bathrooms`, `Bedrooms`, `MinNightsStay`, `MaxNightsStay`, `InstantBooking`, `IntelligentPricing`, `BasePrice`, `MinPrice`, `MaxPrice`, `Currency`, `PromoDiscount`, `WeeklyDiscount`, `MonthlyDiscount`, `Description`, `Title`, `Area`, `CurrentFloor`, `TotalFloor`, `Communication`, `Cleanliness`, `Location`, `Accuracy`, `Price`, `AverageReview`, `CountReview`, `PropertyLoad`, `Deleted`, `AddStep`) VALUES
(2130, 36, NULL, 8, 6, '2020-11-30 10:58:38', 2, 1, 1, 0, 0, 1, 1, 6, 2, 3, 2, 30, 1, 0, '54.00', NULL, NULL, 2, 0, NULL, NULL, 'Квартира', NULL, 140, 8, 16, '2.0', '1.0', '3.0', '4.0', '5.0', NULL, NULL, 0, 0, NULL),
(2131, 36, NULL, 8, 6, '2020-11-30 11:30:28', 1, 1, 1, 1, 0, 1, 1, 5, 1, 1, 3, 30, 1, 0, '60.00', NULL, NULL, 2, 0, NULL, NULL, 'квартира', 'квартира', 105, 3, 19, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2132, 4, NULL, NULL, NULL, '2020-11-30 11:51:52', 1, 90, NULL, 1, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdasds', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 1, NULL),
(2133, 36, NULL, 8, 6, '2020-11-30 11:54:31', 1, 1, 1, 1, 0, 1, 1, 8, 2, 4, 3, 30, 1, 0, '190.00', NULL, NULL, 2, 0, NULL, NULL, '5-комнатная квартира дизайнерский евроремонт и отдельная кухня ', '5-комнатная квартира дизайнерский евроремонт и отдельная кухня ', 200, 19, 19, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2134, 36, NULL, 8, 6, '2020-11-30 12:11:15', 1, 1, 1, 1, 0, 1, 1, 5, 1, 2, 2, 30, 1, 1, '58.00', '60.00', '90.00', 2, 0, NULL, NULL, '3-комнатная квартира дизайнерский евроремонт и отдельная кухня сдаётся', '3-комнатная квартира дизайнерский евроремонт и отдельная кухня сдаётся', 80, 3, 7, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 5, 0, NULL),
(2135, 36, NULL, 8, 6, '2020-11-30 12:25:28', 1, 1, 1, 1, 0, 1, 1, 11, 5, 4, 3, 30, 1, 0, '65.00', NULL, NULL, 2, 0, NULL, NULL, 'Дизайнерский евроремонт и отдельная кухня', 'Дизайнерский евроремонт и отдельная кухня', 450, 13, 15, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2136, 36, NULL, NULL, NULL, '2020-11-30 12:54:31', 1, 90, NULL, 1, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Дизайнерский евроремонт и кухонная зона', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 1, NULL),
(2137, 36, NULL, 8, 6, '2020-11-30 12:55:58', 1, 1, 1, 1, 0, 1, 1, 9, 2, 4, 3, 30, 1, 0, '128.00', NULL, NULL, 2, 0, NULL, NULL, 'Дизайнерский евроремонт и кухонная зона', 'Дизайнерский евроремонт и кухонная зона', 220, 4, 18, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2138, 36, NULL, 8, 6, '2020-11-30 13:10:02', 1, 1, 1, 1, 0, 1, 1, 6, 1, 3, 2, 30, 1, 0, '190.00', NULL, NULL, 2, 0, NULL, NULL, '4-комнатная квартира дизайнерский евроремонт и кухня-столовая', '4-комнатная квартира дизайнерский евроремонт и кухня-столовая', 214, 11, 16, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2139, 36, NULL, 8, 6, '2020-11-30 13:23:38', 1, 1, 1, 1, 0, 1, 1, 3, 1, 1, 2, 30, 1, 0, '48.00', NULL, NULL, 2, 0, NULL, NULL, 'Капитальный ремонт «под евро» и кухонная зона', 'Капитальный ремонт «под евро» и кухонная зона', 128, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2140, 4, NULL, NULL, NULL, '2020-12-01 05:43:14', 1, 90, NULL, 0, 0, 1, 1, 1, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'лучшая квартира', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2141, 4, NULL, NULL, NULL, '2020-12-01 06:03:12', 1, 90, NULL, 1, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aasda', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 1, NULL),
(2142, 4, NULL, 3, 2, '2020-12-01 06:03:16', 1, 1, NULL, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, '222.00', NULL, NULL, 1, 0, NULL, NULL, 'aasda', NULL, 13, 31, 312, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2143, 4, NULL, 3, 2, '2020-12-01 06:32:28', 1, 2, NULL, 0, 0, 1, 3, 1, 0, 1, 1, 20, 1, 0, '45.00', NULL, NULL, 4, 0, NULL, NULL, 'qwerty', NULL, NULL, 11, 122, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2144, 4, NULL, NULL, NULL, '2020-12-01 10:59:23', 1, 90, NULL, 0, 0, 2, 1, 1, 0, 2, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fawesrdgfh', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2145, 118, NULL, 4, 3, '2020-12-14 10:21:12', 3, 1, 1, 1, 0, 2, 1, 2, 0, 2, 3, 20, 1, 0, '60.00', NULL, NULL, 2, 0, NULL, NULL, 'Самая лучшая квартира', NULL, 45, 4, 5, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2146, 118, NULL, 4, 2, '2020-12-14 10:58:35', 2, 2, NULL, 1, 0, 1, 1, 1, 0, 0, 3, 5, 1, 0, '12.00', NULL, NULL, 2, 0, NULL, NULL, 'Прекрасная квартира в центре города с евро ремонтом и видом на бульвар', NULL, 213, 213, 231, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2147, 118, NULL, NULL, NULL, '2020-12-14 13:13:43', 1, 90, NULL, 1, 0, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reer', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2148, 118, NULL, NULL, NULL, '2020-12-17 00:24:24', 1, 90, NULL, 1, 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Частный дом у озера', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2149, 4, NULL, NULL, NULL, '2020-12-17 09:19:48', 1, 90, NULL, 0, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'testtesttest', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2150, 4, NULL, NULL, NULL, '2020-12-19 20:21:30', 1, 90, NULL, 1, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 1, NULL),
(2151, 118, NULL, 3, 2, '2020-12-25 15:14:34', 1, 1, 1, 0, 0, 3, 1, 5, 0, 3, 3, 20, 1, 0, '123.00', NULL, NULL, 1, 0, NULL, NULL, 'тестовая изба', NULL, 200, 1, 3, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2152, 4, NULL, NULL, NULL, '2020-12-25 15:43:32', 1, 90, NULL, 0, 0, 2, 1, 1, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Частный дом у озера', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2153, 4, NULL, 4, 2, '2020-12-29 15:22:55', 1, 1, NULL, 0, 0, 1, 1, NULL, NULL, NULL, 10, 21, NULL, 1, NULL, '12.00', '1.00', 1, 0, NULL, NULL, 'test', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2154, 149, NULL, 7, 4, '2021-01-08 13:20:26', 2, 1, NULL, 0, 0, 1, 1, 1, 1, 0, 3, 5, NULL, 0, '60.00', NULL, NULL, 1, 1, 20, 20, 'Новый дом', NULL, 23, 1, 3, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2155, 155, NULL, NULL, NULL, '2021-01-10 12:22:37', 1, 90, NULL, 1, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2156, 159, NULL, NULL, NULL, '2021-01-10 18:09:38', 1, 90, NULL, 1, 0, 1, 1, 4, 1, 2, NULL, NULL, 1, 0, '50.00', NULL, NULL, 1, 0, NULL, NULL, 'ŞƏHƏRİN MƏRKƏZİNDƏ Milli Bankın yanında Rəşid Beybutov kücəsində lift olan binadi 6/6 mərtəbəsində 2 otaq ela temirli seherimize gelen qonaqlar ve aileler ucun gundelik olaraq kiraye menzil verilir. Menzilde istifade ucun her bir serait yaradilib (Suretli internet Wifi, yumsaq mebeller, paltaryuyan, kondisioner, plazma televizor ,kamin,(connect tv), temiz pastel ve temiz desmallar, isti-soyuq su ve s.) Menzil 1 gunluk verilmir ve muddete gore qiymetde deyisiklik olacaq. HAVA LİMANİNDAN TRANSFER', 'ŞƏHƏRİN MƏRKƏZİNDƏ Milli Bankın yanında Rəşid Beybutov kücəsində kiraye menzil verilir.', 55, 6, 6, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2157, 4, NULL, NULL, NULL, '2021-01-11 12:59:42', 1, 90, NULL, 0, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eewr', 'test', NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2158, 162, NULL, 7, 6, '2021-01-11 22:19:23', 2, 1, NULL, 0, 0, 1, 1, 8, 2, 2, 1, 0, 1, 1, NULL, '30.00', '50.00', 2, 0, NULL, NULL, ' Просторная квартира на 8-м этаже новостройки. 3 комнаты,  ванная комната, кухня, балкон, вид на город. Мебель, интернет, кабельное телевидение, стиральная машина, кондиционер, холодильник, чистая постель, посуда и т д.. Горячая и холодная вода, газ, электричества-24 часа. 2 лифта, наземная и подземная парковка. Дом расположен на безопасной территории, охраняемый комплекс. Bозле дома отделение полиции. Владелец живет в соседнем доме и в нужной момент всегда рядом. Рядом вся инфраструктура: ', 'Просторная квартира на 8-м этаже новостройки.', 100, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2159, 4, NULL, 3, 2, '2021-01-12 07:56:16', 1, 1, NULL, 0, 0, 1, 1, NULL, NULL, NULL, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'okey', NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2160, 164, NULL, NULL, NULL, '2021-01-13 10:54:48', 1, 90, NULL, 1, 0, 1, 1, 3, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Новостройка со всеми удобствами ', NULL, 60, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2161, 175, NULL, 2, 18, '2021-01-14 12:49:58', 1, 1, NULL, 1, 0, 1, 1, 8, 2, 3, 3, 12, 1, 0, '110.00', NULL, NULL, 1, 0, 5, 10, 'In the heart of city center, apartment in 3/3 floor, 3 separated double bedroom apartment, 2 bathroom and 1 salon, 3 air conditioners, cable TV, free Wi-Fi', 'In the heart of city center, apartment in 3/3 floor', 165, 3, 3, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2162, 176, NULL, 4, 4, '2021-01-14 16:28:29', 2, 1, NULL, 1, 0, 1, 1, 3, 1, 1, 1, 12, 1, 0, '20.00', NULL, NULL, 4, 1, NULL, NULL, 'Квартира расположена в центре города. Все необходимое для проживания имеется.\r\nВ шаговой доступности все достопримечательности города.\r\nКвартира расположена вблизи Морвокзала, Бульвар через дорогу, до метро 28май или Сахил 10мин пешком..', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2163, 4, NULL, NULL, NULL, '2021-01-15 10:22:00', 1, 90, NULL, 1, 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dwa', 'test', NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2164, 4, NULL, NULL, NULL, '2021-01-15 10:29:35', 1, 90, NULL, 1, 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdsrc', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2165, 4, NULL, NULL, NULL, '2021-01-23 10:47:23', 1, 90, NULL, 1, 0, 2, 1, 1, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ijasiodjas', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2166, 183, NULL, 4, 4, '2021-01-23 14:30:28', 1, 3, NULL, 1, 0, 1, 1, 3, 1, 1, 1, 12, 1, 1, NULL, '40.00', '60.00', 1, 1, 10, 10, 'Гостевой дом в городе Баку рядом с центром Гейдара Алиева.Отличное месторасположение,хорошие комфортные условия для проживания плюс цена эконом класса.\r\n', NULL, 50, 4, 4, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2167, 4, NULL, NULL, NULL, '2021-02-02 20:04:00', 1, 90, NULL, 1, 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'daw', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2168, 178, NULL, NULL, NULL, '2021-03-12 21:54:57', 1, 90, NULL, 1, 0, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL),
(2169, 178, NULL, 4, 3, '2021-04-29 07:00:14', 2, 1, NULL, 1, 0, 2, 1, 1, 0, 1, 1, 1, 1, 1, NULL, '100.00', '150.00', 1, 0, NULL, NULL, '123', NULL, 12, 2, 55, '0.0', '0.0', '0.0', '0.0', '0.0', NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyPrices`
--

CREATE TABLE `PropertyPrices` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) NOT NULL,
  `Currency` int(11) NOT NULL,
  `BasePrice` decimal(10,2) NOT NULL,
  `MaxPrice` decimal(10,2) DEFAULT NULL,
  `MinPrice` decimal(10,2) DEFAULT NULL,
  `DiscountPromoCounter` int(11) DEFAULT NULL,
  `DiscountTemp` decimal(3,2) DEFAULT NULL,
  `DiscountDay7` decimal(3,3) DEFAULT NULL,
  `DiscountDay14` decimal(3,3) DEFAULT NULL,
  `DiscountDay30` decimal(3,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyPrices`
--

INSERT INTO `PropertyPrices` (`ID`, `ListingID`, `Currency`, `BasePrice`, `MaxPrice`, `MinPrice`, `DiscountPromoCounter`, `DiscountTemp`, `DiscountDay7`, `DiscountDay14`, `DiscountDay30`) VALUES
(1, 1, 1, '50.22', '44.11', '40.11', 2, '0.20', '0.100', '0.150', '0.200'),
(2, 2, 1, '67.00', '95.00', '60.00', 5, '0.20', '0.100', '0.150', '0.200');

-- --------------------------------------------------------

--
-- Table structure for table `PropertyReviews`
--

CREATE TABLE `PropertyReviews` (
  `ID` int(11) NOT NULL,
  `ReplyID` int(11) DEFAULT NULL,
  `AccountID` int(11) NOT NULL,
  `ListingID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cleanliness` int(11) DEFAULT NULL,
  `Communication` int(11) DEFAULT NULL,
  `Location` int(11) DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `liked` text,
  `notliked` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyReviews`
--

INSERT INTO `PropertyReviews` (`ID`, `ReplyID`, `AccountID`, `ListingID`, `Date`, `Cleanliness`, `Communication`, `Location`, `Accuracy`, `Price`, `liked`, `notliked`) VALUES
(1, NULL, 4, 4, '2020-08-25 09:40:59', 5, 2, 4, NULL, 3, 'персонал приветливый  квартира хорошо убрана  белье и полотенца чистенькие и приятно пахнут  хорошая мебель, удобная кровать  у окон хорошая шумоизоляция, что бесконечно порадовало', 'улица достаточно шумная, но это не исправить. если не открывать окна, то в квартире тихо'),
(2, NULL, 4, 4, '2020-08-25 09:41:54', 5, 5, 4, NULL, 3, 'Уютно , компактно , одноразовые гигиенические средства , интерьер . Сервис отличный!', 'Всего один бокал Телевизор не смарт тв Пятна на покрывале Нужно прилагать доп усилия для открытия входной двери В этот раз повезло что офис был совсем рядом с квартирой . Но тот факт что за ключе. Нужно куда то ездить , не очень как бы .'),
(3, NULL, 4, 1, '2020-08-25 09:43:36', 1, 0, 0, NULL, 0, 'Что вам понравилось?', 'Что вам не понравилось?'),
(4, NULL, 4, 1, '2020-08-25 09:44:04', 1, 0, 0, NULL, 0, 'Что вам понравилось?', 'Что вам не понравилось?'),
(5, NULL, 4, 1, '2020-08-25 09:51:13', 1, 0, 0, NULL, 0, 'Что вам понравилось?', 'Что вам не понравилось?'),
(6, NULL, 4, 1, '2020-09-04 19:05:21', 6, 4, 1, NULL, 2, 'Что вам понравилось?', 'Что вам не понравилось?'),
(7, NULL, 4, 2, '2020-10-30 08:09:01', 1, 1, 1, 1, 1, 'шикарная квартира', 'не понравился душ'),
(8, NULL, 4, 2130, '2020-12-24 21:49:22', 1, 2, 3, 4, 5, 'test', 'test');

--
-- Triggers `PropertyReviews`
--
DELIMITER $$
CREATE TRIGGER `CountAverageRating` AFTER INSERT ON `PropertyReviews` FOR EACH ROW BEGIN

DECLARE cnt integer;
DECLARE averageCommunication integer;
DECLARE averageCleanliness integer;
DECLARE averageLocation integer;
DECLARE averageAccuracy integer;
DECLARE averagePrice integer;

SELECT COUNT(*) INTO @cnt FROM PropertyReviews WHERE ListingID = NEW.ListingID;

IF (@cnt != 0) THEN
  SELECT SUM(Communication) / @cnt, SUM(Cleanliness)/ @cnt, SUM(Location)/ 		@cnt, SUM(Accuracy)/ @cnt, SUM(Price)/ @cnt INTO 				    	@averageCommunication, @averageCleanlines, @averageLocation, 		 		@averageAccuracy, @averagePrice
    FROM PropertyReviews 
    WHERE ListingID = NEW.ListingID;

   UPDATE PropertyListings
   SET Communication = @averageCommunication,
   Cleanliness = @averageCleanlines,
   Location = @averageLocation, 
   Accuracy = @averageAccuracy, 
   Price =  @averagePrice
   WHERE ID = NEW.ListingID;
    
    END IF;
   
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `PropertyRooms`
--

CREATE TABLE `PropertyRooms` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `RoomType` int(11) DEFAULT NULL,
  `Active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyRooms`
--

INSERT INTO `PropertyRooms` (`ID`, `ListingID`, `RoomType`, `Active`) VALUES
(37, 13, 1, 1),
(38, 13, 1, 1),
(39, 13, 2, 1),
(42, 16, 1, 1),
(43, 16, 2, 1),
(48, 15, 1, 1),
(49, 15, 2, 1),
(54, 17, 1, 1),
(55, 17, 2, 1),
(58, 61, 1, 1),
(59, 61, 2, 1),
(60, 62, 1, 1),
(61, 62, 1, 1),
(62, 62, 2, 1),
(63, 63, 1, 1),
(64, 63, 1, 1),
(65, 63, 2, 1),
(68, 65, 1, 1),
(69, 65, 1, 1),
(70, 65, 1, 1),
(71, 65, 2, 1),
(74, 64, 1, 1),
(75, 64, 2, 1),
(76, 66, 1, 1),
(77, 66, 2, 1),
(78, 67, 1, 1),
(79, 67, 2, 1),
(80, 68, 1, 1),
(81, 68, 2, 1),
(84, 69, 1, 1),
(85, 69, 1, 1),
(86, 69, 2, 1),
(87, 70, 1, 1),
(88, 70, 1, 1),
(89, 70, 2, 1),
(94, 72, 1, 1),
(95, 72, 1, 1),
(96, 72, 2, 1),
(97, 74, 1, 1),
(98, 74, 2, 1),
(99, 75, 1, 1),
(100, 75, 2, 1),
(105, 77, 1, 1),
(106, 77, 2, 1),
(109, 76, 1, 1),
(110, 76, 2, 1),
(111, 78, 1, 1),
(112, 78, 2, 1),
(118, 79, 1, 1),
(119, 79, 2, 1),
(120, 80, 1, 1),
(121, 80, 2, 1),
(122, 82, 1, 1),
(123, 82, 2, 1),
(126, 71, 1, 1),
(127, 71, 1, 1),
(128, 71, 1, 1),
(129, 71, 2, 1),
(170, 85, 1, 1),
(171, 85, 2, 1),
(172, 86, 1, 1),
(173, 86, 2, 1),
(177, 87, 1, 1),
(178, 87, 1, 1),
(179, 87, 2, 1),
(189, 88, 1, 1),
(190, 88, 1, 1),
(191, 88, 2, 1),
(192, 89, 1, 1),
(193, 89, 2, 1),
(229, 7, 1, 1),
(230, 7, 2, 1),
(245, 0, 1, 1),
(246, 0, 1, 1),
(247, 0, 2, 1),
(265, 3, 1, 1),
(266, 3, 1, 1),
(267, 3, 2, 1),
(271, 5, 1, 1),
(272, 5, 1, 1),
(273, 5, 1, 1),
(274, 5, 2, 1),
(275, 6, 1, 1),
(276, 6, 1, 1),
(277, 6, 2, 1),
(280, 1, 1, 1),
(281, 1, 1, 1),
(282, 1, 2, 1),
(283, 2, 1, 1),
(284, 2, 1, 1),
(285, 2, 2, 1),
(286, 11, 1, 1),
(287, 11, 1, 1),
(288, 11, 2, 1),
(289, 12, 1, 1),
(290, 12, 1, 1),
(291, 12, 2, 1),
(292, 2032, 1, 1),
(293, 2032, 1, 1),
(294, 2032, 2, 1),
(325, 2034, 1, 1),
(326, 2034, 1, 1),
(327, 2034, 2, 1),
(328, 2055, 1, 1),
(329, 2055, 1, 1),
(330, 2055, 2, 1),
(331, 2056, 1, 1),
(332, 2056, 2, 1),
(333, 2058, 1, 1),
(334, 2058, 1, 1),
(335, 2058, 2, 1),
(336, 2059, 1, 1),
(337, 2059, 2, 1),
(338, 2060, 1, 1),
(339, 2060, 2, 1),
(340, 2066, 1, 1),
(341, 2066, 1, 1),
(342, 2066, 1, 1),
(343, 2066, 2, 1),
(344, 2067, 1, 1),
(345, 2067, 1, 1),
(346, 2067, 2, 1),
(352, 2073, 1, 1),
(353, 2073, 1, 1),
(354, 2073, 1, 1),
(355, 2073, 2, 1),
(356, 2074, 1, 1),
(357, 2074, 2, 1),
(361, 2075, 1, 1),
(362, 2075, 1, 1),
(363, 2075, 2, 1),
(366, 2076, 1, 1),
(367, 2076, 2, 1),
(368, 2077, 1, 1),
(369, 2077, 2, 1),
(370, 2078, 1, 1),
(371, 2078, 2, 1),
(372, 2079, 1, 1),
(373, 2079, 2, 1),
(374, 2080, 1, 1),
(375, 2080, 2, 1),
(379, 2081, 1, 1),
(380, 2081, 1, 1),
(381, 2081, 2, 1),
(382, 2082, 1, 1),
(383, 2082, 2, 1),
(384, 2085, 1, 1),
(385, 2085, 2, 1),
(386, 2086, 1, 1),
(387, 2086, 2, 1),
(388, 2088, 1, 1),
(389, 2088, 1, 1),
(390, 2088, 2, 1),
(391, 2089, 1, 1),
(392, 2089, 1, 1),
(393, 2089, 2, 1),
(400, 2092, 1, 1),
(401, 2092, 2, 1),
(404, 2091, 1, 1),
(405, 2091, 2, 1),
(406, 2094, 1, 1),
(407, 2094, 1, 1),
(408, 2094, 2, 1),
(411, 2090, 1, 1),
(412, 2090, 2, 1),
(419, 2096, 1, 1),
(420, 2096, 2, 1),
(423, 2097, 1, 1),
(424, 2097, 2, 1),
(425, 2098, 1, 1),
(426, 2098, 2, 1),
(427, 2099, 1, 1),
(428, 2099, 2, 1),
(435, 2103, 1, 1),
(436, 2103, 2, 1),
(437, 2104, 1, 1),
(438, 2104, 2, 1),
(439, 2107, 1, 1),
(440, 2107, 2, 1),
(441, 2100, 1, 1),
(442, 2100, 2, 1),
(443, 2108, 1, 1),
(444, 2108, 2, 1),
(449, 2111, 1, 1),
(450, 2111, 2, 1),
(451, 2114, 1, 1),
(452, 2114, 2, 1),
(453, 2116, 1, 1),
(454, 2116, 1, 1),
(455, 2116, 2, 1),
(456, 2118, 1, 1),
(457, 2118, 2, 1),
(458, 2124, 1, 1),
(459, 2124, 2, 1),
(478, 2126, 1, 1),
(479, 2126, 2, 1),
(488, 2128, 1, 1),
(489, 2128, 2, 1),
(496, 4, 1, 1),
(497, 4, 1, 1),
(498, 4, 2, 1),
(499, 2129, 1, 1),
(500, 2129, 2, 1),
(505, 2131, 1, 1),
(506, 2131, 2, 1),
(507, 2133, 1, 1),
(508, 2133, 1, 1),
(509, 2133, 1, 1),
(510, 2133, 1, 1),
(511, 2133, 2, 1),
(512, 2134, 1, 1),
(513, 2134, 1, 1),
(514, 2134, 2, 1),
(515, 2135, 1, 1),
(516, 2135, 1, 1),
(517, 2135, 1, 1),
(518, 2135, 1, 1),
(519, 2135, 2, 1),
(520, 2137, 1, 1),
(521, 2137, 1, 1),
(522, 2137, 1, 1),
(523, 2137, 1, 1),
(524, 2137, 2, 1),
(525, 2138, 1, 1),
(526, 2138, 1, 1),
(527, 2138, 1, 1),
(528, 2138, 2, 1),
(529, 2139, 1, 1),
(530, 2139, 2, 1),
(531, 2130, 1, 1),
(532, 2130, 1, 1),
(533, 2130, 1, 1),
(534, 2130, 2, 1),
(535, 2140, 1, 1),
(536, 2140, 2, 1),
(543, 2143, 1, 1),
(544, 2143, 2, 1),
(545, 2144, 1, 1),
(546, 2144, 1, 1),
(547, 2144, 2, 1),
(564, 2145, 1, 1),
(565, 2145, 1, 1),
(566, 2145, 2, 1),
(570, 2146, 2, 1),
(571, 2132, 2, 1),
(572, 2151, 1, 1),
(573, 2151, 1, 1),
(574, 2151, 1, 1),
(575, 2151, 2, 1),
(576, 2152, 2, 1),
(577, 2142, 2, 1),
(578, 2154, 2, 1),
(579, 2156, 1, 1),
(580, 2156, 1, 1),
(581, 2156, 2, 1),
(582, 2158, 1, 1),
(583, 2158, 1, 1),
(584, 2158, 2, 1),
(585, 2160, 1, 1),
(586, 2160, 2, 1),
(587, 2161, 1, 1),
(588, 2161, 1, 1),
(589, 2161, 1, 1),
(590, 2161, 2, 1),
(591, 2162, 1, 1),
(592, 2162, 2, 1),
(593, 2165, 2, 1),
(594, 2166, 1, 1),
(595, 2166, 2, 1),
(596, 2169, 1, 1),
(597, 2169, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PropertyRules`
--

CREATE TABLE `PropertyRules` (
  `ID` int(11) NOT NULL,
  `ListingID` int(11) DEFAULT NULL,
  `RuleID` int(11) DEFAULT NULL,
  `Value` int(11) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertyRules`
--

INSERT INTO `PropertyRules` (`ID`, `ListingID`, `RuleID`, `Value`, `Active`) VALUES
(320, 2130, 1, 1, 1),
(321, 2130, 2, 1, 1),
(322, 2130, 3, 0, 1),
(323, 2130, 4, 0, 1),
(324, 2130, 5, 0, 1),
(325, 2130, 6, 0, 1),
(326, 2130, 7, 0, 1),
(327, 2130, 8, 0, 1),
(328, 2130, 9, 0, 1),
(329, 2130, 10, 0, 1),
(330, 2131, 1, 1, 1),
(331, 2131, 2, 1, 1),
(332, 2131, 3, 0, 1),
(333, 2131, 4, 0, 1),
(334, 2131, 5, 0, 1),
(335, 2131, 6, 0, 1),
(336, 2131, 7, 0, 1),
(337, 2131, 8, 0, 1),
(338, 2131, 9, 0, 1),
(339, 2131, 10, 1, 1),
(340, 2133, 1, 1, 1),
(341, 2133, 2, 1, 1),
(342, 2133, 3, 0, 1),
(343, 2133, 4, 0, 1),
(344, 2133, 5, 0, 1),
(345, 2133, 6, 0, 1),
(346, 2133, 7, 0, 1),
(347, 2133, 8, 0, 1),
(348, 2133, 9, 0, 1),
(349, 2133, 10, 1, 1),
(350, 2134, 1, 1, 1),
(351, 2134, 2, 1, 1),
(352, 2134, 3, 0, 1),
(353, 2134, 4, 0, 1),
(354, 2134, 5, 0, 1),
(355, 2134, 6, 0, 1),
(356, 2134, 7, 0, 1),
(357, 2134, 8, 0, 1),
(358, 2134, 9, 0, 1),
(359, 2134, 10, 1, 1),
(360, 2135, 1, 1, 1),
(361, 2135, 2, 1, 1),
(362, 2135, 3, 0, 1),
(363, 2135, 4, 0, 1),
(364, 2135, 5, 0, 1),
(365, 2135, 6, 0, 1),
(366, 2135, 7, 0, 1),
(367, 2135, 8, 0, 1),
(368, 2135, 9, 0, 1),
(369, 2135, 10, 1, 1),
(370, 2137, 1, 1, 1),
(371, 2137, 2, 1, 1),
(372, 2137, 3, 0, 1),
(373, 2137, 4, 0, 1),
(374, 2137, 5, 0, 1),
(375, 2137, 6, 0, 1),
(376, 2137, 7, 0, 1),
(377, 2137, 8, 0, 1),
(378, 2137, 9, 0, 1),
(379, 2137, 10, 1, 1),
(380, 2138, 1, 1, 1),
(381, 2138, 2, 1, 1),
(382, 2138, 3, 1, 1),
(383, 2138, 4, 1, 1),
(384, 2138, 5, 0, 1),
(385, 2138, 6, 0, 1),
(386, 2138, 7, 0, 1),
(387, 2138, 8, 0, 1),
(388, 2138, 9, 0, 1),
(389, 2138, 10, 1, 1),
(390, 2139, 1, 1, 1),
(391, 2139, 2, 1, 1),
(392, 2139, 3, 1, 1),
(393, 2139, 4, 0, 1),
(394, 2139, 5, 0, 1),
(395, 2139, 6, 0, 1),
(396, 2139, 8, 0, 1),
(397, 2139, 9, 0, 1),
(398, 2144, 9, 0, 1),
(399, 2145, 1, 1, 1),
(400, 2145, 2, 0, 1),
(401, 2145, 3, 0, 1),
(402, 2145, 4, 0, 1),
(403, 2145, 5, 0, 1),
(404, 2145, 6, 1, 1),
(405, 2145, 7, 1, 1),
(406, 2145, 8, 0, 1),
(407, 2145, 9, 1, 1),
(408, 2145, 10, 0, 1),
(410, 2146, 1, 1, 1),
(411, 2151, 1, 1, 1),
(412, 2151, 2, 0, 1),
(417, 2153, 1, 1, 1),
(418, 2153, 2, 1, 1),
(419, 2153, 3, 0, 1),
(420, 2153, 4, 1, 1),
(421, 2153, 5, 1, 1),
(422, 2153, 6, 1, 1),
(423, 2153, 7, 0, 1),
(424, 2153, 8, 1, 1),
(425, 2153, 9, 0, 1),
(426, 2153, 10, 1, 1),
(427, 2143, 1, 0, 1),
(428, 2143, 2, 1, 1),
(429, 2143, 3, 0, 1),
(430, 2143, 4, 1, 1),
(431, 2143, 5, 0, 1),
(432, 2143, 6, 1, 1),
(433, 2143, 7, 0, 1),
(434, 2143, 8, 1, 1),
(435, 2143, 9, 0, 1),
(436, 2143, 10, 1, 1),
(437, 2142, 1, 0, 1),
(438, 2142, 2, 1, 1),
(439, 2142, 3, 0, 1),
(440, 2142, 4, 1, 1),
(441, 2142, 5, 1, 1),
(442, 2142, 6, 0, 1),
(443, 2142, 7, 1, 1),
(444, 2142, 8, 0, 1),
(445, 2142, 9, 0, 1),
(446, 2142, 10, 1, 1),
(447, 2154, 1, 1, 1),
(448, 2154, 2, 0, 1),
(449, 2154, 3, 1, 1),
(450, 2154, 4, 1, 1),
(451, 2154, 5, 0, 1),
(452, 2154, 6, 0, 1),
(453, 2154, 7, 0, 1),
(454, 2154, 8, 0, 1),
(455, 2154, 9, 0, 1),
(456, 2154, 10, 1, 1),
(457, 2156, 1, 1, 1),
(458, 2156, 2, 1, 1),
(459, 2156, 3, 0, 1),
(460, 2156, 4, 1, 1),
(461, 2156, 5, 0, 1),
(462, 2156, 6, 0, 1),
(463, 2156, 7, 0, 1),
(464, 2156, 8, 0, 1),
(465, 2156, 9, 0, 1),
(466, 2156, 10, 1, 1),
(467, 2158, 1, 1, 1),
(468, 2158, 2, 1, 1),
(469, 2158, 3, 0, 1),
(470, 2158, 4, 0, 1),
(471, 2158, 5, 0, 1),
(472, 2158, 6, 0, 1),
(473, 2158, 7, 0, 1),
(474, 2158, 8, 0, 1),
(475, 2158, 9, 0, 1),
(476, 2158, 10, 1, 1),
(477, 2161, 1, 1, 1),
(478, 2161, 2, 1, 1),
(479, 2161, 3, 0, 1),
(480, 2161, 4, 1, 1),
(481, 2161, 5, 0, 1),
(482, 2161, 6, 0, 1),
(483, 2161, 7, 1, 1),
(484, 2161, 8, 0, 1),
(485, 2161, 9, 0, 1),
(486, 2161, 10, 1, 1),
(487, 2162, 1, 1, 1),
(488, 2162, 2, 1, 1),
(489, 2162, 3, 1, 1),
(490, 2162, 4, 1, 1),
(491, 2162, 5, 0, 1),
(492, 2162, 6, 0, 1),
(493, 2162, 7, 1, 1),
(494, 2162, 8, 1, 1),
(495, 2162, 9, 0, 1),
(496, 2162, 10, 1, 1),
(497, 2166, 1, 1, 1),
(498, 2166, 2, 1, 1),
(499, 2166, 3, 0, 1),
(500, 2166, 4, 0, 1),
(501, 2166, 5, 0, 1),
(502, 2166, 6, 0, 1),
(503, 2166, 7, 1, 1),
(504, 2166, 8, 0, 1),
(505, 2166, 9, 0, 1),
(506, 2166, 10, 1, 1),
(507, 2169, 1, 1, 1),
(508, 2169, 2, 0, 1),
(509, 2169, 3, 1, 1),
(510, 2169, 4, 0, 1),
(511, 2169, 5, 0, 1),
(512, 2169, 6, 0, 1),
(513, 2169, 7, 0, 1),
(514, 2169, 8, 0, 1),
(515, 2169, 9, 0, 1),
(516, 2169, 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PropertySaved`
--

CREATE TABLE `PropertySaved` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `Timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PropertySaved`
--

INSERT INTO `PropertySaved` (`ID`, `AccountID`, `PropertyID`, `Timestamp`, `Status`) VALUES
(6, 4, 0, '2020-10-27 18:05:13', 1),
(31, 4, 5, '2020-10-30 07:01:10', 1),
(43, 4, 1, '2020-11-03 06:17:10', 1),
(48, 4, 2, '2020-11-16 11:54:40', 1),
(57, 4, 3, '2020-11-23 20:08:57', 1),
(58, 4, 2131, '2021-01-08 13:39:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SettingCities`
--

CREATE TABLE `SettingCities` (
  `ID` int(11) NOT NULL,
  `LocID` int(11) NOT NULL,
  `Serviced` int(1) NOT NULL,
  `Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SettingCities`
--

INSERT INTO `SettingCities` (`ID`, `LocID`, `Serviced`, `Active`) VALUES
(1, 251, 1, 1),
(2, 252, 1, 1),
(3, 253, 1, 1),
(4, 254, 1, 1),
(5, 255, 1, 1),
(6, 257, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SettingCountries`
--

CREATE TABLE `SettingCountries` (
  `ID` int(11) NOT NULL,
  `LocID` int(11) NOT NULL,
  `CountryCode` varchar(2) NOT NULL,
  `Serviced` int(11) NOT NULL,
  `Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SettingCountries`
--

INSERT INTO `SettingCountries` (`ID`, `LocID`, `CountryCode`, `Serviced`, `Active`) VALUES
(1, 1, 'AF', 0, 1),
(2, 2, 'AX', 0, 1),
(3, 3, 'AL', 0, 1),
(4, 4, 'DZ', 0, 1),
(5, 5, 'AS', 0, 1),
(6, 6, 'AD', 0, 1),
(7, 7, 'AO', 0, 1),
(8, 8, 'AI', 0, 1),
(9, 9, 'AQ', 0, 1),
(10, 10, 'AG', 0, 1),
(11, 11, 'AR', 0, 1),
(12, 12, 'AM', 0, 1),
(13, 13, 'AW', 0, 1),
(14, 14, 'AU', 0, 1),
(15, 15, 'AT', 0, 1),
(16, 16, 'AZ', 0, 1),
(17, 17, 'BS', 0, 1),
(18, 18, 'BH', 0, 1),
(19, 19, 'BD', 0, 1),
(20, 20, 'BB', 0, 1),
(21, 21, 'BY', 0, 1),
(22, 22, 'BE', 0, 1),
(23, 23, 'BZ', 0, 1),
(24, 24, 'BJ', 0, 1),
(25, 25, 'BM', 0, 1),
(26, 26, 'BT', 0, 1),
(27, 27, 'BO', 0, 1),
(28, 28, 'BQ', 0, 1),
(29, 29, 'BA', 0, 1),
(30, 30, 'BW', 0, 1),
(31, 31, 'BV', 0, 1),
(32, 32, 'BR', 0, 1),
(33, 33, 'IO', 0, 1),
(34, 34, 'BN', 0, 1),
(35, 35, 'BG', 0, 1),
(36, 36, 'BF', 0, 1),
(37, 37, 'BI', 0, 1),
(38, 38, 'KH', 0, 1),
(39, 39, 'CM', 0, 1),
(40, 40, 'CA', 0, 1),
(41, 41, 'CV', 0, 1),
(42, 42, 'KY', 0, 1),
(43, 43, 'CF', 0, 1),
(44, 44, 'TD', 0, 1),
(45, 45, 'CL', 0, 1),
(46, 46, 'CN', 0, 1),
(47, 47, 'CX', 0, 1),
(48, 48, 'CC', 0, 1),
(49, 49, 'CO', 0, 1),
(50, 50, 'KM', 0, 1),
(51, 51, 'CG', 0, 1),
(52, 52, 'CK', 0, 1),
(53, 53, 'CR', 0, 1),
(54, 54, 'CI', 0, 1),
(55, 55, 'HR', 0, 1),
(56, 56, 'CU', 0, 1),
(57, 57, 'CW', 0, 1),
(58, 58, 'CY', 0, 1),
(59, 59, 'CZ', 0, 1),
(60, 60, 'CD', 0, 1),
(61, 61, 'DK', 0, 1),
(62, 62, 'DJ', 0, 1),
(63, 63, 'DM', 0, 1),
(64, 64, 'DO', 0, 1),
(65, 65, 'EC', 0, 1),
(66, 66, 'EG', 0, 1),
(67, 67, 'SV', 0, 1),
(68, 68, 'GQ', 0, 1),
(69, 69, 'ER', 0, 1),
(70, 70, 'EE', 0, 1),
(71, 71, 'ET', 0, 1),
(72, 72, 'FK', 0, 1),
(73, 73, 'FO', 0, 1),
(74, 74, 'FJ', 0, 1),
(75, 75, 'FI', 0, 1),
(76, 76, 'FR', 0, 1),
(77, 77, 'GF', 0, 1),
(78, 78, 'PF', 0, 1),
(79, 79, 'TF', 0, 1),
(80, 80, 'GA', 0, 1),
(81, 81, 'GM', 0, 1),
(82, 82, 'GE', 0, 1),
(83, 83, 'DE', 0, 1),
(84, 84, 'GH', 0, 1),
(85, 85, 'GI', 0, 1),
(86, 86, 'GR', 0, 1),
(87, 87, 'GL', 0, 1),
(88, 88, 'GD', 0, 1),
(89, 89, 'GP', 0, 1),
(90, 90, 'GU', 0, 1),
(91, 91, 'GT', 0, 1),
(92, 92, 'GG', 0, 1),
(93, 93, 'GN', 0, 1),
(94, 94, 'GW', 0, 1),
(95, 95, 'GY', 0, 1),
(96, 96, 'HT', 0, 1),
(97, 97, 'HM', 0, 1),
(98, 98, 'HN', 0, 1),
(99, 99, 'HK', 0, 1),
(100, 100, 'HU', 0, 1),
(101, 101, 'IS', 0, 1),
(102, 102, 'IN', 0, 1),
(103, 103, 'ID', 0, 1),
(104, 104, 'IR', 0, 1),
(105, 105, 'IQ', 0, 1),
(106, 106, 'IE', 0, 1),
(107, 107, 'IM', 0, 1),
(108, 108, 'IL', 0, 1),
(109, 109, 'IT', 0, 1),
(110, 110, 'JM', 0, 1),
(111, 111, 'JP', 0, 1),
(112, 112, 'JE', 0, 1),
(113, 113, 'JO', 0, 1),
(114, 114, 'KZ', 0, 1),
(115, 115, 'KE', 0, 1),
(116, 116, 'KI', 0, 1),
(117, 117, 'XK', 0, 1),
(118, 118, 'KW', 0, 1),
(119, 119, 'KG', 0, 1),
(120, 120, 'LA', 0, 1),
(121, 121, 'LV', 0, 1),
(122, 122, 'LB', 0, 1),
(123, 123, 'LS', 0, 1),
(124, 124, 'LR', 0, 1),
(125, 125, 'LY', 0, 1),
(126, 126, 'LI', 0, 1),
(127, 127, 'LT', 0, 1),
(128, 128, 'LU', 0, 1),
(129, 129, 'MO', 0, 1),
(130, 130, 'MK', 0, 1),
(131, 131, 'MG', 0, 1),
(132, 132, 'MW', 0, 1),
(133, 133, 'MY', 0, 1),
(134, 134, 'MV', 0, 1),
(135, 135, 'ML', 0, 1),
(136, 136, 'MT', 0, 1),
(137, 137, 'MH', 0, 1),
(138, 138, 'MQ', 0, 1),
(139, 139, 'MR', 0, 1),
(140, 140, 'MU', 0, 1),
(141, 141, 'YT', 0, 1),
(142, 142, 'MX', 0, 1),
(143, 143, 'FM', 0, 1),
(144, 144, 'MD', 0, 1),
(145, 145, 'MC', 0, 1),
(146, 146, 'MN', 0, 1),
(147, 147, 'ME', 0, 1),
(148, 148, 'MS', 0, 1),
(149, 149, 'MA', 0, 1),
(150, 150, 'MZ', 0, 1),
(151, 151, 'MM', 0, 1),
(152, 152, 'NA', 0, 1),
(153, 153, 'NR', 0, 1),
(154, 154, 'NP', 0, 1),
(155, 155, 'NL', 0, 1),
(156, 156, 'NC', 0, 1),
(157, 157, 'NZ', 0, 1),
(158, 158, 'NI', 0, 1),
(159, 159, 'NE', 0, 1),
(160, 160, 'NG', 0, 1),
(161, 161, 'NU', 0, 1),
(162, 162, 'NF', 0, 1),
(163, 163, 'KP', 0, 1),
(164, 164, 'MP', 0, 1),
(165, 165, 'NO', 0, 1),
(166, 166, 'OM', 0, 1),
(167, 167, 'PK', 0, 1),
(168, 168, 'PW', 0, 1),
(169, 169, 'PS', 0, 1),
(170, 170, 'PA', 0, 1),
(171, 171, 'PG', 0, 1),
(172, 172, 'PY', 0, 1),
(173, 173, 'PE', 0, 1),
(174, 174, 'PH', 0, 1),
(175, 175, 'PN', 0, 1),
(176, 176, 'PL', 0, 1),
(177, 177, 'PT', 0, 1),
(178, 178, 'PR', 0, 1),
(179, 179, 'QA', 0, 1),
(180, 180, 'RE', 0, 1),
(181, 181, 'RO', 0, 1),
(182, 182, 'RU', 0, 1),
(183, 183, 'RW', 0, 1),
(184, 184, 'BL', 0, 1),
(185, 185, 'SH', 0, 1),
(186, 186, 'KN', 0, 1),
(187, 187, 'LC', 0, 1),
(188, 188, 'MF', 0, 1),
(189, 189, 'PM', 0, 1),
(190, 190, 'VC', 0, 1),
(191, 191, 'WS', 0, 1),
(192, 192, 'SM', 0, 1),
(193, 193, 'ST', 0, 1),
(194, 194, 'SA', 0, 1),
(195, 195, 'SN', 0, 1),
(196, 196, 'RS', 0, 1),
(197, 197, 'SC', 0, 1),
(198, 198, 'SL', 0, 1),
(199, 199, 'SG', 0, 1),
(200, 200, 'SX', 0, 1),
(201, 201, 'SK', 0, 1),
(202, 202, 'SI', 0, 1),
(203, 203, 'SB', 0, 1),
(204, 204, 'SO', 0, 1),
(205, 205, 'ZA', 0, 1),
(206, 206, 'GS', 0, 1),
(207, 207, 'KR', 0, 1),
(208, 208, 'SS', 0, 1),
(209, 209, 'ES', 0, 1),
(210, 210, 'LK', 0, 1),
(211, 211, 'SD', 0, 1),
(212, 212, 'SR', 0, 1),
(213, 213, 'SJ', 0, 1),
(214, 214, 'SZ', 0, 1),
(215, 215, 'SE', 0, 1),
(216, 216, 'CH', 0, 1),
(217, 217, 'SY', 0, 1),
(218, 218, 'TW', 0, 1),
(219, 219, 'TJ', 0, 1),
(220, 220, 'TZ', 0, 1),
(221, 221, 'TH', 0, 1),
(222, 222, 'TL', 0, 1),
(223, 223, 'TG', 0, 1),
(224, 224, 'TK', 0, 1),
(225, 225, 'TO', 0, 1),
(226, 226, 'TT', 0, 1),
(227, 227, 'TN', 0, 1),
(228, 228, 'TR', 0, 1),
(229, 229, 'TM', 0, 1),
(230, 230, 'TC', 0, 1),
(231, 231, 'TV', 0, 1),
(232, 232, 'UG', 0, 1),
(233, 233, 'UA', 0, 1),
(234, 234, 'AE', 0, 1),
(235, 235, 'GB', 0, 1),
(236, 236, 'US', 0, 1),
(237, 237, 'UM', 0, 1),
(238, 238, 'UY', 0, 1),
(239, 239, 'UZ', 0, 1),
(240, 240, 'VU', 0, 1),
(241, 241, 'VA', 0, 1),
(242, 242, 'VE', 0, 1),
(243, 243, 'VN', 0, 1),
(244, 244, 'VG', 0, 1),
(245, 245, 'VI', 0, 1),
(246, 246, 'WF', 0, 1),
(247, 247, 'EH', 0, 1),
(248, 248, 'YE', 0, 1),
(249, 249, 'ZM', 0, 1),
(250, 250, 'ZW', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SettingLocalization`
--

CREATE TABLE `SettingLocalization` (
  `ID` int(11) NOT NULL,
  `LocID` int(11) NOT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Code` varchar(2) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SettingLocalization`
--

INSERT INTO `SettingLocalization` (`ID`, `LocID`, `City`, `Code`, `Active`) VALUES
(1, 1, 'Baku', 'AZ', 1),
(2, 1, 'Баку', 'AZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SettingPhoneCodes`
--

CREATE TABLE `SettingPhoneCodes` (
  `ID` int(11) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `DialCode` varchar(50) DEFAULT NULL,
  `Code` varchar(10) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SettingPhoneCodes`
--

INSERT INTO `SettingPhoneCodes` (`ID`, `Country`, `DialCode`, `Code`, `Active`) VALUES
(1, 'Israel', '+972', 'IL', 1),
(2, 'Afghanistan', '+93', 'AF', 1),
(3, 'Albania', '+355', 'AL', 1),
(4, 'Algeria', '+213', 'DZ', 1),
(5, 'AmericanSamoa', '+1 684', 'AS', 1),
(6, 'Andorra', '+376', 'AD', 1),
(7, 'Angola', '+244', 'AO', 1),
(8, 'Anguilla', '+1 264', 'AI', 1),
(9, 'Antigua and Barbuda', '+1268', 'AG', 1),
(10, 'Argentina', '+54', 'AR', 1),
(11, 'Armenia', '+374', 'AM', 1),
(12, 'Aruba', '+297', 'AW', 1),
(13, 'Australia', '+61', 'AU', 1),
(14, 'Austria', '+43', 'AT', 1),
(15, 'Azerbaijan', '+994', 'AZ', 1),
(16, 'Bahamas', '+1 242', 'BS', 1),
(17, 'Bahrain', '+973', 'BH', 1),
(18, 'Bangladesh', '+880', 'BD', 1),
(19, 'Barbados', '+1 246', 'BB', 1),
(20, 'Belarus', '+375', 'BY', 1),
(21, 'Belgium', '+32', 'BE', 1),
(22, 'Belize', '+501', 'BZ', 1),
(23, 'Benin', '+229', 'BJ', 1),
(24, 'Bermuda', '+1 441', 'BM', 1),
(25, 'Bhutan', '+975', 'BT', 1),
(26, 'Bosnia and Herzegovina', '+387', 'BA', 1),
(27, 'Botswana', '+267', 'BW', 1),
(28, 'Brazil', '+55', 'BR', 1),
(29, 'British Indian Ocean Territory', '+246', 'IO', 1),
(30, 'Bulgaria', '+359', 'BG', 1),
(31, 'Burkina Faso', '+226', 'BF', 1),
(32, 'Burundi', '+257', 'BI', 1),
(33, 'Cambodia', '+855', 'KH', 1),
(34, 'Cameroon', '+237', 'CM', 1),
(35, 'Canada', '+1', 'CA', 1),
(36, 'Cape Verde', '+238', 'CV', 1),
(37, 'Cayman Islands', '+ 345', 'KY', 1),
(38, 'Central African Republic', '+236', 'CF', 1),
(39, 'Chad', '+235', 'TD', 1),
(40, 'Chile', '+56', 'CL', 1),
(41, 'China', '+86', 'CN', 1),
(42, 'Christmas Island', '+61', 'CX', 1),
(43, 'Colombia', '+57', 'CO', 1),
(44, 'Comoros', '+269', 'KM', 1),
(45, 'Congo', '+242', 'CG', 1),
(46, 'Cook Islands', '+682', 'CK', 1),
(47, 'Costa Rica', '+506', 'CR', 1),
(48, 'Croatia', '+385', 'HR', 1),
(49, 'Cuba', '+53', 'CU', 1),
(50, 'Cyprus', '+537', 'CY', 1),
(51, 'Czech Republic', '+420', 'CZ', 1),
(52, 'Denmark', '+45', 'DK', 1),
(53, 'Djibouti', '+253', 'DJ', 1),
(54, 'Dominica', '+1 767', 'DM', 1),
(55, 'Dominican Republic', '+1 849', 'DO', 1),
(56, 'Ecuador', '+593', 'EC', 1),
(57, 'Egypt', '+20', 'EG', 1),
(58, 'El Salvador', '+503', 'SV', 1),
(59, 'Equatorial Guinea', '+240', 'GQ', 1),
(60, 'Eritrea', '+291', 'ER', 1),
(61, 'Estonia', '+372', 'EE', 1),
(62, 'Ethiopia', '+251', 'ET', 1),
(63, 'Faroe Islands', '+298', 'FO', 1),
(64, 'Fiji', '+679', 'FJ', 1),
(65, 'Finland', '+358', 'FI', 1),
(66, 'France', '+33', 'FR', 1),
(67, 'French Guiana', '+594', 'GF', 1),
(68, 'French Polynesia', '+689', 'PF', 1),
(69, 'Gabon', '+241', 'GA', 1),
(70, 'Gambia', '+220', 'GM', 1),
(71, 'Georgia', '+995', 'GE', 1),
(72, 'Germany', '+49', 'DE', 1),
(73, 'Ghana', '+233', 'GH', 1),
(74, 'Gibraltar', '+350', 'GI', 1),
(75, 'Greece', '+30', 'GR', 1),
(76, 'Greenland', '+299', 'GL', 1),
(77, 'Grenada', '+1 473', 'GD', 1),
(78, 'Guadeloupe', '+590', 'GP', 1),
(79, 'Guam', '+1 671', 'GU', 1),
(80, 'Guatemala', '+502', 'GT', 1),
(81, 'Guinea', '+224', 'GN', 1),
(82, 'Guinea-Bissau', '+245', 'GW', 1),
(83, 'Guyana', '+595', 'GY', 1),
(84, 'Haiti', '+509', 'HT', 1),
(85, 'Honduras', '+504', 'HN', 1),
(86, 'Hungary', '+36', 'HU', 1),
(87, 'Iceland', '+354', 'IS', 1),
(88, 'India', '+91', 'IN', 1),
(89, 'Indonesia', '+62', 'ID', 1),
(90, 'Iraq', '+964', 'IQ', 1),
(91, 'Ireland', '+353', 'IE', 1),
(92, 'Israel', '+972', 'IL', 1),
(93, 'Italy', '+39', 'IT', 1),
(94, 'Jamaica', '+1 876', 'JM', 1),
(95, 'Japan', '+81', 'JP', 1),
(96, 'Jordan', '+962', 'JO', 1),
(97, 'Kazakhstan', '+7 7', 'KZ', 1),
(98, 'Kenya', '+254', 'KE', 1),
(99, 'Kiribati', '+686', 'KI', 1),
(100, 'Kuwait', '+965', 'KW', 1),
(101, 'Kyrgyzstan', '+996', 'KG', 1),
(102, 'Latvia', '+371', 'LV', 1),
(103, 'Lebanon', '+961', 'LB', 1),
(104, 'Lesotho', '+266', 'LS', 1),
(105, 'Liberia', '+231', 'LR', 1),
(106, 'Liechtenstein', '+423', 'LI', 1),
(107, 'Lithuania', '+370', 'LT', 1),
(108, 'Luxembourg', '+352', 'LU', 1),
(109, 'Madagascar', '+261', 'MG', 1),
(110, 'Malawi', '+265', 'MW', 1),
(111, 'Malaysia', '+60', 'MY', 1),
(112, 'Maldives', '+960', 'MV', 1),
(113, 'Mali', '+223', 'ML', 1),
(114, 'Malta', '+356', 'MT', 1),
(115, 'Marshall Islands', '+692', 'MH', 1),
(116, 'Martinique', '+596', 'MQ', 1),
(117, 'Mauritania', '+222', 'MR', 1),
(118, 'Mauritius', '+230', 'MU', 1),
(119, 'Mayotte', '+262', 'YT', 1),
(120, 'Mexico', '+52', 'MX', 1),
(121, 'Monaco', '+377', 'MC', 1),
(122, 'Mongolia', '+976', 'MN', 1),
(123, 'Montenegro', '+382', 'ME', 1),
(124, 'Montserrat', '+1664', 'MS', 1),
(125, 'Morocco', '+212', 'MA', 1),
(126, 'Myanmar', '+95', 'MM', 1),
(127, 'Namibia', '+264', 'NA', 1),
(128, 'Nauru', '+674', 'NR', 1),
(129, 'Nepal', '+977', 'NP', 1),
(130, 'Netherlands', '+31', 'NL', 1),
(131, 'Netherlands Antilles', '+599', 'AN', 1),
(132, 'New Caledonia', '+687', 'NC', 1),
(133, 'New Zealand', '+64', 'NZ', 1),
(134, 'Nicaragua', '+505', 'NI', 1),
(135, 'Niger', '+227', 'NE', 1),
(136, 'Nigeria', '+234', 'NG', 1),
(137, 'Niue', '+683', 'NU', 1),
(138, 'Norfolk Island', '+672', 'NF', 1),
(139, 'Northern Mariana Islands', '+1 670', 'MP', 1),
(140, 'Norway', '+47', 'NO', 1),
(141, 'Oman', '+968', 'OM', 1),
(142, 'Pakistan', '+92', 'PK', 1),
(143, 'Palau', '+680', 'PW', 1),
(144, 'Panama', '+507', 'PA', 1),
(145, 'Papua New Guinea', '+675', 'PG', 1),
(146, 'Paraguay', '+595', 'PY', 1),
(147, 'Peru', '+51', 'PE', 1),
(148, 'Philippines', '+63', 'PH', 1),
(149, 'Poland', '+48', 'PL', 1),
(150, 'Portugal', '+351', 'PT', 1),
(151, 'Puerto Rico', '+1 939', 'PR', 1),
(152, 'Qatar', '+974', 'QA', 1),
(153, 'Romania', '+40', 'RO', 1),
(154, 'Rwanda', '+250', 'RW', 1),
(155, 'Samoa', '+685', 'WS', 1),
(156, 'San Marino', '+378', 'SM', 1),
(157, 'Saudi Arabia', '+966', 'SA', 1),
(158, 'Senegal', '+221', 'SN', 1),
(159, 'Serbia', '+381', 'RS', 1),
(160, 'Seychelles', '+248', 'SC', 1),
(161, 'Sierra Leone', '+232', 'SL', 1),
(162, 'Singapore', '+65', 'SG', 1),
(163, 'Slovakia', '+421', 'SK', 1),
(164, 'Slovenia', '+386', 'SI', 1),
(165, 'Solomon Islands', '+677', 'SB', 1),
(166, 'South Africa', '+27', 'ZA', 1),
(167, 'South Georgia and the South Sandwich Islands', '+500', 'GS', 1),
(168, 'Spain', '+34', 'ES', 1),
(169, 'Sri Lanka', '+94', 'LK', 1),
(170, 'Sudan', '+249', 'SD', 1),
(171, 'Suriname', '+597', 'SR', 1),
(172, 'Swaziland', '+268', 'SZ', 1),
(173, 'Sweden', '+46', 'SE', 1),
(174, 'Switzerland', '+41', 'CH', 1),
(175, 'Tajikistan', '+992', 'TJ', 1),
(176, 'Thailand', '+66', 'TH', 1),
(177, 'Togo', '+228', 'TG', 1),
(178, 'Tokelau', '+690', 'TK', 1),
(179, 'Tonga', '+676', 'TO', 1),
(180, 'Trinidad and Tobago', '+1 868', 'TT', 1),
(181, 'Tunisia', '+216', 'TN', 1),
(182, 'Turkey', '+90', 'TR', 1),
(183, 'Turkmenistan', '+993', 'TM', 1),
(184, 'Turks and Caicos Islands', '+1 649', 'TC', 1),
(185, 'Tuvalu', '+688', 'TV', 1),
(186, 'Uganda', '+256', 'UG', 1),
(187, 'Ukraine', '+380', 'UA', 1),
(188, 'United Arab Emirates', '+971', 'AE', 1),
(189, 'United Kingdom', '+44', 'GB', 1),
(190, 'United States', '+1', 'US', 1),
(191, 'Uruguay', '+598', 'UY', 1),
(192, 'Uzbekistan', '+998', 'UZ', 1),
(193, 'Vanuatu', '+678', 'VU', 1),
(194, 'Wallis and Futuna', '+681', 'WF', 1),
(195, 'Yemen', '+967', 'YE', 1),
(196, 'Zambia', '+260', 'ZM', 1),
(197, 'Zimbabwe', '+263', 'ZW', 1),
(198, 'Israel', '+972', 'IL', 1),
(199, 'Afghanistan', '+93', 'AF', 1),
(200, 'Albania', '+355', 'AL', 1),
(201, 'Algeria', '+213', 'DZ', 1),
(202, 'AmericanSamoa', '+1 684', 'AS', 1),
(203, 'Andorra', '+376', 'AD', 1),
(204, 'Angola', '+244', 'AO', 1),
(205, 'Anguilla', '+1 264', 'AI', 1),
(206, 'Antigua and Barbuda', '+1268', 'AG', 1),
(207, 'Argentina', '+54', 'AR', 1),
(208, 'Armenia', '+374', 'AM', 1),
(209, 'Aruba', '+297', 'AW', 1),
(210, 'Australia', '+61', 'AU', 1),
(211, 'Austria', '+43', 'AT', 1),
(212, 'Azerbaijan', '+994', 'AZ', 1),
(213, 'Bahamas', '+1 242', 'BS', 1),
(214, 'Bahrain', '+973', 'BH', 1),
(215, 'Bangladesh', '+880', 'BD', 1),
(216, 'Barbados', '+1 246', 'BB', 1),
(217, 'Belarus', '+375', 'BY', 1),
(218, 'Belgium', '+32', 'BE', 1),
(219, 'Belize', '+501', 'BZ', 1),
(220, 'Benin', '+229', 'BJ', 1),
(221, 'Bermuda', '+1 441', 'BM', 1),
(222, 'Bhutan', '+975', 'BT', 1),
(223, 'Bosnia and Herzegovina', '+387', 'BA', 1),
(224, 'Botswana', '+267', 'BW', 1),
(225, 'Brazil', '+55', 'BR', 1),
(226, 'British Indian Ocean Territory', '+246', 'IO', 1),
(227, 'Bulgaria', '+359', 'BG', 1),
(228, 'Burkina Faso', '+226', 'BF', 1),
(229, 'Burundi', '+257', 'BI', 1),
(230, 'Cambodia', '+855', 'KH', 1),
(231, 'Cameroon', '+237', 'CM', 1),
(232, 'Canada', '+1', 'CA', 1),
(233, 'Cape Verde', '+238', 'CV', 1),
(234, 'Cayman Islands', '+ 345', 'KY', 1),
(235, 'Central African Republic', '+236', 'CF', 1),
(236, 'Chad', '+235', 'TD', 1),
(237, 'Chile', '+56', 'CL', 1),
(238, 'China', '+86', 'CN', 1),
(239, 'Christmas Island', '+61', 'CX', 1),
(240, 'Colombia', '+57', 'CO', 1),
(241, 'Comoros', '+269', 'KM', 1),
(242, 'Congo', '+242', 'CG', 1),
(243, 'Cook Islands', '+682', 'CK', 1),
(244, 'Costa Rica', '+506', 'CR', 1),
(245, 'Croatia', '+385', 'HR', 1),
(246, 'Cuba', '+53', 'CU', 1),
(247, 'Cyprus', '+537', 'CY', 1),
(248, 'Czech Republic', '+420', 'CZ', 1),
(249, 'Denmark', '+45', 'DK', 1),
(250, 'Djibouti', '+253', 'DJ', 1),
(251, 'Dominica', '+1 767', 'DM', 1),
(252, 'Dominican Republic', '+1 849', 'DO', 1),
(253, 'Ecuador', '+593', 'EC', 1),
(254, 'Egypt', '+20', 'EG', 1),
(255, 'El Salvador', '+503', 'SV', 1),
(256, 'Equatorial Guinea', '+240', 'GQ', 1),
(257, 'Eritrea', '+291', 'ER', 1),
(258, 'Estonia', '+372', 'EE', 1),
(259, 'Ethiopia', '+251', 'ET', 1),
(260, 'Faroe Islands', '+298', 'FO', 1),
(261, 'Fiji', '+679', 'FJ', 1),
(262, 'Finland', '+358', 'FI', 1),
(263, 'France', '+33', 'FR', 1),
(264, 'French Guiana', '+594', 'GF', 1),
(265, 'French Polynesia', '+689', 'PF', 1),
(266, 'Gabon', '+241', 'GA', 1),
(267, 'Gambia', '+220', 'GM', 1),
(268, 'Georgia', '+995', 'GE', 1),
(269, 'Germany', '+49', 'DE', 1),
(270, 'Ghana', '+233', 'GH', 1),
(271, 'Gibraltar', '+350', 'GI', 1),
(272, 'Greece', '+30', 'GR', 1),
(273, 'Greenland', '+299', 'GL', 1),
(274, 'Grenada', '+1 473', 'GD', 1),
(275, 'Guadeloupe', '+590', 'GP', 1),
(276, 'Guam', '+1 671', 'GU', 1),
(277, 'Guatemala', '+502', 'GT', 1),
(278, 'Guinea', '+224', 'GN', 1),
(279, 'Guinea-Bissau', '+245', 'GW', 1),
(280, 'Guyana', '+595', 'GY', 1),
(281, 'Haiti', '+509', 'HT', 1),
(282, 'Honduras', '+504', 'HN', 1),
(283, 'Hungary', '+36', 'HU', 1),
(284, 'Iceland', '+354', 'IS', 1),
(285, 'India', '+91', 'IN', 1),
(286, 'Indonesia', '+62', 'ID', 1),
(287, 'Iraq', '+964', 'IQ', 1),
(288, 'Ireland', '+353', 'IE', 1),
(289, 'Israel', '+972', 'IL', 1),
(290, 'Italy', '+39', 'IT', 1),
(291, 'Jamaica', '+1 876', 'JM', 1),
(292, 'Japan', '+81', 'JP', 1),
(293, 'Jordan', '+962', 'JO', 1),
(294, 'Kazakhstan', '+7 7', 'KZ', 1),
(295, 'Kenya', '+254', 'KE', 1),
(296, 'Kiribati', '+686', 'KI', 1),
(297, 'Kuwait', '+965', 'KW', 1),
(298, 'Kyrgyzstan', '+996', 'KG', 1),
(299, 'Latvia', '+371', 'LV', 1),
(300, 'Lebanon', '+961', 'LB', 1),
(301, 'Lesotho', '+266', 'LS', 1),
(302, 'Liberia', '+231', 'LR', 1),
(303, 'Liechtenstein', '+423', 'LI', 1),
(304, 'Lithuania', '+370', 'LT', 1),
(305, 'Luxembourg', '+352', 'LU', 1),
(306, 'Madagascar', '+261', 'MG', 1),
(307, 'Malawi', '+265', 'MW', 1),
(308, 'Malaysia', '+60', 'MY', 1),
(309, 'Maldives', '+960', 'MV', 1),
(310, 'Mali', '+223', 'ML', 1),
(311, 'Malta', '+356', 'MT', 1),
(312, 'Marshall Islands', '+692', 'MH', 1),
(313, 'Martinique', '+596', 'MQ', 1),
(314, 'Mauritania', '+222', 'MR', 1),
(315, 'Mauritius', '+230', 'MU', 1),
(316, 'Mayotte', '+262', 'YT', 1),
(317, 'Mexico', '+52', 'MX', 1),
(318, 'Monaco', '+377', 'MC', 1),
(319, 'Mongolia', '+976', 'MN', 1),
(320, 'Montenegro', '+382', 'ME', 1),
(321, 'Montserrat', '+1664', 'MS', 1),
(322, 'Morocco', '+212', 'MA', 1),
(323, 'Myanmar', '+95', 'MM', 1),
(324, 'Namibia', '+264', 'NA', 1),
(325, 'Nauru', '+674', 'NR', 1),
(326, 'Nepal', '+977', 'NP', 1),
(327, 'Netherlands', '+31', 'NL', 1),
(328, 'Netherlands Antilles', '+599', 'AN', 1),
(329, 'New Caledonia', '+687', 'NC', 1),
(330, 'New Zealand', '+64', 'NZ', 1),
(331, 'Nicaragua', '+505', 'NI', 1),
(332, 'Niger', '+227', 'NE', 1),
(333, 'Nigeria', '+234', 'NG', 1),
(334, 'Niue', '+683', 'NU', 1),
(335, 'Norfolk Island', '+672', 'NF', 1),
(336, 'Northern Mariana Islands', '+1 670', 'MP', 1),
(337, 'Norway', '+47', 'NO', 1),
(338, 'Oman', '+968', 'OM', 1),
(339, 'Pakistan', '+92', 'PK', 1),
(340, 'Palau', '+680', 'PW', 1),
(341, 'Panama', '+507', 'PA', 1),
(342, 'Papua New Guinea', '+675', 'PG', 1),
(343, 'Paraguay', '+595', 'PY', 1),
(344, 'Peru', '+51', 'PE', 1),
(345, 'Philippines', '+63', 'PH', 1),
(346, 'Poland', '+48', 'PL', 1),
(347, 'Portugal', '+351', 'PT', 1),
(348, 'Puerto Rico', '+1 939', 'PR', 1),
(349, 'Qatar', '+974', 'QA', 1),
(350, 'Romania', '+40', 'RO', 1),
(351, 'Rwanda', '+250', 'RW', 1),
(352, 'Samoa', '+685', 'WS', 1),
(353, 'San Marino', '+378', 'SM', 1),
(354, 'Saudi Arabia', '+966', 'SA', 1),
(355, 'Senegal', '+221', 'SN', 1),
(356, 'Serbia', '+381', 'RS', 1),
(357, 'Seychelles', '+248', 'SC', 1),
(358, 'Sierra Leone', '+232', 'SL', 1),
(359, 'Singapore', '+65', 'SG', 1),
(360, 'Slovakia', '+421', 'SK', 1),
(361, 'Slovenia', '+386', 'SI', 1),
(362, 'Solomon Islands', '+677', 'SB', 1),
(363, 'South Africa', '+27', 'ZA', 1),
(364, 'South Georgia and the South Sandwich Islands', '+500', 'GS', 1),
(365, 'Spain', '+34', 'ES', 1),
(366, 'Sri Lanka', '+94', 'LK', 1),
(367, 'Sudan', '+249', 'SD', 1),
(368, 'Suriname', '+597', 'SR', 1),
(369, 'Swaziland', '+268', 'SZ', 1),
(370, 'Sweden', '+46', 'SE', 1),
(371, 'Switzerland', '+41', 'CH', 1),
(372, 'Tajikistan', '+992', 'TJ', 1),
(373, 'Thailand', '+66', 'TH', 1),
(374, 'Togo', '+228', 'TG', 1),
(375, 'Tokelau', '+690', 'TK', 1),
(376, 'Tonga', '+676', 'TO', 1),
(377, 'Trinidad and Tobago', '+1 868', 'TT', 1),
(378, 'Tunisia', '+216', 'TN', 1),
(379, 'Turkey', '+90', 'TR', 1),
(380, 'Turkmenistan', '+993', 'TM', 1),
(381, 'Turks and Caicos Islands', '+1 649', 'TC', 1),
(382, 'Tuvalu', '+688', 'TV', 1),
(383, 'Uganda', '+256', 'UG', 1),
(384, 'Ukraine', '+380', 'UA', 1),
(385, 'United Arab Emirates', '+971', 'AE', 1),
(386, 'United Kingdom', '+44', 'GB', 1),
(387, 'United States', '+1', 'US', 1),
(388, 'Uruguay', '+598', 'UY', 1),
(389, 'Uzbekistan', '+998', 'UZ', 1),
(390, 'Vanuatu', '+678', 'VU', 1),
(391, 'Wallis and Futuna', '+681', 'WF', 1),
(392, 'Yemen', '+967', 'YE', 1),
(393, 'Zambia', '+260', 'ZM', 1),
(394, 'Zimbabwe', '+263', 'ZW', 1),
(395, 'land Islands', NULL, 'AX', 1),
(396, 'Antarctica', NULL, 'AQ', 1),
(397, 'Bolivia, Plurinational State of', '+591', 'BO', 1),
(398, 'Brunei Darussalam', '+673', 'BN', 1),
(399, 'Cocos (Keeling) Islands', '+61', 'CC', 1),
(400, 'Congo, The Democratic Republic of the', '+243', 'CD', 1),
(401, 'Cote d\'Ivoire', '+225', 'CI', 1),
(402, 'Falkland Islands (Malvinas)', '+500', 'FK', 1),
(403, 'Guernsey', '+44', 'GG', 1),
(404, 'Holy See (Vatican City State)', '+379', 'VA', 1),
(405, 'Hong Kong', '+852', 'HK', 1),
(406, 'Iran, Islamic Republic of', '+98', 'IR', 1),
(407, 'Isle of Man', '+44', 'IM', 1),
(408, 'Jersey', '+44', 'JE', 1),
(409, 'Korea, Democratic People\'s Republic of', '+850', 'KP', 1),
(410, 'Korea, Republic of', '+82', 'KR', 1),
(411, 'Lao People\'s Democratic Republic', '+856', 'LA', 1),
(412, 'Libyan Arab Jamahiriya', '+218', 'LY', 1),
(413, 'Macao', '+853', 'MO', 1),
(414, 'Macedonia, The Former Yugoslav Republic of', '+389', 'MK', 1),
(415, 'Micronesia, Federated States of', '+691', 'FM', 1),
(416, 'Moldova, Republic of', '+373', 'MD', 1),
(417, 'Mozambique', '+258', 'MZ', 1),
(418, 'Palestinian Territory, Occupied', '+970', 'PS', 1),
(419, 'Pitcairn', '+872', 'PN', 1),
(420, 'Réunion', '+262', 'RE', 1),
(421, 'Russia', '+7', 'RU', 1),
(422, 'Saint Barthélemy', '+590', 'BL', 1),
(423, 'Saint Helena, Ascension and Tristan Da Cunha', '+290', 'SH', 1),
(424, 'Saint Kitts and Nevis', '+1 869', 'KN', 1),
(425, 'Saint Lucia', '+1 758', 'LC', 1),
(426, 'Saint Martin', '+590', 'MF', 1),
(427, 'Saint Pierre and Miquelon', '+508', 'PM', 1),
(428, 'Saint Vincent and the Grenadines', '+1 784', 'VC', 1),
(429, 'Sao Tome and Principe', '+239', 'ST', 1),
(430, 'Somalia', '+252', 'SO', 1),
(431, 'Svalbard and Jan Mayen', '+47', 'SJ', 1),
(432, 'Syrian Arab Republic', '+963', 'SY', 1),
(433, 'Taiwan, Province of China', '+886', 'TW', 1),
(434, 'Tanzania, United Republic of', '+255', 'TZ', 1),
(435, 'Timor-Leste', '+670', 'TL', 1),
(436, 'Venezuela, Bolivarian Republic of', '+58', 'VE', 1),
(437, 'Viet Nam', '+84', 'VN', 1),
(438, 'Virgin Islands, British', '+1 284', 'VG', 1),
(439, 'Virgin Islands, U.S.', '+1 340', 'VI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SMSAPI`
--

CREATE TABLE `SMSAPI` (
  `ID` int(11) NOT NULL,
  `API_Key` bigint(20) DEFAULT NULL,
  `Number` varchar(200) DEFAULT NULL,
  `Variables` varchar(200) DEFAULT NULL,
  `TemplateID` int(11) DEFAULT NULL,
  `Datestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SMSAPI`
--

INSERT INTO `SMSAPI` (`ID`, `API_Key`, `Number`, `Variables`, `TemplateID`, `Datestamp`, `Status`) VALUES
(1, 5055800212780818, '+994554600016', 'farid, 3456', 1, '2020-11-24 22:30:20', 1),
(2, 5055800212780818, '+994508001962', 'Alex,58582', 1, '2020-12-02 06:54:20', 1),
(3, 5055800212780818, ' 9947934928', 'test,3286', 1, '2020-12-02 13:25:02', 1),
(4, 5055800212780818, ' 9947934928', 'test,9840', 1, '2020-12-02 13:26:28', 1),
(5, 5055800212780818, ' 9947934928', 'test,1146', 1, '2020-12-02 13:26:39', 1),
(6, 5055800212780818, ' 9947934928', 'test,5412', 1, '2020-12-02 13:27:53', 1),
(7, 5055800212780818, ' 9947934928', 'test,5584', 1, '2020-12-02 13:28:08', 1),
(8, 5055800212780818, ' 9947934928', 'test,8106', 1, '2020-12-02 13:30:09', 1),
(9, 5055800212780818, ' 9947934928', 'test,9434', 1, '2020-12-02 13:31:16', 1),
(10, 5055800212780818, ' 9947934928', 'test,5566', 1, '2020-12-03 07:03:10', 1),
(11, 5055800212780818, ' 9947934928', 'test,8792', 1, '2020-12-03 07:05:07', 1),
(12, 5055800212780818, ' 9947934928', 'test,6903', 1, '2020-12-03 07:05:08', 1),
(13, 5055800212780818, '556631220118', '7777', 1, '2020-12-11 11:53:44', 1),
(14, 5055800212780818, '556631220118', '9311', 1, '2020-12-11 11:54:30', 1),
(15, 5055800212780818, '+994556631220', '1111', 1, '2020-12-11 12:02:32', 1),
(16, 5055800212780818, '+994508001962', '1111', 1, '2020-12-11 12:02:36', 1),
(17, 5055800212780818, '556631220118', '4218', 1, '2020-12-11 12:07:27', 1),
(18, 5055800212780818, '556631220118', '7533', 1, '2020-12-11 12:15:50', 1),
(19, 5055800212780818, '556631220118', '8432', 1, '2020-12-11 12:16:51', 1),
(20, 5055800212780818, '556631220118', '9669', 1, '2020-12-11 12:17:00', 1),
(21, 5055800212780818, '556631220118', '4533', 1, '2020-12-11 12:17:31', 1),
(22, 5055800212780818, '+994556631220', '3155', 1, '2020-12-11 12:19:07', 1),
(23, 5055800212780818, '+994556631220', '8815', 1, '2020-12-11 12:19:53', 1),
(24, 5055800212780818, '+994556631220', '9563', 1, '2020-12-11 12:29:28', 1),
(25, 5055800212780818, '+994556631220', '1567', 1, '2020-12-11 12:34:35', 1),
(26, 5055800212780818, '+994556631220', '8272', 1, '2020-12-11 12:35:57', 1),
(27, 5055800212780818, '+994556631220', '2339', 1, '2020-12-11 13:34:23', 1),
(28, 5055800212780818, '+994508001962', '5456', 1, '2020-12-14 09:26:19', 1),
(29, 5055800212780818, 'Array', '809396', 1, '2020-12-21 11:22:19', 1),
(30, 5055800212780818, 'Array', '778448', 1, '2020-12-21 11:22:44', 1),
(31, 5055800212780818, 'Array', '917793', 1, '2020-12-21 11:25:03', 1),
(32, 5055800212780818, 'Array', '996300', 1, '2020-12-21 11:25:59', 1),
(33, 5055800212780818, 'Array', '931885', 1, '2020-12-21 11:27:07', 1),
(34, 5055800212780818, '+994556631220', '987330', 1, '2020-12-21 11:27:52', 1),
(35, 5055800212780818, '+994556631220', '735856', 1, '2020-12-21 12:10:49', 1),
(36, 5055800212780818, '+994556631220', '525162', 1, '2020-12-21 12:11:59', 1),
(37, 5055800212780818, '+994556631220', '790971', 1, '2020-12-21 13:57:46', 1),
(38, 5055800212780818, '+994556631220', '595574', 1, '2020-12-21 14:06:52', 1),
(39, 5055800212780818, '+994556631220', '677219', 1, '2020-12-21 14:11:23', 1),
(40, 5055800212780818, '+994556631220', '254313', 1, '2020-12-21 14:44:43', 1),
(41, 5055800212780818, '+994556631220', '554145', 1, '2020-12-22 08:38:13', 1),
(42, 5055800212780818, '+994556631220', '437900', 1, '2020-12-24 22:51:25', 1),
(43, 5055800212780818, ' 994508001962', ',1', 1, '2020-12-25 15:47:53', 1),
(44, 5055800212780818, ' 994508001962', ',1', 1, '2020-12-25 15:47:55', 1),
(45, 5055800212780818, '+994508001962', '8275', 1, '2021-01-05 13:12:45', 1),
(46, 5055800212780818, '+994556631220', '9997', 1, '2021-01-05 13:13:57', 1),
(47, 5055800212780818, '+994508001962', '3198', 1, '2021-01-05 13:15:33', 1),
(48, 5055800212780818, '+994556631220', '493289', 1, '2021-01-05 13:50:33', 1),
(49, 5055800212780818, '+994556631220', '330789', 1, '2021-01-05 13:50:49', 1),
(50, 5055800212780818, '+994556631220', '541990', 1, '2021-01-05 13:50:53', 1),
(51, 5055800212780818, '+994556631220', '816124', 1, '2021-01-05 13:52:27', 1),
(52, 5055800212780818, '+994556631220', '928370', 1, '2021-01-05 13:54:10', 1),
(53, 5055800212780818, '+994556631220', '669782', 1, '2021-01-05 13:54:32', 1),
(54, 5055800212780818, '+994556631220', '2732', 1, '2021-01-06 07:37:22', 1),
(55, 5055800212780818, '+994556631220', '5599', 1, '2021-01-06 07:39:28', 1),
(56, 5055800212780818, '+994556631220', '6010', 1, '2021-01-06 07:41:04', 1),
(57, 5055800212780818, '+994556631220', '277388', 1, '2021-01-06 08:58:24', 1),
(58, 5055800212780818, '+994556631220', '276956', 1, '2021-01-06 08:58:35', 1),
(59, 5055800212780818, '+994556631220', '340887', 1, '2021-01-06 08:59:01', 1),
(60, 5055800212780818, '+994556631220', '7513', 1, '2021-01-06 10:37:56', 1),
(61, 5055800212780818, '+994554600016', '8764', 1, '2021-01-11 14:21:51', 1),
(62, 5055800212780818, '+994556631220', '6341', 1, '2021-01-15 14:02:17', 1),
(63, 5055800212780818, '', '579807', 1, '2021-01-15 14:06:46', 1),
(64, 5055800212780818, '+994556631220', '288535', 1, '2021-01-15 14:11:20', 1),
(65, 5055800212780818, '+994556631220', '352019', 1, '2021-01-15 14:12:56', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwCalculatedDaysByListing`
-- (See below for the actual view)
--
CREATE TABLE `vwCalculatedDaysByListing` (
`listingID` int(11)
,`Count` decimal(50,0)
);

-- --------------------------------------------------------

--
-- Structure for view `vwCalculatedDaysByListing`
--
DROP TABLE IF EXISTS `vwCalculatedDaysByListing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`web1`@`localhost` SQL SECURITY DEFINER VIEW `vwCalculatedDaysByListing`  AS  select `TB1`.`listingID` AS `listingID`,sum(`TB1`.`CNT`) AS `Count` from (select sum((to_days(`PropertyCalendar`.`DateTo`) - to_days(`PropertyCalendar`.`DateFrom`))) AS `CNT`,`PropertyCalendar`.`ListingID` AS `listingID` from `PropertyCalendar` where (`PropertyCalendar`.`DateFrom` >= (curdate() + interval -(2) day)) group by `PropertyCalendar`.`ListingID` union all select sum((to_days(`PropertyCalendar`.`DateTo`) - to_days((curdate() + interval -(2) day)))) AS `CNT`,`PropertyCalendar`.`ListingID` AS `listingID` from `PropertyCalendar` where ((`PropertyCalendar`.`DateFrom` < (curdate() + interval -(2) day)) and (`PropertyCalendar`.`DateTo` >= (curdate() + interval -(2) day))) group by `PropertyCalendar`.`ListingID`) `TB1` group by `TB1`.`listingID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccountActionLogs`
--
ALTER TABLE `AccountActionLogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountAddresses`
--
ALTER TABLE `AccountAddresses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountDocuments`
--
ALTER TABLE `AccountDocuments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountGeneral`
--
ALTER TABLE `AccountGeneral`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountImages`
--
ALTER TABLE `AccountImages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountingAccounts`
--
ALTER TABLE `AccountingAccounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountingCashFlow`
--
ALTER TABLE `AccountingCashFlow`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountingInvoices`
--
ALTER TABLE `AccountingInvoices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountingTransactions`
--
ALTER TABLE `AccountingTransactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountingTransactionTriggers`
--
ALTER TABLE `AccountingTransactionTriggers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountNotifications`
--
ALTER TABLE `AccountNotifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountPersonalInfo`
--
ALTER TABLE `AccountPersonalInfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountPhones`
--
ALTER TABLE `AccountPhones`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountSecurity`
--
ALTER TABLE `AccountSecurity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountSecurityAttempts`
--
ALTER TABLE `AccountSecurityAttempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountSecurityLogs`
--
ALTER TABLE `AccountSecurityLogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `AccountVerifications`
--
ALTER TABLE `AccountVerifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CalendarEvents`
--
ALTER TABLE `CalendarEvents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CityLoad`
--
ALTER TABLE `CityLoad`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CommunicationMessages`
--
ALTER TABLE `CommunicationMessages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CommunicationTypes`
--
ALTER TABLE `CommunicationTypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `LocationAttractions`
--
ALTER TABLE `LocationAttractions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PricingCalendar`
--
ALTER TABLE `PricingCalendar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyAmenities`
--
ALTER TABLE `PropertyAmenities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyBeds`
--
ALTER TABLE `PropertyBeds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyCalendar`
--
ALTER TABLE `PropertyCalendar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyCityOccupancy`
--
ALTER TABLE `PropertyCityOccupancy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyCustomPrices`
--
ALTER TABLE `PropertyCustomPrices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyListings`
--
ALTER TABLE `PropertyListings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyPrices`
--
ALTER TABLE `PropertyPrices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyReviews`
--
ALTER TABLE `PropertyReviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyRooms`
--
ALTER TABLE `PropertyRooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertyRules`
--
ALTER TABLE `PropertyRules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PropertySaved`
--
ALTER TABLE `PropertySaved`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SettingCities`
--
ALTER TABLE `SettingCities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SettingCountries`
--
ALTER TABLE `SettingCountries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SettingLocalization`
--
ALTER TABLE `SettingLocalization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SettingPhoneCodes`
--
ALTER TABLE `SettingPhoneCodes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SMSAPI`
--
ALTER TABLE `SMSAPI`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccountActionLogs`
--
ALTER TABLE `AccountActionLogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccountAddresses`
--
ALTER TABLE `AccountAddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;
--
-- AUTO_INCREMENT for table `AccountDocuments`
--
ALTER TABLE `AccountDocuments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `AccountGeneral`
--
ALTER TABLE `AccountGeneral`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `AccountImages`
--
ALTER TABLE `AccountImages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT for table `AccountingAccounts`
--
ALTER TABLE `AccountingAccounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `AccountingCashFlow`
--
ALTER TABLE `AccountingCashFlow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccountingInvoices`
--
ALTER TABLE `AccountingInvoices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `AccountingTransactions`
--
ALTER TABLE `AccountingTransactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `AccountingTransactionTriggers`
--
ALTER TABLE `AccountingTransactionTriggers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccountNotifications`
--
ALTER TABLE `AccountNotifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccountPersonalInfo`
--
ALTER TABLE `AccountPersonalInfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `AccountPhones`
--
ALTER TABLE `AccountPhones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccountSecurity`
--
ALTER TABLE `AccountSecurity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `AccountSecurityAttempts`
--
ALTER TABLE `AccountSecurityAttempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `AccountSecurityLogs`
--
ALTER TABLE `AccountSecurityLogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `AccountVerifications`
--
ALTER TABLE `AccountVerifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CalendarEvents`
--
ALTER TABLE `CalendarEvents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `CityLoad`
--
ALTER TABLE `CityLoad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `CommunicationMessages`
--
ALTER TABLE `CommunicationMessages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `CommunicationTypes`
--
ALTER TABLE `CommunicationTypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LocationAttractions`
--
ALTER TABLE `LocationAttractions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `PricingCalendar`
--
ALTER TABLE `PricingCalendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PropertyAmenities`
--
ALTER TABLE `PropertyAmenities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;
--
-- AUTO_INCREMENT for table `PropertyBeds`
--
ALTER TABLE `PropertyBeds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1562;
--
-- AUTO_INCREMENT for table `PropertyCalendar`
--
ALTER TABLE `PropertyCalendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `PropertyCityOccupancy`
--
ALTER TABLE `PropertyCityOccupancy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PropertyCustomPrices`
--
ALTER TABLE `PropertyCustomPrices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `PropertyListings`
--
ALTER TABLE `PropertyListings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2170;
--
-- AUTO_INCREMENT for table `PropertyPrices`
--
ALTER TABLE `PropertyPrices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `PropertyReviews`
--
ALTER TABLE `PropertyReviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `PropertyRooms`
--
ALTER TABLE `PropertyRooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;
--
-- AUTO_INCREMENT for table `PropertyRules`
--
ALTER TABLE `PropertyRules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;
--
-- AUTO_INCREMENT for table `PropertySaved`
--
ALTER TABLE `PropertySaved`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `SettingCities`
--
ALTER TABLE `SettingCities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `SettingCountries`
--
ALTER TABLE `SettingCountries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `SettingLocalization`
--
ALTER TABLE `SettingLocalization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `SettingPhoneCodes`
--
ALTER TABLE `SettingPhoneCodes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;
--
-- AUTO_INCREMENT for table `SMSAPI`
--
ALTER TABLE `SMSAPI`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
