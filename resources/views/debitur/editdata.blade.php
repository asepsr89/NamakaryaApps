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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->namaPerusahaan }}"
                                    id="namaPerusahaan" name="namaPerusahaan">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Data Dokumen</label>
                            @foreach ($data->getMedia('document') as $document)
                                <img src="{{ $document->getUrl() }}" alt="{{ $document->getUrl() }}"
                                    class="img-thumbnail" width="300px">>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Upload Dokumen</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="needsclick dropzone" id="document-dropzone">
                                    </div>
                                </div>
                                Note : Apabila dokument tidak diganti maka abaikan untuk upload dokument
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
    </div> <!-- end col -->
    </div>
@endsection
@push('scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('debitur.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="new_document[]" value="' + response.name + '">')
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
                $('form').find('input[name="new_document[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="new_document[]" value="' + file.file_name +
                            '">')
                    }
                @endif
            }
        }
    </script>
@endpush
