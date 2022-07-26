@extends('template_backend.home')
@section('heading', 'Edit Jadwal')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
    <li class="breadcrumb-item active">Edit Jadwal</li>
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Data Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('jadwal.update', ['jadwal' => $jadwal->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari_id">Hari</label>
                                <select id="hari_id" name="hari_id"
                                    class="form-control @error('hari_id') is-invalid @enderror select2bs4">
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach ($hari as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($jadwal->hari_id == $data->id) selected @endif>{{ $data->nama_hari }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select id="kelas_id" name="kelas_id" disabled
                                    class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($jadwal->kelas_id == $data->id) selected @endif>{{ $data->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mapel_id">Mapel</label>
                                <select id="mapel_id" name="mapel_id" disabled
                                    class="form-control @error('mapel_id') is-invalid @enderror select2bs4">
                                    <option value="" @if ($jadwal->mapel_id) selected @endif>-- Pilih Mapel
                                        Mapel --</option>
                                    @foreach ($mapel as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($jadwal->mapel_id == $data->id) selected @endif>{{ $data->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="guru_id">Guru</label>
                                <select id="guru_id" name="guru_id" @if ($jadwal->mapel->kelompok == 'A') disabled @endif
                                    class="form-control @error('guru_id') is-invalid @enderror select2bs4">
                                    <option value="" @if ($jadwal->guru_id) selected @endif>-- Pilih Guru
                                        --</option>
                                    @foreach ($guru as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($jadwal->guru_id == $data->id) selected @endif>
                                            {{ $data->nama_guru }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai</label>
                                <input type='time' value="{{ $jadwal->jam_mulai }}" id="jam_mulai" name='jam_mulai'
                                    class="form-control @error('jam_mulai') is-invalid @enderror" placeholder='JJ:mm:dd'>
                            </div>
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type='time' value="{{ $jadwal->jam_selesai }}" name='jam_selesai'
                                    class="form-control @error('jam_selesai') is-invalid @enderror" placeholder='JJ:mm:dd'>
                            </div>
                            <div class="form-group">
                                <label for="ruang_id">Ruang Kelas</label>
                                <select id="ruang_id" name="ruang_id"
                                    class="form-control @error('ruang_id') is-invalid @enderror select2bs4">
                                    <option value="">-- Pilih Ruang Kelas --</option>
                                    @foreach ($ruang as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($jadwal->ruang_id == $data->id) selected @endif>
                                            {{ $data->nama_ruang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="#" name="kembali" class="btn btn-default" id="back"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Update</button>
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
                window.location = "{{ route('jadwal.show', Crypt::encrypt($jadwal->kelas_id)) }}";
            });
        });
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataJadwal").addClass("active");
    </script>
@endsection
