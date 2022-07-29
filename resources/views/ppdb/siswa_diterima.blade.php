@extends('template_backend.home')
@section('heading', 'Peserta Didik Baru yang Diterima')
@section('page')
    <li class="breadcrumb-item active">Peserta Didik Baru yang Diterima</li>
@endsection
@section('content')
    <div class="col-md-12">
        @include('template_backend.validation')
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all" />
                            </th>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>No Induk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ppdbs as $result => $data)
                            <tr>
                                <td>
                                    <input type="checkbox" class="flat-red" name="check[]" value="{{ $data->id }}" />
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nama_siswa }}</td>
                                <td>{{ $data->siswa->no_induk }}</td>
                                <td>
                                    <a href="{{ route('ppdb.show', $data) }}" class="btn btn-info btn-sm">
                                        <i class="nav-icon fas fa-trash-alt"> </i>
                                        &nbsp; Data Diri</a>
                                    <a href="{{ route('ppdb.reject', $data->id) }}" class="btn btn-danger btn-sm">
                                        <i class="nav-icon fas fa-trash-alt"> </i>
                                        &nbsp; Hapus</a>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-{{ $data->id }}">
                                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Siswa
                                    </button>
                                    <div class="modal fade bd-example-modal-lg-{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data Siswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('siswa.store') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="no_induk">Nomor Induk</label>
                                                                    <input type="text" id="no_induk" name="no_induk"
                                                                        onkeypress="return inputAngka(event)"
                                                                        class="form-control @error('no_induk') is-invalid @enderror" value="{{ $data->siswa->no_induk }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_siswa">Nama Siswa</label>
                                                                    <input type="text" id="nama_siswa" name="nama_siswa"
                                                                        class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ $data->siswa->nama_siswa }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jk">Jenis Kelamin</label>
                                                                    <select id="jk" name="jk"
                                                                        class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                                                        <option value="">-- Pilih Jenis Kelamin --
                                                                        </option>
                                                                        <option value="L" {{ $data->siswa->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                                                        <option value="P" {{ $data->siswa->jk != 'L' ? 'selected' : '' }}>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tmp_lahir">Tempat Lahir</label>
                                                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                                                        class="form-control @error('tmp_lahir') is-invalid @enderror" value="{{ $data->siswa->tmp_lahir }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="foto">File input</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="foto"
                                                                                class="custom-file-input @error('foto') is-invalid @enderror"
                                                                                id="foto">
                                                                            <label class="custom-file-label"
                                                                                for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nis">NISN</label>
                                                                    <input type="text" id="nis" name="nis"
                                                                        onkeypress="return inputAngka(event)"
                                                                        class="form-control @error('nis') is-invalid @enderror" value="{{ $data->siswa->nis }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kelas_id">Kelas</label>
                                                                    <select id="kelas_id" name="kelas_id"
                                                                        class="select2bs4 form-control @error('kelas_id') is-invalid @enderror">
                                                                        <option value="">-- Pilih Kelas --</option>
                                                                        @foreach ($kelas as $kls)
                                                                            <option value="{{ $kls->id }}">
                                                                                {{ $kls->nama_kelas }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telp">Nomor Telpon/HP</label>
                                                                    <input type="text" id="telp" name="telp"
                                                                        onkeypress="return inputAngka(event)"
                                                                        class="form-control @error('telp') is-invalid @enderror" value="{{ $data->no_telp_ortu }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                                                        class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($data->siswa->tgl_lahir)) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i>
                                                        &nbsp; Kembali</button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex">
                <form method="POST" action="{{ route('ppdb.bulk.accept') }}" class="mr-1" id="acceptSiswa">
                    @csrf
                    <input type="hidden" name="ids" id="ids" value="" />
                    <button type="button" class="btn btn-primary btn-sm" id="btnAccpet"><i
                            class="nav-icon fas fa-plus"></i>
                        &nbsp; Terima</button>
                </form>
                <form method="POST" action="{{ route('ppdb.bulk.reject') }}" id="rejectSiswa">
                    <button type="button" class="btn btn-danger btn-sm" id="btnReject"><i
                            class="nav-icon fas fa-trash-alt"></i>
                        &nbsp; Tolak</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // check all
        const idCheckAll = document.querySelector("#check-all");
        const idCheckboxes = document.querySelectorAll(".flat-red");
        const acceptSiswa = document.querySelector("#acceptSiswa");
        const rejectSiswa = document.querySelector("#rejectSiswa");
        const btnAccept = document.querySelector("#btnAccpet");
        const btnReject = document.querySelector("#btnReject");
        idCheckAll.addEventListener("change", function(e) {
            if (idCheckAll.checked) {
                idCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = true;
                });
            } else {
                idCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            }
        });

        // if button accept is clicked then get the id of the checked checkboxes and put it into the hidden input
        btnAccept.addEventListener("click", function(e) {
            e.preventDefault();
            let ids = [];
            idCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    ids.push(checkbox.value);
                }
            });
            acceptSiswa.querySelector("#ids").value = ids;
            acceptSiswa.submit();
        });

        // if button reject is clicked then get the id of the checked checkboxes and put it into the hidden input
        btnReject.addEventListener("click", function(e) {
            e.preventDefault();
            let ids = [];
            idCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    ids.push(checkbox.value);
                }
            });
            rejectSiswa.querySelector("#ids").value = ids;
            rejectSiswa.submit();
        });
    </script>
@endsection
