
-- --------------------------------------------------------

--
-- Table structure for table `service_type`
-- All known service types FAULT, INSTALLATION, REPAIR, SERVICE, OTHER
-- 

CREATE TABLE `service_type` (
  `service_type_code`varchar(20) NOT NULL COMMENT "Unique Service type FAULT , INSTALLATION, REPAIR, SERVICE, OTHER",
  `service_type_desc` varchar(20) NOT NULL COMMENT "Details of the service type",
  `service_type_status` varchar(20) NOT NULL DEFAULT 'ACTIVE' COMMENT 'ACTIVE INACTIVE DISCONTINUED ',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`service_type_code`);

  
  INSERT INTO `service_type` (`service_type_code`, `service_type_desc`, `service_type_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
  ('FAULT', 'fault with the item', 'ACTIVE', 'system', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
  ('INSTALLATION', 'Installation of the item', 'ACTIVE', 'system', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
  ('SERVICE', 'Serice of the item', 'ACTIVE', 'system', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
  ('OTHER', 'Other issue with the item', 'ACTIVE', 'system', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);