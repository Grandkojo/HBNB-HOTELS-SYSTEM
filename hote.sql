-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `ID` int(10) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSKEY` varchar(255) NOT NULL,
  `IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`ID`, `LAST_NAME`, `FIRST_NAME`, `EMAIL`, `PASSKEY`, `IMAGE`) VALUES
(1, 'ESSIEN', 'ERNEST', 'eessien545@gmail.com', 'hbnbadmin23', '../images/myface.jpg'),
(2, 'STONES', 'JOHN', 'essienernest.kojoowusu@gmail.com', 'hbnbadmin24', '../images/skyline.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `CHECKIN_DATE` date NOT NULL,
  `DURATION` decimal(23,0) NOT NULL,
  `CHECKOUT_DATE` date NOT NULL,
  `RESIDENCE_BOOKED` varchar(255) NOT NULL,
  `OCCUPANTS_NO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details_data`
--

CREATE TABLE `booking_details_data` (
  `ID` int(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `CHECKIN_DATE` date NOT NULL,
  `CHECKOUT_DATE` date NOT NULL,
  `RESIDENCE_BOOKED` varchar(255) NOT NULL,
  `OCCUPANTS_NO` int(11) NOT NULL,
  `STATUS` enum('PENDING','DUE') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details_data`
--

INSERT INTO `booking_details_data` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `CHECKIN_DATE`, `CHECKOUT_DATE`, `RESIDENCE_BOOKED`, `OCCUPANTS_NO`, `STATUS`) VALUES
(7, 'Lasmid', 'Chloe', 'lachloe@gmail.com', '2023-12-21', '2023-12-23', 'Istanbul Financial Gateway', 2, 'DUE'),
(8, 'Emmanuel', 'Essien', 'abekuofficial@gmail.com', '2023-12-22', '2023-12-25', 'Majestic Alps Chalet', 3, 'DUE'),
(9, 'Ernest', 'Kwame', 'ernewillie@gmail.com', '2023-12-22', '2023-12-25', 'Moroccan Oasis Suites', 3, 'DUE'),
(10, '', '', '', '0000-00-00', '0000-00-00', 'Historic Harbor Inn', 1, 'DUE'),
(11, 'Ernest', 'Essien', 'ernewillie@gmail.com', '2023-12-28', '2023-12-30', 'Seychelles Private Hideaway', 1, 'PENDING'),
(12, 'Lynn', 'Kamau', 'mwendekamau04@gmail.com', '2024-01-24', '2024-01-24', 'Toronto Corporate Skyline', 2, 'DUE');

-- --------------------------------------------------------

--
-- Table structure for table `hbnb_utilities`
--

CREATE TABLE `hbnb_utilities` (
  `ID` int(11) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `UTILITY_CODE` varbinary(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ICON` varchar(255) NOT NULL,
  `ICON_ADMIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hbnb_utilities`
--

INSERT INTO `hbnb_utilities` (`ID`, `CATEGORY`, `UTILITY_CODE`, `NAME`, `ICON`, `ICON_ADMIN`) VALUES
(2, 'STANDARD/BUSINESS/LUXURY', 0x5746, 'Wifi', 'hbnb_all_icons/wifi.png', '../hbnb_all_icons/wifi.png'),
(3, 'STANDARD/BUSINESS/LUXURY', 0x5456, 'Television', 'hbnb_all_icons/tv.png', '../hbnb_all_icons/tv.png'),
(4, 'STANDARD/BUSINESS/LUXURY', 0x4b54, 'Kitchen', 'hbnb_all_icons/kitchen-cabinets.png', '../hbnb_all_icons/kitchen-cabinets.png'),
(5, 'STANDARD/BUSINESS/LUXURY', 0x5348, 'Shower', 'hbnb_all_icons/shower.png', '../hbnb_all_icons/shower.png'),
(6, 'BUSINESS/LUXURY', 0x5748, 'Washer', 'hbnb_all_icons/washer.png', '../hbnb_all_icons/washer.png'),
(7, 'BUSINESS/LUXURY', 0x5341, 'Smoke Alarm', 'hbnb_all_icons/smoke-alarm.png', '../hbnb_all_icons/smoke-alarm.png'),
(8, 'LUXURY', 0x4744, 'Garden', 'hbnb_all_icons/garden.png', '../hbnb_all_icons/garden.png'),
(9, 'LLUXURY', 0x5050, 'Private Pool', 'hbnb_all_icons/pool.png', '../hbnb_all_icons/pool.png'),
(10, 'LUXURY', 0x5054, 'Patio/Balcony', 'hbnb_all_icons/balcony.png', '../hbnb_all_icons/balcony.png'),
(11, 'LUXURY', 0x4254, 'Bathtub', 'hbnb_all_icons/bathtub.png', '../hbnb_all_icons/bathtub.png'),
(12, 'STANDARD/BUSINESS/LUXURY', 0x4143, 'Airconditioner', 'hbnb_all_icons/air-conditioner.png', '../hbnb_all_icons/air-conditioner.png');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `ROOM_STATUS` enum('0','1') NOT NULL DEFAULT '0',
  `AC_AVAILABILITY` varchar(255) NOT NULL,
  `PRICE` int(255) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `NAME`, `LOCATION`, `ROOM_STATUS`, `AC_AVAILABILITY`, `PRICE`, `CATEGORY`, `PICTURE`, `DESCRIPTION`) VALUES
(53, 'Alpine Retreat Lodge', 'Zermatt, Switzerland', '0', 'AVAILABLE', 340, 'STANDARD', 'uploads/standard/16.png', 'Surrounded by the breathtaking Swiss Alps, Alpine Retreat Lodge\'s standard rooms provide a cozy haven with rustic furnishings, offering a genuine mountain lodge experience.'),
(54, 'Sakura Blossom Hotel', 'Tokyo, Japan', '0', 'AVAILABLE', 399, 'STANDARD', 'uploads/standard/19.jpg', 'Embrace the beauty of cherry blossoms at Sakura Blossom Hotel\'s standard rooms in the heart of Tokyo, where modern amenities meet traditional Japanese design.'),
(55, 'Historic Harbor Inn', 'Boston, Massachusetts, USA', '0', 'AVAILABLE', 300, 'STANDARD', 'uploads/standard/6.jpg', 'Immerse yourself in the rich history of Boston at Historic Harbor Inn, offering standard rooms with nautical touches and views of the iconic harbor.'),
(56, 'Tuscan Retreat Lodge', 'Florence, Italy', '0', 'AVAILABLE', 400, 'STANDARD', 'uploads/standard/7.png', 'Enjoy the charm of the Italian countryside at Tuscan Retreat Lodge, where standard rooms feature warm tones and rustic furnishings, creating a cozy retreat.'),
(57, 'Golden Gate Suites', 'San Francisco, California, USA', '0', 'AVAILABLE', 350, 'STANDARD', 'uploads/standard/2.jpg', ' Overlooking the iconic Golden Gate Bridge, Golden Gate Suites provide standard rooms with a contemporary flair, offering a perfect blend of comfort and style.'),
(58, 'Sydney Harbour View Hotel', 'Sydney, Australia', '0', 'AVAILABLE', 420, 'STANDARD', 'uploads/standard/3.jpg', 'Wake up to stunning views of the Sydney Opera House at Sydney Harbour View Hotel, where standard rooms provide a comfortable base for exploring the vibrant city.'),
(59, 'Alpine Serenity Inn', 'Innsbruck, Austria', '0', 'AVAILABLE', 450, 'STANDARD', 'uploads/standard/4.png', 'Surrounded by the Austrian Alps, Alpine Serenity Inn\'s standard rooms offer a tranquil escape with alpine-inspired decor and panoramic mountain views.'),
(61, 'Coastal Breeze Resort', 'Miami, Florida, USA', '0', 'AVAILABLE', 345, 'STANDARD', 'uploads/standard/8.png', 'Relax in the vibrant atmosphere of Miami Beach at Coastal Breeze Resort, featuring standard rooms with a beachy aesthetic and easy access to the ocean.'),
(63, 'Maple Grove Retreat', ' Vancouver, Canada', '0', 'AVAILABLE', 499, 'STANDARD', 'uploads/standard/20.jpg', 'Embrace the natural beauty of the Pacific Northwest at Maple Grove Retreat, where standard rooms provide a cozy haven surrounded by lush maple trees.'),
(64, 'Serengeti Safari Lodge', 'Serengeti National Park, Tanzania', '0', 'AVAILABLE', 355, 'STANDARD', 'uploads/standard/11.png', 'Immerse yourself in the wild beauty of Africa at Serengeti Safari Lodge, featuring standard rooms with a safari-inspired design and breathtaking views of the savannah.'),
(65, 'Coastal Elegance Hotel', 'Amalfi Coast, Italy', '0', 'AVAILABLE', 450, 'STANDARD', 'uploads/standard/22.jpg', 'Overlooking the stunning Amalfi Coast, Coastal Elegance Hotel offers standard rooms with Mediterranean-inspired decor, providing a luxurious yet relaxed retreat.'),
(66, 'Lakeside Tranquility Inn', ' Lake District, England', '0', 'AVAILABLE', 400, 'STANDARD', 'uploads/standard/9.png', 'Experience serene moments by the lake at Lakeside Tranquility Inn, offering standard rooms with classic English decor and panoramic views of the tranquil waters.'),
(67, 'Amazon Rainforest Lodge', 'Iquitos, Peru', '0', 'AVAILABLE', 500, 'STANDARD', 'uploads/standard/10.png', ' Immerse yourself in the heart of the Amazon at Amazon Rainforest Lodge, where standard rooms provide a comfortable base for exploring the incredible biodiversity of the rainforest.'),
(68, 'Bohemian Garden Hotel', ' Prague, Czech Republic', '0', 'AVAILABLE', 246, 'STANDARD', 'uploads/standard/12.jpg', 'Find inspiration in the artistic ambiance of Prague at Bohemian Garden Hotel, featuring standard rooms with vibrant decor and a lush garden setting.'),
(69, 'Great Barrier Reef Retreat', 'Cairns, Australia', '0', 'AVAILABLE', 340, 'STANDARD', 'uploads/standard/14.png', 'Dive into the wonders of the ocean at Great Barrier Reef Retreat, where standard rooms offer a relaxed atmosphere with easy access to the world\'s largest coral reef system.\r\n'),
(70, 'Moroccan Oasis Suites', 'Marrakech, Morocco', '0', 'AVAILABLE', 400, 'STANDARD', 'uploads/standard/16.png', 'Immerse yourself in the colors and aromas of Morocco at Moroccan Oasis Suites, where standard rooms showcase traditional craftsmanship and a peaceful courtyard.'),
(71, 'Rocky Mountain Lodge', 'Banff, Canada', '0', 'AVAILABLE', 500, 'STANDARD', 'uploads/standard/18.jpg', 'Embrace the rugged beauty of the Rockies at Rocky Mountain Lodge, offering standard rooms with cozy fireplaces and breathtaking views of the mountain range.'),
(72, 'Kyoto Bamboo Retreat', 'Kyoto, Japan', '0', 'AVAILABLE', 370, 'STANDARD', 'uploads/standard/13.png', 'Find tranquility in the bamboo groves of Kyoto at Kyoto Bamboo Retreat, where standard rooms blend minimalist design with traditional Japanese aesthetics.'),
(74, 'Barcelona Gothic Quarters Inn', 'Barcelona, Spain', '0', 'AVAILABLE', 390, 'STANDARD', 'uploads/standard/17.jpg', 'Dive into history in the Gothic Quarters at Barcelona Gothic Quarters Inn, where standard rooms capture the essence of the city\'s rich cultural heritage.'),
(75, 'Enchanted Forest Lodge', 'Oregon, USA', '0', 'AVAILABLE', 480, 'STANDARD', 'uploads/standard/23.jpg', 'Immerse yourself in nature at Enchanted Forest Lodge, where standard rooms offer a cozy haven surrounded by ancient trees and the beauty of the Pacific Northwest.'),
(76, 'Harbor Tech Suites', 'Seattle, Washington, USA', '0', 'AVAILABLE', 550, 'BUSINESS', 'uploads/business/3.jpg', 'Connect with the tech scene in Seattle at Harbor Tech Suites, providing business rooms with cutting-edge technology and a sleek urban design.'),
(77, 'Mumbai Financial Residences', 'Mumbai, India', '0', 'AVAILABLE', 497, 'BUSINESS', 'uploads/business/2.jpg', 'Experience the pulse of India\'s financial capital at Mumbai Financial Residences, where business rooms offer a sophisticated and efficient environment for corporate travelers.'),
(78, 'Skyline Executive Tower', 'Hong Kong, China', '0', 'AVAILABLE', 570, 'BUSINESS', 'uploads/business/18.jpg', 'Elevate your business stay at Skyline Executive Tower, boasting panoramic views of the Hong Kong skyline and modern amenities designed for professionals.'),
(79, 'Manhattan Corporate Plaza', 'New York City, USA', '0', 'AVAILABLE', 600, 'BUSINESS', 'uploads/business/12.jpg', 'Immerse yourself in the corporate buzz of Manhattan at Manhattan Corporate Plaza, providing business rooms with a seamless blend of style and functionality.'),
(80, 'Tech Hub Residences', 'Berlin, Germany', '0', 'AVAILABLE', 520, 'BUSINESS', 'uploads/business/11.jpg', ' Stay at the heart of Berlin\'s tech scene at Tech Hub Residences, offering business rooms with innovative design and easy access to the city\'s startup ecosystem.'),
(81, 'Corporate Gateway Suites', ' Singapore', '0', 'AVAILABLE', 630, 'BUSINESS', 'uploads/business/7.jpg', 'Positioned as a gateway to business success, Corporate Gateway Suites in Singapore offer sleek and efficient business rooms for the modern professional.'),
(82, 'Tokyo Business Tower', 'Tokyo, Japan', '0', 'AVAILABLE', 646, 'BUSINESS', 'uploads/business/22.jpg', 'Reach new heights in business at Tokyo Business Tower, where business rooms provide a sophisticated setting with a blend of Japanese aesthetics and modern functionality.'),
(83, 'Financial District Residences', 'Frankfurt, Germany', '0', 'AVAILABLE', 699, 'BUSINESS', 'uploads/business/4.jpg', 'Stay in the heart of Frankfurt\'s financial district at Financial District Residences, where business rooms offer a perfect balance of professionalism and comfort.'),
(84, 'Silicon Valley Suites', 'San Jose, California, USA', '0', 'AVAILABLE', 750, 'BUSINESS', 'uploads/business/19.jpg', ' Immerse yourself in the innovation of Silicon Valley at Silicon Valley Suites, featuring business rooms designed for tech-savvy professionals.'),
(85, 'Dubai Business Oasis', ' Dubai, UAE', '0', 'AVAILABLE', 790, 'BUSINESS', 'uploads/business/6.jpg', 'Experience luxury in business at Dubai Business Oasis, where business rooms offer a blend of elegance and functionality against the backdrop of the city\'s skyline.'),
(86, 'Stockholm Tech Hub', 'Stockholm, Sweden', '0', 'AVAILABLE', 800, 'BUSINESS', 'uploads/business/5.jpg', 'Connect with the innovation of Scandinavia at Stockholm Tech Hub, offering business rooms with a modern Nordic design and access to the city\'s vibrant tech community.'),
(87, 'Buenos Aires Financial Residences', 'Buenos Aires, Argentina', '0', 'AVAILABLE', 800, 'BUSINESS', 'uploads/business/4.jpg', 'Experience the energy of Latin America\'s financial hub at Buenos Aires Financial Residences, where business rooms provide a sophisticated urban retreat.'),
(88, 'Vancouver Harbor Executive Suites', 'Vancouver, Canada', '0', 'AVAILABLE', 830, 'BUSINESS', 'uploads/business/20.jpg', ' Enjoy harbor views in the heart of Vancouver at Vancouver Harbor Executive Suites, featuring business rooms designed for corporate comfort with a touch of West Coast elegance.'),
(89, 'Seoul Corporate Oasis', 'Seoul, South Korea', '0', 'AVAILABLE', 800, 'BUSINESS', 'uploads/business/9.jpg', 'Elevate your business stay in the vibrant cityscape of Seoul at Seoul Corporate Oasis, where business rooms provide a blend of contemporary design and Korean hospitality.'),
(90, 'Munich Technology Tower', 'Munich, Germany', '0', 'AVAILABLE', 899, 'BUSINESS', 'uploads/business/10.jpg', 'Immerse yourself in the heart of German innovation at Munich Technology Tower, featuring business rooms with sleek design and state-of-the-art technology.'),
(91, 'Istanbul Financial Gateway', 'Istanbul, Turkey', '0', 'AVAILABLE', 900, 'BUSINESS', 'uploads/business/13.jpg', 'Connect East and West at Istanbul Financial Gateway, where business rooms offer a sophisticated setting in the dynamic atmosphere of the city.'),
(92, 'Warsaw Business Residences', 'Warsaw, Poland', '0', 'AVAILABLE', 750, 'BUSINESS', 'uploads/business/21.jpg', 'Experience the thriving business scene of Eastern Europe at Warsaw Business Residences, providing business rooms with modern amenities and a strategic location.'),
(93, 'Austin Tech Haven', 'Austin, Texas, USA', '0', 'AVAILABLE', 850, 'BUSINESS', 'uploads/business/17.jpg', 'Dive into the lively tech scene of Austin at Austin Tech Haven, featuring business rooms designed for professionals looking to balance work and play.'),
(94, 'Zurich Financial Suites', 'Zurich, Switzerland', '0', 'AVAILABLE', 790, 'BUSINESS', 'uploads/business/16.jpg', 'Stay in the heart of Swiss finance at Zurich Financial Suites, offering business rooms with elegant design and views of the picturesque city.'),
(95, 'Toronto Corporate Skyline', 'Toronto, Canada', '0', 'AVAILABLE', 900, 'BUSINESS', 'uploads/business/15.jpg', ' Elevate your business stay with a view at Toronto Corporate Skyline, featuring business rooms with modern amenities and panoramic vistas of the city.'),
(96, 'Versailles Grand Palace', 'Versailles, France', '0', 'AVAILABLE', 920, 'LUXURY', 'uploads/luxury/28.jpg', 'Step into a world of regal splendor at Versailles Grand Palace, where luxury rooms exude opulence with lavish decor and views of the magnificent gardens.'),
(97, 'Maldives Overwater Bliss', 'Maldives', '0', 'AVAILABLE', 950, 'LUXURY', 'uploads/luxury/29.jpg', 'Indulge in paradise at Maldives Overwater Bliss, featuring luxury rooms perched over crystal-clear waters with direct access to the vibrant marine life.'),
(98, 'Ritz-Carlton Penthouse Suites', 'New York City, USA', '0', 'AVAILABLE', 990, 'LUXURY', 'uploads/luxury/100.jpg', 'Ascend to the heights of luxury at Ritz-Carlton Penthouse Suites, where opulent rooms offer breathtaking views of the Manhattan skyline.'),
(99, 'Santorini Cliffside Villas', 'Santorini, Greece', '0', 'AVAILABLE', 1000, 'LUXURY', 'uploads/luxury/9.jpg', 'Experience the charm of the Aegean Sea at Santorini Cliffside Villas, where luxury rooms boast traditional Greek architecture and panoramic views of the caldera.'),
(101, 'Serengeti Safari Lodge', 'Serengeti National Park, Tanzania', '0', 'AVAILABLE', 1300, 'LUXURY', 'uploads/luxury/2.jpg', ' Immerse yourself in the wild beauty of Africa at Serengeti Safari Lodge, featuring luxury rooms with a safari-inspired design and breathtaking views of the savannah.'),
(102, 'Grand Hyatt Regency', 'Sydney, Australia', '0', 'AVAILABLE', 1350, 'LUXURY', 'uploads/luxury/25.jpg', 'Enjoy an elevated stay at Grand Hyatt Regency, where luxury rooms provide a harmonious blend of contemporary design and panoramic views of the Sydney Opera House.'),
(103, 'St. Petersburg Royal Residences', 'St. Petersburg, Russia', '0', 'AVAILABLE', 1500, 'LUXURY', 'uploads/luxury/17.jpg', 'Enter a realm of imperial luxury at St. Petersburg Royal Residences, featuring rooms adorned with intricate Russian designs and located near the city\'s cultural treasures.'),
(104, 'Majestic Alps Chalet', 'Verbier, Switzerland', '0', 'AVAILABLE', 1550, 'LUXURY', 'uploads/luxury/8.jpg', ' Retreat to the Swiss Alps at Majestic Alps Chalet, where luxury rooms offer alpine charm, high-end amenities, and stunning mountain views.'),
(105, 'Beverly Hills Celestial Suites', 'Los Angeles, California, USA', '0', 'AVAILABLE', 1600, 'LUXURY', 'uploads/luxury/27.jpg', 'Indulge in star-studded luxury at Beverly Hills Celestial Suites, where opulent rooms provide a glamorous escape with views of the iconic Hollywood Hills.'),
(106, 'Vatican City Royal Suites', 'Rome, Italy', '0', 'AVAILABLE', 1650, 'LUXURY', 'uploads/luxury/26.jpg', 'Indulge in the lap of luxury near Vatican City at Vatican City Royal Suites, where opulent rooms feature classic Italian design and personalized service.'),
(107, ' St. Lucia Overwater Villas', 'St. Lucia', '0', 'AVAILABLE', 1000, 'LUXURY', 'uploads/luxury/20.jpg', 'Experience Caribbean luxury at St. Lucia Overwater Villas, where rooms with private plunge pools provide a secluded paradise surrounded by turquoise waters.'),
(108, ' Moscow Imperial Residences', ' Moscow, Russia', '0', 'AVAILABLE', 1900, 'LUXURY', 'uploads/luxury/23.jpg', 'Step into Russian royalty at Moscow Imperial Residences, where luxury rooms offer intricate designs and proximity to the city\'s historical landmarks.'),
(109, ' Bali Cliffside Retreat', 'Bali, Indonesia', '0', 'AVAILABLE', 1100, 'LUXURY', 'uploads/luxury/9.jpg', 'Perched on the cliffs of Bali, Bali Cliffside Retreat offers luxury rooms with traditional Balinese architecture and uninterrupted views of the Indian Ocean.'),
(110, 'Vienna Opera Grand Hotel', 'Vienna, Austria', '0', 'AVAILABLE', 1200, 'LUXURY', 'uploads/luxury/7.jpg', 'Embrace the arts at Vienna Opera Grand Hotel, where luxury rooms feature classic elegance and exclusive access to performances at the Vienna State Opera.'),
(111, 'Seychelles Private Hideaway', ' Seychelles', '1', 'AVAILABLE', 1200, 'LUXURY', 'uploads/luxury/10.jpg', 'Escape to paradise at Seychelles Private Hideaway, offering luxury rooms with private beaches and lush tropical surroundings.\r\n'),
(113, ' Aspen Mountain Chalets', ' Aspen, Colorado, USA', '0', 'AVAILABLE', 1400, 'LUXURY', 'uploads/luxury/21.jpg', 'Experience winter wonderland in style at Aspen Mountain Chalets, offering luxury rooms with alpine-inspired decor and access to world-class skiing.'),
(114, 'Marrakech Royal Riads', 'Marrakech, Morocco', '0', 'AVAILABLE', 1500, 'LUXURY', 'uploads/luxury/17.jpg', 'Discover luxury in the heart of the Medina at Marrakech Royal Riads, featuring opulent rooms with traditional Moroccan architecture and personalized service.'),
(115, 'Barcelona Gaudi Suites', 'Barcelona, Spain', '0', 'AVAILABLE', 2500, 'LUXURY', 'uploads/luxury/24.jpg', 'Immerse yourself in the artistic legacy of Gaudi at Barcelona Gaudi Suites, offering luxury rooms with modern design and a nod to Catalan creativity.'),
(117, 'Evandy Estates', 'Kumasi, Ghana', '0', 'AVAILABLE', 200, 'LUXURY', 'uploads/luxury/23.jpg', 'A cool hotel to relive your senses of life'),
(118, 'Victory Towers', 'Nairobi, Kenya', '0', 'AVAILABLE', 500, 'BUSINESS', 'uploads/business/15.jpg', 'You\'re welcome to experience the calm breeze and sunset in Nairobi. Have a great one');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `ID` int(255) NOT NULL,
  `CATEGORY_NAME` varchar(255) NOT NULL,
  `CSTATUS` varchar(255) NOT NULL,
  `CDATE` datetime(6) NOT NULL,
  `SLUG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`ID`, `CATEGORY_NAME`, `CSTATUS`, `CDATE`, `SLUG`) VALUES
(2, 'BUSINESS', '1', '2023-11-21 06:57:26.000000', 'business_room'),
(5, 'BUSINESS', '1', '2023-11-21 06:57:43.000000', 'business_room'),
(6, 'STANDARD', '1', '2023-11-21 08:51:20.000000', 'standard_room'),
(7, 'BUSINESS', '1', '2023-11-21 08:52:08.000000', 'business_room'),
(8, 'STANDARD', '1', '2023-11-21 08:55:28.000000', 'standard_room'),
(9, 'BUSINESS', '1', '2023-11-21 08:56:13.000000', 'business_room'),
(10, 'STANDARD', '1', '2023-11-21 11:20:34.000000', 'standard_room'),
(11, 'STANDARD', '1', '2023-11-23 11:26:42.000000', 'standard_room'),
(12, 'STANDARD', '1', '2023-11-23 11:29:19.000000', 'standard_room');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `ROOM_NO` int(11) NOT NULL COMMENT 'automatic generation',
  `ROOM_CODE` varchar(20) NOT NULL,
  `RESIDENCE_NAME` varchar(255) NOT NULL,
  `ROOM_STATUS` varchar(20) NOT NULL COMMENT 'detached/attached (washroom)',
  `ROOM_TYPE` varchar(20) NOT NULL COMMENT 'standars/business/luxury',
  `AC_AVAILABILITY` varchar(15) NOT NULL COMMENT 'yes/no',
  `OCCUPANTS_NO` int(5) NOT NULL COMMENT 'min-1 max-5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_utilities`
--

CREATE TABLE `room_utilities` (
  `ID` int(255) NOT NULL,
  `ROOM_ID` int(255) NOT NULL,
  `UTILITY_NAME` varchar(255) NOT NULL,
  `ICON` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ID` int(100) NOT NULL,
  `COUNTRY` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORDS` varchar(255) NOT NULL,
  `PROFILE` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `COUNTRY`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORDS`, `PROFILE`, `PHONE`) VALUES
(2, 'GHANA', 'fgd', 'jghfd', 'ernewillie@gmail.com', '$20deffoTy', '', '+233242539023'),
(3, 'GHANA', 'zz', 'er', 'cfscefd@gmail.com', '#kofre443wd2E', '', '+233242539023'),
(4, 'GHANA', 'ERNEST', 'ESSIEN', 'eessien545@gmail.com', '#F6453421kd', '', '+5342353432'),
(5, 'GHANA', 'ERNEST', 'ESSIEN', 'eessien545@gmail.com', 'tgerfwdrtew', '', '+5342353432'),
(6, 'GHANA', 'ERNEST', 'ESSIEN', 'ernewillie@gmail.com', '#6453423qwsdcf5R', '', '0557135302'),
(7, 'GHANA', 'ERNEST', 'ESSIEN', 'ernewillie@gmail.com', 'hfgdfs#rerf544D', '', '0557135302'),
(8, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'fef4eeF234re', '', '+233242539023'),
(9, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'fef4eeF234re', '', '+233242539023'),
(10, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'fef4eeF234re', '', '+233242539023'),
(11, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'RRRfd44332d', '', '+233242539023'),
(12, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'RRRfd44332d', '', '+233242539023'),
(13, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'ernewillie@gmail.com', 'RRRfd44332d', '', '+233242539023'),
(14, 'GHANA', 'Jaden', 'Essien', 'eessienm545@gmail.com', '#fghE3455', 'admin/user/user_profiles/5.jpg', '+5342353432'),
(15, 'GHANA', 'Jaden', 'Essien', 'eessienm545@gmail.com', '#fghE3455', 'admin/user/user_profiles/5.jpg', '+5342353432'),
(16, 'GHANA', 'Emma', 'Joycee', 'ernewillie333@gmail.com', 'regex45@Essien', 'admin/user/user_profiles/2.jpg', '+233557135302'),
(17, 'GHANA', 'Emma', 'Joycee', 'ernewillie333@gmail.com', 'regex45@Essien', 'admin/user/user_profiles/2.jpg', '+233557135302'),
(18, 'GHANA', 'Sethoo', 'Ameyaa', 'sameyaw289@gmail.com', 'Devrilliwasty1248??', 'admin/user/user_profiles/Screenshot (1).png', '0599041200'),
(19, 'GHANA', 'Sethoo', 'Ameyaa', 'sameyaw289@gmail.com', 'Devrilliwasty1248??', 'admin/user/user_profiles/Screenshot (1).png', '0599041200'),
(20, 'GHANA', 'JOSH', 'MORENO', 'jomoreno@gmail.com', 'Trying34r', '', '+233246234567'),
(21, 'GHANA', 'SCHWEITZER', 'ESSIEN', 'essieneree33@gmail.com', '#fgfgT45', '', '+233242539023'),
(23, 'TURKEY', 'JOYCE', 'KWARTENG', 'joykwarts34@gmail.com', '&gfeeRt4', 'admin/user/user_profiles/29.jpg', '+2345476435687'),
(24, 'GHANA', 'KELVIN', 'OTTOO', 'eessien445@gmail.com', '@wer4Gt1', 'admin/user/user_profiles/nature-beauty-reflected-tranquil-mountain-lake-generative-ai_188544-12625.avif', '+233246115817'),
(25, 'KENYA', 'LYNN', 'KAMAU', 'mwendekamau04@gmail.com', 'lynKam34', '', '+254456327455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking_details_data`
--
ALTER TABLE `booking_details_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hbnb_utilities`
--
ALTER TABLE `hbnb_utilities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`ROOM_NO`);

--
-- Indexes for table `room_utilities`
--
ALTER TABLE `room_utilities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `booking_details_data`
--
ALTER TABLE `booking_details_data`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hbnb_utilities`
--
ALTER TABLE `hbnb_utilities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `ROOM_NO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'automatic generation', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
