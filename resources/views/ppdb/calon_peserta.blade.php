@extends('template_backend.home')
@section('heading', 'Calon Peserta Didik')
@section('page')
    <li class="breadcrumb-item active">Calon Peserta Didik</li>
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
                            <th>No USBN</th>
                            <th>Jenis Kelamin</th>
                            <th>Jarak Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            
                            function hp($nohp)
                            {
                                // kadang ada penulisan no hp 0811 239 345
                                $nohp = str_replace(' ', '', $nohp);
                                // kadang ada penulisan no hp (0274) 778787
                                $nohp = str_replace('(', '', $nohp);
                                // kadang ada penulisan no hp (0274) 778787
                                $nohp = str_replace(')', '', $nohp);
                                // kadang ada penulisan no hp 0811.239.345
                                $nohp = str_replace('.', '', $nohp);
                            
                                // cek apakah no hp mengandung karakter + dan 0-9
                                if (!preg_match('/[^+0-9]/', trim($nohp))) {
                                    // cek apakah no hp karakter 1-3 adalah +62
                                    if (substr(trim($nohp), 0, 3) == '+62') {
                                        $nohp = trim($nohp);
                                    }
                                    // cek apakah no hp karakter 1 adalah 0
                                    elseif (substr(trim($nohp), 0, 1) == '0') {
                                        $nohp = '+62' . substr(trim($nohp), 1);
                                    }
                                }
                            
                                return str_replace('+', '', $nohp);
                            }
                        @endphp
                        @foreach ($ppdbs as $result => $data)
                            <tr>
                                <td>
                                    <input type="checkbox" class="flat-red" name="check[]" value="{{ $data->id }}" />
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nama_siswa }}</td>
                                <td>{{ $data->no_usbn }}</td>
                                <td>
                                    @if ($data->siswa->jenis_kelamin == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                                <td>{{ $data->distance }}</td>
                                <td>
                                    <a href="{{ route('ppdb.show', $data) }}" class="btn btn-primary btn-sm">
                                        <i class="nav-icon fas fa-eye"> </i>
                                        &nbsp; Detail</a>
                                    <button onclick="tolak(event)" data-href="{{ route('ppdb.reject', $data->id) }}"
                                        data-wa='https://api.whatsapp.com/send?phone={{ hp($data->no_telp_ortu) }}&text=Maaf%20anda%20tidak%20lolos%20di%20SMPN%201%20Sindangkerta.'
                                        class="btn btn-danger btn-sm">
                                        <i class="nav-icon fas fa-trash-alt"> </i>
                                        &nbsp; Tolak</button>
                                    <button onclick="terima(event)" data-href="{{ route('ppdb.accept', $data->id) }}"
                                        data-wa='https://api.whatsapp.com/send?phone={{ hp($data->no_telp_ortu) }}&text=Selamat%20anda%20di%20terima%20di%20SMPN%201%20Sindangkerta.%20Harap%20membawa%20uang%20untuk%20pembayaran%20uang%20pakaian.'
                                        class="btn btn-success btn-sm">
                                        <i class="nav-icon fas fa-eye"></i> &nbsp;
                                        Terima
                                    </button>
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
                    <input type="hidden" name="ids" id="ids_r" value="" />
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
            rejectSiswa.querySelector("#ids_r").value = ids;
            rejectSiswa.submit();
        });

        function tolak(e) {
            e.preventDefault();
            let href = e.target.dataset.href;

            let waUrl = e.target.dataset.wa;

            window.open(waUrl, '_blank');

            window.location.href = href;

        }

        function terima(e) {
            e.preventDefault();
            let href = e.target.dataset.href;

            let waUrl = e.target.dataset.wa;

            window.open(waUrl, '_blank');

            window.location.href = href;

        }
    </script>
@endsection
