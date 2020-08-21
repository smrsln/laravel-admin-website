<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bacibeyler extends Model
{
    protected $table = 'bacibeyler';
	protected $fillable = [
        'bacifoto', 'baci_ad_soyad', 'baci_ozgecmis'
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
