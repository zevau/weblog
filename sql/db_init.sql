CREATE TABLE IF NOT EXISTS `abx427_prg`.`user` (
  `USERNAME` VARCHAR(32) NOT NULL,
  `ABOUT` VARCHAR(1000) NULL DEFAULT NULL,
  `REGDATE` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `LOCATION` VARCHAR(45) NULL DEFAULT NULL,
  `PASSWORD` CHAR(32) NOT NULL,
  PRIMARY KEY (`USERNAME`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `abx427_prg`.`post` (
  `POST_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TITLE` VARCHAR(50) NULL DEFAULT NULL,
  `CONTENT` VARCHAR(1000) NULL DEFAULT NULL,
  `USERNAME` VARCHAR(32) NULL DEFAULT NULL,
  `POST_DATE` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`POST_ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;