@extends('layouts.main')
@section('title') @lang('Data Peminjam Kelompok - BUMDes Bangun Mulyo') @endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            SI BUMDes Bangun Mulyo
        @endslot
        @slot('li_2')
            Data Peminjam Kelompok
        @endslot
        @slot('li_2_link')
            {{ route('peminjam-kelompok.index') }}
        @endslot
        @slot('title')
            {{ $title }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col">
            <div class="h-100">
                {{-- <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column float-end">
                            <button type="button" class="btn btn-success btn-lg btn-label waves-effect waves-light mx-2" data-bs-toggle="modal" data-bs-target="#createDataPeminjamKelompok">
                                <i class="ri-menu-add-line label-icon align-middle fs-16 me-2"></i>
                                Tambah Anggota
                            </button>
                        </div>
                    </div>
                    <!--end col-->
                </div> --}}
                <!--end row-->
                @include('dashboard.admin.anggota-kelompok.modals.create')
                <div class="row">
                    <div class="col-lg-12">
                        @include('dashboard.admin.pinjaman.modals.create')
                        @if($pinjaman->count() > 0)
                            @include('dashboard.admin.pinjaman.modals.edit')
                        @endif
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h3 class="card-title mb-0 flex-grow-1">Detail Pinjaman Kelompok {{ $kelompok_name }}</h3>
                                <div class="flex-shrink-0">
                                    <div>
                                        @if($pinjaman->count() == 0)
                                            <button type="button" class="btn btn-success btn-sm shadow-none"  data-bs-toggle="modal" data-bs-target="#createDataPinjaman">
                                                <i class="ri-pencil-line"></i>
                                                Atur Data
                                            </button>
                                        @elseif($pinjaman->count() > 0)
                                            <button type="button" class="btn btn-success btn-sm shadow-none"  data-bs-toggle="modal" data-bs-target="#editDataPinjaman">
                                                <i class="ri-pencil-line"></i>
                                                Ubah Data
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <div data-simplebar style="max-height: 405px;">
                                        <table class="table table-borderless align-middle">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium">
                                                        Tanggal Pinjaman
                                                    </td>
                                                    <td> : </td>
                                                    <td>
                                                        <h6 class="fs-15 mb-1">{{ $pinjaman->count() == 0 ? 'Belum Diatur' : date('d-m-Y', strtotime($pinjaman->first()->tgl_pinjaman)) }}</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">
                                                        Periode Pinjaman
                                                    </td>
                                                    <td> : </td>
                                                    <td>
                                                        <h6 class="fs-15 mb-1">{{ $pinjaman->count() == 0 ? 'Belum Diatur' : $pinjaman->first()->periode_pinjaman }}</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">
                                                        Jumlah Pinjaman
                                                    </td>
                                                    <td> : </td>
                                                    <td>
                                                        <h6 class="fs-15 mb-1">
                                                            @if($pinjaman->count() == 0)
                                                                Belum Diatur
                                                            @elseif($pinjaman->count() > 0)
                                                                @currency($pinjaman->first()->jumlah_pinjaman)
                                                            @endif
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">
                                                        Keperluan Pinjaman
                                                    </td>
                                                    <td> : </td>
                                                    <td>
                                                        <h6 class="fs-15 mb-1">{{ $pinjaman->count() == 0 ? 'Belum Diatur' : $pinjaman->first()->keperluan }}</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">
                                                        Keterangan Pinjaman
                                                    </td>
                                                    <td> : </td>
                                                    <td>
                                                        <h6 class="fs-15 mb-1">{{ $pinjaman->count() == 0 ? 'Belum Diatur' :  ($pinjaman->first()->keterangan == 1 ? 'Lunas' : 'Belum Lunas') }}</h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col">
            <div class="h-100">
                <!--end row-->
                @include('dashboard.admin.anggota-kelompok.modals.create')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h3 class="card-title mb-0 flex-grow-1">Daftar Anggota Kelompok {{ $kelompok_name }}</h3>
                                <div class="flex-shrink-0">
                                    <div>
                                        <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#createDataAnggotaKelompok">
                                            <i class="ri-menu-add-line label-icon align-middle fs-16 me-2"></i>
                                            Tambah Anggota
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama Anggota</th>
                                        <th>Jabatan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>No HP</th>
                                        <th>Pekerjaan</th>
                                        <th>Jaminan</th>
                                        <th>Nilai Jaminan</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($anggotas as $anggota)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$anggota->nik}}
                                            </td>
                                            <td>
                                                {{$anggota->nama}}
                                            </td>
                                            <td>
                                                {{$anggota->jabatan->nama_jabatan}}
                                            </td>
                                            <td>
                                                {{$anggota->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan'}}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($anggota->tgl_lahir)->diffInYears(\Carbon\Carbon::now())}} Tahun
                                            </td>
                                            <td>
                                                {{$anggota->noHP}}
                                            </td>
                                            <td>
                                                {{$anggota->pekerjaan}}
                                            </td>
                                            <td>
                                                {{$anggota->jaminan}}
                                            </td>
                                            <td>
                                                {{$anggota->nilai_jaminan}}
                                            </td>
                                            <td>
                                                {{$anggota->alamat}}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center fw-medium">
                                                    <a class="btn btn-sm btn-soft-primary mr-1" href="{{ route('pinjaman-anggota.index', ['kelompok' => $kelompok, 'anggota' => $anggota->id]) }}">
                                                        <i class="ri-group-2-fill"></i> <span >@lang('Detail Pinjaman')</span>
                                                    </a>
                                                    <button class="btn btn-sm btn-soft-warning mx-1"  data-bs-toggle="modal" data-bs-target="#editDataAnggotaKelompok{{$anggota->id}}">
                                                        <i class="ri-pencil-line"></i> <span >@lang('Ubah')</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-soft-danger ml-1" data-bs-toggle="modal" data-bs-target="#deleteDataAnggotaKelompok{{$anggota->id}}">
                                                        <i class="ri-delete-bin-line"></i> <span >@lang('Hapus')</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('dashboard.admin.anggota-kelompok.modals.edit')
                                        @include('dashboard.admin.anggota-kelompok.modals.delete')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
