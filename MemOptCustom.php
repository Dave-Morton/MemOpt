<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptCustom.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-19-2016
   * DETAILS: Custom caching class - failover for when no other caching extensions are available
   ***************************************/

    class MemOptCustom {
      public $type = 'custom';

      public function __construct($options = null)
      {
          $this->type = $type;
      }
    }

/*
 Functions
    •add — Cache a new variable in the data store
    •cache_info — Retrieves cached information from cache's data store
    •cas — Updates an old value with a new value
    •clear_cache — Clears the cache
    •dec — Decrease a stored number
    •delete — Removes a stored variable from the cache
    •entry — Atomically fetch or generate a cache entry
    •exists — Checks if entry exists
    •fetch — Fetch a stored variable from the cache
    •inc — Increase a stored number
    •sma_info — Retrieves cache Shared Memory Allocation information
    •store — Cache a variable in the data store
*/

/*
function cache_set($key, $val) {
   $val = var_export($val, true);
   // HHVM fails at __set_state, so just use object cast for now
   $val = str_replace('stdClass::__set_state', '(object)', $val);
   // Write to temp file first to ensure atomicity
   $tmp = "/tmp/$key." . uniqid('', true) . '.tmp';
   file_put_contents($tmp, '<?php $val = ' . $val . ';', LOCK_EX);
   rename($tmp, "/tmp/$key");
}

function cache_get($key) {
    @include "/tmp/$key";
    return isset($val) ? $val : false;
}

$data = array_fill(0, 1000000, ‘hi’); // your application data here
cache_set('my_key', $data);
apc_store('my_key', $data);

// note: make sure you run this on a separate request from cache_set to ensure PHP's opcache will actually cache the file

$t = microtime(true);
$data = cache_get(‘my_key’);
echo microtime(true) - $t;
// 0.00013017654418945

$t = microtime(true);
$data = apc_fetch(‘my_key’);
echo microtime(true) - $t;
// 0.061056137084961

*/
