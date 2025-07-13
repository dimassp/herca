<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function getCommission() {
        $data = Marketing::ApiGetCommission()->toArray();
        dd($data);
        return [
            "message" => "Hello world"
        ];
    }
}
