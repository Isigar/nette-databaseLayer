<?php
/**
 * Created by PhpStorm.
 * User: Intel
 * Date: 14.4.2017
 * Time: 13:16
 */

namespace App\Bin\Components\UserLog;


use Bin\Core\BaseManager;
use Nette\Database\Context;

class testManager extends BaseManager
{
    protected $db;

    public function __construct(Context $db)
    {
        $this->db = $db;
        $this->setTable(logAccess::TABLE);
        parent::__construct($db);
    }

    public function loadLog()
    {
        $table = $this->load();
        return $table;
    }
}