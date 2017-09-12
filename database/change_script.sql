-- Add field to table `datetime`
-- Ron
-- 31/8/2017
ALTER TABLE `article` ADD `datetime` DATETIME NULL AFTER `slug`;

-- Update table `is_deleted`
-- Ron
-- 4/09/2017
ALTER TABLE `article` CHANGE `is_delete` `is_deleted` TINYINT(1) NOT NULL;