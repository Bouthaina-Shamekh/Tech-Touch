<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
        $this->authorize('view', Feature::class);
        $features = Feature::Orderby('id','desc')->get();
        return view('dashboard.feature.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Feature::class);
        $features = Feature::first();
        return view('dashboard.feature.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Feature::class);
        $request->validate([
            'feature_en' => 'required',
            'feature_ar' => 'required',
        ]);
        // Insert To Database
        Feature::create([
            'feature_en' => $request->feature_en,
            'feature_ar' => $request->feature_ar,
        ]);

        return redirect()->route('admin.feature.index')->with('success', __('Item updated successfully.'));
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
    public function edit($id)
    {
        $this->authorize('edit', Feature::class);
        $features = Feature::findOrFail($id);

        return view('dashboard.feature.edit',compact('features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Feature::class);
        $request->validate([
            'feature_en' => 'required',
            'feature_ar' => 'required',

        ]);

        $features = Feature::findOrFail($id);


        // Insert To Database
        $features->update([
            'feature_en' => $request->feature_en,
            'feature_ar' => $request->feature_ar,
        ]);

        return redirect()->route('admin.feature.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Feature::class);
        $features = Feature::findOrFail($id);
        $features->delete();
        return redirect()->route('admin.feature.index')->with('success', __('Item deleted successfully.'));
    }
}
