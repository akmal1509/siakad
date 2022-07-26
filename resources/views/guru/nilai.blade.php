@extends('template_backend.home')
@section('heading', 'Deskripsi Nilai')
@section('page')
    <li class="breadcrumb-item active">Deskripsi Nilai</li>
@endsection
@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-primary btn-sm" onclick="getCreateKelas()" data-toggle="modal"
                        data-target="#form-nilai">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kelas
                    </button>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Guru</th>
                                    <th>Mapel</th>
                                    <th>KKM</th>
                                    <th>Deskripsi A</th>
                                    <th>Deskripsi B</th>
                                    <th>Deskripsi C</th>
                                    <th>Deskripsi D</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->guru->nama_guru }}</td>
                                        <td>{{ $data->mapel->nama_mapel }}</td>
                                        <td>{{ $data->kkm }}</td>
                                        <td>{{ $data->deskripsi_a }}</td>
                                        <td>{{ $data->deskripsi_b }}</td>
                                        <td>{{ $data->deskripsi_c }}</td>
                                        <td>{{ $data->deskripsi_d }}</td>
                                        <td><a href="{{ route('nilai.edit', ['nilai' => $data->id]) }}"
                                                class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i>
                                                &nbsp; Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    {{-- <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Deskripsi Nilai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('nilai.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="#" name="kembali" class="btn btn-default" id="back"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div> --}}

    <div class="modal fade bd-example-modal-md" id="form-nilai" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nilai.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_gur">Nama Guru</label>
                                    <input type="text" id="nama_gur" name="nama_gur" value="{{ $guru->nama_guru }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select id="mapel_id" name="mapel_id"
                                        class="form-control @error('mapel_id') is-invalid @enderror select2bs4">
                                        <option value="">-- Pilih Kode Mapel --</option>
                                        @foreach ($mapel as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="predikat_a">Predikat A</label>
                                    <textarea class="form-control" required name="predikat_a" id="predikat_a" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="predikat_c">Predikat C</label>
                                    <textarea class="form-control" required name="predikat_c" id="predikat_c" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kkm">KKM</label>
                                    <input type="text" onkeypress="return inputAngka(event)" maxlength="2"
                                        value="" id="kkm" name="kkm" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="predikat_b">Predikat B</label>
                                    <textarea class="form-control" required name="predikat_b" id="predikat_b" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="predikat_d">Predikat D</label>
                                    <textarea class="form-control" required name="predikat_d" id="predikat_d" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#back').click(function() {
                window.location = "{{ url('/') }}";
            });
        });
        $("#NilaiGuru").addClass("active");
        $("#liNilaiGuru").addClass("menu-open");
        $("#DesGuru").addClass("active");
    </script>
@endsection
