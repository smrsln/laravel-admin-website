<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aksakallilar;
use App\Http\Requests\AksakallilarFormRequest;
use Storage;
use Image;

class AksakallilarController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Aksakallılar Kurulu Üyeleri';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'aksakalli_ad_soyad' => [
                'type' => 'string',
                'title' => 'Ad-Soyad'
            ],
            'aksakallifoto' => [
                'type' => 'image',
                'title' => 'YK Üye Fotoğrafı'
            ],
            'aksakalli_ozgecmis' => [
                'type' => 'string',
                'title' => 'Özgeçmiş'
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
        $this->veriler = Aksakallilar::select([
            'id',
            'aksakalli_ad_soyad',
            'aksakallifoto',
            'aksakalli_ozgecmis',
            'created_at',
            'updated_at'
        ])->paginate(15);
    }

    public function listele()
    {

        return view('yorukadmin.listele', [
            'veriler' => $this->veriler,
            'listebasliklar' => $this->listebasliklar,
            'bandbaslik' => $this->bandbaslik,
            'name' => 'aksakallilar'
        ]);
    }

    public function aksakallilarForm(int $id = null)
    {
        $aksakallilar = $id ? Aksakallilar::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.aksakallilarForm', compact('aksakallilar'));
    }

    public function aksakallilarKaydet(int $id = null, AksakallilarFormRequest $request)
    {
        $file = Storage::put('trash', $request->aksakallifoto);
        $ext = $request->aksakallifoto->getClientOriginalExtension();

        $new_name = 'aksakallifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $aksakallilar = Aksakallilar::where('id', $id)->first();

        if (!@$aksakallilar)
        {
            $aksakallilar = new Aksakallilar;
        }

        $aksakallilar->fill($request->all());
        $aksakallilar->aksakallifoto = $ext.'/'.$new_name;
        $aksakallilar->save();

        if ($id)
        {
            return view('yorukadmin.aksakallilarForm', [ 'aksakallilar' => $aksakallilar, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('aksakallilar.liste');
        }
    }

    public function aksakallilarSil(int $id){

        Aksakallilar::where('id', $id)->delete();

        return redirect()->route('aksakallilar.liste')->with('status','ok');
    }

    public function aksakallilarOgeler()
    {
        $veriler = DB::table('aksakallilar')->select('id','aksakallifoto','aksakalli_ad_soyad','aksakalli_ozgecmis')->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('aksakallilar', [
            'veriler' => $veriler,
            'iletisim' => $iletisim         

        ]);
    }

    public function aksakallilarGuncelle(int $id, AksakallilarFormRequest $request){

        $request->all();
        if ($request->aksakallifoto != '' ) {
        
        $file = Storage::put('trash', $request->aksakallifoto);
        $ext = $request->aksakallifoto->getClientOriginalExtension();

        $new_name = 'aksakallifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $aksakallilar = Aksakallilar::where('id', $id)->first();

        $aksakallilar->aksakallifoto = $ext.'/'.$new_name;

            Aksakallilar::where('id', $id)->update([
                'aksakallifoto' => $aksakallilar->aksakallifoto,
                'aksakalli_ad_soyad' =>   $request->aksakalli_ad_soyad,
                'aksakalli_ozgecmis' =>   $request->aksakalli_ozgecmis
]);
        } else {
            Aksakallilar::where('id', $id)->update([
                'aksakalli_ad_soyad' =>   $request->aksakalli_ad_soyad,
                'aksakalli_ozgecmis' =>   $request->aksakalli_ozgecmis
]);
        }

        return redirect()->route('aksakallilar.form',['id' => $id])->with('status','ok');
    }

    public function aksakallifoto(int $id){

        $query = Aksakallilar::where('id', $id)->firstOrFail();
        if (Storage::exists($query->aksakallifoto))
        {
            $get = Storage::get($query->aksakallifoto);

            $image = Image::make($get);
            //$image = $image->fit(200, 600);

            return $image->response('jpeg', 90);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }


}