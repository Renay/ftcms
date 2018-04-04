<?php

if (!file_exists(ROOT_DIR .'/app/Config/database.php')) {
	redirect('/install/index.php');
}

require_once ROOT_DIR . '/app/routes.php';

use Engine\App;
use Engine\DI\DI;

try {
    // Dependency injection.
    $di = new DI;

    //Init services
    foreach((array) config('app.services') as $service) {
        (new $service($di))->init();
    }

    $app = new App($di);
    $app->run();

} catch(Exception $e) {
    echo $e->getMessage();
}