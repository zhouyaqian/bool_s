<?php

/**
 * Created by PhpStorm.
 * User: 周雅倩
 * Date: 2017/5/6
 * Time: 20:40
 */
class BookModel extends Model{
    protected $table = 'book';

    public function __construct(){
        parent::__construct();
    }

    /**
     * @param array $field 需要查询的字段
     * @param array $where 查询条件
     * @return array
     * 做数据查询，默认查询表中的所有数据
     */
    public function select($field = array(), $where = array()){
        if(!empty($field)){ //将数组字段拆分成字符串格式
            $fd = implode(',',$field);
        }else{
            $fd = "*";
        }
        if(!empty($where)){//拼接条件语句
            $str = "";
            foreach($where as $k=>$v){
                $str .= "$k = $v and ";
            }
            $str = rtrim($str,'and');
            $sql = "select {$fd} from {$this->table} where {$str}";
        }else{
            $sql = "select {$fd} from {$this->table}";
        }
        $result = $this->db->select($sql);
        return $result;
    }
}