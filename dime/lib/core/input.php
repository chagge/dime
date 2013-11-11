<?php 

/**
 *   Dime\Input
 *
 *   Because $_GET is so 1999. Get a safer version of
 *   whatever input you want to get, just as easy.
 *
 *   What's to lose, huh?
 */
class Input {
    /**
     *   Wow, a serious comment! Here's some light reading.
     *   > phparch.com/2010/07/never-use-_get-again
     *
     *   Input::get('page'); // == $_GET['page'];
     */
    public static function get($param, $filter = FILTER_SANITIZE_STRING) {
        return filter_input(INPUT_GET, $param, $filter);
    }
    
    /**
     *   Same, but for $_POST. Simple.
     *
     *   Input::post('page'); // == $_POST['page'];
     */
    public static function post($param, $filter = FILTER_SANITIZE_STRING) {
        return filter_input(INPUT_POST, $param, $filter);
    }
    
    /**
     *   This is used to handle $_SERVER calls.
     *
     *   Input::server('request_uri');
     */
    public static function server($param, $filter = FILTER_SANITIZE_STRING) {
        $aliases = array(
            'uri' => 'request_uri',
            'self' => 'php_self',
            'name' => 'server_name',
            'request' => 'request_method',
            'host' => 'http_host',
            'referrer' => 'http_referer',
            'ua' => 'user_agent'
        );
        
        return filter_input(INPUT_SERVER, strtoupper($param), $filter);
    }
    
    /**
     *   Is the current server HTTPS? Simple.
     */
    public static function https() {
        return !!self::server('https');
    }
    
    /**
     *   Just grab whatever we can take. If there's $_GET,
     *   use that. If not, fall back to $_POST.
     *
     *   If there isn't that, then what is there? Nothing.
     *   Just a void expanse engulfing us all, microscopic
     *   pawns in a madman's game. Or just no input.
     */
    public static function any($param) {
        if($get = self::get($param)) {
            return $get;
        }
        
        return self::post($param);
    }
}