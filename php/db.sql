
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `messages` (
  `msg_no` int(11) NOT NULL,
  `senderid` int(255) NOT NULL,
  `reciverid` int(255) NOT NULL,
  `massseg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_no`);
ALTER TABLE `messages`
  MODIFY `msg_no` int(11) NOT NULL AUTO_INCREMENT;



CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `uniqueid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

commit;