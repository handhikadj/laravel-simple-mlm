<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
	protected $fillable 	= ['promotor_id', 'no_peserta', 'nama_peserta'];

    public function promotor()
    {
    	return $this->belongsTo(Promotor::class);
    }
}
