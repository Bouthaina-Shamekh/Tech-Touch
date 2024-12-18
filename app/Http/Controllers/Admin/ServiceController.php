<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::Orderby('id','desc')->get();
        return view('dashboard.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = new Service();
        $images = Media::paginate(100);
        return view('dashboard.service.create',compact('services','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'imagePath' => 'required',


        ]);
        // Insert To Database
        Service::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,


        ]);

        return redirect()->route('admin.service.index')->with('success', __('Item updated successfully.'));
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
        $services = Service::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.service.edit',compact('services','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
            'imagePath' => 'nullable',

        ]);

        $services = Service::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $services->image;
        }

        // Insert To Database
        $services->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $image,


        ]);

        return redirect()->route('admin.service.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        return redirect()->route('admin.service.index')->with('success', __('Item deleted successfully.'));
    }
}
