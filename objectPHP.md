# Object Oriented Programming using PHP

## Why use Object-Oriented Programming ?

Object Oriented Programming in a practical sense provides the following values:

1. **Organizes** projects into consistent, manageable pieces.
2. Saves Time & Money
3. In comparison, *Procedural Programming* can consist of a series of conditions, and function calls for logic, but the end result is **very linear**.
4. Scaling up - Programming Language are a great benefit
5. Avoids **Global Variables**
6. Abstraction
7. Encapsulation - Restrict access to low level data
8. Hierarchy - Inherit Properties
9. Modularity - Dedicated Classes
10. Polymorphism
11. Testability

## History of Object Oriented PHP

- Object oriented programming was `introduced in PHP 3 (1998)`
- PHP 4 (2000) - more support to Object Oriented Programming
  - Wierd variable assignments, high memory usage
- PHP 5 (2004) - extensive rewrite of the language
  - Completely object model
  - Zend Engine 2
  - Full features, performance

---

## PHP extensions and Include Extensions

- `class.Address.inc` - Think of it as a class/script which needs to be only included and not executed. Similar to an abstract class.

```php
<?php echo var_export($address, TRUE) ?>
```

>NOTE: Use `$` only when declaring a property, You donot need to assign `$` when `assigning a property of an object`

---

## Accessing Objects - Scope
>NOTE: for declaring `protected` and `private` properties, prepend the variable with an underscore `_`

---

## Magic Methods in PHP.

Magic methods are collection of specialized methods in PHP. All magic methods in PHP start with `two underscores`

Example:
- __construct()
- __toString()

### Cost of using Magic Methods
- Magic Methods have an overhead, leading to 3 - 20 times slower execution for that method execution.
- Ignore Scope - Magic Methods tend to ignore scoping of a Class properties.
- Break Code Completion in IDE. The IDE can't follow logic.

### Implementation of the Magic Method

We will start declaring a protected field and a protected method:

```php
<?php
// Primary key of an Address.
protected $_address_id;

// When the record was created and last updated.
protected $_time_created;
protected $_time_updated;

/**
 * Guess the postal code given the subdivision and city name.
 * @todo Replace with a database lookup.
 * @return string
 */
protected function _postal_code_guess() {
  return 'LOOKUP';
}

?>
```

Now we can use the Magic Method - `_get` and `_set`

```php
<?php
/**
 * Magic __get.
 * @param string $name
 * @return mixed
 */
function __get($name) {
  // Postal code lookup if unset.
  if (!$this->_postal_code) {
    $this->_postal_code = $this->_postal_code_guess();
  }

  // Attempt to return a protected property by name.
  $protected_property_name = '_' . $name;
  if (property_exists($this, $protected_property_name)) {
    return $this->$protected_property_name;
  }

  // Unable to access property; trigger error.
  trigger_error('Undefined property via __get: ' . $name);
  return NULL;
}//end:__get

/**
 * Magic __set.
 * @param string $name
 * @param mixed $value
 */
function __set($name, $value) {
  // Allow anything to set the postal code.
  if ('postal_code' == $name) {
    $this->$name = $value;
    return;
  }

  // Unable to access property; trigger error.
  trigger_error('Undefined or unallowed property via __set(): ' . $name);
}//end:__set
?>
```

## Magic Method  __construct()

This Magic method in PHP, can be used to provide initial values when an Object is created in PHP.

> NOTE: _construct() is optional in PHP, unlike Java, where it's inbuilt if not defined.

_construct() can also be empty - it's useless if it's empty.

```php
<?php
/**
 * Constructor.
 * @param array $data Optional array of property names and values.
 */
function __construct($data = array()) {
  $this->_time_created = time();

  // Ensure that the Address can be populated.
  if (!is_array($data)) {
    trigger_error('Unable to construct address with a ' . get_class($name));
  }

  // If there is at least one value, populate the Address with it.
  if (count($data) > 0) {
    foreach ($data as $name => $value) {
      // Special case for protected properties.
      if (in_array($name, array(
        'time_created',
        'time_updated',
      ))) {
        $name = '_' . $name;
      }
      $this->$name = $value;
    }
  }
}
?>
```

---

## Treating Objects as Strings

In PHP, It's convenient to assume to treat Objects as Strings

On a more abstract level, this is known as `Polymorphism`

- Act on an Object, without knowing the class.
- Common function names between classes.
- **Magic method** - `__toString()` to turn a method into a simple string

---

## Magic Method __clone()

the __clone() method can be defined to prevent a  class from being duplicated

```php
<?php

/**
 * MySQLi database; only one connection is allowed.
 */
class Database {
  private $_connection;
  // Store the single instance.
  private static $_instance;

  /**
   * Get an instance of the Database.
   * @return Database
   */
  public static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self(); //This will be then self::$_instance = new Database();
    }
    return self::$_instance;
  }//end:getInstance
  
  /**
   * Constructor.
   */
  public function __construct() {
    $this->_connection = new mysqli('localhost', 'sandbox', 'sandbox', 'sandbox');
    // Error handling.
    if (mysqli_connect_error()) {
      trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
    }
  }//end:_construct

  /**
   * Empty clone magic method to prevent duplication.
   */
  private function __clone() {}//end:__clone

  /**
   * Get the mysqli connection.
   */
  public function getConnection() {
    return $this->_connection;
  }
}//end:class-Database
?>
```

---

## Magic Method __autoload()

As, of PHP 5, a new magic method is being made available - called as `__autoload()`

```php
<?php
// Magic method introduced as of PHP 5
function __autoload($class_name){
  include 'class'.$class_name.'.inc';
}//end:__autoload
>
```

Also, as of PHP 5.3, We can use the `spl_autoload_register` function

```php
<?php 
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
?>
```

## Magic Method __clone()

The Magic Method, __clone() is used to create / prevent a duplicate instance of the Object.

```php
<?php
/**
   * Empty clone magic method to prevent duplication.
   */
  private function __clone() {}//end:__clone

?>
```

> NOTE : We cannot override a constant, which has already been declared in an `Interface`

# Cloning and Comparing Objects

Comparing objects is alot like comparing the primitives, 
- Comparison Operator `==`
- Identity Operator `===`

We can use the Magic method `__clone()` in conjunction with the keyword `clone` in PHP

```php
<?php
$address_park_clone  = clone $address_park ; //This will clone the object to $address_park_clone

//If we want some post processing to be done after the clone keyword, then put it in the magic method
public function __clone(){
 $this->time_created  = time(); // Reset the time to a new value
}//end:__clone
?>
```

# Referencing Objects in PHP

PHP 4 brought the following changes to performance :

- Variables donot contain the Object anymore.
- References to objects only contain the internal identifier.
- This has a huge gain on Performance.

> - NOTE: To get the class type of the object, use the `get_clase($variable_name);` method.
> - NOTE: OR you can use the instance of keyword -  `($variable_name instanceof class_name? 'is an instance': 'not an instance')` method.

# Built in Objects in PHP

## Standard Class

A Standard Class is a generic class which can be created by `typecasting` an object of a particular datatype.
- It wont have any methods
- It will have values

```php
<?php
$test_obj = (object) array('hello'=>'world','nested'=>array('key'=>'value')); // You are typecasting the array to an object
echo var_export ($test_obj);
?>
```

> NOTE: If we are typecasting `string` to an object, then the result is a Standard class with a property `scalar`.

## Database keyword to create Objects from Rows.

```php
<?php 
var $rowObject = mysqli_result::fetch_object ;// This will fetch the given row as an object an assign it to the variable.
?>
```

# Exception Handling in PHP

We can write our own custom Exception class by extending the Exception class

```php
<?php 
/**
 * Custom Exception handler. 
 */
class ExceptionAddress extends Exception {
  /**
   * Magic __toString().
   * @return string 
   */
  public function __toString() {
    return __CLASS__ . ": [{$this->code}]: {$this->message}\n"; //We can get the class name also by the __CLASS__
  }
}
?>
```

# Design Patterns in PHP

## Singleton Patterns

Best example of the Singleton pattern, is the Data base class, where we are limiting the object creation to just one instance.

```php
<?php 
<?php

/**
 * MySQLi database; only one connection is allowed. 
 */
class Database {
  private $_connection;
  // Store the single instance.
  private static $_instance;  
  /**
   * Get an instance of the Database.
   * @return Database 
   */
  public static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
  
  /**
   * Constructor.
   */
  public function __construct() {
    $this->_connection = new mysqli('localhost', 'sandbox', 'sandbox', 'sandbox');
    // Error handling.
    if (mysqli_connect_error()) {
      trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
    }
  }//end:__construct
  
  /**
   * Empty clone magic method to prevent duplication. 
   */
  private function __clone() {}
  
  /**
   * Get the mysqli connection. 
   */
  public function getConnection() {
    return $this->_connection;
  }//end:getConnection

}//end-class:Database
?>
```

## Factory Design Patterns

The Factory Design Pattern is useful to create objects, `without specifying the Class`

---
