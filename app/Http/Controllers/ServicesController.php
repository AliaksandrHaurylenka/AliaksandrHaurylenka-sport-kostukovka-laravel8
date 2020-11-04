<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::whereNotNull('price')->whereNull('price_the_evening')->get();
        $others = Service::whereNotNull('price_other')->get();
        $services_day_evening = Service::whereNotNull('price_the_evening')->get();
        $services_season_ticket_5_10 = Service::whereNotNull('price_5_lessons')->whereNotNull('price_10_lessons')->get();
        $services_season_ticket_10 = Service::whereNull('price_5_lessons')->whereNotNull('price_10_lessons')->get();
        return view('site.services', compact('services', 'services_day_evening', 'services_season_ticket_5_10', 'services_season_ticket_10', 'others'));
    }
}
