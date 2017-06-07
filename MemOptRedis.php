<?php
  /***************************************
   * http://www.program-o.com
   * Program-O
   * Version: 3.0.0
   *
   * FILE: MemOptRedis.php
   * AUTHOR: Dave Morton and Elizabeth Perreau, with special thanks to Brent Edds for
   * his work porting Program AB from Java to PHP
   * DATE: 08-19-2016
   * DETAILS: Redis helper class
   ***************************************/

    class MemOptRedis {
        public $type = 'redis';
        public $class_methods;
        public $base;

        public function __construct($options = null) // the variable $options is either null or an array of configuration options.
        {
            require_once('Redis/autoload.php');
            Predis\Autoloader::register();
            try
            {
                $out = new Predis\Client();
                $this->base = $out;
                $this->class_methods = get_class_methods($out);
            }
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function get_methods()
        {
            return get_class_methods($this->base);
        }

        public function APPEND() {} // Predis\Command\StringAppend

        public function AUTH() {} // Predis\Command\ConnectionAuth

        public function BGREWRITEAOF() {} // Predis\Command\ServerBackgroundRewriteAOF

        public function BGSAVE() {} // Predis\Command\ServerBackgroundSave

        public function BITCOUNT() {} // Predis\Command\StringBitCount

        public function BITFIELD() {} // Predis\Command\StringBitField

        public function BITOP() {} // Predis\Command\StringBitOp

        public function BITPOS() {} // Predis\Command\StringBitPos

        public function BLPOP() {} // Predis\Command\ListPopFirstBlocking

        public function BRPOP() {} // Predis\Command\ListPopLastBlocking

        public function BRPOPLPUSH() {} // Predis\Command\ListPopLastPushHeadBlocking

        public function CLIENT() {} // Predis\Command\ServerClient

        public function COMMAND() {} // Predis\Command\ServerCommand

        public function CONFIG() {} // Predis\Command\ServerConfig

        public function DBSIZE() {} // Predis\Command\ServerDatabaseSize

        public function DECR() {} // Predis\Command\StringDecrement

        public function DECRBY() {} // Predis\Command\StringDecrementBy

        public function DEL() {} // Predis\Command\KeyDelete

        public function DISCARD() {} // Predis\Command\TransactionDiscard

        public function DUMP() {} // Predis\Command\KeyDump

        public function _ECHO() {} // Predis\Command\ConnectionEcho

        public function _EVAL() {} // Predis\Command\ServerEval

        public function EVALSHA() {} // Predis\Command\ServerEvalSHA

        public function EXEC() {} // Predis\Command\TransactionExec

        public function EXISTS() {} // Predis\Command\KeyExists

        public function EXPIRE() {} // Predis\Command\KeyExpire

        public function EXPIREAT() {} // Predis\Command\KeyExpireAt

        public function FLUSHALL() {} // Predis\Command\ServerFlushAll

        public function FLUSHDB() {} // Predis\Command\ServerFlushDatabase

        public function GEOADD() {} // Predis\Command\GeospatialGeoAdd

        public function GEODIST() {} // Predis\Command\GeospatialGeoDist

        public function GEOHASH() {} // Predis\Command\GeospatialGeoHash

        public function GEOPOS() {} // Predis\Command\GeospatialGeoPos

        public function GEORADIUS() {} // Predis\Command\GeospatialGeoRadius

        public function GEORADIUSBYMEMBER() {} // Predis\Command\GeospatialGeoRadiusByMember

        public function GET() {} // Predis\Command\StringGet

        public function GETBIT() {} // Predis\Command\StringGetBit

        public function GETRANGE() {} // Predis\Command\StringGetRange

        public function GETSET() {} // Predis\Command\StringGetSet

        public function HDEL() {} // Predis\Command\HashDelete

        public function HEXISTS() {} // Predis\Command\HashExists

        public function HGET() {} // Predis\Command\HashGet

        public function HGETALL() {} // Predis\Command\HashGetAll

        public function HINCRBY() {} // Predis\Command\HashIncrementBy

        public function HINCRBYFLOAT() {} // Predis\Command\HashIncrementByFloat

        public function HKEYS() {} // Predis\Command\HashKeys

        public function HLEN() {} // Predis\Command\HashLength

        public function HMGET() {} // Predis\Command\HashGetMultiple

        public function HMSET() {} // Predis\Command\HashSetMultiple

        public function HSCAN() {} // Predis\Command\HashScan

        public function HSET() {} // Predis\Command\HashSet

        public function HSETNX() {} // Predis\Command\HashSetPreserve

        public function HSTRLEN() {} // Predis\Command\HashStringLength

        public function HVALS() {} // Predis\Command\HashValues

        public function INCR() {} // Predis\Command\StringIncrement

        public function INCRBY() {} // Predis\Command\StringIncrementBy

        public function INCRBYFLOAT() {} // Predis\Command\StringIncrementByFloat

        public function INFO() {} // Predis\Command\ServerInfoV26x

        public function KEYS() {} // Predis\Command\KeyKeys

        public function LASTSAVE() {} // Predis\Command\ServerLastSave

        public function LINDEX() {} // Predis\Command\ListIndex

        public function LINSERT() {} // Predis\Command\ListInsert

        public function LLEN() {} // Predis\Command\ListLength

        public function LPOP() {} // Predis\Command\ListPopFirst

        public function LPUSH() {} // Predis\Command\ListPushHead

        public function LPUSHX() {} // Predis\Command\ListPushHeadX

        public function LRANGE() {} // Predis\Command\ListRange

        public function LREM() {} // Predis\Command\ListRemove

        public function LSET() {} // Predis\Command\ListSet

        public function LTRIM() {} // Predis\Command\ListTrim

        public function MGET() {} // Predis\Command\StringGetMultiple

        public function MIGRATE() {} // Predis\Command\KeyMigrate

        public function MONITOR() {} // Predis\Command\ServerMonitor

        public function MOVE() {} // Predis\Command\KeyMove

        public function MSET() {} // Predis\Command\StringSetMultiple

        public function MSETNX() {} // Predis\Command\StringSetMultiplePreserve

        public function MULTI() {} // Predis\Command\TransactionMulti

        public function OBJECT() {} // Predis\Command\ServerObject

        public function PERSIST() {} // Predis\Command\KeyPersist

        public function PEXPIRE() {} // Predis\Command\KeyPreciseExpire

        public function PEXPIREAT() {} // Predis\Command\KeyPreciseExpireAt

        public function PFADD() {} // Predis\Command\HyperLogLogAdd

        public function PFCOUNT() {} // Predis\Command\HyperLogLogCount

        public function PFMERGE() {} // Predis\Command\HyperLogLogMerge

        public function PING() {} // Predis\Command\ConnectionPing

        public function PSETEX() {} // Predis\Command\StringPreciseSetExpire

        public function PSUBSCRIBE() {} // Predis\Command\PubSubSubscribeByPattern

        public function PTTL() {} // Predis\Command\KeyPreciseTimeToLive

        public function PUBLISH() {} // Predis\Command\PubSubPublish

        public function PUBSUB() {} // Predis\Command\PubSubPubsub

        public function PUNSUBSCRIBE() {} // Predis\Command\PubSubUnsubscribeByPattern

        public function QUIT() {} // Predis\Command\ConnectionQuit

        public function RANDOMKEY() {} // Predis\Command\KeyRandom

        public function RENAME() {} // Predis\Command\KeyRename

        public function RENAMENX() {} // Predis\Command\KeyRenamePreserve

        public function RESTORE() {} // Predis\Command\KeyRestore

        public function RPOP() {} // Predis\Command\ListPopLast

        public function RPOPLPUSH() {} // Predis\Command\ListPopLastPushHead

        public function RPUSH() {} // Predis\Command\ListPushTail

        public function RPUSHX() {} // Predis\Command\ListPushTailX

        public function SADD() {} // Predis\Command\SetAdd

        public function SAVE() {} // Predis\Command\ServerSave

        public function SCAN() {} // Predis\Command\KeyScan

        public function SCARD() {} // Predis\Command\SetCardinality

        public function SCRIPT() {} // Predis\Command\ServerScript

        public function SDIFF() {} // Predis\Command\SetDifference

        public function SDIFFSTORE() {} // Predis\Command\SetDifferenceStore

        public function SELECT() {} // Predis\Command\ConnectionSelect

        public function SENTINEL() {} // Predis\Command\ServerSentinel

        public function SET() {} // Predis\Command\StringSet

        public function SETBIT() {} // Predis\Command\StringSetBit

        public function SETEX() {} // Predis\Command\StringSetExpire

        public function SETNX() {} // Predis\Command\StringSetPreserve

        public function SETRANGE() {} // Predis\Command\StringSetRange

        public function SHUTDOWN() {} // Predis\Command\ServerShutdown

        public function SINTER() {} // Predis\Command\SetIntersection

        public function SINTERSTORE() {} // Predis\Command\SetIntersectionStore

        public function SISMEMBER() {} // Predis\Command\SetIsMember

        public function SLAVEOF() {} // Predis\Command\ServerSlaveOf

        public function SLOWLOG() {} // Predis\Command\ServerSlowlog

        public function SMEMBERS() {} // Predis\Command\SetMembers

        public function SMOVE() {} // Predis\Command\SetMove

        public function SORT() {} // Predis\Command\KeySort

        public function SPOP() {} // Predis\Command\SetPop

        public function SRANDMEMBER() {} // Predis\Command\SetRandomMember

        public function SREM() {} // Predis\Command\SetRemove

        public function SSCAN() {} // Predis\Command\SetScan

        public function STRLEN() {} // Predis\Command\StringStrlen

        public function SUBSCRIBE() {} // Predis\Command\PubSubSubscribe

        public function SUBSTR() {} // Predis\Command\StringSubstr

        public function SUNION() {} // Predis\Command\SetUnion

        public function SUNIONSTORE() {} // Predis\Command\SetUnionStore

        public function TIME() {} // Predis\Command\ServerTime

        public function TTL() {} // Predis\Command\KeyTimeToLive

        public function TYPE() {} // Predis\Command\KeyType

        public function UNSUBSCRIBE() {} // Predis\Command\PubSubUnsubscribe

        public function UNWATCH() {} // Predis\Command\TransactionUnwatch

        public function WATCH() {} // Predis\Command\TransactionWatch

        public function ZADD() {} // Predis\Command\ZSetAdd

        public function ZCARD() {} // Predis\Command\ZSetCardinality

        public function ZCOUNT() {} // Predis\Command\ZSetCount

        public function ZINCRBY() {} // Predis\Command\ZSetIncrementBy

        public function ZINTERSTORE() {} // Predis\Command\ZSetIntersectionStore

        public function ZLEXCOUNT() {} // Predis\Command\ZSetLexCount

        public function ZRANGE() {} // Predis\Command\ZSetRange

        public function ZRANGEBYLEX() {} // Predis\Command\ZSetRangeByLex

        public function ZRANGEBYSCORE() {} // Predis\Command\ZSetRangeByScore

        public function ZRANK() {} // Predis\Command\ZSetRank

        public function ZREM() {} // Predis\Command\ZSetRemove

        public function ZREMRANGEBYLEX() {} // Predis\Command\ZSetRemoveRangeByLex

        public function ZREMRANGEBYRANK() {} // Predis\Command\ZSetRemoveRangeByRank

        public function ZREMRANGEBYSCORE() {} // Predis\Command\ZSetRemoveRangeByScore

        public function ZREVRANGE() {} // Predis\Command\ZSetReverseRange

        public function ZREVRANGEBYLEX() {} // Predis\Command\ZSetReverseRangeByLex

        public function ZREVRANGEBYSCORE() {} // Predis\Command\ZSetReverseRangeByScore

        public function ZREVRANK() {} // Predis\Command\ZSetReverseRank

        public function ZSCAN() {} // Predis\Command\ZSetScan

        public function ZSCORE() {} // Predis\Command\ZSetScore

        public function ZUNIONSTORE() {} // Predis\Command\ZSetUnionStore

    }








