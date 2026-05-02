<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

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
        $dataBooking = Booking::distinct() -> latest() -> take (5) -> get();
        $totalBooking = Booking::count();
        $totalRuangan  = Ruangan::count();
        $dataWaktu = Time::all();
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home')->with([
           'dataBooking' => $dataBooking, 
           'totalBooking' => $totalBooking, 
           'totalRuangan' => $totalRuangan, 
           'dataWaktu' => $dataWaktu, 
           'widget' => $widget
        ]);
    }
}
