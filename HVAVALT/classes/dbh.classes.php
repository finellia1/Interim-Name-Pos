<?php
// connect to DB
class Dbh {

    protected function connect() {
        try {
            // changes depending on localhost
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=hv_audio_visual', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " .$e->getMessage() . "<br/>";
            die();
        }
    }

}