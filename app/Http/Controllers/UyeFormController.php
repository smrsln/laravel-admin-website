<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\UyeFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UyeForm;
use App\Http\Requests\UyeFormRequest;
use Storage;

class UyeFormController extends Controller
{
    public function uyeFormKaydet(int $id = null, UyeFormRequest $request)
    {
        //Dilekçe işlemleri
        $file1 = Storage::put('trash', $request->dilekce);
        $ext = $request->dilekce->getClientOriginalExtension();
        $new_dilekce = 'dilekce_'.rand(10, 10000).'.'.$ext;
        Storage::move($file1, 'public/dilekce/'.$new_dilekce);

        //Faaliyet Belgesi İşlemleri
        $file2 = Storage::put('trash', $request->faaliyet_belgesi);
        $ext = $request->faaliyet_belgesi->getClientOriginalExtension();
        $new_faaliyet_belgesi = 'faaliyet_belgesi_'.rand(10, 10000).'.'.$ext;
        Storage::move($file2, 'public/faaliyet_belgesi/'.$new_faaliyet_belgesi);

        //Üçüncü Karar Belgesi İşlemleri
        $file3 = Storage::put('trash', $request->ucuncu_karar);
        $ext = $request->ucuncu_karar->getClientOriginalExtension();
        $new_ucuncu_karar = 'ucuncu_karar_'.rand(10, 10000).'.'.$ext;
        Storage::move($file3, 'public/ucuncu_karar/'.$new_ucuncu_karar);

        //İmza Sirküsü İşlemleri
        $file4 = Storage::put('trash', $request->imza_sirku);
        $ext = $request->imza_sirku->getClientOriginalExtension();
        $new_imza_sirku = 'imza_sirku_'.rand(10, 10000).'.'.$ext;
        Storage::move($file4, 'public/imza_sirku/'.$new_imza_sirku);

        //Delege Bilgisi İşlemleri
        $file5 = Storage::put('trash', $request->delege_bilgi);
        $ext = $request->delege_bilgi->getClientOriginalExtension();
        $new_delege_bilgi = 'delege_bilgi_'.rand(10, 10000).'.'.$ext;
        Storage::move($file5, 'public/delege_bilgi/'.$new_delege_bilgi);

        $uyeform = UyeForm::where('id', $id)->first();

        if (!@$uyeform)
        {
            $uyeform = new UyeForm;
        }

        $uyeform->fill($request->all());
        $uyeform->dilekce = 'dilekce/'.$new_dilekce;
        $uyeform->faaliyet_belgesi = 'faaliyet_belgesi/'.$new_faaliyet_belgesi;
        $uyeform->ucuncu_karar = 'ucuncu_karar/'.$new_ucuncu_karar;
        $uyeform->imza_sirku = 'imza_sirku/'.$new_imza_sirku;
        $uyeform->delege_bilgi = 'delege_bilgi/'.$new_delege_bilgi;
        $uyeform->save();
  
            
                $email = DB::table('uyeform')->latest('id')->first();

                $data = array(
                    'dernek_adi' =>$email->dernek_adi,
                    'dernek_no' =>$email->dernek_no,
                    'dernek_adres' =>$email->dernek_adres,
                    'dernek_tel' =>$email->dernek_tel,
                    'dernek_baskan' =>$email->dernek_baskan,
                    'dernek_amac' =>$email->dernek_amac,
                    'dilekce' =>$email->dilekce,
                    'faaliyet_belgesi' =>$email->faaliyet_belgesi,
                    'ucuncu_karar' =>$email->ucuncu_karar,
                    'imza_sirku' =>$email->imza_sirku,
                    'delege_bilgi' =>$email->delege_bilgi,
                );
            
                Mail::to('ttdytbmerkez@gmail.com')->send(new UyeFormMail($data));
                // ttdytbmerkez@gmail.com

                return redirect()
                ->back()
                ->withInput()
                ->with('success','Başvurunuz Başarıyla Gerçekleştirilmiştir.');
    }

    public function dilekceindir(string $download){
        return Storage::download('public/dilekce/'.$download);
    }
    public function faaliyetindir(string $download){
        return Storage::download('public/faaliyet_belgesi/'.$download);
    }
    public function kararindir(string $download){
        return Storage::download('public/ucuncu_karar/'.$download);
    }
    public function sirkuindir(string $download){
        return Storage::download('public/imza_sirku/'.$download);
    }
    public function delegeindir(string $download){
        return Storage::download('public/delege_bilgi/'.$download);
    }

    public function uyeFormOgeler(){
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('uye-basvuru', compact('iletisim'));
    }
}