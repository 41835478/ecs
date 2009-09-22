<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(dirname(dirname(__FILE__)).'/includes/cls_sql_executor.php');
$sql_files = array();
$sql_files[] = ROOT_PATH . 'admin/add_auto_delivery.sql';
$sql_files[] = ROOT_PATH . 'admin/add_foreign_currency.sql';
$se = new sql_executor($db,'utf8');
$result = $se->run_all($sql_files);
if($result)
	echo "用户数据库更新成功!";
else{
	echo "用户数据更新失败!!";
    echo $se->error;
}
?>