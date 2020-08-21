<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{
    protected $table = 'iletisim';
	protected $fillable = [
        'email', 'adres'
    ];
}
