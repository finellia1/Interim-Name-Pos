<!doctype html>
<html>
    <head></head>
    <body>
        <?php
            //''''''
            require 'session2.php';
            session2::start();
            session2::set('test', array (
                'name' => 'steve',
                'num' => '555'
            ));
            session2::set('name', array (
                'name' => 'mike',
                'num' => '666'
            ));
            session2::set('karl', '777');
            
            
            echo session2::get('karl');
            echo session2::get('test', 'name');
            echo session2::get('name', 'num');
            echo session2::get('test', 'num');
            session2::display();
            session2::destroy();
            session2::display();
            
        ?>
    </body>
</html>