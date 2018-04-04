<?php

namespace App\Models;

use Engine\Abstracts\Model;

class Payment extends Model {

    public static function totalUserSum(string $user)
    {
        return self::select(['SUM(sum) as sum'])
            ->where(['username' => $user, 'status' => 1])
            ->first(\PDO::FETCH_OBJ)->sum;
    }

}