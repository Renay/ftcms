<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 16:38
 */

namespace Engine\Abstracts;

use App\Models\Payment;
use Engine\Core\Merchant\MerchantInterface;
use Engine\Helper\Rcon;

abstract class Merchant implements MerchantInterface
{
    public function __construct() { }
    /**
     * Return IP address
     *
     * @return string
     */
    protected function getIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}