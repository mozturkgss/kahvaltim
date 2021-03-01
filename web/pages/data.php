<?php
date_default_timezone_set('America/Los_Angeles');
require  '../lib/medoo.php';
 
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'kahvaltim',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
 
	// [optional]
	'port' => 3306,
 
	// [optional] Table prefix
	//'prefix' => 'PREFIX_',
 
	// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
]);

function coalesce() {
  $args = func_get_args();
  foreach ($args as $arg) {
    if (!empty($arg)) {
      return $arg;
    }
  }
  return NULL;
}

$aylar = array( 
    'January'    =>    'Ocak', 
    'February'    =>    'Şubat', 
    'March'        =>    'Mart', 
    'April'        =>    'Nisan', 
    'May'        =>    'Mayıs', 
    'June'        =>    'Haziran', 
    'July'        =>    'Temmuz', 
    'August'    =>    'Ağustos', 
    'September'    =>    'Eylül', 
    'October'    =>    'Ekim', 
    'November'    =>    'Kasım', 
    'December'    =>    'Aralık', 
    'Monday'    =>    'Pazartesi', 
    'Tuesday'    =>    'Salı', 
    'Wednesday'    =>    'Çarşamba', 
    'Thursday'    =>    'Perşembe', 
    'Friday'    =>    'Cuma', 
    'Saturday'    =>    'Cumartesi', 
    'Sunday'    =>    'Pazar', 
); 