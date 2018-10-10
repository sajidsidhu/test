<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function save(Request $r) {
        $img = 'img';
        $photoName = date('ymd') . rand(1, 999999) . time() . '.' . $r->file($img)->getClientOriginalExtension();
        $pathorg = public_path('CategoryPhotos/orignal/').$photoName;
        $pathtmb = public_path('CategoryPhotos/thumbnail/').$photoName;
    $pathico = public_path('CategoryPhotos/icon/').$photoName;
    $orignalfile = $r->file($img)->getRealPath();
    $imag = Image::make($orignalfile);
    $imag->resize(200, 400);
    $imag->save($pathorg,100);
    $imag->save($pathtmb,100);
    $imag->resize(50, 50);
    $imag->save($pathico,100);
    return $imag->response();
    }
}
