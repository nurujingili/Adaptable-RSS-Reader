-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2010 at 11:31 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reader`
--

-- --------------------------------------------------------

--
-- Table structure for table `feeditem`
--

CREATE TABLE IF NOT EXISTS `feeditem` (
  `feedItemID` int(15) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `subscriptionLink` varchar(400) NOT NULL,
  `readitem` varchar(10) NOT NULL DEFAULT 'No',
  `username` varchar(50) NOT NULL,
  `pubDate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`feedItemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10886 ;

--
-- Dumping data for table `feeditem`
--


-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `folderName` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `folderName` varchar(60) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `subscription` text,
  `pubDate` varchar(30) DEFAULT NULL,
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

