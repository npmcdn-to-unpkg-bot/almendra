CREATE DATABASE IF NOT EXISTS `almendra`;
USE `almendra`;

CREATE TABLE IF NOT EXISTS `presenters` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
	`email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY(`id`),
	UNIQUE KEY `email` (`email`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `questions` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`room_id` INT(11) NOT NULL,
	`question` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`is_answered` TINYINT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY(`id`),
	KEY `room_id` (`room_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `questions_votes` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
	`is_active` TINYINT(1) NOT NULL DEFAULT '1',
	PRIMARY KEY(`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `room_owners` (
	`room_id` INT(11) NOT NULL,
	`presenter_id` INT(11) NOT NULL,
	KEY `room_id` (`room_id`, `presenter_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;