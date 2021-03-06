CREATE TABLE `system_page` (
	`id` INT(10) UNSIGNED NOT NULL,
	`group` INT(10) UNSIGNED NOT NULL,
	`name` CHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`state` CHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`parent_id` INT(10) NOT NULL,
	`login` INT(10) UNSIGNED NOT NULL DEFAULT '0',
	`type` INT(10) UNSIGNED NOT NULL DEFAULT '0',
	`div` CHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`url` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`func` CHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`php_class` CHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`, `group`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;