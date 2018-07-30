<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    protected $fillable = ['nama_promotor'];

    public function peserta()
    {
    	return $this->hasMany(Peserta::class);
    }
}
