<?php
/**
 * MySQLi database; only one connection is allowed.
 */
class Database{
    private $_connection;
  // Store the single instance.
    private static $_instance;
  /**
   * Get an instance of the Database.
   * @return Database
   */
    public static function getInstance(){
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }//end:getInstance
  
  /**
   * Constructor.
   */
    public function __construct(){
        $this->_connection = new mysqli('localhost', 'root', '', 'zen_ecommerce');
        // Error handling.
        if (mysqli_connect_error()) {
            trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
        }
    }//end:__construct
  
  /**
   * Empty clone magic method to prevent duplication.
   */
    private function __clone(){
    }//end:__clone
  
  /**
   * Get the mysqli connection.
   */
    public function getConnection(){
        return $this->_connection;
    }//end:getConnection

    public function getCats(){
        $con = $this->getConnection();
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con, $get_cats); //mysqli to run a particular query

        $table_length = mysqli_num_rows($run_cats); // Get the total number of rows returned from the query result
        $count_row = 0;
        //Get all the rows from the above mentioned query
        while ($row_cats = mysqli_fetch_array($run_cats)) { //If able to get the row
            $count_row ++;
            //Get the length of the array
            $cat_id = $row_cats['cat_id']; //Get the id from categories list
            $cat_title = $row_cats['cat_title'];
            echo '<li><a href="#">' . $count_row . ' <strong>' . $cat_title . '</strong></a></li>';
            if ($count_row > $table_length) {
                $count_row = 0;
            }//end:if
        }//end:while
    }//end:getCats

//Function to get the Brands list

    public function getBrands(){
        $con = $this->getConnection();
        $get_brands = "select * from brands";
        $run_brands = mysqli_query($con, $get_brands); //mysqli to run a particular query

        $table_length = mysqli_num_rows($run_brands); // Get the total number of rows returned from the query result
        $count_row = 0;
        //Get all the rows from the above mentioned query
        while ($row_brands = mysqli_fetch_array($run_brands)) { //If able to get the row
            $count_row ++;
            //Get the length of the array
            $cat_id = $row_brands['brand_id']; //Get the id from categories list
            $cat_title = $row_brands['brand_title'];
            echo '<li><a href="#">' . $count_row . ' <strong>' . $cat_title . '</strong></a></li>';
            if ($count_row > $table_length) {
                $count_row = 0;
            }//end:if
        }//end:while
    }//end:getbrands

}//end-class:Database
