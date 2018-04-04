<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 13:41
 */

namespace Merchant\Unitpay;

use App\Models\Payment;
use App\Models\Server;
use Exception;
use InvalidArgumentException;
use UnexpectedValueException;
use Engine\Abstracts\Merchant as BaseMerchant;

/**
 * Merchant method UnitPay process
 *
 * @author UnitPay <support@unitpay.ru>
 */
class Merchant extends BaseMerchant
{
    private $supportedUnitpayMethods = array('initPayment', 'getPayment');
    private $requiredUnitpayMethodsParams = array(
        'initPayment' => array('desc', 'account', 'sum'),
        'getPayment' => array('paymentId')
    );
    private $supportedPartnerMethods = array('check', 'pay', 'error');
    private $supportedUnitpayIp = array(
        '31.186.100.49',
        '178.132.203.105',
        '52.29.152.23',
        '52.19.56.234',
        '127.0.0.1' // for debug
    );

    private $secretKey;
    private $publicKey;

    private $params = [];

    const API_URL  = 'https://unitpay.ru/api';
    const FORM_URL = 'https://unitpay.ru/pay/';

    public function __construct($publicKey = null, $secretKey = null)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Create SHA-256 digital signature
     *
     * @param array $params
     * @param $method
     *
     * @return string
     */
    function getSignature(array $params, $method = null)
    {
        ksort($params);
        unset($params['sign']);
        unset($params['signature']);
        array_push($params, $this->secretKey);

        if ($method) {
            array_unshift($params, $method);
        }

        return hash('sha256', join('{up}', $params));
    }

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
    public function form($sum, $account, $desc, $currency = 'RUB', $locale = 'ru')
    {
        $vitalParams = array(
            'account'  => $account,
            'currency' => $currency,
            'desc'     => $desc,
            'sum'      => $sum
        );

        $this->params = array_merge($this->params, $vitalParams);

        if ($this->secretKey) {
            $this->params['signature'] = $this->getSignature($vitalParams);
        }

        $this->params['locale'] = $locale;

        return self::FORM_URL . $this->publicKey . '?' . http_build_query($this->params);
    }

    /**
     * Set customer email
     *
     * @param string $email
     *
     * @return $this
     */
    public function setCustomerEmail($email)
    {
        $this->params['customerEmail'] = $email;
        return $this;
    }

    /**
     * Set customer phone number
     *
     * @param string $phone
     *
     * @return $this
     */
    public function setCustomerPhone($phone)
    {
        $this->params['customerPhone'] = $phone;
        return $this;
    }

    /**
     * Set list of paid goods
     *
     * @param CashItem[] $items
     *
     * @return $this
     */
    public function setCashItems($items)
    {
        $this->params['cashItems'] = base64_encode(
            json_encode(
                array_map(function ($item) {
                    /** @var CashItem $item */
                    return array(
                        'name'  => $item->getName(),
                        'count' => $item->getCount(),
                        'price' => $item->getPrice()
                    );
                }, $items)));

        return $this;
    }

    /**
     * Set callback URL
     *
     * @param string $backUrl
     * @return $this
     */
    public function setBackUrl($backUrl)
    {
        $this->params['backUrl'] = $backUrl;
        return $this;
    }

    /**
     * Call API
     *
     * @param $method
     * @param array $params
     *
     * @return object
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     */
    public function api($method, $params = array())
    {
        if (!in_array($method, $this->supportedUnitpayMethods)) {
            throw new UnexpectedValueException('Method is not supported');
        }

        if (isset($this->requiredUnitpayMethodsParams[$method])) {
            foreach ($this->requiredUnitpayMethodsParams[$method] as $rParam) {
                if (!isset($params[$rParam])) {
                    throw new InvalidArgumentException('Param '.$rParam.' is null');
                }
            }
        }

        $params['secretKey'] = $this->secretKey;
        if (empty($params['secretKey'])) {
            throw new InvalidArgumentException('SecretKey is null');
        }

        $requestUrl = self::API_URL . '?' . http_build_query([
                'method' => $method,
                'params' => $params
            ], null, '&', PHP_QUERY_RFC3986);

        $response = json_decode(file_get_contents($requestUrl));
        if (!is_object($response)) {
            throw new InvalidArgumentException('Temporary server error. Please try again later.');
        }

        return $response;
    }

    /**
     * Check request on handler from UnitPay
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     */
    public function checkHandlerRequest()
    {
        if (empty(request()->get('method'))) {
            throw new InvalidArgumentException('Method is null');
        }

        if (empty(request()->get('params'))) {
            throw new InvalidArgumentException('Params is null');
        }

        list($method, $params) = array(
            request()->get('method'),
            request()->get('params')
        );

        if (!in_array($method, $this->supportedPartnerMethods)) {
            throw new UnexpectedValueException('Method is not supported');
        }

        if (!isset($params['signature']) || $params['signature'] != $this->getSignature($params, $method)) {
            throw new InvalidArgumentException('Wrong signature');
        }

        /**
         * IP address check
         * @link http://help.unitpay.ru/article/67-ip-addresses
         */
        if (!in_array($this->getIp(), $this->supportedUnitpayIp)) {
            throw new InvalidArgumentException('IP address Error');
        }

        return true;
    }

    /**
     * Response for UnitPay if handle success
     *
     * @param $message
     *
     * @return string
     */
    public function getSuccessHandlerResponse($message)
    {
        return json_encode(array(
            "result" => array(
                "message" => $message
            )
        ));
    }

    /**
     * Response for UnitPay if handle error
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
            $this->checkHandlerRequest();

            list($method, $params) = array(
                request()->get('method'),
                request()->get('params')
            );

            if (!$order = Payment::find((int) $params['account'])) {
                throw new InvalidArgumentException('Order id not send. Error!');
            }

            // Very important! Validate request with your order data, before complete order
            if (
          (int) $params['orderSum'] != $order['sum'] ||
                $params['account'] !== $order['id']
            ) {
                // logging data and throw exception
                throw new InvalidArgumentException('Order Validation Error!');
            }

            switch ($method) {
                case 'check':
                    echo $this->getSuccessHandlerResponse('Check Success. Ready to pay.');
                    break;
                case 'pay':
                    $this->successPay($params);
                    echo $this->getSuccessHandlerResponse('Pay Success');
                    break;
                case 'error':
                    // Please log error text.
                    echo $this->getSuccessHandlerResponse('Error logged');
                    break;
            }
            // Oops! Something went wrong.
        } catch (Exception $e) {
            echo $this->getErrorHandlerResponse($e->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function successPay(array $params)
    {
        $order = Payment::select([
            'goods.commands as cmd',
            'payments.*',
        ])->where(['payments.id' => (int) $params['account']])
            ->leftJoin('goods', ['payments.goods = goods.name'])
            ->first();

        $cmd = str_replace('{user}', $order['username'], $order['cmd']);
        $cmd = explode('<br />', $cmd);

        if ($server = Server::find(['name' => $order['server']])) {
            $status = $this->sendCmd($server, $cmd);
        } else {
            foreach($server as $s) {
                $status = ($this->sendCmd($s, $cmd) > 1) ?: 1;
            }
        }

        return Payment::update([
            'response' => serialize($params),
            'pay_id' => $params['unitpayId'],
            'status' => $status,
        ])->where(['id' => $params['account']])->send();
    }

    public function sendCmd($server, $cmd)
    {
        $rcon = new \Rcon($server['host'], $server['port'], $server['password']);
        $status = 1;

        if (@$rcon->connect()) {
            foreach ($cmd as $command) {
                $rcon->sendCommand($command);
            }
        } else {
            $status = 2;
        }

        return $status;
    }
}