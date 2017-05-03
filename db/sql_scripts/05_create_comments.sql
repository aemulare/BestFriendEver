CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `article_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES users (`id`),
  FOREIGN KEY (`article_id`) REFERENCES articles (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);
