-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 09:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `students_informations`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `loginid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `loginid`, `name`, `password`) VALUES
(1,'CSEPDA','PDACSE','csepda123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `parents_contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `correspondence_address` varchar(255) NOT NULL,
  `vtu_no` varchar(25) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `odd_sem` varchar(255) NOT NULL,
  `odd_marks_obtained` int(11) NOT NULL,
  `odd_total_marks` int(11) NOT NULL,
  `odd_percentage` float(3,2) NOT NULL,
  `even_sem` varchar(255) NOT NULL,
  `even_marks_obtained` int(11) NOT NULL,
  `even_total_marks` int(11) NOT NULL,
  `even_percentage` float(3,2) NOT NULL,
   `distict_code` int(11) NOT NULL,
   `collage_distict` varchar(255) NOT NULL,
   `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `adhaar_no` (`adhaar_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

