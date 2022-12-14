@extends('layout.master')
@section('title')
    Input Data Kensa
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa</li>
@endsection
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produksi Kensa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('kensa.tambah') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i>
                    Tambah Data</a>
            </div>
        </div>
    </div>

    <div class="card-body mt-3">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" class="align-middle text-center" >#</th>
                    <th rowspan="2" class="align-middle text-center">Tanggal</th>
                    <th rowspan="2" class="align-middle text-center">Part Name</th>
                    <th rowspan="2" class="align-middle text-center">No Bar</th>
                    <th rowspan="2" class="align-middle text-center">Qty Bar</th>
                    <th rowspan="2" class="align-middle text-center">Cycle</th>
                    <th colspan="12" class="align-middle text-center">NG PLATING</th>
                    <th colspan="6" class="align-middle text-center">NG MOLDING</th>
                    <th colspan="5" class="align-middle text-center">Total</th>
                </tr>
                <tr>
                    <th>Nikel</th>
                    <th>Butsu</th>
                    <th>Hadare</th>
                    <th>Hage</th>
                    <th>Moyo</th>
                    <th>Fukure</th>
                    <th>Crack</th>
                    <th>Henkei</th>
                    <th>Hanazaki</th>
                    <th>Kizu</th>
                    <th>Kaburi</th>
                    <th>Other</th>
                    <th>Gores</th>
                    <th>Regas</th>
                    <th>Silver</th>
                    <th>Hike</th>
                    <th>Burry</th>
                    <th>Others</th>
                    <th>Total OK</th>
                    <th>Total NG</th>
                    <th>% Total OK</th>
                    <th>% Total NG</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kensa as $no => $kensha)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td >{{ \Carbon\Carbon::parse($kensha->tanggal_k)->format('d-m-Y H:i:s') }}</td>
                        <td >{{ $kensha->part_name }}</td>
                        <td>{{ $kensha->no_bar }}</td>
                        <td>{{ $kensha->qty_bar }}</td>
                        <td>{{ $kensha->cycle }}</td>
                        <td style="width:1px; white-space:nowrap;">{{ $kensha->nikel }}</td>
                        <td>{{ $kensha->butsu }}</td>
                        <td>{{ $kensha->hadare }}</td>
                        <td>{{ $kensha->hage }}</td>
                        <td>{{ $kensha->moyo }}</td>
                        <td>{{ $kensha->fukure }}</td>
                        <td>{{ $kensha->crack }}</td>
                        <td>{{ $kensha->henkei }}</td>
                        <td>{{ $kensha->hanazaki }}</td>
                        <td>{{ $kensha->kizu }}</td>
                        <td>{{ $kensha->kaburi }}</td>
                        <td>{{ $kensha->other }}</td>
                        <td>{{ $kensha->gores }}</td>
                        <td>{{ $kensha->regas }}</td>
                        <td>{{ $kensha->silver }}</td>
                        <td>{{ $kensha->hike }}</td>
                        <td>{{ $kensha->burry }}</td>
                        <td>{{ $kensha->others }}</td>
                        <td>{{ $kensha->total_ok }}</td>
                        <td>{{ $kensha->total_ng }}</td>
                        <td>{{ $kensha->p_total_ok }} %</td>
                        <td>{{ $kensha->p_total_ng }} %</td>
                        <td>
                            <a href="{{ route('kensa.edit', $kensha->kensa_id) }}"
                                class="btn btn-icon btn-sm btn-warning"><i class="far fa-edit"></i> Edit </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{-- {!! $kensa->links() !!} --}}
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
    <script>
        $(document).ready(function() {
            $("#add-row").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Hapus data? ',
                    text: 'Setelah dihapus data tidak dapat dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal('Poof! Your imaginary file has been deleted!', {
                        // icon: 'success',
                        // });
                        $(`#delete${id}`).submit();
                    } else {
                        // swal('Your imaginary file is safe!');
                    }
                });
        });
    </script>
@endpush
