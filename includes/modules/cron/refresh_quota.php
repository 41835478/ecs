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
$sql = "SELECT * FROM " . $GLOBALS['ecs']->table('users') . " WHERE auto_delivery = 1";
$rows = $db->getAll($sql);
foreach($rows as $key=>$value){
	$rank = $value['user_rank'];
	$sql = "SELECT auto_delivery_quota FROM ".$GLOBALS['ecs']->table('user_rank')." WHERE rank_id = '$rank'";
	$quota = $db->getOne($sql);
	$sql="UPDATE ". $GLOBALS['ecs']->table('users') .
" SET auto_delivery_remaining = '$quota' WHERE auto_delivery = 1";
	$db->query($sql);
}
?>