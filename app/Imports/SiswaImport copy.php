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
        $kelas = Kelas::where('nama_kelas', $row[9])->first();
        if ($row[2] == 'L') {
            $foto = 'uploads/siswa/52471919042020_male.jpg';
        } else {
            $foto = 'uploads/siswa/50271431012020_female.jpg';
        }

        return new Siswa([
            'no_induk' => $row[1],
            'nis' => $row[2],
            'nama_siswa' => $row[3],
            'jk' => $row[4],
            'agama' => $row[5],
            'telp' => $row[6],
            'tmp_lahir' => $row[7],
            'tgl_lahir' => $row[8],
            'kelas_id' => $kelas->id,
        ]);
    }
}
