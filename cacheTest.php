<?php
$startTime = microtime(true);
  $e_all = defined('E_DEPRECATED') ? E_ALL & ~E_DEPRECATED : E_ALL;
  error_reporting($e_all);
  ini_set('log_errors', true);
  ini_set('error_log', 'error.log');
  ini_set('html_errors', false);
  ini_set('display_errors', true);
  set_time_limit(0);

header('content-type: text/plain');
echo <<<endHead
This is a test and benchmark of the basic methods used in the Custom Cache class (though it doesn't use the class itself, just the underlying functions),
comparing it's performance with APC. The results are shown below. Please note that this cache is not intended to be as fast as APC. it's just meant
to be a fallback in the event that no other caching methods/extensions are available.

-------------------------------------------

endHead;
ob_flush();
flush();
$aLen = 100000;
$daLen = number_format($aLen);
echo "Creating a data array of $daLen elements of random size.\n";
$t = microtime(true);
$data = array();
for ($n = 0; $n < $aLen; $n++)
{
    $data[] = makeRandomString();
}
$dcEt = microtime(true) - $t;
echo 'Data creation: Elapsed time: ', number_format($dcEt, 5), " seconds\n-------------------------------------------\n";

$t = microtime(true);
cache_set('my_key', $data);
$dsCCet = microtime(true) - $t;
echo 'Data storage (Custom Cache): Elapsed time: ', number_format($dsCCet, 5), " seconds\n";
$t = microtime(true);
apc_store('my_key', $data);
$dsAPCet = microtime(true) - $t;
echo 'Data storage (APC): Elapsed time: ', number_format($dsAPCet, 5), " seconds\n-------------------------------------------\n";

// note: make sure you run this on a separate request from cache_set to ensure PHP's opcache will actually cache the file

$t = microtime(true);
$data = cache_get('my_key');
$drCCet = microtime(true) - $t;
echo 'Fetch data - Custom Cache: Elapsed time: ',number_format($drCCet, 5), " seconds\n";

$t = microtime(true);
$data = apc_fetch('my_key');
$drAPCet = microtime(true) - $t;
echo 'Fetch data - APC: Elapsed time: ', number_format($drAPCet, 5), " seconds\n-------------------------------------------\n";

$elapsed = microtime(true) - $startTime;

echo 'Total elapsed time: ', number_format($elapsed, 5), " seconds\n-------------------------------------------\n";
$dsEffCC = number_format($dcEt / $dsCCet, 2);
$dsEffAPC = number_format($dcEt / $dsAPCet, 2);
$drEffCC = number_format($dcEt / $drCCet, 2);
$drEffAPC = number_format($dcEt / $drAPCet, 2);
$bmCCvsAPC = number_format($drCCet / $drAPCet, 3);
echo <<<endFoot

What this means:
With the data collected above, you can see that it took $dcEt seconds to create an array of $daLen randomly generated strings. This is the
base time used for comparison of data creation versus data storage or data retrieval. Storage of the data with the custom caching function
took $dsCCet seconds, which is $dsEffCC times faster than  creating the data. More importantly, it took $drCCet seconds to retrieve that
stored data, which is $drEffCC times faster than creating the data. Granted, APC was $bmCCvsAPC times faster than using the custom cache,
but that really isn't the test here.
endFoot;

function cache_set($key, $val) {
   $val = var_export($val, true);
   // HHVM fails at __set_state, so just use object cast for now
   $val = str_replace('stdClass::__set_state', '(object)', $val);
   // Write to temp file first to ensure atomicity
   $tmp = "./CustomCache/$key." . uniqid('', true) . '.tmp';
   file_put_contents($tmp, '<?php $val = ' . $val . ';', LOCK_EX);
   rename($tmp, "./CustomCache/$key");
}

function cache_get($key) {
    @include "./CustomCache/$key";
    return isset($val) ? $val : false;
}

function makeRandomString()
{
    $out = '';
    $rLen = rand(2, 100);
    $charList = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $cLen = strlen($charList);
    for($n = 0;$n < $rLen; $n++)
    {
        $char = substr($charList, rand(0, $cLen), 1);
        $out .= $char;
    }
    return $out;
}
