<?php
/**
 * Created by PhpStorm.
 * User: Forbs
 * Date: 13.11.2017
 * Time: 16:57
 */

namespace App\Controllers\Admin;

use App\Models\Merchant;

class MerchantController extends AdminController
{
    public function index()
    {
        return view('admin.merchant.view', [
            'merchlist' => Merchant::select(['name', 'data'])
                ->get(\PDO::FETCH_KEY_PAIR)
        ]);
    }

    public function edit($merchant)
    {
        $params = $this->request->post('merchant');
        if (!empty($params)) {
            if (config("app.merchant.". strtolower($merchant))) {
                return Merchant::insert([
                    'name' => $merchant, 
                    'data' => serialize($params)
                ])->onDuplicate()->send();
            }
            return http_response_code(404);
        }

        return http_response_code(403);
    }
}