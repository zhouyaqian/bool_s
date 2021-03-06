<?php

/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/4/15
 * Time: 17:43
 */
class log
{
    const LOGNAME = 'curr.log';

    public static function write($content){
        $log = self::isBak();
        $con = date("Y-m-d H:i:s").":";
        $con .= "\r\n";
        $content = $con.$content;
        $fh = fopen($log,'ab');
        fwrite($fh,$content);
        fclose($fh);
    }

    public static function bak($log){
        $bak = ROOT.'data/log/'.date('ymd').mt_rand(1000,9999).'.log.bak';
        return rename($log,$bak);
    }

    public static function isBak(){
        $log = ROOT.'data/log/'.self::LOGNAME;
        if(!file_exists($log)){
            touch($log);
            return $log;
        }

        //判断日志文件是否已经超过1M，如果超过这个大小，则将之前的日志文件备份
        clearstatcache();//清楚文件缓存状态
        $size = filesize($log);
        if($size < 1024*1024){
            return $log;
        }

        if(self::bak($log)){
            touch($log);
            return $log;
        }else{
            return $log;
        }
    }
}