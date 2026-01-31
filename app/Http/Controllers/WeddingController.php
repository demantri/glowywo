<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WeddingController extends Controller
{
    public function index() 
    {
        $portfolio = DB::table('events')
            ->where('is_active', true)
            ->get();

        $clients = DB::table('client_events')
            ->where('is_active', true)
            ->get();

        $settings = DB::table('website_settings')->first();

        return view('new_index', compact('settings'));
    }
}
