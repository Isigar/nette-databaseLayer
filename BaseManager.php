<?php
/**
 * Created by PhpStorm.
 * User: Intel
 * Date: 8.4.2017
 * Time: 10:26
 */

namespace Bin\Core;


use App\Bin\Core\API\ApiManager;
use Nette\Database\Context;
use Nette\Database\Table\Selection;
use Tracy\Dumper;

/**
 * Class BaseManager
 * TODO: get,insert,update,delete
 * TODO: GET: pokud má balíček JSON data (array) tak je převést.
 * @package Bin\Core
 */
abstract class BaseManager extends BaseTable
{
    private $table;

    protected $db;

    private $object;

    public function __construct(Context $db)
    {
        $this->db = $db;
    }

    public function load()
    {
        $data = $this->db->table($this->getTable());
        $d = new BaseTable($data);
        $d->setRows($data);
        $this->setRows($data);
        $d->setName($this->getTable());
        $this->setName($this->getTable());
        $this->object = $d;
        return $d;
    }

    /**
     * @param $data
     * @return bool|\Exception
     */
    public function set($data)
    {
        $failed = false;
        try{
            $this->db->table($this->getTable())->insert($data);
        }catch(\Exception $e){
            $failed = $e;
        }
        if($failed){
            return $failed;
        }else{
            return true;
        }
    }


    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

}