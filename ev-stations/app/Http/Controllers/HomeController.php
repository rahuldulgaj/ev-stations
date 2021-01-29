<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evstations;
use App\ChargingStations;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // view('homepage');
        $chargingstations= ChargingStations::paginate(5);

        $mapShops = $chargingstations->makeHidden(['status', 'created_at', 'updated_at', 'deleted_at', 'images']);

        $latitude = $chargingstations->count() && (request()->filled('category') || request()->filled('search')) ? $chargingstations->average('latitude') : 51.5073509;
        $longitude = $chargingstations->count() && (request()->filled('category') || request()->filled('search')) ? $shops->average('longitude') : -0.12775829999998223;
        return view('homepage', compact( 'chargingstations', 'mapShops', 'latitude', 'longitude'));

    }
}
