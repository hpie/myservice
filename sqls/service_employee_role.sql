
-- --------------------------------------------------------

--
-- Table structure for table `service_employee_role`
-- Mapp table for Employee to its roles,

CREATE TABLE `service_employee_role` (
  `employee_role_id` bigint(20) NOT NULL,
  `role_code` varchar(20) NOT NULL COMMENT "FK role_code from service_role",
  `employee_id` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "FK Employee ID from service_employee",
  `role_status` varchar(20) NOT NULL DEFAULT 'ACTIVE' COMMENT 'ACTIVE INACTIVE',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_employee_role`
--
ALTER TABLE `service_employee_role`
  ADD PRIMARY KEY (`employee_role_id`);
  
--
-- AUTO_INCREMENT for table `service_employee_role`
--
ALTER TABLE `service_employee_role`
  MODIFY `employee_role_id` bigint(20) NOT NULL AUTO_INCREMENT;
  
  
INSERT INTO `service_employee_role` (`employee_role_id`, `role_code`, `employee_id`, `role_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(NULL, 'ADMIN', 'system', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
(NULL, 'MANAGER', 'system', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP),
(NULL, 'EXECUTEIVE', 'system', 'ACTIVE', NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);
