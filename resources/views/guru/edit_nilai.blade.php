@extends('template_backend.home')
@section('heading', 'Edit Nilai')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('nilai.index') }}">Nilai</a></li>
    <li class="breadcrumb-item active">Edit Nilai</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Data Nilai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('nilai.update', $nilai->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="guru_id" name="guru_id" value="{{ $guru->id }}"
                                class="form-control @error('guru_id') is-invalid @enderror">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}"
                                    readonly class="form-control @error('nama_guru') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="mapel_id">Mapel</label>
                                <select id="mapel_id" name="mapel_id"
                                    class="form-control @error('mapel_id') is-invalid @enderror select2bs4">
                                    <option value="" @if ($nilai->mapel_id) selected @endif>-- Pilih Mapel
                                        Mapel --</option>
                                    @foreach ($mapel as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($nilai->mapel_id == $data->id) selected @endif>{{ $data->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kkm">KKM</label>
                                <input type="text" id="kkm" name="kkm" value="{{ $nilai->kkm }}"
                                    class="form-control @error('kkm') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_a">Deskripsi A</label>
                                <input type="text" id="deskripsi_a" name="deskripsi_a" class="form-control"
                                    value="{{ $nilai->deskripsi_a }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_b">Deskripsi B</label>
                                <input type="text" id="deskripsi_b" name="deskripsi_b" class="form-control"
                                    value="{{ $nilai->deskripsi_b }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi_c">Deskripsi C</label>
                                <input type="text" id="deskripsi_c" name="deskripsi_c" class="form-control"
                                    value="{{ $nilai->deskripsi_c }}">
                            </div>

                            <div class="form-group">
                                <label for="deksripsi_d">Deskripsi D</label>
                                <input type="text" id="deskripsi_d" name="deskripsi_d" class="form-control"
                                    value="{{ $nilai->deskripsi_d }}">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="#" name="kembali" class="btn btn-default" id="back"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
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
