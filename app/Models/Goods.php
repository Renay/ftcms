<?php

namespace App\Models;

use Engine\Abstracts\Model;

class Goods extends Model
{
    public function getCategories()
    {
        return Category::all();
    }

    public function getServers()
    {
        return Server::all();
    }

    public function getInfoProduct($id)
    {
        return Goods::select(["goods.*",
            'categories.name as category',
            'servers.name as server',
        ])->where([
            'goods.id' => $id
        ])->leftJoin("categories", [
            'categories.id = goods.categories_id'
        ])->leftJoin("servers", [
            'servers.id = goods.server_id'
        ])->first();
    }

    public function getGoods()
    {
        return Goods::select([
            'goods.*', 'categories.name as category',
            'servers.name as server'
        ])->leftJoin("categories", [
            'categories.id = goods.categories_id'
        ])->leftJoin("servers", [
            'servers.id = goods.server_id'
        ])->orderBy(['id' => 'desc'])
            ->get();
    }
}