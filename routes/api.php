<?php

use Illuminate\Support\Facades\Route;
use App\Models\Availability;

Route::get('/monitors/{monitor}/availabilities', function($monitorId) {
    $availabilities = Availability::where('monitor_id', $monitorId)->get();
    return response()->json($availabilities);
});