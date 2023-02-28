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
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">

                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="name">Nomor Fasilitas</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group">
                                        <a href="" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                        <input type="text" id="example-input1-group2" name="example-input1-group2"
                                            class="form-control" placeholder="Search nomor fasilitas">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Nama Debitur</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="namDebitur" name="namDebitur" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Tempat Lahir</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="tmptLahir" name="tmptLahir" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Tanggal Lahir</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="date" id="tglLahir" name="tglLahir" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Nama Perusahaan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="namaPerusahaan" name="namaPerusahaan" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Alamat Perusahaan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="alamatPerusahaan" name="alamatPerusahaan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Plafond</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="plafond" name="plafond" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="phone">Cabang Pengajuan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="cabang_id" name="cabang_id" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="lastname">Tanggal Mpp</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="date" id="tglMpp" name="tglMpp" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Jenis Fasilitas</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="jenisFasilitas" name="jenisFasilitas" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nomor Surat</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="jenisFasilitas" name="jenisFasilitas"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Tujuan Fasilitas</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="tujuanFasilitas" name="tujuanFasilitas"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Area Pengajuan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="area" name="area" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nama Lending Officer</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="namaLo" name="namaLo" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nama Collection</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="namaCollection" name="namaCollection"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nama Team Leader</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="namaTl" name="namaTl" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Rate Bunga</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="rate" name="rate" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Tenor</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="tenor" name="tenor" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nomor Kontrak</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="noKontrak" name="noKontrak" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Data Jaminan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="dataJaminan" name="dataJaminan" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Nomor BPJS</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="noBPJS" name="noBPJS" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Saldo BPJS</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="saldoBpjs" name="saldoBpjs" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Jenis Pengajuan</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="jenisPengajuan" name="jenisPengajuan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email">Deskripsi</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title mb-3">Pinjaman di tempat lain</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-white" id="tableEstimate">
                            <thead>
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th class="col-sm-2">Nama Bank</th>
                                    <th class="col-sm-2">Loan Plafond</th>
                                    <th class="col-sm-2">Outstanding</th>
                                    <th class="col-sm-2">Angsuran</th>
                                    <th class="col-sm-2">Tujuan Pinjaman</th>
                                    <th class="col-sm-2">Deskripsi</th>
                                    <th class="col-sm-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="bankName" name="bankName[]"></td>
                                    <td><input class="form-control loan" style="min-width:150px" type="text"
                                            id="loan" name="loan[]"></td>
                                    <td><input class="form-control outstanding" style="min-width:150px" type="text"
                                            id="outstanding" name="outstanding[]"></td>
                                    <td><input class="form-control angsuran" style="min-width:150px" type="text"
                                            id="angsuran" name="angsuran[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="tujuanPinjaman" name="tujuanPinjaman[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="keterangan" name="keterangan[]"></td>
                                    <td><select class="form-control" id="statusPinjaman" name="statusPinjaman[]"
                                            style="min-width:150px">
                                            <option>--Select--</option>
                                            <option>Pengajuan Bank</option>
                                            <option>Pengajuan Baru</option>
                                        </select>
                                    </td>

                                    <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                            id="addBtn"><i class="fa fa-plus"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
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
                                    <td><input class="form-control outstanding" style="min-width:150px" type="text"
                                            id="outstanding" name="outstanding[]"></td>
                                    <td><input class="form-control angsuran" style="min-width:150px" type="text"
                                            id="angsuran" name="angsuran[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="tujuanPinjaman" name="tujuanPinjaman[]"></td>
                                    <td><input class="form-control" style="min-width:150px" type="text"
                                            id="keterangan" name="keterangan[]"></td>
                                    <td><select class="form-control" id="statusPinjaman" name="statusPinjaman[]"
                                            style="min-width:150px">
                                            <option>--Select--</option>
                                            <option>Pengajuan Bank</option>
                                            <option>Pengajuan Baru</option>
                                        </select>
                                    </td>
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
    </script>
@endpush
