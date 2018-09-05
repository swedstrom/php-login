-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "testdb" --------------------------------
CREATE DATABASE IF NOT EXISTS `testdb` CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `testdb`;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
    `id` Int( 8 ) AUTO_INCREMENT NOT NULL,
    `email` VarChar( 60 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `password` VarChar( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `lname` VarChar( 25 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `fname` VarChar( 25 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `username` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    PRIMARY KEY ( `id` ),
    CONSTRAINT `email` UNIQUE( `email` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------
-- ---------------------------------------------------------


-- CREATE INDEX "index_lname" ------------------------------
-- CREATE INDEX "index_lname" ----------------------------------
CREATE INDEX `index_lname` USING BTREE ON `users`( `lname` );
-- -------------------------------------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------



