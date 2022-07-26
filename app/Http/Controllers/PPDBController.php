<?php

namespace App\Http\Controllers;

use App\Mail\PPDBStatusUpdated;
use App\PPDB;
use App\Siswa;
use App\SiswaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppdbs = PPDB::where('status', 'pending')->orderBy('distance', 'desc')->get();
        return view('ppdb.calon_peserta', compact('ppdbs'));
    }

    public function siswa_diterima()
    {
        $ppdbs = PPDB::where('status', 'accepted')->orderBy('distance', 'desc')->get();
        return view('ppdb.siswa_diterima', compact('ppdbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // list years for dropdown
        $years = range(date('Y'), date('Y') - 100);
        return view("ppdb.register", compact('years'));
    }

    public function accept_ppdb($id)
    {
        $ppdb = PPDB::find($id);
        $ppdb->status = 'accepted';
        $ppdb->save();
        $name = $ppdb->siswa->nama_siswa;

        Mail::to($ppdb->email)->send(new PPDBStatusUpdated('accepted'));

        return redirect()->route('ppdb.index')->withSuccess("Calon Siswa $name diterima");
    }

    public function reject_ppdb($id)
    {
        $ppdb = PPDB::find($id);
        $ppdb->status = 'rejected';
        $ppdb->save();
        $name = $ppdb->siswa->nama_siswa;

        Mail::to($ppdb->email)->send(new PPDBStatusUpdated('rejected'));

        return redirect()->route('ppdb.index')->withError("Calon Siswa $name ditolak");
    }

    public function bulk_accept_ppdb(Request $request)
    {
        $ids = $request->ids;
        $split_id = explode(',', $ids);
        foreach ($split_id as $id) {
            $ppdb = PPDB::find($id);
            $ppdb->status = 'accepted';
            $ppdb->save();
            Mail::to($ppdb->email)->send(new PPDBStatusUpdated('accepted'));
        }
        return redirect()->route('ppdb.index')->withSuccess("Calon Siswa diterima");
    }

    public function bulk_reject_ppdb(Request $request)
    {
        $ids = $request->ids;
        $split_id = explode(',', $ids);
        foreach ($split_id as $id) {
            $ppdb = PPDB::find($id);
            $ppdb->status = 'rejected';
            $ppdb->save();
            Mail::to($ppdb->email)->send(new PPDBStatusUpdated('rejected'));
        }
        return redirect()->route('ppdb.index')->withError("Calon Siswa ditolak");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => "required|email",
            "NIK" => "required",
            "NISN" => "required|unique:siswa,no_induk",
            "no_usbn" => "required|unique:ppdb,no_usbn",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "alamat" => "required",
            "gender" => "required",
            "asal_sekolah" => "required",
            "year_graduated" => "required",
            "religion" => "required",
            "no_kks" => "required|unique:ppdb,no_kks",
            "nama_ortu" => "required",
            "alamat_ortu" => "required",
            "pekerjaan_ortu" => "required",
            "agama_ortu" => "required",
            "no_hp_ortu" => "required",
            "srt_k_lulus" => "required|mimes:pdf",
            "ijazah_sd_mi" => "mimes:pdf",
            "sertifikat_hasil_ujian_sekolah" => "required|mimes:pdf",
            "akte_kelahiran_surat_kenal_lahir" => "required|mimes:pdf",
            "kartu_keluarga_surat_keterangan_domisili" => "required|mimes:pdf",
            "kartu_kip_kkks_sktm" => "mimes:pdf",
            "kartu_nisn" => "required|mimes:pdf",
            "foto_siswa" => "required|mimes:jpg,jpeg,png",
            'distance' => 'required',
        ];

        $message = [
            "required" => ":attribute tidak boleh kosong",
            "unique" => ":attribute sudah terdaftar",
            "mimes" => ":attribute harus berupa file dengan format :values"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        $validator->after(function ($validator) use ($request) {
            if ($request->year_graduated > date('Y')) {
                $validator->errors()->add('year_graduated', 'Tahun lulus tidak boleh lebih besar dari tahun sekarang');
            }
        });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('foto_siswa')) {
            $file = $request->file('foto_siswa');
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_siswa'), $filename);
            $filename = 'foto_siswa/' . $filename;
        }

        $siswa = Siswa::create([
            'no_induk' => $request->NISN,
            'nis' => $request->NISN,
            'nama_siswa' => $request->name,
            'agama' => $request->religion,
            'tmp_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'foto' => $filename,
        ]);

        if ($request->hasFile('ss_distance')) {
            $file = $request->file('ss_distance');
            $ss_distance_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('ss_distance'), $ss_distance_filename);
        }

        if ($request->hasFile('srt_k_lulus')) {
            $file = $request->file('srt_k_lulus');
            $srt_k_lulus_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('srt_k_lulus'), $srt_k_lulus_filename);
        }

        if ($request->hasFile('ijazah_sd_mi')) {
            $file = $request->file('ijazah_sd_mi');
            $ijazah_sd_mi_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('ijazah_sd_mi'), $ijazah_sd_mi_filename);
        }

        if ($request->hasFile('sertifikat_hasil_ujian_sekolah')) {
            $file = $request->file('sertifikat_hasil_ujian_sekolah');
            $sertifikat_hasil_ujian_sekolah_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('sertifikat_hasil_ujian_sekolah'), $sertifikat_hasil_ujian_sekolah_filename);
        }

        if ($request->hasFile('akte_kelahiran_surat_kenal_lahir')) {
            $file = $request->file('akte_kelahiran_surat_kenal_lahir');
            $akte_kelahiran_surat_kenal_lahir_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('akte_kelahiran_surat_kenal_lahir'), $akte_kelahiran_surat_kenal_lahir_filename);
        }

        if ($request->hasFile('kartu_keluarga_surat_keterangan_domisili')) {
            $file = $request->file('kartu_keluarga_surat_keterangan_domisili');
            $kartu_keluarga_surat_keterangan_domisili_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('kartu_keluarga_surat_keterangan_domisili'), $kartu_keluarga_surat_keterangan_domisili_filename);
        }

        if ($request->hasFile('kartu_kip_kkks_sktm')) {
            $file = $request->file('kartu_kip_kkks_sktm');
            $kartu_kip_kkks_sktm_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('kartu_kip_kkks_sktm'), $kartu_kip_kkks_sktm_filename);
        }

        if ($request->hasFile('kartu_nisn')) {
            $file = $request->file('kartu_nisn');
            $kartu_nisn_filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('kartu_nisn'), $kartu_nisn_filename);
        }

        $data_files = [
            [
                'key' => 'ss_distance',
                'value' => $ss_distance_filename,
            ], [
                'key' => 'srt_k_lulus',
                'value' => $srt_k_lulus_filename,
            ], [
                'key' => 'ijazah_sd_mi',
                'value' => $ijazah_sd_mi_filename,
            ], [
                'key' => 'sertifikat_hasil_ujian_sekolah',
                'value' => $sertifikat_hasil_ujian_sekolah_filename,
            ], [
                'key' => 'akte_kelahiran_surat_kenal_lahir',
                'value' => $akte_kelahiran_surat_kenal_lahir_filename,
            ], [
                'key' => 'kartu_keluarga_surat_keterangan_domisili',
                'value' => $kartu_keluarga_surat_keterangan_domisili_filename,
            ], [
                'key' => 'kartu_kip_kkks_sktm',
                'value' => $kartu_kip_kkks_sktm_filename,
            ], [
                'key' => 'kartu_nisn',
                'value' => $kartu_nisn_filename,
            ]
        ];

        $siswa->siswa_files()->createMany($data_files);
        $siswa->ppdb()->create([
            'no_usbn' => $request->no_usbn,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->year_graduated,
            'no_kks' => $request->no_kks,
            'nama_ortu' => $request->nama_ortu,
            'alamat_ortu' => $request->alamat_ortu,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
            'agama_ortu' => $request->agama_ortu,
            'no_telp_ortu' => $request->no_hp_ortu,
            'nama_wali' => $request->nama_wali,
            'alamat_wali' => $request->alamat_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'agama_wali' => $request->agama_wali,
            'no_telp_wali' => $request->no_hp_wali,
            'alamat' => $request->alamat,
            'distance' => $request->distance,
            'email' => $request->email,
        ]);
        $siswa->save();
        return redirect()->route('siswa.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PPDB  $pPDB
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pPDB = PPDB::find($id);
        // dd($pPDB);
        return view('ppdb.details', compact('pPDB'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PPDB  $pPDB
     * @return \Illuminate\Http\Response
     */
    public function edit(PPDB $pPDB)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PPDB  $pPDB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PPDB $pPDB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PPDB  $pPDB
     * @return \Illuminate\Http\Response
     */
    public function destroy(PPDB $pPDB)
    {
        //
    }
}
