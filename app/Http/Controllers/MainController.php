<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Hero;
use App\Models\Team;
use App\Models\About;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function home()
    {
        $sliders = Slider::all(['name_en', 'description_en']);
        $abouts = About::first();
        $services = Hero::where('section', 'Services')
                    ->select('name_en','name_ar', 'title_en', 'title_ar','description_en','description_ar','image1','image2')
                    ->first();
       $service = Service::all();
       $files = Hero::where('section', 'Files')
                ->select('name_en', 'name_ar' ,'description_en','description_ar','image1')->first();
        $file = File::all();
        $partners = Hero::where('section', 'Partners')
                   ->select('name_en', 'name_ar' ,'description_en','description_ar')->first();
        $partner = Partner::all();
        $works = Hero::where('section', 'Works')
                ->select('name_en', 'name_ar' ,'title_en','title_ar')->first();
        $teams = Hero::where('section', 'Teams')
                ->select('name_en', 'name_ar' ,'title_en','title_ar','description_en','description_ar')->first();
        $team = Team::all();
        $clients = Client::limit(5)->get();
        return view('site.home', compact('sliders','abouts','services','service','files','file','partners','partner','works','teams','team','clients'));
    }

    public function about(){

        $abouts = About::first();
        return view('site.about', compact('abouts'));

    }

    public function services(){

        $service = Service::all();
        return view('site.services', compact('service'));

    }

    public function files() {

        $file = File::all();
        return view('site.files', compact('file'));
    }
}

