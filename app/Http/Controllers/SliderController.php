<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Requests\SliderFormRequest;
use Storage;
use Image;

class SliderController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Slider İçerikleri';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'sliderlink' => [
                'type' => 'string',
                'title' => 'Link'
            ],
            'sliderfoto' => [
                'type' => 'image',
                'title' => 'Görsel'
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
        $this->veriler = Slider::select([
            'id',
            'sliderlink',
            'sliderfoto',
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
            'name' => 'slider'
        ]);
    }

    public function sliderForm(int $id = null)
    {
        $slider = $id ? Slider::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.sliderForm', compact('slider'));
    }

    public function sliderKaydet(int $id = null, SliderFormRequest $request)
    {
        $file = Storage::put('trash', $request->sliderfoto);
        $ext = $request->sliderfoto->getClientOriginalExtension();

        $new_name = 'sliderfoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $slider = Slider::where('id', $id)->first();

        if (!@$slider)
        {
            $slider = new Slider;
        }

        $slider->fill($request->all());
        $slider->sliderfoto = $ext.'/'.$new_name;
        if ($slider->sliderlink == '' || $slider->sliderlink == null){
            $slider->sliderlink = '#';
        }
        $slider->save();

        if ($id)
        {
            return view('yorukadmin.sliderForm', [ 'slider' => $slider, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('slider.liste');
        }
    }

    public function sliderSil(int $id){

        Slider::where('id', $id)->delete();

        return redirect()->route('slider.liste')->with('status','ok');
    }

    public function sliderGuncelle(int $id, SliderFormRequest $request){

        $request->all();
        if ($request->sliderfoto != '' ) {
        
        $file = Storage::put('trash', $request->sliderfoto);
        $ext = $request->sliderfoto->getClientOriginalExtension();

        $new_name = 'sliderfoto_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $slider = Slider::where('id', $id)->first();

        $slider->sliderfoto = $ext.'/'.$new_name;

            Slider::where('id', $id)->update([
                'sliderfoto' => $slider->sliderfoto,
                'sliderlink' =>   $request->sliderlink
]);
        } else {
            Slider::where('id', $id)->update([
                'sliderlink' =>   $request->sliderlink
]);
        }

        return redirect()->route('slider.form',['id' => $id])->with('status','ok');
    }

    public function sliderfoto(int $id){
        $query = Slider::where('id', $id)->firstOrFail();
        if (Storage::exists($query->sliderfoto))
        {
            $get = Storage::get($query->sliderfoto);

            $image = Image::make($get);
            //$image = $image->fit(200, 600);

            return $image->response('jpeg', 80);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }


}