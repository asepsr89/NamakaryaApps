ini halaman fasilitas
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Fasilitas Debitur</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Input Fasilitas</h5>
                    <div class="table-responsive">
                        <table class="table data-table" name="tableSlik" id="tableSlik">
                            <thead>
                                <tr class="table-info">
                                    <th scope="col-3">No.</th>
                                    <th scope="col">Tanggal Pengajuan</th>
                                    <th scope="col">Cabang</th>
                                    <th scope="col">No Fasilitas</th>
                                    <th scope="col-3">Nama Debitur</th>
                                    <th scope="col">Perusahaan</th>
                                    <th scope="col">No KTP</th>
                                    <th scope="col">Plafond</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalAction" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
@endsection

@push('scripts')
    @include('sweetalert::alert')
    <script>
        $(function() {
            //  Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Render DataTable
            var table = $('#tableSlik').addClass('nowrap').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('fasilitas.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'userDT_RowIndex_id'
                    },
                    {
                        data: 'tglPengajuan',
                        name: 'tglPengajuan'
                    },
                    {
                        data: 'cabang_id',
                        name: 'cabang_id'
                    },
                    {
                        data: 'noFasilitas',
                        name: 'noFasilitas'
                    },
                    {
                        data: 'debitur_id',
                        name: 'debitur_id'
                    },
                    {
                        data: 'namaPerusahaan',
                        name: 'namaPerusahaan'
                    },
                    {
                        data: 'noKtp',
                        name: 'noKtp'
                    },
                    {
                        data: 'plafond',
                        name: 'plafond'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endpush
