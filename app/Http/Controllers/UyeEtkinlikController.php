<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UyeEtkinlik;
use App\UyeEtkinlikfoto;
use App\Http\Requests\UyeEtkinlikFormRequest;
use Storage;
use Image;


class UyeEtkinlikController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Üyelerimizin Duyuruları';
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
        $this->veriler = UyeEtkinlik::select([
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
            'name' => 'uye_etkinlik'
        ]);
    }

    public function uye_etkinlikForm(int $id = null)
    {
        $uye_etkinlik = $id ? UyeEtkinlik::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.uye_etkinlikForm', compact('uye_etkinlik'));
    }

    public function uye_etkinlikKaydet(int $id = null, UyeEtkinlikFormRequest $request)
    {

        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $uye_etkinlik = UyeEtkinlik::where('id', $id)->first();

        if (!@$uye_etkinlik)
        {
            $uye_etkinlik = new UyeEtkinlik;
        }

        $uye_etkinlik->fill($request->except('foto'));
        $uye_etkinlik->gorsel = $ext.'/'.$new_name;
        $uye_etkinlik->save();

        if (@$request->foto){
        foreach ($request->foto as $key => $value) {
        
        $file = Storage::put('trash', $value);
        $ext = $value->getClientOriginalExtension();

        $new_name = 'uye_resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $fotograflar = UyeEtkinlikfoto::where('id', $id)->first();

        if (!@$fotograflar)
        {
            $fotograflar = new UyeEtkinlikfoto;
        }

        $uye_etkinlik_id = DB::table('uye_etkinlik')->max('id');

        $fotograflar->fill($request->foto);
        $fotograflar->foto = $ext.'/'.$new_name;
        $fotograflar->uye_etkinlik_id = $uye_etkinlik_id;
        $fotograflar->save();
       }
   }
        if ($id)
        {
            return view('yorukadmin.uye_etkinlikForm', [ 'uye_etkinlik' => $uye_etkinlik, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('uye_etkinlik.liste');
        }
    }

    public function uye_etkinlikSil(int $id){

        UyeEtkinlik::where('id', $id)->delete();

        return redirect()->route('uye_etkinlik.liste')->with('status','ok');
    }

    public function uye_etkinlikGuncelle(int $id, UyeEtkinlikFormRequest $request){

        $request->all();
        $uye_etkinlik = UyeEtkinlik::where('id', $id)->first();
        $uye_etkinlik->fill($request->except('foto'));

        if (@$request->foto){
            foreach ($request->foto as $key => $value) {
            
            $file = Storage::put('trash', $value);
            $ext = $value->getClientOriginalExtension();
    
            $new_name = 'uye_resim_'.rand(10, 10000).'.'.$ext;
    
            Storage::move($file, $ext.'/'.$new_name);
            $fotograflar = new UyeEtkinlikfoto;
    
            $uye_etkinlik_id = $request->id;
    
            $fotograflar->fill($request->foto);
            $fotograflar->foto = $ext.'/'.$new_name;
            $fotograflar->uye_etkinlik_id = $uye_etkinlik_id;
            $fotograflar->save();
           }
       }
       if (empty($uye_etkinlik->gorsel)){
        UyeEtkinlik::where('id', $id)->update(['baslik' => $request->baslik,
                                                'yazi' =>  $request->yazi
    ]);
       }else{
        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();
        $new_name = 'uye_resim_'.rand(10, 10000).'.'.$ext;
        Storage::move($file, $ext.'/'.$new_name);
        $uye_etkinlik->gorsel = $ext.'/'.$new_name;

        UyeEtkinlik::where('id', $id)->update(['baslik' => $etkinlik->baslik,
                                                'yazi' =>   $etkinlik->yazi,
                                                'gorsel' => $etkinlik->gorsel
    ]);
       }

        return redirect()->route('uye_etkinlik.form')->with('status','ok');
    }

    public function uye_etkinlikogeler()
    {
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('uyelerimizden', [
            'veriler' => $this->veriler,
            'iletisim' => $iletisim         
        ]);
    }

    public function uye_etkinlikIcerik(string $slug = null)
    {
        $uye_etkinlik = $slug ? UyeEtkinlik::where('slug', $slug)->firstOrFail() : null;
        $id = DB::table('uye_etkinlik')->where('slug', $slug)->value('id');
        $uye_fotogaleri = UyeEtkinlikfoto::where('uye_etkinlik_id',$id)->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('uye_etkinlikicerik', compact('uye_etkinlik','uye_fotogaleri','iletisim'));


    }


    public function uye_resim(int $id ){

        $query = UyeEtkinlik::where('id', $id)->firstOrFail();
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

    public function uye_etkinlikindex(int $id ){

        $query = UyeEtkinlik::where('id', $id)->firstOrFail();
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

    public function uye_etkinlikmain(int $id ){

        $query = UyeEtkinlik::where('id', $id)->firstOrFail();
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

    public function uye_fotogaleribuyuk(int $id ){

        $query = UyeEtkinlikfoto::where('id', $id)->firstOrFail();
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

    public function uye_fotogalerikucuk(int $id ){

        $query = UyeEtkinlikfoto::where('id', $id)->firstOrFail();
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
