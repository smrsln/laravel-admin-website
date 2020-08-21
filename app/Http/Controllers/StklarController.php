<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Stklar;
use App\Http\Requests\StklarFormRequest;
use Storage;
use Image;

class StklarController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm STK\'lar';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'stkadi' => [
                'type' => 'string',
                'title' => 'STK Ad'
            ],
            'stklogo' => [
                'type' => 'image',
                'title' => 'STK Logosu'
            ],
            'link' => [
                'type' => 'string',
                'title' => 'Bağlantı Adresi'
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
        $this->veriler = Stklar::select([
            'id',
            'stkadi',
            'stklogo',
            'link',
            'created_at',
            'updated_at'
        ])->paginate(10);
    }

    public function listele()
    {

        return view('yorukadmin.listele', [
            'veriler' => $this->veriler,
            'listebasliklar' => $this->listebasliklar,
            'bandbaslik' => $this->bandbaslik,
            'name' => 'stklar'
        ]);
    }

    public function stklarForm(int $id = null)
    {
        $stklar = $id ? Stklar::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.stklarForm', compact('stklar'));
    }

    public function stklarKaydet(int $id = null, StklarFormRequest $request)
    {
        $file = Storage::put('trash', $request->stklogo);
        $ext = $request->stklogo->getClientOriginalExtension();

        $new_name = 'stklogo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $stklar = Stklar::where('id', $id)->first();

        if (!@$stklar)
        {
            $stklar = new Stklar;
        }

        $stklar->fill($request->all());
        $stklar->stklogo = $ext.'/'.$new_name;
        $stklar->save();

        if ($id)
        {
            return view('yorukadmin.stklarForm', [ 'stklar' => $stklar, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('stklar.liste');
        }
    }

    public function stklarSil(int $id){

        Stklar::where('id', $id)->delete();

        return redirect()->route('stklar.liste')->with('status','ok');
    }

    public function stklarOgeler()
    {
        $veriler= DB::table('stklar')->select('id','stklogo','stkadi','link')->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('stklar', [
            'veriler' => $veriler,
            'iletisim' => $iletisim

        ]);
    }

    public function stklarGuncelle(int $id, StklarFormRequest $request){

        $request->all();
        if ($request->stklogo != '' ) {
        
        $file = Storage::put('trash', $request->stklogo);
        $ext = $request->stklogo->getClientOriginalExtension();

        $new_name = 'stklogo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $stklar = Stklar::where('id', $id)->first();

        $stklar->stklogo = $ext.'/'.$new_name;

            Stklar::where('id', $id)->update([
                'stklogo' => $stklar->delikanlifoto,
                'stkadi' =>   $request->stkadi,
                'link' =>   $request->link
]);
        } else {
            Stklar::where('id', $id)->update([
                'stkadi' =>   $request->stkadi,
                'link' =>   $request->link
]);
        }

        return redirect()->route('stklar.form',['id' => $id])->with('status','ok');
    }

    public function stklogo(int $id){

        $query = Stklar::where('id', $id)->firstOrFail();
        if (Storage::exists($query->stklogo))
        {
            $get = Storage::get($query->stklogo);

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