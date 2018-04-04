<?php

namespace App\Controllers\Admin;

use App\Models\Settings;

class SettingController extends AdminController
{

    public function index()
    {
        return view('admin.settings.view',
            Settings::select(['key_field', 'value'])->get(\PDO::FETCH_KEY_PAIR)
        );
    }

    public function save()
    {
        foreach($this->request->post as $key => $setting) {
            \Setting::set($key, $setting);
        }
    }

    public function validate()
    {
        return $this->validator->make($this->request->post, [

        ])->validate();
    }
}