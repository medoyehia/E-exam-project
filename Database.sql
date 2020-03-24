/*Database 'StudentAffairs'*/

create database IF NOT EXISTS `Student_Affairs`;
------------------------------------------------
--
/* Table structure for table `Levels` */
--
CREATE TABLE IF NOT EXISTS `Levels` (
    `Level_ID` int AUTO_INCREMENT NOT NULL,
    `Level_Name` varchar(60) NOT NULL ,
    `Level_Tables` varchar(255) NULL ,
    PRIMARY KEY(Level_ID)
    
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

-------------------------------------------------------------------------
--
/* Table structure for table `Levels_Department` */
--
    
CREATE TABLE IF NOT EXISTS `Levels_Department` (
    `Department_ID` int AUTO_INCREMENT NOT NULL,
    `Department_Name` varchar(60) NOT NULL ,
    `Department_Level_ID` int NOT NULL ,
    PRIMARY KEY(Department_ID),
    FOREIGN KEY (Department_Level_ID) REFERENCES Levels(Level_ID)
    
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

------------------------------------------------------------------------
--
/* Table structure for table `Staff`  */
--
CREATE TABLE IF NOT EXISTS `Staff` (
    `Staff_SSN` int NOT NULL,
    `Staff_Name` varchar(250) NOT NULL ,
    `Staff_Email` varchar(250) NOT NULL,
    `Staff_Phone` varchar(12) NOT NULL,
    `Staff_Type` varchar(150) NOT NULL, /* manager or admin*/
    `Staff_Image` varchar(100) NOT NULL,
    `Staff_Level_ID` int NOT NULL,
    PRIMARY KEY (Staff_SSN),
    FOREIGN KEY (Staff_Level_ID) REFERENCES Levels(Level_ID)
    )ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
    
 -----------------------------------------------------------------------------
--
/*Table structure for table `Student`*/
--
CREATE TABLE IF NOT EXISTS `Student` (
    `Student_SSN` int(14) NOT NULL,
    `Student_Name` varchar(250) NOT NULL,
    `Student_Email` varchar(250) NOT NULL,
    `Student_Code` varchar(20) NOT NULL ,
    `Student_Phone` int(11) NOT NULL,
    `Student_Address` varchar(250) NOT NULL,
    `Student_Gender` varchar(5) NOT NULL,
    `Student_GPA` varchar(50) NULL,
    `Student_Image` varchar(255) NOT NULL,
    PRIMARY KEY(Student_SSN)
    
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
---------------------------------------------------------------------------
--
/*Table structure for table `Request`*/
--

CREATE TABLE IF NOT EXISTS `Request` (
    `Request_ID` int AUTO_INCREMENT NOT NULL,
    `Request_Student_SSN` int(14) NOT NULL ,
    `Requester_Name` varchar(150) NOT NULL,
    `Request_Title` varchar(100) NOT NULL,
    `Request_Body` varchar(255) NOT NULL,
    `Request_Classification` varchar(150) NOT NULL,
    `Request_Priority` varchar(50) NOT NULL,
    `Request_Date` date NOT NULL,
    `Student_Status` varchar(60) NULL,
    `Acceptance_Level` varchar(60) NULL,
    `Pay_Tuition_Fees` varchar(60) NOT NULL, // ·„’«—Ì› «·œ—«”Ì… 
    `Position_Recruitment` varchar(60) NULL,//Êﬁ›Â „‰ «· Ã‰Ìœ 
    `Request_Image` varchar(255) NOT NULL,
    `Request_Level_ID` int NOT NULL,
    `Request_Dept_ID` int NOT NULL,
    PRIMARY KEY(Request_ID),
    FOREIGN KEY (Request_Level_ID) REFERENCES Levels(Level_ID),
    FOREIGN KEY (Request_Dept_ID) REFERENCES Levels_Department(Department_ID),
    FOREIGN KEY (Request_Student_SSN) REFERENCES Student(Student_SSN)
    
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

---------------------------------------------------------------------------

 --
 /* Table structure for table `Respons_to_Request` contact form  */
 --
 /*NOTE : not register date */
 
 CREATE TABLE IF NOT EXISTS `Respons_to_Request` (
    `Respons_ID` int AUTO_INCREMENT NOT NULL,
    `Requester_Replay` varchar(255) NOT NULL,
    `Request_Image` varchar(255) NOT NULL,
    `Respons_Request_ID` int NOT NULL,
    `Respons_Staff_SSN` int NOT NULL,
    PRIMARY KEY(Respons_ID),
    FOREIGN KEY (Respons_Request_ID) REFERENCES Request(Request_ID),
    FOREIGN KEY (Respons_Staff_SSN) REFERENCES Staff(Staff_SSN)
     
 )ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
     
-------------------------------------------------------------------------


--
/* Table structure for table `Wish_Statment`*/
--

CREATE TABLE IF NOT EXISTS `Wish_Statment` (
    `Wish_ID` int AUTO_INCREMENT NOT NULL,
    `Wish_Name` varchar(60) NOT NULL ,
    `Wish_File` varchar(255) NOT NULL ,
    `Wish_Department_ID` int NOT NULL ,
    PRIMARY KEY(Wish_ID),
    FOREIGN KEY (Wish_Department_ID) REFERENCES Levels_Department(Department_ID)
    
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

----------------------------------------------------------

/* NOTE : I can create table to news */ 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    