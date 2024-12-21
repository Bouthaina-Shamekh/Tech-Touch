<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        $this->authorize('view', Slider::class);
        $sliders = Slider::Orderby('id','desc')->get();
        return view('dashboard.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Slider::class);
        $slid = Slider::first();
        // $images = Media::paginate(100);
        return view('dashboard.slider.create',compact('slid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Slider::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);
        // Insert To Database
        Slider::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
        ]);

        return redirect()->route('admin.slider.index')->with('success', __('Item updated successfully.'));
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
        $this->authorize('edit', Slider::class);
        $slid = Slider::findOrFail($id);

        return view('dashboard.slider.edit',compact('slid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Slider::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);

        $slid = Slider::findOrFail($id);


        // Insert To Database
        $slid->update([
           'name_en' => $request->name_en,
           'name_ar' => $request->name_ar,
           'description_ar' => $request->description_ar,
           'description_en' => $request->description_en,
        ]);

        return redirect()->route('admin.slider.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Slider::class);
        $slid = Slider::findOrFail($id);
        $slid->delete();
        return redirect()->route('admin.slider.index')->with('success', __('Item deleted successfully.'));
    }
}
