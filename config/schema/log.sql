-- Emon 13.3.2016 --
ALTER TABLE `bids` ADD `admin_status` INT(1) NOT NULL DEFAULT '1' COMMENT '1 = Processing; 2 = Complete; 3=Incomplete; 4=Invalid' AFTER `is_initial`;
-- Emon 14.3.2016
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `uuid` varchar(32) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `attachments` text,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '1 = message; 2 = reply',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = open, 2 = close, 3= invalid , 4 =expired',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `ticket_id` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Emon 15.3.2016 --
ALTER TABLE `tickets` CHANGE `priority` `priority` INT(1) NOT NULL COMMENT '1 = critical; 2 = medium; 3 = low';
-- Emon 22.2.2015 --

-- Types --
CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = Active; 2= Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `types`
--
ALTER TABLE `types`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


-- Categories --

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = Active; 2 = Inactive',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



--  Emon 22.3.2016 --
ALTER TABLE `properties` CHANGE `category` `category_id` INT(11) NOT NULL;
ALTER TABLE `properties` ADD INDEX(`category_id`);

ALTER TABLE `properties` CHANGE `type` `type_id` INT(11) NOT NULL;
ALTER TABLE `properties` ADD INDEX(`type_id`);

ALTER TABLE `properties` ADD FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `properties` ADD FOREIGN KEY (`type_id`) REFERENCES `types`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Rana (22 March, 2016) --
ALTER TABLE  `categories` CHANGE  `name`  `name` VARCHAR( 128 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE  `categories` ADD  `slug` INT( 128 ) NOT NULL AFTER  `name` ;
ALTER TABLE  `types` CHANGE  `name`  `name` VARCHAR( 128 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE  `types` ADD  `slug` VARCHAR( 128 ) NOT NULL AFTER  `name` ;
ALTER TABLE  `categories` CHANGE  `slug`  `slug` VARCHAR( 128 ) NOT NULL ;


-- Emon 22.3.16 Requirements Table --
CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_ids` text,
  `category_ids` text,
  `min_price` decimal(10,2) DEFAULT '0.00',
  `max_price` decimal(10,2) DEFAULT '0.00',
  `room` smallint(6) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- RANA (23, 3, 2016) --
ALTER TABLE  `properties` ADD  `is_featured` INT( 1 ) NULL COMMENT  'is_featured: 1 = Yes 2= No' AFTER  `type_id` ;
ALTER TABLE  `properties` CHANGE  `is_featured`  `is_featured` INT( 1 ) NOT NULL DEFAULT  '2' COMMENT  'is_featured: 1 = Yes 2= No';


-- Emon (23, 3, 2016) --

-- Add subscription table --

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `email` varchar(128) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Emon 28.3.2016 --

ALTER TABLE  `messages` ADD  `property_id` INT( 11 ) NOT NULL AFTER  `message_id` ;

ALTER TABLE `messages` CHANGE `property_id` `property_id` INT(11) NULL;
ALTER TABLE `messages` ADD INDEX(`property_id`);
ALTER TABLE `messages` ADD FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- EMON 29.3.2016 --
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `time` datetime NOT NULL,
  `is_agree` int(1) DEFAULT NULL COMMENT AS `1 = Yes; 2 = No`,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = pending; 2 = complete; 3 = incomplete; 4 = invalid',
  `created` datetime NOT NULL,
  `modifiel` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `seller_id` (`seller_id`),
ADD KEY `property_id` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

-- EMON . 31.4.2016 --
DROP TABLE IF EXISTS `requirements`;

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `min_price` decimal(10,2) DEFAULT '0.00',
  `max_price` decimal(10,2) DEFAULT '0.00',
  `min_room` smallint(6) DEFAULT '0',
  `max_room` smallint(6) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories_requirements` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--


-- --------------------------------------------------------

--
-- Table structure for table `requirements_types`
--

CREATE TABLE `requirements_types` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_requirements`
--
ALTER TABLE `categories_requirements`
ADD PRIMARY KEY (`id`),
ADD KEY `category_id` (`category_id`),
ADD KEY `requirement_id` (`requirement_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `user_id_2` (`user_id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requirements_types`
--
ALTER TABLE `requirements_types`
ADD PRIMARY KEY (`id`),
ADD KEY `type_id` (`type_id`),
ADD KEY `requirement_id` (`requirement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_requirements`
--
ALTER TABLE `categories_requirements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `requirements_types`
--
ALTER TABLE `requirements_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_requirements`
--
ALTER TABLE `categories_requirements`
ADD CONSTRAINT `categories_requirements_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `categories_requirements_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirements_types`
--
ALTER TABLE `requirements_types`
ADD CONSTRAINT `requirements_types_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `requirements_types_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Emon 3 April 2016 --
ALTER TABLE `profiles` ADD `seller_type` INT(1) NOT NULL DEFAULT '0' COMMENT '1 = Agent; 2 = Whole Seller; 3 = Home Owner' AFTER `year_inventing_type`;

ALTER TABLE `profiles` ADD `owner_type` INT(1) NOT NULL DEFAULT '0' AFTER `seller_type`;

ALTER TABLE `profiles` ADD `reason_for_selling` TEXT NULL COMMENT 'For seller user' AFTER `owner_type`;

ALTER TABLE `profiles` ADD `how_many_listings` INT NOT NULL DEFAULT '0' COMMENT 'For agent user' AFTER `reason_for_selling`;

ALTER TABLE `profiles` ADD `advertising_interest` INT(1) NOT NULL DEFAULT '0' COMMENT '1 = Yes; 2 = No [For Agent]' AFTER `how_many_listings`;
ALTER TABLE `profiles` ADD `reason_for_investing` TEXT NOT NULL COMMENT 'For Investor' AFTER `advertising_interest`;

ALTER TABLE `requirements` ADD `min_bedroom` SMALLINT NOT NULL DEFAULT '0' AFTER `max_room`;
ALTER TABLE `requirements` ADD `max_bedroom` SMALLINT NOT NULL DEFAULT '0' AFTER `modified`, ADD `min_bathroom` SMALLINT NOT NULL DEFAULT '0' AFTER `max_bedroom`, ADD `max_bathroom` SMALLINT NOT NULL DEFAULT '0' AFTER `min_bathroom`, ADD `is_newsletter` INT(1) NOT NULL COMMENT '1 = yes; 2 = No' AFTER `max_bathroom`;

ALTER TABLE `profiles` CHANGE `seller_type` `seller_type` INT(1) NULL COMMENT '1 = Agent; 2 = Whole Seller; 3 = Home Owner';


-- RANA April 2, 2016 --

ALTER TABLE  `properties` ADD  `lat` VARCHAR( 32 ) NOT NULL AFTER  `country` ,
ADD  `lng` VARCHAR( 32 ) NOT NULL AFTER  `lat` ;

-- Emon April 6 , 2016 --
ALTER TABLE `profiles` ADD `agent_id` INT NULL AFTER `reason_for_investing`;

-- RANA (April 7, 2016) --
ALTER TABLE  `bids` ADD  `technology_fee` DECIMAL( 10, 2 ) NOT NULL ,
ADD  `premium_buyer_fee_percentage` DECIMAL( 2, 2 ) NOT NULL ,
ADD  `premium_buyer_fee` DECIMAL( 10, 2 ) NOT NULL ,
ADD  `total` DECIMAL( 10, 2 ) NOT NULL ;
ALTER TABLE  `bids` CHANGE  `premium_buyer_fee_percentage`  `premium_buyer_fee_percentage` DECIMAL( 10, 2 ) NOT NULL ;
  ALTER TABLE  `bids` ADD  `technology_fee` DECIMAL( 10, 2 ) NOT NULL ,
  ADD  `premium_buyer_fee_percentage` DECIMAL( 2, 2 ) NOT NULL ,
  ADD  `premium_buyer_fee` DECIMAL( 10, 2 ) NOT NULL ,
  ADD  `total` DECIMAL( 10, 2 ) NOT NULL ;
  ALTER TABLE  `bids` CHANGE  `premium_buyer_fee_percentage`  `premium_buyer_fee_percentage` DECIMAL( 10, 2 ) NOT NULL ;
  -- phpMyAdmin SQL Dump
  -- version 4.0.10deb1
  -- http://www.phpmyadmin.net
  --
  -- Host: localhost
  -- Generation Time: Apr 07, 2016 at 06:32 PM
  -- Server version: 5.5.47-0ubuntu0.14.04.1
  -- PHP Version: 5.5.9-1ubuntu4.14

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET time_zone = "+00:00";

  --
  -- Database: `strastic2`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `settings`
  --

  CREATE TABLE IF NOT EXISTS `settings` (
    `id` int(4) NOT NULL AUTO_INCREMENT,
    `meta` varchar(255) NOT NULL,
    `value` text NOT NULL,
    `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Status: 1 = Active, 2 = Inactive',
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;
ALTER TABLE  `bids` ADD  `technology_fee` DECIMAL( 10, 2 ) NOT NULL ,
ADD  `premium_buyer_fee_percentage` DECIMAL( 2, 2 ) NOT NULL ,
ADD  `premium_buyer_fee` DECIMAL( 10, 2 ) NOT NULL ,
ADD  `total` DECIMAL( 10, 2 ) NOT NULL ;
ALTER TABLE  `bids` CHANGE  `premium_buyer_fee_percentage`  `premium_buyer_fee_percentage` DECIMAL( 10, 2 ) NOT NULL ;


-- EMON (April 7, 2016) --
ALTER TABLE `profiles` ADD `sale_by` DATETIME NULL AFTER `agent_id`;
ALTER TABLE `profiles` ADD `ownership_type` INT(1) NULL COMMENT '1 = BANK OWNED ; 2 =I FULLY OWN MY HOME; 3 =MULTIPLE OWNERS' AFTER `sale_by`;

