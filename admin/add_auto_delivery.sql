#ALTER TABLE ecs_user_rank
#ADD (	auto_delivery_quota int(10) UNSIGNED DEFAULT '0' NOT NULL);
#ALTER TABLE ecs_users
#ADD ( 	auto_delivery 	tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
#		auto_delivery_limit tinyint(1) UNSIGNED DEFAULT '0' NOT NULL);
#ALTER TABLE ecs_goods
#ADD ( auto_delivery tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
#      shop_delivery tinyint(1) UNSIGNED DEFAULT '1' NOT NULL);
ALTER TABLE ecs_goods
ADD ( auto_delivery_number int(1) UNSIGNED DEFAULT '1' NOT NULL,
      shop_delivery_number int(1) UNSIGNED DEFAULT '1' NOT NULL);