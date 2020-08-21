<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stklar extends Model
{
    protected $table = 'stklar';
	protected $fillable = [
        'stklogo', 'stkadi','link'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}