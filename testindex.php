<!doctype html>
<html>
    <head></head>
    <body>
        <?php
            //''''''
            require './classes/session.classes.php';
            session::start();
            session::set('karlsThreeFavoriteNumbers', '777');
            session::set('test', array (
                'name' => 'steve',
                'num' => '555'
            ));
            

            session::set('name', array (
                'name' => 'mike',
                'num' => '666'
            ));
            
            
            
            echo session::get('karlsThreeFavoriteNumbers'); //return 777
            echo session::get('test', 'name'); //returns steve
            echo session::get('test', 'num'); // returns 555
            echo session::get('name', 'name');  //returns mike
            echo session::get('name', 'num');  //returns 666
            session::display(); //dislays session data.
            
        ?>
    </body>
</html>