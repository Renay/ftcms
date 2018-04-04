<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 13:41
 */

namespace Merchant\Freekassa;

use App\Models\Payment;
use Engine\Abstracts\Merchant as BaseMerchant;
use Engine\Helper\Rcon;
use Exception;
use InvalidArgumentException;
use UnexpectedValueException;

class Merchant extends BaseMerchant
{
    private $supportedFreekassaIp = array(
        '136.243.38.147',
        '136.243.38.149',
        '136.243.38.150',
        '136.243.38.151',
        '136.243.38.189',
        '88.198.88.98',
        '127.0.0.1' // for debug
    );

    private $shopId;
    private $secretOne;
    private $secretTwo;

    private $params = [];

    const FORM_URL = 'https://www.free-kassa.ru/merchant/cash.php';

    public function __construct($shopId = null, $secretOne = null, $secretTwo = null)
    {
        $this->shopId       = $shopId;
        $this->secretOne = $secretOne;
        $this->secretTwo = $secretTwo;
    }

    function getSign(array $params)
    {
        return md5(implode(':', array_merge([$this->shopId], $params)));
    }

    /**
     *
     * Get URL for pay through the form
     *
     * @param string|float|int $sum
     * @param string $account
     * @param string $desc
     * @param null $currency
     * @param null $locale
     *
     * @return string
     */
    public function form($sum, $account, $desc = null, $currency = null, $locale = null)
    {
        $vitalParams = array(
            'm'              => $this->shopId,
            'o'                => $account,
            'oa'              => $sum,
            's'                 => $this->getSign([
                $sum, $this->secretOne, $account
            ])
        );

        $this->params = array_merge($this->params, $vitalParams);

        return self::FORM_URL . '?' . http_build_query($this->params);
    }

    /**
     * Check request on handler from Freekassa
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     */
    public function checkHandlerRequest()
    {
        if (empty(request()->get('SIGN'))) {
            throw new InvalidArgumentException('Sign is null');
        }

        if (empty(request()->get('MERCHANT_ORDER_ID'))) {
            throw new InvalidArgumentException('Order ID is null');
        }

        if (empty(request()->get('AMOUNT'))) {
            throw new InvalidArgumentException('Amount is null');
        }

        list($amount, $signature, $orderId) = array(
            request()->get('AMOUNT'),
            request()->get('SIGNATURE'),
            request()->get('MERCHANT_ORDER_ID')
        );

        if (!isset($signature) || $signature != $this->getSign([$amount, $this->secretTwo, $orderId])) {
            throw new InvalidArgumentException('Wrong signature');
        }

        if (!in_array($this->getIp(), $this->supportedFreekassaIp)) {
            throw new InvalidArgumentException('IP address Error');
        }

        return true;
    }

    /**
     * Response for Freekassa if handle error
     *
     * @param $message
     *
     * @return string
     */
    public function getErrorHandlerResponse($message)
    {
        return json_encode(array(
            "error" => array(
                "message" => $message
            )
        ));
    }
    
    public function handler()
    {
        try {
            // Validate request (check ip address, signature and etc)
            //$this->checkHandlerRequest();

            list($amount, $orderId) = array(
                request()->get('AMOUNT'),
                request()->get('MERCHANT_ORDER_ID')
            );

            if (!$order = Payment::find((int) $orderId)) {
                throw new InvalidArgumentException('Order id not send. Error!');
            }

            // Very important! Validate request with your order data, before complete order
            if ($amount !== $order['sum'] || $orderId !== $order['id']) {
                // logging data and throw exception
                throw new InvalidArgumentException('Order validation Error!');
            }

            $this->successPay();

            echo 'YES';
            // Oops! Something went wrong.
        } catch (Exception $e) {
            echo $this->getErrorHandlerResponse($e->getMessage());
        }
    }


    /**
     * @return mixed
     */
    public function successPay()
    {
        $order = Payment::select([
            'goods.commands as cmd',
            'payments.*', 'servers.host',
            'servers.port', 'servers.password'
        ])->where(['payments.id' => (int) request()->get('MERCHANT_ORDER_ID')])
            ->leftJoin('goods', ['payments.goods = goods.name'])
            ->leftJoin('servers', ['payments.server = servers.name'])
            ->first();

        $cmd = str_replace('{user}', $order['username'], $order['cmd']);
        $cmd = explode('<br />', $cmd);
        $status = 1;

        $rcon = new Rcon($order['host'], $order['port'], $order['password']);

        if (@$rcon->connect()) {
            foreach($cmd as $command) {
                $rcon->sendCommand($command);
            }
        } else {
            $status = 2;
        }

        return Payment::update([
            'response' => serialize(request()->get),
            'pay_id' => request()->get('intid'),
            'status' => $status,
        ])->where(['id' => request()->get('MERCHANT_ORDER_ID')])->send();
    }
}