<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vizyon extends Model
{
    protected $table = 'vizyon';
	protected $fillable = [
        'vizyonfoto', 'yazi'
    ];
}
