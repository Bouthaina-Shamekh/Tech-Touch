<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Media;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $this->authorize('view', Hero::class);
        $heros = Hero::get();
        $sections = ['Slider' ,'About','Services','Files','Partners','Works','Teams','Feedback','Goals','Features'];
        $sectionsMenu = Hero::select('section')->distinct()->pluck('section')->toArray();

        return view('dashboard.hero.index',compact('heros','sections','sectionsMenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Hero::class);
        $heros = new Hero();
        $heros = Hero::first();
        $images = Media::paginate(100);
        $sections = ['Slider' ,'About','Services','Files','Partners','Works','Teams','Feedback','Goals','Features'];
        $sectionsMenu = Hero::select('section')->distinct()->pluck('section')->toArray();
        $sections_diff = array_diff($sections, $sectionsMenu);
        return view('dashboard.hero.create',compact('heros','images','sections','sections_diff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Hero::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'title_en' => 'nullable',
            'title_ar' => 'nullable',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'imagePath1' => 'nullable',
            'imagePath2' => 'nullable',
            'section' => 'required',
            'video' => 'nullable',
        ]);
        // Insert To Database
        Hero::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image1' => $request->imagePath1,
            'image2' => $request->imagePath2,
            'section' => $request->section,
            'video' => $request->video,
        ]);

        return redirect()->route('admin.hero.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Hero::class);
        $heros = Hero::findOrFail($id);
        $images = Media::paginate(100);
        $sections = ['Slider' ,'About','Services','Files','Partners','Works','Teams','Feedback','Goals','Features'];
        $sectionsMenu = Hero::select('section')->distinct()->pluck('section')->toArray();
        $sections_diff = array_diff($sections, $sectionsMenu);
        return view('dashboard.hero.edit',compact('heros','images','sections','sections_diff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Hero::class);
        $request->validate([
           'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'title_en' => 'nullable',
            'title_ar' => 'nullable',
            'description_en' => 'nullable',
            'description_ar' => 'nullable',
            'imagePath1' => 'nullable',
            'imagePath2' => 'nullable',
            'section' => 'required',
            'video' => 'nullable',
        ]);

        $heros = Hero::findOrFail($id);
        $image1 = $request->imagePath1;
        $image2 = $request->imagePath2;
        if($image1 == null){
            $image1 = $heros->image1;
        }
        if($image2 == null){
            $image2 = $heros->image2;
        }

        // Insert To Database
        $heros->update([
           'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image1' => $image1,
            'image2' => $image2,
            'section' => $request->section,
            'video' => $request->video ?? $heros->video,
        ]);

        return redirect()->route('admin.hero.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Hero::class);
        $heros = Hero::findOrFail($id);
        $heros->delete();
        return redirect()->route('admin.hero.index')->with('success', __('Item deleted successfully.'));
    }
}
