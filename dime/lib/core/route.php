<?php 

/**
 *   Dime\Route
 *
 *   Hi! I'm the route class. I check to see what the right
 *   page is based on the URLs you've given me. It's a
 *   pretty boring job. Sometimes I like to count sheep to
 *   pass the time, but I *yawn* get very sleepy.
 */
class Route {
    //  Store an array of aliases to use
    //  Gets used in the routes like so
    //  Route::get('(:any)', $fn);
    protected static $aliases = array(
        //  Safer than using .*, stops people doing
        //  shit like <script> in the URL
        'any' => '[0-9a-zA-Z~%\.:_\\-]+',
        
        //  Numbers sometimes have commas and dots in
        'num' => '[0-9\.,-]+',
        
        //  Letters-n-dashes
        'alpha' => '[a-zA-Z-]+',
        
        //  Match homepage
        'index' => 'index|^$',
        
        //  Match EVERYTHING ELSE
        404 => '.*'
    );
    
    //  Set the default fallback route
    public static $not_found = false;
    
    /**
     *   Create a route listener
     *
     *   Can use the alias groups listed earlier or just
     *   a static string. Route class don't mind.
     *
     *   At its most complicated, a call looks like this:
     *
     *   Route::get('/(:custom)/?test', function($url) {
     *       echo $url;
     *   });
     */
    public static function get($route, $callback, $not_found = false) {
        return self::match(Url::current(), self::parse($route), $callback, $not_found);
    }
    
    public static function post($route, $callback) {}
    public static function any($route, $callback) {}
    
    public static function not_found($wut, $route = false) {
        //  Handle registering a not_found call
        if(is_callable($wut)) {
            return self::$not_found = $wut;
        }
        
        //  And broadcast that call out when need be
        return call_user_func(self::$not_found, $wut, $route);
    }
    
    /**
     *   Create an alias register
     *
     *   Route::alias('hex', '[0-9a-fA-F]{3,6}');
     */
    public static function alias($key, $regex) {
        return self::$aliases[$key] = $regex;
    }
    
    /**
     *   Match an alias to the regex
     */
    public static function parse($route) {
        foreach(self::$aliases as $find => $replace) {
            $route = str_replace(':' . $find, $replace, $route);
        }
        
        return $route;
    }
    
    /**
     *   The nitty-gritty
     */
    public static function match($url, $route, $callback, $not_found) {
        //  Some things in PHP are just plain ugly.
        //  This is one of them.
        preg_match('#^' . $route . '$#', $url, $matches);
        
        //  If we've got a match, despite preg_match being
        //  the biggest pile of shite...
        if(isset($matches[0])) {
            return $callback($url, $matches);
        }
        
        return Route::not_found($url, $route);
        //return Response::redirect(BASE . fallback($not_found, self::$not_found));
    }
    
    public static function __callStatic($name, $args) {
        echo $name . ' args ' . $args;
    }
}