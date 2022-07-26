@extends('template_backend.home')
@section('heading', 'Entry Nilai Ulangan')
@section('page')
    <li class="breadcrumb-item active">Entry Nilai Ulangan</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="margin-top: -21px;">
                        <table class="table">
                            <tr>
                                <td>Nama Guru</td>
                                <td>:</td>
                                <td>{{ $guru->nama_guru }}</td>
                            </tr>
                            {{-- @if ($guru->tipe == 'khusus')
                                <tr>
                                    <td>Mata Pelajaran</td>
                                    <td>:</td>
                                    <td>{{ $guru->mapel->nama_mapel }}</td>
                                </tr>
                            @endif --}}
                        </table>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            @if ($guru->tipe == 'khusus')
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $val => $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                                            <td><a href="{{ route('ulangan.show', Crypt::encrypt($val)) }}"
                                                    class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i>
                                                    &nbsp;
                                                    Entry Nilai</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($jadwal_gk as $val)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $val->mapel->nama_mapel }}</td>
                                            <td><a href="{{ route('ulangan.show2', ['id' => Crypt::encrypt($val->kelas_id), 'mapel_id' => Crypt::encrypt($val->mapel_id)]) }}"
                                                    class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i>
                                                    &nbsp;
                                                    Entry Nilai</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#NilaiGuru").addClass("active");
        $("#liNilaiGuru").addClass("menu-open");
        $("#UlanganGuru").addClass("active");
    </script>
@endsection
