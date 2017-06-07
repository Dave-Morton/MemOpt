<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptMemcache.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-19-2016
   * DETAILS: Memcache helper class
   ***************************************/

    class MemOptMemcache extends Memcache{
        public $type = 'memcache';
        public $class_methods;
        public $base;
        public $host;
        public $port;

        public function __construct($options = null)
        {
            $mcHost = (isset($options['host'])) ? $options['host'] : 'localhost';
            $mcPort = (isset($options['port'])) ? $options['port'] : 11211;
                $out = new Memcache();
                if (false !== $out->addServer($mcHost, $mcPort))
                {
                    $this->base = $out;
                    $this->host = $mcHost;
                    $this->port = $mcPort;
                    $this->class_methods = $this->get_methods();
                    return $this;
                }
                //$out = new Memcache(null, $mcPort);
                $errMsg = "Could not connect to MemCache server at host='$mcHost', port #$mcPort.\n Error: {$e->getMessage()}";
                $this->reportError($errMsg);
                return false;
        }

        public function getStats($type = null, $slabID = null, $limit = 100) {
            $out = (is_null($type)) ? $this->base->getStats() : $this->base->getStats($type, $slabID, $limit);
            return $out;
        } // Get statistics from all servers in pool

        public function getExtendedStats($type = null, $slabID = null, $limit = 100) {
            $out = (is_null($type)) ? $this->base->getExtendedStats() : $this->base->getExtendedStats($type, $slabID, $limit);
            return $out;
        } // Get statistics from all servers in pool

        public function getServerStatus($host = null, $port = null) {
            $host = (!is_null($host)) ? $host : $this->host;
            $port = (!is_null($port)) ? $port : $this->port;
            //return "Host = $host. Port = $port";
            return $this->base->getServerStatus($host, $port);
        } // Returns server status

        public function reportError($errMsg)
        {
            die($errMsg);
        }
/*
        public function add() {} // Add an item to the server

        public function addServer() {} // Add a memcached server to connection pool

        public function close() {} // Close memcached server connection

        public function connect() {} // Open memcached server connection

        public function decrement() {} // Decrement item's value

        public function delete() {} // Delete item from the server

        public function flush() {} // Flush all existing items at the server

        public function get() {} // Retrieve item from the server



        public function getStats() {} // Get statistics of the server

        public function getVersion() {} // Return version of the server

        public function increment() {} // Increment item's value

        public function pconnect() {} // Open memcached server persistent connection

        public function replace() {} // Replace value of the existing item

        public function set() {} // Store data at the server

        public function setCompressThreshold() {} // Enable automatic compression of large values

        public function setServerParams() {} // Changes server parameters and status at runtime

*/
        public function get_methods()
        {
            return get_class_methods($this);
        }
   }

