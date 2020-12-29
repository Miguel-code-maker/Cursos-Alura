<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'capa'];

    public function getCapaUrlAttribute()
    {
        if ($this->capa == null) {
            return Storage::url('serie/sem-foto.gif');
        } else {
            return Storage::url($this->capa);
        }
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
