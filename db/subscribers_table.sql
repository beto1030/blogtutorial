CREATE TABLE `subscribers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `verify_code` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
 `is_verified` tinyint(1) NOT NULL DEFAULT '0',
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `status` tinyint(1) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 
