
-- --------------------------------------------------------

--
-- Table structure for table `service_ticket`
-- OPEN, CANCLED, ASSIGNED, RESOLVED, CLOSED
-- 

CREATE TABLE `service_ticket` (
  `ticket_id` bigint(20) NOT NULL,
  `customer_mobile_number` varchar(20) NOT NULL COMMENT "Mobile number of the customer as FK from service_customer table",
  `appointment_date` date NOT NULL COMMENT 'Preffered appointment date given by the customer',
  `appointment_time_range` varchar(20) NOT NULL COMMENT 'Visiting time range suggested by the customer Example 10:30 - 17:00',
  `location_longitude` varchar(20) DEFAULT NULL COMMENT 'Customer pinned location Longitude from google map',
  `location_latitude` varchar(20) DEFAULT NULL COMMENT 'Customer pinned location Latitude from google map',
  `service_item_id` varchar(20) NOT NULL COMMENT 'FK from service_item table for which service is requested by customer',
  `service_type_id` varchar(20) NOT NULL COMMENT 'FK from service_type table for Types of service requested by customer',
  `service_desc` varchar(500) DEFAULT NULL COMMENT 'Details of the service by Customer',
  `ticket_status` varchar(20) NOT NULL DEFAULT 'OPEN' COMMENT 'Status of the ticket OPEN, CANCLED, ASSIGNED, RESOLVED, CLOSED',
  `clouser_notes` varchar(500) DEFAULT NULL COMMENT 'Details of the service closure by Customer or Employee',
  `invoice_amount` double NOT NULL DEFAULT '0.00' COMMENT 'Invoice if any charged to the customer',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_ticket`
--
ALTER TABLE `service_ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_ticket`
--
ALTER TABLE `service_ticket`
  MODIFY `ticket_id` bigint(20) NOT NULL AUTO_INCREMENT;
