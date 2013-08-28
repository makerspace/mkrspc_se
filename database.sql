
CREATE TABLE IF NOT EXISTS `urls` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(2048) NOT NULL,
  `created` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url_id` bigint(20) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url_id` (`url_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
