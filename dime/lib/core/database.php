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
    /**
     *   Set up a connection to the database
     *   Oh, and store it to the Config class for handiness.
     *
     *   You probably don't need to use this, all the other
     *   methods check first.
     */
    public static function connect() {
        //  Get our DB info
        $config = Config::file('database');
        
        Config::set('connection', new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['name']
        ));
    }
    
    /**
     *   Run a query against the database
     *   Just a nicer looking version of mysql_query, I guess.
     */
    public static function query($wut) {
        if(Config::file('connection', false) === false) {
            self::connect();
        }
        
        $query = Config::file('connection')->query($wut);
        $result = array();
        
        while($row = $query->fetch_object()) {
            $result[] = (object) $row;
        }
        
        $query->close();
    
        return $result;
    }
    
    /**
     *   Get all the records from a specific table
     *
     *   Database::all('config'); // -> all my permanent config data
     */
    public static function all($table) {
        return self::query('select * from `'. self::escape($table) . '`');
    }
    
    /**
     *   Tidy something up to use in a database query
     */
    private static function escape($str, $stripHTML = false, $filter = FILTER_SANITIZE_STRING) {
        $str = htmlentities(filter_var($str, $filter));
        
        if($stripHTML === true) {
            $str = strip_tags($str);
        }
        
        return $str;
    }
}