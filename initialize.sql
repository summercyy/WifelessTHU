-- Social initial database structure

-- Table structure for table `session`

CREATE TABLE `user` (
 `id` varchar(128) NOT NULL,
 `name` varchar(128) NOT NULL,
 `register_time` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
 `latest_time` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
 PRIMARY KEY(`id`),
);
