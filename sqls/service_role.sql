
-- --------------------------------------------------------

--
-- Table structure for table `service_role`
-- ROLE CODE ADMIN, MANAGER, EXECUTIVE, READONLY,
-- ROLE_CODE - role_code will be displayed on UI
-- ADMIN - Can create employee and assigen role and create and assign tickets and update master data.
-- MANAGER - Can create and assign tickets to EXECUTIVE and can close them adding description.
-- EXECUTEIVE - Ticket can only be assigend to eomplyee with role Executive, and can change status of the appointment only.
-- READONLY - Only search and view no change

CREATE TABLE `service_role` (
  `role_code` varchar(20) NOT NULL COMMENT "Unique Role Code ADMIN, MANAGER, EXECUTEIVE, READONLY",
  `role_desc` varchar(500) NOT NULL COMMENT "Descripetion of the role",
  `role_status` varchar(20) NOT NULL DEFAULT 'ACTIVE' COMMENT 'ACTIVE INACTIVE',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_role`
--
ALTER TABLE `service_role`
  ADD PRIMARY KEY (`role_code`);

  
INSERT INTO `service_role` (`role_code`, `role_desc`, `role_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
('ADMIN', 'ADMIN - Can create employee and assigen role and create and assign tickets and update master data.', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('MANAGER', 'MANAGER - Can create and assign tickets to EXECUTIVE and can close them adding description.', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('EXECUTEIVE', 'EXECUTEIVE - Ticket can only be assigend to eomplyee with role Executive, and can change status of the appointment only.', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
('READONLY', 'READONLY - Only search and view no change.', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);