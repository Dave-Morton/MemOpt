<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptAPCu.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-19-2016
   * DETAILS: APCu helper class
   ***************************************/

    class MemOptAPCu {
        public $type = 'APCu';
        public $class_methods;

        public function __construct($options = null) // the variable $options is either null or an array of configuration options.
        {
            // constructor code here...
            $this->class_methods = $this->get_methods();
            return $this;
        }

        public function add($key, $val, $ttl = 0)
        {
            $out = apcu_add($key, $var);
            return $out;
        }

        public function cache_info($limited = false) {
            return apcu_cache_info();
        } // Retrieves cached information from APCu's data store

        public function cas($key ,$old ,$new) {
            return apcu_cas($key ,$old ,$new);
        } // Updates an old value with a new value

        public function getStats($type = null, $slabID = null, $limit = null) {
            return $this->cache_info();
        } // get the stats from the cache - alias for cache_info()

        public function clear_cache() {
            return apcu_clear_cache();
        } // Clears the APCu cache

        public function dec($key, $step = 1, &$success) {
            return apcu_dec($key, $step, $success);
        } // Decrease a stored number

        public function delete($key) {
            return apcu_delete($key);
        } // Removes a stored variable from the cache

        public function entry() {} // Atomically fetch or generate a cache entry

        public function exists() {} // Checks if entry exists

        public function fetch() {} // Fetch a stored variable from the cache

        public function get_methods()
        {
            return get_class_methods($this);
        }
        public function inc() {} // Increase a stored number

        public function sma_info() {} // Retrieves APCu Shared Memory Allocation information

        public function store() {} // Cache a variable in the data store

    }
/*
*/