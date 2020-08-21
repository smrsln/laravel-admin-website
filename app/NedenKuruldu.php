<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NedenKuruldu extends Model
{
    protected $table = 'neden_kuruldu';
	protected $fillable = [
        'yazi'
    ];
}
