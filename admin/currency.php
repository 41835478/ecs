<?php
define('IN_ECS', true);

require_once(dirname(__FILE__) . '/includes/init.php');
if ($_REQUEST['act'] == 'list') {
    $currencies = array();
    $currencies = $db->getAll("SELECT * FROM " .$ecs->table('currency'));
    $smarty->assign('currencies',$currencies);
    $smarty->assign('ur_here', $_LANG['foreign_currency']);
    assign_query_info();
    $smarty->display('currency.htm');
}
elseif($_REQUEST['act'] == 'edit_rate') {
    if(empty($_REQUEST['id']))
        make_json_error($_LANG['no_currency_name']);
    admin_priv('user_rank');
    $code = trim($_REQUEST['id']);
    $rate = empty($_REQUEST['val']) ? 1.00 : floatval($_REQUEST['val']);
    $sql = "UPDATE " . $ecs->table('currency') . " SET rate = '$rate' WHERE code = '$code'";
    if ($db->query($sql)){
        admin_log($code, 'edit', 'currency');
        if(isset($GLOBALS['currency_rate']))
            unset($GLOBALS['currency_rate']);
        make_json_result($rate);
    }
    else{
        make_json_error($_LANG['edit_currency_fail']);
    }
}
?>