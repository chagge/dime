<?php 

/**
 *   Databases. Yay.
 *
 *   Right, so technically, Dime should work with a bunch of
 *   different types of databases, but I'm a lazy sod and I've
 *   only tested it with MySQL. Your host probably has that,
 *   though.
 *
 *   Unfortunately, your host has likely also set it up weird
 *   which means the default settings below don't work. If
 *   they don't, Dime will spit out a horrible techy error,
 *   and you can either forward it on to me or the host, or
 *   just cry in a corner, and just use Magento and cry a bit
 *   more.
 *
 *   Databases make me cry, is what I'm saying.
 */
$config['database'] = array(
    //  It's not "host" in the dinner party sense, more like
    //  "what web server is the database on" sense. It's either
    //  localhost like I've put here. If not, your webhost knows.
    //  SO MANY HOSTS AMIRITE
    'host' => 'localhost',
    
    //  This is, surprisingly, the username that goes with that
    //  host thingy above. Again, most databases use "root",
    //  but it might be a username or email you log in to your
    //  host with, or just something else. Your webhost will know.
    'username' => 'root',
    
    //  This field is to let me know the password to your
    //  childhood fort. Just kidding, it's for the database.
    //  If you don't know it, try leaving it blank.
    'password' => '',
    
    //  A database host can have a ton of different databases,
    //  and you'll need to make a special one just for your
    //  buddy Dime. Again, something your webhost can sort out
    //  for you. Ain't your webhost great, huh?
    'name' => 'dime'
);