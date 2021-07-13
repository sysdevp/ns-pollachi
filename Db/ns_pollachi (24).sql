-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 04:25 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ns_pollachi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

CREATE TABLE `account_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` tinyint(1) DEFAULT NULL COMMENT '1=>Yes,0=>No',
  `name_of_tax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_of_tax` decimal(10,2) DEFAULT NULL,
  `type` int DEFAULT NULL COMMENT '1=>Goods,2=>Service',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `name`, `under`, `tax`, `name_of_tax`, `rate_of_tax`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Salary Account', 'Liabilities', NULL, NULL, NULL, NULL, '2020-10-01 09:23:03', '2020-10-01 09:45:25'),
(2, 'Investments', '1', NULL, NULL, NULL, NULL, '2020-10-01 09:31:04', '2020-10-01 09:31:04'),
(3, 'Electricity', 'Expense', NULL, NULL, NULL, NULL, '2021-03-24 05:22:03', '2021-03-24 05:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `account_group_taxes`
--

CREATE TABLE `account_group_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `account_group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` int NOT NULL,
  `tax_value` decimal(10,0) NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_group_taxes`
--

INSERT INTO `account_group_taxes` (`id`, `account_group`, `tax_id`, `tax_value`, `type`, `created_at`, `updated_at`) VALUES
(2, '3', 1, '6', 2, '2021-06-11 09:50:50', '2021-06-11 09:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `account_heads`
--

CREATE TABLE `account_heads` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` tinyint(1) DEFAULT NULL COMMENT '1=>Yes,0=>No ',
  `name_of_tax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_of_tax` decimal(10,2) DEFAULT NULL,
  `type` int DEFAULT NULL COMMENT '1=>Goods,2=>Service ',
  `opening_balance` decimal(10,2) DEFAULT NULL,
  `dr_or_cr` int DEFAULT NULL COMMENT '1=>DR,2=>CR ',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_heads`
--

INSERT INTO `account_heads` (`id`, `name`, `under`, `tax`, `name_of_tax`, `rate_of_tax`, `type`, `opening_balance`, `dr_or_cr`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Travel Expense', 'Primary', NULL, NULL, NULL, NULL, '20.00', 2, 1, '2021-06-11 09:49:51', '2021-06-11 09:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Saving Account', 'Saving Account', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(2, 'Current Account', 'Current Accounts', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(3, 'Fixed Deposit Account', 'Fixed Deposit Account', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(4, 'Balance Account', 'balance', 1, 0, 0, '2021-06-09 17:18:26', '2021-06-09 17:18:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE `address_details` (
  `id` bigint UNSIGNED NOT NULL,
  `address_table` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier',
  `address_type_id` bigint UNSIGNED DEFAULT NULL,
  `address_ref_id` bigint UNSIGNED DEFAULT NULL,
  `sf_no` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_line_2` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `land_mark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `postal_code` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`id`, `address_table`, `address_type_id`, `address_ref_id`, `sf_no`, `building_name`, `address_line_1`, `address_line_2`, `land_mark`, `country_id`, `state_id`, `district_id`, `city_id`, `postal_code`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cus', 2, 1, NULL, NULL, 'fgdfdg', 'gfdgf', 'fhgfh', 1, 3, 2, 1, '10', 1, 0, 0, '2021-06-10 18:37:53', '2021-06-10 18:38:15', NULL),
(3, 'Supplier', 2, 2, NULL, NULL, 'address line 1', 'address line 2', 'near mall', 1, 3, 2, 1, '678001', 1, 0, 0, '2021-06-11 09:30:46', '2021-06-11 09:30:46', NULL),
(4, 'Cus', 1, 2, NULL, NULL, 'address_line 1', 'address line 2', 'near something', 1, 1, 1, 2, '99854', 1, 0, 0, '2021-06-11 16:12:38', '2021-06-11 16:13:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address_types`
--

CREATE TABLE `address_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_types`
--

INSERT INTO `address_types` (`id`, `name`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permanent Address', 'Permanent Address', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(2, 'Temporary Address', 'Temporary Address', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(3, 'Shipping Address', 'Shipping Address', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL),
(4, 'Delivery Address', 'Delivery Address', 1, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advance_settlement_customers`
--

CREATE TABLE `advance_settlement_customers` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `receipt_date` date NOT NULL,
  `advance_amount` decimal(10,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `advance_settlement_customers`
--

INSERT INTO `advance_settlement_customers` (`id`, `customer_id`, `voucher_no`, `receipt_date`, `advance_amount`, `remarks`, `active_status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(3, 2, '11042', '2021-06-11', '500.00', 'test', 1, 0, 0, '2021-06-11 18:35:43', '2021-06-11 18:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `advance_settlement_suppliers`
--

CREATE TABLE `advance_settlement_suppliers` (
  `id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `advance_amount` decimal(10,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `advance_settlement_suppliers`
--

INSERT INTO `advance_settlement_suppliers` (`id`, `supplier_id`, `voucher_no`, `payment_date`, `advance_amount`, `remarks`, `active_status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(2, 2, '123', '2020-12-23', '600.00', 'test', 1, 0, 0, '2021-06-11 18:15:15', '2020-12-23 13:00:11'),
(3, 2, '345', '2020-12-24', '500.00', 'test', 1, 0, 0, '2020-12-23 13:04:43', '2020-12-23 13:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint UNSIGNED NOT NULL,
  `salutation` enum('Mr','Mrs') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `father_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_status` enum('Married','Single','Divorced') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `salutation`, `name`, `code`, `phone_no`, `email`, `dob`, `father_name`, `blood_group`, `material_status`, `profile`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr', 'Arjun K V', '123', '2589632548', 'arjunkvalsakumar@gmail.com', '2011-03-02', 'valsan', 'Ab+', 'Single', '2020-05-131589342079.jpg', 1, 0, 0, NULL, '2020-05-13 03:54:39', '2020-05-13 03:54:39', NULL),
(2, 'Mr', 'Agent', '007', '9457863245', 'agent@gmail.com', '1999-01-13', 'test', 'a+ve', 'Single', '2020-05-171589728584.png', 1, 0, 0, NULL, '2020-05-17 15:16:24', '2021-06-10 18:30:40', '2021-06-10 18:30:40'),
(3, 'Mr', 'test agent', '1212', '2357896542', 't@gmail.com', '2020-06-15', 'hgghfhg', 'jhgh', 'Single', '2020-06-151592217815.png', 1, 0, 0, NULL, '2020-06-15 10:43:35', '2021-06-10 18:30:44', '2021-06-10 18:30:44'),
(4, 'Mr', 'tttttt', '555', '3256895214', NULL, '2020-06-18', 'hghgh', 'kk', 'Single', '2020-06-181592470577.png', 1, 0, 0, NULL, '2020-06-18 08:56:17', '2021-06-10 18:30:49', '2021-06-10 18:30:49'),
(5, 'Mr', 'New Agent', '123356', '6325874589', 'N@gmail.com', '2020-09-01', 'Just', 'O', 'Single', '2020-09-011598955444.png', 1, 0, 0, NULL, '2020-09-01 10:17:24', '2020-09-01 10:24:50', '2020-09-01 10:24:50'),
(6, 'Mr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, '2021-02-06 04:47:12', '2021-06-10 18:30:57', '2021-06-10 18:30:57'),
(7, 'Mr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 0, NULL, '2021-02-06 04:49:59', '2021-06-10 18:30:53', '2021-06-10 18:30:53'),
(8, 'Mr', 'Vaishnavi', '5247', '9854722325', 'v@gmail.com', '2021-06-10', 'Kannan', 'AB+ve', 'Single', '', 1, 0, 0, NULL, '2021-06-10 18:29:44', '2021-06-10 18:30:34', '2021-06-10 18:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `agent_area_mappings`
--

CREATE TABLE `agent_area_mappings` (
  `id` bigint UNSIGNED NOT NULL,
  `agent_id` int DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_area_mapping_details`
--

CREATE TABLE `agent_area_mapping_details` (
  `id` bigint UNSIGNED NOT NULL,
  `area_id` int DEFAULT NULL,
  `agent_area_mapping_id` int DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `code`, `name`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00145', 'Gandhi Nagar', 'near', 1, 0, 0, '2021-06-11 09:38:33', '2021-06-11 09:38:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bankbranches`
--

CREATE TABLE `bankbranches` (
  `id` bigint UNSIGNED NOT NULL,
  `bank_id` bigint UNSIGNED DEFAULT NULL,
  `branch` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bankbranches`
--

INSERT INTO `bankbranches` (`id`, `bank_id`, `branch`, `ifsc`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 'marutha road', '122', 1, 0, 0, '2020-06-23 10:55:42', '2020-06-23 10:55:42', NULL),
(5, 2, 'Test', '4125632', 1, 0, 0, '2020-12-02 13:03:57', '2020-12-02 13:03:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `code`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SBI', '123', 1, 0, 0, '2020-04-05 12:52:26', '2020-04-05 12:52:26', NULL),
(2, 'ICICI', '14523', 1, 0, 0, '2020-12-02 13:01:52', '2020-12-02 13:01:52', NULL),
(3, 'Sb', '256', 1, 0, 0, '2021-06-09 17:09:35', '2021-06-09 17:14:23', '2021-06-09 17:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint UNSIGNED NOT NULL,
  `ref_table` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier',
  `bank_id` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `account_type_id` bigint UNSIGNED DEFAULT NULL,
  `bank_ref_id` bigint UNSIGNED DEFAULT NULL,
  `ifsc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `ref_table`, `bank_id`, `branch_id`, `account_type_id`, `bank_ref_id`, `ifsc`, `account_holder_name`, `account_no`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cus', 1, 4, 2, 1, '122', '10', '555', 1, 0, 1, NULL, '2021-06-10 18:37:53', '2021-06-10 18:38:15', NULL),
(3, 'Supplier', 1, 4, 2, 2, '122', 'ajay', '447', 1, 0, 0, NULL, '2021-06-11 09:30:46', '2021-06-11 09:30:46', NULL),
(4, 'Cus', 1, 4, 2, 2, '122', 'manoj', '11254', 1, 0, 1, NULL, '2021-06-11 16:12:38', '2021-06-11 16:13:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `boms`
--

CREATE TABLE `boms` (
  `id` bigint NOT NULL,
  `product_item_id` bigint DEFAULT NULL,
  `account_group` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `boms`
--

INSERT INTO `boms` (`id`, `product_item_id`, `account_group`, `date`, `created_at`, `updated_at`) VALUES
(14, 1, '3', '2021-06-19', '2021-06-19 18:59:26', '2021-06-19 18:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `bom_items`
--

CREATE TABLE `bom_items` (
  `id` bigint NOT NULL,
  `bom_id` bigint DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `min_qty` int DEFAULT NULL,
  `max_qty` int DEFAULT NULL,
  `uom_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bom_items`
--

INSERT INTO `bom_items` (`id`, `bom_id`, `item_id`, `qty`, `min_qty`, `max_qty`, `uom_id`, `created_at`, `updated_at`) VALUES
(35, 14, 1, 10, 4, 6, 1, '2021-06-19 19:01:36', '2021-06-19 19:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `code`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Boat', '123', NULL, 1, 0, 0, '2021-06-10 17:34:01', '2021-06-10 17:34:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `supplier_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL COMMENT '1=>Invoice,0=>Delivary Note ',
  `supplier_invoice_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_delivery_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxable_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_invoice_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_bill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_live` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_bill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_live` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>Added to Gate Pass Entry, 0=>Not Added To Gate Pass Entry',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `date`, `supplier_name`, `type`, `supplier_invoice_number`, `supplier_delivery_number`, `taxable_value`, `tax_value`, `total_invoice_value`, `load_bill`, `load_live`, `unload_bill`, `unload_live`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020-04-10', '1', 1, '4542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2020-04-10 04:07:47', '2020-04-15 03:32:47'),
(2, '2020-04-10', '1', 0, NULL, '25', '854', '2154', '9654', '7452', '1589', NULL, NULL, '1', '2020-04-10 04:08:36', '2020-04-10 04:09:11'),
(3, '2020-04-10', '1', 1, '78', NULL, '52.89', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2020-04-10 05:00:01', '2020-04-10 05:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '0' COMMENT '0=>Parent',
  `parent_id` int DEFAULT NULL,
  `hsn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `level`, `parent_id`, `hsn`, `gst_no`, `remark`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Category A', 0, 0, NULL, NULL, NULL, 1, 0, 0, NULL, '2020-06-22 09:25:28', '2020-07-14 06:19:54', NULL),
(17, 'Category B', 0, 0, NULL, NULL, NULL, 1, 0, 0, NULL, '2020-06-22 09:26:10', '2020-06-22 09:26:10', NULL),
(18, 'sub category A', 0, 16, NULL, NULL, NULL, 1, 0, 0, NULL, '2020-06-22 09:26:42', '2020-06-22 09:26:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_names`
--

CREATE TABLE `category_names` (
  `id` bigint UNSIGNED NOT NULL,
  `category_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_names`
--

INSERT INTO `category_names` (`id`, `category_1`, `category_2`, `category_3`, `remark`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Category 1', 'Category 2', 'Category 3', NULL, 1, NULL, NULL, NULL, '2020-03-30 06:05:30', '2020-03-30 06:05:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_ones`
--

CREATE TABLE `category_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_threes`
--

CREATE TABLE `category_threes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_one_id` int DEFAULT NULL,
  `category_two_id` int DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_twos`
--

CREATE TABLE `category_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_one_id` int DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `state_id`, `district_id`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Palakkad', 1, 3, 2, NULL, 1, 0, 0, '2020-05-13 03:53:58', '2020-05-13 03:53:58', NULL),
(2, 'Gandhipuram', 1, 1, 1, 'Test', 1, 0, 0, '2021-06-09 15:11:20', '2021-06-09 15:12:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_banks`
--

CREATE TABLE `company_banks` (
  `id` bigint NOT NULL,
  `bank_id` bigint NOT NULL,
  `bank_branch_id` bigint NOT NULL,
  `account_type_id` bigint NOT NULL,
  `holder_name` text NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_banks`
--

INSERT INTO `company_banks` (`id`, `bank_id`, `bank_branch_id`, `account_type_id`, `holder_name`, `account_no`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 1, 'test', '2255', '2021-01-08 13:45:45', '2021-01-08 13:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_notes`
--

INSERT INTO `credit_notes` (`id`, `voucher_no`, `cn_no`, `cn_date`, `s_no`, `s_date`, `r_in_no`, `r_in_date`, `customer_id`, `location`, `overall_discount`, `round_off`, `total_net_value`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(1, '0001', 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 2, 3, '0.00', '0', '295.00', 0, 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_betas`
--

CREATE TABLE `credit_note_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_beta_expenses`
--

CREATE TABLE `credit_note_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cn_date` date NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_beta_items`
--

CREATE TABLE `credit_note_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_purchase_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_beta_taxes`
--

CREATE TABLE `credit_note_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_expenses`
--

CREATE TABLE `credit_note_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cn_date` date NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_note_expenses`
--

INSERT INTO `credit_note_expenses` (`id`, `cn_no`, `cn_date`, `s_no`, `s_date`, `r_in_no`, `r_in_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(1, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 5, '200.00', 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_items`
--

CREATE TABLE `credit_note_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_purchase_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_note_items`
--

INSERT INTO `credit_note_items` (`id`, `cn_no`, `cn_date`, `s_no`, `s_date`, `r_in_no`, `r_in_date`, `item_sno`, `item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `actual_purchase_qty`, `qty`, `rejected_qty`, `remaining_qty`, `credited_qty`, `remaining_after_credit`, `uom_id`, `discount`, `overall_disc`, `expenses`, `b_or_w`, `active`, `created_at`, `updated_at`) VALUES
(1, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', '1', 1, 150.00, 5.00, '90.48', '95.00', 1, 1, 1, 0, 1, NULL, 1, '0.00', '0.00', '200.00', NULL, 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_taxes`
--

CREATE TABLE `credit_note_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `cn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cn_date` date DEFAULT NULL,
  `s_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `r_in_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_note_taxes`
--

INSERT INTO `credit_note_taxes` (`id`, `cn_no`, `cn_date`, `s_no`, `s_date`, `r_in_no`, `r_in_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(1, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 1, '5.00', 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36'),
(2, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 2, '5.00', 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36'),
(3, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 3, '5.00', 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36'),
(4, 'CN0001NO', '2021-06-11', NULL, NULL, 'RIN0001NO', '2021-06-11', 4, '0.00', 1, '2021-06-11 17:15:36', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint NOT NULL,
  `amount` int DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `amount`, `remark`, `created_at`, `updated_at`) VALUES
(1, 500, 'Five Hundred', '2021-04-09 11:36:25', '2021-04-09 12:14:09'),
(3, 100, 'Hundred', '2021-04-09 12:19:47', '2021-04-09 12:19:47'),
(5, 20, 'Twenty', '2021-06-04 05:00:50', '2021-06-04 05:00:50'),
(6, 2000, 'Two Thousand', '2021-06-04 05:01:07', '2021-06-04 05:01:07'),
(7, 50, 'Fifty', '2021-06-11 14:29:13', '2021-06-11 14:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `salutation` enum('Mr','Mrs') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `customer_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>New,1=>Exist ',
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_credit_limit` int DEFAULT NULL,
  `max_credit_days` int DEFAULT NULL,
  `opening_balance` int DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_level` int DEFAULT NULL,
  `salesman` bigint DEFAULT NULL,
  `customer_mode` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Active,1=>DeActive ',
  `block` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Active,1=>blocked ',
  `blocked_reason` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blocked_by` int DEFAULT NULL,
  `blocked_on` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `salutation`, `company_name`, `customer_id`, `customer_type`, `name`, `code`, `phone_no`, `whatsapp_no`, `email`, `pan_card`, `gst_no`, `max_credit_limit`, `max_credit_days`, `opening_balance`, `remark`, `price_level`, `salesman`, `customer_mode`, `status`, `block`, `blocked_reason`, `blocked_by`, `blocked_on`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mr', 'Hashtag', 5, 1, 'Manoj', NULL, '9658745215', '8458874126', 'ak@gmail.com', '88452', '46', 1000, 10, 3000, NULL, 1, 4, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, NULL, '2021-06-11 16:12:38', '2021-06-11 16:13:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_suppliers`
--

CREATE TABLE `customer_suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_supplier_id` int DEFAULT NULL,
  `type` enum('Customer','Supplier') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_suppliers`
--

INSERT INTO `customer_suppliers` (`id`, `name`, `customer_supplier_id`, `type`, `remark`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vaishnavi', NULL, 'Customer', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:37:53', '2021-06-10 18:37:53', NULL),
(2, 'Rishi', NULL, 'Supplier', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:46:05', '2021-06-10 18:46:05', NULL),
(3, 'Rishikesh', NULL, 'Supplier', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:51:03', '2021-06-10 18:51:03', NULL),
(4, 'Ajay', NULL, 'Supplier', NULL, 1, NULL, NULL, NULL, '2021-06-11 09:30:46', '2021-06-11 09:30:46', NULL),
(5, 'Manoj', NULL, 'Customer', NULL, 1, NULL, NULL, NULL, '2021-06-11 16:12:38', '2021-06-11 16:12:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

CREATE TABLE `debit_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint UNSIGNED DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Note Cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_betas`
--

CREATE TABLE `debit_note_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint UNSIGNED DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Note Cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_beta_expenses`
--

CREATE TABLE `debit_note_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dn_date` date NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_beta_items`
--

CREATE TABLE `debit_note_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_purchase_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_beta_taxes`
--

CREATE TABLE `debit_note_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_expenses`
--

CREATE TABLE `debit_note_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dn_date` date NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_items`
--

CREATE TABLE `debit_note_items` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_purchase_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_taxes`
--

CREATE TABLE `debit_note_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `dn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dn_date` date DEFAULT NULL,
  `p_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `r_out_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_notes`
--

CREATE TABLE `delivery_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `delivery_tag` tinyint(1) DEFAULT '0' COMMENT '1 => Selected In Sales Entry Table, 0 => Not selected In Sale Entry Table',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_notes`
--

INSERT INTO `delivery_notes` (`id`, `voucher_no`, `d_no`, `d_date`, `sale_estimation_no`, `sale_estimation_date`, `so_no`, `so_date`, `r_in_no`, `r_in_date`, `customer_id`, `salesman_id`, `location`, `delivery_tag`, `overall_discount`, `round_off`, `total_net_value`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(2, '0001', 'DNOTE0001NO', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 0, '0.00', '0', '115.00', 0, 1, '2021-06-11 16:38:32', '2021-06-11 16:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_betas`
--

CREATE TABLE `delivery_note_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `delivery_tag` tinyint(1) DEFAULT '0' COMMENT '1 => Selected In Sales Entry Table, 0 => Not selected In Sale Entry Table',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_beta_expenses`
--

CREATE TABLE `delivery_note_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_date` date NOT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_beta_items`
--

CREATE TABLE `delivery_note_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_beta_taxes`
--

CREATE TABLE `delivery_note_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_expenses`
--

CREATE TABLE `delivery_note_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_date` date NOT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_note_expenses`
--

INSERT INTO `delivery_note_expenses` (`id`, `d_no`, `d_date`, `sale_estimation_no`, `sale_estimation_date`, `so_no`, `so_date`, `r_in_no`, `r_in_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(2, 'DNOTE0001NO', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, 5, '20.00', 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_items`
--

CREATE TABLE `delivery_note_items` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `so_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_note_items`
--

INSERT INTO `delivery_note_items` (`id`, `d_no`, `d_date`, `sale_estimation_no`, `sale_estimation_date`, `so_no`, `so_date`, `r_in_no`, `r_in_date`, `item_sno`, `item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `qty`, `rejected_qty`, `remaining_qty`, `credited_qty`, `actual_rejected_qty`, `remarks`, `uom_id`, `discount`, `overall_disc`, `expenses`, `b_or_w`, `active`, `created_at`, `updated_at`) VALUES
(2, 'DNOTE0001NO', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 150.00, 5.00, '90.48', '95.00', 1, 0, 1, 0, NULL, NULL, 1, '0.00', '0.00', '20.00', NULL, 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note_taxes`
--

CREATE TABLE `delivery_note_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_note_taxes`
--

INSERT INTO `delivery_note_taxes` (`id`, `d_no`, `d_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(5, 'DNOTE0001NO', '2021-06-11', 1, '5.00', 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32'),
(6, 'DNOTE0001NO', '2021-06-11', 2, '2.50', 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32'),
(7, 'DNOTE0001NO', '2021-06-11', 3, '2.50', 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32'),
(8, 'DNOTE0001NO', '2021-06-11', 4, '0.00', 1, '2021-06-11 16:38:32', '2021-06-11 16:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `denominations`
--

CREATE TABLE `denominations` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `denominations`
--

INSERT INTO `denominations` (`id`, `amount`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2000', 'Two Thousand', 1, 0, 0, '2021-06-09 17:17:15', '2021-06-09 17:17:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `short_name`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sales Department', 'SD', NULL, 1, 0, 0, '2021-06-10 12:25:12', '2021-06-10 12:25:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_types`
--

CREATE TABLE `discount_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country_id`, `state_id`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Coimbatore', 1, 1, 'cbe', 1, 0, 0, '2021-06-09 14:16:04', '2021-06-09 14:16:04', NULL),
(2, 'Palakkad', 1, 3, 'pkd', 1, 0, 0, '2021-06-09 14:16:29', '2021-06-09 14:19:01', NULL),
(3, 'Thrissur', 1, 3, NULL, 1, 0, 0, '2021-06-09 14:17:38', '2021-06-09 14:17:48', '2021-06-09 14:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `salutation` enum('Mr','Mrs') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `father_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_status` enum('Married','Single','Divorced') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` bigint UNSIGNED DEFAULT NULL,
  `profile` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `salutation`, `name`, `code`, `phone_no`, `email`, `dob`, `department_id`, `father_name`, `blood_group`, `material_status`, `access_no`, `address_type`, `profile`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr', 'Ajay', '6235', '8632541203', 'aj@gmail.com', '2021-06-10', 2, NULL, NULL, NULL, NULL, NULL, '', 1, 0, 0, '2021-06-10 12:19:29', '2021-06-10 12:25:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estimations`
--

CREATE TABLE `estimations` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `agent_id` bigint UNSIGNED DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '1 =>Canceled, 0 =>Not Canceled',
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimations`
--

INSERT INTO `estimations` (`id`, `voucher_no`, `estimation_no`, `estimation_date`, `supplier_id`, `agent_id`, `overall_discount`, `round_off`, `total_net_value`, `status`, `active`, `created_at`, `updated_at`) VALUES
(5, '4', 'EST4NO', '2021-06-11', 2, 1, '0.00', '0', '250.00', 0, 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(6, '5', 'EST5NO', '2021-06-11', 2, 1, '0.00', '-0.01', '155.01', 0, 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `estimation_conditions`
--

CREATE TABLE `estimation_conditions` (
  `id` bigint NOT NULL,
  `estimation_no` varchar(255) DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `applied_term_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimation_taxes`
--

CREATE TABLE `estimation_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimation_taxes`
--

INSERT INTO `estimation_taxes` (`id`, `estimation_no`, `estimation_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(17, 'EST4NO', '2021-06-11', 1, '0.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(18, 'EST4NO', '2021-06-11', 2, '0.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(19, 'EST4NO', '2021-06-11', 3, '0.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(20, 'EST4NO', '2021-06-11', 4, '0.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(21, 'EST5NO', '2021-06-11', 1, '0.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34'),
(22, 'EST5NO', '2021-06-11', 2, '0.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34'),
(23, 'EST5NO', '2021-06-11', 3, '0.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34'),
(24, 'EST5NO', '2021-06-11', 4, '0.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `estimation__expenses`
--

CREATE TABLE `estimation__expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date NOT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimation__expenses`
--

INSERT INTO `estimation__expenses` (`id`, `estimation_no`, `estimation_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(5, 'EST4NO', '2021-06-11', 5, '100.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(6, 'EST5NO', '2021-06-11', 5, '10.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `estimation__items`
--

CREATE TABLE `estimation__items` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) NOT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimation__items`
--

INSERT INTO `estimation__items` (`id`, `estimation_no`, `estimation_date`, `item_sno`, `item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `qty`, `uom_id`, `discount`, `overall_disc`, `expenses`, `active`, `created_at`, `updated_at`) VALUES
(5, 'EST4NO', '2021-06-11', NULL, 1, 150.00, 5.00, '142.86', '150.00', 1, 1, '0.00', '0.00', '100.00', 1, '2021-06-11 15:18:57', '2021-06-11 15:18:57'),
(6, 'EST5NO', '2021-06-11', NULL, 1, 150.00, 5.00, '138.10', '145.00', 1, 1, '0.00', '0.00', '10.00', 1, '2021-06-11 15:23:34', '2021-06-11 15:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int NOT NULL,
  `location_id` int NOT NULL,
  `entry_date` date NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `debit_account_head` int NOT NULL,
  `debit_amount` decimal(30,2) NOT NULL,
  `credit_account_head` int NOT NULL,
  `credit_amount` decimal(30,2) NOT NULL,
  `debit_total_amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `credit_total_amount` decimal(20,2) NOT NULL DEFAULT '0.00',
  `remarks` text NOT NULL,
  `credit_remarks` varchar(255) NOT NULL,
  `debit_remarks` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int NOT NULL DEFAULT '0',
  `deleted_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `location_id`, `entry_date`, `voucher_no`, `debit_account_head`, `debit_amount`, `credit_account_head`, `credit_amount`, `debit_total_amount`, `credit_total_amount`, `remarks`, `credit_remarks`, `debit_remarks`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted_by`, `deleted_at`, `active_status`) VALUES
(1, 1, '2021-01-08', '123', 0, '0.00', 3, '100.00', '0.00', '0.00', 'test', 'test 23', '0', 0, '2021-01-02 10:02:43', '2021-01-02 10:02:43', 0, NULL, NULL, 1),
(2, 1, '2021-01-08', '123', 1, '200.00', 0, '0.00', '0.00', '0.00', 'test', '0', 'ytest', 0, '2021-01-02 10:02:43', '2021-01-02 10:02:43', 0, NULL, NULL, 1),
(3, 1, '2021-01-08', '123', 3, '100.00', 0, '0.00', '0.00', '0.00', 'test', 'test 23', '0', 0, '2021-01-02 10:02:43', '2021-01-02 10:02:43', 0, NULL, NULL, 1),
(4, 1, '2021-01-05', '123', 0, '0.00', 3, '4000.00', '0.00', '0.00', 'test', '0', '0', 0, '2021-01-05 10:20:42', '2021-01-05 10:20:42', 0, NULL, NULL, 1),
(5, 1, '2021-01-05', '123', 0, '0.00', 4, '4000.00', '0.00', '0.00', 'test', '0', '0', 0, '2021-01-05 10:20:43', '2021-01-05 10:20:43', 0, NULL, NULL, 1),
(6, 1, '2021-01-05', '123', 0, '0.00', 5, '2000.00', '0.00', '0.00', 'test', '0', '0', 0, '2021-01-05 10:20:43', '2021-01-05 10:20:43', 0, NULL, NULL, 1),
(7, 1, '2021-01-05', '123', 1, '10000.00', 0, '0.00', '0.00', '0.00', 'test', '0', 'test', 0, '2021-01-05 10:20:43', '2021-01-05 10:20:43', 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Direct','Indirect') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `type`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hjkhkj', 'Direct', NULL, 1, 0, 0, '2020-05-14 03:31:40', '2020-05-14 03:31:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass_entries`
--

CREATE TABLE `gate_pass_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `gate_pass_no` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL COMMENT '1=>Invoice,0=>Delivary Note ',
  `supplier_invoice_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_delivery_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxable_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_invoice_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_bill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_live` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_bill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unload_live` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftvouchers`
--

CREATE TABLE `giftvouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `giftvouchers`
--

INSERT INTO `giftvouchers` (`id`, `name`, `code`, `value`, `qty`, `remark`, `valid_from`, `valid_to`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Voucher Name', '[\"NSP1201093PnuB10\"]', '20', 1, NULL, '2021-06-10', '2021-06-10', 1, 0, 0, '2021-06-10 15:12:47', '2021-06-10 15:26:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gst_types`
--

CREATE TABLE `gst_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_estimations`
--

CREATE TABLE `hold_estimations` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `agent_id` bigint UNSIGNED DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '1 =>Canceled, 0 =>Not Canceled',
  `active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_estimation_conditions`
--

CREATE TABLE `hold_estimation_conditions` (
  `id` bigint NOT NULL,
  `estimation_no` varchar(255) DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `applied_term_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_estimation_taxes`
--

CREATE TABLE `hold_estimation_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_estimation__expenses`
--

CREATE TABLE `hold_estimation__expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date NOT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_estimation__items`
--

CREATE TABLE `hold_estimation__items` (
  `id` bigint UNSIGNED NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) NOT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_pos`
--

CREATE TABLE `hold_pos` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `sale_type` tinyint(1) DEFAULT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `no_item` int DEFAULT NULL,
  `no_qty` int DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled\r\n',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_pos_items`
--

CREATE TABLE `hold_pos_items` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) DEFAULT NULL,
  `rate_inclusive_tax` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `tot_amt` decimal(10,2) DEFAULT NULL,
  `uom_id` bigint UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 => free item, 0 => not a free item',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_pos_payments`
--

CREATE TABLE `hold_pos_payments` (
  `id` int NOT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `cash_remark` varchar(50) DEFAULT NULL,
  `card` decimal(10,2) DEFAULT NULL,
  `card_remark` varchar(50) DEFAULT NULL,
  `cheque` varchar(50) DEFAULT NULL,
  `cheque_remark` varchar(50) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `voucher` decimal(10,2) DEFAULT NULL,
  `voucher_remark` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hold_pos_taxes`
--

CREATE TABLE `hold_pos_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ho_details`
--

CREATE TABLE `ho_details` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_number` bigint UNSIGNED DEFAULT NULL,
  `address_line_1` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_line_2` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `land_mark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `postal_code` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ho_details`
--

INSERT INTO `ho_details` (`id`, `name`, `gst_number`, `address_line_1`, `address_line_2`, `land_mark`, `country_id`, `state_id`, `district_id`, `city_id`, `postal_code`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pollachi', 5244, 'Address Line 1', 'Address Line 2', 'Near Something', 1, 1, 1, 2, '526', 1, 0, 0, '2021-06-09 16:06:20', '2021-06-09 16:07:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Direct','Indirect') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_types`
--

INSERT INTO `income_types` (`id`, `name`, `type`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Income', 'Indirect', NULL, 1, 0, 0, '2020-09-29 10:03:30', '2020-09-29 10:03:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` enum('Direct','Bulk','Repack','Parent','Child') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_in_grams` double(8,2) UNSIGNED DEFAULT NULL,
  `weight_in_kg` double(8,2) UNSIGNED DEFAULT NULL,
  `bulk_item_id` int DEFAULT NULL,
  `child_unit` int DEFAULT NULL,
  `child_item_id` int DEFAULT NULL,
  `uom_for_repack_item` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `category_1` int DEFAULT NULL,
  `category_2` int DEFAULT NULL,
  `category_3` int DEFAULT NULL,
  `print_name_in_english` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_name_in_language_1` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_name_in_language_2` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_name_in_language_3` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ptc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `default_selling_price` double(8,2) DEFAULT NULL,
  `uom_id` bigint UNSIGNED DEFAULT NULL,
  `opening_stock` int DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `applicable_date` date DEFAULT NULL,
  `is_minimum_sales_qty_applicable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Not Applicable,1=>Applicable',
  `minimum_sales_price` double(8,2) DEFAULT NULL,
  `minimum_sales_qty` double(8,2) DEFAULT NULL,
  `uom_for_minimum_sales_item` int DEFAULT NULL,
  `is_expiry_date` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Not Applicable,1=>Applicable',
  `is_machine_weight_applicable` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Not Applicable,1=>Applicable',
  `expiry_date` date DEFAULT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `opening_count` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `item_type`, `weight_in_grams`, `weight_in_kg`, `bulk_item_id`, `child_unit`, `child_item_id`, `uom_for_repack_item`, `category_id`, `brand_id`, `category_1`, `category_2`, `category_3`, `print_name_in_english`, `print_name_in_language_1`, `print_name_in_language_2`, `print_name_in_language_3`, `ptc`, `barcode`, `hsn`, `supplier_id`, `mrp`, `default_selling_price`, `uom_id`, `opening_stock`, `rate`, `amount`, `applicable_date`, `is_minimum_sales_qty_applicable`, `minimum_sales_price`, `minimum_sales_qty`, `uom_for_minimum_sales_item`, `is_expiry_date`, `is_machine_weight_applicable`, `expiry_date`, `image`, `remark`, `active_status`, `opening_count`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3 Roses Tea Powder', '125', 'Direct', 1000.00, 1.00, NULL, NULL, NULL, NULL, 16, 0, NULL, NULL, NULL, '3 Roses Tea Powder', 'sds', 'sdasd', 'asdasd', NULL, NULL, '4125', 2, 150.00, 125.00, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, NULL, NULL, '2021-06-10 17:59:56', '2021-06-10 18:00:43', NULL),
(2, 'Test', '1425', 'Direct', 1000.00, 1.00, NULL, NULL, NULL, NULL, 17, 0, NULL, NULL, NULL, 'Test', NULL, NULL, NULL, NULL, NULL, '452', 2, 100.00, 100.00, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(3, 'Vaishnavi', '752', 'Direct', 500.00, 0.50, NULL, NULL, NULL, NULL, 18, 0, NULL, NULL, NULL, 'Vaishnavi', NULL, NULL, NULL, NULL, NULL, '63', 2, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `itemwise_offers`
--

CREATE TABLE `itemwise_offers` (
  `id` int NOT NULL,
  `offer_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `offer_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `buy_item_id` int DEFAULT NULL,
  `buy_item_quantity` int DEFAULT NULL,
  `get_item_id` int DEFAULT NULL,
  `get_item_quantity` int DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itemwise_offers`
--

INSERT INTO `itemwise_offers` (`id`, `offer_name`, `offer_code`, `valid_from`, `valid_to`, `buy_item_id`, `buy_item_quantity`, `get_item_id`, `get_item_quantity`, `remark`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `active_status`) VALUES
(1, 'Onam Offers', '112', '2021-06-10', '2021-06-13', 31, 2, 29, 1, NULL, 0, '2021-06-10 16:09:07', 0, '2021-06-10 17:02:36', NULL, '2021-06-10 17:02:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_bracode_details`
--

CREATE TABLE `item_bracode_details` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int DEFAULT NULL,
  `barcode` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_bracode_details`
--

INSERT INTO `item_bracode_details` (`id`, `item_id`, `barcode`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '3rosescode', NULL, 1, 0, 0, '2021-06-10 17:59:56', '2021-06-10 18:00:43', NULL),
(2, 2, '12', NULL, 1, 0, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(3, 3, 'cideee', NULL, 1, 0, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `item_tax_details`
--

CREATE TABLE `item_tax_details` (
  `id` bigint UNSIGNED NOT NULL,
  `category_1` int DEFAULT NULL,
  `category_2` int DEFAULT NULL,
  `category_3` int DEFAULT NULL,
  `item_id` bigint UNSIGNED DEFAULT NULL,
  `tax_master_id` int DEFAULT NULL,
  `value` double(8,2) DEFAULT NULL,
  `igst` double(8,2) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_tax_details`
--

INSERT INTO `item_tax_details` (`id`, `category_1`, `category_2`, `category_3`, `item_id`, `tax_master_id`, `value`, `igst`, `valid_from`, `valid_to`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, 1, 1, 5.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 17:59:56', '2021-06-10 18:00:43', '2021-06-10 18:00:43'),
(2, NULL, NULL, NULL, 1, 2, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 17:59:56', '2021-06-10 18:00:43', '2021-06-10 18:00:43'),
(3, NULL, NULL, NULL, 1, 3, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 17:59:56', '2021-06-10 18:00:43', '2021-06-10 18:00:43'),
(4, NULL, NULL, NULL, 1, 4, 0.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 17:59:56', '2021-06-10 18:00:43', '2021-06-10 18:00:43'),
(5, NULL, NULL, NULL, 1, 1, 5.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:00:43', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(6, NULL, NULL, NULL, 1, 2, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:00:43', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(7, NULL, NULL, NULL, 1, 3, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:00:43', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(8, NULL, NULL, NULL, 1, 4, 0.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:00:43', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(9, NULL, NULL, NULL, 2, 1, 10.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(10, NULL, NULL, NULL, 2, 2, 5.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(11, NULL, NULL, NULL, 2, 3, 5.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(12, NULL, NULL, NULL, 2, 4, 0.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:05:37', '2021-06-10 18:24:13', '2021-06-10 18:24:13'),
(13, NULL, NULL, NULL, 3, 1, 4.00, NULL, '2021-06-11', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27'),
(14, NULL, NULL, NULL, 3, 2, 2.00, NULL, '2021-06-11', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27'),
(15, NULL, NULL, NULL, 3, 3, 2.00, NULL, '2021-06-11', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27'),
(16, NULL, NULL, NULL, 3, 4, 0.00, NULL, '2021-06-11', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:13:19', '2021-06-10 18:23:27', '2021-06-10 18:23:27'),
(17, NULL, NULL, NULL, 1, 1, 5.00, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:26:12', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(18, NULL, NULL, NULL, 1, 2, 2.50, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:26:12', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(19, NULL, NULL, NULL, 1, 3, 2.50, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:26:12', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(20, NULL, NULL, NULL, 1, 4, 10.00, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-10 18:26:12', '2021-06-11 18:44:30', '2021-06-11 18:44:30'),
(21, NULL, NULL, NULL, 1, 1, 5.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(22, NULL, NULL, NULL, 1, 2, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(23, NULL, NULL, NULL, 1, 3, 2.50, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(24, NULL, NULL, NULL, 1, 4, 0.00, NULL, '2021-06-10', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(25, NULL, NULL, NULL, 1, 1, 5.00, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(26, NULL, NULL, NULL, 1, 2, 2.50, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(27, NULL, NULL, NULL, 1, 3, 2.50, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL),
(28, NULL, NULL, NULL, 1, 4, 10.00, NULL, '2021-06-12', NULL, 1, NULL, NULL, NULL, '2021-06-11 18:44:30', '2021-06-11 18:44:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_wastages`
--

CREATE TABLE `item_wastages` (
  `id` int NOT NULL,
  `entry_date` date DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1',
  `uom_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_wastages`
--

INSERT INTO `item_wastages` (`id`, `entry_date`, `location_id`, `item_id`, `quantity`, `remark`, `created_by`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `active_status`, `uom_id`) VALUES
(1, '2021-06-10', 1, 31, NULL, 'test', 0, 0, '2021-06-10 17:31:52', NULL, '2021-06-10 17:31:52', 1, 1),
(2, '2021-06-11', 1, 22, 5, NULL, 0, 0, '2021-06-10 17:31:37', NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `language_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_1`, `language_2`, `language_3`, `remark`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tamil', 'Malayalam', 'Telugu', NULL, 1, 0, 0, NULL, '2020-03-30 06:05:30', '2021-06-10 17:35:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type_id` bigint UNSIGNED DEFAULT NULL,
  `address_line_1` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address_line_2` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `land_mark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `postal_code` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `location_type_id`, `address_line_1`, `address_line_2`, `land_mark`, `country_id`, `state_id`, `district_id`, `city_id`, `postal_code`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chennai', 1, 'address line 1', 'address line 2', 'new textile', 1, 1, 1, 2, '1478', 1, 0, 0, '2021-06-09 15:20:41', '2021-06-09 15:21:28', NULL),
(2, 'Pollachi', 1, 'address line 1', 'address line 2', 'new textile', 1, 1, 1, 2, '1254', 1, 0, 0, '2021-06-09 15:21:15', '2021-06-09 15:21:15', NULL),
(3, 'Cbe', 1, 'address line 1', 'address line 2', 'near something', 1, 1, 1, 2, '2355', 1, 0, 0, '2021-06-09 16:05:31', '2021-06-09 16:05:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_types`
--

CREATE TABLE `location_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_types`
--

INSERT INTO `location_types` (`id`, `name`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Godown', 'testing', 1, 0, 0, '2021-06-09 15:14:08', '2021-06-09 15:14:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mandatoryfields`
--

CREATE TABLE `mandatoryfields` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `validator` text NOT NULL COMMENT 'coloumn',
  `defaultfields` varchar(1) NOT NULL DEFAULT '0',
  `mandatory` varchar(1) NOT NULL DEFAULT '1',
  `check` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mandatoryfields`
--

INSERT INTO `mandatoryfields` (`id`, `name`, `validator`, `defaultfields`, `mandatory`, `check`, `created_at`) VALUES
(1, 'state', 'code', '0', '1', 'state_code', NULL),
(2, 'city', 'state', '0', '1', 'city_state_id', NULL),
(3, 'city', 'district', '0', '1', 'city_district_id', NULL),
(4, 'city', 'name', '0', '1', 'city_name', NULL),
(5, 'locationtype', 'name', '0', '1', 'locationtype_name', NULL),
(6, 'addresstype', 'name', '0', '1', 'addresstype_name', NULL),
(7, 'companylocation', 'addressline1', '0', '1', 'companylocation_addressline1', NULL),
(8, 'companylocation', 'stateid', '0', '1', 'companylocation_stateid', NULL),
(9, 'companylocation', 'districtid', '0', '1', 'companylocation_districtid', NULL),
(10, 'companylocation', 'postalcode', '0', '1', 'companylocation_postalcode', NULL),
(11, 'bank', 'code', '0', '1', 'bank_code', NULL),
(12, 'bankbranch', 'bankid', '0', '1', 'bankbranch_bankid', NULL),
(13, 'bankbranch', 'ifsc', '0', '1', 'bankbranch_ifsc', NULL),
(14, 'companybank', 'bankbranchid', '0', '1', 'companybank_bankbranchid', NULL),
(15, 'companybank', 'accountno', '0', '1', 'companybank_accountno', NULL),
(16, 'department', 'shortname', '0', '1', 'department_shortname', NULL),
(17, 'designation', 'remark', '0', '1', 'designation_remark', NULL),
(18, 'employee', 'code', '0', '1', 'employee_code', NULL),
(19, 'employee', 'phoneno', '0', '1', 'employee_phoneno', NULL),
(20, 'employee', 'accessno', '0', '1', 'employee_accessno', NULL),
(21, 'employee', 'proofname', '0', '1', 'employee_proofname', NULL),
(22, 'employee', 'proofnumber', '0', '1', 'employee_proofnumber', NULL),
(23, 'employee', 'file', '0', '1', 'employee_file', NULL),
(24, 'giftvoucher', 'quantity', '0', '1', 'giftvoucher_quantity', NULL),
(25, 'giftvoucher', 'validfrom', '0', '1', 'giftvoucher_validfrom', NULL),
(26, 'giftvoucher', 'validto', '0', '1', 'giftvoucher_validto', NULL),
(27, 'offer', 'items', '0', '1', 'offer_items', NULL),
(28, 'offer', 'variable', '0', '1', 'offer_variable', NULL),
(29, 'offer', 'fromtime', '0', '1', 'offer_fromtime', NULL),
(30, 'offer', 'comments', '0', '1', 'offer_comments', NULL),
(31, 'itemwiseoffer', 'code', '0', '1', 'itemwiseoffer_code', NULL),
(32, 'itemwiseoffer', 'buyitemid', '0', '1', 'itemwiseoffer_buyitemid', NULL),
(33, 'itemwiseoffer', 'buyitemquantity', '0', '1', 'itemwiseoffer_buyitemquantity', NULL),
(34, 'itemwiseoffer', 'getitemid', '0', '1', 'itemwiseoffer_getitemid', NULL),
(35, 'itemwiseoffer', 'getitemquantity', '0', '1', 'itemwiseoffer_getitemquantity', NULL),
(36, 'itemwastage', 'entrydate', '0', '1', 'itemwastage_entrydate', NULL),
(37, 'itemwastage', 'itemid', '0', '1', 'itemwastage_itemid', NULL),
(38, 'itemwastage', 'quantity', '0', '1', 'itemwastage_quantity', NULL),
(39, 'itemwastage', 'uomid', '0', '1', 'itemwastage_uomid', NULL),
(40, 'category', 'hsn', '0', '1', 'category_hsn', NULL),
(41, 'category', 'remark', '0', '1', 'category_remark', NULL),
(42, 'language', 'language1', '0', '1', 'language_language1', NULL),
(43, 'language', 'language3', '0', '1', 'language_language3', NULL),
(44, 'uom', 'description', '0', '1', 'uom_description', NULL),
(45, 'uom', 'remark', '0', '1', 'uom_remark', NULL),
(46, 'item', 'brandid', '0', '1', 'item_brandid', NULL),
(47, 'item', 'categoryid', '0', '1', 'item_categoryid', NULL),
(48, 'item', 'itemtype', '0', '1', 'item_itemtype', NULL),
(49, 'item', 'weightingrams', '0', '1', 'item_weightingrams', NULL),
(50, 'item', 'printnameinenglish', '0', '1', 'item_printnameinenglish', NULL),
(51, 'item', 'printnameinlanguage1', '0', '1', 'item_printnameinlanguage1', NULL),
(52, 'item', 'printnameinlanguage2', '0', '1', 'item_printnameinlanguage2', NULL),
(53, 'item', 'printnameinlanguage3', '0', '1', 'item_printnameinlanguage3', NULL),
(54, 'item', 'hsn', '0', '1', 'item_hsn', NULL),
(55, 'item', 'mrp', '0', '1', 'item_mrp', NULL),
(56, 'item', 'defaultsellingprice', '0', '1', 'item_defaultsellingprice', NULL),
(57, 'item', 'uomid', '0', '1', 'item_uomid', NULL),
(58, 'item', 'supplierid', '0', '1', 'item_supplierid', NULL),
(59, 'area', 'code', '0', '1', 'area_code', NULL),
(60, 'area', 'remark', '0', '1', 'area_remark', NULL),
(61, 'accountgroup', 'under', '0', '1', 'accountgroup_under', NULL),
(62, 'accounthead', 'under', '0', '1', 'accounthead_under', NULL),
(63, 'accounthead', 'balance', '0', '1', 'accounthead_balance', NULL),
(64, 'accountgrouptax', 'taxname', '0', '1', 'accountgrouptax_taxname', NULL),
(65, 'accountgrouptax', 'type', '0', '1', 'accountgrouptax_type', NULL),
(66, 'bom', 'itemcode', '0', '1', 'bom_itemcode', NULL),
(67, 'bom', 'quantity', '0', '1', 'bom_quantity', NULL),
(68, 'purchasevoucher', 'prefix', '0', '1', 'purchasevoucher_prefix', NULL),
(69, 'purchasevoucher', 'suffix', '0', '1', 'purchasevoucher_suffix', NULL),
(70, 'purchasevoucher', 'starting', '0', '1', 'purchasevoucher_starting', NULL),
(71, 'purchasevoucher', 'digits', '0', '1', 'purchasevoucher_digits', NULL),
(72, 'salesvoucher', 'prefix', '0', '1', 'salesvoucher_prefix', NULL),
(73, 'salesvoucher', 'suffix', '0', '1', 'salesvoucher_suffix', NULL),
(74, 'salesvoucher', 'starting', '0', '1', 'salesvoucher_starting', NULL),
(75, 'salesvoucher', 'digits', '0', '1', 'salesvoucher_digits', NULL),
(76, 'paymentvoucher', 'prefix', '0', '1', 'paymentvoucher_prefix', NULL),
(77, 'paymentvoucher', 'suffix', '0', '1', 'paymentvoucher_suffix', NULL),
(78, 'paymentvoucher', 'starting', '0', '1', 'paymentvoucher_starting', NULL),
(79, 'paymentvoucher', 'digits', '0', '1', 'paymentvoucher_digits', NULL),
(80, 'receiptvoucher', 'starting', '0', '1', 'receiptvoucher_starting', NULL),
(81, 'receiptvoucher', 'digits', '0', '1', 'receiptvoucher_digits', NULL),
(82, 'estimation', 'voucherdate', '0', '1', 'estimation_voucherdate', NULL),
(83, 'estimation', 'supplierid', '0', '1', 'estimation_supplierid', NULL),
(84, 'estimation', 'agentid', '0', '1', 'estimation_agentid', NULL),
(85, 'estimation', 'overall', '0', '1', 'estimation_overall_discount', NULL),
(86, 'purchaseorder', 'vouchertype', '0', '1', 'purchaseorder_vouchertype', NULL),
(87, 'purchaseorder', 'voucherdate', '0', '1', 'purchaseorder_voucherdate', NULL),
(88, 'purchaseorder', 'supplierid', '0', '1', 'purchaseorder_supplierid', NULL),
(89, 'purchaseorder', 'overall', '0', '1', 'purchaseorder_overall_discount', NULL),
(90, 'receiptnote', 'voucherdate', '0', '1', 'receiptnote_voucherdate', NULL),
(91, 'receiptnote', 'overall', '0', '1', 'receiptnote_overall_discount', NULL),
(92, 'purchaseentry', 'voucherdate', '0', '1', 'purchaseentry_voucherdate', NULL),
(93, 'purchaseentry', 'overall', '0', '1', 'purchaseentry_overall_discount', NULL),
(94, 'rejectionout', 'voucherdate', '0', '1', 'rejectionout_voucherdate', NULL),
(95, 'rejectionout', 'supplierid', '0', '1', 'rejectionout_supplierid', NULL),
(96, 'rejectionout', 'overall', '0', '1', 'rejectionout_overall_discount', NULL),
(97, 'debitnote', 'voucherdate', '0', '1', 'debitnote_voucherdate', NULL),
(98, 'debitnote', 'supplierid', '0', '1', 'debitnote_supplierid', NULL),
(99, 'debitnote', 'overall', '0', '1', 'debitnote_overall_discount', NULL),
(100, 'salesestimation', 'voucherdate', '0', '1', 'salesestimation_voucherdate', NULL),
(101, 'salesestimation', 'customerid', '0', '1', 'salesestimation_customerid', NULL),
(102, 'salesestimation', 'salesmenid', '0', '1', 'salesestimation_salesmenid', NULL),
(103, 'salesestimation', 'agentid', '0', '1', 'salesestimation_agentid', NULL),
(104, 'salesestimation', 'overall', '0', '1', 'salesestimation_overall_discount', NULL),
(105, 'saleorder', 'voucherdate', '0', '1', 'saleorder_voucherdate', NULL),
(106, 'saleorder', 'customerid', '0', '1', 'saleorder_customerid', NULL),
(107, 'saleorder', 'salesmenid', '0', '1', 'saleorder_salesmenid', NULL),
(108, 'saleorder', 'overall', '0', '1', 'saleorder_overall_discount', NULL),
(109, 'deliverynote', 'voucherdate', '0', '1', 'deliverynote_voucherdate', NULL),
(110, 'deliverynote', 'customerid', '0', '1', 'deliverynote_customerid', NULL),
(111, 'deliverynote', 'salesmenid', '0', '1', 'deliverynote_salesmenid', NULL),
(112, 'deliverynote', 'overall', '0', '1', 'deliverynote_overall_discount', NULL),
(113, 'saleentry', 'voucherdate', '0', '1', 'saleentry_voucherdate', NULL),
(114, 'saleentry', 'salesmenid', '0', '1', 'saleentry_salesmenid', NULL),
(115, 'saleentry', 'overall', '0', '1', 'saleentry_overall_discount', NULL),
(116, 'rejectionin', 'voucherdate', '0', '1', 'rejectionin_voucherdate', NULL),
(117, 'rejectionin', 'customerid', '0', '1', 'rejectionin_customerid', NULL),
(118, 'rejectionin', 'salesmenid', '0', '1', 'rejectionin_salesmenid', NULL),
(119, 'rejectionin', 'overall', '0', '1', 'rejectionin_overall_discount', NULL),
(120, 'creditnote', 'voucherdate', '0', '1', 'creditnote_voucherdate', NULL),
(121, 'creditnote', 'customerid', '0', '1', 'creditnote_customerid', NULL),
(122, 'creditnote', 'salesmanid', '0', '1', 'creditnote_salesmanid', NULL),
(123, 'creditnote', 'overall', '0', '1', 'creditnote_overall_discount', NULL),
(124, 'paymentrequest', 'requestdate', '0', '1', 'paymentrequest_requestdate', NULL),
(125, 'paymentrequest', 'supplierid', '0', '1', 'paymentrequest_supplierid', NULL),
(126, 'paymentrequest', 'ledger', '0', '1', 'paymentrequest_ledger', NULL),
(127, 'paymentprocess', 'voucherdate', '0', '1', 'paymentprocess_voucherdate', NULL),
(128, 'paymentprocess', 'supplierid', '0', '1', 'paymentprocess_supplierid', NULL),
(129, 'paymentprocess', 'purchaseentryno', '0', '1', 'paymentprocess_purchaseentryno', NULL),
(130, 'paymentprocess', 'nature', '0', '1', 'paymentprocess_nature', NULL),
(131, 'paymentprocess', 'mode', '0', '1', 'paymentprocess_mode', NULL),
(132, 'receiptrequest', 'requestdate', '0', '1', 'receiptrequest_requestdate', NULL),
(133, 'receiptrequest', 'supplierid', '0', '1', 'receiptrequest_supplierid', NULL),
(134, 'receiptrequest', 'ledger', '0', '1', 'receiptrequest_ledger', NULL),
(135, 'receiptprocess', 'voucherdate', '0', '1', 'receiptprocess_voucherdate', NULL),
(136, 'receiptprocess', 'supplierid', '0', '1', 'receiptprocess_supplierid', NULL),
(137, 'receiptprocess', 'saleentryno', '0', '1', 'receiptprocess_saleentryno', NULL),
(138, 'receiptprocess', 'nature', '0', '1', 'receiptprocess_nature', NULL),
(139, 'receiptprocess', 'mode', '0', '1', 'receiptprocess_mode', NULL),
(140, 'advancetosupplier', 'voucher', '0', '1', 'advancetosupplier_voucher_no', NULL),
(141, 'advancetosupplier', 'date', '0', '1', 'advancetosupplier_date', NULL),
(142, 'advancetosupplier', 'advance', '0', '1', 'advancetosupplier_advance_amount', NULL),
(143, 'advancetosupplier', 'remark', '0', '1', 'advancetosupplier_remark', NULL),
(144, 'advancefromcustomer', 'voucher', '0', '1', 'advancefromcustomer_voucher_no', NULL),
(145, 'advancefromcustomer', 'date', '0', '1', 'advancefromcustomer_date', NULL),
(146, 'advancefromcustomer', 'advanceamount', '0', '1', 'advancefromcustomer_advanceamount', NULL),
(147, 'accountexpense', 'date', '0', '1', 'accountexpense_date', NULL),
(148, 'accountexpense', 'voucher', '0', '1', 'accountexpense_voucher_no', NULL),
(149, 'accountexpense', 'remark', '0', '1', 'accountexpense_remark', NULL),
(150, 'accountexpense', 'debit', '0', '1', 'accountexpense_debit_expense_type', NULL),
(151, 'accountexpense', 'debit', '0', '1', 'accountexpense_debit_expense_amount', NULL),
(152, 'accountexpense', 'debit', '0', '1', 'accountexpense_debit_remark', NULL),
(153, 'accountexpense', 'expense', '0', '1', 'accountexpense_expense_type_credit', NULL),
(154, 'accountexpense', 'expense', '0', '1', 'accountexpense_expense_amoun_credit', NULL),
(155, 'accountexpense', 'remark', '0', '1', 'accountexpense_remark_debit_credit', NULL),
(156, 'productionmodule', 'uom', '0', '1', 'productionmodule_uom_id', NULL),
(157, 'receivedsalecleared', 'cleareddate', '0', '1', 'receivedsalecleared_cleareddate', NULL),
(158, 'receivedsalecleared', 'remarks', '0', '1', 'receivedsalecleared_remarks', NULL),
(159, 'receivedsalereturned', 'cleareddate', '0', '1', 'receivedsalereturned_cleareddate', NULL),
(160, 'receivedsalereturned', 'charges', '0', '1', 'receivedsalereturned_charges', NULL),
(161, 'receivedsalereturned', 'remarks', '0', '1', 'receivedsalereturned_remarks', NULL),
(162, 'receivedposcleared', 'cleareddate', '0', '1', 'receivedposcleared_cleareddate', NULL),
(163, 'receivedposcleared', 'remarks', '0', '1', 'receivedposcleared_remarks', NULL),
(164, 'receivedposreturned', 'cleareddate', '0', '1', 'receivedposreturned_cleareddate', NULL),
(165, 'receivedposreturned', 'charges', '0', '1', 'receivedposreturned_charges', NULL),
(166, 'receivedposreturned', 'remarks', '0', '1', 'receivedposreturned_remarks', NULL),
(167, 'paidcleared', 'companybankid', '0', '1', 'paidcleared_companybankid', NULL),
(168, 'paidcleared', 'cleareddate', '0', '1', 'paidcleared_cleareddate', NULL),
(169, 'paidcleared', 'remarks', '0', '1', 'paidcleared_remarks', NULL),
(170, 'paidreturned', 'companybankid', '0', '1', 'paidreturned_companybankid', NULL),
(171, 'paidreturned', 'cleareddate', '0', '1', 'paidreturned_cleareddate', NULL),
(172, 'paidreturned', 'charges', '0', '1', 'paidreturned_charges', NULL),
(173, 'paidreturned', 'remarks', '0', '1', 'paidreturned_remarks', NULL),
(174, 'district', 'name', '0', '1', 'district_name', NULL),
(175, 'district', 'state', '0', '1', 'district_state_id', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `margin_setups`
--

CREATE TABLE `margin_setups` (
  `id` bigint UNSIGNED NOT NULL,
  `margin_id` bigint UNSIGNED DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `margin_percentage` decimal(10,2) DEFAULT '0.00',
  `buying_price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>Not Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `margin_setups`
--

INSERT INTO `margin_setups` (`id`, `margin_id`, `item_id`, `date`, `supplier_id`, `margin_percentage`, `buying_price`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2021-06-11', 2, '10.00', '135.00', 0, '2021-06-11 09:31:57', '2021-06-11 09:32:54'),
(2, NULL, 1, '2021-06-11', 2, '10.00', '135.00', 1, '2021-06-11 09:32:54', '2021-06-11 09:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `margin_setup_vendors`
--

CREATE TABLE `margin_setup_vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(48, '2014_10_12_000000_create_users_table', 1),
(49, '2014_10_12_100000_create_password_resets_table', 1),
(50, '2019_01_06_101959_create_brands_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2019_11_18_050340_create_countries_table', 1),
(53, '2019_11_18_050623_create_states_table', 1),
(54, '2019_11_18_050653_create_districts_table', 1),
(55, '2019_11_18_050711_create_cities_table', 1),
(56, '2019_11_22_053644_create_address_types_table', 1),
(57, '2019_11_22_055640_create_location_types_table', 1),
(58, '2019_11_22_055955_create_locations_table', 1),
(59, '2019_11_22_095108_create_banks_table', 1),
(60, '2019_11_22_103323_create_bankbranches_table', 1),
(61, '2019_11_22_112437_create_account_types_table', 1),
(62, '2019_11_22_114813_create_denominations_table', 1),
(63, '2019_11_22_120731_create_departments_table', 1),
(64, '2019_11_22_120803_create_designations_table', 1),
(65, '2019_11_22_124713_create_employees_table', 1),
(66, '2019_11_22_131310_create_address_details_table', 1),
(67, '2019_11_22_131347_create_proof_details_table', 1),
(68, '2019_11_25_112420_create_expense_types_table', 1),
(69, '2019_11_25_112445_create_income_types_table', 1),
(70, '2019_11_25_114131_create_gst_types_table', 1),
(71, '2019_11_25_114408_create_giftvouchers_table', 1),
(72, '2019_11_28_094000_create_agents_table', 1),
(73, '2019_11_28_185807_create_customers_table', 1),
(74, '2019_11_29_062041_create_bank_details_table', 1),
(75, '2019_11_29_173124_create_suppliers_table', 1),
(76, '2019_11_30_060907_create_category_names_table', 1),
(77, '2019_11_30_065642_create_languages_table', 1),
(78, '2019_11_30_073229_create_uoms_table', 1),
(79, '2019_11_30_075509_create_category_ones_table', 1),
(80, '2019_11_30_082331_create_category_twos_table', 1),
(81, '2019_11_30_101858_create_category_threes_table', 1),
(82, '2019_11_30_112403_create_areas_table', 1),
(83, '2019_11_30_114336_create_agent_area_mappings_table', 1),
(84, '2019_11_30_120859_create_agent_area_mapping_details_table', 1),
(85, '2019_12_02_112315_create_items_table', 1),
(86, '2019_12_03_103641_create_uom_factor_convertion_for_items_table', 1),
(87, '2019_12_03_172116_create_item_tax_details_table', 1),
(88, '2019_12_06_062621_create_permission_tables', 1),
(89, '2019_12_17_164958_create_categories_table', 1),
(90, '2019_12_26_125413_create_customer_suppliers_table', 1),
(91, '2019_12_30_182421_create_supplier_promised_discount_settings_table', 1),
(92, '2020_01_03_094625_create_discount_types_table', 1),
(93, '2020_01_29_124335_create_item_bracode_details_table', 1),
(94, '2020_01_30_162607_create_promised_discounts_table', 1),
(95, '2020_04_03_131636_create_gate_pass_entries_table', 2),
(96, '2020_04_03_192023_create_gate_pass_entries_table', 3),
(97, '2020_04_04_093406_create_carts_table', 4),
(98, '2020_04_17_124831_create_purchases_table', 5),
(99, '2020_04_27_163700_create_temporary__purchases_table', 6),
(100, '2020_04_28_221849_create_purchase__details_table', 7),
(101, '2020_05_03_165314_create_ho_details_table', 8),
(102, '2020_05_04_094032_create_ho_details_table', 9),
(103, '2020_05_11_105458_create_estimations_table', 10),
(104, '2020_05_11_111302_create_estimation__items_table', 11),
(105, '2020_05_15_121353_create_estimation__expenses_table', 12),
(106, '2020_05_15_173722_create_estimations_table', 13),
(107, '2020_05_15_173926_create_estimation__items_table', 13),
(108, '2020_05_15_174035_create_estimation__expenses_table', 13),
(109, '2020_06_26_111035_create_estimations_table', 14),
(110, '2020_06_26_111128_create_estimation__items_table', 14),
(111, '2020_06_26_111203_create_estimation__expenses_table', 14),
(112, '2020_06_29_141056_create_purchase__orders_table', 15),
(113, '2020_06_29_142623_create_purchase_order_items_table', 16),
(114, '2020_06_29_143655_create_purchase_order_expenses_table', 17),
(115, '2020_06_30_093748_create_sale_orders_table', 18),
(116, '2020_06_30_094359_create_sale_order_items_table', 19),
(117, '2020_06_30_094540_create_sale_order_expenses_table', 20),
(118, '2020_06_30_160354_create_purchase_entries_table', 21),
(119, '2020_06_30_160617_create_purchase_entry_items_table', 22),
(120, '2020_06_30_160917_create_purchase_entry_expenses_table', 23),
(121, '2020_06_30_182916_create_sale_estimations_table', 24),
(122, '2020_06_30_183218_create_sale_estimation_items_table', 25),
(123, '2020_06_30_183353_create_sale_estimation_expenses_table', 26),
(124, '2020_06_30_195657_create_sale_entries_table', 27),
(125, '2020_06_30_201721_create_sale_entry_items_table', 28),
(126, '2020_06_30_201832_create_sale_entry_expenses_table', 29),
(127, '2020_07_01_034605_create_sale_gatepass_entries_table', 30),
(128, '2020_07_01_050341_create_purchase_gatepass_entries_table', 31),
(129, '2020_07_02_154356_create_receipt_notes_table', 32),
(130, '2020_07_02_155357_create_debit_notes_table', 32),
(131, '2020_07_02_164001_create_delivery_notes_table', 33),
(132, '2020_07_02_164234_create_credit_notes_table', 33),
(133, '2020_07_04_094413_create_receipt_note_items_table', 34),
(134, '2020_07_04_094707_create_receipt_note_expenses_table', 34),
(135, '2020_07_04_120549_create_debit_note_items_table', 35),
(136, '2020_07_04_120750_create_debit_note_expenses_table', 35),
(137, '2020_07_04_143443_create_delivery_note_items_table', 36),
(138, '2020_07_04_143747_create_delivery_note_expenses_table', 36),
(139, '2020_07_04_161318_create_credit_note_items_table', 37),
(140, '2020_07_04_164112_create_credit_note_expenses_table', 37),
(141, '2020_07_06_155219_create_taxes_table', 38),
(142, '2020_07_07_094951_create_taxdummies_table', 39),
(143, '2020_07_16_104202_create_rejection_ins_table', 40),
(144, '2020_07_16_105416_create_rejection_in_items_table', 40),
(145, '2020_07_16_105710_create_rejection_in_expenses_table', 40),
(146, '2020_07_16_120923_create_rejection_outs_table', 41),
(147, '2020_07_16_121128_create_rejection_out_items_table', 41),
(148, '2020_07_16_121221_create_rejection_out_expenses_table', 41),
(149, '2020_08_10_105416_create_account_groups_table', 42),
(150, '2020_08_11_102732_create_account_heads_table', 43),
(151, '2020_09_15_111625_create_estimation_taxes_table', 44),
(152, '2020_09_15_122501_create_sale_estimation_taxes_table', 45),
(153, '2020_09_15_154459_create_purchase_order_taxes_table', 46),
(154, '2020_09_15_181859_create_receipt_note_taxes_table', 47),
(155, '2020_09_16_104317_create_purchase_entry_taxes_table', 48),
(156, '2020_09_16_112049_create_rejection_out_taxes_table', 49),
(157, '2020_09_16_121808_create_sale_order_taxes_table', 50),
(158, '2020_09_16_125645_create_delivery_note_taxes_table', 51),
(159, '2020_09_16_133702_create_sale_entry_taxes_table', 52),
(160, '2020_09_16_145308_create_rejection_in_taxes_table', 53),
(161, '2020_09_17_112714_create_sales_men_table', 54),
(162, '2020_09_25_094249_create_opening_stocks_table', 55),
(163, '2020_10_01_105025_create_account_group_taxes_table', 56),
(164, '2020_10_07_160831_create_debit_note_taxes_table', 57),
(165, '2020_10_09_105818_create_credit_note_taxes_table', 58),
(166, '2020_11_11_122801_create_price_updations_table', 59),
(167, '2020_11_30_130534_create_selling_price_setups_table', 60);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `deleted_at`) VALUES
(1, 'App\\User', 1, NULL),
(2, 'App\\User', 2, NULL),
(3, 'App\\User', 2, NULL),
(3, 'App\\User', 3, NULL),
(3, 'App\\User', 4, NULL),
(3, 'App\\User', 5, NULL),
(3, 'App\\User', 6, NULL),
(3, 'App\\User', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint NOT NULL,
  `offer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `offers_category_id` bigint UNSIGNED NOT NULL,
  `offer_type` enum('date','day','time') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `day_range_offers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `variable` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(7,2) DEFAULT NULL,
  `fixed_amount` decimal(7,2) DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `comments` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_name`, `item_id`, `offers_category_id`, `offer_type`, `valid_from`, `valid_to`, `day_range_offers`, `variable`, `percentage`, `fixed_amount`, `from_time`, `to_time`, `comments`, `active_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Christmas Offers', '[\"29\"]', 16, 'time', '2021-06-10', '2021-06-12', 'null', '0', NULL, '20.00', '12:00:00', '19:00:00', '1255', 1, '2021-06-10 15:28:48', '2021-06-10 15:55:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opening_stocks`
--

CREATE TABLE `opening_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `batch_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_qty` int DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `applicable_date` date DEFAULT NULL,
  `black_or_white` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opening_stocks`
--

INSERT INTO `opening_stocks` (`id`, `item_id`, `location`, `batch_no`, `opening_qty`, `rate`, `amount`, `applicable_date`, `black_or_white`, `created_at`, `updated_at`) VALUES
(3, 2, 3, '1', 2, NULL, NULL, '2021-06-10', NULL, '2021-06-10 18:05:37', '2021-06-10 18:05:37'),
(4, 3, 3, '3', 2, NULL, NULL, '2021-06-10', NULL, '2021-06-10 18:13:19', '2021-06-10 18:13:19'),
(5, 1, 1, '1', 10, '10.00', '100.00', '2021-06-10', 1, '2021-06-11 18:44:30', '2021-06-11 18:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_processes`
--

CREATE TABLE `payment_processes` (
  `id` int NOT NULL,
  `voucher_no` varchar(100) DEFAULT NULL,
  `voucher_date` date DEFAULT NULL,
  `supplier_id` int NOT NULL,
  `payment_request_id` int DEFAULT NULL,
  `ledger` tinyint DEFAULT NULL,
  `p_no` varchar(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `net_value` decimal(10,2) NOT NULL,
  `payment_mode` tinyint NOT NULL,
  `payment_date` date DEFAULT NULL,
  `reference_no` int DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `active_status` tinyint NOT NULL,
  `cleared_status` int DEFAULT '0' COMMENT '0 => uncleared cheque, 1 =>cleared cheque, 2 => returned cheque',
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_processes`
--

INSERT INTO `payment_processes` (`id`, `voucher_no`, `voucher_date`, `supplier_id`, `payment_request_id`, `ledger`, `p_no`, `payment_amount`, `net_value`, `payment_mode`, `payment_date`, `reference_no`, `remarks`, `active_status`, `cleared_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'PE3EY', '2021-06-11', 2, NULL, NULL, 'PE3EY', '100.00', '100.00', 1, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2021-06-11 16:06:13', '2021-06-11 16:06:13', NULL),
(5, 'test00022latest', '2021-06-11', 2, NULL, 1, 'PE2EY', '100.00', '100.00', 1, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2021-06-11 17:29:38', '2021-06-11 17:29:38', NULL),
(6, 'PE4EY', '2021-06-14', 2, NULL, NULL, 'PE4EY', '0.00', '0.00', 1, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2021-06-14 09:32:20', '2021-06-14 09:32:20', NULL),
(7, 'test00023latest', '2021-06-18', 2, NULL, 1, 'PE3EY', '37.00', '37.00', 1, NULL, NULL, 'test', 1, 0, 0, 0, NULL, '2021-06-18 18:52:17', '2021-06-18 18:52:17', NULL),
(8, 'test00024latest', '2021-06-18', 2, NULL, 2, 'PE3EY', '0.55', '0.55', 1, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2021-06-18 18:54:39', '2021-06-18 18:54:39', NULL),
(9, 'test00025latest', '2021-06-18', 2, NULL, 2, 'PE3EY', '200.00', '200.00', 1, NULL, NULL, NULL, 1, 0, 0, 0, NULL, '2021-06-18 18:55:04', '2021-06-18 18:55:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_process_adjustments`
--

CREATE TABLE `payment_process_adjustments` (
  `id` int NOT NULL,
  `payment_process_id` varchar(20) NOT NULL,
  `advance_voucher_no` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `active_status` tinyint NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` int NOT NULL,
  `request_no` varchar(255) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `supplier_id` int NOT NULL,
  `ledger` tinyint NOT NULL,
  `purchase_id` int NOT NULL,
  `request_amount` decimal(10,2) NOT NULL,
  `voucher_type` bigint DEFAULT NULL,
  `active_status` tinyint NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_requests`
--

INSERT INTO `payment_requests` (`id`, `request_no`, `request_date`, `supplier_id`, `ledger`, `purchase_id`, `request_amount`, `voucher_type`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR0002REQ', '2020-11-20', 2, 1, 1, '5000.00', 1, 1, 0, 0, NULL, '2021-06-19 11:40:33', '2021-06-19 11:40:33', NULL),
(2, 'PR0003REQ', '2020-11-20', 2, 2, 1, '5000.00', 1, 1, 0, 0, NULL, '2021-06-19 11:41:11', '2021-06-19 11:41:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_voucher_types`
--

CREATE TABLE `payment_voucher_types` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `starting_no` double DEFAULT NULL,
  `updated_no` varchar(255) DEFAULT NULL,
  `no_digits` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_voucher_types`
--

INSERT INTO `payment_voucher_types` (`id`, `name`, `type`, `prefix`, `suffix`, `starting_no`, `updated_no`, `no_digits`, `created_at`, `updated_at`) VALUES
(1, 'Payment Request', 'Type 1', 'PR', 'REQ', 1, '0003', 4, '2021-06-11 14:11:17', '2021-06-19 11:41:11'),
(5, 'Payment Process', 'Test Payment Type 1', 'test', 'latest', 20, '00025', 5, '2021-02-24 06:17:50', '2021-06-18 18:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `name1`, `label`, `class`, `type`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'state_list', 'List', 'State List', 'state_list', 'Master', 'web', NULL, NULL, NULL),
(2, 'state_create', 'Create', 'State Create', 'state_list', 'Master', 'web', NULL, NULL, NULL),
(3, 'state_edit', 'Edit', 'State Edit', 'state_list', 'Master', 'web', NULL, NULL, NULL),
(4, 'state_delete', 'Delete', 'State Delete', 'state_list', 'Master', 'web', NULL, NULL, NULL),
(5, 'district_list', 'List', 'District List', 'district_list', 'Master', 'web', NULL, NULL, NULL),
(6, 'district_create', 'Create', 'District Create', 'district_list', 'Master', 'web', NULL, NULL, NULL),
(7, 'district_edit', 'Edit', 'District Edit', 'district_list', 'Master', 'web', NULL, NULL, NULL),
(8, 'district_delete', 'Delete', 'District Delete', 'district_list', 'Master', 'web', NULL, NULL, NULL),
(9, 'city_list', 'List', 'City List', 'city_list', 'Master', 'web', NULL, NULL, NULL),
(10, 'city_create', 'Create', 'City Create', 'city_list', 'Master', 'web', NULL, NULL, NULL),
(11, 'city_edit', 'Edit', 'City Edit', 'city_list', 'Master', 'web', NULL, NULL, NULL),
(12, 'city_delete', 'Delete', 'City Delete', 'city_list', 'Master', 'web', NULL, NULL, NULL),
(13, 'location_type_list', 'List', 'Location Type List', 'location_type_list', 'Master', 'web', NULL, NULL, NULL),
(14, 'location_type_create', 'Create', 'Location Type Create', 'location_type_list', 'Master', 'web', NULL, NULL, NULL),
(15, 'location_type_edit', 'Edit', 'Location Type Edit', 'location_type_list', 'Master', 'web', NULL, NULL, NULL),
(16, 'location_type_delete', 'Delete', 'Location Type Delete', 'location_type_list', 'Master', 'web', NULL, NULL, NULL),
(17, 'address_type_list', 'List', 'Address Type List', 'address_type_list', 'Master', 'web', NULL, NULL, NULL),
(18, 'address_type_create', 'Create', 'Address Type Create', 'address_type_list', 'Master', 'web', NULL, NULL, NULL),
(19, 'address_type_edit', 'Edit', 'Address Type Edit', 'address_type_list', 'Master', 'web', NULL, NULL, NULL),
(20, 'address_type_delete', 'Delete', 'Address Type Delete', 'address_type_list', 'Master', 'web', NULL, NULL, NULL),
(21, 'location_list', 'List', 'Location List', 'location_list', 'Master', 'web', NULL, NULL, NULL),
(22, 'location_create', 'Create', 'Location Create', 'location_list', 'Master', 'web', NULL, NULL, NULL),
(23, 'location_edit', 'Edit', 'Location Edit', 'location_list', 'Master', 'web', NULL, NULL, NULL),
(24, 'location_delete', 'Delete', 'Location Delete', 'location_list', 'Master', 'web', NULL, NULL, NULL),
(25, 'bank_list', 'List', 'Bank List', 'bank_list', 'Master', 'web', NULL, NULL, NULL),
(26, 'bank_create', 'Create', 'Bank Create', 'bank_list', 'Master', 'web', NULL, NULL, NULL),
(27, 'bank_edit', 'Edit', 'Bank Edit', 'bank_list', 'Master', 'web', NULL, NULL, NULL),
(28, 'bank_delete', 'Delete', 'Bank Delete', 'bank_list', 'Master', 'web', NULL, NULL, NULL),
(29, 'bank_branch_list', 'List', 'Bank Branch List', 'bank_branch_list', 'Master', 'web', NULL, NULL, NULL),
(30, 'bank_branch_create', 'Create', 'Bank Branch Create', 'bank_branch_list', 'Master', 'web', NULL, NULL, NULL),
(31, 'bank_branch_edit', 'Edit', 'Bank Branch Edit', 'bank_branch_list', 'Master', 'web', NULL, NULL, NULL),
(32, 'bank_branch_delete', 'Delete', 'Bank Branch Delete', 'bank_branch_list', 'Master', 'web', NULL, NULL, NULL),
(33, 'denomination_list', 'List', 'Denomination List', 'denomination_list', 'Master', 'web', NULL, NULL, NULL),
(34, 'denomination_create', 'Create', 'Denomination Create', 'denomination_list', 'Master', 'web', NULL, NULL, NULL),
(35, 'denomination_edit', 'Edit', 'Denomination Edit', 'denomination_list', 'Master', 'web', NULL, NULL, NULL),
(36, 'denomination_delete', 'Delete', 'Denomination Delete', 'denomination_list', 'Master', 'web', NULL, NULL, NULL),
(37, 'accounts_type_list', 'List', 'Accounts Type List', 'accounts_type_list', 'Master', 'web', NULL, NULL, NULL),
(38, 'accounts_type_create', 'Create', 'Accounts Type Create', 'accounts_type_list', 'Master', 'web', NULL, NULL, NULL),
(39, 'accounts_type_edit', 'Edit', 'Accounts Type Edit', 'accounts_type_list', 'Master', 'web', NULL, NULL, NULL),
(40, 'accounts_type_delete', 'Delete', 'Accounts Type Delete', 'accounts_type_list', 'Master', 'web', NULL, NULL, NULL),
(41, 'department_list', 'List', 'Department List', 'department_list', 'Master', 'web', NULL, NULL, NULL),
(42, 'department_create', 'Create', 'Department Create', 'department_list', 'Master', 'web', NULL, NULL, NULL),
(43, 'department_edit', 'Edit', 'Department Edit', 'department_list', 'Master', 'web', NULL, NULL, NULL),
(44, 'department_delete', 'Delete', 'Department Delete', 'department_list', 'Master', 'web', NULL, NULL, NULL),
(45, 'desigination_list', 'List', 'Desigination List', 'desigination_list', 'Master', 'web', NULL, NULL, NULL),
(46, 'desigination_create', 'Create', 'Desigination Create', 'desigination_list', 'Master', 'web', NULL, NULL, NULL),
(47, 'desigination_edit', 'Edit', 'Desigination Edit', 'desigination_list', 'Master', 'web', NULL, NULL, NULL),
(48, 'desigination_delete', 'Delete', 'Desigination Delete', 'desigination_list', 'Master', 'web', NULL, NULL, NULL),
(49, 'employee_list', 'List', 'Employee List', 'employee_list', 'Master', 'web', NULL, NULL, NULL),
(50, 'employee_create', 'Create', 'Employee Create', 'employee_list', 'Master', 'web', NULL, NULL, NULL),
(51, 'employee_edit', 'Edit', 'Employee Edit', 'employee_list', 'Master', 'web', NULL, NULL, NULL),
(52, 'employee_delete', 'Delete', 'Employee Delete', 'employee_list', 'Master', 'web', NULL, NULL, NULL),
(53, 'expense_list', 'List', 'Expense Master List', 'expense_list', 'Master', 'web', NULL, NULL, NULL),
(54, 'expense_create', 'Create', 'Expense Master Create', 'expense_list', 'Master', 'web', NULL, NULL, NULL),
(55, 'expense_edit', 'Edit', 'Expense Master Edit', 'expense_list', 'Master', 'web', NULL, NULL, NULL),
(56, 'expense_delete', 'Delete', 'Expense Master Delete', 'expense_list', 'Master', 'web', NULL, NULL, NULL),
(57, 'income_list', 'List', 'Income List', 'income_list', 'Master', 'web', NULL, NULL, NULL),
(58, 'income_create', 'Create', 'Income Create', 'income_list', 'Master', 'web', NULL, NULL, NULL),
(59, 'income_edit', 'Edit', 'Income Edit', 'income_list', 'Master', 'web', NULL, NULL, NULL),
(60, 'income_delete', 'Delete', 'Income Delete', 'income_list', 'Master', 'web', NULL, NULL, NULL),
(61, 'gst_master_list', 'List', 'Gst Master List', 'gst_master_list', 'Master', 'web', NULL, NULL, NULL),
(62, 'gst_master_create', 'Create', 'Gst Master Create', 'gst_master_list', 'Master', 'web', NULL, NULL, NULL),
(63, 'gst_master_edit', 'Edit', 'Gst Master Edit', 'gst_master_list', 'Master', 'web', NULL, NULL, NULL),
(64, 'gst_master_delete', 'Delete', 'Gst Master Delete', 'gst_master_list', 'Master', 'web', NULL, NULL, NULL),
(65, 'gift_voucher_matser_list', 'List', 'Gift Voucher Master List', 'gift_voucher_matser_list', 'Master', 'web', NULL, NULL, NULL),
(66, 'gift_voucher_matser_create', 'Create', 'Gift Voucher Master Create', 'gift_voucher_matser_list', 'Master', 'web', NULL, NULL, NULL),
(67, 'gift_voucher_matser_edit', 'Edit', 'Gift Voucher Master Edit', 'gift_voucher_matser_list', 'Master', 'web', NULL, NULL, NULL),
(68, 'gift_voucher_matser_delete', 'Delete', 'Gift Voucher Master Delete', 'gift_voucher_matser_list', 'Master', 'web', NULL, NULL, NULL),
(69, 'uom_list', 'List', 'Uom List', 'uom_list', 'Master', 'web', NULL, NULL, NULL),
(70, 'uom_create', 'Create', 'Uom Create', 'uom_list', 'Master', 'web', NULL, NULL, NULL),
(71, 'uom_edit', 'Edit', 'Uom Edit', 'uom_list', 'Master', 'web', NULL, NULL, NULL),
(72, 'uom_delete', 'Delete', 'Uom Delete', 'uom_list', 'Master', 'web', NULL, NULL, NULL),
(73, 'language_master_list', 'List', 'Language Master List', 'language_master_list', 'Master', 'web', NULL, NULL, NULL),
(74, 'language_master_create', 'Create', 'Language Master Create', 'language_master_list', 'Master', 'web', NULL, NULL, NULL),
(75, 'language_master_edit', 'Edit', 'Language Master Edit', 'language_master_list', 'Master', 'web', NULL, NULL, NULL),
(76, 'language_master_delete', 'Delete', 'Language Master Delete', 'language_master_list', 'Master', 'web', NULL, NULL, NULL),
(77, 'category_name_master_list', 'List', 'Category Name List', 'category_name_master_list', 'Master', 'web', NULL, NULL, NULL),
(78, 'category_name_master_create', 'Create', 'Category Name Create', 'category_name_master_list', 'Master', 'web', NULL, NULL, NULL),
(79, 'category_name_master_edit', 'Edit', 'Category Name Edit', 'category_name_master_list', 'Master', 'web', NULL, NULL, NULL),
(80, 'category_name_master_delete', 'Delete', 'Category Name Delete', 'category_name_master_list', 'Master', 'web', NULL, NULL, NULL),
(81, 'category_1_master_list', 'List', 'Category-1 Name List', 'category_1_master_list', 'Master', 'web', NULL, NULL, NULL),
(82, 'category_1_master_create', 'Create', 'Category-1 Name Create', 'category_1_master_list', 'Master', 'web', NULL, NULL, NULL),
(83, 'category_1_master_edit', 'Edit', 'Category-1 Name Edit', 'category_1_master_list', 'Master', 'web', NULL, NULL, NULL),
(84, 'category_1_master_delete', 'Delete', 'Category-1 Name Delete', 'category_1_master_list', 'Master', 'web', NULL, NULL, NULL),
(85, 'category_2_master_list', 'List', 'Category-2 Name List', 'category_2_master_list', 'Master', 'web', NULL, NULL, NULL),
(86, 'category_2_master_create', 'Create', 'Category-2 Name Create', 'category_2_master_list', 'Master', 'web', NULL, NULL, NULL),
(87, 'category_2_master_edit', 'Edit', 'Category-2 Name Edit', 'category_2_master_list', 'Master', 'web', NULL, NULL, NULL),
(88, 'category_2_master_delete', 'Delete', 'Category-2 Name Delete', 'category_2_master_list', 'Master', 'web', NULL, NULL, NULL),
(89, 'category_3_master_list', 'List', 'Category-3 Name List', 'category_3_master_list', 'Master', 'web', NULL, NULL, NULL),
(90, 'category_3_master_create', 'Create', 'Category-3 Name Create', 'category_3_master_list', 'Master', 'web', NULL, NULL, NULL),
(91, 'category_3_master_edit', 'Edit', 'Category-3 Name Edit', 'category_3_master_list', 'Master', 'web', NULL, NULL, NULL),
(92, 'category_3_master_delete', 'Delete', 'Category-3 Name Delete', 'category_3_master_list', 'Master', 'web', NULL, NULL, NULL),
(93, 'agent_list', 'List', 'Agent List', 'agent_list', 'Master', 'web', NULL, NULL, NULL),
(94, 'agent_create', 'Create', 'Agent Create', 'agent_list', 'Master', 'web', NULL, NULL, NULL),
(95, 'agent_edit', 'Edit', 'Agent Edit', 'agent_list', 'Master', 'web', NULL, NULL, NULL),
(96, 'agent_delete', 'Delete', 'Agent Delete', 'agent_list', 'Master', 'web', NULL, NULL, NULL),
(97, 'customer_list', 'List', 'Customer Name List', 'customer_list', 'Master', 'web', NULL, NULL, NULL),
(98, 'customer_create', 'Create', 'Customer Name Create', 'customer_list', 'Master', 'web', NULL, NULL, NULL),
(99, 'customer_edit', 'Edit', 'Customer Name Edit', 'customer_list', 'Master', 'web', NULL, NULL, NULL),
(100, 'customer_delete', 'Delete', 'Customer Name Delete', 'customer_list', 'Master', 'web', NULL, NULL, NULL),
(101, 'supplier_list', 'List', 'Supplier List', 'supplier_list', 'Master', 'web', NULL, NULL, NULL),
(102, 'supplier_create', 'Create', 'Supplier Create', 'supplier_list', 'Master', 'web', NULL, NULL, NULL),
(103, 'supplier_edit', 'Edit', 'Supplier Edit', 'supplier_list', 'Master', 'web', NULL, NULL, NULL),
(104, 'supplier_delete', 'Delete', 'Supplier Delete', 'supplier_list', 'Master', 'web', NULL, NULL, NULL),
(105, 'area_list', 'List', 'Area Name List', 'area_list', 'Master', 'web', NULL, NULL, NULL),
(106, 'area_create', 'Create', 'Area Name Create', 'area_list', 'Master', 'web', NULL, NULL, NULL),
(107, 'area_edit', 'Edit', 'Area Name Edit', 'area_list', 'Master', 'web', NULL, NULL, NULL),
(108, 'area_delete', 'Delete', 'Area Name Delete', 'area_list', 'Master', 'web', NULL, NULL, NULL),
(109, 'agent_area_mapping_list', 'List', 'Agent Area Mapping List', 'agent_area_mapping_list', 'Master', 'web', NULL, NULL, NULL),
(110, 'agent_area_mapping_create', 'Create', 'Agent Area Mapping Create', 'agent_area_mapping_list', 'Master', 'web', NULL, NULL, NULL),
(111, 'agent_area_mapping_edit', 'Edit', 'Agent Area Mapping Edit', 'agent_area_mapping_list', 'Master', 'web', NULL, NULL, NULL),
(112, 'agent_area_mapping_delete', 'Delete', 'Agent Area Mapping Delete', 'agent_area_mapping_list', 'Master', 'web', NULL, NULL, NULL),
(113, 'item_master_list', 'List', 'Item Master List', 'item_master_list', 'Master', 'web', NULL, NULL, NULL),
(114, 'item_master_create', 'Create', 'Item Master Create', 'item_master_list', 'Master', 'web', NULL, NULL, NULL),
(115, 'item_master_edit', 'Edit', 'Item Master Edit', 'item_master_list', 'Master', 'web', NULL, NULL, NULL),
(116, 'item_master_delete', 'Delete', 'Item Master Delete', 'item_master_list', 'Master', 'web', NULL, NULL, NULL),
(117, 'uom_factor_convertion_for_item_list', 'List', 'Uom Factor Convertion for Item Name List', 'uom_factor_convertion_for_item_list', 'Master', 'web', NULL, NULL, NULL),
(118, 'uom_factor_convertion_for_item_create', 'Create', 'Uom Factor Convertion for Item Name Create', 'uom_factor_convertion_for_item_list', 'Master', 'web', NULL, NULL, NULL),
(119, 'uom_factor_convertion_for_item_edit', 'Edit', 'Uom Factor Convertion for Item Name Edit', 'uom_factor_convertion_for_item_list', 'Master', 'web', NULL, NULL, NULL),
(120, 'uom_factor_convertion_for_item_delete', 'Delete', 'Uom Factor Convertion for Item Name Delete', 'uom_factor_convertion_for_item_list', 'Master', 'web', NULL, NULL, NULL),
(121, 'item_tax_details_list', 'List', 'Item Tax Details List', 'item_tax_details_list', 'Master', 'web', NULL, NULL, NULL),
(122, 'item_tax_details_create', 'Create', 'Item Tax Details Create', 'item_tax_details_list', 'Master', 'web', NULL, NULL, NULL),
(123, 'item_tax_details_edit', 'Edit', 'Item Tax Details Edit', 'item_tax_details_list', 'Master', 'web', NULL, NULL, NULL),
(124, 'item_tax_details_delete', 'Delete', 'Item Tax Details Delete', 'item_tax_details_list', 'Master', 'web', NULL, NULL, NULL),
(125, 'user_list', 'List', 'User List', 'user_list', 'Master', 'web', NULL, NULL, NULL),
(126, 'user_create', 'Create', 'User Create', 'user_list', 'Master', 'web', NULL, NULL, NULL),
(127, 'user_edit', 'Edit', 'User Edit', 'user_list', 'Master', 'web', NULL, NULL, NULL),
(128, 'user_delete', 'Delete', 'User Delete', 'user_list', 'Master', 'web', NULL, NULL, NULL),
(129, 'role_list', 'List', 'Role List', 'role_list', 'Master', 'web', NULL, NULL, NULL),
(130, 'role_create', 'Create', 'Role Create', 'role_list', 'Master', 'web', NULL, NULL, NULL),
(131, 'role_edit', 'Edit', 'Role Edit', 'role_list', 'Master', 'web', NULL, NULL, NULL),
(132, 'role_delete', 'Delete', 'Role Delete', 'role_list', 'Master', 'web', NULL, NULL, NULL),
(133, 'brand_list', 'List', 'Brand List', 'brand_list', 'Master', 'web', NULL, NULL, NULL),
(134, 'brand_create', 'Create', 'Brand Create', 'brand_list', 'Master', 'web', NULL, NULL, NULL),
(135, 'brand_edit', 'Edit', 'Brand Edit', 'brand_list', 'Master', 'web', NULL, NULL, NULL),
(136, 'brand_delete', 'Delete', 'Brand Delete', 'brand_list', 'Master', 'web', NULL, NULL, NULL),
(137, 'category_list', 'List', 'Category List', 'category_list', 'Master', 'web', NULL, NULL, NULL),
(138, 'category_create', 'Create', 'Category Create', 'category_list', 'Master', 'web', NULL, NULL, NULL),
(139, 'category_edit', 'Edit', 'Category Edit', 'category_list', 'Master', 'web', NULL, NULL, NULL),
(140, 'category_delete', 'Delete', 'Category Delete', 'category_list', 'Master', 'web', NULL, NULL, NULL),
(141, 'estimation_list', 'List', 'Estimation List', 'estimation_list', 'Transaction', 'web', NULL, NULL, NULL),
(142, 'estimation_create', 'Create', 'Estimation Create', 'estimation_list', 'Transaction', 'web', NULL, NULL, NULL),
(143, 'name', 'name1', 'label', 'class', 'type', 'web', NULL, NULL, NULL),
(144, 'estimation_edit', 'Edit', 'Estimation Edit', 'estimation_list', '', 'web', NULL, NULL, NULL),
(145, 'estimation_delete', 'Delete', 'Estimation Delete', 'estimation_list', '', 'web', NULL, NULL, NULL),
(146, 'purchase_order_list', 'List', 'Purchase Order List', 'purchase_order_list', '', 'web', NULL, NULL, NULL),
(147, 'purchase_order_create', 'Create', 'Purchase Order Create', 'purchase_order_list', '', 'web', NULL, NULL, NULL),
(148, 'purchase_order_edit', 'Edit', 'Purchase Order Edit', 'purchase_order_list', '', 'web', NULL, NULL, NULL),
(149, 'purchase_order_delete', 'Delete', 'Purchase Order Delete', 'purchase_order_list', '', 'web', NULL, NULL, NULL),
(150, 'receipt_note_list', 'List', 'Receipt Note List', 'receipt_note_list', '', 'web', NULL, NULL, NULL),
(151, 'receipt_note_create', 'Create', 'Receipt Note Create', 'receipt_note_list', '', 'web', NULL, NULL, NULL),
(152, 'receipt_note_edit', 'Edit', 'Receipt Note Edit', 'receipt_note_list', '', 'web', NULL, NULL, NULL),
(153, 'receipt_note_delete', 'Delete', 'Receipt Note Delete', 'receipt_note_list', '', 'web', NULL, NULL, NULL),
(154, 'purchase_entry_list', 'List', 'Purchase Entry List', 'purchase_entry_list', '', 'web', NULL, NULL, NULL),
(155, 'purchase_entry_create', 'Create', 'Purchase Entry Create', 'purchase_entry_list', '', 'web', NULL, NULL, NULL),
(156, 'purchase_entry_edit', 'Edit', 'Purchase Entry Edit', 'purchase_entry_list', '', 'web', NULL, NULL, NULL),
(157, 'purchase_entry_delete', 'Delete', 'Purchase Entry Delete', 'purchase_entry_list', '', 'web', NULL, NULL, NULL),
(158, 'rejection_out_list', 'List', 'Rejection Out List', 'rejection_out_list', '', 'web', NULL, NULL, NULL),
(159, 'rejection_out_create', 'Create', 'Rejection Out Create', 'rejection_out_list', '', 'web', NULL, NULL, NULL),
(160, 'rejection_out_edit', 'Edit', 'Rejection Out Edit', 'rejection_out_list', '', 'web', NULL, NULL, NULL),
(161, 'rejection_out_delete', 'Delete', 'Rejection Out Delete', 'rejection_out_list', '', 'web', NULL, NULL, NULL),
(162, 'purchase_gate_entry_list', 'List', 'Purchase Gate Pass Entry List', 'purchase_gate_entry_list', '', 'web', NULL, NULL, NULL),
(163, 'purchase_gate_entry_create', 'Create', 'Purchase Gate Pass Entry Create', 'purchase_gate_entry_list', '', 'web', NULL, NULL, NULL),
(164, 'purchase_gate_entry_edit', 'Edit', 'Purchase Gate Pass Entry Edit', 'purchase_gate_entry_list', '', 'web', NULL, NULL, NULL),
(165, 'purchase_gate_entry_delete', 'Delete', 'Purchase Gate Pass Entry Delete', 'purchase_gate_entry_list', '', 'web', NULL, NULL, NULL),
(166, 'debit_note_list', 'List', 'Debit Note List', 'debit_note_list', '', 'web', NULL, NULL, NULL),
(167, 'debit_note_create', 'Create', 'Debit Note Create', 'debit_note_list', '', 'web', NULL, NULL, NULL),
(168, 'debit_note_edit', 'Edit', 'Debit Note Edit', 'debit_note_list', '', 'web', NULL, NULL, NULL),
(169, 'debit_note_delete', 'Delete', 'Debit Note Delete', 'debit_note_list', '', 'web', NULL, NULL, NULL),
(170, 'sales_estimation_list', 'List', 'Sales Estimation List', 'sales_estimation_list', '', 'web', NULL, NULL, NULL),
(171, 'sales_estimation_create', 'Create', 'Sales Estimation Create', 'sales_estimation_list', '', 'web', NULL, NULL, NULL),
(172, 'sales_estimation_edit', 'Edit', 'Sales Estimation Edit', 'sales_estimation_list', '', 'web', NULL, NULL, NULL),
(173, 'sales_estimation_delete', 'Delete', 'Sales Estimation Delete', 'sales_estimation_list', '', 'web', NULL, NULL, NULL),
(174, 'sales_order_list', 'List', 'Sales Order List', 'sales_order_list', '', 'web', NULL, NULL, NULL),
(175, 'sales_order_create', 'Create', 'Sales Order Create', 'sales_order_list', '', 'web', NULL, NULL, NULL),
(176, 'sales_order_edit', 'Edit', 'Sales Order Edit', 'sales_order_list', '', 'web', NULL, NULL, NULL),
(177, 'sales_order_delete', 'Delete', 'Sales Order Delete', 'sales_order_list', '', 'web', NULL, NULL, NULL),
(178, 'delivery_note_list', 'List', 'Delivery Notes List', 'delivery_note_list', '', 'web', NULL, NULL, NULL),
(179, 'delivery_note_create', 'Create', 'Delivery Notes Create', 'delivery_note_list', '', 'web', NULL, NULL, NULL),
(180, 'delivery_note_edit', 'Edit', 'Delivery Notes Edit', 'delivery_note_list', '', 'web', NULL, NULL, NULL),
(181, 'delivery_note_delete', 'Delete', 'Delivery Notes Delete', 'delivery_note_list', '', 'web', NULL, NULL, NULL),
(182, 'sales_entry_list', 'List', 'Sales Entry List', 'sales_entry_list', '', 'web', NULL, NULL, NULL),
(183, 'sales_entry_create', 'Create', 'Sales Entry Create', 'sales_entry_list', '', 'web', NULL, NULL, NULL),
(184, 'sales_entry_edit', 'Edit', 'Sales Entry Edit', 'sales_entry_list', '', 'web', NULL, NULL, NULL),
(185, 'sales_entry_delete', 'Delete', 'Sales Entry Delete', 'sales_entry_list', '', 'web', NULL, NULL, NULL),
(186, 'rejection_in_list', 'List', 'Rejection In List', 'rejection_in_list', '', 'web', NULL, NULL, NULL),
(187, 'rejection_in_create', 'Create', 'Rejection In Create', 'rejection_in_list', '', 'web', NULL, NULL, NULL),
(188, 'rejection_in_edit', 'Edit', 'Rejection In Edit', 'rejection_in_list', '', 'web', NULL, NULL, NULL),
(189, 'rejection_in_delete', 'Delete', 'Rejection In Delete', 'rejection_in_list', '', 'web', NULL, NULL, NULL),
(190, 'sales_gatepass_entry_list', 'List', 'Sales Gatepass Entry List', 'sales_gatepass_entry_list', '', 'web', NULL, NULL, NULL),
(191, 'sales_gatepass_entry_create', 'Create', 'Sales Gatepass Entry Create', 'sales_gatepass_entry_list', '', 'web', NULL, NULL, NULL),
(192, 'sales_gatepass_entry_edit', 'Edit', 'Sales Gatepass Entry Edit', 'sales_gatepass_entry_list', '', 'web', NULL, NULL, NULL),
(193, 'sales_gatepass_entry_delete', 'Delete', 'Sales Gatepass Entry Delete', 'sales_gatepass_entry_list', '', 'web', NULL, NULL, NULL),
(194, 'credit_note_list', 'List', 'Credit Note List', 'credit_note_list', '', 'web', NULL, NULL, NULL),
(195, 'credit_note_create', 'Create', 'Credit Note Create', 'credit_note_list', '', 'web', NULL, NULL, NULL),
(196, 'credit_note_edit', 'Edit', 'Credit Note Edit', 'credit_note_list', '', 'web', NULL, NULL, NULL),
(197, 'credit_note_delete', 'Delete', 'Credit Note Delete', 'credit_note_list', '', 'web', NULL, NULL, NULL),
(198, 'payment_request_list', 'List', 'Payment Request List', 'payment_request_list', '', 'web', NULL, NULL, NULL),
(199, 'payment_request_create', 'Create', 'Payment Request Create', 'payment_request_list', '', 'web', NULL, NULL, NULL),
(200, 'payment_request_edit', 'Edit', 'Payment Request Edit', 'payment_request_list', '', 'web', NULL, NULL, NULL),
(201, 'payment_request_delete', 'Delete', 'Payment Request Delete', 'payment_request_list', '', 'web', NULL, NULL, NULL),
(202, 'payment_process_list', 'List', 'Payment Process List', 'payment_process_list', '', 'web', NULL, NULL, NULL),
(203, 'payment_process_create', 'Create', 'Payment Process Create', 'payment_process_list', '', 'web', NULL, NULL, NULL),
(204, 'payment_process_edit', 'Edit', 'Payment Process Edit', 'payment_process_list', '', 'web', NULL, NULL, NULL),
(205, 'payment_process_delete', 'Delete', 'Payment Process Delete', 'payment_process_list', '', 'web', NULL, NULL, NULL),
(206, 'payment_expenses_list', 'List', 'Payment Expenses List', 'payment_expenses_list', '', 'web', NULL, NULL, NULL),
(207, 'payment_expenses_create', 'Create', 'Payment Expenses Create', 'payment_expenses_list', '', 'web', NULL, NULL, NULL),
(208, 'payment_expenses_edit', 'Edit', 'Payment Expenses Edit', 'payment_expenses_list', '', 'web', NULL, NULL, NULL),
(209, 'payment_expenses_delete', 'Delete', 'Payment Expenses Delete', 'payment_expenses_list', '', 'web', NULL, NULL, NULL),
(210, 'receipt_request_list', 'List', 'Receipt Request List', 'receipt_request_list', '', 'web', NULL, NULL, NULL),
(211, 'receipt_request_create', 'Create', 'Receipt Request Create', 'receipt_request_list', '', 'web', NULL, NULL, NULL),
(212, 'receipt_request_edit', 'Edit', 'Receipt Request Edit', 'receipt_request_list', '', 'web', NULL, NULL, NULL),
(213, 'receipt_request_delete', 'Delete', 'Receipt Request Delete', 'receipt_request_list', '', 'web', NULL, NULL, NULL),
(214, 'receipt_process_list', 'List', 'Receipt Process List', 'receipt_process_list', '', 'web', NULL, NULL, NULL),
(215, 'receipt_process_create', 'Create', 'Receipt Process Create', 'receipt_process_list', '', 'web', NULL, NULL, NULL),
(216, 'receipt_process_edit', 'Edit', 'Receipt Process Edit', 'receipt_process_list', '', 'web', NULL, NULL, NULL),
(217, 'receipt_process_delete', 'Delete', 'Receipt Process Delete', 'receipt_process_list', '', 'web', NULL, NULL, NULL),
(218, 'receipt_income_list', 'List', 'Receipt Income List', 'receipt_income_list', '', 'web', NULL, NULL, NULL),
(219, 'receipt_income_create', 'Create', 'Receipt Income Create', 'receipt_income_list', '', 'web', NULL, NULL, NULL),
(220, 'receipt_income_edit', 'Edit', 'Receipt Income Edit', 'receipt_income_list', '', 'web', NULL, NULL, NULL),
(221, 'receipt_income_delete', 'Delete', 'Receipt Income Delete', 'receipt_income_list', '', 'web', NULL, NULL, NULL),
(222, 'advance_to_suppliers_list', 'List', 'Advance To Suppliers List', 'advance_to_suppliers_list', '', 'web', NULL, NULL, NULL),
(223, 'advance_to_suppliers_create', 'Create', 'Advance To Suppliers Create', 'advance_to_suppliers_list', '', 'web', NULL, NULL, NULL),
(224, 'advance_to_suppliers_edit', 'Edit', 'Advance To Suppliers Edit', 'advance_to_suppliers_list', '', 'web', NULL, NULL, NULL),
(225, 'advance_to_suppliers_delete', 'Delete', 'Advance To Suppliers Delete', 'advance_to_suppliers_list', '', 'web', NULL, NULL, NULL),
(226, 'advance_from_customers_list', 'List', 'Advance From Customers List', 'advance_from_customers_list', '', 'web', NULL, NULL, NULL),
(227, 'advance_from_customers_create', 'Create', 'Advance From Customers Create', 'advance_from_customers_list', '', 'web', NULL, NULL, NULL),
(228, 'advance_from_customers_edit', 'Edit', 'Advance From Customers Edit', 'advance_from_customers_list', '', 'web', NULL, NULL, NULL),
(229, 'advance_from_customers_delete', 'Delete', 'Advance From Customers Delete', 'advance_from_customers_list', '', 'web', NULL, NULL, NULL),
(230, 'account_expense_list', 'List', 'Account Expense List', 'account_expense_list', '', 'web', NULL, NULL, NULL),
(231, 'account_expense_create', 'Create', 'Account Expense Create', 'account_expense_list', '', 'web', NULL, NULL, NULL),
(232, 'account_expense_edit', 'Edit', 'Account Expense Edit', 'account_expense_list', '', 'web', NULL, NULL, NULL),
(233, 'account_expense_delete', 'Delete', 'Account Expense Delete', 'account_expense_list', '', 'web', NULL, NULL, NULL),
(234, 'selling_price_setup_list', 'List', 'Selling Price Setup List', 'selling_price_setup_list', '', 'web', NULL, NULL, NULL),
(235, 'selling_price_setup_create', 'Create', 'Selling Price Setup Create', 'selling_price_setup_list', '', 'web', NULL, NULL, NULL),
(236, 'selling_price_setup_edit', 'Edit', 'Selling Price Setup Edit', 'selling_price_setup_list', '', 'web', NULL, NULL, NULL),
(237, 'selling_price_setup_delete', 'Delete', 'Selling Price Setup Delete', 'selling_price_setup_list', '', 'web', NULL, NULL, NULL),
(238, 'pos_list', 'List', 'Pos List', 'pos_list', '', 'web', NULL, NULL, NULL),
(239, 'pos_create', 'Create', 'Pos Create', 'pos_list', '', 'web', NULL, NULL, NULL),
(240, 'pos_edit', 'Edit', 'Pos Edit', 'pos_list', '', 'web', NULL, NULL, NULL),
(241, 'pos_delete', 'Delete', 'Pos Delete', 'pos_list', '', 'web', NULL, NULL, NULL),
(242, 'day_book_list', 'List', 'Day Book List', 'day_book_list', '', 'web', NULL, NULL, NULL),
(243, 'day_book_create', 'Create', 'Day Book Create', 'day_book_list', '', 'web', NULL, NULL, NULL),
(244, 'day_book_edit', 'Edit', 'Day Book Edit', 'day_book_list', '', 'web', NULL, NULL, NULL),
(245, 'day_book_delete', 'Delete', 'Day Book Delete', 'day_book_list', '', 'web', NULL, NULL, NULL),
(246, 'stock_report_list', 'List', 'Stock Report List', 'stock_report_list', '', 'web', NULL, NULL, NULL),
(247, 'stock_report_create', 'Create', 'Stock Report Create', 'stock_report_list', '', 'web', NULL, NULL, NULL),
(248, 'stock_report_edit', 'Edit', 'Stock Report Edit', 'stock_report_list', '', 'web', NULL, NULL, NULL),
(249, 'stock_report_delete', 'Delete', 'Stock Report Delete', 'stock_report_list', '', 'web', NULL, NULL, NULL),
(250, 'stock_summary_list', 'List', 'Stock Summary List', 'stock_summary_list', '', 'web', NULL, NULL, NULL),
(251, 'stock_summary_create', 'Create', 'Stock Summary Create', 'stock_summary_list', '', 'web', NULL, NULL, NULL),
(252, 'stock_summary_edit', 'Edit', 'Stock Summary Edit', 'stock_summary_list', '', 'web', NULL, NULL, NULL),
(253, 'stock_summary_delete', 'Delete', 'Stock Summary Delete', 'stock_summary_list', '', 'web', NULL, NULL, NULL),
(254, 'stock_ageing_list', 'List', 'Stock Ageing List', 'stock_ageing_list', '', 'web', NULL, NULL, NULL),
(255, 'stock_ageing_create', 'Create', 'Stock Ageing Create', 'stock_ageing_list', '', 'web', NULL, NULL, NULL),
(256, 'stock_ageing_edit', 'Edit', 'Stock Ageing Edit', 'stock_ageing_list', '', 'web', NULL, NULL, NULL),
(257, 'stock_ageing_delete', 'Delete', 'Stock Ageing Delete', 'stock_ageing_list', '', 'web', NULL, NULL, NULL),
(258, 'individual_report_list', 'List', 'Individual Report List', 'individual_report_list', '', 'web', NULL, NULL, NULL),
(259, 'individual_report_create', 'Create', 'Individual Report Create', 'individual_report_list', '', 'web', NULL, NULL, NULL),
(260, 'individual_report_edit', 'Edit', 'Individual Report Edit', 'individual_report_list', '', 'web', NULL, NULL, NULL),
(261, 'individual_report_delete', 'Delete', 'Individual Report Delete', 'individual_report_list', '', 'web', NULL, NULL, NULL),
(262, 'gst_report_list', 'List', 'Gst Report List', 'gst_report_list', '', 'web', NULL, NULL, NULL),
(263, 'gst_report_create', 'Create', 'Gst Report Create', 'gst_report_list', '', 'web', NULL, NULL, NULL),
(264, 'gst_report_edit', 'Edit', 'Gst Report Edit', 'gst_report_list', '', 'web', NULL, NULL, NULL),
(265, 'gst_report_delete', 'Delete', 'Gst Report Delete', 'gst_report_list', '', 'web', NULL, NULL, NULL),
(266, 'selling_price_setting_list', 'List', 'Selling Price Setting List', 'selling_price_list', '', 'web', NULL, NULL, NULL),
(267, 'selling_price_setting_create', 'Create', 'Selling Price Setting Create', 'selling_price_list', '', 'web', NULL, NULL, NULL),
(268, 'selling_price_setting_edit', 'Edit', 'Selling Price Setting Edit', 'selling_price_list', '', 'web', NULL, NULL, NULL),
(269, 'selling_price_setting_delete', 'Delete', 'Selling Price Setting Delete', 'selling_price_list', '', 'web', NULL, NULL, NULL),
(270, 'mail_settings_list', 'List', 'Mail Settings List', 'mail_settings_list', '', 'web', NULL, NULL, NULL),
(271, 'mail_settings_create', 'Create', 'Mail Settings Create', 'mail_settings_list', '', 'web', NULL, NULL, NULL),
(272, 'mail_settings_edit', 'Edit', 'Mail Settings Edit', 'mail_settings_list', '', 'web', NULL, NULL, NULL),
(273, 'mail_settings_delete', 'Delete', 'Mail Settings Delete', 'mail_settings_list', '', 'web', NULL, NULL, NULL),
(274, 'company_location_list', 'List', 'Company Location', 'company_location_list', '', 'web', NULL, NULL, NULL),
(275, 'company_location_create', 'Create', 'Company Location Create', 'company_location_list', '', 'web', NULL, NULL, NULL),
(276, 'company_location_edit', 'Edit', 'Company Location Edit', 'company_location_list', '', 'web', NULL, NULL, NULL),
(277, 'company_location_delete', 'Delete', 'Company Location Delete', 'company_location_list', '', 'web', NULL, NULL, NULL),
(278, 'head_office_detail_list', 'List', 'Head Office Detail List', 'head_office_detail_list', '', 'web', NULL, NULL, NULL),
(279, 'head_office_detail_list_create', 'Create', 'Head Office Detail Create', 'head_office_detail_list', '', 'web', NULL, NULL, NULL),
(280, 'head_office_detail_list_edit', 'Edit', 'Head Office Detail Edit', 'head_office_detail_list', '', 'web', NULL, NULL, NULL),
(281, 'head_office_detail_list_delete', 'Delete', 'Head Office Detail Delete', 'head_office_detail_list', '', 'web', NULL, NULL, NULL),
(282, 'offers_list', 'List', 'Offers List', 'offers_list', '', 'web', NULL, NULL, NULL),
(283, 'offers_list_create', 'Create', 'Offers List Create', 'offers_list', '', 'web', NULL, NULL, NULL),
(284, 'offers_list_edit', 'Edit', 'Offers List Edit', 'offers_list', '', 'web', NULL, NULL, NULL),
(285, 'offers_list_delete', 'Delete', 'Offers List Delete', 'offers_list', '', 'web', NULL, NULL, NULL),
(286, 'tax_list', 'List', 'Tax List', 'tax_list', '', 'web', NULL, NULL, NULL),
(287, 'tax_create', 'Create', 'Tax Create', 'tax_list', '', 'web', NULL, NULL, NULL),
(288, 'tax_edit', 'Edit', 'Tax Edit', 'tax_list', '', 'web', NULL, NULL, NULL),
(289, 'tax_delete', 'Delete', 'Tax Delete', 'tax_list', '', 'web', NULL, NULL, NULL),
(290, 'item_list', 'List', 'Item List', 'item_list', '', 'web', NULL, NULL, NULL),
(291, 'item_create', 'Create', 'Item Create', 'item_list', '', 'web', NULL, NULL, NULL),
(292, 'item_edit', 'Edit', 'Item Edit', 'item_list', '', 'web', NULL, NULL, NULL),
(293, 'item_delete', 'Delete', 'Item Delete', 'item_list', '', 'web', NULL, NULL, NULL),
(294, 'salesman_list', 'List', 'Salesman List', 'salesman_list', '', 'web', NULL, NULL, NULL),
(295, 'salesman_create', 'Create', 'Salesman Create', 'salesman_list', '', 'web', NULL, NULL, NULL),
(296, 'salesman_edit', 'Edit', 'Salesman Edit', 'salesman_list', '', 'web', NULL, NULL, NULL),
(297, 'salesman_delte', 'Delete', 'Salesman Delete', 'salesman_list', '', 'web', NULL, NULL, NULL),
(302, 'account_group_list', 'List', 'Account Group List', 'account_group_list', NULL, 'web', NULL, NULL, NULL),
(303, 'account_group_create', 'Create', 'Account Group Create', 'account_group_list', NULL, 'web', NULL, NULL, NULL),
(304, 'account_group_edit', 'Edit', 'Account Group Edit', 'account_group_list', NULL, 'web', NULL, NULL, NULL),
(305, 'account_group_delete', 'Delete', 'Account Group Delete', 'account_group_list', NULL, 'web', NULL, NULL, NULL),
(306, 'account_head_list', 'List', 'Account Head List', 'account_head_list', NULL, 'web', NULL, NULL, NULL),
(307, 'account_head_create', 'Create', 'Account Head Create', 'account_head_list', NULL, 'web', NULL, NULL, NULL),
(308, 'account_head_edit', 'Edit', 'Account Group Edit', 'account_head_list', NULL, 'web', NULL, NULL, NULL),
(309, 'account_head_delete', 'Delete', 'Account Group Delete', 'account_head_list', NULL, 'web', NULL, NULL, NULL),
(310, 'account_group_tax_list', 'List', 'Account Group Tax List', 'account_group_tax_list', NULL, 'web', NULL, NULL, NULL),
(311, 'account_group_tax_create', 'Create', 'Account Group Tax Create', 'account_group_tax_list', NULL, 'web', NULL, NULL, NULL),
(312, 'account_group_tax_edit', 'Edit', 'Account Group Tax Edit', 'account_group_tax_list', NULL, 'web', NULL, NULL, NULL),
(313, 'account_group_tax_delete', 'Delete', 'Account Group Tax Delete', 'account_group_tax_list', NULL, 'web', NULL, NULL, NULL),
(314, 'price_updation_list', 'List', 'Price Updation List', 'price_updation_list', NULL, 'web', NULL, NULL, NULL),
(315, 'price_updation_create', 'Create', 'Price Updation Create', 'price_updation_list', NULL, 'web', NULL, NULL, NULL),
(316, 'price_updation_edit', 'Edit', 'Price Updation Edit', 'price_updation_list', NULL, 'web', NULL, NULL, NULL),
(317, 'price_updation_delete', 'Delete', 'Price Updation Delete', 'price_updation_list', NULL, 'web', NULL, NULL, NULL),
(318, 'billwise_receivables', 'Billwise Receivables', 'Billwise Receivables', 'billwise_receivables', NULL, 'web', NULL, NULL, NULL),
(319, 'partywise_receivables', 'Partywise Receivables', 'Partywise Receivables', 'partywise_receivables', NULL, 'web', NULL, NULL, NULL),
(320, 'payable_billwise', 'Billwise Payables', 'Billwise Payables', 'payable_billwise', NULL, 'web', NULL, NULL, NULL),
(321, 'payable_partywise', 'Partywise Payables', 'Partywise Payables', 'payable_partywise', NULL, 'web', NULL, NULL, NULL),
(322, 'selling_price_setup', 'Selling Price Setup', 'Selling Price Setup', 'selling_price_setup', NULL, 'web', NULL, NULL, NULL),
(323, 'daybook', 'Day Book', 'Day Book', 'daybook', NULL, 'web', NULL, NULL, NULL),
(324, 'individual_ledger', 'Individual Ledger', 'Individual Ledger', 'individual_ledger', NULL, 'web', NULL, NULL, NULL),
(325, 'gst_report', 'Gst Report', 'Gst Report', 'gst_report', NULL, 'web', NULL, NULL, NULL),
(326, 'stock_report', 'Stock Report', 'Stock Report', 'stock_report', NULL, 'web', NULL, NULL, NULL),
(327, 'stock_summary', 'Stock Summary', 'Stock Summary', 'stock_summary', NULL, 'web', NULL, NULL, NULL),
(328, 'stock_ageing', 'Stock Ageing', 'Stock Ageing', 'stock_ageing', NULL, 'web', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `sale_type` tinyint(1) DEFAULT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `no_item` int NOT NULL,
  `no_qty` int NOT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled\r\n',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `so_no`, `so_date`, `estimation_no`, `estimation_date`, `customer_id`, `salesman_id`, `location`, `sale_type`, `overall_discount`, `round_off`, `total_net_value`, `no_item`, `no_qty`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(1, '1', '2020-12-30', NULL, NULL, 2, NULL, NULL, NULL, NULL, '0', '20.00', 1, 1, 0, 1, '2020-12-30 10:47:55', '2020-12-30 10:47:55'),
(2, '2', '2020-12-30', NULL, NULL, 2, NULL, NULL, NULL, NULL, '0', '20.00', 1, 1, 0, 1, '2020-12-30 10:50:49', '2020-12-30 10:50:49'),
(3, '3', '2020-12-30', NULL, NULL, 4, NULL, NULL, NULL, NULL, '0', '200.00', 1, 1, 0, 1, '2020-12-30 10:57:02', '2020-12-30 10:57:02'),
(4, '4', '2020-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '200.00', 0, 1, 0, 1, '2020-12-30 11:52:26', '2020-12-30 11:52:26'),
(5, '5', '2020-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '20.00', 0, 1, 0, 1, '2020-12-30 12:59:09', '2020-12-30 12:59:09'),
(6, '6', '2020-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0.00', 0, 0, 0, 1, '2020-12-30 13:00:55', '2020-12-30 13:00:55'),
(7, '7', '2020-12-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '200.00', 0, 1, 0, 1, '2020-12-30 14:37:15', '2020-12-30 14:37:15'),
(8, '8', '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '210.00', 3, 0, 0, 1, '2021-01-19 10:02:38', '2021-01-19 10:02:38'),
(9, '9', '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '433.00', 2, 0, 0, 1, '2021-01-19 10:15:35', '2021-01-19 10:15:35'),
(10, '10', '2021-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+0.44', '443.56', 2, 0, 0, 1, '2021-01-19 10:16:32', '2021-01-19 10:16:32'),
(11, '11', '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '200.00', 1, 0, 0, 1, '2021-01-20 07:04:03', '2021-01-20 07:04:03'),
(12, '12', '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '200.00', 1, 0, 0, 1, '2021-01-20 07:08:06', '2021-01-20 07:08:06'),
(13, '13', '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+0.44', '443.56', 2, 0, 0, 1, '2021-01-20 12:35:00', '2021-01-20 12:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_expenses`
--

CREATE TABLE `pos_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_items`
--

CREATE TABLE `pos_items` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) DEFAULT NULL,
  `rate_inclusive_tax` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `tot_amt` decimal(10,2) DEFAULT NULL,
  `uom_id` bigint UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 => free item, 0 => not a free item',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_masters`
--

CREATE TABLE `pos_masters` (
  `id` bigint NOT NULL,
  `pos_no` bigint DEFAULT NULL,
  `pos_name` varchar(200) DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pos_masters`
--

INSERT INTO `pos_masters` (`id`, `pos_no`, `pos_name`, `location_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'Test', 3, '2021-06-02 12:52:49', '2021-06-07 17:46:01'),
(5, 2, 'New Pos', 1, '2021-06-07 17:46:20', '2021-06-07 17:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `pos_payments`
--

CREATE TABLE `pos_payments` (
  `id` int NOT NULL,
  `pos_no` varchar(255) DEFAULT NULL,
  `pos_date` date DEFAULT NULL,
  `customer` bigint DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `cash_remark` varchar(50) DEFAULT NULL,
  `card` decimal(10,2) DEFAULT NULL,
  `card_remark` varchar(50) DEFAULT NULL,
  `cheque` varchar(50) DEFAULT NULL,
  `cheque_remark` varchar(50) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `voucher` decimal(10,2) DEFAULT NULL,
  `voucher_remark` varchar(50) DEFAULT NULL,
  `cleared_status` int DEFAULT '0' COMMENT '0 => uncleared cheque, 1 =>cleared cheque, 2 => returned cheque',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pos_payments`
--

INSERT INTO `pos_payments` (`id`, `pos_no`, `pos_date`, `customer`, `cash`, `cash_remark`, `card`, `card_remark`, `cheque`, `cheque_remark`, `cheque_date`, `voucher`, `voucher_remark`, `cleared_status`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '100.00', NULL, '50.00', NULL, '1', NULL, NULL, '14.00', NULL, 0, '2021-06-18 20:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `pos_taxes`
--

CREATE TABLE `pos_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_levels`
--

CREATE TABLE `price_levels` (
  `id` bigint NOT NULL,
  `level` varchar(250) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `price_levels`
--

INSERT INTO `price_levels` (`id`, `level`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Price level 3', 0, '30.00', '2021-06-11 09:34:20', '2021-06-11 09:34:20'),
(2, 'Price level 1', 0, '200.00', '2021-01-09 05:34:46', '2021-06-11 09:36:05'),
(3, 'Price Level 2', 0, '20.00', '2021-01-09 06:15:17', '2021-01-09 06:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `price_updations`
--

CREATE TABLE `price_updations` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `date` date DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `mark_up_type` int DEFAULT NULL COMMENT '1 => Percentage, 2 => Rupees',
  `mark_up_value` decimal(10,2) DEFAULT NULL,
  `mark_down_type` int DEFAULT NULL COMMENT '1 => Percent, 2 => Rupees',
  `mark_down_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>Not Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_updations`
--

INSERT INTO `price_updations` (`id`, `p_no`, `item_id`, `date`, `effective_from`, `mark_up_type`, `mark_up_value`, `mark_down_type`, `mark_down_value`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2021-06-12', '2021-06-12', NULL, NULL, 2, '2.00', 1, '2021-06-12 10:13:10', '2021-06-12 10:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint NOT NULL,
  `location_id` bigint DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `item_id` bigint DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `uom_id` bigint DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `account_group_id` varchar(100) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `location_id`, `production_date`, `item_id`, `quantity`, `uom_id`, `amount`, `account_group_id`, `remark`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2021-06-14', 1, 2, 1, '100', '3', NULL, 0, 0, '2021-06-14 11:22:50', '2021-06-14 11:22:50', NULL),
(2, 3, '2021-06-15', 1, 2, 1, '', '3', NULL, 0, 0, '2021-06-14 11:23:19', '2021-06-14 11:23:44', '2021-06-14 11:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `promised_discounts`
--

CREATE TABLE `promised_discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `discount_type` enum('amount','percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL COMMENT 'If Discount Type is Amount Means Discount Amount Will be Stored otherwise Discount Percentage Will be Stored',
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proof_details`
--

CREATE TABLE `proof_details` (
  `id` bigint UNSIGNED NOT NULL,
  `proof_table` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier',
  `proof_ref_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proof_details`
--

INSERT INTO `proof_details` (`id`, `proof_table`, `proof_ref_id`, `name`, `number`, `file`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Agent', 2, 'test', '7598632589', '2020-05-171589728585.Screenshot (4).png', 1, 0, 0, '2020-05-17 15:16:24', '2020-05-17 15:16:24', NULL),
(2, 'Agent', 3, 'hjh', '454', '2020-06-151592217815.Screenshot (6).png', 1, 0, 0, '2020-06-15 10:43:35', '2020-06-15 10:43:35', NULL),
(3, 'Agent', 4, 'ttttt', '4586', '2020-06-181592470577.Screenshot (5).png', 1, 0, 0, '2020-06-18 08:56:17', '2020-06-18 08:56:17', NULL),
(4, 'Agent', 5, '34fgf45', '5gh67hfg0y8', '2020-09-011598955444.Screenshot (60).png', 1, 0, 0, '2020-09-01 10:17:24', '2020-09-01 10:17:24', NULL),
(5, 'Emp', 2, 'Suhail', '7777', '2020-11-251606281579.Screenshot (17).png', 1, 0, 0, '2020-11-25 05:19:39', '2020-11-25 05:19:39', NULL),
(6, 'Emp', 3, 'Asas', '1255884', '2021-01-061609922619.ajay resume-converted.pdf', 1, 0, 0, '2021-01-06 08:43:39', '2021-01-06 08:43:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `gatepass_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_exclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_inclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entries`
--

CREATE TABLE `purchase_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `receipt_tag` tinyint(1) DEFAULT NULL COMMENT '1 => Receipt Note Is Taged, 0 => Receipt Note Is Not Taged',
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_remaining_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1 =>Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_entries`
--

INSERT INTO `purchase_entries` (`id`, `voucher_no`, `p_no`, `p_date`, `po_no`, `po_date`, `estimation_no`, `estimation_date`, `rn_no`, `rn_date`, `receipt_tag`, `supplier_id`, `location`, `overall_discount`, `round_off`, `total_qty`, `total_remaining_qty`, `total_net_value`, `status`, `active`, `cancel_status`, `created_at`, `updated_at`) VALUES
(4, '2', 'PE2EY', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 2, '0.00', '+0.50', NULL, NULL, '136.50', NULL, 1, 0, '2021-06-11 15:50:56', '2021-06-11 15:51:10'),
(5, '3', 'PE3EY', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 2, '0.00', '+0.45', NULL, NULL, '137.55', NULL, 1, 0, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(6, '4', 'PE4EY', '2021-06-14', NULL, NULL, 'EST5NO', '2021-06-11', NULL, NULL, 0, 2, 3, '0.00', '0', NULL, NULL, '155.00', NULL, 1, 0, '2021-06-14 09:32:20', '2021-06-14 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_betas`
--

CREATE TABLE `purchase_entry_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `receipt_tag` tinyint(1) DEFAULT NULL COMMENT '1 => Receipt Note Is Taged, 0 => Receipt Note Is Not Taged',
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_remaining_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1 =>Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_beta_expenses`
--

CREATE TABLE `purchase_entry_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_date` date NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_beta_items`
--

CREATE TABLE `purchase_entry_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `actual_item_id` bigint DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `r_out_debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free_for` bigint UNSIGNED DEFAULT NULL,
  `is_free` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_beta_taxes`
--

CREATE TABLE `purchase_entry_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_expenses`
--

CREATE TABLE `purchase_entry_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_date` date NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_entry_expenses`
--

INSERT INTO `purchase_entry_expenses` (`id`, `p_no`, `p_date`, `po_no`, `po_date`, `estimation_no`, `estimation_date`, `rn_no`, `rn_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(3, 'PE4EY', '2021-06-14', NULL, NULL, 'EST5NO', '2021-06-11', NULL, NULL, 5, '10.00', 1, '2021-06-14 09:32:20', '2021-06-14 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_items`
--

CREATE TABLE `purchase_entry_items` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `actual_item_id` bigint DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `r_out_debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free_for` bigint UNSIGNED DEFAULT NULL,
  `is_free` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_entry_items`
--

INSERT INTO `purchase_entry_items` (`id`, `p_no`, `p_date`, `po_no`, `po_date`, `estimation_no`, `estimation_date`, `rn_no`, `rn_date`, `r_out_no`, `r_out_date`, `item_sno`, `item_id`, `actual_item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `actual_qty`, `qty`, `rejected_qty`, `remaining_rejected_qty`, `remaining_qty`, `debited_qty`, `r_out_debited_qty`, `remaining_after_debit`, `remarks`, `uom_id`, `discount`, `overall_disc`, `expenses`, `b_or_w`, `active`, `free_for`, `is_free`, `created_at`, `updated_at`) VALUES
(4, 'PE2EY', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 5.00, '130.00', '136.50', 1, 1, 0, NULL, 1, 0, 0, 1, NULL, 1, '0.00', '0.00', '0.00', NULL, 1, 0, 0, '2021-06-11 15:50:56', '2021-06-11 15:50:56'),
(5, 'PE3EY', '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 5.00, '131.00', '137.55', 1, 1, 0, NULL, 1, 0, 0, 1, NULL, 1, '0.00', '0.00', '0.00', NULL, 1, 0, 0, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(6, 'PE4EY', '2021-06-14', NULL, NULL, 'EST5NO', '2021-06-11', NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 5.00, '138.10', '145.00', 1, 1, 0, NULL, 1, 0, 0, 1, NULL, 1, '0.00', '0.00', '10.00', NULL, 1, NULL, 0, '2021-06-14 09:32:20', '2021-06-14 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_entry_taxes`
--

CREATE TABLE `purchase_entry_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_entry_taxes`
--

INSERT INTO `purchase_entry_taxes` (`id`, `p_no`, `p_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(13, 'PE2EY', '2021-06-11', 1, '5.00', 1, '2021-06-11 15:50:56', '2021-06-11 15:50:56'),
(14, 'PE2EY', '2021-06-11', 2, '2.50', 1, '2021-06-11 15:50:56', '2021-06-11 15:50:56'),
(15, 'PE2EY', '2021-06-11', 3, '2.50', 1, '2021-06-11 15:50:56', '2021-06-11 15:50:56'),
(16, 'PE2EY', '2021-06-11', 4, '0.00', 1, '2021-06-11 15:50:56', '2021-06-11 15:50:56'),
(17, 'PE3EY', '2021-06-11', 1, '5.00', 1, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(18, 'PE3EY', '2021-06-11', 2, '2.50', 1, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(19, 'PE3EY', '2021-06-11', 3, '2.50', 1, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(20, 'PE3EY', '2021-06-11', 4, '0.00', 1, '2021-06-11 16:06:13', '2021-06-11 16:06:13'),
(21, 'PE4EY', '2021-06-14', 1, '0.00', 1, '2021-06-14 09:32:20', '2021-06-14 09:32:20'),
(22, 'PE4EY', '2021-06-14', 2, '0.00', 1, '2021-06-14 09:32:20', '2021-06-14 09:32:20'),
(23, 'PE4EY', '2021-06-14', 3, '0.00', 1, '2021-06-14 09:32:20', '2021-06-14 09:32:20'),
(24, 'PE4EY', '2021-06-14', 4, '0.00', 1, '2021-06-14 09:32:20', '2021-06-14 09:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_gatepass_entries`
--

CREATE TABLE `purchase_gatepass_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_gatepass_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_gatepass_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `load_bill` decimal(8,2) DEFAULT NULL,
  `unload_bill` decimal(8,2) DEFAULT NULL,
  `load_live` decimal(8,2) DEFAULT NULL,
  `unload_live` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_betas`
--

CREATE TABLE `purchase_order_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `purchase_type` tinyint(1) NOT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Canceled, 1=> Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_beta_expenses`
--

CREATE TABLE `purchase_order_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_date` date NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date NOT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_beta_items`
--

CREATE TABLE `purchase_order_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_beta_taxes`
--

CREATE TABLE `purchase_order_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_expenses`
--

CREATE TABLE `purchase_order_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_date` date NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimation_date` date NOT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_taxes`
--

CREATE TABLE `purchase_order_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_voucher_types`
--

CREATE TABLE `purchase_voucher_types` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `starting_no` double DEFAULT NULL,
  `updated_no` varchar(255) DEFAULT NULL,
  `no_digits` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_voucher_types`
--

INSERT INTO `purchase_voucher_types` (`id`, `name`, `type`, `prefix`, `suffix`, `starting_no`, `updated_no`, `no_digits`, `created_at`, `updated_at`) VALUES
(1, 'Estimation', 'Est', 'EST', 'NO', 1, '5', 3, '2021-06-11 11:30:39', '2021-06-11 15:23:34'),
(2, 'Purchase Order', 'Type 1', 'PO', 'NO', 0, '0001', 4, '2021-06-11 15:04:57', '2021-06-11 15:28:32'),
(3, 'Receipt Note', 'Type 1', 'RN', 'NO', 0, '1', 3, '2021-06-11 15:06:12', '2021-06-11 15:38:37'),
(4, 'Purchase Entry', 'Type 1', 'PE', 'EY', 0, '4', 3, '2021-06-11 15:06:44', '2021-06-14 09:32:20'),
(5, 'Rejection Out', 'Type 1', 'RO', 'NO', 0, '0', 4, '2021-06-11 15:07:51', '2021-06-11 15:07:51'),
(6, 'Debit Note', 'Type 1', 'DN', 'Note', 0, '0', 4, '2021-06-11 15:08:29', '2021-06-11 15:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchase__details`
--

CREATE TABLE `purchase__details` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gate_pass_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_note_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase__orders`
--

CREATE TABLE `purchase__orders` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `purchase_type` tinyint(1) NOT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Canceled, 1=> Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_notes`
--

CREATE TABLE `receipt_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `receipt_tag` tinyint(1) DEFAULT '0' COMMENT '1 => Selected In Purchase Entry Table, 0 => Not Selected In Purchase Entry Table',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_betas`
--

CREATE TABLE `receipt_note_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `receipt_tag` tinyint(1) DEFAULT '0' COMMENT '1 => Selected In Purchase Entry Table, 0 => Not Selected In Purchase Entry Table',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_beta_expenses`
--

CREATE TABLE `receipt_note_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rn_date` date NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_beta_items`
--

CREATE TABLE `receipt_note_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `remaining_qty` int DEFAULT NULL,
  `rejected_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_beta_taxes`
--

CREATE TABLE `receipt_note_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_expenses`
--

CREATE TABLE `receipt_note_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rn_date` date NOT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_items`
--

CREATE TABLE `receipt_note_items` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `po_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `r_out_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `remaining_qty` int DEFAULT NULL,
  `rejected_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_note_taxes`
--

CREATE TABLE `receipt_note_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_processes`
--

CREATE TABLE `receipt_processes` (
  `id` int NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `voucher_date` date DEFAULT NULL,
  `customer_id` int NOT NULL,
  `receipt_request_id` int DEFAULT NULL,
  `ledger` tinyint DEFAULT NULL,
  `s_no` varchar(11) NOT NULL,
  `receipt_amount` decimal(10,2) NOT NULL,
  `payment_mode` tinyint NOT NULL,
  `payment_date` date DEFAULT NULL,
  `reference_no` int DEFAULT NULL,
  `net_value` decimal(10,2) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `active_status` tinyint NOT NULL,
  `cleared_status` int DEFAULT '0' COMMENT '0 => uncleared cheque, 1 =>cleared cheque, 2 => returned cheque',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receipt_processes`
--

INSERT INTO `receipt_processes` (`id`, `voucher_no`, `voucher_date`, `customer_id`, `receipt_request_id`, `ledger`, `s_no`, `receipt_amount`, `payment_mode`, `payment_date`, `reference_no`, `net_value`, `remarks`, `active_status`, `cleared_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'SE0002ENTRY', '2021-06-18', 2, NULL, NULL, 'SE0002ENTRY', '200.00', 1, NULL, NULL, '200.00', NULL, 1, 0, 0, 0, NULL, '2021-06-18 17:38:50', '2021-06-18 17:38:50', NULL),
(4, 'SE0003ENTRY', '2021-06-18', 2, NULL, NULL, 'SE0003ENTRY', '300.00', 1, NULL, NULL, '300.00', NULL, 1, 0, 0, 0, NULL, '2021-06-18 17:44:01', '2021-06-18 17:44:01', NULL),
(5, 'RP0002NO', NULL, 2, NULL, 2, 'SE0001ENTRY', '45.00', 1, NULL, NULL, '45.00', NULL, 1, 0, 0, 0, NULL, '2021-06-19 11:29:24', '2021-06-19 11:29:24', NULL),
(6, 'RP0003NO', NULL, 2, NULL, 1, 'SE0001ENTRY', '20.00', 1, NULL, NULL, '20.00', NULL, 1, 0, 0, 0, NULL, '2021-06-19 11:30:00', '2021-06-19 11:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_process_adjustments`
--

CREATE TABLE `receipt_process_adjustments` (
  `id` int NOT NULL,
  `receipt_process_id` varchar(20) NOT NULL,
  `advance_receipt_no` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `active_status` tinyint NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_requests`
--

CREATE TABLE `receipt_requests` (
  `id` int NOT NULL,
  `request_no` int NOT NULL,
  `request_date` date DEFAULT NULL,
  `supplier_id` int NOT NULL,
  `ledger` tinyint NOT NULL,
  `sales_id` int NOT NULL,
  `request_amount` decimal(10,2) NOT NULL,
  `active_status` tinyint NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_voucher_types`
--

CREATE TABLE `receipt_voucher_types` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `starting_no` double DEFAULT NULL,
  `updated_no` varchar(255) DEFAULT NULL,
  `no_digits` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receipt_voucher_types`
--

INSERT INTO `receipt_voucher_types` (`id`, `name`, `type`, `prefix`, `suffix`, `starting_no`, `updated_no`, `no_digits`, `created_at`, `updated_at`) VALUES
(1, 'Receipt Request', 'Type 1', 'RR', 'RQ', 1, '1', 4, '2021-06-11 14:15:16', '2021-06-11 14:15:27'),
(2, 'Receipt Process', 'Type 1', 'RP', 'NO', 1, '0003', 4, '2021-06-11 17:35:31', '2021-06-19 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_ins`
--

CREATE TABLE `rejection_ins` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `cancel_status` tinyint(1) DEFAULT '0' COMMENT '0 =>Not cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejection_ins`
--

INSERT INTO `rejection_ins` (`id`, `voucher_no`, `r_in_no`, `r_in_date`, `s_no`, `s_date`, `d_no`, `d_date`, `customer_id`, `salesman_id`, `location`, `overall_discount`, `round_off`, `total_net_value`, `status`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(1, '0001', 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 2, 1, 2, '0.00', '0', '295.00', 0, 0, 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_betas`
--

CREATE TABLE `rejection_in_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `cancel_status` tinyint(1) DEFAULT '0' COMMENT '0 =>Not cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_beta_expenses`
--

CREATE TABLE `rejection_in_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_in_date` date NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_beta_items`
--

CREATE TABLE `rejection_in_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `r_in_credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `free` tinyint(1) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_beta_taxes`
--

CREATE TABLE `rejection_in_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_expenses`
--

CREATE TABLE `rejection_in_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_in_date` date NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejection_in_expenses`
--

INSERT INTO `rejection_in_expenses` (`id`, `r_in_no`, `r_in_date`, `s_no`, `s_date`, `d_no`, `d_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(1, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 5, '200.00', 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_items`
--

CREATE TABLE `rejection_in_items` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `r_in_credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `free` tinyint(1) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejection_in_items`
--

INSERT INTO `rejection_in_items` (`id`, `r_in_no`, `r_in_date`, `s_no`, `s_date`, `d_no`, `d_date`, `item_sno`, `item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `actual_qty`, `qty`, `rejected_qty`, `remaining_qty`, `actual_rejected_qty`, `credited_qty`, `r_in_credited_qty`, `remaining_after_credit`, `remarks`, `uom_id`, `discount`, `overall_disc`, `expenses`, `free`, `b_or_w`, `active`, `created_at`, `updated_at`) VALUES
(1, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, '1', 1, 150.00, 5.00, '90.48', '95.00', 1, 1, 1, 0, 1, 1, NULL, NULL, NULL, 1, '0.00', '0.00', '200.00', 0, NULL, 1, '2021-06-11 16:55:34', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_in_taxes`
--

CREATE TABLE `rejection_in_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `r_in_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `d_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejection_in_taxes`
--

INSERT INTO `rejection_in_taxes` (`id`, `r_in_no`, `r_in_date`, `s_no`, `s_date`, `d_no`, `d_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(1, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 1, '5.00', 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34'),
(2, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 2, '5.00', 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34'),
(3, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 3, '5.00', 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34'),
(4, 'RIN0001NO', '2021-06-11', 'SE0001ENTRY', '2021-06-11', NULL, NULL, 4, '0.00', 1, '2021-06-11 16:55:34', '2021-06-11 16:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `rejection_outs`
--

CREATE TABLE `rejection_outs` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` int DEFAULT '0',
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_betas`
--

CREATE TABLE `rejection_out_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `status` int DEFAULT '0',
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_beta_expenses`
--

CREATE TABLE `rejection_out_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_out_date` date NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_beta_items`
--

CREATE TABLE `rejection_out_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `r_out_debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_beta_taxes`
--

CREATE TABLE `rejection_out_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_expenses`
--

CREATE TABLE `rejection_out_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_out_date` date NOT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_items`
--

CREATE TABLE `rejection_out_items` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `debited_qty` int DEFAULT NULL,
  `r_out_debited_qty` int DEFAULT NULL,
  `remaining_after_debit` int DEFAULT NULL,
  `actual_rejected_qty` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_out_taxes`
--

CREATE TABLE `rejection_out_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `r_out_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_out_date` date DEFAULT NULL,
  `p_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `rn_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rn_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'web', '2021-06-10 12:56:30', '2021-06-10 12:56:30', NULL),
(2, 'Employee', 'web', '2021-06-10 12:57:13', '2021-06-10 12:57:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` int NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `permission_id`, `role_id`, `deleted_at`) VALUES
(487, 1, 3, NULL),
(488, 2, 3, NULL),
(489, 3, 3, NULL),
(490, 4, 3, NULL),
(491, 1, 1, NULL),
(492, 2, 1, NULL),
(493, 3, 1, NULL),
(494, 4, 1, NULL),
(495, 5, 1, NULL),
(496, 6, 1, NULL),
(497, 7, 1, NULL),
(498, 8, 1, NULL),
(499, 9, 1, NULL),
(500, 10, 1, NULL),
(501, 11, 1, NULL),
(502, 12, 1, NULL),
(503, 17, 1, NULL),
(504, 18, 1, NULL),
(505, 19, 1, NULL),
(506, 20, 1, NULL),
(507, 13, 1, NULL),
(508, 14, 1, NULL),
(509, 15, 1, NULL),
(510, 16, 1, NULL),
(511, 274, 1, NULL),
(512, 275, 1, NULL),
(513, 276, 1, NULL),
(514, 277, 1, NULL),
(515, 278, 1, NULL),
(516, 279, 1, NULL),
(517, 280, 1, NULL),
(518, 281, 1, NULL),
(519, 25, 1, NULL),
(520, 26, 1, NULL),
(521, 27, 1, NULL),
(522, 28, 1, NULL),
(523, 29, 1, NULL),
(524, 30, 1, NULL),
(525, 31, 1, NULL),
(526, 32, 1, NULL),
(527, 33, 1, NULL),
(528, 34, 1, NULL),
(529, 35, 1, NULL),
(530, 36, 1, NULL),
(531, 37, 1, NULL),
(532, 38, 1, NULL),
(533, 39, 1, NULL),
(534, 40, 1, NULL),
(535, 41, 1, NULL),
(536, 42, 1, NULL),
(537, 43, 1, NULL),
(538, 44, 1, NULL),
(539, 45, 1, NULL),
(540, 46, 1, NULL),
(541, 47, 1, NULL),
(542, 48, 1, NULL),
(543, 49, 1, NULL),
(544, 50, 1, NULL),
(545, 51, 1, NULL),
(546, 52, 1, NULL),
(547, 125, 1, NULL),
(548, 126, 1, NULL),
(549, 127, 1, NULL),
(550, 128, 1, NULL),
(551, 129, 1, NULL),
(552, 130, 1, NULL),
(553, 131, 1, NULL),
(554, 132, 1, NULL),
(555, 65, 1, NULL),
(556, 66, 1, NULL),
(557, 67, 1, NULL),
(558, 68, 1, NULL),
(559, 282, 1, NULL),
(560, 283, 1, NULL),
(561, 284, 1, NULL),
(562, 285, 1, NULL),
(563, 77, 1, NULL),
(564, 78, 1, NULL),
(565, 79, 1, NULL),
(566, 80, 1, NULL),
(567, 133, 1, NULL),
(568, 134, 1, NULL),
(569, 135, 1, NULL),
(570, 136, 1, NULL),
(571, 73, 1, NULL),
(572, 74, 1, NULL),
(573, 75, 1, NULL),
(574, 76, 1, NULL),
(575, 113, 1, NULL),
(576, 114, 1, NULL),
(577, 115, 1, NULL),
(578, 116, 1, NULL),
(579, 286, 1, NULL),
(580, 287, 1, NULL),
(581, 288, 1, NULL),
(582, 289, 1, NULL),
(583, 69, 1, NULL),
(584, 70, 1, NULL),
(585, 71, 1, NULL),
(586, 72, 1, NULL),
(587, 121, 1, NULL),
(588, 122, 1, NULL),
(589, 123, 1, NULL),
(590, 124, 1, NULL),
(591, 93, 1, NULL),
(592, 94, 1, NULL),
(593, 95, 1, NULL),
(594, 96, 1, NULL),
(595, 97, 1, NULL),
(596, 98, 1, NULL),
(597, 99, 1, NULL),
(598, 100, 1, NULL),
(599, 101, 1, NULL),
(600, 102, 1, NULL),
(601, 103, 1, NULL),
(602, 104, 1, NULL),
(603, 294, 1, NULL),
(604, 295, 1, NULL),
(605, 296, 1, NULL),
(606, 297, 1, NULL),
(607, 105, 1, NULL),
(608, 106, 1, NULL),
(609, 107, 1, NULL),
(610, 108, 1, NULL),
(611, 302, 1, NULL),
(612, 303, 1, NULL),
(613, 304, 1, NULL),
(614, 305, 1, NULL),
(615, 306, 1, NULL),
(616, 307, 1, NULL),
(617, 308, 1, NULL),
(618, 309, 1, NULL),
(619, 310, 1, NULL),
(620, 311, 1, NULL),
(621, 312, 1, NULL),
(622, 313, 1, NULL),
(623, 141, 1, NULL),
(624, 142, 1, NULL),
(625, 144, 1, NULL),
(626, 145, 1, NULL),
(627, 146, 1, NULL),
(628, 147, 1, NULL),
(629, 148, 1, NULL),
(630, 149, 1, NULL),
(631, 150, 1, NULL),
(632, 151, 1, NULL),
(633, 152, 1, NULL),
(634, 153, 1, NULL),
(635, 154, 1, NULL),
(636, 155, 1, NULL),
(637, 156, 1, NULL),
(638, 157, 1, NULL),
(639, 158, 1, NULL),
(640, 159, 1, NULL),
(641, 160, 1, NULL),
(642, 161, 1, NULL),
(643, 162, 1, NULL),
(644, 163, 1, NULL),
(645, 164, 1, NULL),
(646, 165, 1, NULL),
(647, 166, 1, NULL),
(648, 167, 1, NULL),
(649, 168, 1, NULL),
(650, 169, 1, NULL),
(651, 170, 1, NULL),
(652, 171, 1, NULL),
(653, 172, 1, NULL),
(654, 173, 1, NULL),
(655, 174, 1, NULL),
(656, 175, 1, NULL),
(657, 176, 1, NULL),
(658, 177, 1, NULL),
(659, 178, 1, NULL),
(660, 179, 1, NULL),
(661, 180, 1, NULL),
(662, 181, 1, NULL),
(663, 182, 1, NULL),
(664, 183, 1, NULL),
(665, 184, 1, NULL),
(666, 185, 1, NULL),
(667, 186, 1, NULL),
(668, 187, 1, NULL),
(669, 188, 1, NULL),
(670, 189, 1, NULL),
(671, 190, 1, NULL),
(672, 191, 1, NULL),
(673, 192, 1, NULL),
(674, 193, 1, NULL),
(675, 194, 1, NULL),
(676, 195, 1, NULL),
(677, 196, 1, NULL),
(678, 197, 1, NULL),
(679, 198, 1, NULL),
(680, 199, 1, NULL),
(681, 200, 1, NULL),
(682, 201, 1, NULL),
(683, 202, 1, NULL),
(684, 203, 1, NULL),
(685, 204, 1, NULL),
(686, 205, 1, NULL),
(687, 206, 1, NULL),
(688, 207, 1, NULL),
(689, 208, 1, NULL),
(690, 209, 1, NULL),
(691, 210, 1, NULL),
(692, 211, 1, NULL),
(693, 212, 1, NULL),
(694, 213, 1, NULL),
(695, 214, 1, NULL),
(696, 215, 1, NULL),
(697, 216, 1, NULL),
(698, 217, 1, NULL),
(699, 218, 1, NULL),
(700, 219, 1, NULL),
(701, 220, 1, NULL),
(702, 221, 1, NULL),
(703, 222, 1, NULL),
(704, 223, 1, NULL),
(705, 224, 1, NULL),
(706, 225, 1, NULL),
(707, 226, 1, NULL),
(708, 227, 1, NULL),
(709, 228, 1, NULL),
(710, 229, 1, NULL),
(711, 230, 1, NULL),
(712, 231, 1, NULL),
(713, 232, 1, NULL),
(714, 233, 1, NULL),
(715, 314, 1, NULL),
(716, 315, 1, NULL),
(717, 316, 1, NULL),
(718, 317, 1, NULL),
(719, 318, 1, NULL),
(720, 319, 1, NULL),
(721, 320, 1, NULL),
(722, 321, 1, NULL),
(723, 322, 1, NULL),
(724, 238, 1, NULL),
(725, 239, 1, NULL),
(726, 240, 1, NULL),
(727, 241, 1, NULL),
(728, 323, 1, NULL),
(729, 326, 1, NULL),
(730, 327, 1, NULL),
(731, 328, 1, NULL),
(732, 324, 1, NULL),
(733, 325, 1, NULL),
(734, 1, 2, NULL),
(735, 2, 2, NULL),
(736, 3, 2, NULL),
(737, 4, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_man_targets`
--

CREATE TABLE `sales_man_targets` (
  `target_id` bigint UNSIGNED NOT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales_man_targets`
--

INSERT INTO `sales_man_targets` (`target_id`, `salesman_id`, `created_date`, `updated_date`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-06-12', NULL, '2021-06-12 09:58:49', '2021-06-12 09:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `sales_men`
--

CREATE TABLE `sales_men` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_men`
--

INSERT INTO `sales_men` (`id`, `name`, `code`, `address`, `phone_no`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Rishi', '45788', 'tests\r\ntesstd', '7541258965', 'rishi@gmail.com', '2021-06-10 18:54:58', '2021-06-10 18:54:58'),
(4, 'Krishna', '21544', 'address line1, lin2, near something', '5625896523', 'kr@gmail.com', '2020-09-17 09:03:28', '2021-06-10 18:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `sales_voucher_types`
--

CREATE TABLE `sales_voucher_types` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `starting_no` double DEFAULT NULL,
  `updated_no` varchar(255) DEFAULT NULL,
  `no_digits` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales_voucher_types`
--

INSERT INTO `sales_voucher_types` (`id`, `name`, `type`, `prefix`, `suffix`, `starting_no`, `updated_no`, `no_digits`, `created_at`, `updated_at`) VALUES
(1, 'Sales Estimation', 'Type 1', 'SE', 'EST', 1, '4', 3, '2021-06-11 14:08:12', '2021-06-11 16:18:39'),
(2, 'Sales Order', 'Type 1', 'SO', 'NO', 0, '2', 4, '2021-06-11 16:23:18', '2021-06-11 16:32:13'),
(3, 'Delivery Note', 'Type 1', 'DNOTE', 'NO', 0, '0001', 4, '2021-06-11 16:23:57', '2021-06-11 16:37:55'),
(4, 'Sales Entry', 'Type 1', 'SE', 'ENTRY', 0, '0003', 4, '2021-06-11 16:24:58', '2021-06-18 17:44:01'),
(5, 'Rejection In', 'Type 1', 'RIN', 'NO', 0, '0001', 4, '2021-06-11 16:25:27', '2021-06-11 16:55:34'),
(6, 'Credit Note', 'Type 1', 'CN', 'NO', 0, '0001', 4, '2021-06-11 16:25:48', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entries`
--

CREATE TABLE `sale_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `delivery_tag` tinyint(1) DEFAULT NULL COMMENT '1 => Delivery note is tagged, 0 => Delivery note is not tagged',
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_entries`
--

INSERT INTO `sale_entries` (`id`, `voucher_no`, `s_no`, `s_date`, `so_no`, `so_date`, `sale_estimation_no`, `sale_estimation_date`, `d_no`, `d_date`, `delivery_tag`, `customer_id`, `salesman_id`, `location`, `overall_discount`, `round_off`, `total_net_value`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(2, '0001', 'SE0001ENTRY', '2021-06-11', NULL, '2021-06-11', NULL, NULL, NULL, NULL, 0, 2, 1, 3, '0.00', '0', '295.00', 0, 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46'),
(3, '0002', 'SE0002ENTRY', '2021-06-18', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 4, 3, '0.00', '0', '95.00', 0, 1, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(4, '0003', 'SE0003ENTRY', '2021-06-18', NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, 1, 1, '0.00', '0', '95.00', 0, 1, '2021-06-18 17:44:01', '2021-06-18 17:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_betas`
--

CREATE TABLE `sale_entry_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `delivery_tag` tinyint(1) DEFAULT NULL COMMENT '1 => Delivery note is tagged, 0 => Delivery note is not tagged',
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_beta_expenses`
--

CREATE TABLE `sale_entry_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_date` date NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_beta_items`
--

CREATE TABLE `sale_entry_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `actual_item_id` bigint DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `r_in_credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 => free item, 0 => not a free item',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_beta_taxes`
--

CREATE TABLE `sale_entry_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_expenses`
--

CREATE TABLE `sale_entry_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_date` date NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_entry_expenses`
--

INSERT INTO `sale_entry_expenses` (`id`, `s_no`, `s_date`, `so_no`, `so_date`, `sale_estimation_no`, `sale_estimation_date`, `d_no`, `d_date`, `expense_type`, `expense_amount`, `active`, `created_at`, `updated_at`) VALUES
(2, 'SE0001ENTRY', '2021-06-11', NULL, '2021-06-11', NULL, NULL, NULL, NULL, 5, '200.00', 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_items`
--

CREATE TABLE `sale_entry_items` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `sale_estimation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `d_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_date` date DEFAULT NULL,
  `r_in_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_in_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `actual_item_id` bigint DEFAULT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `actual_qty` int DEFAULT NULL,
  `qty` int NOT NULL,
  `rejected_qty` int DEFAULT NULL,
  `remaining_rejected_qty` int DEFAULT NULL,
  `remaining_qty` int DEFAULT NULL,
  `credited_qty` int DEFAULT NULL,
  `r_in_credited_qty` int DEFAULT NULL,
  `remaining_after_credit` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `free` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 => free item, 0 => not a free item',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_entry_items`
--

INSERT INTO `sale_entry_items` (`id`, `s_no`, `s_date`, `so_no`, `so_date`, `sale_estimation_no`, `sale_estimation_date`, `d_no`, `d_date`, `r_in_no`, `r_in_date`, `item_sno`, `item_id`, `actual_item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `actual_qty`, `qty`, `rejected_qty`, `remaining_rejected_qty`, `remaining_qty`, `credited_qty`, `r_in_credited_qty`, `remaining_after_credit`, `remarks`, `uom_id`, `discount`, `overall_disc`, `expenses`, `b_or_w`, `active`, `free`, `created_at`, `updated_at`) VALUES
(2, 'SE0001ENTRY', '2021-06-11', NULL, '2021-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 5.00, '90.48', '95.00', 1, 1, 1, 0, 0, 0, 0, 1, NULL, 1, '0.00', '0.00', '200.00', NULL, 1, 0, '2021-06-11 16:42:46', '2021-06-11 17:15:36'),
(3, 'SE0002ENTRY', '2021-06-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 15.00, '82.61', '95.00', 1, 1, 0, 0, 1, 0, 0, 1, NULL, 1, '0.00', '0.00', '0.00', NULL, 1, 0, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(4, 'SE0003ENTRY', '2021-06-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 150.00, 15.00, '82.61', '95.00', 1, 1, 0, 0, 1, 0, 0, 1, NULL, 1, '0.00', '0.00', '0.00', NULL, 1, 0, '2021-06-18 17:44:01', '2021-06-18 17:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `sale_entry_taxes`
--

CREATE TABLE `sale_entry_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `s_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_entry_taxes`
--

INSERT INTO `sale_entry_taxes` (`id`, `s_no`, `s_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(5, 'SE0001ENTRY', '2021-06-11', 1, '5.00', 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46'),
(6, 'SE0001ENTRY', '2021-06-11', 2, '2.50', 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46'),
(7, 'SE0001ENTRY', '2021-06-11', 3, '2.50', 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46'),
(8, 'SE0001ENTRY', '2021-06-11', 4, '0.00', 1, '2021-06-11 16:42:46', '2021-06-11 16:42:46'),
(9, 'SE0002ENTRY', '2021-06-18', 1, '5.00', 1, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(10, 'SE0002ENTRY', '2021-06-18', 2, '2.50', 1, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(11, 'SE0002ENTRY', '2021-06-18', 3, '2.50', 1, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(12, 'SE0002ENTRY', '2021-06-18', 4, '10.00', 1, '2021-06-18 17:38:50', '2021-06-18 17:38:50'),
(13, 'SE0003ENTRY', '2021-06-18', 1, '5.00', 1, '2021-06-18 17:44:01', '2021-06-18 17:44:01'),
(14, 'SE0003ENTRY', '2021-06-18', 2, '2.50', 1, '2021-06-18 17:44:01', '2021-06-18 17:44:01'),
(15, 'SE0003ENTRY', '2021-06-18', 3, '2.50', 1, '2021-06-18 17:44:01', '2021-06-18 17:44:01'),
(16, 'SE0003ENTRY', '2021-06-18', 4, '10.00', 1, '2021-06-18 17:44:01', '2021-06-18 17:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `sale_estimations`
--

CREATE TABLE `sale_estimations` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `agent_id` bigint UNSIGNED DEFAULT NULL,
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) DEFAULT '0' COMMENT '0 =>Not Cancelled, 1 =>Cancelled',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_estimation_expenses`
--

CREATE TABLE `sale_estimation_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_estimation_date` date NOT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_estimation_items`
--

CREATE TABLE `sale_estimation_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) DEFAULT NULL,
  `rate_inclusive_tax` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_estimation_taxes`
--

CREATE TABLE `sale_estimation_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_estimation_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_gatepass_entries`
--

CREATE TABLE `sale_gatepass_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `sales_gatepass_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_gatepass_date` date DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `load_bill` decimal(8,2) DEFAULT NULL,
  `unload_bill` decimal(8,2) DEFAULT NULL,
  `load_live` decimal(8,2) DEFAULT NULL,
  `unload_live` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_orders`
--

CREATE TABLE `sale_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `sale_type` tinyint(1) NOT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled\r\n',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_orders`
--

INSERT INTO `sale_orders` (`id`, `voucher_no`, `so_no`, `so_date`, `estimation_no`, `estimation_date`, `customer_id`, `salesman_id`, `location`, `sale_type`, `overall_discount`, `round_off`, `total_net_value`, `cancel_status`, `active`, `created_at`, `updated_at`) VALUES
(2, '2', 'SO2NO', '2021-06-11', 'Choose Sale Estimation No', NULL, 2, 1, 1, 1, '0.00', '0', '95.00', 0, 1, '2021-06-11 16:32:56', '2021-06-11 16:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_betas`
--

CREATE TABLE `sale_order_betas` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `salesman_id` bigint DEFAULT NULL,
  `location` bigint DEFAULT NULL,
  `sale_type` tinyint(1) NOT NULL COMMENT '1=>Cash Purchase,0=>Credit Purchase',
  `overall_discount` decimal(6,2) DEFAULT NULL,
  `round_off` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_value` decimal(10,2) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =>Not Cancelled, 1=>Cancelled\r\n',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_beta_expenses`
--

CREATE TABLE `sale_order_beta_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_date` date NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_beta_items`
--

CREATE TABLE `sale_order_beta_items` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) NOT NULL,
  `rate_inclusive_tax` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `uom_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_beta_taxes`
--

CREATE TABLE `sale_order_beta_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_expenses`
--

CREATE TABLE `sale_order_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_date` date NOT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `expense_type` bigint UNSIGNED DEFAULT NULL,
  `expense_amount` decimal(8,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_items`
--

CREATE TABLE `sale_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_date` date DEFAULT NULL,
  `estimation_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_date` date DEFAULT NULL,
  `item_sno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `mrp` double(8,2) DEFAULT NULL,
  `gst` double(8,2) DEFAULT NULL,
  `rate_exclusive_tax` decimal(8,2) DEFAULT NULL,
  `rate_inclusive_tax` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `uom_id` bigint UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `overall_disc` decimal(8,2) DEFAULT NULL,
  `expenses` decimal(8,2) DEFAULT NULL,
  `b_or_w` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_order_items`
--

INSERT INTO `sale_order_items` (`id`, `so_no`, `so_date`, `estimation_no`, `estimation_date`, `item_sno`, `item_id`, `mrp`, `gst`, `rate_exclusive_tax`, `rate_inclusive_tax`, `qty`, `uom_id`, `discount`, `overall_disc`, `expenses`, `b_or_w`, `active`, `created_at`, `updated_at`) VALUES
(2, 'SO2NO', '2021-06-11', 'Choose Sale Estimation No', NULL, NULL, 1, 150.00, 5.00, '90.48', '95.00', 1, 1, '0.00', '0.00', '0.00', NULL, 1, '2021-06-11 16:32:56', '2021-06-11 16:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_taxes`
--

CREATE TABLE `sale_order_taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `so_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `taxmaster_id` int DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_order_taxes`
--

INSERT INTO `sale_order_taxes` (`id`, `so_no`, `so_date`, `taxmaster_id`, `value`, `active`, `created_at`, `updated_at`) VALUES
(5, 'SO2NO', '2021-06-11', 1, '5.00', 1, '2021-06-11 16:32:56', '2021-06-11 16:32:56'),
(6, 'SO2NO', '2021-06-11', 2, '2.50', 1, '2021-06-11 16:32:56', '2021-06-11 16:32:56'),
(7, 'SO2NO', '2021-06-11', 3, '2.50', 1, '2021-06-11 16:32:56', '2021-06-11 16:32:56'),
(8, 'SO2NO', '2021-06-11', 4, '0.00', 1, '2021-06-11 16:32:56', '2021-06-11 16:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `selling_price_setups`
--

CREATE TABLE `selling_price_setups` (
  `id` bigint UNSIGNED NOT NULL,
  `setup` int DEFAULT NULL COMMENT '1 => Based on Price Defined In Item Master, 2 => Based On Last Purchase Cost',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_price_setups`
--

INSERT INTO `selling_price_setups` (`id`, `setup`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-30 12:53:41', '2020-12-26 07:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `code`, `name`, `country_id`, `remark`, `active_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1245', 'Tamil Nadu', 1, 'test', 1, 0, 0, '2021-06-09 10:54:17', '2021-06-09 14:12:32', NULL),
(2, '12458', 'Tamilnadu', 1, 'test', 1, 0, 0, '2021-06-09 10:54:33', '2021-06-09 14:10:44', '2021-06-09 14:10:44'),
(3, '678001', 'Kerala', 1, 'kerala', 1, 0, 0, '2021-06-09 14:12:54', '2021-06-09 14:12:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_changes`
--

CREATE TABLE `stock_changes` (
  `id` int NOT NULL,
  `location_id` int NOT NULL,
  `serial_id` int NOT NULL,
  `item_id` int NOT NULL,
  `uom_id` int NOT NULL,
  `quantity` int NOT NULL,
  `status` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `salutation` enum('Mr','Mrs') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `supplier_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>New,1=>Exist ',
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_credit_limit` int DEFAULT NULL,
  `max_credit_days` int DEFAULT NULL,
  `opening_balance` int DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_level` int DEFAULT NULL,
  `supplier_mode` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Active,1=>DeActive ',
  `block` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=>Active,1=>blocked ',
  `blocked_reason` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blocked_by` int DEFAULT NULL,
  `blocked_on` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `salutation`, `company_name`, `supplier_id`, `supplier_type`, `name`, `code`, `phone_no`, `whatsapp_no`, `email`, `website`, `pan_card`, `gst_no`, `max_credit_limit`, `max_credit_days`, `opening_balance`, `remark`, `price_level`, `supplier_mode`, `status`, `block`, `blocked_reason`, `blocked_by`, `blocked_on`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mr', 'Hashtag', 4, 0, 'Ajay', NULL, '9658745215', '7542563258', 'ak@gmail.com', NULL, NULL, '117', NULL, NULL, 3000, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, NULL, '2021-06-11 09:30:46', '2021-06-11 09:30:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_promised_discount_settings`
--

CREATE TABLE `supplier_promised_discount_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `discount_type_id` int DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discount_value` double(8,2) DEFAULT NULL,
  `discount_in_rs` double(8,2) DEFAULT NULL,
  `discount_in_percentage` double(8,2) DEFAULT NULL,
  `valid_till` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_details`
--

CREATE TABLE `target_details` (
  `id` bigint NOT NULL,
  `target_id` bigint DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  `target_amount` decimal(10,2) DEFAULT '0.00',
  `target_from_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `target_details`
--

INSERT INTO `target_details` (`id`, `target_id`, `location_id`, `target_amount`, `target_from_date`, `target_date`, `created_at`, `updated_at`) VALUES
(4, 2, 1, '1000.00', '2021-06-09', '2021-06-15', '2021-06-12 09:58:49', '2021-06-12 09:58:49'),
(5, 2, 2, '0.00', NULL, NULL, '2021-06-12 09:58:49', '2021-06-12 09:58:49'),
(6, 2, 3, '0.00', NULL, NULL, '2021-06-12 09:58:49', '2021-06-12 09:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `taxdummies`
--

CREATE TABLE `taxdummies` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_master_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxdummies`
--

INSERT INTO `taxdummies` (`id`, `item_id`, `tax_master_id`, `value`, `valid_from`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '12', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(2, '1', '4', '23', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(3, '1', '7', '26', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(4, '1', '9', '5', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(5, '2', '3', '12', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(6, '2', '4', '23', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(7, '2', '7', '26', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(8, '2', '9', '5', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(9, '3', '3', '12', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(10, '3', '4', '23', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(11, '3', '7', '26', '2020-07-14', '2020-07-08 04:56:23', '2020-07-08 04:56:23'),
(12, '3', '9', '5', '2020-07-14', '2020-07-08 04:56:24', '2020-07-08 04:56:24'),
(13, '4', '3', '12', '2020-07-14', '2020-07-08 04:56:24', '2020-07-08 04:56:24'),
(14, '4', '4', '23', '2020-07-14', '2020-07-08 04:56:24', '2020-07-08 04:56:24'),
(15, '4', '7', '26', '2020-07-14', '2020-07-08 04:56:24', '2020-07-08 04:56:24'),
(16, '4', '9', '5', '2020-07-14', '2020-07-08 04:56:24', '2020-07-08 04:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Igst', 'igst', '2021-06-10 17:43:50', '2021-06-10 17:43:50'),
(2, 'Sgst', NULL, '2021-06-10 17:43:59', '2021-06-10 17:43:59'),
(3, 'Cgst', 'cgst', '2021-06-10 17:44:05', '2021-06-10 17:44:36'),
(4, 'Vat', NULL, '2021-06-10 17:45:17', '2021-06-10 17:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `temporary__purchases`
--

CREATE TABLE `temporary__purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `gatepass_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_note_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoice_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_exclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_inclusive` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>Not Removed,0=>Removed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary__purchases`
--

INSERT INTO `temporary__purchases` (`id`, `gatepass_no`, `voucher_no`, `voucher_date`, `receipt_note_no`, `supplier_invoice_no`, `supplier_invoice_date`, `supplier_details`, `order_details`, `transport_details`, `remarks`, `supplier_invoice_value`, `invoice_no`, `item_code`, `item_name`, `mrp`, `hsn`, `quantity`, `tax_rate`, `inclusive`, `rate_exclusive`, `rate_inclusive`, `amount`, `discount`, `net_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '13', NULL, '2020-05-01', NULL, '4542', '2020-04-10', 'shahanaz', NULL, NULL, NULL, '617.89', '99', '1', 'aaaaa', '125', '142', '21', '15', NULL, '12', '0', '252.00', '0', '252.00', '1', '2020-05-01 06:04:54', '2020-05-01 06:04:54'),
(2, '13', NULL, '2020-05-01', NULL, '4542', '2020-04-10', 'shahanaz', NULL, NULL, NULL, '617.89', '100', '2', 'firmknj', '420', '956', '23', '13', NULL, '0', '32', '736.00', '0', '736.00', '1', '2020-05-01 06:05:13', '2020-05-01 06:05:13'),
(3, '11', NULL, '2020-05-01', NULL, '121', '2020-04-15', 'ajay', NULL, NULL, NULL, '8048.24', '99', '1', 'aaaaa', '125', '142', '12', '15', NULL, '21', '0', '252.00', '0', '252.00', '1', '2020-05-01 06:12:17', '2020-05-01 06:12:17'),
(4, '11', NULL, '2020-05-01', NULL, '121', '2020-04-15', 'ajay', NULL, NULL, NULL, '8048.24', '100', '2', 'firmknj', '420', '956', '32', '13', NULL, '23', '0', '736.00', '0', '736.00', '0', '2020-05-01 06:12:27', '2020-05-01 06:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `terms` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `type`, `name`, `terms`, `created_at`, `updated_at`) VALUES
(2, 'Purchase', 'Estimation', 'testing completed', '2021-01-20 05:04:44', '2021-01-20 09:36:08'),
(3, 'Purchase', 'Estimation', 'should fill all the input fields', '2021-01-20 09:47:50', '2021-01-20 09:47:50'),
(4, 'Purchase', 'Estimation', 'new terms and conditions are applied', '2021-01-20 09:48:55', '2021-01-20 09:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `name`, `description`, `remark`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NOS', 'Numbers', 'nos', 1, 0, 0, NULL, '2021-06-10 17:37:05', '2021-06-10 17:42:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uom_factor_convertion_for_items`
--

CREATE TABLE `uom_factor_convertion_for_items` (
  `id` bigint UNSIGNED NOT NULL,
  `category_1` int DEFAULT NULL,
  `category_2` int DEFAULT NULL,
  `category_3` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `default_uom_id` int DEFAULT NULL,
  `uom_id` int DEFAULT NULL,
  `convertion_factor` int DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_documents`
--

CREATE TABLE `upload_documents` (
  `id` bigint NOT NULL,
  `voucher_no` varchar(255) DEFAULT NULL,
  `voucher_date` varchar(255) DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upload_documents`
--

INSERT INTO `upload_documents` (`id`, `voucher_no`, `voucher_date`, `document_name`, `document`, `created_at`, `updated_at`) VALUES
(3, 'EST3NO', '2021-06-11', 'data', 'Capture2021-06-111623403915.PNG', '2021-06-11 15:17:45', '2021-06-11 15:17:45'),
(6, 'SE002EST', '2021-06-11', 'data', 'purchasevouchertype2021-06-111623408267.PNG', '2021-06-11 16:14:27', '2021-06-11 16:14:27'),
(7, 'SE003EST', '2021-06-11', 'data', 'purchasevouchertype2021-06-111623408427.PNG', '2021-06-11 16:17:07', '2021-06-11 16:17:07'),
(9, 'SO0001NO', '2021-06-11', 'data', 'purchasevouchertype2021-06-111623409024.PNG', '2021-06-11 16:27:04', '2021-06-11 16:27:04'),
(13, 'RIN0001NO', '2021-06-11', 'data', 'purchasevouchertype2021-06-111623410734.PNG', '2021-06-11 16:55:34', '2021-06-11 16:55:34'),
(14, 'CN0001NO', '2021-06-11', 'data', 'purchasevouchertype2021-06-111623411936.PNG', '2021-06-11 17:15:36', '2021-06-11 17:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Emp=>Employee,Agent=>Agent,Cus=>Customer,Sup=>Supplier',
  `employee_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Active,0=>DeActive ',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `user_type`, `employee_id`, `role_id`, `email`, `email_verified_at`, `active_status`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$2cnAC/Up6jDcyCbtglb4tuFWG9fFOpLx3xgNSuhO5BMBJyz.KDWRu', NULL, NULL, NULL, '', NULL, 1, NULL, NULL, NULL, 'CzeTWHtH95WEJ14x8mpeBZxDXTDBWtTsXJiNCkljW6ItinzyY1TwPw1XVuea', '2020-03-30 06:05:36', '2020-03-30 06:05:36', NULL),
(2, 'ajay', '$2y$10$KXGapzSiX.GlhHhMRqFfaOUE8oDcsSYu/sDXHtl0/QJciBywCa8DW', NULL, 1, 3, 'aj@gmail.com', NULL, 1, 0, 0, NULL, NULL, '2021-06-10 12:32:37', '2021-06-10 12:32:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_margin_setups`
--

CREATE TABLE `vendor_margin_setups` (
  `id` bigint UNSIGNED NOT NULL,
  `setup` int DEFAULT NULL COMMENT '1 => Block 2 => Alert',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_margin_setups`
--

INSERT INTO `vendor_margin_setups` (`id`, `setup`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-30 12:53:41', '2021-06-07 16:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_numberings`
--

CREATE TABLE `voucher_numberings` (
  `id` bigint NOT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `starting_no` varchar(255) DEFAULT NULL,
  `digits` int DEFAULT NULL,
  `value` int DEFAULT NULL COMMENT '1 => calendar year, 2 => financial year, 3 => none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voucher_numberings`
--

INSERT INTO `voucher_numberings` (`id`, `transaction`, `prefix`, `suffix`, `starting_no`, `digits`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Estimation', 'EST', 'FSR', '10', 4, 1, NULL, '2021-02-11 05:19:50'),
(2, 'Purchase Order', 'PO', 'SAMPLE', '100', 4, 1, NULL, '2021-02-10 06:06:52'),
(3, 'Receipt Note', 'RN', NULL, NULL, 3, 1, NULL, '2021-02-10 12:36:59'),
(4, 'Purchase Entry', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(5, 'Rejection Out', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(6, 'Debit Note', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(7, 'Sales Estimation', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(8, 'Sale Order', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(9, 'Delivery Note', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(10, 'Sale Entry', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52'),
(11, 'Rejection In', 'RN', 'LAST', '10', 5, 1, NULL, '2021-02-10 06:06:52'),
(12, 'Credit Note', NULL, NULL, NULL, NULL, 1, NULL, '2021-02-10 06:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_groups`
--
ALTER TABLE `account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_group_taxes`
--
ALTER TABLE `account_group_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_heads`
--
ALTER TABLE `account_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_types`
--
ALTER TABLE `address_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance_settlement_customers`
--
ALTER TABLE `advance_settlement_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance_settlement_suppliers`
--
ALTER TABLE `advance_settlement_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_area_mappings`
--
ALTER TABLE `agent_area_mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_area_mapping_details`
--
ALTER TABLE `agent_area_mapping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankbranches`
--
ALTER TABLE `bankbranches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boms`
--
ALTER TABLE `boms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bom_items`
--
ALTER TABLE `bom_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_names`
--
ALTER TABLE `category_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_ones`
--
ALTER TABLE `category_ones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_threes`
--
ALTER TABLE `category_threes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_twos`
--
ALTER TABLE `category_twos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_banks`
--
ALTER TABLE `company_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_betas`
--
ALTER TABLE `credit_note_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_beta_expenses`
--
ALTER TABLE `credit_note_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_beta_items`
--
ALTER TABLE `credit_note_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_beta_taxes`
--
ALTER TABLE `credit_note_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_expenses`
--
ALTER TABLE `credit_note_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_items`
--
ALTER TABLE `credit_note_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_note_taxes`
--
ALTER TABLE `credit_note_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_suppliers`
--
ALTER TABLE `customer_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_notes`
--
ALTER TABLE `debit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_betas`
--
ALTER TABLE `debit_note_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_beta_expenses`
--
ALTER TABLE `debit_note_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_beta_items`
--
ALTER TABLE `debit_note_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_beta_taxes`
--
ALTER TABLE `debit_note_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_expenses`
--
ALTER TABLE `debit_note_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_items`
--
ALTER TABLE `debit_note_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debit_note_taxes`
--
ALTER TABLE `debit_note_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_notes`
--
ALTER TABLE `delivery_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_betas`
--
ALTER TABLE `delivery_note_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_beta_expenses`
--
ALTER TABLE `delivery_note_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_beta_items`
--
ALTER TABLE `delivery_note_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_beta_taxes`
--
ALTER TABLE `delivery_note_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_expenses`
--
ALTER TABLE `delivery_note_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_items`
--
ALTER TABLE `delivery_note_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_note_taxes`
--
ALTER TABLE `delivery_note_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denominations`
--
ALTER TABLE `denominations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_types`
--
ALTER TABLE `discount_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimations`
--
ALTER TABLE `estimations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimation_conditions`
--
ALTER TABLE `estimation_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimation_taxes`
--
ALTER TABLE `estimation_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimation__expenses`
--
ALTER TABLE `estimation__expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimation__items`
--
ALTER TABLE `estimation__items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gate_pass_entries`
--
ALTER TABLE `gate_pass_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gate_pass_no` (`gate_pass_no`);

--
-- Indexes for table `giftvouchers`
--
ALTER TABLE `giftvouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_types`
--
ALTER TABLE `gst_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_estimations`
--
ALTER TABLE `hold_estimations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_estimation_conditions`
--
ALTER TABLE `hold_estimation_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_estimation_taxes`
--
ALTER TABLE `hold_estimation_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_estimation__expenses`
--
ALTER TABLE `hold_estimation__expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_estimation__items`
--
ALTER TABLE `hold_estimation__items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_pos`
--
ALTER TABLE `hold_pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_pos_items`
--
ALTER TABLE `hold_pos_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_pos_payments`
--
ALTER TABLE `hold_pos_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_pos_taxes`
--
ALTER TABLE `hold_pos_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ho_details`
--
ALTER TABLE `ho_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uom_id` (`uom_id`);

--
-- Indexes for table `itemwise_offers`
--
ALTER TABLE `itemwise_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_bracode_details`
--
ALTER TABLE `item_bracode_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tax_details`
--
ALTER TABLE `item_tax_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item_wastages`
--
ALTER TABLE `item_wastages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_types`
--
ALTER TABLE `location_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandatoryfields`
--
ALTER TABLE `mandatoryfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `margin_setups`
--
ALTER TABLE `margin_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `margin_setup_vendors`
--
ALTER TABLE `margin_setup_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_stocks`
--
ALTER TABLE `opening_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_processes`
--
ALTER TABLE `payment_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_process_adjustments`
--
ALTER TABLE `payment_process_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_voucher_types`
--
ALTER TABLE `payment_voucher_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_expenses`
--
ALTER TABLE `pos_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_items`
--
ALTER TABLE `pos_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_masters`
--
ALTER TABLE `pos_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pos_no` (`pos_no`);

--
-- Indexes for table `pos_payments`
--
ALTER TABLE `pos_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_taxes`
--
ALTER TABLE `pos_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_levels`
--
ALTER TABLE `price_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_updations`
--
ALTER TABLE `price_updations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promised_discounts`
--
ALTER TABLE `promised_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proof_details`
--
ALTER TABLE `proof_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entries`
--
ALTER TABLE `purchase_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_betas`
--
ALTER TABLE `purchase_entry_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_beta_expenses`
--
ALTER TABLE `purchase_entry_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_beta_items`
--
ALTER TABLE `purchase_entry_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_beta_taxes`
--
ALTER TABLE `purchase_entry_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_expenses`
--
ALTER TABLE `purchase_entry_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_items`
--
ALTER TABLE `purchase_entry_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_entry_taxes`
--
ALTER TABLE `purchase_entry_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_gatepass_entries`
--
ALTER TABLE `purchase_gatepass_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_betas`
--
ALTER TABLE `purchase_order_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_beta_expenses`
--
ALTER TABLE `purchase_order_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_beta_items`
--
ALTER TABLE `purchase_order_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_beta_taxes`
--
ALTER TABLE `purchase_order_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_expenses`
--
ALTER TABLE `purchase_order_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_taxes`
--
ALTER TABLE `purchase_order_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_voucher_types`
--
ALTER TABLE `purchase_voucher_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase__details`
--
ALTER TABLE `purchase__details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_no` (`voucher_no`);

--
-- Indexes for table `purchase__orders`
--
ALTER TABLE `purchase__orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_notes`
--
ALTER TABLE `receipt_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_betas`
--
ALTER TABLE `receipt_note_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_beta_expenses`
--
ALTER TABLE `receipt_note_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_beta_items`
--
ALTER TABLE `receipt_note_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_beta_taxes`
--
ALTER TABLE `receipt_note_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_expenses`
--
ALTER TABLE `receipt_note_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_items`
--
ALTER TABLE `receipt_note_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_note_taxes`
--
ALTER TABLE `receipt_note_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_processes`
--
ALTER TABLE `receipt_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_process_adjustments`
--
ALTER TABLE `receipt_process_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_requests`
--
ALTER TABLE `receipt_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_voucher_types`
--
ALTER TABLE `receipt_voucher_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_ins`
--
ALTER TABLE `rejection_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_betas`
--
ALTER TABLE `rejection_in_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_beta_expenses`
--
ALTER TABLE `rejection_in_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_beta_items`
--
ALTER TABLE `rejection_in_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_beta_taxes`
--
ALTER TABLE `rejection_in_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_expenses`
--
ALTER TABLE `rejection_in_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_items`
--
ALTER TABLE `rejection_in_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_in_taxes`
--
ALTER TABLE `rejection_in_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_outs`
--
ALTER TABLE `rejection_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_betas`
--
ALTER TABLE `rejection_out_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_beta_expenses`
--
ALTER TABLE `rejection_out_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_beta_items`
--
ALTER TABLE `rejection_out_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_beta_taxes`
--
ALTER TABLE `rejection_out_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_expenses`
--
ALTER TABLE `rejection_out_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_items`
--
ALTER TABLE `rejection_out_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_out_taxes`
--
ALTER TABLE `rejection_out_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_man_targets`
--
ALTER TABLE `sales_man_targets`
  ADD PRIMARY KEY (`target_id`);

--
-- Indexes for table `sales_men`
--
ALTER TABLE `sales_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_voucher_types`
--
ALTER TABLE `sales_voucher_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entries`
--
ALTER TABLE `sale_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_betas`
--
ALTER TABLE `sale_entry_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_beta_expenses`
--
ALTER TABLE `sale_entry_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_beta_items`
--
ALTER TABLE `sale_entry_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_beta_taxes`
--
ALTER TABLE `sale_entry_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_expenses`
--
ALTER TABLE `sale_entry_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_items`
--
ALTER TABLE `sale_entry_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_entry_taxes`
--
ALTER TABLE `sale_entry_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_estimations`
--
ALTER TABLE `sale_estimations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_estimation_expenses`
--
ALTER TABLE `sale_estimation_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_estimation_items`
--
ALTER TABLE `sale_estimation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_estimation_taxes`
--
ALTER TABLE `sale_estimation_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_gatepass_entries`
--
ALTER TABLE `sale_gatepass_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_orders`
--
ALTER TABLE `sale_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_betas`
--
ALTER TABLE `sale_order_betas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_beta_expenses`
--
ALTER TABLE `sale_order_beta_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_beta_items`
--
ALTER TABLE `sale_order_beta_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_beta_taxes`
--
ALTER TABLE `sale_order_beta_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_expenses`
--
ALTER TABLE `sale_order_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_items`
--
ALTER TABLE `sale_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_taxes`
--
ALTER TABLE `sale_order_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_price_setups`
--
ALTER TABLE `selling_price_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_changes`
--
ALTER TABLE `stock_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_promised_discount_settings`
--
ALTER TABLE `supplier_promised_discount_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_details`
--
ALTER TABLE `target_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxdummies`
--
ALTER TABLE `taxdummies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary__purchases`
--
ALTER TABLE `temporary__purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `uom_factor_convertion_for_items`
--
ALTER TABLE `uom_factor_convertion_for_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_documents`
--
ALTER TABLE `upload_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_margin_setups`
--
ALTER TABLE `vendor_margin_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_numberings`
--
ALTER TABLE `voucher_numberings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_group_taxes`
--
ALTER TABLE `account_group_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_heads`
--
ALTER TABLE `account_heads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `address_details`
--
ALTER TABLE `address_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `address_types`
--
ALTER TABLE `address_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advance_settlement_customers`
--
ALTER TABLE `advance_settlement_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advance_settlement_suppliers`
--
ALTER TABLE `advance_settlement_suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `agent_area_mappings`
--
ALTER TABLE `agent_area_mappings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_area_mapping_details`
--
ALTER TABLE `agent_area_mapping_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bankbranches`
--
ALTER TABLE `bankbranches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boms`
--
ALTER TABLE `boms`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bom_items`
--
ALTER TABLE `bom_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category_names`
--
ALTER TABLE `category_names`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_ones`
--
ALTER TABLE `category_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_threes`
--
ALTER TABLE `category_threes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_twos`
--
ALTER TABLE `category_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_banks`
--
ALTER TABLE `company_banks`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_note_betas`
--
ALTER TABLE `credit_note_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_beta_expenses`
--
ALTER TABLE `credit_note_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_beta_items`
--
ALTER TABLE `credit_note_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_beta_taxes`
--
ALTER TABLE `credit_note_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_expenses`
--
ALTER TABLE `credit_note_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_note_items`
--
ALTER TABLE `credit_note_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_note_taxes`
--
ALTER TABLE `credit_note_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_suppliers`
--
ALTER TABLE `customer_suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `debit_notes`
--
ALTER TABLE `debit_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_betas`
--
ALTER TABLE `debit_note_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_beta_expenses`
--
ALTER TABLE `debit_note_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_beta_items`
--
ALTER TABLE `debit_note_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_beta_taxes`
--
ALTER TABLE `debit_note_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_expenses`
--
ALTER TABLE `debit_note_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_items`
--
ALTER TABLE `debit_note_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_note_taxes`
--
ALTER TABLE `debit_note_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_notes`
--
ALTER TABLE `delivery_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_note_betas`
--
ALTER TABLE `delivery_note_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_note_beta_expenses`
--
ALTER TABLE `delivery_note_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_note_beta_items`
--
ALTER TABLE `delivery_note_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_note_beta_taxes`
--
ALTER TABLE `delivery_note_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_note_expenses`
--
ALTER TABLE `delivery_note_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_note_items`
--
ALTER TABLE `delivery_note_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_note_taxes`
--
ALTER TABLE `delivery_note_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `denominations`
--
ALTER TABLE `denominations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_types`
--
ALTER TABLE `discount_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estimations`
--
ALTER TABLE `estimations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estimation_conditions`
--
ALTER TABLE `estimation_conditions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimation_taxes`
--
ALTER TABLE `estimation_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `estimation__expenses`
--
ALTER TABLE `estimation__expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estimation__items`
--
ALTER TABLE `estimation__items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gate_pass_entries`
--
ALTER TABLE `gate_pass_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftvouchers`
--
ALTER TABLE `giftvouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst_types`
--
ALTER TABLE `gst_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_estimations`
--
ALTER TABLE `hold_estimations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_estimation_conditions`
--
ALTER TABLE `hold_estimation_conditions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_estimation_taxes`
--
ALTER TABLE `hold_estimation_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_estimation__expenses`
--
ALTER TABLE `hold_estimation__expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_estimation__items`
--
ALTER TABLE `hold_estimation__items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_pos`
--
ALTER TABLE `hold_pos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_pos_items`
--
ALTER TABLE `hold_pos_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_pos_payments`
--
ALTER TABLE `hold_pos_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hold_pos_taxes`
--
ALTER TABLE `hold_pos_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ho_details`
--
ALTER TABLE `ho_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itemwise_offers`
--
ALTER TABLE `itemwise_offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_bracode_details`
--
ALTER TABLE `item_bracode_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_tax_details`
--
ALTER TABLE `item_tax_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `item_wastages`
--
ALTER TABLE `item_wastages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location_types`
--
ALTER TABLE `location_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mandatoryfields`
--
ALTER TABLE `mandatoryfields`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `margin_setups`
--
ALTER TABLE `margin_setups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `margin_setup_vendors`
--
ALTER TABLE `margin_setup_vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opening_stocks`
--
ALTER TABLE `opening_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_processes`
--
ALTER TABLE `payment_processes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_process_adjustments`
--
ALTER TABLE `payment_process_adjustments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_voucher_types`
--
ALTER TABLE `payment_voucher_types`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_expenses`
--
ALTER TABLE `pos_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_items`
--
ALTER TABLE `pos_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_masters`
--
ALTER TABLE `pos_masters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pos_payments`
--
ALTER TABLE `pos_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_taxes`
--
ALTER TABLE `pos_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_levels`
--
ALTER TABLE `price_levels`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price_updations`
--
ALTER TABLE `price_updations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promised_discounts`
--
ALTER TABLE `promised_discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proof_details`
--
ALTER TABLE `proof_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_entries`
--
ALTER TABLE `purchase_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_entry_betas`
--
ALTER TABLE `purchase_entry_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_entry_beta_expenses`
--
ALTER TABLE `purchase_entry_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_entry_beta_items`
--
ALTER TABLE `purchase_entry_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_entry_beta_taxes`
--
ALTER TABLE `purchase_entry_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_entry_expenses`
--
ALTER TABLE `purchase_entry_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_entry_items`
--
ALTER TABLE `purchase_entry_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_entry_taxes`
--
ALTER TABLE `purchase_entry_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchase_gatepass_entries`
--
ALTER TABLE `purchase_gatepass_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_betas`
--
ALTER TABLE `purchase_order_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_beta_expenses`
--
ALTER TABLE `purchase_order_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_beta_items`
--
ALTER TABLE `purchase_order_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_beta_taxes`
--
ALTER TABLE `purchase_order_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_expenses`
--
ALTER TABLE `purchase_order_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order_taxes`
--
ALTER TABLE `purchase_order_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_voucher_types`
--
ALTER TABLE `purchase_voucher_types`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase__details`
--
ALTER TABLE `purchase__details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase__orders`
--
ALTER TABLE `purchase__orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_notes`
--
ALTER TABLE `receipt_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_note_betas`
--
ALTER TABLE `receipt_note_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_note_beta_expenses`
--
ALTER TABLE `receipt_note_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_note_beta_items`
--
ALTER TABLE `receipt_note_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_note_beta_taxes`
--
ALTER TABLE `receipt_note_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_note_expenses`
--
ALTER TABLE `receipt_note_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_note_items`
--
ALTER TABLE `receipt_note_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_note_taxes`
--
ALTER TABLE `receipt_note_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipt_processes`
--
ALTER TABLE `receipt_processes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receipt_process_adjustments`
--
ALTER TABLE `receipt_process_adjustments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_requests`
--
ALTER TABLE `receipt_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_voucher_types`
--
ALTER TABLE `receipt_voucher_types`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rejection_ins`
--
ALTER TABLE `rejection_ins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejection_in_betas`
--
ALTER TABLE `rejection_in_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_in_beta_expenses`
--
ALTER TABLE `rejection_in_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_in_beta_items`
--
ALTER TABLE `rejection_in_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_in_beta_taxes`
--
ALTER TABLE `rejection_in_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_in_expenses`
--
ALTER TABLE `rejection_in_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejection_in_items`
--
ALTER TABLE `rejection_in_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rejection_in_taxes`
--
ALTER TABLE `rejection_in_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rejection_outs`
--
ALTER TABLE `rejection_outs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_betas`
--
ALTER TABLE `rejection_out_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_beta_expenses`
--
ALTER TABLE `rejection_out_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_beta_items`
--
ALTER TABLE `rejection_out_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_beta_taxes`
--
ALTER TABLE `rejection_out_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_expenses`
--
ALTER TABLE `rejection_out_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_items`
--
ALTER TABLE `rejection_out_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_out_taxes`
--
ALTER TABLE `rejection_out_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;

--
-- AUTO_INCREMENT for table `sales_man_targets`
--
ALTER TABLE `sales_man_targets`
  MODIFY `target_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_men`
--
ALTER TABLE `sales_men`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_voucher_types`
--
ALTER TABLE `sales_voucher_types`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_entries`
--
ALTER TABLE `sale_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_entry_betas`
--
ALTER TABLE `sale_entry_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_entry_beta_expenses`
--
ALTER TABLE `sale_entry_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_entry_beta_items`
--
ALTER TABLE `sale_entry_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_entry_beta_taxes`
--
ALTER TABLE `sale_entry_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_entry_expenses`
--
ALTER TABLE `sale_entry_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_entry_items`
--
ALTER TABLE `sale_entry_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_entry_taxes`
--
ALTER TABLE `sale_entry_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sale_estimations`
--
ALTER TABLE `sale_estimations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_estimation_expenses`
--
ALTER TABLE `sale_estimation_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_estimation_items`
--
ALTER TABLE `sale_estimation_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_estimation_taxes`
--
ALTER TABLE `sale_estimation_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sale_gatepass_entries`
--
ALTER TABLE `sale_gatepass_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_orders`
--
ALTER TABLE `sale_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_order_betas`
--
ALTER TABLE `sale_order_betas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_beta_expenses`
--
ALTER TABLE `sale_order_beta_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_beta_items`
--
ALTER TABLE `sale_order_beta_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_beta_taxes`
--
ALTER TABLE `sale_order_beta_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_expenses`
--
ALTER TABLE `sale_order_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_items`
--
ALTER TABLE `sale_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_order_taxes`
--
ALTER TABLE `sale_order_taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `selling_price_setups`
--
ALTER TABLE `selling_price_setups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_changes`
--
ALTER TABLE `stock_changes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_promised_discount_settings`
--
ALTER TABLE `supplier_promised_discount_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target_details`
--
ALTER TABLE `target_details`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taxdummies`
--
ALTER TABLE `taxdummies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temporary__purchases`
--
ALTER TABLE `temporary__purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uom_factor_convertion_for_items`
--
ALTER TABLE `uom_factor_convertion_for_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_documents`
--
ALTER TABLE `upload_documents`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher_numberings`
--
ALTER TABLE `voucher_numberings`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
