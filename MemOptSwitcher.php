<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOpt.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-18-2016
   * DETAILS: Memory Optimization Switcher class - Acts as a "switchboard"
   * for finding and implementing the most apropriate caching system, based on
   * server settings
   ***************************************/
  
  class MemOptSwitcher {
    // public variables
    
    // protected variables
    
    public static function findBest()
    {
      switch (true) {
        case (extension_loaded('memcashed')):
          $out = new MemOptMemcashed();
          break;
        case (extension_loaded('memcache')):
          $out = new MemOptMemcache();
          break;
        case (extension_loaded('apc')):
          $out = new MemOptAPC();
          break;
        case (extension_loaded('apcu')):
          $out = new MemOptAPCu();
          break;
        case (extension_loaded('redis')):
          $out = new MemOptRedis();
          break;
        default:
          $out = new MemOptCustom();
      }
      return $out;
    }
  }
    