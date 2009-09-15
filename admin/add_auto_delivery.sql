ALTER TABLE ecs_user_rank
ADD (	auto_delivery_quota int(10) UNSIGNED DEFAULT '0' NOT NULL);
ALTER TABLE ecs_users
ADD ( 	auto_delivery 	tinyint(1) UNSIGNED DEFAULT '0' NOT NULL,
		auto_delivery_remaining int(10) UNSIGNED DEFAULT '0' NOT NULL);