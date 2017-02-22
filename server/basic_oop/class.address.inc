<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Physical Address
*/
class Address{
      //public $time_updated = time(); //This requires a runtime evaluation, so will throw an error
      //public $city_copy = $city; //This also requires a runtime evaluation, so will throw an error.

      public $street_address_1;
      public $street_address_2;

    static public $address_types = array(
        1 => 'Home',
        2 => 'Office',
        3 => 'In-laws',
        4 => 'Self'
    ); // Static Address Types

      //Name of the city
      public $city_name;

      //Postal Code
      public $postal_code;

      //Name of the county
      public $country_name;

      //Primary key of an address
      protected $_address_id;

      protected $_time_created;

      protected $_time_updated;


    public function staticNonStaticFunction(){
        echo 'This is a static Non Static Function';
    }//end:staticNonStaticFunction

    static public function isValidAddressType($address_type_id){
        return array_key_exists($address_type_id,self::$address_types);
    }//end:isValidAddressType

      public function setAddress($address){
        $this->street_address_1 = $address;
      }//end:setAddress

      public function getAddress(){
        return $this->street_address_1;
      }//end:getAddress

      public function display(){
        $output = 'Displaying Address';
        $output .= $this->street_address_1;
        if($this->street_address_2){
          $output .= '<br/>';
          $output .=$this->street_address_2;
        }//end-if there is a $street_address_2
        $output .= '<br/>';
        $output .= $this->city_name;
        $output .= '<br/>';
        $output .= $this->postal_code;
        $output .= '<br/>';
        $output .= $this->country_name;
        return $output;
      }//end:display

      public function __toString(){
        return $this->display();
      }//end:__toString

}//end:Address
