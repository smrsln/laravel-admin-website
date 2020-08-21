<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ProjeFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProjeForm;
use App\Http\Requests\ProjeFormRequest;
use Storage;

class ProjeFormController extends Controller
{
    public function projeFormKaydet(int $id = null, ProjeFormRequest $request)
    {
        //Proje işlemleri
        $file1 = Storage::put('trash', $request->proje);
        $ext = $request->proje->getClientOriginalExtension();
        $new_proje = 'proje_'.rand(10, 10000).'.'.$ext;
        Storage::move($file1, 'public/proje/'.$new_proje);

        $projeform = ProjeForm::where('id', $id)->first();

        if (!@$projeform)
        {
            $projeform = new ProjeForm;
        }

        $projeform->fill($request->all());
        $projeform->proje = 'proje/'.$new_proje;
        $projeform->save();
  
            
                $email = DB::table('projeform')->latest('id')->first();

                $data = array(
                    'dernek_adi' =>$email->dernek_adi,
                    'dernek_adres' =>$email->dernek_adres,
                    'dernek_tel' =>$email->dernek_tel,
                    'dernek_baskan' =>$email->dernek_baskan,
                    'proje_ozet' =>$email->proje_ozet,
                    'proje' =>$email->proje
                );
            
                Mail::to('ttdytbmerkez@gmail.com')->send(new ProjeFormMail($data));
                // ttdytbmerkez@gmail.com

                return redirect()
                ->back()
                ->withInput()
                ->with('success','Proje Başvurunuz Başarıyla Gerçekleştirilmiştir.');
    }
    public function projeindir(string $download){
        return Storage::download('public/proje/'.$download);
    }

    public function projeFormOgeler(){
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('proje-basvuru', compact('iletisim'));
    }
    
}
