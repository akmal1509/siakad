@extends('layouts.home.app')

@section('content-1')
    <div class="w-full mb-2 mt-6">
        @include('layouts.validation')

    </div>
    <div class="bg-blue-500 rounded-lg px-4 py-2 my-6" x-data="stepper()" x-cloak>
        <div>
            <div class="flex items-center btnSteps">
                <button id="step-1"
                    x-bind:class="{ 'step-active step-button': step == 1, 'step step-button': step != 1 }">
                    <span>1</span>
                </button>
                <hr class="w-full border-2 border-gray-400" />
                <button id="step-2"
                    x-bind:class="{ 'step-active step-button': step == 2, 'step step-button': step != 2 }">
                    <span>2</span>
                </button>
                <hr class="w-full border-2 border-gray-400" />
                <button id="step-3"
                    x-bind:class="{ 'step-active step-button': step == 3, 'step step-button': step != 3 }">
                    <span>3</span>
                </button>
            </div>
            <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-5">
                    <section class="border-2 border-white p-1 rounded-lg" x-show="step == 1">
                        <div class="bg-white rounded-lg p-3">
                            <h1 class="font-bold text-xl">PPDB</h1>

                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="name">Nama :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="name" id="name" placeholder="Nama" required
                                        value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="email">Email :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="email" name="email" id="email" placeholder="email" required
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="gender">Jenis Kelamin :</label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="gender" id="gender" placeholder="Nama" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="NIK">NIK :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="number" name="NIK" id="NIK" placeholder="NIK" required
                                        value="{{ old('NIK') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="NISN">NISN :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="number" name="NISN" id="NISN" placeholder="NISN" required
                                        value="{{ old('NISN') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="no_usbn">No Peserta USBN SD
                                        :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="number" name="no_usbn" id="no_usbn" placeholder="No Peserta USBN SD"
                                        required value="{{ old('no_usbn') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="tempat_lahir">Tempat Lahir
                                        :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                                        required value="{{ old('tempat_lahir') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="tanggal_lahir">Tanggal Lahir
                                        :</label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"
                                        required value="{{ old('tanggal_lahir') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="alamat">Alamat Calon(Lengkap)
                                        :</label>
                                    <textarea
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="alamat" id="alamat" placeholder="Alamat Rumah" required> {{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="distance">Jarak Dari Rumah Ke Sekolah:</label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="distance" id="distance" placeholder="Nama" required>
                                        <option value="<1KM"><1KM</option>
                                        <option value="1KM">1KM</option>
                                        <option value="2KM">2KM</option>
                                        <option value="3KM">3KM</option>
                                        <option value="4KM">4KM</option>
                                        <option value="5KM">5KM</option>
                                        <option value="6KM">6KM</option>
                                        <option value="7KM">7KM</option>
                                        <option value="8KM">8KM</option>
                                        <option value="9KM">9KM</option>
                                        <option value="10KM">10KM</option>
                                        <option value=">10KM">>10KM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="ss_distance">
                                        Screenshot Jarak Dari Rumah Ke Sekolah:</label>
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="file" name="ss_distance" id="ss_distance"
                                        placeholder="Pilih" required value="{{ old('ss_distance') }}" accept="image/*">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="asal_sekolah">
                                        Asal Sekolah Lama :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="asal_sekolah" id="asal_sekolah"
                                        placeholder="Asal Sekolah Lama" required value="{{ old('asal_sekolah') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="year_graduated">
                                        Tahun Lulus :
                                    </label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                        px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                        focus:border-gray-200"
                                        type="text" name="year_graduated" id="year_graduated">
                                        <option value="">Tahun Lulus</option>
                                        @foreach ($years as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="religion">
                                        Agama :
                                    </label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="religion" id="religion" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="no_kks">
                                        Nomor KKS/PKH/KIP/KIS :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="no_kks" id="no_kks" placeholder="Nomor KKS/PKH/KIP/KIS"
                                        required value="{{ old('no_kks') }}">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="border-2 border-white p-1 rounded-lg" x-show="step == 2">
                        <div class="bg-white rounded-lg p-3">
                            <h1 class="font-bold text-xl">PPDB</h1>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="nama_ortu">
                                        Nama Orang Tua :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="nama_ortu" id="nama_ortu" placeholder="Nama Orang Tua"
                                        required value="{{ old('nama_ortu') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="alamat_ortu">
                                        Alamat Orang Tua :
                                    </label>
                                    <textarea
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua">{{ old('alamat_ortu') }}</textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="pekerjaan_ortu">
                                        Pekerjaan Orang Tua :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="pekerjaan_ortu" id="pekerjaan_ortu"
                                        placeholder="Pekerjaan Orang Tua" required value="{{ old('pekerjaan_ortu') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="agama_ortu">
                                        Agama Orang Tua :
                                    </label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="agama_ortu" id="agama_ortu">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="no_hp_ortu">
                                        Nomor HP Orang Tua :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="number" name="no_hp_ortu" id="no_hp_ortu"
                                        placeholder="Nomor HP Orang Tua" required value="{{ old('no_hp_ortu') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="nama_wali">
                                        Nama Wali Calon :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="nama_wali" id="nama_wali" placeholder="Nama Wali Calon"
                                        value="{{ old('nama_wali') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="pekerjaan_wali">
                                        Pekerjaan Wali Calon :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="text" name="pekerjaan_wali" id="pekerjaan_wali"
                                        placeholder="Pekerjaan Wali Calon" value="{{ old('pekerjaan_wali') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="agama_wali">
                                        Agama Wali Calon :
                                    </label>
                                    <select
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="agama_wali" id="agama_wali">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="no_hp_wali">
                                        Nomor HP Wali Calon :
                                    </label>
                                    <input
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        type="number" name="no_hp_wali" id="no_hp_wali"
                                        placeholder="Nomor HP Wali Calon" value="{{ old('no_hp_wali') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="alamat_wali">
                                        Alamat Wali Calon :
                                    </label>
                                    <textarea
                                        class="col-span-3 rounded py-2 font-semibold
                                     px-3 text-sm focus:outline-none bg-gray-200 focus:bg-white border-2 transition duration-200
                                     focus:border-gray-200"
                                        name="alamat_wali" id="alamat_wali" placeholder="Alamat Wali Calon">{{ old('alamat_wali') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="border-2 border-white p-1 rounded-lg" x-show="step == 3">
                        <div class="bg-white rounded-lg p-3">
                            <h1 class="font-bold text-xl">PPDB</h1>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="tahun_ppdb">
                                        Prestasi yang pernah diraih :
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-4 items-center gap-3">
                                    <label class="col-span-1 font-semibold text-sm" for="tahun_ppdb">
                                        Lampiran :
                                    </label>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 w-full col-span-3">
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="srt_k_lulus">
                                                <p></p>
                                                <input type="file" name="srt_k_lulus" id="srt_k_lulus" value=""
                                                    class="hidden" accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Surat Keterangan Lulus</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="ijazah_sd_mi">
                                                <p></p>
                                                <input type="file" name="ijazah_sd_mi" id="ijazah_sd_mi"
                                                    value="" class="hidden" accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Ijazah SD/MI (Jika ada)</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="sertifikat_hasil_ujian_sekolah">
                                                <p></p>
                                                <input type="file" name="sertifikat_hasil_ujian_sekolah"
                                                    id="sertifikat_hasil_ujian_sekolah" value="" class="hidden"
                                                    accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Sertifikat Hasil Ujian Sekolah</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="akte_kelahiran_surat_kenal_lahir">
                                                <p></p>
                                                <input type="file" name="akte_kelahiran_surat_kenal_lahir"
                                                    id="akte_kelahiran_surat_kenal_lahir" value="" class="hidden"
                                                    accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Akte Kelahiran/Surat kenal lahir</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="kartu_keluarga_surat_keterangan_domisili">
                                                <p></p>
                                                <input type="file" name="kartu_keluarga_surat_keterangan_domisili"
                                                    id="kartu_keluarga_surat_keterangan_domisili" value=""
                                                    class="hidden" accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Kartu Keluarga/Surat Keterangan Domisili</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="kartu_kip_kkks_sktm">
                                                <p></p>
                                                <input type="file" name="kartu_kip_kkks_sktm" id="kartu_kip_kkks_sktm"
                                                    value="" class="hidden" accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Kartu KIP/KKS/SKTM (Bagi yang Memiliki)</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="kartu_nisn">
                                                <p></p>
                                                <input type="file" name="kartu_nisn" id="kartu_nisn" value=""
                                                    class="hidden" accept="application/pdf" />
                                            </label>
                                            <p class="font-semibold text-sm">Kartu NISN</p>
                                        </div>
                                        <div class="flex flex-col w-full text-center items-center gap-3 inputFile">
                                            <label
                                                class=" font-semibold text-sm bg-gray-200 h-40 w-full rounded cursor-pointer flex justify-center items-center content-center"
                                                for="foto_siswa">
                                                <p></p>
                                                <input type="file" name="foto_siswa" id="foto_siswa" value=""
                                                    class="hidden" accept="image/jpeg,image/png, image/jpg" />
                                            </label>
                                            <p class="font-semibold text-sm">Foto Siswa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="mt-4 flex justify-end">
                        <button @click="prev()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none 
                            focus:shadow-outline transition duration-200"
                            x-show="step > 1" type="button">
                            Prev
                        </button>
                        <button @click="next()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none 
                            focus:shadow-outline transition duration-200"
                            x-show="step < 3" type="button">
                            Next
                        </button>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none 
                            focus:shadow-outline transition duration-200"
                            x-show="step === 3" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function stepper() {
            return {
                step: 1,
                next() {
                    if (this.step < 3) {
                        this.step++;
                    }
                },
                prev() {
                    if (this.step > 1) {
                        this.step--;
                    }
                }
            }
        }
        const inputFile = document.querySelectorAll('.inputFile');
        inputFile.forEach(input => {
            input.querySelector('p').innerHTML = 'No file chosen, yet.';
            input.addEventListener('change', function(e) {
                const fileName = e.target.value.split('\\').pop();
                // input.querySelector('p').innerHTML = fileName;
                if (fileName) {
                    input.querySelector('p').innerHTML = "File terpilih: " + fileName;
                }
            });
        });
    </script>
@endpush
