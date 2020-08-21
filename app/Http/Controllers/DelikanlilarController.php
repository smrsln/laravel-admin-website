<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Delikanlilar;
use App\Http\Requests\DelikanlilarFormRequest;
use Storage;
use Image;

class DelikanlilarController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Delikanlılar Kurulu Üyeleri';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'delikanli_ad_soyad' => [
                'type' => 'string',
                'title' => 'Ad-Soyad'
            ],
            'delikanlifoto' => [
                'type' => 'image',
                'title' => 'YK Üye Fotoğrafı'
            ],
            'delikanli_ozgecmis' => [
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
        $this->veriler = Delikanlilar::select([
            'id',
            'delikanli_ad_soyad',
            'delikanlifoto',
            'delikanli_ozgecmis',
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
            'name' => 'delikanlilar'
        ]);
    }

    public function delikanlilarForm(int $id = null)
    {
        $delikanlilar = $id ? Delikanlilar::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.delikanlilarForm', compact('delikanlilar'));
    }

    public function delikanlilarKaydet(int $id = null, DelikanlilarFormRequest $request)
    {
        $file = Storage::put('trash', $request->delikanlifoto);
        $ext = $request->delikanlifoto->getClientOriginalExtension();

        $new_name = 'delikanlifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $delikanlilar = Delikanlilar::where('id', $id)->first();

        if (!@$delikanlilar)
        {
            $delikanlilar = new Delikanlilar;
        }

        $delikanlilar->fill($request->all());
        $delikanlilar->delikanlifoto = $ext.'/'.$new_name;
        $delikanlilar->save();

        if ($id)
        {
            return view('yorukadmin.delikanlilarForm', [ 'delikanlilar' => $delikanlilar, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('delikanlilar.liste');
        }
    }

    public function delikanlilarSil(int $id){

        Delikanlilar::where('id', $id)->delete();

        return redirect()->route('delikanlilar.liste')->with('status','ok');
    }

    public function delikanlilarOgeler()
    {
        $veriler = DB::table('delikanlilar')->select('id','delikanlifoto','delikanli_ad_soyad','delikanli_ozgecmis')->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first();  
        return view('delikanlilar', [
            'veriler' => $veriler,
            'iletisim' => $iletisim            

        ]);
    }

    public function delikanlilarGuncelle(int $id, DelikanlilarFormRequest $request){

        $request->all();
        if ($request->delikanlifoto != '' ) {
        
        $file = Storage::put('trash', $request->delikanlifoto);
        $ext = $request->delikanlifoto->getClientOriginalExtension();

        $new_name = 'delikanlifoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $delikanlilar = Delikanlilar::where('id', $id)->first();

        $delikanlilar->delikanlifoto = $ext.'/'.$new_name;

            Delikanlilar::where('id', $id)->update([
                'delikanlifoto' => $delikanlilar->delikanlifoto,
                'delikanli_ad_soyad' =>   $request->delikanli_ad_soyad,
                'delikanli_ozgecmis' =>   $request->delikanli_ozgecmis
]);
        } else {
            Delikanlilar::where('id', $id)->update([
                'delikanli_ad_soyad' =>   $request->delikanli_ad_soyad,
                'delikanli_ozgecmis' =>   $request->delikanli_ozgecmis
]);
        }

        return redirect()->route('delikanlilar.form',['id' => $id])->with('status','ok');
    }

    public function delikanlifoto(int $id){

        $query = Delikanlilar::where('id', $id)->firstOrFail();
        if (Storage::exists($query->delikanlifoto))
        {
            $get = Storage::get($query->delikanlifoto);

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