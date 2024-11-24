<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {
        $files = File::get();
        return view('dashboard.file.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $files = File::first();
        $images = Media::paginate(100);
        return view('dashboard.file.create',compact('files','images'));
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
            'file_name_en'=> 'required',
            'file_name_ar'=> 'required',
            'imagePath' => 'required',
            'price' => 'required',
            'btn' => 'nullable',

        ]);
        // Insert To Database
        File::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'file_name_en' => $request->file_name_en,
            'file_name_ar' => $request->file_name_ar,
            'price' =>$request->price,
            'btn' =>$request->btn,

        ]);

        return redirect()->route('admin.file.index')->with('success', __('Item updated successfully.'));
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
        $files = File::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.File.edit',compact('files','images'));
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
            'file_name_en'=> 'required',
            'file_name_ar'=> 'required',
            'imagePath' => 'required',
            'price' => 'required',
            'btn' => 'nullable',

        ]);

        $files = File::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $files->image;
        }

        // Insert To Database
        $files->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'file_name_en' => $request->file_name_en,
            'file_name_ar' => $request->file_name_ar,
            'price' =>$request->price,
            'btn' =>$request->btn,

        ]);

        return redirect()->route('admin.file.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $files = File::findOrFail($id);
        $files->delete();
        return redirect()->route('admin.file.index')->with('success', __('Item deleted successfully.'));
    }
}
