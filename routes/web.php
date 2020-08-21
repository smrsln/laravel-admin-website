<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BlogController@blogAnasayfa');

Route::get('/index.php','BlogController@blogAnasayfa');

Route::get('/bizkimiz.php', function () {
    return view('bizkimiz');
});
Route::get('/misyon.php', 'MisyonController@misyonIcerik');
Route::get('/vizyon.php', 'VizyonController@vizyonIcerik');
Route::get('/blog.php', 'BlogController@blogogeler' );



Route::get('/uye-basvuru.php', 'UyeFormController@uyeFormOgeler');
Route::post('/uye-basvuru.php', 'UyeFormController@uyeFormKaydet' )->name('uye_basvuru.post');

//Membership File Download Services Start
Route::get('/dilekceindir/{download}', 'UyeFormController@dilekceindir');
Route::get('/faaliyetindir/{download}', 'UyeFormController@faaliyetindir');
Route::get('/kararindir/{download}', 'UyeFormController@kararindir');
Route::get('/sirkuindir/{download}', 'UyeFormController@sirkuindir');
Route::get('/delegeindir/{download}', 'UyeFormController@delegeindir');

//Membership File Download Services End
//Project File Download Service Start
Route::get('/projeindir/{download}', 'ProjeFormController@projeindir');
//Project File Download Service End

Route::get('/proje-basvuru.php', 'ProjeFormController@projeFormOgeler');
Route::post('/proje-basvuru.php', 'ProjeFormController@projeFormKaydet' )->name('proje_basvuru.post');

Route::get('/yaptiklarimiz.php', 'EtkinlikController@etkinlikogeler' );
Route::get('/uyelerimizden.php', 'UyeEtkinlikController@uye_etkinlikogeler' );

Route::get('/gonulluluk.php', function () {
    return view('gonulluluk');
});
Route::get('/yonetimkurulu.php', 'YonetimKuruluController@yonetimKuruluOgeler' );
Route::get('/bacibeyler.php', 'BacibeylerController@bacibeylerOgeler' );
Route::get('/delikanlilar.php', 'DelikanlilarController@delikanlilarOgeler' );
Route::get('/aksakallilar.php', 'AksakallilarController@aksakallilarOgeler' );
Route::get('/stklar.php', 'StklarController@stklarOgeler' );

Route::get('/iletisim.php', 'IletisimController@iletisimOgeler' );
Route::post('/iletisim.php', 'IletisimController@iletisimFormKaydet' )->name('iletisim_basvuru.post');


Route::get('/blogicerik/{id}', function (App\Blog $sluggable) {
    return $sluggable->baslik;
});
Route::get('/blogicerik/{id}', 'BlogController@blogIcerik');
Route::get('/resim/{id}', 'BlogController@resim');

Route::get('/etkinlik/{id}', 'EtkinlikController@resim');
Route::get('/etkinlikindex/{id}', 'EtkinlikController@etkinlikindex');
Route::get('/etkinlikmain/{id}', 'EtkinlikController@etkinlikmain');

Route::get('/fotogaleribuyuk/{id}', 'EtkinlikController@fotogaleribuyuk');
Route::get('/fotogalerikucuk/{id}', 'EtkinlikController@fotogalerikucuk');


Route::get('/etkinlikicerik/{id}', function (App\Etkinlik $sluggable) {
    return $sluggable->baslik;
});
Route::get('/etkinlikicerik/{id}', 'EtkinlikController@etkinlikIcerik');


Route::get('/misyonfoto/{id}', 'MisyonController@misyonfoto');
Route::get('/vizyonfoto/{id}', 'VizyonController@vizyonfoto');
Route::get('/ykfoto/{id}', 'YonetimKuruluController@ykfoto');
Route::get('/delikanlifoto/{id}', 'DelikanlilarController@delikanlifoto');
Route::get('/aksakallifoto/{id}', 'AksakallilarController@aksakallifoto');
Route::get('/bacifoto/{id}', 'BacibeylerController@bacifoto');
Route::get('/sliderfoto/{id}', 'SliderController@sliderfoto');
Route::get('/logo/{id}', 'LogolarController@logo');
Route::get('/footerlogo/{id}', 'LogolarController@footerlogo');
Route::get('/stklogo/{id}', 'StklarController@stklogo');

Route::get('/uye_etkinlik/{id}', 'UyeEtkinlikController@uye_resim');
Route::get('/uye_etkinlikindex/{id}', 'UyeEtkinlikController@uye_etkinlikindex');
Route::get('/uye_etkinlikmain/{id}', 'UyeEtkinlikController@uye_etkinlikmain');

Route::get('/uye_fotogaleribuyuk/{id}', 'UyeEtkinlikController@uye_fotogaleribuyuk');
Route::get('/uye_fotogalerikucuk/{id}', 'UyeEtkinlikController@uye_fotogalerikucuk');


Route::get('/uye_etkinlikicerik/{id}', function (App\UyeEtkinlik $sluggable) {
    return $sluggable->baslik;
});
Route::get('/uye_etkinlikicerik/{id}', 'UyeEtkinlikController@uye_etkinlikIcerik');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('yorukadmin')->middleware('admin_kontrol')->group(function($router) {

	$router->get('/', function(){
		return view('yorukadmin.master');
	});

	Route::prefix('blog')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('blogliste', 'BlogController@listele')->name('blog.liste');
		$router->get('blog/{id?}', 'BlogController@blogForm')->name('blog.form');
		$router->post('blog/{id?}', 'BlogController@blogKaydet')->name('blog.form.post');
		$router->get('blogsil/{id?}', 'BlogController@blogSil')->name('blog.sil');
		$router->post('bloguncelle/{id?}', 'BlogController@blogGuncelle')->name('blog.guncelle');
	});

	Route::prefix('etkinlik')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('etkinlikliste', 'EtkinlikController@listele')->name('etkinlik.liste');
		$router->get('etkinlik/{id?}', 'EtkinlikController@etkinlikForm')->name('etkinlik.form');
		$router->post('etkinlik/{id?}', 'EtkinlikController@etkinlikKaydet')->name('etkinlik.form.post');
		$router->get('etkinliksil/{id?}', 'EtkinlikController@etkinlikSil')->name('etkinlik.sil');
		$router->post('etkinlikguncelle/{id?}', 'EtkinlikController@etkinlikGuncelle')->name('etkinlik.guncelle');
	});

	Route::prefix('sayac')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('sayac/{id?}', 'SayacController@sayacForm')->name('sayac.form');
		$router->post('sayacguncelle/{id?}', 'SayacController@sayacGuncelle')->name('sayac.guncelle');
	});

	Route::prefix('misyon')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('misyon/{id?}', 'MisyonController@misyonForm')->name('misyon.form');
		$router->post('misyonguncelle/{id?}', 'MisyonController@misyonGuncelle')->name('misyon.guncelle');
	});

	Route::prefix('vizyon')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('vizyon/{id?}', 'VizyonController@vizyonForm')->name('vizyon.form');
		$router->post('vizyonguncelle/{id?}', 'VizyonController@vizyonGuncelle')->name('vizyon.guncelle');
	});

	Route::prefix('yonetimkurulu')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('yonetimkurululiste', 'YonetimKuruluController@listele')->name('yonetimkurulu.liste');
		$router->get('yonetimkurulu/{id?}', 'YonetimKuruluController@yonetimKuruluForm')->name('yonetimkurulu.form');
		$router->post('yonetimkurulu/{id?}', 'YonetimKuruluController@yonetimKuruluKaydet')->name('yonetimkurulu.form.post');
		$router->get('yonetimkurulusil/{id?}', 'YonetimKuruluController@yonetimKuruluSil')->name('yonetimkurulu.sil');
		$router->post('yonetimkuruluguncelle/{id?}', 'YonetimKuruluController@yonetimKuruluGuncelle')->name('yonetimkurulu.guncelle');
	});

	Route::prefix('delikanlilar')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('delikanlilarliste', 'DelikanlilarController@listele')->name('delikanlilar.liste');
		$router->get('delikanlilar/{id?}', 'DelikanlilarController@delikanlilarForm')->name('delikanlilar.form');
		$router->post('delikanlilar/{id?}', 'DelikanlilarController@delikanlilarKaydet')->name('delikanlilar.form.post');
		$router->get('delikanlilarsil/{id?}', 'DelikanlilarController@delikanlilarSil')->name('delikanlilar.sil');
		$router->post('delikanlilarguncelle/{id?}', 'DelikanlilarController@delikanlilarGuncelle')->name('delikanlilar.guncelle');
	});

	Route::prefix('aksakallilar')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('aksakallilarliste', 'AksakallilarController@listele')->name('aksakallilar.liste');
		$router->get('aksakallilar/{id?}', 'AksakallilarController@aksakallilarForm')->name('aksakallilar.form');
		$router->post('aksakallilar/{id?}', 'AksakallilarController@aksakallilarKaydet')->name('aksakallilar.form.post');
		$router->get('aksakallilarsil/{id?}', 'AksakallilarController@aksakallilarSil')->name('aksakallilar.sil');
		$router->post('aksakallilarguncelle/{id?}', 'AksakallilarController@aksakallilarGuncelle')->name('aksakallilar.guncelle');
	});

	Route::prefix('bacibeyler')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('bacibeylerliste', 'BacibeylerController@listele')->name('bacibeyler.liste');
		$router->get('bacibeyler/{id?}', 'BacibeylerController@bacibeylerForm')->name('bacibeyler.form');
		$router->post('bacibeyler/{id?}', 'BacibeylerController@bacibeylerKaydet')->name('bacibeyler.form.post');
		$router->get('bacibeylersil/{id?}', 'BacibeylerController@bacibeylerSil')->name('bacibeyler.sil');
		$router->post('bacibeylerguncelle/{id?}', 'BacibeylerController@bacibeylerGuncelle')->name('bacibeyler.guncelle');
	});

	Route::prefix('nedenkuruldu')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('nedenkuruldu/{id?}', 'NedenKurulduController@nedenKurulduForm')->name('nedenkuruldu.form');
		$router->post('nedenkurulduguncelle/{id?}', 'NedenKurulduController@nedenKurulduGuncelle')->name('nedenkuruldu.guncelle');
	});

	Route::prefix('slider')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('sliderliste', 'SliderController@listele')->name('slider.liste');
		$router->get('slider/{id?}', 'SliderController@sliderForm')->name('slider.form');
		$router->post('slider/{id?}', 'SliderController@sliderKaydet')->name('slider.form.post');
		$router->get('slidersil/{id?}', 'SliderController@sliderSil')->name('slider.sil');
		$router->post('sliderguncelle/{id?}', 'SliderController@sliderGuncelle')->name('slider.guncelle');
	});

	Route::prefix('iletisim')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('iletisim/{id?}', 'IletisimController@iletisimForm')->name('iletisim.form');
		$router->post('iletisimguncelle/{id?}', 'IletisimController@iletisimGuncelle')->name('iletisim.guncelle');
	});

	Route::prefix('stklar')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('stklarliste', 'StklarController@listele')->name('stklar.liste');
		$router->get('stklar/{id?}', 'StklarController@stklarForm')->name('stklar.form');
		$router->post('stklar/{id?}', 'StklarController@stklarKaydet')->name('stklar.form.post');
		$router->get('stklarsil/{id?}', 'StklarController@stklarSil')->name('stklar.sil');
		$router->post('stklarguncelle/{id?}', 'StklarController@stklarGuncelle')->name('stklar.guncelle');
	});

	Route::prefix('uye_etkinlik')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');

		$router->get('uye_etkinlikliste', 'UyeEtkinlikController@listele')->name('uye_etkinlik.liste');
		$router->get('uye_etkinlik/{id?}', 'UyeEtkinlikController@uye_etkinlikForm')->name('uye_etkinlik.form');
		$router->post('uye_etkinlik/{id?}', 'UyeEtkinlikController@uye_etkinlikKaydet')->name('uye_etkinlik.form.post');
		$router->get('uye_etkinliksil/{id?}', 'UyeEtkinlikController@uye_etkinlikSil')->name('uye_etkinlik.sil');
		$router->post('uye_etkinlikguncelle/{id?}', 'UyeEtkinlikController@uye_etkinlikGuncelle')->name('uye_etkinlik.guncelle');
	});

	Route::prefix('logolar')->middleware('admin_kontrol')->group(function($router) {
		Route::pattern('id', '[0-9]+');
		
		$router->get('logolar/{id?}', 'LogolarController@logolarForm')->name('logolar.form');
		$router->post('logoguncelle/{id?}', 'LogolarController@logoGuncelle')->name('logolar.guncelle');
	});
});



