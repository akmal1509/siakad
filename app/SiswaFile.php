<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaFile extends Model
{
    protected $table = "siswa_files";
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, "siswa_id");
    }
}
