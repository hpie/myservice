-- --------------------------------------------------------

DROP TABLE IF EXISTS `service_customer` ;

--
-- Table structure for table `service_customer`
-- The table is for customer primary details with mobile number being the primery key
-- 

CREATE TABLE IF NOT EXISTS `service_customer` (
  `customer_mobile_number` varchar(20) NOT NULL COLLATE utf8_unicode_ci COMMENT "Mobile number of the customer",
  `customer_password` varchar(100) NOT NULL COLLATE utf8_unicode_ci COMMENT "Password for the customer",
  `customer_fname` varchar(20) NOT NULL COLLATE utf8_unicode_ci NOT NULL,  
  `customer_mname` varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
  `customer_lname` varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci,
  `customer_email` varchar(20) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT "Mobile number of the customer",
  `customer_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_country` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IN',
  `customer_last_login_dt` timestamp COMMENT "Last Login by the customer",
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_customer`
--
ALTER TABLE `service_customer`
  ADD PRIMARY KEY (`customer_mobile_number`);
  
-- Test Customer
INSERT INTO `service_customer` (`customer_mobile_number`, `customer_password`, `customer_fname`, `customer_mname`, `customer_lname`, `customer_email`, `customer_address`, `customer_city`, `customer_state`, `customer_country`, `customer_last_login_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES 
('0987654321', MD5('0987654321'), 'Test', NULL, NULL, NULL, 'xxx', 'yyy', '', 'IN', CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP, NULL, CURRENT_TIMESTAMP);
