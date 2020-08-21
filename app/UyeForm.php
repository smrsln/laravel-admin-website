<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UyeForm extends Model
{
    protected $table = 'uyeform';
	protected $fillable = [
        'dernek_adi',
        'dernek_no',
        'dernek_adres',
        'dernek_tel',
        'dernek_baskan',
        'dernek_amac',
        'dilekce',
        'faaliyet_belgesi',
        'ucuncu_karar',
        'imza_sirku',
        'delege_bilgi'
    ];

}
