
CREATE TABLE `images` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;