-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 04:49 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pims`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `code`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, 'C00000002', 'HPCL', '2024-04-26 15:26:05', NULL, '2024-04-27 16:04:13', 1, NULL, NULL),
(3, 'C00000003', 'IOCL', '2024-04-26 17:51:44', NULL, '2024-04-27 15:03:05', NULL, NULL, NULL),
(4, 'C00000004', 'CALVARY', '2024-04-26 18:09:59', 1, '2024-04-27 16:19:02', NULL, '2024-04-27 16:19:02', 1),
(5, 'C0005', 'HCL', '2024-04-27 16:09:05', 1, '2024-04-27 16:09:05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `code`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PIP', 'Piping', 1, '2024-04-27 16:13:34', 1, '2024-04-27 16:13:34', NULL, NULL, NULL),
(2, 'CIV', 'Civil and Structural', 1, '2024-04-27 16:13:56', 1, '2024-04-27 16:13:56', NULL, NULL, NULL),
(3, 'ELE', 'Electrical', 1, '2024-04-27 16:14:16', 1, '2024-04-27 16:14:16', NULL, NULL, NULL),
(4, 'INS', 'Instrumentation', 1, '2024-04-27 16:14:39', 1, '2024-04-27 16:14:39', NULL, NULL, NULL),
(5, 'PRO', 'Process', 1, '2024-04-27 16:14:55', 1, '2024-04-27 16:14:55', NULL, NULL, NULL),
(6, 'PRS', 'Process Safety', 1, '2024-04-27 16:15:16', 1, '2024-04-27 16:15:16', NULL, NULL, NULL),
(7, 'MTE', 'Mechanical and Thermal Equipment (Static) ', 1, '2024-04-27 16:15:47', 1, '2024-04-27 16:15:47', NULL, NULL, NULL),
(8, 'PRU', 'Procurement', 1, '2024-04-27 16:16:18', 1, '2024-04-27 16:16:18', NULL, NULL, NULL),
(9, 'PRJ', 'Projects', 1, '2024-04-27 16:16:36', 1, '2024-04-27 16:16:36', NULL, NULL, NULL),
(10, 'PLG', 'Planning', 1, '2024-04-27 16:16:54', 1, '2024-04-27 16:16:54', NULL, NULL, NULL),
(11, 'CCR', 'Cost Control', 1, '2024-04-27 16:17:15', 1, '2024-04-27 16:17:15', NULL, NULL, NULL),
(12, 'HSE', 'HSE', 1, '2024-04-27 16:18:28', 1, '2024-04-27 16:18:28', NULL, NULL, NULL),
(13, 'QCA', 'Quality Control and Assurance', 1, '2024-04-27 16:23:46', 1, '2024-04-27 16:23:46', NULL, NULL, NULL),
(14, 'MCR', 'Machinery (Rotatory)', 1, '2024-04-27 16:24:03', 1, '2024-04-27 16:24:03', NULL, NULL, NULL),
(15, 'PKG', 'Package', 1, '2024-04-27 16:24:22', 1, '2024-04-27 16:24:22', NULL, NULL, NULL),
(16, 'COM', 'Commissioning', 1, '2024-04-27 16:24:35', 1, '2024-04-27 16:24:35', NULL, NULL, NULL),
(17, 'CON', 'Construction', 1, '2024-04-27 16:24:51', 1, '2024-04-27 16:24:51', NULL, NULL, NULL),
(18, 'CMT', 'Contract Management', 1, '2024-04-27 16:25:04', 1, '2024-04-27 16:25:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_purposes`
--

CREATE TABLE `document_purposes` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_purposes`
--

INSERT INTO `document_purposes` (`id`, `code`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'IFI', 'Issued for Information', 1, '2024-04-29 12:50:10', 1, '2024-04-29 18:18:03', 1, NULL, NULL),
(2, 'IFI', 'Issued for Information', NULL, '2024-04-29 12:50:23', 1, '2024-04-29 17:15:31', NULL, '2024-04-29 17:15:31', 1),
(3, 'IFI', 'Issued for Information', 1, '2024-04-29 13:13:35', 1, '2024-04-29 18:18:10', 1, NULL, NULL),
(4, 'IFP', 'Issued for Purchase', 1, '2024-04-29 13:34:40', 1, '2024-04-29 17:51:47', 1, NULL, NULL),
(5, 'IFR', 'Issued for Review', 1, '2024-04-29 13:38:11', 1, '2024-04-29 13:38:11', NULL, NULL, NULL),
(6, 'IFC', 'Issued for Construction', 1, '2024-04-29 14:31:01', 1, '2024-04-29 17:52:23', 1, NULL, NULL),
(7, 'IFA', 'Issued for Approval', 0, '2024-04-29 14:47:29', 1, '2024-04-30 11:49:23', 1, NULL, NULL),
(8, 'IFD', 'Issued for Design', 1, '2024-04-29 14:49:19', 1, '2024-04-29 14:49:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_revisions`
--

CREATE TABLE `document_revisions` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_revisions`
--

INSERT INTO `document_revisions` (`id`, `code`, `name`, `position`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'P0001', 'Document', 1, 1, 1, '2024-04-29 15:05:35', NULL, '2024-05-01 12:30:54', NULL, NULL),
(2, 'P0002', 'Revision', 2, 1, 1, '2024-04-29 15:05:55', NULL, '2024-05-01 16:55:05', NULL, NULL),
(3, 'P0003', 'Uploaded', 3, 1, 1, '2024-04-29 15:08:09', NULL, '2024-05-01 16:55:05', NULL, NULL),
(4, 'P0004', 'EPC', 4, 1, 1, '2024-04-30 11:21:57', NULL, '2024-05-01 12:30:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE `document_status` (
  `id` int NOT NULL,
  `type` tinyint DEFAULT NULL COMMENT '1 = Internal, 2 = client',
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_status`
--

INSERT INTO `document_status` (`id`, `type`, `code`, `name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'A', 'Approved / Reviewed, No Comments', 1, 1, '2024-04-29 17:53:00', NULL, '2024-04-29 17:53:00', NULL, NULL),
(2, 2, '1', 'No Comments. Proceed as per document', 1, 1, '2024-04-30 11:25:05', 1, '2024-04-30 12:56:17', NULL, NULL),
(3, 1, 'B', 'Reviewed with Comments', 1, 1, '2024-04-30 13:01:37', NULL, '2024-04-30 13:01:37', NULL, NULL),
(4, 1, 'C', 'Not Approved', 1, 1, '2024-04-30 13:01:47', NULL, '2024-04-30 13:01:47', NULL, NULL),
(5, 1, 'D', 'For Information/Record', 1, 1, '2024-04-30 13:01:58', NULL, '2024-04-30 13:01:58', NULL, NULL),
(6, 2, '2', 'Proceed as per commented document. Revised document required', 1, 1, '2024-04-30 13:02:15', NULL, '2024-04-30 13:02:15', NULL, NULL),
(7, 2, '3', 'Rejected. Resubmit', 1, 1, '2024-04-30 13:02:25', NULL, '2024-04-30 13:02:25', NULL, NULL),
(8, 2, 'R', 'Retained for Records', 1, 1, '2024-04-30 13:02:35', NULL, '2024-04-30 13:02:35', NULL, NULL),
(9, 2, 'V', 'Void', 1, 1, '2024-04-30 13:02:45', NULL, '2024-04-30 13:02:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `code`, `name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'DOC', 'DOCUMENT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(2, 'CAL', 'CALCULATION', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(3, 'COS', 'COST CONTROL RELATED DOCUMENT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(4, 'FRM', 'FORM, TEMPLATE', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(5, 'INF', 'INFORMATION', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(6, 'ORG', 'ORGANIZATION CHART AND RELATED DOCUMENTS', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(7, 'PEP', 'PROJECT EXECUTION PROCEDURE', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(8, 'PRO', 'PROJECT PROCEDURE / PLAN (GENERAL USE)', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(9, 'RPT', 'REPORT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(10, 'SCH', 'SCHEDULE AND SCHEDULE CONTROLLED RELATED DOCUMENT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(11, 'SPC', 'SPECIFICATION', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(12, 'STU', 'TECHNICAL STUDY REPORT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(13, 'WMS', 'WORK METHOD STATEMENT', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(14, 'DWG', 'DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(15, 'DES', 'DESIGN CRITERIA, DESIGN PHILIPOSOHY AND DESIGN BASIS', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(16, 'ARG', 'ARRANGEMENT DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(17, 'BLD', 'BLOCK DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(18, 'DIA', 'DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(19, 'IFD', 'TIE-IN INTERFACE LIST OR INTERFACE DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(20, 'ISO', 'ISOMETRIC DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(21, 'LGD', 'LOGIC DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(22, 'LOP', 'LOOP DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(23, 'MHB', 'MATERIAL AND HEAT BALANCE', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(24, 'PFD', 'PROCESS FLOW DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(25, 'PID', 'PIPING AND INSTRUMENT DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(26, 'SCD', 'SCHEMATIC DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(27, 'SLD', 'SINGLE LINE DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(28, 'UBD', 'UTILITY BALANCE DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(29, 'WRD', 'WIRING DIAGRAM', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(30, 'HUD', 'HOOK UP DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(31, 'LAY', 'LAYOUT DRAWINGS', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(32, 'EDW', 'ENGINEERING DRAWING (VESSEL)', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(33, 'HAZ', 'HAZARDOUS AREA CLASSIFICATION', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(34, 'MCR', 'MAIN CABLE ROUTE', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(35, 'PLN', 'PLANNING DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(36, 'PLT', 'PLOT PLAN', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(37, 'STD', 'STANDARD DRAWING', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(38, 'TYP', 'TYPICAL DETAIL', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(39, 'DAT', 'DATA SHEET OR DATA', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(40, 'LDD', 'LOADING DATA', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(41, 'BED', 'BASIC ENGINEERING DESIGN DATA', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(42, 'LST', 'LIST / INDEX / REGISTER', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(43, 'EQL', 'EQUIPMENT LIST', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(44, 'LLS', 'LINE LIST', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(45, 'PLL', 'PROCESS LINE LIST', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(46, 'ELD', 'ELECTRICAL LOAD LIST', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(47, 'IND', 'INSTRUMENT INDEX', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(48, 'BOM', 'BILL OF MATERIAL', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(49, 'BOQ', 'BILL OF QUANTITY', 1, '2024-04-29 00:00:00', 1, NULL, NULL, NULL),
(50, 'SPL', 'SPARE PARTS LIST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(51, 'STL', 'SPECIAL TOOLS LIST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(52, 'GLO', 'GREASE AND LUBE-OIL LIST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(53, 'SHP', 'SHIPPING DOCUMENTS', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(54, 'VPI', 'VENDOR DOCUMENT INDEX AND SCHEDULE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(55, 'DOS', 'PACKAGE DOCUMENT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(56, 'MDR', 'MANUFACTURING DATA RECORD', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(57, 'IOM', 'INSTALLATION, OPERATION, MAINTENANCE MANUAL', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(58, 'MRQ', 'MATERIAL REQUISITION FOR QUOTATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(59, 'TBE', 'TECHNICAL BID EVALUATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(60, 'ERI', 'ENGINEERING REVISION INSTRUCTION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(61, 'NCR', 'NON-CONFORMANCE REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(62, 'IFQ', 'INTERFACE QUERY', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(63, 'RFI', 'REQUEST FOR INFORMATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(64, 'INV', 'INVOICE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(65, 'JSP', 'JOB SPECIFICATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(66, 'WBS', 'WORK BREAKDOWN STRUCTURE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(67, 'MPR', 'MONTHLY PROGRESS REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(68, 'WPR', 'WEEKLY PROGRESS REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(69, 'QMS', 'QUALITY MANAGEMENT SYSTEM', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(70, 'AFI', 'APPLICATION FOR INSPECTION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(71, 'AWO', 'ADDITIONAL WORK ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(72, 'BGD', 'BANK GUARANTEE DOCUMENT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(73, 'CAG', 'CONFIDENTIAL AGREEMENT OR SECRECY AGREEMENT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(74, 'CBE', 'COMMERCIAL BID EVALUATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(75, 'CNT', 'CONTRACT AGREEMENT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(76, 'CTF', 'CERTIFICATE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(77, 'DWO', 'DAY WORK ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(78, 'IRN', 'INSPECTION RELEASE NOTE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(79, 'ITP', 'INSPECTION AND TEST PLAN', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(80, 'ITR', 'INSPECTION TEST REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(81, 'LOI', 'LETTER OF INTENT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(82, 'MRP', 'MATERIAL REQUISITION FOR PURCHASE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(83, 'POP', 'PURCHASE ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(84, 'POU', 'UN-PRICE PURCHASE ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(85, 'PYR', 'PAYMENT REQUEST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(86, 'QTN', 'VENDOR QUOTATION FOR TECHNICAL AND COMMERCIAL', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(87, 'QTP', 'VENDOR QUOTATION PRICED', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(88, 'QTU', 'VENDOR QUOTATION UN-PRICED', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(89, 'RFP', 'REQUEST FOR PURCHASE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(90, 'RFQ', 'REQUEST FOR QUOTATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(91, 'WVO', 'WORK VARIATION ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(92, 'CHO', 'CHANGE ORDER', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(93, 'INR', 'INCIDENT REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(94, 'CRL', 'CABLE ROUTING', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(95, 'CAR', 'CORRECTIVE ACTION REQUEST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(96, 'ESD', 'EXCESS, SHORTAGE AND DAMAGE REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(97, 'FRI', 'FIELD REVISION INSTRUCTION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(98, 'LPR', 'LOCAL PURCHASE REQUEST', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(99, 'PIN', 'PROJECT INSTRUCTION NOTIFICATION', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(100, 'QTR', 'QUALITY TROUBLE REPORT', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(101, 'RUP', 'REQUEST FOR URGENT PURCHASE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(102, 'BIS', 'BILLING SCHEDULE', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL),
(103, 'SOW', 'SCOPE OF WORK / SUPPLY', 1, '2024-04-30 00:00:00', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `edms_documents`
--

CREATE TABLE `edms_documents` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `project_id` int DEFAULT NULL,
  `origin` int DEFAULT NULL,
  `discipline_id` int DEFAULT NULL,
  `document_type_id` int DEFAULT NULL,
  `document_purpose_id` int DEFAULT NULL,
  `document_revision_id` int DEFAULT NULL,
  `version_number` int DEFAULT NULL,
  `est_start_date` date DEFAULT NULL,
  `est_end_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `document_status_id` int DEFAULT NULL,
  `verify_status` int DEFAULT NULL,
  `approve_status` int DEFAULT NULL,
  `edms_document_revision_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edms_documents`
--

INSERT INTO `edms_documents` (`id`, `code`, `document`, `description`, `project_id`, `origin`, `discipline_id`, `document_type_id`, `document_purpose_id`, `document_revision_id`, `version_number`, `est_start_date`, `est_end_date`, `start_date`, `end_date`, `document_status_id`, `verify_status`, `approve_status`, `edms_document_revision_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'B2850020010001', '1714395902_4b0aa0bf5e01a4540e90.doc', 'Test1', 1, 2, 2, 18, 8, 1, 1234, '2024-04-01', '2024-04-16', '2024-04-29', NULL, 0, 1, 7, 29, '2024-04-29 18:35:02', 1, '2024-05-02 11:59:44', 1, NULL, NULL),
(2, 'B2850020010002', '1714457464_5a572dc17d81af9c625b.pdf', 'Test 23', 1, 1, 2, 9, 7, 3, 4587, '2024-04-01', '2024-04-18', '2024-04-30', NULL, 0, 1, 2, 23, '2024-04-30 11:41:04', 1, '2024-05-01 15:25:10', 1, NULL, NULL),
(3, 'B2850080020001', '1714457736_71e235401a8e880c3d96.doc', 'Sample Test', 2, 2, 8, 29, 3, 4, 7548, '2024-03-05', '2024-03-29', '2024-04-30', NULL, 0, 1, 2, 34, '2024-04-30 11:45:36', 1, '2024-05-02 12:18:27', 1, NULL, NULL),
(4, 'B2850050010001', '1714475698_75a615d735e6058c1bdd.doc', 'Test 45', 1, 1, 5, 40, 7, 3, 1475, '2024-02-05', '2024-04-24', '2024-04-30', NULL, 0, 1, 6, 24, '2024-04-30 16:44:58', 1, '2024-05-02 11:31:53', 1, NULL, NULL),
(5, 'B2850070020001', '1714480847_4be2bcafc515a94caf99.doc', 'Testing', 2, 2, 7, 4, 4, 2, 75898, '2024-03-05', '2024-04-10', '2024-04-30', NULL, 0, NULL, NULL, 33, '2024-04-30 18:10:48', 1, '2024-05-01 18:04:59', 1, NULL, NULL),
(6, 'B2850010020001', '1714562515_c23b68bb6a4f82cc4af0.docx', 'Hi, thisis testing data', 2, 1, 1, 6, 4, 1, 3344, '2024-03-04', '2024-05-24', '2024-05-01', NULL, 0, NULL, NULL, 31, '2024-05-01 16:51:55', 1, '2024-05-01 18:01:23', 1, NULL, NULL),
(7, 'B2850020010003', '1714566054_fe8f975f98fc4e561247.docx', 'Hi', 1, 1, 2, 11, 4, 3, 5589, '2024-05-06', '2024-05-22', '2024-05-01', NULL, 0, 1, 2, 26, '2024-05-01 17:50:54', 1, '2024-05-02 11:55:34', 1, NULL, NULL),
(8, 'B2850010020002', '1714566249_7b90b147e9b192392d08.docx', 'khadkdere', 2, 1, 1, 5, 8, 3, 8778, '2024-05-12', '2024-05-23', '2024-05-01', NULL, 0, 3, NULL, 30, '2024-05-01 17:54:09', 1, '2024-05-02 11:43:16', 1, NULL, NULL),
(9, 'B2850010010001', '1714566389_ae271f7d5cb9d8d9bcbe.docx', 'asdsad', 1, 1, 1, 8, 1, 1, 234, '2024-05-06', '2024-05-22', '2024-05-01', NULL, 0, 4, NULL, 28, '2024-05-01 17:56:29', 1, '2024-05-02 11:43:28', 1, NULL, NULL),
(10, 'B285-001-001-0002', '1714639765_f1a340f94c548b6e1c6f.docx', 'Test', 1, 1, 1, 1, 3, 1, 12, '2024-05-01', '2024-05-14', '2024-05-02', NULL, 0, 1, 7, 35, '2024-05-02 14:19:26', 1, '2024-05-02 16:12:02', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `edms_document_revisions`
--

CREATE TABLE `edms_document_revisions` (
  `id` int NOT NULL,
  `edms_document_id` int DEFAULT NULL,
  `document` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `document_purpose_id` int DEFAULT NULL,
  `document_revision_id` int DEFAULT NULL,
  `version_number` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `verify_status` int DEFAULT NULL,
  `approve_status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edms_document_revisions`
--

INSERT INTO `edms_document_revisions` (`id`, `edms_document_id`, `document`, `document_purpose_id`, `document_revision_id`, `version_number`, `description`, `verify_status`, `approve_status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '1714395902_4b0aa0bf5e01a4540e90.doc', 8, 1, 1234, 'Test1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '1714457464_5a572dc17d81af9c625b.pdf', 7, 3, 4587, 'Test 23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, '1714457736_71e235401a8e880c3d96.doc', 3, 4, 7548, 'Sample Test', 1, 6, NULL, NULL, '2024-05-01 18:03:04', NULL, NULL, NULL),
(4, 2, '1714473256_2f1d668205735a20bde1.docx', 5, 2, NULL, 'Sample Test Revised Document', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, '1714473524_7aa28fb53c754c075401.pdf', 3, 3, 999, 'sadas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, '1714473617_9226211996a2beac79ca.docx', 5, 4, 7887, 'Sample Message Test Updated Revised Document.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, '1714473746_20ba67097c9b22937e91.docx', 5, 4, 7887, 'Sample Message Test Updated Revised Document.', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, '1714473796_458acd4b3b9ba54fbc9a.docx', 5, 4, 7887, 'Sample Message Test Updated Revised Document.', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, '1714473820_3e2d9769ca7e72d524c0.pdf', 1, 1, 12121, 'adsad', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 2, '1714473901_88c6c6894764399143c3.pdf', 1, 1, 12121, 'adsad', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2, '1714473922_88fe4f9d7f2164865f35.doc', 5, 2, 1111, 'sdasdsada', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 2, '1714474877_0ed2743755b6ccd1fb0e.docx', 3, 1, 452, 'asdasd', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2, '1714474985_c45a1d95fd752623a3a6.doc', 3, 4, 222, 'wewewewe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, '1714475098_2d70c06c5dc9ca622c58.doc', 5, 2, 123, 'Sdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, '1714475619_1de0af349a0d78e41fbd.doc', 5, 2, 3232, 'dsadsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, '1714475698_75a615d735e6058c1bdd.doc', 7, 3, 1475, 'Test 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 4, '1714480193_2e2955d294bf9a12ca23.doc', 3, 2, 88888, 'Test Revision', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 4, '1714480247_a69c8052d0d9d9a5e976.docx', 6, 3, 8889, 'testing', 1, 7, NULL, NULL, '2024-05-01 15:07:52', NULL, NULL, NULL),
(19, 5, '1714480847_4be2bcafc515a94caf99.doc', 4, 2, 75898, 'Testing', 1, 7, NULL, NULL, '2024-05-01 18:04:58', NULL, NULL, NULL),
(20, 2, '1714547859_eb8009fa602391e8f8c0.doc', 1, 1, 1021, 'sample message', 4, NULL, '2024-05-01 12:47:39', NULL, '2024-05-01 12:48:14', NULL, NULL, NULL),
(21, 2, '1714556465_7c032d8ccd9c3217beda.doc', 4, 1, 4752, 'Sample', 4, NULL, '2024-05-01 15:11:05', NULL, '2024-05-01 15:11:54', NULL, NULL, NULL),
(22, 2, '1714556722_4ef068a37a4949111c63.pdf', 6, 2, 745, 'Description Sample', 1, 7, '2024-05-01 15:15:22', NULL, '2024-05-01 15:16:23', NULL, NULL, NULL),
(23, 2, '1714557271_7716f70a186caab5c065.doc', 5, 2, 785, 'Optional', 1, 2, '2024-05-01 15:24:31', NULL, '2024-05-01 15:25:10', NULL, NULL, NULL),
(24, 4, '1714558782_55c9494ab0d3ca180f59.docx', 8, 4, 22, 'Testing Message', 1, 6, '2024-05-01 15:49:42', NULL, '2024-05-02 11:31:52', NULL, NULL, NULL),
(25, 6, '1714562515_c23b68bb6a4f82cc4af0.docx', 4, 1, 3344, 'Hi, thisis testing data', 4, NULL, '2024-05-01 16:51:56', NULL, '2024-05-01 18:01:22', NULL, NULL, NULL),
(26, 7, '1714566054_fe8f975f98fc4e561247.docx', 4, 3, 5589, 'Hi', 1, 2, '2024-05-01 17:50:55', NULL, '2024-05-02 11:55:34', NULL, NULL, NULL),
(27, 8, '1714566249_7b90b147e9b192392d08.docx', 8, 3, 8778, 'khadkdere', 3, NULL, '2024-05-01 17:54:10', NULL, '2024-05-01 18:00:50', NULL, NULL, NULL),
(28, 9, '1714566389_ae271f7d5cb9d8d9bcbe.docx', 1, 1, 234, 'asdsad', 4, NULL, '2024-05-01 17:56:29', NULL, '2024-05-02 11:43:28', NULL, NULL, NULL),
(29, 1, '1714566618_c4a2e5da336d3edd6bb9.docx', 6, 4, 777777, 'fdgfdgfdk', 1, 7, '2024-05-01 18:00:18', NULL, '2024-05-02 11:59:43', NULL, NULL, NULL),
(30, 8, '1714566669_b26782899e95e8c93fbe.doc', 4, 1, 2121, 'dasdas', 3, NULL, '2024-05-01 18:01:09', NULL, '2024-05-02 11:43:16', NULL, NULL, NULL),
(31, 6, '1714566705_81f3f2e43995182fe37c.doc', 5, 1, 45678, 'message', NULL, NULL, '2024-05-01 18:01:45', NULL, '2024-05-01 18:01:45', NULL, NULL, NULL),
(32, 3, '1714566809_30bf54788df61e7693a2.docx', 6, 3, 0, 'special testing', 3, NULL, '2024-05-01 18:03:29', NULL, '2024-05-01 18:05:37', NULL, NULL, NULL),
(33, 5, '1714566913_68ec16725922d4b8823f.doc', 4, 2, 12345, 'fsdfsfd', NULL, NULL, '2024-05-01 18:05:13', NULL, '2024-05-01 18:05:13', NULL, NULL, NULL),
(34, 3, '1714566951_c2244b21ca5b6f26bba2.docx', 4, 2, 785487, 'sadsad', 1, 2, '2024-05-01 18:05:51', NULL, '2024-05-02 12:18:27', NULL, NULL, NULL),
(35, 10, '1714639765_f1a340f94c548b6e1c6f.docx', 3, 1, 12, 'Test', 1, 7, '2024-05-02 14:19:26', NULL, '2024-05-02 16:12:02', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `edms_document_revision_status_history`
--

CREATE TABLE `edms_document_revision_status_history` (
  `id` int NOT NULL,
  `edms_document_revision_id` int DEFAULT NULL,
  `document_status_id` int DEFAULT NULL,
  `comments` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edms_document_revision_status_history`
--

INSERT INTO `edms_document_revision_status_history` (`id`, `edms_document_revision_id`, `document_status_id`, `comments`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 16, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 19, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 18, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 21, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 21, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 22, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 22, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 23, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 24, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 25, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 26, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 27, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 28, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 29, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 30, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 25, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 31, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 32, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 19, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 33, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 32, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 34, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 24, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 30, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 28, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 26, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 26, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 29, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 29, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 34, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 34, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 35, 0, 'Testing Verified', '2024-05-02 15:21:14', 1, NULL, NULL, NULL, NULL),
(45, 35, 1, 'Testing Document Verified ', '2024-05-02 16:02:25', 1, '2024-05-02 16:02:25', NULL, NULL, NULL),
(46, 35, 7, 'Client Verification Failed.', '2024-05-02 16:12:02', 1, '2024-05-02 16:12:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url2` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `parent_id`, `name`, `url`, `url2`, `position`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Dashboard', 'home', 'home/financialData', 1, 1, NULL, '2023-12-27 12:59:15', NULL),
(2, 0, 'Invoices', 'invoices', '', 2, 1, NULL, '2023-12-22 06:31:56', NULL),
(3, 0, 'Projects', 'project', NULL, 3, 1, NULL, NULL, NULL),
(4, 0, 'Clients', 'client', NULL, 4, 1, NULL, '2023-12-22 11:02:27', NULL),
(5, 0, 'Payments', 'payments', NULL, 5, 1, NULL, '2023-12-22 11:06:50', NULL),
(6, 0, 'Bank Guarantee', 'bankGuarantee', NULL, 6, 1, NULL, '2023-12-22 11:06:50', NULL),
(7, 0, 'Locations', 'location', NULL, 7, 1, NULL, '2023-12-22 11:06:19', NULL),
(8, 0, 'Deductions', 'deduction', NULL, 8, 1, NULL, '2023-12-22 10:43:19', NULL),
(9, 0, 'Payment Types', 'paymentType', NULL, 9, 1, NULL, '2023-12-22 11:02:57', NULL),
(10, 0, 'File Types', 'fileType', NULL, 10, 1, NULL, '2023-12-22 11:02:57', NULL),
(11, 0, 'Users', 'user', NULL, 11, 1, NULL, NULL, NULL),
(12, 0, 'Roles', 'role', NULL, 13, 1, NULL, '2023-12-22 10:59:51', NULL),
(13, 0, 'Configuration', 'config', NULL, 12, 1, NULL, '2023-12-22 11:00:46', NULL),
(14, 0, 'Modules', 'module', NULL, 14, 1, NULL, '2023-12-22 11:03:22', NULL),
(15, 0, 'Config', 'config', '', 15, 1, '2023-12-21 12:10:50', '2023-12-22 11:03:22', NULL),
(16, 3, 'Add Projects', 'project/add', 'project/create', 1, 1, '2023-12-21 12:20:57', '2023-12-22 12:12:01', NULL),
(17, 2, 'Add Invoice', 'invoice/add', 'invoice/create', 4, 1, '2023-12-21 13:02:11', '2023-12-22 12:12:00', NULL),
(18, 2, 'Edit Invoice', 'invoice/edit', 'invoice/update', 3, 1, '2023-12-21 13:02:46', '2023-12-22 12:10:29', NULL),
(19, 2, 'Delete Invoice', 'invoice/delete', 'delete', 1, 1, '2023-12-21 13:03:04', '2023-12-22 12:10:29', NULL),
(20, 2, 'View Invoice', 'invoice/view', '', 2, 1, '2023-12-21 13:03:23', '2023-12-23 06:42:44', NULL),
(21, 2, 'Add Deductions', 'invoice/addInvoiceDeduction', 'invoice/createInvoiceDeduction', 5, 1, '2023-12-21 13:18:44', '2023-12-22 10:56:59', NULL),
(22, 3, 'Edit Projects', 'project/edit', 'project/edit', 2, 1, '2023-12-22 06:15:54', '2023-12-22 10:56:59', NULL),
(23, 3, 'Delete Projects', 'project/delete', 'project/delete', 3, 1, '2023-12-22 06:35:01', '2023-12-22 06:35:01', NULL),
(24, 4, 'Add Clients', 'client/add', 'client/add', 2, 1, '2023-12-22 06:35:49', '2023-12-22 12:09:11', NULL),
(25, 4, 'Edit Clients', 'client/edit', '', 1, 1, '2023-12-22 06:38:24', '2023-12-22 12:09:11', NULL),
(26, 7, 'Add Locations', 'location/add', 'location/add', 1, 1, '2023-12-22 11:16:53', '2023-12-22 12:07:58', NULL),
(27, 7, 'Edit Locations', 'location/edit', 'location/edit', 2, 1, '2023-12-22 11:16:53', '2023-12-22 12:06:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `pmc` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `epc` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `manager` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `code`, `name`, `client_id`, `vendor_id`, `pmc`, `epc`, `start_date`, `end_date`, `manager`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'P0001', 'EPCC', 2, 3, 'mumbai', 'food', '2024-04-23', '2024-05-01', 'Tilak', 'Description Edited', '2024-04-29 10:55:17', 1, '2024-04-29 11:04:58', 1, NULL, NULL),
(2, 'P0002', 'EPMC', 3, 3, 'Hyderabad', 'Economy', '2024-04-23', '2024-05-08', 'Ashish', 'Description', '2024-04-29 10:57:50', 1, '2024-04-29 15:20:11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_document_count`
--

CREATE TABLE `project_document_count` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `discipline_id` int DEFAULT NULL,
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_document_count`
--

INSERT INTO `project_document_count` (`id`, `project_id`, `discipline_id`, `count`) VALUES
(1, 1, 2, 3),
(2, 2, 8, 1),
(3, 1, 5, 1),
(4, 2, 7, 1),
(5, 2, 1, 2),
(6, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rights` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `rights`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, '2023-12-19 11:38:27', NULL),
(2, 'Admin', NULL, NULL, '2023-12-19 11:39:04', NULL),
(3, 'Employee', '1,2,3,4,5,6,7,8', NULL, '2024-02-27 17:27:42', NULL),
(4, 'Employee 2', '1,2,3,5,7,8,9,10,11,13,14', NULL, '2023-12-21 06:42:03', NULL),
(5, 'Employee 3', '7,11,14', '2023-12-19 12:08:30', '2023-12-21 06:50:35', NULL),
(6, 'Employee 4', NULL, '2023-12-21 06:42:40', '2023-12-21 06:42:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `user_code` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_type` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `role` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_code`, `username`, `password`, `user_type`, `client_id`, `vendor_id`, `name`, `email`, `phone`, `role`, `status`, `created_by`, `last_login_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'U0001', 'admin', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Admin', 'admin@gmail.com', '9874565478', '1', 1, 1, '2024-05-02 16:30:00', '2023-12-12 07:12:48', '2024-05-02 16:30:17', NULL),
(2, 'U0002', 'superadmin', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Super Admin', 'superadmin@gmail.com', '8845586647', '1', 1, 1, NULL, '2023-12-12 07:20:45', '2023-12-13 07:31:57', NULL),
(3, 'U0003', 'employee', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Satya', 'satya23@gmail.com', '6589478236', '5', 1, 1, '2023-12-21 06:50:00', '2023-12-12 09:30:15', '2023-12-21 06:50:51', NULL),
(4, 'U0004', 'testuser1', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Teja', 'teja@gmail.com', '6589741258', '2', 1, 1, NULL, '2023-12-12 10:04:14', '2023-12-13 08:46:29', '2023-12-13 08:46:29'),
(5, 'U0005', 'testuser2', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Sriram', 'sriRam@gmail.com', '8956874455', '2', 1, 1, NULL, '2023-12-12 12:04:25', '2023-12-13 08:46:22', NULL),
(6, 'U0006', 'surya', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Surya', 'surya@123gmail.com', '8976465464', '4', 1, 1, '2024-01-17 14:10:00', '2023-12-13 07:34:21', '2024-02-27 16:49:37', NULL),
(17, 'U0017', 'satya', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 'Satya', 'satya@gmail.com', '4697979876', '4', 1, 1, NULL, '2024-02-27 16:54:14', '2024-02-27 16:54:25', '2024-02-27 16:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `contact_name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_email` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_phone` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `code`, `name`, `status`, `contact_name`, `contact_email`, `contact_phone`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'V0001', 'Food Vendor', 1, 'Rachin Ravindraa', 'rachain@gmail.com', '9988771123', '2024-04-26 18:36:05', 1, '2024-04-27 16:15:06', NULL, '2024-04-27 16:15:06', 1),
(3, 'V0003', 'Food Vendor', 1, 'Rachin Ravindra', 'rachin@gmail.com', '9988771122', '2024-04-27 16:29:00', 1, '2024-04-27 16:29:00', NULL, NULL, NULL),
(4, 'V0004', 'Street Vendor', 1, 'Tilak Varma', 'tilak@gmail.com', '9988771129', '2024-04-27 16:29:14', 1, '2024-04-27 16:29:14', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_purposes`
--
ALTER TABLE `document_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_revisions`
--
ALTER TABLE `document_revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edms_documents`
--
ALTER TABLE `edms_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edms_document_revisions`
--
ALTER TABLE `edms_document_revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edms_document_revision_status_history`
--
ALTER TABLE `edms_document_revision_status_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_document_count`
--
ALTER TABLE `project_document_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `document_purposes`
--
ALTER TABLE `document_purposes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `document_revisions`
--
ALTER TABLE `document_revisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `document_status`
--
ALTER TABLE `document_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `edms_documents`
--
ALTER TABLE `edms_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `edms_document_revisions`
--
ALTER TABLE `edms_document_revisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `edms_document_revision_status_history`
--
ALTER TABLE `edms_document_revision_status_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_document_count`
--
ALTER TABLE `project_document_count`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
