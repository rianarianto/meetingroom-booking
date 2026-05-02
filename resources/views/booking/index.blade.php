@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Booking List') }}</h1>

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


{{-- <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                        href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images
                    that you can use completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
            </div>
        </div>

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor
                    page performance. Custom CSS classes are used to create custom components and custom utility
                    classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework,
                    especially the utility classes.</p>
            </div>
        </div>

    </div>
</div> --}}

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gold text-uppercase mb-1">Data Booking</div>
                        <div class="" style="overflow-x: auto">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @if (Auth::user() != '')
                                            <th>ID Booking</th>
                                        @endif
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Ruangan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        @if (Auth::user() != '')
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @forelse ($dataBooking as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @if (Auth::user() != '')
                                            <td>{{ $item->idBooking }}</td>
                                        @endif
                                        <td>{!! date('D, d-m-Y', strtotime($item->tanggalBooking)) !!}</td></td>
                                        <td>{{ $item->namaUser }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td>{{ $item->ruangan }}</td>
                                        <td>
                                            {{ $item->waktuMulai }}
                                            {{-- @foreach ($dataWaktu as $datawaktu)
                                            @if ($item->waktuMulai == $datawaktu->idWaktu)
                                            {{ $datawaktu->waktu }}
                                            @endif
                                            @endforeach --}}
                                        <td>
                                            {{ $item->waktuSelesai }}
                                            {{-- @foreach ($dataWaktu as $datawaktu)
                                            @if ($item->waktuSelesai == $datawaktu->idWaktu)
                                            {{ $datawaktu->waktu }}
                                            @endif
                                            @endforeach --}}
                                        </td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->status }}</td>
                                        @if (Auth::user() != '')
                                        <td>
                                            <a style="margin: 2px" href="{{route('booking.edit', $item->idBooking)}}"
                                                class="btn btn-sm btn-gold" title="Update"><i class="fa fa-pencil-alt"
                                                    title="Update"></i></a>
                                            {{-- <a href="{{ route('booking.destroy', $item->idBooking) }}"
                                                class="btn btn-sm btn-gold" title="Delete"><i class="fa fa-trash"
                                                    title="Delete"></i></a> --}}
                                            <form action="{{ route('booking.destroy', $item->idBooking) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button style="margin: 2px" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-trash" title="Delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif


                                    </tr>
                                    @empty
                                    <tr>
                                        <th class="text-center" colspan="9">Tidak Ada Data</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $dataBooking->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection