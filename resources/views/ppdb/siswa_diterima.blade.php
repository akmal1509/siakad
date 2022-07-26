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
                                    <a href="" class="btn btn-info btn-sm">
                                        <i class="nav-icon fas fa-trash-alt"> </i>
                                        &nbsp; Data Diri</a>
                                    <a href="{{ route('ppdb.reject', $data->id) }}" class="btn btn-danger btn-sm">
                                        <i class="nav-icon fas fa-trash-alt"> </i>
                                        &nbsp; Hapus</a>
                                    <a href="" class="btn btn-success btn-sm">
                                        <i class="nav-icon fas fa-pen"></i> &nbsp;
                                        Buat Akun
                                    </a>
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
