<?php 


/**
 *   Load every file in a directory. Simple, really.
 *
 *   load_all(BASE . 'lib/core/*.php');
 */
function load_all($dir) {
    foreach(glob($dir) as $file) {
        include_once $file;
    }
}

/**
 *   Fallback
 *   Death to if() { } else { } statements everywhere
 *   Except in this function, of course.
 */
function fallback($a, $b) {
    if($a) {
        if(is_array($a)) {
            foreach($a as $find => $in) {
                if(isset($in[$find])) return $in[$find];
            }
            
            return $b;
        }
        
        return $a;
    }
    
    return $b;
}