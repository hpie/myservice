
-- --------------------------------------------------------

--
-- Table structure for table `service_item`
-- All known service Items TV , FRIDGE, SOLAR_INVERTER, SOLAR_WATERHEATER, ELECTRICAL_GYSER
-- ITEM_CODE - ITEM_MAKE will be displayed on UI

CREATE TABLE `service_item` (
  `item_code` varchar(20) NOT NULL COMMENT "Unique ITEM CODE",
  `item_make_code` varchar(20) NOT NULL COMMENT "Make Manufacturer if the item",
  `item_desc` varchar(50) NOT NULL COMMENT "Detailed Description on the Item",
  `item_status` varchar(20) NOT NULL DEFAULT 'ACTIVE' COMMENT 'ACTIVE INACTIVE DISCONTINUED ',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_item`
--
ALTER TABLE `service_item`
  ADD PRIMARY KEY (`item_code`);

  
INSERT INTO `myservicedb`.`service_item` (`item_code`, `item_make_code`, `item_desc`, `item_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
('ELECTRICAL_GYSER', 'VGUARD', 'Electrical Gyser from V-Guard', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('FRIDGE_350', 'SAMSUNG', 'Refrigitor 350 lts Samsung', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('SOLAR_INVERTER', 'VGUARD', 'Solar Gyser from V-Guard', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);