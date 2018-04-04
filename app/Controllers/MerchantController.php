<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 14:39
 */

namespace App\Controllers;

use App\Models\Goods;
use App\Models\Payment;
use App\Models\Server;
use Engine\Abstracts\Controller;

class MerchantController extends Controller
{

    /**
     * @param int $goods
     * @return bool|int
     */
    public function goodsRecount(int $goods)
    {
        if ($this->is_ajax() == false OR
            empty($this->request->post('user'))) {
            return http_response_code(500);
        }

        $goods = Goods::find($goods);
        $total = 0;
        if ($goods['count'] > 0 OR $goods['count'] < 0) {
            if ($goods['purchase'] > 0) {
                $user = htmlspecialchars($this->request->post('user'));
                $total = Payment::totalUserSum($user);
                if ($goods['price'] <= $total) {
                    return http_response_code(400);
                }
            }

            if ($this->merchant->status()) {
                echo sprintf('Купить за %s руб.', $goods['price'] - $total);
                return true;
            }
            
            return http_response_code(503);
        }

        return http_response_code(403);
    }

    public function handlePay()
    {
        return $this->merchant->handler();
    }

    public function buyed()
    {
        if ($this->is_ajax() == false OR
            empty($this->request->post('user')) &&
            empty($this->request->post('server')) &&
            empty($this->request->post('goods'))
        ) return http_response_code(404);


        $user =  htmlspecialchars($this->request->post('user'));
        $goods = Goods::find((int) $this->request->post('goods'));

        if ((int) $this->request->post('server') > 0) {
            $server = Server::find((int) $this->request->post('server'));
        }

        $total = 0;
        if ($goods['count'] > 0 OR $goods['count'] < 0) {
            if ($goods['purchase'] > 0) {
                $total = Payment::totalUserSum($user);
                if ($goods['price'] <= $total) {
                    return http_response_code(400);
                }
            }

            $orderSum = $goods['price'] - $total;
            $description = str_replace([
                '{goods}', '{name}', ], [
                $goods['name'], $user
            ], config('app.description_pay'));
            if ($goods['price'] < $total) {
                return http_response_code(400);
            }

            $account = Payment::insert([
                'username' => $user,
                'goods'        => $goods['name'],
                'server'        => $server['name'],
                'sum'            => $orderSum,
                'status'         => 0,
            ])->send();

            if ($this->merchant->status()) {
                echo $this->merchant->form($orderSum, $account, $description);
                return true;
            }
            
            return http_response_code(500);
        }

        return http_response_code(403);
    }

    public function gGoodsFServer(int $server)
    {
        if ($server > 0) {
            $goods = Goods::select([
                'categories.name as category', 'goods.id', 'goods.name', 'goods.price'
            ])->where(['goods.server_id' => $server])
                ->leftJoin('categories', [
                    'goods.categories_id = categories.id'
                ])->get(\PDO::FETCH_GROUP);
        } else {
            $goods = Goods::select([
                'categories.name as category', 'goods.id', 'goods.name', 'goods.price'
            ])->leftJoin('categories', [
                    'goods.categories_id = categories.id'
                ])->get(\PDO::FETCH_GROUP);
        }

        if (!$goods) {
            return http_response_code(403);
        }

        return view('app.components.goods_list', [
            'goods' => $goods
        ]);
    }
}