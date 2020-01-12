-- --------------------------------------------------------

DROP TABLE IF EXISTS `service_employee` ;

--
-- Table structure for table `service_employee`
-- The table is for  . employee primary details with mobile number boing the primery key
-- 

CREATE TABLE IF NOT EXISTS `service_employee` (
  `employee_id` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "Unique Employee ID",
  `employee_password` varchar(100) NOT NULL COLLATE utf8_unicode_ci COMMENT "Password for the employee",
  `employee_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,  
  `employee_mname` varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
  `employee_lname` varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
  `employee_mobile_number` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "Mobile number of the employee",
  `employee_email` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "Mobile number of the employee",
  `employee_gender` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "Male, Female, Transgender",
  `employee_dob` date NOT NULL COLLATE utf8_unicode_ci,
  `employee_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_country` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IN',
  `employee_last_login_dt` timestamp NOT NULL COMMENT "Last Login by the employee",
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_employee`
--
ALTER TABLE `service_employee`
  ADD PRIMARY KEY (`employee_id`);
  

INSERT INTO `service_employee` (`employee_id`, `employee_password`, `employee_fname`, `employee_mname`, `employee_lname`, `employee_mobile_number`, `employee_email`, `employee_gender`, `employee_dob`, `employee_address`, `employee_city`, `employee_state`, `employee_country`, `employee_last_login_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
('system', MD5('system'), 'Syatem', NULL, NULL, '9816098160', 'system@hpie.in', 'Male', '2019-12-01', '', '', '', 'IN', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);