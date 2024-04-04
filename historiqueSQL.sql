CREATE database FichtreDesRaids;
USE FichtreDesRaids;
SHOW DATABASES;
CREATE table USER(id int primary key not null auto_increment, email VARCHAR(255), password VARCHAR(255), pseudo VARCHAR(255));
CREATE table if not exist REPORT(id int primary key not null auto_increment, reportContent VARCHAR(1000));
CREATE table REPORT_TYPE(id int primary key not null auto_increment, reportType VARCHAR(255));
CREATE table API_KEY(id int primary key not null auto_increment, apiKey VARCHAR(255));
CREATE table `RANK`(id int primary key not null auto_increment, gradeRank VARCHAR(255));
-- On utilise les backticks car "RANK()" est une fonction sous MySQL8.0+ et Adminer rejette la nomination classique dans ce cas là.
create table `CHARACTER`(id int primary key not null auto_increment, level int);
create table `EVENT`(id int primary key not null auto_increment, currentDate DATE);
create table `AREA`(id int primary key not null auto_increment, zoneName VARCHAR(255), zoneLocation VARCHAR(255));
create table `REQUIRED`(id int primary key not null auto_increment, minLvl int, maxLvl int);
create table `EVENT_TYPES`(id int primary key not null auto_increment, eventTypes VARCHAR(255));

CREATE TABLE EventToArea (
    AreaID int,
    EventID int,
    PRIMARY KEY (AreaID, EventID),
    FOREIGN KEY (AreaID) REFERENCES AREA(id),
    FOREIGN KEY (EventID) REFERENCES EVENT(id)
);
CREATE TABLE EventToRequired (
    RequiredID int,
    EventID int,
    PRIMARY KEY (RequiredID, EventID),
    FOREIGN KEY (RequiredID) REFERENCES REQUIRED(id),
    FOREIGN KEY (EventID) REFERENCES EVENT(id)
);
CREATE TABLE EventToCharacter (
    CharacterID int,
    EventID int,
    PRIMARY KEY (CharacterID, EventID),
    FOREIGN KEY (CharacterID) REFERENCES CHARACTER(id),
    FOREIGN KEY (EventID) REFERENCES EVENT(id)
);
CREATE TABLE EventToCharacter (
    CharacterID int,
    EventID int,
    PRIMARY KEY (CharacterID, EventID),
    FOREIGN KEY (CharacterID) REFERENCES `CHARACTER`(id),
    FOREIGN KEY (EventID) REFERENCES EVENT(id)
);
CREATE TABLE UserToReport (
    UserID int NOT NULL,
    ReportID int,
    PRIMARY KEY (UserID, ReportID),
    FOREIGN KEY (UserID) REFERENCES USER(id),
    FOREIGN KEY (ReportID) REFERENCES REPORT(id)
);





