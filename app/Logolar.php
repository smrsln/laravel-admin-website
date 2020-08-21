<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logolar extends Model
{
    protected $table = 'logolar';
	protected $fillable = [
        'logo', 'footerlogo'
    ];
}
