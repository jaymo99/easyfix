<?php

class Dbh{

    protected function connect(){
      try {
        //localhost database connection
        // $username = "root";
        // $password = "";
        // $dbh = new PDO('mysql:host=localhost;dbname=easyfix', $username, $password);
        // return $dbh;

        //remote database connection
        $username = "ukUyeOj4W9";
        $password = "9cR4Ci60aQ";
        $dbh = new PDO('mysql:host=remotemysql.com;dbname=ukUyeOj4W9', $username, $password);
        return $dbh;
      }
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
    }
}
