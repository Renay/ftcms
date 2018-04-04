<?php

namespace Engine\Core\Validation\Rules\Core;

use Engine\Core\Validation\Rules\Core\IsIn;

/**
 * Accepted validation rule.
 *
 * @package Engine\Core\Validation\Rules\Core
 */
class Accepted extends IsIn
{

    public function __construct()
    {
        parent::__construct([
                'yes',
            'on',
            1,
            '1',
            true,
            'true'
        ]);
    }
}
