<?php 
/**
 *   Dime\Response
 *
 *   Handles HTTP headers. Boring stuff, but someone's
 *   got to do it, ya know?
 *
 *   The only method here you'll probably need to use is
 *   Response::redirect($to), which just redirects to
 *   a URL safely (header('location: ' . $to) might throw
 *   an error or something).
 */
class Response {
    public static $codes = array(
        200 => 'HTTP/1.0 200 OK',
        301 => 'HTTP/1.1 301 Moved Permanently',
        404 => 'HTTP/1.0 404 Not Found',
        
        //  Javascript headers
        'js' => 'content-type: application/javascript',
        'json' => 'content-type: application/json',
        
        //  CSS headers
        'css' => 'content-type: text/css',
        
        //  XML/RSS headers
        'xml' => 'content-type: text/xml',
        'rss' => 'content-type: text/xml',
        
        //  Images
        'png' => 'content-type: image/png',
        'jpg' => 'content-type: image/jpg; content-type: image/jpeg',
        'gif' => 'content-type: image/gif'
    );
    
    /**
     *   Bounce a URL
     */
    public static function redirect($url) {
        //  If headers haven't been sent yet,
        //  We can hijack it and redirect before anything happens
        if(!self::sent()) {
            self::set(301);
            header('location: ' . $url);
        } else {
            //  Too late. Might as well try to redirect, anyway
            echo '<script>window.location = ' . $url . '</script>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '">';
        }
        
        //  Stop the rest of the scripts executing
        exit;
    }
    
    /**
     *   Set HTTP header
     */
    public static function set($status = 200) {
        if(!self::sent()) {
            return header(self::status($status));
        }
        
        return false;
    }
    
    /**
     *   Check if headers have already been sent
     */
    public static function sent() {
        return headers_sent();
    }
    
    /**
     *   Safely get a status from our predefined lists
     */
    private static function status($code = 0) {
        if(isset(self::$codes[$code])) {
            return self::$codes[$code];
        }
        
        return false;
    }
}