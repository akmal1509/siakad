<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $siswa = Siswa::join('kelas', 'kelas.id', '=', 'siswa.kelas_id')->select('siswa.*', 'kelas.nama_kelas')->get()->makeHidden(['created_at', 'updated_at', 'foto', 'kelas_id', 'deleted_at']);;
        // dd($siswa);
        return $siswa;
    }

    public function headings(): array
    {
        return ["id", "no_induk", "nis", "nama_siswa", "jk", "agama", "telp", "tmp_lahir", "tgl_lahir", "kelas"];
    }
}
