CREATE DATABASE `EduSync`;

USE `EduSync`;

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
        `Email` VARCHAR(255) NOT NULL,
        `Experience` INT NOT NULL,
        `ExperienceGain` INT NOT NULL,
        `LastDegree` VARCHAR(255) NOT NULL,
        `LastWork` VARCHAR(255) NOT NULL,
        `Salary` INT NOT NULL,
        `Token` VARCHAR(255) NOT NULL,
        `resetToken` DATE  NULL,
        FOREIGN KEY (`ClassId`) REFERENCES `Class` (`Id`);
        FOREIGN key (`RoleId`) REFERENCES `Roles` (`Id`)
    );


CREATE TABLE
    `Permissions` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `UserId` INT NOT NULL,
        `ModuleId` INT NOT NULL,
        `AddPermission` INT NOT NULL,
        `EditPermission` INT NOT NULL,
        `DeletePermission` INT NOT NULL,
        `ViewPermission` INT NOT NULL,
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
        `TotalStudents` INT NOT NULL,
        FOREIGN KEY (`Id`) REFERENCES `Departments` (`Id`)
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


    INSERT INTO
    `Roles` (`Name`)
VALUES
    ('Admin'),
    ('lecturer'),
    ('lab incharge'),
    ('Staff');


INSERT INTO
    `Users` (
        `Id`,
        `RoleId`,
        `Name`,
        `classId`,
        `Subject`,
        `Address`,
        `Password`,
        `Email`
        `Experience`,
        `ExperienceGain`,
        `LastDegree`,
        `LastWork`,
        `Salary`
    )
VALUES
    (
        1,
        1,
        'OwnerName',
        '789',
        'Testing',
        'This is the testing address',
        'xyz',
        'alishpagda08@gmail.com',
        '10',
        '5',
        'B.E',
        'Testing',
        '10000'

    );

INSERT INTO
    `Modules` (`Name`)
VALUES
    ('Roles'),
    ('Class'),
    ('department'),
    ('Events'),
    ('Leave'),
    ('Subjects'),
    ('Users')

INSERT INTO
    `Permissions` (
        `UserId`,
        `ModuleId`,
        `AddPermission`,
        `EditPermission`,
        `DeletePermission`,
        `ViewPermission`
    )
VALUES
    (1, 1, 1, 1, 1, 1),
    (1, 2, 1, 1, 1, 1),
    (1, 3, 1, 1, 1, 1),
    (1, 4, 1, 1, 1, 1),
    (1, 5, 1, 1, 1, 1),
    (1, 6, 1, 1, 1, 1),
    (1, 7, 1, 1, 1, 1);