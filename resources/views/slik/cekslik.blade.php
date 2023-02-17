@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Slik</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Checking slik debitur</h4>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <table class="table table-bordered table-responsive">
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
                                            <td><img src="{{ $foto->getUrl('thumb') }}">
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('slik.update', $data->id) }}" enctype="form-data">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('tglSlik') is-invalid @enderror" type="date"
                                    value="{{ date('Y-m-d') }}" id="tglSlik" name="tglSlik">
                                @error('tglSlik')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kolektibilitas kredit</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('statusKolek') is-invalid @enderror" name="statusKolek"
                                    id="statusKolek">
                                    <option>--Select--</option>
                                    <option value="1-Lancar">Lancar</option>
                                    <option value="2-Dalam Perhatian Khusus">Dalam Perhatian Khusus</option>
                                    <option value="3-Kurang Lancar">Kurang lancar</option>
                                    <option value="4-Diragukan">Diragukan</option>
                                    <option value="5-Macet">Macet</option>
                                </select>
                            </div>
                            @error('statusKolek')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('keterangan') is-invalid @enderror" type="text"
                                    value="" id="keterangan" name="keterangan">
                                @error('keterangan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('note') is-invalid @enderror" type="text" value="" id="note"
                                    name="note"></textarea>
                                @error('note')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status kolektibilitas</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('statusSlik') is-invalid @enderror" name="statusSlik"
                                    id="statusSlik">
                                    <option>--Select--</option>
                                    <option value="2">Approve</option>
                                    <option value="3">Reject</option>
                                </select>
                            </div>
                            @error('statusSlik')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        </br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <a href="{{ route('slik.index') }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
