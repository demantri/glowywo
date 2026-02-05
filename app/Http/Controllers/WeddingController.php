<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\ServiceSection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WeddingController extends Controller
{
    public function index()
    {
        $homepage = Homepage::with(['images' => function ($q) {
            $q->orderBy('sort_order');
        }])->first();

        $identity = DB::table('identities')->first();

        // $services = DB::table('services')->first();

        $serviceSection = ServiceSection::with(['services' => function ($q) {
            $q->orderBy('sort_order');
        }])->first();

        $portfolio = Portfolio::with('images')->first();

        $platform = DB::table('platforms')->first();

        $settings = DB::table('website_settings_wo')->first();

        return view('new_index', compact(
            'homepage',
            'identity',
            'serviceSection',
            'portfolio',
            'platform',
            'settings',
        ));
    }
}
