<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Etkinlik;
use App\Etkinlikfoto;
use App\Http\Requests\EtkinlikFormRequest;
use Storage;
use Image;


class EtkinlikController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Etkinlikler';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'baslik' => [
                'type' => 'string',
                'title' => 'Başlık'
            ],
            'gorsel' => [
                'type' => 'image',
                'title' => 'Görsel'
            ],
            'yazi' => [
                'type' => 'string',
                'title' => 'Yazı'
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
        $this->veriler = Etkinlik::select([
            'id',
            'baslik',
            'gorsel',
            'yazi',
            'slug',
            'created_at',
            'updated_at'
        ])->orderBy('id', 'desc')->paginate(10);
    }

    public function listele()
    {

        return view('yorukadmin.listele', [
            'veriler' => $this->veriler,
            'listebasliklar' => $this->listebasliklar,
            'bandbaslik' => $this->bandbaslik,
            'name' => 'etkinlik'
        ]);
    }

    public function etkinlikForm(int $id = null)
    {
        $etkinlik = $id ? Etkinlik::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.etkinlikForm', compact('etkinlik'));
    }

    public function etkinlikKaydet(int $id = null, EtkinlikFormRequest $request)
    {

        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $etkinlik = Etkinlik::where('id', $id)->first();

        if (!@$etkinlik)
        {
            $etkinlik = new Etkinlik;
        }

        $etkinlik->fill($request->except('foto'));
        $etkinlik->gorsel = $ext.'/'.$new_name;
        $etkinlik->save();

        if (@$request->foto){
        foreach ($request->foto as $key => $value) {
        
        $file = Storage::put('trash', $value);
        $ext = $value->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $fotograflar = Etkinlikfoto::where('id', $id)->first();

        if (!@$fotograflar)
        {
            $fotograflar = new Etkinlikfoto;
        }

        $etkinlik_id = DB::table('etkinlik')->max('id');

        $fotograflar->fill($request->foto);
        $fotograflar->foto = $ext.'/'.$new_name;
        $fotograflar->etkinlik_id = $etkinlik_id;
        $fotograflar->save();
       }
   }
        if ($id)
        {
            return view('yorukadmin.etkinlikForm', [ 'etkinlik' => $etkinlik, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('etkinlik.liste');
        }
    }

    public function etkinlikSil(int $id){

        Etkinlik::where('id', $id)->delete();

        return redirect()->route('etkinlik.liste')->with('status','ok');
    }

    public function etkinlikGuncelle(int $id, EtkinlikFormRequest $request)
    {

        $request->all();
        $etkinlik = Etkinlik::where('id', $id)->first();
        $etkinlik->fill($request->except('foto'));
        //$etkinlik->save();

        if (@$request->foto){
        foreach ($request->foto as $key => $value) {
        
        $file = Storage::put('trash', $value);
        $ext = $value->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);
        $fotograflar = new Etkinlikfoto;

        $etkinlik_id = $request->id;

        $fotograflar->fill($request->foto);
        $fotograflar->foto = $ext.'/'.$new_name;
        $fotograflar->etkinlik_id = $etkinlik_id;
        $fotograflar->save();
       }
   }
        if (empty($etkinlik->gorsel)){
        Etkinlik::where('id', $id)->update(['baslik' => $etkinlik->baslik,
                                            'yazi' =>   $etkinlik->yazi
    ]);
        }else {
        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();
        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;
        Storage::move($file, $ext.'/'.$new_name);
        $etkinlik->gorsel = $ext.'/'.$new_name;

            Etkinlik::where('id', $id)->update(['baslik' => $etkinlik->baslik,
                                                'yazi' =>   $etkinlik->yazi,
                                                'gorsel' => $etkinlik->gorsel
    ]);
        }

        return redirect()->route('etkinlik.form')->with('status','ok');
    }

    public function etkinlikogeler()
    {
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('yaptiklarimiz', [
            'veriler' => $this->veriler,
            'iletisim' => $iletisim      

        ]);
    }

    public function etkinlikIcerik(string $slug = null)
    {
        $etkinlik = $slug ? Etkinlik::where('slug', $slug)->firstOrFail() : null;
        $id = DB::table('etkinlik')->where('slug', $slug)->value('id');
        $fotogaleri = Etkinlikfoto::where('etkinlik_id',$id)->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first();    
        return view('etkinlikicerik', compact('etkinlik','fotogaleri','iletisim'));


    }


    public function resim(int $id ){

        $query = Etkinlik::where('id', $id)->firstOrFail();
        if (Storage::exists($query->gorsel))
        {
            $get = Storage::get($query->gorsel);

            $image = Image::make($get);
            //$image = $image->fit(200, 600);

            return $image->response('jpeg', 50);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function etkinlikindex(int $id ){

        $query = Etkinlik::where('id', $id)->firstOrFail();
        if (Storage::exists($query->gorsel))
        {
            $get = Storage::get($query->gorsel);

            $image = Image::make($get);
            $image = $image->fit(1140, 400);

            return $image->response('jpeg', 60);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function etkinlikmain(int $id ){

        $query = Etkinlik::where('id', $id)->firstOrFail();
        if (Storage::exists($query->gorsel))
        {
            $get = Storage::get($query->gorsel);

            $image = Image::make($get);
            $image = $image->fit(251, 288);

            return $image->response('jpeg', 50);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function fotogaleribuyuk(int $id ){

        $query = Etkinlikfoto::where('id', $id)->firstOrFail();
        if (Storage::exists($query->foto))
        {
            $get = Storage::get($query->foto);

            $image = Image::make($get);
            //$image = $image->fit(200, 600);

            return $image->response('jpeg', 90);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function fotogalerikucuk(int $id ){

        $query = Etkinlikfoto::where('id', $id)->firstOrFail();
        if (Storage::exists($query->foto))
        {
            $get = Storage::get($query->foto);

            $image = Image::make($get);
            $image = $image->fit(300, 200);

            return $image->response('jpeg', 50);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }


}
