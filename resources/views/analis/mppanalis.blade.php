@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Managemen Pembiayaan</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <div class="row grid-col">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <h3>ANALISA PEMBIAYAAN</h3>
                            </div>
                            <hr class="hr" />
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Cabang</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="noFasilitas" name="noFasilitas"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Area</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="namaDebitur" name="namaDebitur"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">No. MPP</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="tmpLahir" name="tmpLahir"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Tanggal MPP</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="date" id="tglLahir" name="tglLahir"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="lastname">Nama Debitur</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" value="" id="tglMpp" name="tglMpp"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="email">Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="jenisFasilitas" name="jenisFasilitas"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="email">Alamat Perusahaan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                                            placeholder="This textarea has a limit of 225 chars."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr" />
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Jenis Fasilitas</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="noFasilitas" name="noFasilitas"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Plafond</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="namaDebitur" name="namaDebitur"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="phone">Jenis Pengajuan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="tmpLahir" name="tmpLahir"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-3">
                                                        <label for="lastname">Tujuan Pengajuan</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea id="textarea" class="form-control" maxlength="225" rows="5"
                                                            placeholder="This textarea has a limit of 225 chars."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
