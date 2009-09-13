<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(dirname(dirname(__FILE__)).'/includes/cls_sql_executor.php');
$sql_files = array( ROOT_PATH . 'admin/add_auto_delivery.sql');
$se = new sql_executor($db,EC_DB_CHARSET);
$result = $se->run_all($sql_files);
if($result)
	echo "用户数据库更新成功!";
else
	echo "用户数据更新失败!!";	
?>