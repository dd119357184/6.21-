<?php
class dbPdo{protected $PDOStatement=null; private $table=''; private $linkID=array(); private $_linkID=''; private $_config=array(); private $queryStr=''; protected $numRows=0; protected $transTimes=0; public function __construct(){if(!class_exists('PDO') ){exit('未开启PDO'); } } public function connect($config='',$linkNum=0){if(!isset($this->linkID[$linkNum]) ){if($config['db_pconnect']){$config['params'][PDO::ATTR_PERSISTENT]=true; } try{$this->linkID[$linkNum]=new PDO($config['dsn'], $config['username'], $config['password'],$config['params']); }catch (PDOException $e){$this->error=$e->getMessage(); $this->halt($e->getMessage()); return false; } $this->_config=$config; $this->linkID[$linkNum]->exec("set names utf8"); $this->dbType=$this->_getDsnType($config['dsn']); if(in_array($this->dbType,array('MSSQL','ORACLE','IBASE','OCI'))){$this->halt('由于目前PDO暂时不能完美支持'.$this->dbType.' 请使用官方的'.$this->dbType.'驱动'); } unset($this->config); } $this->_linkID=$this->linkID[$linkNum]; return true; } public function free(){$this->PDOStatement=null; } public function query($str,$bind=array()){if ( !$this->_linkID ) return false; $this->queryStr=$str; if(!empty($bind)){$this->queryStr.='[ '.print_r($bind,true).' ]'; } if ( !empty($this->PDOStatement) ) $this->free(); $this->PDOStatement=$this->_linkID->prepare($str); if(false === $this->PDOStatement) $this->halt($this->error()); $result=$this->PDOStatement->execute($bind); if ( false === $result ){$this->getError(); return false; } else{return $this->getAll(); } } public function execute($str,$bind=array()){if ( !$this->_linkID ) return false; $this->queryStr=$str; if(!empty($bind)){$this->queryStr.='[ '.print_r($bind,true).' ]'; } $flag=false; if ( !empty($this->PDOStatement) ) $this->free(); $this->PDOStatement=$this->_linkID->prepare($str); if(false === $this->PDOStatement){$this->halt($this->getError()); } $result=$this->PDOStatement->execute($bind); if ( false === $result){$this->getError(); return false; } else{$this->numRows=$this->PDOStatement->rowCount(); if($flag || preg_match("/^\s*(INSERT\s+INTO|REPLACE\s+INTO)\s+/i", $str)){$this->lastInsID=$this->getLastInsertId(); } return $this->numRows; } } public function affectedRows(){if ( !$this->_linkID ) return false; return $this->numRows; } public function startTrans(){if ( !$this->_linkID ) return false; if ($this->transTimes == 0){$this->_linkID->beginTransaction(); } $this->transTimes++; return ; } public function commit(){if ($this->transTimes > 0){$result=$this->_linkID->commit(); $this->transTimes=0; if(!$result){$this->getError(); return false; } } return true; } public function rollback(){if ($this->transTimes > 0){$result=$this->_linkID->rollback(); $this->transTimes=0; if(!$result){$this->getError(); return false; } } return true; } public function getAll(){$result=$this->PDOStatement->fetchAll(PDO::FETCH_ASSOC); $this->numRows=count( $result ); return $result; } public function getFields($tableName){$sql="SELECT   column_name,   data_type,   column_default,   is_nullable,extra
        FROM    information_schema.tables AS t
        JOIN    information_schema.columns AS c
        ON  t.table_catalog = c.table_catalog
        AND t.table_schema  = c.table_schema
        AND t.table_name    = c.table_name
        WHERE   t.table_schema = '".$this->_config['database']."' and t.table_name = '$tableName'"; $result=$this->query($sql); $info=array(); if($result){foreach ($result as $key=>$val){$val=array_change_key_case($val); $info[$val['column_name']]=array( 'name'=>$val['column_name'], 'type'=>$val['data_type'], 'notnull'=>(bool) ('NO' === $val['is_nullable'] || '' === $val['is_nullable']), 'default'=>$val['column_default'], 'primary'=>false, 'autoinc'=>(bool) ('auto_increment' === $val['extra']), ); } } $sql="SELECT column_name FROM information_schema.key_column_usage WHERE table_name='$tableName'"; $result=$this->query($sql); if($result){foreach($result as $key=>$val){$info[$val['column_name']]['primary']=true; } } return $info; } public function getTables($dbName=''){switch($this->dbType){case 'ORACLE': case 'OCI': $sql='SELECT table_name FROM user_tables'; break; case 'MSSQL': case 'SQLSRV': $sql="SELECT TABLE_NAME	FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE'"; break; case 'PGSQL': $sql="select tablename as Tables_in_test from pg_tables where  schemaname ='public'"; break; case 'IBASE': break; case 'SQLITE': $sql="SELECT name FROM sqlite_master WHERE type='table' " . "UNION ALL SELECT name FROM sqlite_temp_master " . "WHERE type='table' ORDER BY name"; break; case 'MYSQL': default: if(!empty($dbName)){$sql='SHOW TABLES FROM '.$dbName; }else{$sql='SHOW TABLES '; } } $result=$this->query($sql); $info=array(); foreach ($result as $key=>$val){$info[$key]=current($val); } return $info; } protected function parseLimit($limit){$limitStr=''; if(!empty($limit)){switch($this->dbType){case 'PGSQL': case 'SQLITE': $limit=explode(',',$limit); if(count($limit)>1){$limitStr.=' LIMIT '.$limit[1].' OFFSET '.$limit[0].' '; }else{$limitStr.=' LIMIT '.$limit[0].' '; } break; case 'MSSQL': case 'SQLSRV': break; case 'IBASE': break; case 'ORACLE': case 'OCI': break; case 'MYSQL': default: $limitStr.=' LIMIT '.$limit.' '; } } return $limitStr; } protected function parseKey(&$key){if($this->dbType=='MYSQL'){$key=trim($key); if(!preg_match('/[,\'\"\*\(\)`.\s]/',$key)){$key='`'.$key.'`'; } return $key; } return $key; } public function close(){$this->_linkID=null; } protected function _getDsnType($dsn){$match=explode(':',$dsn); $dbType=strtoupper(trim($match[0])); return $dbType; } public function getError(){!$this->error && $this->error=''; if($this->PDOStatement && $error=$this->PDOStatement->errorInfo()){if($error[1] || $error[2]) $this->error=$error[1].':'.$error[2]; } return $this->error; } public function getLastInsertId(){switch($this->dbType){case 'PGSQL': case 'SQLITE': case 'MSSQL': case 'SQLSRV': case 'IBASE': case 'MYSQL': return $this->_linkID->lastInsertId(); case 'ORACLE': case 'OCI': } } public function getLastSql(){return $this->queryStr; } public function halt($message='',$sql=''){$error=$this->getError(); if($this->config['db_debug']){header("Content-Type:text/html; charset=utf-8"); $str=" <b>出错</b>: $message<br>
                    <b>SQL</b>: {$this->queryStr}<br>
                    <b>错误详情</b>: $error"; echo $str; return false; } } } ?>
