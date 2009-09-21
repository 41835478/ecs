DROP TABLE IF EXISTS `ecs_currency`;
CREATE TABLE `ecs_currency` (
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL DEFAULT '',
  `rate` decimal(10,2) NOT NULL DEFAULT '1.00',
  PRIMARY KEY  (`code`)
)  TYPE=MyISAM;
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'CAD', '加元', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'EUR', '欧元', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'GBP', '英镑', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'USD', '美元', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'JPY', '日元', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'AUD', '澳元', 1.00);
INSERT INTO ecs_currency
(code, name, rate)
VALUES ( 'HKD', '港元', 1.00);