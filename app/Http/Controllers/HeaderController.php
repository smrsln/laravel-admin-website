<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function headerOgeler(View $view){
        $logo = DB::table('logolar')->select('logo')->first();
        //$headercon = DB::table('iletisim')->select('email')->first()->get()->toArray();
        $view->with('logo', $logo);
        //return resource('view.header')->with(compact('logo'));
        
        //return view('view.header', compact('logo'));
    }
}
