<?php

/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/11
 * Time: 21:00
 */
class config
{
    protected static $ins = null;
    protected $data = array();
    final function __construct()
    {
        include(ROOT.'include/config.inc.php');
        $this->data = $_CFG;
    }

    final function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getIns(){
        if(self::$ins instanceof self){
            return self::$ins;
        }else{
            self::$ins = new self;
            return self::$ins;
        }
    }

    /*
     * 使用魔术方法得到配置参数
     */
    public function __get($key){
        if(array_key_exists($key,$this->data)){
            return $this->data[$key];
        }else{
            return null;
        }
    }

    /*
     * 使用魔术方法重新设置配置参数的值
     */
    public function __set($key,$value){
        $this->data[$key] = $value;
    }

}

$conf = config::getIns();
/*//$conf = new config();
//echo $conf->host;
//print_r($conf);
$conf->user = 'hello';
echo $conf->user;*/
