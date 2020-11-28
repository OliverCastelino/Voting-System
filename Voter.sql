SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Administrators` (
  `Admin_ID` int(5) NOT NULL,
  `Full_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone_Number` bigint(12) NOT NULL,
  `User_Name` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `Candidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `Votes` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `candidateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Members` (
  `Member_ID` int(5) NOT NULL,
  `Full_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone_Number` bigint(12) NOT NULL,
  `User_Name` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Positions` (
  `position_id` int(5) NOT NULL,
  `position_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Administrators`
  ADD PRIMARY KEY (`Admin_ID`);
  
  ALTER TABLE `Candidates`
  ADD PRIMARY KEY (`candidate_id`);
  
  ALTER TABLE `Votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`);
  
  ALTER TABLE `Members`
  ADD PRIMARY KEY (`Member_ID`);
  
  ALTER TABLE `Positions`
  ADD PRIMARY KEY (`position_id`);
  
  ALTER TABLE `Administrators`
  MODIFY `Admin_ID` int(5) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `Candidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `Votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `Members`
  MODIFY `Member_ID` int(5) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `Positions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `Votes`
  ADD CONSTRAINT `tblvotes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `Members` (`Member_ID`);
  
  COMMIT;
  
  


