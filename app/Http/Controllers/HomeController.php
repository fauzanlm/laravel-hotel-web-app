<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roomTypes = RoomType::all();
        $hotelFacilities = HotelFacility::all();
        if (!Auth::check()) {
            return view('landing', compact('roomTypes', 'hotelFacilities'));
        }elseif(auth()->user()->role == 'admin'){
            return redirect()->route('admin.home');
        }
        elseif(auth()->user()->role == 'resepsionis'){
            return view('receptionis.home');
        }
        elseif(auth()->user()->role == 'customer'){
            return view('landing', compact('roomTypes', 'hotelFacilities'));
        }
    }

    public function admin()
    {
        return view('admin.home');
    }

    public function receptionis()
    {
        return view('receptionis.home');
    }
}
