<?php

// $_SESSION[$key] = $value; ''''''
class session2 {

    private static $_sessionStart = false;

    public static function start() {
        
        if(empty($_SESSION)) {
            if(self::$_sessionStart == false) {
                session_start();
                self::$_sessionStart = true;
            }
        }
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    //bool checks if session is set for single or double key entries
    public static function isSet($key, $key2 = false) {
        if($key2 == true) {                     //if passed as get($key, $key2)
            if (isset($_SESSION[$key][$key2])) { //key is the name of the array // key2 is its name in the array  
                return true;  // returns true if there is something stored at this key key2 location
            }
        } else {                //if passed as get($key)
            if (isset($_SESSION[$key])) {
                return true;     //retuns true if there is data stored at this $key
            }
        }
        return false; // returns false if not set
    }

    public static function get($key, $key2 = false) {
        if($key2 == true) {
            if (isset($_SESSION[$key][$key2])) {
                return $_SESSION[$key][$key2];
            }
        } else {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        return false;
    }

    public static function display() {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }

    public static function destroy() {
        if(self::$_sessionStart == true) {
            session_unset();
            session_destroy();
        }
    }

}


?>
