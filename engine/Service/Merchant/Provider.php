<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 0:35
 */

namespace Engine\Service\Merchant;

use Engine\Core\Merchant\Merchant;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'merchant';

    /**
     * @return mixed
     */
    public function init()
    {
        $service = new Merchant($this->di);

        $this->di->set($this->serviceName, $service);

        return $this;
    }
}