<?php

/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/24
 * Time: 19:43
 */
class Rmysqli
{
    private static $ins = null; //单例对象
    private $link = null;   //连接数据库
    private $conf = array();    //读取配置文件的数据

    protected function __construct(){
        $this->conf = config::getIns();
        $this->connect($this->conf->host,$this->conf->user,$this->conf->password,$this->conf->db);
    }

    /**
     * @return null|Rmysqli
     * 返回Rmysqli的一个单例
     */
    public static function getIns(){
        if(self::$ins instanceof self){
            return self::$ins;
        }else{
            self::$ins = new self();
            return self::$ins;
        }
    }

    /**
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     * 使用mysqli连接数据库，设置字符编码
     */
    private function connect($host,$user,$password,$db){

        $this->link = mysqli_connect($host, $user, $password, $db);
        mysqli_set_charset($this->link, "utf8");
        if(!$this->link){
            $error = 'Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error();
            log::write($error); //将错误信息写入日志
            die($error);
        }
    }


    /**
     * @param $sql
     * @return bool|mysqli_result
     * 执行sql语句
     */
    public function query($sql){
        $rs = mysqli_query($this->link, $sql);
        log::write($sql);
        return $rs;
    }


    /**
     * @param $sql
     * @return array
     * 处理数据查询
     */
    public function select($sql){
        $result = $this->query($sql);
        $arr = array();
        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }
        return $arr;
    }
}