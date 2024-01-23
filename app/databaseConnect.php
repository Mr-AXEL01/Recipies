<?php
require_once 'config/mysql.php';
function dbConnection() {
    try{
        $dbh = new PDO("mysql:host=" .HOST. ";dbname=" .DB , USER,PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
    return $dbh;
}