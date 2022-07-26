<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['guru_id', 'mapel_id', 'kkm', 'deskripsi_a', 'deskripsi_b', 'deskripsi_c', 'deskripsi_d'];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }

    protected $table = 'nilai';
}