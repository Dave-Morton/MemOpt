<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptAPC.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-19-2016
   * DETAILS: APC Helper class
   ***************************************/

  /**
   * Class MemOptAPC
   * The MemOptAPC class is a shell class that utilizes native PHP
   * APC functions to provide an object oriented interface to otherwise
   * procedural caching functions.
   */

    class MemOptAPC {
        public $type = 'APC';
        public $class_methods;

        public function __construct($options = null) // the variable $options is either null or an array of configuration options.
        {
            // constructor code here...
            $this->class_methods = $this->get_methods();
            return $this;
        }

        public function add($key, $val, $ttl = 0)
        {
            $out = apc_add($key, $var);
            return $out;
        }

        public function bin_dump ($files = null, $user_vars = null)
        {
            return apc_bin_dump($files, $user_vars);
        }

        public function bin_dumpfile() {} // Output a binary dump of cached files and user variables to a file


        public function bin_load() {} // Load a binary dump into the APC file/user cache

        public function bin_loadfile() {} // Load a binary dump from a file into the APC file/user cache

        public function cache_info() {
            return apc_cache_info();
        } // Retrieves cached information from APC's data store

        public function cas() {} // Updates an old value with a new value

        public function clear_cache() {} // Clears the APC cache

        public function compile_file() {} // Stores a file in the bytecode cache, bypassing all filters.

        public function dec() {} // Decrease a stored number

        public function define_constants() {} // Defines a set of constants for retrieval and mass-definition

        public function delete_file() {} // Deletes files from the opcode cache

        public function delete() {} // Removes a stored variable from the cache

        /**
         * @return string
         */
        public function dump()
        {
            return $this->type;
        }

        public function exists() {} // Checks if APC key exists

        public function fetch() {} // Fetch a stored variable from the cache

        public function getStats($type = null, $slabID = null, $limit = null) {
            return $this->cache_info();
        } // get the stats from the cache - alias for cache_info()

        public function inc() {} // Increase a stored number

        public function load_constants() {} // Loads a set of constants from the cache

        public function sma_info() {} // Retrieves APC's Shared Memory Allocation information

        public function store() {} // Cache a variable in the data store

        public function get_methods()
        {
            return get_class_methods($this);
        }
    }

/*
    public function add() {} // Cache a new variable in the data store
    public function bin_dump() {} // Get a binary dump of the given files and user variables
*/