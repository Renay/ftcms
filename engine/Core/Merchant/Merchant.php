<?php
/**
 * All right reserved by Perfect Team.
 * Author class: Forbs
 * Contacts: http://mcperfects.com/
 */

namespace Engine\Core\Merchant;

use Setting;
use App\Models\Merchant as MerchModel;

class Merchant
{

    protected $di;
    protected $active;
    protected $data = [];
    protected $object = null;
    protected $pay = false;

    public function __construct($di)
    {
        $this->setDataMerchant();

        $this->active = Setting::get('merchant');
        $object = config("app.merchant.{$this->active}.repository");

        if (count($this->data)) {
            $this->pay = true;
            $this->object = new $object(...array_values($this->data));
        }
    }

    /**
     * @return bool $pay
     */
    public function status()
    {
        return $this->pay;
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @return $this
     */
    public function setDataMerchant()
    {
        $result = MerchModel::where([
            'name' => Setting::get('merchant')
        ])->first(\PDO::FETCH_OBJ);

        if ($data = @unserialize($result->data)) {
            $this->data = $data;
        }

        return $this;
    }

    /**
     * @param $sum
     * @param $orderId
     * @param $desc
     * @return mixed
     */
    public function form($sum, $orderId, $desc)
    {
        if (isset($this->object) && $this->object !== null) {
            return $this->object->form(...func_get_args());
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function handler()
    {
        return $this->object->handler();
    }
}