<?php
/**
 * Created by PhpStorm.
 * User: ijsbrand
 * Date: 24-4-2015
 * Time: 22:04
 */

class Database {

    private $link;
    private $host, $username, $password, $database;

    public function __construct(){
        if (file_exists('../../database/db_config.xml')) {
            $db = simplexml_load_file('../../database/db_config.xml');
            $this->host        = $db->host;
            $this->username    = $db->user_name;
            $this->password    = $db->user_password;
            $this->database    = $db->database_name;
        }

        $this->link = mysqli_connect($this->host, $this->username, $this->password)
        OR die("There was a problem connecting to the database.");

        mysqli_select_db($this->link, $this->database)
        OR die("There was a problem selecting the database.");
    }

    public function query($query) {
        $result = mysqli_query($this->link, $query);
        if (!$result) die('Invalid query: ' . mysql_error());
        return $result;
    }

    public function __destruct() {
        mysqli_close($this->link)
        OR die("There was a problem disconnecting from the database.");
    }
}