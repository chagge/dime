<?php

class Url {

    public static $default = 'index';
    public static $current = false;
    public static $base = false;

	public static function current($stripBase = true) {
	    if(!self::$current) {
	        self::detect();
	    }
	    
	    return self::$current;
	}
	
	private static function detect() {
	    //  Get the URL
		self::$current = Input::server('REQUEST_URI');
		
		self::$current = preg_replace('/[\/]+/', '/', self::$current);
		
		//  Strip off the last character, if it's a slash
		if(substr(self::$current, -1) === '/') {
			self::$current = substr(self::$current, 0, strlen(self::$current) - 1);
		}
		
		return self::$current;
	}
	
	public static function request($stripBase = true) {
		$url = preg_replace('/(\?.*)/', '', self::current($stripBase));
		
		//  Don't allow slash-only URLs
		if($url === '/') {
			$url = '';
		}
		
		return $url;
	}
	
	public static function segment($which, $fallback = '') {
		//  Get all of the segments as an array
		$segments = explode('/', self::request());
		
		//  Return our segments
		$seg = (isset($segments[$which]) and !empty($segments[$which])) ? $segments[$which] : self::$default;
		
		//  If we have a segment, and it's not an index page, give it back
		return fallback($seg, $fallback);
	}
	
	public static function stripTags($segment) {
		return strip_tags($segment);
	}
	
	public static function base($append = '') {
		return PUBLIC_PATH . $append;
	}
	
	//  Convert a absolute PHP path to a relative public URL
	public static function convert($path) {
		return self::base() . str_replace(PUBLIC_BASE, '', $path);
	}
}