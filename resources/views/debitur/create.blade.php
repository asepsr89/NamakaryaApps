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
                            <div class="col-sm-3">
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
                                    value="{{ old('name') }}" name="name" id="name" onkeyup="myFunction()">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Perusahan</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('namaPerusahaan') is-invalid @enderror" type="text"
                                    value="{{ old('namaPerusahaan') }}" name="namaPerusahaan" id="namaPerusahaan">
                                @error('namaPerusahaan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload Dokumen</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="needsclick dropzone" id="document-dropzone">
                                    </div>
                                </div>
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
        function myFunction() {
            var x = document.getElementById("name");
            x.value = x.value.toUpperCase();
        }


        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('debitur.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
