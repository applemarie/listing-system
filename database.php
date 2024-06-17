<?php

include ('/Wamp/wamp64/www/auth.php');


class Database {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
