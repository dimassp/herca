<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function getCommission() {
        $data = Marketing::ApiGetCommission()->toArray();

        return $this->api_response(200, "Data successfully retrieved", $data);
    }
}
