@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Update Data Debitur</h4>
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
                                            <td><img src="{{ $foto->getUrl('thumb') }}"><br /><br /></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('debitur.update', $data->id) }}" enctype="form-data">
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
                                <input class="form-control" type="text" value="{{ $data->name }}" id="name"
                                    name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">No KTP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->noKtp }}" id="noKtp"
                                    name="noKtp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->tlp }}" id="tlp"
                                    name="tlp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">plafond</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->plafond }}" id="plafond"
                                    name="plafond">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->alamat }}" id="alamat"
                                    name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pengajuan Slik</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="mitra_id" id="mitra_id" readonly>
                                    <option>Select</option>
                                    @foreach ($mitra as $mitra)
                                        <option value="{{ $mitra->id }}"
                                            {{ $mitra->id == $data->mitra_id ? 'selected' : '' }}>{{ $mitra->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cabang</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="cabang_id" id="cabang_id" readonly>
                                    <option>Select</option>
                                    @foreach ($cabang as $cabang)
                                        <option value="{{ $cabang->id }}"
                                            {{ $cabang->id == $data->cabang_id ? 'selected' : '' }}>{{ $cabang->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KTP</label>
                            <div class="col-sm-10">
                                <input type="file" id="input-file-now-custom-1" name="imgKtp" id="imgKtp"
                                    class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KK</label>
                            <div class="col-sm-10">
                                <input type="file" id="input-file-now-custom-1" name="imgKK" id="imgKK"
                                    value="" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload KTP Pasangan</label>
                            <div class="col-sm-10">
                                <input type="file" id="input-file-now-custom-1" name="imgPsKtp" id="imgPsKtp"
                                    class="dropify" />
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
        </div> <!-- end col -->
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

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
