<?php

namespace App\Imports;

use App\Siswa;
use App\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $kelas = Kelas::where('nama_kelas', $row['kelas'])->first();
        if ($row['jk'] == 'L') {
            $foto = 'uploads/siswa/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/siswa/50271431012020_female.jpg';
        }

        return new Siswa([
            'no_induk' => $row['no_induk'],
            'nis' => $row['nis'],
            'nama_siswa' => $row['nama_siswa'],
            'jk' => $row['jk'],
            'agama' => $row['agama'],
            'telp' => $row['telp'],
            'foto' => $foto,
            'tmp_lahir' => $row['tmp_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'kelas_id' => $kelas->id,
        ]);
    }
}
