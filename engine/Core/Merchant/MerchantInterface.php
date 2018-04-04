<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 0:34
 */

namespace Engine\Core\Merchant;

use InvalidArgumentException;
use UnexpectedValueException;

interface MerchantInterface
{

    /**
     * Get URL for pay through the form
     *
     * @param string|float|int $sum
     * @param string $account
     * @param string $desc
     * @param string $currency
     * @param string $locale
     *
     * @return string
     */
    public function form($sum, $account, $desc, $currency, $locale);

    /**
     * Check request on handler from Merchant
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     */
    public function checkHandlerRequest();
}