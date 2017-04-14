<?php
/**
 * Created by PhpStorm.
 * User: Intel
 * Date: 8.4.2017
 * Time: 10:28
 */

namespace Bin\Core;


interface iTable
{
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function count();
}