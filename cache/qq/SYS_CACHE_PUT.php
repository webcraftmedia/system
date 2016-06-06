<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     system_sql
 */
namespace SYSTEM\SQL;

/**
 * QQ to write data into the cache
 */
class SYS_CACHE_PUT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function pgsql(){return           
'WITH upsert AS (UPDATE system.cache SET type=$3, data=$4 WHERE cache = $1 AND ident = $2 RETURNING *) '.
' INSERT INTO system.cache ("cache", "ident", "type", "data")'.
' SELECT $1,$2,$3,$4 WHERE NOT EXISTS (SELECT * FROM upsert);';
    }
    public static function mysql(){return           
'REPLACE INTO system_cache (cache, ident, type, data)'.
' VALUES (?,?,?,?);';
    }
}