<?php

if($con = mysqli_connect("localhost","root","","zen_ecommerce")){
    echo 'Connection Established';
}else{
    echo 'Error establishing Connection';
}

// getting the categories

//Using PHP 5.3's autoload feature
// spl_autoload_register(function ($class_name) {
//     include $class_name . '.php';
// });

function getCats(){
    global $con;
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con,$get_cats); //mysqli to run a particular query

    $table_length = mysqli_num_rows($run_cats); // Get the total number of rows returned from the query result
    $count_row = 0;
    //Get all the rows from the above mentioned query
    while ($row_cats = mysqli_fetch_array($run_cats)){ //If able to get the row
        $count_row ++;
        //Get the length of the array
        $cat_id = $row_cats['cat_id']; //Get the id from categories list 
        $cat_title = $row_cats['cat_title'];
        echo '<li><a href="#">' . $count_row . ' <strong>' . $cat_title . '</strong></a></li>';
        if($count_row > $table_length){
            $count_row = 0;
        }//end:if
    }//end:while
}//end:getCats

//Function to get the Brands list

function getBrands(){
    global $con;
    $get_brands = "select * from brands";
    $run_brands = mysqli_query($con,$get_brands); //mysqli to run a particular query

    $table_length = mysqli_num_rows($run_brands); // Get the total number of rows returned from the query result
    $count_row = 0;
    //Get all the rows from the above mentioned query
    while ($row_brands = mysqli_fetch_array($run_brands)){ //If able to get the row
        $count_row ++;
        //Get the length of the array
        $cat_id = $row_brands['brand_id']; //Get the id from categories list 
        $cat_title = $row_brands['brand_title'];
        echo '<li><a href="#">' . $count_row . ' <strong>' . $cat_title . '</strong></a></li>';
        if($count_row > $table_length){
            $count_row = 0;
        }//end:if
    }//end:while
}//end:getbrands