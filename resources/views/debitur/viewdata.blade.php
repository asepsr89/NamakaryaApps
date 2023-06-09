@extends('layouts.master')

<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card m-b-30 card-body">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h4>History Pengajuan</h4>
                            <ul class="timeline">
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Cabang Namastra Bogor</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Pengajuan Kredit</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p> kirim pengajuan slik</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Bank Mitra</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Proses Slik</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>hasil slik kirim cabang</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Cabang Namastra Bogor</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Kirim proses input fasilitas</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Proses Fasilitas Ceking</p>
                                </li>
                                <li>
                                    <a target="_blank" href="https://www.totoprayogo.com/#">Namastra Pusat</a>
                                    <a href="#" class="float-right">21 March, 2014</a>
                                    <p>Pangajuan kredit/Fasilitas Approve</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body text-center">
                            <h3 class="col mb-5">DATA PENGAJUAN FASILITAS PINJAMAN</h3>

                            @foreach ($data as $fasilitas)
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-2"></td>
                                                <td align="right">Tanggal Pengajuan:
                                                    <b>{{ date('d F Y', strtotime($fasilitas->tglPengajuan)) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>No Debitur</b></td>
                                                <td>{{ $fasilitas->noDebitur }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>No Fasilitas</b></td>
                                                <td>{{ $fasilitas->noFasilitas }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>Nama Debitur</b></td>
                                                <td>{{ $fasilitas->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>Tempat Lahir</b></td>
                                                <td>{{ $fasilitas->tmpLahir }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>Tanggal Lahir</b></td>
                                                <td>{{ date('d F Y', strtotime($fasilitas->tglLahir)) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>Alamat</b></td>
                                                <td>{{ $fasilitas->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-2"><b>No Telepon</b></td>
                                                <td>{{ $fasilitas->tlp }}</td>
                                            </tr>
                                        </tbody>
                                        <div align="right" class="mb-5">
                                            @if ($fasilitas->status == 8)
                                                <span class="badge badge-success">
                                                    <h4>Approve Fasilitas</h4>
                                                </span>
                                            @else
                                                <span class="badge badge-Danger">
                                                    <h4>Reject Fasilitas</h4>
                                                </span>
                                            @endif
                                        </div>
                                    </table>
                                </div>
                            @endforeach


                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    @endsection
