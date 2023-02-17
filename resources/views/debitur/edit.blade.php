@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Pengajuan Slik</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Data Debitur</h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Foto KTP</th>
                                        <th>Foto Kartu Keluarga</th>
                                        <th>Foto KTP Pasangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($image as $foto)
                                            <td><img src="{{ $foto->getUrl('thumb') }}"></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('debitur.pengajuanslik', $data->id) }}" enctype="form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->tglPengajuan }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nomor Debitur</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->noDebitur }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->name }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama ibu kandung</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->ibuKandung }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">No KTP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->noKtp }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->tlp }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">plafond</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->plafond }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->alamat }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pengajuan Slik</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('mitra_id') is-invalid @enderror" name="mitra_id"
                                    id="mitra_id">
                                    <option>Select</option>
                                    @foreach ($mitra as $mitra)
                                        <option value="{{ $mitra->id }}">{{ $mitra->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mitra_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <a href="{{ route('debitur.index') }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
