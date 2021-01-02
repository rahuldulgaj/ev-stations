<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evstations;

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
        $evstations= Evstations::paginate(5);
        $mapShops = $evstations->makeHidden(['active', 'created_at', 'updated_at', 'deleted_at', 'created_by_id', 'photos', 'media']);
        $latitude = $evstations->count() && (request()->filled('category') || request()->filled('search')) ? $evstations->average('latitude') : 51.5073509;
        $longitude = $evstations->count() && (request()->filled('category') || request()->filled('search')) ? $shops->average('longitude') : -0.12775829999998223;
        return view('homepage', compact( 'evstations', 'mapShops', 'latitude', 'longitude'));

    }
}
