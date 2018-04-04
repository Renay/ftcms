CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `priority` int(11) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `console_log` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `server` varchar(255) NOT NULL,
  `cmd` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '-1',
  `priority` int(11) DEFAULT NULL,
  `purchase` tinyint(1) NOT NULL,
  `server_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `description` text,
  `commands` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `merchant` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `goods` varchar(55) NOT NULL,
  `server` varchar(20) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `sum` int(11) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `response` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `host` varchar(20) NOT NULL,
  `port` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key_field` varchar(20) NOT NULL,
  `value` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `rights_console` tinyint(1) NOT NULL DEFAULT '0',
  `last_activity` int(25) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `console_log`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_ibfk_1` (`categories_id`),
  ADD KEY `goods_ibfk_2` (`server_id`);
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `console_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1473;
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
ALTER TABLE `merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3179;
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`server_id`) REFERENCES `servers` (`id`) ON UPDATE NO ACTION;
COMMIT;