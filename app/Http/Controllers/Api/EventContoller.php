<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventContoller extends Controller
{
    public function index()
    {
        $results = Event::all();
        return response()->json([
            "success" => true,
            "results" => $results
        ]);
    }
}
