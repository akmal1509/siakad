<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_card', 'nip', 'nama_guru', 'mapel_id', 'jk', 'tipe', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    protected $table = 'guru';

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}