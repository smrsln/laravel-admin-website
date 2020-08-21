<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IletisimForm extends Model
{
    protected $table = 'iletisimform';
	protected $fillable = [
        'isim', 'email','konu','mesaj'
    ];
}
