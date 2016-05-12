CREATE TABLE IF NOT EXISTS `school` (
  `id` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `school` (`id`, `name`) VALUES
('CCC', 'Corpus Christi Catholic School'),
('HSE', 'Holy Spirit Episcopal School'),
('OLG', 'Our Lady of Guadalupe Catholic School'),
('PLS', 'Pilgrim Lutheran School'),
('SAG', 'Saint Augustine Catholic School'),
('SAN', 'Saint Anne Catholic School'),
('SCC', 'Saint Christopher Catholic School'),
('TWC', 'The Woodlands Christian Academy');