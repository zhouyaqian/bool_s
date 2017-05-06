<?php
/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/23
 * Time: 16:45
 */

/**
 * 转义数组中的特殊字符
 * @param $arr
 * @return mixed
 */
function _addslashes($arr){
    //如果开启了自动转义的功能，则无需再进行转义
    //直接返回结果
    if(get_magic_quotes_gpc()){
        return $arr;
    }
    foreach($arr as $k=>$v){
        if(is_string($v)){
            $arr[$k] = addslashes($v);
        }elseif(is_array($v)){
            $arr[$k] = _addslashes($v);
        }
    }
    return $arr;
}