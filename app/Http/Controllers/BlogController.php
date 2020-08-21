<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Http\Requests\BlogFormRequest;
use Storage;
use Image;

class BlogController extends Controller
{
    public $bandbaslik;
    public $listebasliklar;
    public $veriler;

    public function __construct()
    {
        $this->bandbaslik = 'Tüm Kamuoyu Duyuruları';
        $this->listebasliklar = [
            'id' => [
                'type' => 'string',
                'title' => 'ID'
            ],
            'baslik' => [
                'type' => 'string',
                'title' => 'Başlık'
            ],
            'gorsel' => [
                'type' => 'image',
                'title' => 'Görsel'
            ],
            'yazi' => [
                'type' => 'string',
                'title' => 'Yazı'
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
        $this->veriler = Blog::select([
            'id',
            'baslik',
            'gorsel',
            'yazi',
            'slug',
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
            'name' => 'blog'
        ]);
    }

    public function blogForm(int $id = null)
    {
        $blog = $id ? Blog::where('id', $id)->firstOrFail() : null;

        return view('yorukadmin.blogForm', compact('blog'));
    }

    public function blogKaydet(int $id = null, BlogFormRequest $request)
    {
        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $blog = Blog::where('id', $id)->first();

        if (!@$blog)
        {
            $blog = new Blog;
        }

        $blog->fill($request->all());
        $blog->gorsel = $ext.'/'.$new_name;
        $blog->save();

        if ($id)
        {
            return view('yorukadmin.blogForm', [ 'blog' => $blog, 'status' => 'ok' ]);
        }
        else
        {   
            return redirect()->route('blog.liste');
        }
    }

    public function blogSil(int $id){

        Blog::where('id', $id)->delete();

        return redirect()->route('blog.liste')->with('status','ok');
    }

    public function blogGuncelle(int $id, BlogFormRequest $request){

        $request->all();
        if ($request->gorsel != '' ) {
        
        $file = Storage::put('trash', $request->gorsel);
        $ext = $request->gorsel->getClientOriginalExtension();

        $new_name = 'resim_'.rand(10, 10000).'.'.$ext;

        Storage::move($file, $ext.'/'.$new_name);

        $blog = Blog::where('id', $id)->first();

        $blog->gorsel = $ext.'/'.$new_name;

            Blog::where('id', $id)->update([
                'gorsel' => $blog->gorsel,
                'baslik' =>   $request->baslik,
                'yazi' =>   $request->yazi
]);
        } else {
            Blog::where('id', $id)->update([
                'baslik' =>   $request->baslik,
                'yazi' =>   $request->yazi
]);
        }

        return redirect()->route('blog.form',['id' => $id])->with('status','ok');
    }

    public function blogogeler()
    {
        $veriler = DB::table('blog')->select('gorsel', 'baslik','yazi','id','slug')->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(10);
        $iletisim = DB::table('iletisim')->select('email','adres')->first(); 
        return view('blog', [
            'veriler' => $veriler,      
            'iletisim' => $iletisim
        ]);
    }

    public function blogIcerik(string $slug = null)
    {
        $blog = $slug ? Blog::where('slug', $slug)->firstOrFail() : null;
        $iletisim = DB::table('iletisim')->select('email','adres')->first();      
        return view('blogicerik', compact('blog','get','iletisim'));


    }

    public function blogAnasayfa(){
        $yazilar = DB::table('blog')->select('gorsel', 'baslik','yazi','id','slug')->whereNull('deleted_at')->orderBy('id', 'desc')->limit(5)->get();
        $uye_etkinlikler = DB::table('uye_etkinlik')->select('gorsel', 'baslik','yazi','id','slug')->whereNull('deleted_at')->orderBy('id', 'desc')->limit(3)->get();
        $etkinlikler = DB::table('etkinlik')->select('gorsel', 'baslik','yazi','id','slug')->whereNull('deleted_at')->orderBy('id', 'desc')->limit(5)->get();
        $sliderlar = DB::table('slider')->select('sliderfoto', 'sliderlink','id')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        $sayac = DB::table('sayac')->select('uyedernek', 'uyefederasyon','uyekonfederasyon','ziyaretci')->first();
        $iletisim = DB::table('iletisim')->select('email','adres')->first();
        $neden_kuruldu = DB::table('neden_kuruldu')->select('yazi')->first();
        return view('index', compact('yazilar', 'uye_etkinlikler','etkinlikler','sayac', 'sliderlar','iletisim','neden_kuruldu','logolar'));

    }

    public function resim(int $id){
        $query = Blog::where('id', $id)->firstOrFail();
        if (Storage::exists($query->gorsel))
        {
            $get = Storage::get($query->gorsel);

            $image = Image::make($get);
            //$image = $image->fit(200, 600);

            return $image->response('jpeg', 50);
        }
            
        else
            
        {
            
        return abort(404);
            
        }
    }


}