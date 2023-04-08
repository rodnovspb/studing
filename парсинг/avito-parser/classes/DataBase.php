<?php
class DataBase extends Base {
   
    protected $dbName = 'avIntermediateDataDB';
    protected $db;
    protected $tables;   

    public function __construct() {        
        if(!file_exists('database_sqlite'.DS.$this->dbName.'.db')) {            
            $this->db = new SQLite3('database_sqlite'.DS.$this->dbName.'.db');            
            foreach($this->tables as $tableName => $attributes) {
                $this->createTable($tableName, $attributes);
            }            
        } else {            
            $this->db = new SQLite3('database_sqlite'.DS.$this->dbName.'.db');            
        }       
    }
    
    public function selectRows($from, $sel = NULL, $where = NULL, $group = NULL, $order = NULL, $limit = NULL) {
        $sel = ($sel) ? $sel : "*";
        $query = "SELECT " . $sel . " FROM " . $from;
	$query .= ($where) ? " WHERE ".$this->getWhere($where) : ""; 
	$query .= ($group) ? " GROUP BY ".$group : "";
	$query .= ($order) ? " ORDER BY ".$order : "";
	$query .= ($limit) ? " LIMIT ".$limit : "";
        $result = $this->db->query($query);
        $count = 0; 
        $return = array();
        while($res= $result->fetchArray(SQLITE3_ASSOC)) {
            $return[] = $res;            
        }   
        return $return;
    }
    
    public function selectRow($from, $sel = NULL, $where = NULL) {
        $sel = ($sel) ? $sel : "*";
        $query = "SELECT " . $sel . " FROM " . $from;
        $query .= ($where) ? " WHERE ".$this->getWhere($where) : "";
        return $this->db->querySingle($query, TRUE);
    }
    
    public function insertRow($into, $arr) {
        $fields = '';
	$values = '';
	$i = 0;
	foreach ($arr as $key => $value) {
            if($i) {
		$fields.=' , ';
                $values.=' , ';
            }
            $fields .= "`" . $key . "`";
            if(is_object($value)) $values .= $value->context;
            elseif($value === null) $values .= "NULL";
            else $values .= "'" . $value . "'";
            $i++;
	}
        $query = "INSERT INTO ".$into." ( ".$fields." ) VALUES ( ".$values." )";
        $this->db->exec($query);
        $lastId = $this->db->lastInsertRowid();
        if($lastId) {            
            return $lastId;
	} else {
            return false;
	}
    }
    
    public function updateRow($into, $arr, $where) {
        $query = "UPDATE ".$into." SET ".$this->getWhere($arr, ', ')." WHERE ".$this->getWhere($where)."";
        if($this->db->query($query)) {            
            return TRUE;
	} else {
            return FALSE;
	}
    }
    
    public function deleteRow($from, $where) {
        $paramsArray = array();
        $query = "DELETE FROM ".$from." WHERE ".$this->getWhere($where)." "; 
	if($this->db->query($query)) {
            return true;
	} else {
            return false;
        }
    }
    
    public function countRows($table, $where = NULL) {
        $query = "SELECT COUNT(*) as count FROM " . $table;
        $query .= ($where) ? " WHERE ".$this->getWhere($where) : "";
        $result = $this->db->query($query);
        $rows = $result->fetchArray();
        return $rows['count'];
    }

    private function createTable($tableName, $attributes) {
        $columns = array();
        foreach($attributes['columns'] as $colName => $limitations) {
            $limitations = str_replace('.', ' ', $limitations);
            $columns[] = "`$colName` $limitations";
        }
        $sql = "CREATE TABLE $tableName (".implode(", ", $columns).", PRIMARY KEY ({$attributes['primary_key']}));";
        $this->db->exec($sql);
        return TRUE;
    }   
    
    private function getWhere($where, $union = ' AND ') {
        foreach($where as $k => $vl) {
            if(is_int($vl)) {
                $paramsArray[] = $k." = ".$vl."";
            } else {
                $paramsArray[] = $k." = '".$vl."'";
            }            
        }
        return implode($union, $paramsArray);
    }
    
}
