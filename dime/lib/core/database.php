<?php 

/**
 *   Dime\Database
 *
 *   Want to get some stuff from a database?
 *   Want to put some stuff in a database?
 *   Well, I've got a great deal for you!
 *   For a very special, limited edition, one-
 *   off price, I can give you not only one,
 *   not, two, but three different types of
 *   database interaction.
 *
 *   Legally, I can't tell you what the
 *   third type of database interaction is,
 *   but I can tell you that it's mad cool.
 */
class Database {
    private static $connection = false;
    
    public static function connect() {
        //  Get our DB info
        $config = Config::file('database');
        
        self::$connection = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['name']
        );
    }
    
    public static function query($wut) {
        if(self::$connection === false) {
            self::connect();
        }
        
        $query = self::$connection->query($wut);
        $result = array();
        
        while($row = $query->fetch_object()) {
            $result[] = (object) $row;
        }
        
        $query->close();
    
        return $result;
    }
    
    public static function all($table) {
        return self::query('select * from `'. self::escape($table) . '`');
    }
    
    private static function escape($str, $stripHTML = false, $filter = FILTER_SANITIZE_STRING) {
        $str = htmlentities(filter_var($str, $filter));
        
        if($stripHTML === true) {
            $str = strip_tags($str);
        }
        
        return $str;
    }
}