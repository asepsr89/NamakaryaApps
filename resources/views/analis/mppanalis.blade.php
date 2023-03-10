@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Analis</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{ route('analis.store') }}">
                @csrf
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <input type="text" id="debitur_id" name="debitur_id" class="form-control" hidden>
                                    <input type="text" id="fasilitas_id" name="fasilitas_id" class="form-control" hidden>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="name">Nomor Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">
                                                <input type="text" id="noDebitur" name="noDebitur"
                                                    value="{{ $data->noDebitur }}"
                                                    class="form-control @error('debitur_id') is-invalid @enderror"
                                                    placeholder="Search nomor debitur" readonly>
                                                @error('debitur_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nomor Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noFasilitas" name="noFasilitas"
                                                value="{{ $data->noFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nama Debitur</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaDebitur" name="namaDebitur"
                                                value="{{ $data->name }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tempat Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tmpLahir" name="tmpLahir"
                                                value="{{ $data->tmpLahir }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" id="tglLahir" name="tglLahir"
                                                value="{{ $data->tglLahir }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Nama Perusahaan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaPerusahaan" name="namaPerusahaan"
                                                value="{{ $data->namaPerusahaan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Plafond</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="plafond" name="plafond"
                                                value="{{ number_format($data->plafond) }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="phone">Alamat Perusahaan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <textarea id="alamatPerusahaan" name="alamatPerusahaan" class="form-control" maxlength="225" rows="3"
                                                placeholder="" readonly>{{ $analis->alamatPerusahaan }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="lastname">Tanggal Mpp</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="date" value="{{ $analis->tglMpp }}" id="tglMpp"
                                                name="tglMpp" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisFasilitas" name="jenisFasilitas"
                                                value="{{ $analis->jenisFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Surat</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noSurat" name="noSurat"
                                                value="{{ $analis->noSurat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tujuan Fasilitas</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="tujuanFasilitas" name="tujuanFasilitas"
                                                value="{{ $analis->tujuanFasilitas }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Area Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control" id="cabang" name="cabang_id" readonly>
                                                <option value="">---Select---</option>
                                                @foreach ($cabang as $cabang)
                                                    <option value="{{ $cabang->id }}"
                                                        {{ $cabang->id == $analis->cabang_id ? 'selected' : '' }}>
                                                        {{ $cabang->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Lending Officer</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaLo" name="namaLo"
                                                value="{{ $analis->namaLo }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Collection</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaCollection" name="namaCollection"
                                                value="{{ $analis->namaCollection }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nama Team Leader</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="namaTl" name="namaTl"
                                                value="{{ $analis->namaTl }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Penghasilan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="pengasilan" name="pengasilan"
                                                value="{{ number_format($data->penghasilan) }}" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Rate Bunga</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="rate" name="rate"
                                                value="{{ $analis->rate }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">%</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Tenor</label>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="text" id="tenor" name="tenor"
                                                value="{{ $analis->tenor }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="email">Tahun</label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor Kontrak</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noKontrak" name="noKontrak"
                                                value="{{ $analis->noKontrak }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Data Jaminan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="dataJaminan" name="dataJaminan"
                                                value="{{ $analis->dataJaminan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Nomor BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="noBPJS" name="noBPJS"
                                                value="{{ $analis->noBpjs }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Saldo BPJS</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="saldoBpjs" name="saldoBpjs"
                                                value="{{ $analis->saldoBpjs }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Jenis Pengajuan</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="jenisPengajuan" name="jenisPengajuan"
                                                value="{{ $analis->jenisPengajuan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 col-md-6">
                                            <label for="email">Deskripsi</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="deskripsi" name="deskripsi"
                                                value="{{ $analis->deskripsi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-3">ANALISA KEUANGAN (per Bulan) (berdasarkan Slip Gaji
                                Terakhir)</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-white" id="tableEstimate">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th class="col-sm-10">Penghasilan Bersih Lainnya</th>
                                            <th class="col-sm-2">Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input class="form-control" style="min-width:150px" type="text"
                                                    id="bankName" name="bankName[]"></td>
                                            <td><input class="form-control loan" style="min-width:150px" type="text"
                                                    id="loan" name="loan[]"></td>

                                            <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                    id="addBtn"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <tbody>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold">
                                                Total Penghasilan Bersih
                                            </td>
                                            <td style="font-size: 16px;width: 230px">
                                                <input class="form-control text-right" type="text" id="grand_total"
                                                    name="grand_total" value="Rp 0.00" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 class="mt-0 header-title mb-3"> Aktif / pinjaman awal</h5>
                                    <div class="table-responsive">
                                        <table id="tablebankloan" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Nama Bank</th>
                                                    <th>Plafond</th>
                                                    <th>Outstanding</th>
                                                    <th>Cicilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bankloan1 as $bankloan1)
                                                    <tr>
                                                        <td>{{ $bankloan1->bankName }}</td>
                                                        <td>{{ number_format($bankloan1->loan) }}</td>
                                                        <td>{{ number_format($bankloan1->outstanding) }}</td>
                                                        <td>{{ number_format($bankloan1->angsuran) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="mt-0 header-title mb-3"> Baru Setelah Disetujui</h5>
                                    <div class="table-responsive">
                                        <table id="tablebankloan2" class="table table-bordered">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Nama Bank</th>
                                                    <th>Plafond</th>
                                                    <th>Outstanding</th>
                                                    <th>Cicilan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bankloan2 as $bankloan2)
                                                    <tr>
                                                        <td>{{ $bankloan2->bankName }}</td>
                                                        <td>{{ number_format($bankloan2->loan) }}</td>
                                                        <td>{{ number_format($bankloan2->outstanding) }}</td>
                                                        <td>{{ number_format($bankloan2->angsuran) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                    <td class="table-secondary">Total</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </form>
        </div>
    @endsection
    @push('scripts')
        <script>
            var rowIdx = 1;
            $("#addBtn").on("click", function() {
                // Adding a row inside the tbody.
                $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" style="min-width:150px" type="text"
                            id="bankName" name="bankName[]"></td>
                    <td><input class="form-control loan" style="min-width:150px" type="text"
                            id="loan" name="loan[]"></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
            });
            $("#tableEstimate tbody").on("click", ".remove", function() {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function() {
                    // Getting <tr> id.
                    var id = $(this).attr("id");

                    // Getting the <p> inside the .row-index class.
                    var idx = $(this).children(".row-index").children("p");

                    // Gets the row number from <tr> id.
                    var dig = parseInt(id.substring(1));

                    // Modifying row index.
                    idx.html(`${dig - 1}`);

                    // Modifying row id.
                    $(this).attr("id", `R${dig - 1}`);
                });

                // Removing the current row.
                $(this).closest("tr").remove();

                // Decreasing total number of rows by 1.
                rowIdx--;
            });

            // function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
            function masuk(txt, data) {
                document.getElementById('noDebitur').value = data; // ini berfungsi mengisi value  yang ber id textbox
                $("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
            }

            $("#noDebitur").focusout(function(e) {
                e.preventDefault();

                var noDebitur = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('analis.getdata') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'noDebitur': noDebitur
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#debitur_id').val(data.debitur_id);
                        $('#fasilitas_id').val(data.id);
                        $('#namaDebitur').val(data.name);
                        $('#tmpLahir').val(data.tmpLahir);
                        $('#cabang_id').val(data.cabang_id);
                        $('#namaPerusahaan').val(data.namaPerusahaan);
                        $('#noFasilitas').val(data.noFasilitas);
                        $('#plafond').val(data.plafond);
                        $('#tmptLahir').val(data.tmptLahir);
                        $('#tglLahir').val(data.tglLahir);

                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                });

            });
        </script>
    @endpush
