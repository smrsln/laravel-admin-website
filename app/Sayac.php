<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sayac extends Model
{
    protected $table = 'sayac';
	protected $fillable = [
        'uyedernek', 'uyefederasyon', 'uyekonfederasyon','ziyaretci'
    ];
}
