<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function home()
    {
        $sliders = Slider::all(['name_en', 'description_en']);
        $abouts = About::first();
        $services = Hero::where('section', 'Services')
                    ->select('name_en', 'title_en', 'image1','image2')
                    ->first();
        return view('site.home', compact('sliders','abouts','services'));

    }
}
