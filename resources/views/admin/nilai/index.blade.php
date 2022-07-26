@extends('template_backend.home')
@section('heading', 'Data Nilai')
@section('page')
    <li class="breadcrumb-item active">Data Nilai</li>
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
                            <th>No.</th>
                            <th>Guru Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>

                                    <p class="card-text"><small class="text-muted">{{ $data->nama_guru }}</small></p>
                                </td>
                                <td>
                                    <a href="{{ route('predikat.detail', ['id' => $data->id]) }}"
                                        class="btn btn-primary">detail</a>
                                </td>
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
