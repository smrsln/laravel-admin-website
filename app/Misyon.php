<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misyon extends Model
{
    protected $table = 'misyon';
	protected $fillable = [
        'misyonfoto', 'yazi'
    ];
}