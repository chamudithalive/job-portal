-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 07:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id_apply` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_jobprovider` int(11) NOT NULL,
  `id_jobseeker` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id_apply`, `id_job`, `id_jobprovider`, `id_jobseeker`, `status`) VALUES
(7, 109, 108, 102, 2),
(8, 112, 112, 102, 2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `id_jobprovider` int(11) DEFAULT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` varchar(255) NOT NULL,
  `maximumsalary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id_job`, `id_jobprovider`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `experience`, `qualification`, `createdat`) VALUES
(109, 108, 'Intern - Cloud Engineering (DevOps)', 'The Role:\r\n\r\nWork closely with product, engineering and other teams and provide technical expertise from design stage all the way to deployment with a focus on Dev Sec Ops.\r\nAssist corporate personnel in the use of AWS Infrastructure best practices and the resolution of security issues.\r\nAssist in all regular cloud infrastructure management duties.\r\nBe involved in the building of continuous delivery/deployment pipelines including infrastructure and environment provisioning, and deployment and monitoring tools that will support, enhance, and grow an advanced DevOps model.\r\nAdditionally, this resource will be assisting production on call support and will be engaging with AWS infrastructure changes in Development and Production environments.\r\nRequirements:\r\n\r\nYou will need to have completed at least 50% of a Computer Science, Engineering, or other relevant degree.\r\nUnderstanding of scripting languages such as Python, Bash and Perl and automation tools such as Chef, Ansible will be an added advantage.\r\nKnowledge on DevOps methodologies and tools like SVN/GIT, Jenkins, JIRA & AWS cloud will be an added advantage.\r\nUnderstanding on technical troubleshooting skills on Linux.\r\nGood interpersonal skills, including the ability to work successfully in an Agile DevOps team environment.\r\nStrong oral, written, and presentation abilities – able to convey risk to all levels of the business, from executives to operations and development teams.\r\n\r\nThe Associate Software Engineer will be part of the software development team and participates in all phases of the software development project life cycle, includes analysis, design, develop code, test business software applications and project implementation.\r\n\r\nResponsibilities:\r\n• Assist in defining and reviewing requirements and use cases for the application.\r\n• Design the application to meet the business process design and application requirements.\r\n• Configure, build, and test the application or technical architecture components.\r\n• Participate in transitioning the designs to the developers, code reviews and transitions of the application or technical architecture components to the testers.\r\n• Fix any defects and performance problems discovered during testing\r\n• Create technical and functional/end-user operational documentation for the software or system.', '120000', '250000', '2', 'You will need to have completed at least 50% of a Computer Science, Engineering, or other relevant degree.', '2023-02-10 09:53:30'),
(112, 112, 'Associate Software Engineer', 'The Associate Software Engineer will be part of the software development team and participates in all phases of the software development project life cycle, includes analysis, design, develop code, test business software applications and project implementation.\r\n\r\nResponsibilities:\r\n• Assist in defining and reviewing requirements and use cases for the application.\r\n• Design the application to meet the business process design and application requirements.\r\n• Configure, build, and test the application or technical architecture components.\r\n• Participate in transitioning the designs to the developers, code reviews and transitions of the application or technical architecture components to the testers.\r\n• Fix any defects and performance problems discovered during testing\r\n• Create technical and functional/end-user operational documentation for the software or system.\r\n\r\nThe Associate Software Engineer will be part of the software development team and participates in all phases of the software development project life cycle, includes analysis, design, develop code, test business software applications and project implementation.\r\n\r\nResponsibilities:\r\n• Assist in defining and reviewing requirements and use cases for the application.\r\n• Design the application to meet the business process design and application requirements.\r\n• Configure, build, and test the application or technical architecture components.\r\n• Participate in transitioning the designs to the developers, code reviews and transitions of the application or technical architecture components to the testers.\r\n• Fix any defects and performance problems discovered during testing\r\n• Create technical and functional/end-user operational documentation for the software or system.', '150000', '350000', '3', 'Bachelor\'s degree in IT/Software Engineering/Computer Science or related field.', '2023-02-11 00:47:36'),
(113, 113, 'Software Engineer', 'Responsibilities:\r\n\r\n- Assist in defining and reviewing requirements and use cases for the application.\r\n\r\n- Design the application to meet the business process design and application requirements.\r\n\r\n- Configure, build, and test the application or technical architecture components.\r\n\r\n- Participate in transitioning the designs to the developers, code reviews and transitions of the application or technical architecture components to the testers.\r\n\r\n- Fix any defects and performance problems discovered during testing\r\n\r\n- Create technical and functional/end-user operational documentation for the software or system.\r\n\r\nQualifications:\r\n• Open for FRESH GRADUATES.\r\n• Graduate of bachelor’s degree in Information Technology, Computer Science, or other relevant IT programs / courses.\r\n• Knowledge in any of the following programming language: Java, C, .Net, UNIX Shell Scripting, Oracle, PeopleSoft, SAP and Salesforce\r\n• Skills in unit test and/or Test-Driven Development.\r\n\r\nThe Associate Software Engineer will be part of the software development team and participates in all phases of the software development project life cycle, includes analysis, design, develop code, test business software applications and project implementation.\r\n\r\nResponsibilities:\r\n• Assist in defining and reviewing requirements and use cases for the application.\r\n• Design the application to meet the business process design and application requirements.\r\n• Configure, build, and test the application or technical architecture components.\r\n• Participate in transitioning the designs to the developers, code reviews and transitions of the application or technical architecture components to the testers.\r\n• Fix any defects and performance problems discovered during testing\r\n• Create technical and functional/end-user operational documentation for the software or system.', '75000', '100000', '1', 'Graduate of bachelor’s degree in Information Technology, Computer Science, or other relevant IT programs / courses.', '2023-02-11 00:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobprovider`
--

CREATE TABLE `jobprovider` (
  `id_jobprovider` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aboutme` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobprovider`
--

INSERT INTO `jobprovider` (`id_jobprovider`, `name`, `companyname`, `address`, `contactno`, `website`, `email`, `password`, `aboutme`, `logo`, `active`) VALUES
(107, 'Satoshi Abans', 'Abans PLC', 'Colombo, Sri Lanka', '0117853846', 'http://www.abans.lk/', 'abans@a.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', 'Founded in 1968, Abans Group of Companies is one of the local grown conglomerates that is a market leader and focuses on retail, real estate development, finance, environmental management, Logistics, and other business sectors. As an inspiring account of', '63e6751dcb160.jpg', 1),
(108, 'Robert Cake', 'CAKE Engineering', '30 Siri Uttarananda Mawatha, Colombo 00300', '0112312345', 'https://cakeengineering.lk/', 'info@cake.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', 'We’re A Mad Mobile Team Creating Groundbreaking Products That Are Disrupting The Restaurant And Retail Industries.', '63e6137f750c2.png', 1),
(112, 'Bill Gates', 'Acentura', 'Capital Building 135, Bauddhaloka Mawatha, 00400', '0192837483', 'https://www.acentura.com/', 'info@acentura.com', 'NTEyMTE5OTk3YWNmMmVlNGUxZTA2ODdmZGIxOTUzOWQ=', 'Acentura deliver transformational technology services enabling our clients to outperform in the competition.\r\n\r\nOur consulting & engineering services drive great ideas to world class products enabling both B2B & B2C businesses.', '63e7321847195.png', 1),
(113, 'Robert Snow', 'ZorroSign', 'NDB Capital Building 135, Samudra Mawatha, 004321', '0117277227', 'https://www.zorrosign.com/', 'info@zorrosign.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', 'The blockchain architecture ZorroSign deploys was developed entirely in Sri Lanka to provide customers the ability to securely transform paper-based workflows to digital—decreasing costs, reducing errors, and increasing productivity while positively impac', '63e6e6b7cb8bd.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id_jobseeker` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `aboutme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id_jobseeker`, `firstname`, `lastname`, `email`, `password`, `address`, `contactno`, `qualification`, `dob`, `designation`, `resume`, `hash`, `active`, `aboutme`) VALUES
(102, 'Chamuditha', 'Wijesundara', 'chamudithalive@gmail.com', 'NTUwZGUzMTM4ZGJkNjMwMDJjZDQwZDI1YmRiOWNkMTg=', 'Kandy, Sri Lanka', '0771810596', 'BIT', '2000-10-26', 'SWE', '63e6e2ef4e8b8.pdf', 'f0452171a24a200008f8464cd1d9f522', 1, 'Geek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id_apply`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_jobprovider` (`id_jobprovider`),
  ADD KEY `id_jobseeker` (`id_jobseeker`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_jobprovider` (`id_jobprovider`);

--
-- Indexes for table `jobprovider`
--
ALTER TABLE `jobprovider`
  ADD PRIMARY KEY (`id_jobprovider`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id_jobseeker`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `jobprovider`
--
ALTER TABLE `jobprovider`
  MODIFY `id_jobprovider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id_jobseeker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_3` FOREIGN KEY (`id_jobseeker`) REFERENCES `jobseeker` (`id_jobseeker`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `apply_ibfk_4` FOREIGN KEY (`id_job`) REFERENCES `job` (`id_job`),
  ADD CONSTRAINT `apply_ibfk_5` FOREIGN KEY (`id_jobprovider`) REFERENCES `jobprovider` (`id_jobprovider`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`id_jobprovider`) REFERENCES `jobprovider` (`id_jobprovider`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;