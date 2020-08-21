<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NedenKuruldu;
use App\Http\Requests\NedenKurulduFormRequest;

class NedenKurulduController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Neden Kuruldu Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'yazi' => [
                'type' => 'string',
                'title' => 'yazi'
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
        $this->veriler = NedenKuruldu::select([
            'id',
            'yazi',
            'created_at',
            'updated_at'
        ]);
    }

    public function nedenKurulduForm(int $id = null)
    {
        $nedenkuruldu = $id ? NedenKuruldu::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.nedenKurulduForm', compact('nedenkuruldu'));
    }

    public function nedenKurulduGuncelle(int $id, NedenKurulduFormRequest $request){

            $request->all();
            NedenKuruldu::where('id', $id)->update([
                'yazi' =>   $request->yazi,
]);

        return redirect()->route('nedenkuruldu.form',['id' => 1])->with('status','ok');
    }

}
