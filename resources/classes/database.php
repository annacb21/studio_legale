<?php

// generic query class
class QueryResult {

    private $_results = array(); // array with query result
    
    // constructor
    public function __construct() {}

    // setter
    public function __set($var, $val) {
        $this->_results[$var] = $val;
    }

    // getter
    public function __get($var) {
        if(isset($this->_results[$var])) {
            return $this->_results[$var];
        }
        else {
            return null;
        }
    }

}

// class for database connection
class Database {

    // constructor
    public function __construct(){}
   
    // database connection
    private function dbconnect() {
        $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die ("<br/>Could not connect to MySQL server");
            
        mysql_select_db(DB_DB,$conn)
        or die ("<br/>Could not select the indicated database");
        
        return $conn;
    }

    // query fetch
    private function query($sql) {
        $this->dbconnect();
        $res = mysql_query($sql);
        if ($res){
            if (strpos($sql,'SELECT') === false){
              return true;
            }
        }
        else{
            if (strpos($sql,'SELECT') === false){
                return false;
            }
            else{
                return null;
            }
        }
         
        $results = array();
        
        while ($row = mysql_fetch_array($res)){
            $result = new DALQueryResult();
            
            foreach ($row as $k=>$v){
                $result->$k = $v;
            }
        
            $results[] = $result;
        }
        return $results;
    }

}

?>