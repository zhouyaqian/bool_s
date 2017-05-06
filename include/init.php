<?php
/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/11
 * Time: 20:55
 */

define('DEBUG',TRUE);
define('ROOT',str_replace('\\','/',dirname(dirname(__FILE__))).'/');

/*require(ROOT.'include/config.class.php');
require(ROOT.'include/log.class.php');
require(ROOT.'include/function.php');
require(ROOT.'include/Rmysqli.class.php');
require(ROOT.'Model/Model.class.php');
require(ROOT.'Model/BookModel.class.php');*/


/**
 * @param $class
 * 自动加载类
 */
function __autoload($class){
    if(strtolower(substr($class, -5)) == 'model'){
        require(ROOT.'Model/'.$class.'.class.php');
    }else{
        require(ROOT.'include/'.$class.'.class.php');
    }
}
if(DEBUG){
    error_reporting(E_ALL);
}else{
    error_reporting(0);
}