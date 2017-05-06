<?php

/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/5/6
 * Time: 20:26
 */
class Model{
    protected $table = null;    //指定数据库表名
    protected $db = null;   //连接数据库对象

    protected function __construct(){
        $this->db = Rmysqli::getIns();
    }

    public function M($table){
        $this->table = $table;
    }

}