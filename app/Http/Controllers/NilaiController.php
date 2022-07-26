<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Mapel;
use App\Nilai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Nilai::where('guru_id', $guru->id)->get();

        if ($guru->tipe == 'kelas') {
            $tipe = 'A';
        } else if ($guru->tipe == 'khusus') {
            $tipe = 'B';
        } else {
            $tipe = 'C';
        }
        $mapel = Mapel::where('kelompok', $tipe)->get();
        return view('guru.nilai', compact('nilai', 'guru', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();

        return view('admin.nilai.index', compact('guru'));
    }

    public function detail($id)
    {
        $guru = Guru::find($id);
        $nilai = Nilai::where('guru_id', $id)->get();

        return view('admin.nilai.detail', compact('guru', 'nilai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id_card', Auth()->user()->id_card)->first();
        $guru =  $user->guru(Auth()->user()->id_card);
        Nilai::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'guru_id' => $guru->id,
                'mapel_id' => $request->mapel_id,
                'kkm' => $request->kkm,
                'deskripsi_a' => $request->predikat_a,
                'deskripsi_b' => $request->predikat_b,
                'deskripsi_c' => $request->predikat_c,
                'deskripsi_d' => $request->predikat_d,
            ]
        );

        return redirect()->back()->with('success', 'Data nilai kkm dan predikat berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id = Crypt::decrypt($id);
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Nilai::find($id);
        $mapel = Mapel::all();
        return view('guru.edit_nilai', compact('mapel', 'nilai', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);

        $nilai = Nilai::findorfail($id);


        $nilai_data = [
            'guru_id' => $request->guru_id,
            'mapel_id' => $request->mapel_id,
            'kkm' => $request->kkm,
            'deskripsi_a' => $request->deskripsi_a,
            'deskripsi_b' => $request->deskripsi_b,
            'deskripsi_c' => $request->deskripsi_c,
            'deskripsi_d' => $request->deskripsi_d,
        ];

        $nilai->update($nilai_data);

        return redirect()->back()->with('success', 'Data Nilai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}