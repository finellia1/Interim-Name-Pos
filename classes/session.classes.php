<?php
// sessions classes are constructors that accepts a key value pair.
//the key is essentially the name of the array, which is what you reference in the first argument when declaring/accessing the array.
// The value in set is usually an array of values passed in as such:

            // session2::start();
            // session2::set('karlsThreeFavoriteNumbers', '777');
            // session2::set('test', array (
            //     'name' => 'steve',
            //     'num' => '555'
            // ));
            

            // session2::set('name', array (
            //     'name' => 'mike',
            //     'num' => '666'
            // ));
            
            
            
            // echo session2::get('karlsThreeFavoriteNumbers'); //return 777
            // echo session2::get('test', 'name'); //returns steve
            // echo session2::get('test', 'num'); // returns 555
            // echo session2::get('name', 'name');  //returns mike
            // echo session2::get('name', 'num');  //returns 666
            // session2::display(); //dislays session data.
class session{
    //declare sessionStart
    private static $_sessionStart = false;

    public static function start() {
        if(empty($_SESSION)) {
            if(self::$_sessionStart == false) {
                session_start();
                self::$_sessionStart = true;
            }
        }
    }
    //passes $key $value pair into session array
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    //retrieves value from either single, or double key entries 
    public static function get($key, $key2 = false) {
        if($key2 == true) {                     //if passed as get($key, $key2)
            if (isset($_SESSION[$key][$key2])) { //key is the name of the array // key2 is its name in the array  
                return $_SESSION[$key][$key2];  // this fetches the data of the array named $key, at the array location $key2
            }
        } else {                //if passed as get($key)
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];     //retuns data associated with $key
            }
        }
        return false;
    }


    //bool checks if session is set for single key entries
    public static function isSet($key) {
        if (isset($_SESSION[$key])) {
            return true;     //retuns true if there is data stored at this $key
        }
        return false; // returns false if not set
    }


    //prints session data
    public static function display() {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }
    //destroys session/cookies
    public static function destroy() {
        if (ini_get("session.use_cookies")) {     //deletes cookie
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 86400,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
            session_unset();
            session_destroy();
    }
}

