<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aksakallilar extends Model
{
    protected $table = 'aksakallilar';
	protected $fillable = [
        'aksakallifoto', 'aksakalli_ad_soyad', 'aksakalli_ozgecmis'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
