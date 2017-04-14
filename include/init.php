<?php
/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/11
 * Time: 20:55
 */

define('DEBUG',TRUE);
define('ROOT',str_replace('\\','/',dirname(dirname(__FILE__))).'/');

include(ROOT.'include/config.class.php');
if(DEBUG){
    error_reporting(E_ALL);
}else{
    error_reporting(0);
}