<?php
$cron_lang = ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/cron/refresh_quota.php';
if (file_exists($cron_lang))
{
    global $_LANG;

    include_once($cron_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'refresh_quota_desc';

    /* 作者 */
    $modules[$i]['author']  = 'Daniel';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.ecshop.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    //$modules[$i]['config']  = array(
    //    array(),
    //);

    return;
}
$sql ="SELECT * FROM ".$GLOBALS['ecs']->table('user_rank');
$rows = $db->getAll($sql);
foreach($rows as $key=>$row){
	$rank_id = $row['rank_id'];
	$quota = $row['auto_delivery_quota'];
	$special_rank = $row['special_rank'];
	$min_points = $row['min_points'];
	$max_points = $row['max_points'];
	$sql="UPDATE ". $GLOBALS['ecs']->table('users') .
" SET auto_delivery_remaining = '$quota'";
	if($special_rank > 0)
		$sql .= " WHERE user_rank = '$rank_id'";
	else
		$sql .= " WHERE rank_points >= '$min_points' AND rank_points <= '$max_points'";
	$db->query($sql);
}
?>