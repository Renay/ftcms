<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Goods;

class CategoriesController extends AdminController
{
    public function index()
    {
        return view('admin.categories.view', [
            'title' => 'Категории',
            'categories' => (new Category)->getCategories(),
            'servers'    => (new Category)->getServers(),
            'pieChart'   => (new Category)->pieChart()
        ]);
    }

    public function edit($id)
    {
        if (!getallheaders()['X-Requested-With'])
            return redirect('admin/categories');

        return view('admin.categories.edit', array_merge((new Category)->getCategory($id), [
            'servers'    => (new Category)->getServers(),
        ]));
    }

    public function create()
    {
        $id = ($category = new Category(null))->create($this->request->post);
        return view('admin.categories.category',
            $category->getInfoCategory($id)
        );
    }

    public function update()
    {
        ($category = new Category)->upd($this->request->post);
        return view('admin.categories.category',
            $category->getInfoCategory($this->request->post('id'))
        );
    }

    public function delete()
    {
        if (sizeof(Goods::where(['categories_id' => $this->request->post('id')])->first())) {
            return http_response_code(403);
        }

        return Category::delete()->where([
            'id' => $this->request->post('id')
        ])->send();
    }
}