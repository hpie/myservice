
-- --------------------------------------------------------

--
-- Table structure for table `service_item_make`
-- All known Items Mamufacturers SURYA, PHILIPS, VGUARD
-- item_make_code - item_make_code will be displayed on UI

CREATE TABLE `service_item_make` (
  `item_make_code` varchar(20) NOT NULL COMMENT "Unique ITEM CODE",
  `item_make_description` varchar(20) NOT NULL COMMENT "Make Manufacturer if the item",
  `item_make_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_make_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_make_email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_make_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_make_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_make_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_make_country` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IN',
  `item_status` varchar(20) NOT NULL DEFAULT 'ACTIVE' COMMENT 'ACTIVE INACTIVE DISCONTINUED ',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_item_make`
--
ALTER TABLE `service_item_make`
  ADD PRIMARY KEY (`item_make_code`);
  
INSERT INTO `service_item_make` (`item_make_code`, `item_make_description`, `item_make_mobile`, `item_make_phone`, `item_make_email`, `item_make_address`, `item_make_city`, `item_make_state`, `item_make_country`, `item_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
('VGUARD', 'V-Guard Electricals', '9876543210', NULL, NULL, 'aaa', 'bbb', 'ccc', 'IN', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('SAMSUNG', 'Samsung Electornics', '9817098170', NULL, NULL, 'aaa', 'bbb', 'ccc', 'IN', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);
