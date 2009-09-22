<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(dirname(__FILE__).'/includes/cls_json.php');
$currency = isset($_GET['currency'])  ? trim($_GET['currency']) : 0;
if(in_array($currency,$GLOBALS['allowed_currency'])){
    setcookie('ECS[preferred_currency]', "", time() - 3600,'/');
    setcookie('ECS[preferred_currency]', $currency, time() + 86400 * 7,'/');
    $json = new JSON;
    $res = array('error' => 0, 'message' => $currency);
    $val = $json->encode($res);
    exit($val);
}
elseif($currency == 'RMB'){
    setcookie('ECS[preferred_currency]', "", time() - 3600,'/');
    $json = new JSON;
    $res = array('error' => 0, 'message' => 'RMB');
    $val = $json->encode($res);
    exit($val);
}
else{
    $json = new JSON;
    $res = array('error' => 1, 'message' => 'invalid currency format');
    $val = $json->encode($res);
    exit($val);
}
?>