<?php

namespace App\Controllers\Admin;

use App\Models\Goods;

class GoodsController extends AdminController
{
    public function index()
    {
        return view('admin.goods.view', [
            'goods'      => (new Goods)->getGoods(),
            'servers'    => (new Goods)->getServers(),
            'categories' => (new Goods)->getCategories(),
        ]);
    }

    public function edit($id)
    {
        if (!getallheaders()['X-Requested-With'])
            return redirect('admin/goods');

        return view('admin.goods.edit',
            array_merge(Goods::find($id), [
                'servers'    => (new Goods)->getServers(),
                'categories' => (new Goods)->getCategories(),
        ]));
    }

    /**
     * @return int
     */
    public function create()
    {
        if ($this->validate() == false) {
            return http_response_code(404);
        }

        $goods = new Goods($this->request->post('id'));
        $goods->name = $this->request->post('name');
        $goods->price = $this->request->post('price');
        $goods->count = $this->request->post('count');
        $goods->priority = $this->request->post('priority');
        $goods->purchase = $this->request->post('purchase');
        $goods->server_id = $this->request->post('server_id');
        $goods->categories_id = $this->request->post('categories_id');
        $goods->commands = nr2br($this->request->post('commands'));

        return view('admin.goods.product',
            $goods->getInfoProduct($goods->save())
        );
    }

    public function desc($id)
    {
        if (!getallheaders()['X-Requested-With'])
            return redirect('admin/goods');

        return view('admin.goods.desc',
            Goods::select([
                'id', 'name', 'description'
        ])->where(['id' => $id])->first());
    }

    public function upDesc()
    {
        return Goods::update([
            'description' => nr2br($this->request->post('description'))
        ])->where(['id' => (int) $this->request->post('id')])->send();
    }

    public function update()
    {
        if ($this->validate() !== true) {
            return http_response_code(404);
        }
        
        $goods = new Goods($this->request->post('id'));
        $goods->name = $this->request->post('name');
        $goods->price = $this->request->post('price');
        $goods->count = $this->request->post('count');
        $goods->priority = $this->request->post('priority');
        $goods->purchase = $this->request->post('purchase');
        $goods->categories_id = $this->request->post('categories_id');
        $goods->commands = nr2br($this->request->post('commands'));

        if (is_int($this->request->post('server_id')) && $this->request->post('server_id') > 0) {
            $this->server_id = $this->request->post('server_id');
        }
        
        $goods->save();

        return view('admin.goods.product',
            $goods->getInfoProduct($this->request->post('id'))
        );
    }

    public function delete()
    {
        if (Goods::delete()->where([
            'id' =>$this->request->post('id')
        ])->send() === false) {
            return http_response_code(404);
        }
    }

    public function validate()
    {
        return $this->validator->make(
            $this->request->post, [
                'name' => 'min:2',
                'price' =>'is_abs',
                'count' =>'num',
                'priority' =>'is_abs',
                'purchase' =>'is_abs',
                'categories_id' =>'num',
                'commands' =>'min:5',
        ])->validate();
    }
}