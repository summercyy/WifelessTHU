-- Social initial database structure

-- Table structure for table `user`

CREATE TABLE `user` (
  `userid` VARCHAR(16) NOT NULL,
  `name` VARCHAR(16) NOT NULL,
  `sex` VARCHAR(16) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `icon` VARCHAR(128) NOT NULL,
  `register_time` DATETIME NOT NULL DEFAULT '1000-01-01 00:00:00',
  `latest_time` DATETIME NOT NULL DEFAULT '1000-01-01 00:00:00',
  PRIMARY KEY (`userid`)
);