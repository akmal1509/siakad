<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPDB extends Model
{
    protected $table = "ppdb";
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
