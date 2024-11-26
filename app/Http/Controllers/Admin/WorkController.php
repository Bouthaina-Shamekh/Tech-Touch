<?php

namespace App\Http\Controllers\Admin;

use App\Models\Work;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::get();
        return view('dashboard.work.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $works = Work::first();
        $images = Media::paginate(100);
        return view('dashboard.work.create',compact('works','images'));
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
            'project_name_en'=> 'required',
            'project_name_ar'=> 'required',
            'imagePath' => 'required',
            'price' => 'required',

        ]);
        // Insert To Database
        Work::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'project_name_en' => $request->project_name_en,
            'project_name_ar' => $request->project_name_ar,
            'price' =>$request->price,


        ]);

        return redirect()->route('admin.work.index')->with('success', __('Item updated successfully.'));
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
        $works = Work::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.work.edit',compact('works','images'));
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
                'project_name_en'=> 'required',
                'project_name_ar'=> 'required',
                 'imagePath' => 'required',
                'price' => 'required',

        ]);

        $works = Work::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $works->image;
        }

        // Insert To Database
        $works->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'project_name_en' => $request->project_name_en,
            'project_name_ar' => $request->project_name_ar,
            'price' =>$request->price,


        ]);

        return redirect()->route('admin.work.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $works = Work::findOrFail($id);
        $works->delete();
        return redirect()->route('admin.work.index')->with('success', __('Item deleted successfully.'));
    }
}
