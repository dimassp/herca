<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Marketing extends Model
{
    public static function ApiGetCommission()
    {
        $data = Marketing::query()
            ->leftJoin('sales as s', 's.marketing_id', '=', 'marketings.id')
            ->select(
                DB::raw('SUM(s.total_balance) as Omzet'),
                'marketing_id',
                DB::raw('MAX(marketings.name) as Marketing'),
                DB::raw("TO_CHAR(date, 'YYYY-MM') as Tahun_Bulan"),
                DB::raw(
                    "CASE 
                        WHEN SUM(s.total_balance) < 100000000 THEN '0%' 
                        WHEN SUM(s.total_balance) >= 100000000 AND SUM(s.total_balance) < 200000000 THEN '2.5%' 
                        WHEN SUM(s.total_balance) >= 200000000 AND SUM(s.total_balance) < 500000000 THEN '5%'
                        WHEN SUM(s.total_balance) >= 500000000 THEN '10%'
                        ELSE '0%' 
                    END as Komisi"
                ),
                DB::raw(
                    'SUM(s.total_balance) *
                    (
                        CASE 
                        WHEN SUM(s.total_balance) < 100000000 THEN 0 
                        WHEN SUM(s.total_balance) >= 100000000 AND SUM(s.total_balance) < 200000000 THEN 0.025 
                        WHEN SUM(s.total_balance) >= 200000000 AND SUM(s.total_balance) < 500000000 THEN 0.05
                        WHEN SUM(s.total_balance) >= 500000000 THEN 0.1
                        ELSE 100 END
                    ) as commission_amount
                    '
                ),
            )
            ->groupBy('marketing_id', DB::raw("TO_CHAR(date, 'YYYY-MM')"))
            ->get();

        return $data;
    }
}
