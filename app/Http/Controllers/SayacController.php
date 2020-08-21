<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sayac;
use App\Http\Requests\SayacFormRequest;

class SayacController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Sayaç Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'uyedernek' => [
                'type' => 'string',
                'title' => 'uyedernek'
            ],
            'uyefederasyon' => [
                'type' => 'string',
                'title' => 'uyefederasyon'
            ],
            'uyekonfederasyon' => [
                'type' => 'string',
                'title' => 'uyekonfederasyon'
            ],
            'ziyaretci' => [
                'type' => 'string',
                'title' => 'ziyaretci'
            ],
            'created_at' => [
                'type' => 'string',
                'title' => 'Oluşturulma Tarihi'
            ],
            'updated_at' => [
                'type' => 'string',
                'title' => 'Son Düzenleme'
            ],
        ];
        $this->veriler = Sayac::select([
            'id',
            'uyedernek',
            'uyefederasyon',
            'uyekonfederasyon',
            'ziyaretci',
            'created_at',
            'updated_at'
        ]);
    }

    public function sayacForm(int $id = null)
    {
        $sayac = $id ? Sayac::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.sayacForm', compact('sayac'));
    }

    public function sayacGuncelle(int $id, SayacFormRequest $request){

        $request->all();

        Sayac::where('id', $id)->update([
                                         'uyedernek' => $request->uyedernek,
                                         'uyefederasyon' =>   $request->uyefederasyon,
                                         'uyekonfederasyon' =>   $request->uyekonfederasyon,
                                         'ziyaretci' =>   $request->ziyaretci,
    ]);

        return redirect()->route('sayac.form',['id' => 1])->with('status','ok');
    }
}
