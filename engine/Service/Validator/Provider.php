<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 17.11.2017
 * Time: 2:18
 */

namespace Engine\Service\Validator;

use Engine\Core\Validation\Factory;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string $serviceName
     */
    public $serviceName = 'validator';

    /**
     * Initialize
     */
    public function init()
    {
        $validator = new Factory;

        $this->di->set($this->serviceName, $validator);
    }
}