<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delikanlilar extends Model
{
    protected $table = 'delikanlilar';
	protected $fillable = [
        'delikanlifoto', 'delikanli_ad_soyad', 'delikanli_ozgecmis'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}