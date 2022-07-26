@extends('template_backend.home')
@section('heading', 'Data Nilai')
@section('page')
    <li class="breadcrumb-item active">Data Detail Nilai</li>
@endsection
@section('content')
    @php
    $no = 1;
    @endphp
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Mapel</th>
                            <th rowspan="2">KKM</th>
                            <th colspan="4" class="text-center">Predikat</th>
                        </tr>
                        <tr>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>

                                @if ($data->id)
                                    <td>{{ $data->kkm }}</td>
                                    <td>{{ $data->deskripsi_a }}</td>
                                    <td>{{ $data->deskripsi_b }}</td>
                                    <td>{{ $data->deskripsi_c }}</td>
                                    <td>{{ $data->deskripsi_d }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Deskripsi").addClass("active");
    </script>
@endsection
