<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\DB
 */
namespace SYSTEM\DB;

/**
 * Result Class provided by System to hold Database Query Result Ressources of AMQP Querys.
 */
class ResultAMQP extends \SYSTEM\DB\Result{ // < maybe not ? check if amqpchannel is compatible with dbresult.
    /** ressource Variable to store Database Result-ressource */
    private $res = NULL;
    /** ressource Variable to store current Line either as array or object */
    private $current = NULL;    

    /**
     * Construct the Resultset with a database ressource
     * 
     * @param ressource $res Ressource of the Database Result-Set
     */
    public function __construct($res){
        $this->res = $res;}

    /**
     * Close Resultset upon destruction
     */
    public function __destruct(){
        $this->close();}

    /**
     * Closes the Resultset
     *
     * @return null Returns null
     */
    public function close(){
        pg_free_result($this->res);}

    /**
     * Counts the Lines in the Resultset
     *
     * @return int Returns number of lines in the result
     */
    public function count(){
        return pg_num_rows($this->res);}

    /**
     * Counts the affected lines in the Resultset
     *
     * @return int Returns number of affected lines in the result
     */
    public function affectedRows(){
        throw new \SYSTEM\LOG\ERROR("Not Supported!");}

    /**
     * Returns the next line in the Resultset
     *
     * @param bool $object Determines if the result will be an object or array
     * @param int $result_type Mysql Fetch result Type
     * @return array Returns an array(object) containing the next line
     */
    public function next($object = false, $result_type = MYSQL_BOTH){        
        if($object){
            $this->current = pg_fetch_object($this->res);
        } else {
            $this->current = pg_fetch_assoc($this->res);
        }
        return $this->current;
    }

    /**
     * Seeks an amount of lines within the Resultset
     *
     * @param int $row_number Lines to seek over
     * @return bool Returns true or false
     */
    public function seek($row_number){
        return pg_data_seek($this->res,$row_number);}
}