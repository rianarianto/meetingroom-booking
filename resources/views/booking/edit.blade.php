@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit Booking') }}</h1>

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


<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gold text-uppercase mb-3">Edit Data Booking</div>
                        <form action="{{ route('booking.update', $item->idBooking) }}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                
                                <input type="hidden" name="idBooking" id="idBooking" value="{{ $item->idBooking}}">
                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama</label>
                                        <input type="text" name="namaUser" id="namaUser" value="{{ old('namaUser') ? old('namaUser') : $item->namaUser}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="divisi" class="form-control-label">Divisi</label>
                                        <input type="text" name="divisi" id="divisi" value="{{ old('divisi') ? old('divisi') : $item->divisi}}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="ruangan" class="form-control-label">Ruangan</label>
                                        <select name="ruangan" id="ruangan" class="form-control">
                                            
                                            @foreach ($ruangans as $ruangan)
                                                <option value="{{ $ruangan->namaRuangan }}" {{ $ruangan->namaRuangan == $item->ruangan ? 'selected' :''  }}>{{ $ruangan->namaRuangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') ? old('keterangan') : $item->keterangan}}" class="form-control" required>
                                    </div>                                    



                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal" class="form-control-label">Tanggal</label>
                                        <input value="{{$item->tanggalBooking}}" class="form-control" type="date" name="tanggalBooking" id="tanggalBooking" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="waktuMulai" class="form-control-label">Waktu Mulai</label>
                                        <input type="time" class="form-control" name="waktuMulai" id="waktuMulai" placeholder="--:--" value="{{$item->waktuMulai}}" required>
                                        {{-- <select name="waktuMulai" id="waktuMulai" class="form-control">
                                            @foreach ($waktus as $waktu)
                                                <option value="{{ $waktu->idWaktu }}" {{ $waktu->idWaktu == $item->waktuMulai ? 'selected' :''  }}>{{ $waktu->waktu }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="waktuSelesai" class="form-control-label">Waktu Selesai</label>
                                        <input type="time" class="form-control" name="waktuSelesai" id="waktuSelesai" placeholder="--:--" value="{{$item->waktuSelesai}}" required>
                                        {{-- <select name="waktuSelesai" id="waktuSelesai" class="form-control">
                                            @foreach ($waktus as $waktu)
                                                <option value="{{ $waktu->idWaktu }}" {{ $waktu->idWaktu == $item->waktuSelesai ? 'selected' :''  }}>{{ $waktu->waktu }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
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
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection