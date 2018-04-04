<?php

namespace App\Models;

use Engine\Abstracts\Model;

class Dashboard extends Model
{

    /**
     * @return array
     */
    public function getIncomeToday()
    {
        return Payment::select([
                    'sum(sum) as sum',
                    'count(id) as count'
                ])
                ->where([
                    "created_at > CURDATE()",
                    "status IN ('1', '2')"
                ])
                ->first();
    }


    /**
     * @return array
     */
    public function pieChart()
    {
        return Payment::select([
                    'count(id) as y', 'goods as name'
                ])
                ->where(["created_at > now() - interval 7 DAY"])
                ->where(["status IN ('1', '2')"])
                ->groupBy(['goods'])
                ->get();
    }

    /**
     * @return mixed
     */
    public function getOrdersToday()
    {
        return Payment::select([
                    'count(id) as count'
                ])
                ->where(["created_at > now() - interval 1 DAY"])
                ->where(['status' => 0])
                ->first();
    }

    /**
     * @return array
     */
    public function getWeekData()
    {
        return Payment::select([
                        "count(id) as count", "date_format(created_at, '%d.%m') as date"
                    ])
                    ->where(["created_at > now() - interval 7 DAY"])
                    ->where(["status IN ('1', '2')"])
                    ->groupBy(['date'])
                    ->get();
    }

    /**
     * @return array
     */
    public function lineChart()
    {
        $data = [];
        for($i = -6; $i <= 0; $i++) {
            if (! $data[date('d.m', strtotime("{$i} days"))]) {
                  $data[date('d.m', strtotime("{$i} days"))] = 0;
            }
        }

        foreach($week = $this->getWeekData() as $w) {
            $data[$w['date']] = $w['count'];
        }

        return $data;
    }
}