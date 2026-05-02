@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create Room') }}</h1>

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
                        <div class="text-xs font-weight-bold text-gold text-uppercase mb-3">Tambah Data Ruangan</div>
                        <form action="{{ route('ruangan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama Ruangan</label>
                                        <input type="text" name="namaRuangan" id="namaRuangan"
                                            value="{{ old('namaRuangan')}}" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="jenisRuangan" class="form-control-label">Jenis Ruangan</label>
                                        <div class="row">
                                            <div class="col">
                                                <select name="jenisRuangan" id="ruangan" class="form-control">
                                            
                                                    @foreach ($jenisRuangan as $jenis)
                                                        <option value="{{ $jenis->jenisRuangan }}">{{ $jenis->jenisRuangan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button style="padding: 10px" class="btn btn-gold btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="jenisRuangan" class="form-control-label">Jenis Ruangan</label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="jenisRuangan" id="jenisRuangan"
                                                    value="{{ old('jenisRuangan')}}" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <button style="padding: 10px" class="btn btn-gold btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                     --}}


                                    



                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="lokasiRuangan" class="form-control-label">Lokasi Ruangan</label>
                                        <input class="form-control" type="text" name="lokasiRuangan"
                                            value="{{ old('lokasiRuangan')}}" id="lokasiRuangan" required>
                                    </div>

                                    <div class="form-group pt-1">
                                        <label for="kapasitasRuangan" class="form-control-label">Kapasitas
                                            Ruangan</label>
                                        <input type="text" name="kapasitasRuangan" id="kapasitasRuangan"
                                            value="{{ old('kapasitasRuangan')}}" class="form-control" required>
                                    </div>

                                    {{-- <div class="form-group pt-1">
                                        <label for="gambar" class="form-control-label">Gambar Ruangan</label>
                                        <input type="file" name="gambar" id="gambar" value="{{ old('gambar')}}"
                                            class="form-control">
                                        <label for="">Tipe file : png/jpg/jpeg dan max 500kb.</label>
                                        @if($errors->any())
                                        <label style="color: red;">{{$errors->first()}}</label>
                                        @endif
                                    </div> --}}


                                    {{-- <div class="form-group">
                                        <label for="waktuSelesai" class="form-control-label">Waktu Selesai</label>
                                        <select name="waktuSelesai" id="waktuSelesai" class="form-control">
                                            @foreach ($waktus as $idWaktu)
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


    <!-- modal add data-->
    <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <form name="frm_add" id="frm_add" class="form-horizontal" action="{{  route('jenisRuangan.store')  }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jenis Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label class="col-lg-5 control-label">Jenis Ruangan</label>
                            <div class="col-lg-10"><input type="text" name="jenisRuangan" placeholder="Jenis Ruangan"
                                    class="form-control"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection