-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 04:51 AM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `remove_double_quotes_from_remarks` ()   BEGIN
    UPDATE items
    SET remarks = REPLACE(remarks, '"', '');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'HP'),
(2, 'ASUS'),
(3, 'DELL'),
(4, 'LENOVO'),
(5, 'ACER'),
(6, 'FUJIXEROX'),
(7, 'DEVELOP'),
(8, 'CANON'),
(9, 'EPSON'),
(10, 'BROTHER'),
(11, 'AVAYA'),
(12, 'SAMSUNG'),
(13, 'APPLE'),
(14, 'SOPHOS'),
(15, 'UBIQUITI'),
(16, 'EXTREME'),
(17, 'ALCATEL'),
(18, 'VERTIV LIEBERT'),
(19, 'APC'),
(20, 'EATON');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_description`
--

CREATE TABLE `equipment_description` (
  `sub_cat_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_description`
--

INSERT INTO `equipment_description` (`sub_cat_id`, `description`) VALUES
(1, 'Admin'),
(2, 'eNGAS or eBUDGET'),
(3, 'Administrative Use'),
(4, 'Application Use'),
(5, 'Specialized Software Applications Use'),
(6, 'Color (36in)'),
(7, 'A3'),
(8, 'A3 Leased'),
(9, 'A4 Leased'),
(10, 'A4'),
(11, 'Large Format (24in)'),
(12, 'Color (42-44in)'),
(13, 'Color (36in)'),
(14, 'Color (A3)'),
(15, 'Color (A4)'),
(16, 'Monochrome (A3)'),
(17, 'Monochrome (A4)'),
(18, 'Layer 2 (48 POE Ports, Managed)'),
(19, 'Layer 3 (48 POE Ports, Managed)'),
(20, 'Conference Rooms'),
(21, 'Wide Format (42in)'),
(22, '650VA'),
(23, '1500VA'),
(24, '2000VA'),
(25, '3000VA'),
(26, 'None'),
(27, 'No Description');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_sub_category`
--

CREATE TABLE `equipment_sub_category` (
  `equipment_type_id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_sub_category`
--

INSERT INTO `equipment_sub_category` (`equipment_type_id`, `sub_category`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Server'),
(4, 'Printer'),
(5, 'Plotter'),
(6, 'Firewall'),
(7, 'Router'),
(8, 'Network Switch'),
(9, 'Biometrics'),
(10, 'Document Scanner'),
(11, 'Indoor LED Video Wall'),
(12, 'Interactive Kiosk'),
(13, 'Interactive Touch Screen'),
(14, 'IP Phone'),
(15, 'Projector'),
(16, 'Smartphone'),
(17, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`equipment_id`, `equipment_name`) VALUES
(1, 'Computers'),
(2, 'Multifunction Inkjet'),
(3, 'Multifunction Laser'),
(4, 'Network Equipment'),
(5, 'Other ICT Equipment'),
(6, 'Uninterruptible Power Supply');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gazette`
--

CREATE TABLE `gazette` (
  `gazette_id` int(11) NOT NULL,
  `header` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `date_and_time` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gazette`
--

INSERT INTO `gazette` (`gazette_id`, `header`, `author`, `body`, `date_and_time`, `photo`) VALUES
(4, 'DPWH Gains Firsthand Experience on Various Infra Development in U.K.', 'DPWH', '<p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Senior representatives from several key government agencies in the Philippines including the Department of Public Works and Highways (DPWH) participated on a familiarization visit in the United Kingdom per invitation of British Embassy Manila to the Department of Finance (DOF), to explore ways of financing and delivering new sustainable infrastructure projects in the country.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Senior Undersecretary Emil K. Sadain led the DPWH delegation who participated in the four (4)-day program from January 30 to February 2, 2024 in London, United Kingdom that focused on discussing and advancing strategies related to infrastructure development and project management.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Other than DPWH, the familiarization visit was participated by DOF, National Economic and Development Authority (NEDA), Department of Justice (DOJ), Department of Agriculture (DA), Department of Information and Communications Technology (DICT), Department Of Health (DOH), Department of Transportation (DoTr), Department of Energy (DOE), Public-Private Partnership (PPP) Center, Bases Conversion Development Authority (BCDA), and Clark International Airport Corporation.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Senior Undersecretary Sadain was joined by Project Directors Ramon A. Arriola III and Benjamin A. Bautista of the DPWH Unified Project Management Office (UPMO) Operations, in-charge of implementing DPWH infrastructure flagship projects under Official Development Assistance (ODA).</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Part of the program is the sharing of insights and experiences of United Kingdom from their various infrastructure development projects including a mix of public and private investment strategies and approaches.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Senior Undersecretary Sadain said that investments in infrastructure have the highest impact on the economy as it creates more jobs and encourages more businesses to open.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">DPWH is working with the DOF and NEDA for a mix of public funds, private investments, and partnerships to ensure a comprehensive and sustainable approach to infrastructure development in line with the “Build Better More” program.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The United Kingdom grants loans - concessional and market-rate and mobilizes strategic private sector investments, to help countries like the Philippines access resources needed for sustainable infrastructure investment to enable economic growth as well as toward achievement of the UN Sustainable Development Goals.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">One of the best practices in the United Kingdom is private sector capital invested in, designing, building, and operating public infrastructure projects.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">This approach fosters the development of essential infrastructure projects, combining public objectives with private sector efficiency and financial capabilities.</p>', '2024-02-10 14:54:00', 'https://www.dpwh.gov.ph/dpwh/sites/default/files/dpwh_uk.jpg'),
(5, '4-kilometer Bypass Road Speeds Up Travel in Bukidnon', 'DPWH', '<p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">A 4-kilometer bypass road project by the Department of Public Works and Highways (DPWH) has provided overall travel improvement for locals and tourists between the two (2) municipalities of Damulog and Kadingilan in the province of Bukidnon.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Citing a report submitted by Region 10 Director Zenaida T. Tan, DPWH Secretary Manuel M. Bonoan said that the newly-completed bypass road has solved the transportation woes in the rural and secluded areas of Barangay Maican in Damulog and Barangay Balaoro in Kadingilan, Bukidnon.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Implemented under two (2) packages, an initial budget of ₱65.6 million was released in 2022 for the construction of Package 1 which covers road opening and construction of its first 1.37-kilometer segment, including 899 meters of reinforced concrete lined canal with 375 meters of slope protection.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The second and final package which was completed in 2023 in the amount of ₱96.5 million, involved the construction of the remaining 2.6-kilometer, 3.35-meter wide concrete pavement, with 2.4 kilometers of reinforced concrete lined canal and 290-lineal meters of rubble concrete that functions as a slope protection.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">“Students and employees who travel daily to school and work all the way to the neighboring towns now have easier access to convenient modes of transportation with the completion of the bypass road, thus improving education and employment opportunities for locals,” said Secretary Bonoan.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The improved road also provides a safer, cheaper, and faster way for farmers to deliver locally-grown agricultural goods such as corn, pineapple, and cacao to markets and distribution centers.</p>', '2024-02-11 07:23:00', 'https://www.dpwh.gov.ph/dpwh/sites/default/files/4km_bypass_rd_in_bukidnon.jpg'),
(6, 'Paved Rural Roads Improve Access in Hermosa, Samal, Bataan', 'DPWH', '<p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\"><b>The Department of Public Works and Highways (DPWH) </b>has completed the concrete paving of roads that are now benefiting farming communities in the towns of Hermosa and Samal, Bataan.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">DPWH District Engineer Erlindo Flores, in his report to Secretary Manuel M. Bonoan, identified the completed project as the newly-paved 747-meter road in Sitio Lambang in Barangay Mabiga, Hermosa, Bataan.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">With an allocation of P10 million, the concrete road with drainage component has reduced the travel time to the town proper of Hermosa.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Another completed project is the 453.20 linear meter road in Sitio Guiso, Barangay Palili, Samal which was constructed in the amount of P4.95 million to provide farmers safer access to transporting various goods and necessities to major markets.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">Implemented under the Basic Infrastructure Program, the two (2) road projects in Bataan were funded under the General Appropriations Act of 2023 (GAA).</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The two (2) road projects will improve food security and lessen poverty in the area.</p>', '2024-02-11 07:41:00', 'https://www.dpwh.gov.ph/dpwh/sites/default/files/paved_rural_rd_in_hermosa.jpg'),
(7, 'DPWH Paves Road to Far-Flung Communities in Montevista, Davao de Oro', 'DPWH', '<p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The Department of Public Works and Highways (DPWH) has recently improved a local road to provide ease of access to far-flung communities in the Municipality of Montevista, Davao de Oro.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">DPWH Regional Office 11 Director Juby B. Cordon, in her report to DPWH Secretary Manuel M. Bonoan, said that a two (2)-lane concrete road was constructed to connect the once hard to reach Barangay San Vicente to the section of Daang Maharlika in Barangay Linoan.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The 1.95-kilometer road also has reflectorized thermoplastic pavement markings to optimize safety of users and necessary drainage structures.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">According to Director Cordon, the road improvement is critical to speed up economic growth and development by supporting additional food production, encourage both tourism and non-tourism activities, and spur local trade in the area.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; line-height: 1.4em; text-rendering: optimizelegibility; color: rgb(51, 51, 51); text-align: justify;\">The DPWH Davao de Oro Second District Engineering Office (DEO) implemented the P100 million road construction through the Convergence and Special Support Program – Sustainable Infrastructure Projects Alleviating Gaps (CSSP-SIPAG) under the General Appropriations Act (GAA) of 2023.</p>', '2024-02-12 06:20:00', 'https://www.dpwh.gov.ph/dpwh/sites/default/files/brgy_san_vicente_to_linoan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_admin`
--

CREATE TABLE `inventory_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_no` int(11) NOT NULL,
  `computer_name` varchar(255) DEFAULT NULL,
  `equipment_type` varchar(255) DEFAULT NULL,
  `acquisition_type` varchar(255) DEFAULT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `disk_size` varchar(255) DEFAULT NULL,
  `licensed_os` varchar(255) DEFAULT NULL,
  `licensed_mso` varchar(255) DEFAULT NULL,
  `other_installed_software` varchar(500) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `are_par_ics` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `inventory_item_no` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `unit_cost` decimal(15,2) DEFAULT NULL,
  `end_user` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `asset_owner` varchar(255) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `received_from` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `acquisition_date` date DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_no`, `computer_name`, `equipment_type`, `acquisition_type`, `processor`, `ram`, `disk_size`, `licensed_os`, `licensed_mso`, `other_installed_software`, `status`, `are_par_ics`, `serial_no`, `inventory_item_no`, `description`, `model`, `brand`, `unit_cost`, `end_user`, `designation`, `section`, `asset_owner`, `date_received`, `received_from`, `supplier`, `acquisition_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'R13-BUTC-012', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 10 Pro', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', 'SPHV-2023-09-0100', '57H9G2S', '2015-03(05)-101101-C160FE062A-0001', 'none', 'Optiplex 7010MT', 'Dell', 46796.40, 'Musico, Kate Coleen C.', 'Administrative Aide I', 'HRAS', 'Laguesma - Podot, Jennith S.', '2023-09-29', 'Claro, Vina F.', 'none', '2015-03-09', 'At Human Resource and Administrative Section;\r\n\r\nR13-BUTC-012\r\n', '2024-03-01 12:11:42', '2024-03-02 11:29:25'),
(2, 'n/a', 'Desktop', 'Procured', 'Intel Pentium II', '1GB', '20 GB', 'Windows XP Professional', 'NONE', 'DBP ACIC (Advise Check Issued and Cancelled)\r\n', 'Operational', '13-0239', 'n/a', '2006-03(05)-101-C160FE062A-0001', 'Clone PC', 'n/a', 'Clone PC', 7200.00, 'Juan, Jasper D.', 'Computer Operator I', 'HRAS', 'Laguesma - Podot, Jennith S.', '2013-07-10', 'Claro, Vina F.', 'n/a', '2006-03-10', 'At Human Resource and Administrative Section > Cash Unit\r\n', '2024-03-01 23:30:11', '2024-03-02 06:15:09'),
(3, 'R13-BUTC-203', 'Desktop', 'Turned over by contractor', 'Intel Core 2 Duo', '4GB', '320 GB', 'Windows XP Professional', 'Microsoft Office 2007 Enterprise', 'Budget System (NGA), eNGAS V. 1.2.0, HP Laserjet P4010_P4510 Series Printing Solutions, Symantec EndPoint Protection\r\n', 'Operational', '2016-07-0092', 'PVSBL0Y0029080E8062701', '2009-07(05)-101101-C160FE062A-0002', 'n/a', 'Aspire M5711', 'Acer', 59400.00, 'Juan, Jasper D.', 'Computer Operator I', 'HRAS', 'Laguesma - Podot, Jennith S.', '2013-07-09', 'Claro, Vina F.', 'n/a', '2009-07-29', 'Returned to Supply and Property Unit; For safekeeping; \r\n\r\nPRS No.: 2018-0024;\r\n\r\nR13-BUTC-203\r\n', '2024-03-02 00:24:53', '2024-03-02 11:29:25'),
(4, 'R13-BUTC-005', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 10 Pro', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2020-03-0036', '68H9G2S', '2015-03(05)-101101-C160FE062A-0001', 'n/a', 'Optiplex 7010MT', 'Dell', 46796.40, 'Bianan, Meraflor C.', 'Clerk I', 'HRAS', 'Laguesma - Podot, Jennith S.', '2020-03-09', 'Claro, Vina F.', 'n/a', '2015-03-09', 'At Human Resource and Administrative Section > HRMD Unit;\r\n\r\nMonitor is For Disposal\r\nPRS No.: 2021-0029\r\n\r\nR13-BUTC-005\r\n', '2024-03-02 06:27:55', '2024-03-02 11:29:25'),
(5, 'R13-BUTC-908', 'Desktop', 'Turned over by contractor', 'Intel Core 2 Duo', '2GB', '512 GB', 'NONE', 'NONE', 'AVG 2013, Google Chrome, Samsung Printer Driver, TheDTR\r\n', 'Operational', '2020-09-0149', 'PSV9709051112022B02701', '2011-10(05)-101101-C160FE062A-0004', 'n/a', 'Veriton X480G', 'Acer', 36000.00, 'Pascual, Claire M.', 'Clerk I', 'HRAS', 'Laguesma - Podot, Jennith S.', '2020-09-14', 'Claro, Vina F.', 'n/a', '2011-10-17', 'Returned to Supply and Property Unit; For safekeeping; \r\n\r\nRRSP No.: 2023-07-0007\r\n\r\nIRE No.:  01.23.034-IRE-078\r\n\r\nR13-BUTC-908\r\n', '2024-03-02 06:54:18', '2024-03-02 11:29:25'),
(6, 'n/a', 'Desktop', 'Procured', 'Intel Core 2 Quad Q6600', '2GB', '512 GB', 'Windows 7 Home Basic', 'NONE', 'Acer Utilities, Adobe Systems, Cyberlink PowerDVD 8, EPSON Printing Solutions, Google Chrome, HP Deskjet Printing Solutions, Nero 9 Essentials, VLC, WinRaR', 'Operational', '13-0258', 'PVSC5010010060A0772700', '2010-07(05)-101-C160FE062A-0010', 'n/a', 'Aspire M3800', 'Acer', 42824.00, 'Castillon, Melanie G.', 'Administrative Officer II (General Services Officer)', 'HRAS', 'Castillon, Melanie G.', '2013-07-15', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2010-07-09', 'Returned to Supply and Property Unit;For Safekeeping;PRS No.: 2018-0035', '2024-03-02 07:20:17', '2024-03-02 11:30:11'),
(7, 'n/a', 'Desktop', 'Procured', 'Intel Pentium', '2GB', '512 GB', 'Windows 8 Single Language', 'Microsoft Office 2010 Home and Business Edition', 'Avast Antivirus, Canon My Printer, EPSON Printer Utility, Google Chrome, HP Printing Solution, VLC, Winamp, WinRaR', 'Operational', '13-0343', 'DTVDKSP016224128479201', '2012-11(05)-101-C160FE062A-0005', 'n/a', 'Veriton M2610G', 'Acer', 20988.00, 'Fuentes, Christy Mae N.', 'Utility Worker', 'PS', 'Castillon, Melanie G.', '2013-03-21', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2012-11-19', 'At Office of the District Engineer > Procurement Staff;Currently at ICTS; Subject for IRE', '2024-03-02 11:33:46', '2024-03-03 12:36:56'),
(8, ' R13-BUTC-009', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2020-10-0183', '66H9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Gonzales, Roselyn B.', 'Utility Worker', 'HRAS', 'Catalan, Marle Q.', '2020-10-30', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At Human Resource and Administrative Section > Records Management Unit;\r\n', '2024-03-04 02:45:36', '2024-03-04 02:45:36'),
(9, 'N/A ', 'Desktop', 'Procured', 'Intel Pentium', '2GB', '512 GB', 'Windows 7 Home Basic', 'NONE', 'Avast Antivirus, Canon My Printer, EPSON Printer Utility, Google Chrome, HP Printing Solution, VLC, Winamp, WinRaR\r\n', 'Operational', '13-0343', 'DTVDKSP016224128479201', '2012-11(05)-101-C160FE062A-0005', 'N/A', 'Veriton M2610G', 'Acer', 20988.00, 'Fuentes, Christy Mae N.', 'Utility Worker', 'PS', 'Castillon, Melanie G.', '2013-03-21', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2012-11-19', 'At Office of the District Engineer > Procurement Staff;\r\n\r\nCurrently at ICTS; Subject for IRE\r\n', '2024-03-04 02:54:17', '2024-03-04 02:54:17'),
(10, 'N/A ', 'Desktop', 'Procured', 'AMD', '2GB', '320 GB', 'NONE', 'NONE', 'Adobe Systems, Avast Antivirus, Canon MP250 series MP Drivers, Google Chrome, Mozilla Firefox, Nero BurnLite 10, Opera Stable, VLC, Winamp, WinRaR\r\n', 'Operational', '13-0344', 'PTNAEC02190702E3B3001', '2007-02(05)-101-C160FE062A-0006', 'N/A', 'EL1200', 'eMachines', 46250.00, 'Claro, Vina F.', 'Administrative Officer III (Supply Officer II)', 'HRAS', 'Claro, Vina F.', '2013-03-21', 'Claro, Vina F.', 'N/A ', '2007-02-06', 'At Human Resource and Administrative Section > Supply and Property Unit\r\n', '2024-03-04 03:00:44', '2024-03-04 03:00:44'),
(11, 'N/A ', 'Desktop', 'Procured', 'Intel Core 2 Duo', '2GB', '160 GB', 'NONE', 'NONE', 'Adobe Reader, Adobe Photoshop CS5, AutoCAD 2007, Avast Antivirus, Canon Printing Solution, CorelDraw Graphics Suite 12, EPSON Printer Software,  Mozilla Firefox, PowerDVD, VLC, Winamp\r\n', 'Operational', '13-0121', 'Q916A449', '2009-09(05)-101-C160FE062A-0004', 'Clone PC', 'N/A ', 'Clone PC', 28995.00, 'Alvar, Josefina C.', 'Administrative Assistant I (Computer Operator I)', 'HRAS', 'Alvar, Josefina C.', '2013-05-06', 'Claro, Vina F.', 'N/A ', '2009-09-29', 'At Human Resource and Administrative Section > Supply and Property Unit\r\n', '2024-03-04 03:04:10', '2024-03-04 03:04:10'),
(12, 'n/a', 'Desktop', 'Procured', 'Intel Core 2 Duo', '1GB', '256 GB', 'Windows XP Professional', 'NONE', 'Adobe Systems, AutoCAD 2010, Avast Antivirus, Google Chrome, Mozilla Firefox, Nero 8 Essentials, VLC, Winamp, WinRaR', 'Operational', '14-0087', 'N/A ', '2007-03(05)-101101-C160FE062A-0002', 'n/a', 'N/A ', 'Clone PC', 29700.00, 'Royo, John Aldrin Y.', 'Laborer', 'HRAS', 'Claro, Vina F.', '2014-07-17', 'Claro, Vina F.', 'N/A', '2007-03-31', 'Returned to Supply and Property Unit; For safekeeping; PRS No.: 2017-0022', '2024-03-04 03:07:20', '2024-03-07 06:58:07'),
(13, 'R13-BUTC-205', 'Desktop', 'Procured', 'Intel Core i5-11600K', '2GB', '512 GB', 'Windows 7 Professional', 'Microsoft Office 2019 Professional Edition', 'Adobe System, Alphalist Data Entry and Validation V. 3.4, Avast Antivirus, Google Chrome, LaserJet 1020 Series, Mozilla Firefox, Nero 7 Essentials, OpenOffice.org 3.2, VLC, Winamp, WinRaR, eNGAS & eBudget System\r\n', 'Operational', '13-0072', 'PSVAA090040510974A2700', '2011-01(05)-101-C160FE062A-0007', 'N/A ', 'Veriton M680G', 'Acer', 53000.00, 'Dumrique, Precious Joy K.', 'Utility Worker', 'FS', 'Alfaro, Ma. Elivic D.', '2013-04-12', 'Claro, Vina F.', 'N/A ', '2011-01-11', 'At Finance Section > Accounting Unit; ', '2024-03-04 03:19:42', '2024-03-04 03:19:42'),
(14, 'N/A ', 'Desktop', 'Procured', 'Intel Core 2 Duo', '3GB', '160 GB', 'NONE', 'NONE', 'Adobe Reader, AVG 2013, Google Chrome, HP Laserjet P2030 & 1020 Printer Softwares, Microsoft,Student 2007, for Learning Essentials, Microsoft Student with Encarta Premium 2009, PowerISO, WinRaR\r\n', 'Operational', '13-0078', 'PTS970Y001727059312711', '2007-02(05)-101-C160FE062A-0001', 'N/A ', 'Aspire E5600', 'Acer', 62700.00, 'Pasco, Earl Kevin G.', 'Clerk I', 'FS', 'Castillon, Melanie G.', '2013-04-15', 'Claro, Vina F.', 'N/A ', '2007-02-02', 'At Office of the District Engineer > Procurement Staff\r\n', '2024-03-04 03:22:51', '2024-03-04 03:22:51'),
(15, 'n/a', 'Desktop', 'Procured', 'NONE', 'NONE', 'NONE', 'NONE', 'NONE', 'n/a', 'Operational', '09-0015', 'N/A', '2009-07(05)-101-C160FE39-0004', 'N/A', 'N/A', 'Acer', 59400.00, 'Alfaro, Ma. Elivic D.', 'Accountant III', 'FS', 'Alfaro, Ma. Elivic D.', '2009-07-23', 'N/A', 'N/A', '2009-07-23', 'This record is originated from the files of the Supply & Property Unit (SPU). When the ICT Inventory was updated and requires more detailed information such as ARE & Property Number, the referred ARE is now missing, it might have been misplaced due to the recent office migration. In addition, the unit itself is not present in the location of the user. It is suspected that the unit is already been returned to the SPU few years ago.\r\n', '2024-03-04 08:04:44', '2024-03-04 08:04:44'),
(16, 'R13-BUTC-103', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2010 Standard Edition', 'Adobe Reader, Budget (NGA), Cyberlink Software, e - NGA V.1.2.0, HP Protect Tools Security Manager, Symantec Endpoint Protection, Theft Recovery for HP Protect Tools\r\n', 'Operational', '14-0214', 'SGH303QMPP', '2013-04(05)-101101-C160FE062A-0007', 'n/a', 'Pro 3330MT', 'HP', 0.00, 'Aboloc, Claudine Rose G.', 'Utilty Worker', 'FS', 'Alfaro, Ma. Elivic D.', '2014-12-29', 'Claro, Vina F.', 'n/a', '2013-04-11', 'At Finance Section;\r\n\r\n\r\nR13-BUTC-103\r\n', '2024-03-04 09:20:30', '2024-03-04 09:20:30'),
(17, 'R13-BUTC-102', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-7100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2010 Standard Edition', 'Adobe Reader, Budget (NGA), Cyberlink Software, e - NGA V.1.2.0, HP Protect Tools Security Manager, Symantec Endpoint Protection, Theft Recovery for HP Protect Tools\r\n', 'Operational', '2020-03-0037', 'SGH303QMQ6', '2013-04(05)-101101-C160FE062A-0005', 'N/A', 'Pro 3330MT', 'HP', 32997.96, 'de los Santos, Laarni D.', 'Engineer II', 'QAS', 'de los Santos, Laarni D.', '2020-03-09', 'Claro, Vina F.', 'N/A', '2013-04-11', 'At Quality Assurance Section;\r\n\r\nTurned-over by Central Office;\r\n\r\nR13-BUTC-102\r\n\r\n\r\n', '2024-03-07 03:11:32', '2024-03-07 03:11:32'),
(18, 'R13-BUTC-104', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-7100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2010 Standard Edition', 'Adobe Reader, Budget (NGA), Cyberlink Software, e - NGA V.1.2.0, HP Protect Tools Security Manager, Symantec Endpoint Protection, Theft Recovery for HP Protect Tools\r\n', 'Operational', '2022-09-0142', 'SGH303QMPQ', '2013-04(05)-101101-C160FE062A-0008', 'N/A', 'Pro 3330MT', 'HP', 0.00, 'Azarcon, Ma. Sybelle Grace B.', 'Utility Worker I', 'QAS', 'Pajarillo, Agnes M.', '2022-08-22', 'Claro, Vina F.', 'N/A', '2013-04-11', 'At Quality Assurance Section;\r\n\r\nReturned to Supply and Property Unit for safekeeping;\r\n\r\nR13-BUTC-104\r\n\r\nIRE No.: 01.22.026-IRE-049\r\n\r\nPRS No.: 2022-0068\r\n\r\n', '2024-03-07 03:55:18', '2024-03-07 03:55:18'),
(19, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core 2 Quad Q6600', '2GB', '512 GB', 'Windows 10 Pro', 'NONE', 'Adobe Systems, AVG 2013, EPSON L210 Series Printer Software, Google Chrome, Mozilla Firefox, VLC, Winamp WinRaR\r\n', 'Operational', '15-0011', 'N/A', '2010-07(10)-101101-C160FE062A-0003', 'Clone PC', 'N/A', 'Clone PC', 35000.00, 'Funcion, Ma. Suzette P.', 'Computer Operator I', 'COA', 'San Juan, Jonifel Jane T.', '2015-02-25', 'Claro, Vina F.', 'N/A', '2010-07-22', 'At Commission on Audit\r\n', '2024-03-07 04:02:21', '2024-03-07 04:02:21'),
(20, 'R13-BUTC-206', 'Desktop', 'Turned over by contractor', 'Intel Dual Core', '1GB', '320 GB', 'Windows 8.1', 'NONE', 'Budget System (NGA), e-NGAS V.1.2.0, EPSON Printer Solutions, Symantec Endpoint Protection Small Business Edition, USB Disk Security, WinRaR\r\n', 'Operational', '2020-10-0172', 'PVNAZ09001935077129000', '2009-11(05)-101101-C160FE062A-0002', 'N/A', 'eMachines EL1830', 'Acer', 26818.00, 'Terante, Joseph C.', 'Administrative Aide III ', 'COA', 'Rubio, Ranjet F.', '2020-10-23', 'Claro, Vina F.', 'N/A', '2009-11-04', 'At Commission on Audit;\r\n\r\nR13-BUTC-206\r\n', '2024-03-07 04:09:18', '2024-03-07 04:09:18'),
(21, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i5-7600K', '4GB', '512 GB', 'Windows 10 Pro', 'NONE', 'Adobe System, Avast Free Antivirus, Canon Printing Utilities, EPSON L210 Printer Software, Google Chrome, Microsoft Encarta, Nero 8, PowerDVD, VLC, WinRaR\r\n', 'Operational', '2017-08-0078', 'N/A', '2010-11(05)-101-C160FE062A-0004', 'Clone PC', 'N/A', 'Clone PC', 39200.00, 'Pagar, Teresita E.', 'Engineer III', 'CS', 'Pagar, Teresita E.', '2017-08-22', 'Claro, Vina F.', 'N/A', '2010-11-16', 'At Construction Section\r\n', '2024-03-07 05:42:43', '2024-03-07 05:42:43'),
(22, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Dual Core', '2GB', '320 GB', 'Windows 7 Ultimate', 'NONE', 'Adobe Systems, Google Chrome, HP Deskjet Ink Advantage 2060, VLC, WinRaR\r\n', 'Operational', '2019-08-0087', 'PTSF909010035026123000', '2011-03(05)-101101-C160FE062A-0004', 'N/A', 'Aspire AM 1830', 'Acer', 30000.00, 'Galido, Niño Anthony V.', 'Engineer II', 'CS', 'Daguipa, Ma. Theresa M.', '2019-08-20', 'Claro, Vina F.', 'N/A', '2011-03-18', 'At Construction Section\r\n', '2024-03-07 05:52:44', '2024-03-07 05:52:44'),
(23, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i7-7700K', '4GB', '1 TB', 'Windows 10 Pro', 'NONE', 'Adobe Reader, EPSON L350 Series Printer Software, Google Chrome, USB Disk Security, VLC, Winamp, WinRaR\r\n', 'Operational', '2020-08-0122', 'DTVHHSP01541207F269600', '2014-03(05)-101-C160FE062A-0007', 'N/A', 'Veriton M4 Series', 'Acer', 46940.00, 'Bascones, Maria Rosario C.', 'Engineer II', 'CS', 'Bascones, Maria Rosario C.', '2020-08-15', 'Claro, Vina F.', 'N/A', '2014-03-31', 'At Construction Section\r\n', '2024-03-07 05:57:51', '2024-03-07 05:57:51'),
(24, 'R13-BUTC-002', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '15-0156', 'G3M9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Lamela, Roselle R.', 'Engineering Assistant', 'CS', 'Concha, Balbino, III G.', '2015-12-11', 'Claro, Vina F.', 'N/A', '2015-12-11', 'At Construction Section > Monitoring Unit; \r\n\r\nR13-BUTC-002\r\n', '2024-03-07 06:05:29', '2024-03-07 06:05:29'),
(25, 'R13-BUTC-939', 'Desktop', 'Turned over by contractor', 'Intel Core i7-7700K', '2GB', '512 GB', 'Windows 10 Pro', 'Microsoft Office 2010 Home and Business Edition', 'Acer Utilities, Adobe System, EPSON L210 Series Printer Software, Google Chrome, Kaspersky Anti-Virus 2014, PowerISO, SketchUp 8, VLC\r\n', 'Operational', '2021-02-0040', 'DTVCBSP016230049879204', '2007-09(05)-101101-C160FE062A-0001', 'N/A', 'Veriton S6610G', 'Acer', 76994.00, 'Ceballos, Niña Ricca T.', 'Administrative Aide VI', 'PS', 'Fuentes, Julio S.', '2021-02-09', 'Claro, Vina F.', 'N/A', '2007-09-17', 'At Office of the District Engineer > Procurement Staff;\r\n\r\nR13-BUTC-939\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.036-IRE-126\r\n\r\nPRS No.: 2023-0070\r\n', '2024-03-07 06:17:06', '2024-03-07 06:17:06'),
(26, 'N/A', 'Desktop', 'Procured', 'Intel Pentium', '2GB', '512 GB', 'NONE', 'NONE', 'AVG Antivirus, Canon MP258 Printing Solutions, Google Chrome, Kaspersky Internet Security  2014, Winzip 17.5\r\n', 'Operational', '2019-08-0113', 'N/A', '2013-10(05)-101101-C160FE062A-0005', 'Clone PC', 'N/A', 'Clone PC', 15836.00, 'Agad, Hazel Grace', 'Administrative Aide II', 'MS', 'Alburo, Elena T.', '2019-08-20', 'Claro, Vina F.', 'JMN Multimedia Sales & Services', '2013-10-21', 'At Maintenance Section\r\n', '2024-03-07 06:20:41', '2024-03-07 06:20:41'),
(27, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Dual Core', '2GB', '80 GB', 'NONE', 'NONE', 'AdobeSystems, EPSON Printer Software, HP Deskjet Ink Advantage Printing Solutions, Kaspersky Anti-Virus 2014, Mozilla Firefox, Nero 7 Essentials, VLC, WinRaR\r\n', 'Operational', '2020-12-0236', 'N/A', '2009-03(05)-101101-C160FE062A-0003', 'Clone PC', 'N/A', 'Clone PC', 23000.00, 'Calderon, Mechelle T.', 'Clerk III', 'PDS', 'Campos, Veronica G.', '2020-12-29', 'Claro, Vina F.', 'N/A', '2009-03-24', 'At Planning and Design Section\r\n', '2024-03-07 06:31:49', '2024-03-07 06:31:49'),
(28, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i3-7100', '2GB', '512 GB', 'Windows XP Professional', 'NONE', 'Adobe Acrobat 5.0, Adobe Flash Player 12, Avast Free Antivirus, Canon Printer Utilities, Google Chrome, IDM, Mozilla Firefox 26.0, IE 8\r\n', 'Operational', '14-0082', 'N/A', '2013-10(05)-101101-C160FE062A-0005', 'Clone PC', 'N/A', 'Clone PC', 15836.00, 'Pasco, Earl Kevin G.', 'Clerk I', 'HRAS', 'Tan, Jose B.', '2014-07-16', 'Claro, Vina F.', 'JMN Multimedia Sales & Services', '2013-10-21', 'At Human Resource and Administrative Section > Supply and Property Unit\r\n', '2024-03-07 06:36:30', '2024-03-07 06:36:30'),
(29, 'N/A', 'Desktop', 'Procured', 'Intel Core Duo', '2GB', '160 GB', 'Windows XP Professional', 'NONE', 'Adobe Systems,Avast Free Antivirus, Google Chrome, Mozilla Firefox, VLC, Winamp, WinRaR\r\n', 'Operational', '2020-09-0150', 'PTS570J0076390B6D52702', '2006-12(05)-101101-C160FE062A-0001', 'N/A', 'Aspire E560', 'Acer', 63494.00, 'Calderon, Mechelle T.', 'Clerk III', 'PDS', 'Salang, Ervin P.', '2020-09-14', 'Claro, Vina F.', 'N/A', '2006-12-29', 'At Planning and Design Section;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.22.026-IRE-036\r\n\r\nPRS No: 2022-0063\r\n', '2024-03-07 06:41:34', '2024-03-07 06:41:34'),
(30, 'R13-BUTC-011', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2022-09-0182', 'C4M9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Calo, Cinderella I.', 'Nursing Attendant II', 'HRAS', 'Laguesma - Podot, Jennith S.', '2022-09-22', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At Clinic;\r\n\r\nR13-BUTC-011\r\n', '2024-03-07 06:53:54', '2024-03-07 06:53:54'),
(31, 'N/A', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', 'SPHV-2024-01-0006', 'J3M9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Grana, Jannah Lyn M.', 'Laboratory Technician I', 'QAS', 'Grana, Jannah Lyn M.', '2024-01-29', 'Laguesma - Podot, Jennith S.', 'N/A', '2015-03-09', 'At ICT Office;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.034-IRE-071 \r\n\r\nPRS No.: 2023-0055\r\n\r\nAt Quality Assurance Section;\r\n', '2024-03-07 07:06:04', '2024-03-07 07:06:04'),
(32, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i7-7700K', '2GB', 'NONE', 'NONE', 'NONE', 'N/A', 'Operational', '2020-10-0175', 'N/A', '2013-10(05)-101101-C160FE062A-0001', 'Clone PC', 'N/A', 'Clone PC', 59689.00, 'Catalan, Marle Q.', 'Administrative Officer III (Records Officer II)', 'HRAS', 'Catalan, Marle Q.', '2020-10-30', 'Claro, Vina F.', 'DATA Trend', '2013-10-09', 'At Human Resource and Administrative Section > Records Management Unit; Record shows that this unit is under the custody of the stated Asset Owner, but the person disagreed with it, and mentioned that she doesn\'t have it, so the DITSO cannot retrieve the Serial Number for Inventory Purposes.\r\n', '2024-03-07 07:23:41', '2024-03-07 07:23:41'),
(33, 'R13-BUTC-207', 'Desktop', 'Turned over by contractor', 'Intel Core i3-7100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Home and Student Edition', 'Avira Antivirus Premium, Canon Printer Utilities\r\n', 'Operational', '2020-07-0079', 'DTVHLSP00632503F8B9500', '2013-10(05)-101101-C160FE062A-0002', 'N/A', 'Veriton X4620G', 'Acer', 35500.00, 'Pancito, Rolito P.', 'Engineer III', 'QAS', 'Pancito, Rolito P.', '2020-07-30', 'Claro, Vina F.', 'N/A', '2013-10-16', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-207\r\n', '2024-03-07 07:40:34', '2024-03-07 07:40:34'),
(34, 'R13-BUTC-010', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 10 Pro', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', 'SPHV-2023-08-0081', '17H9G2S', '2015-03(05)-101101-C160FE062A', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Denque, Ralph Ian D.', 'Engineer II', 'CS', 'Denque, Ralph Ian D.', '2023-08-08', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At ICT  Office;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.032-IRE-060 \r\n\r\nPRS No.: 2023-0055\r\n\r\nAt Construction Section; \r\n\r\nR13-BUTC-010\r\n', '2024-03-07 07:43:49', '2024-03-07 07:43:49'),
(35, 'N/A', 'Desktop', 'Procured', 'Intel Core i5-7600K', '2GB', '1 TB', 'Windows 7 Home Basic', 'NONE', 'Adobe Systems, AutoCAD Land Desktop 2009, AVG 2014, Canon Pixma iP2770 & MP258 Printing Solutions, EPSON Printing Solutions, Google Chrome, Google Earth, HP Printing Solutions, Mozilla Firefox\r\n', 'Operational', '2019-08-0066', '4CE1240F0Z', '2011-08(10)-101101-C160FE062A-0005', 'N/A', 'Pavilion 7000 Series', 'HP', 44439.00, 'Rubi, Charity T.', 'Engineer I', 'PDS', 'Basco, Ryan Joy L.', '2019-08-20', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2011-08-17', 'At Planning and Design Section\r\n', '2024-03-07 07:49:17', '2024-03-07 07:49:17'),
(36, 'N/A', 'Desktop', 'Procured', 'Intel Pentium IV', '1GB', '40 GB', 'Windows XP Professional', 'Microsoft Office 2003 Professional Edition', 'Adobe Flash Player, AVG 2012, Mozilla Firefox\r\n', 'Operational', '2019-08-0115', '9131Q01Z0221300163JC', '2002-06(05)-101101-C160FE062A-0002', 'N/A', 'Veriton 7200D', 'Acer', 55000.00, 'Calderon, Mechelle T.', 'Clerk III', 'PDS', 'Lomonsod, Leopoldo A.', '2019-08-20', 'Claro, Vina F.', 'N/A', '2002-06-11', 'At Planning and Design Section\r\n', '2024-03-07 07:55:10', '2024-03-07 07:55:10'),
(37, 'N/A', 'Desktop', 'Procured', 'Intel Core 2 Quad Q6600', '2GB', '512 GB', 'Windows XP Professional', 'Microsoft Office 2003 Professional Edition', 'Adobe Systems, AutoCAD 2013, Autodesk Inventor Fushion 2013, Avast Anti-virus, Canon Pixma MP258 Printing Solutions, Google Chrome, McAfee Security Scan Plus, Mozila Firefox, Nero 7 Essentials, USB Disk Security, VLC Media Player, Winamp\r\n', 'Operational', '13-0069', 'A4MOAP355367', '2010-08(05)-101-C160FE062A-0008', 'Clone PC', 'N/A', 'Clone PC', 18000.00, 'Campos, Veronica G.', 'Engineering Assistant (Special Agent I)', 'PDS', 'Campos, Veronica G.', '2013-04-12', 'Claro, Vina F.', 'N/A', '2010-08-31', 'At Planning and Design Section\r\n', '2024-03-07 08:02:55', '2024-03-07 08:02:55'),
(38, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i3-7100', '2GB', '2 TB', 'Windows 7 Home Basic', 'NONE', 'Adobe Systems, AutoCAD Civil 3D 2013, AutoCAD Civil 3D Land Desktop Companion 2009, AVG 2014, Canon iP2700 Printer Software, Cyberlink PowerDVD 10, Google Chrome, HP Printer Solutions, Microsoft Mathematics, OpenOffice.org, VLC, WinRaR\r\n', 'Operational', '13-0185', '4CE20700SN', '2012-11(05)-101-C160FE062A-0007', 'N/A', 'Pavilion P6 Series', 'HP', 45000.00, 'Sandoval, Mary Grace D.', 'Engineering Assistant', 'PDS', 'Canlas, Reynaldo A.', '2013-06-07', 'Claro, Vina F.', 'N/A', '2012-11-29', 'At Planning and Design Section\r\n', '2024-03-07 08:16:20', '2024-03-07 08:16:20'),
(39, 'N/A', 'Desktop', 'Turned over by contractor', 'Intel Core i3-7100', '2GB', '1 TB', 'Windows 7 Ultimate', 'NONE', 'Adobe Systems, Adobe Photoshop, AutoCAD Civil 3D, AVG 2014, Canon Pixma iP2770 Printing Solutions, Google Chrome, Mozilla Firefox, PowerISO, WinRaR\r\n', 'Operational', '2019-08-0073', 'DTSJMP001225033709201', '2012-08(05)-101101-C160FE062A-0006', 'N/A', 'Aspire M3-800', 'Acer', 40000.00, 'Claro, Clavin F.', 'Architect II', 'PDS', 'Brilleta, Ericton John S.', '2019-08-20', 'Claro, Vina F.', 'N/A', '2012-08-10', 'At Planning and Design Section\r\n', '2024-03-07 08:19:19', '2024-03-07 08:19:19'),
(40, 'R13-BUTC-006', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2020-10-0180', '96H9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Blanco, Corazon Joy P.', 'Clerk II', 'PDS', 'Campos, Veronica G.', '2020-10-30', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At Planning and Design Section;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.032-IRE-050\r\n\r\nPRS No.: 2023-0054\r\n\r\nR13-BUTC-006\r\n', '2024-03-07 08:24:14', '2024-03-07 08:24:14'),
(41, 'R13-BUTC-007', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2023-08-0080', 'H4M9G2S', '2015-03(05)-101101-C160FE062A', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Avenido, Bernard Francis B.', 'Engineer II', 'QAS', 'Avenido, Bernard Francis B.', '2023-08-08', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At Network/ICT;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.032-IRE-065\r\n\r\nPRS No.: 2023-0055\r\n\r\nAt Quality Assurance Section;\r\n\r\nR13-BUTC-007\r\n', '2024-03-07 08:29:10', '2024-03-07 08:29:10'),
(42, 'R13-BUTC-008', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2020-10-0181', '35M9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A', 'Optiplex 7010MT', 'Dell', 46796.40, 'Orillaneda, Karla Kriska L.', 'Engineering Aide', 'PDS', 'Sarceda, Ronelo Anthony P.', '2020-10-30', 'Claro, Vina F.', 'N/A', '2015-03-09', 'At Planning and Design Section;\r\n\r\nReturn to Supply and Property Unit for safekeeping;\r\n\r\nIRE No.: 01.23.032-IRE-0746\r\n\r\nPRS No.: 2023-0053\r\n\r\nR13-BUTC-008\r\n', '2024-03-07 08:34:46', '2024-03-07 08:34:46'),
(43, 'N/A ', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '750 GB', 'Windows 7 Ultimate', 'NONE', 'Adobe Systems, AVG 2014, EPSON Stylus Printer Software, Google Chrome, Microsoft Encarta Premium 2009, Mozilla Firefox, Nero 9 Essentials, USB Disk Security, VLC, Winamp, WinRaR\r\n', 'Operational', '2021-09-0140', 'PVSCK02001941116D72702', '2010-07(05)-101101-C160FE062A-0001', 'N/A ', 'Aspire M5810', 'ACER', 74518.00, 'Fuentes, Julio S.', 'Engineer II', 'BAC', 'Fuentes, Julio S.', '2020-12-01', 'Claro, Vina F.', 'N/A ', '2010-07-09', 'At Office of the District Engineer > BAC\r\n', '2024-03-07 08:44:11', '2024-03-07 08:44:11'),
(44, 'R13-BUTC-003', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Standard Edition', 'Ccleaner,  Cyberlink Media Suite Essentials, Dell Backup Recovery, Realtek High Definition Audio Driver, Symantec Endpoint Protection Antivirus, Windows Essentials 2012\r\n', 'Operational', '2021-09-0150', '48H9G2S', '2015-03(05)-101101-C160FE062A-0001', 'N/A ', 'Optiplex 7010MT', 'DELL', 46796.40, 'Ceballos, Niña Ricca T.', 'Administrative Aide VI', 'BAC', 'Fuentes, Julio S.', '2020-12-01', 'Claro, Vina F.', 'N/A ', '2015-03-09', 'At Office of the District Engineer > BAC;', '2024-03-07 08:47:03', '2024-03-07 08:47:03'),
(45, 'N/A ', 'Desktop', 'Procured', 'Intel Core 2 Duo', '2GB', '160 GB', 'Windows XP Professional', 'NONE', 'Adobe Reader, Flash, & Photoshop, AVG 2014, Canon Printer Utilities, EPSON L210 & TX121 Series Printer Software, HP Deskjet 3900 & D2500 Printer Drivers, Mozilla Firefox, Nero Suite, PowerDVD, Winamp\r\n', 'Operational', '13-0054', 'N/A ', '2009-04(05)-101-C160FE062A-0001', 'Clone PC', 'N/A ', 'Clone PC', 47100.00, 'Claro, Chemney June F.', 'Laboratory Technician I', 'BAC', 'de los Santos, Laarni D.', '2013-04-05', 'Claro, Vina F.', 'N/A ', '2009-04-20', 'At Quality Assurance Section\r\n', '2024-03-07 08:51:36', '2024-03-07 08:51:36'),
(46, 'R13-BUTC-213', 'Desktop', 'Turned over by contractor', 'Intel Core i3-10100', '2GB', '512 GB', 'Windows 8', 'Microsoft Office 2013 Home and Business Edition', 'Canon MP258 Printer Utilities, EPSON L210 Series Printer Software, Google Chrome, Kaspersky Internet Security 2013, VLC, Winamp, WinRaR\r\n', 'Operational', '2019-08-0084', 'DTVE9SP008308048749200', '2013-04(05)-101-C160FE062A-0004', 'N/A ', 'Veriton X4620G', 'ACER', 57000.00, 'Manili, Mikoge C.', 'Clerk II', 'QAS', 'Cuarteron, Richard L.', '2019-08-20', 'Claro, Vina F.', 'N/A ', '2013-04-10', 'At Quality Assurance Section;', '2024-03-07 08:54:59', '2024-03-07 08:54:59'),
(47, 'R13-BUTC-212', 'Desktop', 'Turned over by contractor', 'Intel Core i7-11700K', '4GB', '1 TB', 'Windows 7 Professional', 'NONE', 'Adobe Reader, EPSON L350 Series Printer Software, Google Chrome, VLC, Winamp, WinRaR\r\n', 'Operational', '2020-08-0120', 'DTVHHSP01541207F049600', '2014-03(05)-101-C160FE062A-0008', 'N/A ', 'Veriton M4630G', 'ACER ', 63300.00, 'Pancito, Rolito P.', 'Engineer III', 'QAS', 'Pancito, Rolito P.', '2020-08-15', 'Claro, Vina F.', 'N/A ', '2014-03-31', 'At Quality Assurance Section;', '2024-03-07 09:05:21', '2024-03-07 09:05:21'),
(48, 'R13-BUTC-225', 'Desktop', 'Turned over by contractor', 'Intel Core i7-11700K', '16GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2010 Home and Business Edition', 'Adobe Systems, AutoCAD Civil 3D, EPSON Printer Utilities,  Google Chrome, Google Earth, Kaspersky, Sketchup 2015, STAAD Pro, VLC, WinRAR', 'Operational', '2021-12-0209', 'DTVJRSP0414340426A9600', '2015-08(05)-101101-C160FE062A-0005', 'N/A ', 'Veriton S6630G', 'ACER', 67995.00, 'Elorta, Rosemarie', 'Engineering Assistant', 'PDS', 'Sarceda, Ronelo Anthony P.', '2015-08-24', 'Claro, Vina F.', 'Datalan Communication Services', '2015-08-19', 'Return to Supply and Property Unit for safekeeping; PRS No.: 2023-0056  IRE No.: 01.23.032-IRE-055;', '2024-03-07 09:08:31', '2024-03-07 09:20:17'),
(49, 'R13-BUTC-105', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8', 'Microsoft Office 2013 Home and Business Edition', '7-Zip 9.20 (x64 Edition), Adobe Reader XI, Cyberlink Software Utilties, Device Access Manager for HP ProtectTools, NVIDIA Graphics Driver 332.33, Realtek Card Reader, Start Menu, Symantec Endpoint Protection\r\n', 'Operational', '2021-04-0071', '4CE4330GRN', '2015-11(05)-101101-C160FE062A-0009', 'N/A ', 'Pavilion 500 - 334d', 'HP', 81500.00, 'Matulac, Jeff C.', 'Administrative Assistant II (Clerk IV)', 'HRAS', 'Matulac, Jeff C.', '2021-04-23', 'Claro, Vina F.', 'Sandee\'s Print & Computer Sales', '2015-11-09', 'At Human Resource and Administrative Section > HRMD Unit;', '2024-03-07 09:11:20', '2024-03-07 09:11:20'),
(50, 'R13-BUTC-208', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', 'At Human Resource and Administrative Section > HRMD Unit;', 'Operational', '2018-07-0075', 'DTVHHSP151548002879600', 'NE-0004-001-004-2016', 'N/A ', 'Veriton M4630G', 'Acer', 71500.00, 'Aguilera, Gerry Jr. A.', 'Administrative Aide VI', 'MS', 'Antivo, Cyvae Mae T.', '2018-07-18', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-07-18', 'At Maintenance Section;', '2024-03-07 09:15:02', '2024-03-07 09:15:02'),
(51, ' R13-BUTC-209', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Acer Utilities, Adobe Reader XI (11.0.03), Auslogics Disk Defrag, Google Chrome, Intel Graphics Driver, Mozilla Firefox 15.0 (x86 en-US), Realtek Driver Software, Symantec Endpoint Protection, USB Disk Security, WinRAR Archiver', 'Operational', '2022-08-0108', 'DTVHHSP1515480027F9600', 'NE-0004-002-004-2016', 'N/A', 'Veriton M4630G', 'Acer', 71500.00, 'Antivo, Cyvae Mae T.', 'Engineer II', 'MS', 'Caingcoy, Gloria R.', '2022-08-22', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-04-14', 'At Maintenance Section;\r\n\r\nR13-BUTC-209\r\n', '2024-03-08 00:28:48', '2024-03-08 00:28:48'),
(52, 'R13-BUTC-210', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Acer Utilities, Adobe Reader XI (11.0.03), Auslogics Disk Defrag, Google Chrome, Intel Graphics Driver, Mozilla Firefox 15.0 (x86 en-US), Realtek Driver Software, Symantec Endpoint Protection, USB Disk Security, WinRAR Archiver', 'Operational', '2022-09-0115', 'DTVHHSP151548002729600', 'NE-0004-003-004-2016', 'N/A', 'Veriton M4630G', 'Acer', 71500.00, 'Gonzales, Diomedes Jr., M.', 'Engineer II', 'MS', 'Gonzales, Diomedes Jr., M.', '2022-09-07', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-04-14', 'At Maintenance Section;\r\n\r\nR13-BUTC-210\r\n', '2024-03-08 00:33:39', '2024-03-08 00:33:39'),
(53, 'R13-BUTC-211', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Acer Utilities, Adobe Reader XI (11.0.03), Auslogics Disk Defrag, Google Chrome, Intel Graphics Driver, Mozilla Firefox 15.0 (x86 en-US), Realtek Driver Software, Symantec Endpoint Protection, USB Disk Security, WinRAR Archiver', 'Operational', '2022-09-0128', 'DTVHHSP1515480027D9600', 'NE-0004-004-004-2016', 'N/A', 'Veriton M4630G', 'Acer', 71500.00, 'Latawan, Mark Anthony Y.', 'Engineer II', 'MS', 'Latawan, Mark Anthony Y.', '2022-09-09', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-04-14', 'At Maintenance Section;R13-BUTC-211', '2024-03-08 00:37:07', '2024-03-08 00:42:06'),
(54, 'R13-BUTC-214', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Realtek Driver Software, Symantec Endpoint Protection, WinRAR Archiver\r\n', 'Operational', '2022-09-0116', 'DTVMTSP00360402B943000', 'NE-0008-001-002-2016', 'N/A', 'Veriton M4640G', 'Acer', 71500.00, 'Atibagos, Catherine Q.', 'Clerk III', 'QAS', 'Grana, Jannah Lyn M.', '2022-09-07', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-05-16', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-214\r\n', '2024-03-08 00:46:14', '2024-03-08 00:46:14'),
(55, 'R13-BUTC-215', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2013 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), EPSON Printer Software, Google Chrome, Realtek Driver Software, Symantec Endpoint Protection, WinRAR Archiver\r\n', 'Operational', '2022-09-0127', 'DTVMTSP00360402BFE3000', 'NE-0008-002-002-2016', 'N/A', 'Veriton M4640G', 'Acer', 71500.00, 'Pajarillo, Agnes M.', 'Laboratory Technician II', 'QAS', 'Pajarillo, Agnes M.', '2022-09-09', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-05-16', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-215\r\n', '2024-03-08 00:49:55', '2024-03-08 00:49:55'),
(56, 'R13-BUTC-216', 'Desktop', 'Procured', 'Intel Core i5-11600K', '4GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Auslogics Disk Defrag, EPSON Printer Software, Google Chrome, Mozilla Firefox 15.2 (x86 en-US), Realtek Driver Software, Symantec Endpoint Protection, USB Disk Security\r\n', 'Operational', '2022-09-0118', 'DTVMTSP063614019EA3000', 'NE-0013-001-001-2016', 'N/A', 'Veriton M4640G', 'Acer', 71500.00, 'Laguesma - Podot, Jennith S.', 'Administrative Officer IV (HRMO II)', 'HRAS', 'Laguesma - Podot, Jennith S.', '2022-09-07', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-06-24', 'At Human Resource and Administrative Section > HRMD Unit;\r\n\r\nR13-BUTC-216\r\n', '2024-03-08 00:53:50', '2024-03-08 00:53:50'),
(57, 'R13-BUTC-220', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Intel Graphics Driver, Realtek Driver Software, Symantec Endpoint Protection\r\n', 'Operational', '2022-08-0104', 'DTVMTSP07562507E763000', 'NE-0020-001-001-2016', 'N/A', 'Veriton M4640G', 'Acer', 71500.00, 'Abundo, Rubesita Q.', 'Administrative Assistant II (Disbursing Officer II)', 'HRAS', 'Abundo, Rubesita Q.', '2022-08-22', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-09-27', 'At Human Resource and Administrative Section > Cash Unit;\r\n\r\nR13-BUTC-220\r\n', '2024-03-08 00:58:07', '2024-03-08 00:58:07'),
(58, 'R13-BUTC-219', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', 'Civil Works Registry, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, GPL Ghostscript 8.46, Intel Graphics Driver, Realtek Driver Software, Symantec Endpoint Protection\r\n', 'Operational', '2021-09-0142', 'DTVMTSP07562507E613000', 'NE-0018-001-001-2016', 'N/A', 'Veriton M4640G', 'Acer', 71500.00, 'Matias, Lucky Mae A.', 'Administrative Aide VI', 'BAC', 'Claro, Vina F.', '0020-12-12', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-09-26', 'At Office of the District Engineer > BAC;\r\n\r\nR13-BUTC-219\r\n', '2024-03-08 01:03:05', '2024-03-08 01:03:05'),
(59, 'R13-BUTC-218', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2019 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, GPL Ghostscript 8.46, Intel Graphics Driver, Realtek Driver Software, Symantec Endpoint Protection\r\n', 'Operational', 'SPHV-2023-09-0104', 'DTVMTSP07562507E913000', 'NE-0019-001-001-2016', 'N/A', 'Veriton M4640G', 'Acer', 40814.00, 'Matulac, Jude Grace O.', 'Administrative Aide VI (Clerk III)', 'OADE', 'Matulac, Jude Grace O.', '2023-09-29', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-09-26', 'At Office of the Assistant District Engineer;\r\n\r\nR13-BUTC-218\r\n', '2024-03-08 01:07:18', '2024-03-08 01:07:18'),
(60, 'R13-BUTC-222', 'Desktop', 'Procured', 'Intel Core i7-11700K', '32GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', 'Autodesk 2017 (IDSP Civil 3D), Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Driver, RealTek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2022-08-0103', 'DTVMTSP05163806B933000', 'NE-0028-001-002-2016', 'N/A', 'Veriton M4640G', 'Acer', 92900.00, 'Abogado, Ebony Kirstie C.', 'Engineer II', 'PDS', 'Abogado, Ebony Kirstie C.', '2022-08-22', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-12-29', 'Columbia Computer Center, Inc.	12/29/2016	At Planning and Design Section;\r\n\r\nR13-BUTC-222\r\n', '2024-03-08 01:10:37', '2024-03-08 01:10:37'),
(61, 'R13-BUTC-223', 'Desktop', 'Procured', 'Intel Core i7-11700K', '32GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2019 Home and Business Edition', 'Autodesk (AutoCAD 2017), Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Driver, RealTek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2016-12-0214', 'DTVMTSP05163806B9D3000', 'NE-0026-002-002-2016', 'N/A', 'Veriton M4640G', 'Acer', 92900.00, 'Duncano, Roland A.', 'Engineer II', 'QAS', 'Duncano, Roland A.', '2016-12-29', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-12-29', 'At Planning and Design Section;\r\n\r\nR13-BUTC-223\r\n', '2024-03-08 01:24:05', '2024-03-08 01:24:05'),
(62, 'R13-BUTC-221', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', 'Civil Works Registry (CWR) Application v.3.7, Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Intel Graphics Driver, Symantec Endpoint Protection\r\n', 'Operational', '2022-09-0123', 'DTVMTSP07562507F483000', 'NE-0028-001-001-2016', 'N/A', 'Veriton M4640G', 'Acer', 78000.00, 'Alvar, Josefina C.', 'Administrative Assistant I (Computer Operator I)', 'HRAS', 'Alvar, Josefina C.', '2022-09-09', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2016-12-29', 'At Human Resource and Administrative Section > Supply and Property Unit;\r\n\r\nR13-BUTC-221\r\n', '2024-03-08 01:27:41', '2024-03-08 01:27:41'),
(63, 'R13-BUTC-224', 'Desktop', 'Procured', 'Intel Core i7-11700K', '8GB', '1 TB', 'Windows 8.1', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 Edition), Adobe Reader XI (11.0.03), Google Chrome, Intel Graphics Driver, RealTek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2023-03-0023', 'DTVMTSP05163806C913000', 'NE-0003-001-001-2017', 'N/A', 'Veriton M4640G', 'Acer', 72100.00, 'Catalan, Marle Q.', 'Administrative Officer III (Records Officer II)', 'HRAS', 'Catalan, Marle Q.', '2023-03-09', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-02-24', 'At Human Resource and Administrative Section > Records Management Unit;\r\n\r\nPO No.: 2017-02-0035\r\n\r\nR13-BUTC-224\r\n', '2024-03-08 01:33:27', '2024-03-08 01:33:27'),
(64, 'R13-BUTC-227', 'Desktop', 'Procured', 'Intel Core i7-11700K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Budget System (NGA), e-NGAS V.1.2.0, Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, NVIDIA Graphics Drivers & Utilities, Symantec Endpoint Protection\r\n', 'Operational', '2023-07-0045', 'DTVMTSP075646029CB3000', 'NE-0010-001-001-2017', 'N/A', 'Veriton M4640G', 'Acer', 89300.00, 'Andebor, Mary Joy A.', 'Administrative Aide II (RMO I)', 'FS', 'Mordeno, Lamberto O.', '2023-07-06', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-04-04', 'At Finance Section > Budget Unit;\r\n\r\nR13-BUTC-227\r\n\r\nPRS No.: 2023-0048\r\n\r\nTransferred to Lamberto O. Mordeno\r\n', '2024-03-08 01:43:53', '2024-03-08 01:43:53'),
(65, 'R13-BUTC-228', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection, Active Time Keeper (ATK) Pro Biometric System', 'Operational', '2023-04-0032', 'DTVMTSP07564602A543000', 'NE-0011-001-001-2017', 'n/a', 'Veriton M4640G', 'Acer', 89300.00, 'Arban, Emma P.', 'Administrative Aide VI', 'MS', 'Alburo, Elena T.', '2023-04-23', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-04-26', 'At Maintenance Section;\r\n\r\nR13-BUTC-228\r\n', '2024-03-08 02:14:21', '2024-03-08 02:14:21'),
(66, 'R13-BUTC-230', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2019 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2020-07-0062', 'DTVMTSP07765107BA63000', 'NE-0021-001-001-2017', 'N/A', 'Veriton M4640G', 'Acer', 84300.00, 'Terante, Justin P.', 'Enigneer I', 'CS', 'Condar, Ansarodin M.', '2020-07-03', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-06-30', 'At Construction Section;\r\n\r\nR13-BUTC-230\r\n', '2024-03-08 02:35:44', '2024-03-08 02:35:44'),
(67, 'R13-BUTC-233', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Budget System (NGA), e-NGAS V.1.2.0, Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2023-10-0130', 'DTVMTSP07765107B883000', 'NE-0023-001-002-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 60900.00, 'Lavador, Ena Angelica T.', 'Accountant I', 'FS', 'Mordeno, Lamberto O.', '2023-10-19', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-07', 'At Finance Section > Accounting Unit;\r\n\r\nR13-BUTC-233\r\n', '2024-03-08 02:42:54', '2024-03-08 02:42:54'),
(68, 'R13-BUTC-234', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Budget System (NGA), e-NGAS V.1.2.0, Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2023-10-0130', 'DTVMTSP07765107BBE3000', 'NE-0023-002-002-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 60900.00, 'Callanta, Alia Adrienne A.', '\"Admininistrative  Aide II (Messenger)\"', 'FS', 'Mordeno, Lamberto O.', '2023-10-19', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-07', 'At Finance Section > Accounting Unit;\r\n\r\nR13-BUTC-234\r\n', '2024-03-08 02:48:33', '2024-03-08 02:48:33'),
(69, 'R13-BUTC-231', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2023-10-0126', 'DTVMTSP07765107B8A3000', 'NE-0025-001-002-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 60900.00, 'Conde, Jennifer A.', 'Clerk II', 'HRAS', 'Laguesma - Podot, Jennith S.', '2023-10-11', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-06-30', 'At Human Resource and Administrative Section > Supply and Property Unit;\r\n\r\nR13-BUTC-231\r\n', '2024-03-08 02:51:39', '2024-03-08 02:51:39');
INSERT INTO `items` (`item_no`, `computer_name`, `equipment_type`, `acquisition_type`, `processor`, `ram`, `disk_size`, `licensed_os`, `licensed_mso`, `other_installed_software`, `status`, `are_par_ics`, `serial_no`, `inventory_item_no`, `description`, `model`, `brand`, `unit_cost`, `end_user`, `designation`, `section`, `asset_owner`, `date_received`, `received_from`, `supplier`, `acquisition_date`, `remarks`, `created_at`, `updated_at`) VALUES
(70, 'R13-BUTC-232', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2023-10-0126', 'DTVMTSP07765107BBB3000', 'NE-0025-002-002-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 60900.00, 'Zaragoza, Kathressia S.', 'Administrative Aide VI', 'HRAS', 'Laguesma - Podot, Jennith S.', '2023-10-11', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-06-30', 'At Human Resource and Administrative Section > Supply and Property Unit;\r\n\r\nR13-BUTC-232\r\n', '2024-03-08 02:55:19', '2024-03-08 02:55:19'),
(71, 'R13-BUTC-235', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2020-07-0071', 'DTVMTSP3957210288B3000', 'NE-0028-001-004-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 82990.00, 'Cuarteron, Richard L.', 'Engineer II', 'QAS', 'Cuarteron, Richard L.', '2020-07-27', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-24', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-235\r\n', '2024-03-08 03:03:12', '2024-03-08 03:03:12'),
(72, 'R13-BUTC-236', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2020-07-0072', 'DTVMTSP3957210288C3000', 'NE-0028-002-004-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 82990.00, 'Fuentes, Julio S.', 'Engineer II', 'QAS', 'Fuentes, Julio S.', '2020-07-27', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-24', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-236\r\n', '2024-03-08 03:06:23', '2024-03-08 03:06:23'),
(73, 'R13-BUTC-238', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2020-07-0073', 'DTVMTSP395721028903000', 'NE-0028-003-004-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 82990.00, 'Claro, Chemney June F.', 'Laboratory Technician I', 'QAS', 'de los Santos, Laarni D.', '2020-07-27', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-24', 'At Quality Assurance Section;\r\n\r\nR13-BUTC-238\r\n', '2024-03-08 03:10:07', '2024-03-08 03:10:07'),
(74, 'R13-BUTC-237', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 45.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2020-07-0074', 'DTVMTSP395721028923000', 'NE-0028-004-004-2017', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 82990.00, 'Montilla, Ma. Abegail F.', 'Engineer II', 'QAS', 'Pancito, Rolito P.', '2020-07-27', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2017-07-24', 'At Quality Assurance Section; \r\n\r\nR13-BUTC-237\r\n', '2024-03-08 03:15:39', '2024-03-08 03:15:39'),
(75, 'n/a', 'Desktop', 'Turned over by DPWH Central Office', 'Intel Core i3-10100', '4GB', '512 GB', 'Windows 7 Professional', 'NONE', 'A4 TECH PC Camera H, Adobe Flash Player 11 ActiveX, Adobe Reader X MUI, AVG Protection, AVG Web TuneUP, Cisco Systems, Conexant SmartAudio HD, Dell Software Utilities, Epson Printer Utilities, IP Office Admin Suite, iSpy (64 bit), Java™ 6 Update 29, Microsoft Office, Team Viewer 11, Teltrac GX, Wamp Server 2.2, Windows Essentials 2012\r\n', 'Operational', '2023-09-0111', '8VXTYY1', 'NE-1718-001-001-16', 'Call Accounting PC', 'Vostro 270MT', 'Dell', 63504.00, 'Guibone, Jan Mark S.', 'Computer Maintenance Technologist II', 'ICTS', 'Guibone, Jan Mark S.', '2023-09-25', 'Claro, Vina F.', 'n/a', '2017-09-20', 'At Network Room\r\n', '2024-03-08 03:21:51', '2024-03-08 03:21:51'),
(76, 'R13-BUTC-245', 'Desktop', 'Turned over by contractor', 'Intel Core i7-11700K', '32GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Autodesk 2017 (IDSP Civil 3D), Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Driver, RealTek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2020-12-0227', 'DTVQ8SP106733048BD9600', 'NE-0048-001-001-2017', 'n/a', 'Veriton M4650G', 'Acer', 99940.00, 'Guerrero, Orlie Gil A.', 'Engineering Assistant', 'PDS', 'Abogado, Ebony Kirstie C.', '2020-12-21', 'Claro, Vina F.', 'Microtrade GCM Corporation', '2017-12-05', 'At Planning and Design Section;\r\n\r\nR13-BUTC-245\r\n', '2024-03-08 03:28:09', '2024-03-08 03:28:09'),
(77, 'R13-BUTC-246', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2023-10-0144', 'DTVPPSP0527340579E9600', 'NE-0005-001-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Pagar, Ronnah Marie N.', 'Administrative Aide I', 'CS', 'Juan, Jerome D.', '2023-10-19', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;\r\n\r\nR13-BUTC-246\r\n', '2024-03-08 03:32:18', '2024-03-08 03:32:18'),
(78, 'R13-BUTC-247', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0010', '2021-01-0010	DTVPPSP052734057A29600', 'NE-0005-002-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Alejandria, Daveriel C.', 'Engineer II', 'CS', 'Juan, Jerome D.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;\r\n\r\nR13-BUTC-247\r\n', '2024-03-08 03:41:39', '2024-03-08 03:41:39'),
(79, 'R13-BUTC-248', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0012', 'DTVPPSP052734057A89600', 'NE-0005-004-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Canlas, Ray Vincent J.', 'Engineer II', 'CS', 'Canlas, Ray Vincent J.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;\r\n\r\nR13-BUTC-248\r\n', '2024-03-08 03:45:07', '2024-03-08 03:45:07'),
(80, 'R13-BUTC-249', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0011', 'DTVPPSP052734057AB9600', 'NE-0005-003-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Pingoy, Alter O.', 'Engineer II', 'CS', 'Denque, Ralph Ian D.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;\r\n\r\nR13-BUTC-249\r\n', '2024-03-08 03:48:11', '2024-03-08 03:48:11'),
(81, 'R13-BUTC-250', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0014', 'DTVPPSP052734057BB9600', 'NE-0005-006-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Capilitan, Roark Jake P.', 'Engineer II', 'CS', 'Capilitan, Roark Jake P.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;', '2024-03-08 05:56:12', '2024-03-08 05:56:12'),
(82, 'R13-BUTC-251', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0013', 'DTVPPSP052734057BD9600', 'NE-0005-005-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Cristobal, Ricardo Jr., E.', 'Engineer II', 'CS', 'Bascones, Maria Rosario C.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;', '2024-03-08 06:05:42', '2024-03-08 06:05:42'),
(83, 'R13-BUTC-252', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0015', 'DTVPPSP052734057C49600', 'NE-0005-007-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Galido, Niño Anthony V.', 'Engineer II', 'CS', 'Daguipa, Ma. Theresa M.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;', '2024-03-08 06:24:45', '2024-03-08 06:24:45'),
(84, 'R13-BUTC-253', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0015', 'DTVPPSP052734057DE9600', 'NE-0003-008-008-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 84300.00, 'Macuno, Emily Joy B.', 'Engineer II', 'CS', 'Daguipa, Ma. Theresa M.', '2018-01-17', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-17', 'At Construction Section;', '2024-03-08 06:30:51', '2024-03-08 06:30:51'),
(85, 'R13-BUTC-240', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), ACER Software Utilities, Adobe Reader XI (11.0.03), Google Chrome, Intel Utilities, Mozilla Firefox 50.1.0 (x86 en-US), NVIDIA Graphics Drivers & Utilities, Realtek Software and Utilities, SMADAV version 11.4.9, Symantec Endpoint Protection\r\n', 'Operational', '2023-12-0165', 'DTVMTSP395721028953000', 'NE-0056-001-001-2017', 'N/A ', 'Veriton M4640G', 'Acer', 84300.00, 'Munar, Risa Gene E.', 'Assistant Information Officer ', 'ODE', 'Laguesma - Podot, Jennith S.', '2023-12-20', 'Laguesma - Podot, Jennith S.', 'Columbia Computer Center, Inc.', '2017-12-29', 'At Public Information Staff;', '2024-03-08 08:42:30', '2024-03-08 08:42:30'),
(86, 'R13-BUTC-239', 'Desktop', 'Procured', 'Intel Core i7-11700K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'At Public Information Staff;', 'Operational', '2023-12-0165', 'DTVMTSP05163806B453000', 'NE-0057-001-001-2017', 'N/A ', 'Veriton M4640G', 'Acer', 97130.00, 'Banluta, Kenneth D.', 'Assistant Information Officer ', 'ODE', 'Laguesma - Podot, Jennith S.', '2023-12-20', 'Laguesma - Podot, Jennith S.', 'Columbia Computer Center, Inc.', '2017-12-29', 'At Public Information Staff;', '2024-03-08 08:53:26', '2024-03-08 08:53:26'),
(87, 'N/A ', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0007', 'DTVPPSP052734058999600', 'NE-0002-001-002-2018', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 84300.00, 'Mulawan, Sergio Jr., M.', 'Engineer IV -OIC', 'LADP', 'Mulawan, Sergio Jr., M.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-10', 'At UPMO - CARBDP / LADP, FCMC Maintenance Works\r\n', '2024-03-08 09:06:42', '2024-03-08 09:06:42'),
(88, 'N/A ', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', '7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-01-0007', 'DTVPPSP052734058D49600', 'NE-0002-002-002-2018', 'Administrative and Applications Use', 'Veriton M4640G', 'Acer', 84300.00, 'Mulawan, Sergio Jr., M.', 'Engineer IV -OIC', 'LADP', 'Mulawan, Sergio Jr., M.', '2021-01-25', 'Claro, Vina F.', 'Columbia Computer Center, Inc.', '2018-01-10', 'At UPMO - CARBDP / LADP, FCMC Maintenance Works\r\n', '2024-03-08 09:10:24', '2024-03-08 09:10:24'),
(89, 'R13-BUTC-254', 'Desktop', 'Procured', 'Intel Core i7-11700K', '32GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Autodesk 2017 (IDSP Civil 3D), Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-02-0027', 'DTVQ8SP106733048609600', 'NE-0014-001-002-2018', 'Specialized Software Applications Use', 'Veriton M4640G', 'Acer', 101980.00, 'Licong, Brian P.', 'Architect I', 'MS', 'Caingcoy, Gloria R.', '2021-02-08', 'Claro, Vina F.', 'Microtrade GCM Corporation', '2018-02-06', 'At Maintenance Section;', '2024-03-08 09:13:54', '2024-03-08 09:13:54'),
(90, 'R13-BUTC-255', 'Desktop', 'Procured', 'Intel Core i7-11700K', '32GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Autodesk 2017 (IDSP Civil 3D), Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2021-02-0028', 'DTVQ8SP106733048F79600', 'NE-0014-002-002-2018', 'NE-0014-002-002-2018', 'Veriton M4640G', 'Acer', 101980.00, 'Latawan, Mark Anthony Y.', 'Engineer II', 'MS', 'Latawan, Mark Anthony Y.', '2021-02-08', 'Claro, Vina F.', 'Microtrade GCM Corporation', '2018-02-06', 'At Maintenance Section;', '2024-03-08 09:16:28', '2024-03-08 09:16:28'),
(91, 'R13-BUTC-256', 'Desktop', 'Procured', 'Intel Core i5-11600K', '8GB', '1 TB', 'Windows 10 Pro', 'Microsoft Office 2016 Home and Business Edition', 'Telephone Directory Application 1.0.0, 7 - Zip 9.20 (x64 edition), Adobe Reader XI (11.0.03), Google Chrome, NVIDIA Graphics Drivers & Utilities, Realtek High Definition Audio Driver, Symantec Endpoint Protection\r\n', 'Operational', '2022-08-0109', 'DTVPPSP052734057BA9600', 'NE-0013-001-001-2018', 'Administrative and Applications Use', 'Veriton M2640G', 'Acer', 76540.00, 'Juan, Jasper D.', 'Computer Operator I', 'HRAS', 'Caniga, Agnieszka Hazel D.', '2022-08-22', 'Claro, Vina F.', 'Microtrade GCM Corporation', '2018-02-06', 'At Human Resource and Administrative Section > Cash Unit;', '2024-03-08 09:20:04', '2024-03-08 09:20:04');

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `remove_double_quotes_trigger` BEFORE INSERT ON `items` FOR EACH ROW BEGIN
    SET NEW.remarks = REPLACE(NEW.remarks, '"', '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `market_survey_details`
--

CREATE TABLE `market_survey_details` (
  `id` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `equipment_type_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_survey_details`
--

INSERT INTO `market_survey_details` (`id`, `item_no`, `equipment_type_id`, `sub_cat_id`, `description_id`, `supplier_id`, `brand_id`, `model_name`, `unit_cost`, `quarter`, `year`) VALUES
(1, 9, 2, 4, 6, 9, 9, 'Surecolor SC-T5270D MFP 36&quot;', 2050000.00, '1', '2024'),
(2, 9, 2, 5, 6, 8, 8, 'Image Prograf TX-5310 MFP', 1985100.00, '1', '2024'),
(3, 9, 2, 5, 6, 10, 8, 'Image Prograf TX-5310 MFP', 2000000.00, '1', '2024'),
(4, 9, 2, 5, 6, 7, 8, 'Image Prograf TX-5310 MFP', 1980000.00, '1', '2024'),
(5, 2, 1, 1, 3, 1, 1, 'Pro Tower 280 G9', 138320.00, '1', '2024'),
(6, 2, 1, 1, 3, 4, 1, 'Pro Tower 280 G9', 156995.00, '1', '2024'),
(7, 2, 1, 1, 3, 9, 1, 'Pro Tower 280 G9', 149900.00, '1', '2024'),
(8, 3, 1, 1, 4, 1, 1, 'Pro Tower 280 G9', 169640.00, '1', '2024'),
(9, 3, 1, 1, 4, 4, 1, 'Pro Tower 280 G9', 168995.00, '1', '2024'),
(10, 3, 1, 1, 4, 9, 1, 'Pro Tower 280 G9', 170000.00, '1', '2024'),
(11, 4, 1, 1, 5, 1, 1, 'Pro Tower 280 G9', 189550.00, '1', '2024'),
(12, 4, 1, 1, 5, 4, 1, 'Pro Tower 280 G9', 224595.00, '1', '2024'),
(13, 4, 1, 1, 5, 9, 1, 'Pro Tower 280 G9', 199500.00, '1', '2024'),
(14, 6, 1, 2, 3, 1, 1, '240 G10', 122490.00, '1', '2024'),
(15, 6, 1, 2, 3, 4, 1, '240 G10', 145699.00, '1', '2024'),
(16, 6, 1, 2, 3, 9, 1, '240 G10', 135900.00, '1', '2024'),
(17, 7, 1, 2, 4, 1, 1, '250 G10', 163680.00, '1', '2024'),
(18, 7, 1, 2, 4, 4, 1, '240 G10', 180350.00, '1', '2024'),
(19, 7, 1, 2, 4, 9, 1, '250 G10', 182500.00, '1', '2024'),
(20, 8, 1, 2, 5, 1, 1, 'Zbook Power G10', 214440.00, '1', '2024'),
(21, 8, 1, 2, 5, 4, 1, 'Zbook Power G10', 285995.00, '1', '2024'),
(22, 8, 1, 2, 5, 9, 1, 'Zbook Power G10', 250000.00, '1', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_17_064423_create_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`) VALUES
(1, 'Microtrade'),
(2, 'Dataworld'),
(3, 'Fast Tech'),
(4, 'PowerOn'),
(5, 'Inkbox'),
(6, 'Columbia'),
(7, 'BXU'),
(8, 'Global Chips'),
(9, 'Bigbytes'),
(10, 'Wizard'),
(11, 'EliteKonexion');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'patlunagrl', '$2y$12$W4Hp8y/CfKfw9SxF7UT0iO3UNeWRFnNS4JqANsP0iLau0XjICqeJu', NULL, '2024-02-16 13:34:35', '2024-02-16 13:34:35', 1),
(7, 'guibonejms', '$2y$12$HG4R25ZBSLweAPjZ606HUuVthQIMqZe2ueR.hEwCToHzfdypIQoSm', NULL, '2024-02-16 19:10:45', '2024-02-16 19:10:45', 1),
(8, 'mondejarrjpa', '$2y$12$1.JjtrnHd909JoeAJLH7EuYfff.uNjLfv.zmwyXoKH85H14O1Iso6', NULL, '2024-02-16 19:12:43', '2024-02-16 19:12:43', 2),
(47, 'mirasac', '$2y$10$/5ilzVa0T.KjP4OTQn4ZyuZ07klhn4r462lKwyBktZQQ56dFXilCK', NULL, NULL, NULL, 2),
(49, 'admin', '$2y$10$9EyzyxWG4PDhSneofeLvBePHP2JKdQRsqKVBw3wf0wtVO/LP8Xf8a', NULL, NULL, NULL, 1),
(50, 'banlutakd', '$2y$10$X1aU0F58GBYHcikrX29Qju1s2KFx3VIkhmISzSV.eaoilkwlfFx.i', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_description`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `equipment_description`
--
ALTER TABLE `equipment_description`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `equipment_sub_category`
--
ALTER TABLE `equipment_sub_category`
  ADD PRIMARY KEY (`equipment_type_id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gazette`
--
ALTER TABLE `gazette`
  ADD PRIMARY KEY (`gazette_id`);

--
-- Indexes for table `inventory_admin`
--
ALTER TABLE `inventory_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `market_survey_details`
--
ALTER TABLE `market_survey_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_type_id` (`equipment_type_id`),
  ADD KEY `description_id` (`description_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privilege` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `equipment_description`
--
ALTER TABLE `equipment_description`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `equipment_sub_category`
--
ALTER TABLE `equipment_sub_category`
  MODIFY `equipment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gazette`
--
ALTER TABLE `gazette`
  MODIFY `gazette_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_admin`
--
ALTER TABLE `inventory_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `market_survey_details`
--
ALTER TABLE `market_survey_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `market_survey_details`
--
ALTER TABLE `market_survey_details`
  ADD CONSTRAINT `market_survey_details_ibfk_1` FOREIGN KEY (`equipment_type_id`) REFERENCES `equipment_type` (`equipment_id`),
  ADD CONSTRAINT `market_survey_details_ibfk_3` FOREIGN KEY (`description_id`) REFERENCES `equipment_description` (`sub_cat_id`),
  ADD CONSTRAINT `market_survey_details_ibfk_4` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`),
  ADD CONSTRAINT `market_survey_details_ibfk_5` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `market_survey_details_ibfk_6` FOREIGN KEY (`sub_cat_id`) REFERENCES `equipment_sub_category` (`equipment_type_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `privilege` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
