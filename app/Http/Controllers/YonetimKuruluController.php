<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\YonetimKurulu;
use App\Http\Requests\YonetimKuruluFormRequest;
use Storage;
use Image;

class YonetimKuruluController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Yönetim Kurulu Üyeleri';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'yk_ad_soyad' => [
                'type' => 'string',
                'title' => 'Ad-Soyad'
            ],
            'ykfoto' => [
                'type' => 'image',
                'title' => 'YK Üye Fotoğrafı'
            ],
            'yk_ozgecmis' => [
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
        $this->veriler = YonetimKurulu::select([
            'id',
            'yk_ad_soyad',
            'ykfoto',
            'yk_ozgecmis',
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
            'name' => 'yonetimkurulu'
        ]);
    }

    public function yonetimKuruluForm(int $id = null)
    {
        $ykurulu = $id ? YonetimKurulu::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.yonetimKuruluForm', compact('ykurulu'));
    }

    public function yonetimKuruluKaydet(int $id = null, YonetimKuruluFormRequest $request)
    {
        $file = Storage::put('trash', $request->ykfoto);
        $ext = $request->ykfoto->getClientOriginalExtension();

        $new_name = 'ykfoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $ykurulu = YonetimKurulu::where('id', $id)->first();

        if (!@$ykurulu)
        {
            $ykurulu = new YonetimKurulu;
        }

        $ykurulu->fill($request->all());
        $ykurulu->ykfoto = $ext.'/'.$new_name;
        $ykurulu->save();

        if ($id)
        {
            return view('yorukadmin.yonetimKuruluForm', [ 'yonetimkurulu' => $ykurulu, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('yonetimkurulu.liste');
        }
    }

    public function yonetimKuruluSil(int $id){

        YonetimKurulu::where('id', $id)->delete();

        return redirect()->route('yonetimkurulu.liste')->with('status','ok');
    }

    public function yonetimKuruluOgeler()
    {
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        $veriler = DB::table('yonetim_kurulu')->select('id','ykfoto','yk_ad_soyad','yk_ozgecmis')->whereNull('deleted_at')->orderBy('id', 'asc')->get(); 
        return view('yonetimkurulu', [
            'veriler' => $veriler,
            'iletisim' => $iletisim         

        ]);
    }

    public function yonetimKuruluGuncelle(int $id, YonetimKuruluFormRequest $request){

        $request->all();
        if ($request->ykfoto != '' ) {
        
        $file = Storage::put('trash', $request->ykfoto);
        $ext = $request->ykfoto->getClientOriginalExtension();

        $new_name = 'ykfoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $ykurulu = YonetimKurulu::where('id', $id)->first();

        $ykurulu->ykfoto = $ext.'/'.$new_name;

            YonetimKurulu::where('id', $id)->update([
                'ykfoto' => $ykurulu->ykfoto,
                'yk_ad_soyad' =>   $request->yk_ad_soyad,
                'yk_ozgecmis' =>   $request->yk_ozgecmis
]);
        } else {
            YonetimKurulu::where('id', $id)->update([
                'yk_ad_soyad' =>   $request->yk_ad_soyad,
                'yk_ozgecmis' =>   $request->yk_ozgecmis
]);
        }

        return redirect()->route('yonetimkurulu.form',['id' => $id])->with('status','ok');
    }

    public function ykfoto(int $id){

        $query = YonetimKurulu::where('id', $id)->firstOrFail();
        if (Storage::exists($query->ykfoto))
        {
            $get = Storage::get($query->ykfoto);

            $image = Image::make($get);
            $image = $image->fit(250, 260);

            return $image->response('jpeg', 90);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }


}