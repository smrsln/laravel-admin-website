<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bacibeyler;
use App\Http\Requests\BacibeylerFormRequest;
use Storage;
use Image;

class BacibeylerController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Bacıbeyler Kurulu Üyeleri';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'baci_ad_soyad' => [
                'type' => 'string',
                'title' => 'Ad-Soyad'
            ],
            'bacifoto' => [
                'type' => 'image',
                'title' => 'Üye Fotoğrafı'
            ],
            'baci_ozgecmis' => [
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
        $this->veriler = Bacibeyler::select([
            'id',
            'baci_ad_soyad',
            'bacifoto',
            'baci_ozgecmis',
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
            'name' => 'bacibeyler'
        ]);
    }

    public function bacibeylerForm(int $id = null)
    {
        $bacibeyler = $id ? Bacibeyler::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.bacibeylerForm', compact('bacibeyler'));
    }

    public function bacibeylerKaydet(int $id = null, BacibeylerFormRequest $request)
    {
        $file = Storage::put('trash', $request->bacifoto);
        $ext = $request->bacifoto->getClientOriginalExtension();

        $new_name = 'bacifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $bacibeyler = Bacibeyler::where('id', $id)->first();

        if (!@$bacibeyler)
        {
            $bacibeyler = new Bacibeyler;
        }

        $bacibeyler->fill($request->all());
        $bacibeyler->bacifoto = $ext.'/'.$new_name;
        $bacibeyler->save();

        if ($id)
        {
            return view('yorukadmin.bacibeylerForm', [ 'bacibeyler' => $bacibeyler, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('bacibeyler.liste');
        }
    }

    public function bacibeylerSil(int $id){

        Bacibeyler::where('id', $id)->delete();

        return redirect()->route('bacibeyler.liste')->with('status','ok');
    }

    public function bacibeylerOgeler()
    {
        $veriler = DB::table('bacibeyler')->select('id','bacifoto','baci_ad_soyad','baci_ozgecmis')->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('bacibeyler', [
            'veriler' => $veriler,
            'iletisim' => $iletisim        

        ]);
    }

    public function bacibeylerGuncelle(int $id, BacibeylerFormRequest $request){

        $request->all();
        if ($request->bacifoto != '' ) {
        
        $file = Storage::put('trash', $request->bacifoto);
        $ext = $request->bacifoto->getClientOriginalExtension();

        $new_name = 'bacifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $bacibeyler = Bacibeyler::where('id', $id)->first();

        $bacibeyler->bacifoto = $ext.'/'.$new_name;

            Bacibeyler::where('id', $id)->update([
                'bacifoto' => $bacibeyler->bacifoto,
                'baci_ad_soyad' =>   $request->baci_ad_soyad,
                'baci_ozgecmis' =>   $request->baci_ozgecmis
]);
        } else {
            Bacibeyler::where('id', $id)->update([
                'baci_ad_soyad' =>   $request->baci_ad_soyad,
                'baci_ozgecmis' =>   $request->baci_ozgecmis
]);
        }

        return redirect()->route('bacibeyler.form',['id' => $id])->with('status','ok');
    }

    public function bacifoto(int $id){

        $query = Bacibeyler::where('id', $id)->firstOrFail();
        if (Storage::exists($query->bacifoto))
        {
            $get = Storage::get($query->bacifoto);

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