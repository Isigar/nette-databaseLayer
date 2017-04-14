<?php
/**
 * Created by PhpStorm.
 * User: Intel
 * Date: 8.4.2017
 * Time: 10:28
 */

namespace Bin\Core;


use App\Bin\Core;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Diagnostics\Dumper;
use Nette\Utils\Json;

class BaseTable extends BaseRow implements iTable
{
    private $rows;
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return BaseTable
     */
    protected function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return mixed
     */
    public function getRow($ID)
    {
        return $this->rows[$ID];
    }

    /**
     * @param mixed $data
     * @return BaseTable
     */
    protected function setRows($data)
    {
        if($data instanceof Selection)
        {
            if(count($data) > 0)
            {
                foreach($data as $item => $d)
                {
                    $b = new BaseRow();
                    $class = new \stdClass();
                    foreach($d as $key => $val)
                    {
                        if(Core::isJson($val)){
                            $json = new jsonClass();
                            foreach(Json::decode($val,Json::FORCE_ARRAY) as $k => $v){
                                $json->$k = $v;
                            }
                            $class->$key = $json;

                        }else{
                            $class->$key = $val;
                        }
                    }
                    $b->setData($class);
                    $this->rows[$item] = $b;
                }
            }
            else
            {
                $this->rows = false;
            }
        }
        elseif($data instanceof ActiveRow)
        {
            $class = new \stdClass();
            foreach($data as $key => $val)
            {
                $class->$key = $val;
            }
            $this->rows[] = $class;
        }
    }

    public function count()
    {
        return count($this->getRows());
    }


}