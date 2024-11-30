<?php

// namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        return view('dashboard.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $abouts = About::first();
        $images = Media::paginate(100);
        return view('dashboard.about.create',compact('abouts','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'imagePath' => 'nullable',


        ]);
        // Insert To Database
        About::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,

        ]);

        return redirect()->route('admin.about.index')->with('success', __('Item updated successfully.'));
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
        $abouts = About::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.about.edit',compact('abouts','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_en' => 'nullable|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'imagePath' => 'nullable',

        ]);

        $abouts = About::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $abouts->image;
        }

        // Insert To Database
        $abouts->update([
           'name_en' => $request->name_en,
           'name_ar' => $request->name_ar,
           'description_ar' => $request->description_ar,
           'description_en' => $request->description_en,
           'image' => $image,
           'title_en' => $request->title_en,
           'title_ar' => $request->title_ar,
        ]);

        return redirect()->route('admin.about.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $abouts = About::findOrFail($id);
        $abouts->delete();
        return redirect()->route('admin.about.index')->with('success', __('Item deleted successfully.'));
    }

}
