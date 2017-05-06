<?php
/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/11
 * Time: 21:38
 */
header("Content-Type:text/html;charset=utf-8");
require('./include/init.php');
/*$conf = config::getIns();
print_r($conf);*/

//log::write('日志');
//$_GET = _addslashes($_GET);
/*$res = get_magic_quotes_gpc();
var_dump($res);
print_r($_GET);*/
/*$mysqli = Rmysqli::getIns();
var_dump($mysqli);
$sql = "select * from book";
$result = $mysqli->select($sql);
var_dump($result);*/

$model = new BookModel();
$model->M('book');
$data[0] = 'id';
$data[] = 'content';
//$where['id'] = 3;
$rs = $model->select($data);
var_dump($rs);