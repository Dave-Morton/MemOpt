<?php
  $e_all = defined('E_DEPRECATED') ? E_ALL & ~E_DEPRECATED : E_ALL;
  error_reporting($e_all);
  ini_set('log_errors', true);
  ini_set('error_log', 'error.log');
  ini_set('html_errors', false);
  ini_set('display_errors', true);

require_once('MemOpt.php');
$options = array(
    'host' => null,
    'port' => 11211
);

$memOpt = findBest($options);
header('content-type: text/plain');
echo 'Class Object: ';
print_r($memOpt);
/*
echo "\n__________________________________________\n Type: ";
print_r($memOpt->type);
*/
echo "\n__________________________________________\n Methods: ";
print_r($memOpt->class_methods);

echo "\n__________________________________________\n Stats: ";
$type = 'maps';
$slabID = null;
$limit = 100;
//print_r( $memOpt->getStats($type, $slabID, $limit));

/*
*/
