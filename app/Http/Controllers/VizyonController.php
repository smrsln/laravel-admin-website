<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vizyon;
use App\Http\Requests\VizyonFormRequest;
use Storage;
use Image;

class VizyonController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Vizyon Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'vizyonfoto' => [
                'type' => 'image',
                'title' => 'vizyonfoto'
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
        $this->veriler = Vizyon::select([
            'id',
            'vizyonfoto',
            'yazi',
            'created_at',
            'updated_at'
        ]);
    }

    public function vizyonIcerik()
    {
        $vizyon = DB::table('vizyon')->select('vizyonfoto','yazi')->first(); 
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('vizyon', compact('vizyon','iletisim'));
    }

    public function vizyonForm(int $id = null)
    {
        $vizyon = $id ? Vizyon::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.vizyonForm', compact('vizyon'));
    }

    public function vizyonGuncelle(int $id, VizyonFormRequest $request){

        $request->all();
        if ($request->vizyonfoto != '' ) {
        
        $file = Storage::put('trash', $request->vizyonfoto);
        $ext = $request->vizyonfoto->getClientOriginalExtension();

        $new_name = 'vizyon_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $vizyon = Vizyon::where('id', $id)->first();

        $vizyon->vizyonfoto = $ext.'/'.$new_name;

            Vizyon::where('id', $id)->update([
                'vizyonfoto' => $vizyon->vizyonfoto,
                'yazi' =>   $request->yazi,
]);
        } else {
            Vizyon::where('id', $id)->update([
                'yazi' =>   $request->yazi,
]);
        }

        return redirect()->route('vizyon.form',['id' => 1])->with('status','ok');
    }

    public function vizyonfoto(int $id ){

        $query = Vizyon::where('id', $id)->firstOrFail();
        if (Storage::exists($query->vizyonfoto))
        {
            $get = Storage::get($query->vizyonfoto);

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
