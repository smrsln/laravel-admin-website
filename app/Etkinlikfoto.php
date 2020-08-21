<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etkinlikfoto extends Model
{
    protected $table = 'etkinlikfoto';
	protected $fillable = [
        'etkinlik_id', 'foto',
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function etkinlik()
    {
        return $this->belongsTo('App\Etkinlik', 'id', 'etkinlik_id');
    }
}
