<?php
try{
    $dbh = new PDO("mysql:host=" .HOST. ";dbname=" .DB , USER,PASSWORD);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}