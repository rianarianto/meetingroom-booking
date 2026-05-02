@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Membuat Daftar Peminjaman') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

@if(session()->has('alert'))
    <div class="alert alert-danger">
        {{ session()->get('alert') }}
    </div>
@endif


<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gold text-uppercase mb-3">Tambah Data Peminjaman Terbaru</div>
                        <form action="{{ route('booking.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama</label>
                                        <input type="text" name="namaUser" id="namaUser" value="{{ old('namaUser')}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="divisi" class="form-control-label">Divisi</label>
                                        <input type="text" name="divisi" id="divisi" value="{{ old('divisi')}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="ruangan" class="form-control-label">Ruangan</label>
                                        <select name="ruangan" id="ruangan" class="form-control">
                                            
                                            @foreach ($ruangans as $ruangan)
                                                <option value="{{ $ruangan->namaRuangan }}">{{ $ruangan->namaRuangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group pt-1">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan')}}" class="form-control" required>
                                    </div>



                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal" class="form-control-label">Tanggal</label>
                                        <input class="form-control" value="{{ old('tanggalBooking') }}" type="date" name="tanggalBooking" id="tanggalBooking" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="waktuMulai" class="form-control-label">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="waktuMulai" id="waktuMulai" value="{{ old('waktuMulai') }}" placeholder="--:--" required>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="waktuMulai" class="form-control-label">Waktu Mulai</label>
                                        <select name="waktuMulai" id="waktuMulai" class="form-control">
                                            <option value="Pilih Waktu Mulai">Pilih Waktu Mulai</option>
                                            @foreach ($waktus as $waktu)
                                                <option value="{{ $waktu->idWaktu }}">{{ $waktu->waktu }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="waktuSelesai" class="form-control-label">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="waktuSelesai" id="waktuSelesai" value="{{ old('waktuSelesai') }}" placeholder="--:--" required>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="waktuSelesai" class="form-control-label">Waktu Selesai</label>
                                        <select name="waktuSelesai" id="waktuSelesai" class="form-control">
                                            <option value="Pilih Waktu Selesai">Pilih Waktu Selesai</option>
                                            @foreach ($waktus as $waktu)
                                                <option value="{{ $waktu->idWaktu }}">{{ $waktu->waktu }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                        <button class="btn btn-gold btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection