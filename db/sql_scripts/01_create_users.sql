CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `nickname` varchar(30) NOT NULL UNIQUE,
  `created_at` datetime NOT NULL DEFAULT NOW(),
  `activation_token` nvarchar(255),
  `avatar` varchar(255),
  PRIMARY KEY (`id`)
);

