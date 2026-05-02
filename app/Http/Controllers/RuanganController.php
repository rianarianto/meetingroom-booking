<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\JenisRuangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RuanganController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataRuangan = Ruangan::all();
        return view('ruangan.index')->with([
            'dataRuangan' => $dataRuangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisRuangan = JenisRuangan::all();
        return view('ruangan.create')->with([
            'jenisRuangan'=>$jenisRuangan
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
        // $request->validate([
        //     'gambar' => 'mimes:png,jpg,jpeg|max:500'
        // ]);
            $data = $request->all();
            // if ($request->file('gambar') != '') {
            //     $namaGambarDanExtensi = $request->file('gambar')->getClientOriginalName();
            //     $namaGambar = pathinfo($namaGambarDanExtensi, PATHINFO_FILENAME);
            //     $extension = $request->file('gambar')->getClientOriginalExtension();
            //     $fileNameSimpan = $namaGambar.'.'.$extension;
            //     $path = $request->file('gambar')->storeAs('public/img', $fileNameSimpan);
            //     $data['gambar'] = $fileNameSimpan;
            // }

            Ruangan::create($data);
            return redirect()->route('ruangan.index');
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
        $item = Ruangan::findOrFail($id);
        $ruangan = Ruangan::all();
        $jenisRuangan = JenisRuangan::all();

        return view('ruangan.edit')->with([
            'item' => $item,
            'ruangans' => $ruangan,
            'jenisRuangan' => $jenisRuangan
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
        // $request->validate([
        //     'gambar' => 'mimes:png,jpg,jpeg|max:500'
        // ]);
            $data = $request->all();

            // $namaGambarDanExtensi = $request->file('gambar')->getClientOriginalName();
            // $namaGambar = pathinfo($namaGambarDanExtensi, PATHINFO_FILENAME);
            // $extension = $request->file('gambar')->getClientOriginalExtension();
            // $fileNameSimpan = $namaGambar.'.'.$extension;
            // $path = $request->file('gambar')->storeAs('public/img', $fileNameSimpan);
            // $data['gambar'] = $fileNameSimpan;

            $item = Ruangan::findOrFail($id);
            $item->update($data);
            return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ruangan::findOrFail($id);
        Booking::where('ruangan', $item['namaRuangan'])->delete();
        $item->delete();
        
        return redirect()->route('ruangan.index');
    }
}
