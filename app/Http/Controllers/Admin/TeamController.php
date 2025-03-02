<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $this->authorize('view', Team::class);
        $teams = Team::Orderby('id','desc')->get();
        return view('dashboard.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Team::class);
        $teams = Team::first();
        $images = Media::paginate(100);
        return view('dashboard.team.create',compact('teams','images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Team::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'imagePath' => 'required',
            'Specialization_en' => 'required',
            'Specialization_ar' => 'required',

        ]);
        // Insert To Database
        Team::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'image' => $request->imagePath,
            'Specialization_en' =>$request->Specialization_en,
            'Specialization_ar' =>$request->Specialization_ar,

        ]);

        return redirect()->route('admin.team.index')->with('success', __('Item updated successfully.'));
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
        $this->authorize('edit', Team::class);
        $teams = Team::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.team.edit',compact('teams','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Team::class);
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'imagePath' => 'nullable',
            'Specialization_en' => 'required',
            'Specialization_ar' => 'required',

        ]);

        $teams = Team::findOrFail($id);
        $image = $request->imagePath;
        if($image == null){
            $image = $teams->image;
        }

        // Insert To Database
        $teams->update([
           'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'image' => $image,
            'Specialization_en' =>$request->Specialization_en,
            'Specialization_ar' =>$request->Specialization_ar,

        ]);

        return redirect()->route('admin.team.index')->with('success', __('Item updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Team::class);
        $teams = Team::findOrFail($id);
        $teams->delete();
        return redirect()->route('admin.team.index')->with('success', __('Item deleted successfully.'));
    }
}
