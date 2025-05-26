<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SportActivityService;
use Illuminate\Http\Request;

class SportActivityController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['type', 'price_from', 'price_to', 'location', 'group_type', 'start_date', 'is_active']);
        return response()->json((new SportActivityService())->getFiltered($filters));
    }
}
