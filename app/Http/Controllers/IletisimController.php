<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\IletisimFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Iletisim;
use App\IletisimForm;
use App\Http\Requests\IletisimFormRequest;
use Storage;
use Image;

class IletisimController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'İletişim Bilgisi Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'email' => [
                'type' => 'string',
                'title' => 'email'
            ],
            'adres' => [
                'type' => 'string',
                'title' => 'adres'
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
        $this->veriler = Iletisim::select([
            'id',
            'email',
            'adres',
            'created_at',
            'updated_at'
        ]);
    }

    public function iletisimForm(int $id = null)
    {
        $iletisim = $id ? Iletisim::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.iletisimForm', compact('iletisim'));
    }

    public function iletisimGuncelle(int $id, IletisimFormRequest $request){

        $request->all();

        Iletisim::where('id', $id)->update([
                                         'email' => $request->email,
                                         'adres' =>   $request->adres
    ]);

        return redirect()->route('iletisim.form',['id' => 1])->with('status','ok');
    }

    public function iletisimOgeler()
    {
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('iletisim', compact('iletisim'));
    }

    public function iletisimFormKaydet(int $id = null, IletisimFormRequest $request)
    {
        $iletisimform = IletisimForm::where('id', $id)->first();

        if (!@$iletisimform)
        {
            $iletisimform = new IletisimForm;
        }

        $iletisimform->fill($request->all());
        $iletisimform->save();
  
            
                $email = DB::table('iletisimform')->latest('id')->first();

                $data = array(
                    'isim' =>$email->isim,
                    'email' =>$email->email,
                    'konu' =>$email->konu,
                    'mesaj' =>$email->mesaj
                );
            
                    
                Mail::to('ttdytbmerkez@gmail.com')->send(new IletisimFormMail($data));
                // ttdytbmerkez@gmail.com

                return redirect()
                ->back()
                ->withInput()
                ->with('success','Mesajınız Başarıyla İletilmiştir.');
    }
    
}
