CREATE DATABASE `ManagementDb`;

USE `ManagementDb`;
CREATE TABLE
    `Modules` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL
    );

CREATE TABLE
    `Roles` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255),
        
    );

CREATE TABLE
    `Users` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `RoleId` INT NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `ClassId` INT NOT NULL, 
        `Subject` VARCHAR(255) NOT NULL,
        `Address` VARCHAR(255) NOT NULL,
        `Password` VARCHAR(255) NOT NULL,
        `Experience` INT NOT NULL,
        `ExperienceGain` INT NOT NULL,
        `LastDegree` VARCHAR(255) NOT NULL,
        `LastWork` VARCHAR(255) NOT NULL,
        `Salary` INT NOT NULL,
        FOREIGN KEY (`ClassId`) REFERENCES `Class` (`Id`);
        FOREIGN key (`RoleId`) REFERENCES `Roles` (`Id`)
    );


CREATE TABLE
    `Permissions` (
        `ADD` BOOLEAN,
        `Delete` BOOLEAN,
        `Select` BOOLEAN,
        `View` BOOLEAN,
        `ModuleId` INT NOT NULL,
        `UserId` INT NOT NULL,
        FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`),
        FOREIGN KEY (`ModuleId`) REFERENCES `Modules` (`Id`)
    );

CREATE TABLE 
`Departments` (
    `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(255) NOT NULL,
    `UserId` INT  NOT NULL,
    `StartedYear` DATE NOT NULL,
    `NoOfStudent` INT NOT NULL,
    FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`)

);

CREATE TABLE
    `Class` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(255) NOT NULL,
        `Boys` INT NOT NULL,
        `Girls` INT NOT NULL,
        `TotalStudents` INT NOT NULL
    );

CREATE TABLE
    `ClassAllodate` (`Id` INT NOT NULL, `Class` INT NOT NULL);

CREATE TABLE
    `Subjects` (
        `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `ClassId` INT NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        FOREIGN KEY (`ClassId`) REFERENCES `Class` (`Id`)
    );

CREATE TABLE
    `SubjectAllodate` (
        `Id` INT NOT NULL,
        `UserId` INT NOT NULL,
        `SubjectId` INT NOT NULL,
        FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`),
        FOREIGN KEY (`SubjectId`) REFERENCES `Subjects` (`Id`)
    );

CREATE TABLE
    `Event` (
        `Id` INT NOT NULL,
        `UserId` INT NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `DateTime` DATE,
        `Place` VARCHAR(255) NOT NULL,
        FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`)
    );

CREATE TABLE
    `Leave` (
        `Id` INT NOT NULL,
        `UserId` INT NOT NULL,
        `DateStart` DATE NOT NULL,
        `DateEnd` DATE NOT NULL,
        `Reason` VARCHAR(255) NOT NULL,
        `Status` VARCHAR(255) NOT NULL,
        FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`)
    );