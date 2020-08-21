<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Logolar;
use App\Http\Requests\LogolarFormRequest;
use Storage;
use Image;

class LogolarController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Logo Güncelle';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'logo' => [
                'type' => 'image',
                'title' => 'logo'
            ],
            'footerlogo' => [
                'type' => 'image',
                'title' => 'footerlogo'
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
        $this->veriler = Logolar::select([
            'id',
            'logo',
            'footerlogo',
            'created_at',
            'updated_at'
        ]);
    }

    public function logolarForm(int $id = null)
    {
        $logolar = $id ? Logolar::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.logolarForm', compact('logolar'));
    }

    public function logoGuncelle(int $id, LogolarFormRequest $request){

        $request->all();
        if ($request->logo != '' && $request->footerlogo == '') {
        
        $file = Storage::put('trash', $request->logo);
        $ext = $request->logo->getClientOriginalExtension();

        $new_name = 'logo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $logolar = Logolar::where('id', $id)->first();

        $logolar->logo = $ext.'/'.$new_name;

            Logolar::where('id', $id)->update([
                'logo' => $logolar->logo
]);
        } else if($request->footerlogo != '' && $request->logo == ''){
        $file = Storage::put('trash', $request->footerlogo);
        $ext = $request->footerlogo->getClientOriginalExtension();

        $new_name = 'footerlogo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $logolar = Logolar::where('id', $id)->first();

        $logolar->footerlogo = $ext.'/'.$new_name;

            Logolar::where('id', $id)->update([
                'footerlogo' => $logolar->footerlogo
]);
        }else{
//logo
        $file = Storage::put('trash', $request->logo);
        $ext = $request->logo->getClientOriginalExtension();

        $new_name = 'logo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $logolar = Logolar::where('id', $id)->first();

        $logolar->logo = $ext.'/'.$new_name;

        $file = Storage::put('trash', $request->footerlogo);
        $ext = $request->footerlogo->getClientOriginalExtension();
//footerlogo
        $new_name = 'footerlogo_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $logolar = Logolar::where('id', $id)->first();

        $logolar->footerlogo = $ext.'/'.$new_name;

        Logolar::where('id', $id)->update([
            'logo' => $logolar->logo,
            'footerlogo' => $logolar->footerlogo
]);


        }

        return redirect()->route('logolar.form',['id' => 1])->with('status','ok');
    }

    public function logo(int $id ){

        $query = Logolar::where('id', $id)->firstOrFail();
        if (Storage::exists($query->logo))
        {
            $get = Storage::get($query->logo);

            $image = Image::make($get);
            $image = $image->resize(80, 80);

            return $image->response('png', 100);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function footerlogo(int $id ){

        $query = Logolar::where('id', $id)->firstOrFail();
        if (Storage::exists($query->footerlogo))
        {
            $get = Storage::get($query->footerlogo);

            $image = Image::make($get);
            $image = $image->resize(180, 180);

            return $image->response('png', 100);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }

    public function logolarMaster()
    {
        $logolar = DB::table('logolar')->select('logo','footerlogo')->first(); 
        return view('master', compact('logolar'));
    }
}
