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
                    <form method="post" action="{{ route('debitur.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Data Debitur</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nomor Debitur</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('noDebitur') is-invalid @enderror" type="text"
                                    value="{{ $nomor_anggota }}" name="noDebitur" id="noDebitur" readonly>
                                @error('noDebitur')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label">Tanggal
                                Pengajuan</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('tglPengajuan') is-invalid @enderror" type="date"
                                    value="{{ old('tglPengajuan') }}" id="tglPengajuan" name="tglPengajuan">
                                @error('tglPengajuan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Debitur</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    value="{{ old('name') }}" name="name" id="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('ibuKandung') is-invalid @enderror" type="text"
                                    value="{{ old('ibuKandung') }}" name="ibuKandung" id="ibuKandung">
                                @error('ibuKandung')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">No KTP</label>
                            <div class="col-sm-10">
                                <input class="form-control  @error('noKtp') is-invalid @enderror" type="text"
                                    value="{{ old('noKtp') }}" name="noKtp" id="noKtp">
                                @error('noKtp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('tlp') is-invalid @enderror" type="text"
                                    value="{{ old('tlp') }}" name="tlp" id="tlp">
                                @error('tlp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">plafond</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('plafond') is-invalid @enderror" type="text"
                                    value="{{ old('plafond') }}" name="plafond" id="plafond">
                                @error('plafond')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('alamat') is-invalid @enderror" type="text"
                                    value="{{ old('alamat') }}" name="alamat" id="alamat">
                                @error('alamat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih cabang</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('cabang_id') is-invalid @enderror" name="cabang_id"
                                    id="cabang_id">
                                    <option value='0'>Select</option>
                                    @foreach ($cabang as $cabang)
                                        <option value="{{ $cabang->id }}">{{ $cabang->name }}</option>
                                    @endforeach
                                </select>
                                @error('cabang_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KTP</label>
                            <div class="col-sm-10">
                                <input type="file" id="input-file-now-custom-1"
                                    data-allowed-file-extensions="jpeg jpg png" data-max-file-size="3M" name="imgKtp"
                                    id="imgKtp" class="dropify" />
                                @error('imgKtp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KK</label>
                            <div class="col-sm-10">
                                <input type="file" data-allowed-file-extensions="jpeg jpg png" data-max-file-size="3M"
                                    id="input-file-now-custom-1" name="imgKK" id="imgKK" class="dropify" />
                                @error('imgKK')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KTP Pasangan</label>
                            <div class="col-sm-10">
                                <input type="file" data-allowed-file-extensions="jpeg jpg png" data-max-file-size="3M"
                                    id="input-file-now-custom-1" name="imgPsKtp" id="imgPsKtp" class="dropify" />
                                @error('imgPsKtp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <a href="{{ route('debitur.index') }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify({
                error: {
                    'fileSize': 'Ukuran lebih dari 3 MB file terlalu besar,.',
                    'imageFormat': 'Format gambar tidak diperbolehkan, format harus JPEG,JPG,PNG .'
                }
            });

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endpush
