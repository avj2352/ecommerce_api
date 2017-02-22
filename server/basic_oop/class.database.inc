<?php
/**
 * Creating a singleTon Database instance
 * User: avj2352
 * Date: 2/18/2017
 */

class Database {

    private $_connection;

    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self(); // self::$_instance will then be = new Database()
        }
        return self::$_instance;
    }//end:getInstance

    public function __construct(){

    }

}//end-class:Database