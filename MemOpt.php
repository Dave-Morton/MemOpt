<?php
  /***************************************
   * MemOpt class picker
   *
   * FILE: MemOpt.php
   * AUTHOR: Dave Morton
   * DATE: 08-18-2016
   * DETAILS: Memory Optimization class - Acts as a "switchboard"
   * for finding and implementing the most apropriate caching system, based on
   * server settings.
   *
   * Returns a memory caching class that extends the native class that was selected
   ***************************************/

function findBest($options)
{
    switch (true) {
        case (extension_loaded('memcashed')):
            require_once('MemOptMemcashed.php');
            $class_ = new MemOptMemcashed($options);
            break;
/*
        case (extension_loaded('memcache')):
            require_once('MemOptMemcache.php');
            $class_ = new MemOptMemcache($options);
            break;
        case (extension_loaded('apc')):
            require_once('MemOptAPC.php');
            $class_ = new MemOptAPC($options);
            break;
        case (extension_loaded('apcu')):
            require_once('MemOptAPCu.php');
            $class_ = new MemOptAPCu($options);
            break;
*/
        case (extension_loaded('redis')):
            require_once('MemOptRedis.php');
            $class_ = new MemOptRedis($options);
            break;
        default:
            require_once('MemOptCustom.php');
            $class_ = new MemOptCustom($options);
      }
        return $class_;
}
