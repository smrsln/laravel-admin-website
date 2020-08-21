<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UyeEtkinlikfoto extends Model
{
    protected $table = 'uye_etkinlikfoto';
	protected $fillable = [
        'uye_etkinlik_id', 'foto',
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function uye_etkinlik()
    {
        return $this->belongsTo('App\Etkinlik', 'id', 'uye_etkinlik_id');
    }
}
