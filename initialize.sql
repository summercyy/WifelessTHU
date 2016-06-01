-- Social initial database structure

-- Table structure for table `user`

CREATE TABLE IF NOT EXISTS `user` (
  `userid` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(32) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `sex` VARCHAR(16) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `icon` VARCHAR(8) NOT NULL,
  `register_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  `latest_time` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()
);

-- Table structure for table `token`

CREATE TABLE IF NOT EXISTS `token` (
  `token` VARCHAR(16) NOT NULL PRIMARY KEY,
  `userid` INTEGER NOT NULL,
  `type` VARCHAR(16) NOT NULL,
  `latest_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  FOREIGN KEY (`userid`) REFERENCES user(`userid`)
);

-- Table structure for table `friends`

CREATE TABLE IF NOT EXISTS `friends` (
  `first_name` VARCHAR (32) NOT NULL,
  `second_name` VARCHAR (32) NOT NULL,
  FOREIGN KEY (`first_name`) REFERENCES user(`name`),
  FOREIGN KEY (`second_name`) REFERENCES user(`name`),
  PRIMARY KEY (`first_name`, `second_name`)
);

-- Token clearing schedule

SET GLOBAL event_scheduler = 1;
CREATE EVENT IF NOT EXISTS `clear_token` ON SCHEDULE EVERY 1 DAY
DO DELETE FROM token WHERE TO_DAYS(NOW()) - TO_DAYS(latest_time) > 30;

-- Table structure for table `post`

CREATE TABLE IF NOT EXISTS `post` (
  `postid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userid` INTEGER NOT NULL,
  `text` TEXT NOT NULL,
  `images` VARCHAR(128) NOT NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  INDEX (`create_time`),
  FOREIGN KEY (`userid`) REFERENCES user(`userid`)
);

-- Table structure for table `comment`

CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `postid` BIGINT NOT NULL,
  `userid` INTEGER NOT NULL,
  `text` TINYTEXT NOT NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  INDEX (`create_time`),
  FOREIGN KEY (`postid`) REFERENCES post(`postid`),
  FOREIGN KEY (`userid`) REFERENCES user(`userid`)
);