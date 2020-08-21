<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Misyon;
use App\Http\Requests\MisyonFormRequest;
use Storage;
use Image;

class MisyonController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Misyon Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'misyonfoto' => [
                'type' => 'image',
                'title' => 'misyonfoto'
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
        $this->veriler = Misyon::select([
            'id',
            'misyonfoto',
            'yazi',
            'created_at',
            'updated_at'
        ]);
    }

    public function misyonIcerik()
    {
        $misyon = DB::table('misyon')->select('misyonfoto','yazi')->first(); 
        $iletisim = DB::table('iletisim')->select('email','adres')->first();  
        return view('misyon', compact('misyon','iletisim'));
    }

    public function misyonForm(int $id = null)
    {
        $misyon = $id ? Misyon::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.misyonForm', compact('misyon'));
    }

    public function misyonGuncelle(int $id, MisyonFormRequest $request){

        $request->all();
        if ($request->misyonfoto != '' ) {
        
        $file = Storage::put('trash', $request->misyonfoto);
        $ext = $request->misyonfoto->getClientOriginalExtension();

        $new_name = 'misyon_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $misyon = Misyon::where('id', $id)->first();

        $misyon->misyonfoto = $ext.'/'.$new_name;

            Misyon::where('id', $id)->update([
                'misyonfoto' => $misyon->misyonfoto,
                'yazi' =>   $request->yazi,
]);
        } else {
            Misyon::where('id', $id)->update([
                'yazi' =>   $request->yazi,
]);
        }

        return redirect()->route('misyon.form',['id' => 1])->with('status','ok');
    }

    public function misyonfoto(int $id ){

        $query = Misyon::where('id', $id)->firstOrFail();
        if (Storage::exists($query->misyonfoto))
        {
            $get = Storage::get($query->misyonfoto);

            $image = Image::make($get);
            $image = $image->fit(340, 380);

            return $image->response('jpeg', 100);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }
}
