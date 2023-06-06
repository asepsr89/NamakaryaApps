@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Input Fasilitas</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-header mt-0">Data Debitur</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        </div>
                        @error('noDebitur')
                            <p class="text-danger">{{ $message }},Silahkan verifikasi data fasilitas atas nama
                                {{ $data->name }} oleh pimpinan cabang</p>
                        @enderror
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control " type="text" value="{{ $data->mitra_id }}" id="mitra_id"
                                    name="mitra_id" hidden>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control " type="text" value="{{ $data->id }}" id="debitur_id"
                                    name="debitur_id" hidden>
                            </div>
                        </div>
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
                                <input class="form-control @error('noDebitur') is-invalid @enderror" type="text"
                                    value="{{ $data->noDebitur }}" id="noDebitur" name="noDebitur" readonly>
                                @error('noDebitur')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name Debitur</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->name }}"
                                    id="example-text-input" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name Ibu Kandung</label>
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
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $data->cabang_id }}" name="cabang_id"
                                    id="cabang_id" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-header mt-0">Data Pribadi Debitur</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal
                                        Lahir</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('tglLahir') is-invalid @enderror" type="date"
                                            value="{{ old('tglLahir') }}" id="tglLahir" name="tglLahir">
                                        @error('tglLahir')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('tmpLahir') is-invalid @enderror" type="text"
                                            value="{{ old('tmpLahir') }}" id="tmpLahir" name="tmpLahir">
                                        @error('tmpLahir')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Nama Pasangan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('namaPasangan') is-invalid @enderror"
                                            type="text" value="{{ old('namaPasangan') }}" id="namaPasangan"
                                            name="namaPasangan">
                                        @error('namaPasangan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal
                                        Lahir Pasangan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('tglLahirPasangan') is-invalid @enderror"
                                            type="date" value="{{ old('tglLahirPasangan') }}" id="tglLahirPasangan"
                                            name="tglLahirPasangan">
                                        @error('tglLahirPasangan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Pendidikan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('pendidikan') is-invalid @enderror"
                                            name="pendidikan" id="pendidikan">
                                            <option value="0">Select</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="S1-Strata">S1-Strata</option>
                                            <option value="S2-Strata">S2-Strata</option>
                                            <option value="S3-Strata">S3-Strata</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('pendidikan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Status
                                        Perkawinan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('stsKawin') is-invalid @enderror"
                                            name="stsKawin" id="stsKawin">
                                            <option value="0">Select</option>
                                            <option value="Belum menikah">Belum menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        </select>
                                        @error('stsKawin')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">NPWP</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('npwp') is-invalid @enderror" type="text"
                                            value="{{ old('npwp') }}" name="npwp" id="npwp">
                                        @error('npwp')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Alamat
                                        Sekarang</label>
                                    <div class="col-sm-8">
                                        <textarea id="alamatSkrng" value="{{ old('alamatSkrng') }}" name="alamatSkrng"
                                            class="form-control @error('alamatSkrng') is-invalid @enderror" maxlength="225" rows="3" placeholder=""></textarea>
                                        @error('alamatSkrng')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Status Tinggal</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('stsTinggal') is-invalid @enderror"
                                            name="stsTinggal" id="stsTinggal">
                                            <option value="0">Select</option>
                                            <option value="Milik Sendiri">Milik Sendiri</option>
                                            <option value="Milik Orang tua">Milik Orang tua</option>
                                            <option value="Sewa">Sewa/kontrak</option>
                                            <option value="Dinas">Rumah Dinas</option>
                                        </select>
                                        @error('stsTinggal')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Jenis
                                        Pekerjaan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control @error('jnsPekerjaan') is-invalid @enderror"
                                            name="jnsPekerjaan" id="jnsPekerjaan">
                                            <option value="0">Select</option>
                                            <option value="propesional">Profesional</option>
                                            <option value="karyawan swasta">Karyawan Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pengusaha">Pengusaha</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('jnsPekerjaan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Nama
                                        Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('namaPerusahaan') is-invalid @enderror"
                                            type="text" value="{{ old('namaPerusahaan') }}" id="namaPerusahaan"
                                            name="namaPerusahaan">
                                        @error('namaPerusahaan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Telepon
                                        Perusahan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('tlpPerusahaan') is-invalid @enderror"
                                            type="text" value="{{ old('tlpPerusahaan') }}" id="tlpPerusahaan"
                                            name="tlpPerusahaan">
                                        @error('tlpPerusahaan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Lama Bekerja</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('lamaBekerja') is-invalid @enderror"
                                            type="text" value="{{ old('lamaBekerja') }}" id="lamaBekerja"
                                            name="lamaBekerja">
                                        @error('lamaBekerja')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Penghasilan
                                        Bersih</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('penghasilan') is-invalid @enderror"
                                            type="text" value="{{ old('penghasilan') }}" id="penghasilan"
                                            name="penghasilan">
                                        @error('penghasilan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-header mt-0">Berkas Pengajuan Pinjaman</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Buku Nikah</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('bukuNikah') is-invalid @enderror"
                                            name="bukuNikah" id="bukuNikah">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('bukuNikah')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Akta Cerai</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('aktaCerai') is-invalid @enderror"
                                            name="aktaCerai" id="aktaCerai">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('aktaCerai')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Foto Peminjam</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('fotoPeminjam') is-invalid @enderror"
                                            name="fotoPeminjam" id="fotoPeminjam">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('fotoPeminjam')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Foto ID CArd</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('idCard') is-invalid @enderror" name="idCard"
                                            id="idCard">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('idCard')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Surat Rekomendasi
                                        HRD</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('suratHrd') is-invalid @enderror"
                                            name="suratHrd" id="suratHrd">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('suratHrd')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Surat Keterangan
                                        Bekerja</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('suratBekerja') is-invalid @enderror"
                                            name="suratBekerja" id="suratBekerja">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('suratBekerja')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Slip Gaji</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('slipGaji') is-invalid @enderror"
                                            name="slipGaji" id="slipGaji">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('slipGaji')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Mutasi
                                        Rekening</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('mutasiRekening') is-invalid @enderror"
                                            name="mutasiRekening" id="mutasiRekening">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('mutasiRekening')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Kartu
                                        Jamsostek/BPJS</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('kartuBpjs') is-invalid @enderror"
                                            name="kartuBpjs" id="kartuBpjs">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('kartuBpjs')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Ijazah
                                        Terakhir</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('ijazahTerakhir') is-invalid @enderror"
                                            name="ijazahTerakhir" id="ijazahTerakhir">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('ijazahTerakhir')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Data Institusi
                                        Perusahaan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('institusiLk') is-invalid @enderror"
                                            name="institusiLk" id="institusiLk">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('institusiLk')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Verifikasi
                                        Perusahaan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('verifPerusahaan') is-invalid @enderror"
                                            name="verifPerusahaan" id="verifPerusahaan">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('verifPerusahaan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Lembar Kerja
                                        Analisis</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('kerjaAnalisis') is-invalid @enderror"
                                            name="kerjaAnalisis" id="kerjaAnalisis">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('kerjaAnalisis')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Lembar Kerja
                                        Analisis</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('kerjaAnalisis') is-invalid @enderror"
                                            name="kerjaAnalisis" id="kerjaAnalisis">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('kerjaAnalisis')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Hasil Survei
                                        Lingkungan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('surveiLingkungan') is-invalid @enderror"
                                            name="surveiLingkungan" id="surveiLingkungan">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('surveiLingkungan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Foto Rumah</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('fotoRumah') is-invalid @enderror"
                                            name="fotoRumah" id="fotoRumah">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('fotoRumah')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Skoring Kredit</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('skoringKredit') is-invalid @enderror"
                                            name="skoringKredit" id="skoringKredit">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('skoringKredit')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Denah Lokasi</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('denahLokasi') is-invalid @enderror"
                                            name="denahLokasi" id="denahLokasi">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('denahLokasi')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">MPP</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('mpp') is-invalid @enderror" name="mpp"
                                            id="mpp">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('mpp')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Bukti
                                        Kepemilikan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('buktiKepemilikan') is-invalid @enderror"
                                            name="buktiKepemilikan" id="buktiKepemilikan">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('buktiKepemilikan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">SHM/SHGB</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('shm') is-invalid @enderror" name="shm"
                                            id="shm">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('shm')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Foto Kartu ATM</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('fotoAtm') is-invalid @enderror"
                                            name="fotoAtm" id="fotoAtm">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('fotoAtm')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Payroll
                                        Pelunasan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('payrollPelunasan') is-invalid @enderror"
                                            name="payrollPelunasan" id="payrollPelunasan">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('payrollPelunasan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Executive
                                        Summary</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('executiveSummary') is-invalid @enderror"
                                            name="executiveSummary" id="executiveSummary">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('executiveSummary')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Dokumentasi
                                        Tambahan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control @error('dokumenTambahan') is-invalid @enderror"
                                            name="dokumenTambahan" id="dokumenTambahan">
                                            <option value="0">Select</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak ada">Tidak ada</option>
                                            <option value="Sedang Disiapkan">Sedang disiapkan</option>
                                        </select>
                                        @error('dokumenTambahan')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="card-header mt-0">Upload Dokumen</h4>
                        <div class="form-group row">

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <h6>
                                    <p class="text-muted m-b-30 font-14">Semua berkas dalam satu folder dan dicompress
                                        dengan
                                        format ZIP,RAR,PDF.
                                    </p>
                                </h6>
                                @error('fileBerkas')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="file" data-allowed-file-extensions="zip rar pdf" data-max-file-size="10M"
                                    name="fileBerkas" id="fileBerkas" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary ">Save changes</button>
                                <a href="{{ route('fasilitas.index') }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</a>
                            </div>
                        </div>
            </form>
        </div>
    </div>
    </div>
    </div> <!-- end col -->
    </div>
@endsection
@push('scripts')
    @include('sweetalert::alert')
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
