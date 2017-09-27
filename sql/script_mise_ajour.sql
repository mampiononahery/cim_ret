ALTER TABLE `user_accounts` CHANGE `uacc_password` `uacc_password` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '';

ALTER TABLE `user_accounts` CHANGE `uacc_salt` `uacc_salt` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `uacc_activation_token` `uacc_activation_token` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '', CHANGE `uacc_forgotten_password_token` `uacc_forgotten_password_token` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'NULL', CHANGE `uacc_forgotten_password_expire` `uacc_forgotten_password_expire` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;



INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`)
 VALUES 
 (NULL, '1', 'james@myretooch.com', 'james', '$2a$08$oBGZUrO6k4tF5KK5HmVMceDdTt3LP8aal7GPEPYKdiUq.frK3VhYG', '127.0.0.1', 'XKVT29q2Jr', '', 'bba7b356e2500377d7059653017dc2e9325be57f', '2017-09-27 00:00:00', '', '', '1', '0', '0', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`)
 VALUES ('1', 'Administrateur', 'Administrateur', '0');
 
 
 INSERT INTO `user_privileges` (`upriv_id`, `upriv_name`, `upriv_desc`) VALUES ('1', 'admin', 'administrateur');
 
 INSERT INTO `user_privilege_groups` (`upriv_groups_id`, `upriv_groups_ugrp_fk`, `upriv_groups_upriv_fk`) VALUES ('1', '1', '1');
 
 INSERT INTO `user_privilege_users` (`upriv_users_id`, `upriv_users_uacc_fk`, `upriv_users_upriv_fk`) VALUES ('1', '1', '1');
 
 ALTER TABLE `user_accounts` ADD `actif` BOOLEAN NOT NULL DEFAULT TRUE AFTER `uacc_date_added`;

