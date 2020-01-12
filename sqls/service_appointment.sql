
-- --------------------------------------------------------

--
-- Table structure for table `service_appointment`
-- Appointment is auto created once ticket is accepted or assinged by the rep employee 
-- CANCLED, ASSIGNED, RESOLVED, REVISIT, CLOSED
-- 

CREATE TABLE `service_appointment` (
  `appointment_id` bigint(20) NOT NULL,
  `ticket_id` bigint(20) NOT NULL COMMENT 'FK from service_ticket table for which this appointment is generated',
  `appointment_date` date NOT NULL COMMENT 'Appointment date agreed with the customer',
  `appointment_time_range` varchar(20) NOT NULL COMMENT 'Appointment time range agreed with the customer  Example 10:30 - 17:00',
  `employee_id` varchar(20) NOT NULL COMMENT 'Employee ID who accepted the appointment FK from service_employee table',
  `appointment_status` varchar(20) NOT NULL DEFAULT 'ASSIGNED' COMMENT 'Employee can change the status to CANCLED, ASSIGNED, RESOLVED, REVISIT, CLOSED',
  `appointment_notes` varchar(20) DEFAULT NULL COMMENT 'Notes captured by the employee on status change by him',
  `created_by` varchar(20) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `service_appointment`
--
ALTER TABLE `service_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_appointment`
--
ALTER TABLE `service_appointment`
  MODIFY `appointment_id` bigint(20) NOT NULL AUTO_INCREMENT;
