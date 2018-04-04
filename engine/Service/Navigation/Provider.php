<?php
/**
 * All right reserved by Perfect Team.
 * Author class: Forbs
 * Contacts: http://mcperfects.com/
 */

namespace Engine\Service\Navigation;

use Engine\Core\Navigation\Navigation;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'navigation';

    /**
     * @return mixed
     */
    public function init()
    {
        $service = new Navigation($this->di);

        $this->di->set($this->serviceName, $service);

        return $this;
    }
}