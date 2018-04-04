<?php

namespace App\Models;

use Engine\Abstracts\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function create($params)
    {
        $category = new Category(null);
        $category->name = $params['name'];
        $category->priority = $params['priority'];
        $category->server_id = $params['server_id'];
        return $category->save();
    }

    public function upd($params)
    {
        $category = new Category($params['id']);
        $category->name = $params['name'];
        $category->priority = $params['priority'];
        $category->server_id = $params['server_id'];
        $category->save();
    }

    public function getCategory($id)
    {
        return Category::find($id);
    }

    public function getInfoCategory($id)
    {
        return Category::select(['categories.*', 'servers.name as server',
                    Category::sub('goods', ['goods.id'])->where(['goods.categories_id = categories.id'])->as('goods_count')->build()
                ])->leftJoin('servers', [
                    'servers.id = categories.server_id'
                ])
                ->where(['categories.id' => $id])
                ->first();
    }

    public function pieChart()
    {
        return Category::select([
                    'count(goods.id) as y, categories.name'
                ])
                ->leftJoin('goods', [
                    'categories.id = goods.categories_id'
                ])
                ->groupBy(['categories.id'])
                ->get();
    }

    public function getServers()
    {
        return Server::all();
    }

    public function getCategories()
    {
        return Category::select(['categories.*',
                    'servers.name as server',
                    'count(goods.id) as goods_count'
                ])->leftJoin("servers", [
                    'servers.id = categories.server_id'
                ])->leftJoin("goods", [
                    'goods.categories_id = categories.id'
                ])->groupBy(['categories.id', 'servers.id'])
                ->orderBy(['id' => 'desc'])
                ->limit(10)
                ->get();
    }
}