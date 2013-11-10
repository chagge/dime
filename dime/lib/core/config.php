<?php 

/**
 *   Dime\Config
 *
 *   This is just a nice easy way to statically
 *   load settings from the database and config/
 *   folder. Not much to it.
 */
class Config {
    private static $_items = array();
    private static $_loaded = false;
    
    /**
     *   Grab a config item if it's set, or
     *   return a fallback item.
     *
     *   echo Config::get('currency', 'USD'); // -> 'GBP'
     */
    public static function get($key, $fallback = '') {
        //  Just in case we haven't grabbed anything
        //  from the database yet
        self::load();
        
        return self::file($key, $fallback);
    }
    
    /**
     *   Same thing, but without connecting to the database.
     */
    public static function file($key, $fallback = '') {
        if(isset(self::$_items[$key])) {
            return self::$_items[$key];
        }
        
        return $fallback;
    }
    
    /**
     *   Store a key/value pair temporarily, or
     *   optionally save it in the database.
     *
     *   ============ key ======= val ========== save to DB
     *   Config::set('sitename', 'My Dime Shop', true);
     */
    public static function set($key, $value = '', $save = false) {
        if(is_array($key)) {
            foreach($key as $a => $b) {
                self::set($a, $b);
            }
            
            return;
        }
                
        //  If we're saving to the database, make sure we write it
        //  PERMANENTLY.
        if($save !== false) {
            Database::write('config', array(
                'key' => $key,
                'value' => $value
            ));
        }
        
        //  Well, that was hard.
        return self::$_items[$key] = $value;
    }
    
    /**
     *   Remove an item from the config array.
     *
     *   Not sure why I or you (it's "you or I", I know)
     *   would need to do this, but it's there.
     *
     *   Config::remove('currency'); //  y u do dis
     */
    public static function remove($key, $database = false) {
        unset(self::$_items[$key]);
        
        //  Delete forever. Scary stuff.
        if($database !== false) {
            Database::remove('config', array(
                'key' => $key
            ));
        }
        
        return !isset(self::$_items[$key]);
    }
    
    /**
     *   Set up the config
     *   Although it's public, you don't really need to use it.
     *   Go ahead and ignore this.
     *
     *   I said ignore this, damn it.
     */
    public static function setup($config = array()) {
        //  Load in all the files
        foreach(glob(ROOT . 'config/*.php') as $file) {
            include_once $file;
        }
        
        //  And let's go go go!
        return self::set($config);
    }
    
    /**
     *   Makes a big steamy dump of all the config items.
     *   Good for debugging and not much else.
     *
     *   var_dump(Config::all());
     */
    public static function all() {
        return self::$_items;
    }
    
    /**
     *   Load config items from the database.
     *   This overwrites whatever's in the config/ folder.
     */
    public static function load() {
        global $config;
        
        //  Don't need to bother loading
        if(self::$_loaded === true) return;
        
        foreach(Database::all('config') as $row) {
            self::set($row->key, $row->value);
        }
        
        return self::$_loaded = true;
    }
}