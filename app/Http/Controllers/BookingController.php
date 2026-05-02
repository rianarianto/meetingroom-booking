<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Ruangan;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Carbon\Laravel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBooking = DB::table('bookings')->orderBy('tanggalBooking', 'desc')->paginate(10);
        // $dataBooking['tanggalBooking'] 
        $dataWaktu = Time::all();
        return view('booking.index')->with([
            'dataBooking' => $dataBooking,
            'dataWaktu' => $dataWaktu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = Ruangan::all();
        $waktu = Time::all();

        return view('booking.create')->with([
            'ruangans' => $ruangan,
            'waktus' => $waktu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $dataBooking = Booking::all()->toArray();

        $mulai = Carbon::createFromTimeString($data['waktuMulai']);
        $selesai = Carbon::createFromTimeString($data['waktuSelesai']);

        if ($data['waktuMulai'] == $data['waktuSelesai']) {
            return redirect()->back()->with('alert', 'Waktu mulai dan selesai tidak boleh sama!')->withInput();
        }
        if ($data['waktuMulai'] >= $data['waktuSelesai']) {
            return redirect()->back()->with('alert', 'Waktu selesai tidak boleh lebih besar atau sama dengan waktu mulai!')->withInput();
        }

        foreach ($dataBooking as $booking) {
            $bookingMulai = Carbon::createFromTimeString($booking['waktuMulai']);
            $bookingSelesai = Carbon::createFromTimeString($booking['waktuSelesai']);

            if ($booking['ruangan'] == $data['ruangan']) {
                if ($booking['tanggalBooking'] == $data['tanggalBooking']) {
                    if ($mulai->between($bookingMulai, $bookingSelesai) || $selesai->between($bookingMulai, $bookingSelesai)) {
                        return redirect()->back()->with('alert', 'Ruangan telah dibooking pada waktu tersebut.')->withInput();
                    }
                }
            }
        }



        // if ($data['waktuMulai'] == $data['waktuSelesai']) {
        //     return redirect()->back()->with('alert', 'Waktu mulai dan selesai tidak boleh sama!');
        // }
        // if ($data['waktuMulai'] >= $data['waktuSelesai']) {
        //     return redirect()->back()->with('alert', 'Waktu selesai tidak boleh lebih besar atau sama dengan waktu mulai!');
        // }

        // foreach ($dataBooking as $booking) {
        //     if ($booking['ruangan'] == $data['ruangan']) {
        //         if ($booking['tanggalBooking'] == $data['tanggalBooking']) {
        //             if ($booking['waktuMulai'] <= $data['waktuMulai'] &&  $data['waktuMulai'] < $booking['waktuSelesai']) {
        //                 return redirect()->back()->with('alert', 'Ruangan telah dibooking pada waktu tersebut.');
        //             }
        //         }
        //     }
        // }



        $data['status'] = 'Booked';
        Booking::create($data);
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Booking::findOrFail($id);
        $ruangan = Ruangan::all();
        $waktu = Time::all();

        return view('booking.edit')->with([
            'item' => $item,
            'ruangans' => $ruangan,
            'waktus' => $waktu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $dataBooking = Booking::where('idBooking', '!=' , $id)->get()->toArray();
        
        $mulai = Carbon::createFromTimeString($data['waktuMulai']);
        $selesai = Carbon::createFromTimeString($data['waktuSelesai']);

        if ($data['waktuMulai'] == $data['waktuSelesai']) {
            return redirect()->back()->with('alert', 'Waktu mulai dan selesai tidak boleh sama!')->withInput();
        }
        if ($data['waktuMulai'] >= $data['waktuSelesai']) {
            return redirect()->back()->with('alert', 'Waktu selesai tidak boleh lebih besar atau sama dengan waktu mulai!')->withInput();
        }

        foreach ($dataBooking as $booking) {
            $bookingMulai = Carbon::createFromTimeString($booking['waktuMulai']);
            $bookingSelesai = Carbon::createFromTimeString($booking['waktuSelesai']);

            if ($booking['ruangan'] == $data['ruangan']) {
                if ($booking['tanggalBooking'] == $data['tanggalBooking']) {
                    if ($mulai->between($bookingMulai, $bookingSelesai) || $selesai->between($bookingMulai, $bookingSelesai)) {
                        return redirect()->back()->with('alert', 'Ruangan telah dibooking pada waktu tersebut.')->withInput();
                    }
                }
            }
        }




        $item = Booking::findOrFail($id);
        $item->update($data);
        return redirect()->route('booking.index');

        // foreach ($dataBooking as $booking) {
        //     if ($booking['idBooking'] == $data['idBooking']) {
        //         if ($booking['waktuMulai'] == $data['waktuMulai'] && $booking['waktuSelesai'] == $data['waktuSelesai']) {
        //             $item = Booking::findOrFail($id);
        //             $item->update($data);
        //             return redirect()->route('booking.index');
        //         } else {
        //             foreach ($dataBooking as $booking2) {
        //                 if ($booking2['waktuSelesai'] > $data['waktuMulai']) {
        //                     return redirect()->back()->with('alert', 'Ruangan telah dibooking pada waktu tersebut.');
        //                 }
        //             }
        //         }
        //     }
        // }

        // foreach ($dataBooking as $booking) {
        //     if ($booking['ruangan'] == $data['ruangan']) {
        //         if ($booking['tanggalBooking'] == $data['tanggalBooking']) {
        //             dd($booking['waktuMulai'] == $data['waktuMulai']);
        //             if ($booking['waktuMulai'] == $data['waktuMulai'] && $booking['waktuSelesai'] == $data['waktuSelesai']) {
        //                 $item = Booking::findOrFail($id);
        //                 $item->update($data);
        //                 return redirect()->route('booking.index');
        //             } else {
        //                 if ($booking['waktuSelesai'] > $data['waktuMulai']) {
        //                     return redirect()->back()->with('alert', 'Ruangan telah dibooking pada waktu tersebut.');
        //                 } else {
        //                     $item = Booking::findOrFail($id);
        //                     $item->update($data);
        //                     return redirect()->route('booking.index');
        //                 }
        //             }
        //         }
        //     }
        // }

        // $item = Booking::findOrFail($id);
        // $item->update($data);
        // return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Booking::findOrFail($id);
        $item->delete();

        return redirect()->route('booking.index');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $data = Booking::where('tanggalBooking', 'like', "%" . $cari . "%")
            ->orWhere('namaUser', 'like', "%" . $cari . "%")
            ->orWhere('divisi', 'like', "%" . $cari . "%")
            ->orWhere('ruangan', 'like', "%" . $cari . "%")
            ->orWhere('waktuMulai', 'like', "%" . $cari . "%")
            ->orWhere('keterangan', 'like', "%" . $cari . "%")
            ->paginate();

        $dataWaktu = Time::all();

        return view('booking.index')->with([
            'dataBooking' => $data,
            'dataWaktu' => $dataWaktu
        ]);
    }
}
