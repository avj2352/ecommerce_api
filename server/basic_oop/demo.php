<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'class.address.inc';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Welcome to basic PHP</title>
  </head>
  <body>
    <h2>Instantiating Address</h2>
    <?php $address = new Address; ?>
     <pre>
       <?php echo var_export($address, TRUE) ?>
     </pre>
     <?php
     $address->street_address_1 = 'Zion, #341, 13th Cross, 3rd Main Road';
     $address->street_address_2 = 'Kirloskar Layout, Hesaraghatta Main Road';
     $address->city_name = 'Bangalore';
     $address->postal_code = '560073';
     $address->country_name = 'INDIA';
      ?>
      <hr>
      <h2>Address with Values</h2>
      <pre>
        <?php echo var_export($address, TRUE) ?>
      </pre>
      <hr>
      <h2>Displaying the Address using the display method</h2>
      <p>Displaying</p>
      <pre>
        <?php
          // $address->setAddress('This is an address');
          // $output = $address->getAddress();
          $output = $address->display();
          echo $output;
        ?>
      </pre>
    <hr/>
    <h3>Displaying Static Access</h3>
    <pre>
        <?php
            var_dump(Address::staticNonStaticFunction());
            var_export($address->staticNonStaticFunction());
        ?>
    </pre>
  </body>
</html>
