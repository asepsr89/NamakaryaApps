{{-- @extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@extends('layouts.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Jumlah Debitur</h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h3 class="mt-0 round-inner">{{ $debitur }}</h3>
                                <p class="mb-0 text-muted">Total Debitur</p>
                            </div>
                        </div>
                        {{-- <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> <i class="mdi mdi-arrow-down"></i>
                                <span>5.26%</span>
                            </h6>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5>Rp.{{ number_format($plafond) }}</h5>
                                <p class="mb-0 text-muted">Total Plafond</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">$32874</h5>
                                <p class="mb-0 text-muted">Total Pencairan</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">$32874</h5>
                                <p class="mb-0 text-muted">Total Pending</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Jumlah Pengajuan</h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h3 class="mt-0 round-inner">{{ $debitur }}</h3>
                                <p class="mb-0 text-muted">Total Pengajuan</p>
                            </div>
                        </div>
                        {{-- <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> <i class="mdi mdi-arrow-down"></i>
                                <span>5.26%</span>
                            </h6>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5>Rp.{{ number_format($plafond) }}</h5>
                                <p class="mb-0 text-muted">Total Approve</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">$32874</h5>
                                <p class="mb-0 text-muted">Total On Progress</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">$32874</h5>
                                <p class="mb-0 text-muted">Total reject</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Jumlah Progress Slik</h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h3 class="mt-0 round-inner">{{ $slik }}</h3>
                                <p class="mb-0 text-muted">Total Sudah Slik</p>
                            </div>
                        </div>
                        {{-- <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> <i class="mdi mdi-arrow-down"></i>
                                <span>5.26%</span>
                            </h6>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-8 text-center align-self-center">
                            <div>
                                <h5 class="mt-0 round-inner">{{ $slikapprove }}</h5>
                                <p class="mb-0 text-muted">Total Approve</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">{{ $slikprogress }}</h5>
                                <p class="mb-0 text-muted">Total On Progress</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">{{ $slikreject }}</h5>
                                <p class="mb-0 text-muted">Total Reject</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success"> <i class="mdi mdi-arrow-up"></i>
                                <span>2.35%</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Line Chart</h4>
                    <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">A line chart is a way of
                        plotting data
                        points on a line. Often, it is used to show trend data, and the
                        comparison of two data sets.</p>

                    <canvas id="lineChart" height="300"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0 text-center">PENDAPATAN CABANG</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Nama Cabang</th>
                                    <th class="border-top-0">Total Pangajuan</th>
                                    <th class="border-top-0">Total Plafond</th>
                                    <th class="border-top-0">Approve</th>
                                    <th class="border-top-0">On Progress</th>
                                    <th class="border-top-0">Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cabang Bogor</td>
                                    <td>300</td>
                                    <td>Rp. 5,000,000,000</td>
                                    <td>100</td>
                                    <td>150</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Cabang Sukabumi</td>
                                    <td>300</td>
                                    <td>Rp. 5,000,000,000</td>
                                    <td>100</td>
                                    <td>150</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Cabang Purwakarta</td>
                                    <td>300</td>
                                    <td>Rp. 5,000,000,000</td>
                                    <td>100</td>
                                    <td>150</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Cabang Tangcity</td>
                                    <td>300</td>
                                    <td>Rp. 5,000,000,000</td>
                                    <td>100</td>
                                    <td>150</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Cabang Bandung</td>
                                    <td>300</td>
                                    <td>Rp. 5,000,000,000</td>
                                    <td>100</td>
                                    <td>150</td>
                                    <td>50</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
@push('scripts')
@endpush
