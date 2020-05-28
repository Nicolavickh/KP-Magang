<?php


class db_Helper
{
    static function createMySQLConnection(){
        $link = new PDO("mysql:host=localhost;dbname=magang_dbKP", "magang", "fit12345*ukm");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
}