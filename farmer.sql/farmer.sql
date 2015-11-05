-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2012 at 11:03 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `a_login` varchar(20) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `a_login`, `a_password`) VALUES
(1, 'mahesh', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dist_mngt`
--

CREATE TABLE IF NOT EXISTS `dist_mngt` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(20) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dist_mngt`
--

INSERT INTO `dist_mngt` (`did`, `district`) VALUES
(1, 'Ahmedabad'),
(2, 'Bhavnagar'),
(3, 'Surat'),
(5, 'Surendranagar'),
(6, 'Rajkot'),
(7, 'Anand'),
(12, 'Junagadh'),
(9, 'Mehsana'),
(10, 'Gandhinagar'),
(11, 'Bharuch');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(20) NOT NULL,
  `serv_no` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `village` varchar(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `f_id`, `serv_no`, `address`, `phone`, `village`, `comment`) VALUES
(1, 'mj', '   NMN M M', '45646', '554564', 'NKNJK', 'mahesbuusbassbiyb \r\n'),
(2, 'raj003', '7', 'opposite temple of ramapir,', '9998344078', 'Savani', 'bov mast service chhe baki'),
(3, '101', 'audgggs', 'hilldrive', '07698965420', 'kodinar', 'nice weebsite'),
(4, '101', 'audgggs', 'hilldrive', '07698965420', 'kodinar', 'nice weebsite of the prroject\r\n\r\n'),
(5, 'gautam1722', '544454478', 'kosamba', '8460577814', 'KOSAMBA', 'ula la la le o.......jordar 6\r\n\r\n'),
(8, 'mahesh', '407', 'bhbhbhjb', '6661614611', '', ''),
(9, 'mahesh', '407', 'bhbhbhjb', '6661614611', '', 'bov sars'),
(10, 'mahesh', '407', 'bhbhbhjb', '6661614611', 'kodinar', 'nnknkn'),
(11, 'prashant', '201', 'petlad', '9998231230', 'shikhandi', 'JBJHVBICG'),
(12, 'prashant', '201', 'petlad', '9998231230', 'shikhandi', 'jbhbjjjb');

-- --------------------------------------------------------

--
-- Table structure for table `god_mngt`
--

CREATE TABLE IF NOT EXISTS `god_mngt` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `taluka` varchar(20) NOT NULL,
  `godown_name` varchar(20) NOT NULL,
  `stock` varchar(10) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `god_mngt`
--

INSERT INTO `god_mngt` (`gid`, `taluka`, `godown_name`, `stock`) VALUES
(1, 'Dhandhuka', 'Dhandhuka G-1', '500'),
(2, 'Dholera', 'Dholera G-2', '640'),
(3, 'Shihor', 'Shihor G-1', '450'),
(7, 'Talaja', 'Talaja G-2', '600'),
(6, 'Bardoli', 'Bardoli G-2', '700'),
(8, 'Magrol', 'Magrol G-1', '550'),
(9, 'Dhrangadhra', 'Dhrangadhra G-1', '590'),
(10, 'Limbadi', 'Limbadi G-2', '400'),
(11, 'Morbi', 'Morbi G-1', '600'),
(12, 'Gondal', 'Gondal G-2', '650'),
(13, 'Petlad', 'Petlad G-1', '582'),
(14, 'Khambhat', 'Khambhat G-2', '820'),
(15, 'kodinar', 'kodinar G-1', '541'),
(16, 'Veraval', 'Veraval G-2', '580'),
(17, 'Kadi', 'Kadi G-1', '740'),
(18, 'Unjha', 'Unjha G-2', '670'),
(19, 'Dehgam', 'Dehgam G-1', '860'),
(20, 'Kalole', 'Kalole G-2', '647'),
(21, 'Ankleshwar', 'Ankleshwar G-1', '850'),
(22, 'Jhagadia', 'Jhagadia G-2', '250		 			 ');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `c_num` varchar(13) NOT NULL,
  `d_name` varchar(20) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `v_name` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `serv_no` varchar(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`iid`, `f_name`, `c_num`, `d_name`, `t_name`, `v_name`, `address`, `serv_no`, `comments`) VALUES
(11, 'mahesh', 'B', 'Jadav', 'lkn', 'jbkj', 'nkbk. ', '  kjbvk', 'lhl vgc cuu'),
(12, 'mahesh', 'nnhjnjn', 'jnjnjkn', 'jnkjnjkn', 'nkjnkj', 'nkjnjknknkj', 'jknkkn', 'nkjnknn'),
(13, 'kjnjn', 'nlnlnn', 'lnknlnl', 'nlnlnl', 'nnnln', 'lknlknlkn', 'nlknn', 'lmlmm'),
(14, 'jnjkknn', 'kjnnkjn', 'kjnkjnn', 'kjnjknnj', 'nnkjnkjn', 'jnnkjnkjnkjn', 'jkjknnkj', 'nnjkjknkn'),
(15, 'mnnmsd', 'hjbhjbkjb ', 'jbkjbkb', 'bjb', 'kjkb', 'jbjkkjkb', 'kjb', 'kjb'),
(16, 'vghh', 'hjvhjvhj', 'vjhvhjv', 'hhjvjh', 'vjhvhjvhv', 'jhvhjv', 'jvjhvj', 'hghbj');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE IF NOT EXISTS `my_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `taluka` varchar(20) NOT NULL,
  `main_prod` varchar(20) NOT NULL,
  `sub_prod` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`id`, `rid`, `name`, `taluka`, `main_prod`, `sub_prod`, `amount`, `flag`) VALUES
(1, 1, 'mahesh-B-Jadav', 'kodinar', '1', '3', 10, 1),
(4, 1, 'mahesh-B-Jadav', 'kodinar', '1', '8', 10, 1),
(5, 1, 'mahesh-B-Jadav', 'kodinar', '1', '7', 10, 1),
(6, 1, 'mahesh-B-Jadav', 'kodinar', '1', '7', 10, 1),
(8, 1, 'mahesh-B-Jadav', 'kodinar', '1', '5', 14, 1),
(9, 2, 'dhaval-b-va', 'Dhandhuka', '1', '7', 10, 1),
(10, 2, 'dhaval-b-va', 'Dhandhuka', '1', '4', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `tittle`, `description`) VALUES
(19, 'Sardar Sarovar Proje', 'Sardar Sarovar Project in Narmada completed.\r\nShree Narendra Modi will Cut the band at 10:00 AM 26th January,2012.'),
(20, 'Guidance by APCM', 'APCM(Agriculture Product Marketting Committe) is decided to give guidance to Farmers at 22nd September,2012 at Khambhat'),
(21, 'Agri Equipment Demon', 'The useful Guidance to use the latest equipment and also giving demo of it at 15th August,2012 at Bardoli'),
(17, 'Krushi mela 2012', 'Krushi Mela 2012 will be held in Kodinar at 14th January,2012.'),
(22, 'Soil Health Card', 'Soil Health Card will be given by the collector of Bhavnagar at 17th April,2012 at Talaja. '),
(23, 'mela', 'bhbhjv');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` text NOT NULL,
  `f_id` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `age` int(3) NOT NULL,
  `c_num` varchar(13) NOT NULL,
  `address` varchar(30) NOT NULL,
  `d_name` varchar(15) NOT NULL,
  `t_name` varchar(15) NOT NULL,
  `v_name` varchar(15) NOT NULL,
  `y_income` varchar(25) NOT NULL,
  `s_num` varchar(10) NOT NULL,
  `area_of_serv_no` varchar(10) NOT NULL,
  `t_land` varchar(20) NOT NULL,
  `w_irrigation` varchar(20) NOT NULL,
  `total` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `f_name`, `f_id`, `password`, `age`, `c_num`, `address`, `d_name`, `t_name`, `v_name`, `y_income`, `s_num`, `area_of_serv_no`, `t_land`, `w_irrigation`, `total`) VALUES
(1, 'mahesh-B-Jadav', 'mahesh', '123', 21, '9998231230', 'kodinar', '12', '13', 'kodinar', '10000-25000', '407', '12540', 'Black soil', 'Spray Irrigation', 0),
(2, 'dhaval-b-va', 'dj', '123', 21, '9998231230', 'gghg', '1', '1', 'konhhn', '10000-25000', '402', '12500', 'Black soil', 'Flood Irrigation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_prod`
--

CREATE TABLE IF NOT EXISTS `s_prod` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `m_pro` varchar(20) NOT NULL,
  `sp_name` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `s_prod`
--

INSERT INTO `s_prod` (`sid`, `m_pro`, `sp_name`) VALUES
(1, 'Crop', 'Bajra'),
(2, 'Crop', 'Wheat'),
(3, 'Crop', 'Rice'),
(4, 'Crop', 'Cotton'),
(5, 'Crop', 'Sugarcane'),
(6, 'Crop', 'Tobacco'),
(7, 'Crop', 'Potato'),
(8, 'Crop', 'Mango'),
(9, 'Crop', 'Tomato'),
(10, 'Pesticides', 'ShooterSc'),
(11, 'Pesticides', 'Multibloom(FLR-06)'),
(12, 'Pesticides', 'Deltame Therin Raven'),
(13, 'Pesticides', 'Adsufan'),
(14, 'Pesticides', 'Jel-kill-v');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `ftaluka` varchar(25) NOT NULL,
  `fgodown` varchar(25) NOT NULL,
  `ttaluka` varchar(25) NOT NULL,
  `tgodown` varchar(25) NOT NULL,
  `product` varchar(15) NOT NULL,
  `sub_product` varchar(20) NOT NULL,
  `tones` varchar(10) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`tid`, `ftaluka`, `fgodown`, `ttaluka`, `tgodown`, `product`, `sub_product`, `tones`) VALUES
(5, 'Kodinar', 'g2', 'Madhavpur', 'g5', 'Crop', 'oxydiogen', '25'),
(4, 'Somnath', 'g2', 'Kodinar', 'g1', 'Crop', 'uhsda', '5'),
(6, 'Kodinar', 'G2', 'Kutiyana', 'g2', 'Crop', 'wheet', '10'),
(7, 'Kutiyana', 'g2', 'Kutiyana', 'g3', 'Crop', 'Bajari', '120');

-- --------------------------------------------------------

--
-- Table structure for table `village_mngt`
--

CREATE TABLE IF NOT EXISTS `village_mngt` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(10) NOT NULL,
  `village` varchar(20) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `village_mngt`
--

INSERT INTO `village_mngt` (`vid`, `did`, `village`) VALUES
(1, 1, 'Dhandhuka'),
(2, 1, 'Dholera'),
(3, 2, 'Shihor'),
(4, 2, 'Talaja'),
(5, 3, 'Magrol'),
(6, 3, 'Bardoli'),
(7, 5, 'Dhrangadhra'),
(8, 5, 'Limbadi'),
(9, 6, 'Morbi'),
(10, 6, 'Gondal'),
(11, 7, 'Petlad'),
(12, 7, 'Khambhat'),
(13, 12, 'kodinar'),
(14, 12, 'Veraval'),
(15, 9, 'Kadi'),
(16, 9, 'Unjha'),
(17, 10, 'Dehgam'),
(18, 10, 'Kalole'),
(19, 11, 'Ankleshwar'),
(20, 11, 'Jhagadia');
