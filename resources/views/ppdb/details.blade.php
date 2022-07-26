@extends('template_backend.home')
@section('heading', 'Details Calon Siswa')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('siswa.index') }}" Calon>Siswa</a></li>
    <li class="breadcrumb-item active">Details Calon Siswa</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('ppdb.index') }}" class="btn btn-default btn-sm"><i class='nav-icon fas fa-arrow-left'></i>
                    &nbsp; Kembali</a>
            </div>
            <div class="card-body">
                <div class="row no-gutters ml-2 mb-4 mr-2">
                    <div class="col-md-2">
                        <img src="{{ asset($pPDB->siswa->foto) }}" class="card-img img-details" alt="...">
                    </div>
                    <div class="col-md-1 mb-4"></div>
                    <div class="col-md-9">
                        <h5 class="card-title card-text mb-2">Nama : <td>{{ $pPDB->siswa->nama_siswa }}</td>
                        </h5>
                        <h5 class="card-title card-text mb-2">No. Induk : <td>{{ $pPDB->siswa->no_induk }}</td>
                        </h5>
                        <h5 class="card-title card-text mb-2">NIS : <td>{{ $pPDB->siswa->nis }}</td>
                        </h5>
                        @if ($pPDB->siswa->jk == 'L')
                            <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                        @else
                            <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                        @endif
                        <h5 class="card-title card-text mb-2">Tempat Lahir : {{ $pPDB->siswa->tmp_lahir }}</h5>
                        <h5 class="card-title card-text mb-2">Tanggal Lahir :
                            {{ date('l, d F Y', strtotime($pPDB->siswa->tgl_lahir)) }}</h5>

                    </div>
                </div>
                <div class="ml-2 mb-2 mr-2">
                    <table class="table table-striped">
                        <tbody>
                            <tr class=" mb-2">
                                <td>No Peserta USBN SD </td><td>:</td><td> {{ $pPDB->no_usbn }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Alamat Calon </td><td>:</td><td> {{ $pPDB->alamat }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Jarak Calon </td><td>:</td><td> {{ $pPDB->distance }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>SS Jarak Calon </td><td>:</td><td>  <img src="{{ asset($pPDB->ss_distance) }}" alt=""
                                        srcset=""></td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Asal Sekolah </td><td>:</td><td> {{ $pPDB->asal_sekolah }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Tahun Lulus </td><td>:</td><td> {{ $pPDB->tahun_lulus }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Agama </td><td>:</td><td> {{ $pPDB->siswa->agama }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Nomor KKS </td><td>:</td><td> {{ $pPDB->no_kks }}</td>
                            </tr>

                            <tr class=" mb-2">
                                <td>Nama Orang Tua </td><td>:</td><td> {{ $pPDB->nama_ortu }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>No. Telepon Orang Tua </td><td>:</td><td> {{ $pPDB->no_telp_ortu }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Alamat Orang Tua </td><td>:</td><td> {{ $pPDB->alamat_ortu }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Agama Orang Tua </td><td>:</td><td> {{ $pPDB->agama_ortu }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Nama Wali </td><td>:</td><td> {{ $pPDB->nama_wali }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>No. Telepon Wali </td><td>:</td><td> {{ $pPDB->no_telp_wali }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Alamat Wali </td><td>:</td><td> {{ $pPDB->alamat_wali }}</td>
                            </tr>
                            <tr class=" mb-2">
                                <td>Agama Wali </td><td>:</td><td> {{ $pPDB->agama_wali }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class=" ml-2 mb-2 mr-2">
                    <h3 class="mb-4 block">
                        File Uploaded
                    </h3>

                    <div class="my-4">
                        @foreach ($pPDB->siswa->siswa_files as $file)
                            <div>
                                @switch($file->key)
                                    @case('srt_k_lulus')
                                        <a href="{{ asset('srt_k_lulus/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Sertifikat Kepemilikan Lulus</span>
                                        </a>
                                    @break

                                    @case('ijazah_sd_mi')
                                        <a href="{{ asset('ijazah_sd_mi/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Ijazah SD MI</span>
                                        </a>
                                    @break

                                    @case('sertifikat_hasil_ujian_sekolah')
                                        <a href="{{ asset('sertifikat_hasil_ujian_sekolah/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Sertifikat Hasil Ujian Sekolah</span>
                                        </a>
                                    @break

                                    @case('akte_kelahiran_surat_kenal_lahir')
                                        <a href="{{ asset('akte_kelahiran_surat_kenal_lahir/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Akte Kelahiran Surat Kenal Lahir</span>
                                        </a>
                                    @break

                                    @case('kartu_keluarga_surat_keterangan_domisili')
                                        <a href="{{ asset('kartu_keluarga_surat_keterangan_domisili/' . $file->value) }}"
                                            target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Kartu Keluarga Surat Keterangan Domisili</span>
                                        </a>
                                    @break

                                    @case('kartu_kip_kkks_sktm')
                                        <a href="{{ asset('kartu_kip_kkks_sktm/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Kartu KIP/KKKS/SKTM</span>
                                        </a>
                                    @break

                                    @case('kartu_nisn')
                                        <a href="{{ asset('kartu_nisn/' . $file->value) }}" target="_blank">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <span class="ml-2">Kartu NISN</span>
                                        </a>
                                    @break

                                    @default
                                @endswitch
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
    </script>
@endsection
