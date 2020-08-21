<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjeForm extends Model
{
    protected $table = 'projeform';
	protected $fillable = [
        'dernek_adi',
        'dernek_adres',
        'dernek_tel',
        'dernek_baskan',
        'proje_ozet',
        'proje'
    ];
}
