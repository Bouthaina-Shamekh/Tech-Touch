<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::get();
        return view('dashboard.project.index',compact('projects'));

    }


    public function create()
    {
        $projects = Project::first();
        $major = Major::get();
        $images = Media::paginate(100);
        return view('dashboard.project.create',compact('projects','images','major'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name_en' => 'required',
        'name_ar' => 'required',
        'imagePath' => 'required',
        'major' => 'required|array', // القائمة التي تحتوي على التخصصات المختارة
    ]);

    // إنشاء مشروع جديد
    $project = Project::create([
        'name_en' => $request->name_en,
        'name_ar' => $request->name_ar,
        'image' => $request->imagePath,
    ]);

    // إضافة التخصصات للمشروع
    $project->major()->attach($request->major); // حيث أن $request->major هي مصفوفة تحتوي على IDs للتخصصات المختارة.

    return redirect()->route('admin.project.index')->with('success', __('Item updated successfully.'));
}


public function edit(string $id)
    {
        $projects = Project::findOrFail($id);
        $images = Media::paginate(100);
        return view('dashboard.Project.edit',compact('projects','images'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
       'name_en' => 'required',
        'name_ar' => 'required',
        'imagePath' => 'required',
        'major' => 'required|array',
    ]);

    // استرجاع المشروع
    $project = Project::findOrFail($id);

    $image = $request->imagePath;
        if($image == null){
            $image = $project->image;
        }

    // تحديث اسم المشروع
    $project->name = $request->name;

    $project->update([
        'name_en' => $request->name_en,
        'name_ar' => $request->name_ar,
        'image' => $request->imagePath,
    ]);

    $project->save();

    // تحديث التخصصات للمشروع
    $project->major()->sync($request->major); // سيتم تحديث التخصصات المتعلقة بهذا المشروع

    return redirect()->route('admin.project.index')->with('success', __('Item updated successfully.'));
}



}
