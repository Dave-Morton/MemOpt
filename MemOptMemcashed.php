<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptMemcashed.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-18-2016
   * DETAILS: Memcached helper class
   ***************************************/

    class MemOptMemcached
    { // extends MemOpt
        public $type = 'memcached';

        public function __construct($options)
        {
            //
        }

        public function add() {} // Add an item under a new key
        public function addByKey() {} // Add an item under a new key on a specific server
        public function addServer() {} // Add a server to the server pool
        public function addServers() {} // Add multiple servers to the server pool
        public function append() {} // Append data to an existing item
        public function appendByKey() {} // Append data to an existing item on a specific server
        public function cas() {} // Compare and swap an item
        public function casByKey() {} // Compare and swap an item on a specific server
        public function decrement() {} // Decrement numeric item's value
        public function decrementByKey() {} // Decrement numeric item's value, stored on a specific server
        public function delete() {} // Delete an item
        public function deleteByKey() {} // Delete an item from a specific server
        public function deleteMulti() {} // Delete multiple items
        public function deleteMultiByKey() {} // Delete multiple items from a specific server
        public function fetch() {} // Fetch the next result
        public function fetchAll() {} // Fetch all the remaining results
        public function flush() {} // Invalidate all items in the cache
        public function get() {} // Retrieve an item
        public function getAllKeys() {} // Gets the keys stored on all the servers
        public function getByKey() {} // Retrieve an item from a specific server
        public function getDelayed() {} // Request multiple items
        public function getDelayedByKey() {} // Request multiple items from a specific server
        public function getMulti() {} // Retrieve multiple items
        public function getMultiByKey() {} // Retrieve multiple items from a specific server
        public function getOption() {} // Retrieve a Memcached option value
        public function getResultCode() {} // Return the result code of the last operation
        public function getResultMessage() {} // Return the message describing the result of the last operation
        public function getServerByKey() {} // Map a key to a server
        public function getServerList() {} // Get the list of the servers in the pool
        public function getStats() {} // Get server pool statistics
        public function getVersion() {} // Get server pool version info
        public function increment() {} // Increment numeric item's value
        public function incrementByKey() {} // Increment numeric item's value, stored on a specific server
        public function isPersistent() {} // Check if a persitent connection to memcache is being used
        public function isPristine() {} // Check if the instance was recently created
        public function prepend() {} // Prepend data to an existing item
        public function prependByKey() {} // Prepend data to an existing item on a specific server
        public function quit() {} // Close any open connections
        public function replace() {} // Replace the item under an existing key
        public function replaceByKey() {} // Replace the item under an existing key on a specific server
        public function resetServerList() {} // Clears all servers from the server list
        public function set() {} // Store an item
        public function setByKey() {} // Store an item on a specific server
        public function setMulti() {} // Store multiple items
        public function setMultiByKey() {} // Store multiple items on a specific server
        public function setOption() {} // Set a Memcached option
        public function setOptions() {} // Set Memcached options
        public function setSaslAuthData() {} // Set the credentials to use for authentication
        public function touch() {} // Set a new expiration on an item
        public function touchByKey() {} // Set a new expiration on an item on a specific server

        public function get_methods()
        {
            return get_class_methods($this);
        }
    }


/*
        public function add() {} // Add an item under a new key
        public function addByKey() {} // Add an item under a new key on a specific server
        public function addServer() {} // Add a server to the server pool
        public function addServers() {} // Add multiple servers to the server pool
        public function append() {} // Append data to an existing item
        public function appendByKey() {} // Append data to an existing item on a specific server
        public function cas() {} // Compare and swap an item
        public function casByKey() {} // Compare and swap an item on a specific server
        public function decrement() {} // Decrement numeric item's value
        public function decrementByKey() {} // Decrement numeric item's value, stored on a specific server
        public function delete() {} // Delete an item
        public function deleteByKey() {} // Delete an item from a specific server
        public function deleteMulti() {} // Delete multiple items
        public function deleteMultiByKey() {} // Delete multiple items from a specific server
        public function fetch() {} // Fetch the next result
        public function fetchAll() {} // Fetch all the remaining results
        public function flush() {} // Invalidate all items in the cache
        public function get() {} // Retrieve an item
        public function getAllKeys() {} // Gets the keys stored on all the servers
        public function getByKey() {} // Retrieve an item from a specific server
        public function getDelayed() {} // Request multiple items
        public function getDelayedByKey() {} // Request multiple items from a specific server
        public function getMulti() {} // Retrieve multiple items
        public function getMultiByKey() {} // Retrieve multiple items from a specific server
        public function getOption() {} // Retrieve a Memcached option value
        public function getResultCode() {} // Return the result code of the last operation
        public function getResultMessage() {} // Return the message describing the result of the last operation
        public function getServerByKey() {} // Map a key to a server
        public function getServerList() {} // Get the list of the servers in the pool
        public function getStats() {} // Get server pool statistics
        public function getVersion() {} // Get server pool version info
        public function increment() {} // Increment numeric item's value
        public function incrementByKey() {} // Increment numeric item's value, stored on a specific server
        public function isPersistent() {} // Check if a persitent connection to memcache is being used
        public function isPristine() {} // Check if the instance was recently created
        public function prepend() {} // Prepend data to an existing item
        public function prependByKey() {} // Prepend data to an existing item on a specific server
        public function quit() {} // Close any open connections
        public function replace() {} // Replace the item under an existing key
        public function replaceByKey() {} // Replace the item under an existing key on a specific server
        public function resetServerList() {} // Clears all servers from the server list
        public function set() {} // Store an item
        public function setByKey() {} // Store an item on a specific server
        public function setMulti() {} // Store multiple items
        public function setMultiByKey() {} // Store multiple items on a specific server
        public function setOption() {} // Set a Memcached option
        public function setOptions() {} // Set Memcached options
        public function setSaslAuthData() {} // Set the credentials to use for authentication
        public function touch() {} // Set a new expiration on an item
        public function touchByKey() {} // Set a new expiration on an item on a specific server
*/