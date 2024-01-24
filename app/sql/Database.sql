CREATE DATABASE IF NOT EXISTS share_recipies;
USE share_recipies;

Create TABLE IF NOT EXISTS recipy (
    recipyID INT (11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    recipy TEXT NOT NULL,
    author VARCHAR(255),
    isEnabled enum('0','1')
);

CREATE TABLE IF NOT EXISTS user (
    userID INT(11) PRIMARY KEY AUTO_INCREMENT,
    fullName VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS comment (
    commentID INT(11) PRIMARY KEY AUTO_INCREMENT,
    userID INT(11) NOT NULL ,
    recipyID INT (11) NOT NULL ,
    comment LONGTEXT NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(userID),
    FOREIGN KEY (recipyID) REFERENCES recipy(recipyID)
);