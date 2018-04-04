<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string $serviceName
     */
    public $serviceName = 'db';

    /**
     * Initialize
     */
    public function init()
    {
        #try {} catch (PDOException $e) {return view('errors.db_error');}

        $this->di->set($this->serviceName, $db);
    }
}