<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Hero;
use App\Models\Team;
use App\Models\Work;
use App\Models\About;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\ServiceSelection;

class MainController extends Controller
{

    public function home()
    {
        $sliders = Slider::all(['name_en', 'description_en']);
        $abouts = Hero::where('section', 'About')
                    ->first();
        $services = Hero::where('section', 'Services')
                    ->select('name_en','name_ar', 'title_en', 'title_ar','description_en','description_ar','image1','image2')
                    ->first();
        $service = Service::orderBy('id','desc')->get();
        $files = Hero::where('section', 'Files')
                ->select('name_en', 'name_ar' ,'description_en','description_ar','image1')->first();
        $file = File::orderBy('id','desc')->get();
        $partners = Hero::where('section', 'Partners')
                    ->select('name_en', 'name_ar' ,'description_en','description_ar')->first();
        $partner = Partner::orderBy('id','desc')->get();
        $work = Hero::where('section', 'Works')
                ->select('name_en', 'name_ar' ,'title_en','title_ar')->first();

        $works = Work::with('categories')->orderBy('id','desc')->get();
        $teams = Hero::where('section', 'Teams')
                ->select('name_en', 'name_ar' ,'title_en','title_ar','description_en','description_ar')->first();
        $team = Team::orderBy('id','desc')->get();
        $clients = Client::limit(5)->get();

        return view('site.home', compact('sliders','abouts','services','service','files','file','partners','partner','work','works','teams','team','clients'));
    }

    public function about(){

        $abouts = Hero::where('section', 'About')
                    ->first();
        return view('site.about', compact('abouts'));

    }


    public function services(){

        $services = Service::all();
        return view('site.services', compact('services'));

    }

    public function services_show($id){
        $service = Service::findOrFail($id);
        return view('site.services_show', compact('service'));
    }

    public function services_order($id){
        $service = Service::findOrFail($id);
        return view('site.services_order', compact('service'));
    }

    public function files() {
        $files = File::paginate(12);
        return view('site.files', compact('files'));
    }
    public function file_show($id) {
        $file = File::findOrFail($id);
        return view('site.file_show', compact('file'));
    }

    public function portfolios() {
        $works = Work::with('categories')->paginate(10);
        return view('site.portfolios', compact('works'));
    }
    public function portfolio($id) {

        $portfolio = Work::with('categories')->findOrFail($id);
        return view('site.portfolio_single', compact('portfolio'));
    }

    public function test_idea(){
        $questions = Question::with('answers')->get();
        return view('site.test_idea',compact('questions'));
    }

    public function showAnswers(Request $request)
    {
        $questions = $request->questions;
        $questionsId = [];
        $answers = [];
        foreach ($questions as $key => $value ) {
            $questionsId[] = $key;
            $answers[$key] = $value;
        }
        $requirementIds = [];
        $questions = Question::whereIn('id', $questionsId)->with('answers')->get();
        foreach ($questions as $question) {
            foreach ($question->answers as $answer) {
                if ($answer->answer != $answers[$question->id]) {
                    $requirementIds[] = $question->id;
                }
            }
        }
        $requirements = Question::whereIn('id', $requirementIds)->with('answers')->get();
        $preg = number_format(($requirements->count() / $questions->count()) * 100,0);
        return view('site.our_comment', compact('requirements','preg')); //
    }


    public function selectServices(Request $request)
    {

        $request->validate([
            'services' => 'required|array|min:1',
            'services.*' => 'exists:questions,id',
        ]);


        foreach ($request->services as $serviceId) {
            ServiceSelection::create([
                'question_id' => $serviceId,
            ]);
        }


        return redirect()->route('user.checkout');
    }


    public function storeServices(Request $request)
{

    $services = $request->input('services', []);

    foreach ($services as $questionId => $serviceSelections) {

        $question = Question::findOrFail($questionId);


        foreach ($serviceSelections as $service => $value) {

        }
    }


    return redirect()->route('site.index')->with('success', 'Services selected successfully!');
}


}

