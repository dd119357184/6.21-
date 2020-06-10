<?php
 class dbTxt extends txtSQL{public $options; public $data; public function __construct($db_path='',$db_name='',$db_table){parent::__construct(); $this->options=array(); $this->data=array(); $this->_LIBPATH=$db_path; $this->_STRICT=false; $this->connect(); $this->selectdb($db_name); $this->table(strtolower($db_table)); return $this; } public function nocache(){$this->emptyCache(); } private function clearOption(){$this->data=array(); foreach($this->options as $k=>$vo){if(!in_array($k,array('table','hashtable'))) $this->options[$k]=null; } } public function delete($options=array()){num('db_write_num',1); if(empty($options)){$options=$this->options; }else{$options=array( 'table'=>$this->options['table'], 'where'=>$this->options['where'], ); if($this->options['limit']) $options['limit']=$this->options['limit']; } $result=parent::delete($options); $this->clearOption(); return $result; } public function select($options=array()){num('db_query_num',1); if(empty($options)){$options=$this->options; } $result=parent::select($options); $this->clearOption(); return $result; } public function find($options=array()){if(empty($options)){$options=$this->options; } $options['limit']=array(1); $result=$this->select($options); if($result) return $result[0]; return $result; } public function count(){if($this->options['where']){$options=array( 'table'=>$this->options['table'], 'where'=>$this->options['where'], ); $result=$this->select($options); $count=count($result); }else{$count=parent::table_count($this->options['table']); } $this->clearOption(); return $count; } public function setInc($field,$step=1){num('db_write_num',1); $options=array( 'table'=>$this->options['table'], 'where'=>$this->options['where'], ); $data=$this->find($options); $step+=$data[$field]; $options['values']=array($field=>$step); $result=parent::update($options); $this->clearOption(); return $result; } public function setDec($field,$step=1){num('db_write_num',1); $options=array( 'table'=>$this->options['table'], 'where'=>$this->options['where'], ); $data=$this->find($options); $step-=$data[$field]; $options['values']=array($field=>$step); $result=parent::update($options); $this->clearOption(); return $result; } public function save($data=''){num('db_write_num',1); if(empty($data)){if(!empty($this->data)){$data=$this->data; $this->data=array(); }else{$this->error='数据为空！'; return false; } } $options=array( 'table'=>$this->options['table'], 'where'=>$this->options['where'], 'values'=>$data, ); if($this->options['limit']) $options['limit']=$this->options['limit']; $result=parent::update($options); $this->clearOption(); return $result; } public function add($data=''){num('db_write_num',1); if(empty($data)){if(!empty($this->data)){$data=$this->data; $this->data=array(); }else{$this->error='数据为空！'; return false; } } $result=parent::insert(array( 'table'=>$this->options['table'], 'values'=>$data, )); if(false !== $result ){$insertId=$this->last_insert_id($this->options['table']); if($insertId) return $insertId; } $this->clearOption(); return $result; } public function create($data='',$type=''){if(empty($data)){$data=$_POST; }elseif(is_object($data)){$data=get_object_vars($data); } if(empty($data) || !is_array($data)){$this->error='非法数据对象！'; return false; } $this->data=$data; return $data; } public function data($data=''){if('' === $data && !empty($this->data)){return $this->data; } if(is_object($data)){$data=get_object_vars($data); }elseif(is_string($data)){parse_str($data,$data); }elseif(!is_array($data)){exception('非法数据对象！'); } $this->data=$data; return $this; } public function table($name=''){$this->options=array(); if(!empty($name)){$this->options['tablename']=$name; $this->options['table']=$name; } return $this; } public function getFields($table=''){if(!empty($table)) $this->options['table']=$table; $result=parent::getFields(array('table'=>$this->options['table'])); $this->clearOption(); return $result; } public function field($name=''){if(!empty($name)) $this->options['select']=$name; return $this; } public function limit($offset,$length=null){$this->options['limit']=is_null($length)?array('0',$offset):array($offset,$length); return $this; } public function order($orderby=''){if(is_string($orderby)){$order_arr=explode(',', $orderby); $order_arr=array_map('trim',$order_arr); foreach($order_arr as $k=>$vo){if($vo=='') continue; $vo_arr=explode(' ', $vo); if($vo_arr[0]=='' || $vo_arr[1]=='' ) continue; $temp_order_arr[]=$vo_arr[0]; $temp_order_arr[]=strtoupper($vo_arr[1]); } } $this->options['orderby']=$temp_order_arr; return $this; } public function where($where=''){if(empty($where)) return $this; if(is_object($where)){$where=get_object_vars($where); }else if(is_string($where) && '' != $where){$where=array($where); } $wherearr=array(); if(is_array($where)){foreach($where as $k=>$vo){$where[$k]=str_ireplace(array(' LIKE ',' NOT LIKE ',' IN ',' NOT IN '),array(' =~ ',' !~ ',' ? ',' !? '),$vo); if(!is_numeric($k)){$where[$k]="{$k}={$vo}"; } $wherearr[]=$where[$k]; } $this->options['where']=$wherearr; } return $this; } public function setHashNum($num){if(!empty($num)) $this->options['hashfilenum']=intval($num); return $this; } public function getHash($key,$ismake=false){if(!isset($this->options['hashtable'])) $this->options['hashtable']=$this->options['table']; if(!isset($this->options['hashfilenum'])) $this->options['hashfilenum']=50; $table=$this->options['hashtable']; $hash=sprintf("%u", crc32($key)); $hash1=intval(fmod($hash, $this->options['hashfilenum'])); $hash_table=$table.$hash1; $file=DB_PATH.$table.'/'.$hash_table.'.MYD'; if(!is_file($file)){if($ismake){write($file,'a:0:{}'); } } $this->options['table']=$hash_table; return $this; } public function has(){$table=$this->options['tablename']?$this->options['tablename']:$this->options['hashtable']; $file=DB_PATH.$table.'/'.$this->options['table'].'.MYD'; return is_file($file); } public function repair(){$table=$this->options['tablename']?$this->options['tablename']:$this->options['hashtable']; $file=DB_PATH.$table.'/'.$this->options['table'].'.MYD'; if(is_file($file)){$str=file_get_contents($file); if(preg_match_all('~i:\d+;(a:\d+:\{[^\}]+\})~',$str,$match)){$i=0; foreach($match[1] as $vo){$str1='i:'.$i.';'.$vo; $str2='a:1:{'.$str1.'}'; $type=gettype(unserialize($str2)); if($type!='array'){continue; } $arr[]=$str1; $i++; } $str='a:'.count($arr).':{'.implode('',$arr).'}'; } } return write($file,$str); } }