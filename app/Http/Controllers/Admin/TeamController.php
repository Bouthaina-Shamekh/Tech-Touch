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
        $teams = Team::get();
        return view('dashboard.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::first();
        $images = Media::paginate(100);
        return view('dashboard.team.create',compact('teams','images'));
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
            'member_name_en'=> 'required',
            'member_name_ar'=> 'required',
            'imagePath' => 'required',
            'Specialization_en' => 'required',
            'Specialization_ar' => 'required',

        ]);
        // Insert To Database
        Team::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'member_name_en' => $request->member_name_en,
            'member_name_ar' => $request->member_name_ar,
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
        $teams = Team::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.Team.edit',compact('teams','images'));
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
            'member_name_en'=> 'required',
            'member_name_ar'=> 'required',
            'imagePath' => 'required',
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
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $request->imagePath,
            'member_name_en' => $request->member_name_en,
            'member_name_ar' => $request->member_name_ar,
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
        $teams = Team::findOrFail($id);
        $teams->delete();
        return redirect()->route('admin.team.index')->with('success', __('Item deleted successfully.'));
    }
}
