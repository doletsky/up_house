<?php
/**
 * Created by PhpStorm.
 * User: adoletskiy
 * Date: 09.10.15
 * Time: 10:07
 */
$str=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/index_v20/js_menu_log.txt');
$str.=PHP_EOL.PHP_EOL.date("F j, Y, g:i a").PHP_EOL;
if(count($_POST)>0){
    $str.=print_r($_POST,true);
}else{
    $str.="POST is empty";
}
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/index_v20/js_menu_log.txt', $str);