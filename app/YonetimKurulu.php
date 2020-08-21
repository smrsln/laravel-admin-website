<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YonetimKurulu extends Model
{
    protected $table = 'yonetim_kurulu';
	protected $fillable = [
        'ykfoto', 'yk_ad_soyad', 'yk_ozgecmis'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
