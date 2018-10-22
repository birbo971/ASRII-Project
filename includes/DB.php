<?php
class DB
{
   private static $instance = null;
   public static function get()
   {
       if(self::$instance == null)
       {
           try
           {
               self::$instance = new PDO('mysql:host=localhost;dbname=asrii', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
           }
           catch(PDOException $e)
           {
               // Handle this properly
               throw $e;
           }
       }
       return self::$instance;
   }
}
