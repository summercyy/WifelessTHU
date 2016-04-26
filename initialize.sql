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
  `token` VARCHAR(32) NOT NULL PRIMARY KEY,
  `userid` INTEGER NOT NULL,
  `type` VARCHAR(16) NOT NULL,
  `latest_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  FOREIGN KEY (`userid`) REFERENCES user(`userid`)
);