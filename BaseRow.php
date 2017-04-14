<?php
/**
 * Created by PhpStorm.
 * User: Intel
 * Date: 8.4.2017
 * Time: 10:32
 */

namespace Bin\Core;


use App\Bin\Core;
use Bin\Helpers\Exceptions\ComponentsException;
use Nette\Utils\Json;

class BaseRow implements iRow
{
    private $data;

    public function __get($name)
    {
        $data = $this->data->$name;
        return $data;
    }

    public function get($name)
    {
        $data = $this->data->$name;
        if($data instanceof jsonClass)
        {
            return Json::encode($data);
        }
        else
        {
            return $this->data->$name;
        }
    }

    /**
     * Jelikož activerow nejde nasetovat vytvoří kopii s daty v stdClass
     *
     * @param $name
     * @param $value
     * @throws ComponentsException
     */
    public function __set($name, $value)
    {
        $data = $this->data->$name;

        if(Core::isJson($data))
        {
            if(Core::isJson($value)){
                $this->data->$name = $value;
            }
            else
            {
                throw new ComponentsException("Pokud chcete nastavit hodnotu $name, která byla JSON vaše hodnota musí být taky JSON! Type missmatch!");
            }
        }
        else
        {
            $this->data->$name  = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return BaseRow
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


}