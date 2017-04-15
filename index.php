<?php
/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/11
 * Time: 21:38
 */

include('./include/init.php');
/*$conf = config::getIns();
print_r($conf);*/

log::write('日志');
/*class mysql{
    public function query($sql){
        log::write($sql);
    }
}

$mysql = new mysql();
for($i=0;$i<100;$i++){
    $sql = "select id,goods_price,goods_pic,date from goods where id=".mt_rand(1,100);
    $mysql->query($sql);
}
echo '执行完毕！';*/