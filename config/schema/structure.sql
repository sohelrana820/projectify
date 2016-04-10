-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2016 at 02:12 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `strastic2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Status: 1 = Pending, 2 = Accepted, 3 = Denied, 4 = Invalid, 5 = Expired',
  `type` varchar(16) DEFAULT 'received',
  `initial_offering_price` decimal(10,2) DEFAULT NULL,
  `accepted_offering_price` decimal(10,2) DEFAULT NULL,
  `is_initial` int(1) NOT NULL DEFAULT '0' COMMENT 'is_initial: 0 = No, 1 = Yes',
  `offering_price` decimal(10,2) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`),
  KEY `bider_id` (`user_id`),
  KEY `user_id` (`user_id`),
  KEY `bid_id` (`parent_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL COMMENT 'GENDER: 1 = Male, 2 = female',
  `birthday` date DEFAULT NULL,
  `street_1` varchar(255) DEFAULT NULL,
  `street_2` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `bio` text,
  `investment_dollars` decimal(10,2) NOT NULL,
  `owned_properties` smallint(6) NOT NULL,
  `year_inventing_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = not interested, 1 = rent , 2 = buy ',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `area` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `room` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bedroom` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bathroom` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `garage` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `balcony` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT 'status: 0 = Pending, 1 = Approved, 2 = Disapproved, 3 = Invalid',
  `faf_after_repair_value` decimal(8,2) DEFAULT NULL,
  `faf_investor_price` decimal(8,2) DEFAULT NULL,
  `faf_closing_costs_to_buy` decimal(8,2) DEFAULT NULL,
  `faf_rehab_projection` decimal(8,2) DEFAULT NULL,
  `faf_utilities` decimal(8,2) DEFAULT NULL,
  `faf_closing_costs_to_sell` decimal(8,2) DEFAULT NULL,
  `faf_listing_agent_commission` decimal(8,2) DEFAULT NULL,
  `faf_total_projected_profit` decimal(8,2) DEFAULT NULL,
  `faf_estimated_roi` decimal(2,2) DEFAULT NULL,
  `rah_investor_price` decimal(8,2) DEFAULT NULL,
  `rah_closing_costs_to_buy` decimal(8,2) DEFAULT NULL,
  `rah_rehab_projection` decimal(8,2) DEFAULT NULL,
  `rah_utilities` decimal(8,2) DEFAULT NULL,
  `rah_property_insurance` decimal(8,2) DEFAULT NULL,
  `rah_estimated_taxes` decimal(8,2) DEFAULT NULL,
  `rah_property_management` decimal(8,2) DEFAULT NULL,
  `rah_maintenance` decimal(8,2) DEFAULT NULL,
  `rah_hoa_dues` decimal(8,2) DEFAULT NULL,
  `rah_projected_income` decimal(8,2) DEFAULT NULL,
  `rah_estimated_apy` decimal(2,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `galleries` text,
  `category` tinyint(3) unsigned NOT NULL COMMENT '1 = Sell , 2 = Rent, 3 = Development',
  `type` tinyint(3) unsigned NOT NULL COMMENT '1 = Office, 2 = Shop, 3 = Villa , 4 = Apartment',
  `visit_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '2' COMMENT 'role: 1 = admin, 2 = seller,  3 = Invertor',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'status: 1 = Active, 0 = Inactive',
  `email_verify` int(1) NOT NULL DEFAULT '0',
  `email_verifying_code` varchar(32) DEFAULT NULL,
  `forgot_pass_code` varchar(32) DEFAULT NULL,
  `property_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(11) DEFAULT NULL,
  `ip_address` varchar(128) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `bids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
